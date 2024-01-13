<?php
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Ad = $_POST['Ad'];
    $Soyad = $_POST['Soyad'];
    $ePosta = $_POST['Eposta'];
    $Cinsiyet = @$_POST['Cinsiyet'];
    $Parola = $_POST['parola'];
    $DogumTarih = $_POST['Dogum_Tarihi'];

    // E-posta adresinin kullanılıp kullanılmadığını kontrol et
    $kontrolIfade = $baglanti->prepare("SELECT COUNT(*) as sayi FROM users WHERE eposta = :Eposta");
    $kontrolIfade->bindParam(':Eposta', $ePosta, PDO::PARAM_STR, 45);
    $kontrolIfade->execute();
    $kullaniciSayisi = $kontrolIfade->fetch(PDO::FETCH_ASSOC)['sayi'];
    $kontrolIfade->closeCursor();

    if ($kullaniciSayisi > 0) {
        // E-posta daha önce kullanılmışsa JavaScript alert mesajı göster
        echo  "<script>alert('E-Posta Daha Önce Kullanılmış.'); window.location.href='../signup.html';</script>";
        exit;
    }

    $ifade = $baglanti->prepare("CALL KullaniciEkle(:Ad,:Soyad,:Eposta,:Cinsiyet, :Parola,:Dogum_Tarihi,@Hata)");
    $ifade->bindParam(':Ad', $Ad, PDO::PARAM_STR, 45);
    $ifade->bindParam(':Soyad', $Soyad, PDO::PARAM_STR, 45);
    $ifade->bindParam(':Eposta', $ePosta, PDO::PARAM_STR, 45);
    $ifade->bindParam(':Parola', $Parola, PDO::PARAM_STR, 32);
    $ifade->bindParam(':Dogum_Tarihi', $DogumTarih, PDO::PARAM_STR, 32);
    $ifade->bindParam(':Cinsiyet', $Cinsiyet, PDO::PARAM_STR, 1);

    $eklemeDurum = $ifade->execute();
    $ifade->closeCursor(); // Önceki sorgu sonuç kümesini temizle

    // Diğer kontrol durumları ve işlemleri buraya eklenir
    // ...

    $kayit = $baglanti->query("SELECT @Hata AS Hata")->fetch(PDO::FETCH_ASSOC);
    switch ($kayit['Hata']) {
        case 1:
            // Kullanıcı eklendi, JavaScript alert mesajı göster
            echo "<script>alert('Kullanıcı eklendi');</script>";
            // Yönlendirme yap
            header("Location: /projects/ecommerce/home2.php");
            exit;
            break;
            // Diğer durumlar buraya eklenir
            // ...
    }
    // Yönlendirme yap
    header("Location: /projects/ecommerce/home2.php");
    exit();
}

$baglanti = null;
