-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2018 at 07:37 PM
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
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` varchar(12) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` text,
  `item_condition` varchar(30) NOT NULL,
  `file_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siteproducts`
--

INSERT INTO `siteproducts` (`item_id`, `owner_id`, `name`, `price`, `size`, `status`, `description`, `item_condition`, `file_path`) VALUES
(1, 2, 'Aria Tshirt', '3.99', 'Small', 'available', 'So I went to the Ariana Grande concert last month and I got this awesome t-shirt. It was one of the only ones left so I brought it. When I got home and tried it on, it was too small. Other than trying it on, its completely new.', 'Slightly Worn', 'images/ArianaGrandeShirt.jpg'),
(2, 2, 'Trav Tshirt', '23.99', 'L', 'available', 'Love me some Travie. I picked this up at a concert in Houston, TX.', 'New', 'images/travis-scott-jacket.jpg'),
(3, 3, 'Xo shirt', '0.50', 'X-Large', 'Available', 'The Weeknd was so amazing live, I ended up buying 2 shirts. I don\'t really need the second one lol.', 'Mint Condition', 'images/XO-Weeknd-TSHIRT.jpg');

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
(0, 'Guest', 'Test', 'guest@guest.com', 'Guest', '1234 Guest Ln', 'GA', 'Guestwood', '12345', '$2y$10$V23zhJsu.khQj2MPYW2UGeFK42Qa9Ktdebc/0ehYq0ZWi9ZvirdNa'),
(2, 'Bob', 'T', 'a', 'Bob', '1', 'va', 'd', '3', 's'),
(3, 'Meg', 'T', 'a', 'Meg', '1', 'va', 'd', '3', 's'),
(4, 'Kim', 'f', 'f', 'Kim', 'f', 'v', 's', 'd', 'a'),
(5, 'Cam', 'f', 'f', 'Cam', 'f', 'v', 's', 'd', 'a'),
(6, 'For', 'Adssd', 'kw36@gmail.com', 'qwer', '12345 Money Ln ', 'GA', 'Cash', '12345', '$2y$10$BUXtZaDqePhQpZKhwECfyOOcjWumbrQ.xmDZmRG1QQHWCTNX2JXXW'),
(7, 'wert', 'wert', 'wert@qwr.com', 'wert', '1234 qwer ln', 'IL', 'qwer', '12345', '$2y$10$6Sd2aZb32pmFesf.X6MRkeUZzX4SmbS/iJ31YSy2eG6SekbjDSFWK'),
(8, 'Rush', 'Setty', 'rs5yb@virginia.edu', 'Icy', '1485 Drumheller Drive', 'VA', 'Virginia Beach', '23555', '$2y$10$apoA9G/WZdLqC9qSRb7sPenWTJx6/.6dpNUFKhfCvG7gErqLEArNO'),
(9, 'Rush', 'Setty', 'rs5yb@virginia.edu', 'fes', '1485 Drumheller Drive', 'HI', 'Virginia Beach', '23555', '$2y$10$aS1qiynrMlw74wGRb1mkQu3Bo5couJlao/EbZHs16zk6OI6tjfVxa'),
(10, 'Rush', 'Setty', 'rs5yb@virginia.edu', 'fe', '1485 Drumheller Drive', 'VA', 'Virginia Beach', '23555', '$2y$10$/BFNXS/FRVKuKe0lTTGET.Gs/VUwa2N3xPkm3tQDuR1KeGy7dB7va'),
(11, 'Test', 'Buyer', 'testbuyer@mail.com', 'testbuyer', '234 asdf  ln', 'FL', 'sdaf', '12345', '$2y$10$tFxvTuta7iRK8OQL0cjca.koaWfN5usySCwPqmFv/k0Q6.fi2ry3O');

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
  `quantity` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercarts`
--

INSERT INTO `usercarts` (`user_id`, `item_id`, `quantity`) VALUES
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(5, 2, 1),
(5, 1, 1),
(3, 2, 1),
(6, 2, 2),
(6, 1, 1),
(6, 3, 1),
(7, 1, 3),
(7, 3, 1),
(11, 2, 1),
(0, 2, 3),
(0, 1, 2);

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
  ADD KEY `item_id` (`item_id`) USING BTREE,
  ADD KEY `quantity` (`quantity`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
