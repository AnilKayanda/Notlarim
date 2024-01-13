<?php
// Oturumu başlat
session_start();

// Eğer oturum değişkenleri set edilmişse, kullanıcı giriş yapmış demektir
if (isset($_SESSION['Eposta'])) {
    // Kullanıcının verilerini silebilirsiniz (örneğin, $_SESSION içindeki verileri temizleme)
    $_SESSION = array();

    // Oturumu sonlandır
    session_destroy();

    // Çerezin süresini geçmiş hale getir
    setcookie(session_name(), '', time() - 3600, '/');

    // Çıkış başarılı olduysa, HTTP 200 (OK) durumunu döndür
    header("Location: /projects/ecommerce/index.html");
    http_response_code(200);
} else {
    // Kullanıcı zaten çıkış yapmışsa, HTTP 400 (Bad Request) durumunu döndür
    http_response_code(400);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Çıkış Yap</title>
    <script>
        // Tarayıcıda saklanan çerezleri sil
        document.cookie.split(";").forEach(function(c) {
            document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
        });

        // Çıkış yaptıktan sonra ana sayfaya yönlendir
        window.location.replace("index.html");
    </script>
</head>

<body>
</body>

</html>