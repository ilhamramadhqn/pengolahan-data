/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50737
 Source Host           : localhost:3306
 Source Schema         : pengolahan_data

 Target Server Type    : MySQL
 Target Server Version : 50737
 File Encoding         : 65001

 Date: 08/08/2022 11:25:29
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for anggota
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `id_mhs` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_penelitian` int(11) DEFAULT NULL,
  `no` decimal(8,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_anggota`) USING BTREE,
  KEY `FK_RELATIONSHIP_31` (`id_dosen`),
  KEY `FK_RELATIONSHIP_32` (`id_mhs`),
  KEY `FK_RELATIONSHIP_33` (`id_penelitian`),
  CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`),
  CONSTRAINT `anggota_ibfk_3` FOREIGN KEY (`id_penelitian`) REFERENCES `penelitian` (`id_penelitian`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of anggota
-- ----------------------------
BEGIN;
INSERT INTO `anggota` VALUES (1, 1, 1, 1, 1, NULL, NULL);
INSERT INTO `anggota` VALUES (2, 1, 3, 1, 2, NULL, NULL);
INSERT INTO `anggota` VALUES (3, 1, 1, 1, 12, '2022-07-28 01:50:48', '2022-07-28 01:50:48');
COMMIT;

-- ----------------------------
-- Table structure for artikel
-- ----------------------------
DROP TABLE IF EXISTS `artikel`;
CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL AUTO_INCREMENT,
  `id_jurnal` int(11) DEFAULT NULL,
  `id_penelitian` int(11) DEFAULT NULL,
  `id_semester` int(11) DEFAULT NULL,
  `volume` decimal(8,0) DEFAULT NULL,
  `no_jurnal` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `judul_artikel` varchar(200) DEFAULT NULL,
  `link` varchar(1024) DEFAULT NULL,
  `file_artikel` varchar(1024) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_artikel`) USING BTREE,
  KEY `FK_RELATIONSHIP_20` (`id_penelitian`),
  KEY `FK_RELATIONSHIP_5` (`id_jurnal`),
  KEY `FK_RELATIONSHIP_6` (`id_semester`),
  CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_penelitian`) REFERENCES `penelitian` (`id_penelitian`),
  CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_jurnal`) REFERENCES `jurnal` (`id_jurnal`),
  CONSTRAINT `artikel_ibfk_3` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of artikel
-- ----------------------------
BEGIN;
INSERT INTO `artikel` VALUES (1, 1, 1, 13, 15, '2', '2021-07-31', 'PERBANDINGAN ALGORITMA KLASIFIKASI DATA MINING UNTUK PENELUSURAN POTENSI MINAT CALON MAHASISWA BARU', 'https://journal.uniku.ac.id/index.php/ilkom/article/view/4162', NULL, 'P', NULL, '2022-08-07 13:48:55');
COMMIT;

-- ----------------------------
-- Table structure for dana
-- ----------------------------
DROP TABLE IF EXISTS `dana`;
CREATE TABLE `dana` (
  `id_sumber` int(11) NOT NULL AUTO_INCREMENT,
  `sumber_dana` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sumber`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of dana
-- ----------------------------
BEGIN;
INSERT INTO `dana` VALUES (1, 'HIBAH INTERNAL UNIBI', NULL, NULL);
INSERT INTO `dana` VALUES (2, 'KEMENDIKBUD-RISTEK', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodi` int(11) DEFAULT NULL,
  `kode_dosen` char(3) DEFAULT NULL,
  `nidn` char(10) DEFAULT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `jabfung_dosen` varchar(20) DEFAULT NULL,
  `alamat_dosen` varchar(50) DEFAULT NULL,
  `kota_dosen` varchar(25) DEFAULT NULL,
  `provinsi_dosen` varchar(25) DEFAULT NULL,
  `telp_dosen` varchar(25) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_dosen`) USING BTREE,
  KEY `FK_RELATIONSHIP_2` (`id_prodi`),
  CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of dosen
-- ----------------------------
BEGIN;
INSERT INTO `dosen` VALUES (1, 3, 'BUD', '0407118203', 'BUDIMAN, S.T., M.KOM', 'LEKTOR', 'SEKELOA TIMUR NO. 200A RT.006/RW.003', 'KOTA BANDUNG', 'JAWA BARAT', '087822899638', 'budiman1982@gmail.com', NULL, NULL);
INSERT INTO `dosen` VALUES (2, 4, 'MAR', '0406107902', 'MARWONDO, S.T., M.KOM.', 'ASISTEN AHLI', '-', 'KOTA BANDUNG', 'JAWA BARAT', '-', 'marwondo@unibi.ac.id', NULL, NULL);
INSERT INTO `dosen` VALUES (3, 3, 'ZTN', '0410029301', 'ZATIN NIQOTAINI, S.TR., M.KOM.', 'ASISTEN AHLI', '-', 'KOTA BANDUNG', 'JAWA BARAT', '-', '-', NULL, NULL);
INSERT INTO `dosen` VALUES (4, 3, 'VMN', '1023069001', ' VANI MAHARANI NASUTION, S.KOM., M.KOM.', 'LEKTOR', '-', '-', '-', '-', '-', NULL, NULL);
INSERT INTO `dosen` VALUES (7, 5, 'TST', '0407118205', 'JASMAN PARDEDE TEST', 'REKTOR TEST', 'Test alamat test', 'KOTA JAKARTA', 'JAWA TIMUR', '0980899', 'testemailtest@gmail.com', '2022-08-07 01:14:22', '2022-08-07 01:36:40');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for fakultas
-- ----------------------------
DROP TABLE IF EXISTS `fakultas`;
CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL AUTO_INCREMENT,
  `kode_fakultas` char(4) DEFAULT NULL,
  `nama_fakultas` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_fakultas`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of fakultas
-- ----------------------------
BEGIN;
INSERT INTO `fakultas` VALUES (1, 'FTI', 'Fakultas Teknologi dan Informatika', NULL, NULL);
INSERT INTO `fakultas` VALUES (2, 'FSD', 'Fakultas Senirupa dan Design', '2022-07-15 00:16:01', '2022-07-15 00:16:01');
INSERT INTO `fakultas` VALUES (3, 'FKD', 'Fakultas Kedokteran', '2022-07-15 00:16:52', '2022-07-15 00:16:52');
COMMIT;

-- ----------------------------
-- Table structure for hki
-- ----------------------------
DROP TABLE IF EXISTS `hki`;
CREATE TABLE `hki` (
  `id_hki` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis_hki` int(11) DEFAULT NULL,
  `no_hki` varchar(20) DEFAULT NULL,
  `tanggal_permohonan` date DEFAULT NULL,
  `judul_hki` varchar(200) DEFAULT NULL,
  `file_hki` varchar(100) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_hki`) USING BTREE,
  KEY `FK_RELATIONSHIP_29` (`id_jenis_hki`),
  CONSTRAINT `hki_ibfk_1` FOREIGN KEY (`id_jenis_hki`) REFERENCES `jenis_hki` (`id_jenis_hki`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of hki
-- ----------------------------
BEGIN;
INSERT INTO `hki` VALUES (1, 1, 'EC00202218177', '2022-03-16', 'Aplikasi Absensi Online Untuk Menunjang Efektifitas Kehadiran Berbasis Mobile', '', 'P', NULL, NULL);
INSERT INTO `hki` VALUES (2, 1, 'EC00202019721', '2020-06-25', 'TALENTA CBT (APLIKASI COMPUTER BASED TEST DALAM PENILAIAN HARIAN SECARA ONLINE BERBASIS WEB)', '', 'P', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for jenis_hki
-- ----------------------------
DROP TABLE IF EXISTS `jenis_hki`;
CREATE TABLE `jenis_hki` (
  `id_jenis_hki` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_hki` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_hki`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of jenis_hki
-- ----------------------------
BEGIN;
INSERT INTO `jenis_hki` VALUES (1, 'PROGRAM KOMPUTER', NULL, NULL);
INSERT INTO `jenis_hki` VALUES (2, 'ARTIKEL ILMIAH', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for jenis_jurnal
-- ----------------------------
DROP TABLE IF EXISTS `jenis_jurnal`;
CREATE TABLE `jenis_jurnal` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of jenis_jurnal
-- ----------------------------
BEGIN;
INSERT INTO `jenis_jurnal` VALUES (1, 'JURNAL PENELITIAN TIDAK TERAKREDITASI', NULL, NULL);
INSERT INTO `jenis_jurnal` VALUES (2, 'JURNAL PENELITIAN NASIONAL TERAKREDITASI', NULL, NULL);
INSERT INTO `jenis_jurnal` VALUES (3, 'JURNAL PENELITIAN INTERNASIONAL', NULL, NULL);
INSERT INTO `jenis_jurnal` VALUES (4, 'JURNAL PENELITIAN INTERNASIONAL BEREPUTASI', NULL, NULL);
INSERT INTO `jenis_jurnal` VALUES (5, 'SEMINAR WILAYAH/LOKAL/PERGURUAN TINGGI', NULL, NULL);
INSERT INTO `jenis_jurnal` VALUES (6, 'SEMINAR NASIONAL', NULL, NULL);
INSERT INTO `jenis_jurnal` VALUES (7, 'SEMINAR INTERNASIONAL', NULL, NULL);
INSERT INTO `jenis_jurnal` VALUES (8, 'TULISAN DI MEDIA MASSA WILAYAH', NULL, NULL);
INSERT INTO `jenis_jurnal` VALUES (9, 'TULISAN DI MEDIA MASSA NASIONAL', NULL, NULL);
INSERT INTO `jenis_jurnal` VALUES (10, 'TULISAN DI MEDIA MASSA INTERNASIONAL', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for jenis_penelitian
-- ----------------------------
DROP TABLE IF EXISTS `jenis_penelitian`;
CREATE TABLE `jenis_penelitian` (
  `id_jenis_penelitian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis_penelitian` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_penelitian`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of jenis_penelitian
-- ----------------------------
BEGIN;
INSERT INTO `jenis_penelitian` VALUES (1, 'PENELITIAN DOSEN PEMULA', NULL, NULL);
INSERT INTO `jenis_penelitian` VALUES (2, 'PENELITIAN DASAR', NULL, NULL);
INSERT INTO `jenis_penelitian` VALUES (3, 'PENELITIAN TERAPAN', NULL, NULL);
INSERT INTO `jenis_penelitian` VALUES (4, 'PENELITIAN PENGEMBANGAN', NULL, NULL);
INSERT INTO `jenis_penelitian` VALUES (5, 'PENELITIAN KERJASAMA ANTAR PERGURUAN TINGGI (PKPT)', NULL, NULL);
INSERT INTO `jenis_penelitian` VALUES (6, 'PENELITIAN PASCASARJANA', NULL, NULL);
INSERT INTO `jenis_penelitian` VALUES (7, 'PENELITIAN DASAR UNGGULAN PERGURUAN TINGGI (PDUPT)', NULL, NULL);
INSERT INTO `jenis_penelitian` VALUES (8, ' PENELITIAN TERAPAN UNGGULAN PERGURUAN TINGGI', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for jurnal
-- ----------------------------
DROP TABLE IF EXISTS `jurnal`;
CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` int(11) DEFAULT NULL,
  `nama_jurnal` varchar(50) DEFAULT NULL,
  `penerbit_jurnal` varchar(50) DEFAULT NULL,
  `pssn_jurnal` varchar(10) DEFAULT NULL,
  `eissn_jurnal` varchar(10) DEFAULT NULL,
  `link_website` varchar(1024) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_jurnal`) USING BTREE,
  KEY `FK_RELATIONSHIP_4` (`id_jenis`),
  CONSTRAINT `jurnal_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_jurnal` (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of jurnal
-- ----------------------------
BEGIN;
INSERT INTO `jurnal` VALUES (1, 2, 'NUANSA INFORMATIKA', 'FAKULTAS ILMU KOMPUTER UNIKU', '1858-3911', '2614-5405', 'https://journal.uniku.ac.id/index.php/ilkom', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodi` int(11) DEFAULT NULL,
  `npm` varchar(15) DEFAULT NULL,
  `nama_mhs` varchar(50) DEFAULT NULL,
  `kelas` varchar(15) DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_mhs`) USING BTREE,
  KEY `FK_RELATIONSHIP_3` (`id_prodi`),
  CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
BEGIN;
INSERT INTO `mahasiswa` VALUES (1, 3, '18121028', 'PERMANA SIDIK', 'KARYAWAN', 2018, NULL, NULL);
INSERT INTO `mahasiswa` VALUES (2, 4, '19111003', 'DEDI ISKANDAR', 'KARYAWAN', 2019, NULL, NULL);
INSERT INTO `mahasiswa` VALUES (3, 3, '17121005', 'DADAN HAMDANI', 'KARYAWAN', 2017, NULL, NULL);
INSERT INTO `mahasiswa` VALUES (4, 4, '15111004', 'AMOS DUAN NUGROHO', 'KARYAWAN', 2015, NULL, NULL);
INSERT INTO `mahasiswa` VALUES (7, 4, '16123211', 'NASA TEST UPDATE', 'KARYAWAN', 2022, '2022-08-07 01:57:24', '2022-08-07 01:57:24');
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_03_14_162641_create_fakultas_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_04_12_092316_create_prodi_tabel', 1);
INSERT INTO `migrations` VALUES (7, '2022_04_12_092418_create_dosen_tabel', 1);
INSERT INTO `migrations` VALUES (8, '2022_04_12_092632_create_mahasiswa_tabel', 1);
INSERT INTO `migrations` VALUES (9, '2022_04_12_092759_create_jenis_publikasi_tabel', 1);
INSERT INTO `migrations` VALUES (10, '2022_04_12_092934_create_kategori_jurnal_tabel', 1);
INSERT INTO `migrations` VALUES (11, '2022_04_12_093119_create_pkm_tabel', 1);
INSERT INTO `migrations` VALUES (12, '2022_04_12_105506_create_peneliti_tabel', 1);
INSERT INTO `migrations` VALUES (13, '2022_04_12_114256_create_daftar_penelitian_tabel', 1);
INSERT INTO `migrations` VALUES (14, '2022_04_12_152100_create_hakcipta_tabel', 1);
COMMIT;

-- ----------------------------
-- Table structure for mitra
-- ----------------------------
DROP TABLE IF EXISTS `mitra`;
CREATE TABLE `mitra` (
  `id_mitra` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mitra` varchar(100) DEFAULT NULL,
  `alamat_mitra` varchar(60) DEFAULT NULL,
  `kota_mitra` varchar(30) DEFAULT NULL,
  `provinsi_mitra` varchar(20) DEFAULT NULL,
  `pic_mitra` varchar(25) DEFAULT NULL,
  `telepon_mitra` varchar(25) DEFAULT NULL,
  `email_mitra` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_mitra`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mitra
-- ----------------------------
BEGIN;
INSERT INTO `mitra` VALUES (1, 'IKATAN GURU TAMAN KANAK-KANAK INDONESIA (IGTKI) BANDUNG', 'JL. PALASARI NO.5, LKR. SEL., KEC. LENGKONG', 'KOTA BANDUNG', 'JAWA BARAT', '-', '-', '-', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for pelaksana
-- ----------------------------
DROP TABLE IF EXISTS `pelaksana`;
CREATE TABLE `pelaksana` (
  `id_dosen` int(11) DEFAULT NULL,
  `id_pkm` int(11) DEFAULT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_pelaksana` int(11) NOT NULL AUTO_INCREMENT,
  `no` decimal(8,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pelaksana`) USING BTREE,
  KEY `FK_RELATIONSHIP_12` (`id_pkm`),
  KEY `FK_RELATIONSHIP_22` (`id_dosen`),
  KEY `FK_RELATIONSHIP_23` (`id_mhs`),
  CONSTRAINT `pelaksana_ibfk_1` FOREIGN KEY (`id_pkm`) REFERENCES `pkm` (`id_pkm`),
  CONSTRAINT `pelaksana_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`),
  CONSTRAINT `pelaksana_ibfk_3` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pelaksana
-- ----------------------------
BEGIN;
INSERT INTO `pelaksana` VALUES (1, 1, 1, 1, 1, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for pencipta
-- ----------------------------
DROP TABLE IF EXISTS `pencipta`;
CREATE TABLE `pencipta` (
  `id_pencipta` int(11) NOT NULL AUTO_INCREMENT,
  `id_hki` int(11) DEFAULT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `no` decimal(8,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pencipta`) USING BTREE,
  KEY `FK_RELATIONSHIP_26` (`id_hki`),
  KEY `FK_RELATIONSHIP_27` (`id_mhs`),
  KEY `FK_RELATIONSHIP_28` (`id_dosen`),
  CONSTRAINT `pencipta_ibfk_1` FOREIGN KEY (`id_hki`) REFERENCES `hki` (`id_hki`),
  CONSTRAINT `pencipta_ibfk_2` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`),
  CONSTRAINT `pencipta_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pencipta
-- ----------------------------
BEGIN;
INSERT INTO `pencipta` VALUES (5, 1, 3, NULL, 1, NULL, NULL);
INSERT INTO `pencipta` VALUES (6, 1, NULL, 1, 2, NULL, NULL);
INSERT INTO `pencipta` VALUES (7, 1, NULL, 3, 3, NULL, NULL);
INSERT INTO `pencipta` VALUES (8, 2, 4, NULL, 1, NULL, NULL);
INSERT INTO `pencipta` VALUES (9, 2, NULL, 1, 2, NULL, NULL);
INSERT INTO `pencipta` VALUES (10, 2, NULL, 4, 3, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for penelitian
-- ----------------------------
DROP TABLE IF EXISTS `penelitian`;
CREATE TABLE `penelitian` (
  `id_penelitian` int(11) NOT NULL AUTO_INCREMENT,
  `id_sumber` int(11) DEFAULT NULL,
  `id_jenis_penelitian` int(11) DEFAULT NULL,
  `id_semester` int(11) DEFAULT NULL,
  `judul_penelitian` varchar(1024) DEFAULT NULL,
  `tahun` decimal(8,0) DEFAULT NULL,
  `file_proposal` varchar(1024) DEFAULT NULL,
  `file_laporan_akhir` varchar(1024) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penelitian`) USING BTREE,
  KEY `FK_RELATIONSHIP_18` (`id_jenis_penelitian`),
  KEY `FK_RELATIONSHIP_19` (`id_semester`),
  KEY `FK_RELATIONSHIP_21` (`id_sumber`),
  CONSTRAINT `penelitian_ibfk_1` FOREIGN KEY (`id_jenis_penelitian`) REFERENCES `jenis_penelitian` (`id_jenis_penelitian`),
  CONSTRAINT `penelitian_ibfk_2` FOREIGN KEY (`id_semester`) REFERENCES `semester` (`id_semester`),
  CONSTRAINT `penelitian_ibfk_3` FOREIGN KEY (`id_sumber`) REFERENCES `dana` (`id_sumber`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of penelitian
-- ----------------------------
BEGIN;
INSERT INTO `penelitian` VALUES (1, 2, 1, 11, 'PERBANDINGAN ALGORITMA KLASIFIKASI DATA MINING PADA PENELUSURAN POTENSI MINAT CALON MAHASISWA BARU', 2021, NULL, NULL, 'P', NULL, NULL);
INSERT INTO `penelitian` VALUES (2, 2, 2, 2, 'TEST PENELITIAN', 2021, NULL, NULL, 'P', '2022-08-07 08:08:56', '2022-08-07 10:51:36');
COMMIT;

-- ----------------------------
-- Table structure for penulis
-- ----------------------------
DROP TABLE IF EXISTS `penulis`;
CREATE TABLE `penulis` (
  `id_artikel` int(11) DEFAULT NULL,
  `id_mhs` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_penulis` int(11) NOT NULL AUTO_INCREMENT,
  `no` decimal(8,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_penulis`) USING BTREE,
  KEY `FK_RELATIONSHIP_10` (`id_mhs`),
  KEY `FK_RELATIONSHIP_8` (`id_artikel`),
  KEY `FK_RELATIONSHIP_9` (`id_dosen`),
  CONSTRAINT `penulis_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`),
  CONSTRAINT `penulis_ibfk_2` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`),
  CONSTRAINT `penulis_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of penulis
-- ----------------------------
BEGIN;
INSERT INTO `penulis` VALUES (1, NULL, 1, 1, 1, NULL, NULL);
INSERT INTO `penulis` VALUES (1, NULL, 3, 2, 2, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Table structure for pkm
-- ----------------------------
DROP TABLE IF EXISTS `pkm`;
CREATE TABLE `pkm` (
  `id_pkm` int(11) NOT NULL AUTO_INCREMENT,
  `id_sumber` int(11) DEFAULT NULL,
  `id_mitra` int(11) DEFAULT NULL,
  `judul_kegiatan` varchar(1024) DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `file_proposal` varchar(1024) DEFAULT NULL,
  `file_laporan_akhir` varchar(1024) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pkm`) USING BTREE,
  KEY `FK_RELATIONSHIP_13` (`id_mitra`),
  KEY `FK_RELATIONSHIP_14` (`id_sumber`),
  CONSTRAINT `pkm_ibfk_1` FOREIGN KEY (`id_mitra`) REFERENCES `mitra` (`id_mitra`),
  CONSTRAINT `pkm_ibfk_2` FOREIGN KEY (`id_sumber`) REFERENCES `dana` (`id_sumber`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of pkm
-- ----------------------------
BEGIN;
INSERT INTO `pkm` VALUES (1, 1, 1, 'Pelatihan Microsoft Office 2016 Bagi Guru TK Anggota IGTKI Kota Bandung Gelombang 1 Kelompok B', '2022-08-08', '2022-08-10', NULL, NULL, 'P', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for prodi
-- ----------------------------
DROP TABLE IF EXISTS `prodi`;
CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `id_fakultas` int(11) DEFAULT NULL,
  `kode_prodi` char(3) DEFAULT NULL,
  `nama_prodi` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_prodi`) USING BTREE,
  KEY `FK_RELATIONSHIP_1` (`id_fakultas`),
  CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of prodi
-- ----------------------------
BEGIN;
INSERT INTO `prodi` VALUES (3, 1, 'SI', 'Sistem Informasi', NULL, NULL);
INSERT INTO `prodi` VALUES (4, 1, 'IF', 'Informatika', NULL, NULL);
INSERT INTO `prodi` VALUES (5, 1, 'DKV', 'Design Komunikasi Visual', '2022-07-22 08:37:13', '2022-07-22 08:37:13');
INSERT INTO `prodi` VALUES (6, 1, 'TE', 'Teknik Elektro', '2022-07-22 08:39:01', '2022-07-22 08:39:01');
COMMIT;

-- ----------------------------
-- Table structure for semester
-- ----------------------------
DROP TABLE IF EXISTS `semester`;
CREATE TABLE `semester` (
  `id_semester` int(11) NOT NULL AUTO_INCREMENT,
  `nama_semester` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_semester`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of semester
-- ----------------------------
BEGIN;
INSERT INTO `semester` VALUES (1, 'GANJIL 2015/2016', NULL, NULL);
INSERT INTO `semester` VALUES (2, 'GENAP 2015/2016', NULL, NULL);
INSERT INTO `semester` VALUES (3, 'GANJIL 2016/2017', NULL, NULL);
INSERT INTO `semester` VALUES (4, 'GENAP 2016/2017', NULL, NULL);
INSERT INTO `semester` VALUES (5, 'GANJIL 2017/2018', NULL, NULL);
INSERT INTO `semester` VALUES (6, 'GENAP 2017/2018', NULL, NULL);
INSERT INTO `semester` VALUES (7, 'GANJIL 2018/2019', NULL, NULL);
INSERT INTO `semester` VALUES (8, 'GENAP 2018/2019', NULL, NULL);
INSERT INTO `semester` VALUES (9, 'GANJIL 2019/2020', NULL, NULL);
INSERT INTO `semester` VALUES (10, 'GENAP 2019/2020', NULL, NULL);
INSERT INTO `semester` VALUES (11, 'GANJIL 2020/2021', NULL, NULL);
INSERT INTO `semester` VALUES (12, 'GENAP 2020/2021', NULL, NULL);
INSERT INTO `semester` VALUES (13, 'GENAP 2022/2023', NULL, '2022-08-06 20:13:08');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (3, 'SUPER ADMIN', 'SUPERADMIN', '1111', NULL, '$2y$10$g8a63nzDGZpvJOtRSDrSQOd8MCefg5xv61R.TrzUIS6YIXaU1oNPm', NULL, '2022-08-08 10:58:02', '2022-08-08 10:58:05');
INSERT INTO `users` VALUES (19, 'Nicolas', 'MAHASISWA', '132017226', NULL, '$2y$10$xjhxc3XbeEqDjbBcqLFog.AohnYrj.ACYO7J.dLc1EJdRkfs.klBO', NULL, '2022-08-08 04:03:13', '2022-08-08 04:03:13');
INSERT INTO `users` VALUES (22, 'Arief Muhammad', 'ADMIN', '0407128233', NULL, '$2y$10$kNXCdrh5HX8wqSkYudbk..2YdhMRx0PKPipMv0ggTKo.bdsdX2q7u', NULL, '2022-08-08 04:22:18', '2022-08-08 04:22:18');
INSERT INTO `users` VALUES (23, 'Paulus N', 'DEKAN', '0407148513', NULL, '$2y$10$bXNKhrIdqldTQJy0z9OMSOD2OfKXkISpR4ZPy1Y1Rho9X8qG1FdLe', NULL, '2022-08-08 04:23:35', '2022-08-08 04:23:35');
INSERT INTO `users` VALUES (24, 'Nasa L', 'DOSEN', '0407118203', NULL, '$2y$10$6DiyJryV/sdMmeYE5t8W7uGIL19sntZK7WkC.F3XMf0plcQcHBWPG', NULL, '2022-08-08 04:24:04', '2022-08-08 04:24:04');
INSERT INTO `users` VALUES (25, 'Nicolas S', 'MAHASISWA', '18121028', NULL, '$2y$10$6thQZxfBkZNyN1mKxfbqbebRcVSLw8AKmncLG/b2paC7G5Upiy1sq', NULL, '2022-08-08 04:24:37', '2022-08-08 04:24:37');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
