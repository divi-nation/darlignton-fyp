-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2024 at 01:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swiftpay`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `quantity` varchar(225) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `buyer_id`, `product_id`, `quantity`, `price`, `total_price`, `created_at`) VALUES
(15, 30643, '1,12,2,3,8,7', '1,1,1,1,1,1', 30.00, 30.00, '2024-04-23 20:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `vendor_id`, `product_name`, `product_price`, `product_description`, `category`, `image1`, `image2`, `image3`, `image4`, `created_at`) VALUES
(1, 15, 'dsfad', 10.00, 'sdfa', '', '../products/product_66249978759b6', '../products/product_66249978759bc', '../products/product_66249978759bd', '../products/product_66249978759be', '2024-04-21 04:43:36'),
(2, 15, 'Macbook', 20.00, '44', '', '../products/product_662499cd74881', '../products/product_662499cd748af', '../products/product_662499cd748b0', '../products/product_662499cd748b1', '2024-04-21 04:45:01'),
(3, 15, 'test', 30.00, 'sdsd', '', '../products/product_662499eae3e25', '../products/product_662499eae3e28', '../products/product_662499eae3e29', '../products/product_662499eae3e2a', '2024-04-21 04:45:30'),
(4, 15, 'sdf', 100.00, 'sdf', '', '../products/product_66249a14a6b8a', '../products/product_66249a14a6b90', '../products/product_66249a14a6b91', '../products/product_66249a14a6b92', '2024-04-21 04:46:12'),
(5, 15, 'ww', 200.00, 'ww', '', '../products/product_66249a948a3e3Screenshot 2024-04-15 at 6.44.51 PM.png', '../products/product_66249a948a3ea', '../products/product_66249a948a3eb', '../products/product_66249a948a3ec', '2024-04-21 04:48:20'),
(6, 15, '44', 500.00, '44', '', '../products/product_66249aec609feScreenshot 2024-04-15 at 6.45.27 PM.png', '../products/product_66249aec60a0a', '../products/product_66249aec60a0c', '../products/product_66249aec60a0e', '2024-04-21 04:49:48'),
(7, 15, 'sd', 300.00, 'sdf', '', '../products/product_6625260e58727name-full-hearts-decorative-lettering-260nw-363519905.webp', '../products/product_6625260e5872e', '../products/product_6625260e5872f', '../products/product_6625260e58730', '2024-04-21 14:43:26'),
(8, 15, 'iphone 7 plus', 1000.00, 'The iPhone 7 Plus is a powerful and stylish smartphone that boasts a stunning 5.5-inch Retina HD display, delivering crisp visuals and vibrant colors. .', '', '../products/product_66252647d28dc7 plus.jpg', '../products/product_66252647d28e27 pluss.jpg', '../products/product_66252647d28e37-Plus-8.png', '../products/product_66252647d28e4', '2024-04-21 14:44:23'),
(9, 15, 'test', 800.00, 'sdfsf', '', '../../products/product_662526fead501anne-name-pink-heart-sticker.jpg', '../../products/product_662526fead508', '../../products/product_662526fead509', '../../products/product_662526fead50a', '2024-04-21 14:47:26'),
(10, 15, 'testttt', 60.00, 'sdfsd', '', '../../products/product_66252739371091T_Blog_1.jpg', '../../products/product_662527393710f', '../../products/product_6625273937110', '../../products/product_6625273937111', '2024-04-21 14:48:25'),
(11, 15, 'aasdfasdfas', 50.00, 'dsfasdf', '', '../../products/product_662527ed2a2d4stock-vector-love-logo-with-letter-m-logo-template-love-red-logo-1892559739.jpg', '../../products/product_662527ed2a2dc', '../../products/product_662527ed2a2dd', '../../products/product_662527ed2a2de', '2024-04-21 14:51:26'),
(12, 15, 'product 22', 30.00, 'sdfasdfasd', '', '../../products/product_6625296dcc157ddr4 8gb.png', '../../products/product_6625296dcc165ddr4 8gb 2.png', '../../products/product_6625296dcc166', '../../products/product_6625296dcc167', '2024-04-21 14:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_category` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `business_phone` varchar(20) NOT NULL,
  `business_email` varchar(255) NOT NULL,
  `personal_name` varchar(255) NOT NULL,
  `personal_address` varchar(255) NOT NULL,
  `personal_phone` varchar(20) NOT NULL,
  `mobile_money` varchar(20) NOT NULL,
  `signup_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `acc_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `business_name`, `business_category`, `business_address`, `business_phone`, `business_email`, `personal_name`, `personal_address`, `personal_phone`, `mobile_money`, `signup_date`, `acc_password`) VALUES
(1, 'xef', 'Food & clothing', 'ss', '33', 'dsd@gmail.com', 'divne', 'ee', '44', '444', '2024-04-21 03:54:10', ''),
(2, 'xef', 'Food & clothing', 'ss', '33', 'dsd@gmail.com', 'divne', 'ee', '44', '444', '2024-04-21 03:56:18', ''),
(3, 'xef', 'Food & clothing', 'ss', '33', 'dsd@gmail.com', 'divne', 'ee', '44', '444', '2024-04-21 03:56:27', ''),
(4, 'xef', 'Food & clothing', 'ss', '33', 'dsd@gmail.com', 'divne', 'ee', '44', '444', '2024-04-21 03:57:23', ''),
(5, 'xef', 'Food & clothing', 'ss', '33', 'dsd@gmail.com', 'uy', 'hhh', '66', '777', '2024-04-21 04:08:24', '1111'),
(6, 'xef', 'Food & clothing', 'ss', '33', 'dsd@gmail.com', 'uy', 'hhh', '66', '777', '2024-04-21 04:11:44', '1111'),
(7, 'xef', 'Food & clothing', 'ss', '33', 'dsd@gmail.com', 'uy', 'hhh', '66', '777', '2024-04-21 04:11:54', '1111'),
(8, 'xef', 'Food & clothing', 'ss', '33', 'dsd@gmail.com', 'uy', 'hhh', '66', '55', '2024-04-21 04:13:15', '1111'),
(9, 'xef', 'Food & clothing', 'ss', '33', 'a@gmail.com', 'uy', 'hhh', '66', '55', '2024-04-21 04:13:43', '1111'),
(10, 'xef', 'Food & clothing', 'ss', '33', 'dsd@gmail.com', 'uy', 'hhh', '66', '55', '2024-04-21 04:13:58', '1111'),
(11, 'Divination', 'Food & clothing', 'ss', '33', 'sd@gmail.com', 'sdfsd', 'sdfs', '3333', '3333', '2024-04-21 04:33:50', '1111'),
(12, 'Divination', 'Food & clothing', 'ss', '33', 'sd@gmail.com', 'sdfsd', 'sdfs', '3333', '3333', '2024-04-21 04:34:45', '1111'),
(13, 'Divination', 'Food & clothing', 'ss', '33', 'sd@gmail.com', 'sdfsd', 'sdfs', '3333', '3333', '2024-04-21 04:35:36', '1111'),
(14, 'Divination', 'Food & clothing', 'ss', '33', 'kk@gmail.com', 'sdfsd', 'sdfs', '3333', '3333', '2024-04-21 04:38:22', '1111'),
(15, 'Divination', 'Food & clothing', 'ss', '33', 'divine@gmail.com', 'sdfsd', 'sdfs', '3333', '3333', '2024-04-21 04:38:38', '1111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
