-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2017 at 11:00 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  `interest` text,
  `approval` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `username`, `project_id`, `interest`, `approval`) VALUES
(6, '2', 2, 'as', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `applyproject`
--

CREATE TABLE `applyproject` (
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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `url` text NOT NULL,
  `spam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `title`, `description`, `date`, `url`, `spam`) VALUES
(1, 'Excel in competitive coding', 'Competitive Coding is one of such domain which requires a lot of efforts and hard work.', '2017-10-30 18:12:41', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blogtag`
--

CREATE TABLE `blogtag` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogtag`
--

INSERT INTO `blogtag` (`id`, `tag_id`, `blog_id`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `credential`
--

CREATE TABLE `credential` (
  `credential_id` int(11) NOT NULL,
  `cgpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `credential`
--

INSERT INTO `credential` (`credential_id`, `cgpa`) VALUES
(1, 8.66);

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
  `offeredby` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL,
  `incentive` text NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `offeredby`, `title`, `description`, `date`, `incentive`, `status`) VALUES
(1, 'Narendra Karmarkar', 'Linear Programming', 'Linear programming plays a very important role in optimization models. We can use our resources fully if we can optimize its use and this model can be formed with linear programming.', '2017-11-03 00:00:00', '0', 'current'),
(2, 'Varun Datt', 'Machine Learning', 'We want to build a machine learning model which will predict chances of landslide occurances in near locality of yours.This will also involve big data analysis techniques.', '2017-11-03 00:00:00', 'Rs.1500 per week.', 'available'),
(3, 'Aditya Nigam', 'Deep Learning', 'This project is intended to introduce you to basic deep learning reinforcement techniques.', '2017-11-02 00:00:00', '0', 'finished'),
(4, 'TAG', 'Thunderbird mail service', 'This project aim to introduce to open source contribution.We will create a plugin for open source thunderbird mail client.', '2017-11-01 00:00:00', 'Rs.2000-/', 'current'),
(6, 'Arti Kashyap', 'Mysql Basics', 'MySQL (officially pronounced as \"My S-Q-L\",[6]) is an open-source relational database management system (RDBMS).[7] Its name is a combination of \"My\", the name of co-founder Michael Widenius\'s daughter,[8] and \"SQL\", the abbreviation for Structured Query Language. The MySQL development project has made its source code available under the terms of the GNU General Public License, as well as under a variety of proprietary agreements. MySQL was owned and sponsored by a single for-profit firm, the Swedish company MySQL AB, now owned by Oracle Corporation.[9] For proprietary use, several paid editions are available, and offer additional functionality.\r\nMySQL is a central component of the LAMP open-source web application software stack (and other \"AMP\" stacks). LAMP is an acronym for \"Linux, Apache, MySQL, Perl/PHP/Python\". Applications that use the MySQL database include: TYPO3, MODx, Joomla, WordPress, phpBB, MyBB, and Drupal. MySQL is also used in many high-profile, large-scale websites, including Google[10][11] (though not for searches), Facebook,[12][13][14] Twitter,[15] Flickr,[16] and YouTube.[17]', '2017-11-06 00:00:00', '0', 'available');

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

--
-- Dumping data for table `projecttag`
--

INSERT INTO `projecttag` (`id`, `tag_id`, `project_id`) VALUES
(1, 2, 1),
(2, 6, 1),
(3, 7, 2),
(4, 8, 3);

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
('1', 'Prabhakar', 'Prasad', 'prabhakarpd7284@gmail.com', '', '1', NULL),
('2', 'Big', 'Boss', 'bigboss7284@gmail.com', 'eva.jpg', 'B.tech IIT Mandi', 'I am Big Boss. No one cross my path.');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tagname` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tagname`) VALUES
(1, 'Competitive Coding'),
(2, 'C++'),
(3, 'Python'),
(4, 'Android Development'),
(5, 'Data Structures'),
(6, 'Linear Programming'),
(7, 'Machine Learning'),
(8, 'Deep Learning');

-- --------------------------------------------------------

--
-- Table structure for table `userblog`
--

CREATE TABLE `userblog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userblog`
--

INSERT INTO `userblog` (`id`, `user_id`, `blog_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`name`, `username`, `password`, `profession`) VALUES
('2', '1', '1', '1'),
('2', '2', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 'student'),
('1', 'prabhakarpd7284', 'prabhakarpd7284', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applyproject`
--
ALTER TABLE `applyproject`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `blogtag`
--
ALTER TABLE `blogtag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credential`
--
ALTER TABLE `credential`
  ADD PRIMARY KEY (`credential_id`);

--
-- Indexes for table `facultyinfo`
--
ALTER TABLE `facultyinfo`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `projectcredential`
--
ALTER TABLE `projectcredential`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projectimage`
--
ALTER TABLE `projectimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projecttag`
--
ALTER TABLE `projecttag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `userblog`
--
ALTER TABLE `userblog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogtag`
--
ALTER TABLE `blogtag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projecttag`
--
ALTER TABLE `projecttag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
