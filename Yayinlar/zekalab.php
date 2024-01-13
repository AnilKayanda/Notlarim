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
        <img src="../img/zekaYayinevleri.jpg" alt="">
        <h3>Sorularla Yolculuğa Çık, Başarı Labirentini Geç</h3>
    </div>



    <!--SECTION -->
    <section>
        <a href="#" onclick="showDetails('Tarih',event)">
            <div class="news">
                <div class="img"><img src="../img/Tarih.png" alt=""></div>
                <p>Tarih</p>
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
        <a href="#" onclick="showDetails('İngilizce',event)">
            <div class="news">
                <div class="img"><img src="../img/İngilizce.png" alt=""></div>
                <p>İngilizce</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Coğrafya',event)">
            <div class="news">
                <div class="img"><img src="../img/Coğrafya.png" alt=""></div>
                <p>Coğrafya</p>
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
                case 'Tarih':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Zeka Labirenti Yayınları AYT ${course} Ders Notları</h3>
                    <main>
    <h2>Bölüm 1: İlk Uygarlıklar ve Antik Dönem</h2>
    <ul>
        <li>Mezopotamya ve Sümerler</li>
        <li>Mısır Uygarlığı</li>
        <li>Antik Yunan ve Roma</li>
    </ul>

    <h2>Bölüm 2: Orta Çağ ve Feodalizm</h2>
    <ul>
        <li>Orta Çağ Avrupa'sı</li>
        <li>Feodalizm ve Toplumsal Yapı</li>
        <li>Haçlı Seferleri</li>
    </ul>

    <h2>Bölüm 3: Yeni Çağ ve Rönesans</h2>
    <ul>
        <li>Rönesans ve İnsanizm</li>
        <li>Keşifler Çağı</li>
        <li>Reform ve Karşı Reform</li>
    </ul>

    <h2>Bölüm 4: Sanayi Devrimi ve Modern Dönem</h2>
    <ul>
        <li>Sanayi Devrimi ve Etkileri</li>
        <li>Ulusal Hareketler ve Bağımsızlık Savaşları</li>
        <li>19. ve 20. Yüzyıl Siyasi Olayları</li>
    </ul>

    <h2>Bölüm 5: İkinci Dünya Savaşı ve Soğuk Savaş</h2>
    <ul>
        <li>İkinci Dünya Savaşı'nın Nedenleri ve Sonuçları</li>
        <li>Soğuk Savaş Dönemi</li>
        <li>Yakın Tarih ve Küreselleşme</li>
    </ul>

    <h2>Bölüm 6: Deneme Soruları ve Çözümleri</h2>
    <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

    <h2>Bölüm 7: Sonuç ve İleri Seviye Çalışmalar</h2>
    <p>Tarihte derinleşmek ve ilerlemek için öneriler ve kaynaklar.</p>
</main>

    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Zeka Labirenti Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="20">
                        <input type="hidden" name="product_ID" value="1">
                    <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'Fizik':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Zeka Labirenti Yayınları AYT  ${course} Ders Notları</h3>
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
                        <input type="hidden" name="product_name" value="Zeka Labirenti Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="30">
                        <input type="hidden" name="product_ID" value="2">

                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'Biyoloji':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Zeka Labirenti Yayınları AYT ${course} Ders Notları</h3>
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
                        <input type="hidden" name="product_name" value="Zeka Labirenti Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="20">
                        <input type="hidden" name="product_ID" value="3">
                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'Kimya':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Zeka Labirenti Yayınları AYT ${course} Ders Notları</h3>
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
                        <input type="hidden" name="product_name" value="Zeka Labirenti Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="50">
                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>

                `;

                    break;
                case 'İngilizce':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Zeka Labirenti Yayınları AYT ${course} Ders Notları</h3>
                    <main>
    <h2>Module 1: Basics of English</h2>
    <ul>
        <li>Alphabet and Pronunciation</li>
        <li>Common Phrases and Expressions</li>
        <li>Grammar Fundamentals</li>
    </ul>

    <h2>Module 2: Vocabulary Building</h2>
    <ul>
        <li>Everyday Words and Usage</li>
        <li>Synonyms and Antonyms</li>
        <li>Idioms and Proverbs</li>
    </ul>

    <h2>Module 3: Reading and Comprehension</h2>
    <ul>
        <li>Reading Strategies</li>
        <li>Understanding Fiction and Non-Fiction</li>
        <li>Analysis of Literary Texts</li>
    </ul>

    <h2>Module 4: Writing Skills</h2>
    <ul>
        <li>Basic Writing Techniques</li>
        <li>Essay Writing and Composition</li>
        <li>Creative Writing</li>
    </ul>

    <h2>Module 5: Speaking and Listening</h2>
    <ul>
        <li>Effective Communication Skills</li>
        <li>Listening Comprehension</li>
        <li>Public Speaking</li>
    </ul>

    <h2>Module 6: Test Questions and Solutions</h2>
    <p>At the end of each module, various difficulty levels of test questions and detailed solutions to reinforce the learned concepts.</p>

    <h2>Module 7: Conclusion and Advanced Studies</h2>
    <p>Recommendations and resources for advancing your English language skills.</p>
</main>


    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Zeka Labirenti Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="45">
                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>

                `;


                    break;
                case 'Coğrafya':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Zeka Labirenti Yayınları TYT ${course} Ders Notları</h3>
                    <main>
    <h2>Modül 1: Fiziksel Coğrafya</h2>
    <ul>
        <li>Fiziksel Coğrafya Girişi</li>
        <li>Yeryüzü Şekilleri ve Topografya</li>
        <li>İklim Bilimi ve Hava Durumu</li>
    </ul>

    <h2>Modül 2: Beşeri Coğrafya</h2>
    <ul>
        <li>Nüfus Coğrafyası</li>
        <li>Kentleşme ve Şehir Planlama</li>
        <li>Kültürel ve Ekonomik Coğrafya</li>
    </ul>

    <h2>Modül 3: Jeopolitika ve Küresel Konular</h2>
    <ul>
        <li>Jeopolitik Teoriler</li>
        <li>Çevresel Konular</li>
        <li>Küreselleşme ve Etkileri</li>
    </ul>

    <h2>Modül 4: Bölgesel Coğrafya</h2>
    <ul>
        <li>Kıtalar Coğrafyası</li>
        <li>Bölgesel Kalkınma ve Eşitsizlikler</li>
    </ul>

    <h2>Modül 5: Haritacılık ve CBS</h2>
    <ul>
        <li>Haritacılığa Giriş</li>
        <li>Coğrafi Bilgi Sistemleri (CBS)</li>
    </ul>

    <h2>Modül 6: Deneme Soruları ve Çözümleri</h2>
    <p>Öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

    <h2>Modül 7: Sonuç ve İleri Seviye Çalışmalar</h2>
    <p>Coğrafyada derinleşmek ve ilerlemek için öneriler ve kaynaklar.</p>
</main>
    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Zeka Labirenti Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="40">
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