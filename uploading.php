<?php
session_start();
// Kullanıcı giriş kontrolü
if (!isset($_SESSION['Eposta'])) {
    // Kullanıcı giriş yapmamış, giriş sayfasına yönlendir
    header("Location:/projects/ecommerce/login.html");
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notlar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e1fdcb0310.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="img/Siyah Minimalist Metin Logo.png">
    <link rel="stylesheet" href="css/notlar.css">
    <style>
        .container {
            position: relative;
            width: 30%;
            padding: 0;
            height: 35vh;
            margin-top: 12%;
            border: solid 1px black;
            background-color: #F7F7F7;
            align-items: center;
            justify-content: center;
            text-align: center;
            box-shadow: 10px 10px 15px black;
            border-radius: 40px;
            overflow: hidden;
        }

        .container form {
            height: 80%;
            background-color: transparent;
        }

        .container input {
            margin-top: 10%;
            margin-left: 25%;
            background-color: transparent;
        }

        .container h2 {
            background-color: black;
            color: #ffff;
            box-shadow: 10px 10px 15px grey;
        }

        #u-btn {
            margin-top: 10%;
        }

        section {
            margin-top: 4%;
        }
    </style>
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

        <?php
        if (isset($_SESSION['Eposta'])) {
            echo '<a id="logout" href="index.html"><button onclick="logout()">Çıkış Yap</button></a>';
        }
        ?>

        <a id="settings" href="settings.php"><i class="fa-solid fa-gear fa-spin"></i></a>
    </header>

    <div class="container">
        <h2>Notunuzu Değiştirin</h2>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Dosya değiştirme formuyla gönderilen işlemleri gerçekleştir
            if (isset($_POST['dersID']) && isset($_FILES['pdfDosya'])) {
                $dersID = $_POST['dersID'];
                $pdfDosya = $_FILES['pdfDosya'];

                // Dosya uzantısını kontrol et
                $dosyaUzantisi = pathinfo($pdfDosya['name'], PATHINFO_EXTENSION);
                if ($dosyaUzantisi === 'pdf') {
                    // Dosyayı güncelleme işlemlerini gerçekleştir
                    $pdfDosyaYolu = 'pdf/' . $dersID . '.pdf';

                    // Eğer dosya varsa, önce sil
                    if (file_exists($pdfDosyaYolu)) {
                        unlink($pdfDosyaYolu);
                    }

                    // Yeni dosyayı yükle
                    move_uploaded_file($pdfDosya['tmp_name'], $pdfDosyaYolu);

                    echo 'PDF dosyası başarıyla değiştirildi.';
                } else {
                    echo 'Lütfen PDF formatında bir dosya seçin.';
                }
            }
        }

        // Ders ID'sini URL parametresinden al
        $dersID = isset($_GET['id']) ? $_GET['id'] : null;

        // Ders ID kontrolü yapın ve işlemleri gerçekleştirin
        if (!empty($dersID)) {
            // PDF dosyasının yolu
            $pdfDosyaYolu = 'pdf/' . $dersID . '.pdf';

            // Dosya var mı kontrol et
            if (file_exists($pdfDosyaYolu)) {
                // PDF dosyasını oku ve base64 kodla
                $pdfIcerik = base64_encode(file_get_contents($pdfDosyaYolu));

                // Dosya değiştirme formu
                echo '<form action="" method="post" enctype="multipart/form-data">';
                echo '<input type="hidden" name="dersID" value="' . $dersID . '">';
                echo '<input type="file" name="pdfDosya" accept=".pdf" required>';
                echo '<button id="u-btn" type="submit">Dosyayı Değiştir</button>';
                echo '</form>';
            } else {
                // Dosya bulunamazsa hata mesajı gönder
                echo 'PDF dosyası bulunamadı.';
            }
        } else {
            // Ders ID yoksa hata mesajı gönder
            echo 'Ders ID bulunamadı.';
        }
        ?>


    </div>


    <section>
        <?php
        // Ders ID'sini URL parametresinden al
        $dersID = isset($_GET['id']) ? $_GET['id'] : null;

        // Ders ID kontrolü yapın ve işlemleri gerçekleştirin
        if (!empty($dersID)) {
            // PDF dosyasının yolu
            $pdfDosyaYolu = 'pdf/' . $dersID . '.pdf';

            // Dosya var mı kontrol et
            if (file_exists($pdfDosyaYolu)) {
                // PDF dosyasını oku ve base64 kodla
                $pdfIcerik = base64_encode(file_get_contents($pdfDosyaYolu));

                // HTML içinde gömülü PDF gösterimi
                echo '<iframe  id="notlarIframe"  src="data:application/pdf;base64,' . $pdfIcerik . '#toolbar=0&navpanes=0" width="100%" height="800px"  frameborder="0" ></iframe>';
                echo '<div id="blocker"></div>';
            } else {
                // Dosya bulunamazsa hata mesajı gönder
                echo 'PDF dosyası bulunamadı.';
            }
        } else {
            // Ders ID yoksa hata mesajı gönder
            echo 'Ders ID bulunamadı.';
        }
        ?>
    </section>



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
    <script src="card.js"></script>
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