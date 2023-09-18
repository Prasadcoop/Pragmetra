-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Sep 18, 2023 at 06:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pragentra`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(50) NOT NULL,
  `username` varchar(5) NOT NULL,
  `password` varchar(12) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`, `isActive`, `created_at`) VALUES
(1, 'A001', '2025@dmmm', 1, '2023-09-16 06:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `workerdetails`
--

CREATE TABLE `workerdetails` (
  `id` int(11) NOT NULL,
  `worker_id` varchar(50) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workerdetails`
--

INSERT INTO `workerdetails` (`id`, `worker_id`, `full_name`, `password`, `email`, `mobile`, `is_active`, `create_at`) VALUES
(1, 'W001', 'Prasad Anil Sangale', 'dman@14', 'prasad.sangale11@gmail.com', '9673091445', 1, '2023-09-16 12:42:31'),
(2, 'W002', 'kunal', 'Prasad@14', 'prasad.sangale11@gmail.com', '9673091445', 1, '2023-09-16 13:03:33'),
(3, 'W003', 'kunal sangale', 'Prasad@14', 'prasad.sangale11@gmail.com', '9673091445', 1, '2023-09-16 13:05:21'),
(4, 'W004', 'kunal', 'Prasad@14', 'prasad.sangale11@gmail.com', '9673091445', 1, '2023-09-16 13:07:19'),
(5, 'W005', 'kunal sangale', 'Prasad@14', 'prasad.sangale11@gmail.com', '9673091445', 1, '2023-09-16 13:08:19'),
(6, 'W006', 'prakash desai', 'Prasad@14', 'prasad.sangale11@gmail.com', '9673091445', 1, '2023-09-16 13:08:40'),
(7, 'W007', 'kunal', 'Prasad@14', 'prasad.sangale11@gmail.com', '9673091445', 1, '2023-09-16 13:08:44'),
(8, 'W008', 'kunal', 'Prasad@14', 'prasad.sangale11@gmail.com', '9673091445', 0, '2023-09-16 13:08:56'),
(9, 'W009', 'kunal', 'Prasad@14', 'prasad.sangale11@gmail.com', '9673091445', 1, '2023-09-16 13:11:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workerdetails`
--
ALTER TABLE `workerdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `workerdetails`
--
ALTER TABLE `workerdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
