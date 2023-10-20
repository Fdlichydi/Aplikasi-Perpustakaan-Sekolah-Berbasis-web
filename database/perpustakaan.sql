-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2023 at 02:09 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nis` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `nis`, `nama`, `no_hp`) VALUES
(1, '5432', 'Fadli jahyadi', '082242381624');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_penulis` int(11) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `isbn` varchar(100) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `bahasa` varchar(100) DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `judul_buku`, `id_kategori`, `id_penulis`, `id_penerbit`, `id_rak`, `isbn`, `tahun`, `bahasa`, `jumlah`, `cover`) VALUES
(4, 'Pendidikan Agama Islam dan Budi Pekerti untuk SMA/SMK Kelas X', 8, 5, 3, 26, '978-602-244-455-8', '2021', 'Indonesia', '273', 'Pai x.png'),
(5, ' Ilmu Pengetahuan Alam untuk SMA Kelas X', 8, 4, 3, 5, '978-602-244-380-3', '2021', 'Indonesia', '269', 'ipa x.png'),
(6, 'Ilmu Pengetahuan Sosial untuk SMA Kelas X', 8, 6, 3, 6, '978-602-244-360-5', '2021', 'Indonesia', '270', 'Cuplikan layar 2023-09-02 130550.png'),
(7, 'Cerdas Cergas Berbahasa dan Bersastra Indonesia untuk SMA/SMK Kelas X', 8, 3, 3, 7, '978-602-244-325-4', '2021', 'Indonesia', '270', 'Cuplikan layar 2023-09-02 131221.png'),
(8, 'Bahasa Inggris: Work in Progress untuk SMA/SMK/MA Kelas X', 8, 7, 4, 8, '978-602-244-899-0', '2022', 'Inggris dan Indonesia', '270', 'Cuplikan layar 2023-09-02 131330.png'),
(9, 'Matematika untuk SMA/SMK Kelas X', 8, 8, 3, 9, '978-602-244-526-5', '2021', 'Indonesia', '270', 'Cuplikan layar 2023-09-02 131657.png'),
(10, 'Pendidikan Jasmani, Olahraga, dan Kesehatan untuk SMA/SMK Kelas X', 8, 9, 3, 12, '978-602-244-304-9', '2021', 'Indonesia', '270', 'Cuplikan layar 2023-09-02 131926.png'),
(11, 'Informatika untuk SMA Kelas X', 8, 10, 3, 11, '978-602-244-506-7', '2021', 'Indonesia', '270', 'Cuplikan layar 2023-09-02 132215.png'),
(12, 'Seni Tari untuk SMA/SMK Kelas X', 8, 11, 3, 13, '978-602-244-431-2', '2021', 'Indonesia', '270', 'Cuplikan layar 2023-09-02 132349.png'),
(13, 'Guru Seni Musik untuk SMA/SMK Kelas X', 8, 12, 3, 14, '978-602-244-301-8', '2021', 'Indonesia', '270', 'Cuplikan layar 2023-09-02 133939.png'),
(14, 'Seni Rupa untuk SMA/SMK Kelas X', 8, 13, 3, 15, '978-602-244-355-1', '2021', 'Indonesia', '270', 'Cuplikan layar 2023-09-02 134126.png'),
(15, 'Seni Teater untuk SMA/SMK Kelas X', 8, 14, 3, 16, '978-602-244-349-0', '2021', 'Indonesia', '270', 'Cuplikan layar 2023-09-02 134328.png'),
(16, 'Prakarya dan Kewirausahaan: Kerajinan untuk SMA/MA Kelas X', 8, 15, 4, 17, '978-602-244-903-4', '2022', 'Indonesia', '270', 'Cuplikan layar 2023-09-02 134614.png'),
(17, 'Sejarah untuk SMA/SMK Kelas X', 8, 16, 3, 22, '978-602-244-556-2', '2021', 'Indonesia', '270', 'Cuplikan layar 2023-09-02 134950.png'),
(18, 'Cerdas Cergas Berbahasa dan Bersastra Indonesia untuk SMA/SMK Kelas XI', 8, 17, 3, 7, '978-602-244-669-9', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 135036.png'),
(19, 'Bahasa Inggris: English for Change untuk SMA/MA Kelas XI', 8, 18, 7, 8, '978-602-427-944-8', '2022', 'Inggris dan Indonesia', '270', 'Screenshot 2023-09-17 135320.png'),
(20, 'Matematika untuk SMA/SMK Kelas XI', 8, 19, 3, 9, '978-602-244-788-7', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 135451.png'),
(21, 'Pendidikan Pancasila untuk SMA/MA/SMK/MAK Kelas X', 8, 21, 4, 10, '978-623-194-603-4', '2023', 'Indonesia', '270', 'Screenshot 2023-09-17 135921.png'),
(22, 'Pendidikan Pancasila untuk SMA/MA/SMK/MAK Kelas XI', 8, 15, 4, 10, '978-623-194-623-2', '2023', 'Indonesia', '270', 'Screenshot 2023-09-17 140147.png'),
(23, 'Informatika untuk SMA Kelas XI', 8, 22, 3, 11, '978-602-244-861-7', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 140437.png'),
(24, 'Pendidikan Jasmani, Olahraga, dan Kesehatan untuk SMA Kelas XI', 8, 23, 4, 12, '978-602-244-857-0', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 140705.png'),
(25, 'Pendidikan Agama Islam dan Budi Pekerti untuk SMA/SMK Kelas XI', 8, 24, 3, 26, '978-602-244-684-2', '2023', 'Indonesia', '270', 'Screenshot 2023-09-17 185525.png'),
(26, 'Seni Tari untuk SMA Kelas XI', 8, 25, 3, 13, '978-602-244-722-1', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 185934.png'),
(27, 'Seni Musik: Kita dan Musik untuk SMA Kelas XI', 8, 26, 3, 14, '978-602-244-601-9', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 190115.png'),
(28, 'Seni Rupa untuk SMA Kelas XI', 8, 27, 3, 15, '978-602-244-624-8', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 190305.png'),
(29, 'Seni Teater untuk SMA Kelas XI', 8, 28, 3, 16, '978-602-244-607-1', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 190340.png'),
(30, 'Prakarya dan Kewirausahaan: Kerajinan untuk SMA/MA Kelas XI', 8, 29, 7, 17, '978-602-427-954-7', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 191353.png'),
(31, 'Sosiologi untuk SMA Kelas XI', 8, 30, 3, 18, '978-602-244-848-8', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 191516.png'),
(32, 'Ekonomi untuk SMA Kelas XI', 8, 31, 3, 20, '978-602-244-852-5', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 191649.png'),
(33, ' Geografi untuk SMA Kelas XI', 8, 32, 3, 21, '978-602-244-846-4', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 191823.png'),
(34, 'Sejarah untuk SMA Kelas XI', 8, 33, 3, 22, '978-602-244-859-4', '2021', 'Indonesia', '270', 'Screenshot 2023-09-17 192011.png'),
(35, 'Biologi untuk SMA/MA Kelas XI', 8, 34, 7, 23, '978-602-427-893-9', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 192237.png'),
(36, 'Fisika untuk SMA/MA Kelas XI', 8, 35, 7, 24, '978-623-472-721-0', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 192425.png'),
(37, 'Kimia untuk SMA/MA Kelas XI', 8, 36, 7, 25, '978-602-427-923-3', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 192604.png'),
(38, 'Cerdas Cergas Berbahasa dan Bersastra Indonesia untuk SMA/SMK/MA Kelas XII', 8, 37, 4, 7, '978-602-244-724-5', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 192818.png'),
(39, 'Bahasa Inggris: Life Today untuk SMA/MA Kelas XII', 8, 38, 4, 8, '978-602-427-945-5', '2022', 'Inggris dan Indonesia', '269', 'Screenshot 2023-09-17 193042.png'),
(40, 'Matematika untuk SMA/K/SMK/MA Kelas XII', 8, 39, 7, 9, '978-602-244-738-2', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 193217.png'),
(41, 'Pendidikan Pancasila untuk SMA/MA/SMK/MAK Kelas XII', 8, 40, 4, 10, '978-623-194-624-9', '2023', 'Indonesia', '270', 'Screenshot 2023-09-17 193312.png'),
(42, 'Informatika untuk SMA/MA Kelas XII', 8, 41, 7, 11, '978-602-427-948-6', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 193518.png'),
(43, 'Pendidikan Jasmani, Olahraga, dan Kesehatan untuk SMA/MA Kelas XII', 8, 42, 7, 12, '978-602-427-976-9', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 193638.png'),
(44, 'Pendidikan Agama Islam dan Budi Pekerti untuk SMA/SMK/MA Kelas XII', 8, 43, 4, 26, '978-602-244-677-4', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 193759.png'),
(45, ' Seni Tari untuk SMA/K/MA Kelas XII', 8, 44, 7, 13, '978-602-244-766-5', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 193913.png'),
(46, 'Seni Musik untuk SMA/K/MA Kelas XII', 8, 45, 7, 14, '978-602-244-440-4', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 194013.png'),
(47, 'Seni Rupa untuk SMA/MA Kelas XII', 8, 46, 4, 15, '978-602-244-615-6', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 194440.png'),
(48, 'Seni Teater untuk SMA/K/MA Kelas XII', 8, 47, 7, 16, '978-602-244-799-3', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 194534.png'),
(49, 'Prakarya: Pengolahan untuk SMA/MA Kelas XII', 8, 48, 7, 17, '978-602-427-953-0', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 194711.png'),
(50, 'Sosiologi untuk SMA/MA Kelas XII', 8, 49, 7, 18, '978-602-427-973-8', '2023', 'Indonesia', '270', 'Screenshot 2023-09-17 194837.png'),
(51, 'Ekonomi untuk SMA/MA Kelas XII', 8, 50, 7, 20, 'Ekonomi untuk SMA/MA Kelas XII', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 195034.png'),
(52, 'Geografi untuk SMA/MA Kelas XII', 8, 32, 7, 21, '978-602-427-914-1', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 195114.png'),
(53, 'Sejarah untuk SMA/MA Kelas XI', 8, 33, 7, 22, '978-602-427-965-3', '2022', 'Indonesia', '270', 'Screenshot 2023-09-17 195231.png'),
(54, 'Biologi untuk SMA Kelas XII', 8, 34, 4, 23, '978-602-427-958-5', '2022', 'Indonesia', '269', 'Screenshot 2023-09-17 195659.png'),
(55, 'Fisika untuk SMA/MA Kelas XII', 8, 34, 4, 24, '978-623-472-722-7', '2022', 'Indonesia', '269', 'Screenshot 2023-09-17 195903.png'),
(56, 'Kimia untuk SMA/MA Kelas XII', 8, 36, 4, 25, '978-602-427-968-4', '2022', 'Indonesia', '269', 'Screenshot 2023-09-17 200025.png'),
(57, 'Kajian geo-arkeologi', 9, 51, 8, 27, '978-623-228-852-2', '2021', 'Indonesia', '10', 'Screenshot 2023-09-17 201139.png'),
(58, 'Berinternet bagi Pemula', 9, 52, 9, 27, '978-979-27-1679-5', '2007', 'Indonesia', '10', 'Screenshot 2023-09-17 201722.png'),
(59, 'Pintar psikotes : panduan psikotes terlengkap', 9, 53, 10, 27, '978-602-74090-1-9', '2020', 'Indonesia', '10', 'Screenshot 2023-09-17 202356.png'),
(60, 'The candlestick course : Sebuah referensi investasi', 9, 54, 9, 27, '9780471227281', '2020', 'Inggris dan Indonesia', '10', 'Screenshot 2023-09-17 202602.png'),
(61, 'Berkomentarlah Dengan Bijak Agar Sosmed jadi Enak', 9, 55, 11, 27, '-', '2023', 'Indonesia', '10', 'Screenshot 2023-09-17 203818.png'),
(62, 'Kejahatan Cyber Bullying', 9, 55, 11, 27, '-', '2023', 'Indonesia', '10', 'Screenshot 2023-09-17 204027.png'),
(63, ' Internet dan netiket', 9, 55, 11, 27, '-', '2023', 'Indonesia', '10', 'Screenshot 2023-09-17 204143.png'),
(64, 'Modul Pinjaman Online Edisi Minang', 9, 55, 12, 27, '-', '2023', 'Minang', '10', 'Screenshot 2023-09-17 204424.png'),
(65, 'Kenali Berbagai Cara Melindungi Data Pribadimu di Marketplace', 9, 55, 13, 27, '-', '2022', 'Indonesia', '10', 'Screenshot 2023-09-17 204643.png'),
(66, 'Rahasia Hidup Sehat dan Selamat di Ruang Digital', 9, 56, 14, 27, '-', '2022', 'Indonesia', '10', 'Screenshot 2023-09-17 204839.png'),
(67, 'Literasi Media: Apa, Mengapa, Bagaimana Edisi Revisi', 9, 57, 16, 27, '9789793782546', '2019', 'Indonesia', '10', 'Screenshot 2023-09-17 211113.png'),
(68, 'Dari perempuan Tasikmalaya untuk perempuan Indonesia', 9, 59, 18, 27, '-', '2023', 'Indonesia', '10', 'Screenshot 2023-09-17 211932.png'),
(69, 'Narasi perjuangan intelektual', 9, 60, 18, 27, '-', '2023', 'Indonesia', '10', 'Screenshot 2023-09-17 212035.png'),
(70, 'Tanya Jawab Sains: Fenomena Alam', 9, 61, 19, 27, '-', '2023', 'Indonesia', '10', 'Screenshot 2023-09-17 212257.png'),
(71, 'Stuck On You', 7, 62, 19, 28, '-', '2022', 'Indonesia', '10', 'Screenshot 2023-09-17 212901.png'),
(72, 'Our Sun', 7, 63, 19, 28, '-', '2022', 'Indonesia', '10', 'Screenshot 2023-09-17 213029.png'),
(73, 'Kristalista Susah Senang Bersama Sang Ibu di Amerika', 7, 64, 20, 28, '-', '2022', 'Indonesia', '10', 'Screenshot 2023-09-17 213311.png'),
(74, 'Sore Hari', 7, 63, 18, 28, '978-602-244-325-4', '2022', 'Indonesia', '10', 'kissclipart-books-logo-clipart-book-1e69f636c12253c0-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL,
  `tgl_denda` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `denda` varchar(50) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_denda`
--

INSERT INTO `tbl_denda` (`id_denda`, `tgl_denda`, `nama`, `kelas`, `denda`, `ket`) VALUES
(2, '2023-01-09', 'Fadli jahyadi', 'XI 8', 'Mengganti Buku Literasi', 'Menghilangkan Buku Informatika untuk SMA Kelas XI'),
(4, '2023-07-22', 'Julio', 'XI 3', 'Mengganti Buku Literasi', 'Menghilangkan Buku Geografi untuk SMA Kelas XI '),
(5, '2023-08-19', 'Agus', 'XII 6', 'Rp. 500', 'Terlambat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hilang`
--

CREATE TABLE `tbl_hilang` (
  `id_hilang` int(11) NOT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `no_buku` varchar(20) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_kelas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hilang`
--

INSERT INTO `tbl_hilang` (`id_hilang`, `id_buku`, `no_buku`, `nama`, `id_kelas`) VALUES
(7, 23, '120', 'Fadli jahyadi', 'XI 8'),
(8, 33, '33', 'Julio', 'XI 3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(7, 'Fiksi'),
(8, 'Buku pelajaran'),
(9, 'Buku Reverensi'),
(10, 'Kamus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`) VALUES
(3, 'X 1'),
(4, 'X 2'),
(5, 'X 3'),
(6, 'X 4'),
(7, 'X 5'),
(8, 'X 6'),
(9, 'X 7'),
(10, 'X 8'),
(11, 'X 9'),
(13, 'XI 1'),
(14, 'XI 2'),
(15, 'XI 3'),
(16, 'XI 4'),
(17, 'XI 5'),
(18, 'XI 6'),
(19, 'XI 7'),
(20, 'XI 8'),
(21, 'XI 9'),
(22, 'XII 1'),
(23, 'XII 2'),
(24, 'XII 3'),
(25, 'XII 4'),
(26, 'XII 5'),
(27, 'XII 6'),
(28, 'XII 7'),
(29, 'XII 8'),
(30, 'XII 9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penerbit`
--

CREATE TABLE `tbl_penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(1, 'Gramedia'),
(2, 'Anna'),
(3, 'Pusat Kurikulum dan Perbukuan'),
(4, 'Pusat Perbukuan'),
(7, 'Kementerian Pendidikan, Kebudayaan, Riset, dan Tek'),
(8, 'Graha Ilmu'),
(9, 'Elex Media Komputindo'),
(10, 'KawahMedia'),
(11, 'Program Vokasi Humas Universitas Indonesia'),
(12, 'CDFS'),
(13, 'Center for Digital Society'),
(14, 'Vokasi UI'),
(15, 'Google'),
(16, 'Simbiosa Rekatama Media '),
(17, 'Wedatama Widya Sastra '),
(18, ' CV Langgam Pustaka'),
(19, 'Andi Publisher'),
(20, 'Ahmad Yusuf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penulis`
--

CREATE TABLE `tbl_penulis` (
  `id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penulis`
--

INSERT INTO `tbl_penulis` (`id_penulis`, `nama_penulis`) VALUES
(3, 'Fadillah Tri Aulia, Sefi Indra Gumilar'),
(4, 'Ayuk Ratna Puspaningsih, Elizabeth Tjahjadarmawan,'),
(5, 'Ahmad Taufik, Nurwastuti Setyowati'),
(6, 'Sari Oktafiana, Efvinggo Fasya Jaya. SP, M. Nursa’'),
(7, 'Budi Hermawan, Dwi Haryanti, Nining Suryaningsih'),
(8, 'Dicky Susanto, Theja Kurniawan, Savitri K. Sihombi'),
(9, 'Agus Mahendra, Bambang Abdul Jabar'),
(10, 'Mushthofa, Wahyono, Auzi Asfarian, Dean Apriana Ra'),
(11, 'Hani Amalia Hendrajatin, Ratna Aryani'),
(12, 'Henry Pranoto, Christy Rahma Septiani'),
(13, 'Monika Irayati, Saraswati Dewi'),
(14, 'E. Sumadiningrat, Sobar Budiman'),
(15, 'Sri Suratinah Hadiyati Kamihadi, Dewi Sri Handayan'),
(16, 'Sari Oktafiana'),
(17, 'Heny Marwati, K. Waskitaningtyas'),
(18, 'Puji Astuti, Aria Septi Anggaira, Atti Herawati, D'),
(19, 'Dicky Susanto, Savitri K. Sihombing, Marianna Magd'),
(20, 'Sri Cahyati, Siti Nurjanah, Ali Usman'),
(21, 'Rochimudin, Muhamad Hari Purnomo Hadi, Ahmad Asron'),
(22, 'Auzi Asfarian, Paulina H. Prima Rosa, Irya Wisnubh'),
(23, 'Muhajir'),
(24, 'Abd. Rahman, Hery Nugroho'),
(25, 'Eny Kusumastuti,Milasari'),
(26, 'Turino, A.Budiyanto'),
(27, 'Bambang Subarnas, Lenny Djanurlia'),
(28, 'Deden Haerudin, Tria Sismalinda'),
(29, 'Dessy Rachma Waryanti, Lu’lu’ul Fauziah Nurwito, W'),
(30, 'Joan Hesti Gita Purwasih, Seli Septiana Pratiwi'),
(31, 'Yeni Fitriani, Aisyah Nurjanah'),
(32, 'Budi Handoyo'),
(33, 'Martina Safitry, Indah Wahyu Puji Utami, Zein Ilya'),
(34, 'Rini Solihat, Eris Rustandi, Wandi Herpiandi, Zamz'),
(35, 'Marianna Magdalena Radjawane, Alvius Tinambunan, S'),
(36, 'Munasprianto Ramli, Nanda Saridewi, Tiktik Mustika'),
(37, 'Bambang Trimansyah'),
(38, 'Susanti Retno Hardini Achdi Merdianto Marjenny Ran'),
(39, 'Mohammad Tohir, Ahmad Choirul Anam, Ibnu Taufiq'),
(40, 'Dwi Astuti Setiawan, Hatim Gazali, Ida Rohayani'),
(41, 'Budi Permana, R. Kurweni Ukar, Dela Chaerani, Sole'),
(42, 'Anggara Aditya Kurniawan, Syahriad'),
(43, 'Rohmat Chozin, Untoro'),
(44, 'Cicilia Ika Rahayu Nita, Laili Khoirun Nisak'),
(45, 'Pri Ario Damar, DJ Dimas Phetorant'),
(46, 'Dessy Rachma Waryanti, Karen Hardini'),
(47, 'Rano Sumarno, Enung Nurhayati'),
(48, 'Muktiarni, Henni Ratnasusanti, Nur Umiyahwati'),
(49, 'Joan Hesti Gita Purwasih, Seli Septiana Pratiwi'),
(50, 'Aisyah Nurjanah, Yeni Fitriani'),
(51, 'Johan Arif'),
(52, 'Bunafit Nugroho'),
(53, '	Wildan Adnan'),
(54, 'Nison, Steve'),
(55, 'Siberkreasi'),
(56, 'Devie Rahmawati'),
(57, 'Dr. Yosal Iriantara'),
(58, 'Ali Akbar'),
(59, 'Hotum Hotimah'),
(60, 'Derry Rm'),
(61, 'Taufik Hidayat'),
(62, 'R.A Trivani Desyara'),
(63, 'Lulux Adelina'),
(64, ' Usup');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pinjam` varchar(100) DEFAULT NULL,
  `tgl_kembali` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `no` varchar(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `tgl_pinjam`, `tgl_kembali`, `nama`, `id_kelas`, `id_buku`, `no`, `jumlah`, `status`) VALUES
(13, '30 September 2023', '30 September 2023', 'Nanda Utama', 29, 46, 'No : 1', 1, 'Kembali'),
(14, '30 September 2023', '30 September 2023', 'Ali Sadikin', 27, 42, 'No : 1', 1, 'Kembali'),
(15, '30 September 2023', '01 October 2023', 'Sevino Korti', 14, 37, 'No : 1', 1, 'Kembali'),
(16, '30 September 2023', NULL, 'Firdaus', 30, 54, 'No : 1', 1, 'Pinjam'),
(17, '30 September 2023', NULL, 'Anjeli', 27, 39, 'No : 1', 1, 'Pinjam'),
(18, '30 September 2023', NULL, 'Ferdinal', 30, 55, 'No : 1', 1, 'Pinjam'),
(19, '30 September 2023', '30 September 2023', 'Putri', 3, 6, 'No : 1', 1, 'Kembali'),
(20, '30 September 2023', '30 September 2023', 'Zainal Abidin', 30, 43, 'No : 1', 1, 'Kembali'),
(21, '30 September 2023', '30 September 2023', 'Faiza', 27, 66, 'No : 1', 1, 'Kembali'),
(22, '30 September 2023', '30 September 2023', 'Fadli jahyadi', 30, 60, 'No : 1', 1, 'Kembali'),
(23, '30 September 2023', '01 October 2023', 'Fani apriliani', 30, 68, 'No : 1', 1, 'Kembali'),
(24, '01 October 2023', NULL, 'Sabarudin', 30, 56, 'No : 2', 1, 'Pinjam'),
(25, '01 October 2023', NULL, 'Aliudin', 10, 5, 'No : 2', 1, 'Pinjam'),
(26, '03 October 2023', '03 October 2023', 'Fadli jahyadi', 30, 74, 'No : 1', 1, 'Kembali');

--
-- Triggers `tbl_pinjam`
--
DELIMITER $$
CREATE TRIGGER `kembali` AFTER UPDATE ON `tbl_pinjam` FOR EACH ROW BEGIN
	UPDATE tbl_buku SET jumlah = jumlah + NEW.jumlah
    WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `tbl_pinjam` FOR EACH ROW BEGIN
	UPDATE tbl_buku SET jumlah = jumlah - NEW.jumlah
    WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(5, 'IPA'),
(6, 'IPS'),
(7, 'Bahasa Indonesia'),
(8, 'Bahasa Inggris'),
(9, 'Matematika'),
(10, 'Pendidikan Pancasila'),
(11, 'Informatika'),
(12, 'PJOK'),
(13, 'Seni Tari'),
(14, 'Seni Musik'),
(15, 'Seni Rupa'),
(16, 'Seni Teater'),
(17, 'Prakarya'),
(18, 'Sosiologi'),
(19, 'Antropologi'),
(20, 'Ekonomi'),
(21, 'Geografi'),
(22, 'Sejarah'),
(23, 'Biologi'),
(24, 'Fisika'),
(25, 'Kimia'),
(26, 'Pendidikan Agama Islam'),
(27, 'Referensi'),
(28, 'Fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tgl_peminjaman` date DEFAULT NULL,
  `tgl_pengembalian` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_buku1` varchar(100) DEFAULT NULL,
  `no_buku1` varchar(100) DEFAULT NULL,
  `id_buku2` varchar(100) DEFAULT NULL,
  `no_buku2` varchar(100) DEFAULT NULL,
  `id_buku3` varchar(100) DEFAULT NULL,
  `no_buku3` varchar(100) DEFAULT NULL,
  `id_buku4` varchar(100) DEFAULT NULL,
  `no_buku4` varchar(100) DEFAULT NULL,
  `id_buku5` varchar(100) DEFAULT NULL,
  `no_buku5` varchar(100) DEFAULT NULL,
  `buku_dipinjam` text DEFAULT NULL,
  `status1` varchar(50) DEFAULT NULL,
  `status2` varchar(50) DEFAULT NULL,
  `status3` varchar(50) DEFAULT NULL,
  `status4` varchar(50) DEFAULT NULL,
  `status5` varchar(50) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `tgl_peminjaman`, `tgl_pengembalian`, `nama_siswa`, `id_kelas`, `id_buku1`, `no_buku1`, `id_buku2`, `no_buku2`, `id_buku3`, `no_buku3`, `id_buku4`, `no_buku4`, `id_buku5`, `no_buku5`, `buku_dipinjam`, `status1`, `status2`, `status3`, `status4`, `status5`, `ket`) VALUES
(62, '2023-09-30', '2023-09-30', 'Fadli Jahyadi', 30, 'Kristalista Susah Senang Bersama Sang Ibu di Amerika', 'No : 5', '', '', '', '', '', '', '', '', NULL, 'Dipinjam', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi_kembali`
--

CREATE TABLE `tbl_transaksi_kembali` (
  `id_transaksi_kembali` int(11) NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `id_kelas` int(100) DEFAULT NULL,
  `id_buku1` varchar(100) DEFAULT NULL,
  `no_buku1` varchar(100) DEFAULT NULL,
  `id_buku2` varchar(100) DEFAULT NULL,
  `no_buku2` varchar(100) DEFAULT NULL,
  `id_buku3` varchar(100) DEFAULT NULL,
  `no_buku3` varchar(100) DEFAULT NULL,
  `id_buku4` varchar(100) DEFAULT NULL,
  `no_buku4` varchar(100) DEFAULT NULL,
  `id_buku5` int(100) DEFAULT NULL,
  `no_buku5` int(100) DEFAULT NULL,
  `status` int(100) DEFAULT NULL,
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `level` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `no_hp`, `foto`, `level`) VALUES
(1, 'fadli', 'fadli@gmail.com', 'fadli', '0838018955', '1.jpeg', '0'),
(2, 'kepsek', 'kepsek@gmail.com', '1234', NULL, NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_penulis` (`id_penulis`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_rak` (`id_rak`);

--
-- Indexes for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `tbl_hilang`
--
ALTER TABLE `tbl_hilang`
  ADD PRIMARY KEY (`id_hilang`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `tbl_penulis`
--
ALTER TABLE `tbl_penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `tbl_transaksi_kembali`
--
ALTER TABLE `tbl_transaksi_kembali`
  ADD PRIMARY KEY (`id_transaksi_kembali`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_hilang`
--
ALTER TABLE `tbl_hilang`
  MODIFY `id_hilang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_penulis`
--
ALTER TABLE `tbl_penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_transaksi_kembali`
--
ALTER TABLE `tbl_transaksi_kembali`
  MODIFY `id_transaksi_kembali` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
