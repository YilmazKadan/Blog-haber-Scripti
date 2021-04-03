-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 21 Şub 2021, 19:12:43
-- Sunucu sürümü: 5.7.21
-- PHP Sürümü: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `blog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

DROP TABLE IF EXISTS `ayar`;
CREATE TABLE IF NOT EXISTS `ayar` (
  `ayar_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_tittle` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_aciklama` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_yazar` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_keyword` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_logo` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_tel1` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_tel2` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_eposta` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_facebook` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_youtube` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_twitter` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `site_instagram` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`ayar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `site_tittle`, `site_url`, `site_aciklama`, `site_yazar`, `site_keyword`, `site_logo`, `site_tel1`, `site_tel2`, `site_eposta`, `site_adres`, `site_facebook`, `site_youtube`, `site_twitter`, `site_instagram`) VALUES
(1, 'Kadan yazılım', 'http://localhost/Blog/', 'Yılmaz kadan resmi web sitesidir', 'Kadan yazılım2', 'blog,yazilim,gündem,c#3', 'gorsel/317733067020542294511581488_e3e1_2.jpg', '0543 256 9707', '0535 879 35 79', 'kadan8080@gmail.com', 'Eskişehir Osmangazi Üniversitesi Sivrihisar MYO bölümü\r\nöğrencisiyim.', 'http://clipart-library.com/images/5TRrpRAGc.png', 'index.php', 'www.twitter.com', 'www.instagram.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

DROP TABLE IF EXISTS `hakkimizda`;
CREATE TABLE IF NOT EXISTS `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL AUTO_INCREMENT,
  `hakkimizda_baslik` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `hakkimizda_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`hakkimizda_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`) VALUES
(1, '', '<h1 style=\"text-align:center\">Biz değil ben kimim?<img alt=\"angry\" src=\"http://localhost/Blog/Admin/vendors/ckeditor/plugins/smiley/images/angry_smile.png\" style=\"height:23px; width:23px\" title=\"angry\" /></h1>\r\n\r\n<hr />\r\n<p><span style=\"font-size:16px\"><span style=\"font-family:Georgia,serif\">&Ouml;ncelikle kişisel paylaşım ve blog siteme hoşgeldiniz .Ben Yılmaz Kadan 1999 Esenyurt/İstanbul doğumluyum .İlk ve ortaokul eğitimimi Esenyurt &Ouml;rnek İlk &Ouml;ğretim okulunda tamamladım .Lise eğitimimi ise Kıra&ccedil; İMKB End&uuml;stri ve Teknin Anadolu Meslek lisesinde ,Bilişim Teknolojileri Alanı Veri Tabanı Programcılığı dalında tamamladım.Şu anda ise Eskişehir Osmangazi &Uuml;niversitesi Bilgisayar Programcılığı 1.Sınıf &ouml;ğrencisiyim kendimi geliştirmek,&ccedil;&ouml;z&uuml;m bulduğum hataları sizlerle paylaşmak ama&ccedil;lı bu siteyi a&ccedil;tım</span></span></p>\r\n\r\n<pre>\r\n<code class=\"language-php\">&lt;?php\r\n\r\necho \'Merhaba dünya\';\r\n?&gt;</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_ad` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_sira` int(99) NOT NULL,
  `kategori_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `kategori_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`, `kategori_sira`, `kategori_durum`, `kategori_seourl`) VALUES
(1, 'Gündems', 4, '1', 'gundems'),
(2, 'C#', 2, '0', 'c'),
(5, 'PHP', 1, '0', 'php'),
(14, 'SPOR', 0, '0', 'spor'),
(8, 'Her Telden', 45, '0', 'her-telden'),
(9, 'Ahlak', 99, '0', 'ahlak'),
(13, 'Python', 4, '0', 'python');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

DROP TABLE IF EXISTS `kullanici`;
CREATE TABLE IF NOT EXISTS `kullanici` (
  `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_ad` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_soyad` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_sifre` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_mail` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_rütbe` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kullanici_unvan` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_ad`, `kullanici_soyad`, `kullanici_sifre`, `kullanici_mail`, `kullanici_rütbe`, `kullanici_unvan`) VALUES
(1, 'Yılmaz', 'Kadan', '123456', 'kadan8080@gmail.com', '2', 'Admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `makale`
--

DROP TABLE IF EXISTS `makale`;
CREATE TABLE IF NOT EXISTS `makale` (
  `makale_id` int(11) NOT NULL AUTO_INCREMENT,
  `makale_baslik` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `makale_icerik` text COLLATE utf8_turkish_ci,
  `makale_keyword` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `makale_tarih` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `makale_okunma` int(99) DEFAULT '0',
  `makale_kategoriid` int(11) DEFAULT NULL,
  `makale_yazarid` int(11) DEFAULT '0',
  `makale_resim` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `makale_seourl` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  `makale_durum` enum('0','1') COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`makale_id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `makale`
--

INSERT INTO `makale` (`makale_id`, `makale_baslik`, `makale_icerik`, `makale_keyword`, `makale_tarih`, `makale_okunma`, `makale_kategoriid`, `makale_yazarid`, `makale_resim`, `makale_seourl`, `makale_durum`) VALUES
(1, 'C# 40 algoritma örneği', '<p><strong><span style=\"font-size:18px\">&Ouml;ncelikle kişisel paylaşım ve blog siteme hoşgeldiniz .Ben Yılmaz Kadan 1999 Esenyurt/İstanbul doğumluyum .İlk ve ortaokul eğitimimi Esenyurt &Ouml;rnek İlk &Ouml;ğretim okulunda tamamladım .Lise eğitimimi ise Kıra&ccedil; İMKB End&uuml;stri ve Teknin Anadolu Meslek lisesinde ,Bilişim Teknolojileri Alanı Veri Tabanı Programcılığı dalında tamamladım.Şu anda ise Eskişehir Osmangazi &Uuml;niversitesi Bilgisayar Programcılığı 1.Sınıf &ouml;ğrencisiyim kendimi geliştirmek,&ccedil;&ouml;z&uuml;m bulduğum hataları sizlerle paylaşmak ama&ccedil;lı bu siteyi a&ccedil;tım</span></strong></p>\r\n\r\n<p><span style=\"font-size:18px\"><strong>H&uuml;seyin Doğan</strong></span></p>\r\n\r\n<p>posts.php&nbsp;= i&ccedil;erikleri id ye g&ouml;re aldığımız php dosyamız<br />\r\nsef&nbsp;= seo link yapımızın geldiği ara değişken<br />\r\nid&nbsp;= posts.php de veri &ccedil;ektiğimiz id parametresi</p>\r\n\r\n<p>([0-9a-zA-Z-_]+)&nbsp;= seo linkimiz bu kısma yerleşecek a-z arası 0-9 arası ve &ndash; karakterleri (sef)<br />\r\n([0-9]+)&nbsp;= post.php de kullandığımız id değeri buraya gelicek</p>\r\n\r\n<p><strong>[L]</strong><strong>&nbsp;</strong>= url uyuştuğu an keser bunun anlamı şu &ouml;rneğin siteurl.com/merhaba burada merhaba bizim url miz fakat [L] koymaz isek merhabaads gibi bir url yide aynı sayfaya y&ouml;nlendirecek bazen hatalar olabilir o y&uuml;zden [L ] koyuoruz uyuştuğu an kesiyor devam ettirmiyor</p>\r\n\r\n<p><strong>[QSA]</strong><strong>&nbsp;</strong>= Bu GET ile g&ouml;sterilen verilerin aktif olmasını sağlar yani &ouml;rnekte sef=$1&amp;id=$2<br />\r\nBazı configlerde koymaya gerek yokken bazı web server configlerinde koymayı gerektir biz &ouml;ncelik olarak ekleyelim</p>\r\n\r\n<p><strong>Linklerimizi Yeniden Oluşturalım</strong></p>\r\n\r\n<p>&Ouml;rnek olarak anasayfaya bir duyuru listesi &ccedil;ekeceksiniz mysql_query ve fetch kullanarak bir diziye aktardınız<br />\r\nDizi adımız $veri olsun</p>\r\n\r\n<p>&Ouml;rnek link yapımız</p>\r\n', 'c#,algoritma soruları,yazılım,hile', '2019-04-27 23:03:55', 2, 2, 0, 'gorsel/makale/219722463925587289951650610_2673_5.jpg', 'c-40-algoritma-ornegi', '0'),
(5, 'Php son yılların gözde programlama dili ', '<h1>C# nedir? C# ile Neler Yapılabilir?</h1>\r\n\r\n<p><span style=\"font-family:Georgia,serif\"><span style=\"font-size:16px\">Evet herkese merhaba &ccedil;ok bariz olan bir problemimiz var neden biz hi&ccedil;birşeyin farkında değiliz gibi ancak</span></span><br />\r\n<span style=\"font-family:Georgia,serif\"><span style=\"font-size:16px\">yapmamız gereken bir ka&ccedil; konu var işin garibi ise neden herşeyi bilip bilip bilmediğimiz dir&nbsp;<img alt=\"blush\" src=\"http://localhost/Blog/Admin/vendors/ckeditor/plugins/smiley/images/embarrassed_smile.png\" style=\"height:23px; width:23px\" title=\"blush\" /><br />\r\nve serdar yıldıza neler s&ouml;yledğimi sizde anlayacaksınız.<br />\r\n&nbsp; &nbsp;1.<span style=\"color:#1abc9c\">Neden sevmiyoruz</span><br />\r\n&nbsp; &nbsp;2.<span style=\"color:#f1c40f\">Neden g&uuml;lemiyoruz</span><br />\r\n&nbsp; &nbsp;3.biz kimiz<br />\r\nEvet biz işleri b&ouml;ylede &ccedil;&ouml;zeriz</span></span></p>\r\n\r\n<div style=\"background:#eeeeee; border:1px solid #cccccc; padding:5px 10px\"><span style=\"font-family:Georgia,serif\"><span style=\"font-size:16px\">&lt;div class=&quot;col-md-4&quot;&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;post post-sm&quot;&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;a class=&quot;post-img&quot; href=&quot;makale/&lt;?php echo seo($makalecek[&#39;makale_baslik&#39;]).&#39;/&#39;.$makalecek[&#39;makale_id&#39;];?&gt;&quot;&gt;&lt;img class=&quot;post-3&quot; src=&quot;&lt;?php &nbsp;echo $makalecek[&#39;makale_resim&#39;]; ?&gt;&quot; alt=&quot;&quot;&gt;&lt;/a&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;post-body&quot;&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;div class=&quot;post-category&quot;&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;a href=&quot;kategori.php&quot;&gt;&lt;?php echo $makalecek[&#39;kategori_ad&#39;]; &nbsp;?&gt;&lt;/a&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;/div&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;h3 class=&quot;post-title title-sm&quot;&gt;&lt;a href=&quot;makale/&lt;?php echo seo($makalecek[&#39;makale_baslik&#39;]).&#39;/&#39;.$makalecek[&#39;makale_id&#39;];?&gt;&quot;&gt;&lt;?php &nbsp;echo $makalecek[&#39;makale_baslik&#39;]; ?&gt;&lt;/a&gt;&lt;/h3&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;ul class=&quot;post-meta&quot;&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;li&gt;&lt;a href=&quot;yazar.php&quot;&gt;John Doe&lt;/a&gt;&lt;/li&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;li&gt;&lt;?php echo $makalecek[&#39;makale_tarih&#39;]; ?&gt;&lt;/li&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;/ul&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;/div&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;/div&gt;<br />\r\n&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&lt;/div&gt;</span></span></div>\r\n\r\n<p>&nbsp;</p>\r\n', 'PHP,gözde,hızlı', '2019-04-28 18:57:20', 8, 5, 0, 'gorsel/makale/24407228592419322343what-is-a-web-developer.jpg', 'php-son-yillarin-gozde-programlama-dili', '0'),
(3, 'Gündem düşmeyen dil c# nedir ne değildir?', '<h1 style=\"text-align:center\"><span style=\"color:#3498db\"><span style=\"font-family:Comic Sans MS,cursive\">C# bu aralar baya revaşta</span></span></h1>\r\n\r\n<p>&Ouml;ncelikle kişisel paylaşım ve blog siteme hoşgeldiniz .Ben Yılmaz Kadan 1999 Esenyurt/İstanbul doğumluyum .İlk ve ortaokul eğitimimi Esenyurt &Ouml;rnek İlk &Ouml;ğretim okulunda tamamladım .Lise eğitimimi ise Kıra&ccedil; İMKB End&uuml;stri ve Teknin Anadolu Meslek lisesinde ,Bilişim Teknolojileri Alanı Veri Tabanı Programcılığı dalında tamamladım.Şu anda ise Eskişehir Osmangazi &Uuml;niversitesi Bilgisayar Programcılığı 1.Sınıf &ouml;ğrencisiyim kendimi geliştirmek,&ccedil;&ouml;z&uuml;m bulduğum hataları sizlerle paylaşmak ama&ccedil;lı bu siteyi a&ccedil;tım</p>\r\n', 'c#,gündem,bilgi,akıcı', '2019-04-28 12:45:08', 1, 2, 0, 'gorsel/makale/263192647624663308471_zVDcaM6mqhi9m0LP_Sq4Ag.jpeg', 'gundem-dusmeyen-dil-c-nedir-ne-degildir', '0'),
(4, 'Aklınızı alacak 10 teknolojik bilgi', '', 'teknoloji,bilgi,akıl,irade', '2019-04-28 18:10:02', 5, 9, 0, 'gorsel/makale/20022243713161828598become-a-developer.jpg', 'aklinizi-alacak-10-teknolojik-bilgi', '0'),
(6, 'Neden böylesine bir yanlışın içine düştüğümüzü bizde bilmiyoruz? Ancak sizinde katılmanızı önereceğimiz 40 bilgi var', '', 'yanlış,bilgi,umut', '2019-04-29 11:51:00', 59, 8, 0, 'gorsel/makale/25285232502857426660software-developer.png', 'neden-boylesine-bir-yanlisin-icine-dustugumuzu-bizde-bilmiyoruz-ancak-sizinde-katilmanizi-onerecegimiz-40-bilgi-var', '0'),
(7, 'Mehmet Emin koç ile 40 adet pyton örnek soru çözümü', '<p>([0-9a-zA-Z-_]+)&nbsp;= seo linkimiz bu kısma yerleşecek a-z arası 0-9 arası ve &ndash; karakterleri (sef)<br />\r\n([0-9]+)&nbsp;= post.php de kullandığımız id değeri buraya gelicek</p>\r\n\r\n<p><strong>[L]</strong><strong>&nbsp;</strong>= url uyuştuğu an keser bunun anlamı şu &ouml;rneğin siteurl.com/merhaba burada merhaba bizim url miz fakat [L] koymaz isek merhabaads gibi bir url yide aynı sayfaya y&ouml;nlendirecek bazen hatalar olabilir o y&uuml;zden [L ] koyuoruz uyuştuğu an kesiyor devam ettirmiyor</p>\r\n\r\n<p><strong>[QSA]</strong><strong>&nbsp;</strong>= Bu GET ile g&ouml;sterilen verilerin aktif olmasını sağlar yani &ouml;rnekte sef=$1&amp;id=$2<br />\r\nBazı configlerde koymaya gerek yokken bazı web server configlerinde koymayı gerektir biz &ouml;ncelik olarak ekleyelim</p>\r\n\r\n<p><strong>Linklerimizi Yeniden Oluşturalım</strong></p>\r\n\r\n<p>&Ouml;rnek olarak anasayfaya bir duyuru listesi &ccedil;ekeceksiniz mysql_query ve fetch kullanarak bir diziye aktardınız<br />\r\nDizi adımız $veri olsun</p>\r\n\r\n<p>&Ouml;rnek link yapımız</p>\r\n\r\n<p><img alt=\"kadanyazilm\" src=\"https://www.dunyaatlasi.com/wp-content/uploads/2018/09/resim-tablo-nasil-okunur.jpg\" style=\"height:400px; width:100%\" /></p>\r\n', 'pyhton,makel,çözüm', '2019-04-29 17:04:38', 8, 13, 0, 'gorsel/makale/25551238103106829915developer-guide-blog-2.png', 'mehmet-emin-koc-ile-40-adet-pyton-ornek-soru-cozumu', '0'),
(8, 'PHP kim tarafından yazılıdı', '', 'boşver', '2019-04-29 17:56:32', 20, 5, 0, 'gorsel/makale/24037295662900528455lisans.png', 'php-kim-tarafindan-yazilidi', '0'),
(9, 'PHP logger kütüphanesi', '<p><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#666666\">Monolog, kayıtlarınızı dosyalara, soketlere, gelen kutularına, veritabanlarına ve &ccedil;eşitli web servislerine g&ouml;nderir.Bu k&uuml;t&uuml;phane Python&rsquo;un Logbook k&uuml;t&uuml;phanesinden b&uuml;y&uuml;k &ouml;l&ccedil;&uuml;de esinlenmiştir.</span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#666666\">Monolog PSR-3 Standartlarına g&ouml;re yazılmış profesy&ouml;nel php log tutma k&uuml;t&uuml;phanesidir.</span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#666666\">&nbsp;Monolog, RFC 5424 tarafından a&ccedil;ıklanan kayıt seviyelerini destekler.</span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#666666\">Monolog 2.x, PHP 7.1 veya &uuml;zeri s&uuml;r&uuml;mlerle &ccedil;alışır.PHP 5.3+ desteği i&ccedil;in Monolog ^ 1.0 kullanın.</span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#666666\">Bir&ccedil;ok Populer frameworklere entegrasyonu vardır.Symfony,Laravel,L&uuml;men ile birlikte geliyor.</span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#666666\">K&uuml;t&uuml;phaneyi yazan şahıs namıdeğer<strong>&nbsp;Jordi Boggiano&nbsp; Yani Packagist&rsquo;in Co Founder&rsquo;ı&nbsp;</strong></span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:15.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#1a1a1a\">GitRepo</span></span></span></strong></span></span></span></p>\r\n\r\n<div style=\"border:solid #ededed 1.0pt; padding:9.0pt 18.0pt 9.0pt 18.0pt\">\r\n<p><span style=\"background-color:#f7f7f7\"><span style=\"font-size:11pt\"><span style=\"background-color:#f7f7f7\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Courier New&quot;\"><span style=\"color:#666666\"><a href=\"https://github.com/Seldaek/monolog\"><span style=\"color:#1a1a1a\">https://github.com/Seldaek/monolog</span></a></span></span></span></span></span></span></span></p>\r\n</div>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:15.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#1a1a1a\">KURULUM</span></span></span></strong></span></span></span></p>\r\n\r\n<div style=\"border:solid #ededed 1.0pt; padding:9.0pt 18.0pt 9.0pt 18.0pt\">\r\n<p><span style=\"background-color:#f7f7f7\"><span style=\"font-size:11pt\"><span style=\"background-color:#f7f7f7\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Courier New&quot;\"><span style=\"color:#666666\">&nbsp;composer require monolog/monolog</span></span></span></span></span></span></span></p>\r\n</div>\r\n\r\n<p><span style=\"font-size:11pt\"><span style=\"background-color:white\"><span style=\"font-family:Calibri,sans-serif\"><strong><span style=\"font-size:15.5pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#1a1a1a\">KULLANIM</span></span></span></strong></span></span></span></p>\r\n\r\n<div style=\"border:solid #ededed 1.0pt; padding:9.0pt 18.0pt 9.0pt 18.0pt\">\r\n<p><span style=\"background-color:#f7f7f7\"><span style=\"font-size:11pt\"><span style=\"background-color:#f7f7f7\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Courier New&quot;\"><span style=\"color:#666666\">use Monolog\\Logger;</span></span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"background-color:#f7f7f7\"><span style=\"font-size:11pt\"><span style=\"background-color:#f7f7f7\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Courier New&quot;\"><span style=\"color:#666666\">use Monolog\\Handler\\StreamHandler;</span></span></span></span></span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"background-color:#f7f7f7\"><span style=\"font-size:11pt\"><span style=\"background-color:#f7f7f7\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Courier New&quot;\"><span style=\"color:#666666\">// create a log channel</span></span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"background-color:#f7f7f7\"><span style=\"font-size:11pt\"><span style=\"background-color:#f7f7f7\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Courier New&quot;\"><span style=\"color:#666666\">$log = new Logger(&#39;name&#39;);</span></span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"background-color:#f7f7f7\"><span style=\"font-size:11pt\"><span style=\"background-color:#f7f7f7\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Courier New&quot;\"><span style=\"color:#666666\">$log-&gt;pushHandler(new StreamHandler(&#39;path/to/your.log&#39;, Logger::WARNING));</span></span></span></span></span></span></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"background-color:#f7f7f7\"><span style=\"font-size:11pt\"><span style=\"background-color:#f7f7f7\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Courier New&quot;\"><span style=\"color:#666666\">// add records to the log</span></span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"background-color:#f7f7f7\"><span style=\"font-size:11pt\"><span style=\"background-color:#f7f7f7\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Courier New&quot;\"><span style=\"color:#666666\">$log-&gt;warning(&#39;Foo&#39;);</span></span></span></span></span></span></span></p>\r\n\r\n<p><span style=\"background-color:#f7f7f7\"><span style=\"font-size:11pt\"><span style=\"background-color:#f7f7f7\"><span style=\"font-family:Calibri,sans-serif\"><span style=\"font-size:10.0pt\"><span style=\"font-family:&quot;Courier New&quot;\"><span style=\"color:#666666\">$log-&gt;error(&#39;Bar&#39;);</span></span></span></span></span></span></span></p>\r\n</div>\r\n\r\n<p><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\"><span style=\"color:#666666\">Daha Fazla detay i&ccedil;in GitReposuna gidin</span></span></span></p>\r\n', 'PHP,logger', '2019-04-29 17:57:03', 3, 5, 0, 'gorsel/makale/29772284163041629965brochure-flyer-paper-poster-logo-trademark-text-building-office-buildi.jpg', 'php-logger-kutuphanesi', '0'),
(10, 'C# Neden çok kullanılan bir programlama dili merak mı ediyorsunuz ??? O zaman içeri girin', '', 'c#,c#algoritma', '2019-04-29 18:04:46', 4, 2, 0, 'gorsel/makale/271402724329272290151581488_e3e1_2.jpg', 'c-neden-cok-kullanilan-bir-programlama-dili-merak-mi-ediyorsunuz-o-zaman-iceri-girin', '0'),
(11, 'C# Türkiyede hangi alanda kullanılıyor.', '', 'c#,yazılım', '2019-04-29 18:06:53', 20, 2, 0, 'gorsel/makale/22040288362763825882c-sharp-1170x520.jpg', 'c-turkiyede-hangi-alanda-kullaniliyor', '0'),
(12, 'PHP DATEBASE NASIL VERİ EKLENİR ?', '', 'PDO,VERİ TABANI,SQL', '2019-05-01 19:24:40', 5, 5, 0, 'gorsel/makale/27462220172163327653connect-mysql-with-php-banner-1.jpg', 'php-datebase-nasil-veri-eklenir', '0'),
(13, 'Mysql küçük büyük harf duyarlılığı', '<p><span style=\"font-family:Lucida Sans Unicode,Lucida Grande,sans-serif\">Merhaba muhtemelen sizde mysql ile &ccedil;alışırken sorgularda k&uuml;&ccedil;&uuml;k b&uuml;y&uuml;k harf duyarlılığının olmadığını farkettiniz.<br />\r\nBu sorun mysql sorgularında sabit olarak geliyor .Tabi bizde kullanıcı adı şifre gibi kontrol değişkenleri kullandığımızda ne yazık ki kişi k&uuml;&ccedil;&uuml;k b&uuml;y&uuml;k harf farketmeksizin giriş&nbsp; yapabiliyor .Neyse bu sıkıntılı durumdan kurtulmamıza yarayacak kodu yazalım hemen.</span></p>\r\n\r\n<p><strong>&Ouml;rnek sorgumuza bakalım</strong></p>\r\n\r\n<pre>\r\n<code class=\"language-sql\">SELECT * from kullanici where BINARY kullanici_sifre=? and BINARY kullanici_mail=?</code></pre>\r\n\r\n<p><span style=\"font-family:Georgia,serif\">Bu&nbsp; şekil normal bir sql sorgusunda ne yazik ki kişi Alİ de girse ALİ de girse sql bunu doğru olarak varsayacak &ccedil;&uuml;nk&uuml; k&uuml;&ccedil;&uuml;k b&uuml;y&uuml;k harf duyarlılığı yok bunu d&uuml;zeltmek i&ccedil;in yapmamız gereken her kullandığımız verinin başına &quot;BINARY&quot;kodunu eklemek</span></p>\r\n\r\n<p><span style=\"font-family:Georgia,serif\">D&uuml;zenlenmiş kod g&ouml;r&uuml;n&uuml;m&uuml;</span></p>\r\n\r\n<pre>\r\n<code class=\"language-sql\">SELECT * from kullanici where BINARY kullanici_sifre=? and BINARY kullanici_mail=?</code></pre>\r\n\r\n<p>Evet sorununuz &ccedil;&ouml;z&uuml;lm&uuml;şt&uuml;r .Ben Yılmaz Kadan kodla yaşayın kodlayarak yaşayın.&nbsp;</p>\r\n\r\n<p>Php &Ouml;rnek sorgu</p>\r\n\r\n<pre>\r\n<code class=\"language-php\">if (isset($_POST[\'genelayar_guncelle\'])) {\r\n\r\n	$sor=$db-&gt;prepare(\'UPDATE  ayar set\r\n		site_tittle=:site_tittle,\r\n		site_aciklama=:site_aciklama,\r\n		site_keyword=:site_keyword,\r\n		site_url=:site_url,\r\n		site_yazar=:site_yazar\r\n\r\n		\');\r\n	$update=$sor-&gt;execute(array(\r\n		\'site_tittle\'=&gt;$_POST[\'site_tittle\'],\r\n		\'site_aciklama\'=&gt;$_POST[\'site_aciklama\'],\r\n		\'site_keyword\'=&gt;$_POST[\'site_keyword\'],\r\n		\'site_url\'=&gt;$_POST[\'site_url\'],\r\n		\'site_yazar\'=&gt;$_POST[\'site_yazar\']\r\n\r\n	));\r\n	\r\n	if ($update) {\r\n		header(\"location:../genel_ayar.php?guncelleme=basarili\");\r\n		exit;\r\n	}\r\n	else{\r\n		header(\"location:../genel_ayar.php?guncelleme=basarisiz\");\r\n		exit;\r\n	}\r\n}\r\n</code></pre>\r\n\r\n<p>&nbsp;</p>\r\n', 'Mysql,küçük büyük harf duyarlılığı,php,pdo', '2019-05-02 14:40:07', 14, 5, 0, 'gorsel/makale/23157257083129320298logo-mysql.png', 'mysql-kucuk-buyuk-harf-duyarliligi', '0'),
(25, 'Messsi ronaldo', '<p>askldfjsdfashiaissdf</p>\r\n', 'sadfsad', '2019-05-04 10:55:43', 35, 14, 0, 'gorsel/makale/25761293933131221329maxresdefault.jpg', 'messsi-ronaldo', '0'),
(90, 'saat deneme', '', 'deneme', '2019-05-14 19:11:22', 6, 9, 0, 'gorsel/makale/292463034526949292811_zVDcaM6mqhi9m0LP_Sq4Ag.jpeg', 'saat-deneme', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

DROP TABLE IF EXISTS `yorum`;
CREATE TABLE IF NOT EXISTS `yorum` (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum_ad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yorum_soyad` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yorum_mail` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `yorum_tarih` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `yorum_icerik` text COLLATE utf8_turkish_ci,
  `yorum_durum` varchar(255) COLLATE utf8_turkish_ci DEFAULT '1',
  `yorum_makaleid` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`yorum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yorum`
--

INSERT INTO `yorum` (`yorum_id`, `yorum_ad`, `yorum_soyad`, `yorum_mail`, `yorum_tarih`, `yorum_icerik`, `yorum_durum`, `yorum_makaleid`) VALUES
(52, 'safd', 'sadf', 'asdf@gmail.com', '2019-06-03 21:34:41', 'ssdf', '1', '25'),
(51, 'baban', 'deden', 'adfnan@gmail.com', '2019-06-03 21:32:52', 'anan', '1', '8'),
(50, 'asfsaf', 'safs', 'kadan@gmail.com', '2019-06-03 21:31:11', 'Yılmaz', '1', '8'),
(49, 'asdfsadf', 'sadfsadf', 'asdf@gmail.com', '2019-06-03 21:29:46', 'Yılmaz kadan deneme', '1', '25'),
(48, 'safd', 'asdf', 'asd', '2019-06-03 21:28:37', 'asdf', '1', '25'),
(47, 'asdf', 'asdfa', 'asdf', '2019-06-03 21:28:24', 'sadf', '1', '25'),
(46, 'asdf', 'asdf', 'adf', '2019-06-03 21:28:14', 'asdf', '1', '25'),
(31, 'asdf', 'asfd', 'asdf', '2019-06-03 20:54:21', 'sdf', '1', '25'),
(32, 'asdf', 'asfd', 'asdf', '2019-06-03 20:54:25', 'sdf', '1', '25'),
(33, '', '', '', '2019-06-03 20:54:40', '', '1', '25'),
(34, '', '', '', '2019-06-03 20:54:44', '', '1', '25'),
(35, 'baban', 'deden', 'baban', '2019-06-03 20:57:31', 'anan', '1', '25'),
(36, 'asdf', '', 'asdf', '2019-06-03 21:02:27', 'sadfs', '1', '25'),
(37, '', '', '', '2019-06-03 21:04:05', 'asdf', '1', '25'),
(38, 'saf', '', 'saf', '2019-06-03 21:04:24', 'afdsaf', '1', '25'),
(39, '', '', '', '2019-06-03 21:09:39', '', '1', '25'),
(40, '', '', '', '2019-06-03 21:09:42', 'anan\r\n', '1', '25'),
(41, 'sadf', 'kasdf', 'sadf', '2019-06-03 21:12:55', 'Yılmaz\r\n', '1', '25'),
(42, 'sadf', 'sadf', 'sadf', '2019-06-03 21:15:54', 'asdf', '1', '25'),
(43, 'Cafer', 'Kardeş', 'ahah@gmail.com', '2019-06-03 21:22:52', 'Adamsınız beğendim şahsen', '1', '25'),
(44, 'sadfjasf', 'asjfsakdfj', 'aksdfjsadlf@gmail.com', '2019-06-03 21:23:09', 'sadfasdfasjf', '1', '25'),
(45, 'dede', 'cafer', 'asfdsaf@gmail.com', '2019-06-03 21:24:50', 'Yılmaz Kadan', '1', '25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
