<?php
session_start();

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
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e1fdcb0310.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/345.css">
    <title>Satın Al</title>

</head>

<body>
    <header>
        <img id="logo" src="../img/Logo.png">
        <nav>
            <ul class=" nav_links">
                <li><a href="../home.html">Anasayfa</a></li>
                <li><a href="../yayinlar.php">Yayınlar</a></li>
                <li><a href="../login.html">Paketlerim</a></li>
                <li><a href="../sepet.php">Sepete Git <i class="fa-solid 
                fa-shop"></i></a></li>
                <?php
                if (!isset($_SESSION['Eposta'])) {
                    echo "<li><a href='../login.html'>Giriş Yap</a></li>";
                    echo "<li><a href='../signup.html'>Kayıt Ol</a></li>";
                }
                ?>
            </ul>
        </nav>

        <a class="cta" href="contact.html"><button>Bize Ulaş</button>
        </a>
        <?php
        if (isset($_SESSION['Eposta'])) {
            echo '<a id="logout" href="../home.html"><button onclick="logout()">Çıkış Yap</button></a>';
        }
        ?>
        <a id="settings" href="settings.html"><i class="fa-solid fa-gear fa-spin"></i></a>
    </header>



    <div class="container_0">
        <img src="../img/bilgifeneri.png" alt="">
        <h3>Işığımızla Bilgiye Yolculuk!</h3>
    </div>



    <!--SECTION -->
    <section>
        <a href="#" onclick="showDetails('Matematik',event)">
            <div class="news">
                <div class="img"><img src="../img/Matematik.png" alt=""></div>
                <p>TYT Matematik</p>
            </div>
        </a>

        <a href="#" onclick="showDetails('Coğrafya',event)">
            <div class="news">
                <div class="img"><img src="../img/Coğrafya.png" alt=""></div>
                <p>Coğrafya</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Biyoloji',event)">
            <div class=" news">
                <div class="img"><img src="../img/Biyoloji.png" alt=""></div>
                <p>AYT Biyoloji</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Felsefe',event)">
            <div class=" news">
                <div class="img"><img src="../img/Felsefe.png" alt=""></div>
                <p>Felsefe</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Geometri',event)">
            <div class="news">
                <div class="img"><img src="../img/Geometri.png" alt=""></div>
                <p>TYT Geometri</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Kimya',event)">
            <div class="news">
                <div class="img"><img src="../img/Kimya.png" alt=""></div>
                <p>TYT Kimya</p>
            </div>
        </a>
    </section>
    <div id="courseDetailsContainer" class="course-details-container">
    </div>

    <div id="notification" class="notification"></div>

    <script src="../card.js"></script>

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
                <h3 class="h3"></h3>
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

        function showDetails(course, event) {
            // Tıklama olayının ardından sayfanın başına gitme davranışını engelle
            event.preventDefault();

            // Yeni bir div öğesi oluştur
            var detailsContainer = document.createElement('div');
            detailsContainer.classList.add('course-details');

            // Dersle ilgili bilgileri içeren içerik
            var content = document.createElement('div');

            switch (course) {
                case 'Matematik':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Bilgi Feneri Yayınları AYT ${course} Ders Notları</h3>
                    <main>
                    <main>
    <h2>Bölüm 1: Fonksiyonlar ve Limit</h2>
    <ul>
        <li>Fonksiyon Kavramı</li>
        <li>Limit ve Süreklilik</li>
        <li>Türev ve İntegral</li>
    </ul>

    <h2>Bölüm 2: Matrisler ve Determinantlar</h2>
    <ul>
        <li>Matrisler</li>
        <li>Determinantlar</li>
        <li>Lineer Denklem Sistemleri</li>
    </ul>

    <h2>Bölüm 3: Diferansiyel Denklemler</h2>
    <ul>
        <li>Basit Diferansiyel Denklemler</li>
        <li>Tam Diferansiyel Denklemler</li>
        <li>Homojen Olmayan Diferansiyel Denklemler</li>
    </ul>

    <h2>Bölüm 4: Trigonometrik Fonksiyonlar ve Seriler</h2>
    <ul>
        <li>Trigonometrik Fonksiyonlar</li>
        <li>Fourier Serileri</li>
    </ul>

    <h2>Bölüm 5: İleri Analiz Konuları</h2>
    <ul>
        <li>Çoklu İntegraller</li>
        <li>Düzlemsel ve Uzaysal Vektör Analizi</li>
    </ul>

    <h2>Bölüm 6: Olasılık ve İstatistik</h2>
    <ul>
        <li>İleri Olasılık Konuları</li>
        <li>Çok Değişkenli İstatistik</li>
    </ul>

    <h2>Bölüm 7: Deneme Soruları ve Çözümleri</h2>
    <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

    <h2>Bölüm 8: Sonuç ve İleri Seviye Çalışmalar</h2>
    <p>Matematikte derinleşmek ve ilerlemek için öneriler ve kaynaklar.</p>
</main>

    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Bilgi Feneri Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="20">
                        <input type="hidden" name="product_ID" value="7">
                    <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'Coğrafya':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Bilgi Feneri Yayınları   ${course} Ders Notları</h3>
                    <main>
    <h2>Bölüm 1: Temel Coğrafya Konuları</h2>
    <ul>
        <li>Jeopolitik ve Bölgesel Coğrafya</li>
        <li>Fiziki Coğrafya</li>
        <li>Beşeri Coğrafya</li>
    </ul>

    <h2>Bölüm 2: Harita Okuma ve Yorumlama</h2>
    <ul>
        <li>Harita Tipleri ve Kullanımı</li>
        <li>Koordinat Sistemleri</li>
        <li>Topoğrafik Harita Okuma</li>
    </ul>

    <h2>Bölüm 3: Nüfus ve Yerleşim Coğrafyası</h2>
    <ul>
        <li>Nüfus Dinamikleri</li>
        <li>Kentleşme ve Yerleşim Planlaması</li>
    </ul>

    <h2>Bölüm 4: Doğal Kaynaklar ve Çevre</h2>
    <ul>
        <li>Toprak, Su ve Hava Kaynakları</li>
        <li>Çevresel Sorunlar ve Sürdürülebilirlik</li>
    </ul>

    <h2>Bölüm 5: Kültürel Coğrafya</h2>
    <ul>
        <li>Kültürel Çeşitlilik ve Etkileşim</li>
        <li>Coğrafyada Dil ve Din</li>
    </ul>

    <h2>Bölüm 6: Deneme Soruları ve Çözümleri</h2>
    <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

    <h2>Bölüm 7: Sonuç ve İleri Seviye Çalışmalar</h2>
    <p>Coğrafyada derinleşmek ve ilerlemek için öneriler ve kaynaklar.</p>
</main>

    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Bilgi Feneri Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="30">
                        <input type="hidden" name="product_ID" value="8">

                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'Biyoloji':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Bilgi Feneri Yayınları AYT ${course} Ders Notları</h3>
                    <main>
        <h2>Bölüm 1: Hücre Biyolojisi</h2>
        <ul>
            <li>Hücre Yapısı ve Organeller</li>
            <li>Hücre Bölünmeleri</li>
        </ul>

        <h2>Bölüm 2: Genetik</h2>
        <ul>
            <li>Mitosis ve Meiosis</li>
            <li>Mendel Genetiği</li>
            <li>Genetik Hastalıklar</li>
        </ul>

        <h2>Bölüm 3: Canlıların Sınıflandırılması</h2>
        <ul>
            <li>Bakteriler, Virüsler ve Mantarlar</li>
            <li>Protistler ve Bitkiler</li>
            <li>Hayvanlar</li>
        </ul>

        <h2>Bölüm 4: Ekosistem ve Çevre Bilimi</h2>
        <ul>
            <li>Ekosistem Yapısı ve İşleyişi</li>
            <li>Biyoçeşitlilik ve Koruma</li>
        </ul>

        <h2>Bölüm 5: İnsan Anatomisi ve Fizyolojisi</h2>
        <ul>
            <li>Sindirim ve Solunum Sistemleri</li>
            <li>Dolaşım ve Boşaltım Sistemleri</li>
            <li>Sinir ve Hormon Sistemleri</li>
        </ul>

        <h2>Bölüm 6: Deneme Soruları ve Çözümleri</h2>
        <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

        <h2>Bölüm 7: Sonuç ve İleri Seviye Çalışmalar</h2>
        <p>Biyolojide ilerlemek için öneriler ve kaynaklar.</p>
    </main>
    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Bilgi Feneri Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="20">
                        <input type="hidden" name="product_ID" value="9">
                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'Felsefe':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Bilgi Feneri Yayınları AYT ${course} Ders Notları</h3>
                    <main>
    <h2>Bölüm 1: Antik Felsefe</h2>
    <ul>
        <li>Antik Yunan Felsefesi</li>
        <li>Sokratik Diyaloglar</li>
        <li>Aristoteles'in Etik Felsefesi</li>
    </ul>

    <h2>Bölüm 2: Ortaçağ Felsefesi</h2>
    <ul>
        <li>Augustinus ve Hristiyanlık Felsefesi</li>
        <li>İslam Felsefesi</li>
        <li>Scholastic Felsefe</li>
    </ul>

    <h2>Bölüm 3: Rönesans ve Aydınlanma Dönemi</h2>
    <ul>
        <li>Rönesans Düşüncesi</li>
        <li>Aydınlanma ve İnsan Hakları</li>
    </ul>

    <h2>Bölüm 4: Modern Felsefe Akımları</h2>
    <ul>
        <li>Rasyonalizm ve Empirizm</li>
        <li>Kant'ın Eleştirisi</li>
        <li>Varoluşçuluk ve Fenomenoloji</li>
    </ul>

    <h2>Bölüm 5: Etik ve Ahlak Felsefesi</h2>
    <ul>
        <li>Metaetik ve Ahlaki Gerçekçilik</li>
        <li>Ethics of Care</li>
        <li>Çevre Etikleri</li>
    </ul>

    <h2>Bölüm 6: Politika Felsefesi</h2>
    <ul>
        <li>Siyasal Kuramlar</li>
        <li>Toplumsal Adalet ve Eşitlik</li>
    </ul>

    <h2>Bölüm 7: Deneme Soruları ve Çözümleri</h2>
    <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

    <h2>Bölüm 8: Sonuç ve İleri Seviye Çalışmalar</h2>
    <p>Felsefede derinleşmek ve ilerlemek için öneriler ve kaynaklar.</p>
</main>

    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Bilgi Feneri Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="40">
                        <input type="hidden" name="product_ID" value="10">

                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>

                `;

                    break;
                case 'Geometri':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Bilgi Feneri Yayınları AYT ${course} Ders Notları</h3>
                    <main>

        <h2>Bölüm 1: Temel Geometrik Kavramlar</h2>
        <ul>
            <li>Nokta, Doğru, Düzlem</li>
            <li>Üçgen ve Çeşitleri</li>
            <li>Dörtgen ve Özellikleri</li>
        </ul>

        <h2>Bölüm 2: Açılar</h2>
        <ul>
            <li>Doğru Üzerinde Açılar</li>
            <li>Üçgen İçinde ve Çevresinde Açılar</li>
            <li>Dik ve Geniş Açılar</li>
        </ul>

        <h2>Bölüm 3: Çember ve Daire</h2>
        <ul>
            <li>Çemberin Tanımı ve Elemanları</li>
            <li>Dairenin Alanı ve Çevresi</li>
        </ul>

        <h2>Bölüm 4: Oranlar ve Benzerlik</h2>
        <ul>
            <li>Oran ve Orantı</li>
            <li>Benzer Üçgenler</li>
        </ul>

        <h2>Bölüm 5: Analitik Geometri</h2>
        <ul>
            <li>Koordinat Düzlemi</li>
            <li>Doğrunun Analitik İncelenmesi</li>
        </ul>

        <h2>Bölüm 6: Üçgende Alan Hesapları</h2>
        <ul>
            <li>Heron Formülü</li>
            <li>Trigonometri ve Üçgen Alanı</li>
        </ul>

        <h2>Bölüm 7: Geometrik Cisimler</h2>
        <ul>
            <li>Prizma, Piramit, Silindir, Konik</li>
            <li>Cisimlerin Hacim ve Yüzey Alanları</li>
        </ul>

        <h2>Bölüm 8: Ek Test Soruları ve Çözümleri</h2>
        <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

        <h2>Bölüm 9: Sonuç ve İleri Seviye Çalışmalar</h2>
        <p>Geometride ilerlemek için öneriler ve kaynaklar.</p>
    </main>
    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Bilgi Feneri Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="35">
                        <input type="hidden" name="product_ID" value="11">

                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>

                `;


                    break;
                case 'Kimya':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Bilgi Feneri Yayınları TYT ${course} Ders Notları</h3>
                    <main>
    <h2>Bölüm 1: Temel Kimya Konuları</h2>
    <ul>
        <li>Atom ve Elementler</li>
        <li>Periyodik Tablo</li>
        <li>Kimyasal Bağlar</li>
    </ul>

    <h2>Bölüm 2: Kimyasal Reaksiyonlar</h2>
    <ul>
        <li>Reaksiyon Denklemleri</li>
        <li>İyonlar ve İyonik Tepkimeler</li>
        <li>Asitler ve Bazlar</li>
    </ul>

    <h2>Bölüm 3: Termodinamik</h2>
    <ul>
        <li>Sıcaklık ve Isı</li>
        <li>Termodinamik Yasaları</li>
    </ul>

    <h2>Bölüm 4: Kimyasal Kinetik ve Denge</h2>
    <ul>
        <li>Reaksiyon Hızları</li>
        <li>Kimyasal Denge</li>
    </ul>

    <h2>Bölüm 5: Organik Kimya</h2>
    <ul>
        <li>Karbon Bileşikleri</li>
        <li>Hidrokarbonlar ve Fonksiyonel Gruplar</li>
        <li>Organik Reaksiyonlar</li>
    </ul>

    <h2>Bölüm 6: Analitik Kimya</h2>
    <ul>
        <li>Analitik Teknikler</li>
        <li>Kromatografi ve Spektroskopi</li>
    </ul>

    <h2>Bölüm 7: Deneme Soruları ve Çözümleri</h2>
    <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

    <h2>Bölüm 8: Sonuç ve İleri Seviye Çalışmalar</h2>
    <p>Kimyada derinleşmek ve ilerlemek için öneriler ve kaynaklar.</p>
</main>

    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Bilgi Feneri Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="45">
                        <input type="hidden" name="product_ID" value="12">
                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>

                `;
            }


            // Diğer dersler için aynı şekilde devam edebilirsiniz.

            // Oluşturulan içeriği container'a ekle
            detailsContainer.appendChild(content);

            // Önceki içeriği temizle
            document.getElementById('courseDetailsContainer').innerHTML = '';

            // Container'ı sayfanın belirli bir konumuna sabitle
            document.getElementById('courseDetailsContainer').appendChild(detailsContainer);

            // Container'a smooth kaydırma efekti ekle
            detailsContainer.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        function logout() {
            // Sunucuya logout.php dosyasına istek gönder
            fetch('../php/logout.php')
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