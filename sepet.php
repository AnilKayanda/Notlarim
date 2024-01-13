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
// Sepeti temizleme işlemi
if (isset($_GET['action']) && $_GET['action'] == 'clear') {
    unset($_SESSION['cart']);
}

// Sepete ürün eklemek
if (isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_ID'])) {
    $product = array(
        'name' => $_POST['product_name'],
        'price' => $_POST['product_price'],
        'ID' => $_POST['product_ID']
    );


    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $_SESSION['cart'][] = $product;

    // Son eklenen ürünün ID'sini al
    $dersID = $product['ID'];
    // $_SESSION['lastAddedProductID'] değişkenine atama yap
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_product'])) {
    $productKey = $_POST['remove_product'];
    unset($_SESSION['cart'][$productKey]);
    header('Location: sepet.php');
    exit;
}


// Örnek olarak ekrana yazdırma
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e1fdcb0310.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" sizes="16x16" href="img/Siyah Minimalist Metin Logo.png">
    <link rel="stylesheet" href="css/sepet.css">
</head>

<body>

    <header>
        <img id="logo" src="img/Logo.png">
        <nav>
            <ul class=" nav_links">
                <li><a href="home2.php">Anasayfa</a></li>
                <li><a href="yayinlar.php">Yayınlar</a></li>
                <li><a href="paketlerim.php">Paketlerim</a></li>
            </ul>
        </nav>
        <a class="cta" href="contact.html"><button>Bize Ulaş</button></a>
        <a id="logout" href="index.html"><button onclick="logout()">Çıkış Yap</button></a>
        <a id="settings" href="settings.php"><i class="fa-solid fa-gear fa-spin"></i></a>
    </header>





    <!-- SEPET -->
    <section>
        <div id="clean">
            <h2>Sepet</h2>
            <a href="sepet.php?action=clear">Sepeti Temizle</a>

        </div>
        <?php
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $product) {
                echo '<div class="product">';
                echo '<div class="product-info">';
                echo "<span>{$product['name']}</span>";
                echo '</div>';

                echo "<span class='fiyat'>{$product['price']} TL</span>";
                echo '<form method="post" action="">';
                echo '<input type="hidden" name="remove_product" value="' .   $key . '">';
                echo '<button id="btn" type="submit">Sil</button>';
                echo '</form>';
                echo '</div>';
            }
        } else {
            echo "<p>Sepetinizde ürün bulunmamaktadır.</p>";
        }
        ?>
        <a href="yayinlar.php"> <button id="rtn"><i class="fa-solid fa-shop"></i> Alışverişe Devam</button></a>
        <button class="button">Sepeti Onayla</button>

    </section>


    <!-- CARD -->

    <div class="container">


        <div class="card">
            <form action="sepet.php" method="POST" autocomplete="off">
                <div class="inputbox">
                    <i class="fa-solid fa-user"></i>
                    <label>Ad Soyad</label>
                    <input class="input" type="text" required>
                    <i class="fa-solid fa-credit-card"></i> <label>Kart Numarası</label>

                    <input class="input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
            let val = this.value;
            val = val.replace(/\s/g, ''); 
            val = val.replace(/\D/g, ''); 
            val = val.replace(/(\d{4})/g, '$1 '); 
            this.value = val;" maxlength="19" minlength="19" required type="text" id="idCardNumber">

                    <i class="fa-solid fa-calendar-days"></i><label>Son Kullanma Tarihi</label>
                    <i class="fa-solid fa-key" style="margin-left: 30px;"></i>
                    <label style="margin-left: 5px;">CVV</label>

                    <div class="cvv">
                        <input class="input" style="width: 20%;" id="e-date" maxlength="5" minlength="5" required type=" number">

                        <input class="input" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" minlength="3" required style="width: 20%;" type="number" id="cvv">
                    </div>
                    <input id="checkbox" type="checkbox" required>
                    <label id="p">Satın alma sözleşmesini okudum ve Onaylıyorum.Sözleşme detayı..</label>
                    <button name="card-btn" id="card-btn">Ödemeyi Tamamla</button>
                </div>
            </form>

        </div>
        <div class="cards">
            <i class="fa-brands fa-cc-visa"></i>
            <i class="fa-brands fa-cc-mastercard"></i>
            <i class="fa-brands fa-cc-amex"></i>
            <i class="fa-brands fa-cc-paypal"></i>
            <i class="fa-brands fa-cc-apple-pay"></i>
        </div>
    </div>

    <?php

    // Son eklenen ürünün ID'sini al
    $dersID = $product['ID'];
    $ID = $_SESSION['ID'];
    require_once('php/connection.php');
    // SQL sorgusu
    if (isset($_POST['card-btn'])) {
        $sql = "INSERT INTO satinalinanlar (ID, Yayinlar) VALUES ('$ID',' ,$dersID') ON DUPLICATE KEY UPDATE Yayinlar = concat(Yayinlar,',','$dersID')";

        // Sorguyu çalıştırma
        if ($conn->query($sql) === TRUE) {
            header("Location: /projects/ecommerce/paketlerim.php");
        } else {
            echo "Veri eklenirken veya güncellenirken hata oluştu: " . $conn->error;
        }
    }

    // Veritabanı bağlantısını kapatma
    $conn->close();
    ?>






    <!-- FOOTER -->
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

        document.addEventListener("DOMContentLoaded", function() {
            // Button elemanını al
            var scrollButton = document.querySelector(".button");

            // Hedef bölgenin elemanını al
            var targetSection = document.querySelector(".container");

            // Button tıklandığında scroll işlemi başlatılır
            scrollButton.addEventListener("click", function() {
                // Hedef bölgenin konumunu al
                var targetPosition = targetSection.offsetTop;

                // Yavaşça kaydırma animasyonu
                window.scrollTo({
                    top: targetPosition,
                    behavior: "smooth" // Kaydırma işlemini yavaşça yap
                });
            });
        });


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