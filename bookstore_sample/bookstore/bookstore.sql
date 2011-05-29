-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2010 at 11:59 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `uname`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `book_title` varchar(200) NOT NULL,
  `book_description` text NOT NULL,
  `book_price` decimal(8,2) NOT NULL,
  `book_date` date NOT NULL,
  `book_img` varchar(200) NOT NULL,
  `featured` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_title`, `book_description`, `book_price`, `book_date`, `book_img`, `featured`) VALUES
(2, 'Pelangi Science Magazine (10 Issues)-2009', 'Science is such an important part of our everyday lives.Welcome to a whole new year of Pelangi Scientist! In order to instil a love for science in the hearts of Malaysian children, Penerbitan Pelangi Sdn Bhd is releasing a new children magazine - Pelangi Scientist, the science magazine that''s full of fun!\r\n \r\nPelangi Scientist contains lots of scientific facts portrayed in a lively and interesting manner that is sure to catch your children''s attention. There are experiments, activities, puzzles, comics, contests, reader contributions, prizes and more!\r\n\r\nSo give Pelangi Scientist a try...And let it show you and your children how science can be really fun!We promise to continue bringing you the best of science fun and discovery every monthï¼', 63.70, '2010-11-01', 'SMMSE02.jpg', '1'),
(3, 'Very Easy Readers', 'This interesting series contains stories that all young learners of English would love to read. The stories are written in English that is fairy easy to comprehend. The activities and games provide lots of fun too.', 61.62, '2010-11-01', 'SBSERE61.jpg', '1'),
(4, 'Ghost Stories', 'This interesting series contains stories that all young learners of English would love to read. The stories are written in English that is fairy easy to comprehend. The activities and games provide lots of fun too. ', 5.14, '2010-11-01', 'SERE6102.jpg', '0'),
(5, 'Alice in Wonderland', 'This interesting series contains stories that all young learners of English would love to read. The stories are written in English that is fairy easy to comprehend. The activities and games provide lots of fun too. ', 5.14, '2010-11-01', 'SERE6106.jpg', '0'),
(6, 'Short Stories Series', 'Stories on the shelf :\r\n- A Fantasy\r\n- Blind Muthu\r\n- The Stray Dog\r\n- My Life Story\r\n- My Best Friend\r\n- Conflict\r\n- The unfortunate End\r\n- Aura', 82.68, '2010-11-01', 'SBSSSE69.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `pass`, `name`, `address`, `phone`) VALUES
(7, 'xad@yahoo.com', '123456', 'Zad Ibrahim', 'asd', '123'),
(6, 'smd@php.net.my', '4dm1n1337', 'Sumardi Shukor', '123', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(200) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `rate` enum('1','2','3','4','5') NOT NULL,
  `cid` int(200) unsigned NOT NULL,
  `bid` int(200) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `comment`, `rate`, `cid`, `bid`) VALUES
(1, 'Fun & Cheap.', '3', 6, 2),
(2, 'Thank you!\r\n\r\nI will come back again.', '2', 6, 2);
