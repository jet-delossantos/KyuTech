-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 03:16 PM
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
  `timeSatData` tinytext NOT NULL,
  `sensorSatData` tinytext NOT NULL,
  `checksumSatData` tinytext NOT NULL,
  `idSatMetaData` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satdata`
--

INSERT INTO `satdata` (`idSatData`, `gstidSatData`, `datatypeSatData`, `timeSatData`, `sensorSatData`, `checksumSatData`, `idSatMetaData`) VALUES
(10779, '01	01	', '01	', 'A1	00	18	A0	', '18	A0	D1	D1	A0	79	09	00	00	00	00	00	00	00	00	00	00	00	00	00	00	00	00	00			', '00\r\n', 79),
(10780, '02	01	', '02	', 'A0	00	18	A0	', '18	A0	DD	DD	A0	79	09	00	00	00	00	00	00	00	00	00	00	00	00	00	00	00	00	00			', '00\r\n', 79),
(10781, '03	01	', '03	', 'A1	00	18	A0	', '18	A0	E9	E9	A0	78	C5	00	00	00	00	00	00	00	00	00	00	00	00	00	00	00	00	00		', '00\r\n', 79),
(10782, '01	01	', '5C	', '00	18	A0	D1	', '79	09	A0	A1	21	A3	0	0	', '6E\r\n', 80),
(10783, '01	01	', '5C	', '00	18	A0	DD	', '79	09	A0	A0	21	A3	0	0	', '79\r\n', 80),
(10784, '01	01	', '5C	', '00	18	A0	E9	', '78	C5	A0	A1	20	A2	0	0	', '3F\r\n', 80);

-- --------------------------------------------------------

--
-- Table structure for table `satdatameta`
--

CREATE TABLE `satdatameta` (
  `idSatDataMeta` int(11) NOT NULL,
  `fileNameSatDataMeta` varchar(255) NOT NULL,
  `fileSatDataMeta` longblob NOT NULL,
  `formatSatDataMeta` tinytext NOT NULL,
  `dateUploadedSatDataMeta` date NOT NULL,
  `uploaderSatDataMeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satdatameta`
--

INSERT INTO `satdatameta` (`idSatDataMeta`, `fileNameSatDataMeta`, `fileSatDataMeta`, `formatSatDataMeta`, `dateUploadedSatDataMeta`, `uploaderSatDataMeta`) VALUES
(79, '../uploadedfiles/612878e26eaed9.38011132.txt', 0x303109303109303109413109303009313809413009313809413009443109443109413009373909303909303009303009303009303009303009303009303009303009303009303009303009303009303009303009303009303009303009093c6272202f3e0d0a303209303109303209413009303009313809413009313809413009444409444409413009373909303909303009303009303009303009303009303009303009303009303009303009303009303009303009303009303009303009303009093c6272202f3e0d0a303309303109303309413109303009313809413009313809413009453909453909413009373809433509303009303009303009303009303009303009303009303009303009303009303009303009303009303009303009303009303009, '33', '2021-08-27', 27),
(80, '../uploadedfiles/6128c492c71746.96449008.txt', 0x3031093031093543093030093138094130094431093739093039094130094131093231094133093009300936453c6272202f3e0d0a3031093031093543093030093138094130094444093739093039094130094130093231094133093009300937393c6272202f3e0d0a303109303109354309303009313809413009453909373809433509413009413109323009413209300930093346, '16', '2021-08-27', 27);

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
  `contactUsers` tinytext NOT NULL,
  `permissionsUsers` text NOT NULL DEFAULT 'Regular User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `usernameUsers`, `emailUsers`, `passwordUsers`, `countryUsers`, `contactUsers`, `permissionsUsers`) VALUES
(27, 'admin', 'jetgullondelossantos@gmail.com', '$2y$10$gadqyiLcHzRfHvdYTMOHyeWrf.vN2vnFMSfBA4uzVxQQONvgeJAHi', 'KyuTech', '09453022208', 'Admin'),
(28, 'niay', 'niay@gmail.com', '$2y$10$7imsF/n2ydIl.iuzf2NMFeh799s9PBVEA/Of7FOaHueZ3790OI5GC', 'Philippines', '1234', 'Regular User'),
(29, 'jet', 'jet@j.com', '$2y$10$oSwcfsi6l35pMJ3tItLKE.e4zbiyW19tXRxuR7kPYUfJokDgl2c46', 'Philippines', '1234', 'Regular User'),
(31, 'ruth', 'ruth@gmail.com', '$2y$10$AXxNuI1nN4nm/z2lymxlsOL7Aq5rZK4ZuKoXNYjwDkfbFlMIqFr.6', 'Bangladesh', '1234', 'Regular User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `satdata`
--
ALTER TABLE `satdata`
  ADD PRIMARY KEY (`idSatData`);

--
-- Indexes for table `satdatameta`
--
ALTER TABLE `satdatameta`
  ADD PRIMARY KEY (`idSatDataMeta`);

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
  MODIFY `idSatData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11161;

--
-- AUTO_INCREMENT for table `satdatameta`
--
ALTER TABLE `satdatameta`
  MODIFY `idSatDataMeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
