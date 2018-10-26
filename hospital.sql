-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 05:35 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `cross_refer`
--

CREATE TABLE `cross_refer` (
  `id` int(11) NOT NULL,
  `registration` int(15) NOT NULL,
  `refer_to` varchar(99) NOT NULL,
  `department` varchar(99) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `from_doctor` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_inventory`
--

CREATE TABLE `medicine_inventory` (
  `medicine_id` int(15) NOT NULL,
  `type` enum('TUBE','TABLET','CAPSULE','SYRUP','DROP','LOTION','SPRAY','POWDER','INJECTION') NOT NULL,
  `brand` varchar(60) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expiry` date NOT NULL,
  `store_number` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine_inventory`
--

INSERT INTO `medicine_inventory` (`medicine_id`, `type`, `brand`, `generic`, `quantity`, `expiry`, `store_number`, `date`, `time`) VALUES
(1, '', 'Some brand', 'some generic', 65, '2016-06-17', 123, '2015-07-09', '20:00:00'),
(2, '', 'Another Brand', 'Syrup', 50, '2016-10-13', 111, '2015-07-09', '20:01:00'),
(3, '', 'OMNIGEL', 'OMNI', 1, '2017-07-01', 111, '2015-07-10', '06:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `patient_id` int(15) NOT NULL,
  `name` varchar(55) NOT NULL,
  `father_name` varchar(55) DEFAULT NULL,
  `age` int(4) NOT NULL,
  `gender` enum('Male','Female','Not Specified') NOT NULL,
  `blood_group` enum('A+','B+','AB+','O+','A-','B-','AB-','O-','-') DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`patient_id`, `name`, `father_name`, `age`, `gender`, `blood_group`, `remarks`) VALUES
(2, 'Md.Ruhul Amin', 'sdsad', 24, 'Female', 'B+', 'Condition kharap');

-- --------------------------------------------------------

--
-- Table structure for table `prescribed_medicine`
--

CREATE TABLE `prescribed_medicine` (
  `id` int(11) NOT NULL,
  `medicine_data` int(15) NOT NULL,
  `fromm` enum('Store','Others') NOT NULL,
  `unit` enum('TABLET','TUBE','SYRUP','CAPSULE','DROP','INJECTION','LOTION','SPRAY','POWDER') NOT NULL,
  `brand` varchar(60) NOT NULL,
  `generic` varchar(255) NOT NULL,
  `schedule` enum('BIS','1OD','3OD','BT','DA','STAT','SUPP','OM','ON','OPD','PO','SA','SOS','QQN','UD') NOT NULL,
  `days` int(11) NOT NULL,
  `advise` enum('Before Meal','After Meal','With Meal','-') NOT NULL,
  `quantity` int(11) NOT NULL,
  `medicine_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescribed_medicine`
--

INSERT INTO `prescribed_medicine` (`id`, `medicine_data`, `fromm`, `unit`, `brand`, `generic`, `schedule`, `days`, `advise`, `quantity`, `medicine_id`) VALUES
(1, 1, 'Store', 'TABLET', 'IBUGESIC', 'PROFEN', 'BIS', 7, 'After Meal', 14, NULL),
(2, 1, 'Others', 'TUBE', 'OMNI', 'GEL', 'SOS', 30, '-', 1, NULL),
(3, 2, 'Store', 'TABLET', 'squre', 'renitit', '1OD', 5, 'Before Meal', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `patient_id` varchar(15) NOT NULL,
  `registration` int(15) NOT NULL,
  `medicine_data` int(15) NOT NULL,
  `test` varchar(255) DEFAULT NULL,
  `diagnosis` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('Doctor','Pharmacy','Issue') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`patient_id`, `registration`, `medicine_data`, `test`, `diagnosis`, `date`, `time`, `status`) VALUES
('1', 1, 1, '', '', '2015-07-16', '11:27:52', 'Pharmacy'),
('2', 2, 2, '', '', '2018-10-08', '10:02:52', 'Pharmacy');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `email` varchar(56) NOT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `department` varchar(60) NOT NULL,
  `availability` enum('Available','Leave') NOT NULL,
  `type` enum('Admin','Registration','Doctor','Pharmacy') NOT NULL,
  `username` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `email`, `phone`, `address`, `content`, `image`, `department`, `availability`, `type`, `username`) VALUES
(1, 'Super Admin', 'super@email.com', '9876543210', 'Super Admin\'s\r\nAddress', 'I am a lovely Guy.', 'no image', 'Admin', 'Available', 'Admin', 'superadmin'),
(2, 'Super Doctor', 'doctor@email.com', '9999999999', ' Super Doctor\r\nAddress 2', ' Doctor content goes here ', 'http://localhost/ci/images/450241e60d5131d28394e7b1899cfc95.jpg', 'Doctor Department', 'Available', 'Doctor', 'superdoctor'),
(3, 'Super Registration', 'reg@email.com', '7788994455', ' Super Registration\r\nAddress 2', ' The content goes here.... ', 'http://localhost/ci/images/8adbff121bdf9de81675a1ac7afe7494.png', 'Registration Desk Dept', 'Available', 'Registration', 'superreg'),
(4, 'Super Pharmacy', 'pharm@email.com', '8899774455', 'Super Pharmacy\r\nAddress', 'The content of pharmacy profile goes here.', 'http://localhost/hospital/images/22ad0079442fc89571e1fbd17f406d78.jpg', 'Medical Pharmacy', 'Available', 'Pharmacy', 'superpharm'),
(2580, 'Doctor Mumu', 'ruhul11bd@gmail.com', '01751358127', 'sdfsdfd dsffsdf', NULL, 'http://localhost/hospital/images/sksingh.jpg', 'Gaini', 'Available', 'Doctor', 'mumu'),
(12345, 'Md.Ruhul Amin', 'a_shati@yahoo.com', '01749769449', '261/1gdgd', NULL, 'http://localhost/hospital/images/sksingh.jpg', 'Medichine', 'Available', 'Doctor', 'ruhul11bd');

-- --------------------------------------------------------

--
-- Table structure for table `refer`
--

CREATE TABLE `refer` (
  `id` int(11) NOT NULL,
  `registration` int(15) NOT NULL,
  `from_doctor` varchar(25) NOT NULL,
  `to_doctor` varchar(25) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reg_patient`
--

CREATE TABLE `reg_patient` (
  `registration` int(15) NOT NULL,
  `patient_id` int(15) NOT NULL,
  `doctor_id` varchar(15) NOT NULL,
  `stat` enum('Queue','Doctor','Pharmacy','Issue') NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_patient`
--

INSERT INTO `reg_patient` (`registration`, `patient_id`, `doctor_id`, `stat`, `date`, `time`) VALUES
(1, 1, '2', 'Issue', '2015-07-16', '11:24:21'),
(2, 2, '2580', 'Doctor', '2018-10-08', '09:55:02'),
(3, 2, '2580', 'Doctor', '2018-10-08', '09:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_authoriztion`
--

CREATE TABLE `user_authoriztion` (
  `username` varchar(12) NOT NULL,
  `password` varchar(32) NOT NULL,
  `account_type` enum('Admin','Registration','Doctor','Pharmacy') NOT NULL,
  `status` enum('Out','In') NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_authoriztion`
--

INSERT INTO `user_authoriztion` (`username`, `password`, `account_type`, `status`, `last_login`) VALUES
('mumu', '935d380154ff70e426aa5779756d7cfa', 'Doctor', 'Out', '2018-10-08 23:23:35'),
('ruhul11bd', '935d380154ff70e426aa5779756d7cfa', 'Doctor', 'Out', '2018-10-21 17:15:57'),
('superadmin', '935d380154ff70e426aa5779756d7cfa', 'Admin', 'In', '2018-10-10 21:27:37'),
('superdoctor', '935d380154ff70e426aa5779756d7cfa', 'Doctor', 'Out', '2018-10-08 21:59:22'),
('superpharm', '935d380154ff70e426aa5779756d7cfa', 'Pharmacy', 'Out', '2018-10-08 23:23:09'),
('superreg', '935d380154ff70e426aa5779756d7cfa', 'Registration', 'Out', '2018-10-08 23:23:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cross_refer`
--
ALTER TABLE `cross_refer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_inventory`
--
ALTER TABLE `medicine_inventory`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `prescribed_medicine`
--
ALTER TABLE `prescribed_medicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_data` (`medicine_data`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`medicine_data`),
  ADD UNIQUE KEY `registration` (`registration`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `refer`
--
ALTER TABLE `refer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reg_patient`
--
ALTER TABLE `reg_patient`
  ADD PRIMARY KEY (`registration`);

--
-- Indexes for table `user_authoriztion`
--
ALTER TABLE `user_authoriztion`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cross_refer`
--
ALTER TABLE `cross_refer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicine_inventory`
--
ALTER TABLE `medicine_inventory`
  MODIFY `medicine_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `patient_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prescribed_medicine`
--
ALTER TABLE `prescribed_medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `medicine_data` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT for table `refer`
--
ALTER TABLE `refer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reg_patient`
--
ALTER TABLE `reg_patient`
  MODIFY `registration` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
