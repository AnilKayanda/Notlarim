<?php

session_start();

// Kullanıcı giriş kontrolü
if (!isset($_SESSION['Eposta'])) {
    // Kullanıcı giriş yapmamış, giriş sayfasına yönlendir
    header("Location:/projects/ecommerce/index.html");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e1fdcb0310.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/home.css">
    <title>Home</title>

</head>

<body>
    <header>
        <img id="logo" src="img/Logo.png">
        <nav>
            <ul class="nav_links">
                <li><a href="home2.php">Anasayfa</a></li>
                <?php
                // Kullanıcı girişi yapıldı mı kontrol et
                if (isset($_SESSION['Eposta'])) {
                    // Veritabanından kullanıcının ID'sini al
                    $loggedInUserID = $_SESSION['ID'];
                    require_once "php/connection.php";

                    // Veritabanından admin ID'lerini çek
                    $adminIDsQuery = "SELECT ID FROM admin";
                    $adminIDsResult = $conn->query($adminIDsQuery);

                    // Admin ID'leri içeren bir dizi oluştur
                    $adminIDs = array();
                    while ($row = $adminIDsResult->fetch_assoc()) {
                        $adminIDs[] = $row['ID'];
                    }

                    // Eğer kullanıcı admin ID'leri arasında ise
                    if (in_array($loggedInUserID, $adminIDs)) {
                        // Admin bağlantıları
                        echo '<li><a href="upload.php">Güncelle</a></li>';
                    } else {
                        // Admin değilse standart bağlantılar
                        echo '<li><a href="yayinlar.php">Yayınlar</a></li>';
                        echo '<li><a href="paketlerim.php">Paketlerim</a></li>';
                        echo '<li><a href="sepet.php">Sepete Git <i class="fa-solid fa-shop"></i></a></li>';
                    }
                }
                ?>

            </ul>
        </nav>

        <a class="cta" href="contact.html"><button>Bize Ulaş</button></a>


        <a id="logout" href="index.html"><button onclick="logout()">Çıkış Yap</button></a>


        <a id="settings" href="settings.php"><i class="fa-solid fa-gear fa-spin"></i></a>
    </header>


    <section>
        <div class="img"><img src="img/skyscraper-8416953_1280.jpg" alt=""></div>

        <?php
        if (in_array($loggedInUserID, $adminIDs)) {
            echo '<button class="button" onClick="parent.location=\'upload.php\'"> Haydi Başlayalım </button>';
        } else {
            echo '<button class="button" onClick="parent.location=\'yayinlar.php\'"> Maratona Hazır Mısın ? </button>';
        }
        ?>

    </section>



    <!--- FOOTER   -->


    <footer>
        <div class="footer-content">
            <h3>Notlarım</h3>
            <p>At the intersection of art and creativity, we craft unique designs just for you. Explore our successes
                and let's bring projects to life together!</p>
            <ul class="socials">
                <li><a target="_blank" href="https://www.instagram.com/anilkayanda/">
                        <i class="fa-brands fa-square-instagram"></i></a></li>
                <li><a href="mailto:anilkayanda@gmail.com"><i class="fa-solid fa-envelope"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin"></a></i></li>
                <li><a target="_blank" href="https://github.com/AnilKayanda"><i class="fa-brands fa-github"></a></i>
                </li>
                <li><a target="_blank" href="https://twitter.com/anilkayanda"><i class="fa-brands fa-twitter"></i></a>
                </li>

            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2023 designed by <span>Anıl Kayanda</span></p>
        </div>
    </footer>

    <script>
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })

        function logout() {
            // Sunucuya logout.php dosyasına istek gönder
            fetch('php/logout.php')
                .then(response => {
                    if (response.ok) {
                        // Başarılı bir şekilde çıkış yapıldıysa, sayfayı yenile
                        location.reload();
                    } else {
                        // Çıkış başarısızsa, hata mesajını göster veya başka bir şey yap
                        console.error('Çıkış yapılamadı');
                    }
                })
                .catch(error => {
                    console.error('Bağlantı hatası:', error);
                });
        }
    </script>
</body>

</html>