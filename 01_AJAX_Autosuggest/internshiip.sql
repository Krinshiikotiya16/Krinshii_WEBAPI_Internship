-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2026 at 06:12 PM
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
-- Database: `internshiip`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Stud_name` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Mode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Stud_name`, `Email`, `Contact`, `Mode`) VALUES
('Aarav Patel', 'aarav@gmail.com', '9876543210', 'Online'),
('Rohan Shah', 'rohan@gmail.com', '9876543211', 'Online'),
('Vivaan Mehta', 'vivaan@gmail.com', '9876543212', 'Online'),
('Krish Patel', 'krish@gmail.com', '9876543215', 'Onsite'),
('Harsh Shah', 'harsh@gmail.com', '9876543216', 'Onsite'),
('Yash Mehta', 'yash@gmail.com', '9876543217', 'Onsite'),
('Aryan Joshi', 'aryan@gmail.com', '9876543213', 'Online'),
('Dhruv Trivedi', 'dhruv@gmail.com', '9876543214', 'Online'),
('Meet Desai', 'meet@gmail.com', '9876543218', 'Onsite'),
('Parth Joshi', 'parth@gmail.com', '9876543219', 'Onsite'),
('Dev Patel', 'dev@gmail.com', '9876543220', 'Hybrid'),
('Jay Shah', 'jay@gmail.com', '9876543221', 'Hybrid'),
('Nisarg Mehta', 'nisarg@gmail.com', '9876543222', 'Hybrid'),
('Manav Desai', 'manav@gmail.com', '9876543223', 'Hybrid'),
('Rutvik Trivedi', 'rutvik@gmail.com', '9876543224', 'Hybrid');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
