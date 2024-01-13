<?php
session_start();

// Kullanıcı giriş kontrolü
if (!isset($_SESSION['Eposta'])) {
    // Kullanıcı giriş yapmamış, giriş sayfasına yönlendir
    header("Location:/projects/ecommerce/login.html");
    exit();
}

?>
<?php
// Veritabanı bağlantısını içe aktar
include "php/connection.php";

// Kullanıcının sahip olduğu paket bilgilerini çek
if (isset($_SESSION['Eposta'])) {
    $userID = $_SESSION['ID'];

    $sql = "SELECT DISTINCT GROUP_CONCAT(dersler.ID) AS DersIDlist, GROUP_CONCAT(dersler.Dersler) AS Dersler 
            FROM admin
            JOIN dersler ON FIND_IN_SET(dersler.ID, admin.dersID)
            WHERE admin.ID = $userID
            GROUP BY admin.ID";
    $result = $conn->query($sql);

    $userPackages = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Ders ID'leri ve Ders isimlerini virgül ile ayır
            $dersIDList = explode(',', $row['DersIDlist']);
            $dersler = explode(',', $row['Dersler']);

            // Her bir dersi diziye ekleyerek kullanabilirsiniz
            for ($i = 0; $i < count($dersIDList); $i++) {
                $userPackages[] = array(
                    'DersID' => $dersIDList[$i],
                    'DersAdi' => $dersler[$i]
                );
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e1fdcb0310.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Paketlerim</title>

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
    <section>
        <?php
        // Kullanıcının sahip olduğu her paket için ayrı bir div oluştur
        foreach ($userPackages as $ders) {
            // Örnek bir $package değişkeni oluştur
            $package = $ders['DersID']; // Burada kendi mantığınıza göre bir değer atayabilirsiniz

            // Her bir ders için bağlantı oluştur
            echo '<a target="_blank" href="uploading.php?id=' . $ders['DersID'] . '" onclick="updateIframeSrc(' . $ders['DersID'] . ')">';
            echo '<div class="news">';
            echo '<div class="img"><img src="img/' . $ders['DersAdi'] . '.png"></div>';
            echo '<p>' . $ders['DersAdi'] . '</p>
            </div>
        </a>';
        }
        ?>

        <script>
            var selectedDersID; // Seçilen dersin ID'sini tutacak değişken

            function updateIframeSrc(dersID) {
                // tıklanan dersin ID'sini değişkene ata
                selectedDersID = dersID;

                // iframe'in src alanını güncelle
                var iframe = document.getElementById('notlarIframe');
                iframe.src = 'notlar.php?id=' + selectedDersID;
            }
        </script>

    </section>



    <script>
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

</html>