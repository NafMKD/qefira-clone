-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 02:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qefira`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `regdate` varchar(50) NOT NULL,
  `udate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` int(11) NOT NULL,
  `cat_id` varchar(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `datereg` varchar(50) NOT NULL,
  `udate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cat_key`
--

CREATE TABLE `cat_key` (
  `id` int(11) NOT NULL,
  `cat_key_id` varchar(10) NOT NULL,
  `cat_id` varchar(10) NOT NULL,
  `catkey` varchar(300) NOT NULL,
  `datreg` varchar(50) NOT NULL,
  `udate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `cat_id` varchar(10) NOT NULL,
  `usr_id` varchar(10) NOT NULL,
  `ad_item_id` varchar(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `price` varchar(50) NOT NULL,
  `descr` longtext NOT NULL,
  `region` varchar(10) NOT NULL,
  `comp` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `negtype` tinyint(1) NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `regdate` varchar(50) NOT NULL,
  `udate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items_file`
--

CREATE TABLE `items_file` (
  `id` int(11) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `filePath` mediumtext NOT NULL,
  `datereg` varchar(50) NOT NULL,
  `udate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items_key_detail`
--

CREATE TABLE `items_key_detail` (
  `id` int(11) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `cat_key_id` varchar(10) NOT NULL,
  `cat_value` mediumtext NOT NULL,
  `datreg` varchar(50) NOT NULL,
  `udate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `msg_id` varchar(10) NOT NULL,
  `msg_to` varchar(10) NOT NULL,
  `msg_from` varchar(10) NOT NULL,
  `item_id` varchar(10) NOT NULL,
  `message` longtext NOT NULL,
  `reply` varchar(10) NOT NULL,
  `isreaded` tinyint(1) NOT NULL,
  `datereg` varchar(50) NOT NULL,
  `udate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages_file`
--

CREATE TABLE `messages_file` (
  `id` int(11) NOT NULL,
  `msg_id` varchar(10) NOT NULL,
  `filePath` mediumtext NOT NULL,
  `datereg` varchar(50) NOT NULL,
  `udate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usr_id` varchar(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `telegram` varchar(30) NOT NULL,
  `whatsapp` varchar(30) NOT NULL,
  `isEmail` varchar(20) NOT NULL,
  `isPhone` varchar(20) NOT NULL,
  `isTelegram` varchar(20) NOT NULL,
  `isWhatsapp` varchar(20) NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  `passreset` varchar(50) NOT NULL,
  `datereg` varchar(50) NOT NULL,
  `udate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users_file`
--

CREATE TABLE `users_file` (
  `id` int(11) NOT NULL,
  `usr_id` varchar(10) NOT NULL,
  `filePath` mediumtext NOT NULL,
  `datereg` varchar(50) NOT NULL,
  `udate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat_key`
--
ALTER TABLE `cat_key`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_file`
--
ALTER TABLE `items_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_key_detail`
--
ALTER TABLE `items_key_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_file`
--
ALTER TABLE `messages_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_file`
--
ALTER TABLE `users_file`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cat_key`
--
ALTER TABLE `cat_key`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items_file`
--
ALTER TABLE `items_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items_key_detail`
--
ALTER TABLE `items_key_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages_file`
--
ALTER TABLE `messages_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_file`
--
ALTER TABLE `users_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
