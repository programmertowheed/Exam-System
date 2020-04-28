-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 11:05 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(255) DEFAULT NULL,
  `auth` varchar(255) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `randnum` varchar(25) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `userEmail`, `userPass`, `auth`, `mobile`, `randnum`, `role`, `picture`) VALUES
(1, 'Towheed', 'programmertowheed@gmail.com', 'b7d495695d96614aa67d821a66fabe26', 'a0234bf5b751d2fe7348a7c60a121c3a', '01731974045', '312559', 'admin', 'dc3f96a0a23e9122a1c64f4528496165pic.jpg'),
(3, 'Towheed', 'mdtowheedulislam400@gmail.com', 'b7d495695d96614aa67d821a66fabe26', 'c7a5040b29c0d5e7801597118e2df70c', '01731974045', '947153', 'admin', 'dc3f96a0a23e9122a1c64f4528496165pic.jpg'),
(4, 'Towheed', 'admin@gmail.com', '2f120f2e99a59b939d1ca0e299c10596', '003491c43a8c2f03db942db9855bc09b', '01731974045', '736666', 'admin', 'dc3f96a0a23e9122a1c64f4528496165pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer`
--

CREATE TABLE `tbl_answer` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_answer`
--

INSERT INTO `tbl_answer` (`id`, `subject_id`, `question_no`, `right_answer`, `answer`) VALUES
(1, 13, 1, 1, 'Hyper Text Markup Language'),
(2, 13, 1, 0, 'High Text Markup Language'),
(3, 13, 1, 0, 'Hyper Tabular Markup Language'),
(4, 13, 1, 0, 'None of these'),
(5, 13, 2, 0, '&lt;TD&gt;'),
(6, 13, 2, 0, '&lt;br&gt;'),
(7, 13, 2, 1, '&lt;P&gt;'),
(8, 13, 2, 0, '&lt;TR&gt;'),
(9, 13, 3, 0, '&lt;LL&gt;'),
(10, 13, 3, 0, '&lt;DD&gt;'),
(11, 13, 3, 1, '&lt;DL&gt;'),
(12, 13, 3, 0, '&lt;DS&gt;'),
(13, 13, 4, 0, '&lt;head&gt;'),
(14, 13, 4, 0, '&lt;h6&gt;'),
(15, 13, 4, 0, '&lt;heading&gt;'),
(16, 13, 4, 1, '&lt;h1&gt;'),
(25, 13, 5, 0, 'Method'),
(26, 13, 5, 0, 'Action'),
(27, 13, 5, 1, 'Both (a)&amp;(b)'),
(28, 13, 5, 0, 'None of these');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id`, `name`, `publication_status`, `date`) VALUES
(1, 'CSE', 1, '2020-03-27 16:56:27'),
(3, 'Bangla', 2, '2020-03-27 17:03:07'),
(4, 'English', 2, '2020-03-27 17:17:54'),
(5, 'BBA', 2, '2020-03-28 13:01:22'),
(6, 'LLB', 2, '2020-04-03 09:38:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `question_no` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`id`, `subject_id`, `question_no`, `question`) VALUES
(1, 13, 1, 'HTML stands for?'),
(2, 13, 2, 'which of the following tag is used to mark a begining of paragraph ?'),
(3, 13, 3, 'From which tag descriptive list starts ?'),
(4, 13, 4, 'Correct HTML tag for the largest heading is'),
(7, 13, 5, 'The attribute of &lt;form&gt; tag');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `publication_status` tinyint(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `name`, `department_id`, `publication_status`, `date`) VALUES
(1, 'Computer Fundamentals', 1, 2, '2020-04-03 16:45:31'),
(4, 'Web Engineering', 1, 2, '2020-04-03 17:06:33'),
(8, 'Simulation and Modeling', 1, 2, '2020-04-04 08:27:47'),
(9, 'Artificial Intelligence', 1, 2, '2020-04-08 12:47:10'),
(10, 'Artificial Intelligence Lab', 1, 2, '2020-04-08 12:50:08'),
(11, 'Simulation and Modeling Lab', 1, 2, '2020-04-08 12:52:46'),
(12, 'Web Engineering Lab', 1, 2, '2020-04-08 12:53:40'),
(13, 'HTML', 1, 1, '2020-04-19 14:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(255) DEFAULT NULL,
  `auth` varchar(255) DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `randnum` varchar(25) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `publication_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `userEmail`, `userPass`, `auth`, `mobile`, `randnum`, `picture`, `publication_status`) VALUES
(1, 'Towheed', 'programmertowheed@gmail.com', '693cfed9dd8adf7c63afbf53cf3a8043', '1e47ae375561994a58bf9bd7f41f8970', '+8801731974045', '716277', 'd41d8cd98f00b204e9800998ecf8427eupic.jpg', 1),
(6, 'Zahid', 'zahid@gmail.com', '693cfed9dd8adf7c63afbf53cf3a8043', 'b8625e54c7049d0c3d131d312a12e24b', '+8801731974045', '810911', '15c3ece2ca65c7d3c11af3c3c883ca1eupic.jpg', 1),
(7, 'Pro', 'protowheed@gmail.com', '693cfed9dd8adf7c63afbf53cf3a8043', '98acba9fe8ebc8e66b737b7d64f00ee3', '+8801731974045', NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`,`userEmail`);

--
-- Indexes for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`,`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
