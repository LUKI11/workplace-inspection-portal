-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 08:04 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workplace_inspectiondb`
--

-- --------------------------------------------------------

--
-- Table structure for table `inspection`
--

CREATE TABLE `inspection` (
  `id` int(50) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `workplace` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `creator` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `start` int(4) NOT NULL,
  `finish` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `inspection`
--

INSERT INTO `inspection` (`id`, `title`, `location`, `workplace`, `creator`, `date`, `start`, `finish`) VALUES
(176, 'efs', 'fes', 'fes', 'efsfes fes', '2017-10-01', 1000, 1200),
(177, 'fwd', 'wda', 'efs', 'fes efs', '2017-10-01', 1000, 1200),
(178, 'dwa', 'wda', 'dwa', 'wdawdawda wad', '2017-10-01', 1200, 1400),
(179, 'esfes', 'fesfes', 'fse', 'esf fes', '2017-10-01', 1200, 1400),
(180, 'esfes', 'fesfes', 'fse', 'esf fes', '2017-10-01', 1200, 1400),
(181, 'efs', 'fes', 'fes', 'efsfes fes', '2017-10-01', 1000, 1200),
(182, 'fwd', 'wda', 'efs', 'fes efs', '2017-10-01', 1000, 1200),
(183, 'fwd', 'wda', 'efs', 'fes efs', '2017-10-01', 1000, 1200),
(184, 'fwd', 'wda', 'efs', 'fes efs', '2017-10-01', 1000, 1200),
(185, 'fwd', 'wda', 'efs', 'fes efs', '2017-10-01', 1000, 1200),
(186, 'dwa', 'wda', 'dwa', 'wdawdawda wad', '2017-10-01', 1200, 1400);

-- --------------------------------------------------------

--
-- Table structure for table `inspection_assignees`
--

CREATE TABLE `inspection_assignees` (
  `user_id` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `inspection_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `inspection_assignees`
--

INSERT INTO `inspection_assignees` (`user_id`, `inspection_id`) VALUES
('s4401204', 176),
('s5501204', 177),
('j102142', 178),
('s5501204', 179),
('j102142', 179),
('s5501204', 180),
('j102142', 180),
('s4401204', 181),
('j102142', 181),
('s5501204', 182),
('s4401204', 182),
('s5501204', 183),
('s4401204', 183),
('s5501204', 184),
('s4401204', 184),
('s5501204', 185),
('s4401204', 185),
('j102142', 186),
('s4401204', 186);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `work_day` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` int(4) NOT NULL,
  `finish_time` int(4) NOT NULL,
  `start_break` int(4) NOT NULL,
  `finish_break` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `user_id`, `work_day`, `start_time`, `finish_time`, `start_break`, `finish_break`) VALUES
(413, 's4401204', 'Sunday', 900, 1800, 1200, 1300),
(414, 's4401204', 'Monday', 900, 1800, 1200, 1300),
(415, 's4401204', 'Tuesday', 900, 1800, 1200, 1300),
(416, 's4401204', 'Wednesday', 900, 1800, 1200, 1300),
(417, 's4401204', 'Thursday', 900, 1800, 1200, 1300),
(418, 's4401204', 'Friday', 900, 1800, 1200, 1300),
(419, 's4401204', 'Saturday', 900, 1800, 1200, 1300),
(427, 'j102142', 'Sunday', 800, 2000, 1200, 1300),
(428, 'j102142', 'Monday', 800, 2000, 1200, 1300),
(429, 'j102142', 'Tuesday', 800, 2000, 1200, 1300),
(430, 'j102142', 'Wednesday', 800, 2000, 1200, 1300),
(431, 'j102142', 'Thursday', 800, 2000, 1200, 1300),
(432, 'j102142', 'Friday', 800, 2000, 1200, 1300),
(433, 'j102142', 'Saturday', 800, 2000, 1200, 1300),
(441, 's5501204', 'Sunday', 1000, 2000, 1200, 1300),
(442, 's5501204', 'Monday', 1000, 2000, 1200, 1300),
(443, 's5501204', 'Tuesday', 1000, 2000, 1200, 1300),
(444, 's5501204', 'Wednesday', 1000, 2000, 1200, 1300),
(445, 's5501204', 'Thursday', 1000, 2000, 1200, 1300),
(446, 's5501204', 'Friday', 1000, 2000, 1200, 1300),
(447, 's5501204', 'Saturday', 1000, 2000, 1200, 1300);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `faculty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(12) NOT NULL,
  `role` enum('manager','coordinator','guest') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `faculty`, `phone`, `role`) VALUES
('j102142', 'James', 'password', 'james@mail.com', 'Faculty of IT', 72876364, 'coordinator'),
('s4401204', 'Dan', 'pass', 'dan@mail.com', 'Faculty of science', 383273273, 'coordinator'),
('s5501204', 'Henry', 'p', 'henry@mail.com', 'bachelor of science', 7494222, 'coordinator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inspection`
--
ALTER TABLE `inspection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_assignees`
--
ALTER TABLE `inspection_assignees`
  ADD KEY `user_assigned_fk` (`user_id`),
  ADD KEY `inspection_assignees_fk` (`inspection_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_schedule_fk` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inspection`
--
ALTER TABLE `inspection`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=448;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
