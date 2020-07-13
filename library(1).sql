-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 09:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first`, `last`, `username`, `password`, `email`, `contact`, `pic`) VALUES
(1, 'yogesh', 'agarwal', 'yogeshwar', '1234', 'yogeshmario102@gmail.com', '9837747414', 'user.jpg'),
(2, 'Yukti', 'Agarwal', 'Yukti_Agarwal', '1111', 'yukti102@gmail.com', '9876543210', 'wp1900915-sabrina-carpenter-wallpapers.jpg'),
(3, 'janmeyjay', 'kumar', 'itsme_jannu', '1234', 'jannu@gmail.com', '9876543210', 'jannu.jpeg'),
(4, 'abhishek ', 'singh', 'abhi3000', '1234', 'abhi3000@gmail.com', '9999900000', 'abhi.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`, `status`, `quantity`, `department`) VALUES
(2, 'The complete Reference c++', 'Herbert Strange', '4th', 'Available', 7, 'CSE'),
(3, 'Data Structure', 'Seymour jackson', '4th', 'Available', 5, 'cse'),
(6, 'Concepts of Physics', 'H C Verma', '4', 'Available', 11, 'Physics'),
(7, 'play with python 3.0', 'Prakash Gupta', '1st', 'available', 10, 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `username`, `comment`) VALUES
(45, 'uchiha', 'its...........wait for it...................almost there...............................................legendary'),
(46, 'Admin', 'thnx');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `returned` varchar(100) NOT NULL,
  `day` int(100) NOT NULL,
  `fine` double NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `return` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`username`, `bid`, `approve`, `issue`, `return`) VALUES
('Itsme_Yogi', 2, '<p style=\"color:yellow; background-color: green\">RETURNED</p>', '2020-04-30', '2020-05-05'),
('Itsme_Yogi', 2, '<p style=\"color:yellow; background-color: green\">RETURNED</p>', '2020-04-30', '2020-05-05'),
('Itsme_Yogi', 3, '<p style=\"color:yellow; background-color: green\">RETURNED</p>', '2020-05-25', '2020-05-27'),
('Itsme_Yogi', 4, '<p style=\"color:yellow; background-color: green\">RETURNED</p>', '2020-04-05', '2020-05-04'),
('Itsme_Yogi', 2, '<p style=\"color:yellow; background-color: green\">RETURNED</p>', '2020-04-30', '2020-05-05'),
('Itsme_Yogi', 4, '<p style=\"color:yellow; background-color: green\">RETURNED</p>', '2020-04-05', '2020-05-04'),
('Itsme_Yogi', 3, '<p style=\"color:yellow; background-color: green\">RETURNED</p>', '2020-05-25', '2020-05-27'),
('ajju bhai', 2, '<p style=\"color:yellow; background-color: red\">EXPIRED</p>', '2020-05-24', '2020-06-24'),
('Itsme_Yogi', 6, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `username`, `message`, `status`, `sender`, `receiver`) VALUES
(1, 'ajju bhai', 'Hey, can you help me?', 'yes', 'student', 'admin'),
(4, 'ajju bhai', 'hey how you doing?', 'yes', 'student', 'admin'),
(5, 'admin', 'yeah yeah go for it', 'yes', 'admin', 'ajju bhai'),
(6, 'admin', 'hey yo yo yo', 'yes', 'admin', 'Itsme_Yogi'),
(7, 'admin', 'yogoyoyyyoyyoyo', 'yes', 'admin', 'ajju bhai'),
(8, 'ajju bhai', 'hey', 'yes', 'student', 'admin'),
(13, 'Yukti_Agarwal', 'bhkb', 'yes', 'admin', 'Itsme_Yogi'),
(14, 'Itsme_Yogi', 'gfg', 'yes', 'student', 'admin'),
(16, 'abhi3000', 'hey gfg', 'yes', 'admin', 'Itsme_Yogi'),
(17, 'Itsme_Yogi', 'asdfsdf', 'yes', 'student', 'admin'),
(18, 'Yukti_Agarwal', 'chal na nikal', 'no', 'admin', 'Itsme_Yogi');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first`, `last`, `username`, `password`, `roll`, `email`, `contact`, `pic`) VALUES
('ajay', 'nath', 'ajju bhai', '1212', 1, 'ajju@gmail.com', '1231231231', 'user.jpg'),
('Yogeshwar', 'Agarwal', 'Itsme_Yogi', 'yogi', 123, 'yogeshmario102@gmail.com', '9876543210', 'yogi passport.png'),
('yukti', 'Agarwal', 'yukti', '1121', 2018, 'yuktifireinthesky@gmail.com', '2147483647', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
