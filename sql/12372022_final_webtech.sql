-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2020 at 07:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


create database AILEEN12372022;
use AILEEN12372022;
--
-- Database: `AILEEN12372022`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administers`
--

CREATE TABLE `Administers` (
  `TestID` int(11) NOT NULL,
  `InventoryID` varchar(6) NOT NULL,
  `CustomerID` bigint(20) UNSIGNED NOT NULL,
  `EmployeeID` int(3) NOT NULL,
  `DateAdministered` datetime DEFAULT NULL,
  `Bill` double NOT NULL,
  `Payment` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Administers`
--



-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CustomerID` bigint(20) UNSIGNED NOT NULL,
  `CustomerFName` varchar(15) NOT NULL,
  `CustomerLName` varchar(15) NOT NULL,
  `CustomerGender` enum('male','female') DEFAULT NULL,
  `CustomerTelephone` varchar(15) NOT NULL,
  `CustomerAddress` varchar(20) DEFAULT NULL,
  `Status` enum('Urgent care','Low-Risk','Healthy') DEFAULT NULL,
  `Diagnosis` enum('Head','Chest','Lower body','Whole body','Throat','Reproduction') DEFAULT NULL,
  `LastCheckupDate` date DEFAULT NULL,
  `CustomerStatus` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `DepartmentID` int(11) NOT NULL,
  `DepartmentName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentID`, `DepartmentName`) VALUES
(1, 'Pharmacy'),
(2, 'Maintenance'),
(3, 'Security'),
(4, 'Administrator ');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `EmployeeID` int(3) NOT NULL,
  `EmployeeFname` varchar(15) NOT NULL,
  `EmployeeLname` varchar(15) NOT NULL,
  `EmployeeGender` enum('male','female') DEFAULT NULL,
  `EmployeeDOB` date DEFAULT NULL,
  `EmployeeAddress` varchar(30) NOT NULL,
  `DepartmentID` int(11) NOT NULL,
  `ShiftTime` time NOT NULL,
  `EmploymentDate` date NOT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  `EmployeeStatus` enum('Active','Inactive','On-Leave','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`EmployeeID`, `EmployeeFname`, `EmployeeLname`, `EmployeeGender`, `EmployeeDOB`, `EmployeeAddress`, `DepartmentID`, `ShiftTime`, `EmploymentDate`, `Salary`, `EmployeeStatus`) VALUES
(101, 'Kojo', 'Armah', 'male', '1992-04-21', 'Cocoa Street,Labadi', 1, '08:00:00', '2012-05-13', '10000', 'Active'),
(102, 'Gladys', 'Offei-Agyekum', 'female', '1995-12-04', 'Dansoman', 1, '10:00:00', '2015-01-07', '9000', 'Active'),
(103, 'Rosemary', 'Opoku', 'female', '1997-06-30', 'Sakumono', 2, '06:00:00', '2016-11-14', '5000', 'Active'),
(104, 'Albert', 'Akrong', 'male', '1985-12-02', 'Nungua Barrier', 2, '18:00:00', '2018-05-05', '3500', 'Active'),
(105, 'Twumasi', 'Ankrah', 'male', '1988-10-27', 'Teshie', 3, '05:00:00', '2011-10-04', '10000', 'Active'),
(106, 'Lisa', 'Rita', 'female', '1998-12-13', 'Lashibi', 1, '09:00:00', '2020-05-04', '2000', 'On-Leave'),
(107, 'Meister', 'Mister', 'male', '1990-04-20', 'Tesano', 4, '08:00:00', '2012-01-20', '30000', 'Active');


-- --------------------------------------------------------

--
-- Table structure for table `EmployeeNumber`
--

CREATE TABLE `EmployeeNumber` (
  `EmployeeTelNo` int(3) NOT NULL,
  `EmployeeID` int(3) NOT NULL,
  `TelNo1` varchar(15) NOT NULL,
  `TelNo2` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `EmployeeNumber`
--

INSERT INTO `EmployeeNumber` (`EmployeeTelNo`, `EmployeeID`, `TelNo1`, `TelNo2`) VALUES
(1, 101, '0245678908', '0265478932'),
(2, 102, '0208976545', '0206578360'),
(3, 103, '0267890932', NULL),
(4, 104, '0244579928', NULL),
(5, 105, '0246730374', '0204536994'),
(6, 106, '0245344545', ''),
(7, 107, '0243564765', NULL);


-- --------------------------------------------------------

--
-- Table structure for table `Employee_Log_in`
--

CREATE TABLE `Employee_Log_in` (
  `EmployeeID` int(3) NOT NULL,
  `Password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Employee_Log_in`
--

INSERT INTO `Employee_Log_in` (`EmployeeID`, `Password`) VALUES
(101, '$2y$10$GdO4zjfgibWHRnXZW7DrgO.49OA7XwLvuTxRxwIKFbyZP1wCDl6WS'),
(102, '$2y$10$R4XTqwDV6C1cLS5HClnY1OiA/w17YGbw.oqRzbjdpake2tvpRZ9Hy'),
(103, '$2y$10$OBLTird/5/5l2YeQLD6mpuq4X0.WGDGcDwsQy3zjbcWo4e/02Z3aG'),
(104, '$2y$10$f7rkR3aO.MYWCjlFLk4DT.vPnvJ1umOOtg66TgEiogid2jIqV71ha'),
(105, '$2y$10$YnL7MhZUPGy/./03qSVxa.aeE7pXiEEYJF6ljre8XVDGB7cuP3NyG'),
(106, '$2y$10$XNUMNRUYAc42.UP3YopHK.lZT2XG8P2j4vFifXFstLTdnfKa9KWTS'),
(107, '$2y$10$ih5IExJiqTW32SASTUc.TOQTOjNApCVmBoYxRHavWLRFnlh3A7pn.');


-- --------------------------------------------------------

--
-- Table structure for table `Employee_Time`
--

CREATE TABLE `Employee_Time` (
  `EmployeeID` int(3) NOT NULL,
  `Report_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `InventoryID` varchar(6) NOT NULL,
  `InventoryName` varchar(20) NOT NULL,
  `ExpiryDate` date DEFAULT NULL,
  `SuppliersID` varchar(3) NOT NULL,
  `NumberofItems` int(100) NOT NULL,
  `Price` double NOT NULL,
  `Status` enum('Available','Unavailable') DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` (`InventoryID`, `InventoryName`, `ExpiryDate`, `SuppliersID`, `NumberofItems`, `Price`, `Status`) VALUES
('M001', 'Panadol', '2022-05-21', 'S04', 42, 25, 'Available'),
('M003', 'Coartem', '2025-06-19', 'S01', 270, 45, 'Available'),
('M005', 'Strepsils', '2024-08-08', 'S02', 146, 50, 'Available'),
('M020', 'MalariaTest', '2024-09-09', 'S02', 63, 50, 'Available'),
('M022', 'Sphygmanometer', '2028-11-12', 'S02', 100, 15, 'Available'),
('M026', 'Azithromycin', '2024-10-22', 'S01', 200, 45, 'Available'),
('T011', 'Baby Powder', '2021-12-24', 'S05', 146, 15, 'Available'),
('T022', 'Shea butter soap', '2022-05-20', 'S04', 42, 25, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `Maintenance`
--

CREATE TABLE `Maintenance` (
  `EmployeeID` int(3) NOT NULL,
  `CleaningLocation` enum('StorageFacility','Main Store','Compound') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Maintenance`
--

INSERT INTO `Maintenance` (`EmployeeID`, `CleaningLocation`) VALUES
(103, 'Compound'),
(104, 'Main Store'),
(104, 'StorageFacility');

-- --------------------------------------------------------

--
-- Table structure for table `Medicine`
--

CREATE TABLE `Medicine` (
  `InventoryID` varchar(6) NOT NULL,
  `MedicineType` enum('Antipyrestics','Antibiotics','Analgesics','Anti-malarial','Contraceptives','BodyWear','Vitamins') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Medicine`
--

INSERT INTO `Medicine` (`InventoryID`, `MedicineType`) VALUES
('M001', 'Antipyrestics'),
('M003', 'Anti-malarial'),
('M005', 'Vitamins'),
('M026', 'Antibiotics');

-- --------------------------------------------------------

--
-- Table structure for table `Message_Requests`
--

CREATE TABLE `Message_Requests` (
  `MessageID` int(11) NOT NULL,
  `EmployeeID` int(3) NOT NULL,
  `RequestType` enum('DELETE ITEM','UPDATE PROFILE','REQUEST LEAVE') NOT NULL,
  `MainMessage` text NOT NULL,
  `RequestStatus` enum('PENDING','PROCESSED','COMPLETED','DENIED') NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `PaymentMode` varchar(5) NOT NULL,
  `PaymentFee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`PaymentMode`, `PaymentFee`) VALUES
('Cash', 0),
('Momo', 2),
('POS', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Pharmacy`
--

CREATE TABLE `Pharmacy` (
  `EmployeeID` int(3) NOT NULL,
  `StockKeeper` enum('Yes','No') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Pharmacy`
--

INSERT INTO `Pharmacy` (`EmployeeID`, `StockKeeper`) VALUES
(101, 'Yes'),
(102, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `Security`
--

CREATE TABLE `Security` (
  `EmployeeID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Security`
--

INSERT INTO `Security` (`EmployeeID`) VALUES
(105);

-- --------------------------------------------------------

--
-- Table structure for table `Sellsto`
--

CREATE TABLE `Sellsto` (
  `SaleId` varchar(4) NOT NULL,
  `InventoryID` varchar(6) NOT NULL,
  `EmployeeID` int(3) NOT NULL,
  `CustomerID` bigint(20) UNSIGNED NOT NULL,
  `DateofSale` datetime DEFAULT NULL,
  `PaymentMode` varchar(5) DEFAULT NULL,
  `Bill` double DEFAULT NULL,
  `Quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `SuppliersID` varchar(3) NOT NULL,
  `CompanyName` varchar(20) DEFAULT NULL,
  `CompanyLocation` varchar(20) DEFAULT NULL,
  `TelephoneNumber` varchar(10) NOT NULL,
  `ProductType` enum('Medicine','Toiletries') DEFAULT NULL,
  `CompanyStatus` enum('ACTIVE','TERMINATED') NOT NULL DEFAULT 'ACTIVE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`SuppliersID`, `CompanyName`, `CompanyLocation`, `TelephoneNumber`, `ProductType`, `CompanyStatus`) VALUES
('S01', 'Ernest Chemists Ltd', 'Circle', '0302897462', 'Medicine', 'ACTIVE'),
('S02', 'Tobinco Ltd', 'Spintex', '0302678394', 'Medicine', 'ACTIVE'),
('S03', 'Taabea Herbal ', 'Dansoman', '0302780823', 'Medicine', 'ACTIVE'),
('S04', 'Beauty Secrets', 'East Legon', '0242352694', 'Toiletries', 'ACTIVE'),
('S05', 'Unilever ltd', 'Teshie', '0302723422', 'Toiletries', 'ACTIVE'),
('S06', 'Kinapharma Limited', 'Adjiriganor Bus Stop', '0246779022', 'Medicine', 'ACTIVE'),
('S07', 'Kina Limited', 'Adjiriganor', '0246779070', 'Medicine', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `Tests`
--

CREATE TABLE `Tests` (
  `InventoryID` varchar(6) NOT NULL,
  `TestType` enum('Malaria','Blood Pressure') DEFAULT NULL,
  `TestKit` enum('Local','Foreign') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Tests`
--

INSERT INTO `Tests` (`InventoryID`, `TestType`, `TestKit`) VALUES
('M020', 'Malaria', 'Local'),
('M022', 'Blood Pressure', 'Foreign');

-- --------------------------------------------------------

--
-- Table structure for table `Toiletries`
--

CREATE TABLE `Toiletries` (
  `InventoryID` varchar(6) NOT NULL,
  `ToiletriesType` enum('Body','Hair','Baby','Face') DEFAULT NULL,
  `Brand` enum('Cussons','Beauty Formula','Beauty Secrets') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Toiletries`
--

INSERT INTO `Toiletries` (`InventoryID`, `ToiletriesType`, `Brand`) VALUES
('T022', 'Body', 'Beauty Secrets'),
('T011', 'Baby', 'Cussons');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Administers`
--
ALTER TABLE `Administers`
  ADD PRIMARY KEY (`TestID`),
  ADD KEY `InventoryID` (`InventoryID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `Administers_ibfk_3` (`EmployeeID`),
  ADD KEY `Foreign Key` (`Payment`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DepartmentID`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD KEY `DepartmentID` (`DepartmentID`);

--
-- Indexes for table `EmployeeNumber`
--
ALTER TABLE `EmployeeNumber`
  ADD PRIMARY KEY (`EmployeeTelNo`),
  ADD KEY `EmployeeNumber_ibfk_1` (`EmployeeID`);

--
-- Indexes for table `Employee_Log_in`
--
ALTER TABLE `Employee_Log_in`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `Employee_Time`
--
ALTER TABLE `Employee_Time`
  ADD KEY `Employee_Time_ibfk_1` (`EmployeeID`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`InventoryID`),
  ADD KEY `SuppliersID` (`SuppliersID`);

--
-- Indexes for table `Maintenance`
--
ALTER TABLE `Maintenance`
  ADD KEY `EmployeeID` (`EmployeeID`);

--
-- Indexes for table `Medicine`
--
ALTER TABLE `Medicine`
  ADD KEY `InventoryID` (`InventoryID`);

--
-- Indexes for table `Message_Requests`
--
ALTER TABLE `Message_Requests`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`PaymentMode`);

--
-- Indexes for table `Pharmacy`
--
ALTER TABLE `Pharmacy`
  ADD KEY `Pharmacy_ibfk_1` (`EmployeeID`);

--
-- Indexes for table `Security`
--
ALTER TABLE `Security`
  ADD PRIMARY KEY (`EmployeeID`);

--
-- Indexes for table `Sellsto`
--
ALTER TABLE `Sellsto`
  ADD PRIMARY KEY (`SaleId`),
  ADD KEY `InventoryID` (`InventoryID`),
  ADD KEY `PaymentMode` (`PaymentMode`),
  ADD KEY `Sellsto_ibfk_2` (`EmployeeID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`SuppliersID`);

--
-- Indexes for table `Tests`
--
ALTER TABLE `Tests`
  ADD KEY `InventoryID` (`InventoryID`);

--
-- Indexes for table `Toiletries`
--
ALTER TABLE `Toiletries`
  ADD KEY `InventoryID` (`InventoryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Administers`
--
ALTER TABLE `Administers`
  MODIFY `TestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `CustomerID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `EmployeeID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `EmployeeNumber`
--
ALTER TABLE `EmployeeNumber`
  MODIFY `EmployeeTelNo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Message_Requests`
--
ALTER TABLE `Message_Requests`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Administers`
--
ALTER TABLE `Administers`
  ADD CONSTRAINT `Administers_ibfk_1` FOREIGN KEY (`InventoryID`) REFERENCES `Inventory` (`InventoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Administers_ibfk_3` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Administers_ibfk_5` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`),
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`Payment`) REFERENCES `Payment` (`PaymentMode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Employee`
--
ALTER TABLE `Employee`
  ADD CONSTRAINT `Employee_ibfk_1` FOREIGN KEY (`DepartmentID`) REFERENCES `department` (`DepartmentID`);

--
-- Constraints for table `EmployeeNumber`
--
ALTER TABLE `EmployeeNumber`
  ADD CONSTRAINT `EmployeeNumber_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`) ON DELETE CASCADE;

--
-- Constraints for table `Employee_Log_in`
--
ALTER TABLE `Employee_Log_in`
  ADD CONSTRAINT `Employee_Log_in_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`);

--
-- Constraints for table `Employee_Time`
--
ALTER TABLE `Employee_Time`
  ADD CONSTRAINT `Employee_Time_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`);

--
-- Constraints for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD CONSTRAINT `Inventory_ibfk_1` FOREIGN KEY (`SuppliersID`) REFERENCES `suppliers` (`SuppliersID`);

--
-- Constraints for table `Maintenance`
--
ALTER TABLE `Maintenance`
  ADD CONSTRAINT `Maintenance_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`);

--
-- Constraints for table `Medicine`
--
ALTER TABLE `Medicine`
  ADD CONSTRAINT `Medicine_ibfk_1` FOREIGN KEY (`InventoryID`) REFERENCES `Inventory` (`InventoryID`);

--
-- Constraints for table `Pharmacy`
--
ALTER TABLE `Pharmacy`
  ADD CONSTRAINT `Pharmacy_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`);

--
-- Constraints for table `Security`
--
ALTER TABLE `Security`
  ADD CONSTRAINT `Security_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`);

--
-- Constraints for table `Sellsto`
--
ALTER TABLE `Sellsto`
  ADD CONSTRAINT `Sellsto_ibfk_1` FOREIGN KEY (`InventoryID`) REFERENCES `Inventory` (`InventoryID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Sellsto_ibfk_2` FOREIGN KEY (`EmployeeID`) REFERENCES `Employee` (`EmployeeID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Sellsto_ibfk_4` FOREIGN KEY (`PaymentMode`) REFERENCES `Payment` (`PaymentMode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Sellsto_ibfk_5` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Tests`
--
ALTER TABLE `Tests`
  ADD CONSTRAINT `Tests_ibfk_1` FOREIGN KEY (`InventoryID`) REFERENCES `Inventory` (`InventoryID`);

--
-- Constraints for table `Toiletries`
--
ALTER TABLE `Toiletries`
  ADD CONSTRAINT `Toiletries_ibfk_1` FOREIGN KEY (`InventoryID`) REFERENCES `Inventory` (`InventoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
