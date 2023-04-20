-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2023 at 09:31 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `full_name` varchar(128) DEFAULT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `state` varchar(32) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `postal_code` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_address_customer1_idx` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `customer_id`, `full_name`, `address_line1`, `address_line2`, `city`, `state`, `country`, `postal_code`) VALUES
(1, 1, 'a001', '87', '1', 'บ.ไฮกรีต', 'พระนครศรีอยุธยา', NULL, '13140');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`) VALUES
(1, 'ธีรพงศ์', 'ขันตา');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ticket_id` int DEFAULT NULL,
  `job_discrption` varchar(200) DEFAULT NULL COMMENT 'รายละเอียด',
  `job_request_at` varchar(45) DEFAULT NULL COMMENT 'วันที่ร้องขอ',
  `job_broken_at` varchar(45) DEFAULT NULL COMMENT 'วันที่เสีย',
  `job_quantity` int DEFAULT '1' COMMENT 'จำนวน',
  `job_remask` varchar(200) DEFAULT NULL COMMENT 'หมายเหตุ',
  `job_location_id` int DEFAULT NULL,
  `job_image` varchar(200) DEFAULT NULL COMMENT 'รูปภาพ',
  `job_status_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_location1_idx` (`job_location_id`),
  KEY `fk_job_job_status1_idx` (`job_status_id`),
  KEY `fk_job_ticket1_idx` (`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `job_status`
--

DROP TABLE IF EXISTS `job_status`;
CREATE TABLE IF NOT EXISTS `job_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status_code` varchar(45) DEFAULT NULL COMMENT 'รหัส',
  `status_name` varchar(200) DEFAULT NULL COMMENT 'ชื่อสถานะ',
  `color` varchar(11) DEFAULT NULL COMMENT 'สี',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int NOT NULL AUTO_INCREMENT,
  `location_name` varchar(200) DEFAULT NULL COMMENT 'ชื่อสถานที่',
  `location_main_id` int DEFAULT NULL COMMENT 'สถานที่หลัก',
  `location_status` smallint DEFAULT '1' COMMENT 'สถานะ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ticket_number` varchar(45) DEFAULT NULL COMMENT 'เลขที่เอกสาร',
  `ticket_date` varchar(45) DEFAULT NULL COMMENT 'วันที่',
  `ticket_title` varchar(200) DEFAULT NULL COMMENT 'เรื่อง',
  `ticket_description` text COMMENT 'คำอธิบาย',
  `ticket_requester_id` int DEFAULT NULL COMMENT 'ผู้ร้องขอ',
  `ticket_department_id` int DEFAULT NULL COMMENT 'แจ้งไปยังแผนก',
  `ticket_remask` varchar(200) DEFAULT NULL COMMENT 'บันทึก',
  `ticket_ref` varchar(200) DEFAULT NULL COMMENT 'อ้างอิง',
  `ticket_progress` int DEFAULT NULL COMMENT 'ความคืบหน้า',
  `created_at` varchar(45) DEFAULT NULL COMMENT 'สร้างเมื่อ',
  `created_by` varchar(45) DEFAULT NULL COMMENT 'สร้างโดย',
  `updated_at` varchar(45) DEFAULT NULL COMMENT 'ปรับปรุงเมื่อ',
  `updated_by` varchar(45) DEFAULT NULL COMMENT 'ปรับปรุงโดย',
  `jobs` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `fk_job_job_status1` FOREIGN KEY (`job_status_id`) REFERENCES `job_status` (`id`),
  ADD CONSTRAINT `fk_job_location1` FOREIGN KEY (`job_location_id`) REFERENCES `location` (`id`),
  ADD CONSTRAINT `fk_job_ticket1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
