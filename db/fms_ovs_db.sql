-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 10:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms_ovs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `major_id` varchar(10) NOT NULL,
  `major_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_id`, `major_name`) VALUES
('0460', 'บริหารธุรกิจ'),
('0463', 'บริหารธุรกิจ(การเงิน)'),
('0464', 'บริหารธุรกิจ(การตลาด)'),
('0465', 'รัฐประศาสนศาสตร์'),
('0466', 'การจัดการการท่องเที่ยว'),
('0467', 'สาขาวิชาการจัดการโลจิสติกส์'),
('0479', 'บริหารธุรกิจ(การบริหารทรัพยากรมนุษย์)'),
('0480', 'สาขาวิชาการจัดการ (ภาษาอังกฤษ)'),
('0484', 'ระบบสารสนเทศ'),
('0485', 'บริหารธุรกิจ(การจัดการเทคโนโลยีสารสนเทศ)'),
('0486', 'บัญชีบัณฑิต'),
('0488', 'สาขาวิชาการจัดการประชุม นิทรรศการ และการท่องเที่ยวเพื่อเป็นรางวัล'),
('0489', 'สาขาวิชาระบบสารสนเทศทางธุรกิจ'),
('0491', 'สาขาวิชาการเงิน'),
('0492', 'สาขาวิชาการตลาด'),
('0493', 'สาขาวิชาการบริหารทรัพยากรมนุษย์'),
('0494', 'สาขาวิชาการจัดการทรัพยากรมนุษย์'),
('A472', 'การจัดการและการปกครองท้องถิ่น'),
('B472', 'การจัดการทรัพยากรมนุษย์'),
('C472', 'นโยบายสาธารณะและการวางแผน'),
('G001', 'ปรัชญาดุษฎีบัณฑิต สาขาวิชาการจัดการ'),
('G002', 'บัญชีมหาบัณฑิต'),
('G003', 'บริหารธุรกิจมหาบัณฑิต'),
('G004', 'บริหารธุรกิจมหาบัณฑิต (หลักสูตรนานาชาติ)'),
('G005', 'บริหารธุรกิจมหาบัณฑิต สาขาวิชาการตลาด'),
('G006', 'รัฐประศาสนศาสตรมหาบัณฑิต'),
('M001', 'หลายหลักสูตร ภาควิชาบริหารธุรกิจ'),
('M148', 'วิชาเอกการเงินและการลงทุน'),
('M149', 'วิชาเอกการตลาด'),
('M150', 'วิชาเอกการจัดการทรัพยากรมนุษย์'),
('M151', 'วิชาเอกการจัดการโลจิสติกส์และโซ่อุปทาน'),
('M152', 'วิชาเอกระบบสารสนเทศทางธุรกิจ'),
('M153', 'วิชาเอกการจัดการไมซ์'),
('S001', 'งานนโยบายและแผน'),
('S002', 'งานบริการการศึกษา');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `vote_status` tinyint(1) NOT NULL,
  `show_result` tinyint(1) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`vote_status`, `show_result`, `updated_date`) VALUES
(1, 1, '2021-02-24 06:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `std_id` varchar(10) NOT NULL,
  `std_title` varchar(15) DEFAULT NULL,
  `std_fname` varchar(50) DEFAULT NULL,
  `std_lname` varchar(50) DEFAULT NULL,
  `major_id` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_major_id` varchar(50) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `cyear` char(1) DEFAULT NULL,
  `vstatus` tinyint(1) DEFAULT NULL,
  `vdate` timestamp(1) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vote_data`
--

CREATE TABLE `vote_data` (
  `hcode` varchar(90) NOT NULL,
  `vcandidate` char(1) NOT NULL COMMENT 'voted candidate',
  `vdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'vote date & time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vote_judge`
--

CREATE TABLE `vote_judge` (
  `admin_std_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vote_judge`
--

INSERT INTO `vote_judge` (`admin_std_id`) VALUES
('RUCHDEE.BI'),
('6010514063'),
('ANUWAT.PA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `vote_data`
--
ALTER TABLE `vote_data`
  ADD PRIMARY KEY (`hcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
