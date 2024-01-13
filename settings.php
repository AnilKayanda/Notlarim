<?php
session_start();
// Kullanıcı giriş kontrolü
if (!isset($_SESSION['Eposta'])) {
    // Kullanıcı giriş yapmamış, giriş sayfasına yönlendir
    header("Location:/projects/ecommerce/login.html");
    exit();
}

// Veritabanı bağlantısını içe aktar
include "php/connection.php";

// Kullanıcının sahip olduğu paket bilgilerini çek
if (isset($_SESSION['Eposta'])) {
    $userID = $_SESSION['ID'];

    $sql = "SELECT Ad, Soyad, Eposta
            FROM users
            WHERE users.ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        // fetch_assoc fonksiyonu kullanarak verileri çek
        $userData = $result->fetch_assoc();

        if ($userData) {
            $Ad = $userData['Ad'];
            $Soyad = $userData['Soyad'];
            $Eposta = $userData['Eposta'];
        } else {
            echo "Kullanıcı bulunamadı.";
            exit;
        }
    } else {
        echo "Sorgu hatası: " . $stmt->error;
        exit;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head kısmını buraya taşıdım -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/contact.css">
    <script src="https://kit.fontawesome.com/e1fdcb0310.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="img/Siyah Minimalist Metin Logo.png">

    <style>
        input {
            color: #7D7C7C;
        }

        section {
            position: relative;
            margin: auto;
            margin-top: 15%;
            margin-bottom: 15%;
            box-shadow: 10px 10px 15px black;
            width: 40%;
            height: 80vh;
        }

        #logout {
            position: relative;
            right: 4%;
        }
    </style>
</head>

<body>
    <header>
        <!-- Header kısmını buraya taşıdım -->
        <img id="logo" src="img/Logo.png">
        <nav>
            <ul class="nav_links">
                <li><a href="home2.php">Anasayfa</a></li>
                <li><a href="yayinlar.php">Yayınlar</a></li>
                <li><a href="paketlerim.php">Paketlerim</a></li>
            </ul>
        </nav>
        <a class="cta" href="contact.html"><button>Bize Ulaş</button></a>
        <a id="logout" href="index.html"><button onclick="logout()">Çıkış Yap</button></a>

        <a id="settings" href="settings.php"><i class="fa-solid fa-gear fa-spin"></i></a>
    </header>

    <section>
        <!-- Section kısmını buraya taşıdım -->
        <h2>Bilgileriniz</h2>
        <form action="php/parola_degistir.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <input id="firstName" name="firstName" value="<?php echo $Ad ?>" readonly>
                </div>

                <div class="form-group">
                    <input id="lastName" name="lastName" value="<?php echo $Soyad ?>" readonly>
                </div>
            </div>

            <div class="form-group">
                <input id="email" name="email" value="<?php echo $Eposta ?>" readonly>
            </div>

            <div class="form-group">
                <h5 style="margin-top: 5%; background-color:transparent;">Parolanızı Değiştirin</h5>
                <input type="password" id="exParola" name="exParola" placeholder="Mevcut Parolanız" required>
            </div>
            <div class="form-group">
                <input type="password" id="NewParola" name="NewParola" placeholder="Yeni Parolanız" required>
            </div>
            <button type="submit"> <i class="fa-solid fa-paper-plane"></i></button>
        </form>
    </section>

    <footer>
        <!-- Footer kısmını buraya taşıdım -->
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