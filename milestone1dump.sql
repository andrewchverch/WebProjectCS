-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2015 at 06:55 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `user`
--
CREATE DATABASE IF NOT EXISTS `user` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `user`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `Title` text NOT NULL,
  `Content` text NOT NULL,
  `QuestionID` int(11) NOT NULL,
  `AnswerID` int(11) NOT NULL,
  `Best` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`Title`, `Content`, `QuestionID`, `AnswerID`, `Best`, `OrderID`) VALUES
('First Response', 'It is Blue', 1, 2, 1, 1),
('Second Response ', 'Nope its red', 1, 2, 0, 2),
('Agreement', 'Indeed I concur ', 2, 1, 0, 1),
('Simple', 'The answer is 200', 8, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `QuestionID` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Content` text NOT NULL,
  `AskerID` int(11) NOT NULL,
  `Bested` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionID`, `Title`, `Content`, `AskerID`, `Bested`) VALUES
(1, 'First Question', 'What is the color of the sky?', 1, 1),
(2, 'question 2', 'lol this', 2, 0),
(3, 'CS versus CE', 'Is Cs easier than CE', 3, 0),
(4, 'Pants in the snow', 'How many layers of jeans work in the winter?', 4, 0),
(5, 'Cooking tips', 'What spices should be added to chicken?', 5, 0),
(6, 'Advice on movies', 'Is batman worth seeing in Imax', 1, 0),
(7, 'printer trouble', 'What do you do when your printer runs out of ink?', 2, 0),
(8, 'Math troubles', 'Ten times twenty?', 1, 0),
(9, 'Songs\r\n', 'What is the difference between metal and rock?\r\n', 3, 0),
(10, 'Round corner\r\n', 'I stubbed my toe on the edge of a table any safe way round the corner of the table?\r\n', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`) VALUES
(1, 'pallen', 'm$ftw'),
(2, 'tblee', '0mGth3WeB!'),
(3, 'bourne', 'bash_$'),
(4, 'edsger', 'st1ll1l11lG0O2'),
(5, 'wgates', '5il3M4X_m$4L');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
