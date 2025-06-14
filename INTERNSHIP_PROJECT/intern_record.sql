-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 14, 2025 at 07:06 AM
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
  `JOBTITLE` varchar(50) NOT NULL,
  `GENDER` varchar(30) NOT NULL,
  `CITY` varchar(30) NOT NULL,
  `STATE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appliers`
--

INSERT INTO `appliers` (`FIRSTNAME`, `MIDDLENAME`, `LASTNAME`, `AGE`, `PHONE`, `EMAIL`, `GRADYEAR`, `UNIVERSITY`, `EXPEREINCE`, `DESCRIPTION`, `RESUME_PATH`, `COLLEGE_LETTER_PATH`, `STATUS`, `JOBTITLE`, `GENDER`, `CITY`, `STATE`) VALUES
('Yug', 'Dhavalbhai', 'Dholakiya', 20, '7434870112', 'jagdishpathakji6@gmail.com', 2024, 'DAU', 0, 'I am an laravel developer\r\n\r\n', 'uploads/7434870112/resume_7434870112_Report2.pdf', 'uploads/7434870112/letter_7434870112_admission letter.pdf', 'UNDER CONSIDERATION', 'Laravel Developer', 'male', 'Kutch', 'Gujarat'),
('Jagdish', 'Hinal', 'Pathakji', 19, '9624002911', 'pathakjijagdish1@gmail.com', 2024, 'GTU', 0, 'I am an Data science and AI Ml engineer', 'uploads/9624002911/resume_9624002911_admission letter.pdf', 'uploads/9624002911/letter_9624002911_Report2.pdf', 'SELECTED', 'Machine Learning Intern', 'male', 'anand', 'Gujarat');

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
  `PASSWORD` varchar(30) NOT NULL,
  `GENDER` varchar(30) NOT NULL,
  `CITY` varchar(30) NOT NULL,
  `STATE` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intern_info`
--

INSERT INTO `intern_info` (`FIRSTNAME`, `MIDDLENAME`, `LASTNAME`, `EMAIL`, `PHONE`, `DOB`, `AGE`, `PASSWORD`, `GENDER`, `CITY`, `STATE`) VALUES
('Yug', 'Dhavalbhai', 'Dholakiya', 'jagdishpathakji6@gmail.com', '7434870112', '07/12/2005', 20, '456789', 'male', 'Kutch', 'Gujarat'),
('Jagdish', 'Hinal', 'Pathakji', 'pathakjijagdish1@gmail.com', '9624002911', '05/12/2005', 19, '123456', 'male', 'anand', 'Gujarat');

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
('Laravel Developer', 1, 2, 20000, 'full-time', 'Btech/BCA in CSE or related fields', '06/20/2025'),
('Machine Learning Intern', 1, 1, 20000, 'part-time', 'B.Tech (CS/AI/DS), M.Tech, BCA', '20/07/2025'),
('Python Automation Intern', 1, 0, 10000, 'part-time', 'Btech/BCA in CSE OR related fields', '2025-08-05'),
('React Native Mobile Developer', 1, 2, 30000, 'full-time', 'Btech/BCA in CSE or related fields.', '2025-08-10'),
('Solution Architect', 5, 5, 200000, 'remote', 'Btech/Bca in computer science', '2025-08-15'),
('Solution Architect level II', 5, 3, 150000, 'full-time', 'B.tech M.tech in CSE', '12/07/2025');

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
  `PASSWORD` varchar(30) NOT NULL,
  `GENDER` varchar(15) NOT NULL,
  `CITY` varchar(20) NOT NULL,
  `STATE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recruiter_info`
--

INSERT INTO `recruiter_info` (`FIRSTNAME`, `MIDDLENAME`, `LASTNAME`, `EMAIL`, `PHONE`, `DOB`, `AGE`, `PASSWORD`, `GENDER`, `CITY`, `STATE`) VALUES
('Jagdish', 'Hinal', 'Pathakji', 'jagdishpersonal11@gmail.com', '9624002911', '05/12/2000', 19, '123456', 'Male', 'Anand', 'Gujarat');

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
