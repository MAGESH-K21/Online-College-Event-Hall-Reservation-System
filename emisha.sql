-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 13, 2022 at 07:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Emisha`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(225) NOT NULL,
  `admin_email` varchar(225) NOT NULL,
  `admin_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@sairam.edu.in', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Sai Prakash', 'saiprakash@sairam.edu.in', '76d0d34f852912d9ed184895c6a077f7'),
(3, 'Jayanth', 'jayanth@sairam.edu.in', '46af13c66fb52f6150fa9d6586459ff7'),
(4, 'Lenin', 'lenin@sairam.edu.in', '1d0f20d9e6b11a6a5d0e7f6cbee71e51'),
(5, 'Rajendra Prasad', 'rajendraprasad@sairam.edu.in', '80814b407d76e945544683e98f183965'),
(6, 'Dr.B.Latha', 'latha@sairam.edu.in', '0a6ec42b97708001c09c89438f20644c'),
(7, 'Bala', 'bala@sairam.edu.in', '9a5aab71aac4028688f5eda14f55f1f0'),
(8, 'ceo', 'ceo@sairam.edu.in', '55161575f3e05dfb61145c5d63d67d29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book_history`
--

CREATE TABLE `tbl_book_history` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Booked',
  `book_num` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_book_history`
--

INSERT INTO `tbl_book_history` (`book_id`, `user_id`, `room_id`, `date`, `start_time`, `end_time`, `status`, `book_num`) VALUES
(6, 4, 79, '2022-04-16', '15:00:00', '16:00:00', 'Booked', 'SI7801'),
(7, 4, 79, '2022-04-16', '16:00:00', '17:00:00', 'Booked', 'SI0937');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `room_id` int(50) UNSIGNED NOT NULL,
  `capacity` int(50) NOT NULL,
  `location` varchar(250) NOT NULL,
  `description` char(250) NOT NULL,
  `img_name` varchar(250) DEFAULT NULL,
  `room_number` varchar(20) DEFAULT NULL,
  `room_name` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`room_id`, `capacity`, `location`, `description`, `img_name`, `room_number`, `room_name`) VALUES
(28, 400, 'Leo Muthu Stadium ', 'Area of 60 X 40', '28.jpeg', 'S2657', 'SSR Hall'),
(38, 400, 'Leo Muthu Stadium ', 'Area of 60 X 30', '38.jpg', 'S1234', 'VRR Hall'),
(47, 500, 'A Block, First floor', 'Area of 45 x 30', '47.jpeg', 'A2507', 'AV Hall'),
(49, 200, 'J block, Third Floor', 'Area of 30 x 29', '49.jpg', 'J4103', 'Incubation Centre'),
(50, 300, 'J block, third Floor', 'Area of 30 x 29', '50.jfif', 'J4102', 'Skill Development Centre'),
(51, 150, 'K block, third Floor', 'Area of 30 x 29', '51.jpg', 'K4501', 'Materials Research Centre'),
(52, 180, 'L block, Third floor', 'Area of 30 x 29', '52.jpg', 'L4501', 'Robotics Lab EPR Sponsored Lab'),
(53, 150, 'L block, Third floor', 'Area of 30 x 29', '53.jfif', 'L4502', 'Project Display Lab'),
(57, 200, 'J block, Third Floor', 'Area of 30 x 29', '57.jfif', 'J4501', 'MECH Conference Hall'),
(58, 150, 'B Block, Ground Floor', 'Area of 30x45', '58.jpg', 'B1502', 'PRO CAD LAB'),
(59, 200, 'B Block, Ground Floor', 'Area of 30X15', '59.png', 'B1503', 'HEALTH CARE CENTER'),
(60, 150, 'J block, Third Floor', 'Area of 30 x 29', '60.jpg', 'J4503', 'Project Display Lab'),
(61, 250, 'B Block, First Floor', 'Area of 45X30', '61.jpg', 'B2507', 'ICE LAB'),
(62, 300, 'B Block, First Floor', 'Area of 30x30', '62.jpg', 'B2509', 'VLSI DESIGN LAB'),
(63, 70, 'K block, Second floor ', 'Area of 30 x 29', '63.jpg', 'K3502', 'MECH CAD LAB - I (CAD & M)'),
(64, 250, 'B Block, First Floor', 'Area of 30x30', '64.jpg', 'B2508', 'ENVIRONMENTAL ENGG LAB-CIVIL'),
(66, 200, 'B Block, First Floor', 'Area of 30x45', '66.jpg', 'B2502', 'PROCESS CONTROL LAB ICE DEPT'),
(67, 70, 'K block, Second floor ', 'Area of 30 x 29', '67.jfif', 'K3503', 'MECH CAD LAB - II (SIM & ANA)'),
(68, 150, 'B Block, First Floor', 'Area of 30x45', '68.jpg', 'B2501', 'DIGITAL INTEGRATED CIRCUIT LABORATORY'),
(69, 50, 'L block, First floor', 'Area of 139 x 38', '69.jfif', 'L2501', 'Dynamics Laboratory'),
(70, 40, 'G block, Fourth Floor', 'Area of 29 x 59', '70.jfif', 'G5503', 'MICRO PROCESSOR & MICRO CONTROLLER LAB ECE'),
(71, 150, 'B Block, Second Floor', 'Area of 30x35', '71.jpg', 'B3507', 'TRANSDUCERS & MEASUREMENTS LAB'),
(72, 180, 'B Block, Second Floor', 'Area of 30x45', '72.jpg', 'B3501', ' ELECTRIC CIRCUIT LAB '),
(73, 300, 'B Block, Second Floor', 'Area of 30x60', '73.jpg', 'B3502', 'MICROPROCESSOR MICRO CONTROLLER LAB'),
(74, 350, 'C Block, Ground Floor', 'Area of 30x150', '74.jpg', 'C1501', 'Chemistry Lab-I'),
(75, 300, 'C Block, Ground Floor', 'Area of 30x150', '75.jpg', 'C1506', 'Electrical Machines Lab-I'),
(76, 100, 'D Block, First Floor', 'Area 36 x 25-9', '76.jpeg', 'D2101', 'Elton Maya Lab '),
(77, 150, 'C Block, First Floor', 'Area of 75x30', '77.png', 'C2509', 'Physics Lab - l'),
(78, 200, 'D Block, First Floor', 'Area 36 x 25-9', '78.jpeg', 'D2102', 'Preter Drucker Hall'),
(79, 200, 'C Block, First Floor', 'Area of 30x30', '79.jpg', 'C2506', 'P.G & Research Lab'),
(80, 220, 'E Block, Third Floor', 'Area of 30x30', '80.jpg', 'E4503', 'KNOWLEDGE MANAGEMENT LAB'),
(81, 150, 'D Block, First Floor', 'It also includes TCS and \"Automation Anywhere\" lab too.', '81.jpeg', 'D2503', 'VLSI - ECE Department Lab'),
(85, 150, 'D Block, Second Floor', 'Area 36 x 25-9', '85.jpeg', 'D3102', 'Preter Drucker Hall'),
(86, 150, 'D Block, Second Floor', 'Area 36 x 25-9', '86.jpeg', 'D3104', 'Hendry Fayol Hall'),
(87, 200, 'E Block, Third Floor', 'Area of 45 x 30', '87.jpeg', 'E4501', 'Communication & Soft Skill Lab'),
(88, 80, 'F Block, Ground Floor', 'Area of 45 x 30', '88.jpeg', 'F1508', 'Soil Mechanics Lab Civil Dept'),
(89, 200, 'F Block, First Floor', 'Area 36 x 25-9', '89.jpeg', 'F2102', 'CSE Tutorial Room'),
(90, 150, 'F Block, First Floor', 'Area 30 x 30', '90.jpeg', 'F2103', 'Tutorial Class Room'),
(91, 100, 'F Block, Fourth Floor', 'Area of 30 x 30', '91.jpeg', 'F5502', 'Drawing Hall'),
(92, 150, 'K Block, Third Floor', 'Area of 45 x 30', '92.jpeg', 'K4504', 'Clean Energy Centre & Bio Fuel Research Centre');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `user_dept` varchar(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_dept`, `user_email`, `user_password`) VALUES
(4, 'User', 'General', 'user@sairam.edu.in', 'ee11cbb19052e40b07aac0ca060c23ee'),
(6, 'Annamalai M', 'CSE', 'annamalai@sairam.edu.in', 'dad733b96f4a9eb2e40f8e7499491215'),
(7, 'Srinithi', 'CSE', 'srinithi@sairam.edu.in', '6830dd1759b749d2e3e92127fa8dde10'),
(8, 'Jayanth', 'LMES', 'jayanth@sairam.edu.in', '46af13c66fb52f6150fa9d6586459ff7'),
(9, 'Deepthi', 'CSE', 'deepthi@sairam.edu.in', '712eb75b79ed567b2377b3dc3851baf8'),
(10, 'Ramya', 'CSE', 'ramya@sairam.edu.in', '69f8ccc05b12ef0f8c94d2d0087124bd'),
(11, 'Dr.S.Samundeshwari', 'CSE', 'samundeshwari@sairam.edu.in', '9f20108351a163a40ec5a00ad2ce0cf8'),
(12, 'Sathish Kumar', 'CSE', 'sathishkumar@sairam.edu.in', 'df07ea4cbefe33f717dd19aefd78e8b2'),
(13, 'Jegan Amarnath', 'CSE', 'jeganamarnath@sairam.edu.in', '1755bcef53c9c39a5263e68d49623c91'),
(14, 'Lenin', 'LMES', 'lenin@sairam.edu.in', '1d0f20d9e6b11a6a5d0e7f6cbee71e51'),
(15, 'Bala', 'LMES', 'bala@sairam.edu.in', '9a5aab71aac4028688f5eda14f55f1f0'),
(16, 'Sheela', 'CSE', 'sheela@sairam.edu.in', 'd08b6ed126fcfc670168916a9384e0fc'),
(17, 'Dr.B.Latha', 'CSE ', 'latha@sairam.edu.in', '0a6ec42b97708001c09c89438f20644c'),
(18, 'Hemanth Kumar', 'MATHS', 'hemanthkumar@sairam.edu.in', '15c0f2b24e1e5f641eebd016ae693e1a'),
(19, 'Guru Subramanian', 'CSE', 'gurusubramanian@sairam.edu.in', '2c34f40e63ccea2acc0952f5f66f5d25'),
(22, 'CEO', 'Managemaent', 'ceo@sairam.edu.in', '55161575f3e05dfb61145c5d63d67d29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `tbl_book_history`
--
ALTER TABLE `tbl_book_history`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_number` (`room_number`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_book_history`
--
ALTER TABLE `tbl_book_history`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `room_id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
