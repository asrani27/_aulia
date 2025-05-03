/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : _auliya

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 03/05/2025 19:43:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for dokumen
-- ----------------------------
DROP TABLE IF EXISTS `dokumen`;
CREATE TABLE `dokumen` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `klien_id` int(11) unsigned DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` text,
  `url` text,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `klien_id_dokumen` (`klien_id`),
  CONSTRAINT `klien_id_dokumen` FOREIGN KEY (`klien_id`) REFERENCES `klien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dokumen
-- ----------------------------
BEGIN;
INSERT INTO `dokumen` (`id`, `klien_id`, `tanggal`, `nama`, `url`, `keterangan`, `created_at`, `updated_at`) VALUES (1, 1, '2025-03-10', 'asd', 'http://asdasd.com', 'asdasd', '2025-03-10 05:25:38', '2025-03-10 05:26:02');
COMMIT;

-- ----------------------------
-- Table structure for evaluasi
-- ----------------------------
DROP TABLE IF EXISTS `evaluasi`;
CREATE TABLE `evaluasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `verifikasi_id` int(11) unsigned DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `verifikasi_id_evaluasi` (`verifikasi_id`),
  CONSTRAINT `verifikasi_id_evaluasi` FOREIGN KEY (`verifikasi_id`) REFERENCES `verifikasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of evaluasi
-- ----------------------------
BEGIN;
INSERT INTO `evaluasi` (`id`, `verifikasi_id`, `keterangan`, `created_at`, `updated_at`, `status`, `tanggal`) VALUES (4, 3, 'perlu data dukung', '2025-04-06 03:14:55', '2025-04-06 03:14:55', NULL, '2025-04-06');
INSERT INTO `evaluasi` (`id`, `verifikasi_id`, `keterangan`, `created_at`, `updated_at`, `status`, `tanggal`) VALUES (5, 3, 'sdf', '2025-04-06 03:16:19', '2025-04-06 03:19:37', NULL, '2025-04-06');
COMMIT;

-- ----------------------------
-- Table structure for klien
-- ----------------------------
DROP TABLE IF EXISTS `klien`;
CREATE TABLE `klien` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `nip` varchar(255) DEFAULT NULL,
  `golongan` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dinas` varchar(255) DEFAULT NULL,
  `pimpinan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of klien
-- ----------------------------
BEGIN;
INSERT INTO `klien` (`id`, `nama`, `nip`, `golongan`, `jabatan`, `created_at`, `updated_at`, `dinas`, `pimpinan`, `email`) VALUES (1, 'udin', 'marketing', '0987651', 'jl pramuka', '2025-03-07 23:41:29', '2025-04-06 02:40:42', 'ok', 'ok', 'adi@gmail.com');
INSERT INTO `klien` (`id`, `nama`, `nip`, `golongan`, `jabatan`, `created_at`, `updated_at`, `dinas`, `pimpinan`, `email`) VALUES (2, 'budi', 'marketing', '-', '-', '2025-03-08 01:29:42', '2025-04-06 02:40:31', 'askjdhk', 'askdfh', '@gmail.com');
INSERT INTO `klien` (`id`, `nama`, `nip`, `golongan`, `jabatan`, `created_at`, `updated_at`, `dinas`, `pimpinan`, `email`) VALUES (3, '-', '-', '-', '-', '2025-04-06 02:38:45', '2025-04-06 02:38:45', '-', '-', '-');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `username`, `name`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES (1, 'superadmin', 'superadmin', '$2y$12$r0HAFQIZdiAabhk3HwCdVub716cax1jMnmwKnv76nJz8sJx0M3TB6', NULL, NULL, '2024-12-20 02:49:44', 'superadmin');
INSERT INTO `users` (`id`, `username`, `name`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES (10, 'wulan', 'wulan', '$2y$12$FE3tgH6TNhYG.nxsBTMfiuDEOijnViXDoZ2JR58I4f7xjzNbWrARq', NULL, '2025-03-07 21:50:57', '2025-03-07 21:50:57', 'user');
COMMIT;

-- ----------------------------
-- Table structure for verifikasi
-- ----------------------------
DROP TABLE IF EXISTS `verifikasi`;
CREATE TABLE `verifikasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dokumen_id` int(11) unsigned DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dokumen_id_verifikasi` (`dokumen_id`),
  CONSTRAINT `dokumen_id_verifikasi` FOREIGN KEY (`dokumen_id`) REFERENCES `dokumen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of verifikasi
-- ----------------------------
BEGIN;
INSERT INTO `verifikasi` (`id`, `dokumen_id`, `keterangan`, `created_at`, `updated_at`, `status`, `tanggal`) VALUES (2, 1, 'ok', '2025-04-06 02:54:22', '2025-04-06 02:54:22', 'VALID', '2025-04-06');
INSERT INTO `verifikasi` (`id`, `dokumen_id`, `keterangan`, `created_at`, `updated_at`, `status`, `tanggal`) VALUES (3, 1, 'ok', '2025-04-06 02:54:28', '2025-04-06 03:00:02', 'VALID', '2025-04-06');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
