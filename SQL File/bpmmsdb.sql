-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 07:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpmmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbpdetails`
--

CREATE TABLE `tblbpdetails` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `memberId` int(11) DEFAULT NULL,
  `systolic` int(11) DEFAULT NULL,
  `diastolic` int(11) DEFAULT NULL,
  `pulse` int(11) DEFAULT NULL,
  `bpDateTime` varchar(120) DEFAULT NULL,
  `postingTime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbpdetails`
--

INSERT INTO `tblbpdetails` (`id`, `userId`, `memberId`, `systolic`, `diastolic`, `pulse`, `bpDateTime`, `postingTime`) VALUES
(1, 1, 2, 126, 85, 98, NULL, '2023-02-11 17:52:29'),
(2, 1, 1, 124, 84, 102, '2023-02-10T15:31', '2023-02-11 17:57:49'),
(4, 1, 1, 134, 92, 108, '2023-02-12T13:20', '2023-02-13 16:47:53'),
(5, 3, 5, 80, 120, 100, '2023-02-13T14:15', '2023-02-14 17:39:17'),
(6, 3, 5, 90, 132, 112, '2023-02-12T16:15', '2023-02-14 17:39:37');

-- --------------------------------------------------------

--
-- Table structure for table `tblfamilymembers`
--

CREATE TABLE `tblfamilymembers` (
  `id` int(11) NOT NULL,
  `userId` int(5) DEFAULT NULL,
  `memberName` varchar(150) DEFAULT NULL,
  `memberRelation` varchar(150) DEFAULT NULL,
  `memberAge` int(2) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfamilymembers`
--

INSERT INTO `tblfamilymembers` (`id`, `userId`, `memberName`, `memberRelation`, `memberAge`, `postingDate`) VALUES
(1, 1, 'Amit Kumar', 'Brother', 27, '2023-02-08 18:47:03'),
(2, 1, 'Garima Singh', 'Wife', 28, '2023-02-08 18:48:06'),
(5, 3, 'Alina', 'Wife', 45, '2023-02-14 17:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserregistration`
--

CREATE TABLE `tbluserregistration` (
  `id` int(11) NOT NULL,
  `fullName` varchar(220) DEFAULT NULL,
  `emailid` varchar(255) DEFAULT NULL,
  `mobileNumber` bigint(11) DEFAULT NULL,
  `loginPassword` varchar(120) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluserregistration`
--

INSERT INTO `tbluserregistration` (`id`, `fullName`, `emailid`, `mobileNumber`, `loginPassword`, `regDate`) VALUES
(1, 'Anuj Kumar', 'ak@test.com', 1425363625, 'Test@123', '2023-02-08 18:14:25'),
(3, 'John Doe', 'john@test.com', 1234563210, 'Test@123', '2023-02-14 17:36:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbpdetails`
--
ALTER TABLE `tblbpdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblfamilymembers`
--
ALTER TABLE `tblfamilymembers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluserregistration`
--
ALTER TABLE `tbluserregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbpdetails`
--
ALTER TABLE `tblbpdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblfamilymembers`
--
ALTER TABLE `tblfamilymembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbluserregistration`
--
ALTER TABLE `tbluserregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
