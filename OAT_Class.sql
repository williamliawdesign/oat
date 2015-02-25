-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Dec 11, 2014 at 06:45 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `OAT Class`
--

-- --------------------------------------------------------

--
-- Table structure for table `Courses`
--

CREATE TABLE `Courses` (
`ID` int(11) NOT NULL,
  `Abbrevation` varchar(6) NOT NULL,
  `Number` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Credits` int(11) NOT NULL,
  `Description` text NOT NULL,
  `PDF_Location` varchar(255) NOT NULL,
  `PDF_Name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Courses`
--

INSERT INTO `Courses` (`ID`, `Abbrevation`, `Number`, `Title`, `Credits`, `Description`, `PDF_Location`, `PDF_Name`) VALUES
(1, 'OATP', 1000, 'Communication Skills', 5, 'This course has been designed to assist students in the acquisition, application and development of professional skills. Topics covered include, but are not limited to: interview skills, career planning, time management, team building and conflict resolution skills', 'pdf/OATP_1000_-_Communication_Skills.pdf', 'Communication Skills PDF'),
(2, 'OATP', 1200, 'Business Development', 6, 'This course has been designed to assist students in the acquisition, application and development of business skills to function effectively as an office administrator. Topics covered include, but are not limited to: financial reporting, business writing, customer service, public speaking, and presentation skills.', 'pdf/OATP_1200_-_Business_Development.pdf', 'Business Development PDF'),
(3, 'OATP', 2000, 'Information Technology', 24, 'This course has been designed to give students intermediate to advanced skills in the computer applications most commonly used in business. Topics covered include, but are not limited to: Microsoft Office, Visio, computerized accounting, desktop publishing, and Web site development.', 'pdf/OATP_1000_-_Information_Technology.pdf', 'Information Technology PDF'),
(4, 'OATP', 3000, 'Work Term', 24, 'This work practicum provides students with the opportunity to augment their classroom training and demonstrate learned business technology in a related position. Students will acquire and further refine their skills through real-world work experiences and potential mentor relationships with work practicum employers. Students working in an administrative related position may be able to use their employment in lieu of a work practicum.', 'pdf/OATP_1000_-_Work_Term.pdf', 'Work Term PDF');

-- --------------------------------------------------------

--
-- Table structure for table `Schedule`
--

CREATE TABLE `Schedule` (
`ID` int(11) NOT NULL,
  `Week` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Duration` decimal(2,1) NOT NULL,
  `Course_Name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Room` int(11) DEFAULT '310',
  `Instructor` varchar(255) CHARACTER SET latin1 DEFAULT 'Will Smith',
  `Instructor_E-Mail` varchar(255) CHARACTER SET latin1 DEFAULT 'willsmith@bcit.ca',
  `Holiday` tinyint(1) NOT NULL,
  `Exam` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Schedule`
--

INSERT INTO `Schedule` (`ID`, `Week`, `Date`, `Duration`, `Course_Name`, `Room`, `Instructor`, `Instructor_E-Mail`, `Holiday`, `Exam`) VALUES
(1, 1, '2014-11-03', 0.5, 'Orientation', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(2, 1, '2014-11-03', 0.5, 'Team Building', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(3, 1, '2014-11-04', 1.0, 'Study Skills', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(4, 1, '2014-11-05', 0.5, 'Intro to Computing', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(5, 1, '2014-11-05', 0.5, 'MS Word 2013', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(6, 1, '2014-11-06', 2.0, 'MS Word 2013', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(8, 2, '2014-11-10', 1.0, 'MS Word', 300, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(9, 2, '2014-11-11', 1.0, 'Remembrance Day - Holiday', NULL, NULL, NULL, 1, 0),
(10, 2, '2014-11-12', 2.0, 'MS Word 2013', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(12, 2, '2014-11-14', 1.0, 'Managing Meetings', 481, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(13, 3, '2014-11-17', 1.0, 'Self Study Day', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(14, 3, '2014-11-18', 2.0, 'MS PowerPoint 2013', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(15, 3, '2014-11-20', 1.0, 'MS Outlook', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(16, 3, '2014-11-21', 1.0, 'Self Study Day', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(17, 4, '2014-11-24', 1.0, 'Word Exam', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 1),
(18, 4, '2014-11-25', 1.0, 'MS Excel 2013', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(19, 4, '2014-11-26', 1.0, 'Publisher', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(20, 4, '2014-11-27', 2.0, 'MS Excel', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(21, 5, '2014-12-01', 2.0, 'MS Excel 2013', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(22, 5, '2014-12-03', 1.0, 'MS Visio', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(23, 5, '2014-12-04', 1.0, 'MS Excel 2013', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(24, 5, '2014-12-05', 1.0, 'Self Study Day', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(25, 6, '2014-12-08', 1.0, 'Presentation Skills', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(26, 6, '2014-12-09', 1.0, 'Self Study Day', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(27, 6, '2014-12-10', 1.0, 'Excel Exam', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 1),
(28, 6, '2014-12-11', 1.0, 'Resume Skills', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(29, 6, '2014-12-12', 1.0, 'Using Social Media', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(30, 7, '2015-01-05', 5.0, 'MS Access 2013 / PP Presentation', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(31, 8, '2015-01-12', 3.0, 'MS Access 2013 / PP Presentation', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(32, 8, '2015-01-15', 1.0, 'Conflict Resolution', 481, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(33, 8, '2015-01-16', 1.0, 'Resume 1 - 1', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(34, 9, '2015-01-19', 3.0, 'Accounting', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(35, 9, '2015-01-22', 1.0, 'Resume 1 - 1', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(36, 9, '2015-01-23', 1.0, 'Accounting', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(37, 10, '2015-01-26', 3.0, 'Accounting', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(38, 10, '2015-01-29', 2.0, 'Adobe Acrobat', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(39, 11, '2015-02-02', 1.0, 'Accounting', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(40, 11, '2015-02-03', 0.5, 'Accounting', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(41, 11, '2015-02-03', 0.5, 'Photographs', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(42, 11, '2015-02-04', 1.0, 'Interview Skills', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(43, 11, '2015-02-05', 2.0, 'Web Design', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(44, 12, '2015-02-09', 1.0, 'Family Day - Holiday', NULL, NULL, NULL, 1, 0),
(45, 12, '2015-02-10', 1.0, 'Web Design', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(46, 12, '2015-02-11', 1.0, 'Word Press', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(47, 12, '2015-02-12', 2.0, 'Web Design', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(48, 13, '2015-02-16', 2.0, 'Web Design', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(49, 13, '2015-02-18', 1.0, 'Interview Skills', 400410, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(50, 13, '2015-02-19', 1.0, 'Web / Photoshop Presentations', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0),
(51, 13, '2015-02-20', 1.0, 'Job Search', 310, 'Will Smith', 'willsmith@bcit.ca', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
`ID` int(11) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Middlename` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Function` varchar(255) NOT NULL,
  `Phonenumber` varchar(12) NOT NULL,
  `E-Mail` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`ID`, `Firstname`, `Middlename`, `Lastname`, `Function`, `Phonenumber`, `E-Mail`) VALUES
(1, 'Lorraine', NULL, 'Fentie', 'Program Coordinator / Instructor', '604-412-7710', 'lorraine_fentie@bcit.ca'),
(2, 'Debra', NULL, 'Williams', 'Program Head / Instructor', '604-412-7695', 'debra_williams@bcit.ca'),
(3, 'Ron', NULL, 'Terencio', 'Program Coordinator', '604-412-7622', 'ron_terencio@bcit.ca'),
(4, 'Rhonda', NULL, 'Ewashko', 'Program Assistant', '604-412-7727', 'rhonda_ewashko@bcit.ca');

-- --------------------------------------------------------

--
-- Table structure for table `Students`
--

CREATE TABLE `Students` (
`ID` int(11) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Middlename` varchar(255) DEFAULT NULL,
  `Lastname` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `E-Mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Students`
--

INSERT INTO `Students` (`ID`, `Firstname`, `Middlename`, `Lastname`, `URL`, `E-Mail`) VALUES
(1, 'Maira', NULL, 'Afzal', 'oat.htp.bcit.ca/sites/mafzal', NULL),
(2, 'Anna', NULL, 'Apanasova', 'oat.htp.bcit.ca/sites/aapanasova', NULL),
(3, 'Umme', NULL, 'Aziz', 'oat.htp.bcit.ca/sites/uaziz', NULL),
(4, 'Sherri', NULL, 'Baxter', 'oat.htp.bcit.ca/sites/sbaxter', NULL),
(5, 'Beatriz', NULL, 'Becerra', 'oat.htp.bcit.ca/sites/bbecerra', NULL),
(6, 'Ifran', NULL, 'Cameron', 'oat.htp.bcit.ca/sites/icameron', NULL),
(7, 'Anika', NULL, 'Cupid', 'oat.htp.bcit.ca/sites/acupid', NULL),
(8, 'Shamini', NULL, 'Emmanuel', 'oat.htp.bcit.ca/sites/semmanuel', NULL),
(9, 'Makda', NULL, 'Gino', 'oat.htp.bcit.ca/sites/mgino', NULL),
(10, 'Maya', NULL, 'Kennedy', 'oat.htp.bcit.ca/sites/mkennedy', NULL),
(11, 'Alanna', NULL, 'MacLennan', 'oat.htp.bcit.ca/sites/amaclennan', NULL),
(12, 'Jennifer', NULL, 'McNeil', 'oat.htp.bcit.ca/sites/jmcneil', NULL),
(13, 'Patricia', NULL, 'Nand', 'oat.htp.bcit.ca/sites/pnand', NULL),
(14, 'Beatrice', 'Aiko', 'Park', 'oat.htp.bcit.ca/sites/bpark', NULL),
(15, 'Regina', NULL, 'Pena', 'oat.htp.bcit.ca/sites/rpena', NULL),
(16, 'Neeta', NULL, 'Randhawa', 'oat.htp.bcit.ca/sites/nrandhawa', NULL),
(17, 'Adelaide', NULL, 'Roxas', 'oat.htp.bcit.ca/sites/aroxas', NULL),
(18, 'Catherine', NULL, 'Sinclair', 'oat.htp.bcit.ca/sites/csinclair', NULL),
(19, 'Thusara', NULL, 'Suresh', 'oat.htp.bcit.ca/sites/tsuresh', NULL),
(20, 'Laura', NULL, 'Valasquez', 'oat.htp.bcit.ca/sites/lvalasquez', NULL),
(21, 'Naomi', NULL, 'West', 'oat.htp.bcit.ca/sites/nwest', NULL),
(22, 'Taeko', NULL, 'Yasui', 'oat.htp.bcit.ca/sites/tyasui', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Courses`
--
ALTER TABLE `Courses`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Schedule`
--
ALTER TABLE `Schedule`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Students`
--
ALTER TABLE `Students`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Courses`
--
ALTER TABLE `Courses`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Schedule`
--
ALTER TABLE `Schedule`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `Staff`
--
ALTER TABLE `Staff`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Students`
--
ALTER TABLE `Students`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
