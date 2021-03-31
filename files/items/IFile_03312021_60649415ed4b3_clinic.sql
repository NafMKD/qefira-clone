-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2021 at 08:36 PM
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
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `patiant`
--

CREATE TABLE `patiant` (
  `id_t` int(11) NOT NULL,
  `id` varchar(300) NOT NULL,
  `card_no` varchar(300) NOT NULL,
  `bill_no` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `gname` varchar(300) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(300) NOT NULL,
  `kebele` varchar(300) NOT NULL,
  `woreda` varchar(300) NOT NULL,
  `home_no` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patiant`
--

INSERT INTO `patiant` (`id_t`, `id`, `card_no`, `bill_no`, `name`, `fname`, `gname`, `age`, `sex`, `kebele`, `woreda`, `home_no`, `phone`) VALUES
(1, '1001', '10001', '100001', 'kebede', 'kasa', 'balcha', 25, 'M', 'bosa', 'gode', '1025', '0965487591'),
(2, '1002', '10002', '100002', 'abozenech', 'haile', 'gebre', 35, 'F', 'kito', 'mana', '1302', '0945186597'),
(3, '1003', '10003', '100003', 'hhasd', 'asdasd', 'asdasd', 120, 'a', 'asdasd', 'asd', 'asd', '000100');

-- --------------------------------------------------------

--
-- Table structure for table `patiant_info`
--

CREATE TABLE `patiant_info` (
  `t_id` int(11) NOT NULL,
  `card_no` int(11) NOT NULL,
  `dr_id` int(11) NOT NULL,
  `sub` varchar(500) NOT NULL,
  `c_info` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patiant_info`
--

INSERT INTO `patiant_info` (`t_id`, `card_no`, `dr_id`, `sub`, `c_info`, `date`) VALUES
(1, 10001, 1601, 'diabetes ', '<p>this patient have stage 2 diabetes.<br></p>', '2019-11-30 08:25:54'),
(2, 10001, 1601, 'diabetes__cont', '<p>this stage 2 diabetes spreads well<br></p>', '2019-11-30 08:40:22'),
(3, 10001, 1601, 'Cancer', '<p>this patient has stage 1 <b>lung </b>cancer.<br></p><br>', '2019-11-30 20:01:00'),
(4, 10001, 1604, 'Cancer_cont', '<p>the cancer is spreading well.</p><p><br></p>', '2019-11-30 20:03:31'),
(5, 10001, 1601, 'bood pressure ', '<p>this guy has blood pressure<br></p>', '2020-04-17 20:00:58'),
(6, 10003, 1601, 'diabets', '<p>jakshdb, as dasdjahsdasd a sdjbasldjasd akjsdn;oasjd a ljsdfb;sjd f ;ajshdfosd f sdhf;osd s dfjsdfnsd;fnjs</p>', '2020-09-20 19:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id_t` int(11) NOT NULL,
  `id_w` varchar(20) NOT NULL,
  `name` varchar(300) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `gname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `sex` int(11) NOT NULL,
  `occ` varchar(300) NOT NULL,
  `type` int(11) NOT NULL,
  `doe` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id_t`, `id_w`, `name`, `fname`, `gname`, `email`, `password`, `sex`, `occ`, `type`, `doe`) VALUES
(1, '1601', 'Nafiyad', 'Menberu', 'Kitila', 'naf@gmail.com', '2a33a22558b84f226250869393917562', 1, 'Dr.', 1, '2019-11-07 06:20:29'),
(2, '1602', 'Ayelech', 'Kassa', 'Habte', 'ayel@gmail.com', '5ca2aa845c8cd5ace6b016841f100d82', 1, 'Sis.', 2, '2019-11-11 04:25:19'),
(3, '1603', 'Kasech', 'Chala', 'Uta', 'kas@gmail.com', '2a33a22558b84f226250869393917562', 1, 'Sis.', 2, '2019-11-11 04:25:19'),
(4, '1604', 'Biruk', 'Yidnekachew', 'Mengesha', 'bur@gmail.com', '2a33a22558b84f226250869393917562', 1, 'Dr.', 1, '2019-11-07 06:20:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patiant`
--
ALTER TABLE `patiant`
  ADD PRIMARY KEY (`id_t`);

--
-- Indexes for table `patiant_info`
--
ALTER TABLE `patiant_info`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id_t`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patiant`
--
ALTER TABLE `patiant`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patiant_info`
--
ALTER TABLE `patiant_info`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
