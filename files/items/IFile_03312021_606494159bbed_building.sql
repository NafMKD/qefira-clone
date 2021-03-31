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
-- Database: `building`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `renter_id` varchar(10) NOT NULL,
  `fileName` varchar(300) NOT NULL,
  `filePath` varchar(300) NOT NULL,
  `originalFileName` varchar(300) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `renter_id`, `fileName`, `filePath`, `originalFileName`, `dateRegisterd`, `dateUpdated`) VALUES
(1, '1002', 'Contract', 'RFile_12032020_5fc90481cc992_Sagantaa Leenjii.docx', 'Sagantaa Leenjii.docx', '12/03/2020', ''),
(2, '1004', 'Passport', 'RFile_01222021_600af62b1aff7_Induced EMF and Inductance.pptx', 'Induced EMF and Inductance.pptx', '01/22/2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `lastlogin` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `lastlogin`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '');

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `id` int(11) NOT NULL,
  `anas_id` varchar(10) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` longtext NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bankname`
--

CREATE TABLE `bankname` (
  `id` int(11) NOT NULL,
  `bank_id` varchar(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankname`
--

INSERT INTO `bankname` (`id`, `bank_id`, `name`, `account_number`, `dateRegisterd`, `dateUpdated`) VALUES
(1, '1000', 'CBE', '01332655984875', '12/11/2020', ''),
(2, '1001', 'Awash', '01332655984875', '11/11/2020', ''),
(4, '1002', 'Dashen', '01236584898785', '11/17/2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `contract_id` varchar(10) NOT NULL,
  `renter_id` varchar(10) NOT NULL,
  `room_id` varchar(10) NOT NULL,
  `startDate` varchar(50) NOT NULL,
  `endDate` varchar(50) NOT NULL,
  `filePath` varchar(300) NOT NULL,
  `originalFileName` varchar(300) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `actionDate` varchar(300) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `contract_id`, `renter_id`, `room_id`, `startDate`, `endDate`, `filePath`, `originalFileName`, `isActive`, `actionDate`, `dateRegisterd`, `dateUpdated`) VALUES
(1, '1000', '1002', '1000', '11/3/2020', '11/24/2020', '', '', 1, '11/20/2020', '11/14/2020', '11/23/2020'),
(2, '1001', '1001', '1002', '03/5/2013', '12/19/2020', '', '', 1, '11/24/2020', '11/14/2020', '11/30/2020'),
(4, '1002', '1000', '1003', '11/20/2020', '05/18/2021', '', '', 1, '11/21/2020', '11/20/2020', ''),
(5, '1003', '1003', '1005', '11/10/2020', '11/10/2021', '', '', 1, '', '12/03/2020', ''),
(6, '1004', '1004', '1004', '01/22/2021', '07/21/2021', '', '', 1, '', '01/22/2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `empfile`
--

CREATE TABLE `empfile` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `fileName` varchar(300) NOT NULL,
  `filePath` varchar(300) NOT NULL,
  `originalFileName` varchar(300) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empfile`
--

INSERT INTO `empfile` (`id`, `emp_id`, `fileName`, `filePath`, `originalFileName`, `dateRegisterd`, `dateUpdated`) VALUES
(1, '1000', 'Id', 'EFile_11232020_5fbba2939fcad_Book1.xlsx', 'Book1.xlsx', '11/23/2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `fullName` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `salary` varchar(300) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `emp_id`, `fullName`, `phone`, `address`, `gender`, `type`, `salary`, `isActive`, `dateRegisterd`, `dateUpdated`) VALUES
(1, '1000', 'Yisak kebede', '0965489879', 'kochi', 'M', '1', '4000', 1, '11/23/2020', '11/24/2020'),
(2, '1001', 'Mergasa kasa', '0965485879', 'Ajip', 'M', '2', '4000', 1, '11/24/2020', ''),
(3, '1002', 'Kasech alemu', '0932654879', 'merkato', 'F', '1', '3550', 1, '11/24/2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `empphoto`
--

CREATE TABLE `empphoto` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `filePath` varchar(300) NOT NULL,
  `originalFileName` varchar(300) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empphoto`
--

INSERT INTO `empphoto` (`id`, `emp_id`, `filePath`, `originalFileName`, `dateRegisterd`, `dateUpdated`) VALUES
(4, '1000', 'RPhoto_11232020_5fbba13ed85c6_fagfsdgasd.jpg', 'fagfsdgasd.jpg', '11/23/2020', '11/23/2020');

-- --------------------------------------------------------

--
-- Table structure for table `empsalary`
--

CREATE TABLE `empsalary` (
  `id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empsalary`
--

INSERT INTO `empsalary` (`id`, `salary_id`, `emp_id`, `month`, `year`, `amount`, `dateRegisterd`) VALUES
(1, 1000, '1000', '01', '2013', '4000', '11/23/2020'),
(2, 1001, '1000', '02', '2013', '4000', '11/23/2020'),
(3, 1002, '1000', '09', '2013', '4000', '10/23/2019'),
(4, 1003, '1002', '01', '2013', '3550', '11/24/2020'),
(5, 1004, '1001', '01', '2013', '4000', '11/26/2020');

-- --------------------------------------------------------

--
-- Table structure for table `feetype`
--

CREATE TABLE `feetype` (
  `id` int(11) NOT NULL,
  `fee_type` varchar(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feetype`
--

INSERT INTO `feetype` (`id`, `fee_type`, `name`, `dateRegisterd`, `dateUpdated`) VALUES
(1, '1000', 'bank', '10/16/2020', ''),
(2, '1001', 'cash', '10/16/2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `floor`
--

CREATE TABLE `floor` (
  `id` int(11) NOT NULL,
  `floor_id` varchar(10) NOT NULL,
  `floorName` varchar(50) NOT NULL,
  `floorCapacity` int(11) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floor`
--

INSERT INTO `floor` (`id`, `floor_id`, `floorName`, `floorCapacity`, `dateRegisterd`, `dateUpdated`) VALUES
(1, '1000', 'Ground Floor', 10, '11/11/2020', ''),
(2, '1001', 'First Floor', 12, '11/11/2020', '11/12/2020'),
(6, '1002', 'Second floor', 10, '11/12/2020', '11/24/2020'),
(7, '1003', 'Third floor', 10, '11/24/2020', ''),
(8, '1004', 'Last floor', 8, '12/03/2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `reciver` varchar(2000) NOT NULL,
  `sender` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` longtext NOT NULL,
  `filePath` varchar(300) NOT NULL,
  `originalFileName` varchar(300) NOT NULL,
  `isRead` tinyint(1) NOT NULL,
  `isMultiple` tinyint(1) NOT NULL,
  `multiple_id` int(11) NOT NULL,
  `dateSended` varchar(50) NOT NULL,
  `dateTime` datetime NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `msg_id`, `reciver`, `sender`, `subject`, `message`, `filePath`, `originalFileName`, `isRead`, `isMultiple`, `multiple_id`, `dateSended`, `dateTime`, `dateUpdated`) VALUES
(1, 1000, '1002', 'Admin', 'test msg', 'ZXZXZXZXdfsdfsdfsdfsdfvcxxcvcbcv', '', '', 0, 0, 0, '11/17/2020', '0000-00-00 00:00:00', ''),
(2, 1001, '1002', 'Admin', 'test msg', 'ZXZXZXZXdfsdfsdfsdfsdfvcxxcvcbcv', '', '', 0, 0, 0, '11/17/2020', '0000-00-00 00:00:00', ''),
(3, 1002, 'Admin', '1002', 'asdasd', 'asdasdasdasdasdasd', 'MFile_11172020_5fb3f586b30c4_Book1.xlsx', 'Book1.xlsx', 0, 0, 0, '11/17/2020', '0000-00-00 00:00:00', ''),
(4, 1003, '1001', 'Admin', 'asdasdas', 'asdasdgdgdbytbhgdfbhrtdhfgdhfg', '', '', 0, 0, 0, '11/18/2020', '0000-00-00 00:00:00', ''),
(5, 1004, '1002/1001', 'Admin', 'test ultiple', 'moment of truth', '', '', 0, 1, 1004, '11/22/2020', '0000-00-00 00:00:00', ''),
(6, 1005, '1002/1001/1000', 'Admin', 'test multiple ', 'test multiple&nbsp; with file', 'MFile_11222020_5fb9911384eb2_best music.txt', 'best music.txt', 0, 1, 1005, '11/22/2020', '0000-00-00 00:00:00', ''),
(7, 1006, '1001', 'Admin', 'date time', 'uasddfgdbhfg dbhfgh', '', '', 0, 0, 0, '11/22/2020', '2020-11-22 02:59:51', ''),
(8, 1007, '1001', 'Admin', 'Advanced Text', '<h1 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);\"><u>Heading Of Message</u></h1><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);\">Subheading</h4><p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure? On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee</p><ul><li>List item one</li><li>List item two</li><li>List item three</li><li>List item four</li></ul><p>Thank you,</p><p>John Doe</p>                      ', 'MFile_11242020_5fbcefadd5ffe_Admin _ Dashboard.pdf', 'Admin _ Dashboard.pdf', 0, 0, 0, '11/24/2020', '2020-11-24 02:34:05', '');

-- --------------------------------------------------------

--
-- Table structure for table `paidmonth`
--

CREATE TABLE `paidmonth` (
  `id` int(11) NOT NULL,
  `revenue_id` varchar(10) NOT NULL,
  `renter_id` varchar(10) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paidmonth`
--

INSERT INTO `paidmonth` (`id`, `revenue_id`, `renter_id`, `month`, `year`, `dateRegisterd`) VALUES
(1, '1000', '1002', '01', '2013', '11/20/2020'),
(2, '1000', '1002', '02', '2013', '11/20/2020'),
(3, '1000', '1002', '03', '2014', '11/20/2020'),
(4, '1000', '1002', '04', '2013', '11/20/2020'),
(5, '1000', '1002', '05', '2015', '11/20/2020'),
(6, '1000', '1002', '06', '2013', '11/20/2020'),
(7, '1001', '1001', '01', '2013', '11/20/2020'),
(8, '1001', '1001', '02', '2013', '11/20/2020'),
(10, '1001', '1001', '04', '2013', '11/20/2020'),
(11, '1002', '1001', '03', '2013', '11/22/2020'),
(12, '1003', '1000', '01', '2013', '11/23/2020'),
(13, '1004', '1000', '02', '2013', '11/23/2020'),
(14, '1007', '1002', '03', '2013', '11/24/2020'),
(15, '1006', '1000', '01', '2013', '11/24/2020'),
(16, '1008', '1001', '09', '2013', '11/30/2020'),
(17, '1008', '1001', '10', '2013', '11/30/2020'),
(18, '1008', '1001', '11', '2013', '11/30/2020'),
(19, '1008', '1001', '12', '2013', '11/30/2020'),
(20, '1008', '1001', '01', '2014', '11/30/2020'),
(21, '1008', '1001', '02', '2014', '11/30/2020'),
(22, '1009', '1001', '05', '2013', '11/30/2020'),
(23, '1009', '1001', '06', '2013', '11/30/2020'),
(24, '1009', '1001', '07', '2013', '11/30/2020'),
(25, '1009', '1001', '08', '2013', '11/30/2020'),
(26, '1010', '1002', '07', '2013', '12/03/2020'),
(27, '1010', '1002', '08', '2013', '12/03/2020'),
(28, '1010', '1002', '09', '2013', '12/03/2020'),
(29, '1010', '1002', '10', '2013', '12/03/2020'),
(30, '1011', '1004', '01', '2013', '01/22/2021'),
(31, '1011', '1004', '02', '2013', '01/22/2021'),
(32, '1011', '1004', '03', '2013', '01/22/2021'),
(33, '1011', '1004', '04', '2013', '01/22/2021');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `renter_id` varchar(10) NOT NULL,
  `filePath` varchar(300) NOT NULL,
  `originalFileName` varchar(300) NOT NULL,
  `dateUploaded` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `renter_id`, `filePath`, `originalFileName`, `dateUploaded`, `dateUpdated`) VALUES
(13, '1002', 'RPhoto_11142020_5fb00870a720f_fagfsdgasd.jpg', 'fagfsdgasd.jpg', '11/14/2020', '11/14/2020'),
(14, '1001', 'RPhoto_11242020_5fbcfacda5661_11350475_921257307942135_5160286448690947259_n.jpg', '11350475_921257307942135_5160286448690947259_n.jpg', '11/24/2020', '11/24/2020'),
(15, '1004', 'RPhoto_01222021_600af5dc68235.jpg', 'Captured', '01/22/2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `renterperson`
--

CREATE TABLE `renterperson` (
  `id` int(11) NOT NULL,
  `renter_id` varchar(10) NOT NULL,
  `fullName` varchar(300) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contract_id` varchar(10) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `actionDate` varchar(300) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renterperson`
--

INSERT INTO `renterperson` (`id`, `renter_id`, `fullName`, `phone`, `address`, `contract_id`, `isActive`, `actionDate`, `dateRegisterd`, `dateUpdated`) VALUES
(1, '1000', 'asda', '0932455518', '', '1002', 1, '11/21/2020', '11/08/2020', ''),
(2, '1001', 'Hile kidus', '0962652115', 'Ajip', '1001', 1, '11/24/2020', '11/09/2020', '11/13/2020'),
(3, '1002', 'Nafiyad menberu', '0932455518', 'Bosa kito', '1000', 1, '11/20/2020', '11/12/2020', '11/13/2020'),
(4, '1003', 'Tariku g', '0932455518', 'Bosa kito', '1003', 1, '', '12/03/2020', ''),
(5, '1004', 'Hile hjsjdmhf sdfbhjnsd', '0962652115', 'Jims', '1004', 1, '', '01/22/2021', '');

-- --------------------------------------------------------

--
-- Table structure for table `rentrevenue`
--

CREATE TABLE `rentrevenue` (
  `id` int(11) NOT NULL,
  `revenue_id` varchar(10) NOT NULL,
  `renter_id` varchar(10) NOT NULL,
  `fee_type` varchar(10) NOT NULL,
  `bank_id` varchar(10) NOT NULL,
  `reciptNumber` varchar(100) NOT NULL,
  `reciptDate` varchar(50) NOT NULL,
  `feeAmount` float NOT NULL,
  `monthPaidFor` varchar(300) NOT NULL,
  `yearPaid` int(11) NOT NULL,
  `monthPaidFor2` varchar(300) NOT NULL,
  `yearPaid2` int(11) NOT NULL,
  `datePaid` varchar(50) NOT NULL,
  `isAproved` int(11) NOT NULL,
  `actionDate` varchar(50) NOT NULL,
  `dateRegisterd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentrevenue`
--

INSERT INTO `rentrevenue` (`id`, `revenue_id`, `renter_id`, `fee_type`, `bank_id`, `reciptNumber`, `reciptDate`, `feeAmount`, `monthPaidFor`, `yearPaid`, `monthPaidFor2`, `yearPaid2`, `datePaid`, `isAproved`, `actionDate`, `dateRegisterd`) VALUES
(1, '1000', '1002', '1', '1002', 'hjbhbhhhjb', '03/02/2020', 48000, '01', 2013, '06', 2013, '11/20/2020', 1, '11/20/2020', '11/20/2020'),
(2, '1001', '1001', '0', '', '', '', 32000, '01', 2013, '04', 2013, '11/20/2020', 1, '11/20/2020', '10/19/2020'),
(5, '1002', '1001', '1', '1002', 'hjbhbhhhjb', '03/02/2020', 8000, '03', 2013, '', 0, '11/22/2020', 0, '11/22/2020', '11/22/2020'),
(6, '1003', '1000', '0', '', '', '', 12000, '01', 2013, '', 0, '11/23/2020', 1, '11/23/2020', '10/23/2020'),
(7, '1004', '1000', '0', '', '', '', 12000, '02', 2013, '', 0, '11/23/2020', 1, '11/23/2020', '10/23/2020'),
(8, '1005', '1001', '1', '1002', 'hjbhbhhhjb', '03/12/2020', 8000, '06', 2013, '', 0, '11/24/2020', 0, '', '11/24/2020'),
(9, '1006', '1000', '1', '1001', 'hjbhbhhhjb', '03/02/2020', 12000, '01', 2013, '', 0, '11/24/2020', 1, '11/27/2020', '11/24/2020'),
(10, '1007', '1002', '0', '', '', '', 8000, '03', 2013, '', 0, '11/24/2020', 1, '11/24/2020', '11/24/2020'),
(11, '1008', '1001', '0', '', '', '', 48000, '09', 2013, '02', 2014, '11/30/2020', 1, '11/30/2020', '11/30/2020'),
(12, '1009', '1001', '0', '', '', '', 32000, '05', 2013, '08', 2013, '11/30/2020', 1, '11/30/2020', '11/30/2020'),
(13, '1010', '1002', '1', '1002', 's5sdf45sdf1sdf5sdf', '12/02/2020', 32000, '07', 2013, '10', 2013, '12/03/2020', 1, '12/03/2020', '12/03/2020'),
(14, '1011', '1004', '1', '1001', 's5sdf45sdf1sdf5sdf', '22/01/2021', 34000, '01', 2013, '04', 2013, '01/22/2021', 1, '01/22/2021', '01/22/2021');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_id` varchar(10) NOT NULL,
  `floor_id` varchar(10) NOT NULL,
  `roomNumber` int(11) NOT NULL,
  `roomAmount` float NOT NULL,
  `isRented` tinyint(1) NOT NULL,
  `renter_id` varchar(10) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `dateRegister` varchar(50) NOT NULL,
  `dateUpdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_id`, `floor_id`, `roomNumber`, `roomAmount`, `isRented`, `renter_id`, `isActive`, `dateRegister`, `dateUpdate`) VALUES
(4, '1000', '1000', 1, 8000, 1, '1002', 1, '11/12/2020', ''),
(5, '1001', '1000', 2, 9500, 0, '', 1, '11/13/2020', ''),
(6, '1002', '1001', 11, 8000, 1, '1001', 1, '11/14/2020', ''),
(7, '1003', '1001', 12, 12000, 1, '1000', 1, '11/20/2020', ''),
(8, '1004', '1000', 3, 8500, 1, '1004', 1, '11/24/2020', ''),
(9, '1005', '1004', 50, 8000, 1, '1003', 1, '12/03/2020', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankname`
--
ALTER TABLE `bankname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empfile`
--
ALTER TABLE `empfile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empphoto`
--
ALTER TABLE `empphoto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empsalary`
--
ALTER TABLE `empsalary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feetype`
--
ALTER TABLE `feetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paidmonth`
--
ALTER TABLE `paidmonth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renterperson`
--
ALTER TABLE `renterperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentrevenue`
--
ALTER TABLE `rentrevenue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bankname`
--
ALTER TABLE `bankname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `empfile`
--
ALTER TABLE `empfile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `empphoto`
--
ALTER TABLE `empphoto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `empsalary`
--
ALTER TABLE `empsalary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feetype`
--
ALTER TABLE `feetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paidmonth`
--
ALTER TABLE `paidmonth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `renterperson`
--
ALTER TABLE `renterperson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rentrevenue`
--
ALTER TABLE `rentrevenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
