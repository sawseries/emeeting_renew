-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2024 at 11:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stiinfras_meet`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `bref_nm` varchar(30) NOT NULL,
  `doc_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `bref_nm`, `doc_name`) VALUES
(1, 'Member', 'การจัดการสมาชิก'),
(2, 'Agenda', 'ระเบียบวาระการประชุม'),
(3, 'Report', 'รายงานการประชุม');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `doc_code` varchar(30) NOT NULL,
  `file` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `code`, `doc_code`, `file`, `name`, `ip`, `created_at`, `updated_at`) VALUES
(1, 'S00002', 'T00011', '669378807.pdf', '2---------------1.pdf', '::1', '2024-08-04 14:12:09', '2024-08-04 14:12:09'),
(2, 'S00007', 'T00013', '1417392547.pdf', 'pratilop_p,+{$userGroup},+การป', '::1', '2024-08-04 15:07:20', '2024-08-04 15:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `topic` text NOT NULL,
  `doc_type` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `time_start` text NOT NULL,
  `end_date` date NOT NULL,
  `time_end` text NOT NULL,
  `room` varchar(30) NOT NULL,
  `active` int(11) NOT NULL,
  `link` varchar(30) NOT NULL,
  `doctopic_text` text NOT NULL,
  `detail` text NOT NULL,
  `user` varchar(30) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `code`, `topic`, `doc_type`, `type`, `start_date`, `time_start`, `end_date`, `time_end`, `room`, `active`, `link`, `doctopic_text`, `detail`, `user`, `ip`, `created_at`, `updated_at`) VALUES
(12, 'T00011', 'ระเบียบวาระการประชุมคณะกรรมการอำนวยการอุทยานวิทยาศาสตร์', 1, 3, '2024-08-04', '15:06', '2024-08-13', '14:06', 'อาคารอำนวยการอุทยานวิทยาศาสตร์', 0, 'd', '<h3 style=\"margin-top: 0px; ma', '', 'superadmin', '::1', '2024-08-04 14:06:51', '2024-08-04 14:06:51'),
(13, 'T00013', 'ระเบียบวาระการประชุมคณะกรรมการอำนวยการอุทยานวิทยาศาสตร์', 1, 1, '2024-08-16', '14:33', '2024-08-08', '14:33', 'อาคารอำนวยการอุทยานวิทยาศาสตร์', 1, '', '<h3 style=\"margin-top: 0px; margin-bottom: 0.5rem; font-family: Arial; line-height: 1.2; color: rgb(33, 37, 41); font-size: 1.75rem;\"><span style=\"font-weight: bolder;\"><font face=\"Sarabun, sans-serif\"><span lang=\"TH\" style=\"font-size: 18pt;\">ระเบียบวาระการประชุม<br></span></font></span><span style=\"font-weight: bolder;\"><font face=\"Sarabun, sans-serif\"><span lang=\"TH\" style=\"font-size: 18pt;\">คณะกรรมการอำนวยการอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ครั้งที่&nbsp;3</span><span lang=\"TH\" style=\"font-size: 18pt;\">&nbsp;/</span><span lang=\"EN-US\" style=\"font-size: 18pt;\">&nbsp;256</span><span lang=\"TH\" style=\"font-size: 18pt;\">7<br></span></font></span><span style=\"font-weight: bolder;\"><font face=\"Sarabun, sans-serif\"><span lang=\"TH\" style=\"font-size: 18pt;\">วันพฤหัสบดีที่&nbsp;10 ตุลาคม</span><span lang=\"TH\" style=\"font-size: 18pt;\">&nbsp;พ.ศ. 256</span><span lang=\"EN-US\" style=\"font-size: 18pt;\">7</span><span lang=\"TH\" style=\"font-size: 18pt;\">&nbsp;เวลา 13.30 – 16.30 น.<br></span></font></span><span style=\"font-weight: bolder;\"><font face=\"Sarabun, sans-serif\"><span lang=\"TH\" style=\"font-size: 18pt;\">ณ อาคารอำนวยการอุทยานวิทยาศาสตร์ภาคใต้ (จ.สงขลา)<br></span></font></span><span style=\"font-weight: bolder;\"><font face=\"Sarabun, sans-serif\"><span lang=\"TH\" style=\"font-size: 18pt;\">มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตหาดใหญ่ (พื้นที่ส่วนขยาย)<br></span></font></span><span style=\"font-weight: bolder;\"><font face=\"Sarabun, sans-serif\"><span lang=\"TH\" style=\"font-size: 18pt;\">และระบบ&nbsp;</span><span lang=\"EN-US\" style=\"font-size: 18pt;\">VDO Conference&nbsp;</span><span lang=\"TH\" style=\"font-size: 18pt;\">ผ่านโปรแกรม&nbsp;</span><span style=\"font-size: 18pt;\">ZOOM</span></font></span></h3>', '\n                    \n                    \n                    <h3 style=\"margin-top: 0px; margin-bottom: 0.5rem; font-family: Arial; line-height: 1.2; color: rgb(33, 37, 41); font-size: 1.75rem;\">test</h3><div><br></div>                      \n                                      \n                                      \n                ', 'superadmin', '::1', '2024-08-04 14:33:43', '2024-08-04 14:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_term`
--

CREATE TABLE `meeting_term` (
  `id` int(11) NOT NULL,
  `code` varchar(30) NOT NULL,
  `title` text NOT NULL,
  `topic` text NOT NULL,
  `no` varchar(30) NOT NULL,
  `number` text NOT NULL,
  `top` varchar(30) NOT NULL,
  `doc_code` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `file_present` text NOT NULL,
  `link` text NOT NULL,
  `ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meeting_term`
--

INSERT INTO `meeting_term` (`id`, `code`, `title`, `topic`, `no`, `number`, `top`, `doc_code`, `type`, `file_present`, `link`, `ip`, `created_at`, `updated_at`) VALUES
(4, 'S00001', 'วาระที่ 1', 'ทดสอบ', '1', '', '0', 'T00013', '1', '', '', '::1', '2024-08-04 14:44:35', '2024-08-04 14:44:35'),
(5, 'S00005', 'วาระที่ 2', 'ทดสอบ 2', '2', '', '0', 'T00013', '1', '', '', '::1', '2024-08-04 14:45:09', '2024-08-04 14:45:09'),
(6, 'S00006', '', 'twss', '', '1', 'S00001', 'T00013', '1', '', '', '::1', '2024-08-04 15:06:59', '2024-08-04 15:06:59'),
(7, 'S00007', '', 'test', '', '1.1', 'S00006', 'T00013', '3', '', '', '::1', '2024-08-04 15:07:20', '2024-08-04 15:07:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `line` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `approve` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `last_login` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `department`, `position`, `username`, `password`, `line`, `phone`, `email`, `approve`, `status`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'superadmin', 'superadmin', 'superadmin', 'superadmin', 'qwerty', 'superadmin', 'superadmin', 'superadmin', '1', '3', '', '2024-08-03 22:17:48', '2024-08-03 22:17:48'),
(2, 'k2m', 'k2m', 'k2m', 'k2m', 'k2m', '123456', 'k2m', 'k2m', 'k2m', '1', '1', '', '2024-08-04 13:38:32', '2024-08-04 13:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege`
--

CREATE TABLE `user_privilege` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bref_nm` varchar(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  `write` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_privilege`
--

INSERT INTO `user_privilege` (`id`, `user_id`, `bref_nm`, `doc_id`, `read`, `write`, `edit`, `delete`) VALUES
(1, 1, 'Agenda', 1, 1, 1, 1, 1),
(4, 1, 'Member', 2, 1, 1, 1, 1),
(5, 1, 'Report', 3, 1, 1, 1, 1),
(6, 2, 'Agenda', 2, 1, 0, 0, 0),
(7, 2, 'Report', 3, 1, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_term`
--
ALTER TABLE `meeting_term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `meeting_term`
--
ALTER TABLE `meeting_term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_privilege`
--
ALTER TABLE `user_privilege`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
