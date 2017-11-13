-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2017 at 06:12 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

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
(9, '2', 2, 'I want to.', NULL),
(11, 'mohan', 2, 'I love ML', 'no'),
(12, 'mohan', 4, 'I would love to work with u.\r\n', 'yes'),
(13, 'mohan', 6, 'I want to learn mysql.', NULL),
(14, 'hello', 2, 'ML is my favourite topic.', 'yes'),
(15, 'hello', 4, 'Thunderbird makes me crazy.', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `offeredby` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image_url` text NOT NULL,
  `spam` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `reads` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` text NOT NULL,
  `video_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `offeredby`, `description`, `date`, `image_url`, `spam`, `likes`, `reads`, `title`, `keywords`, `video_url`) VALUES
(1, '2', 'This will call the normal command found in our path, without using the aliased version.\r\n\r\nAssuming you did not unset it, the ll alias will be available throughout the current shell session, but when you open a new terminal window, this will not be available.\r\n\r\nTo make this persistent, we need to add this into one of the various files that is read when a shell session begins. Popular choices are ~/.bashrc and ~/.bash_profile. We just need to open the file and add the alias there:', '2017-11-13 02:15:05', 'no url', 3, 1937, 7124, 'Journey To End Of Earth', '', ''),
(2, '', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eu eros risus. Cras feugiat interdum magna, vulputate venenatis eros bibendum quis. Integer nisl lectus, tincidunt nec aliquam eget, blandit et arcu. Quisque dignissim quam risus, eu tincidunt diam varius et. Proin sollicitudin lacus leo, ut iaculis neque viverra eu. Cras sit amet mauris eget sem mollis sagittis id sed eros. Praesent eu nulla tortor. Curabitur efficitur feugiat massa id elementum. Integer at diam lectus. Integer tincidunt orci at magna dictum, vel gravida ex vulputate. Nullam congue molestie velit quis tincidunt.\r\n\r\nMorbi blandit blandit ultricies. Aliquam erat volutpat. Proin pulvinar orci et posuere maximus. Aliquam et efficitur purus, quis consectetur justo. Fusce non ex lacus. Etiam scelerisque, est quis feugiat luctus, enim felis tincidunt lectus, et imperdiet justo nunc sit amet dolor. Phasellus vestibulum in enim ut tristique. ', '2017-11-06 01:57:12', 'http://www.google.com', 45, 1200, 7004, 'The Dawn Of The World', '', ''),
(3, '', ' Praesent sagittis arcu non justo mattis, ut rutrum odio sagittis. Donec nisl risus, tempus eget rutrum sit amet, ultrices nec ex. Suspendisse suscipit lectus in libero lobortis semper. Aenean a scelerisque justo, eget tempus lorem. Aliquam rhoncus nulla massa, nec fringilla est consequat nec. Duis vel est consectetur, bibendum erat ut, sagittis diam. In risus ante, pulvinar at malesuada vitae, interdum ac purus. Duis gravida commodo lectus, nec sagittis urna. Vestibulum condimentum nisl dolor, non maximus mauris tempus ut. Aenean sit amet lectus tempus, luctus mauris quis, vulputate orci. Mauris imperdiet nisl lacus, id interdum lectus imperdiet ut. Morbi accumsan sodales ex. Fusce eu mauris vel magna finibus consectetur. Morbi vel mauris eget augue consequat eleifend. Curabitur eleifend, arcu ut pulvinar interdum, nunc ex molestie sapien, eu convallis magna lectus eu eros. Nulla gravida lacinia blandit.\r\n\r\nVestibulum libero sapien, tempus eu suscipit et, placerat id diam. Donec bibendum eget mi ac lobortis. Nullam nisi urna, vestibulum quis felis ac, hendrerit aliquam urna. In hac habitasse platea dictumst. Pellentesque sed fringilla libero. Mauris varius mi non turpis rhoncus porttitor. Sed nec lectus tempus, mattis nulla ut, egestas justo. Nulla nec bibendum elit. ', '2017-11-06 01:58:12', 'http://www.yahoo.com', 6, 456, 9002, 'This is London Baby', '', ''),
(4, '', 'Proin suscipit pharetra nisl, et bibendum lorem malesuada a. Cras vel quam et lectus tincidunt feugiat vitae eget arcu. Vestibulum sed diam in metus ultricies eleifend ut ut elit. Nunc placerat dui at laoreet tincidunt. Quisque non vestibulum justo. Pellentesque blandit laoreet volutpat. Nulla vestibulum sollicitudin accumsan. Phasellus quis urna dolor. Integer et hendrerit nulla. Fusce eget urna ante. Praesent ac nibh eu mi vestibulum ultrices vitae eu diam. Quisque luctus, quam ullamcorper posuere sagittis, justo nisl posuere lectus, in imperdiet leo elit eget augue. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin dignissim facilisis mauris sed sagittis. Fusce posuere at ipsum eget tempus. Quisque sem lectus, pharetra quis urna quis, pellentesque feugiat est. ', '2017-11-06 02:00:06', 'http://www.ask.me', 1, 520, 6423, 'Welcome To The Jungle', '', ''),
(5, '', 'The Greek War of Independence, also known as the Greek Revolution (Greek: ???????? ??????????, Elliniki Epanastasi; Ottoman: ????? ?????? Yunan ?syan? Greek Uprising), was a successful war of independence waged by the Greek revolutionaries between 1821 and 1832 against the Ottoman Empire. The Greeks were later assisted by the Russian Empire, Great Britain, the Kingdom of France, and several other European powers, while the Ottomans were aided by their vassals, the eyalets of Egypt, Algeria, and Tripolitania, and the Beylik of Tunis.\r\n\r\nEven several decades before the fall of Constantinople to the Ottoman Empire in 1453, most of Greece had come under Ottoman rule.[3] During this time, there were several revolt attempts by Greeks to gain independence from Ottoman control.[4] In 1814, a secret organization called the Filiki Eteria was founded with the aim of liberating Greece. The Filiki Eteria planned to launch revolts in the Peloponnese, the Danubian Principalities, and in Constantinople and its surrounding areas. By late 1820, the insurrection had been planned for March 25 (Julian Calendar) 1821, on the Feast of the Annunciation for the Orthodox Christians. However, as the plans of Filiki Eteria had been discovered by the Ottoman authorities, the revolutionary action started earlier. The first of these revolts began on March 6/February 22, 1821 in the Danubian Principalities, but it was soon put down by the Ottomans.', '2017-11-06 02:02:09', 'http://www.wikipedia.com', 0, 458, 8500, 'The Greek War Of Independence', '', ''),
(29, '', '<p>Once upon a time .......................................vaaki bkwaas baad mein</p>', '2017-11-12 10:18:38', '', 0, 0, 0, 'Ek Tha Tiger', '', ''),
(30, '', '<p>Once upon a time .......................................vaaki bkwaas baad mein</p>', '2017-11-12 12:23:41', '', 0, 0, 0, 'Ek Tha Tiger', '', ''),
(31, '2', '<p>sccass</p>', '2017-11-13 01:18:39', '', 0, 0, 0, 'cdascdcsx', '', ''),
(38, '2', '<p>&nbsp;DVzxvdbxfv cb </p>', '2017-11-13 01:36:42', '', 0, 0, 1, 'cfgvhb', '', ''),
(39, '2', '<p>&nbsp;DVzxvdbxfv cb </p>', '2017-11-13 01:27:30', '', 0, 0, 0, 'cfgvhb', '', ''),
(40, '2', '<p>&nbsp;DVzxvdbxfv cb </p>', '2017-11-13 01:36:05', '', 0, 0, 0, 'cfgvhb', '', ''),
(41, '2', '<p>&nbsp;DVzxvdbxfv cb </p>', '2017-11-13 01:36:38', '', 0, 0, 0, 'cfgvhb', '', ''),
(42, '2', '<p>vghbkjnkml</p>', '2017-11-13 01:37:33', '', 0, 0, 1, 'dxfcgvjhbkjn', '', ''),
(43, '2', '<p>xfcgvhjbkjn</p>', '2017-11-13 01:38:15', '', 0, 0, 1, 'bhkjnklnm, ', '', ''),
(44, '2', '<p>chgvln;lk</p>', '2017-11-13 01:51:54', '', 0, 9, 4, 'hbjnklm,', '', ''),
(45, '2', '<p>band baaja baaraaat</p>', '2017-11-13 02:26:16', '', 0, 6, 4, 'mera naam khan', '', '');

--
-- Triggers `blog`
--
DELIMITER $$
CREATE TRIGGER `delete_blogid` BEFORE DELETE ON `blog` FOR EACH ROW BEGIN
DELETE FROM blogtag WHERE blog_id = blog.blog_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `blogimage`
--

CREATE TABLE `blogimage` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogimage`
--

INSERT INTO `blogimage` (`id`, `blog_id`, `image_url`) VALUES
(1, 9, '');

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
(1, 1, 1),
(2, 3, 1),
(3, 5, 1),
(4, 2, 2),
(5, 3, 3),
(6, 8, 2),
(7, 2, 3),
(8, 5, 3),
(9, 3, 2),
(10, 3, 4),
(12, 5, 2),
(14, 5, 4),
(15, 2, 4),
(48, 8, 29),
(49, 7, 29),
(50, 3, 29),
(51, 3, 38),
(52, 3, 38),
(53, 3, 42),
(54, 0, 42),
(55, 3, 43),
(56, 0, 43),
(57, 8, 44),
(58, 7, 44),
(59, 3, 0),
(60, 0, 0),
(61, 8, 45);

-- --------------------------------------------------------

--
-- Table structure for table `facultyinfo`
--

CREATE TABLE `facultyinfo` (
  `username` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `image_url` text NOT NULL,
  `credential` varchar(255) DEFAULT NULL,
  `description` text,
  `lastblog` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facultyinfo`
--

INSERT INTO `facultyinfo` (`username`, `firstname`, `lastname`, `email`, `image_url`, `credential`, `description`, `lastblog`) VALUES
('2', 'Aditya', 'Nigam', '', '', NULL, NULL, 2147483647),
('Arti Kashyap', 'Arti', 'Kashyap', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `offeredby` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `addedon` date NOT NULL,
  `incentive` text NOT NULL,
  `lastdate` date NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `offeredby`, `title`, `description`, `addedon`, `incentive`, `lastdate`, `status`) VALUES
(1, 'Narendra Karmarkar', 'Linear Programming', 'Linear programming plays a very important role in optimization models. We can use our resources fully if we can optimize its use and this model can be formed with linear programming.', '2017-11-03', '0', '0000-00-00', 'current'),
(2, '2', 'Machine Learning', 'We want to build a machine learning model which will predict chances of landslide occurances in near locality of yours.This will also involve big data analysis techniques.', '2017-11-03', 'Rs.1500 per week.', '0000-00-00', 'available'),
(3, 'Aditya Nigam', 'Deep Learning', 'This project is intended to introduce you to basic deep learning reinforcement techniques.', '2017-11-02', '0', '0000-00-00', 'finished'),
(4, '2', 'Thunderbird mail service', 'This project aim to introduce to open source contribution.We will create a plugin for open source thunderbird mail client.', '2017-11-01', 'Rs.2000-/', '0000-00-00', 'available'),
(6, 'Arti Kashyap', 'Mysql Basics', 'MySQL (officially pronounced as \"My S-Q-L\",[6]) is an open-source relational database management system (RDBMS).[7] Its name is a combination of \"My\", the name of co-founder Michael Widenius\'s daughter,[8] and \"SQL\", the abbreviation for Structured Query Language. The MySQL development project has made its source code available under the terms of the GNU General Public License, as well as under a variety of proprietary agreements. MySQL was owned and sponsored by a single for-profit firm, the Swedish company MySQL AB, now owned by Oracle Corporation.[9] For proprietary use, several paid editions are available, and offer additional functionality.\r\nMySQL is a central component of the LAMP open-source web application software stack (and other \"AMP\" stacks). LAMP is an acronym for \"Linux, Apache, MySQL, Perl/PHP/Python\". Applications that use the MySQL database include: TYPO3, MODx, Joomla, WordPress, phpBB, MyBB, and Drupal. MySQL is also used in many high-profile, large-scale websites, including Google[10][11] (though not for searches), Facebook,[12][13][14] Twitter,[15] Flickr,[16] and YouTube.[17]', '2017-11-06', '0', '0000-00-00', 'available');

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
  `description` text,
  `lastblog` text,
  `cgpa` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`username`, `firstname`, `lastname`, `email`, `image_url`, `credential`, `description`, `lastblog`, `cgpa`) VALUES
('1', 'Prabhakar', 'Prasad', 'prabhakarpd7284@gmail.com', '', '1', NULL, NULL, '0'),
('bigboss', 'Big', 'Boss', 'bigboss7284@gmail.com', 'WIN_20170915_17_18_36_Pro.jpg', 'B.tech IIT Mandi', 'I am Big Boss. No one cross my path.', NULL, '9'),
('hello', 'Hello', 'World', '', 'fb_avatar_male.jpg', '', '', '0', '0'),
('mohan', 'mohan', 'bhagwat', '', 'fb_avatar_male.jpg', '', '', NULL, '0');

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
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profession` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`username`, `password`, `profession`) VALUES
('2', 'da4b9237bacccdf19c0760cab7aec4a8359010b0', 'faculty'),
('Arti Kashyap', 'arti', 'faculty'),
('hello', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', 'student'),
('mohan', 'abee2cb38f12d53e4682bab140e8f4b568816eee', 'student'),
('prabhakarpd7284', 'prabhakarpd7284', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);
ALTER TABLE `blog` ADD FULLTEXT KEY `title` (`title`);
ALTER TABLE `blog` ADD FULLTEXT KEY `keywords` (`keywords`);
ALTER TABLE `blog` ADD FULLTEXT KEY `offeredby` (`offeredby`);

--
-- Indexes for table `blogimage`
--
ALTER TABLE `blogimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogtag`
--
ALTER TABLE `blogtag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facultyinfo`
--
ALTER TABLE `facultyinfo`
  ADD PRIMARY KEY (`username`);
ALTER TABLE `facultyinfo` ADD FULLTEXT KEY `firstname` (`firstname`);
ALTER TABLE `facultyinfo` ADD FULLTEXT KEY `lastname` (`lastname`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);
ALTER TABLE `project` ADD FULLTEXT KEY `offeredby` (`offeredby`);
ALTER TABLE `project` ADD FULLTEXT KEY `title` (`title`);

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
ALTER TABLE `studentinfo` ADD FULLTEXT KEY `firstname` (`firstname`);
ALTER TABLE `studentinfo` ADD FULLTEXT KEY `lastname` (`lastname`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);
ALTER TABLE `tag` ADD FULLTEXT KEY `tagname` (`tagname`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `blogimage`
--
ALTER TABLE `blogimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogtag`
--
ALTER TABLE `blogtag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `projectimage`
--
ALTER TABLE `projectimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
