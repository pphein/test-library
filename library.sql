-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 09, 2021 at 03:18 AM
-- Server version: 8.0.25-0ubuntu0.20.10.1
-- PHP Version: 7.4.9

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
  `cover` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `book` varchar(225) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `summary`, `price`, `category_id`, `cover`, `book`, `created_date`, `modified_date`) VALUES
(1, 'asdfasdf', 'asdfasdf', 'asdfasdf', 555, 60, 'asdfasdf.png', NULL, '2021-08-02 19:36:05', '2021-08-02 19:36:05'),
(2, 'မဂၤလာပါ ', 'အောင်', ' asdfasdf ', 32323, 60, 'မဂၤလာပါ .png', 'မဂၤလာပါ .pdf', '2021-08-02 19:36:29', '2021-08-02 23:04:59'),
(3, 'အိုရှိုး၏ သေခဆုံးခြင်းအနုပညာ', 'အောင်မေဃ', 'အောင်မေ', 222, 60, 'အိုရှိုး၏ သေခဆုံးခြင်းအနုပညာ.png', NULL, '2021-08-02 19:37:20', '2021-08-02 19:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `remark`, `created_date`, `modified_date`) VALUES
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_ID`, `comment_post_ID`, `comment_date`, `comment_content`) VALUES
(1, 3, '2021-08-02 19:38:18', 'adsfa addfasdf'),
(2, 3, '2021-08-02 19:38:23', 'asdfasdf');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `book_id` int NOT NULL,
  `bookname` varchar(32) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `book_id`, `bookname`, `user_id`) VALUES
(15, 3, 'အိုရှိုး၏ သေခဆုံးခြင်းအနုပညာ', 1),
(16, 2, 'မဂၤလာပါ ', 1),
(17, 1, 'asdfasdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_book_items`
--

CREATE TABLE `tmp_book_items` (
  `id` int NOT NULL,
  `tmp_book_id` int NOT NULL,
  `tmp_book_title` varchar(255) NOT NULL,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` bigint UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `user_registered` datetime NOT NULL,
  `admin` int UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`, `password`, `email`, `user_registered`, `admin`) VALUES
(1, 'pyae123', 'a27aaa7b9f70aa8fcdbb7e0c1727bcce', 'pyae@gmail.com', '2021-08-08 14:48:11', 1),
(2, 'hein123', '04d543ffe74361ee9fa5995c01483033', 'hein@gmail.com', '2021-08-08 15:45:40', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tmp_book_items`
--
ALTER TABLE `tmp_book_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
