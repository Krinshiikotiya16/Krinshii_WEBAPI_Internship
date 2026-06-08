-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 01, 2026 at 01:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajaxdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `course` enum('AI Automation','Web API Integration') NOT NULL,
  `city` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_name`, `course`, `city`, `created_at`) VALUES
(1, 'Odedara Bhima', 'Web API Integration', 'Porbandar', '2026-06-01 11:06:39'),
(2, 'Bharkhda Aaryan', 'Web API Integration', 'Ahmedabad', '2026-06-01 11:06:39'),
(3, 'Chavda Nitanshi', 'AI Automation', 'Rajkot', '2026-06-01 11:06:39'),
(4, 'Chavda Parth', 'AI Automation', 'Vadodara', '2026-06-01 11:06:39'),
(5, 'Joshi Vedanshi', 'AI Automation', 'Rajkot', '2026-06-01 11:06:39'),
(6, 'Vadhiya Rinkal', 'Web API Integration', 'Porbandar', '2026-06-01 11:06:39'),
(7, 'Kotiya Krinshi', 'Web API Integration', 'Porbandar', '2026-06-01 11:06:39'),
(8, 'Dave Pooja', 'AI Automation', 'Rajkot', '2026-06-01 11:06:39'),
(9, 'Maheta Kavya', 'Web API Integration', 'Porbandar', '2026-06-01 11:06:39'),
(10, 'Odedara Diya', 'Web API Integration', 'Surat', '2026-06-01 11:06:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
