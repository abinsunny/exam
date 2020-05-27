-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 27, 2020 at 05:29 AM
-- Server version: 8.0.18
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `white_rabbit_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_log`
--

DROP TABLE IF EXISTS `file_log`;
CREATE TABLE IF NOT EXISTS `file_log` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `file_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `file_last_update` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `file_isdeleted` int(11) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `file_log`
--

INSERT INTO `file_log` (`file_id`, `file_title`, `file_description`, `file_url`, `file_last_update`, `file_isdeleted`) VALUES
(1, 'test', 'test', 'board-new.jpg', '1590553950', 1),
(2, 'test', 'test', 'board-new.jpg', '1590553950', 0),
(3, 'test file 1', 'test data 1', 'board-new.jpg', '1590553950', 0),
(4, 'test file 2', 'test data 2', 'board-new.jpg', '1590555486', 1),
(5, 'test file 3', 'test data 3', 'board-new.png', '1590554367', 0),
(6, 'test file 4', 'test data 4', 'board-new.jpg', '1590553950', 0),
(7, 'new file test', 'test\'gggb', '01.png', '1590555711', 0),
(8, 'pdf file', 'uploading pdf file', 'Doc1.pdf', '1590555984', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
