-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2018 at 06:17 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `insureId` int(10) UNSIGNED NOT NULL,
  `gId` int(11) NOT NULL,
  `iCard_id` int(11) NOT NULL,
  `iCompId` int(11) NOT NULL,
  `pat_idNo` int(11) NOT NULL,
  `empInsId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurances`
--

INSERT INTO `insurances` (`insureId`, `gId`, `iCard_id`, `iCompId`, `pat_idNo`, `empInsId`, `created_at`, `updated_at`) VALUES
(1, 4256, 78956, 18, 10125636, 2, '2018-11-07 20:57:24', '2018-11-07 20:57:24');

-- --------------------------------------------------------

--
-- Table structure for table `insurecompanies`
--

CREATE TABLE `insurecompanies` (
  `compId` int(10) NOT NULL,
  `CompName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurecompanies`
--

INSERT INTO `insurecompanies` (`compId`, `CompName`) VALUES
(2, 'Agnes Kagure Kariuki'),
(3, 'AAR Insurance Kenya'),
(4, 'APA Insurance ? part of Apollo Investments Company'),
(5, 'Africa Merchant Assurance Company (AMACO)'),
(6, 'Allianz Kenya?[2]'),
(7, 'Apollo Life Assurance'),
(8, 'AIG Kenya Insurance Company'),
(9, 'British-American Insurance Company Kenya Limited'),
(10, 'Cannon Assurance Company Limited'),
(11, 'Capex Life Assurance Company'),
(12, 'CIC General Insurance?[3]'),
(13, 'CIC Life Assurance?[4]'),
(14, 'Continental Reinsurance'),
(15, 'Corporate Insurance Company'),
(16, 'Directline Assurance Company'),
(17, 'East Africa Reinsurance Company'),
(18, 'Fidelity Shield Insurance Company'),
(19, 'First Assurance Kenya Limited[5]'),
(20, 'GA Insurance Company'),
(21, 'Geminia Insurance Company'),
(22, 'ICEA LION General Insurance Company'),
(23, 'ICEA LION Life Assurance Company'),
(24, 'Intra Africa Assurance Company'),
(25, 'Invesco Assurance Company'),
(26, 'Kenindia Assurance Company'),
(27, 'Kenya Orient Insurance'),
(28, 'Kenya Reinsurance Corporation'),
(29, 'Liberty Life Assurance Kenya Limited'),
(30, 'Madison Insurance Company Kenya'),
(31, 'Mayfair Insurance Company'),
(32, 'Mercantile Insurance Company'),
(33, 'Metropolitan Life Insurance Kenya'),
(34, 'Occidental Insurance Company'),
(35, 'Old Mutual Life Assurance Company'),
(36, 'Pacis Insurance Company'),
(37, 'Phoenix of East Africa Assurance Company'),
(38, 'Pioneer Assurance Company'),
(39, 'Real Insurance Company'),
(40, 'Resolution Insurance Company'),
(41, 'Sanlam Kenya plc?? was Pan Africa Life Assurance'),
(42, 'Takaful Insurance of Africa'),
(43, 'Tausi Assurance Company'),
(44, 'Heritage Insurance Company'),
(45, 'Jubilee Insurance Company Limited'),
(46, 'Monarch Insurance Company'),
(47, 'Next Insurance Kenya'),
(48, 'Trident Insurance Company'),
(49, 'UAP Insurance Company'),
(50, 'UAP Life Assurance Company'),
(51, 'Xplico Insurance Company');

-- --------------------------------------------------------

--
-- Table structure for table `labresults`
--

CREATE TABLE `labresults` (
  `resultId` int(10) UNSIGNED NOT NULL,
  `testId` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labTreatId` int(10) UNSIGNED DEFAULT NULL,
  `labtechId` int(11) UNSIGNED DEFAULT NULL,
  `testPatId` int(11) UNSIGNED DEFAULT NULL,
  `testresults` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tstatus` int(11) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labresults`
--

INSERT INTO `labresults` (`resultId`, `testId`, `labTreatId`, `labtechId`, `testPatId`, `testresults`, `tstatus`, `created_at`, `updated_at`) VALUES
(4, '1', 31, 6, 8, 'Infected', 1, '2018-11-08 01:50:08', '2018-11-08 02:14:18'),
(5, '2,5', 32, 6, 9, 'Tiny blood cells', 1, '2018-11-08 01:51:10', '2018-11-08 02:13:12'),
(6, '2,4,5', 33, 6, 10, 'Clean, nothing obtained', 1, '2018-11-08 01:52:09', '2018-11-08 02:14:05'),
(7, '1,2', 34, 6, 11, 'Malaria\r\n-Amino bacteria\r\nTyphoid\r\nInfected', 1, '2018-11-08 01:52:28', '2018-11-08 02:13:48'),
(8, '4', 36, 6, 13, 'Infected', 1, '2018-11-08 01:54:48', '2018-11-08 02:14:28'),
(10, '1,2,4,5', 40, 6, 17, 'Nothing', 1, '2018-11-08 01:59:53', '2018-11-08 02:12:46'),
(11, '1,2', 47, 6, 24, 'Malaria\r\n-Nothing\r\nTyphoid\r\n-Infcted', 1, '2018-11-08 02:07:28', '2018-11-08 02:14:57'),
(12, '2,4', 49, 6, 26, 'comple', 1, '2018-11-08 13:07:04', '2018-11-08 13:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `labtests`
--

CREATE TABLE `labtests` (
  `testId` int(10) NOT NULL,
  `testName` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labtests`
--

INSERT INTO `labtests` (`testId`, `testName`, `created_at`, `updated_at`) VALUES
(1, 'Malaria', '2018-09-21 14:48:09', '2018-09-21 14:48:09'),
(2, 'Typhoid', '2018-09-21 14:48:09', '2018-09-21 14:48:09'),
(4, 'Urine test', '2018-09-21 14:49:09', '2018-09-21 14:49:09'),
(5, 'Blood Test', '2018-09-21 14:49:09', '2018-09-21 14:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `medications`
--

CREATE TABLE `medications` (
  `drugId` int(10) UNSIGNED NOT NULL,
  `med_treatId` int(10) UNSIGNED DEFAULT NULL,
  `med_drugId` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `drugPatId` int(11) UNSIGNED NOT NULL,
  `drugEmpId` int(11) UNSIGNED DEFAULT NULL,
  `presd_quant` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medications`
--

INSERT INTO `medications` (`drugId`, `med_treatId`, `med_drugId`, `drugPatId`, `drugEmpId`, `presd_quant`, `created_at`, `updated_at`) VALUES
(7, 41, '2', 18, 3, '3', '2018-11-08 01:29:14', '2018-11-08 02:23:32'),
(8, 35, '1,4', 12, 3, '10,18', '2018-11-08 01:54:05', '2018-11-08 02:23:41'),
(9, 37, '4', 14, 3, '10', '2018-11-08 01:55:33', '2018-11-08 02:23:46'),
(10, 39, '3,6', 16, 3, '20, 10', '2018-11-08 01:57:14', '2018-11-08 02:23:50'),
(11, 38, '3', 15, 3, '20', '2018-11-08 01:58:42', '2018-11-08 02:23:55'),
(12, 42, '4,7', 19, 3, '10,3', '2018-11-08 02:01:10', '2018-11-08 02:23:59'),
(13, 43, '6,9', 20, 3, '5,10', '2018-11-08 02:02:39', '2018-11-08 02:24:05'),
(14, 44, '3,5,10', 21, 3, '1,1,10', '2018-11-08 02:04:25', '2018-11-08 02:24:09'),
(15, 45, '1,2', 22, 3, '5,4', '2018-11-08 02:05:22', '2018-11-08 02:24:12'),
(16, 46, '3,13', 23, 3, '1,5', '2018-11-08 02:06:47', '2018-11-08 02:24:17'),
(17, 48, '1,5,7', 25, 3, '5,8,1', '2018-11-08 02:08:59', '2018-11-08 02:24:21'),
(18, 31, '1,4', 8, 3, '20,30', '2018-11-08 02:16:02', '2018-11-08 02:24:25'),
(19, 32, '1,4,6', 9, 3, '15,10,10', '2018-11-08 02:17:19', '2018-11-08 02:24:29'),
(20, 33, '1,7', 10, 3, '10,2', '2018-11-08 02:18:34', '2018-11-08 02:24:32'),
(21, 34, '3', 11, 3, '20', '2018-11-08 02:18:54', '2018-11-08 02:24:37'),
(22, 34, '3', 11, 3, '20', '2018-11-08 02:19:23', '2018-11-08 02:24:48'),
(23, 36, '3,8', 13, 3, '10,10', '2018-11-08 02:20:44', '2018-11-08 02:24:51'),
(24, 40, '2,3,6', 17, 3, '10,10,20', '2018-11-08 02:22:12', '2018-11-08 02:24:56'),
(25, 47, '3', 24, 3, '12', '2018-11-08 02:23:07', '2018-11-08 02:24:59'),
(26, 49, '1,4', 26, NULL, '2,10', '2018-11-08 13:09:07', '2018-11-08 13:09:19');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `med_id` int(10) UNSIGNED NOT NULL,
  `med_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `packaging` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `manufacturedBy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mfDate` date NOT NULL,
  `expiry_date` date NOT NULL,
  `del_avTime` datetime NOT NULL,
  `pharEmpId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`med_id`, `med_name`, `packaging`, `quantity`, `price`, `manufacturedBy`, `mfDate`, `expiry_date`, `del_avTime`, `pharEmpId`, `created_at`, `updated_at`) VALUES
(1, 'Acetaminophen', 'tablets', 9933, 100, 'cxcomp', '2018-09-20', '2019-09-20', '2018-09-19 00:00:00', 1, '2018-09-19 18:00:00', '2018-11-07 21:46:15'),
(2, 'Adderall', 'capsules', 9993, 25, 'tecno', '2018-09-21', '2019-09-21', '2018-09-20 00:00:00', 45, '2018-09-19 18:00:00', '2018-11-07 21:46:15'),
(3, 'Panadol extra 500g', 'strips', 9897, 35, 'pythonius', '2018-09-22', '2019-09-22', '2018-09-20 00:00:00', 45, '2018-09-19 18:00:00', '2018-11-07 21:46:15'),
(4, 'Piriton', 'tablets', 9922, 632, 'gamius', '2018-09-23', '2019-09-23', '2018-09-20 00:00:00', 45, '2018-09-19 18:00:00', '2018-11-07 21:46:15'),
(5, 'Good Morning Lung Tonic', 'bottle', 9991, 54, 'SamsSons', '2018-09-24', '2019-09-24', '2018-10-20 00:00:00', 45, '2018-09-19 18:00:00', '2018-11-07 21:46:15'),
(6, 'Amoxicillin', 'tablets', 9955, 56, 'sanjay', '2018-09-25', '2019-09-25', '2018-09-20 00:00:00', 45, '2018-09-19 18:00:00', '2018-11-07 21:46:15'),
(7, 'Quinine 500ml', 'bottles', 9994, 85, 'pawpattans', '2018-09-26', '2019-09-26', '2018-09-18 00:00:00', 45, '2018-09-19 18:00:00', '2018-11-07 21:46:15'),
(8, 'Disclofenac 500g', 'strips', 9990, 20, 'maed company', '2014-01-25', '2018-11-15', '2018-10-02 12:01:11', 1, '2018-10-01 09:01:11', '2018-11-07 21:46:15'),
(9, 'Disclofenac 250g', 'strips', 9990, 20, 'maed company', '2014-01-25', '2018-11-15', '2018-10-02 12:03:02', 1, '2018-10-01 09:03:02', '2018-11-07 21:46:15'),
(10, 'cough syrup', 'bottle', 9990, 150, 'Cough meds', '2018-12-20', '2022-09-01', '2018-10-02 12:05:45', 1, '2018-10-01 09:05:45', '2018-11-07 21:46:15'),
(11, 'Glycerine 250ml', 'bottle', 10000, 200, 'Kabis', '2015-02-02', '2023-03-03', '2018-10-02 12:44:27', 1, '2018-10-01 09:44:27', '2018-11-07 21:46:15'),
(13, 'Glycerine 500ml', 'bottle', 9995, 250, 'Kabis', '2018-02-01', '2022-12-30', '2018-10-02 12:47:52', 1, '2018-10-01 09:47:52', '2018-11-07 21:46:15');

--
-- Triggers `medicines`
--
DELIMITER $$
CREATE TRIGGER `new_purchase` AFTER INSERT ON `medicines` FOR EACH ROW BEGIN

INSERT INTO `med_purchase`(`pmedId`, `pempId`, `action`, `pdate`, `pquant`) VALUES (NEW.med_id, NEW.pharEmpId, "new_med_add", now(), NEW.quantity);

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `purchase` AFTER UPDATE ON `medicines` FOR EACH ROW BEGIN
SET @var = NEW.quantity - OLD.quantity;

INSERT INTO `med_purchase`(`pmedId`, `pempId`, `action`, `pdate`, `pquant`) VALUES (NEW.med_id, NEW.pharEmpId, "P_update", now(), @var);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `medrecords`
--

CREATE TABLE `medrecords` (
  `medNmId` varchar(50) NOT NULL,
  `dempId` int(11) NOT NULL,
  `quant` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mRid` int(10) NOT NULL,
  `recMedId` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medrecords`
--

INSERT INTO `medrecords` (`medNmId`, `dempId`, `quant`, `date`, `mRid`, `recMedId`) VALUES
('2', 3, 3, '2018-11-08 05:23:28', 17, 7),
('1', 3, 10, '2018-11-08 05:23:36', 18, 8),
('4', 3, 18, '2018-11-08 05:23:36', 19, 8),
('4', 3, 10, '2018-11-08 05:23:43', 20, 9),
('3', 3, 20, '2018-11-08 05:23:48', 21, 10),
('6', 3, 10, '2018-11-08 05:23:48', 22, 10),
('3', 3, 20, '2018-11-08 05:23:53', 23, 11),
('4', 3, 10, '2018-11-08 05:23:57', 24, 12),
('7', 3, 3, '2018-11-08 05:23:57', 25, 12),
('6', 3, 5, '2018-11-08 05:24:01', 26, 13),
('9', 3, 10, '2018-11-08 05:24:02', 27, 13),
('5', 3, 1, '2018-11-08 05:24:07', 28, 14),
('10', 3, 10, '2018-11-08 05:24:07', 29, 14),
('1', 3, 5, '2018-11-08 05:24:10', 30, 15),
('2', 3, 4, '2018-11-08 05:24:11', 31, 15),
('3', 3, 1, '2018-11-08 05:24:14', 32, 16),
('13', 3, 5, '2018-11-08 05:24:15', 33, 16),
('1', 3, 5, '2018-11-08 05:24:19', 34, 17),
('5', 3, 8, '2018-11-08 05:24:19', 35, 17),
('7', 3, 1, '2018-11-08 05:24:20', 36, 17),
('1', 3, 20, '2018-11-08 05:24:24', 37, 18),
('4', 3, 30, '2018-11-08 05:24:24', 38, 18),
('1', 3, 15, '2018-11-08 05:24:27', 39, 19),
('6', 3, 10, '2018-11-08 05:24:27', 40, 19),
('1', 3, 10, '2018-11-08 05:24:31', 41, 20),
('7', 3, 2, '2018-11-08 05:24:31', 42, 20),
('3', 3, 20, '2018-11-08 05:24:34', 43, 21),
('3', 3, 20, '2018-11-08 05:24:39', 44, 22),
('8', 3, 10, '2018-11-08 05:24:50', 45, 23),
('3', 3, 10, '2018-11-08 05:24:53', 46, 24),
('6', 3, 20, '2018-11-08 05:24:53', 47, 24),
('3', 3, 12, '2018-11-08 05:24:58', 48, 25),
('1', 3, 2, '2018-11-08 16:09:19', 49, 26),
('4', 3, 10, '2018-11-08 16:09:19', 50, 26);

--
-- Triggers `medrecords`
--
DELIMITER $$
CREATE TRIGGER `rec_pay` AFTER INSERT ON `medrecords` FOR EACH ROW BEGIN

INSERT INTO `payments`(`F_tions_drugId`, `paydrugId`, `payPatId`, `payquant`, `totalAmt`, `updated_at`) VALUES (NEW.recMedId, NEW.medNmId, (SELECT `drugPatId` FROM `medications` WHERE `drugId` = NEW.recMedId), NEW.quant, NEW.quant*(SELECT `price` FROM `medicines` WHERE `med_id` = NEW.medNmId), now());

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `med_purchase`
--

CREATE TABLE `med_purchase` (
  `mpurchaseId` int(11) NOT NULL,
  `pmedId` int(11) NOT NULL,
  `pempId` int(10) NOT NULL,
  `action` varchar(15) NOT NULL,
  `pdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pquant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `med_purchase`
--

INSERT INTO `med_purchase` (`mpurchaseId`, `pmedId`, `pempId`, `action`, `pdate`, `pquant`) VALUES
(1, 1, 1, 'P_update', '2018-11-07 14:18:01', -3),
(2, 2, 45, 'P_update', '2018-11-07 14:18:01', -5),
(3, 3, 45, 'P_update', '2018-11-07 14:18:01', -6),
(4, 1, 1, 'P_update', '2018-11-07 14:56:25', -12),
(5, 3, 45, 'P_update', '2018-11-07 14:56:25', -14),
(6, 1, 1, 'P_update', '2018-11-07 17:24:55', -3),
(7, 3, 45, 'P_update', '2018-11-07 17:24:56', -12),
(8, 5, 45, 'P_update', '2018-11-07 17:24:56', -13),
(9, 1, 1, 'P_update', '2018-11-07 17:25:10', -3),
(10, 3, 45, 'P_update', '2018-11-07 17:25:10', -12),
(11, 5, 45, 'P_update', '2018-11-07 17:25:11', -13),
(12, 1, 1, 'P_update', '2018-11-07 17:26:53', -12),
(13, 3, 45, 'P_update', '2018-11-07 17:26:53', -14),
(14, 1, 1, 'P_update', '2018-11-07 19:01:01', 0),
(15, 2, 45, 'P_update', '2018-11-07 19:01:02', 0),
(16, 3, 45, 'P_update', '2018-11-07 19:01:02', 0),
(17, 4, 45, 'P_update', '2018-11-07 19:01:02', 0),
(18, 5, 45, 'P_update', '2018-11-07 19:01:02', 0),
(19, 6, 45, 'P_update', '2018-11-07 19:01:02', 0),
(20, 7, 45, 'P_update', '2018-11-07 19:01:02', 0),
(21, 8, 1, 'P_update', '2018-11-07 19:01:02', 0),
(22, 9, 1, 'P_update', '2018-11-07 19:01:03', 0),
(23, 10, 1, 'P_update', '2018-11-07 19:01:03', 0),
(24, 11, 1, 'P_update', '2018-11-07 19:01:03', 0),
(25, 13, 1, 'P_update', '2018-11-07 19:01:03', 0),
(26, 1, 1, 'P_update', '2018-11-08 00:28:14', -3),
(27, 3, 45, 'P_update', '2018-11-08 00:28:14', -4),
(28, 1, 1, 'P_update', '2018-11-08 00:46:15', 10077),
(29, 2, 45, 'P_update', '2018-11-08 00:46:15', 10080),
(30, 3, 45, 'P_update', '2018-11-08 00:46:15', 10067),
(31, 4, 45, 'P_update', '2018-11-08 00:46:15', 10106),
(32, 5, 45, 'P_update', '2018-11-08 00:46:15', 10092),
(33, 6, 45, 'P_update', '2018-11-08 00:46:15', 10049),
(34, 7, 45, 'P_update', '2018-11-08 00:46:15', 9950),
(35, 8, 1, 'P_update', '2018-11-08 00:46:15', 9900),
(36, 9, 1, 'P_update', '2018-11-08 00:46:15', 9900),
(37, 10, 1, 'P_update', '2018-11-08 00:46:15', 9670),
(38, 11, 1, 'P_update', '2018-11-08 00:46:15', 9960),
(39, 13, 1, 'P_update', '2018-11-08 00:46:15', 9950),
(40, 2, 45, 'P_update', '2018-11-08 05:23:28', -3),
(41, 1, 1, 'P_update', '2018-11-08 05:23:36', -10),
(42, 4, 45, 'P_update', '2018-11-08 05:23:36', -18),
(43, 4, 45, 'P_update', '2018-11-08 05:23:43', -10),
(44, 3, 45, 'P_update', '2018-11-08 05:23:48', -20),
(45, 6, 45, 'P_update', '2018-11-08 05:23:48', -10),
(46, 3, 45, 'P_update', '2018-11-08 05:23:53', -20),
(47, 4, 45, 'P_update', '2018-11-08 05:23:57', -10),
(48, 7, 45, 'P_update', '2018-11-08 05:23:57', -3),
(49, 6, 45, 'P_update', '2018-11-08 05:24:02', -5),
(50, 9, 1, 'P_update', '2018-11-08 05:24:02', -10),
(51, 5, 45, 'P_update', '2018-11-08 05:24:07', -1),
(52, 10, 1, 'P_update', '2018-11-08 05:24:07', -10),
(53, 1, 1, 'P_update', '2018-11-08 05:24:10', -5),
(54, 2, 45, 'P_update', '2018-11-08 05:24:11', -4),
(55, 3, 45, 'P_update', '2018-11-08 05:24:14', -1),
(56, 13, 1, 'P_update', '2018-11-08 05:24:15', -5),
(57, 1, 1, 'P_update', '2018-11-08 05:24:19', -5),
(58, 5, 45, 'P_update', '2018-11-08 05:24:19', -8),
(59, 7, 45, 'P_update', '2018-11-08 05:24:20', -1),
(60, 1, 1, 'P_update', '2018-11-08 05:24:24', -20),
(61, 4, 45, 'P_update', '2018-11-08 05:24:24', -30),
(62, 1, 1, 'P_update', '2018-11-08 05:24:27', -15),
(63, 6, 45, 'P_update', '2018-11-08 05:24:27', -10),
(64, 1, 1, 'P_update', '2018-11-08 05:24:31', -10),
(65, 7, 45, 'P_update', '2018-11-08 05:24:31', -2),
(66, 3, 45, 'P_update', '2018-11-08 05:24:34', -20),
(67, 3, 45, 'P_update', '2018-11-08 05:24:39', -20),
(68, 8, 1, 'P_update', '2018-11-08 05:24:50', -10),
(69, 3, 45, 'P_update', '2018-11-08 05:24:53', -10),
(70, 6, 45, 'P_update', '2018-11-08 05:24:53', -20),
(71, 3, 45, 'P_update', '2018-11-08 05:24:58', -12),
(72, 1, 1, 'P_update', '2018-11-08 16:09:19', -2),
(73, 4, 45, 'P_update', '2018-11-08 16:09:19', -10);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_27_080204_create_register_pats_table', 1),
(4, '2018_06_27_110221_create_insurances_table', 1),
(5, '2018_09_14_160420_create_treatments_table', 1),
(6, '2018_09_18_193834_create_medicines_table', 1),
(7, '2018_09_20_134948_create_medications_table', 1),
(8, '2018_09_25_102515_create_labresults_table', 1),
(9, '2018_09_26_184310_create_prechecks_table', 2),
(10, '2018_10_21_095629_create_payments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentId` int(10) UNSIGNED NOT NULL,
  `F_tions_drugId` int(11) UNSIGNED DEFAULT NULL,
  `paydrugId` int(11) UNSIGNED DEFAULT NULL,
  `payPatId` int(11) UNSIGNED DEFAULT NULL,
  `payquant` int(10) DEFAULT NULL,
  `totalAmt` double(8,2) DEFAULT NULL,
  `payMode` int(11) NOT NULL DEFAULT '0',
  `payStatus` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentId`, `F_tions_drugId`, `paydrugId`, `payPatId`, `payquant`, `totalAmt`, `payMode`, `payStatus`, `updated_at`) VALUES
(17, 7, 2, 18, 3, 75.00, 0, 1, '2018-11-08 02:26:23'),
(18, 8, 1, 12, 10, 1000.00, 0, 1, '2018-11-08 02:25:36'),
(19, 8, 4, 12, 18, 11376.00, 0, 1, '2018-11-08 02:25:36'),
(20, 9, 4, 14, 10, 6320.00, 0, 1, '2018-11-08 02:25:55'),
(21, 10, 3, 16, 20, 700.00, 0, 1, '2018-11-08 02:26:11'),
(22, 10, 6, 16, 10, 560.00, 0, 1, '2018-11-08 02:26:11'),
(23, 11, 3, 15, 20, 700.00, 0, 1, '2018-11-08 02:26:04'),
(24, 12, 4, 19, 10, 6320.00, 0, 1, '2018-11-08 02:26:37'),
(25, 12, 7, 19, 3, 255.00, 0, 1, '2018-11-08 02:26:37'),
(26, 13, 6, 20, 5, 280.00, 0, 1, '2018-11-08 02:26:30'),
(27, 13, 9, 20, 10, 200.00, 0, 1, '2018-11-08 02:26:30'),
(28, 14, 5, 21, 1, 54.00, 0, 1, '2018-11-08 02:26:43'),
(29, 14, 10, 21, 10, 1500.00, 0, 1, '2018-11-08 02:26:43'),
(30, 15, 1, 22, 5, 500.00, 0, 1, '2018-11-08 02:26:52'),
(31, 15, 2, 22, 4, 100.00, 0, 1, '2018-11-08 02:26:52'),
(32, 16, 3, 23, 1, 35.00, 1, 1, '2018-11-08 02:27:12'),
(33, 16, 13, 23, 5, 1250.00, 1, 1, '2018-11-08 02:27:12'),
(34, 17, 1, 25, 5, 500.00, 1, 1, '2018-11-08 02:27:07'),
(35, 17, 5, 25, 8, 432.00, 1, 1, '2018-11-08 02:27:07'),
(36, 17, 7, 25, 1, 85.00, 1, 1, '2018-11-08 02:27:07'),
(37, 18, 1, 8, 20, 2000.00, 1, 1, '2018-11-08 02:25:19'),
(38, 18, 4, 8, 30, 18960.00, 1, 1, '2018-11-08 02:25:19'),
(39, 19, 1, 9, 15, 1500.00, 1, 1, '2018-11-08 02:25:23'),
(40, 19, 6, 9, 10, 560.00, 1, 1, '2018-11-08 02:25:23'),
(41, 20, 1, 10, 10, 1000.00, 1, 1, '2018-11-08 02:25:26'),
(42, 20, 7, 10, 2, 170.00, 1, 1, '2018-11-08 02:25:26'),
(43, 21, 3, 11, 20, 700.00, 1, 1, '2018-11-08 02:25:29'),
(44, 22, 3, 11, 20, 700.00, 1, 1, '2018-11-08 02:25:32'),
(45, 23, 8, 13, 10, 200.00, 1, 1, '2018-11-08 02:25:51'),
(46, 24, 3, 17, 10, 350.00, 1, 1, '2018-11-08 02:26:18'),
(47, 24, 6, 17, 20, 1120.00, 1, 1, '2018-11-08 02:26:18'),
(48, 25, 3, 24, 12, 420.00, 0, 1, '2018-11-08 02:27:00'),
(49, 26, 1, 26, 2, 200.00, 0, 1, '2018-11-08 13:11:03'),
(50, 26, 4, 26, 10, 6320.00, 0, 1, '2018-11-08 13:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `prechecks`
--

CREATE TABLE `prechecks` (
  `checkId` int(10) UNSIGNED NOT NULL,
  `chkPatId` int(11) UNSIGNED NOT NULL,
  `chkempId` int(11) UNSIGNED DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `temperature` int(11) DEFAULT NULL,
  `pulseRate` int(11) DEFAULT NULL,
  `chkstatus` int(11) NOT NULL DEFAULT '1',
  `bPressure` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prechecks`
--

INSERT INTO `prechecks` (`checkId`, `chkPatId`, `chkempId`, `height`, `weight`, `temperature`, `pulseRate`, `chkstatus`, `bPressure`, `created_at`, `updated_at`) VALUES
(18, 8, 4, 100, 45, 45, 65, 0, '125/90', '2018-11-07 21:58:24', '2018-11-07 22:18:01'),
(19, 9, 4, 150, 56, 43, 70, 0, '190/50', '2018-11-07 21:59:00', '2018-11-07 22:18:19'),
(20, 10, 4, 180, 40, 30, 65, 0, '125/90', '2018-11-07 21:59:37', '2018-11-07 22:18:54'),
(21, 11, 4, 100, 42, 35, 60, 0, '90/150', '2018-11-07 22:00:25', '2018-11-07 22:19:18'),
(22, 12, 4, 120, 45, 36, 62, 0, '125/85', '2018-11-07 22:01:30', '2018-11-07 22:19:40'),
(23, 13, 4, 120, 45, 40, 61, 0, '100/58', '2018-11-07 22:02:20', '2018-11-07 22:20:08'),
(24, 14, 4, 150, 43, 37, 65, 0, '100/58', '2018-11-07 22:03:09', '2018-11-07 22:20:58'),
(25, 15, 4, 160, 70, 40, 68, 0, '125/90', '2018-11-07 22:03:50', '2018-11-07 22:21:27'),
(26, 16, 4, 100, 50, 30, 68, 0, '190/50', '2018-11-07 22:04:37', '2018-11-07 22:21:59'),
(27, 17, 4, 200, 50, 36, 75, 0, '190/50', '2018-11-07 22:05:24', '2018-11-07 22:22:54'),
(28, 18, 4, 80, 56, 32, 60, 0, '100/58', '2018-11-07 22:06:50', '2018-11-07 22:23:12'),
(29, 19, 4, 90, 55, 32, 64, 0, '160/45', '2018-11-07 22:08:25', '2018-11-07 22:23:40'),
(30, 20, 4, 156, 52, 40, 71, 0, '80/120', '2018-11-07 22:10:20', '2018-11-07 22:24:08'),
(31, 21, 4, 130, 90, 35, 65, 0, '190/50', '2018-11-07 22:11:38', '2018-11-07 22:24:33'),
(32, 22, 4, 123, 96, 32, 60, 0, '190/50', '2018-11-07 22:12:21', '2018-11-07 22:25:03'),
(33, 23, 4, 160, 40, 35, 40, 0, '120/80', '2018-11-07 22:14:20', '2018-11-07 22:25:32'),
(34, 24, 4, 180, 85, 34, 62, 0, '180/150', '2018-11-07 22:15:05', '2018-11-07 22:25:57'),
(35, 25, 4, 130, 62, 35, 70, 0, '153/80', '2018-11-07 22:16:47', '2018-11-07 22:26:36'),
(36, 26, 4, 120, 42, 45, 53, 0, '120/80', '2018-11-08 13:04:26', '2018-11-08 13:06:13');

--
-- Triggers `prechecks`
--
DELIMITER $$
CREATE TRIGGER `treatChk` AFTER INSERT ON `prechecks` FOR EACH ROW BEGIN

INSERT INTO `treatments`(`TreatPatId`, `treatCheckId`, `created_at`, `updated_at`) VALUES (NEW.chkPatId, NEW.checkId, now(), now());

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `register_pats`
--

CREATE TABLE `register_pats` (
  `PatientId` int(10) UNSIGNED NOT NULL,
  `FullName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idNo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tel` int(11) NOT NULL,
  `yob` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empId` int(11) UNSIGNED NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `treat_status` int(10) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_pats`
--

INSERT INTO `register_pats` (`PatientId`, `FullName`, `idNo`, `Tel`, `yob`, `empId`, `place`, `gender`, `mStatus`, `treat_status`, `created_at`, `updated_at`) VALUES
(8, 'Pamitio Pamera', 'bx7856l54', 708899536, '1988-11-23', 2, 'Dandora', 'female', 's', 0, '2018-11-07 21:58:24', '2018-11-07 21:58:24'),
(9, 'Grace Muthoni', '45565689', 714256982, '1995-11-20', 2, 'Nairobi', 'female', 'd', 0, '2018-11-07 21:59:00', '2018-11-07 21:59:00'),
(10, 'Magdalen Petra', 'bx7856l90', 715698235, '2000-11-21', 2, 'Dandora', 'female', 'w', 0, '2018-11-07 21:59:37', '2018-11-07 21:59:37'),
(11, 'Henry Petra', '12569836', 715698263, '1996-11-28', 2, 'Dandora', 'male', 'm', 0, '2018-11-07 22:00:25', '2018-11-07 22:00:25'),
(12, 'Shisha Jo', 'z17856l51', 745896521, '2017-11-01', 2, 'Ruaka', 'female', 'm', 0, '2018-11-07 22:01:30', '2018-11-07 22:01:30'),
(13, 'Papino Pam', '1526895', 715256354, '2000-11-27', 2, 'Dandora', 'male', 'm', 0, '2018-11-07 22:02:20', '2018-11-07 22:02:20'),
(14, 'Phoebe Thundermans', '125o236lk2', 712356985, '1998-11-23', 2, 'Dandora', 'female', 'd', 0, '2018-11-07 22:03:09', '2018-11-07 22:03:09'),
(15, 'Marx Thundermans', '23565689', 714256980, '2001-11-03', 2, 'Dandora', 'male', 'd', 0, '2018-11-07 22:03:50', '2018-11-07 22:03:50'),
(16, 'Henry Danger', '2568935', 714569803, '2005-11-28', 2, 'Dandora', 'male', 's', 0, '2018-11-07 22:04:37', '2018-11-07 22:04:37'),
(17, 'Frankline Robot', '458u956y45g', 715698231, '1988-11-09', 2, 'Mombasa', 'female', 's', 0, '2018-11-07 22:05:24', '2018-11-07 22:05:24'),
(18, 'Pivy Achieng', '56983245', 714256985, '1997-11-28', 2, 'Mombasa', 'female', 'm', 0, '2018-11-07 22:06:50', '2018-11-07 22:06:50'),
(19, 'Sam Kay', 'ml895t4ylz', 745896281, '1987-11-02', 2, 'Mombasa', 'female', 'w', 0, '2018-11-07 22:08:25', '2018-11-07 22:08:25'),
(20, 'Sophia Marx', '12536489', 725365985, '1989-05-22', 2, 'Nairobi', 'female', 'd', 0, '2018-11-07 22:10:20', '2018-11-07 22:10:20'),
(21, 'Ben Carson', '101256985', 715698251, '1946-12-22', 2, 'Dandora', 'male', 'd', 0, '2018-11-07 22:11:38', '2018-11-07 22:11:38'),
(22, 'Steven Kariuki', '1563259', 713569821, '1960-11-10', 2, 'Ruaka', 'male', 's', 0, '2018-11-07 22:12:21', '2018-11-07 22:12:21'),
(23, 'Martha Parl', '52689423', 712359804, '1987-11-24', 2, 'Ruaka', 'male', 'm', 0, '2018-11-07 22:14:20', '2018-11-07 22:14:20'),
(24, 'Samrai Jack', 'lo09u765', 756986235, '1961-11-20', 2, 'Dandora', 'male', 'w', 0, '2018-11-07 22:15:05', '2018-11-07 22:15:05'),
(25, 'Joanna Josh', '456536489', 789653248, '1987-11-16', 2, 'Ruaka', 'female', 's', 0, '2018-11-07 22:16:47', '2018-11-07 22:16:47'),
(26, 'May May', '123123', 702156935, '1986-11-10', 11, 'Dandora', 'female', 'm', 0, '2018-11-08 13:04:26', '2018-11-08 13:04:26');

--
-- Triggers `register_pats`
--
DELIMITER $$
CREATE TRIGGER `patient_registered` AFTER INSERT ON `register_pats` FOR EACH ROW BEGIN

INSERT INTO prechecks(`chkPatId`, `created_at`, `updated_at`) VALUES(New.PatientId, now(), now());

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `treatmentId` int(10) UNSIGNED NOT NULL,
  `TreatPatId` int(11) UNSIGNED DEFAULT NULL,
  `treatCheckId` int(10) UNSIGNED DEFAULT NULL,
  `docNotes` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosage` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `D_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `m_prescription` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `treatmedquant` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Test_description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docId` int(11) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`treatmentId`, `TreatPatId`, `treatCheckId`, `docNotes`, `dosage`, `D_description`, `m_prescription`, `treatmedquant`, `Test_description`, `docId`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 'severe headache', '1,3', '12,14', '1,4', 5, 'open', '2018-11-07 11:03:42', '2018-11-07 11:54:42'),
(2, 2, 2, NULL, NULL, 'back pain', '1,2,3', '3,5,6', NULL, 5, 'open', '2018-11-07 11:04:20', '2018-11-07 11:10:19'),
(3, 3, 3, 'should drink water, alot, all drugs shoul be taken daily except panadol', '1 teaspoon daily, 2*3 daily, 50ml daily', 'Severe headache, stomach ahe', '1,3,5', '3,12,13', '2,4,5', 5, 'closed', '2018-11-07 11:04:57', '2018-11-07 14:22:46'),
(23, 2, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'open', '2018-11-07 19:41:47', '2018-11-07 19:41:47'),
(24, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'open', '2018-11-07 19:41:47', '2018-11-07 19:41:47'),
(25, 2, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'open', '2018-11-07 20:06:45', '2018-11-07 20:06:45'),
(26, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'open', '2018-11-07 20:06:45', '2018-11-07 20:06:45'),
(27, 5, 15, NULL, NULL, 'pain', NULL, NULL, '1', 5, 'open', '2018-11-07 20:07:43', '2018-11-07 21:36:50'),
(28, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'open', '2018-11-07 20:07:43', '2018-11-07 20:07:43'),
(29, 6, 16, 'Ensure you drink water', '2*3 daily, once a day', 'Serious pain', '1,3', '3,4', '1,2', 5, 'open', '2018-11-07 21:03:37', '2018-11-07 21:28:00'),
(30, 7, 17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'open', '2018-11-07 21:15:18', '2018-11-07 21:15:18'),
(31, 8, 18, NULL, '2*2, 2*3', 'Headache, sharp abck pain', '1,4', '20,30', '1', 5, 'open', '2018-11-07 21:58:24', '2018-11-08 02:16:02'),
(32, 9, 19, NULL, '2*3,1*2,1*1', 'headache, lack of sleep', '1,4,6', '15,10,10', '2,5', 5, 'open', '2018-11-07 21:59:00', '2018-11-08 02:17:19'),
(33, 10, 20, 'Do alot of exercise', '1*3, 1 teaspoon per day', 'Leg pain, tired when walking short distance', '1,7', '10,2', '2,4,5', 5, 'open', '2018-11-07 21:59:37', '2018-11-08 02:18:34'),
(34, 11, 21, NULL, '1*3', 'Lower belly pain', '3', '20', '1,2', 5, 'closed', '2018-11-07 22:00:25', '2018-11-08 02:19:23'),
(35, 12, 22, 'Drink alot of water', '1*1,2*3 for 3 days', 'Gasy stomach', '1,4', '10,18', NULL, 5, 'open', '2018-11-07 22:01:30', '2018-11-08 01:54:05'),
(36, 13, 23, 'Daily exercise', '2*3,1*3', 'swollen stomach', '3,8', '10,10', '4', 5, 'open', '2018-11-07 22:02:20', '2018-11-08 02:20:44'),
(37, 14, 24, NULL, '1*1', 'Cannot sleep', '4', '10', NULL, 5, 'open', '2018-11-07 22:03:09', '2018-11-08 01:55:33'),
(38, 15, 25, 'Ensure you dress the wound everyday', '2*3 daily', 'Broken arm', '3', '20', NULL, 5, 'open', '2018-11-07 22:03:50', '2018-11-08 01:58:42'),
(39, 16, 26, 'Take care of the wound', '2*3, 1*2 for five days', 'Pricked by a nail', '3,6', '20, 10', NULL, 5, 'open', '2018-11-07 22:04:37', '2018-11-08 01:57:14'),
(40, 17, 27, NULL, '1*1, 2*3, 1*2', 'Abdominal pain, headache, flu, liquid eyes', '2,3,6', '10,10,20', '1,2,4,5', 5, 'open', '2018-11-07 22:05:24', '2018-11-08 02:22:12'),
(41, 18, 28, NULL, '1*3', 'Bac Pain, headache', '2', '3', NULL, 4, 'open', '2018-11-07 22:06:50', '2018-11-08 01:29:14'),
(42, 19, 29, NULL, '1*3,1*1', 'Flu heavy flow', '4,7', '10,3', NULL, 5, 'open', '2018-11-07 22:08:25', '2018-11-08 02:01:10'),
(43, 20, 30, NULL, '1*1,1*2', 'Pain on the throat', '6,9', '5,10', NULL, 5, 'open', '2018-11-07 22:10:20', '2018-11-08 02:02:39'),
(44, 21, 31, 'Stay away from dusts', '1 teaspoon*3, 1 teaspoon*3, 2*3', 'Chest Pain', '3,5,10', '1,1,10', NULL, 5, 'open', '2018-11-07 22:11:38', '2018-11-08 02:04:25'),
(45, 22, 32, NULL, '1*1,1*1', 'Broken leg', '1,2', '5,4', NULL, 5, 'open', '2018-11-07 22:12:21', '2018-11-08 02:05:22'),
(46, 23, 33, NULL, 'Apply daily, 2*3', 'Pricked legs', '3,13', '1,5', NULL, 5, 'open', '2018-11-07 22:14:20', '2018-11-08 02:06:47'),
(47, 24, 34, 'Do exercise', '2*3', 'Difficulty in waking up', '3', '12', '1,2', 5, 'open', '2018-11-07 22:15:05', '2018-11-08 02:23:07'),
(48, 25, 35, NULL, '1*1,1*2,1 teaspoon *3', 'Chest pain', '1,5,7', '5,8,1', NULL, 5, 'open', '2018-11-07 22:16:47', '2018-11-08 02:08:59'),
(49, 26, 36, NULL, '2*3, once daily', 'Back pain', '1,4', '2,10', '2,4', 5, 'open', '2018-11-08 13:04:26', '2018-11-08 13:09:07');

--
-- Triggers `treatments`
--
DELIMITER $$
CREATE TRIGGER `treat_result` AFTER UPDATE ON `treatments` FOR EACH ROW BEGIN
IF(NEW.m_prescription IS NULL)
THEN
INSERT INTO `labresults`(`testId`, `labTreatId`, `testPatId`, `created_at`, `updated_at`) VALUES (NEW.Test_description, NEW.treatmentId, NEW.TreatPatId, now(), now());
END IF;

IF(NEW.m_prescription IS NOT NULL)
THEN
INSERT INTO `medications`(`med_treatId`, `drugPatId`, `created_at`, `updated_at`) VALUES (NEW.treatmentId, NEW.TreatPatId, now(), now());

UPDATE `register_pats` SET `treat_status`= 0 WHERE `PatientId` = NEW.TreatPatId;

END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `verified`, `verification_token`, `acc_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Joan Okello', 'joansha988@gmail.com', 'admin', '$2y$10$yTNZsdaTHfTBWv9ePLAYvedVVmbuod71LowrEuMDa5sSmpudeM1sy', 1, NULL, '1', 'ClOH7fM6YwW2s86ytlnD28DvmR7hluOS2lGGy2t3w3PGZRFZdI1uKQARLxe3', '2018-11-07 09:41:59', '2018-11-07 09:47:43'),
(3, 'Shisha Parly', 'shishaparl@gmail.com', 'phar', '$2y$10$tSZDeagRP87gSrmEeuVeseNeRRlSOdZHcoJ/uUGBaQii37mApWc42', 1, NULL, '1', 'DBHF0j19mHhoUXyNqXM9niNnF7MbLyqOlhlwOp9HRvqBLHwxtFhPfElZNUYe', '2018-11-07 10:23:25', '2018-11-07 10:32:59'),
(4, 'Test', 'joanshi988@gmail.com', 'nu', '$2y$10$GGaZjdB8gfk5n6Prm6bsouD/QaaJuKD17M3QBQLCaxMclnvxvrJ1q', 1, NULL, '1', '4TiqyITFCifcfsdrhBSQpghR7E3DscdZfQNq7Kk1CvYfKeBvOsR06L7wGGGf', '2018-11-07 10:56:30', '2018-11-07 10:59:54'),
(5, 'Test Two', 'joan.akwero@strathmore.edu', 'doc', '$2y$10$96dwxoES.FoSW.3rtibSs.BxQ7EouTyiiEeUQtU8Z7HRIXprgYlP6', 1, NULL, '1', 'IQ8rCdLtdgbp5MKkvUOmHsmZdt4xvBvGNBAzanCziHlA6P6F6dUUh5lUsdcc', '2018-11-07 10:57:27', '2018-11-07 10:59:41'),
(6, 'Test Three', 'joan.akwero988@gmail.com', 'tec', '$2y$10$YCAsKuceH8Iqa/4SwK/UUOiN0g97bvUlH4oN5eMem8th.DP4UaiWO', 1, NULL, '1', 'yjGpHA93kFVsyv9oKrFuP5nnflSHsMMTf4Upv2IfA9Wo2wg26lOpdUQw7BRh', '2018-11-07 10:58:10', '2018-11-07 10:59:35'),
(11, 'Pamela Wanje', 'joanshisha@gmail.com', 're', '$2y$10$lqLcAC5hFGG0k3j9eKg31eTo71K75qhLaBL/3C8g2j0x5zcHYLrGG', 1, NULL, '1', 'p6MszqzWvtBrfYezaf158cY8lWnTthHR1GnY7bAzuYDojNb7wp8xHCxQOsfB', '2018-11-08 13:01:57', '2018-11-08 13:02:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`insureId`);

--
-- Indexes for table `insurecompanies`
--
ALTER TABLE `insurecompanies`
  ADD PRIMARY KEY (`compId`);

--
-- Indexes for table `labresults`
--
ALTER TABLE `labresults`
  ADD PRIMARY KEY (`resultId`);

--
-- Indexes for table `labtests`
--
ALTER TABLE `labtests`
  ADD PRIMARY KEY (`testId`);

--
-- Indexes for table `medications`
--
ALTER TABLE `medications`
  ADD PRIMARY KEY (`drugId`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`med_id`);

--
-- Indexes for table `medrecords`
--
ALTER TABLE `medrecords`
  ADD PRIMARY KEY (`mRid`);

--
-- Indexes for table `med_purchase`
--
ALTER TABLE `med_purchase`
  ADD PRIMARY KEY (`mpurchaseId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `prechecks`
--
ALTER TABLE `prechecks`
  ADD PRIMARY KEY (`checkId`);

--
-- Indexes for table `register_pats`
--
ALTER TABLE `register_pats`
  ADD PRIMARY KEY (`PatientId`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`treatmentId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `insureId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `insurecompanies`
--
ALTER TABLE `insurecompanies`
  MODIFY `compId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `labresults`
--
ALTER TABLE `labresults`
  MODIFY `resultId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `labtests`
--
ALTER TABLE `labtests`
  MODIFY `testId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medications`
--
ALTER TABLE `medications`
  MODIFY `drugId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `med_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `medrecords`
--
ALTER TABLE `medrecords`
  MODIFY `mRid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `med_purchase`
--
ALTER TABLE `med_purchase`
  MODIFY `mpurchaseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `prechecks`
--
ALTER TABLE `prechecks`
  MODIFY `checkId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `register_pats`
--
ALTER TABLE `register_pats`
  MODIFY `PatientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `treatmentId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `labresults`
--
ALTER TABLE `labresults`
  ADD CONSTRAINT `lab_pat` FOREIGN KEY (`testPatId`) REFERENCES `register_pats` (`PatientId`),
  ADD CONSTRAINT `labtreat` FOREIGN KEY (`labTreatId`) REFERENCES `treatments` (`treatmentId`),
  ADD CONSTRAINT `labuser` FOREIGN KEY (`labtechId`) REFERENCES `users` (`id`);

--
-- Constraints for table `medications`
--
ALTER TABLE `medications`
  ADD CONSTRAINT `medemp` FOREIGN KEY (`drugEmpId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `medpat` FOREIGN KEY (`drugPatId`) REFERENCES `register_pats` (`PatientId`),
  ADD CONSTRAINT `medtreat` FOREIGN KEY (`med_treatId`) REFERENCES `treatments` (`treatmentId`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `paydrug` FOREIGN KEY (`paydrugId`) REFERENCES `medicines` (`med_id`),
  ADD CONSTRAINT `paymed` FOREIGN KEY (`F_tions_drugId`) REFERENCES `medications` (`drugId`),
  ADD CONSTRAINT `paypat` FOREIGN KEY (`payPatId`) REFERENCES `register_pats` (`PatientId`);

--
-- Constraints for table `prechecks`
--
ALTER TABLE `prechecks`
  ADD CONSTRAINT `chk_user` FOREIGN KEY (`chkempId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `prepat` FOREIGN KEY (`chkPatId`) REFERENCES `register_pats` (`PatientId`);

--
-- Constraints for table `register_pats`
--
ALTER TABLE `register_pats`
  ADD CONSTRAINT `reg_user` FOREIGN KEY (`empId`) REFERENCES `users` (`id`);

--
-- Constraints for table `treatments`
--
ALTER TABLE `treatments`
  ADD CONSTRAINT `treatchk` FOREIGN KEY (`treatCheckId`) REFERENCES `prechecks` (`checkId`),
  ADD CONSTRAINT `treatdoc` FOREIGN KEY (`docId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `treatments_ibfk_1` FOREIGN KEY (`TreatPatId`) REFERENCES `register_pats` (`PatientId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
