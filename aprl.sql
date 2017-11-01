-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2017 at 08:25 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aprl`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `applyproject`
--

CREATE TABLE `applyproject` (
  `project_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `lastdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `incentive` text NOT NULL,
  `status` text NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `adddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applyproject`
--

INSERT INTO `applyproject` (`project_id`, `title`, `description`, `lastdate`, `incentive`, `status`, `username`, `adddate`) VALUES
(1, 'tool', 'afkn', '0201-05-06 00:00:00', '45456', 'available', 'p', '0201-05-06'),
(4, 'afkajkfh', 'jalfhsdh', '2017-11-27 00:00:00', '800', 'available', 'p', '2017-11-27'),
(5, 'afkajkfh', 'jalfhsdh', '2017-11-27 00:00:00', '800', 'available', 'p', '2017-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `tag` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url` text NOT NULL,
  `spam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogtag`
--

CREATE TABLE `blogtag` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `credential_id` int(11) NOT NULL,
  `cgpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facultyinfo`
--

CREATE TABLE `facultyinfo` (
  `userid` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `credential` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `credential_id` int(11) NOT NULL,
  `offeredby` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `incentive` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projectcredential`
--

CREATE TABLE `projectcredential` (
  `id` int(11) NOT NULL,
  `credential_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projectimage`
--

CREATE TABLE `projectimage` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `imageurl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `projecttag`
--

CREATE TABLE `projecttag` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `image_url` text NOT NULL,
  `credential` varchar(255) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`username`, `firstname`, `lastname`, `email`, `image_url`, `credential`, `description`) VALUES
('r', 'Rajna', 'Bajaj', 'rajanbajajkota@gmail.com', '123.jpg', 'Developer', NULL),
('tom', 'Tom', 'Riddle', 'tom@gmail.com', 'tom.jpg', 'Wiz', 'When she was due to give birth, she stumbled into a Muggle orphanage, where she gave birth to her only son, Tom Marvolo Riddle. She died within the next hour. ... The Gaunts, including Voldemort, are distantly related to Harry because they are descendants of the Peverell brothers.'),
('robin206', 'Robin Hood', ' ', ' ', 'Avatar.jpg', ' ', ''),
('rbajaj.97', 'Rajan Bajaj', ' ', ' ', 'Avatar.jpg', ' ', ''),
('b', 'Rajan', 'Bajaj', '', 'Avatar.jpg', 'Developer', 'DESCRIPTION');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `profession` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`name`, `username`, `password`, `profession`) VALUES
('Rajan Bajaj', 'b', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', 'student'),
('Rajan Bajaj', 'r', '4dc7c9ec434ed06502767136789763ec11d2c4b7', 'faculty'),
('Rajan Bajaj', 'raj', '3055effa054a24f84cf42cea946db4cdf445cb76', 'student'),
('Rajan Bajaj', 'rbajaj.97', '92567c2ad7d7ad9f644f105da3b39a4a12dbbcfb', 'student'),
('Rajan Bajaj', 'robin206', 'da2e6d4110c3eb298812718b5fa70d5fb74f7659', 'student'),
('Rajan Bajaj', 'tom', '96835dd8bfa718bd6447ccc87af89ae1675daeca', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applyproject`
--
ALTER TABLE `applyproject`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD KEY `username` (`username`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applyproject`
--
ALTER TABLE `applyproject`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD CONSTRAINT `studentinfo_ibfk_1` FOREIGN KEY (`username`) REFERENCES `userlogin` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
