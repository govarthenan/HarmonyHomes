-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 18, 2024 at 01:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harmonyhomes`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `subject` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `topic` text NOT NULL,
  `status` text NOT NULL DEFAULT 'Submitted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table to store complaints lodged by Resident.';

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `user_id`, `created_date`, `subject`, `description`, `topic`, `status`) VALUES
(5, 10, '2024-04-17', 'Balance given', 'Balance for electricity fee not given', 'Finance', 'Submitted'),
(6, 11, '2024-04-17', 'Pet went missing', 'I didn&#039;t see my pet from yesterday.', 'Other', 'Submitted'),
(8, 10, '2024-04-18', 'XYZ', 'ao;sdhfosiafjosd', 'Maintenance', 'Submitted');

-- --------------------------------------------------------

--
-- Table structure for table `resident`
--

CREATE TABLE `resident` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `gender` char(1) NOT NULL,
  `floor_number` int(11) NOT NULL,
  `door_number` int(11) NOT NULL,
  `nic` varchar(15) NOT NULL,
  `nic_path` varchar(4096) NOT NULL,
  `agreement_path` varchar(4096) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Store resident''s registration details';

--
-- Dumping data for table `resident`
--

INSERT INTO `resident` (`user_id`, `email`, `name`, `phone`, `birthday`, `gender`, `floor_number`, `door_number`, `nic`, `nic_path`, `agreement_path`, `password`) VALUES
(10, 'gova@gmail.com', 'Govarthenan Rajadurai', 752508610, '2001-04-19', 'm', 7, 2, '200111000487', '/opt/lampp/htdocs/harmonyhomes/app/uploads/706dfed6feb75e33bcbc9cc201d016bfa1e7db94e9a0e4d934080dac1e63cc21.jpeg', '/opt/lampp/htdocs/harmonyhomes/app/uploads/8e52ccf7245428e42947ecea3dbdbec6c4a4dab719eeb16b1207915534390ad1.jpg', '$2y$10$wAD47/ct/xCQRyRyRvHrGOFPvK7Vm6p1z8GgACi0Tp99iRbzyOgWq'),
(11, 'davis@ymail.com', 'Davis Peiries', 773415186, '1994-08-14', 'f', 6, 3, '1995446758429', '/opt/lampp/htdocs/harmonyhomes/app/uploads/706dfed6feb75e33bcbc9cc201d016bfa1e7db94e9a0e4d934080dac1e63cc21_1713203265.jpeg', '/opt/lampp/htdocs/harmonyhomes/app/uploads/8e52ccf7245428e42947ecea3dbdbec6c4a4dab719eeb16b1207915534390ad1_1713203265.jpg', '$2y$10$wAD47/ct/xCQRyRyRvHrGOFPvK7Vm6p1z8GgACi0Tp99iRbzyOgWq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `resident`
--
ALTER TABLE `resident`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `resident`
--
ALTER TABLE `resident`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `resident` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
