-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 02:10 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nal_text_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE IF NOT EXISTS `works` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Planning','Doing','Complete','') COLLATE utf8_unicode_ci NOT NULL,
  `CDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `name`, `start_date`, `end_date`, `status`, `CDate`, `UDate`) VALUES
(1, 'System analysis', '2019-01-16 10:00:00', '2019-01-16 10:30:00', 'Complete', '2019-01-17 18:17:26', '2019-01-17 18:17:26'),
(2, 'Setup project follows MVC', '2019-01-16 10:30:00', '2019-01-16 11:00:00', 'Complete', '2019-01-17 18:18:35', '2019-01-17 18:18:35'),
(3, 'Create Database', '2019-01-16 11:00:00', '2019-01-16 11:15:00', 'Complete', '2019-01-17 18:19:27', '2019-01-17 18:19:27'),
(4, 'Build layout', '2019-01-16 13:30:00', '2019-01-16 15:00:00', 'Complete', '2019-01-17 18:21:22', '2019-01-17 18:21:22'),
(5, 'Create Function', '2019-01-16 15:00:00', '2019-01-16 16:00:00', 'Complete', '2019-01-17 18:21:47', '2019-01-17 18:21:47'),
(6, 'Edit Function', '2019-01-16 16:00:00', '2019-01-16 16:30:00', 'Complete', '2019-01-17 18:22:20', '2019-01-17 18:22:20'),
(7, 'Delete Function', '2019-01-16 16:30:00', '2019-01-16 17:00:00', 'Complete', '2019-01-17 18:22:45', '2019-01-17 18:22:45'),
(8, 'Show works on the canlendar', '2019-01-17 08:00:00', '2019-01-17 10:00:00', 'Complete', '2019-01-17 18:23:31', '2019-01-17 18:23:31'),
(9, 'Setup composer', '2019-01-17 10:00:00', '2019-01-17 11:00:00', 'Complete', '2019-01-17 18:24:49', '2019-01-17 18:24:49'),
(10, 'Monolog', '2019-01-17 11:00:00', '2019-01-17 11:30:00', 'Complete', '2019-01-17 18:25:33', '2019-01-17 18:25:33'),
(11, ' UNIT TEST to test function', '2019-01-17 13:30:00', '2019-01-17 16:30:00', 'Doing', '2019-01-17 18:26:42', '2019-01-17 18:26:42'),
(12, 'Upload code to GIT', '2019-01-17 16:30:00', '2019-01-17 17:00:00', 'Complete', '2019-01-17 18:27:41', '2019-01-17 18:27:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `works`
--
ALTER TABLE `works`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
