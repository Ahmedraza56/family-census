-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2024 at 09:43 AM
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
-- Database: `jamiat_family_census`
--

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `id` int(11) NOT NULL,
  `community_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`id`, `community_name`) VALUES
(1, 'Allahwala'),
(2, 'Chawla'),
(3, 'Kathoria'),
(4, 'Sarwana'),
(5, 'Shamsi');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `family_name` varchar(150) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `father_name` varchar(150) NOT NULL,
  `mother_name` varchar(150) NOT NULL,
  `spouse_name` varchar(200) NOT NULL,
  `business_name` varchar(150) NOT NULL,
  `business_address` varchar(200) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `mobile_number` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `facebook_id` varchar(300) NOT NULL,
  `linkedin_id` varchar(300) NOT NULL,
  `twitter_id` varchar(300) NOT NULL,
  `additional_info` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_id`, `first_name`, `last_name`, `family_name`, `date_of_birth`, `gender`, `father_name`, `mother_name`, `spouse_name`, `business_name`, `business_address`, `job_title`, `mobile_number`, `email`, `facebook_id`, `linkedin_id`, `twitter_id`, `additional_info`) VALUES
(1, 6, 'admin', 'AdminLastName', 'AdminFamilyName', '2000-01-01', 'M', 'FatherAdmin', 'MotherAdmin', 'SpouseAdmin', 'AdminBusiness', 'AdminAddress', 'AdminJobTitle', '1234567890', 'admin@gmail.com', 'adminFacebook', 'adminLinkedIn', 'adminTwitter', 'Additional admin info');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `password` varchar(255) DEFAULT NULL,
  `date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `date`) VALUES
(6, 'Admin', 'admin@gmail.com', 1, 'admin123', '2024-05-14'),
(11, 'zahid', 'Zahid@gmail.com', 0, '123', '2024-05-14'),
(12, 'zahid', 'Zahid@gmail.com', 0, '123', '2024-05-14'),
(13, 'nasar', 'nasar@gmail.com', 0, '123', '2024-05-14'),
(14, 'fahad', 'fahad@gmail.com', 0, '123', '2024-05-14'),
(15, 'Kamran', 'kamran@didx.net', 0, 'kamran', '2024-05-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `community`
--
ALTER TABLE `community`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
