-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 08:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'naf', '2a33a22558b84f226250869393917562');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `bus_id` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `plate_id` varchar(30) NOT NULL,
  `capcity` varchar(300) NOT NULL,
  `location_id` varchar(300) NOT NULL,
  `from_date` varchar(300) NOT NULL,
  `to_date` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `registration_date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `bus_id`, `name`, `plate_id`, `capcity`, `location_id`, `from_date`, `to_date`, `status`, `registration_date`) VALUES
(1, '1000', 'bus one', '194265', '60', '1003', '', '', 1, '10/05/2020');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location_id` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `cost` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `registration_date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_id`, `name`, `cost`, `status`, `registration_date`) VALUES
(1, '1000', 'jimma', '250', 1, '10/05/2020'),
(2, '1001', 'metu', '350', 1, '10/05/2020'),
(3, '1002', 'bahirdar', '480', 1, '10/05/2020'),
(4, '1003', 'wlkite', '180', 1, '10/05/2020');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `uid` varchar(300) NOT NULL,
  `fullname` varchar(300) NOT NULL,
  `department` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `location_id` varchar(300) NOT NULL,
  `bus_id` varchar(300) NOT NULL,
  `seat_number` int(11) NOT NULL,
  `registration_date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `uid`, `fullname`, `department`, `phone`, `location_id`, `bus_id`, `seat_number`, `registration_date`) VALUES
(1, 'ugr/19610/12', 'Nafiyad Menberu Kitila', 'Pre Engineering', '0932455518', '1003', '1000', 1, '10/05/2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
