-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 05:27 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--
CREATE DATABASE IF NOT EXISTS `sales` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sales`;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `type` enum('foods','drinks','snacks') NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `type`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Nasi Ayam Geprek', 'foods', 15000, 'makanan1.jpg', '2021-12-18', '2021-12-18'),
(2, 'Nasi Goreng', 'foods', 12000, 'makanan2.jpg', '2021-12-18', '2021-12-18'),
(3, 'Nasi Kuning', 'foods', 15000, 'makanan3.jpg', '2021-12-18', '2021-12-18'),
(4, 'Nasi Campur', 'foods', 15000, 'makanan4.jpg', '2021-12-18', '2021-12-18'),
(5, 'Ayam Bakar', 'foods', 20000, 'makanan5.jpg', '2021-12-18', '2021-12-18'),
(6, 'Ikan Bakar', 'foods', 20000, 'makanan6.jpg', '2021-12-18', '2021-12-18'),
(7, 'Es Teh', 'drinks', 6000, 'minuman1.jpg', '2021-12-18', '2021-12-18'),
(8, 'Air Mineral', 'drinks', 3000, 'minuman2.jpg', '2021-12-18', '2021-12-18'),
(9, 'Es Jeruk', 'drinks', 12000, 'minuman3.jpg', '2021-12-18', '2021-12-18'),
(10, 'Es Kopi', 'drinks', 15000, 'minuman4.jpg', '2021-12-18', '2021-12-18'),
(11, 'Jus Alpukat', 'drinks', 15000, 'minuman5.jpg', '2021-12-18', '2021-12-18'),
(12, 'Es Cokelat', 'drinks', 18000, 'minuman6.jpg', '2021-12-18', '2021-12-18'),
(13, 'Jus Strawberry', 'drinks', 15000, 'minuman7.jpg', '2021-12-18', '2021-12-18'),
(14, 'Es Kelapa Jeruk', 'drinks', 18000, 'minuman8.jpg', '2021-12-18', '2021-12-18'),
(23, 'Kentang Goreng', 'snacks', 8000, 'camilan1.jpg', '2021-12-18', '2021-12-18'),
(24, 'Salad Buah', 'snacks', 11000, 'camilan2.jpg', '2021-12-18', '2021-12-18'),
(25, 'Roti Maryam', 'snacks', 8000, 'camilan3.jpg', '2021-12-18', '2021-12-18'),
(26, 'Dimsum', 'snacks', 10000, 'camilan4.jpg', '2021-12-18', '2021-12-18'),
(27, 'Udang Rambutan', 'snacks', 10000, 'camilan5.jpg', '2021-12-18', '2021-12-18'),
(28, 'Lumpia Ayam', 'snacks', 10000, 'camilan6.jpg', '2021-12-18', '2021-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `status` enum('unpaid','paid','canceled','sent') NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `sub_total`, `status`, `created_at`, `updated_at`) VALUES
(8, 1, 66000, 'unpaid', '2021-12-20', '2021-12-20'),
(9, 2, 78000, 'unpaid', '2021-12-20', '2021-12-24'),
(10, 5, 30000, 'sent', '2021-12-27', '2021-12-27'),
(11, 5, 45000, 'sent', '2021-12-27', '2021-12-27'),
(12, 5, 36000, 'sent', '2021-12-27', '2021-12-27'),
(13, 5, 50000, 'paid', '2021-12-27', '2021-12-27'),
(14, 5, 30000, 'paid', '2021-12-27', '2021-12-27'),
(15, 5, 32000, 'paid', '2021-12-27', '2021-12-27'),
(16, 5, 30000, 'paid', '2021-12-27', '2021-12-27'),
(17, 6, 42000, 'paid', '2021-12-27', '2021-12-27'),
(18, 6, 15000, 'paid', '2021-12-27', '2021-12-27'),
(19, 6, 15000, 'paid', '2021-12-29', '2021-12-29'),
(20, 6, 24000, 'canceled', '2021-12-29', '2021-12-29'),
(21, 6, 75000, 'paid', '2021-12-29', '2021-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `menu_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(5, 8, 1, 2, 30000, '2021-12-20', '2021-12-20'),
(6, 8, 9, 3, 36000, '2021-12-20', '2021-12-20'),
(7, 9, 2, 2, 24000, '2021-12-20', '2021-12-20'),
(8, 9, 9, 2, 24000, '2021-12-22', '2021-12-22'),
(9, 9, 1, 2, 30000, '2021-12-24', '2021-12-24'),
(10, 10, 1, 2, 30000, '2021-12-27', '2021-12-27'),
(11, 11, 1, 3, 45000, '2021-12-27', '2021-12-27'),
(12, 12, 2, 3, 36000, '2021-12-27', '2021-12-27'),
(14, 13, 3, 2, 30000, '2021-12-27', '2021-12-27'),
(15, 13, 5, 1, 20000, '2021-12-27', '2021-12-27'),
(16, 14, 1, 2, 30000, '2021-12-27', '2021-12-27'),
(17, 15, 27, 2, 20000, '2021-12-27', '2021-12-27'),
(18, 15, 7, 2, 12000, '2021-12-27', '2021-12-27'),
(19, 16, 4, 2, 30000, '2021-12-27', '2021-12-27'),
(20, 17, 1, 2, 30000, '2021-12-27', '2021-12-27'),
(21, 17, 7, 2, 12000, '2021-12-27', '2021-12-27'),
(22, 18, 1, 1, 15000, '2021-12-27', '2021-12-27'),
(23, 19, 1, 1, 15000, '2021-12-29', '2021-12-29'),
(24, 20, 2, 2, 24000, '2021-12-29', '2021-12-29'),
(25, 21, 4, 2, 30000, '2021-12-29', '2021-12-29'),
(26, 21, 3, 3, 45000, '2021-12-29', '2021-12-29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `namadepan` varchar(255) NOT NULL,
  `namabelakang` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nohp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(2) NOT NULL,
  `created_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `namadepan`, `namabelakang`, `email`, `image`, `password`, `nohp`, `alamat`, `role_id`, `is_active`, `created_at`) VALUES
(5, 'Surya Rosauli', 'Pasaribu', 'rosauli.pasaribu15@gmail.com', 'nats.jpg', '$2y$10$XnxhOlRxQbQZkoVHOvy4xuwgO8Bv5DZbrMNk4ROD46eQwqVXFz4Qe', '081232906143', 'Jl. Taman Indah no 13, Surabaya', 2, 1, '00:00:00'),
(6, 'Firmansyahhh', 'Firdaus', 'fafirmansyah20@gmail.com', 'default.jpg', '$2y$10$XQO/LvhZ/vX12C9eaPxNoOcCzjV8.iNRYzrJuDsEr3D872fAHTwzK', '087826298833', 'Dont Have Anyyy', 1, 1, '00:00:00'),
(9, 'admin', 'admin', 'admin@admin.com', 'default.jpg', '$2y$10$SP/dIBPQ0vZYGpz.o9V7GOZZn87fM9R5cCJ2uj5SujOjC13zfSYhS', '081396039012', 'Sidoarjo', 3, 1, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
