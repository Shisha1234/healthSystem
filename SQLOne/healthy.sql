-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 05:40 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthy`
--

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `insureId` int(10) UNSIGNED NOT NULL,
  `gId` int(15) NOT NULL,
  `iCard_id` int(15) NOT NULL,
  `iCompId` int(15) NOT NULL,
  `pat_idNo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empInsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurances`
--

INSERT INTO `insurances` (`insureId`, `gId`, `iCard_id`, `iCompId`, `pat_idNo`, `created_at`, `updated_at`, `empInsId`) VALUES
(1, 0, 0, 0, 56465, '2018-06-27 08:31:47', '2018-06-27 08:31:47', 1),
(9, 456465, 56464, 7, 564654, '2018-07-08 18:00:25', '2018-07-08 18:00:25', 1);

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
(4, '2018_06_27_104348_add_empId_to_register_pats', 2),
(5, '2018_06_27_110221_create_insurances_table', 3),
(6, '2018_06_27_124506_add_empInsId_to_insurances', 4),
(7, '2018_07_06_134506_add_role_to_users', 5),
(8, '2018_07_08_193059_add_yob_to_register_pats', 6),
(9, '2018_07_09_141306_add_tRoom_to_register_pats', 7),
(10, '2018_07_09_143138_add_image_to_users', 8);

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
-- Table structure for table `register_pats`
--

CREATE TABLE `register_pats` (
  `PatientId` int(10) UNSIGNED NOT NULL,
  `FullName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idNo` int(11) NOT NULL,
  `Tel` int(11) NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empId` int(11) NOT NULL,
  `yob` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_pats`
--

INSERT INTO `register_pats` (`PatientId`, `FullName`, `idNo`, `Tel`, `place`, `gender`, `mStatus`, `created_at`, `updated_at`, `empId`, `yob`) VALUES
(1, 'Jo Shisha', 452364, 724256321, 'Nai', 'male', 'Yes', '2018-06-27 05:35:07', '2018-06-27 05:35:07', 0, 0),
(2, 'Shisha Joanne', 123456, 56463, 'Nairobi', 'male', 'm', '2018-06-27 07:58:22', '2018-07-06 09:13:02', 1, 0),
(7, 'Test1234', 32690441, 708899123, 'Mombasa', 'male', 's', '2018-06-27 08:46:35', '2018-07-06 12:21:04', 1, 0),
(12, 'Joanna', 54653, 53134, 'Nairobi', 'male', 'w', '2018-06-27 09:42:30', '2018-06-27 09:42:30', 1, 0),
(14, 'Shisha Jo', 123456, 564600, 'Nairobi', 'male', 'm', '2018-06-28 16:41:51', '2018-07-08 18:02:38', 1, 0),
(15, 'Shisha', 10178, 708899536, 'Nairobi', 'female', 'm', '2018-07-04 15:32:42', '2018-07-04 15:32:42', 1, 0),
(16, 'Test123', 1321, 3132, 'Mombasa', 'male', 'm', '2018-07-04 23:21:08', '2018-07-04 23:21:08', 1, 0),
(17, 'Shisha kol', 1235462, 748569853, 'Nairobi', 'male', 'm', '2018-07-08 16:53:04', '2018-07-08 16:53:04', 1, 1991),
(18, 'Pintere', 12465465, 708899654, 'Nairobi', 'male', 'm', '2018-07-09 12:39:07', '2018-07-09 12:39:52', 1, 1989);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomId` int(12) NOT NULL,
  `roomName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomId`, `roomName`) VALUES
(5, 'Consultation 1'),
(6, 'Consultation 2'),
(7, 'Consultation 3'),
(8, 'Consultation 4');

-- --------------------------------------------------------

--
-- Table structure for table `table 7`
--

CREATE TABLE `table 7` (
  `C_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table 7`
--

INSERT INTO `table 7` (`C_Name`) VALUES
('Agnes Kagure Kariuki'),
('AAR Insurance Kenya'),
('APA Insurance ? part of Apollo Investments Company'),
('Africa Merchant Assurance Company (AMACO)'),
('Allianz Kenya?[2]'),
('Apollo Life Assurance'),
('AIG Kenya Insurance Company'),
('British-American Insurance Company Kenya Limited'),
('Cannon Assurance Company Limited'),
('Capex Life Assurance Company'),
('CIC General Insurance?[3]'),
('CIC Life Assurance?[4]'),
('Continental Reinsurance'),
('Corporate Insurance Company'),
('Directline Assurance Company'),
('East Africa Reinsurance Company'),
('Fidelity Shield Insurance Company'),
('First Assurance Kenya Limited[5]'),
('GA Insurance Company'),
('Geminia Insurance Company'),
('ICEA LION General Insurance Company'),
('ICEA LION Life Assurance Company'),
('Intra Africa Assurance Company'),
('Invesco Assurance Company'),
('Kenindia Assurance Company'),
('Kenya Orient Insurance'),
('Kenya Reinsurance Corporation'),
('Liberty Life Assurance Kenya Limited'),
('Madison Insurance Company Kenya'),
('Mayfair Insurance Company'),
('Mercantile Insurance Company'),
('Metropolitan Life Insurance Kenya'),
('Occidental Insurance Company'),
('Old Mutual Life Assurance Company'),
('Pacis Insurance Company'),
('Phoenix of East Africa Assurance Company'),
('Pioneer Assurance Company'),
('Real Insurance Company'),
('Resolution Insurance Company'),
('Sanlam Kenya plc?? was Pan Africa Life Assurance'),
('Takaful Insurance of Africa'),
('Tausi Assurance Company'),
('Heritage Insurance Company'),
('Jubilee Insurance Company Limited'),
('Monarch Insurance Company'),
('Next Insurance Kenya'),
('Trident Insurance Company'),
('UAP Insurance Company'),
('UAP Life Assurance Company'),
('Xplico Insurance Company');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Shisha Jo', 'shishaparl@gmail.com', '$2y$10$UJxg0LlOV0SfjVT.6XoshuPIxJq/zyhlDgo/V8x1gG7.dC8oJyLPW', 'lKCBOWuIIpAXubKEecxjo58iJxOT5LjSmAWJnVMWutqsD4XU4OvmAqWn8JKa', '2018-06-27 06:25:23', '2018-07-06 09:06:52', 'reception'),
(2, 'Shisha Jo', 'y@gmail.com', '$2y$10$55iPI2nqv4F4sdN/DBfg6ubtjxS6R2nVrWIRVfW9J7/eeJZFRkpNO', 'wwlHW5qaFyriVsh92DqBI1kYu4epxWF8Y7OoCDMuVMFoJACwQCEUMAKH3M9q', '2018-07-06 09:31:00', '2018-07-06 09:31:00', 'reception'),
(3, 'Magdalen', 'mag@gmail.com', '$2y$10$0zwUIMUfZWjfzd0q269mn.3l6xru1kQVmfw56JEV0q5XvA0YcZ1bK', 'nUQ4OZbEOccKqUhIF0x1gUGB5zuUA7edMApid0OHxt1NkqnDBrkYKMjiSxmH', '2018-07-06 11:04:55', '2018-07-06 11:04:55', 'reception'),
(4, 'Peter Pan', 'pan@gmail.com', '$2y$10$E03Cwa7NMjbqwCCTfotKge6eR1gtxByt.7XEV3WqFS0K9DcGQp1LO', '9Y2fivk02MmbMj6PZzRWt6op87tjUW3fqdpKwe3GZPaePrg1V7W2eDKeHJkU', '2018-07-06 11:06:24', '2018-07-06 11:06:24', 'nu'),
(5, 'larajtcckl', 'lara@gmail.com', '$2y$10$aWXBwT820TcarMZdU5SqNuaSi9ublSvQa3ztNQBYkxfDunThllyTq', '5JQbe2OpZfbg4yRx9DOxLCV0iOnYD3VyAWjAtVCNY0CwJ8VDY7nTJAPsXkwq', '2018-07-09 12:20:45', '2018-07-09 12:20:45', 'doc');

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
-- Indexes for table `register_pats`
--
ALTER TABLE `register_pats`
  ADD PRIMARY KEY (`PatientId`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomId`);

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
  MODIFY `insureId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `insurecompanies`
--
ALTER TABLE `insurecompanies`
  MODIFY `compId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `register_pats`
--
ALTER TABLE `register_pats`
  MODIFY `PatientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
