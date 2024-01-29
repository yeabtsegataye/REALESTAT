-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 10, 2024 at 01:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haylu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `AD_ID` int(11) NOT NULL,
  `AD_FNAME` varchar(50) DEFAULT NULL,
  `AD_LNAME` varchar(50) DEFAULT NULL,
  `AD_DATEOFBIRTH` date DEFAULT NULL,
  `AD_SEX` varchar(6) DEFAULT NULL,
  `AD_CELLPHONE1` char(17) DEFAULT NULL,
  `AD_CELLPHONE2` char(17) DEFAULT NULL,
  `AD_COUNTRY` varchar(25) DEFAULT NULL,
  `AD_CITY` varchar(25) DEFAULT NULL,
  `AD_SUBCITY` varchar(25) DEFAULT NULL,
  `AD_HOUSENUMBER` char(10) DEFAULT NULL,
  `AD_EMAIL` varchar(50) DEFAULT NULL,
  `AD_PASSWORD` varchar(50) DEFAULT NULL,
  `AD_POSITION` varchar(50) DEFAULT NULL,
  `AD_SALARY` float DEFAULT NULL,
  `AD_PICTURE` varchar(255) DEFAULT NULL,
  `AD_STATUS` varchar(25) DEFAULT NULL,
  `AD_QULAIFICATION` varchar(50) DEFAULT NULL,
  `AD_EMERGENCY_CONTACT` varchar(20) DEFAULT NULL,
  `AD_RATING` int(11) DEFAULT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(255) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AP_ID` int(11) NOT NULL,
  `AP_PUROPSE` varchar(255) DEFAULT NULL,
  `AP_SUGESSTION` varchar(100) DEFAULT NULL,
  `AP_APPROVED` varchar(4) DEFAULT NULL CHECK (`AP_APPROVED` = 'TRUE' or `AP_APPROVED` = 'FALSE'),
  `AP_TIME` time DEFAULT NULL,
  `AP_DATE` date DEFAULT NULL,
  `US_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AP_ID`, `AP_PUROPSE`, `AP_SUGESSTION`, `AP_APPROVED`, `AP_TIME`, `AP_DATE`, `US_ID`) VALUES
(2, 'visite', 'good ', NULL, '17:08:00', '2024-01-03', 3),
(3, 'i want to visit form dz', 'from this user', NULL, '20:14:00', '2024-01-18', 4);

-- --------------------------------------------------------

--
-- Table structure for table `assign_appointment`
--

CREATE TABLE `assign_appointment` (
  `US_ID` int(11) NOT NULL,
  `AP_ID` int(11) NOT NULL,
  `EM_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assign_appointment`
--

INSERT INTO `assign_appointment` (`US_ID`, `AP_ID`, `EM_ID`) VALUES
(3, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CAT_ID` int(11) NOT NULL,
  `CAT_NAME` varchar(25) DEFAULT NULL,
  `CAT_TYPE` varchar(25) DEFAULT NULL,
  `CAT_DESCRIPTION` varchar(100) DEFAULT NULL,
  `CAT_PIC` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CAT_ID`, `CAT_NAME`, `CAT_TYPE`, `CAT_DESCRIPTION`, `CAT_PIC`) VALUES
(10, 'vilsas', 'best vilas', 'we have best villas in megenanga', '659e825ee518a.jpg'),
(11, 'vilas G+3', 'new image add', 'some descriptions', '659e828e8b07d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EM_ID` int(11) NOT NULL,
  `EM_FNAME` varchar(50) DEFAULT NULL,
  `EM_LNAME` varchar(50) DEFAULT NULL,
  `EM_DATEOFBIRTH` date DEFAULT NULL,
  `EM_SEX` varchar(6) DEFAULT NULL,
  `EM_CELLPHONE1` char(17) DEFAULT NULL,
  `EM_CELLPHONE2` char(17) DEFAULT NULL,
  `EM_COUNTRY` varchar(25) DEFAULT NULL,
  `EM_CITY` varchar(25) DEFAULT NULL,
  `EM_SUBCITY` varchar(25) DEFAULT NULL,
  `EM_HOUSENUMBER` char(10) DEFAULT NULL,
  `EM_EMAIL` varchar(50) DEFAULT NULL,
  `EM_PASSWORD` varchar(255) DEFAULT NULL,
  `EM_POSITION` varchar(50) DEFAULT NULL,
  `EM_SALARY` float DEFAULT NULL,
  `EM_PICTURE` varchar(255) DEFAULT NULL,
  `EM_STATUS` varchar(25) DEFAULT NULL,
  `EM_QULAIFICATION` varchar(50) DEFAULT NULL,
  `EM_EMERGENCY_CONTACT` varchar(20) DEFAULT NULL,
  `W_ID` int(11) DEFAULT NULL,
  `EM_RATING` int(11) DEFAULT NULL,
  `AD_ID` int(11) DEFAULT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(255) NOT NULL DEFAULT 'employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EM_ID`, `EM_FNAME`, `EM_LNAME`, `EM_DATEOFBIRTH`, `EM_SEX`, `EM_CELLPHONE1`, `EM_CELLPHONE2`, `EM_COUNTRY`, `EM_CITY`, `EM_SUBCITY`, `EM_HOUSENUMBER`, `EM_EMAIL`, `EM_PASSWORD`, `EM_POSITION`, `EM_SALARY`, `EM_PICTURE`, `EM_STATUS`, `EM_QULAIFICATION`, `EM_EMERGENCY_CONTACT`, `W_ID`, `EM_RATING`, `AD_ID`, `CREATED_AT`, `role`) VALUES
(4, 'yeabtsega employee', 'taye', '2024-01-18', 'male', '', '', 'ethiopia', '', '', '', 'nahom@gamil.com', '$2y$10$FRNJF1yod0SYDyf6TvIh2.xHGN5ygYlPQ9NlcnGWN73ysJ.N3iuh2', '', 100000, '', '', '', '', NULL, NULL, NULL, '2024-01-09 19:07:01', 'employee'),
(5, 'yeabtsega', 'taye', '2024-01-11', 'male', '', '', 'ethiopia', 'Addis Abeba', '', '', 'nahom@gamil.com', '$2y$10$5.iqI.nmjEyOJ5TFx1oXBOkagXFALCNL48PKw./vew2EwWWdYNulG', '', 100000, '', '', '', '', NULL, NULL, NULL, '2024-01-09 19:07:21', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `PR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `PR_ID` int(11) NOT NULL,
  `PR_PIC` varchar(255) DEFAULT NULL,
  `PR_TYPE` varchar(50) DEFAULT NULL,
  `PR_LOCATION` varchar(50) DEFAULT NULL,
  `PR_PRICE` float DEFAULT NULL,
  `PR_DESCRIPTION` varchar(100) DEFAULT NULL,
  `PR_SQFT` varchar(25) DEFAULT NULL,
  `PR_YEAROFBUILD` date DEFAULT NULL,
  `PR_FEATURES` varchar(50) DEFAULT NULL,
  `PR_STATUS` varchar(10) DEFAULT NULL,
  `RN_ID` int(11) DEFAULT NULL,
  `CAT_ID` int(11) DEFAULT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `PR_CITY` varchar(50) DEFAULT NULL,
  `PR_NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`PR_ID`, `PR_PIC`, `PR_TYPE`, `PR_LOCATION`, `PR_PRICE`, `PR_DESCRIPTION`, `PR_SQFT`, `PR_YEAROFBUILD`, `PR_FEATURES`, `PR_STATUS`, `RN_ID`, `CAT_ID`, `CREATED_AT`, `PR_CITY`, `PR_NAME`) VALUES
(54, '659e882f38d3b.jpg', 'filnal', 'megenagan', 10000000000, 'it is very good villa for family', '190 msq', '2024-01-24', 'good ', 'commplited', NULL, 11, '2024-01-10 12:06:07', 'AA', 'villa g+4');

-- --------------------------------------------------------

--
-- Table structure for table `property_pic`
--

CREATE TABLE `property_pic` (
  `PP_ID` int(11) NOT NULL,
  `PR_ID` int(11) DEFAULT NULL,
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room_num`
--

CREATE TABLE `room_num` (
  `RN_ID` int(11) NOT NULL,
  `RN_SALON` int(11) DEFAULT NULL,
  `RN_BEDROOM` int(11) DEFAULT NULL,
  `RN_BATHROOM` int(11) DEFAULT NULL,
  `RN_KITCHEN` int(11) DEFAULT NULL,
  `RN_SERVICE` int(11) DEFAULT NULL,
  `PR_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_num`
--

INSERT INTO `room_num` (`RN_ID`, `RN_SALON`, `RN_BEDROOM`, `RN_BATHROOM`, `RN_KITCHEN`, `RN_SERVICE`, `PR_ID`) VALUES
(41, 2, 4, 1, 3, 3, 54);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `US_ID` int(11) NOT NULL,
  `US_FNAME` varchar(25) NOT NULL,
  `US_LNAME` varchar(25) NOT NULL,
  `US_AGE` int(11) DEFAULT NULL,
  `US_SEX` varchar(6) DEFAULT NULL,
  `US_CELLPHONE1` char(17) DEFAULT NULL,
  `US_CELLPHONE2` char(17) DEFAULT NULL,
  `US_COUNTRY` varchar(25) DEFAULT NULL,
  `US_CITY` varchar(25) DEFAULT NULL,
  `US_SUBCITY` varchar(25) DEFAULT NULL,
  `US_HOUSENUMBER` char(10) DEFAULT NULL,
  `US_EMAIL` varchar(50) DEFAULT NULL,
  `US_PASSWORD` varchar(255) DEFAULT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`US_ID`, `US_FNAME`, `US_LNAME`, `US_AGE`, `US_SEX`, `US_CELLPHONE1`, `US_CELLPHONE2`, `US_COUNTRY`, `US_CITY`, `US_SUBCITY`, `US_HOUSENUMBER`, `US_EMAIL`, `US_PASSWORD`, `CREATED_AT`, `role`) VALUES
(1, 'betelhem', 'belete', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'beti@gmail.com', '$2y$10$XP06yaWIx98VYww3jzUBieOdBbA7C9W3hdXnh5mtCdo6R.pA8dQlS', '2024-01-06 04:07:25', 'user'),
(2, 'yeabtsega', 'Taye', NULL, '', '0934342342', '0935342323', 'ethiopia', 'addis abeba', 'hayat', 'vve5454', 'tati@gamil.com', '$2y$10$0EdLS/5eKEzk8aSMjvEuAOQMg27ZNRQVwI3mZMbRmGqXv3fCeyaj6', '2024-01-08 18:36:18', 'user'),
(3, 'nahom', 'Taye', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nahom@gamil.com', '$2y$10$CRcSPukcRsGVT8OlnSKE4ukwbP0t1rJ6/5WjjEKxgLWycGjKuxz2G', '2024-01-08 18:40:04', 'user'),
(4, 'yeabtsega user', 'Taye', NULL, '', '0934342342', '0935342323', 'ethiopia', 'addis abeba', 'hayat', 'vve5454', 'tatitaye@gmail.com', NULL, '2024-01-10 12:08:32', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `US_ID` int(11) NOT NULL,
  `US_FNAME` varchar(25) NOT NULL,
  `US_LNAME` varchar(25) NOT NULL,
  `US_AGE` int(11) DEFAULT NULL,
  `US_SEX` varchar(6) DEFAULT NULL,
  `US_CELLPHONE1` char(17) DEFAULT NULL,
  `US_CELLPHONE2` char(17) DEFAULT NULL,
  `US_COUNTRY` varchar(25) DEFAULT NULL,
  `US_CITY` varchar(25) DEFAULT NULL,
  `US_SUBCITY` varchar(25) DEFAULT NULL,
  `US_HOUSENUMBER` char(10) DEFAULT NULL,
  `US_EMAIL` varchar(50) DEFAULT NULL,
  `US_PASSWORD` varchar(255) DEFAULT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `working_time`
--

CREATE TABLE `working_time` (
  `WT_ID` int(11) NOT NULL,
  `EM_ID` int(11) DEFAULT NULL,
  `W_TIME` time DEFAULT NULL,
  `W_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`AD_ID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`AP_ID`),
  ADD KEY `FK_AP` (`US_ID`);

--
-- Indexes for table `assign_appointment`
--
ALTER TABLE `assign_appointment`
  ADD PRIMARY KEY (`US_ID`,`AP_ID`),
  ADD KEY `FK_AAc` (`AP_ID`),
  ADD KEY `FK_AAa` (`EM_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CAT_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EM_ID`),
  ADD KEY `FK_AD` (`AD_ID`),
  ADD KEY `FK_W` (`W_ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PR_ID` (`PR_ID`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`PR_ID`),
  ADD KEY `FK_PR` (`CAT_ID`),
  ADD KEY `FK_PR_ROOM` (`RN_ID`);

--
-- Indexes for table `property_pic`
--
ALTER TABLE `property_pic`
  ADD PRIMARY KEY (`PP_ID`),
  ADD KEY `FK_PP` (`PR_ID`);

--
-- Indexes for table `room_num`
--
ALTER TABLE `room_num`
  ADD PRIMARY KEY (`RN_ID`),
  ADD KEY `FK_RN` (`PR_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`US_ID`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`US_ID`);

--
-- Indexes for table `working_time`
--
ALTER TABLE `working_time`
  ADD PRIMARY KEY (`WT_ID`),
  ADD KEY `FK_EM` (`EM_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `AD_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `AP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `PR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `property_pic`
--
ALTER TABLE `property_pic`
  MODIFY `PP_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room_num`
--
ALTER TABLE `room_num`
  MODIFY `RN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `US_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `US_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `working_time`
--
ALTER TABLE `working_time`
  MODIFY `WT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `FK_AP` FOREIGN KEY (`US_ID`) REFERENCES `users` (`US_ID`);

--
-- Constraints for table `assign_appointment`
--
ALTER TABLE `assign_appointment`
  ADD CONSTRAINT `FK_AAa` FOREIGN KEY (`EM_ID`) REFERENCES `employee` (`EM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_AAb` FOREIGN KEY (`US_ID`) REFERENCES `users` (`US_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_AAc` FOREIGN KEY (`AP_ID`) REFERENCES `appointment` (`AP_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `FK_AD` FOREIGN KEY (`AD_ID`) REFERENCES `admins` (`AD_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_W` FOREIGN KEY (`W_ID`) REFERENCES `working_time` (`WT_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`PR_ID`) REFERENCES `property` (`PR_ID`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `FK_PR` FOREIGN KEY (`CAT_ID`) REFERENCES `category` (`CAT_ID`),
  ADD CONSTRAINT `FK_PR_ROOM` FOREIGN KEY (`RN_ID`) REFERENCES `room_num` (`RN_ID`);

--
-- Constraints for table `property_pic`
--
ALTER TABLE `property_pic`
  ADD CONSTRAINT `FK_PP` FOREIGN KEY (`PR_ID`) REFERENCES `property` (`PR_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_num`
--
ALTER TABLE `room_num`
  ADD CONSTRAINT `FK_RN` FOREIGN KEY (`PR_ID`) REFERENCES `property` (`PR_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `working_time`
--
ALTER TABLE `working_time`
  ADD CONSTRAINT `FK_EM` FOREIGN KEY (`EM_ID`) REFERENCES `employee` (`EM_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
