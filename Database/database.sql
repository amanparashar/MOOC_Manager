-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 20, 2015 at 09:37 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `courseware`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(20) NOT NULL,
  `admin_pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_pass`) VALUES
('aayushya', 'dbms'),
('aman', 'dbms');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`cid` int(20) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `syllabus` varchar(255) NOT NULL,
  `professor` varchar(20) NOT NULL,
  `c_univ` varchar(20) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `cname`, `subject`, `syllabus`, `professor`, `c_univ`, `start_time`, `end_time`) VALUES
(3, 'Graphs', 'Science', 'Mirroring,Spline Curves,Properties', 'Albert Einstien', 'World', '2014-12-31', '2014-12-30'),
(7, 'hello', 'computer', 'programming,maths', 'Newton', 'NPTEL', '2015-04-05', '2015-04-16'),
(9, 'History_Seekers', 'History', 'Medieval History', 'Thaddeus', 'Berklee', '2015-04-30', '2015-04-30'),
(10, 'Disney', 'History', 'Mickey,Minni,Goofy,Company', 'Walt', 'Earth', '2015-04-30', '2015-05-30'),
(11, 'Meteors', 'Geology', 'Rocks, Compounds, Earth suface', 'Matthew Rim', 'Harvard', '2015-04-01', '2015-06-13'),
(12, 'Cars', 'Vehicles', 'Nissan,Motors,Ford', 'Issac', 'Mars', '2015-07-31', '2015-12-30'),
(13, 'Hindi', 'Language', 'Sanskrit,Devnagri ', 'Issac', 'Mars', '2015-12-31', '2016-01-03'),
(14, 'Meteors', 'Astronomy', 'Universe', 'Issac', 'Mars', '2015-11-30', '2016-11-07'),
(15, 'Graphs', 'History', 'Medieval History', 'Issac', 'Mars', '2015-12-31', '2016-01-30'),
(16, 'Maths', 'computer', 'programming,maths', 'Thaddeus', 'Michigan', '2014-01-31', '2016-01-01'),
(17, 'Japanese', 'Language', 'Basics,Grammar', 'Thaddeus', 'Michigan', '2015-12-31', '2017-11-30'),
(18, 'Japanese', 'Language', 'Basics,Grammar', 'Thaddeus', 'Michigan', '2015-12-31', '2017-11-30');

--
-- Triggers `courses`
--
DELIMITER //
CREATE TRIGGER `course_check` BEFORE INSERT ON `courses`
 FOR EACH ROW begin
if (floor(datediff(new.start_time,new.end_time))>0 or
   floor(datediff(now(),new.end_time))>0) 
then
signal sqlstate '45000'
set message_text= "Invalid Course Dates";
end if;

if (length(new.cname)<1)
then
signal sqlstate '45000'
set message_text= "Course Name cannot be blank";
end if;

if (length(new.subject)<1)
then
signal sqlstate '45000'
set message_text= "Subject Name cannot be blank";
end if;

if (length(new.syllabus)<1)
then
signal sqlstate '45000'
set message_text= "Syllabus Cannot be blank";
end if;

if (length(new.professor)<1)
then
signal sqlstate '45000'
set message_text= "Professor Name cannot be blank";
end if;

if (length(new.c_univ)<1)
then
signal sqlstate '45000'
set message_text= "University Name cannot be blank";
end if;

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pcrelation`
--

CREATE TABLE IF NOT EXISTS `pcrelation` (
  `pid` varchar(20) NOT NULL,
  `cid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcrelation`
--

INSERT INTO `pcrelation` (`pid`, `cid`) VALUES
('123456', 18);

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE IF NOT EXISTS `relation` (
  `user_id` varchar(20) NOT NULL DEFAULT '',
  `cid` int(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`user_id`, `cid`) VALUES
('123456', 3),
('123456', 10),
('123456', 11),
('123456', 14),
('123456', 16),
('123456', 17);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `pid` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `puniv` varchar(20) NOT NULL,
  `pdob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`pid`, `pname`, `puniv`, `pdob`) VALUES
('111111', 'Issac', 'Mars', '1989-04-29'),
('123456', 'Thaddeus', 'Michigan', '1996-04-06'),
('145', 'J.K', 'NPTEL', '2015-04-21'),
('1492', 'Thaddeus', 'Berklee', '2015-04-13');

--
-- Triggers `teacher`
--
DELIMITER //
CREATE TRIGGER `teacher_check` BEFORE INSERT ON `teacher`
 FOR EACH ROW begin
if (floor(datediff(now(),new.pdob)/365)<18)
then
signal sqlstate '45000'
set message_text= "Teacher should be 18 year old";
end if;

if (length(new.pid)<6)
then
signal sqlstate '45000'
set message_text= "Teacher ID should be of 6 digits";
end if;

if (length(new.pname)<1)
then
signal sqlstate '45000'
set message_text= "Professor Name cannot be blank";
end if;

if (length(new.puniv)<1)
then
signal sqlstate '45000'
set message_text= "University Name cannot be blank";
end if;

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `university` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_pass`, `username`, `university`, `dob`) VALUES
('123456', '456789', 'Kshitij Singh', 'Anna', '2015-04-08'),
('1234567', 'abcdef', 'Ricky Bahl', 'Mithibai College', '2014-04-13'),
('777777', 'parties', 'Steve Smith', 'IIN', '2013-11-30');

--
-- Triggers `user`
--
DELIMITER //
CREATE TRIGGER `user_check` BEFORE INSERT ON `user`
 FOR EACH ROW begin
if (floor(datediff(now(),new.dob)/365)<0 or floor(datediff(now(),new.dob)/365)>150)
then
signal sqlstate '45000'
set message_text= "Invalid Date of Birth";
end if;

if (length(new.user_id)<6)
then
signal sqlstate '45000'
set message_text= "User ID should be of length 6";
end if;

if (length(new.user_pass)<6)
then
signal sqlstate '45000'
set message_text= "User Password should be of length 6";
end if;

if (length(new.username)<1)
then
signal sqlstate '45000'
set message_text= "User Name Canot be blank";
end if;

if (length(new.university)<1)
then
signal sqlstate '45000'
set message_text= "University Name cannot be blank";
end if;

end
//
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `pcrelation`
--
ALTER TABLE `pcrelation`
 ADD PRIMARY KEY (`pid`,`cid`), ADD KEY `cid` (`cid`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
 ADD PRIMARY KEY (`user_id`,`cid`), ADD KEY `cid` (`cid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `cid` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pcrelation`
--
ALTER TABLE `pcrelation`
ADD CONSTRAINT `pcrelation_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `teacher` (`pid`) ON DELETE CASCADE,
ADD CONSTRAINT `pcrelation_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`) ON DELETE CASCADE;

--
-- Constraints for table `relation`
--
ALTER TABLE `relation`
ADD CONSTRAINT `relation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE,
ADD CONSTRAINT `relation_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
