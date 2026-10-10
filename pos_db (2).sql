-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2026 at 08:14 AM
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
-- Database: `pos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `email`, `phone`, `created_at`) VALUES
(1, 'Davee Kendra Vinoya', 'dmvinoya@fit.edu.ph', '09171234567', '2026-10-10 12:48:15'),
(2, 'Maria Clara', 'maria@example.com', '09182345678', '2026-10-10 12:48:15'),
(3, 'Crisostomo Ibarra', 'ibarra@example.com', '09193456789', '2026-10-10 12:48:15'),
(4, 'Andres Bonifacio', 'andres@example.com', '09204567890', '2026-10-10 12:48:15'),
(5, 'Emilio Aguinaldo', 'emilio@example.com', '09215678901', '2026-10-10 12:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `full_name`, `avatar`, `created_at`) VALUES
(1, 'iseyie', '$2y$10$E2S5XmN9s43KjF8gR2/Nn.8oWwG0vR8fU5W1nL2K3J4I5H6G7F8E9', 'Stacy Buenafe', '1791611156_65ee0037c261ccead88d.jpg', '2026-10-10 12:48:15'),
(2, 'cashier_maria', '$2y$10$E2S5XmN9s43KjF8gR2/Nn.8oWwG0vR8fU5W1nL2K3J4I5H6G7F8E9', 'Maria Clara', NULL, '2026-10-10 12:48:15'),
(3, 'manager_ibarra', '$2y$10$E2S5XmN9s43KjF8gR2/Nn.8oWwG0vR8fU5W1nL2K3J4I5H6G7F8E9', 'Crisostomo Ibarra', NULL, '2026-10-10 12:48:15'),
(4, 'staff_andres', '$2y$10$E2S5XmN9s43KjF8gR2/Nn.8oWwG0vR8fU5W1nL2K3J4I5H6G7F8E9', 'Andres Bonifacio', NULL, '2026-10-10 12:48:15'),
(5, 'supervisor_emilio', '$2y$10$E2S5XmN9s43KjF8gR2/Nn.8oWwG0vR8fU5W1nL2K3J4I5H6G7F8E9', 'Emilio Aguinaldo', NULL, '2026-10-10 12:48:15'),
(6, 'dvy', '$2y$10$nNTPwVnNhRIgRVXTbNmsze0tMGQDIgHigOg4hlQ1Hg.0zV8e9JBlu', 'Davee Kendra Vinoya', '1791612862_bab2a67e957add60ca24.png', '2026-10-10 14:05:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
