-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2020 at 05:54 AM
-- Server version: 8.0.19-0ubuntu5
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `summary` tinytext NOT NULL,
  `price` float NOT NULL,
  `category_id` int NOT NULL,
  `cover` varchar(255) NOT NULL,
  `book` varchar(225) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(17, 'Title ', 'Autho', 'falkdsjfaldkjf ', 0, 0, '', '', '2019-06-15 17:32:59', '2019-06-15 17:32:59'),
(18, 'New kt ', 'New Author', 'Just Summary', 3444, 0, 'Screenshot from 2020-01-05 15-46-33.png', 'server.php', '2020-02-27 14:05:52', '2020-02-27 14:05:52'),
(19, 'sadfasdf', 'asdfasdf', 'asdfasdf', 3534, 60, 'Screenshot from 2020-01-02 13-29-56.png', '', '2020-02-27 14:37:18', '2020-02-27 14:37:18'),
(20, 'CS 50', 'David J Malan', 'About Computer Science', 399, 63, 'Screenshot from 2020-01-02 13-29-56.png', 'a.pdf', '2020-03-30 23:35:52', '2020-03-30 23:35:52'),
(21, 'AungMyo', 'MyoAung', 'dkjfa;kd', 23, 60, 'Screenshot from 2020-01-02 13-29-56.png', 'a.pdf', '2020-04-16 04:15:18', '2020-04-16 04:15:18'),
(22, 'Pyae', 'Pyae', 'Bip', 345, 61, 'Screenshot from 2020-01-05 15-46-33.png', 'a.pdf', '2020-04-16 04:16:41', '2020-04-16 04:16:41'),
(23, 'Hein', 'Hein', 'adkfa;kdfj', 333, 60, 'Screenshot from 2020-01-05 15-46-33.png', 'a.pdf', '2020-04-16 04:18:33', '2020-04-16 04:18:33'),
(24, 'Ko Myo', 'Myo', 'a;lkdjf;lkd', 333, 63, 'Screenshot from 2020-01-02 13-29-56.png', 'a.pdf', '2020-04-16 04:25:17', '2020-04-16 04:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`id`, `name`, `remark`, `created_date`, `modified_date`) VALUES
(60, 'magazine', 'new', '2020-02-27 14:16:19', '2020-02-27 14:16:19'),
(61, 'Laravel', 'Framework', '2020-02-27 14:32:53', '2020-02-27 14:32:53'),
(62, 'PHP', 'programming', '2020-02-27 15:10:46', '2020-02-27 15:10:46'),
(63, 'Progarmming', 'Framework', '2020-03-30 23:34:11', '2020-03-30 23:34:11'),
(64, 'OOP', 'ObjectOrientedProgamming', '2020-03-31 19:53:30', '2020-03-31 19:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_ID` bigint UNSIGNED NOT NULL,
  `comment_post_ID` bigint UNSIGNED NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_ID`, `comment_post_ID`, `comment_date`, `comment_content`) VALUES
(1, 3, '2020-03-31 15:50:07', 'hello'),
(2, 20, '2020-03-31 15:50:49', 'asdfadf'),
(3, 19, '2020-03-31 16:47:20', 'oeroweir'),
(4, 11, '2020-03-31 16:47:51', 'kfljdskfljasd'),
(5, 11, '2020-03-31 16:48:04', 'welkrjqwklerjwe'),
(6, 20, '2020-03-31 16:55:56', 'This book is very good'),
(7, 20, '2020-03-31 16:56:22', 'စာအုပ် ကောင်းတစ်အုပ် ပါ'),
(8, 20, '2020-03-31 16:56:45', 'ကျေးဇူးအထူးတင်ပါတယ်ဗျာ'),
(9, 20, '2020-03-31 16:57:15', 'တစ်ယောက်ကို ဘယ်နှစ်ရက်အများဆုံးငှားတာလဲ'),
(10, 20, '2020-03-31 16:57:36', 'Thank you so much'),
(11, 20, '2020-03-31 16:57:45', 'How long '),
(12, 20, '2020-03-31 16:57:54', 'vey good'),
(13, 20, '2020-03-31 16:58:03', 'so nice'),
(14, 20, '2020-03-31 16:58:23', 'ဘာမှမေကာင်းပါဘူး'),
(15, 20, '2020-03-31 16:58:35', 'ဟုတ်လား'),
(16, 14, '2020-03-31 19:48:23', 'အောင်မြင်ါပါစေ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `adress` text NOT NULL,
  `status` int NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `book_id` int NOT NULL,
  `order_id` int NOT NULL,
  `bookname` varchar(32) NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_book_items`
--

CREATE TABLE `tmp_book_items` (
  `id` int NOT NULL,
  `tmp_book_id` int NOT NULL,
  `tmp_book_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_book_items`
--

INSERT INTO `tmp_book_items` (`id`, `tmp_book_id`, `tmp_book_title`) VALUES
(791, 16, 'sdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL,
  `user_pass` varchar(64) NOT NULL,
  `user_nicename` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_url` varchar(100) NOT NULL,
  `user_registered` datetime NOT NULL,
  `user_activation_key` varchar(60) NOT NULL,
  `user_status` int NOT NULL,
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
  ADD PRIMARY KEY (`comment_ID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tmp_book_items`
--
ALTER TABLE `tmp_book_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=792;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

