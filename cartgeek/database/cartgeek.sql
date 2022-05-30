-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 02:11 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartgeek`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` text COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8_unicode_ci NOT NULL,
  `created_on` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_on` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image`, `created_on`, `updated_on`) VALUES
(1, 'Apple.', 120, 'Apple.', '280295672_1144807412984850_1189665258535936782_n.jpg', '30-05-22 17:34:00', '30-05-22 17:34:13'),
(2, 'Watermelon', 145, 'Watermelon', '70955945_2723295921015258_8416714008286986240_n.png', '30-05-22 17:34:40', ''),
(3, 'Strawberry', 20, 'Strawberry', '280295672_1144807412984850_1189665258535936782_n.jpg', '30-05-22 17:35:07', ''),
(4, 'Orange.', 44, 'Orange.', '280926681_559453365593798_6892730254783461911_n.jpg', '30-05-22 17:35:34', ''),
(5, 'Pear.', 19, 'Pear.', '20800302_1651241421554052_3496530301927849668_n.jpg', '30-05-22 17:36:17', ''),
(6, 'Pear.', 24, 'Pear.', '280295672_1144807412984850_1189665258535936782_n.jpg', '30-05-22 17:36:40', ''),
(7, 'Strawberry.', 32, 'Strawberry.', '281289683_5192303347527594_4102776304750668967_n.jpg', '30-05-22 17:37:13', ''),
(8, 'Blackberries', 17, 'Blackberries', '20800302_1651241421554052_3496530301927849668_n.jpg', '30-05-22 17:38:10', ''),
(9, 'Avocado', 20, 'Avocado', '280295672_1144807412984850_1189665258535936782_n.jpg', '30-05-22 17:38:38', ''),
(10, 'Breadfruit', 23, 'Breadfruit', '70955945_2723295921015258_8416714008286986240_n.png', '30-05-22 17:39:09', ''),
(11, 'Blueberries', 17, 'Blueberries', '280295672_1144807412984850_1189665258535936782_n.jpg', '30-05-22 17:39:39', ''),
(12, 'Sugar-Apple', 15, 'Sugar-Apple', '280295672_1144807412984850_1189665258535936782_n.jpg', '30-05-22 17:40:21', ''),
(13, 'Tamarind', 20, 'Tamarind', '280295672_1144807412984850_1189665258535936782_n.jpg', '30-05-22 17:40:52', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
