-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 11:04 AM
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
  `jabatan` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_asisten`
--

INSERT INTO `tb_asisten` (`id_asisten`, `nama_asisten`, `nim`, `no_hp`, `email`, `alamat`, `jabatan`, `id_user`, `status`) VALUES
(1, 'Nasyath Faykar', '21.230.0194', '08123456789', 'koor@uptkomp.com', 'Jl. Jalan', 'Koordinator', 1, 'Aktif');

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
(1, 1, 'Nasyath Faykar', '2023-07-06', '14:34:00', 'Lab Komputer 2', 'fdggf');

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
(10034336, 'Fa Yolanda (Persero) Tbk', 'Swasta', 'Suci Zulaika S.E.I', '10903992', 'AK', 'Jln. Radio No. 867, Sibolga 26533, Jabar', 'Aktif'),
(17054901, 'PT Susanti Yolanda', 'Negeri', 'Marsudi Wijaya', '44149440', 'MM', 'Psr. Baja Raya No. 771, Mojokerto 91379, Kalteng', 'Aktif'),
(22665693, 'Perum Nababan Halim (Persero) Tbk', 'Negeri', 'Cagak Vega Prasasta S.Pd', '53641641', 'AK', 'Ds. Jend. A. Yani No. 499, Banjarbaru 50212, Bengkulu', 'Aktif'),
(30420393, 'PJ Saptono Rahimah', 'Swasta', 'Violet Pudjiastuti', '98980266', 'RPL', 'Gg. Nakula No. 863, Mataram 67512, Kaltim', 'Aktif'),
(36890460, 'PJ Fujiati', 'Negeri', 'Raden Prasetyo', '68887007', 'TKJ', 'Ds. Supomo No. 947, Palembang 84148, Malut', 'Aktif'),
(60055035, 'PJ Haryanto Sinaga', 'Negeri', 'Daniswara Suryono', '85007257', 'RPL', 'Gg. Halim No. 157, Probolinggo 88576, Jambi', 'Aktif'),
(63884925, 'Perum Pertiwi Suryatmi Tbk', 'Swasta', 'Prasetyo Gading Jailani S.Pd', '94460982', 'MM', 'Ds. Banceng Pondok No. 300, Singkawang 59902, Sumbar', 'Aktif'),
(66244920, 'Fa Laksmiwati Safitri', 'Swasta', 'Aisyah Yuliarti', '59381658', 'RPL', 'Psr. Baha No. 725, Sukabumi 25487, NTT', 'Aktif'),
(79076962, 'Yayasan Lestari', 'Swasta', 'Nugraha Gada Adriansyah S.Pd', '74840278', 'TKJ', 'Ki. Baing No. 499, Surabaya 20300, Riau', 'Aktif'),
(98930959, 'Yayasan Permata Situmorang', 'Negeri', 'Rendy Marbun', '73730952', 'AK', 'Ki. Wahidin No. 970, Surabaya 30848, Jabar', 'Aktif');

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
(1, 1, '21.230.0194', '501108d0c41b2990b45da1e39bde5cff', 'admin');

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
  MODIFY `id_asisten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_prakerin`
--
ALTER TABLE `tb_prakerin`
  MODIFY `id_prakerin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_asisten`
--
ALTER TABLE `tb_asisten`
  ADD CONSTRAINT `tb_asisten_ibfk_1` FOREIGN KEY (`id_asisten`) REFERENCES `tb_user` (`id_asisten`) ON DELETE CASCADE ON UPDATE CASCADE;

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
