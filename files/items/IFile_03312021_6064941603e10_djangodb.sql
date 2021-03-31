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
-- Database: `djangodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_useraccount`
--

CREATE TABLE `account_useraccount` (
  `id` int(11) NOT NULL,
  `password` varchar(128) NOT NULL,
  `last_login` datetime(6) DEFAULT NULL,
  `is_superuser` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `date` datetime(6) NOT NULL,
  `is_staff` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_useraccount`
--

INSERT INTO `account_useraccount` (`id`, `password`, `last_login`, `is_superuser`, `email`, `fullname`, `isActive`, `date`, `is_staff`) VALUES
(1, 'pbkdf2_sha256$216000$V7gffjLg4UOB$DngKNQCa1+c1O3bbKDa8qlTV73Se88Uuz40bYaupL+8=', NULL, 0, 'dani@gmail.com', 'daniel bogale', 1, '2020-12-04 13:45:59.759981', 0),
(2, 'pbkdf2_sha256$216000$T1zVB683Yv3c$BQp/Cfi/D7kxriMMRvMzAMGh4KekVLGpNDosa8PtaYs=', '2020-12-04 13:50:29.630006', 1, 'gugu@gmail.com', 'nafiyad', 1, '2020-12-04 13:49:31.341531', 1);

-- --------------------------------------------------------

--
-- Table structure for table `account_useraccount_groups`
--

CREATE TABLE `account_useraccount_groups` (
  `id` int(11) NOT NULL,
  `useraccount_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `account_useraccount_user_permissions`
--

CREATE TABLE `account_useraccount_user_permissions` (
  `id` int(11) NOT NULL,
  `useraccount_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_group`
--

CREATE TABLE `auth_group` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_group_permissions`
--

CREATE TABLE `auth_group_permissions` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `auth_permission`
--

CREATE TABLE `auth_permission` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content_type_id` int(11) NOT NULL,
  `codename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_permission`
--

INSERT INTO `auth_permission` (`id`, `name`, `content_type_id`, `codename`) VALUES
(1, 'Can add log entry', 1, 'add_logentry'),
(2, 'Can change log entry', 1, 'change_logentry'),
(3, 'Can delete log entry', 1, 'delete_logentry'),
(4, 'Can view log entry', 1, 'view_logentry'),
(5, 'Can add permission', 2, 'add_permission'),
(6, 'Can change permission', 2, 'change_permission'),
(7, 'Can delete permission', 2, 'delete_permission'),
(8, 'Can view permission', 2, 'view_permission'),
(9, 'Can add group', 3, 'add_group'),
(10, 'Can change group', 3, 'change_group'),
(11, 'Can delete group', 3, 'delete_group'),
(12, 'Can view group', 3, 'view_group'),
(13, 'Can add content type', 4, 'add_contenttype'),
(14, 'Can change content type', 4, 'change_contenttype'),
(15, 'Can delete content type', 4, 'delete_contenttype'),
(16, 'Can view content type', 4, 'view_contenttype'),
(17, 'Can add session', 5, 'add_session'),
(18, 'Can change session', 5, 'change_session'),
(19, 'Can delete session', 5, 'delete_session'),
(20, 'Can view session', 5, 'view_session'),
(21, 'Can add user account', 6, 'add_useraccount'),
(22, 'Can change user account', 6, 'change_useraccount'),
(23, 'Can delete user account', 6, 'delete_useraccount'),
(24, 'Can view user account', 6, 'view_useraccount'),
(25, 'Can add expense group', 7, 'add_expensegroup'),
(26, 'Can change expense group', 7, 'change_expensegroup'),
(27, 'Can delete expense group', 7, 'delete_expensegroup'),
(28, 'Can view expense group', 7, 'view_expensegroup'),
(29, 'Can add expense detail', 8, 'add_expensedetail'),
(30, 'Can change expense detail', 8, 'change_expensedetail'),
(31, 'Can delete expense detail', 8, 'delete_expensedetail'),
(32, 'Can view expense detail', 8, 'view_expensedetail'),
(33, 'Can add loan group', 9, 'add_loangroup'),
(34, 'Can change loan group', 9, 'change_loangroup'),
(35, 'Can delete loan group', 9, 'delete_loangroup'),
(36, 'Can view loan group', 9, 'view_loangroup'),
(37, 'Can add loan detail', 10, 'add_loandetail'),
(38, 'Can change loan detail', 10, 'change_loandetail'),
(39, 'Can delete loan detail', 10, 'delete_loandetail'),
(40, 'Can view loan detail', 10, 'view_loandetail');

-- --------------------------------------------------------

--
-- Table structure for table `django_admin_log`
--

CREATE TABLE `django_admin_log` (
  `id` int(11) NOT NULL,
  `action_time` datetime(6) NOT NULL,
  `object_id` longtext DEFAULT NULL,
  `object_repr` varchar(200) NOT NULL,
  `action_flag` smallint(5) UNSIGNED NOT NULL CHECK (`action_flag` >= 0),
  `change_message` longtext NOT NULL,
  `content_type_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `django_admin_log`
--

INSERT INTO `django_admin_log` (`id`, `action_time`, `object_id`, `object_repr`, `action_flag`, `change_message`, `content_type_id`, `user_id`) VALUES
(1, '2020-12-04 14:42:26.355087', '2', 'hedar', 1, '[{\"added\": {}}]', 7, 2),
(2, '2020-12-04 14:42:46.090490', '2', 'danny', 1, '[{\"added\": {}}]', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `django_content_type`
--

CREATE TABLE `django_content_type` (
  `id` int(11) NOT NULL,
  `app_label` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `django_content_type`
--

INSERT INTO `django_content_type` (`id`, `app_label`, `model`) VALUES
(6, 'account', 'useraccount'),
(1, 'admin', 'logentry'),
(3, 'auth', 'group'),
(2, 'auth', 'permission'),
(4, 'contenttypes', 'contenttype'),
(8, 'expense', 'expensedetail'),
(7, 'expense', 'expensegroup'),
(10, 'loan', 'loandetail'),
(9, 'loan', 'loangroup'),
(5, 'sessions', 'session');

-- --------------------------------------------------------

--
-- Table structure for table `django_migrations`
--

CREATE TABLE `django_migrations` (
  `id` int(11) NOT NULL,
  `app` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `applied` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `django_migrations`
--

INSERT INTO `django_migrations` (`id`, `app`, `name`, `applied`) VALUES
(1, 'contenttypes', '0001_initial', '2020-12-04 13:32:11.494959'),
(2, 'contenttypes', '0002_remove_content_type_name', '2020-12-04 13:32:13.677963'),
(3, 'auth', '0001_initial', '2020-12-04 13:32:16.667397'),
(4, 'auth', '0002_alter_permission_name_max_length', '2020-12-04 13:32:39.830289'),
(5, 'auth', '0003_alter_user_email_max_length', '2020-12-04 13:32:41.729027'),
(6, 'auth', '0004_alter_user_username_opts', '2020-12-04 13:32:42.561381'),
(7, 'auth', '0005_alter_user_last_login_null', '2020-12-04 13:32:43.480382'),
(8, 'auth', '0006_require_contenttypes_0002', '2020-12-04 13:32:44.448415'),
(9, 'auth', '0007_alter_validators_add_error_messages', '2020-12-04 13:32:45.189865'),
(10, 'auth', '0008_alter_user_username_max_length', '2020-12-04 13:32:45.543759'),
(11, 'auth', '0009_alter_user_last_name_max_length', '2020-12-04 13:32:45.628016'),
(12, 'auth', '0010_alter_group_name_max_length', '2020-12-04 13:32:46.013143'),
(13, 'auth', '0011_update_proxy_permissions', '2020-12-04 13:32:46.152519'),
(14, 'auth', '0012_alter_user_first_name_max_length', '2020-12-04 13:32:46.370814'),
(15, 'account', '0001_initial', '2020-12-04 13:32:51.781611'),
(16, 'admin', '0001_initial', '2020-12-04 13:33:08.080827'),
(17, 'admin', '0002_logentry_remove_auto_add', '2020-12-04 13:33:13.469369'),
(18, 'admin', '0003_logentry_add_action_flag_choices', '2020-12-04 13:33:13.605221'),
(19, 'expense', '0001_initial', '2020-12-04 13:33:15.508618'),
(20, 'loan', '0001_initial', '2020-12-04 13:33:25.557702'),
(21, 'sessions', '0001_initial', '2020-12-04 13:33:31.682025');

-- --------------------------------------------------------

--
-- Table structure for table `django_session`
--

CREATE TABLE `django_session` (
  `session_key` varchar(40) NOT NULL,
  `session_data` longtext NOT NULL,
  `expire_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `django_session`
--

INSERT INTO `django_session` (`session_key`, `session_data`, `expire_date`) VALUES
('vznn5wbqxdy6c2yqp5sk8w8z76f7x27n', '.eJxVjEEOwiAQAP_C2ZDCUqgevfsGsssuUjUlKe3J-HdD0oNeZybzVhH3rcS9yRpnVhdl1emXEaanLF3wA5d71aku2zqT7ok-bNO3yvK6Hu3foGArfYuIgyHrIQ3gM4HHFLIQgcFpFOuSF2eZPbFHZ5DTlC1BCOBGknNWny8CfjjW:1klBTh:4z7z8F-vyaFTcgkpvwmzOOjgNGq9f4EUfRbnXNS7NXo', '2020-12-18 13:50:29.798127');

-- --------------------------------------------------------

--
-- Table structure for table `expense_expensedetail`
--

CREATE TABLE `expense_expensedetail` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `discription` varchar(500) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime(6) NOT NULL,
  `groupID_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_expensedetail`
--

INSERT INTO `expense_expensedetail` (`id`, `title`, `discription`, `amount`, `date`, `groupID_id`) VALUES
(1, 'koket', 'erat birr', 27, '2020-12-04 14:34:40.433000', 1),
(2, 'danny', 'ye mesa birr', 25, '2020-12-04 14:42:46.039549', 2);

-- --------------------------------------------------------

--
-- Table structure for table `expense_expensegroup`
--

CREATE TABLE `expense_expensegroup` (
  `id` int(11) NOT NULL,
  `groupID` varchar(8) NOT NULL,
  `title` varchar(20) NOT NULL,
  `discription` varchar(500) NOT NULL,
  `date` datetime(6) NOT NULL,
  `userID_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expense_expensegroup`
--

INSERT INTO `expense_expensegroup` (`id`, `groupID`, `title`, `discription`, `date`, `userID_id`) VALUES
(1, 'PhdSOS', 'tahsas', 'ye tahsas wer', '2020-12-04 13:51:44.277634', 1),
(2, 'GeDHCg', 'hedar', 'ye hedar wer', '2020-12-04 14:42:26.093935', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loan_loandetail`
--

CREATE TABLE `loan_loandetail` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `discription` varchar(500) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` datetime(6) NOT NULL,
  `groupID_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `loan_loangroup`
--

CREATE TABLE `loan_loangroup` (
  `id` int(11) NOT NULL,
  `groupID` varchar(8) NOT NULL,
  `title` varchar(20) NOT NULL,
  `discription` varchar(500) NOT NULL,
  `date` datetime(6) NOT NULL,
  `userID_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_useraccount`
--
ALTER TABLE `account_useraccount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `account_useraccount_groups`
--
ALTER TABLE `account_useraccount_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_useraccount_groups_useraccount_id_group_id_72d6c006_uniq` (`useraccount_id`,`group_id`),
  ADD KEY `account_useraccount_groups_group_id_a0617fdc_fk_auth_group_id` (`group_id`);

--
-- Indexes for table `account_useraccount_user_permissions`
--
ALTER TABLE `account_useraccount_user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_useraccount_user_useraccount_id_permissio_8d59a399_uniq` (`useraccount_id`,`permission_id`),
  ADD KEY `account_useraccount__permission_id_1886a490_fk_auth_perm` (`permission_id`);

--
-- Indexes for table `auth_group`
--
ALTER TABLE `auth_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_group_permissions_group_id_permission_id_0cd325b0_uniq` (`group_id`,`permission_id`),
  ADD KEY `auth_group_permissio_permission_id_84c5c92e_fk_auth_perm` (`permission_id`);

--
-- Indexes for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_permission_content_type_id_codename_01ab375a_uniq` (`content_type_id`,`codename`);

--
-- Indexes for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `django_admin_log_content_type_id_c4bce8eb_fk_django_co` (`content_type_id`),
  ADD KEY `django_admin_log_user_id_c564eba6_fk_account_useraccount_id` (`user_id`);

--
-- Indexes for table `django_content_type`
--
ALTER TABLE `django_content_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `django_content_type_app_label_model_76bd3d3b_uniq` (`app_label`,`model`);

--
-- Indexes for table `django_migrations`
--
ALTER TABLE `django_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `django_session`
--
ALTER TABLE `django_session`
  ADD PRIMARY KEY (`session_key`),
  ADD KEY `django_session_expire_date_a5c62663` (`expire_date`);

--
-- Indexes for table `expense_expensedetail`
--
ALTER TABLE `expense_expensedetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_expensedetai_groupID_id_a3faf16d_fk_expense_e` (`groupID_id`);

--
-- Indexes for table `expense_expensegroup`
--
ALTER TABLE `expense_expensegroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expense_expensegroup_userID_id_95b748d1_fk_account_u` (`userID_id`);

--
-- Indexes for table `loan_loandetail`
--
ALTER TABLE `loan_loandetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_loandetail_groupID_id_ced39eb6_fk_loan_loangroup_id` (`groupID_id`);

--
-- Indexes for table `loan_loangroup`
--
ALTER TABLE `loan_loangroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loan_loangroup_userID_id_f413afa1_fk_account_useraccount_id` (`userID_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_useraccount`
--
ALTER TABLE `account_useraccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_useraccount_groups`
--
ALTER TABLE `account_useraccount_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_useraccount_user_permissions`
--
ALTER TABLE `account_useraccount_user_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_group`
--
ALTER TABLE `auth_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_permission`
--
ALTER TABLE `auth_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `django_content_type`
--
ALTER TABLE `django_content_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `django_migrations`
--
ALTER TABLE `django_migrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `expense_expensedetail`
--
ALTER TABLE `expense_expensedetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense_expensegroup`
--
ALTER TABLE `expense_expensegroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loan_loandetail`
--
ALTER TABLE `loan_loandetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_loangroup`
--
ALTER TABLE `loan_loangroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_useraccount_groups`
--
ALTER TABLE `account_useraccount_groups`
  ADD CONSTRAINT `account_useraccount__useraccount_id_40d627d7_fk_account_u` FOREIGN KEY (`useraccount_id`) REFERENCES `account_useraccount` (`id`),
  ADD CONSTRAINT `account_useraccount_groups_group_id_a0617fdc_fk_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`);

--
-- Constraints for table `account_useraccount_user_permissions`
--
ALTER TABLE `account_useraccount_user_permissions`
  ADD CONSTRAINT `account_useraccount__permission_id_1886a490_fk_auth_perm` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`),
  ADD CONSTRAINT `account_useraccount__useraccount_id_a9b5c8df_fk_account_u` FOREIGN KEY (`useraccount_id`) REFERENCES `account_useraccount` (`id`);

--
-- Constraints for table `auth_group_permissions`
--
ALTER TABLE `auth_group_permissions`
  ADD CONSTRAINT `auth_group_permissio_permission_id_84c5c92e_fk_auth_perm` FOREIGN KEY (`permission_id`) REFERENCES `auth_permission` (`id`),
  ADD CONSTRAINT `auth_group_permissions_group_id_b120cbf9_fk_auth_group_id` FOREIGN KEY (`group_id`) REFERENCES `auth_group` (`id`);

--
-- Constraints for table `auth_permission`
--
ALTER TABLE `auth_permission`
  ADD CONSTRAINT `auth_permission_content_type_id_2f476e4b_fk_django_co` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`);

--
-- Constraints for table `django_admin_log`
--
ALTER TABLE `django_admin_log`
  ADD CONSTRAINT `django_admin_log_content_type_id_c4bce8eb_fk_django_co` FOREIGN KEY (`content_type_id`) REFERENCES `django_content_type` (`id`),
  ADD CONSTRAINT `django_admin_log_user_id_c564eba6_fk_account_useraccount_id` FOREIGN KEY (`user_id`) REFERENCES `account_useraccount` (`id`);

--
-- Constraints for table `expense_expensedetail`
--
ALTER TABLE `expense_expensedetail`
  ADD CONSTRAINT `expense_expensedetai_groupID_id_a3faf16d_fk_expense_e` FOREIGN KEY (`groupID_id`) REFERENCES `expense_expensegroup` (`id`);

--
-- Constraints for table `expense_expensegroup`
--
ALTER TABLE `expense_expensegroup`
  ADD CONSTRAINT `expense_expensegroup_userID_id_95b748d1_fk_account_u` FOREIGN KEY (`userID_id`) REFERENCES `account_useraccount` (`id`);

--
-- Constraints for table `loan_loandetail`
--
ALTER TABLE `loan_loandetail`
  ADD CONSTRAINT `loan_loandetail_groupID_id_ced39eb6_fk_loan_loangroup_id` FOREIGN KEY (`groupID_id`) REFERENCES `loan_loangroup` (`id`);

--
-- Constraints for table `loan_loangroup`
--
ALTER TABLE `loan_loangroup`
  ADD CONSTRAINT `loan_loangroup_userID_id_f413afa1_fk_account_useraccount_id` FOREIGN KEY (`userID_id`) REFERENCES `account_useraccount` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
