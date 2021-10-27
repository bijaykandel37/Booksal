-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2019 at 12:58 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booksalfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `booking_id` int(11) NOT NULL,
  `futsal_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`booking_id`, `futsal_id`, `user_id`, `time`, `date`) VALUES
(69, 19, 1, '01:00:00', '2019-07-23'),
(71, 19, 1, '12:00:00', '2019-07-30'),
(72, 18, 1, '12:00:00', '2019-07-30'),
(73, 20, 1, '12:00:00', '2019-07-30'),
(74, 18, 1, '05:00:00', '2019-07-31'),
(75, 20, 1, '08:00:00', '2019-07-29');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `futsal_id` int(11) DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentid`, `username`, `futsal_id`, `comments`) VALUES
(207, 'bijay', 22, 'this is actually ogoog\r\n'),
(208, 'bijay', 22, 'hahahaha'),
(209, 'bijay', 22, 'hahahaha'),
(210, 'bijay', 19, 'maths and mates are good\r\n'),
(211, 'bijay', 19, 'note it\r\n'),
(212, 'dipesh', 19, 'paney\r\n'),
(213, 'Darsan', 19, 'darsan\r\n'),
(214, 'Darsan', 19, 'darsan\r\n'),
(215, 'Darsan', 19, 'darsan\r\n'),
(216, 'bijay', 22, 'asjfsa');

-- --------------------------------------------------------

--
-- Table structure for table `futsals`
--

CREATE TABLE `futsals` (
  `futsal_id` int(100) NOT NULL,
  `PANNo` int(100) NOT NULL,
  `futsal_name` varchar(255) NOT NULL,
  `futsal_rate` int(100) NOT NULL,
  `futsal_desc` text NOT NULL,
  `futsal_image` text NOT NULL,
  `futsal_keywords` text NOT NULL,
  `futsal_address` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `futsals`
--

INSERT INTO `futsals` (`futsal_id`, `PANNo`, `futsal_name`, `futsal_rate`, `futsal_desc`, `futsal_image`, `futsal_keywords`, `futsal_address`) VALUES
(18, 878787, 'Chaitya Futsal', 500, 'This is chaitya futsal yall, book fast and relax', '1563456230', 'chaitya,futsal, kalimati, kalanki', 'shantinagar'),
(19, 545656, 'Mates futsal', 700, 'situated at gaibachha pati,tahachal this futsal is also good', '1563514236', 'mates, futsal, gaibachha pati,tahachal', 'gaibachha pati, tahachal'),
(20, 547898, 'sunrise futsal', 700, 'this futsal is good too, you can play here till sunset too.', '1563514490', 'naya bato,dhobighat,lalitpur,sunrise,futsal', 'dhobighat,lalitpur'),
(22, 125454, 'tahachal', 878, 'no need to say anything', '1563617355', 'tahachal kalanki bafal futsal', 'tahachal kalanki'),
(23, 987456, 'United Futsal', 878, 'this is united futsal bitches', '1563617424', 'bafal united kalanki futsal', 'bafal');

-- --------------------------------------------------------

--
-- Table structure for table `owner_info`
--

CREATE TABLE `owner_info` (
  `owner_id` int(10) NOT NULL,
  `futsal_id` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` text NOT NULL,
  `contact` int(10) NOT NULL,
  `city` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner_info`
--

INSERT INTO `owner_info` (`owner_id`, `futsal_id`, `fname`, `lname`, `email`, `password`, `contact`, `city`) VALUES
(2, 18, 'Bijay', 'Kandel', 'bijaykandel11@gmail.com', 'bijaykandel', 2147483647, 'kathmandu'),
(7, 19, 'Darshan', 'Niroula', 'darsan@gmail.com', 'darsan123', 2147483647, 'Ktm'),
(8, 20, 'dipesh', 'paneru', 'dipesh@gmail.com', 'dipesh123', 2147483647, 'Pokhara'),
(9, 23, 'OWNER', 'One', 'owner1@gmail.com', 'owneerone123', 2147483647, 'kathmandu'),
(10, 22, 'OWNER', 'two', 'owner2@gmail.com', 'owner2two', 2147483647, 'kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(6) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(10) NOT NULL,
  `futsal_id` int(11) NOT NULL,
  `reservation_made_time` datetime NOT NULL,
  `reservation_year` smallint(4) NOT NULL,
  `reservation_week` tinyint(2) NOT NULL,
  `reservation_day` tinyint(1) NOT NULL,
  `reservation_time` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reservation_user_id` int(10) NOT NULL,
  `reservation_user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `reservation_user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `futsal_id`, `reservation_made_time`, `reservation_year`, `reservation_week`, `reservation_day`, `reservation_time`, `reservation_user_id`, `reservation_user_email`, `reservation_user_name`) VALUES
(57, 18, '2019-08-07 13:20:57', 2019, 32, 5, '09-10', 37, 'bijay@gmail.com', 'bijay'),
(70, 18, '2019-08-09 09:18:32', 2019, 32, 7, '11-12', 37, 'bijay@gmail.com', 'bijay'),
(10, 18, '2019-08-02 15:00:17', 2019, 31, 6, '10-11', 37, 'bijay@gmail.com', 'bijay'),
(7, 22, '2019-08-02 14:44:53', 2019, 31, 7, '09-10', 38, 'darsan@gmail.com', 'Darsan'),
(21, 18, '2019-08-03 18:38:37', 2019, 31, 6, '11-12', 37, 'bijay@gmail.com', 'bijay'),
(22, 18, '2019-08-03 18:38:40', 2019, 31, 7, '10-11', 37, 'bijay@gmail.com', 'bijay'),
(34, 19, '2019-08-06 10:28:47', 2019, 32, 4, '09-10', 37, 'bijay@gmail.com', 'bijay'),
(56, 19, '2019-08-06 21:41:39', 2019, 32, 7, '09-10', 37, 'bijay@gmail.com', 'bijay'),
(54, 19, '2019-08-06 21:40:45', 2019, 32, 5, '12-13', 37, 'bijay@gmail.com', 'bijay'),
(35, 19, '2019-08-06 10:32:12', 2019, 32, 3, '09-10', 37, 'bijay@gmail.com', 'bijay'),
(36, 19, '2019-08-06 10:33:18', 2019, 32, 6, '09-10', 37, 'bijay@gmail.com', 'bijay'),
(37, 19, '2019-08-06 10:37:50', 2019, 32, 6, '14-15', 38, 'darsan@gmail.com', 'Darsan'),
(72, 18, '2019-08-09 09:20:47', 2019, 32, 6, '10-11', 2, 'Blocked Time', 'Bijay'),
(41, 22, '2019-08-06 16:42:18', 2019, 32, 5, '09-10', 38, 'darsan@gmail.com', 'Darsan'),
(73, 18, '2019-08-09 09:20:52', 2019, 32, 6, '11-12', 2, 'Blocked Time', 'Bijay'),
(71, 18, '2019-08-09 09:20:46', 2019, 32, 6, '09-10', 2, 'Blocked Time', 'Bijay'),
(69, 18, '2019-08-08 18:45:20', 2019, 32, 5, '12-13', 2, 'Blocked Time', 'Bijay'),
(48, 18, '2019-08-06 19:23:31', 2019, 32, 5, '13-14', 0, '', 'Darsan'),
(58, 18, '2019-08-07 13:21:55', 2019, 32, 7, '09-10', 2, 'Blocked Time', 'Bijay'),
(53, 19, '2019-08-06 19:39:27', 2019, 32, 3, '11-12', 7, 'Blocked Time', 'Darshan'),
(61, 23, '2019-08-07 13:24:46', 2019, 32, 5, '09-10', 2, 'Blocked Time', 'Bijay'),
(62, 23, '2019-08-07 13:24:47', 2019, 32, 5, '10-11', 2, 'Blocked Time', 'Bijay'),
(66, 19, '2019-08-08 15:02:07', 2019, 32, 7, '14-15', 38, 'darsan@gmail.com', 'Darsan'),
(65, 19, '2019-08-07 15:40:13', 2019, 32, 6, '11-12', 2, 'Blocked Time', 'Bijay');

-- --------------------------------------------------------

--
-- Table structure for table `reservations_users`
--

CREATE TABLE `reservations_users` (
  `res_user_id` int(11) NOT NULL COMMENT 'AUTO_INCREMENT',
  `user_id` int(10) NOT NULL,
  `user_is_admin` tinyint(1) NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservations_users`
--

INSERT INTO `reservations_users` (`res_user_id`, `user_id`, `user_is_admin`, `user_email`, `user_name`) VALUES
(0, 37, 0, 'bijay@gmail.com', 'bijay'),
(0, 38, 0, 'darsan@gmail.com', 'Darsan'),
(0, 39, 0, 'dipesh@gmail.com', 'dipesh'),
(0, 40, 0, 'user1@gmail.com', 'user'),
(0, 10, 1, 'owner2@gmail.com', 'OWNER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `futsal_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `user_id`, `futsal_id`, `rating`, `timestamp`) VALUES
(30, 37, 19, 4, '2019-08-08 06:30:56'),
(32, 38, 22, 4, '2019-08-08 11:36:51'),
(33, 37, 20, 4, '2019-08-08 13:58:20'),
(34, 37, 18, 4, '2019-08-08 14:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `city` varchar(300) NOT NULL,
  `town` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `city`, `town`) VALUES
(37, 'bijay', 'kandel', 'bijay@gmail.com', 'bijaykandel', '8745478599', 'bhaktapur', 'kathmandu'),
(38, 'Darsan', 'Niroula', 'darsan@gmail.com', 'darsan123', '8745478599', 'bhaktapur', 'kathmandu'),
(39, 'dipesh', 'paneru', 'dipesh@gmail.com', 'dipesh123', '9817548126', 'sankhamul', 'kathmandu'),
(40, 'user', 'one', 'user1@gmail.com', 'userone123', '8877887789', 'kathmandu', 'kathmandu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `futsals`
--
ALTER TABLE `futsals`
  ADD PRIMARY KEY (`futsal_id`);

--
-- Indexes for table `owner_info`
--
ALTER TABLE `owner_info`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `reservations_users`
--
ALTER TABLE `reservations_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `futsals`
--
ALTER TABLE `futsals`
  MODIFY `futsal_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `owner_info`
--
ALTER TABLE `owner_info`
  MODIFY `owner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `reservations_users`
--
ALTER TABLE `reservations_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
