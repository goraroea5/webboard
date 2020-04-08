-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 06:36 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proj_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ReplyID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `QuestionID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Details` text NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`ReplyID`, `QuestionID`, `CreateDate`, `Details`, `Name`) VALUES
(00001, 00016, '2012-03-22 16:13:18', 'Please visit www.thaicreate.com', 'plakrim'),
(00002, 00016, '2012-03-22 16:14:56', 'Thanks. www.thaicreate.com is great web for the php and mysql.', 'mr.win');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(50) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `name`, `lastname`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin'),
(2, 'test', 'test', 'test', 'test', 'user'),
(3, 'admin99', '123456testT', 'Khoomkhao', 'Hello', 'user'),
(4, 'admin98', '123456789tesT', 'Hello', 'Man', 'user'),
(5, 'admin97', '123456789testT', 'Hello', 'Man', 'user'),
(6, 'admin96', '123456789Test', 'Hello', 'Man', 'user'),
(7, 'admin95', 'test123456T', 'Khao', 'Da', 'user'),
(8, 'admin94', 'test123456T', 'Hello', 'Man', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `webboard`
--

CREATE TABLE `webboard` (
  `QuestionID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Question` varchar(255) NOT NULL,
  `Details` text NOT NULL,
  `Name` varchar(50) NOT NULL,
  `View` int(5) NOT NULL,
  `Reply` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webboard`
--

INSERT INTO `webboard` (`QuestionID`, `CreateDate`, `Question`, `Details`, `Name`, `View`, `Reply`) VALUES
(00001, '2012-03-22 15:37:54', 'Help me here. I love it. But out of this.', 'Detail for : Help me here. I love it. But out of this.', 'cook chicken', 26, 3),
(00002, '2012-03-22 15:37:54', 'Why compare the data in the sql language. But if the numbers.	', 'Detail for : Why compare the data in the sql language. But if the numbers.	', 'koo_service', 1, 0),
(00003, '2012-03-22 15:37:54', 'The values ??in the Text box to use when removed from the List Box.', 'Detail for : The values ??in the Text box to use when removed from the List Box.	', 'Bee.', 1, 0),
(00004, '2012-03-22 15:37:54', 'Ask me how I have used it to my PHPExcel.', 'Detail for : Ask me how I have used it to my PHPExcel.	', 'PlaKriM.	', 3, 0),
(00005, '2012-03-22 15:37:54', 'You know me ... textbox code number is entered at the stem and then a textbox to another textbox and press tab to another.', 'Detail for : You know me ... textbox code number is entered at the stem and then a textbox to another textbox and press tab to another.	', 'mr.win', 0, 0),
(00006, '2012-03-22 15:37:54', 'How to convert date from year to year, then evaluate the current age.	', 'Detail for : How to convert date from year to year, then evaluate the current age.	', 'Jae', 2, 1),
(00007, '2012-03-22 15:37:54', 'I do asp.net but I have a question about my file. Why does the archive folder. Existing file, a single thread.', 'Detail for : I do asp.net but I have a question about my file. Why does the archive folder. Existing file, a single thread.	', 'pat.', 1, 0),
(00008, '2012-03-22 15:37:54', 'Thanks for the advice. I write code to search from the main square with the sell_id', 'Detail for : Thanks for the advice. I write code to search from the main square with the sell_id', 'sodong.', 2, 0),
(00009, '2012-03-22 15:37:54', 'I ask my friends. The wrapping. I want to separate words	', 'Detail for : I ask my friends. The wrapping. I want to separate words', 'noy', 4, 1),
(00010, '2012-03-22 15:37:54', 'I used to. Focus () the cursor to the last scene of the text in the textbox	', 'Detail for : I used to. Focus () the cursor to the last scene of the text in the textbox	', 'oasiis', 3, 1),
(00011, '2012-03-22 15:37:54', 'Help write the story to me in my OOP database postgresql	', 'Detail for : Help write the story to me in my OOP database postgresql	', 'minutes', 2, 0),
(00012, '2012-03-22 15:37:54', 'Config file that loads the message id, message value to a system call to load the config of this post.	', 'Detail for : Config file that loads the message id, message value to a system call to load the config of this post.	', 'ago', 2, 0),
(00013, '2012-03-22 15:37:54', 'Hope to see the Code during my search. Asp	', 'Detail for : Hope to see the Code during my search. Asp	', 'A', 2, 0),
(00014, '2012-03-22 15:37:54', 'The value in the textbox value from db where the textbox is in the dropdown to change the value from the db as well	', 'Detail for : The value in the textbox value from db where the textbox is in the dropdown to change the value from the db as well	', 'jum', 1, 0),
(00015, '2012-03-22 15:37:54', 'jquery ui datepicker calendar. Assistance in the form of redundancy	', 'Detail for : jquery ui datepicker calendar. Assistance in the form of redundancy	', 'Prairie', 1, 0),
(00016, '2012-03-22 16:12:24', 'How to use php and mysql database', 'Dear all,\r\nI am need to connect php to mysql database please suggest source code to tutorial.', 'mr.win', 11, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ReplyID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_3` (`username`);

--
-- Indexes for table `webboard`
--
ALTER TABLE `webboard`
  ADD PRIMARY KEY (`QuestionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ReplyID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `webboard`
--
ALTER TABLE `webboard`
  MODIFY `QuestionID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
