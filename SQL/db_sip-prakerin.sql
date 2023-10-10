-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 03:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `tb_asisten`
--

CREATE TABLE `tb_asisten` (
  `id_asisten` int(11) NOT NULL,
  `nama_asisten` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jabatan` enum('Koordinator','Administrator','Asisten') NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_asisten`
--

INSERT INTO `tb_asisten` (`id_asisten`, `nama_asisten`, `nim`, `no_hp`, `email`, `alamat`, `jabatan`, `status`) VALUES
(1, 'Nasyath Faykar', '21.230.0194', '08123456789', 'koor@uptkomp.com', 'Jl. Jalan', 'Koordinator', 'Aktif'),
(2, 'Muhammad Fadli', '21.230.0189', '088806923500', 'fadli@uptkomp.com', 'Jalan KH Ahmad Dahlan Tirto Gg. 7 No.31', 'Asisten', 'Aktif'),
(8, 'Bagus Muhammad Mumtaza', '21.230.0173', '0786868589', 'mm@uptkomp.com', 'Bendan', 'Administrator', 'Aktif'),
(9, 'Muhammad Bagus Setiawan', '21.230.0187', '08789687765', 'bagus@uptkomp.com', 'Siwalan', 'Asisten', 'Aktif'),
(10, 'Fauzi Aristianto', '22.230.0065', '0868687', 'uzi@uptkomp.com', 'Panjang', 'Administrator', 'Aktif'),
(11, 'Muhammad Budi Utomo', '22.230.0069', '0868697', 'budi@uptkomp.com', 'Pabean', 'Koordinator', 'Aktif'),
(12, 'Fina Himmatul Khusna', '20.240.0065', '0786789', 'fina@uptkomp.com', 'Tangkil Tengah', 'Asisten', 'Aktif'),
(13, 'Nur Miffa Triyantin', '20.240.0021', '099987', 'miffa@uptkomp.com', 'Batang', 'Asisten', 'Aktif'),
(14, 'Rheina Sukma Anggini', '20.240.0067', '08877456', 'rheina@uptkomp.com', 'Batang', 'Asisten', 'Aktif'),
(15, 'Elank Arif Prasetyo', '21.230.0193', '08687', 'elank@uptkomp.com', 'Bandar, Batang', 'Asisten', 'Aktif'),
(16, 'Uswatun', '21.230.0018', '086869', 'uswa@uptkomp.com', 'Batang', 'Asisten', 'Aktif'),
(17, 'Zaky Farid Harun', '21.230.0175', '088978967', 'zaky@uptkomp.com', 'Bogor, Jakarta', 'Asisten', 'Aktif'),
(18, 'Rina Mulia Sari', '21.230.0186', '06889796', 'rina@uptkomp.com', 'Bumirejo', 'Asisten', 'Aktif'),
(19, 'Dwi Priyono', '22.240.0165', '087876', 'dwi@uptkomp.com', 'Wiradesa', 'Asisten', 'Aktif'),
(20, 'Fina Nikmatul Kamelia', '22.230.0044', '0879798', 'meli@uptkomp.com', 'Kurang tau', 'Asisten', 'Aktif'),
(21, 'Muhammad Nailul Author', '22.240.0056', '088769', 'author@uptkomp.com', 'Kurang tau', 'Asisten', 'Aktif'),
(22, 'Wanadya Harsari', '22.230.0092', '0868687', 'nadya@uptkomp.com', 'Batang', 'Asisten', 'Aktif'),
(23, 'Jauza Gama Zaidaan', '22.240.0095', '08698798', 'zidan@uptkomp.com', 'Kurang tau', 'Asisten', 'Aktif'),
(24, 'Bahrur Rizky', '21.230.0046', '0969878', 'bahrur@uptkomp.com', 'Kauman', 'Koordinator', 'Aktif'),
(25, 'Khani Fatun Nifullaili', '22.230.0046', '088097986', 'nippa@uptkomp.com', 'Batang', 'Koordinator', 'Aktif'),
(26, 'Rif Ana Suryaningsih', '21.230.0136', '08698787', 'ana@uptkomp.com', 'Buaran', 'Asisten', 'Aktif'),
(27, 'Antama Kurnialista', '22.230.0038', '098688', 'antama@uptkomp.com', 'Bendan', 'Asisten', 'Aktif'),
(28, 'Hawwin Amrina Rosyada', '22.230.0117', '0878987', 'hawwin@uptkomp.com', 'Kuripan', 'Asisten', 'Aktif'),
(29, 'Mochammad Rahman Arsalan', '21.230.0143', '0987868', 'arsal@uptkomp.com', 'Limas, Pekalongan', 'Asisten', 'Aktif'),
(30, 'Farriq Muwaffaq', '21.240.0088', '0877887', 'farriq@uptkomp.com', 'Pabean', 'Asisten', 'Aktif'),
(31, 'Fitra Fahra Hanifa', '21.230.0122', '08976987', 'hanif@uptkomp.com', 'Batang', 'Asisten', 'Aktif'),
(32, 'Misbakhul Hanif', '22.120.0026', '0877688', 'misbah@uptkomp.com', 'Wiradesa', 'Asisten', 'Aktif'),
(33, 'Riski Dwi Ananto', '23.240.0017', '087687', 'riski@uptkomp.com', 'Pemalang', 'Asisten', 'Aktif'),
(34, 'Muhammad Thoriq Salsabila', '22.230.0068', '0798798798', 'thor@uptkomp.com', 'Kurang tau', 'Asisten', 'Aktif'),
(35, 'Dimas Adi Pangestu', '20.240.0074', '08768887', 'dimas@uptkomp.com', 'Wiradesa', 'Asisten', 'Aktif');

--
-- Triggers `tb_asisten`
--
DELIMITER $$
CREATE TRIGGER `tambah_user` AFTER INSERT ON `tb_asisten` FOR EACH ROW BEGIN
            DECLARE level_val VARCHAR(50);
            DECLARE password_val VARCHAR(32);
        
            IF NEW.jabatan IN ('Koordinator', 'Administrator') THEN
                SET level_val = 'admin';
            ELSE
                SET level_val = 'user';
            END IF;
        
            SET password_val = MD5(NEW.nim);
        
            INSERT INTO tb_user (username, password, level, id_asisten)
            VALUES (NEW.nim, password_val, level_val, NEW.id_asisten);
        END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `id_asisten` int(11) NOT NULL,
  `asisten_pembantu` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `ruang_lab` varchar(255) NOT NULL,
  `detail_kegiatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) UNSIGNED NOT NULL,
  `id_prakerin` int(11) NOT NULL,
  `disiplin` int(11) DEFAULT NULL,
  `kerja_motivasi` int(11) DEFAULT NULL,
  `kehadiran` int(11) DEFAULT NULL,
  `inisiatif_kreatif` int(11) DEFAULT NULL,
  `kejujuran_tanggung_jawab` int(11) DEFAULT NULL,
  `kesopanan` int(11) DEFAULT NULL,
  `kerjasama` int(11) DEFAULT NULL,
  `jumlah_nilai` int(11) DEFAULT NULL,
  `rata_rata` decimal(10,1) DEFAULT NULL,
  `predikat` varchar(32) DEFAULT NULL,
  `status_nilai` enum('Dinilai','Belum Dinilai') NOT NULL DEFAULT 'Belum Dinilai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_prakerin`, `disiplin`, `kerja_motivasi`, `kehadiran`, `inisiatif_kreatif`, `kejujuran_tanggung_jawab`, `kesopanan`, `kerjasama`, `jumlah_nilai`, `rata_rata`, `predikat`, `status_nilai`) VALUES
(4, 11, 89, 98, 80, 90, 93, 98, 87, 635, 90.7, 'Sempurna', 'Dinilai'),
(7, 18, 89, 87, 80, 65, 90, 78, 90, 579, 82.7, 'Pujian', 'Dinilai'),
(8, 20, 12, 98, 89, 78, 87, 56, 89, 509, 72.7, 'Pujian', 'Dinilai'),
(9, 21, 80, 80, 80, 80, 80, 80, 80, 560, 80.0, 'Pujian', 'Dinilai'),
(10, 22, 90, 90, 78, 89, 78, 78, 95, 598, 85.4, 'Pujian', 'Dinilai'),
(11, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Dinilai');

--
-- Triggers `tb_nilai`
--
DELIMITER $$
CREATE TRIGGER `set_predikat` BEFORE INSERT ON `tb_nilai` FOR EACH ROW BEGIN
    IF NEW.rata_rata BETWEEN 86 AND 100 THEN
        SET NEW.predikat = 'Sempurna';
    ELSEIF NEW.rata_rata BETWEEN 70 AND 85 THEN
        SET NEW.predikat = 'Pujian';
    ELSEIF NEW.rata_rata BETWEEN 60 AND 69 THEN
        SET NEW.predikat = 'Baik';
    ELSEIF NEW.rata_rata BETWEEN 50 AND 59 THEN
        SET NEW.predikat = 'Cukup';
    ELSEIF NEW.rata_rata BETWEEN 30 AND 49 THEN
        SET NEW.predikat = 'Kurang';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `set_predikat_before_update` BEFORE UPDATE ON `tb_nilai` FOR EACH ROW BEGIN
    IF NEW.rata_rata BETWEEN 86 AND 100 THEN
        SET NEW.predikat = 'Sempurna';
    ELSEIF NEW.rata_rata BETWEEN 70 AND 85 THEN
        SET NEW.predikat = 'Pujian';
    ELSEIF NEW.rata_rata BETWEEN 60 AND 69 THEN
        SET NEW.predikat = 'Baik';
    ELSEIF NEW.rata_rata BETWEEN 50 AND 59 THEN
        SET NEW.predikat = 'Cukup';
    ELSEIF NEW.rata_rata BETWEEN 30 AND 49 THEN
        SET NEW.predikat = 'Kurang';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_set_status_nilai` BEFORE INSERT ON `tb_nilai` FOR EACH ROW BEGIN
    IF NEW.disiplin IS NULL
       AND NEW.kerja_motivasi IS NULL
       AND NEW.kehadiran IS NULL
       AND NEW.inisiatif_kreatif IS NULL
       AND NEW.kejujuran_tanggung_jawab IS NULL
       AND NEW.kesopanan IS NULL
       AND NEW.kerjasama IS NULL
    THEN
        SET NEW.status_nilai = 'Belum Dinilai';
    ELSE
    	SET NEW.status_nilai = 'Dinilai';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_set_status_nilai_update` BEFORE UPDATE ON `tb_nilai` FOR EACH ROW BEGIN
    IF NEW.disiplin IS NULL
       AND NEW.kerja_motivasi IS NULL
       AND NEW.kehadiran IS NULL
       AND NEW.inisiatif_kreatif IS NULL
       AND NEW.kejujuran_tanggung_jawab IS NULL
       AND NEW.kesopanan IS NULL
       AND NEW.kerjasama IS NULL
    THEN
        SET NEW.status_nilai = 'Belum Dinilai';
    ELSE
    	SET NEW.status_nilai = 'Dinilai';
    END IF;
END
$$
DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_prakerin`
--

INSERT INTO `tb_prakerin` (`id_prakerin`, `nisn`, `npsn`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat_siswa`, `kelas`, `jurusan`, `no_hp_siswa`, `tahun_ajaran`, `nama_orang_tua`, `no_hp_orang_tua`, `periode_awal`, `periode_akhir`, `status_prakerin`) VALUES
(11, 98787675, 98787675, 'Nasyath Faykar', 'Pekalongan', '2002-11-30', 'Laki-laki', 'Jalan KH Ahmad Dahlan Tirto Gg. 7 No.31 Pekalongan Barat', '4M51', 'TKJ', '088806923500', '2023/2024', 'Nanang Akhmad Syamton', '088806923500', '2023-07-11', '2023-07-01', 'Pencabutan'),
(18, 2147483647, 87879098, 'Muhammad Nauval Azhar', 'Bogor', '2002-12-31', 'Laki-laki', 'Bogor, Jakarta', 'XII', 'TKJ', '085695685452', '2023/2024', 'Mukti Jaya', '085674569856', '2023-07-22', '2024-02-22', 'Aktif'),
(20, 2147483647, 2147483647, 'Hafid Firman Febrian', 'Pekalongan', '2004-01-01', 'Laki-laki', 'Pekalongan Barat', 'XII', 'RPL', '085695685452', '2023/2024', 'Wildan VK', '085674569856', '2023-07-23', '2023-07-23', 'Pencabutan'),
(21, 2147483647, 89898786, 'Julyan Rico Saputra', 'Pekalongan', '2004-01-01', 'Laki-laki', 'Pekalongan', 'XII', 'RPL', '085695685452', '2023/2024', 'Wildan VK', '085674569856', '2023-07-23', '2024-04-30', 'Aktif'),
(22, 2147483647, 67687675, 'Naila Azqiya', 'Pemalang', '2004-01-15', 'Perempuan', 'Jalan KH Ahmad Dahlan Tirto Gg. 7 No.31', 'X', 'TKJ', '088806923500', '2023/2024', 'Aminah', '08880678', '2023-10-03', '2023-10-31', 'Aktif'),
(23, 1234567890, 67687675, 'Haikal Syarif', 'Pekalongan', '2004-01-01', 'Laki-laki', 'Bendan', 'XII', 'RPL', '0888787578755', '2023/2024', 'Sodikin', '080878696788', '2023-10-01', '2023-10-09', 'Pencabutan');

--
-- Triggers `tb_prakerin`
--
DELIMITER $$
CREATE TRIGGER `tr_insert_update_status_prakerin` BEFORE INSERT ON `tb_prakerin` FOR EACH ROW BEGIN
                IF DATE(NEW.periode_akhir) < CURDATE() THEN
                    SET NEW.status_prakerin = 'Pencabutan';
                ELSE
                    SET NEW.status_prakerin = 'Aktif';
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_update_status_prakerin` BEFORE UPDATE ON `tb_prakerin` FOR EACH ROW BEGIN
                IF DATE(NEW.periode_akhir) < CURDATE() THEN
                    SET NEW.status_prakerin = 'Pencabutan';
                ELSE
                    SET NEW.status_prakerin = 'Aktif';
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_after_insert_prakerin` AFTER INSERT ON `tb_prakerin` FOR EACH ROW BEGIN
    INSERT INTO tb_nilai (id_prakerin, disiplin, kerja_motivasi, kehadiran, inisiatif_kreatif, kejujuran_tanggung_jawab, kesopanan, kerjasama, jumlah_nilai, rata_rata, predikat, status_nilai)
    VALUES (NEW.id_prakerin, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
END
$$
DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_smk`
--

INSERT INTO `tb_smk` (`npsn`, `nama_sekolah`, `status_sekolah`, `pembimbing_prakerin`, `no_hp_pembimbing`, `jurusan_terdaftar`, `alamat_sekolah`, `status_aktif`) VALUES
(67687675, 'SMK Baitussalam', 'Negeri', 'Astika Devy Paramitha', '088806923500', 'TKJ, RPL', 'Jalan KH Ahmad Dahlan Tirto Gg. 7 No.31, Pekalongan', 'Aktif'),
(87879098, 'SMK Negeri 1 Batang', 'Negeri', 'Ilham Yusuf Maulana', '098986897', 'TKJ, RPL', 'Batang Alun-alun', 'Aktif'),
(89898786, 'SMK Satya Praja Petarukan', 'Swasta', 'Muhammad Subagiyo', '088806923500', 'TKJ, RPL', 'Pekalongan Selatan', 'Aktif'),
(98787675, 'SMK Negeri 2 Pekalongan', 'Negeri', 'Danang Subagiyo, S.Kom', '088806923500', 'TKJ, RPL', 'Jalan Perintis Kemerdekaan No. 25', 'Aktif'),
(2147483647, 'SMK Negeri 4 Pekalongan', 'Negeri', 'Muhammad Subagiyo', '088806923500', 'TKJ, RPL', 'Pekalongan Selatan', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_asisten` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_asisten`, `username`, `password`, `level`) VALUES
(1, 1, '21.230.0194', '501108d0c41b2990b45da1e39bde5cff', 'admin'),
(2, 2, '21.230.0189', 'da292cc5b587278acdc032e5b8a1c820', 'user'),
(9, 8, '21.230.0173', '1c0764c33a0b93cdef124645111d4122', 'admin'),
(10, 9, '21.230.0187', '03b279e0b5af29f66139c77fe8dcd02c', 'user'),
(11, 10, '22.230.0065', '8dbf082f00b55482c6c1482d86613c38', 'admin'),
(12, 11, '22.230.0069', 'e0bf61eb7eef6745d2250cef2b816314', 'admin'),
(13, 12, '20.240.0065', 'd4b2a645efe30f2a2164ec1141cdcd73', 'user'),
(14, 13, '20.240.0021', 'dc67eac6e83c52a831a2a8662ee80434', 'user'),
(15, 14, '20.240.0067', 'f21dffec10f0ba2618df2222c997c9c6', 'user'),
(16, 15, '21.230.0193', '307cec0b115a03d2fef8e216d3a4aa78', 'user'),
(17, 16, '21.230.0018', '54344781651c85bf1ccc1e82a7fa5645', 'user'),
(18, 17, '21.230.0175', '365b4a5a9e902c5d006f1a29bfbe55ee', 'user'),
(19, 18, '21.230.0186', '6eef0f96deb03ea7e20486faec521f8a', 'user'),
(20, 19, '22.240.0165', '1b9bf57703978d67a635d805be37b6dd', 'user'),
(21, 20, '22.230.0044', '794f3a3d00d0402563b98e2d12135655', 'user'),
(22, 21, '22.240.0056', 'a37f859cc24f20bf7c78fd402ad52c74', 'user'),
(23, 22, '22.230.0092', 'fd7931a768cbce2fc5c8e904e3f2203a', 'user'),
(24, 23, '22.240.0095', 'abd8d1a59da403d39ded0015b022e2ea', 'user'),
(25, 24, '21.230.0046', '88a956e97bdbf40d07a0fcf4c760d7c2', 'admin'),
(26, 25, '22.230.0046', '46ce7ebec7a4f552c69eb87dd3eb4e4b', 'admin'),
(27, 26, '21.230.0136', '2f0480f50f42e8237e0f1e3e4083b196', 'user'),
(28, 27, '22.230.0038', '2e760d047a152b5cc679442f29826d93', 'user'),
(29, 28, '22.230.0117', '70227a3e80cb7ecdaf679d3bf12c4eaa', 'user'),
(30, 29, '21.230.0143', 'd7b42772dbcf57402a63cc18f53453cc', 'user'),
(31, 30, '21.240.0088', 'e16b18d12fbfeda3aee4cddeb31c6898', 'user'),
(32, 31, '21.230.0122', 'c39d7fcfedac5c3f516f9d97a85a14b7', 'user'),
(33, 32, '22.120.0026', '53f6f7b4cddfe3d24605660077e25943', 'user'),
(34, 33, '23.240.0017', 'eaeac746cc82725d1e9dfcef4ae12534', 'user'),
(35, 34, '22.230.0068', '4fd50a36ee44f8233f40e5c1147a7a5e', 'user'),
(36, 35, '20.240.0074', '3c45b0af1c1d9828a430772f9158f030', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_asisten`
--
ALTER TABLE `tb_asisten`
  ADD PRIMARY KEY (`id_asisten`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `tb_kegiatan_id_asisten_foreign` (`id_asisten`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_prakerin` (`id_prakerin`);

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
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_asisten` (`id_asisten`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_asisten`
--
ALTER TABLE `tb_asisten`
  MODIFY `id_asisten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_prakerin`
--
ALTER TABLE `tb_prakerin`
  MODIFY `id_prakerin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD CONSTRAINT `tb_kegiatan_id_asisten_foreign` FOREIGN KEY (`id_asisten`) REFERENCES `tb_asisten` (`id_asisten`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`id_prakerin`) REFERENCES `tb_prakerin` (`id_prakerin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_prakerin`
--
ALTER TABLE `tb_prakerin`
  ADD CONSTRAINT `tb_prakerin_npsn_foreign` FOREIGN KEY (`npsn`) REFERENCES `tb_smk` (`npsn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_asisten`) REFERENCES `tb_asisten` (`id_asisten`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_status_prakerin_event` ON SCHEDULE EVERY 3 HOUR STARTS '2023-07-05 13:12:43' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE tb_prakerin
SET status_prakerin = 'Pencabutan'
WHERE periode_akhir < CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
