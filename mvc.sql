-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 30, 2024 at 06:38 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `this_users`
--

CREATE TABLE `this_users` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `this_users`
--

INSERT INTO `this_users` (`id`, `name`, `email`, `password`) VALUES
(16, 'mohammed', 'mohammed@gmail.com', '123456\r\n'),
(17, 'nasma', 'nasma@gmail.com', 'nasma759548A'),
(18, 'ahmed', 'ahmed@gmail.com', 'ammar759548A'),
(19, 'ammar', 'ammar@gmail.com', 'ammar759548A'),
(21, 'nasmaA', 'nasma@gmail.com', 'ammar759548A'),
(22, 'momo', 'nasma@gmail.com', 'ammar759548A'),
(25, 'ammar', 'ammar@saif.com', 'ammar759548A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `this_users`
--
ALTER TABLE `this_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `this_users`
--
ALTER TABLE `this_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
