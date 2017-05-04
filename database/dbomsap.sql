-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 05:56 AM
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
  `general_objective` text NOT NULL,
  `specific_objective` text NOT NULL,
  `proposed_budget` int(11) NOT NULL,
  `sent_by` varchar(30) NOT NULL,
  `date_sent` date NOT NULL,
  `date_approved` date DEFAULT NULL,
  `scc_approve` int(11) NOT NULL DEFAULT '0',
  `sadu_status` int(11) NOT NULL DEFAULT '0',
  `sdas_status` int(11) NOT NULL DEFAULT '0',
  `accounting_status` int(11) NOT NULL DEFAULT '0',
  `edo_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_proposals`
--

INSERT INTO `activity_proposals` (`prop_id`, `proposal`, `general_objective`, `specific_objective`, `proposed_budget`, `sent_by`, `date_sent`, `date_approved`, `scc_approve`, `sadu_status`, `sdas_status`, `accounting_status`, `edo_status`) VALUES
(2, 'CSCVersion.txt', '', '', 0, '201310871', '2017-04-30', NULL, 1, 0, 0, 0, 0),
(3, 'SW_Configuration.xml', '', '', 0, '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(4, 'SW_Configuration.xml', '', '', 0, '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(5, 'CSCVersion.txt', '', '', 0, '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(6, 'CSCVersion.txt', '', '', 0, '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(7, 'SW_Configuration.xml', '', '', 0, '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(8, 'SW_Configuration.xml', '', '', 0, '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(9, 'SW_Configuration.xml', '', '', 0, '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0),
(10, 'SW_Configuration.xml', '', '', 0, '201310871', '2017-05-01', NULL, 1, 0, 0, 0, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE IF NOT EXISTS `equipments` (
  `equipment_id` int(30) NOT NULL,
  `equipment_name` varchar(30) NOT NULL,
  `equipment_picture` varchar(30) NOT NULL,
  `serial_no` varchar(30) NOT NULL,
  `office` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

CREATE TABLE IF NOT EXISTS `offices` (
  `office_id` int(11) NOT NULL,
  `office_name` varchar(40) NOT NULL,
  `office_shortcut` varchar(30) NOT NULL,
  `office_room` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offices`
--

INSERT INTO `offices` (`office_id`, `office_name`, `office_shortcut`, `office_room`) VALUES
(1, 'Facilities Office', 'F.O', 'F506'),
(2, 'Management Information System', 'M.I.S', 'F1205');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `org_id` int(11) NOT NULL,
  `org_username` varchar(30) NOT NULL,
  `org_password` varchar(30) NOT NULL,
  `organization_name` varchar(40) NOT NULL,
  `organization_abbreviation` varchar(30) NOT NULL,
  `org_mission` text,
  `org_vision` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'Pending'),
(2, 'With Comments'),
(3, 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_equipments`
--

CREATE TABLE IF NOT EXISTS `reservation_equipments` (
  `reservation_id` int(20) NOT NULL,
  `equipment_id` varchar(309) NOT NULL,
  `reserved_by` varchar(30) NOT NULL,
  `date_reserved` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `quantity` int(11) NOT NULL,
  `reservation_status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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
  `date_reserved` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `reservation_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `office_name`, `office_abbreviation`, `user_picture`) VALUES
(2, 'FEU_TECH_SADU', 'sadu_1234', 'Student Affairs and Development Unit', 'SADU', '');

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
  MODIFY `prop_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmnt_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `equipment_id` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `offices`
--
ALTER TABLE `offices`
  MODIFY `office_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `proposal_status`
--
ALTER TABLE `proposal_status`
  MODIFY `id_status` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reservation_equipments`
--
ALTER TABLE `reservation_equipments`
  MODIFY `reservation_id` int(20) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
