-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2017 at 02:04 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(14, 'Baju Gamis'),
(13, 'Baju Formal'),
(18, 'Blouse'),
(17, 'kaos polos'),
(19, 'baju santai'),
(20, 'batik muslim');

-- --------------------------------------------------------

--
-- Table structure for table `detail_order_product`
--

CREATE TABLE `detail_order_product` (
  `id_order_product` int(10) NOT NULL,
  `id_product` int(20) NOT NULL,
  `jumlah_s` int(10) NOT NULL,
  `jumlah_l` int(10) NOT NULL,
  `jumlah_m` int(10) NOT NULL,
  `jumlah_xl` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_order_product`
--

INSERT INTO `detail_order_product` (`id_order_product`, `id_product`, `jumlah_s`, `jumlah_l`, `jumlah_m`, `jumlah_xl`) VALUES
(104, 53, 5, 8, 7, 9),
(105, 52, 2, 3, 1, 3),
(105, 54, 0, 1, 3, 2),
(106, 53, 2, 3, 2, 3),
(107, 53, 1, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(5) NOT NULL,
  `id_product` int(5) NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_keranjang` date NOT NULL,
  `qty_s` int(10) NOT NULL,
  `qty_m` int(10) NOT NULL,
  `qty_l` int(10) NOT NULL,
  `qty_xl` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(45) DEFAULT NULL,
  `tarif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `tarif`) VALUES
(1, 'ACEH SELATAN', 15000),
(2, 'ACEH TENGGARA', 15000),
(3, 'ACEH TIMUR', 15000),
(4, 'ACEH TENGAH', 15000),
(5, 'ACEH BARAT', 15000),
(6, 'ACEH BESAR', 15000),
(7, 'PIDIE', 15000),
(8, 'ACEH UTARA', 15000),
(9, 'SIMEULUE', 15000),
(10, 'ACEH SINGKIL', 15000),
(11, 'BIREUEN', 15000),
(12, 'ACEH BARAT DAYA', 15000),
(13, 'GAYO LUES', 15000),
(14, 'ACEH JAYA', 15000),
(15, 'NAGAN RAYA', 15000),
(16, 'ACEH TAMIANG', 15000),
(17, 'BENER MERIAH', 15000),
(18, 'PIDIE JAYA', 15000),
(19, 'KOTA BANDA ACEH', 15000),
(20, 'KOTA SABANG', 15000),
(21, 'KOTA LHOKSEUMAWE', 15000),
(22, 'KOTA LANGSA', 15000),
(23, 'KOTA SUBULUSSALAM', 15000),
(24, 'LABUHANBATU SELATAN', 15000),
(25, 'LABUHANBATU UTARA', 15000),
(26, 'NIAS UTARA', 15000),
(27, 'NIAS BARAT', 15000),
(28, 'KOTA GUNUNGSITOLI', 15000),
(29, 'TAPANULI TENGAH', 15000),
(30, 'TAPANULI UTARA', 15000),
(31, 'TAPANULI SELATAN', 15000),
(32, 'NIAS', 15000),
(33, 'LANGKAT', 15000),
(34, 'KARO', 15000),
(35, 'DELI SERDANG', 15000),
(36, 'SIMALUNGUN', 15000),
(37, 'ASAHAN', 15000),
(38, 'LABUHANBATU', 15000),
(39, 'DAIRI', 15000),
(40, 'TOBA SAMOSIR', 15000),
(41, 'MANDAILING NATAL', 15000),
(42, 'NIAS SELATAN', 15000),
(43, 'PAKPAK BHARAT', 15000),
(44, 'HUMBANG HASUNDUTAN', 15000),
(45, 'SAMOSIR', 15000),
(46, 'SERDANG BEDAGAI', 15000),
(47, 'BATU BARA', 15000),
(48, 'KOTA MEDAN', 15000),
(49, 'KOTA PEMATANGSIANTAR', 15000),
(50, 'KOTA SIBOLGA', 15000),
(51, 'KOTA TANJUNG BALAI', 15000),
(52, 'KOTA BINJAI', 15000),
(53, 'KOTA TEBING TINGGI', 15000),
(54, 'KOTA PADANG SIDIMPUAN', 15000),
(55, 'PADANG LAWAS UTARA', 15000),
(56, 'PADANG LAWAS', 15000),
(57, 'PESISIR SELATAN', 15000),
(58, 'SOLOK', 15000),
(59, 'SIJUNJUNG', 15000),
(60, 'TANAH DATAR', 15000),
(61, 'PADANG PARIAMAN', 15000),
(62, 'AGAM', 15000),
(63, 'LIMA PULUH KOTA', 15000),
(64, 'PASAMAN', 15000),
(65, 'KEPULAUAN MENTAWAI', 15000),
(66, 'DHARMASRAYA', 15000),
(67, 'SOLOK SELATAN', 15000),
(68, 'PASAMAN BARAT', 15000),
(69, 'KOTA PADANG', 15000),
(70, 'KOTA SOLOK', 15000),
(71, 'KOTA SAWAHLUNTO', 15000),
(72, 'KOTA PADANG PANJANG', 15000),
(73, 'KOTA BUKITTINGGI', 15000),
(74, 'KOTA PAYAKUMBUH', 15000),
(75, 'KOTA PARIAMAN', 15000),
(76, 'KEPULAUAN MERANTI', 15000),
(77, 'KAMPAR', 15000),
(78, 'INDRAGIRI HULU', 15000),
(79, 'BENGKALIS', 15000),
(80, 'INDRAGIRI HILIR', 15000),
(81, 'PELALAWAN', 15000),
(82, 'ROKAN HULU', 15000),
(83, 'ROKAN HILIR', 15000),
(84, 'SIAK', 15000),
(85, 'KUANTAN SINGINGI', 15000),
(86, 'KOTA PEKANBARU', 15000),
(87, 'KOTA DUMAI', 15000),
(88, 'KOTA SUNGAI PENUH', 15000),
(89, 'KERINCI', 15000),
(90, 'MERANGIN', 15000),
(91, 'SAROLANGUN', 15000),
(92, 'BATANGHARI', 15000),
(93, 'MUARO JAMBI', 15000),
(94, 'TANJUNG JABUNG BARAT', 15000),
(95, 'TANJUNG JABUNG TIMUR', 15000),
(96, 'BUNGO', 15000),
(97, 'TEBO', 15000),
(98, 'KOTA JAMBI', 15000),
(99, 'OGAN KOMERING ULU', 15000),
(100, 'OGAN KOMERING ILIR', 15000),
(101, 'MUARA ENIM', 15000),
(102, 'LAHAT', 15000),
(103, 'MUSI RAWAS', 15000),
(104, 'MUSI BANYUASIN', 15000),
(105, 'BANYUASIN', 15000),
(106, 'OGAN KOMERING ULU TIMUR', 15000),
(107, 'OGAN KOMERING ULU SELATAN', 15000),
(108, 'OGAN ILIR', 15000),
(109, 'EMPAT LAWANG', 15000),
(110, 'KOTA PALEMBANG', 15000),
(111, 'KOTA PAGAR ALAM', 15000),
(112, 'KOTA LUBUKLINGGAU', 15000),
(113, 'KOTA PRABUMULIH', 15000),
(114, 'BENGKULU TENGAH', 15000),
(115, 'BENGKULU SELATAN', 15000),
(116, 'REJANG LEBONG', 15000),
(117, 'BENGKULU UTARA', 15000),
(118, 'KAUR', 15000),
(119, 'SELUMA', 15000),
(120, 'MUKOMUKO', 15000),
(121, 'LEBONG', 15000),
(122, 'KEPAHIANG', 15000),
(123, 'KOTA BENGKULU', 15000),
(124, 'PRINGSEWU', 15000),
(125, 'MESUJI', 15000),
(126, 'TULANG BAWANG BARAT', 15000),
(127, 'LAMPUNG SELATAN', 15000),
(128, 'LAMPUNG TENGAH', 15000),
(129, 'LAMPUNG UTARA', 15000),
(130, 'LAMPUNG BARAT', 15000),
(131, 'TULANG BAWANG', 15000),
(132, 'TANGGAMUS', 15000),
(133, 'LAMPUNG TIMUR', 15000),
(134, 'WAY KANAN', 15000),
(135, 'KOTA BANDAR LAMPUNG', 15000),
(136, 'KOTA METRO', 15000),
(137, 'PESAWARAN', 15000),
(138, 'BANGKA', 15000),
(139, 'BELITUNG', 15000),
(140, 'BANGKA SELATAN', 15000),
(141, 'BANGKA TENGAH', 15000),
(142, 'BANGKA BARAT', 15000),
(143, 'BELITUNG TIMUR', 15000),
(144, 'KOTA PANGKALPINANG', 15000),
(145, 'KOTA TANJUNGPINANG', 15000),
(146, 'KEPULAUAN ANAMBAS', 15000),
(147, 'BINTAN', 15000),
(148, 'KARIMUN', 15000),
(149, 'NATUNA', 15000),
(150, 'LINGGA', 15000),
(151, 'KOTA BATAM', 15000),
(152, 'KEPULAUAN SERIBU', 15000),
(153, 'JAKARTA PUSAT', 15000),
(154, 'JAKARTA UTARA', 15000),
(155, 'JAKARTA BARAT', 15000),
(156, 'JAKARTA SELATAN', 15000),
(157, 'JAKARTA TIMUR', 15000),
(158, 'BOGOR', 15000),
(159, 'SUKABUMI', 15000),
(160, 'CIANJUR', 15000),
(162, 'GARUT', 15000),
(163, 'TASIKMALAYA', 15000),
(164, 'CIAMIS', 15000),
(165, 'KUNINGAN', 15000),
(166, 'CIREBON', 15000),
(167, 'MAJALENGKA', 15000),
(168, 'SUMEDANG', 15000),
(169, 'INDRAMAYU', 15000),
(170, 'SUBANG', 15000),
(171, 'PURWAKARTA', 15000),
(172, 'KARAWANG', 15000),
(173, 'BEKASI', 15000),
(174, 'BANDUNG BARAT', 15000),
(175, 'KOTA BOGOR', 15000),
(176, 'KOTA SUKABUMI', 15000),
(177, 'KOTA BANDUNG', 15000),
(178, 'KOTA CIREBON', 15000),
(179, 'KOTA BEKASI', 15000),
(180, 'KOTA DEPOK', 15000),
(181, 'KOTA CIMAHI', 15000),
(182, 'KOTA TASIKMALAYA', 15000),
(183, 'KOTA BANJAR', 15000),
(184, 'CILACAP', 15000),
(185, 'BANYUMAS', 15000),
(186, 'PURBALINGGA', 15000),
(187, 'BANJARNEGARA', 15000),
(188, 'KEBUMEN', 15000),
(189, 'PURWOREJO', 15000),
(190, 'WONOSOBO', 15000),
(191, 'MAGELANG', 15000),
(192, 'BOYOLALI', 15000),
(193, 'KLATEN', 15000),
(194, 'SUKOHARJO', 15000),
(195, 'WONOGIRI', 15000),
(196, 'KARANGANYAR', 15000),
(197, 'SRAGEN', 15000),
(198, 'GROBOGAN', 15000),
(199, 'BLORA', 15000),
(200, 'REMBANG', 15000),
(201, 'PATI', 15000),
(202, 'KUDUS', 15000),
(203, 'JEPARA', 15000),
(204, 'DEMAK', 15000),
(205, 'SEMARANG', 15000),
(206, 'TEMANGGUNG', 15000),
(207, 'KENDAL', 15000),
(208, 'BATANG', 15000),
(209, 'PEKALONGAN', 15000),
(210, 'PEMALANG', 15000),
(211, 'TEGAL', 15000),
(212, 'BREBES', 15000),
(213, 'KOTA MAGELANG', 15000),
(214, 'KOTA SURAKARTA', 15000),
(215, 'KOTA SALATIGA', 15000),
(216, 'KOTA SEMARANG', 15000),
(217, 'KOTA PEKALONGAN', 15000),
(218, 'KOTA TEGAL', 15000),
(219, 'KULON PROGO', 15000),
(220, 'BANTUL', 15000),
(221, 'GUNUNGKIDUL', 15000),
(222, 'SLEMAN', 15000),
(223, 'KOTA YOGYAKARTA', 15000),
(224, 'PACITAN', 15000),
(225, 'PONOROGO', 15000),
(226, 'TRENGGALEK', 15000),
(227, 'TULUNGAGUNG', 15000),
(228, 'BLITAR', 15000),
(229, 'KEDIRI', 15000),
(230, 'MALANG', 15000),
(231, 'LUMAJANG', 15000),
(232, 'JEMBER', 15000),
(233, 'BANYUWANGI', 15000),
(234, 'BONDOWOSO', 15000),
(235, 'SITUBONDO', 15000),
(236, 'PROBOLINGGO', 15000),
(237, 'PASURUAN', 15000),
(238, 'SIDOARJO', 15000),
(239, 'MOJOKERTO', 15000),
(240, 'JOMBANG', 15000),
(241, 'NGANJUK', 15000),
(242, 'MADIUN', 15000),
(243, 'MAGETAN', 15000),
(244, 'NGAWI', 15000),
(245, 'BOJONEGORO', 15000),
(246, 'TUBAN', 15000),
(247, 'LAMONGAN', 15000),
(248, 'GRESIK', 15000),
(249, 'BANGKALAN', 15000),
(250, 'SAMPANG', 15000),
(251, 'PAMEKASAN', 15000),
(252, 'SUMENEP', 15000),
(253, 'KOTA KEDIRI', 15000),
(254, 'KOTA BLITAR', 15000),
(255, 'KOTA MALANG', 15000),
(256, 'KOTA PROBOLINGGO', 15000),
(257, 'KOTA PASURUAN', 15000),
(258, 'KOTA MOJOKERTO', 15000),
(259, 'KOTA MADIUN', 15000),
(260, 'KOTA SURABAYA', 15000),
(261, 'KOTA BATU', 15000),
(262, 'PANDEGLANG', 15000),
(263, 'LEBAK', 15000),
(264, 'TANGERANG', 15000),
(265, 'SERANG', 15000),
(266, 'KOTA TANGERANG', 15000),
(267, 'KOTA CILEGON', 15000),
(268, 'KOTA SERANG', 15000),
(269, 'KOTA TANGERANG SELATAN', 15000),
(270, 'JEMBRANA', 15000),
(271, 'TABANAN', 15000),
(272, 'BADUNG', 15000),
(273, 'GIANYAR', 15000),
(274, 'KLUNGKUNG', 15000),
(275, 'BANGLI', 15000),
(276, 'KARANGASEM', 15000),
(277, 'BULELENG', 15000),
(278, 'KOTA DENPASAR', 15000),
(279, 'LOMBOK BARAT', 15000),
(280, 'LOMBOK TENGAH', 15000),
(281, 'LOMBOK TIMUR', 15000),
(282, 'SUMBAWA', 15000),
(283, 'DOMPU', 15000),
(284, 'BIMA', 15000),
(285, 'SUMBAWA BARAT', 15000),
(286, 'KOTA MATARAM', 15000),
(287, 'KOTA BIMA', 15000),
(288, 'LOMBOK UTARA', 15000),
(289, 'KUPANG', 15000),
(290, 'TIMOR TENGAH SELATAN', 15000),
(291, 'TIMOR TENGAH UTARA', 15000),
(292, 'BELU', 15000),
(293, 'ALOR', 15000),
(294, 'FLORES TIMUR', 15000),
(295, 'SIKKA', 15000),
(296, 'ENDE', 15000),
(297, 'NGADA', 15000),
(298, 'MANGGARAI', 15000),
(299, 'SUMBA TIMUR', 15000),
(300, 'SUMBA BARAT', 15000),
(301, 'LEMBATA', 15000),
(302, 'ROTE NDAO', 15000),
(303, 'MANGGARAI BARAT', 15000),
(304, 'NAGEKEO', 15000),
(305, 'SUMBA TENGAH', 15000),
(306, 'SUMBA BARAT DAYA', 15000),
(307, 'KOTA KUPANG', 15000),
(308, 'MANGGARAI TIMUR', 15000),
(309, 'SABU RAIJUA', 15000),
(310, 'SAMBAS', 15000),
(311, 'PONTIANAK', 15000),
(312, 'SANGGAU', 15000),
(313, 'KETAPANG', 15000),
(314, 'SINTANG', 15000),
(315, 'KAPUAS HULU', 15000),
(316, 'BENGKAYANG', 15000),
(317, 'LANDAK', 15000),
(318, 'SEKADAU', 15000),
(319, 'MELAWI', 15000),
(320, 'KAYONG UTARA', 15000),
(321, 'KOTA PONTIANAK', 15000),
(322, 'KOTA SINGKAWANG', 15000),
(323, 'KUBU RAYA', 15000),
(324, 'KOTAWARINGIN BARAT', 15000),
(325, 'KOTAWARINGIN TIMUR', 15000),
(326, 'KAPUAS', 15000),
(327, 'BARITO SELATAN', 15000),
(328, 'BARITO UTARA', 15000),
(329, 'KATINGAN', 15000),
(330, 'SERUYAN', 15000),
(331, 'SUKAMARA', 15000),
(332, 'LAMANDAU', 15000),
(333, 'GUNUNG MAS', 15000),
(334, 'PULANG PISAU', 15000),
(335, 'MURUNG RAYA', 15000),
(336, 'BARITO TIMUR', 15000),
(337, 'KOTA PALANGKARAYA', 15000),
(338, 'TANAH LAUT', 15000),
(339, 'KOTABARU', 15000),
(340, 'BANJAR', 15000),
(341, 'BARITO KUALA', 15000),
(342, 'TAPIN', 15000),
(343, 'HULU SUNGAI SELATAN', 15000),
(344, 'HULU SUNGAI TENGAH', 15000),
(345, 'HULU SUNGAI UTARA', 15000),
(346, 'TABALONG', 15000),
(347, 'TANAH BUMBU', 15000),
(348, 'BALANGAN', 15000),
(349, 'KOTA BANJARMASIN', 15000),
(350, 'KOTA BANJARBARU', 15000),
(351, 'PASER', 15000),
(352, 'KUTAI KARTANEGARA', 15000),
(353, 'BERAU', 15000),
(354, 'BULUNGAN', 15000),
(355, 'NUNUKAN', 15000),
(356, 'MALINAU', 15000),
(357, 'KUTAI BARAT', 15000),
(358, 'KUTAI TIMUR', 15000),
(359, 'PENAJAM PASER UTARA', 15000),
(360, 'KOTA BALIKPAPAN', 15000),
(361, 'KOTA SAMARINDA', 15000),
(362, 'KOTA TARAKAN', 15000),
(363, 'KOTA BONTANG', 15000),
(364, 'TANA TIDUNG', 15000),
(365, 'BOLAANG MONGONDOW TIMUR', 15000),
(366, 'BOLAANG MONGONDOW SELATAN', 15000),
(367, 'BOLAANG MONGONDOW', 15000),
(368, 'MINAHASA', 15000),
(369, 'KEPULAUAN SANGIHE', 15000),
(370, 'KEPULAUAN TALAUD', 15000),
(371, 'MINAHASA SELATAN', 15000),
(372, 'MINAHASA UTARA', 15000),
(373, 'MINAHASA TENGGARA', 15000),
(374, 'BOLAANG MONGONDOW UTARA', 15000),
(375, 'KEP. SIAU TAGULANDANG BIARO', 15000),
(376, 'KOTA MANADO', 15000),
(377, 'KOTA BITUNG', 15000),
(378, 'KOTA TOMOHON', 15000),
(379, 'KOTA KOTAMOBAGU', 15000),
(380, 'SIGI', 15000),
(381, 'BANGGAI', 15000),
(382, 'POSO', 15000),
(383, 'DONGGALA', 15000),
(384, 'TOLITOLI', 15000),
(385, 'BUOL', 15000),
(386, 'MOROWALI', 15000),
(387, 'BANGGAI KEPULAUAN', 15000),
(388, 'PARIGI MOUTONG', 15000),
(389, 'TOJO UNA-UNA', 15000),
(390, 'KOTA PALU', 15000),
(391, 'TORAJA UTARA', 15000),
(392, 'KEPULAUAN SELAYAR', 15000),
(393, 'BULUKUMBA', 15000),
(394, 'BANTAENG', 15000),
(395, 'JENEPONTO', 15000),
(396, 'TAKALAR', 15000),
(397, 'GOWA', 15000),
(398, 'SINJAI', 15000),
(399, 'BONE', 15000),
(400, 'MAROS', 15000),
(401, 'PANGKAJENE DAN KEPULAUAN', 15000),
(402, 'BARRU', 15000),
(403, 'SOPPENG', 15000),
(404, 'WAJO', 15000),
(405, 'SIDENRENG RAPPANG', 15000),
(406, 'PINRANG', 15000),
(407, 'ENREKANG', 15000),
(408, 'LUWU', 15000),
(409, 'TANA TORAJA', 15000),
(410, 'LUWU UTARA', 15000),
(411, 'LUWU TIMUR', 15000),
(412, 'KOTA MAKASSAR', 15000),
(413, 'KOTA PARE PARE', 15000),
(414, 'KOTA PALOPO', 15000),
(415, 'KOLAKA', 15000),
(416, 'KONAWE', 15000),
(417, 'MUNA', 15000),
(418, 'BUTON', 15000),
(419, 'KONAWE SELATAN', 15000),
(420, 'BOMBANA', 15000),
(421, 'WAKATOBI', 15000),
(422, 'KOLAKA UTARA', 15000),
(423, 'KONAWE UTARA', 15000),
(424, 'BUTON UTARA', 15000),
(425, 'KOTA KENDARI', 15000),
(426, 'KOTA BAU BAU', 15000),
(427, 'GORONTALO', 15000),
(428, 'BOALEMO', 15000),
(429, 'BONE BOLANGO', 15000),
(430, 'PAHUWATO', 15000),
(431, 'GORONTALO UTARA', 15000),
(432, 'KOTA GORONTALO', 15000),
(433, 'MAMUJU UTARA', 15000),
(434, 'MAMUJU', 15000),
(435, 'MAMASA', 15000),
(436, 'POLEWALI MANDAR', 15000),
(437, 'MAJENE', 15000),
(438, 'MALUKU BARAT DAYA', 15000),
(439, 'BURU SELATAN', 15000),
(440, 'MALUKU TENGAH', 15000),
(441, 'MALUKU TENGGARA', 15000),
(442, 'MALUKU TENGGARA BARAT', 15000),
(443, 'BURU', 15000),
(444, 'SERAM BAGIAN TIMUR', 15000),
(445, 'SERAM BAGIAN BARAT', 15000),
(446, 'KEPULAUAN ARU', 15000),
(447, 'KOTA AMBON', 15000),
(448, 'KOTA TUAL', 15000),
(449, 'PULAU MOROTAI', 15000),
(450, 'HALMAHERA BARAT', 15000),
(451, 'HALMAHERA TENGAH', 15000),
(452, 'HALMAHERA UTARA', 15000),
(453, 'HALMAHERA SELATAN', 15000),
(454, 'KEPULAUAN SULA', 15000),
(455, 'HALMAHERA TIMUR', 15000),
(456, 'KOTA TERNATE', 15000),
(457, 'KOTA TIDORE KEPULAUAN', 15000),
(458, 'INTAN JAYA', 15000),
(459, 'DEIYAI', 15000),
(460, 'TOLIKARA', 15000),
(461, 'WAROPEN', 15000),
(462, 'BOVEN DIGOEL', 15000),
(463, 'MAPPI', 15000),
(464, 'ASMAT', 15000),
(465, 'SUPIORI', 15000),
(466, 'MAMBERAMO RAYA', 15000),
(467, 'KOTA JAYAPURA', 15000),
(468, 'MAMBERAMO TENGAH', 15000),
(469, 'YALIMO', 15000),
(470, 'LANNY JAYA', 15000),
(471, 'NDUGA', 15000),
(472, 'PUNCAK', 15000),
(473, 'DOGIYAI', 15000),
(474, 'MERAUKE', 15000),
(475, 'JAYAWIJAYA', 15000),
(476, 'JAYAPURA', 15000),
(477, 'NABIRE', 15000),
(478, 'KEPULAUAN YAPEN', 15000),
(479, 'BIAK NUMFOR', 15000),
(480, 'PUNCAK JAYA', 15000),
(481, 'PANIAI', 15000),
(482, 'MIMIKA', 15000),
(483, 'SARMI', 15000),
(484, 'KEEROM', 15000),
(485, 'PEGUNUNGAN BINTANG', 15000),
(486, 'YAHUKIMO', 15000),
(487, 'MAYBRAT', 15000),
(488, 'TAMBRAUW', 15000),
(489, 'SORONG', 15000),
(490, 'MANOKWARI', 15000),
(491, 'FAKFAK', 15000),
(492, 'SORONG SELATAN', 15000),
(493, 'RAJA AMPAT', 15000),
(494, 'TELUK BINTUNI', 15000),
(495, 'TELUK WONDAMA', 15000),
(496, 'KAIMANA', 15000),
(497, 'KOTA SORONG', 15000),
(499, 'BANDUNG', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `id_pemesan` varchar(100) NOT NULL,
  `kodepembayaran` varchar(10) NOT NULL,
  `id_pelanggan` int(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `id_kota` int(10) NOT NULL,
  `jumlah_item` int(10) NOT NULL,
  `ongkir` varchar(50) NOT NULL,
  `hargatotal` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'New',
  `tanggal` date NOT NULL,
  `buktitf` varchar(100) NOT NULL,
  `statusupload` varchar(10) NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `id_pemesan`, `kodepembayaran`, `id_pelanggan`, `name`, `email`, `kodepos`, `address`, `phone`, `id_kota`, `jumlah_item`, `ongkir`, `hargatotal`, `status`, `tanggal`, `buktitf`, `statusupload`) VALUES
(107, 'j69fv8i8cfju10ecdj9i0r2514', '', 6, 'seno', 'seno@gmail.com', '57313', 'solo', 748247198, 223, 6, '15000', '1742385', 'New', '2017-01-30', '', 'N'),
(106, 'j69fv8i8cfju10ecdj9i0r2514', '', 1, 'andy', 'andygrap@gmail.com', '57313', 'pusung rt 04 rw 07 banaran boyolali boyolali', 75474574, 192, 10, '30000', '2908975', 'New', '2017-01-30', '', 'N'),
(105, 'dc815adp4k0itbk95s5ue962c4', '', 1, 'andy', 'andygrap@gmail.com', '57313', 'pusung rt 04 rw 07 banaran boyolali boyolali', 75474574, 12, 15, '45000', '1869399', 'New', '2017-01-30', '', 'N'),
(104, 'dc815adp4k0itbk95s5ue962c4', '', 1, 'andy', 'andygrap@gmail.com', '57313', 'pusung rt 04 rw 07 banaran boyolali boyolali', 75474574, 1, 29, '108750', '8788450', 'New', '2017-01-30', '', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kodepos` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_pertanyaan` int(10) NOT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `email`, `kodepos`, `alamat`, `no_hp`, `username`, `password`, `id_pertanyaan`, `jawaban`) VALUES
(1, 'andy', 'andygrap@gmail.com', '57313', 'pusung rt 04 rw 07 banaran boyolali boyolali', '075474574', 'andyptra', 'acc3c2174475376a52ccb67c19b452cf', 2, 'eskrim'),
(4, 'andy', '', '', 'ewqeqw', 'admin', 'admin', '5aea4c4eccafe78dfd0388a49f20b8e7', 2, 'ewq'),
(6, 'seno', '', '', 'solo', '0748247198', 'seno', 'acc3c2174475376a52ccb67c19b452cf', 1, 'senu');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan_keamanan`
--

CREATE TABLE `pertanyaan_keamanan` (
  `id_pertanyaan` int(10) NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan_keamanan`
--

INSERT INTO `pertanyaan_keamanan` (`id_pertanyaan`, `pertanyaan`) VALUES
(1, 'siapa nama panggilan anda waktu kecil?'),
(2, 'apa makanan favorite anda?'),
(3, 'siapa teman terbaik anda saat ini?'),
(4, 'dimana anda menghabiskan liburan tahun lalu?'),
(5, 'siapa tokoh superhero favorite anda?');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `diskon` int(10) NOT NULL,
  `stok_s` int(10) NOT NULL,
  `stok_m` int(10) NOT NULL,
  `stok_l` int(10) NOT NULL,
  `stok_xl` int(10) NOT NULL,
  `price` bigint(20) NOT NULL,
  `feature_image` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id_category` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `diskon`, `stok_s`, `stok_m`, `stok_l`, `stok_xl`, `price`, `feature_image`, `image`, `id_category`, `deskripsi`) VALUES
(52, 'spring shirt', 10, 3, 4, 2, 2, 100000, '1484453822_s1.jpg', '1484450935_s2.jpg|1484450935_s3.jpg|1484450935_s4.jpg', 18, 'barang bagus mulus halus nyaman'),
(53, 'ella dira navy', 5, 2, 1, 0, 1, 319000, '1484714345_1.jpg', '1484714387_4.jpg|1484714387_1.jpg|1484714387_3.jpg|1484714387_2.jpg', 14, '<div><font color="#000000">Linen Ryiesha koleksi atasan dari ELLA DIRA yang menampilkan desain clean cut dengan aksen ruffle.</font></div><div><font color="#000000"><br></font></div><div><font color="#000000">- Linen sub fabric</font></div><div><font color="#000000">- Navy</font></div><div><font color="#000000">- Kerah bulat</font></div><div><font color="#000000">- Lengan panjang</font></div><div><font color="#000000">- Regular fit</font></div>'),
(54, 'zalia Half Placket Denim Long', 7, 5, 2, 4, 3, 199000, '1484714817_2_(1).jpg', '1484714845_4_(1).jpg|1484714852_3_(1).jpg|1484714852_2_(1).jpg|1484714852_1_(1).jpg', 18, '<div>- Blus</div><div>- Katun kombinasi</div><div>- Biru</div><div>- Detail kerah</div><div>- Lengan panjang</div><div>- Kancing depan</div><div>- Detail washed</div><div>- Regular fit</div>'),
(55, 'Embellished Wide Sleeve Swing', 6, 4, 3, 3, 3, 379000, '1484714928_1_(2).jpg', '1484714931_2_(2).jpg|1484714937_4_(2).jpg|1484714937_1_(2).jpg|1484714937_3_(2).jpg', 18, '<div>Koleksi swing tops selalu terlihat on point dan penuh gaya. Zalia membuktikannya dengan Embellished Wide Sleeve Swing Top yang hadir dalam siluet clean dan minimalis dengan desain flare sleeve untuk volume tubuh yang tepat.</div><div><br></div><div>- Poliester kombinasi</div><div>- Warna baby blue</div><div>- Kerah bulat</div><div>- Lengan 3/4</div><div>- Resleting belakang</div><div>- Regular fit</div>'),
(56, 'Allegra Tunic', 3, 5, 5, 5, 5, 425000, '1484714996_1_(3).jpg', '1484715010_4_(3).jpg|1484715020_3_(3).jpg|1484715020_2_(3).jpg|1484715020_1_(3).jpg', 14, '<div>Allegra Tunic by Monel</div><div><br></div><div>- Katun kombinasi</div><div>- Warna navy</div><div>- Kerah V</div><div>- Lengan panjang</div><div>- Detail rib pada hem</div><div>- Regular fit</div>'),
(57, 'Ombre Maxi Cardigan', 8, 5, 5, 5, 5, 279000, '1484715477_1_(4).jpg', '1484715482_4_(4).jpg|1484715488_1_(4).jpg|1484715488_3_(4).jpg|1484715488_2_(4).jpg', 19, '<div>- Poliester</div><div>- Warna navy</div><div>- Lengan panjang</div><div>- Bagian depan terbuka</div><div>- Detail ombre print</div><div>- Panjang maxi length</div><div>- Bahan lembut</div><div>- Regular fit</div><div>- Unlined</div>'),
(58, 'aira muslim blouse', 0, 5, 5, 5, 5, 245000, '1484716217_1_(5).jpg', '1484716222_4_(5).jpg|1484716222_1_(5).jpg|1484716222_3_(5).jpg|1484716222_2_(5).jpg', 20, '<div>Inspirasi gaya hijab modern dari Aira Muslim Butik. Arini Blouse, koleksi dengan material lembut yang semakin cantik dalam kombinasi nuansa floral. Beautiful!</div><div><br></div><div>- Katun</div><div>- Broken white</div><div>- Kerah bulat</div><div>- Lengan panjang</div><div>- Kancing belakang</div><div>- Regular fit</div>'),
(59, 'Lace Blocked Kaftan Top', 4, 5, 5, 5, 5, 349000, '1484716303_1_(6).jpg', '1484716316_4_(6).jpg|1484716316_1_(6).jpg|1484716316_2_(6).jpg|1484716316_3_(6).jpg', 18, '<div>Lace Blocked Kaftan Top by Zalia</div><div><br></div><div>- Poliester</div><div>- Warna pink</div><div>- Kerah bulat</div><div>- Lengan panjang</div><div>- Button and Self tie fastening</div><div>- Relaxed fit</div><div>- Lined</div>'),
(60, 'Dress Slit Denim S/S', 2, 5, 5, 5, 5, 188300, '1484716425_4_(7).jpg', '1484716431_1_(7).jpg|1484716431_4_(7).jpg|1484716431_3_(7).jpg|1484716431_2_(7).jpg', 14, '<div>ZAHRA SIGNATURE tampil sedikit funky dengan koleki tunik terbarunya. Terbuat dari material denim, Dress Slit Denim S/S memberi kesan laid back yang berkarakter untuk opsi gaya kasual Anda.</div><div><br></div><div>- Katun</div><div>- Biru muda</div><div>- Detail kerah</div><div>- Lengan pendek</div><div>- Kancing dan kantong depan</div><div>- Regular fit</div><div><br></div>'),
(61, 'Contempo L/S Tunic', 4, 5, 5, 5, 5, 299900, '1484716498_1_(8).jpg', '1484716532_4_(8).jpg|1484716532_1_(8).jpg|1484716532_3_(8).jpg|1484716532_2_(8).jpg', 18, '<div>Contempo merilis koleksi tunik untuk tampil penuh gaya saat momen istimewa. L/S Tunic hadir dengan potongan yang modern dan detail bordir. Simply great!</div><div><br></div><div>- Katun</div><div>- Putih</div><div>- Kerah V</div><div>- Lengan panjang</div><div>- Kancing dan relsteing belakang</div><div>- Regular fit</div><div><br></div>'),
(63, 'Ramla Blouse', 3, 5, 5, 5, 5, 285000, '1484718537_1_(9).jpg', '1484718541_4_(9).jpg|1484718541_1_(9).jpg|1484718541_3_(9).jpg|1484718541_2_(9).jpg', 20, '<div>Aira Muslim Butik selalu melengkapi koleksi hijabwear favorit. Ramla Blouse menampilkan konstruksi lengan panjang dan motif ethnic print beraksen brown tone yang elegan. Cocok untuk menyempurnakan hijab look berbagai nuansa.</div><div><br></div><div>- Poliester</div><div>- Warna hitam, cokelat</div><div>- Detail kerah</div><div>- Lengan panjang dengan buttoned cuffs</div><div>- Kancing depan</div><div>- Motif ethnic print</div><div>- Regular fit</div>'),
(67, 'Zelda Top', 0, 5, 5, 5, 5, 245000, '1484719832_1_(10).jpg', '1484719837_4_(10).jpg|1484719837_1_(10).jpg|1484719837_3_(10).jpg|1484719837_2_(10).jpg', 20, '<div>Tambahkan koleksi hijab wear dengan Aira Muslim Butik. Zelda Top tampil dengan motif bunga elegan beraksen warna kontras yang mempertegas desain koleksi ini.</div><div><br></div><div>- Katun, rayon</div><div>- Warna abu-abu tua</div><div>- Kerah bulat</div><div>- Lengan panjang</div><div>- Detail back keyhole dengan kancing</div><div>- Regular fit</div>'),
(65, ' Brisa Long Top', 10, 5, 5, 5, 5, 255900, '1484719120_1_(11).jpg', '1484719128_4_(11).jpg|1484719128_1_(11).jpg|1484719128_3_(11).jpg|1484719128_2_(11).jpg', 18, '<div>ANZAAR goes casual! Brisa Long Top menampilkan tunik dengan detail motif garis berwarna cerah pada lengan dan kantong untuk memberi kesan youthful pada momen kasual.</div><div><br></div><div>- Poliester</div><div>- Biru</div><div>- Kerah bulat</div><div>- Lengan panjang</div><div>- Kancing dan kantong depan</div><div>- Regular fit</div>'),
(66, 'Meidina Top', 0, 5, 5, 5, 5, 245000, '1484719221_1_(12).jpg', '1484719229_4_(12).jpg|1484719229_1_(12).jpg|1484719229_3_(12).jpg|1484719229_2_(12).jpg', 18, '<div>Aira Muslim Butik tampil minimalis dalam koleksi terbaru. Meidina Top hadir dengan detail kancing dan hadir berbagai pilihan warna feminin. A stunning outfit for your special day.&nbsp;</div><div><br></div><div>- Katun</div><div>- Warna peach</div><div>- Kerah V</div><div>- Lengan panjang</div><div>- Resleting belakang</div><div>- Detail slit</div><div>- Regular fit</div>'),
(68, 'Prillya Top', 10, 5, 5, 5, 5, 245000, '1484720648_1_(13).jpg', '1484720848_4_(13).jpg|1484720848_1_(13).jpg|1484720848_3_(13).jpg|1484720848_2_(13).jpg', 20, '<div>Tetap stylish dengan koleksi modern dari Aira Muslim Butik. Prillya Top menampilkan motif bunga dan desain baju kurung. Cocok untuk jadi pelengkap daily hijab look.</div><div><br></div><div>- Katun</div><div>- Warna cream</div><div>- Kerah bulat</div><div>- Lengan panjang</div><div>- Kancing belakang</div><div>- Regular fit</div><div><br></div>'),
(69, 'Heena Blouse', 13, 5, 5, 5, 5, 425000, '1484720919_1_(14).jpg', '1484720923_2_(14).jpg|1484720927_4_(14).jpg|1484720927_1_(14).jpg|1484720927_3_(14).jpg', 20, '<div>Tampil fashionable dengan Aira Muslim Butik. Heena Blouse menampilkan motif flower print dan detail criss-cross lace yang trendi. Cocok untuk melengkapi gaya hijab sehari-hari.</div><div><br></div><div>- Poliester</div><div>- Warna hijau</div><div>- Kerah crew</div><div>- Lengan panjang</div><div>- Resleting belakang</div><div>- Detail criss-cross lace</div><div>- Motif flower print</div><div>- Regular print</div>'),
(70, 'Adeliza Blouse', 3, 5, 5, 5, 5, 285000, '1484720980_1_(15).jpg', '1484720983_2_(15).jpg|1484720987_4_(15).jpg|1484720987_1_(15).jpg|1484720987_3_(15).jpg', 18, '<div>Classic tone selalu bisa membuat tampilan terlihat menarik. Adeliza Blouse dari Aira Muslim Butik, koleksi berdesain loose dengan ornamen kancing. Simply perfect!</div><div><br></div><div>- Rayon, katun</div><div>- Navy&nbsp;</div><div>- Kerah bulat</div><div>- Lengan panjang</div><div>- Resleting belakang</div><div>- Motif kotak</div><div>- Reguler fit</div>');

-- --------------------------------------------------------

--
-- Table structure for table `riview`
--

CREATE TABLE `riview` (
  `id` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `id_pelanggan` int(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `rating` int(10) NOT NULL,
  `isi` text NOT NULL,
  `terbit` varchar(10) NOT NULL DEFAULT 'N',
  `tgl` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riview`
--

INSERT INTO `riview` (`id`, `id_product`, `id_pelanggan`, `judul`, `rating`, `isi`, `terbit`, `tgl`, `jam`) VALUES
(9, 70, 1, 'jos', 3, 'uh keren kan', 'Y', '2017-01-19', '22:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(5) NOT NULL,
  `nama_olshop` varchar(100) NOT NULL,
  `domain` varchar(100) NOT NULL,
  `katakunci` text NOT NULL,
  `deskripsi` text NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `member_diskon` varchar(10) NOT NULL,
  `no_telp` bigint(50) NOT NULL,
  `bbm` varchar(100) NOT NULL,
  `line` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `nama_pemilik_rek` varchar(100) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `alamat_olshop` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama_olshop`, `domain`, `katakunci`, `deskripsi`, `nama`, `email`, `member_diskon`, `no_telp`, `bbm`, `line`, `instagram`, `nama_pemilik_rek`, `nama_bank`, `bank`, `alamat_olshop`) VALUES
(1, 'rizwa collection', 'www.rizwacollection.com', 'jual baju, jal kaos', 'merupakan sebuah online store terbesar se indonesia', 'andy saputra', 'andygrap@gmail.com', '5', 32523523523, '75464645', 'rwerewrw', 'andyptraa', 'Andy Saputra', 'Bank Mandiri', '32131231', 'boyolali');

-- --------------------------------------------------------

--
-- Table structure for table `slidshow`
--

CREATE TABLE `slidshow` (
  `id` int(10) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slidshow`
--

INSERT INTO `slidshow` (`id`, `caption`, `image`) VALUES
(4, 'Trend fashion 2017', '1484881549_6.jpg'),
(5, 'Simple Dan nyaman', '1484882201_2.jpg'),
(6, 'Banyak pilihan model terbaru', '1484882217_4.jpg'),
(7, 'Tampil elegan dan keren', '1484882233_5.jpg'),
(8, 'Terlihat anggun dan menawan', '1484882317_rosie-huntington-whiteley-44.jpg'),
(9, 'Tampil cantik setiap hari', '1484882484_hd-beautiful-girl-fashion-wallpaper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(10) NOT NULL,
  `id_pelanggan` varchar(50) DEFAULT NULL,
  `isi` text,
  `status` varchar(4) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `id_pelanggan`, `isi`, `status`) VALUES
(6, '1', 'bagus keren kak', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `id_user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_user`, `nama`, `password`, `email`, `level`) VALUES
(1, 'admin', 'admin ganteng', 'e10adc3949ba59abbe56e057f20f883e', 'admins@gmail.com', 'admin'),
(2, 'andyptra', 'andy saputra', 'e10adc3949ba59abbe56e057f20f883e', 'andygrap@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pertanyaan_keamanan`
--
ALTER TABLE `pertanyaan_keamanan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riview`
--
ALTER TABLE `riview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slidshow`
--
ALTER TABLE `slidshow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=438;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500;
--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `riview`
--
ALTER TABLE `riview`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slidshow`
--
ALTER TABLE `slidshow`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
