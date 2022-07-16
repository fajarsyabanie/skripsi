-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 02:05 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `stok` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `stok`) VALUES
('B001', 'Laptop Asus', '11'),
('B002', 'Laptop Acer', '21'),
('B003', 'Mikrotik', '57'),
('B004', 'Access Point TP-LINK Outdoor', '10'),
('B005', 'Access Point Unifi AP AC LR', '10'),
('B006', 'LCD Proyektor No 9', '1'),
('B007', 'LCD Proyektor No 12', '2'),
('B008 ', 'Obeng Minus', '20'),
('B009', 'Obeng Plus ', '30'),
('B010', 'Ram PC DDR 3', '2'),
('B011', 'Motherboard Praktek', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `nik` varchar(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `jekel` varchar(50) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`nik`, `nama_guru`, `jekel`, `mapel`, `email`, `no_hp`) VALUES
('0000000001', 'Omar Muhammad Altoumi Alsyaibani, S.Pd', 'Laki-Laki', 'ASJ', 'omar@smkn2banjarbaru.sch.id', '082324254498'),
('0000000002', 'Arif Rachman, S.Pd', 'Laki-Laki', 'PKDK', 'arif@smkn2banjarbaru.sch.id', '08988877251'),
('0000000003', 'Rastra Feryd Permana, S.Pd', 'Laki-Laki', 'ASJ', 'rastra@smkn2banjarbaru.sch.id', '082334967710'),
('0000000004', 'Muhammad Yasa, S.Pd', 'Laki-Laki', 'WAN', 'yasa@smkn2banjarbaru.sch.id', '081348229188'),
('0000000005', 'Mega Kusumadewi, S.Kom', 'Perempuan', 'Informatika', 'mega@smkn2banjarbaru.sch.id', '082155588985'),
('0000000006', 'Aji Triwerdaya, S.Kom', 'Laki-Laki', 'ASJ Kelas XII', 'aji@smkn2banjarbaru.sch.id', '082256353616'),
('0000000007', 'Muhammad Fiqri Perdana', 'Laki-Laki', 'Teknisi', 'dana@smkn2banjarbaru.sch.id', '081252170696');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjaman`
--

CREATE TABLE `tb_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode_barang` varchar(10) CHARACTER SET latin1 NOT NULL,
  `jumlah` varchar(11) NOT NULL,
  `nisn` varchar(10) CHARACTER SET latin1 NOT NULL,
  `nik` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` enum('PIN','KEM') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peminjaman`
--

INSERT INTO `tb_peminjaman` (`id_peminjaman`, `kode_barang`, `jumlah`, `nisn`, `nik`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(114, 'B003', '3', '0052992618', '0000000006', '2022-01-05', '2022-01-15', 'KEM'),
(115, 'B002', '1', '0052392765', '0000000003', '2022-01-04', '2022-01-15', 'KEM'),
(116, 'B003', '5', '0039554456', '0000000003', '2021-12-26', '2022-01-15', 'KEM'),
(117, 'B002', '3', '0046780779', '0000000007', '2021-12-19', '2022-01-16', 'KEM'),
(118, 'B001', '2', '0054360722', '0000000005', '2022-01-05', '2022-01-17', 'KEM'),
(119, 'B001', '2', '0054363633', '0000000005', '2022-01-17', '2022-01-17', 'KEM'),
(121, 'B002', '5', '0057675815', '0000000002', '2022-01-17', '2022-01-17', 'KEM'),
(122, 'B002', '2', '0036594031', '0000000002', '2022-01-17', '2022-01-17', 'KEM'),
(123, 'B002', '1', '0051446775', '0000000003', '2022-01-18', '2022-01-18', 'KEM'),
(124, 'B001', '2', '0062067217', '0000000005', '2022-01-18', '2022-01-18', 'KEM'),
(125, 'B001', '1', '0063254474', '0000000007', '2022-01-18', '2022-01-18', 'KEM'),
(126, 'B001', '5', '0051446775', '0000000004', '2022-01-18', '2022-01-18', 'KEM'),
(127, 'B007', '1', '0052992618', '0000000005', '2022-01-18', '2022-01-18', 'KEM'),
(128, 'B003', '12', '0063254474', '0000000005', '2022-01-18', '2022-01-18', 'KEM'),
(129, 'B004', '1', '0057675815', '0000000005', '0000-00-00', '2022-01-18', 'KEM'),
(130, 'B011', '1', '0054363633', '0000000004', '2022-01-18', '2022-01-18', 'KEM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Administrator','Petugas','TU') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(5, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(16, 'Petugas 1', 'petugas1', 'b53fe7751b37e40ff34d012c7774d65f', 'Petugas'),
(17, 'Petugas 2', 'petugas2', 'ac5604a8b8504d4ff5b842480df02e91', 'Petugas'),
(18, 'Tata Usaha 1', 'tata_usaha1', '57bf354d5405a73a8cdd39fb04d6dacf', 'TU'),
(19, 'Tata Usaha 2', 'tata_usaha2', 'bb250fc893d898a2df6b1a85d9a53781', 'TU');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelas` varchar(24) NOT NULL,
  `jekel` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nama_siswa`, `kelas`, `jekel`, `email`, `no_hp`) VALUES
('0024976014', 'Berliani', 'XII TKJ B', 'Perempuan', 'aniberli28@gmail.com', '085945154802'),
('0029396916', 'Lola Debora Margaretha', 'XII TKJ A', 'Perempuan', 'loladeboramrgaretha11@gmail.com', '0895338808780'),
('0032388583', 'Rangga Pratama', 'XII TKJ A', 'Laki-Laki', 'emailsaya1112@gmail.com', '087838140221'),
('0032683283', 'Aisya Anindia Septha', 'XII TKJ B', 'Perempuan', 'aisyaanindiaseptha@gmail.com', '085971690136'),
('0033400596', 'Muhamad Jordy', 'XII TKJ B', 'Laki-Laki', '2019tkjb4937@smkn2banjarbaru.sch.id', '083151807407'),
('0035514146', 'Ahmad Nur Ihsan', 'XII TKJ B', 'Laki-Laki', 'Ahmadnurihshan@gmail.com', '085752679386'),
('0035611161', 'Chandra Kurniawan', 'XII TKJ A', 'Laki-Laki', 'chandrakurniawan4321@gmail.com', '081247958989'),
('0035688707', 'Ilham Muhammad Yunan', 'XII TKJ B', 'Laki-Laki', 'im.yunan55@gmail.com', '085650845185'),
('0035707156', 'Muhammad Naufal Pradipta', 'XII TKJ A', 'Laki-Laki', 'naufal.bjb12@gmail.com', '087738103786'),
('0036594031', 'Rahmadito Nasywan', 'XII TKJ B', 'Laki-Laki', 'rahmadito030@gmail.com', '081255550864'),
('0036793202', 'Muhammad Valent Mahaputra', 'XII TKJ B', 'Laki-Laki', 'mvalentmp12@gmail.com', '083159909495'),
('0036988047', 'Rizky Ramadhani', 'XI TKJ A', 'Laki-Laki', 'ramadhanisirizky@gmail.com', '083119246008'),
('0037297290', 'Nova Andika', 'X TJKT B', 'Laki-Laki', 'Adnova0727@gamil.comp', '082350992948'),
('0037590315', 'Andin Hermawan', 'XII TKJ A', 'Laki-Laki', 'saya.andin.hermawan@gmail.com', '085820305840'),
('0038284055', 'Terryzki Fadila', 'XII TKJ B', 'Laki-Laki', '2019tkjb4956@smkn2banjarbaru.sch.id', '085389949370'),
('0038422483', 'Muhammad Agil Nugroho', 'XII TKJ A', 'Laki-Laki', 'agilnugrohozpb@gmail.com', '081549359230'),
('0038600062', 'Muhamad Natan Putra Hidayat', 'XII TKJ B', 'Laki-Laki', 'Mrnatan367@gmail.com', '082149395710'),
('0039105082', 'Fitriyanto', 'XII TKJ B', 'Laki-Laki', '2019tkjb4931@smkn2banjarbaru.sch.id', '087899483630'),
('0039185197', 'Sugeng Riyadi', 'XII TKJ A', 'Laki-Laki', 'harukasenpai47@gmail.com', '087755004195'),
('0039445154', 'Shandrina Dwi Apriliyana', 'XII TKJ B', 'Perempuan', 'aprilrinshan@gmail.com', '082352688383'),
('0039534520', 'Shinta Ayu Lestari', 'XII TKJ B', 'Perempuan', '2019tkjb4954@smkn2banjarbaru.sch.id', '081549344288'),
('0039554456', 'Siti Lestari', 'XII TKJ B', 'Perempuan', '2019tkjb4955@smkn2banjarbaru.sch.id', '083141407694'),
('0039771609', 'Nadia Salsabila Inka Kusuma', 'XII TKJ B', 'Perempuan', 'nadiakusuma.2222@gmail.com', '083867150253'),
('0041163353', 'Octavia Putri Pramayogi', 'XII TKJ B', 'Perempuan', 'octaviaaa910@gmail.com', '085850256570'),
('0041432034', 'Bayu Putra Pradana', 'XII TKJ B', 'Laki-Laki', 'bayuwengga123@gmail.com', '085389106409'),
('0041886472', 'Zyan Humaira', 'XII TKJ A', 'Perempuan', 'zyan.humaira@gmail.com', '087713268548'),
('0041977680', 'Naufal Renardi', 'XI TKJ B', 'Laki-Laki', '2019tkjb4946@smkn2banjarbaru.sch.id', '082252149745'),
('0042084013', 'Muhammad Bima Prasetyo Ariansyah', 'X TJKT B', 'Laki-Laki', 'muhammadbimaprasetyoariansyah@gmail.com', '083179257072'),
('0042086563', 'Hizkia Justine Hasan', 'XII TKJ B', 'Laki-Laki', 'hizkiank256p@gmail.com', '082250363824'),
('0042796369', 'Novita Dwi Ariyanti', 'XII TKJ A', 'Perempuan', 'novitadwiariyanti230604@gmail.com', '081949737862'),
('0042838393', 'Abdul Gaffar Ilyasa', 'XI TKJ B', 'Laki-Laki', 'ilyasaghxcity07@gmail.com', '083143441822'),
('0042926912', 'Hernandi Pratama', 'XI TKJ A', 'Laki-Laki', 'hernandipratama9604@gmail.com', '085654805436'),
('0042997291', 'Muhammad Alviannoor', 'XII TKJ A', 'Laki-Laki', 'alviin469@gmail.com', '085159528229'),
('0043019311', 'Muhammad Rahdian Anugerah Putra', 'XII TKJ A', 'Laki-Laki', 'rahdianputra34@gmail.com', '082254693256'),
('0043025523', 'Riyageng Alvando Franklyn Hutajulu', 'XII TKJ A', 'Laki-Laki', 'alvandohutajulu@gmail.com', '089621096770'),
('0043427228', 'Salman Al Farizi', 'XII TKJ B', 'Laki-Laki', 'saf85.sp@gmail.com', '083141356820'),
('0043520331', 'Patma', 'XI TKJ B', 'Perempuan', 'fatmacomell24@gmail.com', '082155179586'),
('0043520342', 'Surya Maulana Herman Syah', 'XII TKJ A', 'Laki-Laki', 'hsuryamaulana@gmail.com', '087800529822'),
('0043643950', 'Nadiya Maulida', 'XI TKJ B', 'Perempuan', 'Ayimaulida@gmail.com', '0887435863502'),
('0043899532', 'M. Rangga Andiantomo', 'XII TKJ A', 'Laki-Laki', 'ranggaate.rg@gmail.com', '082149676585'),
('0043899533', 'M. Nanda Febriantomo', 'XII TKJ A', 'Laki-Laki', 'ftadut@gmail.com', '082149678198'),
('0043917001', 'Muhammad Fajriyanoor Dwi Hariyanto', 'XII TKJ A', 'Laki-Laki', 'fajriyanoor666@gmail.com', '08971405691'),
('0043917383', 'M. Reza Fachrizi', 'XII TKJ A', 'Laki-Laki', 'rezafchrizi22@gmail.com', '0895700507736'),
('0043918791', 'Muhammad Hasbi Hernanda', 'XII TKJ B', 'Laki-Laki', 'hernandamuhammad87@gmail.com', '0895337206329'),
('0043918805', 'Riffky Ramadhani', 'XII TKJ A', 'Laki-Laki', 'lirenastn@gmail.com', '083151408619'),
('0044000690', 'Dharma Wiguna Limmarga', 'XII TKJ A', 'Laki-Laki', '2004dharma@gmail.com', '081776584692'),
('0044310525', 'Raseifa Noviyanti', 'XI TKJ B', 'Perempuan', 'raseifa.noviyanti22@gmail.com', '0895341535622'),
('0044605913', 'Naofal Azhari', 'XII TKJ A', 'Laki-Laki', 'naofal.azh@gmail.com', '082290196797'),
('0044613487', 'Yoga Maulana', 'XII TKJ A', 'Laki-Laki', 'prime.user81@gmail.com', '081917016402'),
('0044648003', 'Adam Muhammad Nur', 'XI TKJ A', 'Laki-Laki', 'adamalways01@gmail.com', '081250854685'),
('0044664730', 'Audio alif rahman', 'XI TKJ A', 'Laki-Laki', 'audioalifrahman@gmail.com', '083152523825'),
('0044866980', 'Ajeng Julia Maulanie', 'XI TKJ B', 'Perempuan', 'ajengjulia292004@gmail.com', '087846918741'),
('0044953751', 'Nanda Sari Syafitri', 'XII TKJ B', 'Perempuan', 'nandasarisyafitri@gmail.com', '083142111249'),
('0045335892', 'Muhammad Rizki Haliim Maulani', 'XII TKJ A', 'Laki-Laki', 'rizkihaliimmaulani@gmail.com', '081250430912'),
('0045371071', 'Aditya Dwi Kurniawan', 'XII TKJ B', 'Laki-Laki', 'adityadwikurniawan587@gmail.com', '088246921608'),
('0045632915', 'Arios Gionaldi', 'XII TKJ A', 'Laki-Laki', 'ariosgionaldi2004@gmail.com', '089509980549'),
('0045648092', 'Nur Indah Puspita Dewi', 'XII TKJ A', 'Perempuan', 'puspitadewi14985@gmail.com', '083146851205'),
('0045719976', 'Kamelia Athiyah Rahmah', 'XII TKJ B', 'Perempuan', 'rahmahkamelia64@gmail.com', '087812354197'),
('0045893417', 'Bagus Widia Pratama', 'XII TKJ A', 'Laki-Laki', 'bagusbjm46@gmail.com', '087816981986'),
('0046043183', 'Aghnatasya Goeyvani', 'XI TKJ B', 'Perempuan', 'aghnatasyag@gmail.com', '083141887336'),
('0046476562', 'Adis Auradita', 'XI TKJ B', 'Perempuan', 'adisauradita@gmail.com', '085251979959'),
('0046584497', 'Novaryanur Ramadhani', 'XI TKJ B', 'Laki-Laki', 'muhammadkhafiy4@gmail.com', '0895401636803'),
('0046664667', 'Cinta Dewi Maharani Wahidi', 'XII TKJ B', 'Perempuan', 'cintawahidi31@gmail.com', '081521738056'),
('0046672264', 'Alfrianus Saleh Silambi', 'XII TKJ A', 'Laki-Laki', 'alfrianus.net@gmail.com', '087742068656'),
('0046679180', 'Muhammad Alvin Wardhana', 'XI TKJ B', 'Laki-Laki', 'muhammadainulyaqinxd@gmail.com', '08875937438'),
('0046780779', 'Muhammad Andi Rahman', 'XI TKJ A', 'Laki-Laki', 'akbaransori61@gmail.com', '082252274240'),
('0046781047', 'Mochammad Wahyu Nugroho', 'XII TKJ A', 'Laki-Laki', 'mwahyun03@gmail.com', '087887893813'),
('0046797689', 'Peri Nurjaman', 'XI TKJ A', 'Laki-Laki', 'nurzamanferi04@gmail.com', '081320688950'),
('0047146994', 'Muhammad Luthfya Reza', 'XII TKJ A', 'Laki-Laki', 'luthfyareza12@gmail.com', '082288164056'),
('0047221303', 'Thia Ramadhani', 'XI TKJ B', 'Perempuan', 'thiaramadhani@gmail.com', '082149581583'),
('0047290500', 'Muhammad Khaidir Mustafa', 'XII TKJ B', 'Laki-Laki', 'khaidir2408@gmail.com', '085718264856'),
('0047296571', 'Anhar Diantha Prambudy', 'XII TKJ B', 'Laki-Laki', 'pramboedy123@gmail.com', '088804108957'),
('0047608214', 'Dani Apriliyanto', 'XI TKJ A', 'Laki-Laki', 'gcdani377@gmail.com', '0895339839055'),
('0047761382', 'Nirmala Jum\'ah', 'XII TKJ A', 'Perempuan', 'jumahnirmala@gmail.com', '087744479478'),
('0048203662', 'Fikri Rahman', 'X TJKT B', 'Laki-Laki', 'fikrirahman221@gmail.com', '083141357421'),
('0048308204', 'Muhammad Wahyu Rifaldi', 'XII TKJ A', 'Laki-Laki', 'if2hlatifah926@gmail.com', '081998003200'),
('0048972470', 'Fadhel Attaya Akbar', 'XII TKJ B', 'Laki-Laki', 'fadhelattaya42@gmail.com', '0895634704370'),
('0049172857', 'M. Try Eriyanto', 'XI TKJ A', 'Laki-Laki', 'muhammadcakdimas12@gmail.com', '083841078171'),
('0049210134', 'Sarah Noor Sapitri', 'XII TKJ B', 'Perempuan', 'sarah7977977@gmail.com', '085751317791'),
('0049472166', 'Digita Arvianda Cahyani', 'XII TKJ B', 'Perempuan', 'digita2503@gmail.com', '082252296160'),
('0049503095', 'Wulandari', 'XI TKJ B', 'Perempuan', 'wulandari213b@gmail.com', '082351833169'),
('0049589515', 'Nanda Aulia Putri', 'XII TKJ B', 'Perempuan', 'nandaauliaputri2406@gmail.com', '088242804110'),
('0049599620', 'Muhammad Fajri Nabyl', 'XII TKJ B', 'Laki-Laki', 'muhammaddfajrinabyl07@gmail.com', '088245039030'),
('0049705396', 'Wahyu Eko Purnomo', 'XI TKJ B', 'Laki-Laki', 'wahyueko.p0206@gmail.com', '085387790021'),
('0049939734', 'Sendi Pratama', 'XII TKJ B', 'Laki-Laki', 'sendipratama302@gmail.com', '087817640992'),
('0050870287', 'M. Islam Rizqi Akbar', 'XI TKJ A', 'Laki-Laki', 'rizkiakbarrr8@gmail.com', '085974710182'),
('0050891574', 'Ahmad Nawawi', 'X TJKT B', 'Laki-Laki', 'a.nawawi082@gmail.com', '0895700439228'),
('0050938056', 'Dina Maulida', 'XI TKJ B', 'Perempuan', 'dinamaulida2109@gmail.com', '081910786517'),
('0050938927', 'Nur Ikhsan Cleviriadi', 'XI TKJ A', 'Laki-Laki', 'ikhsanvopas@gmail.com', '087716437728'),
('0051015861', 'Yogi Aditya Narotama', 'XI TKJ B', 'Laki-Laki', 'yogiadityanarotama@gmail.com', '081345438508'),
('0051046563', 'Rahmatullah', 'X TJKT B', 'Laki-Laki', 'Rahmatullahbjb47@gmail.com', '085933816144'),
('0051271615', 'Akhmad Irfan Syaputra', 'XII TKJ B', 'Laki-Laki', 'irfansyaputra850@gmail.com', '088804384992'),
('0051300820', 'Ahmad Zidan', 'X TJKT B', 'Laki-Laki', 'ahmadzidan201105@gmail.com', '081250430924'),
('0051327024', 'Siti Julaiha', 'XI TKJ B', 'Perempuan', 'siti.julaiha.apps@gmail.com', '0895340867363'),
('0051381310', 'Ahmad Faisal Rahman', 'X TJKT B', 'Laki-Laki', 'faisalrahman.faisalrahman.6617@gmail', '083141000182'),
('0051446775', 'Asyifa Qhonita Auliya Seha', 'X TJKT A', 'Perempuan', 'nurlailaratnaseha@gmail.com', '0882019336208'),
('0051532937', 'Melisa Agustina', 'X TJKT A', 'Perempuan', 'Agustinamelisa039@gmail.com', '082151599645'),
('0051719768', 'Febio Earmando', 'XI TKJ A', 'Laki-Laki', 'febioearmando232@gmail.com', '085754273010'),
('0051771026', 'Raditya Alma Kamal Kautsar', 'XI TKJ A', 'Laki-Laki', 'radityaadit30@gmail.com', '085390619756'),
('0051826159', 'Muhammad Tamirul Umam', 'X TJKT A', 'Laki-Laki', 'Mtumam2005@gmail.com', '0819444472913'),
('0051860547', 'Rika Marsela', 'XI TKJ B', 'Perempuan', 'rikamarsela51@gmail.com', '087876625541'),
('0051891410', 'Muhammad Dimas Saputra', 'XI TKJ A', 'Laki-Laki', 'andi.rahman.31dh@gmail.com', '087850146936'),
('0052266201', 'Enggal Setiawan', 'X TJKT B', 'Laki-Laki', 'enggalsetiawan02@gmail.com', '085750844900'),
('0052392765', 'Muhammad Romadhoni Panca Octa', 'X TJKT A', 'Laki-Laki', 'Pancaiklas7@gmail.com', '0895340557833'),
('0052401149', 'Muhammad Abi Arizky', 'X TJKT A', 'Laki-Laki', 'arizkyabi@gmail.com', '083141646718'),
('0052803975', 'Muhammad Naufal', 'XI TKJ A', 'Laki-Laki', 'muh4mm4dn4uf4l@gmail.com', '081256316399'),
('0052992618', 'Muhammad Luthfi Noor', 'X TJKT A', 'Laki-Laki', 'muhammadluthfinoor@gmail.com', '08115163549'),
('0053156309', 'Muhamad Akbar Ansori', 'XI TKJ A', 'Laki-Laki', 'melkyboy781@gmail.com', '082151413938'),
('0053265460', 'Bima Arya Sena', 'XI TKJ B', 'Laki-Laki', 'bimaaryasena7@gmail.com', '087848497766'),
('0053541494', 'Octovia Ayu Pusparani', 'X TJKT B', 'Perempuan', 'octoviapusparani@gmail.com', '081256506701'),
('0054196715', 'Hamita Nur Syifa', 'XI TKJ B', 'Perempuan', 'hamitanursyifa0114@gmail.com', '08971838465'),
('0054242766', 'Siti Nur Aida', 'XI TKJ B', 'Perempuan', 'aida080905@gmail.com', '08170803161'),
('0054340609', 'Nadia Nadifha', 'XI TKJ B', 'Perempuan', 'nadifhanadia@gmail.com', '082154010658'),
('0054360722', 'David Alonso Napitupulu', 'X TJKT A', 'Laki-Laki', 'da6374804@gmail.com', '085932982106'),
('0054363633', 'Akhmad Rizwar Afdhal', 'X TJKT A', 'Laki-Laki', 'akhmadrizwarafdhal@gmail.com', '0895339565286'),
('0054482332', 'Muhammad Rifqi Jaya', 'XI TKJ A', 'Laki-Laki', 'ikiikijayaberjaya@gmail.com', '081250431002'),
('0054561143', 'Ahmad Nazzarudin Fahri', 'XI TKJ A', 'Laki-Laki', 'fahrimucai@gmail.com', '082157444352'),
('0054575032', 'Azharuddin', 'XI TKJ B', 'Laki-Laki', 'unstoppbleazhar@gmail.com', '085752670415'),
('0054634798', 'Okta Rahmayesi', 'XI TKJ A', 'Perempuan', 'oktayesi630@gmail.com', '081521798169'),
('0054735544', 'Ahmad Kurni', 'XI TKJ A', 'Laki-Laki', 'dhenkurnikw@gmail.com', '085751345297'),
('0055123069', 'Marcfiliadi Ezra Nugroho', 'XI TKJ B', 'Laki-Laki', 'reynaldi191818@gmail.com', '085348780800'),
('0055173743', 'Ghina Rania', 'XI TKJ A', 'Perempuan', 'ghinaran25@gmail.com', '085389371126'),
('0055216953', 'Ahmad Nauval Ridho', 'XI TKJ B', 'Laki-Laki', 'serahmu4@gmail.com', '082158940371'),
('0055248036', 'Hairun Nisya Latifah', 'X TJKT B', 'Perempuan', 'latifahhairunnisya9@gmail.com', '085787344727'),
('0055472362', 'Silvia Eka Dewi', 'XI TKJ B', 'Perempuan', 'silvia992005@gmail.com', '081649147795'),
('0056089781', 'Lusiana Gina Anita', 'X TJKT A', 'Perempuan', 'lucianaginna@gmail.com', '082252212292'),
('0056162330', 'Adentiarno Al Madani', 'XI TKJ A', 'Laki-Laki', 'adentiarno023@gmail.com', '083159332780'),
('0056172478', 'Anggela F. Syaloomitha Taek', 'XI TKJ B', 'Perempuan', 'angelafelayni@gmail.com', '085705854137'),
('0056369485', 'Deffa Rijantha Saputra Zain', 'XI TKJ A', 'Laki-Laki', 'deffa.rijantha02@gmail.com', '085821873368'),
('0056393280', 'Eko Setyo Budiyanto', 'XI TKJ A', 'Laki-Laki', 'eko.budiprasetiyo19@gmail.com', '081528668117'),
('0056445840', 'Muhammad Risqan Anwari', 'XI TKJ A', 'Laki-Laki', 'riskanjr99@gmail.com', '081254242584'),
('0056707507', 'Ziad Sultan Rafi', 'XI TKJ B', 'Laki-Laki', 'sultanrafi238@gmail.com', '089692562998'),
('0056841102', 'Arya Lugas Weda Wijaya', 'XI TKJ A', 'Laki-Laki', 'aryalugas17@gmail.com', '083141599258'),
('0057059952', 'Muhammad Ainul Yaqin', 'XI TKJ B', 'Laki-Laki', 'marcfiliadiezra@gmail.com', '08981373831'),
('0057512122', 'Rahmatullah Arrizky', 'XI TKJ A', 'Laki-Laki', 'arrizrizky@gmail.com', '088245659372'),
('0057588402', 'Rizky Wahyu Wibowo', 'XI TKJ A', 'Laki-Laki', 'riyuw00@gmail.com', '085849919780'),
('0057675815', 'Ahmad Hafiz Zulkarnain', 'X TJKT A', 'Laki-Laki', 'Lolhafiznoob@gmail.com', '081351987454'),
('0058042061', 'Irky Ardyansyah', 'X TJKT A', 'Laki-Laki', 'irkyardyansyah1922@gmail.com', '085600955128'),
('0058193214', 'Ahmad Maulana', 'XI TKJ B', 'Laki-Laki', 'ahmlmaulana00@gmail.com', '087762451304'),
('0058297774', 'Dewi Chusnatunisa', 'XI TKJ B', 'Perempuan', 'dwcsntns@gmail.com', '081952687608'),
('0058728104', 'Maulana Rahman', 'XI TKJ A', 'Laki-Laki', 'eriyantox102@gmail.com', '083841078185'),
('0058755290', 'Rizka Aulia', 'XI TKJ B', 'Perempuan', 'rizkaaulia2201@gmail.com', '082157030245'),
('0058946809', 'Dhea Arimbi Almalita', 'X TJKT A', 'Perempuan', 'arimbidhea3@gmail.com', '081285762397'),
('0059195122', 'Muhammad Hendryan Raffi', 'XI TKJ A', 'Laki-Laki', '0mhmmd.rafi0@gmail.com', '082151961651'),
('0059203834', 'Muhammad Reynaldi Dwi Saputra', 'XI TKJ B', 'Laki-Laki', 'mhmmdwrdhna@gmail.com', '081250430983'),
('0059289753', 'Ibnu Rahman. B', 'XII TKJ B', 'Laki-Laki', '2019tkjb4933@smkn2banjarbaru.sch.id', '081521787988'),
('0059335118', 'Muhammad fakhril huznan', 'XI TKJ A', 'Laki-Laki', 'fahrilhusnan005@gmail.com', '083159381133'),
('0059373073', 'Nazmania', 'X TJKT B', 'Perempuan', 'nazmania1234@gmail.com', '088290183979'),
('0059488150', 'Siti Maisarah', 'X TJKT B', 'Perempuan', 'sitimaisrh17@gmail.com', '085787467907'),
('0059499978', 'Habibie \'Atha Zakky', 'XI TKJ B', 'Laki-Laki', 'zakkyhabibie@gmail.com', '085751901208'),
('0059735689', 'Aprilla Alva Rifki', 'XI TKJ A', 'Laki-Laki', 'ila.ar20@gmail.com', '081521795187'),
('0059744059', 'Gusvita Maharani', 'X TJKT B', 'Perempuan', 'Adhehildanirwana@gmail.com', '081250431102'),
('0059776274', 'Rafi Ahnaf Firdaus', 'XI TKJ B', 'Laki-Laki', 'rafi.ahnaf05@gmail.com', '082350170822'),
('0061237810', 'Muhammad Adhiyat Rahmanadie', 'X TJKT B', 'Laki-Laki', 'muhammadadhiyatrahmanadie@gmail.com', '082159010106'),
('0061358173', 'Muhammad Faisal', 'X TJKT B', 'Laki-Laki', 'mfaisalfaisal042@gmail.com', '087832235868'),
('0061617407', 'Surya Saputra', 'X TJKT B', 'Laki-Laki', 'suryadwisaputra84@gmail.com', '085654220021'),
('0061818136', 'Rosi Sukma Pratiwi', 'X TJKT B', 'Perempuan', 'rosisukmapratiwi069@gmail.com', '087800238791'),
('0062067217', 'Muhammad Nauval Nuruzzaini', 'X TJKT A', 'Laki-Laki', 'boneknoval91@gmail.com', '085654848775'),
('0062189479', 'Novrieza Rizki Fadillah', 'X TJKT A', 'Laki-Laki', 'noveza5@gmail.com', '083159476733'),
('0062457744', 'Melky', 'XI TKJ A', 'Laki-Laki', 'mr5730460@gmail.com', '083159371223'),
('0062755840', 'Dylan Ammar Ori Axniva', 'X TJKT A', 'Laki-Laki', 'dylanammar1512@gmail.com', '089692115142'),
('0063016438', 'Gadis Tita Nadina', 'X TJKT B', 'Perempuan', 'gadistitanadina@gmail.com', '081936761616'),
('0063077166', 'Syeriel Azzahra Rizky', 'X TJKT B', 'Perempuan', 'syerilazr25@gmail.com', '085849939952'),
('0063087187', 'Mutia Nanda', 'X TJKT A', 'Perempuan', 'nmutia103@gmail.com', '083162319034'),
('0063111260', 'Fatiekhu Muhamad Andika', 'X TJKT B', 'Laki-Laki', 'muhamadfatiekhu@gmail.con', '081528435248'),
('0063184253', 'Daffa Dziiba\'an Khoiri', 'X TJKT B', 'Laki-Laki', 'dziiba\'an.khoiri@gmail.com', '083152012329'),
('0063216640', 'Lintang Aji Saka', 'X TJKT A', 'Laki-Laki', 'lintangajisaka517@gmail.com', '083146858026'),
('0063254474', 'Ade Yoga Aditama Putra', 'X TJKT A', 'Laki-Laki', 'paptt798@gmail.com', '085156190806'),
('0063490464', 'Hector Janu Pangestu', 'X TJKT A', 'Laki-Laki', 'rosianarahmah0303@gmail.com', '085348099410'),
('0063717874', 'Putri Yuwanda', 'X TJKT A', 'Perempuan', 'iyuwanda@gmail.com', '087892328874'),
('0063774213', 'Irally Merindra', 'X TJKT B', 'Perempuan', 'imerindra@gmail.com', '085389773031'),
('0063875396', 'Ajahra Saupa', 'X TJKT B', 'Perempuan', 'ovacantik2006@gmail.com', '083152475519'),
('0063995534', 'Ahmad Afrizal Rahman', 'X TJKT B', 'Laki-Laki', 'bengkak099@gmail.com', '082255762102'),
('0064242615', 'Musyaffa Kemal Pasha', 'X TJKT A', 'Laki-Laki', 'Musyaffakemal2@gmail.com', '0895354386729'),
('0064449128', 'Muhammad Kusuma', 'X TJKT B', 'Laki-Laki', 'mokusuma06@gmail.com', '081243821141'),
('0064484214', 'Muhammad Yoga Pratama', 'X TJKT B', 'Laki-Laki', 'muhammadyogapratama1603@gmail.com', '081545082108'),
('0064510857', 'Rosinanda Kyato', 'X TJKT B', 'Perempuan', 'rsndn.kyato26@gmail.com', '081345663299'),
('0064772275', 'Muhammad Bintang', 'X TJKT A', 'Laki-Laki', 'muhammadbint23@gmail.com', '082158880255'),
('0065463732', 'Oksi Fitria Hawini', 'X TJKT A', 'Perempuan', 'oksihawini@gmail.com', '081250431140'),
('0065590106', 'Rina Nuraini', 'X TJKT B', 'Perempuan', 'rinanuraini.net@email.com', '083141012892'),
('0065830230', 'Nanda D\'alexandro', 'X TJKT B', 'Laki-Laki', 'nandacr17@gmail.com', '083841943427'),
('0066031955', 'Zeta Atmajaya Akhdan', 'X TJKT A', 'Laki-Laki', 'zeta.akhdan06@gmail.com', '085346902940'),
('0066081094', 'Veronika Putri Rosari', 'X TJKT A', 'Perempuan', 'veronicarosariii@gmail.com', '085754572903'),
('0066445240', 'David Adzana Yoga Pratama', 'X TJKT B', 'Laki-Laki', 'DavidAdzanaYogaPratama@gmail.com', '083844872355'),
('0066536340', 'Gusti Muhammad Maulana Zakirin', 'X TJKT B', 'Laki-Laki', 'zakichen1226@gmail.com', '089501255110'),
('0067011241', 'M. Saddam Henry Sukardi', 'X TJKT B', 'Laki-Laki', 'Henrysaddam@gmail.com', '082158690163'),
('0067029464', 'Dena Erinda Anta Negara', 'X TJKT A', 'Perempuan', 'denaerinda@gmail.com', '083151808174'),
('0067091338', 'Siti Nasywa Pratiwi', 'X TJKT B', 'Perempuan', '', '081250430944'),
('0067458148', 'Ibnu Aji Perdana', 'X TJKT B', 'Laki-Laki', 'ajiperdana019@gmail.com', '081952522387'),
('0067533752', 'Muhammad Maulana Azhar', 'X TJKT A', 'Laki-Laki', 'maulana.azhar300@gmail.com', '083140462568'),
('0068018752', 'Muhammad Lutfi', 'X TJKT B', 'Laki-Laki', 'banjarbarulutfi@gmail.com', '089692040210'),
('0068266787', 'Failasufa Irawan', 'X TJKT A', 'Laki-Laki', 'failasufa19@gmail.com', '087773229502'),
('0068609232', 'Ulfa Syifa Saputri', 'X TJKT A', 'Perempuan', 'ibnu62825@gmail.com', '082149306060'),
('0068715851', 'Nadia Aulia', 'X TJKT A', 'Perempuan', 'nadiaaulia.net@gmail.com', '081250431038'),
('0069260268', 'Muhammad Yusuf Habibie', 'X TJKT A', 'Laki-Laki', 'salltutorial@gmail.com', '082152128446'),
('0069923233', 'Ahmad Zulqarnain Nk', 'X TJKT B', 'Laki-Laki', 'ahmadzulqarnain998@gmail.com', '083141928249'),
('0077707512', 'Zahra Andina', 'X TJKT A', 'Perempuan', 'zhrandna@gmail.com', '085752122806'),
('3043579818', 'M.Azhar Arya Hafidz', 'XI TKJ A', 'Laki-Laki', 'kuuhaku3234@gmail.com', '082354738949');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `nama_barang` (`kode_barang`),
  ADD KEY `nama_siswa` (`nisn`),
  ADD KEY `nama_guru` (`nik`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_peminjaman`
--
ALTER TABLE `tb_peminjaman`
  ADD CONSTRAINT `tb_peminjaman_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_guru` (`nik`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `tb_siswa` (`nisn`),
  ADD CONSTRAINT `tb_peminjaman_ibfk_3` FOREIGN KEY (`kode_barang`) REFERENCES `tb_barang` (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
