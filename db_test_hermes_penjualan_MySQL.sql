/*
 Navicat Premium Data Transfer

 Source Server         : Localhost (Laragon)
 Source Server Type    : MySQL
 Source Server Version : 50740 (5.7.40)
 Source Host           : localhost:3306
 Source Schema         : tes_hermes_penjualan

 Target Server Type    : MySQL
 Target Server Version : 50740 (5.7.40)
 File Encoding         : 65001

 Date: 07/02/2024 13:35:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for m_product
-- ----------------------------
DROP TABLE IF EXISTS `m_product`;
CREATE TABLE `m_product`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL COMMENT 'Harga Jual Produk dalam satuan Currency',
  `currency` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Satuan Harga Jual',
  `discount` double NOT NULL COMMENT 'Diskon dalam persen',
  `dimension` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Dimensi Produk',
  `unit` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Satuan Jual Produk',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `m_product_product_code_unique`(`product_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_product
-- ----------------------------
INSERT INTO `m_product` VALUES (1, 'So klin Pewangi', 'SKUSKILNP', 15000, 'IDR', 10, '13 cm x 10 cm', 'PCS', '2024-02-06 01:11:18', NULL);
INSERT INTO `m_product` VALUES (2, 'GIV Biru', 'SKUGIVBR1', 11000, 'IDR', 0, '13 cm x 10 cm', 'PCS', '2024-02-06 01:11:18', NULL);
INSERT INTO `m_product` VALUES (3, 'So Klin Liquid', 'SKUSOKLINL00000001', 18000, 'IDR', 0, '13 cm x 10 cm', 'PCS', '2024-02-06 01:11:18', '2024-02-06 07:06:11');
INSERT INTO `m_product` VALUES (5, 'GIV Ungu', 'SKUGIVUNGU00000001', 12000, 'IDR', 0, '10cm x 12cm', 'PCS', '2024-02-06 07:03:47', '2024-02-06 07:03:47');
INSERT INTO `m_product` VALUES (6, 'GIV Ungu', 'SKUGIVUNGU00000002', 13000, 'IDR', 0, '10cm x 10cm', 'PCS', '2024-02-06 07:04:02', '2024-02-06 07:04:02');
INSERT INTO `m_product` VALUES (7, 'Sunlight', 'SKUSUNLIGH00000001', 12000, 'IDR', 2, '10cm x 10cm', 'PCS', '2024-02-06 07:15:38', '2024-02-06 07:15:38');
INSERT INTO `m_product` VALUES (8, 'Sunlight', 'SKUSUNLIGH00000002', 11000, 'IDR', 3, '10cm x 12cm', 'PCS', '2024-02-06 07:16:00', '2024-02-06 07:16:00');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2024_02_05_082937_create_product_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_02_05_082954_create_transaction_table', 1);
INSERT INTO `migrations` VALUES (7, '2024_02_05_082958_create_transaction_detail_table', 1);
INSERT INTO `migrations` VALUES (8, '2024_02_05_120609_update_transaction_table', 1);
INSERT INTO `migrations` VALUES (9, '2024_02_05_202935_update_transaction_table', 1);
INSERT INTO `migrations` VALUES (10, '2024_02_05_203332_update_transaction_detail_table', 1);
INSERT INTO `migrations` VALUES (12, '2024_02_06_060523_update_transaction_detail_table', 2);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `document_code` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kode Dokumen',
  `document_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nomor Dokumen',
  `status` enum('pending','complete','failed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'User Login',
  `total` double NULL DEFAULT 0 COMMENT 'Total Harga Jual',
  `tgl_trx` date NOT NULL COMMENT 'Tanggal Transaksi',
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaction
-- ----------------------------
INSERT INTO `transaction` VALUES (1, 'TRX', '0000000001', 'complete', 'User', 73000, '2024-02-06', 2, NULL, '2024-02-06 01:41:10');
INSERT INTO `transaction` VALUES (2, 'TRX', '0000000002', 'complete', 'User', 106000, '2024-02-06', 2, NULL, '2024-02-06 01:51:20');
INSERT INTO `transaction` VALUES (5, 'TRX', '0000000003', 'complete', 'User', 84000, '2024-02-06', 2, NULL, '2024-02-06 01:55:57');
INSERT INTO `transaction` VALUES (6, 'TRX', '0000000004', 'complete', 'User', 150000, '2024-02-06', 2, NULL, '2024-02-06 01:59:02');
INSERT INTO `transaction` VALUES (7, 'TRX', '0000000005', 'complete', 'User', 102000, '2024-02-06', 2, NULL, '2024-02-06 06:10:45');

-- ----------------------------
-- Table structure for transaction_detail
-- ----------------------------
DROP TABLE IF EXISTS `transaction_detail`;
CREATE TABLE `transaction_detail`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_transaction` int(11) NOT NULL COMMENT 'ID Transaksi',
  `document_code` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kode Dokumen',
  `document_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nomor Dokumen',
  `product_id` int(11) NULL DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `product_code` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kode Produk',
  `price` double NULL DEFAULT 0 COMMENT 'Harga Jual Produk dalam satuan Currency',
  `quantity` int(11) NOT NULL DEFAULT 1 COMMENT 'Jumlah Qty barang yang dibeli',
  `unit` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Satuan Jual Produk',
  `subtotal` double NULL DEFAULT 0 COMMENT 'Total Harga Jual per Item',
  `currency` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Satuan Harga Jual',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaction_detail
-- ----------------------------
INSERT INTO `transaction_detail` VALUES (1, 1, 'TRX', '0000000001', NULL, NULL, 'SKUSKILNL', 18000, 2, 'PCS', 36000, 'IDR', NULL, '2024-02-06 01:30:24');
INSERT INTO `transaction_detail` VALUES (2, 1, 'TRX', '0000000001', NULL, NULL, 'SKUGIVBR1', 11000, 2, 'PCS', 22000, 'IDR', '2024-02-06 01:30:26', '2024-02-06 01:32:52');
INSERT INTO `transaction_detail` VALUES (3, 1, 'TRX', '0000000001', NULL, NULL, 'SKUSKILNP', 15000, 1, 'PCS', 15000, 'IDR', '2024-02-06 01:30:27', NULL);
INSERT INTO `transaction_detail` VALUES (4, 2, 'TRX', '0000000002', NULL, NULL, 'SKUSKILNL', 18000, 3, 'PCS', 54000, 'IDR', '2024-02-06 01:49:42', '2024-02-06 01:51:15');
INSERT INTO `transaction_detail` VALUES (5, 2, 'TRX', '0000000002', NULL, NULL, 'SKUGIVBR1', 11000, 2, 'PCS', 22000, 'IDR', '2024-02-06 01:50:59', '2024-02-06 01:51:13');
INSERT INTO `transaction_detail` VALUES (6, 2, 'TRX', '0000000002', NULL, NULL, 'SKUSKILNP', 15000, 2, 'PCS', 30000, 'IDR', '2024-02-06 01:51:01', '2024-02-06 01:51:16');
INSERT INTO `transaction_detail` VALUES (7, 5, 'TRX', '0000000003', NULL, NULL, 'SKUSKILNL', 18000, 1, 'PCS', 18000, 'IDR', '2024-02-06 01:55:21', NULL);
INSERT INTO `transaction_detail` VALUES (8, 5, 'TRX', '0000000003', NULL, NULL, 'SKUGIVBR1', 11000, 6, 'PCS', 66000, 'IDR', '2024-02-06 01:55:29', '2024-02-06 01:55:37');
INSERT INTO `transaction_detail` VALUES (12, 6, 'TRX', '0000000004', NULL, NULL, 'SKUSKILNP', 15000, 10, 'PCS', 150000, 'IDR', '2024-02-06 01:58:44', '2024-02-06 01:58:59');
INSERT INTO `transaction_detail` VALUES (13, 7, 'TRX', '0000000005', NULL, NULL, 'SKUSKILNL', 18000, 3, 'PCS', 54000, 'IDR', '2024-02-06 02:23:40', '2024-02-06 06:10:13');
INSERT INTO `transaction_detail` VALUES (14, 7, 'TRX', '0000000005', NULL, NULL, 'SKUGIVBR1', 11000, 3, 'PCS', 33000, 'IDR', '2024-02-06 06:08:31', '2024-02-06 06:10:14');
INSERT INTO `transaction_detail` VALUES (15, 7, 'TRX', '0000000005', NULL, NULL, 'SKUSKILNP', 15000, 1, 'PCS', 15000, 'IDR', '2024-02-06 06:10:11', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL DEFAULT 2 COMMENT '1=admin, 2=user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@admin.com', 1, NULL, '$2y$12$k5hWi/moNcNi3xA7ew5TpuCiAeu4yzH45qGrUP850jbHNdUVFxXGi', NULL, '2024-02-06 01:11:18', NULL);
INSERT INTO `users` VALUES (2, 'User', 'user@user.com', 2, NULL, '$2y$12$622hTK8uedfmOY7PF8Gyxe/opMPJvgRlQ1tj87aPUCcFOzZ5mCDfu', NULL, '2024-02-06 01:11:18', NULL);

SET FOREIGN_KEY_CHECKS = 1;
