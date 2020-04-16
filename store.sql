-- phpMyAdmin SQL Dump
-- version 4.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 05, 2020 at 08:45 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 7.1.9-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `store`
--
CREATE DATABASE IF NOT EXISTS `store` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `store`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `summary` tinytext NOT NULL,
  `price` float NOT NULL,
  `category_id` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `book` varchar(225) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `price`, `category_id`, `cover`, `book`, `created_date`, `modified_date`) VALUES
(11, 'adsfasdfasdf', 'asdfasdfasdfasd', 'asdfasdfsadfasd', 744, 0, 'error.png', '88-c-programs.pdf', '2018-05-16 13:19:44', '2018-05-16 13:19:44'),
(12, 'Hello', 'Pyae', 'hek;akf a;fdaddsklfjad adkfjadkfja;d adkfjadfka ajdkfjadlfkad;fj dlkfjaldkjfad adkfjadkfjadkf dskajfadkfjadkfjakdjfakdfj asdkfja;dlkfjadkf adkfja dfkaldfja dfjadkfjad asdfjadlkfja dfadfdakdjfa df adfkjadkfj dsfjaklsd fadkfja;dkfj adfjakdfaldkjf akdjf  ', 7555, 0, 'Screenshot from 2010-01-01 07:44:07.png', 'c-programming-in-linux.pdf', '2018-05-16 21:14:28', '2018-05-16 21:14:28'),
(13, 'Emily', 'á€…á€…á€¹á€»á€„á€­á€™á€¹á€¸', 'á€¡á€›á€™á€¹á€¸á€±á€€á€¬á€„á€¹á€¸á€±á€žá€¬ á€€á€—á€ºá€¬á€™á€ºá€¬á€¸', 200, 51, 'pph.jpg', 'Emily.pdf', '2018-05-16 23:04:41', '2018-05-16 23:04:41'),
(14, 'laravel_tutorial', 'adfaf', 'dfadfasdfa afdfadf dfadfasdfa afdfadf dfadfasdfa afdfadf dfadfasdfa afdfadf', 321, 55, 'Screenshot from 2010-01-01 07:.png', 'laravel_tutorial.pdf', '2018-05-16 23:08:11', '2018-05-16 23:08:11'),
(15, 'adsfasdfasdf', 'asdfasdfasdfasd', 'adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfas', 5454, 0, 'FB_IMG_1444924684755.jpg', '', '2018-05-16 23:18:01', '2018-05-16 23:18:01'),
(16, 'sdfsd', 's', 'adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfasdf adfadfadf adfadf adfas', 65, 58, 'ilogo.jpg', '', '2018-05-16 23:19:03', '2018-05-16 23:19:03'),
(17, 'Title ', 'Autho', 'falkdsjfaldkjf ', 0, 0, '', '', '2019-06-15 17:32:59', '2019-06-15 17:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

DROP TABLE IF EXISTS `Categories`;
CREATE TABLE IF NOT EXISTS `Categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`id`, `name`, `remark`, `created_date`, `modified_date`) VALUES
(50, '  Cartoon   ', 'For Children', '2010-01-01 08:08:22', '2010-01-01 08:08:22'),
(51, 'Poem', '&#4123;&#4126;&#4170; &#4129;&#4097;&#4154;&#4101;&#4153; &#4170; &#4129;&#4124;&#4156;&#4121;&#4153;&#4152;', '2010-01-01 10:59:10', '2010-01-01 10:59:10'),
(52, 'Novel', '&#4123;&#4126;&#4170; &#4129;&#4124;&#4156;&#4121;&#4153;&#4152;&#4170; &#4129;&#4097;&#4154;&#4101;&#4153;&#4170; &#4120;&#4160;&#4114;&#4126;&#4116;', '2010-01-01 11:05:57', '2010-01-01 11:05:57'),
(53, 'Magazine', 'about Science', '2010-01-01 08:28:33', '2010-01-01 08:28:33'),
(54, 'Religion', '', '2010-01-01 08:06:27', '2010-01-01 08:06:27'),
(55, 'Science', '', '2010-01-01 08:06:55', '2010-01-01 08:06:55'),
(57, 'Knowledge', '', '2010-01-01 08:29:49', '2010-01-01 08:29:49'),
(58, 'dfasdfasdfasdf', 'asdfasdfasdfasdfasdf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(59, 'fadfasdf', 'asdfasdfasdf', '2018-05-15 00:00:00', '2018-05-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_ID` bigint(20) unsigned NOT NULL,
  `comment_post_ID` bigint(20) unsigned NOT NULL,
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL,
  `comment_author_url` varchar(200) NOT NULL,
  `comment_author_IP` varchar(100) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_date_gmt` datetime NOT NULL,
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL,
  `comment_approved` varchar(20) NOT NULL,
  `comment_agent` varchar(255) NOT NULL,
  `comment_type` varchar(20) NOT NULL,
  `comment_parent` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(24, 8, '', '', '', '', '2010-01-01 10:33:52', '0000-00-00 00:00:00', 'hello', 0, '1', '', '', 0, 0),
(25, 7, '', '', '', '', '2016-10-29 17:36:09', '0000-00-00 00:00:00', '&#4129;&#4123;&#4144;&#4152;', 0, '1', '', '', 0, 0),
(26, 5, '', '', '', '', '2016-10-29 17:48:07', '0000-00-00 00:00:00', 'adung', 0, '1', '', '', 0, 0),
(27, 9, '', '', '', '', '2016-10-29 17:48:11', '0000-00-00 00:00:00', 'sdfe', 0, '1', '', '', 0, 0),
(28, 9, '', '', '', '', '2016-10-29 17:48:13', '0000-00-00 00:00:00', 'dfd', 0, '1', '', '', 0, 0),
(29, 9, '', '', '', '', '2016-10-29 17:48:15', '0000-00-00 00:00:00', 'dfsd', 0, '1', '', '', 0, 0),
(30, 9, '', '', '', '', '2016-10-29 17:48:17', '0000-00-00 00:00:00', 'sdfsd', 0, '1', '', '', 0, 0),
(31, 9, '', '', '', '', '2016-10-29 17:48:19', '0000-00-00 00:00:00', 'sdfsd', 0, '1', '', '', 0, 0),
(32, 9, '', '', '', '', '2016-10-29 17:48:22', '0000-00-00 00:00:00', 'sdfasdf', 0, '1', '', '', 0, 0),
(33, 9, '', '', '', '', '2016-10-29 17:48:26', '0000-00-00 00:00:00', 'asdfasdf', 0, '1', '', '', 0, 0),
(34, 9, '', '', '', '', '2010-01-01 15:50:21', '0000-00-00 00:00:00', 'good', 0, '1', '', '', 0, 0),
(35, 7, '', '', '', '', '2016-12-11 11:39:49', '0000-00-00 00:00:00', 'asdf', 0, '1', '', '', 0, 0),
(36, 9, '', '', '', '', '2016-12-11 11:40:00', '0000-00-00 00:00:00', 'Hello', 0, '1', '', '', 0, 0),
(37, 12, '', '', '', '', '2018-05-16 21:28:35', '0000-00-00 00:00:00', 'asdf', 0, '1', '', '', 0, 0),
(38, 11, '', '', '', '', '2018-05-16 21:28:42', '0000-00-00 00:00:00', 'asdfadf', 0, '1', '', '', 0, 0),
(39, 11, '', '', '', '', '2019-06-15 17:30:59', '0000-00-00 00:00:00', 'fasdf', 0, '1', '', '', 0, 0),
(40, 10, '', '', '', '', '2019-06-15 17:31:09', '0000-00-00 00:00:00', 'rfsdf', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `adress`, `status`, `created_date`, `modified_date`) VALUES
(1, '', '', '', '', 1, '2018-05-16 21:36:24', '2018-05-16 23:31:28'),
(2, '', '', '', '', 1, '2018-05-16 23:21:28', '2018-05-16 23:31:23'),
(3, '', '', '', '', 1, '2018-05-16 23:25:51', '2018-05-16 23:31:19'),
(4, 'pph', 'pph@pph.com', '09797979', 'dsfaf', 1, '2018-05-16 23:26:22', '2018-05-16 23:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_book_items`
--

DROP TABLE IF EXISTS `tmp_book_items`;
CREATE TABLE IF NOT EXISTS `tmp_book_items` (
  `id` int(11) NOT NULL,
  `tmp_book_id` int(11) NOT NULL,
  `tmp_book_title` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_book_items`
--

INSERT INTO `tmp_book_items` (`id`, `tmp_book_id`, `tmp_book_title`) VALUES
(1, 12, 'Hello'),
(2, 11, 'adsfasdfasdf'),
(3, 11, 'adsfasdfasdf'),
(4, 10, 'ADFASDF'),
(5, 10, 'ADFASDF'),
(6, 10, 'ADFASDF'),
(7, 16, 'sdfsd'),
(8, 15, 'adsfasdfasdf'),
(9, 15, 'adsfasdfasdf'),
(10, 14, 'laravel_tutorial'),
(11, 14, 'laravel_tutorial'),
(12, 14, 'laravel_tutorial'),
(13, 13, 'Emily');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

DROP TABLE IF EXISTS `wp_users`;
CREATE TABLE IF NOT EXISTS `wp_users` (
  `ID` bigint(20) unsigned NOT NULL,
  `user_login` varchar(60) NOT NULL,
  `user_pass` varchar(64) NOT NULL,
  `user_nicename` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL ,
  `user_url` varchar(100) NOT NULL ,
  `user_registered` datetime NOT NULL,
  `user_activation_key` varchar(60) NOT NULL,
  `user_status` int(11) NOT NULL,
  `display_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_book_items`
--
ALTER TABLE `tmp_book_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `ID` (`ID`,`user_login`,`user_pass`,`user_nicename`,`user_email`,`user_url`,`user_registered`,`user_activation_key`,`user_status`,`display_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_book_items`
--
ALTER TABLE `tmp_book_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
