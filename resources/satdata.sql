-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 04:16 AM
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
  `datetimeSatData` datetime NOT NULL,
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

INSERT INTO `satdata` (`idSatData`, `datetimeSatData`, `gstidSatData`, `datatypeSatData`, `timeSatData`, `sensorSatData`, `checksumSatData`, `idSatMetaData`) VALUES
(11613, '2021-01-17 16:20:33', '01	01	', '5C	', '00	18	A0	D1	', '79	09	A0	A1	21	A3	0	0	', '6E', 104),
(11614, '2021-01-17 16:20:45', '01	01	', '5C	', '00	18	A0	DD	', '79	09	A0	A0	21	A3	0	0	', '79', 104),
(11615, '2021-01-17 16:20:57', '01	01	', '5C	', '00	18	A0	E9	', '78	C5	A0	A1	20	A2	0	0	', '3F', 104),
(96793, '2021-01-17 16:20:33', '01	01	', '5C	', '00	18	A0	D1	', '79	09	A0	A1	21	A3	0	0	', '6E', 112),
(96794, '2021-01-17 16:20:45', '01	01	', '5C	', '00	18	A0	DD	', '79	09	A0	A0	21	A3	0	0	', '79', 112),
(96795, '2021-01-17 16:20:57', '01	01	', '5C	', '00	18	A0	E9	', '78	C5	A0	A1	20	A2	0	0	', '3F', 112);

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
(104, '../uploadedfiles/612c896536c463.91251205.txt', 0x3031093031093543093030093138094130094431093739093039094130094131093231094133093009300936453c6272202f3e0d0a3031093031093543093030093138094130094444093739093039094130094130093231094133093009300937393c6272202f3e0d0a303109303109354309303009313809413009453909373809433509413009413109323009413209300930093346, '16', '2021-08-30', 27),
(112, '../uploadedfiles/613cde37156718.86043779.txt', 0x3031093031093543093030093138094130094431093739093039094130094131093231094133093009300936453c6272202f3e0d0a3031093031093543093030093138094130094444093739093039094130094130093231094133093009300937393c6272202f3e0d0a303109303109354309303009313809413009453909373809433509413009413109323009413209300930093346, '16', '2021-09-11', 28);

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
(28, 'niay', 'niay@gmail.com', '$2y$10$7imsF/n2ydIl.iuzf2NMFeh799s9PBVEA/Of7FOaHueZ3790OI5GC', 'KyuTech', '1234', 'Uploader Admin'),
(29, 'jet', 'jet@j.com', '$2y$10$oSwcfsi6l35pMJ3tItLKE.e4zbiyW19tXRxuR7kPYUfJokDgl2c46', 'Bangladesh', '1234', 'Regular User');

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
  MODIFY `idSatData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96796;

--
-- AUTO_INCREMENT for table `satdatameta`
--
ALTER TABLE `satdatameta`
  MODIFY `idSatDataMeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
