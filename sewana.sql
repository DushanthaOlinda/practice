-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2021 at 07:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewana`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertised`
--

CREATE TABLE `advertised` (
  `advertisement_ID` int(11) NOT NULL,
  `date` date NOT NULL,
  `newspaper_name` varchar(50) NOT NULL,
  `property_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertised`
--

INSERT INTO `advertised` (`advertisement_ID`, `date`, `newspaper_name`, `property_number`) VALUES
(1, '2021-10-06', 'Sunday Tames', 1),
(2, '2021-10-13', 'Sunday Tames', 1),
(3, '2021-10-14', 'Sunday Tames', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `newspaper_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`newspaper_name`, `Email`, `address`, `contact_number`) VALUES
('Sunday Tames', 'Jafa@gmail.com', '2,shhshs,sgsgs', 711237892);

-- --------------------------------------------------------

--
-- Table structure for table `assistant`
--

CREATE TABLE `assistant` (
  `emp_ID` int(11) NOT NULL,
  `supervisor_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_no` int(11) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_no`, `contact_number`, `address`, `email`, `district`) VALUES
(1, 1123456789, 'Dambulla Rd., Melsiripura', 'sewanaKuru@gmail.com', 'Kurunegala'),
(2, 112121212, 'fddddd', 'Jandfdfdnga@gmail.com', 'Colombo');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_number` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `NIC` varchar(25) NOT NULL,
  `branch_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_number`, `Email`, `full_name`, `NIC`, `branch_no`) VALUES
(2, 'Janlllyanga@Gmail.com', '', '43434234V', 1),
(3, 'Jatfnga@gmail.com', 'hyu', '43434234534v', 1),
(4, 'Jatfnga@gmail.com', 'hyu', '43434234534v', 1),
(5, 'Janofdnga@gmail.com', 'Janod Umayanga', '43434254545v', 1),
(6, 'Janofdnga@gmail.com', 'Janod Umayanga', '43434254545v', 1),
(7, 'Janofdnga@gmail.com', 'Janod Umayanga', '43434254545v', 1),
(8, 'Janofdnga@gmail.com', 'Janod Umayanga', '43434254545v', 1),
(9, 'Jaoa@gmail.com', 'hjlo', '222222222v', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_ID` int(11) NOT NULL,
  `owner_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_ID`, `owner_ID`) VALUES
(7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_ID` int(11) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  `DOB` date NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `emp_type` varchar(25) NOT NULL,
  `branch_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_ID`, `gender`, `name`, `start_date`, `salary`, `DOB`, `NIC`, `contact_number`, `emp_type`, `branch_no`) VALUES
(1, 'M', 'Batman', '2021-10-11', '4500.00', '1997-06-10', '1212111v', 710560492, 'Manager', 2),
(2, 'M', 'Superman', '2021-10-06', '435.00', '2021-09-29', 'fddfdv', 112121212, 'Supervisor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lease`
--

CREATE TABLE `lease` (
  `client_number` int(11) NOT NULL,
  `property_number` int(11) NOT NULL,
  `emp_ID` int(11) NOT NULL,
  `monthly_rent` decimal(7,2) NOT NULL,
  `payment_method` varchar(12) NOT NULL,
  `started_date` date NOT NULL,
  `finished_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lease`
--

INSERT INTO `lease` (`client_number`, `property_number`, `emp_ID`, `monthly_rent`, `payment_method`, `started_date`, `finished_date`) VALUES
(4, 1, 1, '420.00', 'Credit Card', '2021-10-21', '2021-10-27'),
(3, 1, 1, '69420.00', 'Cheque', '2021-10-27', '2021-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `emp_ID` int(11) NOT NULL,
  `manager_number` int(11) NOT NULL,
  `appointed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`emp_ID`, `manager_number`, `appointed_date`) VALUES
(1, 1, '2021-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_ID` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` int(15) NOT NULL,
  `branch_no` int(11) NOT NULL,
  `owner_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_ID`, `address`, `name`, `email`, `contact_number`, `branch_no`, `owner_type`) VALUES
(1, 'gfgfgf', 'fgfg', 'gfyanga@gmail.com', 234560492, 1, 'Person'),
(2, '4343,hjhj', 'fg', 'jyuiga@gmail.com', 718769092, 1, 'Company');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `NIC` varchar(25) NOT NULL,
  `owner_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`NIC`, `owner_ID`) VALUES
('43434343434343v', 1);

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `property_number` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `number_of_rooms` int(11) NOT NULL,
  `proposed_rental` decimal(7,2) NOT NULL,
  `type` varchar(25) NOT NULL,
  `owner_ID` int(11) NOT NULL,
  `client_number` int(11) DEFAULT NULL,
  `branch_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`property_number`, `address`, `number_of_rooms`, `proposed_rental`, `type`, `owner_ID`, `client_number`, `branch_no`) VALUES
(1, 'dasdswds', 14, '5600.00', 'annex', 1, NULL, 1),
(2, 'dasdswds', 3, '230.00', 'annex', 1, NULL, 1),
(3, 'dasdswds', 3, '230.00', 'annex', 1, NULL, 1),
(4, 'dasdswds', 3, '230.00', 'annex', 1, NULL, 1),
(5, '24/56,fgfhd', 17, '12000.00', 'annex', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `property_requirement`
--

CREATE TABLE `property_requirement` (
  `client_number` int(11) NOT NULL,
  `requirement_number` int(11) NOT NULL,
  `maximum_rental` decimal(10,0) NOT NULL,
  `type_of_property` varchar(50) NOT NULL,
  `date_willing_to_rent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property_requirement`
--

INSERT INTO `property_requirement` (`client_number`, `requirement_number`, `maximum_rental`, `type_of_property`, `date_willing_to_rent`) VALUES
(2, 2, '4566', 'house', '2021-10-13'),
(3, 3, '4560', 'house', '2021-10-06'),
(4, 4, '4560', 'house', '2021-10-06'),
(5, 6, '900', 'house', '2021-10-13'),
(6, 7, '900', 'house', '2021-10-13'),
(7, 8, '900', 'house', '2021-10-13'),
(8, 9, '900', 'house', '2021-10-13'),
(9, 10, '45609', 'annex', '2021-10-12'),
(6, 11, '456', 'house', '2021-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `emp_ID` int(11) NOT NULL,
  `supervisor_number` int(11) NOT NULL,
  `appointed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`emp_ID`, `supervisor_number`, `appointed_date`) VALUES
(2, 1, '2021-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `UserRoll` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `UserRoll`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'emp', 'emp', 'employee'),
(3, 'owner', 'owner', 'owner'),
(4, 'client', 'client', 'client');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `client_number` int(11) NOT NULL,
  `property_number` int(11) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertised`
--
ALTER TABLE `advertised`
  ADD PRIMARY KEY (`advertisement_ID`),
  ADD KEY `property_number` (`property_number`),
  ADD KEY `newspaper_name` (`newspaper_name`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`newspaper_name`);

--
-- Indexes for table `assistant`
--
ALTER TABLE `assistant`
  ADD PRIMARY KEY (`emp_ID`),
  ADD KEY `supervisor_number` (`supervisor_number`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_no`),
  ADD UNIQUE KEY `district` (`district`),
  ADD UNIQUE KEY `contact_number` (`contact_number`,`address`,`email`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_number`),
  ADD KEY `branch_no` (`branch_no`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_ID`),
  ADD KEY `owner_ID` (`owner_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_ID`),
  ADD KEY `branch_no` (`branch_no`);

--
-- Indexes for table `lease`
--
ALTER TABLE `lease`
  ADD KEY `client_number` (`client_number`),
  ADD KEY `property_number` (`property_number`),
  ADD KEY `emp_ID` (`emp_ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_number`,`emp_ID`),
  ADD KEY `emp_ID` (`emp_ID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_ID`),
  ADD KEY `branch_no` (`branch_no`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`NIC`),
  ADD KEY `owner_ID` (`owner_ID`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_number`),
  ADD KEY `owner_ID` (`owner_ID`),
  ADD KEY `client_number` (`client_number`),
  ADD KEY `branch_no` (`branch_no`);

--
-- Indexes for table `property_requirement`
--
ALTER TABLE `property_requirement`
  ADD PRIMARY KEY (`requirement_number`,`client_number`),
  ADD KEY `client_number` (`client_number`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`supervisor_number`,`emp_ID`),
  ADD KEY `emp_ID` (`emp_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD KEY `client_number` (`client_number`),
  ADD KEY `property_number` (`property_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertised`
--
ALTER TABLE `advertised`
  MODIFY `advertisement_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property_requirement`
--
ALTER TABLE `property_requirement`
  MODIFY `requirement_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `supervisor_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advertised`
--
ALTER TABLE `advertised`
  ADD CONSTRAINT `advertised_ibfk_1` FOREIGN KEY (`newspaper_name`) REFERENCES `advertisement` (`newspaper_name`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `advertised_ibfk_2` FOREIGN KEY (`property_number`) REFERENCES `property` (`property_number`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `assistant`
--
ALTER TABLE `assistant`
  ADD CONSTRAINT `assistant_ibfk_1` FOREIGN KEY (`supervisor_number`) REFERENCES `supervisor` (`supervisor_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assistant_ibfk_2` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`branch_no`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`owner_ID`) REFERENCES `owner` (`owner_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`branch_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lease`
--
ALTER TABLE `lease`
  ADD CONSTRAINT `lease_ibfk_1` FOREIGN KEY (`client_number`) REFERENCES `client` (`client_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lease_ibfk_2` FOREIGN KEY (`property_number`) REFERENCES `property` (`property_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lease_ibfk_3` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`branch_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`owner_ID`) REFERENCES `owner` (`owner_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property`
--
ALTER TABLE `property`
  ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`owner_ID`) REFERENCES `owner` (`owner_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`client_number`) REFERENCES `client` (`client_number`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `property_ibfk_3` FOREIGN KEY (`branch_no`) REFERENCES `branch` (`branch_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_requirement`
--
ALTER TABLE `property_requirement`
  ADD CONSTRAINT `property_requirement_ibfk_1` FOREIGN KEY (`client_number`) REFERENCES `client` (`client_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`client_number`) REFERENCES `client` (`client_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visit_ibfk_2` FOREIGN KEY (`property_number`) REFERENCES `property` (`property_number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
