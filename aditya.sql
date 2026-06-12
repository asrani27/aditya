/*
 Navicat Premium Dump SQL

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80043 (8.0.43)
 Source Host           : localhost:3306
 Source Schema         : aditya

 Target Server Type    : MySQL
 Target Server Version : 80043 (8.0.43)
 File Encoding         : 65001

 Date: 12/06/2026 13:58:26
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for biaya
-- ----------------------------
DROP TABLE IF EXISTS `biaya`;
CREATE TABLE `biaya` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `biaya_kode_unique` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of biaya
-- ----------------------------
BEGIN;
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (1, 'B001', 'Semen', 'Semen untuk konstruksi bangunan', 75000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (2, 'B002', 'Besi Beton', 'Besi tulangan untuk struktur beton', 150000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (3, 'B003', 'Pasir', 'Pasir halus untuk adukan mortar', 250000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (4, 'B004', 'Batu Bata', 'Batu bata merah untuk dinding', 500, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (5, 'B005', 'Kayu Balok', 'Kayu jati untuk bekisting', 350000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (6, 'B006', 'Pipa PVC 4 inch', 'Pipa saluran air ukuran 4 inch', 85000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (7, 'B007', 'Keramik 40x40', 'Keramik lantai ukuran 40x40 cm', 55000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (8, 'B008', 'Cat Dinding', 'Cat tembok untuk finishing interior', 125000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (9, 'B009', 'Kusen Pintu Aluminium', 'Kusen aluminium untuk pintu', 450000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (10, 'B010', 'Paku', 'Paku berbagai ukuran', 25000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (11, 'B011', 'Baut dan Mur', 'Set baut mur untuk struktur', 35000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `biaya` (`id`, `kode`, `nama`, `deskripsi`, `harga`, `created_at`, `updated_at`) VALUES (12, 'B012', 'Kaca Tempered', 'Kaca tempered untuk jendela', 250000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
COMMIT;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for cache_locks
-- ----------------------------
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cache_locks
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_kode_customer_unique` (`kode_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of customer
-- ----------------------------
BEGIN;
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (1, 'CUST001', 'PT. Maju Bersama', 'Jl. Sudirman No. 123, Jakarta Selatan', '0212345678', 'info@majubersama.co.id', 'Budi Santoso', 'Customer tetap', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (2, 'CUST002', 'CV. Sumber Rejeki', 'Jl. Gatot Subroto No. 45, Bandung', '0227654321', 'contact@sumberrejeki.com', 'Siti Nurhaliza', 'Customer baru', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (3, 'CUST003', 'PT. Berkah Sejahtera', 'Jl. Ahmad Yani No. 78, Surabaya', '0319876543', 'admin@berkahsejahtera.co.id', 'Ahmad Wijaya', 'Customer prioritas', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (4, 'CUST004', 'Toko Elektronik Jaya', 'Jl. Braga No. 56, Bandung', '0223456789', 'jaya.elektronik@mail.com', 'Dewi Lestari', NULL, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (5, 'CUST005', 'PT. Konstruksi Indonesia', 'Jl. Thamrin No. 90, Jakarta Pusat', '0215678901', 'konstruksi@indonesia.co.id', 'Eko Prasetyo', 'Proyek besar', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (6, 'CUST006', 'CV. Bangun Persada', 'Jl. Diponegoro No. 34, Semarang', '0242345678', 'bangunpersada@gmail.com', 'Fitri Handayani', NULL, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (7, 'CUST007', 'PT. Energi Terbarukan', 'Jl. Pangeran Diponegoro No. 12, Yogyakarta', '0274123456', 'info@energiterbarukan.co.id', 'Gunawan Hidayat', 'Customer hijau', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (8, 'CUST008', 'Apotek Sehat Farma', 'Jl. Asia Afrika No. 88, Bandung', '0228765432', 'apoteksehatfarma@mail.com', 'Hesti Rahayu', NULL, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (9, 'CUST009', 'PT. Properti Harmoni', 'Jl. Kebayoran Lama No. 55, Jakarta Selatan', '0213456789', 'harmoni@properti.co.id', 'Irfan Hakim', 'Proyek properti', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (10, 'CUST010', 'CV. Karya Mandiri', 'Jl. Gajah Mada No. 67, Malang', '0341567890', 'karya.mandiri@gmail.com', 'Jasmine Putri', NULL, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (11, 'CUST011', 'PT. Teknologi Cerdas', 'Jl. HR Rasuna Said No. 23, Jakarta Selatan', '0216789012', 'teknologi.cerdas@tech.co.id', 'Kurniawan Adi', 'Startup teknologi', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `customer` (`id`, `kode_customer`, `nama_customer`, `alamat`, `telepon`, `email`, `pic`, `keterangan`, `created_at`, `updated_at`) VALUES (12, 'CUST012', 'Restoran Sedap Mantap', 'Jl. Dago No. 99, Bandung', '0229012345', 'sedapmantap@restaurant.com', 'Lina Marlina', 'F&B industry', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for job_batches
-- ----------------------------
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of job_batches
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (4, '2026_06_12_110800_create_customers_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2026_06_12_110900_create_proyeks_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (6, '2026_06_12_120000_create_pegawais_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (7, '2026_06_12_130000_create_biayas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (8, '2026_06_12_140000_create_penerimaan_danas_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (9, '2026_06_12_150000_create_pengeluaran_dana_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (10, '2026_06_12_150001_create_pengeluaran_dana_detail_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (11, '2026_06_12_160000_create_monitoring_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for monitoring
-- ----------------------------
DROP TABLE IF EXISTS `monitoring`;
CREATE TABLE `monitoring` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nomor_monitoring` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_monitoring` date NOT NULL,
  `proyek_id` bigint unsigned NOT NULL,
  `pegawai_id` bigint unsigned NOT NULL,
  `tahapan_pekerjaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_tugas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `monitoring_proyek_id_foreign` (`proyek_id`),
  KEY `monitoring_pegawai_id_foreign` (`pegawai_id`),
  CONSTRAINT `monitoring_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE,
  CONSTRAINT `monitoring_proyek_id_foreign` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of monitoring
-- ----------------------------
BEGIN;
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (1, 'MON-2026-001', '2026-01-05', 1, 1, 'Perencanaan dan Persiapan', 'Mempersiapkan material dan alat kerja untuk tahap awal konstruksi', '2026-01-15', 'Selesai', 'Semua material sudah siap di lokasi', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (2, 'MON-2026-002', '2026-01-16', 1, 2, 'Pondasi', 'Pengecoran pondasi bangunan utama', '2026-02-01', 'Selesai', 'Pondasi sudah terpasang dengan baik', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (3, 'MON-2026-003', '2026-02-05', 1, 3, 'Struktur Beton', 'Pemasangan besi tulangan dan cetakan kolom', '2026-02-20', 'Selesai', 'Struktur kolom sudah selesai', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (4, 'MON-2026-004', '2026-02-21', 2, 1, 'Studi Kelayakan', 'Analisis lokasi dan kondisi tanah untuk pembangunan', '2026-03-05', 'Selesai', 'Hasil studi kelayakan sudah disetujui', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (5, 'MON-2026-005', '2026-03-10', 2, 4, 'Perancangan Detail', 'Membuat desain arsitektur dan struktural detail', '2026-03-25', 'Selesai', 'Desain sudah final dan siap dieksekusi', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (6, 'MON-2026-006', '2026-03-26', 3, 2, 'Pengukuran Lokasi', 'Melakukan pengukuran akurat untuk pondasi', '2026-04-05', 'Selesai', 'Pengukuran selesai dengan akurasi tinggi', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (7, 'MON-2026-007', '2026-04-10', 3, 3, 'Pemasangan Pipa', 'Instalasi sistem plumbing dan drainase', '2026-04-25', 'Selesai', 'Pipa sudah terpasang sesuai standar', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (8, 'MON-2026-008', '2026-05-01', 1, 1, 'Finishing Exterior', 'Pengecatan dan penataan facade bangunan', '2026-05-20', 'Dalam Progress', 'Saat ini sedang dalam proses pengecatan', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (9, 'MON-2026-009', '2026-05-15', 2, 4, 'Pemasangan Kusen', 'Pemasangan pintu dan jendela aluminium', '2026-06-01', 'Dalam Progress', 'Kusen sudah terpasang 70%', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (10, 'MON-2026-010', '2026-05-25', 3, 2, 'Pemasangan Atap', 'Pemasangan rangka atap dan penutup genteng', '2026-06-10', 'Dalam Progress', 'Rangka atap selesai, menunggu genteng', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (11, 'MON-2026-011', '2026-06-01', 1, 3, 'Instalasi Listrik', 'Pemasangan kabel dan saklar', '2026-06-15', 'Menunggu', 'Material sudah diorder', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
INSERT INTO `monitoring` (`id`, `nomor_monitoring`, `tanggal_monitoring`, `proyek_id`, `pegawai_id`, `tahapan_pekerjaan`, `detail_tugas`, `tanggal_selesai`, `status`, `keterangan`, `created_at`, `updated_at`) VALUES (12, 'MON-2026-012', '2026-06-05', 2, 1, 'Finishing Interior', 'Pemasangan plafon dan lantai', '2026-06-25', 'Menunggu', 'Menunggu finishing exterior selesai', '2026-06-12 05:39:38', '2026-06-12 05:39:38');
COMMIT;

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for pegawai
-- ----------------------------
DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bekerja` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pegawai
-- ----------------------------
BEGIN;
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (1, 'Ahmad Wijaya', '081234567890', '2020-01-15', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (2, 'Siti Nurhaliza', '081234567891', '2020-03-22', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (3, 'Budi Santoso', '081234567892', '2020-06-10', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (4, 'Dewi Lestari', '081234567893', '2021-02-01', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (5, 'Eko Prasetyo', '081234567894', '2021-05-18', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (6, 'Fitri Handayani', '081234567895', '2021-08-25', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (7, 'Gunawan Hidayat', '081234567896', '2022-01-10', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (8, 'Hesti Rahayu', '081234567897', '2022-04-05', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (9, 'Irfan Hakim', '081234567898', '2022-07-20', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (10, 'Jasmine Putri', '081234567899', '2023-01-12', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (11, 'Kurniawan Adi', '081234567800', '2023-03-28', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pegawai` (`id`, `nama`, `telp`, `tanggal_bekerja`, `created_at`, `updated_at`) VALUES (12, 'Lina Marlina', '081234567801', '2023-06-15', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
COMMIT;

-- ----------------------------
-- Table structure for penerimaan_dana
-- ----------------------------
DROP TABLE IF EXISTS `penerimaan_dana`;
CREATE TABLE `penerimaan_dana` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `no_kwitansi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `proyek_id` bigint unsigned NOT NULL,
  `pegawai_id` bigint unsigned NOT NULL,
  `dana_diterima` int NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `penerimaan_dana_proyek_id_foreign` (`proyek_id`),
  KEY `penerimaan_dana_pegawai_id_foreign` (`pegawai_id`),
  CONSTRAINT `penerimaan_dana_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE,
  CONSTRAINT `penerimaan_dana_proyek_id_foreign` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of penerimaan_dana
-- ----------------------------
BEGIN;
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (1, 'KW-001/2026', '2026-06-01', 7, 5, 15000000, 'Penerimaan dana tahap 1 untuk pembelian material', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (2, 'KW-002/2026', '2026-06-03', 12, 1, 25000000, 'Penerimaan dana tahap 2 untuk upah tenaga kerja', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (3, 'KW-003/2026', '2026-06-05', 8, 1, 10000000, 'Penerimaan dana untuk sewa alat berat', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (4, 'KW-004/2026', '2026-06-07', 6, 12, 35000000, 'Penerimaan dana tahap 3 untuk penyelesaian proyek', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (5, 'KW-005/2026', '2026-06-08', 8, 1, 20000000, 'Penerimaan dana untuk pembelian besi beton', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (6, 'KW-006/2026', '2026-06-09', 11, 5, 18000000, 'Penerimaan dana untuk semen dan pasir', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (7, 'KW-007/2026', '2026-06-10', 4, 12, 22000000, 'Penerimaan dana untuk finishing dan cat', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (8, 'KW-008/2026', '2026-06-11', 3, 2, 30000000, 'Penerimaan dana tahap akhir pembangunan', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (9, 'KW-009/2026', '2026-06-11', 3, 7, 12500000, 'Penerimaan dana untuk biaya transportasi', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (10, 'KW-010/2026', '2026-06-12', 4, 6, 27500000, 'Penerimaan dana untuk installasi listrik', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (11, 'KW-011/2026', '2026-06-12', 10, 10, 16000000, 'Penerimaan dana untuk pipa dan sanitasi', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `penerimaan_dana` (`id`, `no_kwitansi`, `tanggal`, `proyek_id`, `pegawai_id`, `dana_diterima`, `keterangan`, `created_at`, `updated_at`) VALUES (12, 'KW-012/2026', '2026-06-12', 5, 9, 40000000, 'Penerimaan dana untuk pembelian keramik', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
COMMIT;

-- ----------------------------
-- Table structure for pengeluaran_dana
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran_dana`;
CREATE TABLE `pengeluaran_dana` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `proyek_id` bigint unsigned NOT NULL,
  `pegawai_id` bigint unsigned NOT NULL,
  `total` int NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengeluaran_dana_proyek_id_foreign` (`proyek_id`),
  KEY `pengeluaran_dana_pegawai_id_foreign` (`pegawai_id`),
  CONSTRAINT `pengeluaran_dana_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pengeluaran_dana_proyek_id_foreign` FOREIGN KEY (`proyek_id`) REFERENCES `proyek` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pengeluaran_dana
-- ----------------------------
BEGIN;
INSERT INTO `pengeluaran_dana` (`id`, `nota`, `tanggal`, `proyek_id`, `pegawai_id`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES (1, 'NOTA-2026-001', '2026-01-15', 1, 1, 9000000, 'Pembelian material dan tools untuk proyek pembangunan rumah', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana` (`id`, `nota`, `tanggal`, `proyek_id`, `pegawai_id`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES (2, 'NOTA-2026-002', '2026-02-20', 2, 2, 2200000, 'Biaya transportasi dan uang makan tenaga kerja', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana` (`id`, `nota`, `tanggal`, `proyek_id`, `pegawai_id`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES (3, 'NOTA-2026-003', '2026-03-10', 1, 3, 10250000, 'Pembelian bahan bangunan dan biaya listrik proyek', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana` (`id`, `nota`, `tanggal`, `proyek_id`, `pegawai_id`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES (4, 'NOTA-2026-004', '2026-04-05', 3, 1, 4500000, 'Pengadaan tools dan biaya transportasi lapangan', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana` (`id`, `nota`, `tanggal`, `proyek_id`, `pegawai_id`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES (5, 'NOTA-2026-005', '2026-05-18', 2, 4, 5500000, 'Biaya makan harian dan pembelian bahan listrik', '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana` (`id`, `nota`, `tanggal`, `proyek_id`, `pegawai_id`, `total`, `keterangan`, `created_at`, `updated_at`) VALUES (6, 'sdf', '2026-06-12', 2, 3, 70000, NULL, '2026-06-12 05:48:22', '2026-06-12 05:48:22');
COMMIT;

-- ----------------------------
-- Table structure for pengeluaran_dana_detail
-- ----------------------------
DROP TABLE IF EXISTS `pengeluaran_dana_detail`;
CREATE TABLE `pengeluaran_dana_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pengeluaran_dana_id` bigint unsigned NOT NULL,
  `biaya_id` bigint unsigned NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengeluaran_dana_detail_pengeluaran_dana_id_foreign` (`pengeluaran_dana_id`),
  KEY `pengeluaran_dana_detail_biaya_id_foreign` (`biaya_id`),
  CONSTRAINT `pengeluaran_dana_detail_biaya_id_foreign` FOREIGN KEY (`biaya_id`) REFERENCES `biaya` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pengeluaran_dana_detail_pengeluaran_dana_id_foreign` FOREIGN KEY (`pengeluaran_dana_id`) REFERENCES `pengeluaran_dana` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pengeluaran_dana_detail
-- ----------------------------
BEGIN;
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (1, 1, 1, 'B-001', 'Material Proyek', NULL, 1500000, 5, 7500000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (2, 1, 2, 'B-002', 'Tools', NULL, 500000, 3, 1500000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (3, 2, 3, 'B-003', 'Transport', NULL, 300000, 4, 1200000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (4, 2, 4, 'B-004', 'Uang Makan', NULL, 100000, 10, 1000000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (5, 3, 5, 'B-005', 'Bahan Bangunan', NULL, 2500000, 2, 5000000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (6, 3, 1, 'B-001', 'Material Proyek', NULL, 1500000, 3, 4500000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (7, 3, 6, 'B-006', 'Listrik', NULL, 750000, 1, 750000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (8, 4, 2, 'B-002', 'Tools', NULL, 500000, 6, 3000000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (9, 4, 3, 'B-003', 'Transport', NULL, 300000, 5, 1500000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (10, 5, 4, 'B-004', 'Uang Makan', NULL, 100000, 15, 1500000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (11, 5, 5, 'B-005', 'Bahan Bangunan', NULL, 2500000, 1, 2500000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (12, 5, 6, 'B-006', 'Listrik', NULL, 750000, 2, 1500000, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `pengeluaran_dana_detail` (`id`, `pengeluaran_dana_id`, `biaya_id`, `kode`, `nama`, `deskripsi`, `harga`, `jumlah`, `total`, `created_at`, `updated_at`) VALUES (13, 6, 11, 'B011', 'Baut dan Mur', NULL, 35000, 2, 70000, '2026-06-12 05:48:22', '2026-06-12 05:48:22');
COMMIT;

-- ----------------------------
-- Table structure for proyek
-- ----------------------------
DROP TABLE IF EXISTS `proyek`;
CREATE TABLE `proyek` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kode_proyek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint unsigned NOT NULL,
  `nama_proyek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai_kontrak` decimal(15,2) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status` enum('Perencanaan','Berjalan','Selesai','Dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Perencanaan',
  `progress` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `proyek_kode_proyek_unique` (`kode_proyek`),
  KEY `proyek_customer_id_foreign` (`customer_id`),
  CONSTRAINT `proyek_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of proyek
-- ----------------------------
BEGIN;
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (1, 'PRJ001', 1, 'Pembangunan Gedung Perkantoran', 'Proyek pembangunan gedung perkantoran 10 lantai', 'Jl. Sudirman, Jakarta Selatan', 5000000000.00, '2024-01-15', '2024-12-15', 'Berjalan', 65, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (2, 'PRJ002', 2, 'Renovasi Rumah Sakit Umum', 'Renovasi total bagian rawat inap', 'Jl. Rumah Sakit No. 10, Bandung', 3500000000.00, '2024-02-01', '2024-08-30', 'Berjalan', 45, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (3, 'PRJ003', 5, 'Pembangunan Apartment Mewah', 'Pembangunan apartment 25 lantai dengan fasilitas lengkap', 'Jl. Thamrin, Jakarta Pusat', 15000000000.00, '2024-03-10', '2025-06-10', 'Berjalan', 30, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (4, 'PRJ004', 3, 'Pemasangan Jaringan Listrik', 'Instalasi jaringan listrik untuk kawasan industri', 'Kawasan Industri, Surabaya', 1200000000.00, '2024-01-20', '2024-05-20', 'Selesai', 100, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (5, 'PRJ005', 6, 'Pembangunan Pabrik Manufaktur', 'Pembangunan pabrik dengan luas 5000m2', 'Jl. Industri Raya, Cikarang', 8000000000.00, '2024-04-05', '2024-10-05', 'Berjalan', 55, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (6, 'PRJ006', 7, 'Pengaspalan Jalan Tol', 'Pengaspalan ruas tol sepanjang 20km', 'Tol Trans Jawa, Semarang', 2500000000.00, '2024-02-15', '2024-07-15', 'Selesai', 100, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (7, 'PRJ007', 9, 'Pembangunan Hotel Bintang 5', 'Hotel bintang 5 dengan 200 kamar', 'Jl. Pantai Kuta, Bali', 20000000000.00, '2024-05-01', '2025-04-01', 'Berjalan', 20, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (8, 'PRJ008', 8, 'Pemasangan Pipa Air Bersih', 'Instalasi pipa air bersih untuk perumahan', 'Kota Baru, Yogyakarta', 1800000000.00, '2024-03-20', '2024-09-20', 'Berjalan', 50, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (9, 'PRJ009', 10, 'Pembangunan Sekolah Dasar', 'Pembangunan SD dengan 12 ruang kelas', 'Jl. Pendidikan No. 5, Malang', 950000000.00, '2024-01-10', '2024-06-10', 'Selesai', 100, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (10, 'PRJ010', 1, 'Renovasi Mall Centropolis', 'Renovasi interior dan eksterior mall', 'Jl. Sudirman, Jakarta Selatan', 6000000000.00, '2024-06-01', '2024-12-01', 'Berjalan', 15, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (11, 'PRJ011', 11, 'Pemasangan Jaringan Fiber Optik', 'Instalasi jaringan fiber optik untuk perkantoran', 'Kota Surabaya, Jawa Timur', 2200000000.00, '2024-04-15', '2024-10-15', 'Berjalan', 40, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
INSERT INTO `proyek` (`id`, `kode_proyek`, `customer_id`, `nama_proyek`, `deskripsi`, `lokasi`, `nilai_kontrak`, `tanggal_mulai`, `tanggal_selesai`, `status`, `progress`, `created_at`, `updated_at`) VALUES (12, 'PRJ012', 4, 'Pembangunan Masjid Al-Munawaroh', 'Pembangunan masjid dengan kapasitas 500 jama\'ah', 'Jl. Masjid Raya, Palembang', 4500000000.00, '2024-02-20', '2024-11-20', 'Berjalan', 60, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
COMMIT;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','direktur') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `last_login_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `photo`, `role`, `last_login_at`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'Admin', 'admin', 'admin@example.com', '$2y$12$lNSXhLaOy3o/Gybutk8GxumHHTqY8OY3otzutwznMa/wkenpVy8iu', NULL, 'admin', NULL, 1, '2026-06-12 05:36:56', '2026-06-12 05:36:56');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
