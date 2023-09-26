-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.1.2-MariaDB-1:11.1.2+maria~ubu2204 - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for project
DROP DATABASE IF EXISTS `project`;
CREATE DATABASE IF NOT EXISTS `project` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `project`;

-- Dumping structure for table project.brands
DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` varchar(255) NOT NULL DEFAULT '0' COMMENT 'Brand Name',
  PRIMARY KEY (`id`),
  KEY `brand_name_idx` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Brands of vehicle';

-- Dumping data for table project.brands: ~24 rows (approximately)
DELETE FROM `brands`;
INSERT INTO `brands` (`id`, `name`) VALUES
	(16, 'Acura'),
	(1, 'Buick'),
	(24, 'Cadillac'),
	(3, 'Chevrolet'),
	(10, 'Chrysler'),
	(7, 'Dodge'),
	(9, 'Fiat'),
	(11, 'Fisker'),
	(6, 'Ford'),
	(2, 'GMC'),
	(17, 'Honda'),
	(4, 'Hyundai'),
	(18, 'Infiniti'),
	(12, 'Jeep'),
	(5, 'Kia'),
	(20, 'Lexus'),
	(22, 'Mazda'),
	(21, 'Mitsubishi'),
	(15, 'Nissan'),
	(8, 'Ram'),
	(14, 'Renault'),
	(23, 'Rivian'),
	(13, 'Tesla'),
	(19, 'Toyota');

-- Dumping structure for table project.colors
DROP TABLE IF EXISTS `colors`;
CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` varchar(255) NOT NULL DEFAULT '0' COMMENT 'Color Name',
  KEY `id` (`id`),
  KEY `color_name_idx` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Colors for vehicles';

-- Dumping data for table project.colors: ~6 rows (approximately)
DELETE FROM `colors`;
INSERT INTO `colors` (`id`, `name`) VALUES
	(1, 'White'),
	(2, 'Blue'),
	(3, 'Red'),
	(4, 'Grey'),
	(5, 'Black'),
	(6, 'Violet'),
	(7, 'Silver');

-- Dumping structure for table project.conditions
DROP TABLE IF EXISTS `conditions`;
CREATE TABLE IF NOT EXISTS `conditions` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `condition` varchar(255) NOT NULL DEFAULT '0' COMMENT 'Condition',
  PRIMARY KEY (`id`),
  KEY `condition_idx` (`condition`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='List of available conditions';

-- Dumping data for table project.conditions: ~3 rows (approximately)
DELETE FROM `conditions`;
INSERT INTO `conditions` (`id`, `condition`) VALUES
	(1, 'New'),
	(2, 'Pre-Owned'),
	(3, 'TLO');

-- Dumping structure for table project.inventory
DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `vehicle` int(11) DEFAULT NULL COMMENT 'Vehicle ID',
  `condition` int(11) DEFAULT NULL COMMENT 'Condition ID',
  `stock_id` int(11) DEFAULT NULL COMMENT 'Stock Identifier',
  `color` int(11) DEFAULT NULL COMMENT 'Color ID',
  `msrp` float(11,2) DEFAULT NULL COMMENT 'MSRP',
  `mileage` int(11) DEFAULT NULL COMMENT 'Mileage',
  `photo_url` varchar(255) DEFAULT NULL COMMENT 'Photo URL for vehicle',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Active inventory at the dealership';

-- Dumping data for table project.inventory: ~4 rows (approximately)
DELETE FROM `inventory`;
INSERT INTO `inventory` (`id`, `vehicle`, `condition`, `stock_id`, `color`, `msrp`, `mileage`, `photo_url`) VALUES
	(1, 1, 1, 1, 1, 76295.00, 8, 'image-1.jpg'),
	(2, 2, 1, 2, 2, 66890.00, 4, 'image-2.jpg'),
	(3, 3, 1, 3, 1, 37990.00, 3062, 'image-3.jpg'),
	(4, 3, 1, 4, 1, 38870.00, 3191, 'image-4.jpg');

-- Dumping structure for table project.manufacturers
DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` varchar(255) NOT NULL DEFAULT '0' COMMENT 'Manufacturer Name',
  PRIMARY KEY (`id`),
  KEY `manufactuers_name_idx` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='List of vehicle manufacturers';

-- Dumping data for table project.manufacturers: ~11 rows (approximately)
DELETE FROM `manufacturers`;
INSERT INTO `manufacturers` (`id`, `name`) VALUES
	(9, 'Fisker'),
	(2, 'Ford'),
	(1, 'General Motors'),
	(8, 'Honda'),
	(4, 'Hyundai Motor Company'),
	(3, 'Kia Motors'),
	(11, 'Lordstown Motors'),
	(7, 'Nissan'),
	(5, 'Stellantis/Fiat Chrysler Automobiles'),
	(10, 'Tesla'),
	(6, 'Toyota');

-- Dumping structure for table project.model
DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` varchar(255) NOT NULL DEFAULT '0' COMMENT 'Model Name',
  PRIMARY KEY (`id`),
  KEY `model_name_idx` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Variations of models for vehicle type';

-- Dumping data for table project.model: ~0 rows (approximately)
DELETE FROM `model`;

-- Dumping structure for table project.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `email` varchar(255) NOT NULL COMMENT 'Email',
  `password` varchar(255) NOT NULL COMMENT 'bcrypt crypted password',
  `status` varchar(255) DEFAULT NULL COMMENT 'Account Status',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table project.users: ~0 rows (approximately)
DELETE FROM `users`;

-- Dumping structure for table project.vehicles
DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `name` varchar(255) DEFAULT '' COMMENT 'Vehicle Name',
  `brand` int(11) DEFAULT NULL COMMENT 'Brand ID',
  `model_year` int(11) DEFAULT NULL COMMENT 'Model Year',
  PRIMARY KEY (`id`),
  KEY `vehicle_brand_idx` (`brand`),
  KEY `vehicle_name_idx` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Vehicles at dealership';

-- Dumping data for table project.vehicles: ~6 rows (approximately)
DELETE FROM `vehicles`;
INSERT INTO `vehicles` (`id`, `name`, `brand`, `model_year`) VALUES
	(1, 'Silverado 1500', 3, 2023),
	(2, 'Sierra 1500', 2, 2023),
	(3, 'Envision', 1, 2023),
	(4, 'Enclave', 1, 2023),
	(5, 'Malibu', 3, 2023),
	(6, 'Encore GX', 3, 2023);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
