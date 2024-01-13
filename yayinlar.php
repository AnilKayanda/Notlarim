<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e1fdcb0310.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/yayinlar.css">
    <title>Home</title>
</head>

<body>
    <header>
        <img id="logo" src="img/Logo.png">
        <nav>
            <ul class=" nav_links">
                <?php
                session_start();
                if (!isset($_SESSION['Eposta'])) {
                    echo "<li><a href='index.html'>Anasayfa</a></li>";
                } else {
                    echo "<li><a href='home2.php'>Anasayfa</a></li>";
                }
                ?>
                <li><a href="yayinlar.php">Yayınlar</a></li>
                <li><a href="paketlerim.php">Paketlerim</a></li>
                <li><a href="sepet.php">Sepete Git <i class="fa-solid fa-shop"></i></a></li>
                <?php
                if (!isset($_SESSION['Eposta'])) {
                    echo "<li><a href='login.html'>Giriş Yap</a></li>";
                    echo "<li><a href='signup.html'>Kayıt Ol</a></li>";
                }
                ?>
            </ul>
        </nav>

        <a class="cta" href="contact.html"><button>Bize Ulaş</button>
        </a>
        <?php
        if (isset($_SESSION['Eposta'])) {
            echo '<a id="logout" href="index.html"><button onclick="logout()">Çıkış Yap</button></a>';
        }
        ?>

        <a id="settings" href="settings.php"><i class="fa-solid fa-gear fa-spin"></i></a>
    </header>

    <!-- <div class="container">
        <h3>Satın aldığınız her ders paketinin bir kısmı ihtiyaç sahibi öğrencilere gitmektedir.</h3>
    </div> -->

    <div class="container">
        <img src="img/yardım.jpg">
        <h3>Satın aldığınız her ders onlara kalem,kağıt oluyor.</h3>
    </div>

    <section>
        <a target="_blank" href="Yayinlar/3-4-5.php">
            <div class="news">
                <div class="img"><img src="img/456Yayinarlijpg.jpg" alt=""></div>
                <p>4-5-6 Yayınları</p>
            </div>
        </a>

        <a target="_blank" href="Yayinlar/bilgifeneri.php">
            <div class="news">
                <div class="img"><img src="img/bilgifeneri.png" alt=""></div>
                <p>Bilgi Feneri Yayınevi</p>
            </div>

        </a>
        <a target="_blank" href="Yayinlar/zekalab.php">
            <div class="news">
                <div class="img"><img src="img/zekaYayinevleri.jpg" alt=""></div>
                <p>Zeka Labirenti Yayınları</p>
            </div>
        </a>
        <a target="_blank" href="Yayinlar/bilgicagin.php">
            <div class="news">
                <div class="img"><img src="img/fantasy-1077863_1280.jpg" alt=""></div>
                <p>Bilgi Çağı Yayın Grubu</p>
            </div>
        </a>
        <a target="_blank" href="Yayinlar/kuzey.php">
            <div class="news">
                <div class="img"><img src="img/kuzey.png" alt=""></div>
                <p>Kuzey Yayınları</p>
            </div>
        </a>
        <a target="_blank" href="Yayinlar/basariyolu.php">
            <div class="news">
                <div class="img"><img src="img/basarıyayinlari.png" alt=""></div>
                <p>Başarı Yolu Yayınevi</p>
            </div>
        </a>

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