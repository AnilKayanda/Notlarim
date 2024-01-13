<?php
session_start();
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formdan gelen verileri al
    $exParola = $_POST['exParola'];
    $newParola = $_POST['NewParola'];

    // Kullanıcı adını belirle (örnekte sabit bir değer kullanıldı)
    $username = $_SESSION['Eposta'];

    // Kullanıcıya ait parolayı veritabanından al
    $kontrolIfade = $baglanti->prepare("SELECT Parola FROM users WHERE Eposta = :Eposta");
    $kontrolIfade->bindParam(':Eposta', $username, PDO::PARAM_STR);
    $kontrolIfade->execute();
    $row = $kontrolIfade->fetch(PDO::FETCH_ASSOC);
    $kontrolIfade->closeCursor();

    if ($row) {
        // Kullanıcı bulundu, parolayı kontrol et
        $storedPassword = $row['Parola'];

        if ($exParola == $storedPassword) {
            // Mevcut parola doğru, yeni parolayı güncelle
            $updateIfade = $baglanti->prepare("UPDATE users SET Parola = :Parola WHERE Eposta = :Eposta");
            $updateIfade->bindParam(':Parola', $newParola, PDO::PARAM_STR);
            $updateIfade->bindParam(':Eposta', $username, PDO::PARAM_STR);

            if ($updateIfade->execute()) {
                echo "<script>alert('Parola başarıyla güncellendi.'); window.location.href='../settings.php';</script>";
            } else {
                echo "<script>alert('Hata: Parola güncellenemedi.'); window.location.href='../settings.php';</script>";
            }
        } else {
            echo "<script>alert('Mevcut parola yanlış.'); window.location.href='../settings.php';</script>";
        }
    } else {
        echo "<script>alert('Kullanıcı bulunamadı.'); window.location.href='../settings.php';</script>";
    }
}

$baglanti = null;
