-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2017 at 02:48 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `APRL`
--

-- --------------------------------------------------------

--
-- Table structure for table `Applicants`
--

CREATE TABLE `Applicants` (
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ApplyProject`
--

CREATE TABLE `ApplyProject` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `lastdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `incentive` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Blog`
--

CREATE TABLE `Blog` (
  `blog_id` int(11) NOT NULL,
  `tag` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url` text NOT NULL,
  `spam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `BlogTag`
--

CREATE TABLE `BlogTag` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Credential`
--

CREATE TABLE `Credential` (
  `credential_id` int(11) NOT NULL,
  `cgpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `FacultyInfo`
--

CREATE TABLE `FacultyInfo` (
  `userid` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `credential` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Project`
--

CREATE TABLE `Project` (
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
-- Table structure for table `ProjectCredential`
--

CREATE TABLE `ProjectCredential` (
  `id` int(11) NOT NULL,
  `credential_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ProjectImage`
--

CREATE TABLE `ProjectImage` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `imageurl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ProjectTag`
--

CREATE TABLE `ProjectTag` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `StudentInfo`
--

CREATE TABLE `StudentInfo` (
  `user_id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `image_url` text NOT NULL,
  `credential_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Tag`
--

CREATE TABLE `Tag` (
  `tag_id` int(11) NOT NULL,
  `tagname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `UserBlog`
--

CREATE TABLE `UserBlog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Applicants`
--
ALTER TABLE `Applicants`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ApplyProject`
--
ALTER TABLE `ApplyProject`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `Blog`
--
ALTER TABLE `Blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `BlogTag`
--
ALTER TABLE `BlogTag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Credential`
--
ALTER TABLE `Credential`
  ADD PRIMARY KEY (`credential_id`);

--
-- Indexes for table `FacultyInfo`
--
ALTER TABLE `FacultyInfo`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `Project`
--
ALTER TABLE `Project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `ProjectCredential`
--
ALTER TABLE `ProjectCredential`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ProjectImage`
--
ALTER TABLE `ProjectImage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ProjectTag`
--
ALTER TABLE `ProjectTag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `StudentInfo`
--
ALTER TABLE `StudentInfo`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `Tag`
--
ALTER TABLE `Tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `UserBlog`
--
ALTER TABLE `UserBlog`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
