-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 03, 2023 at 01:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispensing`
--

CREATE TABLE `dispensing` (
  `dispensing_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date_dispensed` date NOT NULL,
  `quantity_dispensed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dispensing`
--

INSERT INTO `dispensing` (`dispensing_id`, `prescription_id`, `employee_id`, `date_dispensed`, `quantity_dispensed`) VALUES
(2, 2, 3, '2023-06-29', '6'),
(5, 6, 4, '2023-05-31', '10');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_position` varchar(255) NOT NULL,
  `employee_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_position`, `employee_contact`) VALUES
(3, 'Ericka Mae Rodillo', 'Pharmacist', '09612272705'),
(4, 'John Syte Tiopes', 'Pharmacist', '09154555633');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `medication_id` int(11) NOT NULL,
  `stock_quantity` varchar(255) NOT NULL,
  `reorder_level` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `medication_id`, `stock_quantity`, `reorder_level`, `expiry_date`) VALUES
(2, 4, '100', '25', '2023-06-10'),
(3, 3, '2', '5', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `medication_id` int(11) NOT NULL,
  `medication_name` varchar(255) NOT NULL,
  `medication_type` varchar(255) NOT NULL,
  `medication_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`medication_id`, `medication_name`, `medication_type`, `medication_description`) VALUES
(3, 'Paracetamol', 'Analgesic', 'Paracetamol is a common over-the-counter pain reliever and fever reducer.'),
(4, 'Amoxicillin', 'Antibiotic', 'Amoxicillin is an antibiotic used to treat various bacterial infections, such as respiratory tract infections and urinary tract infections.'),
(7, 'Paracetamol', 'Analgesic', 'Paracetamol is a common over-the-counter pain reliever and fever reducer.'),
(8, 'Amoxicillin', 'Analgesic', 'Paracetamol is a common over-the-counter pain reliever and fever reducer.'),
(9, 'dsad', 'dasda', 'dasdas');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_address` varchar(255) NOT NULL,
  `patient_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `patient_address`, `patient_contact`) VALUES
(3, 'Ericka Mae Rodillo', 'Sun Valley, Paranaque City', '09612272705'),
(4, 'john syte', 'Moonwalk, Paranaque City', '09154555633');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `prescription_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `medication_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `date_prescribed` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`prescription_id`, `patient_id`, `medication_id`, `quantity`, `date_prescribed`) VALUES
(2, 3, 3, '20', '2023-05-31'),
(6, 4, 4, 'dasdas', '2023-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `user_type`) VALUES
(14, 'johnsyte', '12345', 'admin'),
(29, 'erickamae', '123', 'pharmacist'),
(33, 'Roosevelt', '12345', 'pharmacist'),
(34, 'Steve Jobs', '1234', 'admin'),
(35, 'Mark Zuckerberg', '123', 'pharmacist'),
(36, 'erickamaerodillo', '123', 'admin'),
(37, 'dogie', '123', 'pharmacist'),
(38, 'catty', '13', 'pharmacist'),
(39, 'monkyy', '123', 'pharmacist'),
(40, 'birdie', '123', 'pharmacist'),
(41, 'mikey', '123', 'pharmacist'),
(42, 'erwin', '123', 'patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispensing`
--
ALTER TABLE `dispensing`
  ADD PRIMARY KEY (`dispensing_id`),
  ADD KEY `prescription_id` (`prescription_id`,`employee_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `medication_id` (`medication_id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`medication_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`prescription_id`),
  ADD KEY `patient_id` (`patient_id`,`medication_id`),
  ADD KEY `medication_id` (`medication_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispensing`
--
ALTER TABLE `dispensing`
  MODIFY `dispensing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `medication_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `prescription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dispensing`
--
ALTER TABLE `dispensing`
  ADD CONSTRAINT `dispensing_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `dispensing_ibfk_2` FOREIGN KEY (`prescription_id`) REFERENCES `prescription` (`prescription_id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`medication_id`) REFERENCES `medication` (`medication_id`);

--
-- Constraints for table `prescription`
--
ALTER TABLE `prescription`
  ADD CONSTRAINT `prescription_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `prescription_ibfk_2` FOREIGN KEY (`medication_id`) REFERENCES `medication` (`medication_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
