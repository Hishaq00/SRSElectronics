-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 03:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'Switch Gears', 'Devices used to switch and protect electrical circuits'),
(2, '	Fuses', 'Safety devices that protect electrical circuits from overcurrent.'),
(3, 'Capacitors', 'Components that store and release electrical energy.'),
(4, 'Resistors	', 'Components that resist the flow of electrical current.'),
(5, 'Circuit Breakers	', 'Automatic electrical switches designed to protect circuits from damage caused by overcurrent or short circuit.'),
(6, 'Relays', 'Electrically operated switches used in various applications.');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(1, 'haleema', 'h@gmail.com', 'sqddqd', 'rwerwrwrwr', '2025-01-06 13:26:44'),
(2, 'talha', 't@gmail.com', 'sqddqd', 'ffff', '2025-01-06 13:27:25');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `fname`, `lname`, `email`, `rating`, `message`, `created_at`) VALUES
(1, 'haleema', 'ishaq', 'h@gmail.com', 5, 'gtyryyry', '2025-01-05 20:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` varchar(225) NOT NULL,
  `product_code` varchar(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `product_revision` varchar(20) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `manufacturing_no` varchar(11) NOT NULL,
  `prod_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `product_code`, `prod_name`, `product_revision`, `cat_id`, `manufacturing_no`, `prod_status`) VALUES
('141388977', 'SWG-0005', 'Industrial Switchgear', 'Rev B', 1, 'MN-005', 'Untested'),
('2808619408', 'RC101', 'Resistor', 'RevC', 4, 'MN2234', 'SENT'),
('329680343', 'FUS-0002', 'Slow Blow Fuse', 'Rev 2', 2, 'MN-009', 'Fail'),
('3943612960', 'SXG2025', '\'Switch Gear B', 'REV4', 1, 'MN-000', 'SENT'),
('450389448', 'CAP-0002', 'Ceramic Capacitor', 'Rev B', 3, 'MN-007', 'Untested'),
('4607834158', 'SG-001240', 'Switch Gear ', 'Rev 11', 1, 'MN-001', 'Pass'),
('524678326', 'SWG-0001', 'High Voltage Switchgear', 'Rev 1', 1, 'MN-004', 'SENT'),
('541344076', 'SWG-0002', 'Medium Voltage Switchgear', 'Rev 2', 1, 'MN-003', 'SENT'),
('747933502', 'PRD-001234', 'High Voltage Capacitor', 'Rev 1', 1, 'MN-567890', 'Pass'),
('8246434933', 'FC202', 'Fuse', 'RevA', 2, 'MN876', 'SENT'),
('9956872528', 'CG303', 'capacitor', 'RevA', 3, 'MN223355', 'Untested');

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `testing_id` int(12) NOT NULL,
  `prod_id` int(10) DEFAULT NULL,
  `testing_performed` varchar(255) DEFAULT NULL,
  `result` text DEFAULT NULL,
  `testing_remarks` text DEFAULT NULL,
  `testing_revised` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`testing_id`, `prod_id`, `testing_performed`, `result`, `testing_remarks`, `testing_revised`) VALUES
(404760903, 2147483647, '', 'None None None', 'None', 'None'),
(2147483647, 2147483647, '', 'None None None', 'None', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `testing_types`
--

CREATE TABLE `testing_types` (
  `type_id` varchar(225) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testing_types`
--

INSERT INTO `testing_types` (`type_id`, `type_name`) VALUES
('1', 'Earth continuity test'),
('2', 'Motor rotation speed test'),
('3', 'Noise level measurement'),
('4', 'Performance test'),
('5', 'Stability test'),
('6', 'Standby consumption test'),
('7', 'Working current/voltage check');

-- --------------------------------------------------------

--
-- Table structure for table `test_data`
--

CREATE TABLE `test_data` (
  `id` int(11) NOT NULL,
  `prod_name` varchar(225) NOT NULL,
  `test_type_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test_data`
--

INSERT INTO `test_data` (`id`, `prod_name`, `test_type_id`) VALUES
(1, 'Motor Capacitors', '5 6 7'),
(2, 'Switch gears', '3 7 2'),
(3, 'Fuses', '1 4'),
(4, 'Resistors', '1 6'),
(5, 'Loudspeaker', '4 5'),
(6, 'Sensors', '7 3'),
(7, 'Buzzer', '4 5'),
(8, 'Microphone', '1 2 4'),
(9, 'Power cord', '6 3 7'),
(10, 'Switch', '1 2 5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_role` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_role`, `user_pass`) VALUES
(7, 'Admin', 'Admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(8, 'Manufacturer', 'Admin', '202cb962ac59075b964b07152d234b70'),
(10, 'Tester1', 'Tester1', '202cb962ac59075b964b07152d234b70'),
(11, 'Tester2', 'Tester2', '81dc9bdb52d04dc20036dbd8313ed055'),
(13, 'Tester3', 'Tester3', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`testing_id`);

--
-- Indexes for table `testing_types`
--
ALTER TABLE `testing_types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `test_data`
--
ALTER TABLE `test_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `testing_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `test_data`
--
ALTER TABLE `test_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
