-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2018 at 01:18 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `siteproducts`
--

CREATE TABLE `siteproducts` (
  `item_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `description` text,
  `status` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `file_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteproducts`
--

INSERT INTO `siteproducts` (`item_id`, `owner_id`, `description`, `status`, `price`, `name`, `file_path`) VALUES
(1, 2, 'Arai', 'Available', '3.99', 'Aria Tshirt', 'images/ArianaGrandeShirt.jpg'),
(2, 2, 'trav', 'Available', '23.99', 'Trav Tshirt', 'images/travis-scott-jacket.jpg'),
(3, 3, 'Xo', 'Available', '0.50', 'Xo shirt', 'images/XO-Weeknd-TSHIRT.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siteusers`
--

CREATE TABLE `siteusers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `address` varchar(55) NOT NULL,
  `state` char(2) NOT NULL,
  `city` varchar(35) NOT NULL,
  `zipcode` char(5) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siteusers`
--

INSERT INTO `siteusers` (`id`, `first_name`, `last_name`, `email`, `username`, `address`, `state`, `city`, `zipcode`, `password`) VALUES
(2, 'Bob', 'T', 'a', 'Bob', '1', 'va', 'd', '3', 's'),
(3, 'Meg', 'T', 'a', 'Meg', '1', 'va', 'd', '3', 's'),
(4, 'Kim', 'f', 'f', 'Kim', 'f', 'v', 's', 'd', 'a'),
(5, 'Cam', 'f', 'f', 'Cam', 'f', 'v', 's', 'd', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(32) NOT NULL,
  `state_abbr` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `state_abbr`) VALUES
(1, 'Alabama', 'AL'),
(2, 'Alaska', 'AK'),
(3, 'Arizona', 'AZ'),
(4, 'Arkansas', 'AR'),
(5, 'California', 'CA'),
(6, 'Colorado', 'CO'),
(7, 'Connecticut', 'CT'),
(8, 'Delaware', 'DE'),
(9, 'District of Columbia', 'DC'),
(10, 'Florida', 'FL'),
(11, 'Georgia', 'GA'),
(12, 'Hawaii', 'HI'),
(13, 'Idaho', 'ID'),
(14, 'Illinois', 'IL'),
(15, 'Indiana', 'IN'),
(16, 'Iowa', 'IA'),
(17, 'Kansas', 'KS'),
(18, 'Kentucky', 'KY'),
(19, 'Louisiana', 'LA'),
(20, 'Maine', 'ME'),
(21, 'Maryland', 'MD'),
(22, 'Massachusetts', 'MA'),
(23, 'Michigan', 'MI'),
(24, 'Minnesota', 'MN'),
(25, 'Mississippi', 'MS'),
(26, 'Missouri', 'MO'),
(27, 'Montana', 'MT'),
(28, 'Nebraska', 'NE'),
(29, 'Nevada', 'NV'),
(30, 'New Hampshire', 'NH'),
(31, 'New Jersey', 'NJ'),
(32, 'New Mexico', 'NM'),
(33, 'New York', 'NY'),
(34, 'North Carolina', 'NC'),
(35, 'North Dakota', 'ND'),
(36, 'Ohio', 'OH'),
(37, 'Oklahoma', 'OK'),
(38, 'Oregon', 'OR'),
(39, 'Pennsylvania', 'PA'),
(40, 'Rhode Island', 'RI'),
(41, 'South Carolina', 'SC'),
(42, 'South Dakota', 'SD'),
(43, 'Tennessee', 'TN'),
(44, 'Texas', 'TX'),
(45, 'Utah', 'UT'),
(46, 'Vermont', 'VT'),
(47, 'Virginia', 'VA'),
(48, 'Washington', 'WA'),
(49, 'West Virginia', 'WV'),
(50, 'Wisconsin', 'WI'),
(51, 'Wyoming', 'WY');

-- --------------------------------------------------------

--
-- Table structure for table `usercarts`
--

CREATE TABLE `usercarts` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercarts`
--

INSERT INTO `usercarts` (`user_id`, `item_id`, `quantity`) VALUES
(2, 1, 0),
(2, 2, 0),
(2, 3, 0),
(5, 2, 0),
(5, 1, 0),
(3, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siteproducts`
--
ALTER TABLE `siteproducts`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `file_path` (`file_path`),
  ADD KEY `item_id` (`item_id`) USING BTREE,
  ADD KEY `owner_id` (`owner_id`) USING BTREE;

--
-- Indexes for table `siteusers`
--
ALTER TABLE `siteusers`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `usercarts`
--
ALTER TABLE `usercarts`
  ADD KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `item_id` (`item_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siteproducts`
--
ALTER TABLE `siteproducts`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siteusers`
--
ALTER TABLE `siteusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siteproducts`
--
ALTER TABLE `siteproducts`
  ADD CONSTRAINT `siteproducts_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `siteusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usercarts`
--
ALTER TABLE `usercarts`
  ADD CONSTRAINT `usercarts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `siteusers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usercarts_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `siteproducts` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
