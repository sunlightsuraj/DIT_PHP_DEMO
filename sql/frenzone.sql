-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2015 at 12:58 अपराह्न
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `frenzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendrequest`
--

CREATE TABLE IF NOT EXISTS `friendrequest` (
`friendrequestid` bigint(11) NOT NULL,
  `fromid` bigint(11) NOT NULL,
  `toid` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE IF NOT EXISTS `friendship` (
`friendshipid` bigint(11) NOT NULL,
  `userid` bigint(11) NOT NULL,
  `friendid` bigint(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `friendship`
--

INSERT INTO `friendship` (`friendshipid`, `userid`, `friendid`) VALUES
(65, 8, 1),
(68, 2, 8),
(69, 2, 1),
(71, 1, 10),
(72, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`statusid` int(11) NOT NULL,
  `statuscode` bigint(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `postdate` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusid`, `statuscode`, `userid`, `status`, `postdate`) VALUES
(19, 3001, 1, 'Hello World!', '2015-04-10'),
(20, 3002, 2, 'hello its sunlight', '2015-04-14'),
(21, 3003, 8, 'Hello Its Prekshya', '2015-04-14'),
(22, 3004, 1, 'Na Na Na Na', '2015-04-14'),
(23, 3005, 1, 'Oh Na Na', '2015-04-14'),
(24, 3006, 1, 'Oh ekpalme', '2015-04-14'),
(25, 3007, 1, 'Na Na Na Na Na Na Na Na', '2015-04-14'),
(26, 3008, 1, 'New Post', '2015-04-14'),
(27, 3009, 1, 'Another Post', '2015-04-14'),
(28, 3010, 1, 'asdfdddddddddddddddddddddddddddddddddddddddddddddd', '2015-04-15'),
(29, 3011, 1, 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2015-04-15'),
(30, 3012, 1, 'asfasdf', '2015-04-18'),
(31, 3013, 9, 'happy', '2015-04-19'),
(32, 3014, 10, 'heavy work full of tension', '2015-04-19'),
(33, 3015, 10, 'hahahahha hahahahhahahah', '2015-04-19'),
(34, 3016, 10, 'felling', '2015-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `statuscomment`
--

CREATE TABLE IF NOT EXISTS `statuscomment` (
`commentid` int(11) NOT NULL,
  `statusid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `commentdate` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `statuscomment`
--

INSERT INTO `statuscomment` (`commentid`, `statusid`, `userid`, `comment`, `commentdate`) VALUES
(6, 29, 1, 'hello', '2015-04-15'),
(7, 29, 1, 'asdf', '2015-04-15'),
(8, 29, 1, 'asfd', '2015-04-15'),
(9, 29, 2, 'asdfljsdlkfj', '2015-04-16'),
(10, 32, 10, 'hagshasgha', '2015-04-19'),
(11, 33, 10, 'hjahjshajsa', '2015-04-19'),
(12, 33, 10, 'hjsahjahsjahs', '2015-04-19'),
(13, 33, 10, 'jashjahsja', '2015-04-19'),
(14, 32, 10, 'asdf', '2015-04-19'),
(15, 32, 10, 'asf', '2015-04-19'),
(16, 32, 10, 'asf', '2015-04-19'),
(17, 32, 10, 'sdf', '2015-04-19'),
(18, 33, 10, 'asf', '2015-04-19'),
(19, 30, 1, 'afs', '2015-04-19'),
(20, 34, 9, 'yaaa', '2015-04-19'),
(21, 34, 9, 'yahoo', '2015-04-19'),
(22, 34, 1, 'asfd', '2015-04-22'),
(23, 33, 1, 'jkll', '2015-04-22'),
(24, 33, 1, 'hkjhkjh', '2015-04-22'),
(25, 34, 1, 'jkljlkj', '2015-04-22'),
(26, 27, 1, 'kjn', '2015-04-22'),
(27, 32, 1, 'nknkj', '2015-04-22');

-- --------------------------------------------------------

--
-- Table structure for table `statuslike`
--

CREATE TABLE IF NOT EXISTS `statuslike` (
`likeid` bigint(11) NOT NULL,
  `statusid` bigint(11) NOT NULL,
  `userid` bigint(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `statuslike`
--

INSERT INTO `statuslike` (`likeid`, `statusid`, `userid`) VALUES
(15, 21, 2),
(17, 21, 1),
(19, 24, 1),
(20, 27, 1),
(22, 28, 1),
(23, 29, 2),
(26, 29, 1),
(27, 32, 10),
(28, 30, 1),
(29, 34, 9);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`userid` bigint(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `useraddress` varchar(50) NOT NULL,
  `userphone` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `p_photo` varchar(255) NOT NULL,
  `c_photo` varchar(255) NOT NULL,
  `bloodgroup` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dor` varchar(50) NOT NULL,
  `online` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `fname`, `mname`, `lname`, `useraddress`, `userphone`, `useremail`, `gender`, `dob`, `p_photo`, `c_photo`, `bloodgroup`, `username`, `password`, `dor`, `online`) VALUES
(1, 'Suraj', '', 'Shrestha', 'Kalyanpur', '', '', 'male', '', 'images/userprofilepics/sunlightsuraj_profile-1305195456.jpg', 'images/userprofilepics/sunlightsuraj_cover-1205535351.jpg', '', 'sunlightsuraj', '8bbc062119169d18dd957f12c769161c', '2015-04-01', 0),
(2, 'Suraj', '', 'Shrestha', '', '', '', 'male', '', 'images/userprofilepics/userphoto.jpg', 'images/userprofilepics/usercover.jpg', '', 'sunlight', '8bbc062119169d18dd957f12c769161c', '2015-04-01', 1),
(8, 'Prekshya', '', 'Sharma', '', '', '', 'female', '', 'images/userprofilepics/userphoto.jpg', 'images/userprofilepics/usercover.jpg', '', 'peru', '2b05418fe98f12edc6c04b759f5e0fc4', '2015-04-14', 0),
(9, 'rabin', '', 'bhattarai', '', '', '', 'male', '', 'images/userprofilepics/rabin_profile-772062099.png', 'images/userprofilepics/rabin_cover-718594871.jpg', '', 'rabin', '47912d7bac856ebebc28455871344e88', '2015-04-19', 0),
(10, 'sudarshan', '', 'sharma', '', '', '', 'male', '', 'images/userprofilepics/sudarshan_profile-1320935469.jpg', 'images/userprofilepics/sudarshan_cover-1399596202.jpg', '', 'sudarshan', 'fc645fef0231725b6442a6aaf9389fb2', '2015-04-19', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendrequest`
--
ALTER TABLE `friendrequest`
 ADD PRIMARY KEY (`friendrequestid`);

--
-- Indexes for table `friendship`
--
ALTER TABLE `friendship`
 ADD PRIMARY KEY (`friendshipid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`statusid`), ADD UNIQUE KEY `statuscode` (`statuscode`);

--
-- Indexes for table `statuscomment`
--
ALTER TABLE `statuscomment`
 ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `statuslike`
--
ALTER TABLE `statuslike`
 ADD PRIMARY KEY (`likeid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendrequest`
--
ALTER TABLE `friendrequest`
MODIFY `friendrequestid` bigint(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `friendship`
--
ALTER TABLE `friendship`
MODIFY `friendshipid` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `statusid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `statuscomment`
--
ALTER TABLE `statuscomment`
MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `statuslike`
--
ALTER TABLE `statuslike`
MODIFY `likeid` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `userid` bigint(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
