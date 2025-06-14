-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2025 at 07:03 PM
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
-- Database: `intern_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `appliers`
--

CREATE TABLE `appliers` (
  `FIRSTNAME` varchar(25) NOT NULL,
  `MIDDLENAME` varchar(25) NOT NULL,
  `LASTNAME` varchar(25) NOT NULL,
  `AGE` int(3) NOT NULL,
  `PHONE` varchar(12) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `GRADYEAR` int(3) NOT NULL,
  `UNIVERSITY` varchar(50) NOT NULL,
  `EXPEREINCE` int(3) NOT NULL,
  `DESCRIPTION` varchar(500) NOT NULL,
  `RESUME_PATH` varchar(150) NOT NULL,
  `COLLEGE_LETTER_PATH` varchar(150) NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  `JOBTITLE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `intern_info`
--

CREATE TABLE `intern_info` (
  `FIRSTNAME` varchar(25) NOT NULL,
  `MIDDLENAME` varchar(25) NOT NULL,
  `LASTNAME` varchar(25) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `PHONE` varchar(10) NOT NULL,
  `DOB` varchar(14) NOT NULL,
  `AGE` int(3) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `JOBTITLE` varchar(50) NOT NULL,
  `VACANCY` int(3) NOT NULL,
  `EXPEREINCE` int(3) NOT NULL,
  `EXPECTEDSTIPEND` int(7) NOT NULL,
  `JOBTYPE` varchar(25) NOT NULL,
  `ELIGIBILITY` varchar(50) NOT NULL,
  `DEADLINEDATE` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`JOBTITLE`, `VACANCY`, `EXPEREINCE`, `EXPECTEDSTIPEND`, `JOBTYPE`, `ELIGIBILITY`, `DEADLINEDATE`) VALUES
('Data Science Intern', 9, 1, 15000, 'full-time', 'Btech', '2025-08-15'),
('Frontend Developer', 6, 0, 12000, 'part-time', 'B.Tech', '10/07/2025'),
('Laravel Developer', 3, 2, 20000, 'full-time', 'B.Tech, MCA, BCA, M.Tech ', '06/20/2025'),
('Machine Learning Intern', 2, 1, 20000, 'part-time', 'B.Tech (CS/AI/DS), M.Tech, BCA', '20/07/2025'),
('Python Automation Intern', 2, 0, 10000, 'part-time', 'B.Tech, B.Sc (CS), MCA', '2025-08-05'),
('React Native Mobile Developer', 1, 2, 30000, 'full-time', 'B.Tech, M.Tech', '2025-08-10'),
('UI/UX Design Intern', 1, 0, 8000, 'full-time', 'B.Des, B.Sc (Design), Diploma in Graphic Design', '2025-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `recruiter_info`
--

CREATE TABLE `recruiter_info` (
  `FIRSTNAME` varchar(35) NOT NULL,
  `MIDDLENAME` varchar(35) NOT NULL,
  `LASTNAME` varchar(35) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` varchar(10) NOT NULL,
  `DOB` varchar(14) NOT NULL,
  `AGE` int(3) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recruiter_info`
--

INSERT INTO `recruiter_info` (`FIRSTNAME`, `MIDDLENAME`, `LASTNAME`, `EMAIL`, `PHONE`, `DOB`, `AGE`, `PASSWORD`) VALUES
('JAGDISH', 'HINAL', 'PATHAKJI', 'jagdishpersonal11@gmail.com', '9624002911', '09/10/2007', 18, 'India@123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appliers`
--
ALTER TABLE `appliers`
  ADD PRIMARY KEY (`PHONE`,`EMAIL`);

--
-- Indexes for table `intern_info`
--
ALTER TABLE `intern_info`
  ADD PRIMARY KEY (`EMAIL`,`PHONE`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`JOBTITLE`);

--
-- Indexes for table `recruiter_info`
--
ALTER TABLE `recruiter_info`
  ADD PRIMARY KEY (`EMAIL`,`PHONE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
