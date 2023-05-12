-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.31 - MySQL Community Server - GPL
-- Операционная система:         Linux
-- HeidiSQL Версия:              12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных myreceipt
CREATE DATABASE IF NOT EXISTS `myreceipt` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `myreceipt`;

-- Дамп структуры для таблица myreceipt.clinics
CREATE TABLE IF NOT EXISTS `clinics` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps_coordinates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_modes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `organization_types_id` bigint unsigned NOT NULL,
  `status` enum('active','blocked','archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `clinics_organization_id_foreign` (`organization_id`),
  KEY `clinics_organization_types_id_foreign` (`organization_types_id`),
  CONSTRAINT `clinics_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  CONSTRAINT `clinics_organization_types_id_foreign` FOREIGN KEY (`organization_types_id`) REFERENCES `organization_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.clinics: ~15 rows (приблизительно)
INSERT INTO `clinics` (`id`, `name`, `address`, `phone`, `email`, `gps_coordinates`, `working_modes`, `organization_id`, `created_at`, `updated_at`, `organization_types_id`, `status`) VALUES
	(11, 'ClinisOne', '542 Abby Parkway\nGuadalupechester, IA 42172-7117', '+1-520-838-7669', 'cormier.deion@anderson.info', 'TXZOZKHA1XZ', 'Quia.', 5, '2023-03-18 20:28:41', '2023-03-18 20:28:41', 10, 'active'),
	(12, 'ClinicSecond', '4735 Mraz Camp Suite 357\nNew Laron, LA 81796-5127', '+1-559-805-6435', 'princess.krajcik@yahoo.com', 'IOMTKD1Y', 'Alias et.', 2, '2023-03-18 20:28:41', '2023-03-18 20:28:41', 8, 'active'),
	(13, 'ClinicThird', '942 Ocie Course\nEmardchester, SC 03590-9837', '320.765.4263', 'martine75@veum.com', 'CJJPAP6F', 'Sunt.', 4, '2023-03-18 20:28:41', '2023-03-18 20:28:41', 9, 'active'),
	(14, 'ClinicForth', '17888 Gerson Corner\nNew Orionburgh, DC 98391', '+1.339.699.7648', 'vbarrows@cole.biz', 'MDDHEV6B6UO', 'Ut est.', 5, '2023-03-18 20:28:41', '2023-03-18 20:28:41', 9, 'active'),
	(15, 'ClinicFifth', '246 Schiller Street Apt. 210\nLake Victormouth, MN 90278-9554', '+1.856.998.5039', 'rkozey@heller.net', 'HIHFAGQMOH0', 'Aut.', 1, '2023-03-18 20:28:41', '2023-03-18 20:28:41', 1, 'active'),
	(16, 'ClinicSixth', '87648 Gerson Fork\nNew Adelia, PA 86974-5708', '425.530.4249', 'haleigh99@bernhard.net', 'LNRXKGID', 'Veniam.', 1, '2023-03-18 20:28:41', '2023-03-18 20:28:41', 5, 'active'),
	(17, 'ClinicSeventh', '5537 Heller Squares\nSipeschester, SC 74966', '872-719-3665', 'kertzmann.raymundo@gutkowski.com', 'FCHUDE269LU', 'Corporis.', 5, '2023-03-18 20:28:41', '2023-03-18 20:28:41', 5, 'active'),
	(18, 'ClinicEighth', '15496 Robert Trail\nAngelinaport, KY 83892-8355', '1-360-453-4708', 'stracke.margarita@koepp.com', 'HYRVDASR8MM', 'Odio.', 3, '2023-03-18 20:28:41', '2023-03-18 20:28:41', 5, 'active'),
	(19, 'ClinicNinth', '117 Bechtelar Grove\nWest Jarretside, MT 96674', '+1 (979) 903-1625', 'marley.schimmel@gmail.com', 'QVKJQADA', 'Et dolor.', 1, '2023-03-18 20:28:41', '2023-03-18 20:28:41', 6, 'active'),
	(20, 'ClinicTenth', '37384 Hettinger Meadows\nWest Doloresmouth, AR 64303-4692', '1-907-614-6675', 'terrance47@yahoo.com', 'UKLJLU72', 'Eveniet.', 5, '2023-03-18 20:28:41', '2023-03-18 20:28:41', 5, 'active'),
	(22, 'Clinic1222', 'address1222', '123456789012222', 'Clinic1222@asd.qw', '11 22 33 44 55 66 77 88 222', '11 - 22 -222', 1, '2023-04-02 16:16:09', '2023-04-02 16:45:34', 12, 'active'),
	(23, 'Clinic2', 'address2', '1234567890155', 'Clinic2@asd.qw', '11 22 33 44 55 66 77 88 99 00', '10 - 23', 2, '2023-04-02 16:20:29', '2023-04-02 16:53:51', 1, 'archived'),
	(25, 'Clinic1555', 'address1555', '123456789012555', 'Clinic1555@asd.qw', '11 22 33 44555', '5555', 1, '2023-04-02 17:32:49', '2023-04-02 17:32:49', 12, 'active'),
	(26, 'Clinic1999', 'address1999', '123456789012999', 'Clinic2999@asd.qw', '11 22 33 44555999', '9999', 1, '2023-04-02 17:34:37', '2023-04-02 17:34:37', 10, 'active'),
	(27, 'Clinic17777', 'address17777', '1234567890127777', 'Clinic1222@asd.qw', '11 22 33 44 55 66 77 88 333', 'ccc', 1, '2023-04-02 17:42:50', '2023-04-02 17:51:09', 1, 'blocked'),
	(28, 'ddddddddddddd', 'kkkkkkkkkkkkkkkk', '1234567890127777', 'test@mail.ru', '11 22 33 44 55 66 77 88 99 00', 'dd ff', 1, '2023-04-14 13:08:12', '2023-04-14 13:10:03', 1, 'archived');

-- Дамп структуры для таблица myreceipt.clinics_with_doctors
CREATE TABLE IF NOT EXISTS `clinics_with_doctors` (
  `clinic_id` bigint unsigned NOT NULL,
  `doctor_id` bigint unsigned NOT NULL,
  KEY `clinics_with_doctors_clinic_id_foreign` (`clinic_id`),
  KEY `clinics_with_doctors_doctor_id_foreign` (`doctor_id`),
  CONSTRAINT `clinics_with_doctors_clinic_id_foreign` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE,
  CONSTRAINT `clinics_with_doctors_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.clinics_with_doctors: ~20 rows (приблизительно)
INSERT INTO `clinics_with_doctors` (`clinic_id`, `doctor_id`) VALUES
	(14, 1),
	(20, 4),
	(13, 6),
	(15, 1),
	(18, 10),
	(18, 4),
	(18, 2),
	(14, 5),
	(14, 9),
	(13, 7),
	(16, 4),
	(14, 4),
	(17, 2),
	(13, 7),
	(14, 4),
	(16, 10),
	(13, 9),
	(17, 7),
	(18, 10),
	(15, 3);

-- Дамп структуры для таблица myreceipt.diagnosis
CREATE TABLE IF NOT EXISTS `diagnosis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.diagnosis: ~11 rows (приблизительно)
INSERT INTO `diagnosis` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'In.', 'Debitis.', '2023-04-13 12:20:12', '2023-04-13 12:20:12'),
	(2, 'Ut.', 'Doloribus.', '2023-04-13 12:20:12', '2023-04-13 12:20:12'),
	(3, 'Quis.', 'Occaecati.', '2023-04-13 12:20:12', '2023-04-13 12:20:12'),
	(4, 'Enim.', 'Iste quam.', '2023-04-13 12:20:12', '2023-04-13 12:20:12'),
	(5, 'Eos.', 'Eveniet.', '2023-04-13 12:20:12', '2023-04-13 12:20:12'),
	(6, 'Hic.', 'Ut ad vel.', '2023-04-13 12:20:12', '2023-04-13 12:20:12'),
	(7, 'Qui.', 'Quis et.', '2023-04-13 12:20:12', '2023-04-13 12:20:12'),
	(8, 'Sit.', 'Et et.', '2023-04-13 12:20:12', '2023-04-13 12:20:12'),
	(9, 'Eum.', 'Repellat.', '2023-04-13 12:20:12', '2023-04-13 12:20:12'),
	(10, 'In.', 'Quibusdam.', '2023-04-13 12:20:12', '2023-04-13 12:20:12'),
	(12, 'bbbbbbbbbbbbb', 'vvvvvvvvvvvvvvvvv', '2023-04-14 14:09:38', '2023-04-14 14:13:00');

-- Дамп структуры для таблица myreceipt.doctors
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `working_mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_online` tinyint(1) NOT NULL,
  `speciality_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_organization_id` bigint unsigned NOT NULL,
  `status_id` bigint unsigned NOT NULL,
  `status` enum('active','blocked','archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `doctors_speciality_id_foreign` (`speciality_id`),
  KEY `doctors_education_organization_id_foreign` (`education_organization_id`),
  KEY `doctors_status_id_foreign` (`status_id`),
  CONSTRAINT `doctors_education_organization_id_foreign` FOREIGN KEY (`education_organization_id`) REFERENCES `organizations` (`id`),
  CONSTRAINT `doctors_speciality_id_foreign` FOREIGN KEY (`speciality_id`) REFERENCES `specialities` (`id`),
  CONSTRAINT `doctors_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `doctor_statuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.doctors: ~22 rows (приблизительно)
INSERT INTO `doctors` (`id`, `created_at`, `updated_at`, `working_mode`, `refresh_token`, `access_token`, `is_online`, `speciality_id`, `name`, `surname`, `education_organization_id`, `status_id`, `status`) VALUES
	(1, '2023-03-18 20:30:32', '2023-03-18 20:30:32', 'Tenetur.', 'Nostrum.', 'Rem est.', 1, 6, 'Mariano Nitzsche III', 'Dr. Jamil Batz', 5, 3, 'active'),
	(2, '2023-03-18 20:30:33', '2023-03-18 20:30:33', 'Nisi.', 'Veritatis.', 'Similique.', 1, 5, 'Hilbert Blick', 'Hazel Haley II', 7, 5, 'active'),
	(3, '2023-03-18 20:30:33', '2023-03-18 20:30:33', 'Ut magni.', 'Iure quod.', 'Sunt.', 1, 4, 'Makenzie Koss', 'Miss Verda Jenkins DVM', 7, 3, 'active'),
	(4, '2023-03-18 20:30:33', '2023-03-18 20:30:33', 'Sed non.', 'Cumque.', 'Amet sunt.', 1, 3, 'Reta Bartell DDS', 'Ms. Audreanne Hoppe DDS', 4, 9, 'active'),
	(5, '2023-03-18 20:30:33', '2023-03-18 20:30:33', 'Dolorem.', 'Quia non.', 'Quo aut.', 1, 3, 'Camron Denesik III', 'Meggie Berge', 8, 6, 'active'),
	(6, '2023-03-18 20:30:33', '2023-03-18 20:30:33', 'Et quia.', 'Quo quia.', 'Quia.', 1, 1, 'Prof. Domingo Waelchi', 'Dr. Constance Corwin', 3, 5, 'active'),
	(7, '2023-03-18 20:30:33', '2023-03-18 20:30:33', 'Dolor aut.', 'Quam.', 'Omnis.', 1, 3, 'Dr. Brandi Emmerich', 'Renee Stark', 3, 3, 'active'),
	(8, '2023-03-18 20:30:33', '2023-03-18 20:30:33', 'Atque.', 'Sit.', 'Iure.', 1, 1, 'Arnulfo Schimmel', 'Toby Olson PhD', 8, 1, 'active'),
	(9, '2023-03-18 20:30:33', '2023-03-18 20:30:33', 'Natus.', 'Eveniet.', 'Eum.', 1, 6, 'Boris Hahn I', 'Linnea Morissette', 2, 7, 'active'),
	(10, '2023-03-18 20:30:33', '2023-03-18 20:30:33', 'Ut veniam.', 'Laborum.', 'Adipisci.', 1, 3, 'Prof. Lindsey Hammes', 'Jacey Corwin', 6, 4, 'active'),
	(11, '2023-03-29 15:22:17', '2023-03-29 15:22:17', 'Et odit.', 'Accusamus.', 'Error.', 1, 2, 'Ramiro Streich', 'Ms. Reina Kunze', 8, 7, 'active'),
	(12, '2023-03-29 15:22:18', '2023-03-29 15:22:18', 'Neque id.', 'Ab rerum.', 'Voluptate.', 1, 4, 'Mozelle Mills', 'Bell Roberts', 2, 4, 'active'),
	(13, '2023-03-29 15:22:18', '2023-03-29 15:22:18', 'Ipsum.', 'Rerum.', 'Molestiae.', 1, 3, 'Zack Treutel', 'Haylie Jacobs', 6, 2, 'active'),
	(14, '2023-03-29 15:22:18', '2023-03-29 15:22:18', 'Natus aut.', 'Eius.', 'Iste.', 1, 5, 'Norris Carroll', 'Haley Zboncak', 6, 4, 'active'),
	(15, '2023-03-29 15:22:18', '2023-03-29 15:22:18', 'Omnis non.', 'Cum dicta.', 'Quia.', 1, 7, 'Keyshawn Fritsch', 'Ahmed Maggio PhD', 7, 7, 'active'),
	(16, '2023-03-29 15:22:18', '2023-03-29 15:22:18', 'Quo est.', 'Aut.', 'Et.', 1, 5, 'Irma O\'Keefe', 'Jammie Lesch', 5, 6, 'active'),
	(17, '2023-03-29 15:22:18', '2023-03-29 15:22:18', 'Dolor qui.', 'Velit.', 'Nesciunt.', 1, 7, 'Prof. Jadyn Franecki Jr.', 'Tatum Vandervort', 5, 8, 'active'),
	(18, '2023-03-29 15:22:18', '2023-03-29 15:22:18', 'Qui qui.', 'Earum.', 'Est nam.', 1, 3, 'Miss Domenica Ernser', 'Clementina Beier', 8, 7, 'active'),
	(19, '2023-03-29 15:22:18', '2023-03-29 15:22:18', 'Dolorem.', 'Vel enim.', 'Doloribus.', 1, 1, 'Prof. Ansel Halvorson', 'Flavio Kulas', 4, 9, 'active'),
	(20, '2023-03-29 15:22:18', '2023-03-29 15:22:18', 'Tempora.', 'Magni et.', 'Eius.', 1, 2, 'Katelin Reilly', 'Lyla Wyman', 6, 2, 'active'),
	(39, '2023-03-30 19:48:41', '2023-03-30 19:48:41', '2-2-2-2', 'refresh_token_here', 'access_token_here', 1, 11, 'Doctor123', 'DoctorDoctor123', 1, 1, 'active'),
	(40, '2023-03-30 19:49:30', '2023-03-30 20:46:15', '3-3-3-3-5', 'refresh_token_here', 'access_token_here', 1, 10, 'Doctor144455', 'DoctorDoctor144455', 1, 1, 'archived'),
	(42, '2023-04-02 17:23:16', '2023-04-02 17:23:16', '2233', 'refresh_token_here', 'access_token_here', 1, 12, 'Doctor122', 'DoctorDoctor122', 1, 1, 'archived'),
	(43, '2023-04-14 13:14:42', '2023-04-14 13:17:20', 'bbjnbnv', 'refresh_token_here', 'access_token_here', 1, 11, 'dsdssdsdsdsd', 'dfdfdfdfdfd', 1, 1, 'blocked');

-- Дамп структуры для таблица myreceipt.doctor_reviews
CREATE TABLE IF NOT EXISTS `doctor_reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` bigint unsigned NOT NULL,
  `doctor_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `rank` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_reviews_patient_id_foreign` (`patient_id`),
  KEY `doctor_reviews_doctor_id_foreign` (`doctor_id`),
  CONSTRAINT `doctor_reviews_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  CONSTRAINT `doctor_reviews_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.doctor_reviews: ~10 rows (приблизительно)
INSERT INTO `doctor_reviews` (`id`, `patient_id`, `doctor_id`, `title`, `description`, `rank`, `created_at`, `updated_at`) VALUES
	(11, 15, 4, 'Inventore.', 'A alias.', 3.10, '2023-03-18 20:40:03', '2023-03-18 20:40:03'),
	(12, 14, 3, 'Natus.', 'In.', 4.80, '2023-03-18 20:40:03', '2023-03-18 20:40:03'),
	(13, 12, 2, 'Nulla qui.', 'Incidunt.', 4.80, '2023-03-18 20:40:03', '2023-03-18 20:40:03'),
	(14, 19, 3, 'Non esse.', 'Et quis.', 2.90, '2023-03-18 20:40:03', '2023-03-18 20:40:03'),
	(15, 18, 2, 'Labore.', 'Qui autem.', 4.50, '2023-03-18 20:40:03', '2023-03-18 20:40:03'),
	(16, 13, 4, 'Autem.', 'Sit.', 2.20, '2023-03-18 20:40:03', '2023-03-18 20:40:03'),
	(17, 12, 2, 'Ipsum.', 'Et et.', 1.30, '2023-03-18 20:40:03', '2023-03-18 20:40:03'),
	(18, 13, 3, 'Aperiam.', 'Magnam.', 2.40, '2023-03-18 20:40:03', '2023-03-18 20:40:03'),
	(19, 19, 1, 'Aut cum.', 'Dolorum.', 4.40, '2023-03-18 20:40:03', '2023-03-18 20:40:03'),
	(20, 13, 3, 'Placeat.', 'Ipsam.', 1.70, '2023-03-18 20:40:03', '2023-03-18 20:40:03');

-- Дамп структуры для таблица myreceipt.doctor_statuses
CREATE TABLE IF NOT EXISTS `doctor_statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.doctor_statuses: ~10 rows (приблизительно)
INSERT INTO `doctor_statuses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Natalie Boyle', 'Vel.', '2023-03-18 20:27:42', '2023-03-18 20:27:42'),
	(2, 'Rashawn Tillman', 'Magni.', '2023-03-18 20:27:42', '2023-03-18 20:27:42'),
	(3, 'Devonte Gutkowski', 'Quod.', '2023-03-18 20:27:42', '2023-03-18 20:27:42'),
	(4, 'Rozella Ullrich DDS', 'Quam a.', '2023-03-18 20:27:42', '2023-03-18 20:27:42'),
	(5, 'Lilly Ruecker', 'Eius id.', '2023-03-18 20:27:42', '2023-03-18 20:27:42'),
	(6, 'Adonis Gutkowski', 'Sed ut.', '2023-03-18 20:27:42', '2023-03-18 20:27:42'),
	(7, 'Devante Marvin', 'Quae.', '2023-03-18 20:27:42', '2023-03-18 20:27:42'),
	(8, 'Kristofer Mitchell', 'Ut minus.', '2023-03-18 20:27:42', '2023-03-18 20:27:42'),
	(9, 'Elias Ebert', 'Vero qui.', '2023-03-18 20:27:42', '2023-03-18 20:27:42'),
	(10, 'Golda Wyman III', 'Vero quia.', '2023-03-18 20:27:42', '2023-03-18 20:27:42');

-- Дамп структуры для таблица myreceipt.drugs
CREATE TABLE IF NOT EXISTS `drugs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pharmacies_id` bigint unsigned NOT NULL,
  `status` enum('active','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `drugs_pharmacies_id_foreign` (`pharmacies_id`),
  CONSTRAINT `drugs_pharmacies_id_foreign` FOREIGN KEY (`pharmacies_id`) REFERENCES `pharmacies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.drugs: ~13 rows (приблизительно)
INSERT INTO `drugs` (`id`, `name`, `created_at`, `updated_at`, `description_url`, `pharmacies_id`, `status`) VALUES
	(1, 'Margaret Flatley', '2023-03-18 20:29:39', '2023-03-18 20:29:39', 'http://www.wilderman.net/eum-est-quia-vel-minus-aperiam-rem', 1, 'active'),
	(2, 'Ubaldo Grady', '2023-03-18 20:29:39', '2023-03-18 20:29:39', 'https://boyle.com/inventore-eaque-laudantium-nesciunt-enim-non-laudantium-qui.html', 1, 'active'),
	(3, 'Eleanora Hoeger', '2023-03-18 20:29:39', '2023-03-18 20:29:39', 'http://www.runolfsdottir.com/et-assumenda-labore-id-tenetur-ipsam-rerum-aliquid-aperiam', 2, 'active'),
	(4, 'Kolby Zboncak', '2023-03-18 20:29:39', '2023-03-18 20:29:39', 'https://johns.net/corporis-sed-dolorem-deleniti-possimus-ducimus.html', 2, 'active'),
	(5, 'Alva Mohr', '2023-03-18 20:29:39', '2023-03-18 20:29:39', 'http://www.kunde.com/', 5, 'active'),
	(6, 'Juana Jerde', '2023-03-18 20:29:39', '2023-03-18 20:29:39', 'http://www.rowe.org/', 5, 'active'),
	(7, 'Prudence Boehm', '2023-03-18 20:29:39', '2023-03-18 20:29:39', 'http://sawayn.net/dolorem-architecto-praesentium-nihil', 5, 'active'),
	(8, 'Vilma Cremin', '2023-03-18 20:29:39', '2023-03-18 20:29:39', 'http://little.com/', 9, 'active'),
	(9, 'Mrs. Madilyn Goodwin', '2023-03-18 20:29:39', '2023-03-18 20:29:39', 'http://www.runolfsdottir.net/assumenda-ex-totam-optio-molestias-error.html', 9, 'active'),
	(10, 'Cyril Funk', '2023-03-18 20:29:39', '2023-03-18 20:29:39', 'http://nitzsche.com/velit-non-voluptas-optio-inventore-deserunt-cupiditate-eum', 8, 'active'),
	(11, 'Drug1', '2023-04-02 20:05:10', '2023-04-02 20:05:10', 'qeoqw;rjqlk;rjwewklrfse;flksfel', 1, 'blocked'),
	(12, 'Drug2', '2023-04-02 20:06:08', '2023-04-02 20:06:08', '.kkjhughgcrjyh.oo/;k.l', 1, 'active'),
	(14, 'Drug1555', '2023-04-02 20:10:08', '2023-04-02 20:10:08', 'qeoqw;rjqlk;rjwewklrfse;flksfelw4rdfgdfgdfgd', 1, 'blocked'),
	(15, 'hfbszergdgfgdg', '2023-04-14 12:23:54', '2023-04-14 12:23:54', 'http://asasa.sasas', 1, 'active'),
	(16, 'cvcvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '2023-04-14 12:24:52', '2023-04-14 12:26:39', 'hjgjcvhcghg', 1, 'active');

-- Дамп структуры для таблица myreceipt.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.failed_jobs: ~0 rows (приблизительно)

-- Дамп структуры для таблица myreceipt.meetings
CREATE TABLE IF NOT EXISTS `meetings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` bigint unsigned NOT NULL,
  `doctor_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `result` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `written_entities` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint unsigned NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meetings_patient_id_foreign` (`patient_id`),
  KEY `meetings_doctor_id_foreign` (`doctor_id`),
  KEY `meetings_service_id_foreign` (`service_id`),
  CONSTRAINT `meetings_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  CONSTRAINT `meetings_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  CONSTRAINT `meetings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.meetings: ~10 rows (приблизительно)
INSERT INTO `meetings` (`id`, `patient_id`, `doctor_id`, `description`, `result`, `written_entities`, `service_id`, `date`, `created_at`, `updated_at`) VALUES
	(21, 18, 3, 'Ut quia.', 'Molestiae.', 'Voluptas.', 8, '2023-03-18', '2023-03-18 20:50:20', '2023-03-18 20:50:20'),
	(22, 12, 3, 'Sed.', 'Alias.', 'Aut.', 1, '2023-03-18', '2023-03-18 20:50:20', '2023-03-18 20:50:20'),
	(23, 15, 1, 'Est.', 'Dolores.', 'Est aut.', 9, '2023-03-18', '2023-03-18 20:50:20', '2023-03-18 20:50:20'),
	(24, 13, 2, 'Dolores.', 'Aut.', 'Ab.', 5, '2023-03-18', '2023-03-18 20:50:20', '2023-03-18 20:50:20'),
	(25, 14, 2, 'Provident.', 'In sit.', 'Quaerat.', 7, '2023-03-18', '2023-03-18 20:50:20', '2023-03-18 20:50:20'),
	(26, 12, 2, 'Ipsa.', 'Impedit.', 'Autem.', 4, '2023-03-18', '2023-03-18 20:50:20', '2023-03-18 20:50:20'),
	(27, 13, 5, 'Rerum et.', 'Suscipit.', 'Mollitia.', 5, '2023-03-18', '2023-03-18 20:50:20', '2023-03-18 20:50:20'),
	(28, 12, 4, 'Excepturi.', 'In aut.', 'Ipsum.', 5, '2023-03-18', '2023-03-18 20:50:20', '2023-03-18 20:50:20'),
	(29, 19, 5, 'Dolorum.', 'Quia.', 'Qui sed.', 1, '2023-03-18', '2023-03-18 20:50:20', '2023-03-18 20:50:20'),
	(30, 14, 3, 'Est quo.', 'Quo magni.', 'Cumque.', 7, '2023-03-18', '2023-03-18 20:50:20', '2023-03-18 20:50:20');

-- Дамп структуры для таблица myreceipt.messages
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `recipient_id` bigint NOT NULL,
  `sender_id` bigint NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sender_is_patient` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.messages: ~10 rows (приблизительно)
INSERT INTO `messages` (`id`, `recipient_id`, `sender_id`, `message`, `created_at`, `updated_at`, `sender_is_patient`) VALUES
	(1, 1, 5, 'Quod.', '2023-03-18 20:44:35', '2023-03-18 20:44:35', 1),
	(2, 5, 1, 'Labore.', '2023-03-18 20:44:35', '2023-03-18 20:44:35', 1),
	(3, 4, 3, 'Minus.', '2023-03-18 20:44:35', '2023-03-18 20:44:35', 1),
	(4, 5, 1, 'Ipsa.', '2023-03-18 20:44:35', '2023-03-18 20:44:35', 1),
	(5, 1, 3, 'Qui nihil.', '2023-03-18 20:44:35', '2023-03-18 20:44:35', 1),
	(6, 5, 2, 'Quibusdam.', '2023-03-18 20:44:35', '2023-03-18 20:44:35', 1),
	(7, 3, 4, 'Molestiae.', '2023-03-18 20:44:35', '2023-03-18 20:44:35', 1),
	(8, 3, 4, 'Possimus.', '2023-03-18 20:44:35', '2023-03-18 20:44:35', 1),
	(9, 1, 3, 'Hic aut.', '2023-03-18 20:44:35', '2023-03-18 20:44:35', 1),
	(10, 1, 4, 'Ipsam et.', '2023-03-18 20:44:35', '2023-03-18 20:44:35', 1);

-- Дамп структуры для таблица myreceipt.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.migrations: ~46 rows (приблизительно)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_03_05_184644_create_specialities_table', 1),
	(6, '2023_03_05_184951_create_organizations_table', 1),
	(7, '2023_03_06_183548_create_doctor_statuses_table', 1),
	(8, '2023_03_06_184023_create_clinics_table', 1),
	(9, '2023_03_07_183411_create_drugs_table', 1),
	(10, '2023_03_07_183652_create_doctors_table', 1),
	(11, '2023_03_07_183808_create_patients_table', 1),
	(12, '2023_03_07_184809_create_services_table', 1),
	(13, '2023_03_07_185419_create_payment_types_table', 1),
	(14, '2023_03_07_185840_create_payment_statuses_table', 1),
	(15, '2023_03_08_181147_create_doctor_reviews_table', 1),
	(16, '2023_03_08_182901_create_sick_lists_table', 1),
	(17, '2023_03_08_183040_create_receipts_table', 1),
	(18, '2023_03_08_183853_create_messages_table', 1),
	(19, '2023_03_08_183936_create_pharmacies_table', 1),
	(20, '2023_03_08_184253_create_meetings_table', 1),
	(21, '2023_03_08_184538_create_video_calls_table', 1),
	(22, '2023_03_08_185312_create_payments_table', 1),
	(23, '2023_03_22_173433_create_organization_types_table', 2),
	(24, '2023_03_22_180053_add_fk_organization_types_id_to_pharmacies_table', 2),
	(25, '2023_03_22_181850_add_fk_column_organization_types_id_to_pharmacies_table', 3),
	(26, '2023_03_22_182404_add_fk_organization_types_id_to_clinics_table', 3),
	(27, '2023_03_22_182405_add_fk_column_organization_types_id_to_clinics_table', 4),
	(28, '2023_03_22_184426_add_fk_pharmacies_id_to_drugs_table', 4),
	(29, '2023_03_22_184427_add_fk_column_pharmacies_id_to_drugs_table', 5),
	(30, '2023_03_22_191628_pharmacy_has_drug_table', 5),
	(31, '2023_03_23_134330_add_column_name_to_pharmacies_table', 5),
	(32, '2023_03_26_163959_add_column_counts_to_pharmacies_has_drugs_table', 6),
	(33, '2023_03_29_172809_add_column_name_to_clinics_table', 7),
	(34, '2023_03_29_175734_add_column_status_to_clinics_table', 8),
	(35, '2023_03_29_180236_add_column_status_to_drugs_table', 8),
	(36, '2023_03_29_180618_add_column_status_to_pharmacies_table', 8),
	(37, '2023_03_29_180808_add_column_status_to_doctors_table', 8),
	(38, '2023_03_29_181028_add_column_status_to_patients_table', 8),
	(39, '2023_03_29_181236_add_column_status_to_receipts_table', 8),
	(40, '2023_03_31_133654_add_column_status_to_organization_types_table', 9),
	(41, '2023_04_13_115455_create_clinics_with_doctors_table', 10),
	(42, '2023_04_13_115902_create_diagnosis_table', 10),
	(43, '2023_04_13_120242_add_column_diagnosis_id_to_sick_lists_table', 10),
	(44, '2023_04_13_120750_add_column_receipt_id_to_sick_lists_table', 10),
	(45, '2023_04_13_126242_add_column_diagnosis_id_to_sick_lists_table', 11),
	(46, '2023_04_13_126750_add_column_receipt_id_to_sick_lists_table', 11),
	(47, '2023_04_13_126839_add_fk_receipt_id_to_sick_lists_table', 12),
	(48, '2023_04_13_131750_add_fk_diagnosis_id_to_sick_lists_table', 13),
	(49, '2023_04_13_140621_add_column_insurance_to_patients_table', 14);

-- Дамп структуры для таблица myreceipt.organizations
CREATE TABLE IF NOT EXISTS `organizations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `registration_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `founding_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.organizations: ~10 rows (приблизительно)
INSERT INTO `organizations` (`id`, `name`, `phone`, `description`, `registration_number`, `founding_date`, `created_at`, `updated_at`) VALUES
	(1, 'Louie Batz', '940.490.9879', 'Ut est.', '738', '17:29:05', '2023-03-18 20:26:17', '2023-03-18 20:26:17'),
	(2, 'Aurelia Gibson', '475-477-3367', 'Ab et.', '37011', '17:25:20', '2023-03-18 20:26:17', '2023-03-18 20:26:17'),
	(3, 'Ms. Eulah Stamm', '+1-845-212-7665', 'Ab est.', '43814', '10:38:11', '2023-03-18 20:26:17', '2023-03-18 20:26:17'),
	(4, 'Myriam Nikolaus', '(617) 633-5970', 'Fugiat.', '49271', '14:56:40', '2023-03-18 20:26:17', '2023-03-18 20:26:17'),
	(5, 'Mr. Elmore Doyle', '1-341-534-7714', 'Sequi eos.', '33548', '08:36:04', '2023-03-18 20:26:17', '2023-03-18 20:26:17'),
	(6, 'Aniya Hickle', '442.540.2330', 'Sed.', '99650', '22:10:09', '2023-03-18 20:26:17', '2023-03-18 20:26:17'),
	(7, 'Mr. Scot Reichert II', '+1 (479) 843-1048', 'Error qui.', '731', '10:21:52', '2023-03-18 20:26:17', '2023-03-18 20:26:17'),
	(8, 'Jeanette Blanda', '+1-689-347-0588', 'Fuga et.', '622', '21:35:40', '2023-03-18 20:26:17', '2023-03-18 20:26:17'),
	(9, 'Marjory Brakus', '508.428.6804', 'Aut sed.', '76447', '09:20:55', '2023-03-18 20:26:17', '2023-03-18 20:26:17'),
	(10, 'Dr. Arnaldo Wilderman', '681.797.6438', 'Labore.', '74700', '20:03:03', '2023-03-18 20:26:17', '2023-03-18 20:26:17');

-- Дамп структуры для таблица myreceipt.organization_types
CREATE TABLE IF NOT EXISTS `organization_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `organizationType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('draft','active','blocked','archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.organization_types: ~13 rows (приблизительно)
INSERT INTO `organization_types` (`id`, `organizationType`, `description`, `created_at`, `updated_at`, `status`) VALUES
	(1, 'Stephen Batz', 'Reiciendis et animi doloremque commodi sint. Autem et quod consequatur qui qui sit ratione. Eveniet possimus veniam sequi omnis animi ullam delectus. Amet totam consequatur est animi dolorem optio.', '2023-03-26 17:18:31', '2023-03-26 17:18:31', 'active'),
	(2, 'Jared Paucek', 'Illum et velit natus sunt. Voluptate esse suscipit eos sunt eum necessitatibus. Velit pariatur deserunt nostrum temporibus.', '2023-03-26 17:18:31', '2023-03-26 17:18:31', 'active'),
	(3, 'Ms. Mossie Larson IV', 'Distinctio assumenda at numquam nam eaque. Labore aspernatur voluptas fuga velit nihil dolores dignissimos. Animi in voluptas et numquam nisi.', '2023-03-26 17:18:31', '2023-03-26 17:18:31', 'active'),
	(4, 'Reynold Kutch', 'Nulla veniam nulla quidem necessitatibus eos. Incidunt rerum nulla ut aut nam. Hic in autem nemo voluptatem dolores corporis reprehenderit.', '2023-03-26 17:18:31', '2023-03-26 17:18:31', 'active'),
	(5, 'Uriah Konopelski', 'Numquam aliquam qui velit nam in. Sit exercitationem voluptas tempora officia asperiores. Neque ut sapiente aut. Et et eligendi voluptatem eum ex non et voluptatum.', '2023-03-26 17:18:31', '2023-03-26 17:18:31', 'active'),
	(6, 'Mr. Sean Harvey', 'Reiciendis natus voluptatibus quas libero a rerum aut. Possimus est quis commodi esse numquam delectus omnis sunt. In neque maiores et provident quaerat consequatur aut.', '2023-03-26 17:18:31', '2023-03-26 17:18:31', 'active'),
	(7, 'Trycia Luettgen', 'Facilis commodi aut reprehenderit saepe. Ullam et enim et quidem quisquam cumque et. Et eum id et dicta.', '2023-03-26 17:18:31', '2023-03-26 17:18:31', 'active'),
	(8, 'Cedrick Moen I', 'Consequatur exercitationem eaque sit sed ducimus et autem. Distinctio tenetur ab corrupti. Molestiae debitis eaque libero autem. Et animi saepe culpa impedit non eaque assumenda.', '2023-03-26 17:18:31', '2023-03-26 17:18:31', 'active'),
	(9, 'Bernhard Cummings', 'Modi sequi nemo tempora aspernatur dolor inventore. Quis vero omnis dolorum dolor dolore deleniti reprehenderit.', '2023-03-26 17:18:31', '2023-03-26 17:18:31', 'active'),
	(10, 'Prof. Percy Morar', 'Iure debitis maiores magni similique sint est saepe. Iste voluptatem molestiae aut qui impedit voluptatem harum. Expedita voluptas reprehenderit rerum. Et et natus modi rerum dignissimos.', '2023-03-26 17:18:31', '2023-03-26 17:18:31', 'active'),
	(11, 'OrgType1', 'OrgTypeType1', '2023-03-31 19:09:06', '2023-03-31 19:09:06', 'active'),
	(12, 'OrgType5555', 'OrgTypeType5555', '2023-03-31 19:10:33', '2023-04-14 13:28:04', 'draft'),
	(14, 'OrgType222233333', 'sfszdfzdxfxdzfxdf', '2023-04-14 13:26:52', '2023-04-14 13:26:52', 'archived');

-- Дамп структуры для таблица myreceipt.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.password_resets: ~0 rows (приблизительно)

-- Дамп структуры для таблица myreceipt.patients
CREATE TABLE IF NOT EXISTS `patients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_online` tinyint(1) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medical_card_stored_in_clinic_id` bigint unsigned NOT NULL,
  `status` enum('active','blocked','archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `insurance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patients_medical_card_stored_in_clinic_id_foreign` (`medical_card_stored_in_clinic_id`),
  CONSTRAINT `patients_medical_card_stored_in_clinic_id_foreign` FOREIGN KEY (`medical_card_stored_in_clinic_id`) REFERENCES `clinics` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.patients: ~13 rows (приблизительно)
INSERT INTO `patients` (`id`, `created_at`, `updated_at`, `refresh_token`, `access_token`, `is_online`, `name`, `surname`, `barcode`, `medical_card_stored_in_clinic_id`, `status`, `insurance`) VALUES
	(11, '2023-03-18 20:34:36', '2023-03-18 20:34:36', 'Voluptas.', 'Ullam.', 1, 'Prof. Jayde Kshlerin V', 'Dr. Electa Rice PhD', 'Magnam.', 11, 'active', 'dfkjfh'),
	(12, '2023-03-18 20:34:36', '2023-03-18 20:34:36', 'Incidunt.', 'Nobis.', 1, 'Aleen Runte', 'Miss Katelyn Dietrich', 'Autem aut.', 17, 'active', 'assddffg'),
	(13, '2023-03-18 20:34:36', '2023-03-18 20:34:36', 'Cumque.', 'Illo.', 1, 'Olin Kuhic', 'Prof. Daisha Brown', 'Fugit.', 16, 'active', 'vcvbnbmn'),
	(14, '2023-03-18 20:34:36', '2023-03-18 20:34:36', 'Inventore.', 'Quos aut.', 1, 'Kiara Quigley', 'Vernon Orn', 'Earum.', 12, 'active', 'bvgftruy'),
	(15, '2023-03-18 20:34:36', '2023-03-18 20:34:36', 'Dolorum.', 'Dolorem.', 1, 'Marcos Schaden', 'Grayce Jacobi', 'Et.', 16, 'active', 'cxdsgfre'),
	(16, '2023-03-18 20:34:36', '2023-03-18 20:34:36', 'Laborum.', 'Fuga et.', 1, 'Toby Mertz', 'Mr. Dorian Kihn', 'Est qui.', 20, 'active', 'fdhgytre'),
	(17, '2023-03-18 20:34:36', '2023-03-18 20:34:36', 'Id magnam.', 'Quis.', 1, 'Celestine Nicolas II', 'Ciara Bogisich', 'Iusto.', 13, 'active', 'safdrewq'),
	(18, '2023-03-18 20:34:36', '2023-03-18 20:34:36', 'Quos quod.', 'Est esse.', 1, 'Alexys Crist IV', 'Theo Veum', 'Occaecati.', 17, 'active', 'gfjhljki'),
	(19, '2023-03-18 20:34:36', '2023-03-18 20:34:36', 'Ad.', 'Ex.', 1, 'Dr. Harmon Ferry', 'Heaven Dietrich', 'Quia.', 13, 'active', 'bvmnhgkj'),
	(20, '2023-03-18 20:34:36', '2023-03-18 20:34:36', 'Qui sunt.', 'Nemo.', 1, 'Mrs. Carole Keeling', 'Sallie Macejkovic', 'Tenetur.', 17, 'active', 'bvhgkjyt'),
	(24, '2023-03-30 13:27:50', '2023-03-30 13:27:50', 'refresh_token_here', 'access_token_here', 1, 'Patient1', 'PatientPatient1', '0123456789', 11, 'active', 'cxdsewwq'),
	(26, '2023-03-30 13:35:31', '2023-03-30 15:43:43', 'refresh_token_here', 'access_token_here', 1, 'Patient3333', 'PatientPatient33333', '3333333333333', 11, 'blocked', 'saxzdscx'),
	(27, '2023-03-30 19:18:58', '2023-03-30 19:18:58', 'refresh_token_here', 'access_token_here', 1, 'Patient123', 'PatientPatient123', '0123456789324', 11, 'active', 'cxdsewre'),
	(28, '2023-04-14 13:23:07', '2023-04-14 13:23:49', 'refresh_token_here', 'access_token_here', 1, 'saaaaaaaaaaaaaaa', 'dfdfdf', '44444444444444444444', 11, 'blocked', '343434');

-- Дамп структуры для таблица myreceipt.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` bigint unsigned NOT NULL,
  `payment_type_id` bigint unsigned NOT NULL,
  `service_id` bigint unsigned NOT NULL,
  `payment_status_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payments_patient_id_foreign` (`patient_id`),
  KEY `payments_payment_type_id_foreign` (`payment_type_id`),
  KEY `payments_service_id_foreign` (`service_id`),
  KEY `payments_payment_status_id_foreign` (`payment_status_id`),
  CONSTRAINT `payments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  CONSTRAINT `payments_payment_status_id_foreign` FOREIGN KEY (`payment_status_id`) REFERENCES `payment_statuses` (`id`),
  CONSTRAINT `payments_payment_type_id_foreign` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`),
  CONSTRAINT `payments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.payments: ~0 rows (приблизительно)

-- Дамп структуры для таблица myreceipt.payment_statuses
CREATE TABLE IF NOT EXISTS `payment_statuses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.payment_statuses: ~10 rows (приблизительно)
INSERT INTO `payment_statuses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Marcos Gulgowski IV', 'Et velit.', '2023-03-18 20:38:09', '2023-03-18 20:38:09'),
	(2, 'Mrs. Tamia Bahringer II', 'Excepturi.', '2023-03-18 20:38:09', '2023-03-18 20:38:09'),
	(3, 'Ms. Alejandra Von Jr.', 'Est eum.', '2023-03-18 20:38:09', '2023-03-18 20:38:09'),
	(4, 'Twila Christiansen', 'Amet.', '2023-03-18 20:38:09', '2023-03-18 20:38:09'),
	(5, 'Prof. Otto Metz Sr.', 'Est illum.', '2023-03-18 20:38:09', '2023-03-18 20:38:09'),
	(6, 'Prof. Noemie Fahey III', 'Esse ut.', '2023-03-18 20:38:09', '2023-03-18 20:38:09'),
	(7, 'Stevie Dooley', 'Et ipsum.', '2023-03-18 20:38:09', '2023-03-18 20:38:09'),
	(8, 'Solon Cassin', 'Aperiam.', '2023-03-18 20:38:09', '2023-03-18 20:38:09'),
	(9, 'Marisa Will', 'Vel.', '2023-03-18 20:38:09', '2023-03-18 20:38:09'),
	(10, 'Johanna Balistreri', 'Voluptas.', '2023-03-18 20:38:09', '2023-03-18 20:38:09');

-- Дамп структуры для таблица myreceipt.payment_types
CREATE TABLE IF NOT EXISTS `payment_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.payment_types: ~10 rows (приблизительно)
INSERT INTO `payment_types` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Norma Harber', 'Quasi.', '2023-03-18 20:37:23', '2023-03-18 20:37:23'),
	(2, 'Fred McCullough', 'Id ea.', '2023-03-18 20:37:23', '2023-03-18 20:37:23'),
	(3, 'Gertrude Schimmel', 'Provident.', '2023-03-18 20:37:23', '2023-03-18 20:37:23'),
	(4, 'Glenda Legros IV', 'Deleniti.', '2023-03-18 20:37:23', '2023-03-18 20:37:23'),
	(5, 'Geoffrey Leannon', 'Doloribus.', '2023-03-18 20:37:23', '2023-03-18 20:37:23'),
	(6, 'Miss Tiara Fahey', 'Sit.', '2023-03-18 20:37:23', '2023-03-18 20:37:23'),
	(7, 'Lula Huels', 'Numquam.', '2023-03-18 20:37:23', '2023-03-18 20:37:23'),
	(8, 'Dr. Milo Stark PhD', 'Commodi.', '2023-03-18 20:37:23', '2023-03-18 20:37:23'),
	(9, 'Esta Boyle I', 'Et ex.', '2023-03-18 20:37:23', '2023-03-18 20:37:23'),
	(10, 'Gaetano Hane', 'Possimus.', '2023-03-18 20:37:23', '2023-03-18 20:37:23');

-- Дамп структуры для таблица myreceipt.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.personal_access_tokens: ~0 rows (приблизительно)

-- Дамп структуры для таблица myreceipt.pharmacies
CREATE TABLE IF NOT EXISTS `pharmacies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps_coordinates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `working_modes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `organization_types_id` bigint unsigned NOT NULL,
  `status` enum('active','blocked','archived') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `pharmacies_organization_id_foreign` (`organization_id`),
  KEY `pharmacies_organization_types_id_foreign` (`organization_types_id`),
  CONSTRAINT `pharmacies_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`),
  CONSTRAINT `pharmacies_organization_types_id_foreign` FOREIGN KEY (`organization_types_id`) REFERENCES `organization_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.pharmacies: ~12 rows (приблизительно)
INSERT INTO `pharmacies` (`id`, `name`, `address`, `phone`, `email`, `gps_coordinates`, `working_modes`, `organization_id`, `created_at`, `updated_at`, `organization_types_id`, `status`) VALUES
	(1, 'Pharm17', '1190 McClure Mews\nDeloresbury, WY 47590', '+1-608-921-2768', 'swillms@purdy.com', 'ASAXET1WLZL', 'Enim.', 7, '2023-03-18 20:56:35', '2023-03-18 20:56:35', 2, 'active'),
	(2, 'Pharm198', '4341 Oberbrunner Camp\nLake Evan, SC 80697', '(213) 285-1795', 'emory34@gmail.com', 'ZVFFYRSI', 'Laborum.', 4, '2023-03-18 20:56:35', '2023-03-18 20:56:35', 3, 'active'),
	(3, 'Pharm19', '37426 Arianna Stream\nMorissettebury, UT 89808-3191', '+1 (914) 878-6549', 'lucas15@murazik.net', 'MXTYOAV0', 'Dolore.', 4, '2023-03-18 20:56:35', '2023-03-18 20:56:35', 2, 'active'),
	(4, 'Pharm14', '7939 Hodkiewicz Extensions Suite 532\nDariusside, OK 35201', '(234) 233-3344', 'elza79@rippin.org', 'RCDNML3ANQW', 'Vitae eos.', 10, '2023-03-18 20:56:35', '2023-03-18 20:56:35', 4, 'active'),
	(5, 'Pharm16', '3150 Kerluke Drive\nNelsville, IA 49358-4828', '(228) 899-9122', 'rolfson.alfred@bosco.com', 'TUXUQC0KS0G', 'Sit.', 10, '2023-03-18 20:56:35', '2023-03-18 20:56:35', 4, 'active'),
	(6, 'Pharm11', '83513 Landen Turnpike\nBoganville, WY 20938', '336-492-2266', 'hegmann.jaleel@gmail.com', 'MPOZPL2DLHF', 'Soluta ea.', 8, '2023-03-18 20:56:35', '2023-03-18 20:56:35', 7, 'active'),
	(7, 'Pharm13', '11731 Maxie Trafficway\nStiedemannville, WA 41062-0466', '440-796-9881', 'ephraim.hermann@hagenes.com', 'JGFUQUY2HQ3', 'Dolore ea.', 2, '2023-03-18 20:56:35', '2023-03-18 20:56:35', 10, 'active'),
	(8, 'Pharm12', '6316 Sipes Extension\nEast Mabel, HI 16347', '984.526.9250', 'kailyn.batz@hotmail.com', 'DBSOCJJC', 'Numquam.', 1, '2023-03-18 20:56:35', '2023-03-18 20:56:35', 1, 'active'),
	(9, 'Pharm132', '830 Hugh Path\nSchadenton, MO 61402-6409', '757.970.0384', 'juana78@glover.com', 'MITFUURFGBG', 'Ea.', 10, '2023-03-18 20:56:35', '2023-03-18 20:56:35', 2, 'active'),
	(10, 'Pharm176', '99159 Luettgen Shores\nMillsfurt, MO 62871', '818-889-5928', 'alfonzo.rau@kilback.com', 'DSYZLN25', 'Qui quia.', 7, '2023-03-18 20:56:35', '2023-03-18 20:56:35', 3, 'active'),
	(12, 'Pharm199', 'address17777', '1234567890127777', 'test@mail.ru', '11 22 33 44555', '"rr55fffffffff"', 1, '2023-04-02 18:44:55', '2023-04-02 18:55:43', 2, 'blocked'),
	(13, 'aaaaaaaaaaaaaaaa', 'ddddddddddddddd', '1234567890127777', 'Clinic2@asd.qw', '11 22 33 44555', '"ss dd"', 1, '2023-04-14 12:34:32', '2023-04-14 12:35:56', 1, 'archived'),
	(14, 'ккккккккккк', 'address1', '123456789015533', 'test@mail.ru', '11 22 33 44 55 66 77 88 99 00', '"dd ff"', 1, '2023-04-14 12:48:59', '2023-04-14 12:48:59', 4, 'active');

-- Дамп структуры для таблица myreceipt.pharmacies_has_drugs
CREATE TABLE IF NOT EXISTS `pharmacies_has_drugs` (
  `pharmacy_id` bigint unsigned NOT NULL,
  `drugs_id` bigint unsigned NOT NULL,
  `count` bigint NOT NULL,
  KEY `pharmacies_has_drugs_pharmacy_id_foreign` (`pharmacy_id`),
  KEY `pharmacies_has_drugs_drugs_id_foreign` (`drugs_id`),
  CONSTRAINT `pharmacies_has_drugs_drugs_id_foreign` FOREIGN KEY (`drugs_id`) REFERENCES `drugs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pharmacies_has_drugs_pharmacy_id_foreign` FOREIGN KEY (`pharmacy_id`) REFERENCES `pharmacies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.pharmacies_has_drugs: ~20 rows (приблизительно)
INSERT INTO `pharmacies_has_drugs` (`pharmacy_id`, `drugs_id`, `count`) VALUES
	(3, 6, 10),
	(6, 9, 12),
	(6, 9, 22),
	(7, 7, 30),
	(8, 1, 21),
	(6, 10, 18),
	(9, 6, 19),
	(9, 2, 23),
	(7, 5, 30),
	(1, 4, 27),
	(8, 9, 16),
	(6, 1, 15),
	(10, 4, 18),
	(7, 6, 11),
	(2, 5, 14),
	(3, 7, 13),
	(7, 8, 25),
	(7, 5, 24),
	(5, 3, 26),
	(10, 6, 29);

-- Дамп структуры для таблица myreceipt.receipts
CREATE TABLE IF NOT EXISTS `receipts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` bigint unsigned NOT NULL,
  `doctor_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `valid_until_date` date NOT NULL,
  `drug_id` bigint unsigned NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','closed','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `receipts_patient_id_foreign` (`patient_id`),
  KEY `receipts_doctor_id_foreign` (`doctor_id`),
  KEY `receipts_drug_id_foreign` (`drug_id`),
  CONSTRAINT `receipts_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  CONSTRAINT `receipts_drug_id_foreign` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`id`),
  CONSTRAINT `receipts_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.receipts: ~12 rows (приблизительно)
INSERT INTO `receipts` (`id`, `patient_id`, `doctor_id`, `name`, `created_at`, `updated_at`, `valid_until_date`, `drug_id`, `barcode`, `status`) VALUES
	(11, 12, 2, 'Alanna Dickens', '2023-03-18 20:43:14', '2023-03-18 20:43:14', '2023-03-18', 1, 'Ut.', 'active'),
	(12, 16, 5, 'Raven Hyatt', '2023-03-18 20:43:14', '2023-03-18 20:43:14', '2023-03-18', 8, 'Sint.', 'active'),
	(13, 16, 1, 'Prof. Karley Bailey', '2023-03-18 20:43:14', '2023-03-18 20:43:14', '2023-03-18', 7, 'Dolores.', 'active'),
	(14, 13, 3, 'Abagail Funk Sr.', '2023-03-18 20:43:14', '2023-03-18 20:43:14', '2023-03-18', 7, 'Ipsum eum.', 'active'),
	(15, 18, 1, 'Abbigail Orn MD', '2023-03-18 20:43:14', '2023-03-18 20:43:14', '2023-03-18', 2, 'Quod.', 'active'),
	(16, 18, 4, 'Karlee Hill', '2023-03-18 20:43:14', '2023-03-18 20:43:14', '2023-03-18', 3, 'Accusamus.', 'active'),
	(17, 20, 2, 'Amari Goodwin', '2023-03-18 20:43:14', '2023-03-18 20:43:14', '2023-03-18', 3, 'Sapiente.', 'active'),
	(18, 12, 3, 'Winifred Schamberger', '2023-03-18 20:43:14', '2023-03-18 20:43:14', '2023-03-18', 9, 'Modi.', 'active'),
	(19, 11, 3, 'Edmond Koss III', '2023-03-18 20:43:14', '2023-03-18 20:43:14', '2023-03-18', 8, 'Quaerat.', 'active'),
	(20, 18, 1, 'Christ Thiel Sr.', '2023-03-18 20:43:14', '2023-03-18 20:43:14', '2023-03-18', 7, 'Doloribus.', 'active'),
	(21, 27, 17, 'Receipt1', '2023-04-02 21:31:55', '2023-04-02 21:31:55', '1234-12-12', 12, '0987654321', 'blocked'),
	(23, 26, 40, 'Receipt55555', '2023-04-02 22:12:17', '2023-04-02 22:12:17', '2312-11-11', 14, '19371947489723454932558', 'active'),
	(24, 26, 19, 'testtest44', '2023-04-14 10:52:25', '2023-04-14 10:52:25', '2099-01-01', 14, '44444444444444444444', 'active'),
	(25, 27, 18, 'fjgfjghjghjkghjghjgj', '2023-04-14 11:27:47', '2023-04-14 11:31:35', '2099-01-01', 14, '44444444444444444444', 'closed'),
	(26, 20, 17, 'erereretytutu', '2023-04-14 11:29:12', '2023-04-14 11:29:12', '2099-01-01', 6, '44444444444444444444', 'active'),
	(27, 17, 17, 'hcfhfchfchfh', '2023-04-14 11:29:52', '2023-04-14 11:29:52', '2099-01-01', 5, '44444444444444444444', 'blocked');

-- Дамп структуры для таблица myreceipt.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `rules_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.services: ~10 rows (приблизительно)
INSERT INTO `services` (`id`, `name`, `description`, `price`, `rules_url`, `created_at`, `updated_at`) VALUES
	(1, 'Ms. Jeanie Maggio MD', 'Ex omnis.', 244.45, 'http://www.kling.org/', '2023-03-18 20:35:41', '2023-03-18 20:35:41'),
	(2, 'Otilia Hoeger I', 'Beatae.', 759.90, 'https://www.braun.com/nisi-est-sit-ut', '2023-03-18 20:35:41', '2023-03-18 20:35:41'),
	(3, 'Connor Krajcik II', 'Provident.', 529.08, 'https://russel.com/hic-repellendus-itaque-vel-doloribus-iste-ab-quis.html', '2023-03-18 20:35:41', '2023-03-18 20:35:41'),
	(4, 'Keeley Schulist', 'Et et.', 935.74, 'http://boyle.com/', '2023-03-18 20:35:41', '2023-03-18 20:35:41'),
	(5, 'Norberto Anderson Sr.', 'Velit aut.', 280.55, 'http://www.langworth.net/velit-consequatur-autem-reiciendis-quasi', '2023-03-18 20:35:41', '2023-03-18 20:35:41'),
	(6, 'Prof. Granville Smith DVM', 'Deleniti.', 862.73, 'http://www.hayes.net/iusto-qui-aut-quod-dolor-nostrum-quo', '2023-03-18 20:35:41', '2023-03-18 20:35:41'),
	(7, 'Albert Hermiston', 'Facilis.', 21.95, 'http://www.considine.com/nihil-aperiam-omnis-id-esse-velit-velit-iure', '2023-03-18 20:35:41', '2023-03-18 20:35:41'),
	(8, 'Esta Zieme', 'Expedita.', 74.36, 'http://www.gleason.com/consectetur-incidunt-voluptas-et.html', '2023-03-18 20:35:41', '2023-03-18 20:35:41'),
	(9, 'Ayden Schinner', 'Velit.', 33.91, 'https://stanton.info/repellat-quas-nostrum-nobis-dolor-in-eum-quasi.html', '2023-03-18 20:35:41', '2023-03-18 20:35:41'),
	(10, 'Virgie Ankunding', 'Quae.', 666.73, 'http://www.konopelski.org/', '2023-03-18 20:35:41', '2023-03-18 20:35:41');

-- Дамп структуры для таблица myreceipt.sick_lists
CREATE TABLE IF NOT EXISTS `sick_lists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `patient_id` bigint unsigned NOT NULL,
  `doctor_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `valid_until_date` date NOT NULL,
  `diagnosis_id` bigint unsigned NOT NULL,
  `receipt_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sick_lists_patient_id_foreign` (`patient_id`),
  KEY `sick_lists_doctor_id_foreign` (`doctor_id`),
  KEY `sick_lists_receipt_id_foreign` (`receipt_id`),
  KEY `sick_lists_diagnosis_id_foreign` (`diagnosis_id`),
  CONSTRAINT `sick_lists_diagnosis_id_foreign` FOREIGN KEY (`diagnosis_id`) REFERENCES `diagnosis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sick_lists_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  CONSTRAINT `sick_lists_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`),
  CONSTRAINT `sick_lists_receipt_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.sick_lists: ~10 rows (приблизительно)
INSERT INTO `sick_lists` (`id`, `patient_id`, `doctor_id`, `description`, `created_at`, `updated_at`, `valid_until_date`, `diagnosis_id`, `receipt_id`) VALUES
	(11, 14, 1, 'Quaerat.', '2023-03-18 20:41:37', '2023-03-18 20:41:37', '2023-03-18', 9, 18),
	(12, 11, 2, 'Dolores.', '2023-03-18 20:41:37', '2023-03-18 20:41:37', '2023-03-18', 1, 20),
	(13, 19, 2, 'Veniam.', '2023-03-18 20:41:37', '2023-03-18 20:41:37', '2023-03-18', 8, 17),
	(14, 18, 3, 'Illum.', '2023-03-18 20:41:37', '2023-03-18 20:41:37', '2023-03-18', 2, 11),
	(15, 12, 2, 'Facilis.', '2023-03-18 20:41:37', '2023-03-18 20:41:37', '2023-03-18', 4, 12),
	(16, 16, 5, 'Neque ea.', '2023-03-18 20:41:37', '2023-03-18 20:41:37', '2023-03-18', 7, 14),
	(17, 19, 2, 'Nam velit.', '2023-03-18 20:41:37', '2023-03-18 20:41:37', '2023-03-18', 3, 19),
	(18, 13, 2, 'Autem.', '2023-03-18 20:41:37', '2023-03-18 20:41:37', '2023-03-18', 5, 13),
	(19, 11, 5, 'Aut.', '2023-03-18 20:41:37', '2023-03-18 20:41:37', '2023-03-18', 10, 16),
	(20, 12, 1, 'Fugiat.', '2023-03-18 20:41:37', '2023-03-18 20:41:37', '2023-03-18', 6, 15);

-- Дамп структуры для таблица myreceipt.specialities
CREATE TABLE IF NOT EXISTS `specialities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.specialities: ~13 rows (приблизительно)
INSERT INTO `specialities` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Caleigh Hintz', 'Enim quis.', '2023-03-18 20:24:48', '2023-03-18 20:24:48'),
	(2, 'Romaine Kessler', 'Expedita.', '2023-03-18 20:24:48', '2023-03-18 20:24:48'),
	(3, 'Jaida Johnson', 'Omnis et.', '2023-03-18 20:24:48', '2023-03-18 20:24:48'),
	(4, 'Kendra Mayer', 'Eos.', '2023-03-18 20:24:48', '2023-03-18 20:24:48'),
	(5, 'Shea Rath Sr.', 'Omnis ut.', '2023-03-18 20:24:48', '2023-03-18 20:24:48'),
	(6, 'Prof. Chaya Dicki IV', 'Totam.', '2023-03-18 20:24:48', '2023-03-18 20:24:48'),
	(7, 'Jaeden Walter', 'Expedita.', '2023-03-18 20:24:48', '2023-03-18 20:24:48'),
	(8, 'Arnoldo Schamberger', 'Ut quo.', '2023-03-18 20:24:48', '2023-03-18 20:24:48'),
	(9, 'Shanon Robel DDS', 'Qui quia.', '2023-03-18 20:24:48', '2023-03-18 20:24:48'),
	(10, 'Mr. Stevie Ortiz MD', 'Dolor.', '2023-03-18 20:24:48', '2023-03-18 20:24:48'),
	(11, 'SpecialityTest111111', 'test test 111111', '2023-03-30 10:52:56', '2023-03-30 11:44:41'),
	(12, 'SpecialityTest2', 'test test test 2', '2023-03-30 11:36:15', '2023-03-30 11:36:15'),
	(14, 'dfdfdfdfdfd', 'ASASASASASAS', '2023-04-14 13:30:05', '2023-04-14 13:30:53');

-- Дамп структуры для таблица myreceipt.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.users: ~0 rows (приблизительно)

-- Дамп структуры для таблица myreceipt.video_calls
CREATE TABLE IF NOT EXISTS `video_calls` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `meeting_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `video_calls_meeting_id_foreign` (`meeting_id`),
  CONSTRAINT `video_calls_meeting_id_foreign` FOREIGN KEY (`meeting_id`) REFERENCES `meetings` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы myreceipt.video_calls: ~10 rows (приблизительно)
INSERT INTO `video_calls` (`id`, `meeting_id`, `created_at`, `updated_at`, `url`) VALUES
	(11, 22, '2023-03-18 20:52:19', '2023-03-18 20:52:19', 'http://goodwin.com/earum-porro-reiciendis-tenetur-incidunt-accusantium-sit'),
	(12, 23, '2023-03-18 20:52:20', '2023-03-18 20:52:20', 'http://www.eichmann.com/saepe-sit-libero-quo-optio-sequi-occaecati'),
	(13, 30, '2023-03-18 20:52:20', '2023-03-18 20:52:20', 'http://www.mills.com/eos-officiis-neque-aut-sequi-id-mollitia.html'),
	(14, 28, '2023-03-18 20:52:20', '2023-03-18 20:52:20', 'http://thompson.com/consequatur-amet-nisi-est.html'),
	(15, 21, '2023-03-18 20:52:20', '2023-03-18 20:52:20', 'http://legros.net/'),
	(16, 30, '2023-03-18 20:52:20', '2023-03-18 20:52:20', 'http://schmidt.com/corporis-inventore-consequatur-ipsam-facere-itaque-enim-ut-sint'),
	(17, 26, '2023-03-18 20:52:20', '2023-03-18 20:52:20', 'http://www.mccullough.com/doloribus-est-sint-ut-aperiam'),
	(18, 30, '2023-03-18 20:52:20', '2023-03-18 20:52:20', 'https://www.goodwin.biz/eos-aut-voluptatem-rem'),
	(19, 24, '2023-03-18 20:52:20', '2023-03-18 20:52:20', 'https://www.bosco.com/porro-adipisci-quia-esse-ut'),
	(20, 30, '2023-03-18 20:52:20', '2023-03-18 20:52:20', 'https://west.com/excepturi-recusandae-quo-libero-ut-itaque-repellendus-dolor-magnam.html');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
