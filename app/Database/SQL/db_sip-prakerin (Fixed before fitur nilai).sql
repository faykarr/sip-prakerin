-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 06:37 AM
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
(1, '2023-06-07-162922', 'App\\Database\\Migrations\\UserTable', 'default', 'App', 1688650240, 1),
(2, '2023-06-25-155242', 'App\\Database\\Migrations\\SMKTable', 'default', 'App', 1688650240, 1),
(3, '2023-07-02-090554', 'App\\Database\\Migrations\\PrakerinTable', 'default', 'App', 1688650240, 1),
(4, '2023-07-02-180332', 'App\\Database\\Migrations\\AsistenTable', 'default', 'App', 1688650240, 1),
(5, '2023-07-05-150449', 'App\\Database\\Migrations\\KegiatanTable', 'default', 'App', 1688650240, 1),
(6, '2023-07-06-120720', 'App\\Database\\Migrations\\NilaiTable', 'default', 'App', 1688650240, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_asisten`
--

INSERT INTO `tb_asisten` (`id_asisten`, `nama_asisten`, `nim`, `no_hp`, `email`, `alamat`, `jabatan`, `status`) VALUES
(1, 'Nasyath Faykar', '21.230.0194', '08123456789', 'koor@uptkomp.com', 'Jl. Jalan', 'Koordinator', 'Aktif'),
(2, 'Muhammad Fadli', '21.230.0189', '088806923500', 'fadli@uptkomp.com', 'Jalan KH Ahmad Dahlan Tirto Gg. 7 No.31', 'Asisten', 'Aktif'),
(3, 'Zaky Farid Harun', '21.230.0175', '085468958756', 'zhidar@uptkomp.com', 'Batang, Alun-alun', 'Administrator', 'Aktif'),
(4, 'RR. Nadia Amalia Putri', '21.230.0144', '085658956875', 'nadia@uptkomp.com', 'Bumirejo, Kec. Pekalongan Barat, Kota Pekalongan', 'Asisten', 'Aktif'),
(5, 'Melidya Sholehati Kurniadani', '21.230.0043', '085645821535', 'meli@uptkomp.com', 'Batang, Alun-alun', 'Asisten', 'Aktif');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `id_asisten`, `asisten_pembantu`, `tanggal`, `waktu`, `ruang_lab`, `detail_kegiatan`) VALUES
(1, 1, 'Nasyath Faykar', '2023-07-08', '14:34:00', 'Lab Komputer 2', 'Maintenance & pembersihan lab komputer 2'),
(2, 1, 'Melidya Sholehati Kurniadani', '2023-07-12', '01:30:00', 'Lab Komputer 6', 'Tutorial membuat game 2D menggunakan Construct 2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) UNSIGNED NOT NULL,
  `id_prakerin` int(11) NOT NULL,
  `nilai_absensi` int(11) NOT NULL,
  `nilai_sikap` int(11) NOT NULL,
  `nilai_pengetahuan` int(11) NOT NULL,
  `nilai_keterampilan` int(11) NOT NULL,
  `nilai_akhir` int(11) NOT NULL,
  `nilai_rata_rata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(11, 98787675, 98787675, 'Nasyath Faykar', 'Pekalongan', '2002-11-30', 'Laki-laki', 'Jalan KH Ahmad Dahlan Tirto Gg. 7 No.31 Pekalongan Barat', '4M51', 'TKJ', '088806923500', '2023/2024', 'Nanang Akhmad Syamton', '088806923500', '2023-07-11', '2023-07-01', 'Pencabutan'),
(12, 2147483647, 2147483647, 'Muhammad Nauval Azhar', 'Bogor', '2002-12-07', 'Laki-laki', 'Petarukan', 'XII', 'TKJ', '085695685452', '2023/2024', 'Mukti Jaya', '085696535215', '2023-07-01', '2023-11-30', 'Aktif'),
(13, 98787675, 98787675, 'Haikal Syarif', 'Kota Pemalang', '2002-10-18', 'Perempuan', 'Pekalongan, Tirto', 'XII', 'RPL', '085695685452', '2023/2024', 'Mukti Jaya', '085696535215', '2023-07-06', '2023-07-22', 'Aktif'),
(14, 98787675, 98787675, 'Hafid Firman Febrian', 'Bogor', '2002-01-19', 'Laki-laki', 'Samborejo, Kec. Pekalongan Barat', 'X', 'MM', '088845896525', '2023/2024', 'Wildan VK', '085674569856', '2023-07-04', '2023-07-12', 'Aktif');

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
(98787675, 'SMK Negeri 2 Pekalongan', 'Negeri', 'Danang Subagiyo, S.Kom', '088806923500', 'TKJ, RPL', 'Jalan Perintis Kemerdekaan No. 25', 'Aktif'),
(2147483647, 'SMK Satya Praja Petarukan', 'Swasta', 'Ghufron, S.Kom', '085695623545', 'TKJ, RPL', 'Petarukan', 'Aktif');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_asisten`, `username`, `password`, `level`) VALUES
(1, 1, '21.230.0194', '501108d0c41b2990b45da1e39bde5cff', 'admin'),
(2, 2, '21.230.0189', 'da292cc5b587278acdc032e5b8a1c820', 'user'),
(3, 3, '21.230.0175', '365b4a5a9e902c5d006f1a29bfbe55ee', 'admin'),
(4, 4, '21.230.0144', '6d5de4b160a3bbe5cc76ead0856a1790', 'user'),
(5, 5, '21.230.0043', 'e5df719e857e38ee4f3c5e5b7bab492d', 'user');

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_asisten`
--
ALTER TABLE `tb_asisten`
  MODIFY `id_asisten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_prakerin`
--
ALTER TABLE `tb_prakerin`
  MODIFY `id_prakerin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
CREATE DEFINER=`root`@`localhost` EVENT `update_status_prakerin_event` ON SCHEDULE EVERY 1 DAY STARTS '2023-07-05 13:12:43' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE tb_prakerin
SET status_prakerin = 'Pencabutan'
WHERE periode_akhir < CURDATE()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
