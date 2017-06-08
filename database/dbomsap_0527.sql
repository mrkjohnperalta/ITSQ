-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2017 at 05:02 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbomsap`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_proposals`
--

CREATE TABLE IF NOT EXISTS `activity_proposals` (
  `prop_id` int(11) NOT NULL,
  `proposal` varchar(30) NOT NULL,
  `proposal_title` varchar(255) NOT NULL,
  `general_objective` text NOT NULL,
  `specific_objective` text NOT NULL,
  `proposed_budget` int(11) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `sent_by` varchar(30) NOT NULL,
  `date_sent` date NOT NULL,
  `date_approved` date DEFAULT NULL,
  `scc_approve` int(11) NOT NULL DEFAULT '0',
  `sadu_status` int(11) NOT NULL DEFAULT '0',
  `sdas_status` int(11) NOT NULL DEFAULT '0',
  `accounting_status` int(11) NOT NULL DEFAULT '0',
  `edo_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_proposals`
--

INSERT INTO `activity_proposals` (`prop_id`, `proposal`, `proposal_title`, `general_objective`, `specific_objective`, `proposed_budget`, `startdate`, `enddate`, `sent_by`, `date_sent`, `date_approved`, `scc_approve`, `sadu_status`, `sdas_status`, `accounting_status`, `edo_status`) VALUES
(2, 'CSCVersion.txt', '', '', '', 0, '2017-05-26 09:00:00', '2017-05-26 11:00:00', '1', '2017-04-30', NULL, 2, 0, 0, 0, 3),
(3, 'SW_Configuration.xml', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(4, 'SW_Configuration.xml', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(5, 'CSCVersion.txt', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(6, 'CSCVersion.txt', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(7, 'SW_Configuration.xml', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(8, 'SW_Configuration.xml', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(9, 'SW_Configuration.xml', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(10, 'SW_Configuration.xml', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(11, 'textext.txt', 'Unang Title', 'Objective is cheness', 'Specific Objective is cheness', 2500, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '2017-05-04', NULL, 3, 1, 0, 0, 0),
(12, 'hello.txt', 'Title Ito Bes', 'Objective ulit', 'Specific Objective Ulit', 15000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '2017-05-04', NULL, 3, 1, 0, 0, 0),
(13, 'Aces Proposal Title', 'Title ACES', 'Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello', 'Good Good Good Good Good Good Good Good Good Good Good Good Good Good Good ', 8000, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2', '2017-05-05', NULL, 3, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `cmnt_id` int(30) NOT NULL,
  `author` varchar(40) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `actprop_id` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cmnt_id`, `author`, `comment`, `date`, `actprop_id`) VALUES
(1, '3', 'Hello Comment Here', '2017-05-26', 11);

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE IF NOT EXISTS `equipments` (
  `equipment_id` int(30) NOT NULL,
  `equipment_name` varchar(30) NOT NULL,
  `equipment_quantity` int(11) NOT NULL,
  `equipment_picture` varchar(30) NOT NULL,
  `serial_no` varchar(30) NOT NULL,
  `office` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`equipment_id`, `equipment_name`, `equipment_quantity`, `equipment_picture`, `serial_no`, `office`) VALUES
(1, 'Chairs', 6, '', '', 1),
(2, 'Tables', 10, '', '', 1),
(3, 'Podium', 14, '', '', 1),
(4, 'Micropohone', 12, '', '', 1),
(5, 'AUX Cord', 5, '', '', 1),
(6, 'Sound System', 20, '', '', 1),
(7, 'Extension Cord', 13, '', '', 1),
(8, 'Stage', 14, '', '', 1),
(9, 'Phil. Flag', 17, '', '', 1),
(10, 'Panel Board', 16, '', '', 1),
(11, 'White Screen', 16, '', '', 1),
(12, 'Feu Tech Flag', 17, '', '', 1),
(13, 'LED Video Wall', 10, '', '', 1),
(14, 'Laptop', 20, '', '', 3),
(15, 'Speaker', 21, '', '', 3),
(16, 'DLP', 18, '', '', 3),
(17, 'Cable', 12, '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE IF NOT EXISTS `offices` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(40) NOT NULL,
  `office_shortcut` varchar(30) NOT NULL,
  `office_room` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`office_id`, `office_name`, `office_shortcut`, `office_room`) VALUES
(1, 'Facilities Office', 'F.O', 'F506'),
(2, 'Management Information System', 'M.I.S', 'F1205'),
(3, 'Computer Services Office', 'CSO', 'F1205');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `org_id` int(11) NOT NULL,
  `org_username` varchar(30) NOT NULL,
  `org_password` varchar(30) NOT NULL,
  `organization_name` varchar(100) NOT NULL,
  `organization_abbreviation` varchar(30) NOT NULL,
  `org_mission` text,
  `org_vision` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`org_id`, `org_username`, `org_password`, `organization_name`, `organization_abbreviation`, `org_mission`, `org_vision`) VALUES
(1, 'FEU_TECH_AITS', 'feu_tech_rso', 'Alliance of Information Technology Students', 'AITS', NULL, NULL),
(2, 'FEU_TECH_ACES', 'feu_tech_rso', 'Association of Civil Engineering Students', 'ACES', NULL, NULL),
(3, 'FEU_TECH_AC', 'feu_tech_rso', 'Artist Connection', 'AC', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proposal_status`
--

CREATE TABLE IF NOT EXISTS `proposal_status` (
  `id_status` int(10) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `proposal_status`
--

INSERT INTO `proposal_status` (`id_status`, `status`) VALUES
(1, 'For Review'),
(2, 'With Comments'),
(3, 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_equipments`
--

CREATE TABLE IF NOT EXISTS `reservation_equipments` (
  `reservation_id` int(20) NOT NULL,
  `equipment_name` varchar(30) NOT NULL,
  `reserved_by` varchar(30) NOT NULL,
  `date_reserved` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `equipment_quantity` int(11) NOT NULL,
  `reservation_status` int(30) NOT NULL DEFAULT '1',
  `office_name` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `reservation_equipments`
--

INSERT INTO `reservation_equipments` (`reservation_id`, `equipment_name`, `reserved_by`, `date_reserved`, `time_start`, `time_end`, `equipment_quantity`, `reservation_status`, `office_name`) VALUES
(27, 'Extension Cord', '', '2017-05-25', '00:07:00', '00:08:00', 2, 1, 0),
(28, 'Stage', '', '2017-05-25', '00:07:00', '00:08:00', 3, 1, 0),
(30, 'Micropohone', '', '2017-05-22', '00:19:00', '00:07:00', 1, 1, 0),
(33, 'Cable', '', '2017-05-29', '00:07:00', '00:10:00', 3, 1, 0),
(35, 'Extension Cord', '', '2017-05-26', '00:14:00', '00:07:00', 1, 1, 0),
(36, 'Chairs', '1', '2017-05-27', '00:07:00', '00:09:00', 1, 1, 0),
(37, 'Tables', '1', '2017-05-27', '00:07:00', '00:09:00', 1, 1, 0),
(38, 'Podium', '1', '2017-05-29', '00:09:00', '00:11:00', 1, 1, 0),
(39, 'Micropohone', '1', '2017-05-29', '00:09:00', '00:11:00', 2, 1, 0),
(40, 'Chairs', '1', '2017-05-29', '00:07:00', '00:08:00', 1, 1, 0),
(41, 'Tables', '1', '2017-05-29', '00:07:00', '00:08:00', 1, 1, 1),
(42, 'Podium', '1', '2017-05-30', '00:07:00', '00:08:00', 1, 1, 1),
(43, 'Micropohone', '1', '2017-05-30', '00:07:00', '00:08:00', 1, 1, 1),
(44, 'Chairs', '1', '2017-05-27', '00:07:00', '00:08:00', 3, 1, 0),
(45, 'Panel Board', '', '2017-05-29', '00:07:00', '00:08:00', 1, 1, 0),
(46, 'White Screen', '', '2017-05-29', '00:07:00', '00:08:00', 1, 1, 0),
(47, 'Tables', '1', '2017-05-29', '00:07:00', '00:08:00', 1, 1, 1),
(48, 'Laptop', '1', '2017-05-29', '00:07:00', '00:08:00', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reservation_status`
--

CREATE TABLE IF NOT EXISTS `reservation_status` (
  `rsv_id` int(30) NOT NULL,
  `reservation_name` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_status`
--

INSERT INTO `reservation_status` (`rsv_id`, `reservation_name`) VALUES
(1, 'Pending'),
(2, 'Confirmed'),
(3, 'Declined'),
(4, 'Expired'),
(5, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(20) NOT NULL,
  `role_name` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'SCC'),
(2, 'SADU'),
(3, 'MIS'),
(4, 'FO'),
(5, 'SDAS'),
(6, 'Accounting'),
(7, 'EDO');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(15) NOT NULL,
  `room_building` varchar(20) NOT NULL,
  `room_number` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room_reservation`
--

CREATE TABLE IF NOT EXISTS `room_reservation` (
  `room_reserve_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `reserved_by` int(11) NOT NULL,
  `date_reserved` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `reservation_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_reservation`
--

INSERT INTO `room_reservation` (`room_reserve_id`, `room_id`, `reserved_by`, `date_reserved`, `time_start`, `time_end`, `reservation_status`) VALUES
(1, 0, 1, '2017-05-17', '07:00:00', '10:00:00', 0),
(2, 0, 1, '2017-05-26', '04:00:00', '09:00:00', 0),
(3, 129, 1, '2017-05-17', '04:00:00', '08:00:00', 0),
(4, 148, 1, '0000-00-00', '01:00:00', '01:00:00', 0),
(5, 108, 1, '2017-05-27', '12:00:00', '03:00:00', 1),
(6, 188, 1, '2017-06-01', '10:00:00', '12:00:00', 1),
(7, 107, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(8, 149, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(9, 133, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(10, 189, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(11, 100, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(12, 148, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(13, 148, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(14, 186, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(15, 120, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(16, 164, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(17, 132, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(18, 149, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(19, 160, 1, '0000-00-00', '01:00:00', '01:00:00', 1),
(20, 137, 1, '0000-00-00', '01:00:00', '01:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `office_abbreviation` varchar(30) NOT NULL,
  `user_picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `office_name`, `office_abbreviation`, `user_picture`) VALUES
(2, 'FEU_TECH_SADU', 'sadu_1234', 'Student Affairs and Development Unit', 'SADU', 'sadu_logo.png'),
(3, 'FEU_TECH_SCC', 'scc_password', 'Student Coordinating Council', 'SCC', 'scc_logo.png'),
(4, 'FEU_TECH_FO', 'fo_password', 'Facilities Office', 'FO', 'fo_logo.png'),
(5, 'FEU_TECH_RO', 'ro_password', 'Registars Office', 'RO', 'ro_logo.png'),
(6, 'FEU_TECH_SDAS', 'sdas_pass', 'Senior Director for Academic Services', 'SDAS', 'sdas_logo.png'),
(7, 'FEU_TECH_AO', 'ao_pass', 'Accounting Office', 'AO', 'ao_logo.png'),
(8, 'FEU_TECH_EDO', 'edo_pass', 'Executive Directors Office', 'EDO', 'edo_logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_proposals`
--
ALTER TABLE `activity_proposals`
  ADD PRIMARY KEY (`prop_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cmnt_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`equipment_id`);

--
-- Indexes for table `offices`
--
ALTER TABLE `offices`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `proposal_status`
--
ALTER TABLE `proposal_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `reservation_equipments`
--
ALTER TABLE `reservation_equipments`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `reservation_status`
--
ALTER TABLE `reservation_status`
  ADD PRIMARY KEY (`rsv_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_reservation`
--
ALTER TABLE `room_reservation`
  ADD PRIMARY KEY (`room_reserve_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_proposals`
--
ALTER TABLE `activity_proposals`
  MODIFY `prop_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmnt_id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equipment_id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `proposal_status`
--
ALTER TABLE `proposal_status`
  MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reservation_equipments`
--
ALTER TABLE `reservation_equipments`
  MODIFY `reservation_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `reservation_status`
--
ALTER TABLE `reservation_status`
  MODIFY `rsv_id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room_reservation`
--
ALTER TABLE `room_reservation`
  MODIFY `room_reserve_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
