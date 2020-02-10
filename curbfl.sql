-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2020 at 11:21 PM
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
(1, 'admin', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', '', '', 'SADMIN', '1581252162', '', 'A');

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

-- --------------------------------------------------------

--
-- Table structure for table `cbf_page_images`
--

CREATE TABLE `cbf_page_images` (
  `id` int(11) NOT NULL,
  `page_name` varchar(50) NOT NULL,
  `image_loc` varchar(25) NOT NULL,
  `sort_order` tinyint(2) NOT NULL DEFAULT '1',
  `image_name1` varchar(250) NOT NULL,
  `image_text1` varchar(255) NOT NULL,
  `image_media1` varchar(255) NOT NULL,
  `image_name2` varchar(100) NOT NULL,
  `image_text2` varchar(255) NOT NULL,
  `image_media2` varchar(255) NOT NULL,
  `image_name3` varchar(100) NOT NULL,
  `image_text3` varchar(255) NOT NULL,
  `image_media3` varchar(255) NOT NULL,
  `created_on` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cbf_page_images`
--
ALTER TABLE `cbf_page_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
