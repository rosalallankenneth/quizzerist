-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 06:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzerist_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `lastname`, `firstname`, `middlename`, `pwd`) VALUES
('JohnDoe21', 'Doe', 'John', 'Andrew', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questions_ID` int(11) NOT NULL,
  `quiz_ID` int(11) NOT NULL,
  `question` text NOT NULL,
  `choices` text NOT NULL,
  `answer` int(1) NOT NULL,
  `remark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questions_ID`, `quiz_ID`, `question`, `choices`, `answer`, `remark`) VALUES
(10, 16, 'What is considered the rarest form of color blindness?', '{\"choices\":[\"Blue\",\"Red\",\"Green\",\"Purple\"]}', 1, 1),
(11, 16, 'Which ocean borders the west coast of the United States?', '{\"choices\":[\"Atlantic\",\"Pacific\",\"Indian\",\"Arctic\"]}', 2, 1),
(12, 16, 'How many manned moon landings have there been?', '{\"choices\":[\"6\",\"1\",\"3\",\"7\"]}', 1, 1),
(13, 16, 'Which is the largest freshwater lake in the world?', '{\"choices\":[\"Caspian Sea\",\"Lake Michigan\",\"Lake Huron\",\"Lake Superior\"]}', 4, 1),
(14, 16, 'How many legs is it biologically impossible for a centipede to have?', '{\"choices\":[\"150\",\"26\",\"100\",\"74\"]}', 3, 1),
(15, 16, 'What is the scientific name of the knee cap?', '{\"choices\":[\"Femur\",\"Patella\",\"Foramen Magnum\",\"Scapula\"]}', 2, 1),
(16, 16, 'What is the fastest land animal?', '{\"choices\":[\"Thomson’s Gazelle\",\"Lion\",\"Cheetah\",\"Pronghorn Antelope\"]}', 3, 1),
(17, 16, 'Botanically speaking, which of these fruits is NOT a berry?', '{\"choices\":[\"Strawberry\",\"Blueberry\",\"Banana\",\"Concord Grape\"]}', 1, 1),
(18, 16, 'What is the molecular formula of Ozone?', '{\"choices\":[\"SO4\",\"C6H2O6\",\"N2O\",\"O3\"]}', 4, 1),
(19, 16, 'Which of the following is NOT a real element?', '{\"choices\":[\"Hassium\",\"Praseodymium\",\"Vitrainium\",\"Lutetium\"]}', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_ID` int(11) NOT NULL,
  `author_ID` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `published` int(1) NOT NULL,
  `deleted` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`quiz_ID`, `author_ID`, `title`, `description`, `date_created`, `published`, `deleted`) VALUES
(16, 'JohnDoe21', 'Trivia Quiz', 'This is a sample quiz for you to answer.', '2021-02-25', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `lastname`, `firstname`, `middlename`, `pwd`) VALUES
('Chris19', 'Brown', 'Chris', 'Johnson', 'password123'),
('Marites123', 'Ponce', 'Marites', 'Balbahutob', 'marites123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questions_ID`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questions_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
