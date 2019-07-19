-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 11:32 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `med`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `notification` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `notification`) VALUES
(12, 'Alexander', '$2y$10$MUWrQoFYrnd7NUgAIjl1G.rnWfRf39EmrQu4hkkTc9eBQHlqSsIza', '2019-07-18 21:43:54', '0'),
(13, 'Doctor', '$2y$10$b/8L7T2xH5HDlXDJmv9KfeHAUp7.nl4UjLRdIeJ5MNiJRDvs7nfve', '2019-07-18 21:44:31', '0'),
(14, 'Amarius900', '$2y$10$2xeGrGfYw2ngJ2.iw8xbQO51yoOZjkg6koi2t2Apsizr94LJDE7Ry', '2019-07-18 21:49:57', 'Notification'),
(15, 'Amarius1000', '$2y$10$YwkOEklAp.K8NslNCYng5.1Aqu3.PpjBSBlb276T3TAEXQvLHQuYe', '2019-07-18 22:04:46', '0'),
(16, 'Amarius1100', '$2y$10$pyOMgNHHNMjFZ5DuSuazFuONTyN3J9SzFjuiThCpORpsEK.aHabMC', '2019-07-18 22:26:07', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `notification` (`notification`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
