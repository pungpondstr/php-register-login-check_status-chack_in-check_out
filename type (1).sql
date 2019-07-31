-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2019 at 07:37 AM
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
-- Database: `type`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(10) UNSIGNED NOT NULL,
  `Email` varchar(255) NOT NULL,
  `sum` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `Email`, `sum`) VALUES
(3, 'pungpondstr@gmail.com', 1),
(4, 'pungpondstr@gmail.com', 1),
(5, 'pungpondstr@gmail.com', 1),
(6, 'pungpondstr@gmail.com', 1),
(7, 'pungpondstr@gmail.com', 1),
(8, 'pungpondstr@gmail.com', 1),
(9, 'pondprobot2@gmail.com', 1),
(10, 'Thanetkt@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(10) UNSIGNED NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `Status` varchar(255) DEFAULT 'Member',
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `location` varchar(255) NOT NULL,
  `btn_check_in` varchar(255) NOT NULL,
  `btn_check_out` varchar(255) NOT NULL,
  `btn_check_view` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `date1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `Email`, `Password`, `first_name`, `last_name`, `Status`, `check_in`, `check_out`, `tel`, `location`, `btn_check_in`, `btn_check_out`, `btn_check_view`, `date`, `date1`) VALUES
(1, 'pungpondstr@gmail.com', '123456', 'Songpol', 'Takha', 'Staff', '2019-29-07-11:27:26', '2019-28-07-01:19:07', '0960602803', '<script>document.write(\'<p id = \'demo\'></p>\');</script>', '', '', '', '29', ''),
(25, 'pondprobot2@gmail.com', '123456', 'zdsdfasdf', 'sadfasdf', 'Staff', '2019-28-07-02:05:26', '2019-28-07-02:05:28', '12312313', '<script>getLocation();</script>', '7098c1da422b8d6a97727dbae8a27c8a', 'f263dac62cbe245000ed6beefbbca53a', '1e63bc6ca5fb4718752d7dcf4ad9e65f', '28', '28'),
(26, 'Thanetkt@gmail.com', '0979355927', 'Thanet', 'Kaulsupannarar', 'Admin', '2019-28-07-02:45:16', '2019-28-07-02:45:24', '0979355927', '<script>getLocation();</script>', '3a22cc3b534194723b56f471b54c1dc3', '56912091c485718bf6a82b7d430332a3', '304e9cbc8281fb21f229c2e12143ad5d', '29', '29'),
(27, 'tamza1094@hotmail.com', '123456789', 'katha', 'tam', 'Staff', '', '', '0863496029', '', 'de1d11ee68ccb0037d81e8f679c1fbf2', '1764cb0cfd9226b9ad88e42370f7b3aa', '3311e2ff98c7f4e8ef4e405b8176dade', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
