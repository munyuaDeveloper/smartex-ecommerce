-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2019 at 02:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(2) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `name`, `phone`, `designation`, `date`) VALUES
(5, 'kakaielvis@gmail.com', 'Askadmin', 'Elvis Kakai', '0711521811', 'normal admin', '2018-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(13, 'Clothes', 'IMG-20181115-WA0039.jpg'),
(14, 'Electronics', 'IMG-20181115-WA0019.jpg'),
(15, 'Fruits and vegetables', 'IMG-20181110-WA0016.jpg'),
(16, 'Furniture', 'images_003.jpg'),
(17, 'utensils', 'images_078.jpg'),
(18, 'Houses', 'images_254.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(100) NOT NULL,
  `names` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `names`, `phone`, `email`, `password`, `date`) VALUES
(1, 'kakai elvis', '23456789', 'kakaielvis@gmail.com', '123456', '2018-12-05 12:54:40'),
(2, 'peter', '1234', 'munyuapeter06@gmail.com', '1234', '2019-01-07 11:36:25'),
(4, 'john', '075555555', 'john@gmail.com', '1234', '2019-01-09 10:45:22'),
(5, 'jane', '123456', 'jane@gmail.com', '1234', '2019-01-09 18:07:51'),
(6, 'naom', '1234', 'naom@gmail.com', '1234', '2019-01-09 19:04:32'),
(7, 'Ali', '1234', 'ali@gmail.com', '1234', '2019-01-09 19:17:58'),
(8, 'Jossey', '1234', 'jossey@gmail.com', '1234', '2019-01-09 19:34:00'),
(9, 'joy', '1234', 'joy@gmail.com', '1234', '2019-01-09 19:36:01'),
(10, 'Khan', '12345', 'khan@gmail.com', '1234', '2019-01-09 19:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `designer`
--

CREATE TABLE `designer` (
  `id` int(2) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designer`
--

INSERT INTO `designer` (`id`, `email`, `password`, `name`, `phone`, `designation`, `date`) VALUES
(1, 'kakaielvis@gmail.com', 'Askdesigner', 'Elvis Kakai', '0711521811', 'super designer', '2018-12-05'),
(2, 'designer@gmail.com', 'designer_1234', 'Peter', '07869452663', 'designer', '2019-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `category` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `image`, `price`, `category`) VALUES
(9, 'Camera', 'camera.jpg', 4000, 14),
(10, 'Iron Box', 'iron.JPG', 250, 14),
(11, 'Hp Laptop', 'HP laptop.jpg', 35999, 14),
(12, 'Bed', 'amer-furniture.jpg', 4000, 16),
(13, 'Apartment', 'h3.jpg', 4000000, 18),
(14, 'Bungalow', 'h1.jpg', 150000, 18),
(15, 'cool Apartment', 'insititution.jpg', 200000, 18),
(16, 'Apples', 'images-3.jpg', 30, 15),
(17, 'Strawberries', 'images-2.jpg', 45, 15),
(18, 'Serving Spoons', 'images.jpg', 120, 17),
(19, 'Salad Spoons', 'images-1.jpg', 199, 17),
(20, 'Salad Spoons', 'images-1.jpg', 199, 17),
(21, 'shirt', 'gents-formal-250x250.jpg', 4000, 13),
(22, 'men shirt', 'images_126.jpg', 300, 13),
(23, 'Sweater', '2012-Winter-Sweater-for-Men-for-better-outlook.jpg', 2500, 13),
(24, 'phone', 'sony mobile.jpg', 2000, 14),
(25, 'Tablet', 'ipad 2.jpg', 2000, 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `item` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer` int(100) NOT NULL,
  `cart` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `quantity`, `item`, `date`, `customer`, `cart`) VALUES
(3, 2, 4, '2018-12-05 12:54:40', 1, '24697962'),
(4, 0, 10, '2018-12-05 14:11:17', 0, '123'),
(5, 4, 8, '2018-12-09 18:55:59', 0, '35142068'),
(6, 4, 1, '2018-12-15 10:24:20', 1, '87910017'),
(7, 0, 3, '2018-12-15 09:59:26', 0, '123'),
(8, 1, 3, '2018-12-15 10:24:20', 1, '87910017'),
(9, 3, 3, '2018-12-15 10:24:20', 1, '87910017'),
(11, 1, 4, '2019-01-07 11:32:16', 1, '48111454'),
(12, 1, 2, '2019-01-07 11:36:25', 2, '89694304'),
(13, 1, 1, '2019-01-07 13:55:56', 2, '00043867'),
(14, 1, 3, '2019-01-07 13:55:56', 2, '00043867'),
(15, 1, 1, '2019-01-07 14:04:29', 2, '17147195'),
(16, 1, 3, '2019-01-07 15:37:14', 0, '51991516'),
(17, 1, 4, '2019-01-07 15:47:27', 0, '51991516'),
(21, 1, 4, '2019-01-09 10:38:15', 2, '74197663'),
(22, 1, 5, '2019-01-09 10:40:38', 3, '79991422'),
(23, 1, 7, '2019-01-09 10:45:22', 4, '08210213'),
(24, 3, 3, '2019-01-09 10:50:27', 0, '58366980'),
(25, 1, 3, '2019-01-09 11:16:07', 0, '94131486'),
(26, 1, 3, '2019-01-09 11:16:40', 0, '94131486'),
(27, 1, 4, '2019-01-09 11:17:00', 0, '94131486'),
(28, 1, 4, '2019-01-09 11:17:29', 0, '94131486'),
(29, 1, 4, '2019-01-09 11:22:04', 0, '02595041'),
(30, 1, 3, '2019-01-09 11:23:42', 0, '02595041'),
(31, 1, 3, '2019-01-09 11:30:16', 0, '02595041'),
(32, 1, 7, '2019-01-09 11:31:44', 0, '02595041'),
(33, 1, 4, '2019-01-09 15:37:59', 2, '03022908'),
(34, 1, 10, '2019-01-09 17:25:03', 0, '34625553'),
(35, 1, 19, '2019-01-09 18:07:51', 5, '30869107'),
(36, 1, 2, '2019-01-09 18:17:40', 0, '61115844'),
(37, 1, 17, '2019-01-09 19:46:00', 0, '65723286'),
(38, 1, 11, '2019-01-09 20:31:08', 2, '37177955'),
(39, 1, 11, '2019-01-09 20:50:53', 2, '69466461'),
(40, 1, 19, '2019-01-09 21:47:02', 0, '00844675'),
(41, 1, 17, '2019-01-09 21:48:50', 0, '00844675'),
(42, 1, 2, '2019-01-09 21:52:19', 5, '92001279');

-- --------------------------------------------------------

--
-- Table structure for table `page_visits`
--

CREATE TABLE `page_visits` (
  `id` int(100) NOT NULL,
  `homepage` int(100) NOT NULL DEFAULT '1',
  `product` int(100) NOT NULL,
  `cart` int(100) NOT NULL,
  `payment` int(100) NOT NULL,
  `completed` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_visits`
--

INSERT INTO `page_visits` (`id`, `homepage`, `product`, `cart`, `payment`, `completed`) VALUES
(1, 157, 127, 126, 17, 33);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designer`
--
ALTER TABLE `designer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_visits`
--
ALTER TABLE `page_visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `designer`
--
ALTER TABLE `designer`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `page_visits`
--
ALTER TABLE `page_visits`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
