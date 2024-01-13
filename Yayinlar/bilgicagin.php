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
        <img src="../img/fantasy-1077863_1280.jpg" alt="">
        <h3>Geleceği Bilgiyle Şekillendir!</h3>
    </div>



    <!--SECTION -->
    <section>
        <a href="#" onclick="showDetails('Matematik',event)">
            <div class="news">
                <div class="img"><img src="../img/Matematik.png" alt=""></div>
                <p>TYT Matematik</p>
            </div>
        </a>

        <a href="#" onclick="showDetails('Fizik',event)">
            <div class="news">
                <div class="img"><img src="../img/Fizik.png" alt=""></div>
                <p>AYT Fizik</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Biyoloji',event)">
            <div class=" news">
                <div class="img"><img src="../img/Biyoloji.png" alt=""></div>
                <p>AYT Biyoloji</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Kimya',event)">
            <div class=" news">
                <div class="img"><img src="../img/Kimya.png" alt=""></div>
                <p>AYT Kimya</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Geometri',event)">
            <div class="news">
                <div class="img"><img src="../img/Geometri.png" alt=""></div>
                <p>TYT Geometri</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Türkçe',event)">
            <div class="news">
                <div class="img"><img src="../img/Türkçe.png" alt=""></div>
                <p>TYT Türkçe</p>
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
                    <h3 class="h3">Bilgi Çağın Yayınları TYT ${course} Ders Notları</h3>
                    <main>
        <h2>Bölüm 1: Temel Matematik</h2>
        <ul>
            <li>Toplama ve Çıkarma</li>
            <li>Çarpma ve Bölme</li>
            <li>Üslü ve Köklü Sayılar</li>
        </ul>

        <h2>Bölüm 2: Cebir</h2>
        <ul>
            <li>Denklemler ve Problemler</li>
            <li>Fonksiyonlar</li>
            <li>Oran ve Orantı</li>
        </ul>

        <h2>Bölüm 3: Geometri</h2>
        <ul>
            <li>Temel Geometrik Kavramlar</li>
            <li>Üçgenler ve Dörtgenler</li>
            <li>Dik Üçgenler ve Trigonometri</li>
        </ul>

        <h2>Bölüm 4: Analitik Geometri</h2>
        <ul>
            <li>Doğrunun Analitik İncelenmesi</li>
            <li>Parabol ve Daire</li>
        </ul>

        <h2>Bölüm 5: Mantık ve İstatistik</h2>
        <ul>
            <li>Mantık Problemleri</li>
            <li>Veri Analizi ve İstatistik</li>
        </ul>

        <h2>Bölüm 6: Karmaşıklık ve Zor Problemler</h2>
        <ul>
            <li>Zorluk Seviyesi Yüksek Problemler</li>
            <li>Çözümler ve İpuçları</li>
        </ul>

        <h2>Bölüm 7: Ek Test Soruları ve Çözümleri</h2>
        <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

        <h2>Bölüm 8: Sonuç ve İleri Seviye Çalışmalar</h2>
        <p>Matematikte ilerlemek için öneriler ve kaynaklar.</p>
    </main>
    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Bilgi Çağın Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="20">
                        <input type="hidden" name="product_ID" value="19">
                    <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'Fizik':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Bilgi Çağın Yayınları AYT  ${course} Ders Notları</h3>
                    <main>
        <h2>Bölüm 1: Temel Fizik Konuları</h2>
        <ul>
            <li>Kinematik ve Dinamik</li>
            <li>Işık ve Ses</li>
            <li>Mekanik</li>
        </ul>

        <h2>Bölüm 2: Termodinamik</h2>
        <ul>
            <li>Isı ve Sıcaklık</li>
            <li>Termodinamik İlkeleri</li>
        </ul>

        <h2>Bölüm 3: Elektrik ve Manyetizma</h2>
        <ul>
            <li>Elektrik Akımı</li>
            <li>Manyetizma ve Elektromanyetizma</li>
            <li>Elektrik Devreleri</li>
        </ul>

        <h2>Bölüm 4: Optik ve Modern Fizik</h2>
        <ul>
            <li>Geometrik ve Fiziksel Optik</li>
            <li>Modern Fizik Konuları</li>
        </ul>

        <h2>Bölüm 5: Deneme Soruları ve Çözümleri</h2>
        <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

        <h2>Bölüm 6: Sonuç ve İleri Seviye Çalışmalar</h2>
        <p>Fizikte ilerlemek için öneriler ve kaynaklar.</p>
    </main>
    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Bilgi Çağın Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="30">
                        <input type="hidden" name="product_ID" value="20">

                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'Biyoloji':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Bilgi Çağın Yayınları AYT ${course} Ders Notları</h3>
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
                        <input type="hidden" name="product_name" value="Bilgi Çağın Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="28">
                        <input type="hidden" name="product_ID" value="21">
                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'Kimya':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Bilgi Çağın Yayınları AYT ${course} Ders Notları</h3>
                    <main>

        <h2>Bölüm 1: Temel Kimya Kavramları</h2>
        <ul>
            <li>Maddenin Tanecikli Yapısı</li>
            <li>Elementler ve Periyodik Cetvel</li>
            <li>Kimyasal Bağlar</li>
        </ul>

        <h2>Bölüm 2: Kimyasal Reaksiyonlar</h2>
        <ul>
            <li>Kimyasal Denklemler</li>
            <li>Tepkimelerde Hız</li>
            <li>Kimyasal Tepkimelerde Enerji Değişimi</li>
        </ul>

        <h2>Bölüm 3: Asitler ve Bazlar</h2>
        <ul>
            <li>Asitler ve Bazlar Tanımı</li>
            <li>PH Skalası</li>
            <li>Nötralizasyon Reaksiyonları</li>
        </ul>

        <h2>Bölüm 4: Gazlar</h2>
        <ul>
            <li>İdeal Gaz Kanunu</li>
            <li>Gazların Karışımı ve Çözünürlük</li>
        </ul>

        <h2>Bölüm 5: Elektrokimya</h2>
        <ul>
            <li>Redoks Tepkimeleri</li>
            <li>Piller ve Elektroliz</li>
        </ul>

        <h2>Bölüm 6: Kimya Pratiği ve Laboratuvar Çalışmaları</h2>
        <p>Laboratuvar deneyleri ve uygulamalı kimya çalışmaları.</p>

        <h2>Bölüm 7: Ek Test Soruları ve Çözümleri</h2>
        <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

        <h2>Bölüm 8: Sonuç ve İleri Seviye Çalışmalar</h2>
        <p>Kimyada ilerlemek için öneriler ve kaynaklar.</p>
    </main>
    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Bilgi Çağın Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="36">
                        <input type="hidden" name="product_ID" value="22">
                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>

                `;

                    break;
                case 'Geometri':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Bilgi Çağın Yayınları AYT ${course} Ders Notları</h3>
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
                        <input type="hidden" name="product_name" value="Bilgi Çağın Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="41">
                        <input type="hidden" name="product_ID" value="23">
                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>

                `;


                    break;
                case 'Türkçe':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Bilgi Çağın Yayınları TYT ${course} Ders Notları</h3>
                    <main>
        <h2>Bölüm 1: Dilbilgisi</h2>
        <ul>
            <li>Cümle Çeşitleri</li>
            <li>İsim, Sıfat, Fiil</li>
            <li>Zamirler ve Edatlar</li>
        </ul>

        <h2>Bölüm 2: Anlatım Bozuklukları</h2>
        <ul>
            <li>Cümlenin Anlamı ve Yapısı</li>
            <li>Anlatım Bozukluğu Türleri</li>
        </ul>

        <h2>Bölüm 3: Paragraf Yapısı</h2>
        <ul>
            <li>Paragraf ve Paragraf Çeşitleri</li>
            <li>Anlatım Sırası ve Bağlaçlar</li>
        </ul>

        <h2>Bölüm 4: Anlam Bilgisi</h2>
        <ul>
            <li>Kelimenin Anlamı</li>
            <li>Cümlede Anlam</li>
            <li>Paragrafta Anlam</li>
        </ul>

        <h2>Bölüm 5: Yazım Kuralları</h2>
        <ul>
            <li>Ünlü ve Ünsüz Harf Uyumu</li>
            <li>Yazım Kurallarına Uygun Yazılmış Metinler</li>
        </ul>

        <h2>Bölüm 6: Noktalama İşaretleri</h2>
        <ul>
            <li>Nokta, Virgül, Noktalı Virgül</li>
            <li>Ünlem ve Soru İşareti</li>
        </ul>

        <h2>Bölüm 7: Edebiyat Bilgisi</h2>
        <ul>
            <li>Edebiyat Terimleri</li>
            <li>Edebiyat Akımları ve Temsilcileri</li>
        </ul>

        <h2>Bölüm 8: Eser Analizi</h2>
        <ul>
            <li>Şiir ve Hikaye Analizi</li>
            <li>Önemli Edebiyat Eserleri</li>
        </ul>

        <h2>Bölüm 9: Ek Test Soruları ve Çözümleri</h2>
        <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

        <h2>Bölüm 10: Sonuç ve İleri Seviye Çalışmalar</h2>
        <p>Türkçe'de ilerlemek için öneriler ve kaynaklar.</p>
    </main>
    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Bilgi Çağın Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value=" 19.90">
                        <input type="hidden" name="product_ID" value="24">
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