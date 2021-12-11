-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 01:03 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_details`
--

CREATE TABLE `post_details` (
  `post_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `pic_path` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip_address` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_details`
--

INSERT INTO `post_details` (`post_id`, `title`, `description`, `pic_path`, `status`, `created_at`, `updated_at`, `ip_address`) VALUES
(1, 'testing is easy', 'gift for all Updated', NULL, 1, '2021-08-12 08:43:59', '2021-12-11 05:18:49', '::1'),
(3, 'coding is very hard..', 'yes if not understand coding then could not do coding\r\nplease practice', NULL, 1, '2021-08-12 09:12:02', '2021-08-12 09:29:26', '::1'),
(6, 'sdfsdf', 'dsfdsfds', NULL, 1, '2021-08-12 18:05:44', NULL, '::1'),
(7, 'myTestBlog', 'TestBlog', NULL, 1, '2021-12-11 05:17:44', NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email_id` varchar(120) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_login` varchar(50) DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email_id`, `mobile_no`, `password`, `role`, `status`, `created_at`, `updated_at`, `last_login`, `ip_address`) VALUES
(3, 'mahesh', 'admin@gmail.com', '1', '$2y$10$KfYls80w8mNF2AZawO0FPuqiNA6TA8z7SsRjo6fgbRFRyhqeOpe5.', 1, 1, '2021-08-12 00:07:18', NULL, NULL, '::1'),
(4, 'abcd', 'abcd@abcd', '1', '$2y$10$UcxHlTPsNrt0FppdHv4ALurheHMk8ouOQOnkHrmrh0WwB7y/YOfqK', 1, 1, '2021-08-12 00:09:56', NULL, NULL, '::1'),
(5, 'test user01', 'test_user01@ids.com', '1', '$2y$10$8Ue91lCjAmT20YKgyZ9/Je2h6/RUlB7JerwQwGzMiewCOgxmOFDUK', 1, 1, '2021-12-11 05:16:50', NULL, NULL, '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post_details`
--
ALTER TABLE `post_details`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post_details`
--
ALTER TABLE `post_details`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
