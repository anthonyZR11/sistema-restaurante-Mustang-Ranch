-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para carta-mustang-ranch
CREATE DATABASE IF NOT EXISTS `carta-mustang-ranch` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci */;
USE `carta-mustang-ranch`;

-- Volcando estructura para tabla carta-mustang-ranch.configurations_landings_pages
CREATE TABLE IF NOT EXISTS `configurations_landings_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `weekday_opening_hour` varchar(50) NOT NULL,
  `weekend_opening_hour` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_phare` varchar(200) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `link_facebook` varchar(100) NOT NULL,
  `link_whatsapp` varchar(100) NOT NULL,
  `link_instagram` varchar(100) NOT NULL,
  `company_email` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla carta-mustang-ranch.configurations_landings_pages: ~0 rows (aproximadamente)

-- Volcando estructura para tabla carta-mustang-ranch.dishes
CREATE TABLE IF NOT EXISTS `dishes` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `url_image` text NOT NULL,
  `price_base` decimal(11,2) NOT NULL DEFAULT 0.00,
  `price_discount` decimal(11,2) NOT NULL DEFAULT 0.00,
  `dish_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flag` tinyint(1) DEFAULT NULL,
  `status` tinyint(2) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `unique_name` (`name`),
  KEY `index_created_at` (`created_at`) USING BTREE,
  KEY `index_name` (`name`) USING BTREE,
  KEY `index_description` (`description`(3072)) USING BTREE,
  KEY `FK_dishes_dish_items` (`dish_item_id`),
  KEY `FK_dishes_users` (`user_id`),
  CONSTRAINT `FK_dishes_dish_items` FOREIGN KEY (`dish_item_id`) REFERENCES `dish_items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_dishes_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla carta-mustang-ranch.dishes: ~11 rows (aproximadamente)
INSERT INTO `dishes` (`id`, `name`, `description`, `url_image`, `price_base`, `price_discount`, `dish_item_id`, `user_id`, `flag`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'ceviche de pescado fuerte', 'rico cevhice', 'https://trexperienceperu.com/sites/default/files/2024-05/ceviche.jpg', 200.00, 58.00, 1, 11, NULL, 0, '2024-08-10 17:29:09', '2024-08-10 17:29:11'),
	(3, 'ceviche en crema de rocoto', 'rico cevhice', 'https://trexperienceperu.com/sites/default/files/2024-05/ceviche.jpg', 25.00, 21.00, 1, 11, 1, 1, '2024-08-10 17:29:09', '2024-08-10 17:29:11'),
	(4, 'leche de tirgre', 'rico cevhice', 'https://trexperienceperu.com/sites/default/files/2024-05/ceviche.jpg', 13.00, 11.00, 1, 11, 1, 1, '2024-08-10 17:29:09', '2024-08-10 17:29:11'),
	(124, 'ceviche de maruchas', 'rico cevhice', 'https://i.postimg.cc/yY6TZMBv/ceviche-rocoto-personal.jpg', 15.00, 13.00, 1, 11, 1, 1, '2024-08-10 17:29:09', '2024-08-10 17:29:11'),
	(125, 'cancha', 'de consumo', 'http://sa.com', 2.00, 3.00, 2, 11, NULL, 1, '0000-00-00 00:00:00', '2024-09-21 08:27:50'),
	(127, 'cancha de pota', 'de consumo', 'http://sa.com', 2.00, 3.00, 2, 11, NULL, 1, '0000-00-00 00:00:00', '2024-09-21 08:28:51'),
	(128, 'cancha de pota s', 'de consumo', 'http://sa.com', 2.00, 3.00, 2, 11, NULL, 1, '0000-00-00 00:00:00', '2024-09-21 08:29:50'),
	(129, 'cancha de pota ss', 'de consumo', 'http://sa.com', 2.00, 3.00, 2, 11, NULL, 1, '0000-00-00 00:00:00', '2024-09-21 08:32:20'),
	(130, 'cancha de pota ss s', 'de consumo', 'http://sa.com', 2.00, 3.00, 2, 11, NULL, 1, '0000-00-00 00:00:00', '2024-09-21 08:32:45'),
	(131, 'cancha de pota ss ss', 'de consumo', 'http://sa.com', 2.00, 3.00, 2, 11, NULL, 0, '0000-00-00 00:00:00', '2024-09-21 08:33:25'),
	(134, 'ceviche de conchas negras', 'para disfrutar', 'http://d.com', 17.00, 20.00, 1, 11, NULL, 1, '0000-00-00 00:00:00', '2024-09-21 08:36:06');

-- Volcando estructura para tabla carta-mustang-ranch.dish_items
CREATE TABLE IF NOT EXISTS `dish_items` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `unique_name` (`name`),
  UNIQUE KEY `slug` (`slug`),
  KEY `index_name` (`name`),
  KEY `index_created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla carta-mustang-ranch.dish_items: ~6 rows (aproximadamente)
INSERT INTO `dish_items` (`id`, `name`, `slug`, `created_at`, `update_at`, `status`) VALUES
	(1, 'CEVICHE', 'pescados-y-mariscos', '2024-07-31 23:48:48', '2024-07-31 23:48:34', 1),
	(2, 'GUARNICIONES', 'guarniciones', '2024-07-31 23:48:48', '2024-07-31 23:48:34', 1),
	(10, 'Chicharrones', 'chicharrones', '2024-07-31 23:48:48', '2024-07-31 23:48:34', 1),
	(11, 'PARIHUELAS', 'parihuelas', '2024-07-31 23:48:48', '2024-07-31 23:48:34', 0),
	(12, 'Array', NULL, '0000-00-00 00:00:00', '2024-09-15 18:17:35', 0),
	(17, 'TEST DE PRUEBA', NULL, '0000-00-00 00:00:00', '2024-09-15 18:22:03', 0);

-- Volcando estructura para tabla carta-mustang-ranch.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(2) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `unique_name` (`name`),
  KEY `index_name` (`name`),
  KEY `index_created_at` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla carta-mustang-ranch.roles: ~10 rows (aproximadamente)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
	(6, 'ADMINISTRADORES', '2024-08-11 17:59:53', '2024-09-15 17:57:33', 1),
	(7, 'CAJA', '2024-08-13 23:40:39', '2024-09-07 16:08:05', 0),
	(8, 'GENERENTE', '2024-08-13 23:40:39', '2024-08-13 23:40:40', 1),
	(9, 'COCINERO', '2024-08-13 23:40:39', '2024-08-13 23:40:40', 1),
	(10, 'MOZO', '0000-00-00 00:00:00', '2024-08-25 19:21:37', 1),
	(11, 'Array', '0000-00-00 00:00:00', '2024-09-07 09:20:11', 0),
	(12, 'MOZOBAR', '0000-00-00 00:00:00', '2024-09-07 09:24:38', 0),
	(21, 'MOZOBARC', '0000-00-00 00:00:00', '2024-09-07 16:04:27', 0),
	(22, 'AZIEL', '0000-00-00 00:00:00', '2024-09-07 16:05:39', 0),
	(23, 'FFFF', '2024-09-15 18:03:56', '2024-09-15 18:03:56', 1);

-- Volcando estructura para tabla carta-mustang-ranch.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `unique_email` (`email`) USING BTREE,
  KEY `index_email` (`email`),
  KEY `index_created_at` (`created_at`) USING BTREE,
  KEY `index_name` (`name`) USING BTREE,
  KEY `FK_users_roles` (`rol_id`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- Volcando datos para la tabla carta-mustang-ranch.users: ~8 rows (aproximadamente)
INSERT INTO `users` (`id`, `rol_id`, `name`, `email`, `pass`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(11, 6, 'emanuel mendoza', 'emanuel@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '2024-08-11 18:00:32', '2024-08-25 19:38:54', NULL),
	(12, 7, 'anthony', 'a@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 0, '2024-08-24 13:07:27', '2024-08-24 13:07:27', NULL),
	(13, 6, 'roberto aziel', 'roberto@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '2024-08-24 13:12:55', '2024-08-25 19:16:26', NULL),
	(15, 7, 'anthony 2', 'ab@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 11, '2024-08-24 13:09:28', '2024-08-27 21:24:18', '2024-08-27 21:24:18'),
	(16, 6, 'isa', 'abc@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 11, '2024-08-24 13:11:59', '2024-08-27 21:49:51', '2024-08-27 21:49:51'),
	(17, 6, 'sonia', 'sonia@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '2024-08-24 13:13:24', '2024-08-25 19:16:39', NULL),
	(19, 10, 'Eliza', 'eliza@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 11, '2024-08-25 19:23:09', '2024-08-27 21:24:42', '2024-08-27 21:24:42'),
	(20, 7, 'emarata', 'emarata@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 1, '2024-09-06 21:56:26', '2024-09-06 21:56:33', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
