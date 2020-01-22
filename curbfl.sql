-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 11:10 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curbfl`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbf_admin`
--

CREATE TABLE `cbf_admin` (
  `uid` int(11) NOT NULL,
  `uname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'SADMIN,ADMIN',
  `last_login` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_on` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('A','D') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A' COMMENT 'A(Active),D(Disabled)'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cbf_admin`
--

INSERT INTO `cbf_admin` (`uid`, `uname`, `pass`, `email`, `mobile_no`, `level`, `last_login`, `created_on`, `status`) VALUES
(1, 'admin', '2f6e05b4f7298f96074ea6116659677bfefee00812a53713f00a75253b894c56', '', '', 'SADMIN', '1579627862', '', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `cbf_admin_access_logs`
--

CREATE TABLE `cbf_admin_access_logs` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cbf_admin_access_logs`
--

INSERT INTO `cbf_admin_access_logs` (`id`, `uid`, `ip`, `user_agent`, `time`) VALUES
(1, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', '1579350393'),
(2, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', '1579355557'),
(3, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', '1579359343'),
(4, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', '1579359610'),
(5, 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36', '1579627862');

-- --------------------------------------------------------

--
-- Table structure for table `cbf_page_images`
--

CREATE TABLE `cbf_page_images` (
  `id` int(11) NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `image_type` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cbf_page_images`
--

INSERT INTO `cbf_page_images` (`id`, `page_name`, `image_name`, `image_type`, `updated_on`) VALUES
(1, 'home', 'ev.png', 'banner', '2020-01-18 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cbf_sessions_log`
--

CREATE TABLE `cbf_sessions_log` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cbf_admin`
--
ALTER TABLE `cbf_admin`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `cbf_admin_access_logs`
--
ALTER TABLE `cbf_admin_access_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbf_page_images`
--
ALTER TABLE `cbf_page_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cbf_sessions_log`
--
ALTER TABLE `cbf_sessions_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cbf_admin`
--
ALTER TABLE `cbf_admin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cbf_admin_access_logs`
--
ALTER TABLE `cbf_admin_access_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cbf_page_images`
--
ALTER TABLE `cbf_page_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
