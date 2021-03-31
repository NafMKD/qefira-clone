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
-- Database: `best`
--

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `bed_id` int(11) NOT NULL,
  `bed_type` int(11) NOT NULL,
  `aval` int(11) NOT NULL,
  `date_up` datetime NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `add_by_map` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `rdate` datetime NOT NULL,
  `stat` int(11) NOT NULL,
  `conf_ph` int(11) NOT NULL,
  `conf_em` int(11) NOT NULL,
  `redirect` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_id`, `name`, `fname`, `email`, `phone`, `pass`, `rdate`, `stat`, `conf_ph`, `conf_em`, `redirect`) VALUES
(1, 1600, 'Nafiyad', 'Menberu', 'naf@g.com', '0932455518', '2a33a22558b84f226250869393917562', '2020-04-14 15:52:19', 0, 0, 0, '3da7ac4eb3891bdebbabcb6310d05792'),
(2, 1601, 'menberu', 'kitila', 'men@gmail.com', '0917804081', '2a33a22558b84f226250869393917562', '2020-04-21 02:57:35', 0, 0, 0, '70cb88ba01f782f5445384cf3b8d924a'),
(5, 1602, 'lelise', 'menberu', 'lelisemenberu@gmail.com', '0917028949', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-07 21:01:52', 0, 0, 0, '43e4ca1c0fd6cf5ca6f58de7a3335472');

-- --------------------------------------------------------

--
-- Table structure for table `users_history`
--

CREATE TABLE `users_history` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `r_date` datetime NOT NULL,
  `bed_type` varchar(300) NOT NULL,
  `hotel_name` varchar(300) NOT NULL,
  `rating` int(11) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
