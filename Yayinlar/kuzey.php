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
        <img src="../img/kuzey.png" alt="">
        <h3>Bilgiyle Aydınlan, Geleceğe Yol Al</h3>
    </div>



    <!--SECTION -->
    <section>
        <a href="#" onclick="showDetails('Türkçe',event)">
            <div class="news">
                <div class="img"><img src="../img/Türkçe.png" alt=""></div>
                <p>Türkçe</p>
            </div>
        </a>

        <a href="#" onclick="showDetails('Coğrafya',event)">
            <div class="news">
                <div class="img"><img src="../img/Coğrafya.png" alt=""></div>
                <p>Coğrafya</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Felsefe',event)">
            <div class=" news">
                <div class="img"><img src="../img/Felsefe.png" alt=""></div>
                <p>Felsefe</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('İngilizce',event)">
            <div class=" news">
                <div class="img"><img src="../img/İngilizce.png" alt=""></div>
                <p>İngilizce</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Tarih',event)">
            <div class="news">
                <div class="img"><img src="../img/Tarih.png" alt=""></div>
                <p>Tarih</p>
            </div>
        </a>
        <a href="#" onclick="showDetails('Edebiyat',event)">
            <div class="news">
                <div class="img"><img src="../img/Edebiyat.png" alt=""></div>
                <p>Edebiyat</p>
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
                case 'Türkçe':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Kuzey Yayınları  ${course} Ders Notları</h3>
                    <main>
    <h2>Modül 1: Roman Türü ve Özellikleri</h2>
    <ul>
        <li>Romanın Tanımı</li>
        <li>Romanın Tarihsel Gelişimi</li>
        <li>Romanın Temel Unsurları</li>
    </ul>

    <h2>Modül 2: Şiir Türü ve Biçimleri</h2>
    <ul>
        <li>Şiirin Yapısı ve Özellikleri</li>
        <li>Şiirin Türleri</li>
        <li>Ünlü Türk Şairleri</li>
    </ul>

    <h2>Modül 3: Hikaye Türü ve Anlatım Teknikleri</h2>
    <ul>
        <li>Hikayenin Tanımı</li>
        <li>Hikaye Türleri</li>
        <li>Anlatım Teknikleri</li>
    </ul>

    <h2>Modül 4: Tiyatro Sanatı ve Temel Kavramlar</h2>
    <ul>
        <li>Tiyatro Nedir?</li>
        <li>Tiyatro Türleri</li>
        <li>Temel Dramaturji Kavramları</li>
    </ul>

    <h2>Modül 5: Deneme Yazı Türü ve Örnekleri</h2>
    <ul>
        <li>Deneme Türünün Özellikleri</li>
        <li>Ünlü Türk Deneme Yazarları</li>
    </ul>

    <h2>Modül 6: Dil ve Anlatım</h2>
    <ul>
        <li>Dilin İşlevleri</li>
        <li>Anlatım Biçimleri</li>
    </ul>

    <h2>Modül 7: Deneme Soruları ve Çözümleri</h2>
    <p>Öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

    <h2>Modül 8: Sonuç ve İleri Seviye Çalışmalar</h2>
    <p>Edebiyat alanında derinleşmek ve ilerlemek için öneriler ve kaynaklar.</p>
</main>

    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Kuzey Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="25">
                        <input type="hidden" name="product_ID" value="25">
                    <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'Coğrafya':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Kuzey Yayınları AYT  ${course} Ders Notları</h3>
                    <main>
    <h2>Modül 1: Doğa ve İnsan İlişkisi</h2>
    <ul>
        <li>Coğrafyanın Temel Kavramları</li>
        <li>Toprak Oluşumu ve Özellikleri</li>
        <li>İklim Tipleri ve Dağılımı</li>
    </ul>

    <h2>Modül 2: Nüfus ve Yerleşim Coğrafyası</h2>
    <ul>
        <li>Nüfusun Dağılışı ve Değişimi</li>
        <li>Kentleşme Süreci</li>
        <li>Yerleşim Birimleri ve Planlama</li>
    </ul>

    <h2>Modül 3: Ekonomik Coğrafya</h2>
    <ul>
        <li>Dünya Ekonomik Sistemi</li>
        <li>Sanayi ve Tarım</li>
        <li>Küresel Ticaret ve Piyasalar</li>
    </ul>

    <h2>Modül 4: Politik Coğrafya</h2>
    <ul>
        <li>Ülkeler Arası İlişkiler</li>
        <li>Siyasi Haritaların Analizi</li>
        <li>Uluslararası Örgütler</li>
    </ul>

    <h2>Modül 5: Çevre ve Sürdürülebilirlik</h2>
    <ul>
        <li>Doğal Kaynaklar ve Kullanımı</li>
        <li>Çevresel Sorunlar ve Çözümleri</li>
        <li>Sürdürülebilir Kalkınma</li>
    </ul>

    <h2>Modül 6: Deneme Soruları ve Çözümleri</h2>
    <p>Her modül sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

    <h2>Modül 7: Sonuç ve İleri Seviye Çalışmalar</h2>
    <p>Coğrafya alanında derinleşmek ve ilerlemek için öneriler ve kaynaklar.</p>
</main>
    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Kuzey Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="30">
                        <input type="hidden" name="product_ID" value="26">

                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'Felsefe':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Kuzey Yayınları AYT ${course} Ders Notları</h3>
                    <main>
    <h2>Modül 1: Antik Felsefe</h2>
    <ul>
        <li>Felsefenin Temel Kavramları</li>
        <li>Sokratik Düşünce</li>
        <li>Aristoteles ve Etik</li>
    </ul>

    <h2>Modül 2: Ortaçağ ve Rönesans</h2>
    <ul>
        <li>Ortaçağ Felsefi Akımları</li>
        <li>Rönesans Düşüncesi</li>
    </ul>

    <h2>Modül 3: Modern Felsefe</h2>
    <ul>
        <li>Rasyonalizm ve Empirizm</li>
        <li>Kant'ın Felsefesi</li>
        <li>Varoluşçuluk ve Fenomenoloji</li>
    </ul>

    <h2>Modül 4: Etik ve Politika</h2>
    <ul>
        <li>Ahlaki Teoriler</li>
        <li>Politika Felsefesi</li>
    </ul>

    <h2>Modül 5: Çağdaş Felsefe</h2>
    <ul>
        <li>Analitik ve Kontinental Felsefe</li>
        <li>Çevre Etikleri</li>
    </ul>

    <h2>Modül 6: Deneme Soruları ve Çözümleri</h2>
    <p>Her modül sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

    <h2>Modül 7: Sonuç ve İleri Seviye Çalışmalar</h2>
    <p>Felsefede derinleşmek ve ilerlemek için öneriler, final projesi ve kaynaklar.</p>
</main>
    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Kuzey Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="20">
                        <input type="hidden" name="product_ID" value="27">
                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>
                `;
                    break;
                case 'İngilizce':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Kuzey Yayınları AYT ${course} Ders Notları</h3>
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
                        <input type="hidden" name="product_name" value="Kuzey Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="Ürün Fiyatı">
                        <input type="hidden" name="product_ID" value="28">
                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>

                `;

                    break;
                case 'Tarih':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Kuzey Yayınları  ${course} Ders Notları</h3>
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
                        <input type="hidden" name="product_name" value="Kuzey Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="38">
                        <input type="hidden" name="product_ID" value="29">

                        <button class="button" type="submit">Sepete Ekle</button>
                    </form>

                `;


                    break;
                case 'Edebiyat':
                    content.innerHTML = `
                    <img src="../img/${course}.png" alt="">
                    <h3 class="h3">Kuzey Yayınları  ${course} Ders Notları</h3>
                    <main>
    <h2>Bölüm 1: Edebiyatın Temel Kavramları</h2>
    <ul>
        <li>Edebiyatın Tanımı ve İşlevi</li>
        <li>Sanat ve Estetik</li>
        <li>Edebi Türler ve Anlamları</li>
    </ul>

    <h2>Bölüm 2: Türk Edebiyatı</h2>
    <ul>
        <li>Divan Edebiyatı</li>
        <li>Halk Edebiyatı</li>
        <li>Tanzimat ve Servet-i Fünun Dönemleri</li>
    </ul>

    <h2>Bölüm 3: Dünya Edebiyatı</h2>
    <ul>
        <li>Orta Çağ Edebiyatı</li>
        <li>Rönesans ve Romantizm</li>
        <li>20. Yüzyıl Edebiyatı</li>
    </ul>

    <h2>Bölüm 4: Edebiyat Eleştirisi</h2>
    <ul>
        <li>Eleştiri Türleri</li>
        <li>Eser Analizi</li>
        <li>Yazar ve Eser İlişkisi</li>
    </ul>

    <h2>Bölüm 5: Yaratıcı Yazma</h2>
    <ul>
        <li>Şiir Yazma Teknikleri</li>
        <li>Hikaye ve Roman Yazma</li>
        <li>Edebiyatın Günlük Hayatta Kullanımı</li>
    </ul>

    <h2>Bölüm 6: Deneme Soruları ve Çözümleri</h2>
    <p>Her bölüm sonunda, öğrenilen konuları pekiştirmek amacıyla çeşitli zorluk seviyelerinde test soruları ve detaylı çözümleri.</p>

    <h2>Bölüm 7: Sonuç ve İleri Seviye Çalışmalar</h2>
    <p>Edebiyatta derinleşmek ve ilerlemek için öneriler ve kaynaklar.</p>
</main>
    <form action="../sepet.php" method="post">
                        <input type="hidden" name="product_name" value="Kuzey Yayınları ${course} Ders Notları">
                        <input type="hidden" name="product_price" value="47">
                        <input type="hidden" name="product_ID" value="30">
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