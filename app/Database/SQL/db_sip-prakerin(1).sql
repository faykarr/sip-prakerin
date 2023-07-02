-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 09:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sip-prakerin`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-06-07-162922', 'App\\Database\\Migrations\\UserTable', 'default', 'App', 1688324114, 1),
(2, '2023-06-25-155242', 'App\\Database\\Migrations\\SMKTable', 'default', 'App', 1688324114, 1),
(3, '2023-07-02-090554', 'App\\Database\\Migrations\\PrakerinTable', 'default', 'App', 1688324114, 1),
(4, '2023-07-02-180332', 'App\\Database\\Migrations\\AsistenTable', 'default', 'App', 1688324114, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_asisten`
--

CREATE TABLE `tb_asisten` (
  `id_asisten` int(11) NOT NULL,
  `nama_asisten` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_asisten`
--

INSERT INTO `tb_asisten` (`id_asisten`, `nama_asisten`, `nim`, `no_hp`, `email`, `alamat`, `jabatan`, `id_user`, `status`) VALUES
(1, 'Mariadi Mulyanto Natsir', '222910839', '(+62) 433 9559 183', 'sadina86@suartini.or.id', 'Jr. Ciwastra No. 998, Ambon 21292, Aceh', 'Penyiar Radio', 5, 'Tidak Aktif'),
(2, 'Michelle Nasyiah', '141681721', '0402 6252 1667', 'fpudjiastuti@suartini.sch.id', 'Dk. Tambun No. 214, Pariaman 74658, Bengkulu', 'Karyawan BUMD', 10, 'Tidak Aktif'),
(3, 'Jono Baktiono Suwarno', '123576012', '(+62) 974 4901 9245', 'winarsih.himawan@firmansyah.web.id', 'Jr. Madiun No. 436, Batam 74761, Sultra', 'Pramusaji', 7, 'Tidak Aktif'),
(4, 'Hendra Anggriawan', '488817913', '0714 2540 401', 'vwijaya@prakasa.info', 'Gg. Baladewa No. 262, Cilegon 84044, Sulsel', 'Pedagang', 7, 'Aktif'),
(5, 'Hilda Kuswandari', '984646306', '(+62) 833 4013 854', 'xwahyudin@yahoo.com', 'Kpg. Kebonjati No. 747, Payakumbuh 75536, Kaltim', 'Petani / Pekebun', 5, 'Aktif'),
(6, 'Agus Hutapea', '688629363', '0918 3209 8877', 'xmardhiyah@gmail.com', 'Gg. Katamso No. 565, Pasuruan 58887, Kepri', 'Tukang Kayu', 7, 'Aktif'),
(7, 'Shakila Anastasia Usamah S.I.Kom', '104217341', '020 5955 914', 'prakasa.nasab@waskita.co', 'Ds. Agus Salim No. 930, Samarinda 38036, Sultra', 'Petani / Pekebun', 2, 'Aktif'),
(8, 'Azalea Cinthia Kusmawati', '122606946', '(+62) 516 2403 1780', 'ana42@hastuti.info', 'Jln. Basuki No. 40, Langsa 81275, Sumut', 'Pilot', 5, 'Aktif'),
(9, 'Ibun Prayoga M.Kom.', '490277649', '(+62) 916 7021 484', 'ilaksmiwati@pratiwi.or.id', 'Gg. Gatot Subroto No. 44, Metro 34352, Jateng', 'Pengacara', 4, 'Aktif'),
(10, 'Alambana Lukita Mahendra', '205017321', '0403 1586 609', 'talia18@tarihoran.in', 'Dk. K.H. Maskur No. 889, Bima 67161, Jabar', 'Tentara Nasional Indonesia (TNI)', 5, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prakerin`
--

CREATE TABLE `tb_prakerin` (
  `id_prakerin` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `npsn` int(8) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL DEFAULT 'Laki-laki',
  `alamat_siswa` varchar(100) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `no_hp_siswa` varchar(15) NOT NULL,
  `tahun_ajaran` varchar(25) NOT NULL,
  `nama_orang_tua` varchar(100) NOT NULL,
  `no_hp_orang_tua` varchar(15) NOT NULL,
  `periode_awal` date NOT NULL,
  `periode_akhir` date NOT NULL,
  `status_prakerin` enum('Aktif','Pencabutan') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_prakerin`
--

INSERT INTO `tb_prakerin` (`id_prakerin`, `nisn`, `npsn`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_siswa`, `kelas`, `jurusan`, `no_hp_siswa`, `tahun_ajaran`, `nama_orang_tua`, `no_hp_orang_tua`, `periode_awal`, `periode_akhir`, `status_prakerin`) VALUES
(1, 33110117, 57559218, 'Gasti Rahimah S.Gz', 'Pariaman', '1986-09-07', 'Laki-laki', 'Jr. Kebangkitan Nasional No. 76, Prabumulih 87519, Gorontalo', 'XII', 'RPL', '69693864', '2019/2020', 'Iriana Hilda Mayasari', '44899358', '2012-06-05', '1989-06-25', 'Pencabutan'),
(2, 22759747, 31017947, 'Iriana Zahra Mulyani', 'Solok', '1985-10-14', 'Perempuan', 'Ki. M.T. Haryono No. 822, Cirebon 80302, Gorontalo', 'XI', 'RPL', '58446109', '2018/2019', 'Balangga Anggriawan', '55118344', '2018-12-10', '1986-07-16', 'Pencabutan'),
(3, 12389101, 41321545, 'Yahya Tampubolon', 'Surakarta', '2007-01-05', 'Laki-laki', 'Jln. Moch. Ramdan No. 663, Bogor 17257, NTT', 'XII', 'TKJ', '57539718', '2018/2019', 'Dewi Purnawati', '20338433', '2000-02-09', '2021-12-28', 'Pencabutan'),
(4, 9632022, 57559218, 'Jaswadi Waluyo', 'Jambi', '2003-05-26', 'Perempuan', 'Kpg. Flores No. 498, Bukittinggi 36386, Sumut', 'X', 'BC', '24420065', '2020/2021', 'Nyoman Sihotang', '76275561', '1977-07-22', '2005-05-15', 'Aktif'),
(5, 83292195, 45959899, 'Zelda Salwa Mandasari S.IP', 'Tangerang', '1981-04-05', 'Laki-laki', 'Jln. Kali No. 459, Bandar Lampung 76402, Jatim', 'XII', 'MM', '46195691', '2021/2022', 'Cakrajiya Hidayanto M.Pd', '91014084', '1980-09-14', '1974-06-16', 'Aktif'),
(6, 22305221, 41321545, 'Laksana Megantara', 'Padangpanjang', '1992-06-13', 'Laki-laki', 'Gg. Sutarjo No. 734, Palangka Raya 78179, Bengkulu', 'XI', 'MM', '35672902', '2021/2022', 'Tasnim Bakda Napitupulu S.Kom', '47282502', '2010-03-24', '2015-08-17', 'Aktif'),
(7, 35191161, 45959899, 'Intan Winarsih', 'Administrasi Jakarta Selatan', '2010-07-26', 'Perempuan', 'Dk. Bambu No. 516, Tual 83459, Sumbar', 'X', 'RPL', '96043425', '2019/2020', 'Makara Manullang', '30380292', '1979-10-05', '1982-02-26', 'Aktif'),
(8, 78661037, 72072852, 'Vivi Rahayu', 'Kupang', '1976-05-15', 'Perempuan', 'Kpg. Teuku Umar No. 573, Bengkulu 44892, Bali', 'X', 'BC', '74094308', '2019/2020', 'Dasa Maryadi', '85109039', '2003-08-16', '1986-09-22', 'Pencabutan'),
(9, 92796572, 57559218, 'Caket Pangestu Kusumo S.H.', 'Tanjung Pinang', '1988-12-18', 'Laki-laki', 'Kpg. Bambon No. 431, Sungai Penuh 92304, Aceh', 'XII', 'MM', '95885554', '2018/2019', 'Ghaliyati Laksmiwati', '18447935', '2018-09-07', '1980-04-14', 'Pencabutan'),
(10, 16077777, 91129813, 'Dinda Lala Lestari', 'Manado', '1971-11-18', 'Laki-laki', 'Gg. Otto No. 723, Bitung 20979, Riau', 'X', 'BC', '86035018', '2019/2020', 'Nilam Farhunnisa Anggraini', '92750153', '1974-09-28', '1977-05-28', 'Pencabutan'),
(11, 80025319, 45959899, 'Martani Rajasa M.Ak', 'Tebing Tinggi', '2010-03-09', 'Laki-laki', 'Gg. Ciumbuleuit No. 110, Cilegon 86402, Riau', 'XII', 'MM', '30928469', '2020/2021', 'Karen Anggraini', '93506415', '1988-09-08', '2018-01-16', 'Pencabutan'),
(12, 50048554, 48893899, 'Hadi Kayun Anggriawan', 'Manado', '1995-12-24', 'Perempuan', 'Kpg. Ahmad Dahlan No. 489, Denpasar 62610, Sulut', 'X', 'RPL', '83994553', '2021/2022', 'Martaka Luwes Narpati', '28272595', '2006-07-11', '1983-04-24', 'Aktif'),
(13, 37007874, 31017947, 'Cinthia Handayani S.Kom', 'Cilegon', '1986-11-17', 'Perempuan', 'Ki. Baiduri No. 609, Tangerang Selatan 28079, NTB', 'XI', 'MM', '70722680', '2019/2020', 'Rachel Azalea Riyanti', '69925680', '1972-09-09', '1976-08-01', 'Aktif'),
(14, 12064041, 48893899, 'Wahyu Tamba', 'Pagar Alam', '1998-01-13', 'Laki-laki', 'Jln. Sutarto No. 551, Padang 99062, Babel', 'XI', 'BC', '73425798', '2021/2022', 'Asmuni Natsir', '15886641', '2017-09-23', '2018-09-10', 'Pencabutan'),
(15, 71332880, 41321545, 'Hamima Haryanti', 'Sawahlunto', '1999-01-01', 'Laki-laki', 'Psr. Ujung No. 556, Bitung 23842, Sulbar', 'XI', 'TKJ', '69127643', '2020/2021', 'Fitria Yulianti', '34166629', '2003-01-10', '1999-02-07', 'Aktif'),
(16, 16749256, 41321545, 'Cecep Prasasta M.Pd', 'Pontianak', '2012-06-01', 'Perempuan', 'Ki. Lembong No. 651, Administrasi Jakarta Utara 13163, Jabar', 'XI', 'MM', '30462879', '2020/2021', 'Lalita Pratiwi', '26235046', '2001-09-15', '2018-11-09', 'Pencabutan'),
(17, 1954311, 67199014, 'Hamima Mardhiyah S.T.', 'Semarang', '1993-06-16', 'Laki-laki', 'Psr. Antapani Lama No. 977, Bandar Lampung 50551, Banten', 'XII', 'TKJ', '24605840', '2020/2021', 'Rahmi Paulin Kuswandari S.Farm', '94446717', '2023-02-23', '2009-12-25', 'Aktif'),
(18, 40048375, 67199014, 'Bakianto Rafi Permadi M.Farm', 'Kediri', '2011-09-18', 'Laki-laki', 'Dk. Banal No. 432, Serang 25504, Malut', 'XII', 'TKJ', '79855704', '2018/2019', 'Pardi Nalar Mahendra M.Farm', '28017818', '2001-12-19', '1988-04-10', 'Pencabutan'),
(19, 96710434, 91129813, 'Naradi Sirait', 'Tomohon', '2000-11-13', 'Laki-laki', 'Psr. Bank Dagang Negara No. 209, Malang 83076, Kalbar', 'XI', 'MM', '16310387', '2020/2021', 'Harja Halim', '88302016', '2014-11-25', '1994-01-13', 'Aktif'),
(20, 63543689, 72072852, 'Maimunah Wulandari', 'Bandung', '2006-10-14', 'Perempuan', 'Dk. Yos No. 603, Langsa 21805, Kaltara', 'X', 'TKJ', '11922681', '2018/2019', 'Gamblang Galuh Wibisono', '86876305', '1972-11-01', '1973-10-03', 'Aktif'),
(21, 67903535, 48893899, 'Halima Yulianti M.Kom.', 'Manado', '1983-03-16', 'Perempuan', 'Psr. Dr. Junjunan No. 665, Bengkulu 84112, Sumsel', 'X', 'RPL', '38955308', '2019/2020', 'Darsirah Maulana', '55953968', '2022-12-04', '1997-06-03', 'Aktif'),
(22, 28989002, 45959899, 'Bala Saptono', 'Kotamobagu', '1989-02-17', 'Perempuan', 'Psr. Monginsidi No. 737, Gunungsitoli 10798, Sulbar', 'X', 'TKJ', '67301540', '2019/2020', 'Rika Suryatmi M.Pd', '37455092', '2022-01-20', '2010-07-28', 'Aktif'),
(23, 63723223, 72072852, 'Karsa Ardianto M.Pd', 'Solok', '1971-07-19', 'Laki-laki', 'Gg. Eka No. 137, Balikpapan 33757, Sultra', 'XI', 'TKJ', '12960559', '2019/2020', 'Ana Kasiyah Laksita M.Farm', '79068387', '2006-04-18', '2020-01-21', 'Pencabutan'),
(24, 25245406, 25245406, 'Wadi Waluyo', 'Banjarmasin', '2010-01-06', 'Laki-laki', 'Ki. Bakau Griya Utama No. 530, Padang 83400, Malut', 'XII', 'TKJ', '54928045', '2021/2022', 'Muhammad Mustofa S.T.', '31539774', '2022-05-26', '1971-11-25', 'Aktif'),
(25, 16265466, 67199014, 'Gambira Pratama S.Pd', 'Palembang', '2016-07-10', 'Perempuan', 'Kpg. Pasir Koja No. 229, Payakumbuh 60122, Jabar', 'X', 'MM', '78824081', '2019/2020', 'Zalindra Oktaviani S.H.', '42206366', '2008-05-07', '2015-04-11', 'Pencabutan'),
(26, 98556869, 45959899, 'Cakrawangsa Dongoran', 'Mojokerto', '1993-03-18', 'Laki-laki', 'Kpg. Jend. A. Yani No. 504, Depok 54324, Pabar', 'XII', 'TKJ', '66322211', '2020/2021', 'Zelaya Laksita', '15083545', '1995-12-28', '1978-10-08', 'Pencabutan'),
(27, 77313183, 25245406, 'Hani Malika Susanti S.E.', 'Magelang', '1986-08-27', 'Perempuan', 'Gg. Abang No. 319, Tarakan 67277, Bengkulu', 'XII', 'TKJ', '75661565', '2020/2021', 'Capa Saragih', '45602187', '1973-01-18', '1992-10-22', 'Aktif'),
(28, 1346190, 31017947, 'Narji Mariadi Wasita M.Kom.', 'Cirebon', '1988-07-09', 'Perempuan', 'Psr. Basuki Rahmat  No. 104, Prabumulih 89702, DKI', 'XII', 'RPL', '67885167', '2019/2020', 'Ajeng Mayasari', '45002791', '1976-08-19', '2015-09-02', 'Pencabutan'),
(29, 93408992, 31017947, 'Jessica Nasyiah S.Kom', 'Malang', '1998-03-21', 'Laki-laki', 'Dk. Sudiarto No. 439, Pagar Alam 88219, Bengkulu', 'XI', 'MM', '64442109', '2021/2022', 'Eko Cemani Pangestu S.Pt', '52069191', '2009-10-06', '2019-04-17', 'Pencabutan'),
(30, 76277980, 25245406, 'Wani Astuti', 'Administrasi Jakarta Selatan', '1984-06-28', 'Laki-laki', 'Kpg. Eka No. 408, Solok 20002, Pabar', 'X', 'BC', '79933496', '2019/2020', 'Zahra Suartini M.Pd', '91772332', '2021-04-10', '1996-12-02', 'Aktif'),
(31, 42789218, 25245406, 'Maya Oliva Pudjiastuti', 'Tangerang Selatan', '1971-07-14', 'Laki-laki', 'Jln. Surapati No. 446, Tegal 33478, Sulut', 'X', 'RPL', '67543483', '2021/2022', 'Darmana Purwanto Adriansyah', '50277524', '1999-01-03', '1997-04-04', 'Pencabutan'),
(32, 40975618, 41321545, 'Hana Susanti', 'Cilegon', '1983-04-07', 'Laki-laki', 'Gg. Bara No. 870, Palangka Raya 69603, Kalbar', 'XII', 'TKJ', '85579149', '2020/2021', 'Restu Raisa Nasyidah S.H.', '97132186', '2010-01-21', '2019-06-22', 'Aktif'),
(33, 50116681, 67199014, 'Padma Pertiwi M.TI.', 'Samarinda', '1979-12-28', 'Laki-laki', 'Jln. Baan No. 830, Kediri 44286, Sulbar', 'XII', 'MM', '21499480', '2020/2021', 'Nasim Darijan Kuswoyo S.Farm', '69831838', '2023-06-12', '2016-07-15', 'Aktif'),
(34, 21290684, 25245406, 'Malika Tira Hartati S.H.', 'Kotamobagu', '2019-08-05', 'Laki-laki', 'Ki. Bayam No. 300, Langsa 53180, Lampung', 'XI', 'RPL', '45676735', '2018/2019', 'Unjani Maryati', '56560683', '1978-02-22', '1984-07-11', 'Pencabutan'),
(35, 31192556, 91129813, 'Rafid Hutagalung', 'Tebing Tinggi', '1992-02-07', 'Perempuan', 'Jr. Flora No. 355, Administrasi Jakarta Utara 84929, Papua', 'XII', 'TKJ', '96759143', '2018/2019', 'Citra Handayani', '42554804', '1997-06-12', '1989-11-29', 'Aktif'),
(36, 94355169, 31017947, 'Cakrawangsa Maheswara', 'Pontianak', '2004-09-14', 'Perempuan', 'Jr. Suniaraja No. 126, Prabumulih 89501, Bali', 'XI', 'BC', '51140493', '2019/2020', 'Limar Prasetya', '14975143', '2009-10-08', '1991-04-18', 'Aktif'),
(37, 30705225, 34703252, 'Olivia Purwanti S.E.', 'Probolinggo', '1975-01-31', 'Laki-laki', 'Gg. Madrasah No. 869, Tual 49082, Kalbar', 'XI', 'RPL', '59116155', '2019/2020', 'Drajat Saefullah', '82887471', '1989-06-28', '2011-07-27', 'Aktif'),
(38, 34553200, 45959899, 'Rahman Marbun', 'Administrasi Jakarta Timur', '1976-09-03', 'Perempuan', 'Ds. Setiabudhi No. 568, Bengkulu 73464, Jambi', 'X', 'TKJ', '81835341', '2020/2021', 'Kania Nuraini', '27832344', '1970-02-09', '2000-03-10', 'Aktif'),
(39, 8493839, 57559218, 'Ophelia Ophelia Wahyuni S.E.', 'Bogor', '2011-12-24', 'Perempuan', 'Psr. Achmad No. 352, Banjarmasin 72825, Sulteng', 'XII', 'TKJ', '86353599', '2019/2020', 'Kezia Paramita Yolanda', '42707806', '1974-02-01', '2020-01-27', 'Pencabutan'),
(40, 95346358, 45959899, 'Aditya Pranowo', 'Palopo', '1974-11-07', 'Perempuan', 'Dk. Baja Raya No. 189, Cimahi 55162, Malut', 'X', 'BC', '87618274', '2021/2022', 'Latif Tarihoran', '77230977', '2005-07-30', '2006-12-14', 'Aktif'),
(41, 41252974, 31017947, 'Ifa Sarah Sudiati S.E.I', 'Pariaman', '2013-12-25', 'Perempuan', 'Gg. Eka No. 555, Pematangsiantar 60396, Lampung', 'XI', 'BC', '22693326', '2020/2021', 'Safina Maya Mandasari S.Pd', '69759246', '1996-06-01', '1975-02-28', 'Aktif'),
(42, 15072062, 41321545, 'Yani Suryatmi', 'Mataram', '1989-08-30', 'Perempuan', 'Jr. Basoka Raya No. 985, Banjarmasin 35736, Papua', 'XII', 'RPL', '85428171', '2021/2022', 'Gamanto Sihotang', '54032678', '2000-06-25', '2001-05-08', 'Pencabutan'),
(43, 80451644, 25245406, 'Cinta Anggraini', 'Sawahlunto', '1974-01-31', 'Laki-laki', 'Ds. K.H. Maskur No. 768, Tegal 40919, Jatim', 'X', 'MM', '14899625', '2018/2019', 'Gadang Budiman M.Farm', '49507726', '2011-11-02', '2021-06-01', 'Pencabutan'),
(44, 13971612, 57559218, 'Paramita Alika Safitri', 'Jambi', '1993-03-28', 'Perempuan', 'Jr. Pacuan Kuda No. 113, Denpasar 39625, Bengkulu', 'XII', 'MM', '14794638', '2020/2021', 'Radit Hutagalung', '15440449', '2004-11-02', '2009-02-04', 'Aktif'),
(45, 1992036, 72072852, 'Sidiq Sitorus', 'Pasuruan', '1979-01-10', 'Perempuan', 'Dk. Jaksa No. 355, Banjarmasin 74210, DIY', 'XI', 'TKJ', '34703198', '2019/2020', 'Kawaca Samosir', '63036037', '2006-10-22', '1988-11-16', 'Pencabutan'),
(46, 57707719, 91129813, 'Pangeran Asirwada Budiman S.Sos', 'Gorontalo', '1973-07-17', 'Laki-laki', 'Jr. Gegerkalong Hilir No. 966, Payakumbuh 32415, Jabar', 'XII', 'RPL', '66905157', '2021/2022', 'Jindra Wibowo M.Pd', '86390037', '2002-03-23', '1982-01-06', 'Pencabutan'),
(47, 92663989, 31017947, 'Budi Kardi Sirait', 'Bengkulu', '1987-11-29', 'Laki-laki', 'Jln. Sukabumi No. 17, Cirebon 95218, Lampung', 'XI', 'MM', '86539256', '2018/2019', 'Nabila Ratna Wulandari S.I.Kom', '84286802', '1994-12-25', '2003-01-23', 'Pencabutan'),
(48, 25581168, 45959899, 'Hasim Jayeng Megantara M.M.', 'Salatiga', '1988-03-18', 'Perempuan', 'Jr. Baing No. 404, Administrasi Jakarta Timur 39933, Sumut', 'XI', 'RPL', '77916370', '2018/2019', 'Karsana Suryono', '78343687', '1993-12-27', '1986-01-01', 'Aktif'),
(49, 62970792, 48893899, 'Zelaya Pratiwi', 'Makassar', '1980-01-11', 'Laki-laki', 'Ds. Flores No. 833, Palopo 62341, Jatim', 'XII', 'RPL', '99848832', '2018/2019', 'Putri Icha Pudjiastuti S.Farm', '79074500', '1998-12-11', '1970-05-28', 'Pencabutan'),
(50, 62043901, 25245406, 'Kusuma Kemba Wijaya', 'Binjai', '1997-12-30', 'Laki-laki', 'Psr. Sugiyopranoto No. 971, Sawahlunto 57452, Sulteng', 'XI', 'TKJ', '30118235', '2019/2020', 'Ulva Juli Yulianti S.Pt', '28319967', '1996-01-03', '1983-10-19', 'Aktif'),
(51, 92463791, 57559218, 'Ibun Uwais', 'Palangka Raya', '1978-01-31', 'Perempuan', 'Psr. Warga No. 556, Surakarta 82421, NTB', 'XI', 'TKJ', '28628252', '2018/2019', 'Malika Wijayanti', '88706137', '2017-09-04', '1971-02-12', 'Pencabutan'),
(52, 63988147, 57559218, 'Okta Gaiman Situmorang S.I.Kom', 'Padangsidempuan', '2010-04-24', 'Laki-laki', 'Gg. Bagonwoto  No. 539, Palu 36002, DIY', 'X', 'RPL', '19507594', '2021/2022', 'Opung Saputra', '98870368', '1984-02-04', '2001-04-15', 'Aktif'),
(53, 9094187, 34703252, 'Ratih Ina Anggraini S.Pd', 'Pekanbaru', '1972-02-07', 'Laki-laki', 'Dk. Bakau Griya Utama No. 382, Sabang 98224, Lampung', 'XII', 'BC', '71599966', '2019/2020', 'Betania Prastuti', '73304647', '2021-01-05', '2001-02-07', 'Aktif'),
(54, 21883106, 57559218, 'Fitria Puti Pudjiastuti S.Ked', 'Tomohon', '1989-01-08', 'Perempuan', 'Gg. Cihampelas No. 208, Pangkal Pinang 93508, Kalbar', 'XI', 'BC', '79612456', '2019/2020', 'Endah Fujiati S.I.Kom', '15247617', '2008-03-12', '1984-10-19', 'Aktif'),
(55, 50057476, 45959899, 'Reza Iswahyudi', 'Balikpapan', '2002-02-25', 'Laki-laki', 'Ds. Pasir Koja No. 190, Lhokseumawe 18862, Banten', 'X', 'TKJ', '96022289', '2021/2022', 'Mariadi Tamba', '65632674', '1998-04-07', '2015-07-02', 'Aktif'),
(56, 50844939, 57559218, 'Intan Pertiwi', 'Pasuruan', '2015-02-16', 'Perempuan', 'Jln. Baan No. 712, Ternate 61064, Jatim', 'XI', 'RPL', '41159205', '2020/2021', 'Bagus Suryono', '59414428', '2008-06-01', '2020-06-02', 'Pencabutan'),
(57, 49795853, 91129813, 'Padmi Riyanti S.I.Kom', 'Semarang', '1991-02-16', 'Laki-laki', 'Ki. Yap Tjwan Bing No. 222, Cirebon 18439, Pabar', 'XI', 'TKJ', '43009128', '2019/2020', 'Kezia Victoria Novitasari S.E.I', '40537764', '1984-03-11', '2021-02-22', 'Aktif'),
(58, 89466080, 31017947, 'Marsudi Bakiman Siregar M.Farm', 'Mojokerto', '2007-08-01', 'Perempuan', 'Jln. Bata Putih No. 256, Makassar 59676, Kalbar', 'X', 'RPL', '33238020', '2018/2019', 'Lukita Latif Wijaya', '17518763', '1970-08-07', '2011-03-23', 'Pencabutan'),
(59, 2382248, 48893899, 'Ani Sabrina Nasyidah', 'Lubuklinggau', '1996-06-13', 'Perempuan', 'Gg. Thamrin No. 700, Sawahlunto 81523, NTB', 'XII', 'RPL', '74347356', '2018/2019', 'Julia Michelle Laksita S.Farm', '76364695', '2004-06-27', '2015-01-09', 'Aktif'),
(60, 48056987, 67199014, 'Tasdik Caket Hakim S.Pt', 'Pagar Alam', '1978-05-14', 'Laki-laki', 'Ki. Juanda No. 106, Magelang 83507, Kaltim', 'X', 'RPL', '91939522', '2018/2019', 'Catur Nababan M.TI.', '94292692', '2004-03-13', '1984-08-08', 'Pencabutan'),
(61, 62586039, 91129813, 'Kajen Gunarto M.Ak', 'Mataram', '2011-01-22', 'Perempuan', 'Gg. Kebangkitan Nasional No. 603, Padangpanjang 72786, Bengkulu', 'XI', 'RPL', '59314252', '2019/2020', 'Ifa Hariyah', '23746193', '2008-01-16', '1997-04-19', 'Aktif'),
(62, 39913147, 25245406, 'Malika Wahyuni', 'Tarakan', '1983-11-29', 'Laki-laki', 'Gg. Antapani Lama No. 732, Jambi 93361, Malut', 'XI', 'BC', '80940324', '2019/2020', 'Cemplunk Pradana S.Ked', '69931861', '2011-03-29', '2022-05-30', 'Aktif'),
(63, 84185260, 45959899, 'Ulva Kusmawati', 'Sukabumi', '2003-04-24', 'Laki-laki', 'Gg. Madrasah No. 648, Pasuruan 81233, Sumut', 'XII', 'MM', '46871455', '2018/2019', 'Embuh Januar', '14567135', '1997-04-30', '1990-01-13', 'Aktif'),
(64, 23579174, 91129813, 'Himawan Garan Samosir S.Sos', 'Lhokseumawe', '2001-03-19', 'Perempuan', 'Ds. Acordion No. 807, Tual 97179, NTB', 'XI', 'MM', '82284295', '2019/2020', 'Prayoga Panji Thamrin', '39451269', '2001-09-23', '2018-01-29', 'Aktif'),
(65, 6709138, 57559218, 'Jelita Haryanti S.Gz', 'Singkawang', '2004-11-09', 'Perempuan', 'Ki. Krakatau No. 91, Pagar Alam 80708, DKI', 'XI', 'RPL', '64781499', '2019/2020', 'Ayu Aurora Farida', '61614822', '2003-05-25', '2003-06-22', 'Aktif'),
(66, 37867557, 31017947, 'Eva Nurdiyanti S.E.', 'Batam', '1984-11-02', 'Laki-laki', 'Jr. Jayawijaya No. 72, Tasikmalaya 90677, Kepri', 'XI', 'TKJ', '61150502', '2021/2022', 'Eja Samsul Pratama', '39809708', '1998-02-10', '1983-03-19', 'Pencabutan'),
(67, 91964990, 72072852, 'Unjani Tami Winarsih', 'Bau-Bau', '2003-05-24', 'Perempuan', 'Psr. Bakau Griya Utama No. 102, Mojokerto 92117, Malut', 'XI', 'RPL', '90818557', '2018/2019', 'Bella Utami', '66537517', '1983-11-20', '2012-01-10', 'Aktif'),
(68, 66741795, 31017947, 'Samiah Hassanah', 'Singkawang', '1994-12-08', 'Laki-laki', 'Ki. Bayam No. 91, Madiun 31075, Aceh', 'XII', 'TKJ', '48333728', '2018/2019', 'Akarsana Firmansyah', '40762948', '2001-03-19', '1990-12-14', 'Aktif'),
(69, 38922529, 45959899, 'Dartono Parman Pradana', 'Madiun', '1973-02-07', 'Laki-laki', 'Ki. Jaksa No. 90, Kediri 45888, Lampung', 'X', 'RPL', '52376179', '2020/2021', 'Ami Aurora Prastuti M.Kom.', '39156203', '2003-04-28', '1983-05-02', 'Aktif'),
(70, 24324627, 57559218, 'Novi Purnawati', 'Solok', '1971-06-26', 'Laki-laki', 'Ki. Bakti No. 514, Parepare 71749, Papua', 'XI', 'MM', '60884526', '2019/2020', 'Ciaobella Winarsih S.T.', '48332682', '2007-07-28', '1987-07-28', 'Pencabutan'),
(71, 42059957, 41321545, 'Cengkal Thamrin', 'Pekalongan', '2009-01-16', 'Perempuan', 'Psr. Rumah Sakit No. 406, Tangerang Selatan 25112, Babel', 'XI', 'TKJ', '72143473', '2021/2022', 'Tirta Wahyudin M.Farm', '76223174', '1991-09-20', '2010-02-16', 'Pencabutan'),
(72, 49808898, 31017947, 'Surya Adikara Haryanto S.E.', 'Cilegon', '2013-09-08', 'Perempuan', 'Jr. Taman No. 979, Padangpanjang 77868, Kaltim', 'XI', 'MM', '62215791', '2019/2020', 'Estiono Suryono', '99282122', '1989-01-22', '1970-04-17', 'Aktif'),
(73, 36626721, 67199014, 'Garang Hutagalung', 'Tegal', '2010-02-11', 'Laki-laki', 'Ds. Gading No. 680, Subulussalam 58138, Kaltara', 'XII', 'TKJ', '50591936', '2019/2020', 'Yunita Yolanda S.Gz', '87054406', '1997-10-20', '2009-03-25', 'Aktif'),
(74, 72380145, 41321545, 'Dewi Novitasari M.Pd', 'Salatiga', '1979-03-21', 'Laki-laki', 'Jln. Jakarta No. 411, Blitar 92388, Sulut', 'X', 'MM', '18880301', '2021/2022', 'Carub Sihotang', '19541330', '2014-08-15', '2001-07-28', 'Pencabutan'),
(75, 33110632, 67199014, 'Kusuma Nashiruddin', 'Samarinda', '2016-08-28', 'Perempuan', 'Ki. Uluwatu No. 858, Magelang 36192, Jatim', 'XI', 'MM', '41715441', '2018/2019', 'Cici Rachel Oktaviani', '92218268', '1993-08-14', '2003-02-19', 'Aktif'),
(76, 54471081, 48893899, 'Putri Nasyidah', 'Kendari', '1978-04-29', 'Laki-laki', 'Kpg. Baik No. 647, Dumai 15732, Sulsel', 'XII', 'BC', '84560301', '2019/2020', 'Dewi Yuniar', '74504478', '1971-09-09', '1983-08-31', 'Aktif'),
(77, 61734325, 91129813, 'Asman Hardiansyah', 'Cilegon', '1985-07-31', 'Laki-laki', 'Psr. Balikpapan No. 994, Kendari 71225, Sumut', 'XII', 'TKJ', '56724866', '2019/2020', 'Daru Teddy Budiyanto', '12202375', '1990-09-19', '2021-04-11', 'Aktif'),
(78, 47870741, 72072852, 'Bakiono Cawuk Wasita', 'Pagar Alam', '1979-10-09', 'Laki-laki', 'Dk. Jakarta No. 700, Padang 81677, Riau', 'XI', 'MM', '78263491', '2021/2022', 'Tasdik Manullang', '50744539', '2014-09-25', '2002-02-16', 'Aktif'),
(79, 23928884, 41321545, 'Novi Agustina', 'Jambi', '1992-08-22', 'Perempuan', 'Dk. Yosodipuro No. 995, Solok 70802, Kepri', 'XI', 'TKJ', '45720823', '2019/2020', 'Mutia Mayasari', '61226638', '1995-07-14', '2000-06-13', 'Pencabutan'),
(80, 24386856, 31017947, 'Jamil Habibi', 'Pematangsiantar', '2014-06-28', 'Perempuan', 'Ki. Yogyakarta No. 798, Dumai 24784, Sumut', 'XII', 'MM', '71093842', '2019/2020', 'Candra Sinaga M.Pd', '22640705', '1991-01-06', '2018-08-11', 'Aktif'),
(81, 29846101, 45959899, 'Cemani Bagiya Gunarto M.Kom.', 'Bitung', '2013-11-17', 'Perempuan', 'Gg. Babadak No. 453, Kendari 12572, NTT', 'XI', 'BC', '67697727', '2020/2021', 'Amalia Farida S.E.', '82839189', '1984-11-01', '2015-06-30', 'Pencabutan'),
(82, 64737682, 41321545, 'Bakiadi Hutagalung S.IP', 'Dumai', '2010-05-31', 'Laki-laki', 'Psr. Sutoyo No. 975, Tarakan 99855, Kalsel', 'XI', 'BC', '72597205', '2018/2019', 'Devi Namaga M.Pd', '15846855', '1981-10-04', '2008-05-02', 'Pencabutan'),
(83, 52872539, 34703252, 'Waluyo Kurniawan', 'Tidore Kepulauan', '2012-04-19', 'Laki-laki', 'Gg. Ki Hajar Dewantara No. 366, Bontang 89194, Kepri', 'XI', 'MM', '60722823', '2018/2019', 'Gawati Wirda Mayasari S.T.', '82989603', '1977-12-05', '2012-09-24', 'Pencabutan'),
(84, 60494567, 72072852, 'Salwa Yani Kusmawati M.Pd', 'Surabaya', '1998-12-29', 'Perempuan', 'Dk. Cikutra Barat No. 791, Cilegon 50480, Banten', 'XI', 'RPL', '12983417', '2018/2019', 'Salman Bagiya Mangunsong', '98979886', '1970-08-19', '1987-10-04', 'Pencabutan'),
(85, 79540589, 45959899, 'Mursita Kuswoyo M.M.', 'Banda Aceh', '1983-03-22', 'Laki-laki', 'Ds. Gambang No. 419, Tebing Tinggi 51919, DIY', 'X', 'BC', '30757698', '2021/2022', 'Kuncara Bajragin Tamba S.Pt', '40415967', '1985-04-05', '1980-01-22', 'Aktif'),
(86, 99159611, 31017947, 'Eka Johan Maryadi', 'Sungai Penuh', '2000-02-24', 'Perempuan', 'Kpg. Adisucipto No. 822, Tebing Tinggi 24967, Sulsel', 'XI', 'BC', '29188357', '2020/2021', 'Mila Astuti', '90081452', '1979-10-18', '2019-04-07', 'Aktif'),
(87, 58602087, 41321545, 'Asirwada Mahendra', 'Gorontalo', '2019-08-12', 'Perempuan', 'Psr. Bara No. 501, Bengkulu 41987, Sulteng', 'X', 'MM', '28465731', '2020/2021', 'Tari Sudiati S.Psi', '28905252', '1998-07-06', '1978-02-09', 'Pencabutan'),
(88, 93734004, 31017947, 'Ganjaran Tampubolon S.E.I', 'Tangerang', '2014-11-13', 'Laki-laki', 'Dk. Babakan No. 545, Samarinda 38374, Sulut', 'XII', 'TKJ', '55957799', '2018/2019', 'Mahesa Hasan Prasetyo S.Kom', '63435890', '2008-09-18', '2004-04-12', 'Aktif'),
(89, 86411282, 45959899, 'Michelle Riyanti', 'Ternate', '2006-07-09', 'Laki-laki', 'Jln. Baabur Royan No. 712, Dumai 34734, Gorontalo', 'XII', 'RPL', '34176070', '2019/2020', 'Shania Wani Handayani S.H.', '62386161', '1998-08-02', '2023-02-03', 'Pencabutan'),
(90, 19858340, 45959899, 'Chelsea Zamira Pratiwi', 'Batam', '1998-09-16', 'Laki-laki', 'Kpg. Baja No. 546, Bekasi 43986, DIY', 'XI', 'BC', '58971952', '2019/2020', 'Karta Raharja Najmudin', '48413372', '2006-02-12', '2021-07-06', 'Aktif'),
(91, 1825127, 91129813, 'Ibrahim Baktiono Simbolon', 'Tangerang Selatan', '1971-08-05', 'Laki-laki', 'Ds. Dewi Sartika No. 486, Tanjungbalai 16104, Bengkulu', 'X', 'TKJ', '15165097', '2018/2019', 'Daniswara Sirait', '11282066', '2003-03-01', '1991-11-13', 'Aktif'),
(92, 29145444, 41321545, 'Hana Nuraini S.E.', 'Bima', '1991-10-18', 'Perempuan', 'Ds. Adisumarmo No. 727, Langsa 28431, NTT', 'X', 'BC', '82360295', '2020/2021', 'Zizi Kuswandari', '96338162', '2005-04-27', '1995-03-24', 'Aktif'),
(93, 15329985, 25245406, 'Talia Aryani S.I.Kom', 'Dumai', '1997-04-23', 'Laki-laki', 'Psr. R.E. Martadinata No. 489, Tegal 69204, Jambi', 'XII', 'MM', '17171195', '2020/2021', 'Warji Suwarno S.Psi', '33774397', '1978-04-29', '1971-04-12', 'Pencabutan'),
(94, 30628654, 48893899, 'Padmi Astuti', 'Depok', '1986-10-12', 'Perempuan', 'Jr. Babah No. 527, Administrasi Jakarta Pusat 54050, Maluku', 'X', 'TKJ', '87493930', '2021/2022', 'Laras Nasyiah', '43554335', '2018-07-07', '2006-01-04', 'Pencabutan'),
(95, 61634113, 48893899, 'Dartono Damanik S.Psi', 'Ambon', '1985-02-14', 'Laki-laki', 'Psr. Suharso No. 135, Gunungsitoli 88398, Lampung', 'XI', 'MM', '17343521', '2021/2022', 'Ratna Prastuti', '68941586', '1994-08-05', '1998-10-21', 'Aktif'),
(96, 60525908, 72072852, 'Saiful Budiman', 'Pariaman', '2014-09-13', 'Perempuan', 'Psr. Lada No. 147, Palu 34659, Babel', 'XII', 'MM', '70760107', '2020/2021', 'Cinthia Silvia Mulyani S.Kom', '69906512', '1996-07-19', '2014-11-03', 'Aktif'),
(97, 66743891, 91129813, 'Eli Wahyuni', 'Tanjung Pinang', '1978-02-14', 'Laki-laki', 'Ki. Hasanuddin No. 492, Depok 63539, Sulsel', 'XI', 'BC', '44598889', '2019/2020', 'Rosman Adriansyah', '35516671', '1979-08-02', '1996-12-13', 'Pencabutan'),
(98, 63172561, 72072852, 'Rika Namaga S.E.', 'Langsa', '2017-07-08', 'Laki-laki', 'Dk. Gajah Mada No. 152, Banjarbaru 19974, Kaltara', 'X', 'MM', '55270272', '2019/2020', 'Daliono Aditya Januar', '54180465', '1982-02-28', '1980-04-29', 'Aktif'),
(99, 71449390, 25245406, 'Zelda Yance Sudiati M.Pd', 'Pasuruan', '1998-04-03', 'Laki-laki', 'Kpg. Rumah Sakit No. 700, Salatiga 77582, Sulut', 'X', 'TKJ', '17954101', '2018/2019', 'Fitria Rahimah', '39436493', '1986-12-11', '2014-03-18', 'Pencabutan'),
(100, 59672748, 57559218, 'Darman Pradipta', 'Yogyakarta', '2007-09-30', 'Perempuan', 'Ds. Wahidin Sudirohusodo No. 788, Langsa 93615, Banten', 'XI', 'RPL', '62702738', '2019/2020', 'Candrakanta Labuh Gunawan S.Sos', '49130852', '2006-01-08', '2007-03-04', 'Pencabutan'),
(101, 74617121, 31017947, 'Rosman Dimaz Latupono', 'Administrasi Jakarta Barat', '1972-04-20', 'Laki-laki', 'Jln. Ikan No. 515, Surakarta 96985, Pabar', 'X', 'MM', '47191444', '2018/2019', 'Caket Latupono', '73609466', '2015-03-11', '2007-09-12', 'Aktif'),
(102, 7205725, 41321545, 'Bakti Garan Pangestu S.Kom', 'Bau-Bau', '2000-07-06', 'Laki-laki', 'Psr. Pacuan Kuda No. 181, Bima 90266, Jambi', 'XII', 'BC', '68019590', '2021/2022', 'Yulia Andriani', '81530051', '1991-05-27', '1995-04-12', 'Aktif'),
(103, 62294219, 45959899, 'Caturangga Banawa Wibowo M.TI.', 'Bontang', '1979-04-12', 'Laki-laki', 'Ds. Abang No. 653, Cirebon 49471, Kepri', 'X', 'MM', '85947993', '2019/2020', 'Calista Permata', '91209194', '1994-02-07', '1990-06-30', 'Aktif'),
(104, 84167038, 72072852, 'Dodo Hadi Hutasoit', 'Gunungsitoli', '1991-05-19', 'Perempuan', 'Kpg. Raden Saleh No. 995, Jambi 31038, Sumsel', 'XI', 'RPL', '34385493', '2021/2022', 'Padmi Pratiwi', '80241234', '1977-01-02', '1983-06-25', 'Aktif'),
(105, 72923369, 41321545, 'Azalea Puspa Hastuti', 'Lubuklinggau', '2006-07-06', 'Laki-laki', 'Jln. Bakaru No. 586, Batam 33593, Jatim', 'X', 'BC', '14457386', '2020/2021', 'Hafshah Mandasari M.TI.', '81683415', '1999-04-09', '2019-04-26', 'Pencabutan'),
(106, 90424764, 31017947, 'Endra Luhung Natsir', 'Kediri', '2007-04-22', 'Laki-laki', 'Dk. S. Parman No. 431, Sorong 86500, DIY', 'XII', 'MM', '54431712', '2019/2020', 'Sabrina Andriani', '27784921', '1984-10-11', '1997-09-04', 'Pencabutan'),
(107, 79996598, 25245406, 'Ayu Nasyiah S.Pd', 'Payakumbuh', '1989-05-09', 'Perempuan', 'Ds. Uluwatu No. 57, Pagar Alam 31970, Maluku', 'XII', 'MM', '25904401', '2019/2020', 'Malika Pudjiastuti', '66875477', '1972-08-04', '2001-05-02', 'Pencabutan'),
(108, 95672189, 91129813, 'Okto Hidayanto', 'Bukittinggi', '1970-05-25', 'Perempuan', 'Jr. Kalimalang No. 4, Jambi 36482, Babel', 'X', 'RPL', '32743868', '2019/2020', 'Diah Laksita', '21091725', '1984-11-02', '2015-09-21', 'Pencabutan'),
(109, 49414090, 45959899, 'Kardi Sitorus M.TI.', 'Surabaya', '1988-02-01', 'Laki-laki', 'Gg. Ikan No. 509, Administrasi Jakarta Selatan 86771, DIY', 'XII', 'TKJ', '63285921', '2018/2019', 'Ani Halima Prastuti', '54431985', '2009-04-04', '2011-03-08', 'Aktif'),
(110, 82544314, 45959899, 'Yunita Hariyah', 'Palopo', '1977-10-21', 'Perempuan', 'Ki. Fajar No. 533, Pontianak 81750, Kalbar', 'XI', 'TKJ', '44154744', '2021/2022', 'Febi Yulianti M.M.', '84672881', '1978-10-26', '1985-07-31', 'Aktif'),
(111, 3951997, 41321545, 'Sakura Vicky Laksita M.Farm', 'Tanjung Pinang', '1989-12-24', 'Perempuan', 'Ki. Salam No. 631, Tanjung Pinang 30338, Sulteng', 'XII', 'TKJ', '61373816', '2020/2021', 'Niyaga Suwarno', '92958748', '1974-05-14', '2018-05-20', 'Pencabutan'),
(112, 98504633, 45959899, 'Raden Santoso M.Pd', 'Pasuruan', '1994-05-29', 'Perempuan', 'Kpg. Yoga No. 601, Balikpapan 84661, Kalsel', 'XI', 'BC', '44893478', '2018/2019', 'Edi Teddy Hakim S.Ked', '61486044', '2005-07-30', '2013-12-17', 'Aktif'),
(113, 27172986, 67199014, 'Cahyadi Wibisono', 'Ternate', '2014-10-25', 'Perempuan', 'Jr. Warga No. 602, Jayapura 99078, Bali', 'XII', 'TKJ', '86116895', '2018/2019', 'Martana Najam Budiman S.E.', '22480597', '1978-10-23', '2009-12-13', 'Pencabutan'),
(114, 44256835, 72072852, 'Jinawi Sihotang', 'Samarinda', '1990-04-04', 'Laki-laki', 'Jln. Merdeka No. 456, Bukittinggi 50644, Malut', 'X', 'TKJ', '15366129', '2021/2022', 'Nyana Anggabaya Manullang', '10066019', '2015-02-13', '1992-08-17', 'Pencabutan'),
(115, 4934129, 45959899, 'Darmaji Galang Manullang', 'Blitar', '1985-06-17', 'Laki-laki', 'Psr. Baja Raya No. 18, Depok 79276, Pabar', 'XII', 'TKJ', '36309844', '2019/2020', 'Daniswara Nababan', '38639927', '1974-11-22', '2017-02-28', 'Aktif'),
(116, 35436348, 34703252, 'Qori Farida', 'Banda Aceh', '1999-05-16', 'Perempuan', 'Gg. Merdeka No. 26, Dumai 55641, Gorontalo', 'XI', 'BC', '81992423', '2019/2020', 'Ajeng Ina Mayasari S.I.Kom', '38784705', '2019-01-22', '2021-02-26', 'Pencabutan'),
(117, 50330213, 34703252, 'Rahmi Haryanti', 'Salatiga', '1997-04-08', 'Laki-laki', 'Jr. Tangkuban Perahu No. 527, Bukittinggi 42972, Jatim', 'X', 'BC', '14323756', '2020/2021', 'Zizi Laksita S.Sos', '55967878', '1970-08-08', '1994-09-17', 'Pencabutan'),
(118, 87508727, 91129813, 'Yulia Jasmin Safitri', 'Cilegon', '2002-10-07', 'Laki-laki', 'Psr. Baik No. 656, Padang 85828, Papua', 'XI', 'BC', '95573407', '2018/2019', 'Maryanto Jabal Permadi M.TI.', '42503498', '1970-03-16', '1989-01-28', 'Aktif'),
(119, 28357261, 67199014, 'Nardi Prabowo S.Farm', 'Pagar Alam', '2017-10-08', 'Laki-laki', 'Jr. Sukajadi No. 224, Banjar 58715, Sultra', 'X', 'BC', '95210077', '2018/2019', 'Ani Palastri', '93099468', '1996-01-05', '1982-10-21', 'Aktif'),
(120, 81640451, 34703252, 'Victoria Lidya Lailasari S.E.', 'Lhokseumawe', '1970-06-06', 'Laki-laki', 'Dk. Pacuan Kuda No. 710, Banjarbaru 90369, Jatim', 'XI', 'RPL', '35954208', '2020/2021', 'Tasnim Mustofa', '42423263', '2008-10-18', '2002-09-30', 'Pencabutan'),
(121, 56847969, 34703252, 'Gina Tina Susanti', 'Bitung', '2007-11-17', 'Laki-laki', 'Ki. Sutami No. 363, Bima 26504, Gorontalo', 'X', 'RPL', '25885885', '2021/2022', 'Ika Tami Nasyiah S.IP', '69283530', '1972-01-11', '2022-10-30', 'Aktif'),
(122, 1886202, 48893899, 'Mujur Mustofa', 'Batu', '1993-11-03', 'Laki-laki', 'Jln. Baladewa No. 217, Tarakan 69777, Sumbar', 'X', 'MM', '39339685', '2018/2019', 'Tira Nasyidah', '88778806', '2007-12-30', '1978-07-23', 'Pencabutan'),
(123, 50363273, 72072852, 'Gambira Simbolon', 'Palopo', '2012-08-11', 'Perempuan', 'Jr. Baing No. 587, Administrasi Jakarta Barat 53430, NTB', 'XI', 'TKJ', '26069516', '2018/2019', 'Cawisono Tampubolon', '90197119', '1991-01-27', '2009-02-20', 'Pencabutan'),
(124, 10940514, 31017947, 'Kardi Wibisono', 'Tanjungbalai', '1996-10-24', 'Laki-laki', 'Gg. Urip Sumoharjo No. 563, Tangerang 23441, Sumsel', 'XI', 'MM', '79619587', '2021/2022', 'Bambang Dabukke', '91818473', '1973-12-02', '2000-06-17', 'Pencabutan'),
(125, 91785551, 48893899, 'Ciaobella Hariyah', 'Metro', '1994-11-26', 'Laki-laki', 'Ki. K.H. Maskur No. 271, Ambon 37700, Sumbar', 'XI', 'RPL', '99636148', '2018/2019', 'Darimin Taufik Saputra', '89874510', '2022-03-29', '1975-10-27', 'Aktif'),
(126, 79055011, 57559218, 'Vanesa Olivia Hasanah S.Pd', 'Depok', '1976-07-14', 'Perempuan', 'Ds. Salam No. 419, Padang 86102, Sulut', 'X', 'TKJ', '28999172', '2020/2021', 'Elvina Aryani', '91744979', '2016-12-07', '2003-07-03', 'Aktif'),
(127, 51734753, 41321545, 'Vicky Haryanti', 'Bengkulu', '1976-05-27', 'Perempuan', 'Psr. Bata Putih No. 785, Banjar 23596, Maluku', 'XI', 'RPL', '24471041', '2020/2021', 'Bella Azalea Wastuti', '34218790', '2014-06-01', '2019-11-02', 'Pencabutan'),
(128, 81413026, 31017947, 'Cengkir Bancar Mandala', 'Bima', '1995-05-17', 'Laki-laki', 'Ki. K.H. Maskur No. 813, Tual 67471, Kalsel', 'XI', 'BC', '93864999', '2018/2019', 'Ulva Yuliarti', '83809007', '2016-06-06', '2018-01-18', 'Aktif'),
(129, 67652147, 41321545, 'Yusuf Murti Suwarno S.T.', 'Tebing Tinggi', '1983-09-27', 'Perempuan', 'Dk. Orang No. 46, Probolinggo 80085, Papua', 'XII', 'RPL', '72280717', '2020/2021', 'Eja Chandra Sihombing S.T.', '27366210', '1993-01-30', '2015-07-11', 'Aktif'),
(130, 93100613, 67199014, 'Raharja Sihotang', 'Bukittinggi', '1997-11-12', 'Laki-laki', 'Ki. Moch. Toha No. 824, Magelang 76739, Aceh', 'XII', 'BC', '80242457', '2018/2019', 'Talia Putri Handayani M.Ak', '58349618', '2000-01-28', '1971-07-12', 'Pencabutan'),
(131, 81369012, 41321545, 'Liman Firmansyah', 'Makassar', '1989-02-27', 'Perempuan', 'Ki. Gotong Royong No. 41, Administrasi Jakarta Barat 58076, Jabar', 'XI', 'RPL', '30708197', '2021/2022', 'Agnes Suartini S.I.Kom', '37981313', '2003-07-06', '2017-05-18', 'Pencabutan'),
(132, 29170125, 45959899, 'Kamaria Ophelia Rahayu M.Pd', 'Malang', '2009-03-07', 'Laki-laki', 'Jr. Samanhudi No. 858, Bontang 29112, Sultra', 'XI', 'TKJ', '29337346', '2019/2020', 'Baktiono Kawaya Simbolon M.M.', '44226648', '1971-06-02', '2016-05-26', 'Aktif'),
(133, 31146531, 48893899, 'Nabila Sadina Lestari', 'Blitar', '1975-08-20', 'Laki-laki', 'Psr. Bambon No. 52, Sukabumi 91093, Sulteng', 'XII', 'MM', '67284805', '2021/2022', 'Vega Cengkal Nashiruddin', '36795762', '2020-04-01', '1991-07-28', 'Aktif'),
(134, 91129813, 91129813, 'Gaduh Dabukke', 'Tegal', '2001-12-18', 'Laki-laki', 'Ds. Laswi No. 768, Batam 39808, Malut', 'XII', 'TKJ', '54385536', '2021/2022', 'Galiono Januar', '12056109', '2003-08-29', '1981-12-21', 'Aktif'),
(135, 99559532, 45959899, 'Panji Salahudin', 'Administrasi Jakarta Pusat', '2000-04-13', 'Laki-laki', 'Jr. Bakau Griya Utama No. 187, Sawahlunto 99798, NTB', 'XII', 'RPL', '84289159', '2021/2022', 'Cayadi Yusuf Wasita S.Gz', '57340153', '1979-10-16', '2017-02-23', 'Aktif'),
(136, 23680852, 45959899, 'Ajiman Hutagalung', 'Palembang', '2001-02-04', 'Perempuan', 'Dk. Jamika No. 523, Madiun 95857, Jabar', 'XI', 'TKJ', '75653438', '2021/2022', 'Jessica Mardhiyah', '29748342', '1973-04-17', '2017-07-03', 'Pencabutan'),
(137, 42327837, 72072852, 'Ivan Hardiansyah', 'Samarinda', '2009-07-23', 'Laki-laki', 'Psr. Krakatau No. 742, Prabumulih 32325, Kaltara', 'XI', 'TKJ', '97206632', '2020/2021', 'Padma Prastuti', '84404611', '2012-08-27', '1982-12-19', 'Pencabutan'),
(138, 83923468, 48893899, 'Farhunnisa Usada', 'Salatiga', '1997-01-13', 'Perempuan', 'Jr. Sugiyopranoto No. 175, Pagar Alam 38886, Bali', 'XII', 'BC', '25286421', '2018/2019', 'Febi Suryatmi', '93371223', '1995-06-15', '2022-08-30', 'Aktif'),
(139, 66298429, 41321545, 'Laila Oktaviani M.Pd', 'Batam', '2017-10-17', 'Perempuan', 'Kpg. Balikpapan No. 661, Yogyakarta 38109, Sumbar', 'XII', 'TKJ', '39255166', '2018/2019', 'Yulia Natalia Suryatmi', '56565940', '1992-07-25', '1991-08-14', 'Aktif'),
(140, 67628660, 57559218, 'Aurora Yuliarti S.E.', 'Ternate', '1983-10-13', 'Perempuan', 'Jr. Perintis Kemerdekaan No. 15, Cilegon 71604, Jabar', 'X', 'MM', '63923231', '2021/2022', 'Laras Riyanti', '55743203', '1989-12-25', '1985-08-04', 'Aktif'),
(141, 35969315, 48893899, 'Zalindra Mayasari M.Ak', 'Binjai', '1989-05-22', 'Laki-laki', 'Psr. Veteran No. 536, Tarakan 84418, Jabar', 'XI', 'TKJ', '56346573', '2018/2019', 'Kardi Mandala', '39036590', '2005-10-11', '2019-09-29', 'Aktif'),
(142, 67480835, 41321545, 'Prabowo Narpati', 'Banjar', '1993-04-22', 'Laki-laki', 'Dk. Yohanes No. 322, Bogor 29064, Babel', 'XI', 'RPL', '32064974', '2019/2020', 'Calista Shakila Hartati', '38292054', '1977-08-07', '2016-09-18', 'Pencabutan'),
(143, 71939524, 34703252, 'Vanya Wahyuni', 'Bandar Lampung', '1984-08-15', 'Perempuan', 'Kpg. Juanda No. 820, Sungai Penuh 99864, Pabar', 'XI', 'RPL', '91461473', '2018/2019', 'Gaiman Ibrahim Zulkarnain', '94534416', '2000-12-12', '2023-07-01', 'Aktif'),
(144, 46818328, 91129813, 'Gantar Maulana', 'Tual', '1991-01-27', 'Perempuan', 'Psr. Raden No. 287, Gorontalo 89690, Riau', 'X', 'BC', '25961879', '2020/2021', 'Jinawi Prakasa', '83759110', '1992-12-23', '1982-06-24', 'Aktif'),
(145, 48865980, 34703252, 'Ani Susanti', 'Binjai', '1973-08-22', 'Laki-laki', 'Dk. Ir. H. Juanda No. 515, Bogor 58233, Gorontalo', 'XII', 'BC', '21557523', '2018/2019', 'Violet Suryatmi', '65665658', '2002-03-11', '1972-05-03', 'Pencabutan'),
(146, 10299916, 57559218, 'Kania Cici Wahyuni', 'Banjar', '1996-07-02', 'Perempuan', 'Ki. Radio No. 727, Tanjungbalai 27877, Kaltim', 'X', 'TKJ', '43713983', '2019/2020', 'Galur Darijan Wasita S.Sos', '25553857', '2023-04-25', '1972-07-09', 'Pencabutan'),
(147, 59276579, 45959899, 'Joko Putra', 'Bandung', '2022-02-26', 'Perempuan', 'Ds. Ikan No. 876, Ternate 25413, Aceh', 'XII', 'MM', '84064170', '2020/2021', 'Pangeran Nababan S.Sos', '78575730', '1989-08-23', '1992-05-01', 'Pencabutan'),
(148, 43347273, 91129813, 'Raden Haryanto M.TI.', 'Lhokseumawe', '1997-08-25', 'Laki-laki', 'Jr. Bakit  No. 521, Lubuklinggau 47395, Sumsel', 'XII', 'BC', '49410656', '2019/2020', 'Tantri Mulyani', '85342755', '1999-09-18', '1991-11-03', 'Aktif'),
(149, 62818084, 45959899, 'Fitria Hastuti', 'Tegal', '2014-09-06', 'Laki-laki', 'Kpg. Gatot Subroto No. 218, Surakarta 98037, Sumsel', 'XI', 'MM', '77608087', '2021/2022', 'Putu Wasita', '58695748', '2021-11-19', '1971-12-07', 'Aktif'),
(150, 43892451, 67199014, 'Mariadi Permadi', 'Pontianak', '1971-07-28', 'Perempuan', 'Dk. Qrisdoren No. 134, Palu 35354, Kalteng', 'XII', 'TKJ', '67596404', '2020/2021', 'Mutia Farida S.Pd', '85291459', '1988-09-17', '2018-06-06', 'Pencabutan'),
(151, 10184044, 45959899, 'Laras Fujiati', 'Tegal', '2022-04-17', 'Perempuan', 'Kpg. Casablanca No. 685, Parepare 62689, Papua', 'XII', 'BC', '30870627', '2019/2020', 'Asman Prasasta', '98737133', '1981-04-29', '1984-03-12', 'Aktif'),
(152, 19981326, 72072852, 'Putri Raina Laksita', 'Ternate', '1981-01-22', 'Laki-laki', 'Ki. Baing No. 233, Pariaman 38081, Babel', 'X', 'TKJ', '40225463', '2018/2019', 'Rahayu Wastuti S.Pt', '92680189', '2004-08-21', '1980-03-17', 'Pencabutan'),
(153, 46001576, 72072852, 'Labuh Kuncara Sihombing M.TI.', 'Surakarta', '1982-08-04', 'Perempuan', 'Gg. Jend. A. Yani No. 595, Palembang 35637, NTT', 'XII', 'MM', '42185450', '2019/2020', 'Anita Suartini', '31534118', '1988-09-02', '2017-07-29', 'Aktif'),
(154, 72550101, 67199014, 'Gawati Uyainah S.Pd', 'Singkawang', '1974-07-14', 'Perempuan', 'Jr. Acordion No. 730, Bekasi 14883, DIY', 'X', 'RPL', '26144648', '2019/2020', 'Atma Adriansyah', '41043405', '2010-08-21', '2015-09-07', 'Aktif'),
(155, 70910544, 72072852, 'Laras Wijayanti', 'Sabang', '1994-02-20', 'Laki-laki', 'Dk. Otto No. 898, Pontianak 62550, Gorontalo', 'X', 'MM', '17688959', '2020/2021', 'Atma Lazuardi S.IP', '46511356', '1971-11-22', '2019-11-30', 'Pencabutan'),
(156, 49102498, 48893899, 'Latif Bancar Tamba', 'Jayapura', '2015-11-25', 'Laki-laki', 'Ds. Basudewo No. 207, Mojokerto 13891, Kalbar', 'XI', 'BC', '35214776', '2020/2021', 'Martaka Adika Narpati M.M.', '35404717', '1977-07-31', '2016-10-28', 'Aktif'),
(157, 68117568, 31017947, 'Malik Olga Natsir S.I.Kom', 'Tomohon', '1976-02-05', 'Perempuan', 'Jr. Ters. Pasir Koja No. 969, Bitung 24034, Kalsel', 'X', 'TKJ', '75227078', '2021/2022', 'Harsanto Galang Saragih S.Kom', '23884391', '1994-04-18', '1984-03-15', 'Aktif'),
(158, 31744278, 34703252, 'Michelle Purwanti', 'Tangerang Selatan', '2009-01-19', 'Laki-laki', 'Ds. Setiabudhi No. 657, Palopo 94406, Aceh', 'X', 'TKJ', '81575140', '2018/2019', 'Warji Sitompul', '92626527', '2022-01-07', '1982-01-18', 'Aktif'),
(159, 67262255, 45959899, 'Indra Firgantoro S.Ked', 'Lhokseumawe', '1974-03-06', 'Perempuan', 'Ki. Basoka Raya No. 867, Salatiga 49412, Sumut', 'XI', 'RPL', '19778934', '2019/2020', 'Nadine Novitasari', '94128031', '2014-06-27', '1996-09-26', 'Aktif'),
(160, 95400187, 72072852, 'Cahyadi Habibi M.M.', 'Tangerang', '1983-04-21', 'Laki-laki', 'Jln. Salatiga No. 960, Bengkulu 36353, Kepri', 'XI', 'BC', '67023168', '2021/2022', 'Rafid Anggriawan', '21537817', '1980-12-24', '2021-09-17', 'Pencabutan'),
(161, 474812, 72072852, 'Imam Karya Anggriawan', 'Semarang', '2016-07-03', 'Perempuan', 'Dk. W.R. Supratman No. 442, Pagar Alam 27455, DIY', 'XI', 'MM', '71675012', '2018/2019', 'Kani Nuraini S.H.', '39108542', '1996-10-19', '1973-09-14', 'Aktif'),
(162, 94004083, 57559218, 'Irsad Harto Sitompul', 'Payakumbuh', '2011-02-10', 'Laki-laki', 'Ki. B.Agam 1 No. 431, Pontianak 24518, Sumut', 'X', 'BC', '54806641', '2021/2022', 'Nabila Anggraini M.TI.', '77269946', '1985-11-09', '1984-01-15', 'Aktif'),
(163, 48807887, 48893899, 'Tania Uyainah', 'Bekasi', '1997-10-13', 'Laki-laki', 'Kpg. Jambu No. 614, Bandung 67629, Pabar', 'X', 'MM', '25038673', '2019/2020', 'Kamaria Hariyah', '76750307', '2003-12-15', '1998-09-28', 'Pencabutan'),
(164, 6753555, 57559218, 'Violet Haryanti', 'Cilegon', '2005-05-27', 'Perempuan', 'Psr. Gambang No. 324, Metro 14336, Jateng', 'XI', 'MM', '29072672', '2018/2019', 'Jaswadi Jagaraga Mansur', '72774308', '1973-03-19', '2012-06-16', 'Aktif'),
(165, 68424454, 41321545, 'Niyaga Mujur Narpati M.Kom.', 'Madiun', '1970-01-22', 'Laki-laki', 'Kpg. Bata Putih No. 498, Pagar Alam 45583, DIY', 'XII', 'BC', '23985219', '2020/2021', 'Nadine Ulya Puspasari S.T.', '81092302', '1983-08-13', '1982-12-22', 'Pencabutan'),
(166, 55251928, 91129813, 'Candra Manah Dabukke', 'Tual', '1972-07-14', 'Perempuan', 'Kpg. Yosodipuro No. 868, Mojokerto 94863, Malut', 'XI', 'TKJ', '64907677', '2020/2021', 'Puput Oktaviani', '25472376', '2019-03-19', '1973-10-25', 'Aktif'),
(167, 83664403, 31017947, 'Jono Candra Utama', 'Banjarmasin', '1978-09-17', 'Perempuan', 'Gg. Bah Jaya No. 434, Sungai Penuh 34244, Kaltara', 'XII', 'RPL', '22887405', '2018/2019', 'Cinthia Widiastuti', '73193316', '1995-01-29', '1972-05-16', 'Pencabutan'),
(168, 37511455, 45959899, 'Irma Puspa Uyainah', 'Tangerang', '2000-07-05', 'Perempuan', 'Ds. Raya Ujungberung No. 384, Mataram 50386, Aceh', 'X', 'MM', '78889375', '2021/2022', 'Karsana Prabawa Gunarto S.Farm', '92695033', '2010-05-22', '2001-02-12', 'Aktif'),
(169, 86915647, 57559218, 'Janet Farah Nurdiyanti', 'Mataram', '2013-01-23', 'Laki-laki', 'Ki. Tubagus Ismail No. 791, Langsa 33328, Sumbar', 'XII', 'TKJ', '76236509', '2019/2020', 'Limar Jayeng Nainggolan', '45080598', '2022-09-17', '2008-10-05', 'Pencabutan'),
(170, 74830622, 91129813, 'Yunita Maimunah Suryatmi M.Pd', 'Makassar', '1990-05-31', 'Laki-laki', 'Psr. Gajah No. 151, Kendari 59395, NTT', 'XI', 'MM', '69480544', '2021/2022', 'Jessica Utami S.Psi', '96579820', '1995-03-11', '2004-05-30', 'Pencabutan'),
(171, 51388294, 34703252, 'Padma Padmasari S.Psi', 'Banjar', '1972-06-01', 'Laki-laki', 'Dk. Cemara No. 432, Padang 83753, Papua', 'X', 'RPL', '98274904', '2021/2022', 'Emas Maman Gunawan', '77175793', '1980-01-23', '2004-04-12', 'Aktif'),
(172, 52894970, 72072852, 'Usyi Patricia Kusmawati', 'Makassar', '1991-12-14', 'Laki-laki', 'Gg. Hayam Wuruk No. 283, Payakumbuh 90042, Babel', 'XI', 'BC', '16506548', '2018/2019', 'Kamaria Fujiati M.M.', '74690025', '2017-06-21', '1999-08-05', 'Pencabutan'),
(173, 52448218, 67199014, 'Kardi Manullang M.Ak', 'Administrasi Jakarta Barat', '1991-10-15', 'Laki-laki', 'Gg. M.T. Haryono No. 414, Pekalongan 57884, Lampung', 'X', 'BC', '20280828', '2020/2021', 'Siti Hariyah', '49024852', '2017-02-07', '1973-05-16', 'Aktif'),
(174, 35653743, 31017947, 'Cinta Vicky Pudjiastuti S.I.Kom', 'Semarang', '1996-03-09', 'Perempuan', 'Dk. Bata Putih No. 454, Yogyakarta 93253, Jambi', 'X', 'MM', '88692816', '2021/2022', 'Alika Ina Yolanda', '16162076', '2018-07-09', '1988-12-02', 'Aktif'),
(175, 35411052, 41321545, 'Kayun Omar Tarihoran S.H.', 'Malang', '2009-06-24', 'Laki-laki', 'Ki. Babadan No. 377, Yogyakarta 44472, Bengkulu', 'XII', 'BC', '70196426', '2020/2021', 'Praba Dongoran', '52415127', '1985-06-01', '2003-09-12', 'Pencabutan'),
(176, 49057593, 48893899, 'Galih Wahyudin', 'Surakarta', '1972-12-03', 'Perempuan', 'Jln. Bakit  No. 301, Cimahi 74407, Pabar', 'XI', 'RPL', '17690376', '2021/2022', 'Irwan Simbolon M.Ak', '78371027', '1992-09-29', '1997-09-07', 'Aktif'),
(177, 70547957, 41321545, 'Ika Melinda Nuraini', 'Administrasi Jakarta Pusat', '1999-10-19', 'Laki-laki', 'Ds. Qrisdoren No. 135, Jayapura 43227, Babel', 'XI', 'RPL', '25496492', '2020/2021', 'Saiful Prabowo', '92716739', '2019-12-22', '1984-12-16', 'Pencabutan'),
(178, 95467279, 57559218, 'Atmaja Permadi', 'Magelang', '1984-09-24', 'Laki-laki', 'Kpg. Baranangsiang No. 952, Subulussalam 26452, Jabar', 'XII', 'TKJ', '70968040', '2018/2019', 'Septi Agustina M.M.', '95013681', '1996-04-21', '2011-05-07', 'Aktif'),
(179, 61217532, 91129813, 'Ciaobella Purnawati S.Psi', 'Singkawang', '2005-05-14', 'Perempuan', 'Ds. Madrasah No. 7, Palangka Raya 95828, Banten', 'XI', 'TKJ', '91084397', '2019/2020', 'Malik Permadi', '46992083', '2003-11-15', '1996-03-26', 'Aktif'),
(180, 77911192, 41321545, 'Cakrabirawa Makara Latupono M.Farm', 'Gorontalo', '1980-12-15', 'Laki-laki', 'Psr. Ir. H. Juanda No. 51, Lhokseumawe 48654, Sulbar', 'XI', 'BC', '52785970', '2020/2021', 'Kemal Megantara S.H.', '40196112', '1977-09-18', '1977-07-03', 'Pencabutan'),
(181, 47645628, 34703252, 'Najam Kairav Marpaung', 'Pematangsiantar', '2023-06-20', 'Laki-laki', 'Gg. Padang No. 356, Balikpapan 37896, Sulsel', 'X', 'BC', '16389360', '2020/2021', 'Enteng Ibrahim Simbolon S.T.', '80303707', '2011-12-09', '1974-12-20', 'Aktif'),
(182, 65889825, 48893899, 'Wani Rahmawati', 'Tangerang Selatan', '2003-10-06', 'Laki-laki', 'Ds. Yoga No. 712, Pekalongan 16067, DIY', 'XII', 'BC', '98323424', '2018/2019', 'Gambira Sitorus', '96628843', '2003-06-30', '1992-02-25', 'Pencabutan'),
(183, 63560109, 48893899, 'Olga Latupono', 'Metro', '2012-03-23', 'Laki-laki', 'Jln. Gatot Subroto No. 112, Bandar Lampung 96543, Gorontalo', 'X', 'TKJ', '33063249', '2019/2020', 'Cemani Adriansyah', '12033751', '1989-01-17', '1977-10-19', 'Pencabutan'),
(184, 20008035, 57559218, 'Patricia Nasyidah', 'Bitung', '1977-03-27', 'Perempuan', 'Ki. Surapati No. 264, Banjarbaru 33291, Bali', 'XI', 'MM', '88024838', '2018/2019', 'Mursita Santoso', '78076971', '1998-08-25', '1974-05-13', 'Pencabutan'),
(185, 7744435, 72072852, 'Eko Utama', 'Administrasi Jakarta Utara', '1985-05-07', 'Perempuan', 'Dk. Jakarta No. 865, Lhokseumawe 18564, Sulsel', 'XII', 'RPL', '45042784', '2021/2022', 'Kasiran Hutapea S.H.', '15293497', '2013-11-10', '2013-10-26', 'Aktif'),
(186, 12786587, 31017947, 'Hadi Utama M.TI.', 'Jambi', '1993-05-19', 'Perempuan', 'Psr. Sudirman No. 549, Blitar 27750, Jambi', 'XI', 'TKJ', '25788727', '2020/2021', 'Dartono Rajasa', '33115251', '2013-01-20', '1979-09-15', 'Pencabutan'),
(187, 88006647, 41321545, 'Tomi Setiawan', 'Gorontalo', '2001-04-12', 'Perempuan', 'Psr. Basudewo No. 99, Pontianak 68687, Sumbar', 'XI', 'BC', '77246764', '2020/2021', 'Cindy Queen Pudjiastuti S.IP', '17469239', '1988-07-23', '1981-11-06', 'Aktif'),
(188, 86263804, 31017947, 'Tina Novitasari S.Ked', 'Subulussalam', '1988-06-20', 'Perempuan', 'Gg. Acordion No. 580, Tual 42099, Malut', 'X', 'TKJ', '12955880', '2018/2019', 'Banara Halim M.Farm', '47851603', '1988-11-06', '2015-07-17', 'Pencabutan'),
(189, 91287030, 91129813, 'Eli Utami', 'Semarang', '2021-07-07', 'Laki-laki', 'Gg. Dipatiukur No. 304, Palembang 36312, DKI', 'XI', 'RPL', '27222536', '2018/2019', 'Vera Padmasari S.I.Kom', '98489736', '1983-06-04', '1987-02-21', 'Pencabutan'),
(190, 19729846, 34703252, 'Mutia Rika Kuswandari S.Ked', 'Administrasi Jakarta Selatan', '1996-03-05', 'Laki-laki', 'Jr. Sunaryo No. 458, Gorontalo 97959, Riau', 'X', 'BC', '86357432', '2021/2022', 'Jaga Prakasa', '26730047', '1983-05-23', '1984-03-25', 'Pencabutan'),
(191, 83146346, 67199014, 'Setya Nashiruddin', 'Pekalongan', '2013-05-22', 'Perempuan', 'Jln. B.Agam 1 No. 201, Palu 49634, Maluku', 'X', 'MM', '35292179', '2021/2022', 'Empluk Firgantoro', '73934079', '2002-09-03', '2021-05-29', 'Pencabutan'),
(192, 6027440, 91129813, 'Rahman Laswi Damanik M.TI.', 'Administrasi Jakarta Pusat', '2015-06-02', 'Laki-laki', 'Kpg. Siliwangi No. 779, Magelang 23300, Maluku', 'X', 'RPL', '55208338', '2018/2019', 'Balidin Santoso', '89945004', '2009-10-24', '2009-09-06', 'Aktif'),
(193, 8319477, 67199014, 'Wulan Eva Mandasari S.Kom', 'Pagar Alam', '1977-09-17', 'Laki-laki', 'Jln. Panjaitan No. 694, Bandar Lampung 24445, Kalbar', 'X', 'TKJ', '92508738', '2020/2021', 'Rini Hasanah S.H.', '43992318', '2009-12-21', '2003-12-23', 'Aktif'),
(194, 88690324, 34703252, 'Luhung Ramadan', 'Serang', '1990-06-04', 'Perempuan', 'Jln. Juanda No. 600, Solok 41707, Riau', 'XI', 'TKJ', '34141456', '2021/2022', 'Ghaliyati Hariyah', '12717344', '2006-12-31', '1990-06-24', 'Aktif'),
(195, 91638181, 45959899, 'Carla Farida', 'Jayapura', '2011-07-18', 'Laki-laki', 'Ki. Wahidin No. 198, Langsa 65078, Kepri', 'X', 'TKJ', '44694651', '2021/2022', 'Cagak Samosir', '90659111', '1987-07-25', '1977-05-18', 'Aktif'),
(196, 39451903, 48893899, 'Hafshah Lestari', 'Gorontalo', '2023-06-05', 'Perempuan', 'Psr. Ters. Buah Batu No. 240, Pematangsiantar 92673, Kalteng', 'X', 'RPL', '40690912', '2018/2019', 'Yunita Laksita S.T.', '41034703', '1982-04-21', '1983-12-15', 'Pencabutan'),
(197, 99958775, 57559218, 'Vanya Usada', 'Administrasi Jakarta Pusat', '1972-02-13', 'Perempuan', 'Psr. Flora No. 147, Tasikmalaya 86993, Malut', 'XII', 'MM', '64296377', '2020/2021', 'Ulya Carla Lestari', '13333618', '1986-04-16', '2020-10-30', 'Aktif'),
(198, 56641381, 34703252, 'Olivia Utami', 'Sibolga', '2006-02-03', 'Laki-laki', 'Ki. Nakula No. 591, Madiun 83872, DKI', 'XII', 'BC', '83393962', '2019/2020', 'Keisha Kuswandari S.Kom', '40586552', '2010-08-02', '1975-04-01', 'Aktif'),
(199, 20957634, 91129813, 'Elma Pratiwi', 'Banjar', '1987-01-03', 'Laki-laki', 'Jr. Bakaru No. 747, Cimahi 43983, Babel', 'XI', 'RPL', '97101490', '2021/2022', 'Maida Wahyuni', '20718773', '1991-03-05', '1989-01-15', 'Pencabutan'),
(200, 77661177, 45959899, 'Mustofa Argono Sihombing S.Pd', 'Kupang', '1977-02-17', 'Laki-laki', 'Gg. Kebangkitan Nasional No. 342, Denpasar 27181, Maluku', 'X', 'MM', '27287527', '2018/2019', 'Bagiya Halim Santoso S.Sos', '23737303', '1972-09-11', '1999-06-05', 'Pencabutan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_smk`
--

CREATE TABLE `tb_smk` (
  `npsn` int(8) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `status_sekolah` enum('Negeri','Swasta') NOT NULL DEFAULT 'Negeri',
  `pembimbing_prakerin` varchar(100) NOT NULL,
  `no_hp_pembimbing` varchar(15) NOT NULL,
  `jurusan_terdaftar` varchar(100) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `status_aktif` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_smk`
--

INSERT INTO `tb_smk` (`npsn`, `nama_sekolah`, `status_sekolah`, `pembimbing_prakerin`, `no_hp_pembimbing`, `jurusan_terdaftar`, `alamat_sekolah`, `status_aktif`) VALUES
(25245406, 'UD Fujiati Nasyiah', 'Swasta', 'Jono Ramadan', '41301450', 'RPL', 'Ki. Bakau No. 418, Bogor 28891, Sulbar', 'Aktif'),
(31017947, 'Perum Rahimah', 'Negeri', 'Prayogo Embuh Nainggolan', '27778592', 'RPL', 'Jr. Sudirman No. 197, Langsa 87853, Jambi', 'Aktif'),
(34703252, 'PT Novitasari Tbk', 'Swasta', 'Ulya Nurdiyanti M.M.', '99091211', 'AK', 'Jln. Supomo No. 476, Magelang 81481, Gorontalo', 'Aktif'),
(41321545, 'CV Nurdiyanti Mardhiyah', 'Swasta', 'Maria Usamah', '58917777', 'MM', 'Psr. Samanhudi No. 757, Sibolga 98427, Lampung', 'Aktif'),
(45959899, 'Perum Fujiati', 'Negeri', 'Maimunah Halimah S.Sos', '72558020', 'MM', 'Gg. Acordion No. 95, Sibolga 24246, Sulsel', 'Aktif'),
(48893899, 'CV Padmasari', 'Negeri', 'Sabri Gunawan', '80292548', 'RPL', 'Jr. Abdul No. 503, Malang 17893, Sulteng', 'Aktif'),
(57559218, 'Yayasan Budiman Zulkarnain', 'Swasta', 'Unjani Hartati', '16639467', 'AK', 'Jr. Radio No. 825, Palangka Raya 29856, DKI', 'Aktif'),
(67199014, 'PT Haryanto', 'Swasta', 'Mila Amelia Rahimah', '29364864', 'AK', 'Kpg. Orang No. 182, Administrasi Jakarta Pusat 67829, Sulteng', 'Aktif'),
(72072852, 'PD Pratama Sihombing', 'Swasta', 'Gilda Anastasia Nuraini', '67703717', 'AK', 'Gg. Bambu No. 870, Sungai Penuh 65811, Riau', 'Aktif'),
(91129813, 'PD Siregar Siregar (Persero) Tbk', 'Swasta', 'Calista Permata S.T.', '36237932', 'TKJ', 'Gg. Pacuan Kuda No. 968, Tangerang Selatan 72917, Pabar', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `first_name`, `last_name`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'UPT Komputer', 'admin'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'User', 'UPT Komputer', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_asisten`
--
ALTER TABLE `tb_asisten`
  ADD PRIMARY KEY (`id_asisten`);

--
-- Indexes for table `tb_prakerin`
--
ALTER TABLE `tb_prakerin`
  ADD PRIMARY KEY (`id_prakerin`),
  ADD KEY `tb_prakerin_npsn_foreign` (`npsn`);

--
-- Indexes for table `tb_smk`
--
ALTER TABLE `tb_smk`
  ADD PRIMARY KEY (`npsn`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_asisten`
--
ALTER TABLE `tb_asisten`
  MODIFY `id_asisten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_prakerin`
--
ALTER TABLE `tb_prakerin`
  MODIFY `id_prakerin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_prakerin`
--
ALTER TABLE `tb_prakerin`
  ADD CONSTRAINT `tb_prakerin_npsn_foreign` FOREIGN KEY (`npsn`) REFERENCES `tb_smk` (`npsn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
