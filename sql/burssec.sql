-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 27 May 2020, 12:40:11
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `burssec`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_url` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_title` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_description` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_keywords` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_author` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_adres` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_analystic` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_maps` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_zopim` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_instagram` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_twitter` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_facebook` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_smtpuser` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ayar_bakim` enum('0','1') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_url`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_mail`, `ayar_adres`, `ayar_analystic`, `ayar_maps`, `ayar_zopim`, `ayar_instagram`, `ayar_twitter`, `ayar_facebook`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakim`) VALUES
(0, 'images/27378logo_1.png', '', 'Burssec.com', 'Proje Sahibi ve Proje Katılımcılarını Burs Kapsamında Buluşturan İnternet Platformu', 'burs, proje, öğrenci, akademisyen', 'Ayşe Yıldırım', '+90 248 213 13 26', 'info@burssec.com', 'Mehmet Akif Ersoy Üniversitesi Makü  – Baka Teknokent İstiklal Yerleşkesi 15030 BURDUR', '', '', '', 'https://www.instagram.com', 'https://twitter.com', 'https://www.facebook.com', 'mail@alanadi.com', 'user', 'password', '587', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basvuru_kriter`
--

CREATE TABLE `basvuru_kriter` (
  `slider_id` int(11) NOT NULL,
  `kriter_id` int(11) NOT NULL,
  `kriter_ad` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kriter_deger` varchar(3) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kriter_sira` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `basvuru_kriter`
--

INSERT INTO `basvuru_kriter` (`slider_id`, `kriter_id`, `kriter_ad`, `kriter_deger`, `kriter_sira`) VALUES
(17, 6, 'deneme', '12', 0),
(17, 7, 'bbb', '15', 0),
(1, 8, 'deneme1', '50', 0),
(4, 9, 'basvuu1', '56', 0),
(4, 10, 'basvuru2', '75', 0),
(56, 11, 'Deneme özellik 1', '55', 0),
(56, 12, 'Deneme özellik 2', '40', 0),
(56, 13, 'Deneme özellik 3', '60', 0),
(60, 56, 'PHP', '35', 0),
(60, 57, 'Javascript', '20', 0),
(60, 58, 'CSS', '10', 0),
(60, 59, 'HTML', '10', 0),
(60, 60, 'Mysql', '25', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelen_basvuru`
--

CREATE TABLE `gelen_basvuru` (
  `gelen_basvuru_id` int(20) NOT NULL,
  `basvuru_deger` int(3) NOT NULL,
  `kriter_id` int(3) NOT NULL,
  `basvuru_kullanici` int(11) NOT NULL,
  `slider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `gelen_basvuru`
--

INSERT INTO `gelen_basvuru` (`gelen_basvuru_id`, `basvuru_deger`, `kriter_id`, `basvuru_kullanici`, `slider_id`) VALUES
(12, 45, 11, 5, 56),
(13, 56, 12, 5, 56),
(14, 12, 13, 5, 56),
(15, 45, 9, 9, 4),
(16, 56, 10, 9, 4),
(17, 80, 11, 9, 56),
(18, 56, 12, 9, 56),
(19, 78, 13, 9, 56),
(20, 12, 11, 10, 56),
(21, 10, 12, 10, 56),
(22, 1, 13, 10, 56),
(23, 30, 56, 9, 60),
(24, 80, 57, 9, 60),
(25, 40, 58, 9, 60),
(26, 25, 59, 9, 60),
(27, 75, 56, 11, 60),
(28, 60, 57, 11, 60),
(29, 60, 58, 11, 60),
(30, 80, 59, 11, 60),
(31, 50, 56, 13, 60),
(32, 40, 57, 13, 60),
(33, 50, 58, 13, 60),
(34, 60, 59, 13, 60),
(35, 60, 60, 13, 60),
(37, 25, 60, 9, 60),
(39, 80, 59, 11, 60),
(40, 60, 60, 11, 60);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(3) NOT NULL,
  `kategori_ad` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`) VALUES
(1, 'Etnoloji'),
(2, 'Halkbilim'),
(3, 'Sosyal Antropoloji'),
(4, 'Türk Halkbilimi Arkeoloji'),
(5, 'Arkeoloji'),
(6, 'Arkeoloji Ve Sanat Tarihi'),
(7, 'Klasik Arkeoloji'),
(8, 'Kültür Varlıklarını Koruma Ve Onarım'),
(9, 'Prehistorya'),
(10, 'Protohistorya Ve Ön Asya Arkeolojisi'),
(11, 'Tarih Öncesi Arkeolojisi'),
(12, 'Taşınabilir Kültür Varlıklarını Koruma Ve Onarım'),
(13, 'Bankacılık'),
(14, 'Bankacılık Ve Finans'),
(15, 'Bankacılık Ve Sigortacılık'),
(16, 'Sermaye Piyasaları Ve Portföy Yönetimi'),
(17, 'Sermaye Piyasası'),
(18, 'Sermaye Piyasası Denetim Ve Derecelendirme'),
(19, 'Sigortacılık'),
(20, 'Sigortacılık Ve Risk Yönetimi'),
(21, 'Sigortacılık Ve Sosyal Güvenlik'),
(22, 'Beslenme Ve Diyetetik'),
(23, 'Adli Bilişim Mühendisliği'),
(24, 'Bilgisayar Bilimi Ve Mühendisliği'),
(25, 'Bilgisayar Mühendisliği'),
(26, 'Bilgisayar Ve Yazılım Mühendisliği'),
(27, 'Bilişim Sistemleri Mühendisliği'),
(28, 'Yazılım Mühendisliği'),
(29, 'Biyoloji'),
(30, 'Biyomühendislik'),
(31, 'Biyoenformatik Ve Genetik'),
(32, 'Biyomedikal Mühendisliği'),
(33, 'Biyosistem Mühendisliği'),
(34, 'Biyoteknoloji'),
(35, 'Biyoteknoloji Ve Moleküler Biyoloji'),
(36, 'Genetik Ve Biyoinformatik'),
(37, 'Genetik Ve Biyomühendislik'),
(38, 'Moleküler Biyoloji Ve Genetik'),
(39, 'Moleküler Biyoloji, Genetik Ve Biyomühendislik'),
(40, 'Tıp Mühendisliği'),
(41, 'Coğrafya'),
(42, 'Çalışma Ekonomisi Ve Endüstri İlişkileri'),
(43, 'Çevre Mühendisliği'),
(44, 'Diş Hekimliği'),
(45, 'Eczacılık'),
(46, 'Ekonometri'),
(47, 'Finansal Ekonometri'),
(48, 'Elektrik Mühendisliği'),
(49, 'Elektrik Ve Elektronik Mühendisliği'),
(50, 'Elektronik Mühendisliği'),
(51, 'Elektronik Ve Haberleşme Mühendisliği'),
(52, 'Telekomünikasyon Mühendisliği'),
(53, 'Endüstri Mühendisliği'),
(54, 'Endüstri Sistemleri Mühendisliği'),
(55, 'Endüstri Ve Sistem Mühendisliği'),
(56, 'İşletme Mühendisliği'),
(57, 'Sistem Mühendisliği'),
(58, 'Endüstri Tasarımı'),
(59, 'Endüstri Ürünleri Tasarımı'),
(60, 'Endüstriyel Tasarım'),
(61, 'Endüstriyel Tasarım Mühendisliği'),
(62, 'Ekonomi Politik Ve Toplum Felsefesi'),
(63, 'Felsefe'),
(64, 'Astronomi Ve Uzay Bilimleri'),
(65, 'Fizik'),
(66, 'Fizik Mühendisliği'),
(67, 'Optik Ve Akustik Mühendisliği'),
(68, 'Uzay Bilimleri Ve Teknolojileri'),
(69, 'Ergoterapi'),
(70, 'Fizik Tedavi Ve Rehabilitasyon'),
(71, 'Deniz Teknolojisi Mühendisliği'),
(72, 'Deniz Ulaştırma İşletme Mühendisliği'),
(73, 'Gemi İnşa Ve Gemi Makineleri Mühendisliği'),
(74, 'Gemi İnşaatı Mühendisliği'),
(75, 'Gemi İnşaatı Ve Gemi Makineleri Mühendisliği'),
(76, 'Gemi Makineleri İşletme Mühendisliği'),
(77, 'Gemi Ve Deniz Teknolojisi Mühendisliği'),
(78, 'GIDA MÜHENDİSLİĞİ'),
(79, 'Aksesuar Tasarımı'),
(80, 'Baskı Sanatları'),
(81, 'Bileşik Sanatlar'),
(82, 'Cam'),
(83, 'Canlandırma Filmi Tasarım Ve Yönetimi'),
(84, 'Çini'),
(85, 'Çini Tasarımı'),
(86, 'Çizgi Film Ve Animasyon'),
(87, 'Dramatik Yazarlık'),
(88, 'Dramatik Yazarlık-Dramaturji'),
(89, 'Duysal (Ses) Sanatları Tasarımı'),
(90, 'El Sanatları'),
(91, 'El Sanatları Tasarımı Ve Üretimi'),
(92, 'Eski Çini Onarımları'),
(93, 'Film Tasarım Ve Yazarlık'),
(94, 'Film Tasarım Ve Yönetmenliği'),
(95, 'Film Tasarımı'),
(96, 'Fotoğraf'),
(97, 'Fotoğraf Ve Grafik Sanatlar'),
(98, 'Fotoğraf Ve Video'),
(99, 'Geleneksel Türk El Sanatları'),
(100, 'Geleneksel Türk Sanatları'),
(101, 'Görsel İletişim'),
(102, 'Görsel İletişim Tasarımı'),
(103, 'Görsel Sanatlar'),
(104, 'Görsel Sanatlar Ve Görsel İletişim Tasarımı'),
(105, 'Görüntü Sanatları'),
(106, 'Grafik'),
(107, 'Grafik Resimleme Ve Baskı'),
(108, 'Grafik Sanatları'),
(109, 'Grafik Tasarım'),
(110, 'Halı Kilim'),
(111, 'Halı, Kilim Ve Eski Kumaş Desenleri'),
(112, 'Hat'),
(113, 'Heykel'),
(114, 'İletişim Sanatları'),
(115, 'İletişim Tasarımı Ve Yönetimi'),
(116, 'İletişim Ve Tasarım'),
(117, 'Kurgu-Ses Ve Görüntü Yönetimi'),
(118, 'Kuyumculuk'),
(119, 'Kuyumculuk Ve Mücevher Tasarımı'),
(120, 'Medya Ve Görsel Sanatlar'),
(121, 'Moda Giyim Tasarımı'),
(122, 'Moda Tasarımı'),
(123, 'Moda Ve Tekstil Tasarımı'),
(124, 'Plastik Sanatlar'),
(125, 'Plastik Sanatlar Ve Resim'),
(126, 'Resim'),
(127, 'Resim-Baskı Sanatları'),
(128, 'Sahne Dekorları Ve Kostümü'),
(129, 'Sahne Tasarımı'),
(130, 'Sahne Ve Gösteri Sanatları Yönetimi'),
(131, 'Sanat (Tasarım) Yönetimi'),
(132, 'Sanat Eserleri Konservasyonu Ve Restorasyonu'),
(133, 'Sanat Tasarımı'),
(134, 'Sanat Ve Kültür Yönetimi'),
(135, 'Sanat Ve Tasarım'),
(136, 'Sanat Yönetimi'),
(137, 'Seramik'),
(138, 'Seramik Sanatları'),
(139, 'Seramik Ve Cam'),
(140, 'Seramik Ve Cam Tasarımı'),
(141, 'Takı Tasarımı'),
(142, 'Takı Teknolojisi Ve Tasarımı'),
(143, 'Tekstil'),
(144, 'Tekstil Tasarım'),
(145, 'Tekstil Tasarımı Ve Üretimi'),
(146, 'Tekstil Ve Deri Moda Tasarımı'),
(147, 'Tekstil Ve Moda Tasarımı'),
(148, 'Tezhip'),
(149, 'Geomatik Mühendisliği'),
(150, 'Harita Mühendisliği'),
(151, 'Jeodezi Ve Fotogrametri Mühendisliği'),
(152, 'Ebelik'),
(153, 'Hemşirelik'),
(154, 'Hemşirelik Ve Sağlık Hizmetleri'),
(155, 'Hukuk'),
(156, 'İç Mimarlık'),
(157, 'İç Mimarlık Ve Çevre Tasarımı'),
(158, 'Ekonomi'),
(159, 'Ekonomi Ve Finans'),
(160, 'İktisat'),
(161, 'İşletme-Ekonomi'),
(162, 'Animasyon'),
(163, 'Basın Ve Yayın'),
(164, 'Gazetecilik'),
(165, 'Halkla İlişkiler'),
(166, 'Halkla İlişkiler Ve Reklamcılık'),
(167, 'Halkla İlişkiler Ve Tanıtım'),
(168, 'İletişim'),
(169, 'İletişim Bilimleri'),
(170, 'Kültür Yönetimi'),
(171, 'Medya Ve İletişim'),
(172, 'Medya Ve İletişim Sistemleri'),
(173, 'Moda Ve Tekstil Tasarımı'),
(174, 'Radyo Ve Televizyon'),
(175, 'Radyo, Televizyon Ve Sinema'),
(176, 'Reklam Tasarımı Ve İletişimi'),
(177, 'Reklamcılık'),
(178, 'Sinema Ve Dijital Medya'),
(179, 'Sinema Ve Televizyon'),
(180, 'Televizyon Haberciliği Ve Programcılığı'),
(181, 'Turizm Animasyonu'),
(182, 'Yeni Medya'),
(183, 'Yeni Medya Ve Gazetecilik'),
(184, 'İmalat Mühendisliği'),
(185, 'Kontrol Mühendisliği'),
(186, 'Kontrol Ve Otomasyon Mühendisliği'),
(187, 'Makine Ve İmalat Mühendisliği'),
(188, 'Mekatronik Mühendisliği'),
(189, 'Mekatronik Sistemler Mühendisliği'),
(190, 'Üretim Sistemleri Mühendisliği'),
(191, 'İnşaat Mühendisliği'),
(192, 'Dünya Dinleri'),
(193, 'İlahiyat'),
(194, 'İslam Ve Din Bilimleri'),
(195, 'İslami İlimler'),
(196, 'Uluslararası İlahiyat'),
(197, 'Yaygın Din Öğretimi Ve Uygulamaları'),
(198, 'Aktüerya'),
(199, 'Aktüerya Bilimleri'),
(200, 'Aktüerya Ve Risk Yönetimi'),
(201, 'İstatistik'),
(202, 'İstatistik Ve Bilgisayar Bilimleri'),
(203, 'İşletme'),
(204, 'Yönetim Bilimleri (İşletme Fakültesi)'),
(205, 'Yönetim Bilimleri Programları'),
(206, 'Jeofizik Mühendisliği'),
(207, 'Hidrojeoloji Mühendisliği'),
(208, 'Jeoloji Mühendisliği'),
(209, 'Kentsel Tasarım Ve Peyzaj Mimarisi'),
(210, 'Peyzaj Mimarlığı'),
(211, 'Şehir Ve Bölge Planlama'),
(212, 'Kimya'),
(213, 'Biyokimya'),
(214, 'Kimya Mühendisliği'),
(215, 'Kimya Mühendisliği Ve Uygulamalı Kimya'),
(216, 'Kimya Ve Süreç Mühendisliği'),
(217, 'Kimya-Biyoloji Mühendisliği'),
(218, 'Polimer Mühendisliği'),
(219, 'Arp'),
(220, 'Bale'),
(221, 'Bale Dansçılığı'),
(222, 'Bando Şefliği'),
(223, 'Caz'),
(224, 'Çalgı'),
(225, 'Çalgı Eğitimi'),
(226, 'Çalgı Yapım'),
(227, 'Dans'),
(228, 'Drama Ve Oyunculuk'),
(229, 'Fagot'),
(230, 'Flüt'),
(231, 'Geleneksel Türk Müzikleri'),
(232, 'Genel Müzikoloji'),
(233, 'Gitar'),
(234, 'Keman'),
(235, 'Klarnet'),
(236, 'Klasik Bale'),
(237, 'Kompozisyon'),
(238, 'Kompozisyon(Bestecilik)'),
(239, 'Kompozisyon Ve Orkestra Şefliği'),
(240, 'Kontrabas'),
(241, 'Korno'),
(242, 'Koro'),
(243, 'Modern Dans'),
(244, 'Müzik'),
(245, 'Müzik Bilimleri'),
(246, 'Müzik Teknolosi'),
(247, 'Müzik Teorisi'),
(248, 'Müzik Toplulukları'),
(249, 'Müzikoloji'),
(250, 'Nefesli Çalgılar Ve Vurmalı Çalgılar'),
(251, 'Obua'),
(252, 'Opera'),
(253, 'Opera Şarkıcılığı'),
(254, 'Opera Ve Konser Şarkıcılığı'),
(255, 'Osmanlı Dönemi Karşılaştırmalı Müzik'),
(256, 'Oyunculuk'),
(257, 'Piyano'),
(258, 'Piyano Onarımı Yapımı'),
(259, 'Piyano-Arp-Gitar'),
(260, 'Popüler Müzik Şarkıcılığı'),
(261, 'Sahne Sanatları'),
(262, 'Ses Eğitimi'),
(263, 'Şan'),
(264, 'Temel Bilimler'),
(265, 'Teori'),
(266, 'Tiyatro'),
(267, 'Tiyatro Eleştirmenliği Ve Dramaturji'),
(268, 'Trombon'),
(269, 'Trompet'),
(270, 'Tuba'),
(271, 'Türk Din Musikisi'),
(272, 'Türk Halk Müziği'),
(273, 'Türk Halk Müziği Çalgı Eğitimi'),
(274, 'Türk Halk Müziği Ses Eğitimi'),
(275, 'Türk Halk Oyunları'),
(276, 'Türk Musikisi'),
(277, 'Türk Musikisi Temel Bilimler'),
(278, 'Türk Müziği'),
(279, 'Türk Sanat Müziği'),
(280, 'Türk Sanat Müziği Ses Eğitimi'),
(281, 'Türk Sanat Müziği Temel Bilimler'),
(282, 'Üflemeli Ve Vurmalı Çalgılar'),
(283, 'Viyola'),
(284, 'Viyolonsel'),
(285, 'Vurmalı Çalgılar'),
(286, 'Yaylı Çalgılar'),
(287, 'Yaylı Çalgılar Yapımı'),
(288, 'Cevher Hazırlama Mühendisliği'),
(289, 'Maden Mühendisliği'),
(290, 'Makine Mühendisliği'),
(291, 'Maliye'),
(292, 'Malzeme Bilimi Ve Mühendisliği'),
(293, 'Malzeme Bilimi Ve Nano Mühendislik'),
(294, 'Malzeme Bilimi Ve Nanoteknoloji Mühendisliği'),
(295, 'Malzeme Mühendisliği'),
(296, 'Metalurji Ve Malzeme Mühendisliği'),
(297, 'Finans Matematiği'),
(298, 'Matematik'),
(299, 'Matematik Mühendisliği'),
(300, 'Matematik Ve Bilgisayar Bilimleri'),
(301, 'Matematik-Bilgisayar'),
(302, 'Gemi Ve Yat Tasarımı'),
(303, 'Mimarlık'),
(304, 'Odyoloji'),
(305, 'Otomotiv Mühendisliği'),
(306, 'Raylı Sistemler Mühendisliği'),
(307, 'Ulaştırma Mühendisliği'),
(308, 'Aile Ekonomisi Ve Beslenme Öğretmenliği'),
(309, 'Aile Ve Tüketici Bilimleri Öğretmenliği'),
(310, 'Almanca Öğretmenliği'),
(311, 'Arapça Öğretmenliği'),
(312, 'Beden Eğitimi Ve Spor Öğretmenliği'),
(313, 'Bilgisayar Öğretmenliği'),
(314, 'Bilgisayar Sistemleri Öğretmenliği'),
(315, 'Bilgisayar Ve Kontrol Öğretmenliği'),
(316, 'Bilgisayar Ve Öğretim Teknolojileri Öğretmenliği'),
(317, 'Biyoloji Öğretmenliği'),
(318, 'Büro Yönetimi Öğretmenliği'),
(319, 'Coğrafya Öğretmenliği'),
(320, 'Çiçek, Örgü Ve Dokuma Öğretmenliği'),
(321, 'Çocuk Gelişimi Ve Okul Öncesi Öğretmenliği'),
(322, 'Dekoratif Sanatlar Öğretmenliği'),
(323, 'Din Kültürü Ve Ahlak Bilgisi Öğretmenliği'),
(324, 'Döküm Öğretmenliği'),
(325, 'Elektrik Öğretmenliği'),
(326, 'Elektronik Öğretmenliği'),
(327, 'Elektronik Ve Bilgisayar Öğretmenliği'),
(328, 'Elektronik Ve Haberleşme Öğretmenliği'),
(329, 'Endüstriyel Teknoloji Öğretmenliği'),
(330, 'Enerji Öğretmenliği'),
(331, 'Engellilerde Beden Eğitimi Ve Spor Öğretmenliği'),
(332, 'Felsefe Grubu Öğretmenliği'),
(333, 'Fen Bilgisi Öğretmenliği'),
(334, 'Fizik Öğretmenliği'),
(335, 'Fransızca Öğretmenliği'),
(336, 'Giyim Endüstrisi Öğretmenliği'),
(337, 'Giyim Öğretmenliği'),
(338, 'Görme Engelliler Öğretmenliği'),
(339, 'Grafik Öğretmenliği'),
(340, 'Hazır Giyim Öğretmenliği'),
(341, 'İlköğretim Din Kültürü Ve Ahlak Bilgisi Öğretmenliği'),
(342, 'İlköğretim Matematik Öğretmenliği'),
(343, 'İngilizce Öğretmenliği'),
(344, 'İngilizce Öğretmenliği Öğretimi'),
(345, 'İşitme Engelliler Öğretmenliği'),
(346, 'İşletme Öğretmenliği'),
(347, 'Japonca Öğretmenliği'),
(348, 'Kalıpçılık Öğretmenliği'),
(349, 'Kimya Öğretmenliği'),
(350, 'Konaklama İşletmeciliği Eğitimi'),
(351, 'Konaklama İşletmeciliği Öğretmenliği'),
(352, 'Kontrol Öğretmenliği'),
(353, 'Kuaförlük Ve Güzellik Bilgisi Öğretmenliği'),
(354, 'Makine Resim Ve Konstrüksiyonu Öğretmenliği'),
(355, 'Matbaa Öğretmenliği'),
(356, 'Matematik Öğretmenliği'),
(357, 'Mekatronik Öğretmenliği'),
(358, 'Mesleki Resim Öğretmenliği'),
(359, 'Metal Öğretmenliği'),
(360, 'Mobilya Ve Dekorasyon Öğretmenliği'),
(361, 'Moda Tasarımı Öğretmenliği'),
(362, 'Muhasebe Ve Finansman Öğretmenliği'),
(363, 'Müzik Öğretmenliği'),
(364, 'Nakış Öğretmenliği'),
(365, 'Okul Öncesi Öğretmenliği'),
(366, 'Otomotiv Öğretmenliği'),
(367, 'Özel Eğitim Öğretmenliği'),
(368, 'Pazarlama Öğretmenliği'),
(369, 'Resim-İş Eğitimi'),
(370, 'Resim-İş Öğretmenliği'),
(371, 'Sağlık Eğitimi'),
(372, 'Seramik Öğretmenliği'),
(373, 'Seyahat İşletmeciliği Ve Turizm Rehberliği Eğitimi'),
(374, 'Seyahat İşletmeciliği Ve Turizm Rehberliği Öğretmenliği'),
(375, 'Sınıf Öğretmenliği'),
(376, 'Sosyal Bilgiler Öğretmenliği'),
(377, 'Talaşlı Üretim Öğretmenliği'),
(378, 'Tarih Öğretmenliği'),
(379, 'Tasarım Ve Konstrüksiyon Öğretmenliği'),
(380, 'Tekstil Dokuma Ve Örgü Öğretmenliği'),
(381, 'Tekstil Öğretmenliği'),
(382, 'Tekstil Terbiye Öğretmenliği'),
(383, 'Telekomünikasyon Öğretmenliği'),
(384, 'Tesisat Öğretmenliği'),
(385, 'Türk Dili Ve Edebiyatı Öğretmenliği'),
(386, 'Türkçe Öğretmenliği'),
(387, 'Türkçe Öğretmenliği Öğretim'),
(388, 'Üstün Zekalılar Öğretmenliği'),
(389, 'Yapı Öğretmenliği'),
(390, 'Yapı Ressamlığı Öğretmenliği'),
(391, 'Yapı Tasarımı Öğretmenliği'),
(392, 'Zihin Engelliler Öğretmenliği'),
(393, 'Enerji Sistemleri Mühendisliği'),
(394, 'Nükleer Enerji Mühendisliği'),
(395, 'Petrol Ve Doğalgaz Mühendisliği'),
(396, 'Pilotaj'),
(397, 'Pilot Eğitimi'),
(398, 'Psikoloji'),
(399, 'Çocuk Gelişimi'),
(400, 'Çocuk Sağlığı Ve Gelişimi Rehberlik (Pdr)'),
(401, 'Rehberlik Ve Psikolojik Danışmanlık'),
(402, 'Acil Yardım Ve Afet Yönetimi'),
(403, 'Dil Ve Konuşma Terapisi'),
(404, 'Gerontoloj'),
(405, 'Ortez-Protez'),
(406, 'Perfüzyon'),
(407, 'Sağlık İdaresi'),
(408, 'Sağlık Kurumları İşletmeciliği'),
(409, 'Sağlık Kurumları Yöneticiliği'),
(410, 'Sağlık Kurumları Yönetimi'),
(411, 'Sağlık Memurluğu'),
(412, 'Sağlık Yönetimi'),
(413, 'Avrupa Birliği İlişkileri'),
(414, 'Kamu Yönetimi'),
(415, 'Küresel Siyaset Ve Uluslararası İlişkiler'),
(416, 'Küresel Ve Uluslararası İlişkiler'),
(417, 'Siyaset Bilimi'),
(418, 'Siyaset Bilimi Ve Kamu Yönetimi'),
(419, 'Siyaset Bilimi Ve Uluslararası İlişkiler'),
(420, 'Toplumsal Ve Siyasal Bilimler'),
(421, 'Uluslararası Çalışmalar'),
(422, 'Uluslararası İlişkiler'),
(423, 'Uluslararası İlişkiler Ve Avrupa Birliği'),
(424, 'Uluslararası İlişkiler Ve Deniz Güvenliği'),
(425, 'Sosyal Hizmetler'),
(426, 'İnsan Ve Toplum Bilimleri'),
(427, 'Kültürel Çalışmalar'),
(428, 'Sosyoloji'),
(429, 'Antrenörlük Eğitimi'),
(430, 'Rekreasyon'),
(431, 'Rekreasyon Yönetimi'),
(432, 'Spor Bilimleri'),
(433, 'Spor Yöneticiliği'),
(434, 'Balıkçılık Teknolojisi'),
(435, 'Balıkçılık Teknolojisi Mühendisliği'),
(436, 'Su Bilimleri Ve Mühendisliği'),
(437, 'Su Ürünleri'),
(438, 'Su Ürünleri Mühendisliği'),
(439, 'Bilim Tarihi'),
(440, 'Sanat Tarihi'),
(441, 'Tarih'),
(442, 'Ağaç İşleri Endüstri Mühendisliği'),
(443, 'Aile Ve Tüketici Bilimleri'),
(444, 'Basım Teknolojileri'),
(445, 'Besin Teknolojisi'),
(446, 'Bilgi Ve Belge Yönetimi'),
(447, 'Bilgisayar Bilimleri'),
(448, 'Bilgisayar Teknolojisi Ve Bilişim Sistemleri'),
(449, 'Bilişim Sistemleri Ve Teknolojileri'),
(450, 'Denizcilik İşletmeleri Yönetimi'),
(451, 'Enformasyon Teknolojileri'),
(452, 'Ev Ekonomisi'),
(453, 'Gayrimenkul Ve Varlık Değerleme'),
(454, 'Gıda Teknolojisi'),
(455, 'Girişimcilik'),
(456, 'Gümrük İşletme'),
(457, 'Hava Trafik Kontrol'),
(458, 'Havacılık Elektrik Ve Elektroniği'),
(459, 'Havacılık İşletmeciliği'),
(460, 'Havacılık Yönetimi'),
(461, 'İnsan Kaynakları Yönetimi'),
(462, 'İş Sağlığı Ve Güvenliği'),
(463, 'İşletme Bilgi Yönetimi'),
(464, 'İşletme Enformatiği'),
(465, 'İşletme Yönetimi'),
(466, 'Kütüphanecilik'),
(467, 'Lojistik'),
(468, 'Lojistik Yönetimi'),
(469, 'Muhasebe'),
(470, 'Muhasebe Bilgi Sistemleri'),
(471, 'Muhasebe Ve Denetim'),
(472, 'Muhasebe Ve Finansal Yönetim'),
(473, 'Mutfak Sanatları Ve Yönetimi'),
(474, 'Pazarlama'),
(475, 'Sivil Hava Ulaştırma İşletmeciliği'),
(476, 'Sivil Havacılık İşletmeciliği'),
(477, 'Tapu Kadastro'),
(478, 'Teknoloji Ve Bilgi Yönetimi'),
(479, 'Tekstil Geliştirme Ve Pazarlama'),
(480, 'Uçak Elektrik-Elektronik'),
(481, 'Uçak Gövde-Motor'),
(482, 'Uçak Gövde-Motor Bakımı'),
(483, 'Yönetim Bilimleri'),
(484, 'Yönetim Bilişim Sistemleri'),
(485, 'Deri Mühendisliği'),
(486, 'Tekstil Mühendisliği'),
(487, 'Tıp'),
(488, 'Gastronomi'),
(489, 'Gastronomi Ve Mutfak Sanatları'),
(490, 'Konaklama İşletmeciliği'),
(491, 'Otel Yöneticiliği'),
(492, 'Seyahat İşletmeciliği'),
(493, 'Seyahat İşletmeciliği Ve Turizm Rehberliği'),
(494, 'Turizm İşletmeciliği'),
(495, 'Turizm İşletmeciliği Ve Otelcilik'),
(496, 'Turizm Rehberliği'),
(497, 'Turizm Ve Otel İşletmeciliği'),
(498, 'Turizm Ve Otelcilik'),
(499, 'Yiyecek Ve İçecek İşletmeciliği'),
(500, 'Türk Dili Ve Edebiyatı'),
(501, 'Havacılık Ve Uzay Mühendisliği'),
(502, 'Meteoroloji Mühendisliği'),
(503, 'Uçak Mühendisliği'),
(504, 'Uzay Mühendisliği'),
(505, 'Ulaştırma Ve Lojistik'),
(506, 'Uluslararası Finans'),
(507, 'Uluslararası Finans Ve Bankacılık'),
(508, 'Uluslararası Girişimcilik'),
(509, 'Uluslararası İşletme Yönetimi'),
(510, 'Uluslararası İşletmecilik'),
(511, 'Uluslararası Lojistik'),
(512, 'Uluslararası Lojistik Ve Taşımacılık'),
(513, 'Uluslararası Lojistik Yönetimi'),
(514, 'Uluslararası Ticaret'),
(515, 'Uluslararası Ticaret Ve Finans'),
(516, 'Uluslararası Ticaret Ve Finansman'),
(517, 'Uluslararası Ticaret Ve İşletmecilik'),
(518, 'Uluslararası Ticaret Ve Lojistik'),
(519, 'Uluslararası Ticaret Ve Lojistik Yönetimi'),
(520, 'Uluslararası Ticaret Ve Pazarlama'),
(521, 'Uluslararası Ticaret, Lojistik Ve İşletmecilik'),
(522, 'Veterinerlik'),
(523, 'Alman Dili Ve Edebiyatı'),
(524, 'Amerikan Kültürü Ve Edebiyatı'),
(525, 'Arap Dili Ve Edebiyatı'),
(526, 'Arnavut Dili Ve Edebiyatı'),
(527, 'Azerbaycan Türkçesi Ve Edebiyatı'),
(528, 'Boşnak Dili Ve Edebiyatı'),
(529, 'Bulgar Dili Ve Edebiyatı'),
(530, 'Çağdaş Türk Lehçeleri Ve Edebiyatları'),
(531, 'Çağdaş Yunan Dili Ve Edebiyatı'),
(532, 'Çerkez Dili Ve Edebiyatı'),
(533, 'Çeviribilim (Almanca)'),
(534, 'Çeviribilim (İngilizce)'),
(535, 'Çin Dili Ve Edebiyatı'),
(536, 'Dilbilim'),
(537, 'Ermeni Dili Ve Edebiyatı'),
(538, 'Eski Yunan Dili Ve Edebiyatı'),
(539, 'Fars Dili Ve Edebiyatı'),
(540, 'Fransız Dili Ve Edebiyatı'),
(541, 'Gürcü Dili Ve Edebiyatı'),
(542, 'Hırvat Dili Ve Edebiyatı'),
(543, 'Hindoloji'),
(544, 'Hititoloji'),
(545, 'Hungaroloji'),
(546, 'İbrani Dili Ve Edebiyatı'),
(547, 'İngiliz Dil Bilimi'),
(548, 'İngiliz Dili Ve Edebiyatı'),
(549, 'İngiliz Dili Ve Karşılaştırmalı Edebiyat'),
(550, 'İspanyol Dili Ve Edebiyatı'),
(551, 'İtalyan Dili Ve Edebiyatı'),
(552, 'Japon Dili Ve Edebiyatı'),
(553, 'Karşılaştırmalı Edebiyat'),
(554, 'Karşılaştırmalı Edebiyat (İngilizce)'),
(555, 'Kore Dili Ve Edebiyatı'),
(556, 'Koreoloji'),
(557, 'Kürt Dili Ve Edebiyatı'),
(558, 'Latin Dili Ve Edebiyatı'),
(559, 'Leh Dili Ve Edebiyatı'),
(560, 'Mütercim-Tercümanlık (Fransızca)'),
(561, 'Mütercim-Tercümanlık (Almanca)'),
(562, 'Mütercim-Tercümanlık (Arapça)'),
(563, 'Mütercim-Tercümanlık (Bulgarca)'),
(564, 'Mütercim-Tercümanlık (Çift Dilli: İngilizce-Almanca)'),
(565, 'Mütercim-Tercümanlık (Çift Dilli: İngilizce-Fransızca)'),
(566, 'Mütercim-Tercümanlık (Çince)'),
(567, 'Mütercim-Tercümanlık (Farsça)'),
(568, 'Mütercim-Tercümanlık (Fransızca)'),
(569, 'Mütercim-Tercümanlık (İngilizce)'),
(570, 'Mütercim-Tercümanlık (Rusça)'),
(571, 'Mütercim-Tercümanlık (Türkçe-İngilizce-Fransızca)'),
(572, 'Mütercim-Tercümanlık (Türkçe-Almanca-İngilizce)'),
(573, 'Polonya Dili Ve Kültürü (Lehçe)'),
(574, 'Rus Dili Ve Edebiyatı'),
(575, 'Sinoloji'),
(576, 'Sümeroloji'),
(577, 'Urdu Dili Ve Edebiyatı'),
(578, 'Yunan Dili Ve Edebiyatı'),
(579, 'Zaza Dili Ve Edebiyatı'),
(580, 'Bahçe Bitkileri'),
(581, 'Bitki Koruma'),
(582, 'Bitkisel Üretim'),
(583, 'Bitkisel Üretim Ve Teknolojileri'),
(584, 'Hayvansal Üretim'),
(585, 'Organik Tarım İşletmeciliği'),
(586, 'Orman Endüstrisi Mühendisliği'),
(587, 'Orman Mühendisliği'),
(588, 'Performans'),
(589, 'Süt Teknolojisi'),
(590, 'Tarım Ekonomisi'),
(591, 'Tarım Makineleri'),
(592, 'Tarım Teknolojisi'),
(593, 'Tarımsal Biyoteknoloji'),
(594, 'Tarımsal Genetik Mühendisliği'),
(595, 'Tarımsal Yapılar Ve Sulama'),
(596, 'Tarla Bitkileri'),
(597, 'Toprak'),
(598, 'Toprak Bilimi Ve Bitki Besleme'),
(599, 'Tütün Eksperliği Yüksekokulu'),
(600, 'Yaban Hayatı Ekolojisi Ve Yönetimi'),
(601, 'Zeotekni'),
(602, 'Ziraat Mühendisliği'),
(604, 'Antropoloji');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kullanici_resim` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_tc` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_ad` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_mail` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_adres` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_il` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_unvan` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_yetki` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT '1',
  `kullanici_cv` text COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_resim`, `kullanici_tc`, `kullanici_ad`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_yetki`, `kullanici_durum`, `kullanici_cv`) VALUES
(6, '', '', '', 'info@burcces.com', '', 'd192b22ac15a1873899faa5d57186459', 'Burssec.com', '', '', '', '', '1', 1, ''),
(7, 'images/slider/22340276712886020717IMG-20180122-WA0219.jpg', '', '', 'deneme@gmail.com', '+901234567889', '3354045a397621cd92406f1f98cde292', 'Deneme Deneme', 'Deneme Adresi', 'İl', 'İlçe', '', '1', 1, ''),
(9, 'images/slider/29709280452671729666featured_img1.jpg', '', '', 'deneme@hotmail.com', '+901234567889', 'e10adc3949ba59abbe56e057f20f883e', 'Deneme2 deneme2', 'Deneme2 adresi', 'Denem2İl', 'Denem2İlçe', '', '1', 1, 'Deneme'),
(11, 'images/slider/20222303072497227098IMG-20200128-WA0038.jpg', '11111111111', 'deneme3', 'denem3@outlook.com', '05555555555', '311513b765865beb4fd5e187fadeeb00', 'Deneme3', 'Adres3', 'İl3', 'İlçe3', '', '5', 1, 'Burdur Mehmet Akif Ersoy Üniversitesi Bilgisayar Mühendisliği son sınıf öğrencisi.'),
(13, '', '', '', 'deneme4@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'Deneme4', '', '', '', '', '1', 1, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_ad` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_detay` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_url` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_sira` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_durum` enum('0','1') COLLATE utf8mb4_turkish_ci NOT NULL,
  `menu_seourl` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(1, '1', 'HAKKIMIZDA', '', 'hakkimizda', '0', '1', 'hakkimizda'),
(2, '1', 'İLETİSİM', '', 'iletisim', '2', '1', 'iletisim'),
(3, '1', 'ÜYE OL', '', 'uye-ol', '3', '1', 'uye-ol'),
(4, '1', '404 ', '', '404', '2', '1', '404'),
(8, '', 'GİRİS YAP', '', 'giris-yap', '3', '1', 'giris-yap'),
(9, '', 'KATEGORİLER', '<p>buraya kategoriler</p>\r\n', '', '0', '1', 'kategoriler');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_kategori` int(11) NOT NULL,
  `slider_ekleyen` int(11) NOT NULL,
  `slider_resimyol` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_link` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `slider_durum` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1',
  `slider_icerik` text COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_kategori`, `slider_ekleyen`, `slider_resimyol`, `slider_sira`, `slider_link`, `slider_durum`, `slider_icerik`) VALUES
(4, 'BİDEB 2214/A ve 2219 Programları ', 1, 5, 'images/slider/284862387325411222822219_ana_1_1.jpg', 0, '', '1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, '2242 Üniversite Öğrencileri Araştırma Proje Yarışmaları', 402, 5, 'images/slider/25828237672164623903ana_2242.jpg', 1, '', '1', ''),
(7, 'Kız Öğrenciler Bilim Genç Kafe’de Kadın Bilim İnsanlarımızla Buluşuyor', 0, 5, 'images/slider/31212258482736720005ana_bilim_genc_kafe.jpg', 2, '', '1', ''),
(8, 'TÜBİTAK İnsansız Hava Araçları (İHA) Yarışlarında İlk Defa Lise Öğrencilerimiz Birbirleriyle Yarışac', 0, 7, 'images/slider/20595285572128323276ana-lise-iha.jpg', 3, '', '1', ''),
(9, 'MARTERA 2020 Yılı Çağrısı Açıldı', 0, 7, 'images/slider/22984266843188331615ana-martera.jpg', 5, '', '1', ''),
(10, '2510 TÜBİTAK-MHESR (Tunus) Ortak Proje Çağrısı Sonuçları Açıklandı', 0, 0, 'images/slider/31867298182825025342mhesr-ana_0.jpg', 4, '', '1', ''),
(56, 'DENEME ', 25, 7, 'images/slider/22622238633041224662featured_img1.jpg', 0, '', '0', 'Bu bir deneme yazısıdır. Proje kontrol için girilmiştir.'),
(60, 'PHP Tabanlı Web Uygulaması', 193, 7, 'images/slider/30685265972804323996', 0, '', '1', 'Bu deneme duyurusudur.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `basvuru_kriter`
--
ALTER TABLE `basvuru_kriter`
  ADD PRIMARY KEY (`kriter_id`),
  ADD KEY `slider_id` (`slider_id`);

--
-- Tablo için indeksler `gelen_basvuru`
--
ALTER TABLE `gelen_basvuru`
  ADD PRIMARY KEY (`gelen_basvuru_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `basvuru_kriter`
--
ALTER TABLE `basvuru_kriter`
  MODIFY `kriter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Tablo için AUTO_INCREMENT değeri `gelen_basvuru`
--
ALTER TABLE `gelen_basvuru`
  MODIFY `gelen_basvuru_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
