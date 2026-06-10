-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2026 at 05:03 AM
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
-- Table structure for table `usercapcha`
--

CREATE TABLE `usercapcha` (
  `Name` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercapcha`
--

INSERT INTO `usercapcha` (`Name`, `Username`, `Password`) VALUES
('Krinshi Kotiya', 'krinshi01', 'krinshi123'),
('Piya Modha', 'piya02', 'piya123'),
('Rahul Joshi', 'rahul03', 'rahul123'),
('Amit Parmar', 'amit04              ', 'amit123'),
('Neha Khokhri', 'neha05              ', 'neha123'),
('Priya Joshi', 'priya06             ', 'piya123'),
('Rohan Odedra', 'rohan07             ', 'rohan123'),
('Kiran Patel', 'kiran08             ', 'kiran123'),
('Sneha Salet', 'sneha09             ', 'sneha123'),
('Vijay Modha', 'vijay10             ', 'vijay123'),
('Pooja Sindhav', 'pooja11             ', 'pooja123'),
('Arjun Katira', 'arjun12             ', 'arjun123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
