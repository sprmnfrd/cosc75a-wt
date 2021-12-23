-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2021 at 03:42 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `walangtatak`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_code` varchar(10) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_type` int(11) NOT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_start_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_end_timestamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_type`, `product_description`, `product_image`, `product_start_timestamp`, `product_end_timestamp`) VALUES
(1, 'NYCB', 'New York Style Cheesecake - Blueberry', 2, 'Size:10 x 3\" Round\r\nShelf life: 1 week (Refrigerated)', '20211222174756_61c2f44c78385.jpeg', '2021-12-22 09:47:56', NULL),
(2, 'NYCS', 'New York Style Cheesecake - Strawberry', 2, 'Size:10 x 3\" Round\nShelf life: 1 week (Refrigerated)', '20211222175024_61c2f4e0bef54.jpeg', '2021-12-23 02:20:32', NULL),
(3, 'NYCM', 'New York Style Cheesecake - Mango', 2, 'Size:10 x 3\" Round\r\nShelf life: 1 week (Refrigerated)', '20211223102056_61c3dd08aec81.jpg', '2021-12-23 02:20:56', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_type` (`product_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_type` FOREIGN KEY (`product_type`) REFERENCES `types` (`type_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
