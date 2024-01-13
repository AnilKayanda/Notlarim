
<?php
// Dosya değiştirme işlemini gerçekleştiren PHP kodu

if (isset($_POST['submit'])) {
    // Formdan gelen verileri al
    $dersID = isset($_GET['id']) ? $_GET['id'] : null;

    // Ders ID kontrolü yapın ve işlemleri gerçekleştirin
    if (!empty($dersID)) {
        // Hedef dizini belirt
        $hedefDizin = 'data:application/pdf/';

        // Yüklenen dosyanın bilgilerini al
        $yuklenenDosya = $_FILES['pdfDosya'];

        // Yüklenen dosyanın adını belirle (mevcut ID ile aynı isimde)
        $yeniDosyaAdi = $dersID . '.pdf';

        // Yüklenen dosyayı hedef dizine taşı
        move_uploaded_file($yuklenenDosya['tmp_name'], $hedefDizin . $yeniDosyaAdi);

        echo 'PDF dosyası başarıyla değiştirildi.';
        header("Location: /projects/ecommerce/upload.php");
        exit();
    } else {
        echo 'Ders ID bulunamadı.';
    }
}
?>
