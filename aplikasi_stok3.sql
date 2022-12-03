-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Apr 2020 pada 07.24
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aplikasi_stok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
`id` int(3) NOT NULL,
  `nama_bank` varchar(40) NOT NULL,
  `no_rek` varchar(19) NOT NULL,
  `saldo` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bank`
--

INSERT INTO `bank` (`id`, `nama_bank`, `no_rek`, `saldo`) VALUES
(1, 'bank central asia (BCA)', '3800', 1010000),
(2, 'bank central asia (BCA)', '5433', 1000000),
(3, 'bank central asia (BCA)', 'petty cash ', 1000000),
(4, 'hhh', 'hhh1', 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`id` int(11) NOT NULL,
  `id_cust` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `penerima` varchar(29) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `expedisi` varchar(200) NOT NULL,
  `pic` varchar(29) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=235 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `id_cust`, `nama`, `penerima`, `alamat`, `expedisi`, `pic`) VALUES
(1, 'CUST-001', 'ANEKA PLASTAMA', 'ANEKA PLASTAMA', 'Jl. KH Agus Salim Raya No 95 Rt 04 Rw 08, Kel. Bekasi Jaya, Kec. Bekasi Timur', 'Jl. KH Agus Salim Raya No 95 Rt 04 Rw 08, Kel. Bekasi Jaya, Kec. Bekasi Timur', 'ANEKA'),
(2, 'CUST-002', 'BANANA NUGGET', 'BANANA NUGGET', 'BARU: Jl. 20 Desember No 27A, Kalideres, Jakarta Barat', 'Invoice : Citra 5 Blok C6 No 17, Kamal, Kalideres, Jakarta Barat 11810', 'BANANA NUGGET'),
(3, 'CUST-003', 'BANG JALI', 'BANG JALI', 'Jl. Rawa Kuning No 45 Rt 08 Rw 16, Pulogebang, Jakarta Timur', 'Jl. Rawa Kuning No 45 Rt 08 Rw 16, Pulogebang, Jakarta Timur', 'Pak Satrio'),
(4, 'CUST-004', 'PT KITCHENETTE LESTARI', 'PT KITCHENETTE LESTARI', 'Jl. Pagelarang 1 No.63 Gang Buntu Rt.009/Rw.03, Kel. Setu Cipayung, Jakarta Timur', 'Invoice : Jl. Tanah Kusir 2 No 13 Rt 01 Rw 01, Kebayoran Lama, Jakarta Selatan', ''),
(5, 'CUST-005', 'ANUGERAH JAYA / CI LIANA', 'ANUGERAH JAYA / CI LIANA', 'Perum. Kresek Indah. Jl. Asoka Blok M No 5 Rt 06/012. Duri Kosambi, Cengkareng, Jakarta Barat 11750', 'Perum. Kresek Indah. Jl. Asoka Blok M No 5 Rt 06/012. Duri Kosambi, Cengkareng, Jakarta Barat 11750', 'CI LIANA'),
(6, 'CUST-006', 'CV FAJAR JAYA SENTOSA', 'CV FAJAR JAYA SENTOSA', 'Jl. Harapan Indah No 82 Rt 03 Rw 08 Pusaka Rakyat Tarumajaya Kota Bekasi', 'Jl. Harapan Indah No 82 Rt 03 Rw 08 Pusaka Rakyat Tarumajaya Kota Bekasi', 'Markus'),
(7, 'CUST-007', 'PAK ARI JOGJA', 'PAK ARI JOGJA', 'Jl. Kenanga No.164 B Sambilegi, Maguwoharjo, Kec. Depok, Kab. Sleman, Yogyakarta', 'Jl. Kenanga No.164 B Sambilegi, Maguwoharjo, Kec. Depok, Kab. Sleman, Yogyakarta', 'PAK ARI JOGJA'),
(8, 'CUST-008', 'CI AMEY', 'CI AMEY', 'Taman Kholis Indah Blok B No. 20 (Belakang Ruko) Bandung', 'Jl. Kenanga No.164 B Sambilegi, Maguwoharjo, Kec. Depok, Kab. Sleman, Yogyakarta', 'CI AMEY'),
(9, 'CUST-009', 'CV ADCO FOOD', 'CV SIDODADI', 'Invoice : Jl. Amir Machmud 9 Kav 7 (rumah asri gunung anyar), Kel/Kec. Gunung Anyar, Surabaya', 'Invoice : Jl. Amir Machmud 9 Kav 7 (rumah asri gunung anyar), Kel/Kec. Gunung Anyar, Surabaya', 'CV SIDODADI'),
(10, 'CUST-010', 'CV SUNSHINE FOOD & CO', 'CV CAHAYA BOGA UTAMA', 'Gemilang Asri Maju. Jakarta Distribution Center Blok N/41. Jl Kapuk Kamal Raya No. 40, Jakarta Utara ', 'Alamat INVOICE : JL. Sunset Road No. 23, Lingk Abianbase, Kuta, Kab. Badung - Bali', 'Pak Waridi'),
(11, 'CUST-011', 'CV SUNSHINE FOOD & CO', 'CV CAHAYA BOGA UTAMA', 'Central Bali Logistik. Jl. Penggilingan Raya No 140 Cakung Jakarta Timur', 'Central Bali Logistik. Jl. Penggilingan Raya No 140 Cakung Jakarta Timur', 'Pa Rohadi'),
(12, 'CUST-012', 'GOLDEN PRAWN', 'GOLDEN PRAWN', 'Jl. Metro Kencana 7 Blok Q-42, Sunter, Kel. Papanggo Sunter, Kec.Tanjung Priok', 'Jl. Metro Kencana 7 Blok Q-42, Sunter, Kel. Papanggo Sunter, Kec.Tanjung Priok', 'GOLDEN PRAWN'),
(13, 'CUST-013', 'IBU AISYAH', 'IBU AISYAH', 'Jl. Gang Haji Alam 3 Rt 05 Rw 015, Jakasampurna - Bekasi Barat', 'Jl. Gang Haji Alam 3 Rt 05 Rw 015, Jakasampurna - Bekasi Barat', 'IBU AISYAH'),
(14, 'CUST-014', 'IBU CHRISTINE', 'IBU CHRISTINE', 'Lodan Centre, Jakarta Utara', 'Lodan Centre, Jakarta Utara', 'IBU CHRISTINE'),
(15, 'CUST-015', 'IBU NINGSIH', 'IBU NINGSIH', 'Perum Taman Raya Rajeg Blok G9 No 10 Rt 20 Rw 05, Tangerang', 'Perum Taman Raya Rajeg Blok G9 No 10 Rt 20 Rw 05, Tangerang', 'IBU NINGSIH'),
(16, 'CUST-016', 'IBU SHERLY', 'IBU SHERLY', 'Pasar Mandiri Sumagung Jl Gading Putih Raya Blok A-068 Lantai 1 atau Blok D-105 lantai 2', 'Pasar Mandiri Sumagung Jl Gading Putih Raya Blok A-068 Lantai 1 atau Blok D-105 lantai 2', 'IBU SHERLY'),
(17, 'CUST-017', 'ITS MY CAKE', 'IT''S MY CAKE', 'Jl Cipete Raya Komplek BRI No. 12 B Cipete Selatan, Cilandak, Jakarta Selatan', 'Jl Cipete Raya Komplek BRI No. 12 B Cipete Selatan, Cilandak, Jakarta Selatan', 'Bu Desi'),
(18, 'CUST-018', 'KO ALUK', 'KO ALUK', 'Perumahan Buana Gardenia Blok F2, No 1, Ciledug', 'Perumahan Buana Gardenia Blok F2, No 1, Ciledug', 'KO ALUK'),
(19, 'CUST-019', 'PT FORTUNA PACIFIC', 'PACIFIC FORTUNE', 'Jl. KaJi Raya No 1 bb-bc, Petojo Utara, Jakarta Pusat', 'Jl. KaJi Raya No 1 bb-bc, Petojo Utara, Jakarta Pusat', 'Fajar'),
(20, 'CUST-020', 'PURWA JAYA ABADI', 'PURWA JAYA ABADI', 'BARU : Jl.KH. Hasyim Ashari No. 3 Kampung Poris Plawad Indah Rt 01/04 No. 3 Kel. Poris Plawa Indah Kec. Cipondoh Tangerang', 'BARU : Jl.KH. Hasyim Ashari No. 3 Kampung Poris Plawad Indah Rt 01/04 No. 3 Kel. Poris Plawa Indah Kec. Cipondoh Tangerang', 'PURWA JAYA ABADI'),
(21, 'CUST-021', 'PAK ANDI', 'PAK ANDI', 'Parung', 'Parung', 'PAK ANDI'),
(22, 'CUST-022', 'PAK BASKARA', 'PAK BASKARA', 'Pasar Inpres Palu Barat Jl. Kemiri No 371 Toko Baskara', 'Pasar Inpres Palu Barat Jl. Kemiri No 371 Toko Baskara', 'PAK BASKARA'),
(23, 'CUST-023', 'PAK EDISON', 'PT ESATAMA PRIMA SEMPURNA', 'Invoice Baru : Green Sedayu Biz Park Daan Mogot 11 BIZ DM 17 No. 25, Kalideres, Jakarta Barat', 'Invoice Baru : Green Sedayu Biz Park Daan Mogot 11 BIZ DM 17 No. 25, Kalideres, Jakarta Barat', 'Bu Amelia'),
(24, 'CUST-024', 'PAK EDY / TIMAN', 'PAK EDY', 'Perum Grand Bekasi. Jl Apel Hijau Dua Blok A11 No 6, Rt 10 Rw 19, Padurenan', 'Perum Grand Bekasi. Jl Apel Hijau Dua Blok A11 No 6, Rt 10 Rw 19, Padurenan', 'PAK EDY'),
(25, 'CUST-025', 'PAK ERIYANTO', 'PAK ERIYANTO', 'Perum. Permata Suka Mukti Blok E No 26. Kampung Landean Girang, Desa Suka Mukti, Kec. Ketapang, Bandung', 'Perum. Permata Suka Mukti Blok E No 26. Kampung Landean Girang, Desa Suka Mukti, Kec. Ketapang, Bandung', 'PAK ERIYANTO'),
(26, 'CUST-026', 'PAK GILANG', 'PAK GILANG', 'Jl. Imam Bonjol, Gang Keramat 3 Rt 002 Rw 02  No. 32, Karawaci - Tangerang', 'Jl. Imam Bonjol, Gang Keramat 3 Rt 002 Rw 02  No. 32, Karawaci - Tangerang', 'PAK GILANG'),
(28, 'CUST-028', 'PAK GUNAWAN AIPE', 'PAK GUNAWAN ( PKU )', 'Ekspedisi : AIPE. Jl Kapuk Kamal Komplek Pergudangan Bisnis Pluit Blok F2 No, 28, Jakarta Utara', 'Perumahan Kuantan Regency Cluster Paradise Blok H No 11, Pekanbaru', 'PAK GUNAWAN ( PKU )'),
(31, 'CUST-031', 'PAK GUNAWAN STS', 'PAK GUNAWAN ( PKU )', 'Ekspedisi : STS. Jl Peternakan Raya 1 No. 35 Kedaung Jakarta Barat', 'Perumahan Kuantan Regency Cluster Paradise Blok H No 11, Pekanbaru', 'PAK GUNAWAN ( PKU )'),
(32, 'CUST-032', 'PAK GUNAWAN APE', 'PAK GUNAWAN ( PKU )', 'Ekspedisi : APE. Jl. Kapuk Kamal Komp Bisnis Pluit Blok P No 21 Jakarta Utara', 'Perumahan Kuantan Regency Cluster Paradise Blok H No 11, Pekanbaru', 'PAK GUNAWAN ( PKU )'),
(33, 'CUST-033', 'PAK EKA', 'PAK EKA', 'Kel Cipete Utara Kec. Kebayoran Baru Jakarta Utara', 'Kel Cipete Utara Kec. Kebayoran Baru Jakarta Utara', 'PAK EKA'),
(34, 'CUST-034', 'PAK H. USMAN', 'PAK H. USMAN', 'UD Angker. Jl Masjid Darussalam Dusun Mekar Baru 003/001, Cikampek Kota', 'UD Angker. Jl Masjid Darussalam Dusun Mekar Baru 003/001, Cikampek Kota', 'PAK H. USMAN'),
(35, 'CUST-035', 'PAK JOHAN', 'PAK JOHAN', 'Expedisi : TOMMY JAYA Jl. DHI Blok P No 08 Telukgong, Jakarta Barat ', 'Jl Beringin Depan Masjid Az Zikra Ruko Hijau, Kel. Sungai Sibam Kec. Payung Sekaki- Pekanbaru', 'PAK JOHAN'),
(37, 'CUST-037', 'PAK KIKI', 'PAK KIKI', 'Perum Tamansari A 82 Ds Margasari Kec. Karawang Timur Kab. Karawang', 'PT Gumarang Indo express. ruko cendana blok a no 26 jl benteng betawi rt 01 rw 15 poris plawad kec tangerang', 'PAK KIKI'),
(38, 'CUST-038', 'PAK LUDY', 'PAK LUDY', 'Perumahan Graha Keandra Blok F No. 2, Desa Tukmudal Kec. Sumber Kab. Cirebon', 'Perumahan Graha Keandra Blok F No. 2, Desa Tukmudal Kec. Sumber Kab. Cirebon', 'PAK LUDY'),
(39, 'CUST-039', 'PAK PONO', 'PAK PONO', 'Jl. Ir Juanda N0. 46, Bekasi Timur', 'Jl. Ir Juanda N0. 46, Bekasi Timur', 'PAK PONO'),
(40, 'CUST-040', 'PAK RAHMAT', 'PAK RAHMAT', 'JL. Manuruki 2 No 3, Makassar', 'JL. Manuruki 2 No 3, Makassar', 'PAK RAHMAT'),
(41, 'CUST-041', 'PAK RINGGO', 'PAK RINGGO', 'Jl. Setiabudi Gang Sukun Pamulang, Ciputat', 'Jl. Setiabudi Gang Sukun Pamulang, Ciputat', 'PAK RINGGO'),
(42, 'CUST-042', 'PAK SENO', 'UD NIN', 'Cikampek', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'UD NIN'),
(43, 'CUST-043', 'PAK SENO', 'PAK YANCE / TYK', 'Gudang Lotus, Ancol', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK YANCE / TYK'),
(44, 'CUST-044', 'PAK SENO', 'PAK TONO', 'Griya Cimangir Blok A2 No. 26 Gunung Sindur Bogor', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK TONO'),
(45, 'CUST-045', 'PAK SENO', 'PAK JEFRY', 'Gudang Kerupuk. Kp Seremped Rt 02 Rw 10 (samping perumahan bukit cimanggu city)', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK JEFRY'),
(46, 'CUST-046', 'PAK SENO', 'PAK DENI SAPUTRA', 'Ekspedisi : CV Naga Terang. Jl Kapuk Muara Raya, Komplek Duta Harapan Indah Blok MM No 33-34', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK DENI SAPUTRA'),
(47, 'CUST-047', 'PAK SENO', 'PAK SENO', 'Ekspedisi Ratu Berlian. Pergudangan Arcadia Daan Mogot Blok F2 No. 2 ', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK SENO'),
(48, 'CUST-048', 'PAK SENO', 'PAK SENO', 'UP. Bp. Irwan Papeja. Jl. Bengawan Solo, Gang Ramitan Rt 8 No 8, Kota Lubuk Linggau Sumatera Selatan', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK SENO'),
(49, 'CUST-049', 'PAK SENO', 'PAK SENO', 'Jl. Angkatan 45 LR. Kesehatan Belakang Wisma 45', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK SENO'),
(50, 'CUST-050', 'PAK SENO', 'PAK SENO', 'Jalan Gresik No 35 Sekip Tengah, Palembang', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK SENO'),
(51, 'CUST-051', 'PAK SENO', 'PAK DIDIT', 'Jl. Satelit Indah 7 dn 18, Sukomanunggal, Surabaya', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK DIDIT'),
(52, 'CUST-052', 'PAK SENO', 'PAK SENO', 'Ekspedisi Mandala Dumastio : Jl Kampung Bandan Raya No. 1, Gudang Perumka Pindu D, Jakarta Utara', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK SENO'),
(53, 'CUST-053', 'PAK SENO', 'MSN / PAK ADE', 'Jl. Flamboyan Raya No. 113, Depok II Tengah', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'MSN / PAK ADE'),
(54, 'CUST-054', 'PAK SENO', 'PAK CAHYO', 'Perumahan Pesona Laguna 2 blok L No.33 Rt.03 Rw.22 Cilangkap Tapos Depok', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK CAHYO'),
(55, 'CUST-055', 'PAK SENO', 'PAK ARDIYANSAH', 'Ekspedisi Jadijaya Express Jl. Budi Mulia Utara II, Toko Mahkota, Ancol Blok F No. 6', 'Perumahan Bogor View 2 Blok K No.15 Rt. 05 RW XII Kel. Cilendek Barat Kec. Bogor Barat, Kota Bogor', 'PAK ARDIYANSAH'),
(56, 'CUST-056', 'PAK SUBANDI', 'SUBANDI - BANDUNG', 'Jl Tata Surya No. 78 Perumahan Margahayu - Bandung ', 'Jl Tata Surya No. 78 Perumahan Margahayu - Bandung ', 'SUBANDI - BANDUNG'),
(57, 'CUST-057', 'PAK SENO', 'SUBANDI - CIANJUR', 'Kp. Pasir Tulang Rt 001 Rw 010 Desa Gekbrong Kec Gekbrong, Kab Cianjur', 'Kp. Pasir Tulang Rt 001 Rw 010 Desa Gekbrong Kec Gekbrong, Kab Cianjur', 'pak wawan'),
(58, 'CUST-058', 'PAK UNTUNG', 'PAK UNTUNG', 'Toko Plastik Nuryani. Jl Haji Sapri Rt 01 Rw 09, Kp Kebantenan Pondok Aren, Tangerang Selatang, Banten 15224', 'Toko Plastik Nuryani. Jl Haji Sapri Rt 01 Rw 09, Kp Kebantenan Pondok Aren, Tangerang Selatang, Banten 15224', 'PAK UNTUNG'),
(59, 'CUST-059', 'PAK WAWAN', 'PAK WAWAN', 'Jl. Raya Kodan No.1, Dekat Bunderan Kecapi', 'Jl. Raya Kodan No.1, Dekat Bunderan Kecapi', 'PAK WAWAN'),
(60, 'CUST-060', 'PAK YAYAN', 'PAK YAYAN', 'Pejuang', 'Pejuang', 'PAK YAYAN'),
(61, 'CUST-061', 'PAK BUDI SULISTYO', 'PAK BUDI SULISTYO', 'Duta Bumi 3,Blok 3R No.5 Rt.007 Rw.033,Jl.Duta Permai X,Kota Harapan Indah,Bekasi', 'Duta Bumi 3,Blok 3R No.5 Rt.007 Rw.033,Jl.Duta Permai X,Kota Harapan Indah,Bekasi', 'PAK BUDI SULISTYO'),
(62, 'CUST-062', 'PISANG RAJO', 'PISANG RAJO', 'Jl. Tenggiri No. 2C Rawamangun', 'Jl. Tenggiri No. 2C Rawamangun', 'Pak Agung'),
(63, 'CUST-063', 'PT DAGSAP ENDURA EATORA JOGJA', 'PT DAGSAP ENDURA EATORA JOGJA', 'Jl. Wates KM 14 Dusun Kalijoho Kel. Argosari Kec. Sedayu Bantul-Yogyakarta', 'Jl. Wates KM 14 Dusun Kalijoho Kel. Argosari Kec. Sedayu Bantul-Yogyakarta', 'PT DAGSAP ENDURA EATORA'),
(64, 'CUST-064', 'PT DAGSAP ENDURA EATORA', 'PT DAGSAP ENDURA EATORA', 'Jl. Cahaya Raya Kav H-3 Kawasan Industri Sentul Bogor', 'Jl. Cahaya Raya Kav H-3 Kawasan Industri Sentul Bogor', 'PT DAGSAP ENDURA EATORA'),
(65, 'CUST-065', 'PT DE GLOW INTERNATIONAL', 'PT DE GLOW INTERNATIONAL', 'JL. Industri Utama Raya Blok RR 2F Jababeka II - Cikarang Selatan', 'JL. Industri Utama Raya Blok RR 2F Jababeka II - Cikarang Selatan', 'Bu Rita'),
(66, 'CUST-066', 'PT MALINDO FOOD DELIGHT', 'PT MALINDO FOOD DELIGHT', 'Komplek Greenland International Industrial Center Blok AA No 10, Cikarang Pusat', 'Komplek Greenland International Industrial Center Blok AA No 10, Cikarang Pusat', 'PT MALINDO FOOD DELIGHT'),
(67, 'CUST-067', 'PT MON DELI INDONESIA', 'PT MON DELI INDONESIA', 'JL. Ciater Raya No 1, Serpong Tangerang Selatan', 'JL. Industri Utama Raya Blok RR 2F Jababeka II - Cikarang Selatan', 'Pak Tarno'),
(68, 'CUST-068', 'PT ANEKA BOGA NUSANTARA', 'PT ANEKA BOGA NUSANTARA', 'Kawasan Industri Surya Cipta Jl. Surya Utama Kav I-25 B, Ciampel, Karawang Timur, Jawa Barat', 'Kawasan Industri Surya Cipta Jl. Surya Utama Kav I-25 B, Ciampel, Karawang Timur, Jawa Barat', 'PT ANEKA BOGA NUSANTARA'),
(69, 'CUST-069', 'PT INDOMINA CIPTA AGUNG', 'PT INDOMINA CIPTA AGUNG', 'Jl.Tugu Wijaya III No 2 Kawasan Industri Tugu Wijaya Kusuma Semarang', 'Jl.Tugu Wijaya III No 2 Kawasan Industri Tugu Wijaya Kusuma Semarang', 'Bu Lala'),
(70, 'CUST-070', 'PT GANDA INTERNUSA PERKASA PLA', 'PT GANDA INTERNUSA PERKASA PL', 'Pergudangan Pantai Indah Dadap. Jl Raya Prancis No 2 GF No. 3 & 5, Dadap, Kosambi, Kab. Tangerang Banten', 'Pergudangan Pantai Indah Dadap. Jl Raya Prancis No 2 GF No. 3 & 5, Dadap, Kosambi, Kab. Tangerang Banten', 'Bu Ida'),
(71, 'CUST-071', 'PT SUMBER MAKANAN SEHAT', 'PT SUMBER MAKANAN SEHAT', 'Jl. Fatahillah No. 23 KM 49 Cikarang Barat-Bekasi', 'Jl. Fatahillah No. 23 KM 49 Cikarang Barat-Bekasi', 'Imam'),
(72, 'CUST-072', 'PT SUMBER PRIMA ANUGERAH ABADI', 'PT SUMBER PRIMA ANUGERAH ABAD', 'Taman Cisadane No 99 Panunggang Barat, Cibodas, Tangerang 15139', 'Kirim Invoice : Ruko Pinangsia Blok I No 50 Karawaci, Office Park 15811', 'PT SUMBER PRIMA ANUGERAH ABAD'),
(73, 'CUST-073', 'PT SELAHONJE JAYA MAKMUR', 'PT SELERA HARUM INTI PANGAN', 'Ruko Symphoni Blok HX 2 No.3, Kota Harapan Indah', 'Ruko Symphoni Blok HX 2 No.3, Kota Harapan Indah', 'PT SELERA HARUM INTI PANGAN'),
(74, 'CUST-074', 'DLOMBOK', 'D''LOMBOK', 'Kampung Bugal Salam Poncol RT 01/Rw 02 Dusun Hegar, Cikarang', 'Kampung Bugal Salam Poncol RT 01/Rw 02 Dusun Hegar, Cikarang', 'Bu Herlin'),
(75, 'CUST-075', 'TIRTA BUDI', 'TIRTA BUDI', 'Vila Permata Sektor 7 Blok E2 No. 1, Lippo Karawaci', 'Vila Permata Sektor 7 Blok E2 No. 1, Lippo Karawaci', 'TIRTA BUDI'),
(76, 'CUST-076', 'TIRTA BUUDI(RENAKA)', 'RENAKA', 'Ekspedisi Surya Global : Jl. Kapuk Kamal Komp Bisnis Pluit Blok F 15 ', 'Ekspedisi Surya Global : Jl. Kapuk Kamal Komp Bisnis Pluit Blok F 15 ', 'RENAKA'),
(77, 'CUST-077', 'TIRTA BUDI (CENTRAL PLASTIK)', 'CENTRAL PLASTIK', 'Exp : Avina Pratama Ekspres. Jl. Kapuk Kamal Komp Bisnis Pluit Blok P 21 Jl. Durian No 38, Pekanbaru - Riau,', 'Exp : Avina Pratama Ekspres. Jl. Kapuk Kamal Komp Bisnis Pluit Blok P 21 Jl. Durian No 38, Pekanbaru - Riau,', 'Ibu Erin'),
(78, 'CUST-078', 'TOKO AMEN', 'TOKO AMEN', 'Pasar Rawamangun Blok AKS 186, Jakarta Timur', 'Pasar Rawamangun Blok AKS 186, Jakarta Timur', 'TOKO AMEN'),
(79, 'CUST-079', 'TOKO ANEKA KUE', 'TOKO ANEKA KUE', 'JL. Fajar No 4 Rt 05 / 20, Kel. Jakasampurna, Bekasi Barat', 'JL. Fajar No 4 Rt 05 / 20, Kel. Jakasampurna, Bekasi Barat', 'TOKO ANEKA KUE'),
(80, 'CUST-080', 'TOKO ANDI PLASTIK', 'TOKO ANDI PLASTIK', 'Pasar Wisma Asri Blok C7 No. 11', 'Pasar Wisma Asri Blok C7 No. 11', 'TOKO ANDI PLASTIK'),
(81, 'CUST-081', 'TOKO ANUGRAH PLASTIK', 'TOKO ANUGRAH PLASTIK', 'Gerbang Perum Tridaya Nusa Indah, Tambun (Depan Kolam Renang Suka Ria)', 'Gerbang Perum Tridaya Nusa Indah, Tambun (Depan Kolam Renang Suka Ria)', 'TOKO ANUGRAH PLASTIK'),
(82, 'CUST-082', 'TOKO BAHAGIA', 'TOKO BAHAGIA', 'Atrium Pondok Gede Blok E No. 1, Pondok Gede', 'Atrium Pondok Gede Blok E No. 1, Pondok Gede', 'TOKO BAHAGIA'),
(83, 'CUST-083', 'TOKO BALI', 'TOKO BALI', 'Pasar Perumnas Klender, Lt Dasar Blok BKS No.232-233 Jaktim', 'Pasar Perumnas Klender, Lt Dasar Blok BKS No.232-233 Jaktim', 'TOKO BALI'),
(84, 'CUST-084', 'TOKO BERKAT', 'TOKO BERKAT', 'Pasar Regional Jatinegara Lt Basement Blok AKS', 'Pasar Regional Jatinegara Lt Basement Blok AKS', 'TOKO BERKAT'),
(85, 'CUST-085', 'TOKO BUDI', 'TOKO BUDI', 'Pasar Perumnas Klender, Blok AKS 189 - 190, Jakarta Timur', 'Pasar Perumnas Klender, Blok AKS 189 - 190, Jakarta Timur', 'TOKO BUDI'),
(86, 'CUST-086', 'TOKO BUKIT SAFA', 'TOKO BUKIT SAFA', 'Pasar Atrium, Pondok Gede', 'Pasar Atrium, Pondok Gede', 'TOKO BUKIT SAFA'),
(87, 'CUST-087', 'TOKO CAHAYA BERKAH', 'TOKO CAHAYA BERKAH', 'Jl. Swasembada Timur 22 No 01. Kel Kebun Bawang, Jakarta Utara', 'Jl. Swasembada Timur 22 No 01. Kel Kebun Bawang, Jakarta Utara', 'Pak Siran'),
(88, 'CUST-088', 'TOKO CAHAYA KARUNIA', 'TOKO CAHAYA KARUNIA', 'Pasar Rawamangun Blok AKS 186, Jakarta Timur', 'Pasar Rawamangun Blok AKS 186, Jakarta Timur', 'Pak Indro'),
(89, 'CUST-089', 'TOKO DONA PLASTIK', 'TOKO DONA PLASTIK', 'Pasar Kranji, Bekasi Barat', 'Pasar Kranji, Bekasi Barat', 'TOKO DONA PLASTIK'),
(90, 'CUST-090', 'TOKO HARUM MANIS', 'TOKO HARUM MANIS', 'Pasar Baru, Jakarta Pusat', 'Pasar Baru, Jakarta Pusat', 'Pak Sugi'),
(91, 'CUST-091', 'TOKO INDRA', 'TOKO INDRA', 'Jl. Beo No. 360. Pasar Bukit Duri, Tebet', 'Jl. Beo No. 360. Pasar Bukit Duri, Tebet', 'TOKO INDRA'),
(92, 'CUST-092', 'PAK INDRO', 'TOKO SUMBER REZEKI', 'Pasar Gembrong Baru Blok AKS 265-266, Cempaka Putih, Jakarta Pusat', 'Pasar Gembrong Baru Blok AKS 265-266, Cempaka Putih, Jakarta Pusat', 'Pak Indro'),
(93, 'CUST-093', 'TOKO JAYA', 'TOKO JAYA', 'Pasar Gembrong Baru Blok AKS 106-107, Cempaka Putih, Jakarta Pusat', 'Pasar Gembrong Baru Blok AKS 106-107, Cempaka Putih, Jakarta Pusat', 'TOKO JAYA'),
(94, 'CUST-094', 'TOKO DENI', 'TOKO DENI', 'Jl Raya Pasar Bojong Samping BTN Taruma Jaya', 'Jl Raya Pasar Bojong Samping BTN Taruma Jaya', 'TOKO DENI'),
(95, 'CUST-095', 'KO AJAW', 'KO AJAU / TOKO LIMA SAUDARA', 'JL. Swadarma Raya Serengseng Ulujami. Depan Indomaret Swadarma Raya', 'JL. Swadarma Raya Serengseng Ulujami. Depan Indomaret Swadarma Raya', 'Ko Ajaw'),
(96, 'CUST-096', 'PAK EDY MEDALIA', 'PAK EDY MEDALIA', 'Jl. Angke Jaya Raya Rt 004 Rw 006 No 10, Kel. Angke Kec. Tambora, Jakarta Barat', 'Jl. Angke Jaya Raya Rt 004 Rw 006 No 10, Kel. Angke Kec. Tambora, Jakarta Barat', 'PAK EDY MEDALIA'),
(97, 'CUST-097', 'PAK EDY MEDALIA', 'TOKO ASYIFA', 'Jl. Hal. Manshur No. 3 (Pondok Bahar), Gondrong, Jakarta Barat', 'Jl. Hal. Manshur No. 3 (Pondok Bahar), Gondrong, Jakarta Barat', 'Pak Edy'),
(98, 'CUST-098', 'TOKO MIRA', 'TOKO MIRA', 'Jl. KH Hasyim Ashari No. 9B-C, Jakarta Pusat 10130', 'Jl. KH Hasyim Ashari No. 9B-C, Jakarta Pusat 10130', 'TOKO MIRA'),
(99, 'CUST-099', 'TOKO MULIA', 'TOKO MULIA', 'Perum Grama Puri Taman Sari Blok A7 No 23, Cibitung', 'Perum Grama Puri Taman Sari Blok A7 No 23, Cibitung', 'Pak Salman'),
(100, 'CUST-100', 'TOKO MEGA PLASTIK', 'TOKO MEGA PLASTIK', 'Jl Pulo Gebang RT 02 RW 04 No. 2 Jakarta Timur', 'Jl Pulo Gebang RT 02 RW 04 No. 2 Jakarta Timur', 'TOKO MEGA PLASTIK'),
(101, 'CUST-101', 'TOKO ROSSI PLASTIK', 'TOKO ROSSI PLASTIK', 'Jl. Semanan Raya No. 08 Rt 09 Rw 08 Semanan, Kalideres, Jakarta Barat', 'Jl. Semanan Raya No. 08 Rt 09 Rw 08 Semanan, Kalideres, Jakarta Barat', 'TOKO ROSSI PLASTIK'),
(102, 'CUST-102', 'TOKO SAHABAT', 'TOKO SAHABAT', 'Pasar Perumnas Klender, Lt dasar Blok BKS No 243-244', 'Pasar Perumnas Klender, Lt dasar Blok BKS No 243-244', 'Pak Jumari'),
(103, 'CUST-103', 'TOKO SINAR EE', 'TOKO SINAR EE', 'Jl. Kasuari III No 97, Passimal, Cikarang Baru / Jl. Kasuari VII No 75, Cikarang Baru', 'Jl. Kasuari III No 97, Passimal, Cikarang Baru / Jl. Kasuari VII No 75, Cikarang Baru', 'TOKO SINAR EE'),
(104, 'CUST-104', 'TOKO SUPRIYANTO', 'TOKO SUPRIYANTO', 'Jati Asih', 'Jati Asih', 'Pak Supri'),
(105, 'CUST-105', 'TOKO WILTON', 'TOKO WILTON', 'Jl. KH Hasyim Ashari No. 3F, Jakarta Pusat 10130', 'Jl. KH Hasyim Ashari No. 3F, Jakarta Pusat 10130', 'Akiong '),
(106, 'CUST-106', 'TOKO JAYA ABADI', 'TOKO JAYA ABADI', 'Jl. Raya Perjuangan Harapan Baru, Wisma Asri, Bekasi Utara ', 'Jl. Raya Perjuangan Harapan Baru, Wisma Asri, Bekasi Utara ', 'Sony'),
(107, 'CUST-107', 'TOKO ZANDY BAROKAH', 'TOKO ZANDY BAROKAH', 'Duta Harapan Jl. Boulevard Barat Blok AH-2 No. 20 Bekasi Utara', 'Duta Harapan Jl. Boulevard Barat Blok AH-2 No. 20 Bekasi Utara', 'TOKO ZANDY BAROKAH'),
(108, 'CUST-108', 'UD JIMI PLASTIK & HASIL BUMI', 'UD JIMI PLASTIK & HASIL BUMI', 'Jalan Raya Bosih, Depan Pasar Pamor Cibitung Bekasi', 'Jalan Raya Bosih, Depan Pasar Pamor Cibitung Bekasi', 'UD JIMI PLASTIK & HASIL BUMI'),
(109, 'CUST-109', 'TOKO SUMBER MAKMUR', 'TOKO SUMBER MAKMUR', 'Jl. H Nausan Sriamur, Tambun Utara', 'Jl. H Nausan Sriamur, Tambun Utara', 'TOKO SUMBER MAKMUR'),
(110, 'CUST-110', 'TOKO SUBUR PLASTIK', 'TOKO SUBUR PLASTIK', 'Depan Pasar Tambelang', 'Depan Pasar Tambelang', 'TOKO SUBUR PLASTIK'),
(111, 'CUST-111', 'TOKO BUKIT MARWAH', 'TOKO BUKIT MARWAH', 'Pasar Baru Kranji Blok TB No 13 Bekasi', 'Pasar Baru Kranji Blok TB No 13 Bekasi', 'TOKO BUKIT MARWAH'),
(112, 'CUST-112', 'PT SERA FOOD INDONESIA', 'PT SERA FOOD INDONESIA', 'Dusun Brayut Rt 01 Rw 28 Pandowoharjo, Sleman, Yogyakarta					', 'Dusun Brayut Rt 01 Rw 28 Pandowoharjo, Sleman, Yogyakarta					', 'Ibu Ratna'),
(113, 'CUST-113', 'PT SEGARA PANGAN SAKINAH', 'PT SEGARA PANGAN SAKINAH', 'Kp Pulo Kendal Desa Setia Asih Rt 001 Rw 003 Kec Tarumajaya Kab. Bekasi', 'Kp Pulo Kendal Desa Setia Asih Rt 001 Rw 003 Kec Tarumajaya Kab. Bekasi', 'PT SEGARA PANGAN SAKINAH'),
(114, 'CUST-114', 'PT BENGAWAN SARI PANGAN', 'PT BENGAWAN SARI PANGAN', 'Dusun Tanon Lor RT 001 RW 002 Desa Gedongan Kec. Colomadu Kab. Karang Anyar Jawa Tengah', 'Dusun Tanon Lor RT 001 RW 002 Desa Gedongan Kec. Colomadu Kab. Karang Anyar Jawa Tengah', 'PT BENGAWAN SARI PANGAN'),
(115, 'CUST-115', 'TOKO NUSANTARA', 'TOKO NUSANTARA', 'Ruko Puri Sentosa No 14 Duren Jaya Bekasi Timur ', 'Ruko Puri Sentosa No 14 Duren Jaya Bekasi Timur ', '0822-1384-2988'),
(116, 'CUST-116', 'TOKO PELITA PLASTIK', 'TOKO PELITA PLASTIK', 'Jl Caringin-Mustikasari', 'Jl Caringin-Mustikasari', '0815-1198-5133'),
(117, 'CUST-117', 'TOKO AZRIL', 'TOKO AZRIL', 'Jl Raya Bossy No 3 Depan Pasar Pamor Cibitung Bekasi ', 'Jl Raya Bossy No 3 Depan Pasar Pamor Cibitung Bekasi ', '0821-12482357'),
(118, 'CUST-118', 'PAK MIMING', 'PAK MIMING', 'BEKASI', 'BEKASI', ''),
(119, 'CUST-119', 'CV SURYA BOGA', 'CV SURYA BOGA', 'Jl Magelang-Kopeng KM 6', '-', 'pak dadang'),
(120, 'CUST-120', 'PT TRI TUNGGAL PUTRA BERKAH', 'PT TRI TUNGGAL PUTRA BERKAH', 'JL Bugisan Selatan No. 5 Tirtonirmolo Kasihan Bantul', '-', ''),
(121, 'CUST-121', 'TOKO ABADI PLASTIK', 'TOKO ABADI PLASTIK', 'Jl. Perum Bumi Fajar Indah No 31 Kranji 		 				 				', '-', '0853-7351-5302		'),
(122, 'CUST-122', 'DIAN TRI JAYA', 'DIAN TRI JAYA', 'Jl Banten Lama Kp ANgsoka Jaya RT 02 RW 09 Kel Kasemsen Kec Kasemen', '-', ''),
(123, 'CUST-123', 'IBU ANI', 'IBU ANI', 'BEKASI', '-', ''),
(124, 'CUST-124', 'TOKO PIANTA PLASTIK', 'TOKO PIANTA PLASTIK', 'BEKASI', '-', ''),
(125, 'CUST-125', 'SAMSUL', 'SAMSUL', 'BEKASI', '-', ''),
(126, 'CUST-126', 'TOKO 3I PLASTIK', 'TOKO 3I PLASTIK', 'JATIMULYA', '-', '-'),
(127, 'CUST-127', 'SM NUGGET', 'SM NUGGET', 'BEKASI', '-', '-'),
(128, 'CUST-128', 'PAK AHMAD YANI', 'PAK AHMAD YANI', 'Kampung Cikeli Desa Tirem Kec Lebak Wangi Kab Serang-Banten RT 03 RW 02 No 96', '-', '0856-1275-461'),
(129, 'CUST-129', 'PAK BAKHTIAR', 'PAK BAKHTIAR', 'BEKASI', '-', '-'),
(130, 'CUST-130', 'PAK SUDARTO', 'PAK SUDARTO', 'BEKASI', '-', '-'),
(131, 'CUST-131', 'PAK BAMBANG', 'PAK BAMBANG', 'Jl Setia Jadi, Komplek Krakatau Garden Blok H4-Medan', 'JL Bismaraya Timur II Blok DI No 24 Jakarta', ''),
(132, 'CUST-132', 'NN', 'NN', 'BEKASI', '-', '-'),
(133, 'CUST-133', 'MAJU JAYA KHARISMA', 'MAJU JAYA KHARISMA', 'Sunter Indah 13 Blok KF 2 No. 2 Jakarta Utara', '-', ''),
(134, 'CUST-134', 'PAK BAHRUN', 'PAK BAHRUN', 'BEKASI', '-', '-'),
(135, 'CUST-135', 'CV ZULFA PLASTINDO', 'CV ZULFA PLASYINDO', 'Kp Rawa Jati RT 03 RW 08 Kel Mekar Wangi Kec Tanah Sareal', '-', '-'),
(136, 'CUST-136', 'PAK AGUS SEHU', 'PAK AGUS SEHU', 'Ekpedisi : Kobra Express. Jl. Raya Boulevard Hijau, Harapan Indah', 'Ekpedisi : Kobra Express. Jl. Raya Boulevard Hijau, Harapan Indah', '-'),
(137, 'CUST-137', 'TOKO IRWAN', 'TOKO IRWAN', 'Jl Pulo Ribung 46A/3 Galaxy Bekasi Selatan', '-', '081212069932'),
(138, 'CUST-138', 'TOKO RICO PLASTIK', 'TOKO RICO PLASTIK', 'Jl Mes AL Jati Raden Depan Masjid Al Akmal Kec Jati Sampurna', '-', '081295331395'),
(139, 'CUST-139', 'TOKO ERICK PLASTIK', 'TOKO ERICK PLASTIK', 'Bintara Raya 12A No 5A', '-', '0895339998660'),
(140, 'CUST-140', 'TOKO TRI JAYA 2 PLASTIK', 'TOKO TRI JAYA 2 PLASTIK', 'Jl Mes AL, Jati Raden Kec. Jati Sampurna', '-', '0878-8815-6662'),
(141, 'CUST-141', 'TOKO PONOROGO', 'TOKO PONOROGO', 'Jl Kasuari III Cikarang Baru', '-', '-'),
(142, 'CUST-142', 'PAK ADE', 'PAK ADE', 'Kp Babakan Bogor Kosambi No 11 RT 30 RW 09 Desa Duren Kec Klari Kab Karawang', '-', '-'),
(143, 'CUST-143', 'TOKO WIJAYA PLASTIK', 'TOKO WIJAYA PLASTIK', 'Jl Raya Kaliabang Tengah Ruko Nain RT 01 RW 15 Kaliabang Tengah', '-', '082123135802'),
(144, 'CUST-144', 'TOKO UNI KENCANA PLASTIK', 'TOKO UNI KENCANA PLASTIK', 'Jalan Damai Belakang Pasar Cipete', '-', ''),
(145, 'CUST-145', 'PAK MUDASIR', 'PAK MUDASIR', 'Perum Mustika Wanasari Blok A7 No 16', '-', '081317510511'),
(146, 'CUST-146', 'TOKO TRYAS', 'TOKO TRYAS', 'Perum Darmawangsa Residence Cluster Borobudur Blok CB 4 No 15', '-', ''),
(147, 'CUST-147', 'TOKO ILHAM', 'TOKO ILHAM', 'Jl Raya Gabus Tambun Utara', '-', '081289625789'),
(148, 'CUST-148', 'PAK BAHRUN', 'PAK BAHRUN', 'BEKASI', '-', ''),
(149, 'CUST-149', 'TOKO BERKAH JAYA PLASTIK', 'TOKO BERKAH JAYA PLASTIK', 'Jl KH Noer Alie Kel Bahagia Kec Babelan Bekasi Utara', '-', '082211034243'),
(150, 'CUST-150', 'TOKO CHANDRA SARANA', 'TOKO CHANDRA SARANA', 'Jl KH Agus Salim No 35 RT 05 RW 08 Kel Bekasi Jaya Kec Bekasi Timur', '-', '021-82671057'),
(151, 'CUST-151', 'PAK ROMLI', 'PAK ROMLI', 'CIBINONG', '-', '-'),
(152, 'CUST-152', 'TOKO PRIMA', 'TOKO PRIMA', 'Pasar Perumnas Klender, Lt Dasar Blok AKS No. 49 Jakarta Timur', '-', '-'),
(153, 'CUST-153', 'TOKO JAYA STAR PLASTIK', 'TOKO JAYA STAR PLASTIK', 'Pamulang Timur Tangerang Selatan', '-', '081311228105'),
(154, 'CUST-154', 'PAK FAISAL', 'PAK FAISAL', 'BEKASI', '-', '-'),
(155, 'CUST-155', 'TOKO ROBIN PLASTIK', 'TOKO ROBIN PLASTIK', 'Jl Narogong KM 15. Depan Perbatasan Tugu Bantar Gebang-Cilengsi', '-', '08121632886'),
(156, 'CUST-156', 'TOKO IDOLA PLASTIK					', 'TOKO IDOLA PLASTIK					', 'Jl Perempatan Pasar Bantar Gebang No 28    ', '-', '0812-8380-8478'),
(157, 'CUST-157', 'TOKO LUCKY PLASTIK					', 'TOKO LUCKY PLASTIK					', 'Jl Rawa Hinglik (Futsal Tik) Cilengsi-Bogor      ', '-', '0851-0066-6302'),
(158, 'CUST-158', 'TOKO MUSTIKA  JAYA PLASTIK				', 'TOKO MUSTIKA  JAYA PLASTIK			', 'Perum Dukuh Zamrud, Patung Garuda, Mustika Jaya Bekasi', '-', '0813-1254-0250'),
(159, 'CUST-159', 'TOKO PUTRI SIKUMBANG					', 'TOKO PUTRI SIKUMBANG					', 'Pasar Baru Jati Asih Blok B1 No 8, 10, 11   ', '-', '0813-1790-3755'),
(160, 'CUST-160', 'PAK NUR', 'PAK NUR', 'Bekasi', '-', '-'),
(161, 'CUST-161', 'PAK JOKO', 'PAK JOKO', 'BEKASI', '-', ''),
(162, 'CUST-162', 'CV CAHAYA BOGA UTAMA', 'CV CAHAYA BOGA UTAMA', 'Central Bali Logistik. Jl. Penggilingan Raya No 140 Cakung Jakarta Timur', 'Central Bali Logistik. Jl. Penggilingan Raya No 140 Cakung Jakarta Timur', '-'),
(163, 'CUST-163', 'TOKO BAROKAH PLASINDO', 'Bapak Ican', 'Jl Suka Karya No 39 RT 03 RW 02', 'Ekspedisi : APE. Jl. Kapuk Kamal Komp Bisnis Pluit Blok P No 21 Jakarta Utara', ''),
(164, 'CUST-164', 'PAK PIPIN', 'PAK PIPIN', 'Dusun Tanon Lor RT 001 RW 002 Desa Gedongan Kec. Colomadu Kab. Karang Anyar Jawa Tengah', '-', '-'),
(165, 'CUST-165', 'GATHUL', 'GATHUL', 'Bekasi', '-', '-'),
(166, 'CUST-166', 'PERDANA JAYA BEKASI', 'PERDANA JAYA BEKASI', 'Jl. Raya Babelan RT 03 RW 02 Kel. Kebalen Kec. Babelan Kab Bekasi				 				 				', '-', '-'),
(167, 'CUST-167', 'PAK RIZAL', 'PAK RIZAL', 'BEKASI', '-', '-'),
(168, 'CUST-168', 'DAPUR SUS AND CAKE', 'DAPUR SUS AND CAKE', 'Jl Durian 1 No 13 Perumnas 1 Bekasi Barat Belakang Polsek 0811-1582-100				 				 				', '-', '-'),
(169, 'CUST-169', 'PAK ARIEF', 'PAK ARIEF', 'Perum Pondok Hijau Ngaliyan A-21 RT 003 RW 01 Semarang				 				 				', '-', '-'),
(170, 'CUST-170', 'TOKO PISANGAN PLASTIK', 'TOKO PISANGAN PLASTIK', 'Jl. Pisangan Baru Tengah RT 05 RW 10 Jatinegara Jak-Tim				 				 							 				 				', '	 				 				', '-'),
(171, 'CUST-171', 'TOKO KARYA BERSAMA', 'TOKO KARYA BERSAMA', 'Jl Pondok Ungu Permai Kaliabang Tengah Bekasi Utara 			 				 				', '-', '0812-6647-8492'),
(172, 'CUST-172', 'PT ARDENA ARTHA MULIA					', 'PT ARDENA ARTHA MULIA					', 'Jl Cempaka Putih Utara No 285 			 				 				', '-', '(021-4216133)	'),
(173, 'CUST-173', 'TOKO PINANG JAYA', 'TOKO PINANG JAYA', 'Jl Bintara Raya I Ruko No 2', '-', '-'),
(174, 'CUST-174', 'UD RAHAYU', 'UD RAHAYU', 'Perum Ranau Estate Blok M No 28 RT 03 RW 04 Panggung Jati Tarakan Serang Banten				 				 				', '-', '-'),
(175, 'CUST-175', 'PT MACRO PRIMA PANGAN UTAMA', 'PT MACRO PRIMA PANGAN UTAMA', 'JL Telaga Mas Raya No 1, Telaga, Kec.Cikupa, Tangerang, Banten 15134				 				 				', '-', '-'),
(176, 'CUST-176', 'TOKO SINAR AGUNG', 'TOKO SINAR AGUNG', 'Jl Raya Babelan No 36 Kec Babelan				 				 				', '-', '-'),
(177, 'CUST-177', 'IBU DWI', 'IBU DWI', 'BEKASI', '-', '-'),
(178, 'CUST-178', 'PAK RUSLIYADI', 'PAK RUSLIYADI', 'Jl Gajah Mada Jakarta Pusat				 				 				', '-', '-'),
(179, 'CUST-179', 'PAK FREDDY', 'PAK AON', '-', 'Eksp. Lotus Mitra Jaya, Gudang 08 S Pelabuhan Sunda Kelapa, Jakarta				 				 				', '-'),
(180, 'CUST-180', 'PT ARDENA ARTHA MULIA					', 'PT ARDENA ARTHA MULIA					', 'Jl Cempaka Putih Utara No 285 Cempaka Baru Jakarta Pusat				 				 				', '-', '-'),
(181, 'CUST-181', 'PT KEMANG FOOD INDUSTRIES					', 'PT KEMANG FOOD INDUSTRIES				', 'Jl Pulo Kambing II KIP Jatinegara-Cakung Jakarta Timur				 				 				', '-', '-'),
(182, 'CUST-182', 'PAK RIYADI', 'PAK RIYADI', 'BEKASI', '-', '-'),
(183, 'CUST-183', 'SATIMIN', 'SATIMIN', 'Pergudangan 99 Blok 1 No 1 & 2				 				 				', 'Pergudangan 99 Blok 1 No 1 & 2				 				 				', '-'),
(184, 'CUST-184', 'PAK ROMI', 'PAK ROMI', 'CIBINONG', '-', '-'),
(185, 'CUST-185', 'TOKO LUSI', 'TOKO LUSI', 'BEKASI', '-', '-'),
(186, 'CUST-186', 'PAK INDRO', 'PAK INDRO', 'BEKASI', '-', '-'),
(187, 'CUST-187', 'PAK WILLIAM', 'PAK WILLIAM', 'Jl Andri No 142 Dungus Cariang Kec Andri Kota Bandung				 				 				', '-', '-'),
(188, 'CUST-188', 'PAK BUDI', 'PAK BUDI', 'Jl Letjen Mashudi No 99 Mulyasari Tamansari Tasikmalaya				 				 				', '-', '-'),
(189, 'CUST-189', 'BERLIAN FOOD', 'BERLIAN FOOD', 'Duta Bumi 3,Blok 3R No.5 Rt.007 Rw.033,Jl.Duta Permai X,Kota Harapan Indah,Bekasi				 				 				', '-', '-'),
(190, 'CUST-190', 'tri putra sukes makmur', 'tri putra sukses makmur', 'tanggerang', '-', '-'),
(191, 'CUST-191', 'TOKO ROTI MILKI', 'TOKO ROTI MILKI', 'Jl Bintara 4 Gg H Anjin No 15 Rt 01 Rw 01 Kel Bintara  Kec Bekasi Barat', '-', '-'),
(192, 'CUST-192', 'TOKO ALFINA', 'TOKO ALFINA', 'Jl Nusantara Raya No 7 Samping SPBU Dekat RS Sentosa Perumnas 3 Bekasi Timur', '-', '-'),
(193, 'CUST-193', 'blank', 'blank', '-', '-', '-'),
(194, 'CUST-194', 'TIGA BOGA RASA, PT', 'TIGA BOGA RASA, PT', '-', '-', '-'),
(195, 'CUST-195', 'PT TIGA BOGA PERKASA', 'PT TIGA BOGA PERKASA', 'Kompleks Minasi Indah Residence C No 16 RT 007 RW 006 Gunung Sari Rappocini Kota Makassar Sulawesi Selatan', '-', '-'),
(196, 'CUST-196', 'PAK ELI', 'PAK ELI', 'Jl KH Mas Mansyur RT 04 RW 02 Kel Bekasi Jaya Indah Kec Bekasi Timur				 				 				', '-', '-'),
(197, 'CUST-197', 'PAK HERLI', 'PAK HERLIN', 'Komplek Griya Bandung Asri 3 Blok C7 No 8 RT 07 RW 10 Ciganitri Bandung 40287', '-', '-'),
(198, 'CUST-198', 'TOKO AL BAROKAH (PAK ANTO)', 'TOKO AL BAROKAH (PAK ANTO)', 'Ekspedisi : Karya Utama Komplek Ruko Arcadia Blok A No 9 Batu Ceper Tangerang', 'Ekspedisi : Karya Utama Komplek Ruko Arcadia Blok A No 9 Batu Ceper Tangerang', ''),
(199, 'CUST-199', 'IBU AYU', 'IBU AYU', 'JATISARI', '-', '-'),
(200, 'CUST-200', 'TOKO BUMI JAYA', 'TOKO BUMI JAYA', 'Pasar Rawa Lumbu Depan Pos Security Blok II No 57 RT 07 RW 04 Kel Pengasinan Kec Rawa Lumbu', '-', '-'),
(201, 'CUST-201', 'TOKO SUMBER REZEKI', 'TOKO SUMBER REZEKI', 'Pasar Gembrong Baru Blok AKS 265-266, Cempaka Putih, Jakarta Pusat', '-', '-'),
(202, 'CUST-202', 'IBU LIA', 'IBU LIA', '-', '-', '-'),
(203, 'CUST-203', 'PAK SUTIYONO', 'PAK SUTIYONO', '-', '-', '-'),
(204, 'CUST-204', 'PT TRIPUTERA SUKSES MAKMUR', 'PT TRIPUTERA SUKSES MAKMUR', 'Jl Talaga Mas III No 5 Kawasan Industri Cikupamas, I Cikupa Tangerang				 				 				', 'Jl Talaga Mas III No 5 Kawasan Industri Cikupamas, I Cikupa Tangerang				 				 				', '-'),
(205, 'CUST-205', 'PAK PUTRA', 'PAK PUTRA', 'PT Gumarang Indo Express. Ruko Cendana Blok A No 26 Jl Benteng Betawi Rt 01 Rw 15 Poris Plawad Kec Tangerang', 'PT Gumarang Indo Express. Ruko Cendana Blok A No 26 Jl Benteng Betawi Rt 01 Rw 15 Poris Plawad Kec Tangerang', '-'),
(206, 'CUST-206', 'PAK JOKO BSD', 'PAK JOKO BSD', 'Jl Empu Sendok Raya No 41 RT 01 RW 04 Perumnas 2 Kelurahan Cibodas Baru Kec Cibodas Kota bogor', '-', '081314573203'),
(207, 'CUST-207', 'PAK ARIF HAKIM', 'PAK ARIF HAKIM', 'Ekspedisi : Golden Ekspress. Ancol Barat 2 No 5 belakang Pabrik Nippon Paint Jakarta', '-', '-'),
(208, 'CUST-208', 'TOKO HIKMAH KARYA PLASINDO', 'TOKO HIKMAH KARYA PLASINDO', 'Jl Raya Jatimulya Perum Jatimulya Blok H-263', '-', '081212944515'),
(209, 'CUST-209', 'TOKO ADIJAYA', 'TOKO ADIJAYA', 'Pasar Roxy Cikarang Baru KS AC No 9', '-', '0819-1506-6694'),
(210, 'CUST-210', 'PT PONDASI INTI SEJAHTERA					', 'PT PONDASI INTI SEJAHTERA			', 'Jl Bugisan Selatan Blok O RT 040 Kel Ngestiharjo Kec Kasihan Bantul Yogyakarta				 				 				', '-', '-'),
(211, 'CUST-210', 'CV OLIMPIC SARI RASA', 'CV OLIMPIC SARI RASA', 'Ekspedisi : CV Banten Express .Jl Jend Sudirman Pergudangan Beras Blok E No 10 Depan Pasar Induk Tanah Tinggi Tangerang', '-', '-'),
(213, 'CUST-209', 'PAK GUNAWAN PKU', 'PAK GUNAWAN PKU', 'Perumahan Kuantan Regency Cluster Paradise Blok H No 11, Pekanbaru', '-', '-'),
(214, 'CUST-210', 'PAK AKIN', 'PAK AKIN', 'Jl Pegangsaan 2 (Belakang Apartemen Gading Nias) Kel Pegangsaan Dua Kec Kelapa Gading', '-', '-'),
(215, 'CUST-211', 'UD JIMI BEKASI', 'UD JIMI BEKASI', 'Pasar Baru Bekasi Besmen Blok J16', '-', '-'),
(216, 'CUST-212', 'PAK NURI', 'PAK NURI', 'Jl Ujung Aspal Pondok Gede', '-', ''),
(217, 'CUST-213', 'PAK ABRAR', 'PAK ABRAR', 'Ekspedisi ifx. Jl Taman Permata Indah 2 Blok N No 45 Penjaringan RT 12 RW 14 Pejagalan, enjaringan Jakarta Utara', 'Ekspedisi ifx. Jl Taman Permata Indah 2 Blok N No 45 Penjaringan RT 12 RW 14 Pejagalan, enjaringan Jakarta Utara', '-'),
(218, 'CUST-214', 'TOKO ANEKA JAYA', 'TOKO ANEKA JAYA', 'Perum Villa Nusa Indah. Jl Villa Nusa Indah II Bojong Kulur Kec Gunung Putri				 				 				', 'Perum Villa Nusa Indah. Jl Villa Nusa Indah II Bojong Kulur Kec Gunung Putri				 				 				', ''),
(219, 'CUST-215', 'PAK ERIK', 'PAK ERIK', 'Ekspedisi : PT WAHANA LINTAS BATAM', 'Ekspedisi : PT WAHANA LINTAS BATAM', '082114745283'),
(220, 'CUST-216', 'DYNASTY TRITAMA PERKASA', 'DYNASTY TRITAMA PERKASA', 'Ekspedisi : Kota Djawai. Pelabuhan Sunda Kelapa Gudang 04S', 'Ekspedisi : Kota Djawai. Pelabuhan Sunda Kelapa Gudang 04S', ''),
(224, 'CUST-217', 'AAT MAS', 'AAT MAS', 'Desa Pasir Angin kp cinyising rt 04 rw 01 Pasir angin cileungsi bogor', 'Desa Pasir Angin kp cinyising rt 04 rw 01 Pasir angin cileungsi bogor', 'AAT MAS'),
(226, 'CUST-218', 'PT RAJA JEVA NISI', 'PT RAJA JEVA NISI', 'Jl Raya Kosambi Curug KM 8 Dusun Krajan RT 015 RW 003 Desa Curug Kec Klari Kab Karawang', 'Jl Raya Kosambi Curug KM 8 Dusun Krajan RT 015 RW 003 Desa Curug Kec Klari Kab Karawang', '-'),
(227, 'CUST-218', 'PT RAJA JEVA NISI', 'PT RAJA JEVA NISI', 'Jl Raya Kosambi Curug KM 8 Dusun Krajan RT 015 RW 003 Desa Curug Kec Klari Kab Karawang', 'Jl Raya Kosambi Curug KM 8 Dusun Krajan RT 015 RW 003 Desa Curug Kec Klari Kab Karawang', '-'),
(228, 'CUST-220', 'PT UNIRAMA DUTA NIAGA', 'PT UNIRAMA DUTA NIAGA', 'Jl Industri Selatan 11 Blok LL No 5F Kawasan Industri Jababeka 2 Cikarang', '-', '-'),
(229, 'CUST-221', 'PAK HERU', 'PAK HERU', '-', '-', '-'),
(230, 'CUST-222', 'TOKO PETOJAYA', 'TOKO PETOJAYA', 'Jakarta Pusat', '-', '-'),
(231, 'CUST-223', 'PT EXPRAVET NASUBA', 'PT EXPRAVET NASUBA', 'PT GUMARANG INDO EKSORESS. JL BENTENG BETAWI RUKO CENDANA BLOK A NO 26 PORIS TANAH TINGGI TANGERANG', 'PT GUMARANG INDO EKSORESS. JL BENTENG BETAWI RUKO CENDANA BLOK A NO 26 PORIS TANAH TINGGI TANGERANG', '-'),
(232, 'CUST-224', 'CV GLORY', 'CV GLORY', 'Ekspedisi : PT WAHANA LINTAS BATAM. Depo Tanto PT Rukindo Jl Ancol Baru No 7 kalijabat', 'Ekspedisi : PT WAHANA LINTAS BATAM. Depo Tanto PT Rukindo Jl Ancol Baru No 7 kalijabat', '082114745283'),
(233, 'CUST-225', 'BU CHRISTINE PLUIT', 'BU CHRISTINE', 'JL PLUIT PERMAI DALAM 3 NO 7 JAKARTA UTARA', 'JL PLUIT PERMAI DALAM 3 NO 7 JAKARTA UTARA', '-'),
(234, 'CUST-225', 'PT RAMA PUTRA', 'PT RAJA JEVA NISI', 'Jl Raya Kosambi Curug KM 8 Dusun Krajan RT 015 RW 003 Desa Curug Kec Klari Kab Karawang', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `formula_new`
--

CREATE TABLE IF NOT EXISTS `formula_new` (
`no` int(11) NOT NULL,
  `id_fg` varchar(20) NOT NULL,
  `no_form` varchar(9) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `nm_fg` varchar(40) NOT NULL,
  `terigu1` varchar(10) NOT NULL,
  `terigu2` varchar(10) NOT NULL,
  `r1` varchar(30) NOT NULL,
  `rm1` varchar(20) NOT NULL,
  `r2` varchar(30) NOT NULL,
  `rm2` varchar(20) NOT NULL,
  `r3` varchar(30) NOT NULL,
  `rm3` varchar(20) NOT NULL,
  `r4` varchar(30) NOT NULL,
  `rm4` varchar(20) NOT NULL,
  `r5` varchar(30) NOT NULL,
  `rm5` varchar(20) NOT NULL,
  `r6` varchar(30) NOT NULL,
  `rm6` varchar(20) NOT NULL,
  `r7` varchar(30) NOT NULL,
  `rm7` varchar(20) NOT NULL,
  `r8` varchar(30) NOT NULL,
  `rm8` varchar(20) NOT NULL,
  `r9` varchar(30) NOT NULL,
  `rm9` varchar(20) NOT NULL,
  `r10` varchar(30) NOT NULL,
  `rm10` varchar(20) NOT NULL,
  `r11` varchar(30) NOT NULL,
  `rm11` varchar(20) NOT NULL,
  `r12` varchar(30) NOT NULL,
  `rm12` varchar(20) NOT NULL,
  `r13` varchar(30) NOT NULL,
  `rm13` varchar(20) NOT NULL,
  `r14` varchar(20) NOT NULL,
  `rm14` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `formula_new`
--

INSERT INTO `formula_new` (`no`, `id_fg`, `no_form`, `tgl`, `nm_fg`, `terigu1`, `terigu2`, `r1`, `rm1`, `r2`, `rm2`, `r3`, `rm3`, `r4`, `rm4`, `r5`, `rm5`, `r6`, `rm6`, `r7`, `rm7`, `r8`, `rm8`, `r9`, `rm9`, `r10`, `rm10`, `r11`, `rm11`, `r12`, `rm12`, `r13`, `rm13`, `r14`, `rm14`) VALUES
(1, 'FG-01', 'RND-001', '2020-03-15', 'Eco Royal Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0.6', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(2, 'FG-02', 'RND-002', '2020-03-15', 'Eco Royal Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(3, 'FG-03', 'RND-003', '2020-03-15', 'Eco Royal Mix', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.18', 'PRX 03', '0', 'PRX 04', '0.24', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(4, 'FG-04', 'RND-004', '2020-03-15', 'Eco Royal White', '35', '0', 'PRX A', '0', 'PRX B', '0.7', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0.5', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.3'),
(5, 'FG-05', 'RND-005', '2020-03-15', 'Eco Royal Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0.675', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(6, 'FG-06', 'RND-006', '2020-03-15', 'Sapu Jagat Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0.5', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(7, 'FG-07', 'RND-007', '2020-03-15', 'Sapu Jagat Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(8, 'FG-08', 'RND-008', '2020-03-15', 'Sapu Jagat Mix', '35', '0', 'PRX A', '1.4', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.18', 'PRX 03', '0', 'PRX 04', '0.24', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(9, 'FG-09', 'RND-009', '2020-03-15', 'Sapu Jagat White', '35', '0', 'PRX A', '0', 'PRX B', '0.75', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0.03', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(10, 'FG-10', 'RND-010', '2020-03-15', 'Eco Raja Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0.75', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(11, 'FG-11', 'RND-011', '2020-03-15', 'Eco Raja Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(12, 'FG-12', 'RND-012', '2020-03-15', 'Eco Raja Mix', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0.45', 'PRX 02', '0.12', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(13, 'FG-13', 'RND-013', '2020-03-15', 'Raja Orange EB', '35', '0', 'PRX A', '1', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0.75', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.2'),
(14, 'FG-14', 'RND-014', '2020-03-15', 'Raja Yellow EB', '35', '0', 'PRX A', '1', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.2'),
(15, 'FG-15', 'RND-015', '2020-03-15', 'Raja Mix', '35', '0', 'PRX A', '1', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.18', 'PRX 03', '0', 'PRX 04', '0.36', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.2'),
(16, 'FG-16', 'RND-016', '2020-03-15', 'RJ BC 01 Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0.5', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(17, 'FG-17', 'RND-017', '2020-03-15', 'RJ BC 01 Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(18, 'FG-18', 'RND-018', '2020-03-15', 'RJ BC 01', '35', '0', 'PRX A', '0.5', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.15', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '1.2', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(19, 'FG-19', 'RND-019', '2020-03-15', 'Royal Orange EB', '35', '0', 'PRX A', '0.75', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0.5', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.3'),
(20, 'FG-20', 'RND-020', '2020-03-15', 'RYL BC 01 Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0.82', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.2'),
(21, 'FG-21', 'RND-021', '2020-03-15', 'RYL BC 01 Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.2'),
(22, 'FG-22', 'RND-022', '2020-03-15', 'RYL BC 01', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.315', 'PRX 03', '0.246', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(23, 'FG-23', 'RND-023', '2020-03-15', 'RYL BC 02 Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0.55', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(24, 'FG-24', 'RND-024', '2020-03-15', 'RYL BC 02 Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.35', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(25, 'FG-25', 'RND-025', '2020-03-15', 'RYL BC 02', '35', '0', 'PRX A', '1', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.21', 'PRX 03', '0.09', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(26, 'FG-26', 'RND-026', '2020-03-15', 'RYL BC 04 Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0.55', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(27, 'FG-27', 'RND-027', '2020-03-15', 'RYL BC 04 Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(28, 'FG-28', 'RND-028', '2020-03-15', 'RYL BC 04', '35', '0', 'PRX A', '1.4', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0.55', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(29, 'FG-29', 'RND-029', '2020-03-15', 'RYL BC 06 Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0.75', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(30, 'FG-30', 'RND-030', '2020-03-15', 'RYL BC 06 Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(31, 'FG-31', 'RND-031', '2020-03-15', 'RYL BC 06', '35', '0', 'PRX A', '1.4', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.18', 'PRX 03', '0.3', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(32, 'FG-32', 'RND-032', '2020-03-15', 'RYL BC 07 ', '35', '0', 'PRX A', '1', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0.5', 'RAGI', '0.4', 'SHORTENING', '0.3', 'MARGARINE', '0'),
(33, 'FG-33', 'RND-033', '2020-03-15', 'RYL BC 05 Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0.88', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(34, 'FG-34', 'RND-034', '2020-03-15', 'RYL BC 05 Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.47', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(35, 'FG-35', 'RND-035', '2020-03-15', 'RYL BC 05', '35', '0', 'PRX A', '1', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.329', 'PRX 03', '0.264', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(36, 'FG-36', 'RND-036', '2020-03-15', 'Royal White', '25', '10', 'PRX A', '0', 'PRX B', '0.75', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0.5', 'RAGI', '0.4', 'SHORTENING', '0.3', 'MARGARINE', '0'),
(37, 'FG-37', 'RND-037', '2020-03-15', 'Royal Yellow EB', '35', '0', 'PRX A', '0', 'PRX B', '0.7', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.2'),
(38, 'FG-38', 'RND-038', '2020-03-15', 'Royal Orange EB', '35', '0', 'PRX A', '0', 'PRX B', '0.7', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0.6', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.3'),
(39, 'FG-39', 'RND-039', '2020-03-15', 'Royal Mix EB', '35', '0', 'PRX A', '0', 'PRX B', '0.75', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.18', 'PRX 03', '0', 'PRX 04', '0.24', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.3'),
(40, 'FG-40', 'RND-040', '2020-03-15', 'RYL BC 11', '35', '0', 'PRX A', '0', 'PRX B', '0', 'PRX C', '1', 'PRX D', '1', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0.5', 'RAGI', '0.4', 'SHORTENING', '0.5', 'MARGARINE', '0'),
(41, 'FG-41', 'RND-041', '2020-03-15', 'Eco Crumb Orange', '35', '0', 'PRX A', '0', 'PRX B', '0', 'PRX C', '0.5', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0.75', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(42, 'FG-42', 'RND-042', '2020-03-15', 'RYL BC 10 Orange', '35', '0', 'PRX A', '0', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '1', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0.85', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(43, 'FG-43', 'RND-043', '2020-03-15', 'RYL BC 10 Yellow', '35', '0', 'PRX A', '0', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '1', 'PRX 01', '0', 'PRX 02', '0.37', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(44, 'FG-44', 'RND-044', '2020-03-15', 'RYL BC 10', '35', '0', 'PRX A', '0', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '1', 'PRX 01', '0', 'PRX 02', '0.259', 'PRX 03', '0.255', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(45, 'FG-45', 'RND-045', '2020-03-16', 'Eco Royal White', '35', '0', 'PRX A', '1', 'PRX B', '1', 'PRX C', '1', 'PRX D', '1', 'PRX E', '3', 'PRX 02', '1', 'PRX 03', '0.38', 'PRX 04', '0.86', 'PRX 05', '1', 'PRX 06', '1', 'PRX 07', '1', 'RAGI', '0.4', 'SHORTENING', '1', 'MARGARINE', '1'),
(46, 'FG-46', 'RND-046', '2020-03-15', 'RYL BC 09 Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(47, 'FG-47', 'RND-047', '2020-03-15', 'RYL BC 09 Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0.7', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(48, 'FG-48', 'RND-048', '2020-03-15', 'RYL BC 09', '35', '0', 'PRX A', '1', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.21', 'PRX 03', '0.49', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(49, 'FG-49', 'RND-049', '2020-03-15', 'RYL BC 13 Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(50, 'FG-50', 'RND-050', '2020-03-15', 'RYL BC 13 Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0', 'PRX 03', '0.7', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(51, 'FG-51', 'RND-051', '2020-03-15', 'RYL BC 13', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.21', 'PRX 03', '0', 'PRX 04', '0.18', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(52, 'FG-52', 'RND-052', '2020-03-15', 'RYL BC 03 Orange', '35', '0', 'PRX A', '0.75', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0.35', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0'),
(53, 'FG-53', 'RND-053', '2020-03-15', 'RJ BC 03 Orange', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0.75', 'PRX 02', '0', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.2'),
(54, 'FG-54', 'RND-054', '2020-03-15', 'RJ BC 03 Yellow', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.2'),
(55, 'FG-55', 'RND-055', '2020-03-15', 'RJ BC 03', '35', '0', 'PRX A', '1', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0.45', 'PRX 02', '0.12', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0.2'),
(56, 'FG-56', 'RND-056', '2020-03-15', 'RJ BC 02', '35', '0', 'PRX A', '0.7', 'PRX B', '0', 'PRX C', '0', 'PRX D', '0', 'PRX E', '0', 'PRX 01', '0', 'PRX 02', '0.3', 'PRX 03', '0', 'PRX 04', '0', 'PRX 05', '0', 'PRX 06', '0', 'RAGI', '0.4', 'SHORTENING', '0', 'MARGARINE', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_premix`
--

CREATE TABLE IF NOT EXISTS `form_premix` (
`no` int(11) NOT NULL,
  `nm_rm` varchar(20) NOT NULL,
  `rm1` float NOT NULL,
  `r2` varchar(20) NOT NULL,
  `rm2` float NOT NULL,
  `r3` varchar(30) NOT NULL,
  `rm3` float NOT NULL,
  `r4` varchar(30) NOT NULL,
  `rm4` float NOT NULL,
  `r5` varchar(30) NOT NULL,
  `rm5` float NOT NULL,
  `r6` varchar(30) NOT NULL,
  `rm6` float NOT NULL,
  `r7` varchar(30) NOT NULL,
  `rm7` float NOT NULL,
  `r8` varchar(30) NOT NULL,
  `rm8` float NOT NULL,
  `r9` varchar(30) NOT NULL,
  `rm9` int(11) NOT NULL,
  `berat` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `form_premix`
--

INSERT INTO `form_premix` (`no`, `nm_rm`, `rm1`, `r2`, `rm2`, `r3`, `rm3`, `r4`, `rm4`, `r5`, `rm5`, `r6`, `rm6`, `r7`, `rm7`, `r8`, `rm8`, `r9`, `rm9`, `berat`) VALUES
(1, 'PRX 01', 42, 'gula', 0, 'instant plus', 0, 'rj wrn 02', 1.05, 'rj wrn 03', 0, 'calcium', 0, 'rj wrn 01', 0.546, 'garam halus', 0, 'rj wrn 04', 0, 0.75),
(2, 'PRX 02', 42, 'gula', 0, 'instant plus', 0, 'rj wrn 02', 0, 'rj wrn 03', 0, 'calcium', 0, 'rj wrn 01', 0.105, 'garam halus', 0, 'rj wrn 04', 0, 0.3),
(3, 'PRX 03', 42, 'gula', 0, 'instant plus', 0, 'rj wrn 02', 0, 'rj wrn 03', 0.18, 'calcium', 0, 'rj wrn 01', 1.14, 'garam halus', 0, 'rj wrn 04', 0, 0.675),
(4, 'PRX 04', 42, 'gula', 0, 'instant plus', 0, 'rj wrn 02', 0.63, 'rj wrn 03', 0, 'calcium', 0, 'rj wrn 01', 0.945, 'garam halus', 0, 'rj wrn 04', 0, 0.6),
(5, 'PRX 05', 42, 'gula', 0, 'instant plus', 0, 'rj wrn 02', 4.5, 'rj wrn 03', 0, 'calcium', 0, 'rj wrn 01', 0, 'garam halus', 0, 'rj wrn 04', 0, 0.75),
(6, 'PRX 06', 42, 'gula', 0, 'instant plus', 0, 'rj wrn 02', 0, 'rj wrn 03', 0, 'calcium', 0, 'rj wrn 01', 0, 'garam halus', 0, 'rj wrn 04', 3, 0.5),
(7, 'PRX A', 26.4, 'gula', 12, 'instant plus', 1.2, 'rj wrn 02', 0, 'rj wrn 03', 0, 'calcium', 2.4, 'rj wrn 01', 0, 'garam halus', 0, 'rj wrn 04', 0, 0.7),
(8, 'PRX B', 9, 'gula', 12, 'instant plus', 3.6, 'rj wrn 02', 0, 'rj wrn 03', 0, 'calcium', 2.4, 'rj wrn 01', 0, 'garam halus', 18, 'rj wrn 04', 0, 0.75),
(9, 'PRX C', 19.32, 'gula', 16.8, 'instant plus', 0, 'rj wrn 02', 0, 'rj wrn 03', 0, 'calcium', 5.88, 'rj wrn 01', 0, 'garam halus', 0, 'rj wrn 04', 0, 0.5),
(10, 'PRX D', 14.28, 'gula', 8.4, 'instant plus', 0.84, 'rj wrn 02', 0, 'rj wrn 03', 0, 'calcium', 1.68, 'rj wrn 01', 0, 'garam halus', 16.8, 'rj wrn 04', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudangrm`
--

CREATE TABLE IF NOT EXISTS `gudangrm` (
`id` int(11) NOT NULL,
  `plan_prod` varchar(30) NOT NULL,
  `nm_fg` varchar(60) NOT NULL,
  `tgl` date NOT NULL,
  `shift` varchar(5) NOT NULL,
  `lot` varchar(4) NOT NULL,
  `terigua` varchar(30) NOT NULL,
  `jmlt1` varchar(10) NOT NULL,
  `terigub` varchar(30) NOT NULL,
  `jmlt2` varchar(5) NOT NULL,
  `r1` varchar(20) NOT NULL,
  `jml1` float NOT NULL,
  `r2` varchar(20) NOT NULL,
  `jml2` float NOT NULL,
  `r3` varchar(20) NOT NULL,
  `jml3` float NOT NULL,
  `r4` varchar(20) NOT NULL,
  `jml4` float NOT NULL,
  `r5` varchar(20) NOT NULL,
  `jml5` float NOT NULL,
  `r6` varchar(30) NOT NULL,
  `jml6` float NOT NULL,
  `r7` varchar(30) NOT NULL,
  `jml7` float NOT NULL,
  `r8` varchar(30) NOT NULL,
  `jml8` float NOT NULL,
  `r9` varchar(30) NOT NULL,
  `jml9` float NOT NULL,
  `r10` varchar(30) NOT NULL,
  `jml10` float NOT NULL,
  `r11` varchar(30) NOT NULL,
  `jml11` float NOT NULL,
  `r12` varchar(20) NOT NULL,
  `jml12` float NOT NULL,
  `r13` varchar(30) NOT NULL,
  `jml13` float NOT NULL,
  `r14` varchar(30) NOT NULL,
  `jml14` float NOT NULL,
  `r15` varchar(10) NOT NULL,
  `rm15` varchar(30) NOT NULL,
  `r16` varchar(10) NOT NULL,
  `rm16` varchar(30) NOT NULL,
  `r17` varchar(30) NOT NULL,
  `rm17` int(11) NOT NULL,
  `r18` varchar(30) NOT NULL,
  `rm18` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga_rm`
--

CREATE TABLE IF NOT EXISTS `harga_rm` (
`id` int(4) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `berat` varchar(5) NOT NULL,
  `nm_fg` varchar(40) DEFAULT NULL,
  `harga` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `harga_rm`
--

INSERT INTO `harga_rm` (`id`, `kategori`, `berat`, `nm_fg`, `harga`) VALUES
(1, 'terigu', '25', 'Terigu Dragonfly', '89078'),
(2, 'terigu', '25', 'Terigu f06', '100000'),
(3, 'terigu', '25', 'Terigu f02', '100000'),
(4, 'terigu', '25', 'terigu f02', '100000'),
(5, 'terigu', '25', 'terigu hikari', '100000'),
(6, 'terigu', '25', 'terigu falcon emas', '100000'),
(7, 'terigu', '25', 'terigu falcon kuning', '100000'),
(8, 'terigu', '25', 'terigu white bear', '100000'),
(9, 'terigu', '25', 'terigu payung', '100000'),
(10, 'terigu', '25', 'terigu kabuki', '100000'),
(11, 'terigu', '25', 'terigu gelang berlian', '100000'),
(12, 'terigu', '25', 'terigu tambang', '100000'),
(13, 'terigu', '25', 'serdadu kuning', '100000'),
(14, 'terigu', '25', 'serdadu biru', '100000'),
(15, 'terigu', '25', 'serdadu jingga', '100000'),
(16, 'label', '1', 'eco raja ', '100000'),
(17, 'label', '1', 'eco crumb orange ', '100000'),
(18, 'label', '1', 'royal', '100000'),
(19, 'label', '1', 'royal A4', '100000'),
(20, 'label', '1', 'eco royal', '100000'),
(21, 'label', '1', 'raja', '100000'),
(22, 'label', '1', 'jawara', '100000'),
(23, 'label', '1', 'zena', '100000'),
(24, 'label', '1', 'biola', '100000'),
(25, 'label', '1', 'sapu jagat', '100000'),
(26, 'label', '1', 'prambanan', '100000'),
(27, 'label', '1', 'tnj', '100000'),
(28, 'pewarna', '50', 'rj/wrn01', '100000'),
(29, 'pewarna', '50', 'rj/wrn02', '100000'),
(30, 'pewarna', '50', 'rj/wrn03', '100000'),
(31, 'pewarna', '50', 'rj/wrn04', '100000'),
(32, 'emulsi', '20', 'RAGI', '100000'),
(33, 'emulsi', '20', 'SHORTENING', '100000'),
(34, 'emulsi', '20', 'MARGARIINE', '100000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE IF NOT EXISTS `hutang` (
`id_produk` int(4) NOT NULL,
  `tglmasuk` date NOT NULL,
  `no_inv` varchar(20) NOT NULL,
  `sisa_hutang` varchar(20) NOT NULL,
  `jatuh_tempo` varchar(5) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`id_produk`, `tglmasuk`, `no_inv`, `sisa_hutang`, `jatuh_tempo`, `nama`) VALUES
(3, '2020-04-11', '', '110100000', '90', 'PT BUNGASARI FLOUR MILLS INDONESIA'),
(4, '2020-04-11', '', '108989000', '90', 'PT KABULINCO JAYA'),
(5, '2020-04-12', '', '1100000', '10', 'PT BUNGASARI FLOUR MILLS INDONESIA'),
(6, '2020-08-10', '', '979858', '30', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapprod`
--

CREATE TABLE IF NOT EXISTS `lapprod` (
`id` int(4) NOT NULL,
  `no_lap` varchar(50) NOT NULL,
  `plan_prod` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `shift` varchar(3) NOT NULL,
  `nm_fg` varchar(50) NOT NULL,
  `lot` varchar(3) NOT NULL,
  `aktualroti` varchar(39) NOT NULL,
  `sisa` varchar(6) NOT NULL,
  `jumlah` varchar(5) NOT NULL,
  `fg` varchar(5) NOT NULL,
  `prosentase` varchar(5) NOT NULL,
  `tgl_drying` varchar(19) NOT NULL,
  `shift_drying` varchar(3) NOT NULL,
  `berita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_hutang`
--

CREATE TABLE IF NOT EXISTS `pembayaran_hutang` (
`id` int(4) NOT NULL,
  `no_byr` varchar(39) NOT NULL,
  `tglmasuk` varchar(40) NOT NULL,
  `tgl_byr` varchar(29) NOT NULL,
  `nama` varchar(29) NOT NULL,
  `sisa1_hutang` varchar(29) NOT NULL,
  `sisa_hutang` varchar(29) NOT NULL,
  `no_inv` varchar(29) NOT NULL,
  `jatuh_tempo` varchar(40) NOT NULL,
  `no_rek` varchar(29) NOT NULL,
  `nama_bank` varchar(29) NOT NULL,
  `saldo` varchar(29) NOT NULL,
  `nominal` varchar(29) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_hutang`
--

INSERT INTO `pembayaran_hutang` (`id`, `no_byr`, `tglmasuk`, `tgl_byr`, `nama`, `sisa1_hutang`, `sisa_hutang`, `no_inv`, `jatuh_tempo`, `no_rek`, `nama_bank`, `saldo`, `nominal`) VALUES
(1, 'PAYMENT/HUTANG/04/2020/001', '11 April 2020', '2020-04-11', 'PT BUNGASARI FLOUR MILLS INDO', '1100000', '100000', '', '90', '3800', 'bank central asia (BCA)', '9900000', '1000000'),
(2, 'PAYMENT/HUTANG/04/2020/002', '11 April 2020', '2020-04-11', 'PT BUNGASARI FLOUR MILLS INDO', '100000', '0', '', '90', '3800', 'bank central asia (BCA)', '8900000', '100000'),
(3, 'PAYMENT/HUTANG/04/2020/003', '11 April 2020', '2020-04-11', 'PT BUNGASARI FLOUR MILLS INDO', '90000', '10000', '', '90', '3800', 'bank central asia (BCA)', '8800000', '80000'),
(4, 'PAYMENT/HUTANG/04/2020/004', '11 April 2020', '2020-04-11', 'PT BUNGASARI FLOUR MILLS INDO', '1100000', '100000', '', '90', '3800', 'bank central asia (BCA)', '8720000', '1000000'),
(5, 'PAYMENT/HUTANG/04/2020/005', '11 April 2020', '2020-04-11', 'PT BUNGASARI FLOUR MILLS INDO', '111100000', '110100000', '', '90', '3800', 'bank central asia (BCA)', '7720000', '1000000');

--
-- Trigger `pembayaran_hutang`
--
DELIMITER //
CREATE TRIGGER `cut hutang` AFTER INSERT ON `pembayaran_hutang`
 FOR EACH ROW BEGIN



IF new.saldo THEN
UPDATE hutang 
SET sisa_hutang=sisa_hutang-NEW.nominal
where no_inv=new.no_inv;
end if;

IF new.saldo THEN
UPDATE bank 
SET saldo=saldo-NEW.nominal
where no_rek=new.no_rek;
end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `petty_cash`
--

CREATE TABLE IF NOT EXISTS `petty_cash` (
`id` int(3) NOT NULL,
  `kd_byr` varchar(20) NOT NULL,
  `tgl` varchar(30) NOT NULL,
  `nama_akun` varchar(30) NOT NULL,
  `nominal` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petty_cash`
--

INSERT INTO `petty_cash` (`id`, `kd_byr`, `tgl`, `nama_akun`, `nominal`) VALUES
(3, 'P-CASH/04/2020/001', '2020-04-12', 'uang jalan', '10000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `planingprod`
--

CREATE TABLE IF NOT EXISTS `planingprod` (
`id` int(11) NOT NULL,
  `plan_prod` varchar(40) NOT NULL,
  `nm_fg` varchar(40) NOT NULL,
  `tgl` date NOT NULL,
  `mixer` varchar(5) NOT NULL,
  `oven` varchar(5) NOT NULL,
  `dd` int(5) NOT NULL,
  `shift` varchar(5) NOT NULL,
  `leader` varchar(10) NOT NULL,
  `lot` varchar(29) NOT NULL,
  `jumlah` varchar(5) NOT NULL,
  `screen` varchar(5) NOT NULL,
  `nm_cust` varchar(60) NOT NULL,
  `terigua` varchar(30) NOT NULL,
  `jmlt1` varchar(10) NOT NULL,
  `terigub` varchar(30) NOT NULL,
  `jmlt2` varchar(5) NOT NULL,
  `r1` varchar(20) NOT NULL,
  `jml1` float NOT NULL,
  `r2` varchar(20) NOT NULL,
  `jml2` float NOT NULL,
  `r3` varchar(20) NOT NULL,
  `jml3` float NOT NULL,
  `r4` varchar(20) NOT NULL,
  `jml4` float NOT NULL,
  `r5` varchar(20) NOT NULL,
  `jml5` float NOT NULL,
  `r6` varchar(30) NOT NULL,
  `jml6` float NOT NULL,
  `r7` varchar(30) NOT NULL,
  `jml7` float NOT NULL,
  `r8` varchar(30) NOT NULL,
  `jml8` float NOT NULL,
  `r9` varchar(30) NOT NULL,
  `jml9` float NOT NULL,
  `r10` varchar(30) NOT NULL,
  `jml10` float NOT NULL,
  `r11` varchar(30) NOT NULL,
  `jml11` float NOT NULL,
  `r12` varchar(20) NOT NULL,
  `jml12` float NOT NULL,
  `r13` varchar(30) NOT NULL,
  `jml13` float NOT NULL,
  `r14` varchar(30) NOT NULL,
  `jml14` float NOT NULL,
  `r15` varchar(10) NOT NULL,
  `rm15` varchar(30) NOT NULL,
  `r16` varchar(10) NOT NULL,
  `rm16` varchar(30) NOT NULL,
  `r17` varchar(30) NOT NULL,
  `rm17` int(11) NOT NULL,
  `r18` varchar(30) NOT NULL,
  `rm18` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppic_plan`
--

CREATE TABLE IF NOT EXISTS `ppic_plan` (
`id` int(11) NOT NULL,
  `ppic_id` varchar(30) NOT NULL,
  `plan_prod` varchar(40) NOT NULL,
  `nm_fg` varchar(40) NOT NULL,
  `tgl` date NOT NULL,
  `mixer` varchar(5) NOT NULL,
  `oven` varchar(5) NOT NULL,
  `dd` int(5) NOT NULL,
  `shift` varchar(5) NOT NULL,
  `leader` varchar(10) NOT NULL,
  `lot` varchar(29) NOT NULL,
  `jumlah` varchar(5) NOT NULL,
  `screen` varchar(5) NOT NULL,
  `nm_cust` varchar(60) NOT NULL,
  `terigua` varchar(30) NOT NULL,
  `jmlt1` varchar(10) NOT NULL,
  `terigub` varchar(30) NOT NULL,
  `jmlt2` varchar(5) NOT NULL,
  `r1` varchar(20) NOT NULL,
  `jml1` float NOT NULL,
  `r2` varchar(20) NOT NULL,
  `jml2` float NOT NULL,
  `r3` varchar(20) NOT NULL,
  `jml3` float NOT NULL,
  `r4` varchar(20) NOT NULL,
  `jml4` float NOT NULL,
  `r5` varchar(20) NOT NULL,
  `jml5` float NOT NULL,
  `r6` varchar(30) NOT NULL,
  `jml6` float NOT NULL,
  `r7` varchar(30) NOT NULL,
  `jml7` float NOT NULL,
  `r8` varchar(30) NOT NULL,
  `jml8` float NOT NULL,
  `r9` varchar(30) NOT NULL,
  `jml9` float NOT NULL,
  `r10` varchar(30) NOT NULL,
  `jml10` float NOT NULL,
  `r11` varchar(30) NOT NULL,
  `jml11` float NOT NULL,
  `r12` varchar(20) NOT NULL,
  `jml12` float NOT NULL,
  `r13` varchar(30) NOT NULL,
  `jml13` float NOT NULL,
  `r14` varchar(30) NOT NULL,
  `jml14` float NOT NULL,
  `r15` varchar(10) NOT NULL,
  `rm15` varchar(30) NOT NULL,
  `r16` varchar(10) NOT NULL,
  `rm16` varchar(30) NOT NULL,
  `r17` varchar(30) NOT NULL,
  `rm17` int(11) NOT NULL,
  `r18` varchar(30) NOT NULL,
  `rm18` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ppic_plan`
--

INSERT INTO `ppic_plan` (`id`, `ppic_id`, `plan_prod`, `nm_fg`, `tgl`, `mixer`, `oven`, `dd`, `shift`, `leader`, `lot`, `jumlah`, `screen`, `nm_cust`, `terigua`, `jmlt1`, `terigub`, `jmlt2`, `r1`, `jml1`, `r2`, `jml2`, `r3`, `jml3`, `r4`, `jml4`, `r5`, `jml5`, `r6`, `jml6`, `r7`, `jml7`, `r8`, `jml8`, `r9`, `jml9`, `r10`, `jml10`, `r11`, `jml11`, `r12`, `jml12`, `r13`, `jml13`, `r14`, `jml14`, `r15`, `rm15`, `r16`, `rm16`, `r17`, `rm17`, `r18`, `rm18`, `status`) VALUES
(1, 'PPICPLAN/04/2020/001', 'PLANPROD042020001', 'Eco Royal Mix', '2020-04-11', '1', 'OB1', 1, '1', 'aan', '10', '32.0', '4444', 'ANEKA PLASTAMA', 'Terigu Dragonfly', '350.0', '', '0.0', 'PRX A', 7, 'PRX B', 0, 'PRX C', 0, 'PRX D', 0, 'PRX E', 0, 'PRX 01', 0, 'PRX 02', 1.8, 'PRX 03', 0, 'PRX 04', 2.4, 'PRX 05', 0, 'PRX 06', 0, 'RAGI', 4, 'SHORTENING', 0, 'MARGARINE', 0, 'eco raja ', '32.0', 'tnj', '32.0', 'hd polos 80x50x70m', 32, 'pe kuning 49x79x60m', 32, 'Dikirim ke Dept. Gudang'),
(2, 'PPICPLAN/04/2020/002', 'PLANPROD042020002', 'Eco Royal Orange', '2020-04-15', '1', 'OB1', 1, '1', 'gtl', '45', '144.0', '4444', 'ANEKA PLASTAMA', 'Terigu Dragonfly', '1575.0', '', '0.0', 'PRX A', 31.5, 'PRX B', 0, 'PRX C', 0, 'PRX D', 0, 'PRX E', 0, 'PRX 01', 0, 'PRX 02', 0, 'PRX 03', 0, 'PRX 04', 27, 'PRX 05', 0, 'PRX 06', 0, 'RAGI', 18, 'SHORTENING', 0, 'MARGARINE', 0, 'eco crumb ', '144.0', 'tnj', '144.0', 'hd polos 80x50x70m', 144, 'pe kuning 49x79x60m', 144, 'Dikirim ke Dept. Gudang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `premix`
--

CREATE TABLE IF NOT EXISTS `premix` (
`no` int(11) NOT NULL,
  `planprx` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `lot` varchar(5) NOT NULL,
  `nm_rm` varchar(20) NOT NULL,
  `r1` varchar(20) NOT NULL,
  `jml1` float NOT NULL,
  `r2` varchar(20) NOT NULL,
  `jml2` float NOT NULL,
  `r3` varchar(30) NOT NULL,
  `jml3` float NOT NULL,
  `r4` varchar(30) NOT NULL,
  `jml4` float NOT NULL,
  `r5` varchar(30) NOT NULL,
  `jml5` float NOT NULL,
  `r6` varchar(30) NOT NULL,
  `jml6` float NOT NULL,
  `r7` varchar(30) NOT NULL,
  `jml7` float NOT NULL,
  `r8` varchar(30) NOT NULL,
  `jml8` float NOT NULL,
  `r9` varchar(30) NOT NULL,
  `jml9` int(11) NOT NULL,
  `r10` varchar(20) NOT NULL,
  `rm10` float NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `berat` float NOT NULL,
  `total` float NOT NULL,
  `aktual` varchar(10) NOT NULL,
  `prosentase` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `premix`
--

INSERT INTO `premix` (`no`, `planprx`, `tgl`, `lot`, `nm_rm`, `r1`, `jml1`, `r2`, `jml2`, `r3`, `jml3`, `r4`, `jml4`, `r5`, `jml5`, `r6`, `jml6`, `r7`, `jml7`, `r8`, `jml8`, `r9`, `jml9`, `r10`, `rm10`, `jumlah`, `berat`, `total`, `aktual`, `prosentase`) VALUES
(1, 'PLANPRX/04/2020/001', '2020-04-18', '10', 'PRX 01', 'Terigu Dragonfly', 420, 'gula', 0, 'instant plus', 0, 'rj wrn 02', 10.5, 'rj wrn 03', 0, 'calcium', 0, 'rj wrn 01', 5.5, 'garam halus', 0, 'rj wrn 04', 0, 'pe kuning 49x79x60m', 0, '436.0', 0.75, 581, '581', '100'),
(2, 'PLANPRX/04/2020/002', '2020-04-18', '10', 'PRX 01', 'Terigu Dragonfly', 420, 'gula', 0, 'instant plus', 0, 'rj wrn 02', 0, 'rj wrn 03', 0, 'calcium', 0, 'rj wrn 01', 5.5, 'garam halus', 0, 'rj wrn 04', 0, 'pe kuning 49x79x60m', 0, '436.0', 0.75, 581, '581', '100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `premix1`
--

CREATE TABLE IF NOT EXISTS `premix1` (
`no` int(11) NOT NULL,
  `planprx` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `lot` varchar(5) NOT NULL,
  `nm_rm` varchar(20) NOT NULL,
  `r1` varchar(20) NOT NULL,
  `jml1` float NOT NULL,
  `r2` varchar(20) NOT NULL,
  `jml2` float NOT NULL,
  `r3` varchar(30) NOT NULL,
  `jml3` float NOT NULL,
  `r4` varchar(30) NOT NULL,
  `jml4` float NOT NULL,
  `r5` varchar(30) NOT NULL,
  `jml5` float NOT NULL,
  `r6` varchar(30) NOT NULL,
  `jml6` float NOT NULL,
  `r7` varchar(30) NOT NULL,
  `jml7` float NOT NULL,
  `r8` varchar(30) NOT NULL,
  `jml8` float NOT NULL,
  `r9` varchar(30) NOT NULL,
  `jml9` int(11) NOT NULL,
  `r10` varchar(20) NOT NULL,
  `rm10` float NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `berat` float NOT NULL,
  `total` float NOT NULL,
  `aktual` varchar(10) NOT NULL,
  `prosentase` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `premixcut`
--

CREATE TABLE IF NOT EXISTS `premixcut` (
`no` int(11) NOT NULL,
  `planprx` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `lot` varchar(5) NOT NULL,
  `nm_rm` varchar(20) NOT NULL,
  `r1` varchar(20) NOT NULL,
  `jml1` float NOT NULL,
  `r2` varchar(20) NOT NULL,
  `jml2` float NOT NULL,
  `r3` varchar(30) NOT NULL,
  `jml3` float NOT NULL,
  `r4` varchar(30) NOT NULL,
  `jml4` float NOT NULL,
  `r5` varchar(30) NOT NULL,
  `jml5` float NOT NULL,
  `r6` varchar(30) NOT NULL,
  `jml6` float NOT NULL,
  `r7` varchar(30) NOT NULL,
  `jml7` float NOT NULL,
  `r8` varchar(30) NOT NULL,
  `jml8` float NOT NULL,
  `r9` varchar(30) NOT NULL,
  `jml9` int(11) NOT NULL,
  `r10` varchar(20) NOT NULL,
  `rm10` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `premixcut`
--

INSERT INTO `premixcut` (`no`, `planprx`, `tgl`, `lot`, `nm_rm`, `r1`, `jml1`, `r2`, `jml2`, `r3`, `jml3`, `r4`, `jml4`, `r5`, `jml5`, `r6`, `jml6`, `r7`, `jml7`, `r8`, `jml8`, `r9`, `jml9`, `r10`, `rm10`) VALUES
(1, 'PLANPRX/04/2020/001', '2020-04-18', '10', 'PRX 01', '', 420, 'gula', 0, 'instant plus', 0, 'rj wrn 02', 10.5, 'rj wrn 03', 0, 'calcium', 0, 'rj wrn 01', 5.5, 'garam halus', 0, 'rj wrn 04', 0, 'pe kuning 49x79x60m', 1),
(2, 'PLANPRX/04/2020/002', '2020-04-18', '10', 'PRX 01', '', 420, 'gula', 0, 'instant plus', 0, 'rj wrn 02', 0, 'rj wrn 03', 0, 'calcium', 0, 'rj wrn 01', 5.5, 'garam halus', 0, 'rj wrn 04', 0, 'pe kuning 49x79x60m', 1);

--
-- Trigger `premixcut`
--
DELIMITER //
CREATE TRIGGER `cutprx` AFTER INSERT ON `premixcut`
 FOR EACH ROW BEGIN



IF new.jml2 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml2
where nm_rm=new.r2;
end if;


IF new.jml3 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml3
where nm_rm=new.r3;
end if;


IF new.jml4 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml4
where nm_rm=new.r4;
end if;

IF new.jml5 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml5
where nm_rm=new.r5;
end if;

IF new.jml6 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml6
where nm_rm=new.r6;
end if;

IF new.jml7 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml7
where nm_rm=new.r7;
end if;

IF new.jml8 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml8
where nm_rm=new.r8;
end if;

IF new.jml9 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml9
where nm_rm=new.r9;
end if;

IF new.r10 then
UPDATE stok_label
SET stok=stok-NEW.rm10
where nm_rm=new.r10;
end if;

IF new.jml1 THEN
UPDATE stok_rm
SET stok=stok-NEW.jml1
where nm_rm=new.r1;
end if;



end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `premixin`
--

CREATE TABLE IF NOT EXISTS `premixin` (
`no` int(11) NOT NULL,
  `planprx` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `lot` varchar(5) NOT NULL,
  `nm_rm` varchar(20) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `berat` float NOT NULL,
  `total` float NOT NULL,
  `aktual` varchar(10) NOT NULL,
  `prosentase` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `premixin`
--

INSERT INTO `premixin` (`no`, `planprx`, `tgl`, `lot`, `nm_rm`, `jumlah`, `berat`, `total`, `aktual`, `prosentase`) VALUES
(1, 'PLANPRX/04/2020/001', '2020-04-18', '10', 'PRX 01', '436.0', 0.75, 581, '581', '100'),
(2, 'PLANPRX/04/2020/001', '2020-04-18', '10', 'PRX 01', '436.0', 0.75, 581, '581', '100');

--
-- Trigger `premixin`
--
DELIMITER //
CREATE TRIGGER `addprxin` AFTER INSERT ON `premixin`
 FOR EACH ROW BEGIN

IF new.aktual THEN
UPDATE stok_fgpremix
SET stok=stok+NEW.aktual
where nm_rm=new.nm_rm;
end if;

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(3) NOT NULL,
  `no_po` varchar(30) NOT NULL,
  `no_inv` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `pic` varchar(30) NOT NULL,
  `nama_rm1` varchar(20) NOT NULL,
  `jumlah_barang1` varchar(5) NOT NULL,
  `jumlah_kg1` varchar(20) NOT NULL,
  `jumlah_perkilo1` varchar(5) NOT NULL,
  `sisajumlah_barang1` varchar(10) NOT NULL,
  `sisajumlah_perkilo1` varchar(10) NOT NULL,
  `harga_perbarang1` varchar(10) NOT NULL,
  `total1` varchar(30) NOT NULL,
  `nama_rm2` varchar(30) NOT NULL,
  `jumlah_barang2` varchar(4) NOT NULL,
  `jumlah_kg2` varchar(19) NOT NULL,
  `jumlah_perkilo2` varchar(4) NOT NULL,
  `sisajumlah_barang2` varchar(9) NOT NULL,
  `sisajumlah_perkilo2` varchar(10) NOT NULL,
  `harga_perbarang2` varchar(10) NOT NULL,
  `total2` varchar(30) NOT NULL,
  `nama_rm3` varchar(30) NOT NULL,
  `jumlah_barang3` varchar(4) NOT NULL,
  `jumlah_kg3` varchar(19) NOT NULL,
  `jumlah_perkilo3` varchar(4) NOT NULL,
  `sisajumlah_barang3` varchar(9) NOT NULL,
  `sisajumlah_perkilo3` varchar(10) NOT NULL,
  `harga_perbarang3` varchar(10) NOT NULL,
  `total3` varchar(30) NOT NULL,
  `total_harga` varchar(20) NOT NULL,
  `ppn` varchar(20) NOT NULL,
  `diskon` varchar(20) NOT NULL,
  `grand_total` varchar(20) NOT NULL,
  `jumlah_bayar` varchar(20) NOT NULL,
  `sisa_hutang` varchar(20) NOT NULL,
  `tglmasuk` date NOT NULL,
  `jatuh_tempo` varchar(2) NOT NULL,
  `metode` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `no_po`, `no_inv`, `nama`, `alamat`, `kota`, `telepon`, `pic`, `nama_rm1`, `jumlah_barang1`, `jumlah_kg1`, `jumlah_perkilo1`, `sisajumlah_barang1`, `sisajumlah_perkilo1`, `harga_perbarang1`, `total1`, `nama_rm2`, `jumlah_barang2`, `jumlah_kg2`, `jumlah_perkilo2`, `sisajumlah_barang2`, `sisajumlah_perkilo2`, `harga_perbarang2`, `total2`, `nama_rm3`, `jumlah_barang3`, `jumlah_kg3`, `jumlah_perkilo3`, `sisajumlah_barang3`, `sisajumlah_perkilo3`, `harga_perbarang3`, `total3`, `total_harga`, `ppn`, `diskon`, `grand_total`, `jumlah_bayar`, `sisa_hutang`, `tglmasuk`, `jatuh_tempo`, `metode`) VALUES
(1, 'PO11042000001', '', 'PT BUNGASARI FLOUR MILLS INDONESIA', 'JL.JEND SUDIRMAN KAV.45-46', 'JAKARTA', '8128201235', 'Hastini', 'Terigu Dragonfly', '10', '250', '25', '2', '50', '100000', '1000000', '', '', '', '', '0', '0', '', '', '', '', '', '', '', '', '', '', '1000000', '100000', '0', '1100000', '0', '1100000', '2020-04-11', '90', 'Cash'),
(2, 'PO11042000002', '', 'PT BUNGASARI FLOUR MILLS INDONESIA', 'JL.JEND SUDIRMAN KAV.45-46', 'JAKARTA', '8128201235', 'Hastini', 'Terigu Dragonfly', '10', '250', '25', '2', '50', '100000', '1000000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1000000', '100000', '0', '1100000', '0', '1100000', '2020-04-11', '90', 'Cash'),
(3, 'PO11042000003', '', 'PT BUNGASARI FLOUR MILLS INDONESIA', 'JL.JEND SUDIRMAN KAV.45-46', 'JAKARTA', '8128201235', 'Hastini', 'Terigu Dragonfly', '10', '250', '25', '', '', '100000', '1000000', 'Terigu Dragonfly', '1000', '25000', '25', '', '', '100000', '100000000', '', '', '', '', '', '', '', '', '101000000', '10100000', '0', '111100000', '0', '111100000', '2020-04-11', '90', 'Giro'),
(4, 'PO11042000004', '', 'PT KABULINCO JAYA', 'JL JEMBATAN DUA RAYA NO.11/I', 'JAKARTA', '85697704766', 'Bobby', 'terigu f02', '1000', '25000', '25', '', '', '100000', '100000000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '99990000', '9999000', '10000', '109989000', '0', '109989000', '2020-04-11', '90', 'Giro'),
(5, 'PO12042000005', '', 'PT BUNGASARI FLOUR MILLS INDONESIA', 'JL.JEND SUDIRMAN KAV.45-46', 'JAKARTA', '8128201235', 'Hastini', 'terigu f02', '10', '250', '25', '', '', '100000', '1000000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1000000', '100000', '0', '1100000', '0', '1100000', '2020-04-12', '10', 'Cash'),
(6, 'PO17042000006', '', 'PT AESTERN', 'UNKNOWN', 'JAKARTA', '85234813923', 'Joko', 'Terigu f02', '10', '250', '25', '', '', '100000', '1000000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1000000', '100000', '0', '1100000', '0', '1100000', '2020-04-18', '30', 'Cash');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapcutrm`
--

CREATE TABLE IF NOT EXISTS `rekapcutrm` (
`id` int(11) NOT NULL,
  `plan_prod` varchar(30) NOT NULL,
  `nm_fg` varchar(60) NOT NULL,
  `tgl` date NOT NULL,
  `shift` varchar(8) NOT NULL,
  `lot` varchar(4) NOT NULL,
  `terigua` varchar(30) NOT NULL,
  `jmlt1` float NOT NULL,
  `terigub` varchar(30) NOT NULL,
  `jmlt2` float NOT NULL,
  `r1` varchar(20) NOT NULL,
  `jml1` float NOT NULL,
  `r2` varchar(20) NOT NULL,
  `jml2` float NOT NULL,
  `r3` varchar(20) NOT NULL,
  `jml3` float NOT NULL,
  `r4` varchar(20) NOT NULL,
  `jml4` float NOT NULL,
  `r5` varchar(20) NOT NULL,
  `jml5` float NOT NULL,
  `r6` varchar(30) NOT NULL,
  `jml6` float NOT NULL,
  `r7` varchar(30) NOT NULL,
  `jml7` float NOT NULL,
  `r8` varchar(30) NOT NULL,
  `jml8` float NOT NULL,
  `r9` varchar(30) NOT NULL,
  `jml9` float NOT NULL,
  `r10` varchar(30) NOT NULL,
  `jml10` float NOT NULL,
  `r11` varchar(30) NOT NULL,
  `jml11` float NOT NULL,
  `r12` varchar(20) NOT NULL,
  `jml12` float NOT NULL,
  `r13` varchar(30) NOT NULL,
  `jml13` float NOT NULL,
  `r14` varchar(30) NOT NULL,
  `jml14` float NOT NULL,
  `r15` varchar(10) NOT NULL,
  `rm15` float NOT NULL,
  `r16` varchar(10) NOT NULL,
  `rm16` float NOT NULL,
  `r17` varchar(30) NOT NULL,
  `rm17` float NOT NULL,
  `r18` varchar(30) NOT NULL,
  `rm18` float NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekapcutrm`
--

INSERT INTO `rekapcutrm` (`id`, `plan_prod`, `nm_fg`, `tgl`, `shift`, `lot`, `terigua`, `jmlt1`, `terigub`, `jmlt2`, `r1`, `jml1`, `r2`, `jml2`, `r3`, `jml3`, `r4`, `jml4`, `r5`, `jml5`, `r6`, `jml6`, `r7`, `jml7`, `r8`, `jml8`, `r9`, `jml9`, `r10`, `jml10`, `r11`, `jml11`, `r12`, `jml12`, `r13`, `jml13`, `r14`, `jml14`, `r15`, `rm15`, `r16`, `rm16`, `r17`, `rm17`, `r18`, `rm18`, `status`) VALUES
(1, 'PLANPROD042020001', 'Eco Royal Mix', '2020-04-11', '1', '10', 'Terigu Dragonfly', 350, '', 0, 'PRX A', 7, 'PRX B', 0, 'PRX C', 0, 'PRX D', 0, 'PRX E', 0, 'PRX 01', 0, 'PRX 02', 1.8, 'PRX 03', 0, 'PRX 04', 2.4, 'PRX 05', 0, 'PRX 06', 0, 'RAGI', 4, 'SHORTENING', 0, 'MARGARINE', 0, 'eco raja ', 32, 'tnj', 32, 'hd polos 80x50x70m', 32, 'pe kuning 49x79x60m', 32, 'Berhasil Dipotong'),
(2, 'PLANPROD042020002', 'Eco Royal Orange', '2020-04-15', '1', '45', 'Terigu Dragonfly', 1575, '', 0, 'PRX A', 31.5, 'PRX B', 0, 'PRX C', 0, 'PRX D', 0, 'PRX E', 0, 'PRX 01', 0, 'PRX 02', 0, 'PRX 03', 0, 'PRX 04', 27, 'PRX 05', 0, 'PRX 06', 0, 'RAGI', 18, 'SHORTENING', 0, 'MARGARINE', 0, 'eco raja ', 144, 'tnj', 144, 'hd polos 80x50x70m', 144, 'pe kuning 49x79x60m', 144, 'Berhasil Dipotong');

--
-- Trigger `rekapcutrm`
--
DELIMITER //
CREATE TRIGGER `cut rm` AFTER INSERT ON `rekapcutrm`
 FOR EACH ROW BEGIN

IF new.jmlt1 THEN
UPDATE stok_rm 
SET stok=stok-NEW.jmlt1
where nm_rm=new.terigua;
end if;

IF new.jmlt2 THEN
UPDATE stok_rm 
SET stok=stok-NEW.jmlt2
where nm_rm=new.terigub;
end if;


IF new.jml1 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml1
where nm_rm=new.r1;
end if;


IF new.jml2 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml2
where nm_rm=new.r2;
end if;


IF new.jml3 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml3
where nm_rm=new.r3;
end if;


IF new.jml4 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml4
where nm_rm=new.r4;
end if;

IF new.jml5 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml5
where nm_rm=new.r5;
end if;

IF new.jml6 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml6
where nm_rm=new.r6;
end if;

IF new.jml7 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml7
where nm_rm=new.r7;
end if;

IF new.jml8 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml8
where nm_rm=new.r8;
end if;

IF new.jml9 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml9
where nm_rm=new.r9;
end if;

IF new.jml10 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml10
where nm_rm=new.r10;
end if;

IF new.jml1 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml1
where nm_rm=new.r11;
end if;

IF new.jml12 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml12
where nm_rm=new.r12;
end if;

IF new.jml13 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml13
where nm_rm=new.r13;
end if;

IF new.jml14 THEN
UPDATE stok_fgpremix 
SET stok=stok-NEW.jml14
where nm_rm=new.r14;
end if;

IF new.rm15 THEN
UPDATE stok_label
SET stok=stok-NEW.rm15
where nm_label=new.r15;
end if;

IF new.rm16 THEN
UPDATE stok_label 
SET stok=stok-NEW.rm16
where nm_label=new.rm16;
end if;

IF new.rm17 THEN
UPDATE stok_label 
SET stok=stok-NEW.rm17
where nm_label=new.rm17;
end if;

IF new.rm18 THEN
UPDATE stok_label 
SET stok=stok-NEW.rm18
where nm_label=new.rm18;
end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekapsjpremix`
--

CREATE TABLE IF NOT EXISTS `rekapsjpremix` (
`id` int(3) NOT NULL,
  `no_so` varchar(29) NOT NULL,
  `so_ext` varchar(30) NOT NULL,
  `tgl` varchar(19) NOT NULL,
  `nm_cust` text NOT NULL,
  `alamat` text NOT NULL,
  `pic` varchar(30) NOT NULL,
  `nm_fg1` varchar(30) NOT NULL,
  `qty1` varchar(5) NOT NULL,
  `nm_fg2` varchar(30) NOT NULL,
  `qty2` varchar(5) NOT NULL,
  `nm_fg3` varchar(30) NOT NULL,
  `qty3` varchar(5) NOT NULL,
  `nm_fg4` varchar(30) NOT NULL,
  `qty4` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekapsjpremix`
--

INSERT INTO `rekapsjpremix` (`id`, `no_so`, `so_ext`, `tgl`, `nm_cust`, `alamat`, `pic`, `nm_fg1`, `qty1`, `nm_fg2`, `qty2`, `nm_fg3`, `qty3`, `nm_fg4`, `qty4`) VALUES
(1, 'SJ18042000005', '-', '2020-08-10', 'PT KITCHENETTE LESTARI', 'Jl. Pagelarang 1 No.63 Gang Buntu Rt.009/Rw.03, Kel. Setu Cipayung, Jakarta Timur', '', '', '10', '', '', '', '', '', ''),
(2, 'SJ18042000007', '-', '2020-08-10', 'BANG JALI', 'Jl. Rawa Kuning No 45 Rt 08 Rw 16, Pulogebang, Jakarta Timur', 'Pak Satrio', 'PRX 02A', '10', '', '', '', '', '', '');

--
-- Trigger `rekapsjpremix`
--
DELIMITER //
CREATE TRIGGER `cutpremixout` AFTER INSERT ON `rekapsjpremix`
 FOR EACH ROW begin

IF new.qty1 THEN
UPDATE stok_fgpremix
SET stok=stok-NEW.qty1
where nm_rm=new.nm_fg1;
end if;

IF new.qty2 THEN
UPDATE stok_fgpremix
SET stok=stok-NEW.qty2
where nm_rm=new.nm_fg2;
end if;

IF new.qty3 THEN
UPDATE stok_fgpremix
SET stok=stok-NEW.qty3
where nm_rm=new.nm_fg3;
end if;

IF new.qty4 THEN
UPDATE stok_fgpremix
SET stok=stok-NEW.qty4
where nm_rm=new.nm_fg4;
end if;


end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rmin`
--

CREATE TABLE IF NOT EXISTS `rmin` (
`id_produk` int(3) NOT NULL,
  `no_po` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_rm1` varchar(20) NOT NULL,
  `jumlah_barang1` varchar(5) NOT NULL,
  `jumlah_kg1` varchar(20) NOT NULL,
  `sisajumlah_barang1` varchar(10) NOT NULL,
  `sisajumlah_perkilo1` varchar(10) NOT NULL,
  `terima_kg1` varchar(30) NOT NULL,
  `terima_barang1` varchar(30) NOT NULL,
  `nama_rm2` varchar(30) NOT NULL,
  `jumlah_barang2` varchar(4) NOT NULL,
  `jumlah_kg2` varchar(19) NOT NULL,
  `sisajumlah_barang2` varchar(9) NOT NULL,
  `sisajumlah_perkilo2` varchar(10) NOT NULL,
  `terima_kg2` varchar(30) NOT NULL,
  `terima_barang2` varchar(30) NOT NULL,
  `nama_rm3` varchar(30) NOT NULL,
  `jumlah_barang3` varchar(4) NOT NULL,
  `jumlah_kg3` varchar(19) NOT NULL,
  `sisajumlah_barang3` varchar(9) NOT NULL,
  `sisajumlah_perkilo3` varchar(10) NOT NULL,
  `terima_kg3` varchar(30) NOT NULL,
  `terima_barang3` varchar(30) NOT NULL,
  `tglmasuk` date NOT NULL,
  `tgldatang` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rmin`
--

INSERT INTO `rmin` (`id_produk`, `no_po`, `nama`, `nama_rm1`, `jumlah_barang1`, `jumlah_kg1`, `sisajumlah_barang1`, `sisajumlah_perkilo1`, `terima_kg1`, `terima_barang1`, `nama_rm2`, `jumlah_barang2`, `jumlah_kg2`, `sisajumlah_barang2`, `sisajumlah_perkilo2`, `terima_kg2`, `terima_barang2`, `nama_rm3`, `jumlah_barang3`, `jumlah_kg3`, `sisajumlah_barang3`, `sisajumlah_perkilo3`, `terima_kg3`, `terima_barang3`, `tglmasuk`, `tgldatang`) VALUES
(1, 'PO11042000001', 'PT BUNGASARI FLOUR MILLS INDONESIA', 'Terigu Dragonfly', '10', '250', '0', '0', '250', '10', '', '', '', '0', '0', '0', '', '', '', '', '', '', '', '', '2020-04-11', ''),
(2, 'PO11042000002', 'PT BUNGASARI FLOUR MILLS INDONESIA', 'Terigu Dragonfly', '10', '250', '2', '50', '200', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2020-04-11', ''),
(3, 'PO11042000001', 'PT BUNGASARI FLOUR MILLS INDONESIA', 'Terigu Dragonfly', '10', '250', '1', '25', '225', '9', '', '', '', '0', '0', '0', '', '', '', '', '', '', '', '', '2020-04-11', ''),
(4, 'PO11042000001', 'PT BUNGASARI FLOUR MILLS INDONESIA', 'Terigu Dragonfly', '10', '250', '2', '50', '200', '8', '', '', '', '0', '0', '0', '', '', '', '', '', '', '', '', '2020-04-11', '');

--
-- Trigger `rmin`
--
DELIMITER //
CREATE TRIGGER `add barang` AFTER INSERT ON `rmin`
 FOR EACH ROW BEGIN

IF new.terima_kg1 THEN
UPDATE stok_rm 
SET stok=stok+NEW.terima_kg1
where nm_rm=new.nama_rm1;
end if;

IF new.terima_kg1 THEN
UPDATE stok_label 
SET stok=stok+NEW.terima_kg1
where nm_rm=new.nama_rm1;
end if;


IF new.terima_kg2 THEN
UPDATE stok_rm 
SET stok=stok+NEW.terima_kg2
where nm_rm=new.nama_rm2;
end if;

IF new.terima_kg2 THEN
UPDATE stok_label 
SET stok=stok+NEW.terima_kg2
where nm_rm=new.nama_rm2;
end if;


IF new.terima_kg3 THEN
UPDATE stok_rm 
SET stok=stok+NEW.terima_kg3
where nm_rm=new.nama_rm3;
end if;

IF new.terima_kg3 THEN
UPDATE stok_label 
SET stok=stok+NEW.terima_kg3
where nm_rm=new.nama_rm3;
end if;

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `salesorder`
--

CREATE TABLE IF NOT EXISTS `salesorder` (
`id` int(3) NOT NULL,
  `no_so` varchar(29) NOT NULL,
  `so_ext` varchar(30) NOT NULL,
  `tgl` varchar(19) NOT NULL,
  `nm_cust` text NOT NULL,
  `alamat` text NOT NULL,
  `pic` varchar(30) NOT NULL,
  `nm_fg1` varchar(30) NOT NULL,
  `qty1` varchar(12) NOT NULL,
  `undeliv1` varchar(5) NOT NULL,
  `sisa1` varchar(12) NOT NULL,
  `nm_fg2` varchar(30) NOT NULL,
  `qty2` varchar(12) NOT NULL,
  `undeliv2` varchar(5) NOT NULL,
  `sisa2` varchar(12) NOT NULL,
  `nm_fg3` varchar(30) NOT NULL,
  `qty3` varchar(12) NOT NULL,
  `undeliv3` varchar(5) NOT NULL,
  `sisa3` varchar(12) NOT NULL,
  `nm_fg4` varchar(30) NOT NULL,
  `qty4` varchar(12) NOT NULL,
  `undeliv4` varchar(5) NOT NULL,
  `sisa4` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `salesorder`
--

INSERT INTO `salesorder` (`id`, `no_so`, `so_ext`, `tgl`, `nm_cust`, `alamat`, `pic`, `nm_fg1`, `qty1`, `undeliv1`, `sisa1`, `nm_fg2`, `qty2`, `undeliv2`, `sisa2`, `nm_fg3`, `qty3`, `undeliv3`, `sisa3`, `nm_fg4`, `qty4`, `undeliv4`, `sisa4`) VALUES
(1, 'SO17042000001', '-', '2020-08-10', 'ANEKA PLASTAMA', 'Jl. KH Agus Salim Raya No 95 Rt 04 Rw 08, Kel. Bekasi Jaya, Kec. Bekasi Timur', '', 'Eco Royal Mix', '10', '14', '4', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 'SO17042000002', '-', '2020-04-18', 'BANANA NUGGET', 'BARU: Jl. 20 Desember No 27A, Kalideres, Jakarta Barat', '', 'Eco Crumb Orange', '20', '50', '30', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sisaracikan`
--

CREATE TABLE IF NOT EXISTS `sisaracikan` (
`id` int(4) NOT NULL,
  `no_lap` varchar(50) NOT NULL,
  `plan_prod` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `shift` varchar(3) NOT NULL,
  `nm_fg` varchar(50) NOT NULL,
  `lot` varchar(3) NOT NULL,
  `aktualroti` varchar(39) NOT NULL,
  `sisa` varchar(6) NOT NULL,
  `jumlah` varchar(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sjpremix`
--

CREATE TABLE IF NOT EXISTS `sjpremix` (
`id` int(3) NOT NULL,
  `no_so` varchar(29) NOT NULL,
  `so_ext` varchar(30) NOT NULL,
  `tgl` varchar(19) NOT NULL,
  `nm_cust` text NOT NULL,
  `alamat` text NOT NULL,
  `pic` varchar(30) NOT NULL,
  `nm_fg1` varchar(30) NOT NULL,
  `qty1` varchar(5) NOT NULL,
  `nm_fg2` varchar(30) NOT NULL,
  `qty2` varchar(5) NOT NULL,
  `nm_fg3` varchar(30) NOT NULL,
  `qty3` varchar(5) NOT NULL,
  `nm_fg4` varchar(30) NOT NULL,
  `qty4` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sjpremix`
--

INSERT INTO `sjpremix` (`id`, `no_so`, `so_ext`, `tgl`, `nm_cust`, `alamat`, `pic`, `nm_fg1`, `qty1`, `nm_fg2`, `qty2`, `nm_fg3`, `qty3`, `nm_fg4`, `qty4`) VALUES
(1, 'SJ18042000001', '-', '2020-04-18', 'ANEKA PLASTAMA', 'Jl. KH Agus Salim Raya No 95 Rt 04 Rw 08, Kel. Bekasi Jaya, Kec. Bekasi Timur', 'ANEKA', 'PRX 02A', '10', '', '', '', '', '', ''),
(2, 'SJ18042000002', '-', '2020-08-10', 'PT KITCHENETTE LESTARI', 'Jl. Pagelarang 1 No.63 Gang Buntu Rt.009/Rw.03, Kel. Setu Cipayung, Jakarta Timur', '', 'PRX 02 C', '10', '', '', '', '', '', ''),
(3, 'SJ18042000003', '-', '2020-08-10', 'PT KITCHENETTE LESTARI', 'Jl. Pagelarang 1 No.63 Gang Buntu Rt.009/Rw.03, Kel. Setu Cipayung, Jakarta Timur', '', 'PRX 02A', '10', 'PRX 02B', '10', '', '', '', ''),
(4, 'SJ18042000004', '-', '2020-08-10', 'ANUGERAH JAYA / CI LIANA', 'Perum. Kresek Indah. Jl. Asoka Blok M No 5 Rt 06/012. Duri Kosambi, Cengkareng, Jakarta Barat 11750', 'CI LIANA', 'PRX 02D', '10', '', '', '', '', '', ''),
(5, 'SJ18042000005', '-', '2020-08-10', 'PT KITCHENETTE LESTARI', 'Jl. Pagelarang 1 No.63 Gang Buntu Rt.009/Rw.03, Kel. Setu Cipayung, Jakarta Timur', '', 'PRX 02B', '10', '', '', '', '', '', ''),
(6, 'SJ18042000006', '', '2020-04-18', 'BANG JALI', 'Jl. Rawa Kuning No 45 Rt 08 Rw 16, Pulogebang, Jakarta Timur', 'Pak Satrio', 'PRX 02 C', '', '', '', '', '', '', ''),
(7, 'SJ18042000007', '-', '2020-08-10', 'BANG JALI', 'Jl. Rawa Kuning No 45 Rt 08 Rw 16, Pulogebang, Jakarta Timur', 'Pak Satrio', 'PRX 02A', '10', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sjpremixout`
--

CREATE TABLE IF NOT EXISTS `sjpremixout` (
`id` int(3) NOT NULL,
  `no_so` varchar(29) NOT NULL,
  `so_ext` varchar(30) NOT NULL,
  `tgl` varchar(19) NOT NULL,
  `nm_cust` text NOT NULL,
  `alamat` text NOT NULL,
  `pic` varchar(30) NOT NULL,
  `nm_fg1` varchar(30) NOT NULL,
  `qty1` varchar(5) NOT NULL,
  `nm_fg2` varchar(30) NOT NULL,
  `qty2` varchar(5) NOT NULL,
  `nm_fg3` varchar(30) NOT NULL,
  `qty3` varchar(5) NOT NULL,
  `nm_fg4` varchar(30) NOT NULL,
  `qty4` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sjpremixout`
--

INSERT INTO `sjpremixout` (`id`, `no_so`, `so_ext`, `tgl`, `nm_cust`, `alamat`, `pic`, `nm_fg1`, `qty1`, `nm_fg2`, `qty2`, `nm_fg3`, `qty3`, `nm_fg4`, `qty4`) VALUES
(3, 'SJ18042000006', '', '2020-04-18', 'BANG JALI', 'Jl. Rawa Kuning No 45 Rt 08 Rw 16, Pulogebang, Jakarta Timur', 'Pak Satrio', 'PRX 02 C', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `so`
--

CREATE TABLE IF NOT EXISTS `so` (
`id` int(3) NOT NULL,
  `do1` varchar(20) NOT NULL,
  `time` varchar(15) NOT NULL,
  `no_so` varchar(29) NOT NULL,
  `so_ext` varchar(30) NOT NULL,
  `nm_cust` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `tgl` varchar(15) NOT NULL,
  `mobil` varchar(29) NOT NULL,
  `supir` varchar(20) NOT NULL,
  `nm_fg1` varchar(40) NOT NULL,
  `qty1` varchar(5) NOT NULL,
  `exp1` varchar(19) NOT NULL,
  `nm_fg2` varchar(40) NOT NULL,
  `qty2` varchar(5) NOT NULL,
  `exp2` varchar(19) NOT NULL,
  `nm_fg3` varchar(40) NOT NULL,
  `qty3` varchar(5) NOT NULL,
  `exp3` varchar(19) NOT NULL,
  `nm_fg4` varchar(40) NOT NULL,
  `qty4` varchar(5) NOT NULL,
  `exp4` varchar(19) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `so`
--

INSERT INTO `so` (`id`, `do1`, `time`, `no_so`, `so_ext`, `nm_cust`, `alamat`, `tlp`, `tgl`, `mobil`, `supir`, `nm_fg1`, `qty1`, `exp1`, `nm_fg2`, `qty2`, `exp2`, `nm_fg3`, `qty3`, `exp3`, `nm_fg4`, `qty4`, `exp4`) VALUES
(1, 'SJ17042000002', ' 01:42:00 ', 'SO17042000001', '-', 'ANEKA PLASTAMA', 'Jl. KH Agus Salim Raya No 95 Rt 04 Rw 08, Kel. Bekasi Jaya, Kec. Bekasi Timur', '-', '2020-08-10', 'Enggkel-SPS B 9658 KCE', 'Muhaji', 'Eco Royal Mix', '10', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00'),
(2, 'SJ17042000003', ' 01:48:51 ', 'SO17042000002', '-', 'BANANA NUGGET', 'BARU: Jl. 20 Desember No 27A, Kalideres, Jakarta Barat', '-', '2020-04-18', 'Enggkel-SPS B 9658 KCE', 'Muhaji', 'Eco Crumb Orange', '20', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00'),
(3, 'SJ17042000004', ' 01:51:04 ', 'SO17042000002', '-', 'BANANA NUGGET', 'BARU: Jl. 20 Desember No 27A, Kalideres, Jakarta Barat', '-', '2020-04-18', 'CarryBox-RRC B 9845 FCG', 'Yayan', 'Eco Crumb Orange', '20', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00'),
(4, 'SJ17042000005', ' 01:54:42 ', 'SO17042000001', '-', 'ANEKA PLASTAMA', 'Jl. KH Agus Salim Raya No 95 Rt 04 Rw 08, Kel. Bekasi Jaya, Kec. Bekasi Timur', '-', '2020-08-10', 'Enggkel-RRC B 9370 KCE', 'Dadang', 'Eco Royal Mix', '10', '2020-08-10', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_fg`
--

CREATE TABLE IF NOT EXISTS `stok_fg` (
`id` int(4) NOT NULL,
  `no_form` varchar(24) NOT NULL,
  `nm_fg` varchar(40) DEFAULT NULL,
  `stok` float NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_fg`
--

INSERT INTO `stok_fg` (`id`, `no_form`, `nm_fg`, `stok`) VALUES
(1, 'RND-001', 'Eco Royal Orange', 1000),
(2, 'RND-002', 'Eco Royal Yellow', 10),
(3, 'RND-003', 'Eco Royal Mix', -8),
(5, 'RND-005', 'Sapu Jagat Orange', 0),
(6, 'RND-006', 'Sapu Jagat Yellow', 0),
(7, 'RND-007', 'Sapu Jagat Mix', 0),
(8, 'RND-008', 'Eco Raja Orange', 0),
(9, 'RND-009', 'Eco Raja Yellow', 0),
(10, 'RND-010', 'Eco Raja Mix', 0),
(11, 'RND-011', 'Raja Orange EB', 0),
(12, 'RND-012', 'Raja Yellow EB', 0),
(13, 'RND-013', 'Raja Mix', 0),
(14, 'RND-014', 'RJ BC 01 Orange', 0),
(15, 'RND-015', 'RJ BC 01 Yellow', 0),
(16, 'RND-016', 'RJ BC 01', 0),
(17, 'RND-017', 'Royal Orange EB', 0),
(18, 'RND-018', 'RYL BC 01 Orange', 0),
(19, 'RND-019', 'RYL BC 01 Yellow', 0),
(20, 'RND-020', 'RYL BC 01', 0),
(21, 'RND-021', 'RYL BC 02 Orange', 0),
(22, 'RND-022', 'RYL BC 02 Yellow', 0),
(23, 'RND-023', 'RYL BC 02', 0),
(24, 'RND-024', 'RYL BC 04 Orange', 0),
(25, 'RND-025', 'RYL BC 04 Yellow', 289),
(26, 'RND-026', 'RYL BC 04', 0),
(27, 'RND-027', 'RYL BC 06 Orange', 0),
(28, 'RND-028', 'RYL BC 06 Yellow', 0),
(29, 'RND-029', 'RYL BC 06', 0),
(30, 'RND-030', 'RYL BC 07 ', 0),
(31, 'RND-031', 'RYL BC 05 Orange', 0),
(32, 'RND-032', 'RYL BC 05 Yellow', 0),
(33, 'RND-033', 'RYL BC 05', 0),
(34, 'RND-034', 'Royal White', 0),
(35, 'RND-035', 'Royal Yellow EB', 0),
(36, 'RND-036', 'Royal Orange EB', 0),
(37, 'RND-037', 'RYL BC 11', 0),
(38, 'RND-038', 'Eco Crumb Orange', 10),
(39, 'RND-039', 'RYL BC 10 Orange', 0),
(40, 'RND-040', 'RYL BC 10 Yellow', 0),
(41, 'RND-041', 'RYL BC 10', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_fgpremix`
--

CREATE TABLE IF NOT EXISTS `stok_fgpremix` (
`id` int(4) NOT NULL,
  `id_rm` varchar(5) NOT NULL,
  `nm_rm` varchar(25) DEFAULT NULL,
  `stok` float NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_fgpremix`
--

INSERT INTO `stok_fgpremix` (`id`, `id_rm`, `nm_rm`, `stok`) VALUES
(1, 'FG-01', 'PRX 02A', 990),
(2, 'FG-02', 'PRX 02B', 1000),
(3, 'FG-03', 'PRX 02 C', 1000),
(4, 'FG-04', 'PRX 02D', 1000),
(5, 'FG-05', 'PRX 02E', 1000),
(6, 'FG-06', 'PRX 01', 1581),
(7, 'FG-07', 'PRX 02', 1000),
(8, 'FG-08', 'PRX 03', 1000),
(9, 'FG-09', 'PRX 04', 1000),
(10, 'FG-10', 'PRX 05', 1000),
(11, 'FG-11', 'PRX 06', 1000),
(12, 'FG-12', 'RAGI', 1000),
(13, 'FG-13', 'SHORTENING', 1000),
(14, 'FG-14', 'gula', 1000),
(15, 'FG-15', 'instant plus', 1000),
(16, 'FG-16', 'rj wrn 02', 1000),
(17, 'FG-17', 'rj wrn 03', 1000),
(18, 'FG-18', 'calcium', 1000),
(19, 'FG-19', 'rj wrn 01', 994.5),
(20, 'FG-20', 'garam halus', 1000),
(21, 'FG-21', 'rj wrn 04', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_label`
--

CREATE TABLE IF NOT EXISTS `stok_label` (
`id` int(4) NOT NULL,
  `nm_label` varchar(40) DEFAULT NULL,
  `stok` varchar(5) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_label`
--

INSERT INTO `stok_label` (`id`, `nm_label`, `stok`) VALUES
(1, 'eco raja ', '792'),
(2, 'eco crumb orange ', '1000'),
(3, 'royal', '1000'),
(4, 'royal A4', '968'),
(5, 'eco royal', '1000'),
(6, 'raja', '1000'),
(7, 'jawara', '1000'),
(8, 'zena', '1000'),
(9, 'biola', '1000'),
(10, 'sapu jagat', '1000'),
(11, 'prambanan', '1000'),
(12, 'tnj', '1000'),
(13, 'hd polos 80x50x70m', '1000'),
(14, 'pe kuning 49x79x60m', '1000'),
(15, 'pe biru 49x79x70m', '1000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_rm`
--

CREATE TABLE IF NOT EXISTS `stok_rm` (
`no` int(4) NOT NULL,
  `id_rm` varchar(5) NOT NULL,
  `nm_rm` varchar(25) DEFAULT NULL,
  `stok` float NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stok_rm`
--

INSERT INTO `stok_rm` (`no`, `id_rm`, `nm_rm`, `stok`) VALUES
(1, 'RM-01', 'Terigu Dragonfly', 9300),
(2, 'RM-02', 'Terigu f06', 1000),
(3, 'RM-03', 'Terigu f02', 1000),
(4, 'RM-04', 'terigu f02', 1000),
(5, 'RM-05', 'terigu hikari', 650),
(6, 'RM-06', 'terigu falcon emas', 1000),
(7, 'RM-07', 'terigu falcon kuning', 1000),
(8, 'RM-08', 'terigu white bear', 1000),
(9, 'RM-09', 'terigu payung', 1000),
(10, 'RM-10', 'terigu kabuki', 1000),
(11, 'RM-11', 'terigu gelang berlian', 1000),
(12, 'RM-12', 'terigu tambang', 1000),
(13, 'RM-13', 'serdadu kuning', 1000),
(14, 'RM-14', 'serdadu biru', 1000),
(15, 'RM-15', 'serdadu jingga', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbljeniskas`
--

CREATE TABLE IF NOT EXISTS `tbljeniskas` (
`id_jeniskas` int(11) NOT NULL,
  `namajeniskas` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbljeniskas`
--

INSERT INTO `tbljeniskas` (`id_jeniskas`, `namajeniskas`) VALUES
(1, 'Kas Masuk'),
(2, 'Kas Keluar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblkaskeluar`
--

CREATE TABLE IF NOT EXISTS `tblkaskeluar` (
`id_kaskeluar` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblkaskeluar`
--

INSERT INTO `tblkaskeluar` (`id_kaskeluar`, `nama`) VALUES
(1, 'Biaya Admin Bank'),
(2, 'Sumbangan '),
(3, 'Gas RRC 1'),
(4, 'Gas RRC 2'),
(5, 'Biaya Konsumsi Karyawan ( Cetring )'),
(6, 'Biaya Lain Lain'),
(7, 'Maintance Gedung'),
(8, 'Maintance Kendaraan'),
(9, 'Biaya Ekspedisi'),
(10, 'Petty Cash'),
(11, 'Gaji RRC 2'),
(12, 'Pengembalian Pinjaman Pihak Ke-3'),
(13, 'Perjalanan Dinas ( Direktur )'),
(14, 'Pembelian Asset'),
(15, 'Cicilan Kendaraan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblkasmasuk`
--

CREATE TABLE IF NOT EXISTS `tblkasmasuk` (
`id_kasmasuk` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tblkasmasuk`
--

INSERT INTO `tblkasmasuk` (`id_kasmasuk`, `nama`) VALUES
(1, 'pendapatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbltransaksi`
--

CREATE TABLE IF NOT EXISTS `tbltransaksi` (
`id` int(5) NOT NULL,
  `kd_transaksi` varchar(29) NOT NULL,
  `tgl` date NOT NULL,
  `id_jeniskas` int(11) NOT NULL,
  `id_kasmasuk` int(11) DEFAULT NULL,
  `id_kaskeluar` int(11) DEFAULT NULL,
  `ket` text NOT NULL,
  `nominal` double NOT NULL,
  `nominal1` double NOT NULL,
  `nama_bank4` varchar(20) NOT NULL,
  `nama_bank3` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbltransaksi`
--

INSERT INTO `tbltransaksi` (`id`, `kd_transaksi`, `tgl`, `id_jeniskas`, `id_kasmasuk`, `id_kaskeluar`, `ket`, `nominal`, `nominal1`, `nama_bank4`, `nama_bank3`) VALUES
(4, 'TRANS12042000001', '2020-04-04', 1, 1, 0, 'eee', 10000, 0, '3800', '');

--
-- Trigger `tbltransaksi`
--
DELIMITER //
CREATE TRIGGER `cy` AFTER INSERT ON `tbltransaksi`
 FOR EACH ROW BEGIN

IF new.id_jeniskas=1 THEN
UPDATE bank 
SET saldo=saldo+NEW.nominal
where no_rek=new.nama_bank4;
end if;

IF new.id_jeniskas=2 THEN
UPDATE bank 
SET saldo=saldo-NEW.nominal1
where no_rek=new.nama_bank3;
end if;


end
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `upd` AFTER UPDATE ON `tbltransaksi`
 FOR EACH ROW BEGIN

IF new.id_jeniskas=1 THEN
UPDATE bank 
SET saldo=saldo+NEW.nominal
where no_rek=new.nama_bank4;
end if;

IF new.id_jeniskas=2 THEN
UPDATE bank 
SET saldo=saldo-NEW.nominal1
where no_rek=new.nama_bank3;
end if;


end
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `updt` AFTER DELETE ON `tbltransaksi`
 FOR EACH ROW BEGIN

IF OLD.id_jeniskas=1 THEN
UPDATE bank
SET saldo=saldo-OLD.nominal
where  no_rek=old.nama_bank4;
end if;

IF OLD.id_jeniskas=2 THEN
UPDATE bank
SET saldo=saldo+OLD.nominal1
where  no_rek=old.nama_bank3;
end if;

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(4) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `status`) VALUES
(1, 'Bagus', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Ya'),
(2, 'handoko', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Ya'),
(3, 'gudang', 'gudang', '202446dd1d6028084426867365b0c7a1', 'Ya'),
(5, 'samsul', 'samsul', '6ddcd35687be9a4415e4416a6dd6829e', 'Tidak'),
(6, 'anna', 'anna', 'a70f9e38ff015afaa9ab0aacabee2e13', 'Ya'),
(7, 'adi', 'adi', '335eb267e2e1cde5b017acb4cd799', 'Ya'),
(8, 'alice', 'alice', '6384e2b2184bcbf58eccf10ca7a6563c', 'Ya'),
(9, 'tiwi\r\n', 'tiwi', '8751139513877752980fb2996012af64', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
`id` int(3) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(50) NOT NULL,
  `poscode` varchar(20) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `pic` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id`, `kode`, `nama`, `alamat`, `kota`, `poscode`, `telepon`, `npwp`, `pic`) VALUES
(1, 'SP01-001', 'PT BUNGASARI FLOUR MILLS INDONESIA', 'JL.JEND SUDIRMAN KAV.45-46', 'JAKARTA', '12930', '8128201235', '', 'Hastini'),
(2, 'SP01-002', 'PT BOGASARI FLOUR MILLS JAKARTA', 'JL RAYA CILINCING NO.1, TANJUNG PRIOK 14110,DKI ', 'JAKARTA', '', '81280070893', '', 'Irvan'),
(3, 'SP01-003', 'PT KABULINCO JAYA', 'JL JEMBATAN DUA RAYA NO.11/I', 'JAKARTA', '', '85697704766', '', 'Bobby'),
(4, 'SP01-004', 'PT AESTERN', 'UNKNOWN', 'JAKARTA', '', '85234813923', '', 'Joko'),
(5, 'SP01-005', 'PT JAYA FERMEX', 'KOMP.PURIMUTIARA,JL.GRIYA UTAMA BLOK A NO.21-22,SUNTER AGUNG ,', 'JAKARTA', '14350', '81295307374', '', 'Desi'),
(6, 'SP01-006', 'PT ROHA LAUTAN PEWARNA', 'KOTA DELTA MAS, KAV.BATAVIA BD/2,CIKARANG PUSAT', 'BEKASI', '17530', '82310701008', '', 'Dony'),
(7, 'SP01-007', 'PT KRISNA ABADI SEJAHTERA', 'JAKARTA UTARA', 'JAKARTA', '', '818989048', '', 'Cristine'),
(8, 'SP01-008', 'KO AJAW', 'UNKNOWN', 'JAKARTA', '', '87880807023', '', 'ko Ajaw'),
(9, 'SP01-009', 'PT SALTINDO PERKASA', 'KOMPLEK GADING BUKIT INDAH BLOK M No. 3', 'JAKARTA', '', '81314710447', '', 'Bintang'),
(10, 'SP01-010', 'PT SURYA SAKTI PLASTINDO', 'JL.SEMANAN II No.55 A Rt.07 Rw.06 ( DAAN MOGOT Km.16 ) KALIDERES', 'JAKARTA', '', '81513002204', '', 'Sunjoyo'),
(11, 'SP01-011', 'PT ABC PRINTING', 'JL,KALI BARU TIMUR RAYA NO.182', 'JAKARTA', '', '85697402024', '', 'Erna'),
(12, 'SP01-012', 'TOKO UDA DISIKO', 'PASAR KRANJI', 'JAKARTA', '', '85280851386', '', 'Uda'),
(13, 'SP01-013', 'HALUAN KARYA BUSANA', 'KAWASAN INDUSTRI JABABEJA TAHAP 1, JL JABABEKA IV R&B BLOK V NO.82-S', 'BEKASI', '', '81385108981', '', 'Etti'),
(14, 'SP01-014', 'TOKO JAHIT', 'HARAPAN INDAH', 'BEKASI', '', '', '', ''),
(15, 'SP01-015', 'PD TERANG', 'JL.INDRUSTRI KP.TARINGGUL RT.01 RW.03 No.27,DESA TARIKOLOT CITEUREUP', 'BEKASI', '', '218762750', '', 'Iksanudin'),
(16, 'SP01-016', 'PT VOSEN', 'JL RAYA NAROGONG KM 26,8 NO.105 RT.01 RW.01 DAYEUH CILEUNGSI', 'BOGOR', '', '81310607114', '', 'Rustam'),
(17, 'SP01-017', 'PT ETOS', 'JL DAAN MOGOT 121', 'BOGOR', '', '', '', ''),
(18, 'SP01-018', 'PONTI TEHNIK', 'TAMAN HARAPAN BARU, TARUMA JAYA', 'JAKARTA', '11510', '', '', ''),
(19, 'SP01-019', 'GAGAS', 'UNKNOWN', 'BEKASI', '', '8112409000', '', 'Angga'),
(20, 'SP01-020', 'PT SURIA BERKAT ABADI', 'GEDUNG KONICA LT.3A JL GUNUNG SAHARI RAYA NO.78 JAKARTA PUSAT ', 'JAKARTA', '10610', '', '', ''),
(21, 'SP01-021', 'PT PUNDI KENCANA', 'BEKASI', 'BEKASI', '', '', '', ''),
(22, 'SP01-022', 'PT KENCANA INDO PANGAN', 'BEKASI', 'BEKASI', '', '', '', ''),
(23, 'SP01-023', 'TOKO BENY', 'BEKASI', 'BEKASI', '', '', '', ''),
(24, 'SP01-024', 'TOKO DONA', 'BEKASI', 'BEKASI', '', '', '', ''),
(25, 'SP01-025', 'BAKELS INDONESIA', 'KOMPLEK PERGUDANGAN WIDYA SAKTI KUSUMA BLOK F NO 6', 'BEKASI', '0', '081511527038', '0', '0'),
(26, 'SP01-026', 'pt bukit warna abadi', 'Sentra Niaga Kav.7, Bulevard Hijau, Pejuang', 'bekasi', '0', '02188865495', '0', 'pewarna'),
(27, 'SP01-027', 'CV WAHANA PERSADA NUSANTARA', 'JL. GADING KIRANA UTARA BLOK G10 NO.52', 'KELAPA GADING', '0', '021-29569287', '0', 'GAREM'),
(28, 'SP01-028', 'AGUNG CAKRA LUHUR', 'JL SWAKARSA I/22 RT.03 RW.004', 'JATI BENING BARU. PO', '0', '0', '0', 'TEPUNG'),
(31, 'SP01-029', 'cv  sentosa agung makmur', 'jakarta selatan', 'jakarat', '-', '-', '-', '-'),
(32, 'SP01-030', 'nusa indah ,pt', 'jalan kayu besar', 'kapuk kamal, jakarta utara', '-', '02122557405', '-', '-'),
(33, 'SP01-031', 'PT TRIPUTERA SUKSES MAKMUR', 'JL. TELAGA 111 No.5 Kawasan Industri Cikupa mas1  ,DS Telaga Kec. Cikupa,', 'BANTEN', '-', '085697963813 / 08231', '-', 'DESI / UTARI'),
(34, 'SP01-032', 'PT CIKAL JAYA PERMAI', 'JL. PEJAGALAN I NO.26', 'JAKARTA', '11240', '021-6910358', '-', 'nUNING LISTYARINI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasifgout`
--

CREATE TABLE IF NOT EXISTS `verifikasifgout` (
`id` int(3) NOT NULL,
  `no_so` varchar(29) NOT NULL,
  `so_ext` varchar(29) NOT NULL,
  `nm_cust` varchar(20) NOT NULL,
  `tgl` varchar(15) NOT NULL,
  `nm_fg1` varchar(40) NOT NULL,
  `qty1` varchar(5) NOT NULL,
  `exp1` date NOT NULL,
  `nm_fg2` varchar(40) NOT NULL,
  `qty2` varchar(5) NOT NULL,
  `exp2` date NOT NULL,
  `nm_fg3` varchar(40) NOT NULL,
  `qty3` varchar(5) NOT NULL,
  `exp3` date NOT NULL,
  `nm_fg4` varchar(40) NOT NULL,
  `qty4` varchar(5) NOT NULL,
  `exp4` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `verifikasifgout`
--

INSERT INTO `verifikasifgout` (`id`, `no_so`, `so_ext`, `nm_cust`, `tgl`, `nm_fg1`, `qty1`, `exp1`, `nm_fg2`, `qty2`, `exp2`, `nm_fg3`, `qty3`, `exp3`, `nm_fg4`, `qty4`, `exp4`) VALUES
(1, 'SO17042000001', '-', 'ANEKA PLASTAMA', '2020-08-10', 'Eco Royal Mix', '10', '2020-08-10', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00'),
(2, 'SO17042000002', '-', 'BANANA NUGGET', '2020-04-18', 'Eco Crumb Orange', '20', '2020-08-10', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00'),
(3, 'SO17042000002', '-', 'BANANA NUGGET', '2020-04-18', 'Eco Crumb Orange', '20', '2020-08-10', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00'),
(4, 'SO17042000001', '-', 'ANEKA PLASTAMA', '2020-08-10', 'Eco Royal Mix', '10', '2020-08-10', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00');

--
-- Trigger `verifikasifgout`
--
DELIMITER //
CREATE TRIGGER `cut fg` AFTER INSERT ON `verifikasifgout`
 FOR EACH ROW BEGIN

IF new.qty1 THEN
UPDATE stok_fg
SET stok=stok-NEW.qty1
where nm_fg=new.nm_fg1;
end if;


IF new.qty2 THEN
UPDATE stok_fg
SET stok=stok-NEW.qty2
where nm_fg=new.nm_fg2;
end if;

IF new.qty3 THEN
UPDATE stok_fg
SET stok=stok-NEW.qty3
where nm_fg=new.nm_fg3;
end if;

IF new.qty4 THEN
UPDATE stok_fg
SET stok=stok-NEW.qty4
where nm_fg=new.nm_fg4;
end if;

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `verifikasi_prodrm`
--

CREATE TABLE IF NOT EXISTS `verifikasi_prodrm` (
`id_produk` int(3) NOT NULL,
  `no_po` varchar(30) NOT NULL,
  `nama_vendor` varchar(50) NOT NULL,
  `nama_rm1` varchar(20) NOT NULL,
  `jumlah_barang1` varchar(5) NOT NULL,
  `sisajumlah_barang1` int(10) NOT NULL,
  `jumlah_perkilo1` varchar(5) NOT NULL,
  `sisa_jumlahperkilo1` varchar(10) NOT NULL,
  `jumlah_kg1` varchar(20) NOT NULL,
  `jumlah_barangdatang1` varchar(9) NOT NULL,
  `total_beratdatang1` varchar(9) NOT NULL,
  `tgl_datang1` varchar(15) NOT NULL,
  `nama_rm2` varchar(20) NOT NULL,
  `jumlah_barang2` varchar(5) NOT NULL,
  `jumlah_perkilo2` varchar(5) NOT NULL,
  `sisajumlah_barang2` varchar(10) NOT NULL,
  `sisa_jumlahperkilo2` varchar(10) NOT NULL,
  `jumlah_kg2` varchar(20) NOT NULL,
  `jumlah_barangdatang2` varchar(9) NOT NULL,
  `total_beratdatang2` varchar(9) NOT NULL,
  `tgl_datang2` varchar(15) NOT NULL,
  `nama_rm3` varchar(20) NOT NULL,
  `jumlah_barang3` varchar(5) NOT NULL,
  `sisajumlah_barang3` varchar(10) NOT NULL,
  `jumlah_perkilo3` varchar(5) NOT NULL,
  `sisa_jumlahperkilo3` varchar(10) NOT NULL,
  `jumlah_kg3` varchar(20) NOT NULL,
  `jumlah_barangdatang3` varchar(9) NOT NULL,
  `total_beratdatang3` varchar(9) NOT NULL,
  `tgl_datang3` varchar(15) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `verifikasi_prodrm`
--

INSERT INTO `verifikasi_prodrm` (`id_produk`, `no_po`, `nama_vendor`, `nama_rm1`, `jumlah_barang1`, `sisajumlah_barang1`, `jumlah_perkilo1`, `sisa_jumlahperkilo1`, `jumlah_kg1`, `jumlah_barangdatang1`, `total_beratdatang1`, `tgl_datang1`, `nama_rm2`, `jumlah_barang2`, `jumlah_perkilo2`, `sisajumlah_barang2`, `sisa_jumlahperkilo2`, `jumlah_kg2`, `jumlah_barangdatang2`, `total_beratdatang2`, `tgl_datang2`, `nama_rm3`, `jumlah_barang3`, `sisajumlah_barang3`, `jumlah_perkilo3`, `sisa_jumlahperkilo3`, `jumlah_kg3`, `jumlah_barangdatang3`, `total_beratdatang3`, `tgl_datang3`) VALUES
(1, 'PO11042000001', '', 'Terigu Dragonfly', '10', 1, '25', '25', '250', '10', '250', '2020-08-10', '', '', '0', '', '0', '', '', '0', '', '', '', '', '', '', '', '', '0', ''),
(2, 'PO11042000001', '', 'Terigu Dragonfly', '10', 1, '25', '25', '250', '10', '250', '2020-08-10', '', '', '0', '', '0', '', '', '0', '', '', '', '', '', '', '', '', '0', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `no_rek` (`no_rek`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formula_new`
--
ALTER TABLE `formula_new`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `form_premix`
--
ALTER TABLE `form_premix`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `gudangrm`
--
ALTER TABLE `gudangrm`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga_rm`
--
ALTER TABLE `harga_rm`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `lapprod`
--
ALTER TABLE `lapprod`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `plan_prod` (`plan_prod`);

--
-- Indexes for table `pembayaran_hutang`
--
ALTER TABLE `pembayaran_hutang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petty_cash`
--
ALTER TABLE `petty_cash`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planingprod`
--
ALTER TABLE `planingprod`
 ADD PRIMARY KEY (`id`), ADD KEY `plan_prod` (`plan_prod`);

--
-- Indexes for table `ppic_plan`
--
ALTER TABLE `ppic_plan`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `plan_prod` (`plan_prod`);

--
-- Indexes for table `premix`
--
ALTER TABLE `premix`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `premix1`
--
ALTER TABLE `premix1`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `premixcut`
--
ALTER TABLE `premixcut`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `premixin`
--
ALTER TABLE `premixin`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rekapcutrm`
--
ALTER TABLE `rekapcutrm`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekapsjpremix`
--
ALTER TABLE `rekapsjpremix`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rmin`
--
ALTER TABLE `rmin`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sisaracikan`
--
ALTER TABLE `sisaracikan`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `plan_prod` (`plan_prod`), ADD KEY `plan_prod_2` (`plan_prod`);

--
-- Indexes for table `sjpremix`
--
ALTER TABLE `sjpremix`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sjpremixout`
--
ALTER TABLE `sjpremixout`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `so`
--
ALTER TABLE `so`
 ADD PRIMARY KEY (`id`), ADD KEY `do1` (`do1`);

--
-- Indexes for table `stok_fg`
--
ALTER TABLE `stok_fg`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_fgpremix`
--
ALTER TABLE `stok_fgpremix`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_label`
--
ALTER TABLE `stok_label`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_rm`
--
ALTER TABLE `stok_rm`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbljeniskas`
--
ALTER TABLE `tbljeniskas`
 ADD PRIMARY KEY (`id_jeniskas`);

--
-- Indexes for table `tblkaskeluar`
--
ALTER TABLE `tblkaskeluar`
 ADD PRIMARY KEY (`id_kaskeluar`);

--
-- Indexes for table `tblkasmasuk`
--
ALTER TABLE `tblkasmasuk`
 ADD PRIMARY KEY (`id_kasmasuk`);

--
-- Indexes for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifikasifgout`
--
ALTER TABLE `verifikasifgout`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verifikasi_prodrm`
--
ALTER TABLE `verifikasi_prodrm`
 ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `formula_new`
--
ALTER TABLE `formula_new`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `form_premix`
--
ALTER TABLE `form_premix`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gudangrm`
--
ALTER TABLE `gudangrm`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `harga_rm`
--
ALTER TABLE `harga_rm`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
MODIFY `id_produk` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `lapprod`
--
ALTER TABLE `lapprod`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembayaran_hutang`
--
ALTER TABLE `pembayaran_hutang`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `petty_cash`
--
ALTER TABLE `petty_cash`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `planingprod`
--
ALTER TABLE `planingprod`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ppic_plan`
--
ALTER TABLE `ppic_plan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `premix`
--
ALTER TABLE `premix`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `premix1`
--
ALTER TABLE `premix1`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `premixcut`
--
ALTER TABLE `premixcut`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `premixin`
--
ALTER TABLE `premixin`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `rekapcutrm`
--
ALTER TABLE `rekapcutrm`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rekapsjpremix`
--
ALTER TABLE `rekapsjpremix`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rmin`
--
ALTER TABLE `rmin`
MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `salesorder`
--
ALTER TABLE `salesorder`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sisaracikan`
--
ALTER TABLE `sisaracikan`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sjpremix`
--
ALTER TABLE `sjpremix`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sjpremixout`
--
ALTER TABLE `sjpremixout`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `so`
--
ALTER TABLE `so`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stok_fg`
--
ALTER TABLE `stok_fg`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `stok_fgpremix`
--
ALTER TABLE `stok_fgpremix`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `stok_label`
--
ALTER TABLE `stok_label`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `stok_rm`
--
ALTER TABLE `stok_rm`
MODIFY `no` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbljeniskas`
--
ALTER TABLE `tbljeniskas`
MODIFY `id_jeniskas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblkaskeluar`
--
ALTER TABLE `tblkaskeluar`
MODIFY `id_kaskeluar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tblkasmasuk`
--
ALTER TABLE `tblkasmasuk`
MODIFY `id_kasmasuk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `verifikasifgout`
--
ALTER TABLE `verifikasifgout`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `verifikasi_prodrm`
--
ALTER TABLE `verifikasi_prodrm`
MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
