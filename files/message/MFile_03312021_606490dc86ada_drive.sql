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
-- Database: `drive`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `brand` varchar(300) NOT NULL,
  `model` varchar(300) NOT NULL,
  `plate` varchar(300) NOT NULL,
  `dor` varchar(300) NOT NULL,
  `car_type` int(11) NOT NULL,
  `per_date` varchar(300) NOT NULL,
  `pro_date` varchar(300) NOT NULL,
  `stat` int(11) NOT NULL,
  `editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`t_id`, `id`, `name`, `brand`, `model`, `plate`, `dor`, `car_type`, `per_date`, `pro_date`, `stat`, `editor`) VALUES
(1, 1000, 'ketket', 'isuzu', 'NPR', '32645', '12/14/2020', 5, '10/12/2020', '05/4/2020', 0, 1100);

-- --------------------------------------------------------

--
-- Table structure for table `car_file`
--

CREATE TABLE `car_file` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `file_discr` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_file`
--

INSERT INTO `car_file` (`t_id`, `id`, `file_discr`, `path`, `date`) VALUES
(1, 1000, 'testphoto', 'File_08212020_965461_photo_2020-04-20_21-51-18.jpg', '08/21/2020');

-- --------------------------------------------------------

--
-- Table structure for table `car_maint`
--

CREATE TABLE `car_maint` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `giver` varchar(300) NOT NULL,
  `taker` varchar(300) NOT NULL,
  `discr` varchar(300) NOT NULL,
  `price` varchar(300) NOT NULL,
  `date_ins` varchar(300) NOT NULL,
  `date_db` varchar(300) NOT NULL,
  `editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_maint`
--

INSERT INTO `car_maint` (`t_id`, `id`, `giver`, `taker`, `discr`, `price`, `date_ins`, `date_db`, `editor`) VALUES
(1, 1000, 'eth', 'ababe', 'turbo service', '2000', '08/22/2020', '08/22/2020', 1101);

-- --------------------------------------------------------

--
-- Table structure for table `car_petrol`
--

CREATE TABLE `car_petrol` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `birr` varchar(300) NOT NULL,
  `petrol` varchar(300) NOT NULL,
  `taker` varchar(300) NOT NULL,
  `giver` varchar(300) NOT NULL,
  `date_input_db` varchar(300) NOT NULL,
  `date_insert` varchar(300) NOT NULL,
  `editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_petrol`
--

INSERT INTO `car_petrol` (`t_id`, `id`, `birr`, `petrol`, `taker`, `giver`, `date_input_db`, `date_insert`, `editor`) VALUES
(1, 1000, '1500', '50', 'ababe', 'naf', '08/22/2020', '08/22/2020', 1100);

-- --------------------------------------------------------

--
-- Table structure for table `class_type`
--

CREATE TABLE `class_type` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL,
  `stat` int(11) NOT NULL,
  `editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_type`
--

INSERT INTO `class_type` (`t_id`, `id`, `name`, `date`, `stat`, `editor`) VALUES
(1, 1000, 'Amharic Class', '08/15/2020', 0, 1101),
(2, 1001, 'A/Oromo Class', '08/15/2020', 0, 1101);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `gname` varchar(300) NOT NULL,
  `gender` int(11) NOT NULL,
  `dor` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `edu_lev` varchar(300) NOT NULL,
  `e_type` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `e_state` int(11) NOT NULL,
  `fr_date` varchar(300) NOT NULL,
  `to_date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`t_id`, `id`, `name`, `fname`, `gname`, `gender`, `dor`, `phone`, `edu_lev`, `e_type`, `stat`, `e_state`, `fr_date`, `to_date`) VALUES
(1, 1000, 'fantahun', 'geremew', 'mosisa', 1, '12/13/2012', '09 4512 1541', 'Degree', 2, 0, 1, '0', '0'),
(2, 1001, 'chala', 'gemeda', 'moka', 1, '12/14/2012', '09 4125 4852', 'Advanced Diploma', 4, 0, 2, '12/12/2012', '01/03/2013'),
(3, 1002, 'ayelech', 'kebede', 'afar', 2, '08/20/2020', '20 2105 2020', '12', 5, 0, 1, '0', '0'),
(4, 1003, 'gurumti ', 'bulack', 'kokech', 2, '08/20/2020', '09 6562 1256', '10', 5, 0, 1, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `employee_file`
--

CREATE TABLE `employee_file` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `file_discr` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_file`
--

INSERT INTO `employee_file` (`t_id`, `id`, `file_discr`, `path`, `date`) VALUES
(1, 1000, 'photo', 'file_up_08192020_5f3d689c42d53_photo_2020-04-20_21-51-18.jpg', '08/19/2020'),
(2, 1001, 'photo', 'file_up_08202020_5f3daf4a40d3a_photo_2020-04-20_21-51-18.jpg', '08/20/2020'),
(3, 1002, 'photo', 'file_up_08202020_5f3dbb5c3d55e_photo_2020-04-20_21-51-18.jpg', '08/20/2020'),
(4, 1003, 'Photo', 'Photo_08202020_5f3e58d364608.jpg', '08/20/2020');

-- --------------------------------------------------------

--
-- Table structure for table `employe_action`
--

CREATE TABLE `employe_action` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `type` varchar(300) NOT NULL,
  `action` varchar(300) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employe_action`
--

INSERT INTO `employe_action` (`t_id`, `id`, `username`, `password`, `type`, `action`, `date`) VALUES
(1, 1100, 'naf', '2a33a22558b84f226250869393917562', '2', '6', '2020-08-05 06:19:00'),
(3, 1101, 'eth', '2a33a22558b84f226250869393917562', '2', '6', '2020-08-05 06:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `t_id` int(11) NOT NULL,
  `inv_no` varchar(300) NOT NULL,
  `id` int(11) NOT NULL,
  `date` varchar(300) NOT NULL,
  `editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `code` varchar(300) NOT NULL,
  `stat` int(11) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `date` varchar(300) NOT NULL,
  `cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`t_id`, `id`, `name`, `code`, `stat`, `amount`, `date`, `cat`) VALUES
(1, 1000, 'hizb 1', 'fg-1', 1, '11000', '08/08/2020', 0),
(2, 1001, 'hizb 2', 'fg-2', 1, '10000', '08/08/2020', 0),
(3, 1002, 'derek 1', 'fg-3', 1, '9000', '08/08/2020', 0),
(4, 1003, 'derek 2', 'fg-4', 1, '8500', '08/08/2020', 0),
(5, 1004, 'Taxi 1', 'T-1', 1, '4000', '08/15/2020', 3),
(7, 1005, 'motor', 't-1', 0, '2000', '08/16/2020', 9);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `t_id` int(11) NOT NULL,
  `id` longtext NOT NULL,
  `phone` longtext NOT NULL,
  `mess` longtext NOT NULL,
  `type` int(11) NOT NULL,
  `date` varchar(300) NOT NULL,
  `time` varchar(300) NOT NULL,
  `editor` int(11) NOT NULL,
  `send_time` varchar(300) NOT NULL,
  `send_date` varchar(300) NOT NULL,
  `stat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`t_id`, `id`, `phone`, `mess`, `type`, `date`, `time`, `editor`, `send_time`, `send_date`, `stat`) VALUES
(1, '/1017/1008/1009', '', 'this is a test message', 1, '08/13/2020', '11:05:46', 1100, '07:55:22', '08/13/2020', 1),
(2, '/1010', '', 'test 2', 1, '08/13/2020', '11:06:44', 1100, '', '', 0),
(3, '/1017/1008/1010/1009', '', 'this is from license', 2, '08/13/2020', '11:49:11', 1101, '07:56:32', '08/13/2020', 1),
(4, '1018', '', 'this is the edited one ', 3, '08/13/2020', '02:58:44', 1100, '', '', 0),
(5, '1017', '09 3154 6959', 'message including phone here ', 3, '08/13/2020', '03:14:40', 1100, '05:59:03', '08/13/2020', 1),
(6, '1020', '10 8451 2005', 'hey the are you fine. ', 3, '08/15/2020', '12:08:10', 1100, '', '', 0),
(7, '1018', '09 3254 0541', 'kefiya kefeyi tolo', 3, '08/15/2020', '10:38:43', 1101, '10:40:32', '08/15/2020', 1),
(8, '/1019', '/', 'hey chala', 1, '08/15/2020', '10:47:38', 1101, '10:47:52', '08/15/2020', 1),
(10, '/1019', '/', 'ghbjmhbj khjlk', 1, '08/16/2020', '04:54:45', 1101, '04:55:29', '08/16/2020', 1),
(11, '1026', '02 1512 5255', 'gjhbmn, lhkjn,kjhkb,mnb,kujh lukjhuhljh;uhn;okj;lkm,m.,m;ljkhn.,m .jnlkjn.;lhjn.m,nln', 3, '08/18/2020', '09:46:09', 1101, '09:46:19', '08/18/2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `fname` varchar(300) NOT NULL,
  `gname` varchar(300) NOT NULL,
  `name_amh` varchar(300) NOT NULL,
  `fname_amh` varchar(300) NOT NULL,
  `gname_amh` varchar(300) NOT NULL,
  `name_or` varchar(300) NOT NULL,
  `fname_or` varchar(300) NOT NULL,
  `gname_or` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL,
  `dob` varchar(300) NOT NULL,
  `dor` varchar(300) NOT NULL,
  `lang` int(11) NOT NULL,
  `med` varchar(300) NOT NULL,
  `res_pers` varchar(300) NOT NULL,
  `phy_name` varchar(300) NOT NULL,
  `term_lic` int(11) NOT NULL,
  `lt` int(11) NOT NULL,
  `editor` int(11) NOT NULL,
  `comp` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `blood` varchar(300) NOT NULL,
  `edu_lev` int(11) NOT NULL,
  `c_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`t_id`, `id`, `name`, `fname`, `gname`, `name_amh`, `fname_amh`, `gname_amh`, `name_or`, `fname_or`, `gname_or`, `gender`, `dob`, `dor`, `lang`, `med`, `res_pers`, `phy_name`, `term_lic`, `lt`, `editor`, `comp`, `stat`, `blood`, `edu_lev`, `c_type`) VALUES
(1, 1000, 'Abdela', 'Zenu', 'A/Fita', 'Abdela', 'Zenu', 'A/Fita', 'አብደላ', 'ዜኑ', 'አ/ፊጣ', '1', '01/06/1978', '', 1, '', '', '', 1001, 1001, 0, 0, 0, '', 0, 0),
(5, 1001, 'asd', 'asd', 'asd', '', '', 'sdfs', '', '', '', '1', '', '', 0, '', '', '', 1000, 1001, 1100, 0, 0, '', 0, 0),
(6, 1002, 'veronica', 'lether', 'abebe', '', '', '', '', '', '', '2', '08/15/2020', '08/15/2020', 1, '', '', '', 1002, 1001, 1100, 0, 0, '', 0, 0),
(7, 1003, '', '', '', '', '', '', '', '', '', '2', '', '', 0, '', '', '', 1005, 1001, 1100, 0, 0, '', 0, 0),
(8, 1004, 'abozenech', 'chala', 'comic', '', '', '', '', '', '', '2', '08/9/2020', '08/9/2020', 0, '', '', '', 1004, 1000, 1100, 0, 0, '', 0, 0),
(9, 1005, 'dere', '', '', '', '', '', '', '', '', '1', '08/12/2020', '08/12/2020', 0, '', '', '', 1006, 1000, 1100, 0, 0, '', 0, 0),
(10, 1006, '', '', '', '', '', '', '', '', '', '2', '', '', 0, '', '', '', 1003, 1001, 1100, 0, 0, '', 0, 0),
(11, 1007, '', '', '', '', '', '', '', '', '', '1', '', '', 0, '', '', '', 1007, 1001, 1100, 0, 0, '', 0, 0),
(12, 1008, 'shuluka', '', '', '', '', '', '', '', '', '1', '08/9/2020', '08/9/2020', 2, '', '', '', 1006, 1000, 1100, 0, 1, '', 0, 1001),
(13, 1009, 'ht', '', '', '', '', '', '', '', '', '2', '', '09/12/2020', 0, '', '', '', 1006, 1000, 1100, 0, 0, '', 0, 1001),
(14, 1010, 'dfdsvvc', 'fddfg', 'fgdfgdf', '', '', '', '', '', '', '1', '', '', 1, '', '', '', 1006, 1003, 1100, 0, 0, '', 0, 1001),
(15, 1011, 'kebede', 'abebe', 'chala', '', '', '', '', '', '', '1', '02/15/1995', '02/22/2011', 2, '', '', '', 1002, 1001, 1100, 0, 0, '', 0, 0),
(16, 1012, 'naf', 'sdas', 'asda', '', '', '', '', '', '', '2', '', '', 0, '', '', '', 1003, 1001, 1100, 0, 0, '', 0, 0),
(17, 1013, 'fajoodv', '', 'sdfsd', '', '', '', '', '', '', '1', '10/14/2000', '08/8/2020', 0, '', '', '', 1007, 1000, 1100, 0, 0, '', 0, 0),
(18, 1014, 'jj', '', '', '', '', '', '', '', '', '1', '10/14/2000', '08/8/2020', 0, '', '', '', 1006, 1000, 1100, 1, 1, '', 0, 0),
(19, 1015, 'grum', 'asdas', 'asdas', 'asd', 'asdas', 'asda', 'sads', 'sadsa', 'asdas', '1', '10/25/1997', '08/8/2020', 2, '', '', '', 1008, 1001, 1100, 0, 0, '', 0, 1001),
(20, 1016, 'life ', 'sadf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', '2', '02/10/2073', '08/11/2060', 1, '', '', 'sdf', 1005, 1001, 1100, 0, 0, '', 0, 0),
(21, 1017, 'abebe', 'kebede', 'tolosa', 'aseged', 'kulubi', 'brundi', 'adsa', 'asdas', 'asdasd', '2', '10/14/2000', '08/2/2020', 1, '', '', '', 1006, 1000, 1100, 0, 1, '', 0, 0),
(22, 1018, 'lelise', 'menberu', 'kitila', '', '', '', '', '', '', '2', '09/25/1997', '08/13/2020', 1, '', '', '', 1009, 1000, 1100, 0, 0, '', 0, 0),
(23, 1019, 'chala', 'gemechu', 'hundesa', '', '', '', '', '', '', '1', '08/10/1996', '08/14/2020', 2, '', '', '', 1002, 1000, 1101, 0, 1, '', 0, 0),
(24, 1020, 'weasd', 'asdasd', 'asdasd', '', '', '', '', '', '', '1', '08/31/2060', '08/11/2028', 2, '', '', '', 1002, 1000, 1101, 0, 0, '', 0, 0),
(25, 1021, 'sdf', 'sdf', 'sdfdfgd', '', '', '', '', '', '', '2', '06/9/2010', '08/8/2010', 1, '', '', '', 1005, 1001, 1101, 0, 0, '', 0, 0),
(26, 1022, 'seconded', 'asfsd', 'sdfsdf', '', '', '', '', '', '', '1', '01/13/2072', '01/12/2042', 1, '', '', '', 1002, 1000, 1101, 1, 0, 'O-', 13, 0),
(27, 1023, 'abebeb', 'kebede', 'terefe', '', '', '', '', '', '', '1', '05/17/1991', '08/15/2020', 2, '', '', '', 1002, 1001, 1101, 0, 0, 'B+', 13, 0),
(28, 1024, 'moges', 'kifle', 'chasa', '', '', '', '', '', '', '1', '08/11/1988', '08/16/2020', 1, '', '', '', 1004, 1000, 1101, 0, 0, 'AB+', 10, 0),
(33, 1025, 'nasdfsa', 'gdfgdf', 'tyrtf', '', '', '', '', '', '', '1', '08/11/2022', '08/17/2020', 1, '', '', '', 1001, 1001, 1100, 0, 0, 'A-', 4, 0),
(34, 1026, 'samuel', 'firew', '', '', '', '', '', '', '', '1', '10/11/1997', '08/18/2020', 2, '', '', '', 1007, 1000, 1101, 0, 0, 'A+', 15, 0),
(35, 1027, 'geme', 'fantahun', 'mosisa', '', '', '', '', '', '', '1', '07/9/1991', '08/22/2020', 1, '', '', '', 1004, 1000, 1101, 1, 1, 'A-', 13, 1001);

-- --------------------------------------------------------

--
-- Table structure for table `student_address`
--

CREATE TABLE `student_address` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nationality` varchar(300) NOT NULL,
  `region` varchar(300) NOT NULL,
  `zone` varchar(300) NOT NULL,
  `woreda` varchar(300) NOT NULL,
  `kebele` varchar(300) NOT NULL,
  `house_no` varchar(300) NOT NULL,
  `home_phone` varchar(300) NOT NULL,
  `office_phone` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL,
  `fax` varchar(300) NOT NULL,
  `pobox` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_address`
--

INSERT INTO `student_address` (`t_id`, `id`, `nationality`, `region`, `zone`, `woreda`, `kebele`, `house_no`, `home_phone`, `office_phone`, `phone`, `fax`, `pobox`, `email`, `editor`) VALUES
(1, 1000, '', '', '', '', '', '', '', '', '', '', '', '', 1614),
(2, 1000, '', '', '', '', '', '', '', '', '', '', '', '', 1614),
(3, 1000, '', '', '', '', '', '', '', '', '', '', '', '', 1614),
(4, 1000, '', '', '', '', '', '', '', '', '', '', '', '', 1614),
(5, 1001, 'asd', '1', '', '', '', '', '', '', '', '', '', '', 1100),
(6, 1002, '', '', '', '', '', '', '', '', '', '', '', '', 1100),
(7, 1003, '', '', '', '', '', '', '', '', '', '', '', '', 1100),
(8, 1004, '', '', '', '', '', '', '', '', '', '', '', '', 1100),
(9, 1005, '', '', '', '', '', '', '', '', '', '', '', '', 1100),
(10, 1006, '', '', '', '', '', '', '', '', '', '', '', '', 1100),
(11, 1007, '', '', '', '', '', '', '', '', '', '', '', '', 1100),
(12, 1008, '', '', '', '', '', '', '', '', '', '', '', '', 1100),
(13, 1009, '', '', '', '', '', '', '', '', '', '', '', '', 1100),
(14, 1010, '', '1', 'jimma', '', '', '', '', '', '', '', '', '', 1100),
(15, 1011, '', '3', 'karama', '', '', '', '', '', '', '', '', '', 1100),
(16, 1012, '', '', '', '', '', '', '', '', '', '', '', '', 0),
(17, 1013, '', '', '', '', '', '', '', '', '', '', '', '', 0),
(18, 1014, 'dfgdf', '2', 'dfg', 'dfg', 'df', 'dfg', '', '', '', '', '', '', 1100),
(19, 1015, 'ethiopian', '1', 'jimma', 'jimma', 'bosa kito', '', '', '', '09 3215 4879', '', '', '', 1100),
(20, 1016, '', '', '', '', '', '', '', '', '', '', '', '', 0),
(21, 1017, 'ethipian', '7', 'jimma', 'jimma', 'bosa', '325', '047 111 2365', '', '09 3154 6959', '', '', '', 1100),
(22, 1018, 'ethiopian', '1', 'jimma', 'jimma', 'bosa', '', '', '', '09 3254 0541', '', '', '', 1100),
(23, 1019, 'ethiopian', '1', 'asd', 'fgdfg', 'dfg', '', '', '', '', '', '', '', 1101),
(24, 1020, 'asda', '8', 'asda', 'asd', 'asd', '', '', '', '10 8451 2005', '', '', '', 1101),
(25, 1021, 'ethiopian', '2', 'bnmbnmnmc', 'xcvxcv', 'vbcvb', '', '', '', '', '', '', '', 1101),
(26, 1022, 'ethiopian ', '2', 'cvb', 'chefe', 'bcvb', '', '', '', '', '', '', '', 1101),
(27, 1023, 'Ethiopian', '1', 'jimma', 'serbo', '', '', '', '', '09 5215 5555', '', '', 'abebe@gmail.com', 1101),
(28, 1024, 'Ethiopian', '4', 'jimma', '', '', '', '', '', '09 5645 1255', '', '', '', 1101),
(33, 1025, 'Ethiopian', '2', 'amhara', '', '', '', '', '', '02 1510 2065', '', '', '', 1100),
(34, 1026, 'Ethiopian', '1', 'jimma', '', '', '', '', '', '02 1512 5255', '', '', '', 1101),
(35, 1027, 'Ethiopian', '1', 'jimma', 'jimma', 'bosa', '', '', '', '01 5412 1510', '', '', '', 1101);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendace`
--

CREATE TABLE `student_attendace` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `att_date` varchar(300) NOT NULL,
  `att_path` varchar(300) NOT NULL,
  `att_type` int(11) NOT NULL,
  `row_no` varchar(300) NOT NULL,
  `editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE `student_fee` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `amount` varchar(300) NOT NULL,
  `recipt_no` varchar(300) NOT NULL,
  `bank_name` varchar(300) NOT NULL,
  `date_paid` varchar(300) NOT NULL,
  `dr` varchar(300) NOT NULL,
  `editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`t_id`, `id`, `amount`, `recipt_no`, `bank_name`, `date_paid`, `dr`, `editor`) VALUES
(1, 1017, '5500', '2614551218', '1', '08/9/2020', '08/09/2020', 1100),
(2, 1017, '5500', '4512155632', '1', '08/11/2020', '08/09/2020', 1100),
(3, 1016, '5500', '81521354165', '1', '08/10/2020', '08/10/2020', 1100),
(4, 1008, '5500', '81521354165', '1', '08/10/2020', '08/10/2020', 1100),
(5, 1009, '5500', '81521354165', '1', '08/10/2020', '08/10/2020', 1100),
(6, 1008, '5500', '81521354165', '1', '08/10/2020', '08/10/2020', 1100),
(7, 1009, '5500', '81521354165', '1', '08/10/2020', '08/10/2020', 1100),
(8, 1016, '4500', '415321104202102', '1', '08/11/2020', '08/12/2020', 1100),
(9, 1000, '5000', '23032100453015', '2', '08/10/2020', '08/12/2020', 1100),
(10, 1010, '5300', '4512045120', '1', '08/10/2020', '08/12/2020', 1100),
(11, 1010, '5000', '5121032054132', '2', '08/9/2020', '08/12/2020', 1100),
(12, 1010, '700', '454845321354132', '1', '08/11/2020', '08/12/2020', 1100),
(13, 1022, '5500', '874513513202', '1', '08/14/2020', '08/14/2020', 1101),
(14, 1023, '5500', '80120230510200', '1', '11/2/2009', '08/15/2020', 1101),
(15, 1019, '11000', '5021652006520', '1', '08/14/2020', '08/15/2020', 1101),
(16, 1021, '5500', '550142502050', '1', '08/16/2020', '08/16/2020', 1101),
(17, 1021, '5500', '5051040654', '1', '06/19/2020', '08/16/2020', 1101),
(18, 1023, '4500', '51202106512', '1', '07/9/2060', '08/17/2020', 1100),
(19, 1027, '5500', '1215121350221', '2', '08/23/2020', '08/23/2020', 1100),
(20, 1026, '4500', '875465121218515', '1', '08/21/2020', '08/23/2020', 1100),
(21, 1026, '400', 'jhjbjh,hg210', '1', '02/12/2009', '01/22/2021', 1100);

-- --------------------------------------------------------

--
-- Table structure for table `student_file`
--

CREATE TABLE `student_file` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `pasport` varchar(300) NOT NULL,
  `med_file` varchar(300) NOT NULL,
  `edu` varchar(300) NOT NULL,
  `trans` varchar(300) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `f_data` varchar(300) NOT NULL,
  `editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_file`
--

INSERT INTO `student_file` (`t_id`, `id`, `pasport`, `med_file`, `edu`, `trans`, `photo`, `f_data`, `editor`) VALUES
(1, 1000, '', '', '', '', '', 'sada', 0),
(2, 1002, '', 'File_07082020_635016_beautiful_2.png', 'File_07082020_326176_beautiful_3.png', 'File_07082020_629954_beautiful_4.png', 'File_07082020_577773_beautiful_5.png', '08/07/2020', 0),
(4, 1000, '', '', '', '', '', '', 0),
(5, 1000, '', '', '', '', '', '', 0),
(6, 1001, 'File_07082020_445707_beautiful_2.png', 'File_07082020_763126_beautiful_5.png', 'File_07082020_114141_beautiful_4.png', 'File_07082020_689460_beautiful_8.png', 'File_07082020_714965_beautiful_7.png', '08/07/2020', 0),
(7, 1002, '', '', '', '', '', '', 0),
(8, 1003, 'File_08072020_676573_beautiful_6.png', 'File_08072020_454497_', 'File_08072020_558472_', 'File_08072020_120269_', 'File_08072020_770789_', '08/07/2020', 0),
(9, 1004, 'File_08072020_240627_', 'File_08072020_746411_', 'File_08072020_416368_', 'File_08072020_828764_', 'File_08072020_608673_', '08/07/2020', 0),
(10, 1005, 'File_08072020_194243_', 'File_08072020_817326_', 'File_08072020_932776_', 'File_08072020_660617_', 'File_08072020_797806_', '08/07/2020', 0),
(11, 1006, 'File_08072020_162440_', 'File_08072020_137181_', 'File_08072020_669934_', 'File_08072020_682748_', 'File_08072020_267565_', '08/07/2020', 0),
(12, 1007, 'File_08072020_591637_', 'File_08072020_286722_', 'File_08072020_877428_', 'File_08072020_156537_', 'File_08072020_492951_', '08/07/2020', 0),
(13, 1008, 'File_08072020_737562_', 'File_08072020_922106_', 'File_08072020_925818_', 'File_08072020_879985_', 'File_08072020_505754_', '08/07/2020', 0),
(14, 1009, 'File_08072020_486157_', 'File_08072020_599340_', 'File_08072020_182818_', 'File_08072020_316698_', 'File_08072020_863940_', '08/07/2020', 1100),
(15, 1010, 'File_08082020_874508_', 'File_08082020_274756_', 'File_08082020_150137_', 'File_08082020_280858_', 'File_08082020_702490_', '08/08/2020', 1100),
(16, 1011, 'File_08082020_333518_beautiful_8.png', 'File_08082020_390679_', 'File_08082020_227526_', 'File_08082020_530730_', 'File_08082020_298242_', '08/08/2020', 1100),
(17, 1012, '', '', '', '', '', '', 0),
(18, 1013, '', '', '', '', '', '', 0),
(19, 1014, 'File_08082020_311079_beautiful_3.png', 'File_08082020_994813_', 'File_08082020_949211_', 'File_08082020_279168_', 'File_08082020_220651_', '08/08/2020', 1100),
(20, 1015, 'File_08082020_613153_', 'File_08082020_196254_', 'File_08082020_995296_', 'File_08082020_375519_', 'File_08152020_850400_Bullet-Camera.jpg', '08/08/2020', 1101),
(21, 1016, '', '', '', '', '', '', 0),
(22, 1017, 'File_08082020_773757_beautiful_2.png', 'File_08082020_536816_', 'File_08082020_108838_', 'File_08082020_436459_', 'File_08082020_121836_beautiful_9.png', '08/08/2020', 1100),
(23, 1018, 'File_08132020_695449_', 'File_08132020_928886_', 'File_08132020_828104_', 'File_08132020_201173_', 'File_08132020_699550_Bullet-Camera.jpg', '08/13/2020', 1100),
(24, 1019, 'File_08142020_765148_', 'File_08142020_531386_', 'File_08142020_165326_Bullet-Camera.jpg', 'File_08142020_266410_', 'File_08142020_706554_', '08/14/2020', 1101),
(25, 1020, 'File_08142020_536128_', 'File_08142020_363087_', 'File_08142020_978009_', 'File_08142020_282998_Bullet-Camera.jpg', 'File_08142020_615495_', '08/14/2020', 1101),
(26, 1021, 'File_08142020_193945_', 'File_08142020_235324_', 'File_08142020_866246_', 'File_08142020_570027_', 'File_08142020_901697_', '08/14/2020', 1101),
(27, 1022, 'File_08142020_582790_Bullet-Camera.jpg', 'File_08142020_568219_', 'File_08142020_532007_Bullet-Camera.jpg', 'File_08142020_553954_Bullet-Camera.jpg', 'File_08142020_144075_', '08/14/2020', 1101),
(28, 1023, '', '', 'File_08152020_659115_Bullet-Camera.jpg', '', 'File_08162020_854596_Bullet-Camera.jpg', '08/16/2020', 1101),
(29, 1024, '', '', '', 'File_08162020_840576_Bullet-Camera.jpg', '', '08/16/2020', 1101),
(35, 1025, 'pasport_08172020_5f3ab4f775ede_photo_2020-04-20_21-51-18.jpg', '', '', '', 'Photo_08172020_5f3ab49cbc63c.jpg', '08/17/2020', 1100),
(36, 1026, 'File_08222020_813245_beautiful_1.png', 'File_08222020_970410_beautiful_6.png', 'File_08222020_966699_beautiful_2.png', 'File_08222020_256811_beautiful_8.png', 'Photo_08182020_5f3bdd9725cea.jpg', '08/18/2020', 1101),
(37, 1027, 'pasport_08222020_5f41616888778_beautiful_7.png', 'med_file_08222020_5f416168be26e_beautiful_8.png', '', 'trans_08222020_5f416168def70_beautiful_9.png', '', '08/22/2020', 1101);

-- --------------------------------------------------------

--
-- Table structure for table `student_stat`
--

CREATE TABLE `student_stat` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `c_type` varchar(300) NOT NULL,
  `n_class` varchar(300) NOT NULL,
  `stat` int(11) NOT NULL,
  `comp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_stat`
--

INSERT INTO `student_stat` (`t_id`, `id`, `c_type`, `n_class`, `stat`, `comp`) VALUES
(1, 1002, '1000', '25', 0, 0),
(4, 1011, '1001', '20', 0, 0),
(6, 1019, '1001', '10', 0, 0),
(7, 1020, '1001', '20', 0, 0),
(8, 1022, '1000', '30', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `t_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `tsd` varchar(300) NOT NULL,
  `ted` varchar(300) NOT NULL,
  `license_t` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `date` varchar(300) NOT NULL,
  `comp` int(11) NOT NULL,
  `editor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`t_id`, `id`, `name`, `tsd`, `ted`, `license_t`, `stat`, `date`, `comp`, `editor`) VALUES
(1, 1000, 'kebad', '02/15/2019', '05/15/2019', 1000, 1, '02/15/2019', 0, 1101),
(2, 1001, 'kebad', '02/15/2019', '05/15/2019', 1001, 1, '02/15/2019', 0, 1101),
(3, 1002, 'term 7', '07/24/2020', '09/07/2020', 1000, 0, '08/08/2020', 0, 1100),
(4, 1003, 'term 4', '06/20/2020', '09/5/2020', 1001, 0, '08/08/2020', 0, 1100),
(5, 1004, 'term 6', '04/21/2011', '08/15/2011', 1000, 1, '08/08/2020', 0, 1101),
(6, 1005, 'term 9', '06/29/2020', '08/16/2020', 1001, 0, '08/08/2020', 1, 1101),
(7, 1006, 'term 8', '07/29/2020', '09/14/2020', 1000, 0, '08/08/2020', 0, 1100),
(8, 1007, 'term 15', '12/15/2019', '12/14/2021', 1000, 1, '08/08/2020', 0, 1100),
(9, 1008, 'term 11', '08/14/2020', '09/29/2020', 1000, 0, '08/08/2020', 0, 1101),
(10, 1009, 'term 12', '10/14/2000', '12/13/1988', 1000, 1, '08/08/2020', 1, 1100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `car_file`
--
ALTER TABLE `car_file`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `car_maint`
--
ALTER TABLE `car_maint`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `car_petrol`
--
ALTER TABLE `car_petrol`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `class_type`
--
ALTER TABLE `class_type`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `employee_file`
--
ALTER TABLE `employee_file`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `employe_action`
--
ALTER TABLE `employe_action`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `student_address`
--
ALTER TABLE `student_address`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `student_attendace`
--
ALTER TABLE `student_attendace`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `student_file`
--
ALTER TABLE `student_file`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `student_stat`
--
ALTER TABLE `student_stat`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car_file`
--
ALTER TABLE `car_file`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car_maint`
--
ALTER TABLE `car_maint`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `car_petrol`
--
ALTER TABLE `car_petrol`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_type`
--
ALTER TABLE `class_type`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_file`
--
ALTER TABLE `employee_file`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employe_action`
--
ALTER TABLE `employe_action`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `student_address`
--
ALTER TABLE `student_address`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `student_attendace`
--
ALTER TABLE `student_attendace`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student_file`
--
ALTER TABLE `student_file`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `student_stat`
--
ALTER TABLE `student_stat`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
