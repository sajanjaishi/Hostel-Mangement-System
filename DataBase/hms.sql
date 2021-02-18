-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 07:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `ComplainID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Reason` varchar(120) NOT NULL,
  `ComplainStatus` char(1) NOT NULL,
  `ComplainDate` date NOT NULL,
  `usertype` char(1) DEFAULT NULL,
  `subject` varchar(40) NOT NULL,
  `Action` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`ComplainID`, `username`, `Reason`, `ComplainStatus`, `ComplainDate`, `usertype`, `subject`, `Action`) VALUES
(2, 'babu', 'Room facilities is not proper', 'A', '2019-06-05', 'S', 'room', 'Accepted'),
(7, 'ramu', 'Room facilities is not proper', 'A', '2019-06-05', 'S', 'room', 'Accepted'),
(8, 'ramu', 'Room facilities is not proper', 'A', '2019-06-05', 'S', 'room', 'Accepted'),
(22, 'dhaval12', 'not clean', 'A', '2019-06-26', 'S', 'room', 'Accepted'),
(23, 'ravi1105', 'not clean', 'A', '2019-06-27', 'S', 'washroom', 'Accepted'),
(24, 'ravi1105', 'dfsdfsdf', 'P', '2021-02-05', 'S', 'washroom', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leave_module`
--

CREATE TABLE `leave_module` (
  `LeaveID` int(11) NOT NULL,
  `Username` varchar(15) DEFAULT NULL,
  `FromDateTime` date NOT NULL,
  `ToDateTime` date NOT NULL,
  `AppliedDate` date NOT NULL,
  `Reason` varchar(120) NOT NULL,
  `P_Status` char(1) DEFAULT NULL,
  `W_Status` char(1) DEFAULT NULL,
  `rejectReason` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_module`
--

INSERT INTO `leave_module` (`LeaveID`, `Username`, `FromDateTime`, `ToDateTime`, `AppliedDate`, `Reason`, `P_Status`, `W_Status`, `rejectReason`) VALUES
(3, 'ramu', '2019-06-20', '2019-06-29', '2019-06-06', 'Not well', 'R', 'P', 'Parent Reject'),
(4, 'ramu', '2019-06-12', '2019-06-13', '2019-06-11', 'not well', 'A', 'R', 'Warden Reject'),
(5, 'ravi1105', '2019-06-30', '2019-07-03', '2019-06-27', 'm going to home', 'P', 'P', 'NULL'),
(8, 'ravi1105', '2021-02-16', '2021-02-18', '2021-02-05', 'dsdsdasda', 'P', 'P', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `parents_registration_master`
--

CREATE TABLE `parents_registration_master` (
  `Student_username` varchar(15) DEFAULT NULL,
  `Username` varchar(255) NOT NULL,
  `ParentsName` varchar(30) NOT NULL,
  `Emaild` varchar(255) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents_registration_master`
--

INSERT INTO `parents_registration_master` (`Student_username`, `Username`, `ParentsName`, `Emaild`, `Contact`, `Password`) VALUES
('ramu', 'babu', 'babu yada', 'babu123@gmail.com', '8855444421', 'babu123'),
('dhaval12', 'ksdksdhka', 'kasadks', 'kashdkh', 'kashdk', 'kdjhd'),
('ramu', 'ramesh', 'rameshbhai', 'ramesh@gmail.com', '9988775544', 'ramesh123');

-- --------------------------------------------------------

--
-- Table structure for table `room_allocation`
--

CREATE TABLE `room_allocation` (
  `Student_username` varchar(15) NOT NULL,
  `RoomNumber` varchar(5) NOT NULL,
  `AllocateDate` date NOT NULL,
  `LastRoomChangeDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_allocation`
--

INSERT INTO `room_allocation` (`Student_username`, `RoomNumber`, `AllocateDate`, `LastRoomChangeDate`) VALUES
('dhaval12', '101', '2019-06-11', NULL),
('ramu', '301', '2019-06-26', NULL),
('ravi1105', '303', '2019-06-27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_detail_master`
--

CREATE TABLE `room_detail_master` (
  `roomNumber` varchar(5) NOT NULL,
  `roomType` char(1) NOT NULL,
  `seater` char(1) NOT NULL,
  `vacantSeat` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_detail_master`
--

INSERT INTO `room_detail_master` (`roomNumber`, `roomType`, `seater`, `vacantSeat`) VALUES
('101', 'A', '1', '0'),
('102', 'N', '2', '2'),
('103', 'N', '4', '4'),
('201', 'A', '2', '2'),
('202', 'N', '4', '4'),
('203', 'A', '4', '4'),
('301', 'A', '1', '0'),
('302', 'N', '3', '2'),
('303', 'A', '3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration_master`
--

CREATE TABLE `student_registration_master` (
  `Username` varchar(15) NOT NULL,
  `Fullname` varchar(30) NOT NULL,
  `Category` varchar(10) NOT NULL,
  `PermanentAddress` varchar(210) NOT NULL,
  `PostalAddress` varchar(210) DEFAULT NULL,
  `Contact` varchar(10) DEFAULT NULL,
  `Semester` int(11) NOT NULL,
  `Course` varchar(20) NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `BirthDate` date NOT NULL,
  `EmailID` varchar(255) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `RegistrstionDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_registration_master`
--

INSERT INTO `student_registration_master` (`Username`, `Fullname`, `Category`, `PermanentAddress`, `PostalAddress`, `Contact`, `Semester`, `Course`, `Gender`, `BirthDate`, `EmailID`, `Password`, `RegistrstionDate`) VALUES
('aa', 'aa', 'Sc', 'aa', 'aa', '', 1, 'Bca', 'Male', '0000-00-00', 'aa', 'aa', '2019-06-27'),
('aaa', 'aaa', 'Obc', 'aa', 'aa', '', 1, 'Bca', 'Male', '0000-00-00', 'aaa', 'aa', '2019-06-27'),
('aaaaa', 'aaaa', 'Sc', 'yfugk', 'kjgjk', '', 1, 'Bca', 'Male', '0000-00-00', 'j', 'ifutg', '2019-06-27'),
('abc', 'a', 'General', 'surat', 'gujarat 395004', 'kkkk', 2, 'Mca', 'Male', '0000-00-00', 'jjjj', '123', '2019-06-27'),
('agd', 'jkgui', 'Sc', 'jg', 'vj', 'chj', 1, 'Bca', 'Male', '0000-00-00', 'hj', 'v', '2019-06-27'),
('ddfd', 'sff', 'Sc', 'ROOM-10,A/B-52-53,HARIOM NAGER SOC,KATARGAM ROAD SURAT.395004', 'Surat', '7418529633', 1, 'Bca', 'Male', '2021-02-09', 'd@gmail.com', 'fdfdfg', '2021-02-05'),
('Dhaval', 'Italiya', 'General', 'sjdaksd', 'ksdkjs', '9535790981', 3, 'Mca', 'Male', '0000-00-00', 'dhaval.a.italiya@gmail.com', 'Dhaval@pali', '2021-02-05'),
('dhaval12', 'Dhaval Patel', 'St', 'Rushikesh surat', 'Surat Gujrat', '9879804445', 4, 'Mba', 'Male', '1998-10-07', 'dhaval@gmail.com', 'dhaval123', '2019-05-29'),
('dhjkhd', 'jdhfjkh', 'Sc', '', '', '', 1, 'Bca', 'Male', '2020-05-20', 'sffsfdf', '', '2021-02-05'),
('djhj', 'dj', 'Sc', '', '', '', 1, 'Bca', 'Male', '0000-00-00', 'sdfsdffs', '', '2021-02-05'),
('dvs', 'dsdsv', 'Sc', 'sdvd', '626', '2464', 1, 'Bca', 'Male', '0000-00-00', 'wfsdv', 'juygfug', '2019-06-27'),
('dwqw', 'kjgfgj', 'Sc', 'sfsdf', '12', '1234567891', 1, 'Bca', 'Male', '1997-08-06', 'asadas', 'sfasfsa', '2019-06-27'),
('egweg', 'rgerg', 'Sc', 'fweg', 'eeweg`', '56446', 1, 'Bca', 'Male', '0000-00-00', 'dveg', 'dwegwg', '2019-06-27'),
('gurhrhe', 'hfhfh', 'Sc', '', '', '', 1, 'Bca', 'Male', '0000-00-00', 'sfdsdffs', '', '2021-02-05'),
('jdjf', ',jfj', 'Sc', '', '', '', 1, 'Bca', 'Male', '0000-00-00', 'sdfdsff', '', '2021-02-05'),
('jsdjkf', 'jfdkjf', 'Sc', '', '', '', 1, 'Bca', 'Male', '0000-00-00', 'sdfsdfsf', '', '2021-02-05'),
('kkdsdkf', 'hfghjgf', 'Sc', '', '', '', 1, 'Bca', 'Male', '2020-10-20', 'scds', '', '2021-02-05'),
('lfsfjdf', 'flfjg', 'Sc', '', '', '', 1, 'Bca', '', '0000-00-00', 'asddd', '', '2021-02-05'),
('q', 'q', 'Sc', 'sdad', 'hghf', '9879879879', 1, 'Bca', 'Male', '1998-08-07', 's', 'hjf', '2019-06-27'),
('qwfqf', 'fyufug', 'Sc', 'vgh', 'jghj', '9988774455', 1, 'Bca', 'Male', '0000-00-00', 'jhvcgj', 'h', '2019-06-27'),
('ramu', 'Ram Patel', 'obc', 'Surat Gujrat 395004', 'Surat', '9966332255', 2, 'mca', 'male', '2015-10-07', 'ram122@gmail.com', 'ramu123', '2019-05-29'),
('ravi1105', 'Ravi Savani', 'St', 'ROOM-10,A/B-52-53,HARIOM NAGER SOC,KATARGAM ROAD SURAT.395004', 'Bengaluru Karnataka', '8899556633', 1, 'Mba', 'Male', '1999-02-23', 'goti840@gmail.com', 'ravi1105', '2019-06-09'),
('ronak124', 'Ronak babariya', 'Sc', 'ROOM-10,A/B-52-53,HARIOM NAGER SOC,KATARGAM ROAD SURAT.395004', 'Surat', '9517531254', 1, 'Bca', 'Male', '2002-01-08', 'r@gmail.com', 'rk123456', '2021-02-05'),
('sdvsv', 'khgug', 'Sc', 'sdv', 'feeeeeeeew', '55556', 1, 'Bca', 'Male', '0000-00-00', 'dvdsv', 'efef', '2019-06-27'),
('shgd', 'dfg', 'Sc', '', '', '', 1, 'Bca', 'Male', '0000-00-00', 'safsafasfa', '', '2021-02-05'),
('shyam', 'shyam yadav', 'Sc', 'ram nager', 'up', '8855443322', 3, 'Bca', 'Male', '1998-05-03', 'shyam@gmail.com', 'shyam123', '2019-05-30'),
('sjdjf', 'dbfjfb', 'Sc', '', '', '', 1, 'Bca', 'Male', '0000-00-00', '', '', '2021-02-05'),
('skjdhksd', 'djfhjfh', 'Sc', 'ROOM-10,A/B-52-53,HARIOM NAGER SOC,KATARGAM ROAD SURAT.395004', 'Surat', '9638583172', 1, 'Bca', 'Male', '0000-00-00', 'goti840@gmail.com', 'gfsdgf', '2021-02-05'),
('tt', 'jbbkj', 'Sc', 'kkgk', 'jjk', '', 1, 'Bca', 'Male', '0000-00-00', 'ugui', 'kg,', '2019-06-27'),
('yfg', 'kgu', 'Sc', 'ggh', 'iugiu', '', 1, 'Bca', 'Male', '0000-00-00', 'egweg', 'giukbk', '2019-06-27'),
('zdjfk', 'sdfkjd', 'Sc', '', '', '', 1, 'Bca', 'Male', '2001-05-25', '', '', '2021-02-05'),
('zzz', 'hfdhjf', 'Sc', 'fewf', 'fwf', '', 1, 'Bca', 'Male', '0000-00-00', 'eefewf', 'wfwf', '2019-06-27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`ComplainID`);

--
-- Indexes for table `leave_module`
--
ALTER TABLE `leave_module`
  ADD PRIMARY KEY (`LeaveID`),
  ADD KEY `EnrollNumber` (`Username`);

--
-- Indexes for table `parents_registration_master`
--
ALTER TABLE `parents_registration_master`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `Student_username` (`Student_username`);

--
-- Indexes for table `room_allocation`
--
ALTER TABLE `room_allocation`
  ADD PRIMARY KEY (`Student_username`),
  ADD KEY `RoomNumber` (`RoomNumber`);

--
-- Indexes for table `room_detail_master`
--
ALTER TABLE `room_detail_master`
  ADD PRIMARY KEY (`roomNumber`);

--
-- Indexes for table `student_registration_master`
--
ALTER TABLE `student_registration_master`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `ComplainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `leave_module`
--
ALTER TABLE `leave_module`
  MODIFY `LeaveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave_module`
--
ALTER TABLE `leave_module`
  ADD CONSTRAINT `leave_module_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `student_registration_master` (`Username`);

--
-- Constraints for table `parents_registration_master`
--
ALTER TABLE `parents_registration_master`
  ADD CONSTRAINT `parents_registration_master_ibfk_1` FOREIGN KEY (`Student_username`) REFERENCES `student_registration_master` (`Username`);

--
-- Constraints for table `room_allocation`
--
ALTER TABLE `room_allocation`
  ADD CONSTRAINT `room_allocation_ibfk_1` FOREIGN KEY (`RoomNumber`) REFERENCES `room_detail_master` (`roomNumber`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
