-- DATABASE CODES PARA MAG INITILIZE SA LOCAL SYSTEM NIYO USING XAMPP
-- do not change anything 
-- para mag work ang classes at included actions


-- CREATE DATABASE satdata;

-- CREATE TABLE Users (
--     idUsers int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
--     usernameUsers tinytext NOT NULL,
--     emailUsers tinytext NOT NULL,
--     passwordUsers VARCHAR(255) NOT NULL,
--     countryUsers tinytext NOT NULL,
--     contactUsers int NOT NULL
-- );

-- CREATE TABLE SatData (
--     idSatData int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
--     gstidSatData tinytext NOT NULL,
--     datatypeSatData tinytext NOT NULL,
--     sensorData tinytext NOT NULL,
--     idSatDataMeta NOT NULL
-- );

-- CREATE TABLE SatDataMeta (
--     idSatDataMeta int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
--     fileSatDataMeta BLOB NOT NULL,
--     dateUploadedSatDataMeta date NOT NULL
-- )

-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 07:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `satdata`
--

CREATE TABLE `satdata` (
  `idSatData` int(11) NOT NULL,
  `gstidSatData` tinytext NOT NULL,
  `datatypeSatData` tinytext NOT NULL,
  `sensorData` tinytext NOT NULL,
  `File` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`File`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `usernameUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `passwordUsers` varchar(255) NOT NULL,
  `countryUsers` tinytext NOT NULL,
  `contactUsers` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `usernameUsers`, `emailUsers`, `passwordUsers`, `countryUsers`, `contactUsers`) VALUES
(22, 'nope', 'nope@nope.com', '$2y$10$KYs/Aglpc.PBP.DtYhz3Bejrtn7E7G0D1nA7bfXEvW208LH.HBlyy', 'nope', 'nope'),
(26, 'yes', 'yes@yes.com', '$2y$10$r2WIr0XONq11J/Ot8nU5XObgQ6m9uUG6L1vAsqm/wIR6TY3sq5MOm', 'yes', 'yes'),
(27, 'admin', 'admin@gmail.com', '$2y$10$gadqyiLcHzRfHvdYTMOHyeWrf.vN2vnFMSfBA4uzVxQQONvgeJAHi', 'admin', 'admin'),
(28, 'niay', 'niay@gmail.com', '$2y$10$7imsF/n2ydIl.iuzf2NMFeh799s9PBVEA/Of7FOaHueZ3790OI5GC', 'niay', 'niay'),
(29, 'jet', 'jet@j.com', '$2y$10$oSwcfsi6l35pMJ3tItLKE.e4zbiyW19tXRxuR7kPYUfJokDgl2c46', 'jet', 'jet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `satdata`
--
ALTER TABLE `satdata`
  ADD PRIMARY KEY (`idSatData`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `satdata`
--
ALTER TABLE `satdata`
  MODIFY `idSatData` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

