-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 03:10 PM
-- Server version: 8.4.0
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `adminname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `mypassword`, `create_at`) VALUES
(1, 'admin', 'admin1@gmail.com', '$2y$10$HYBBfWUqpKkqqSI1i33goO/9NVtLCSIF4oz.dLN/SmNC9lRUwlhyC', '2024-07-20 12:32:40'),
(2, 'admin2', 'admin2@gmail.com', '$2y$10$GEL1sh4Yt0qLOMUGy51viOVBVc6r5qR1WmSqx5UOIoGxCmxMztR4u', '2024-07-20 14:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `pro_id` int NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_image` varchar(200) NOT NULL,
  `pro_price` decimal(17,2) NOT NULL,
  `pro_amount` int NOT NULL,
  `pro_file` varchar(200) NOT NULL,
  `user_id` int NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `image` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `create_at`) VALUES
(1, 'Selangor Red Giants (SRG)', 'SELANGOR RED GIANTS (SRG):\r\n\r\nSekysss — Jungler\r\nInnocent — Gold Lane\r\nYumS — Roamer\r\nGojes — EXP Laner\r\nKRAMM — EXP Laner\r\nStormie — Mid Laner\r\nZakqt — Mid Laner\r\nCoach Arcadia — Ketua Jurulatih\r\nOzoraVeki — Pembantu Jurulatih / Penganalisis\r\nSkydreamer — Penganalisis', 'srg.jpg', '2024-07-20 10:16:50'),
(2, 'HomeBois (HB)', 'HOMEBOIS:\r\n\r\nXORN — Roamer\r\nCHIBI — Jungler\r\nSEPAT — EXP Laner\r\nUDIL — Mid Laner\r\nNETS — Gold Laner\r\nMAL -EXP Laner\r\nPABZ — Ketua Jurulatih\r\nNOBODY — Pembantu Jurulatih\r\nABEY — Penganalisis', 'hb.jpg', '2024-07-20 10:16:50'),
(3, 'Todak (TDK)', 'Todak (TDK):\r\n\r\nZAIMSEMPOI — Midlaner\r\nMomo — EXP lane\r\nGaryy — Jungler\r\nRafflesia — Roamer\r\nshizou — Gold Laner\r\nCiku — Gold Laner\r\nFLYSOLO — Ketua Jurulatih\r\nKuja — Pembantu Jurulatih\r\nAjim — Penganalisis', 'todak.jpg', '2024-07-20 16:37:41'),
(5, 'Resurgence My (RSGMY)', 'Resurgence My (RSGMY):\r\n\r\nIzanami — Mid Lane\r\nLoleal — Gold Lane\r\nRIPPO — Exp Lane\r\nStowm — Roamer\r\nVenogo — Jungler\r\nKaizer — EXP Laner\r\nRAIN — Jurulatih\r\nSora — Penganalisis', 'RSGMY.jpg', '2024-07-20 16:58:13'),
(6, 'King Empire (KGE)', 'King Empire (KGE):\r\n\r\nSaSa — Gold lane\r\nSmooth — EXP Lane\r\nSutsujin — Jungler\r\nViter — Roamer\r\nx WIN — Roamer\r\nDeto — Mid Laner\r\nHide — Mid Laner\r\nRaizan — Jurulatih', 'kge.jpg', '2024-07-20 17:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `price` double(17,2) NOT NULL,
  `user_id` int NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `email`, `username`, `fname`, `lname`, `token`, `pro_name`, `price`, `user_id`, `create_at`) VALUES
(43, 'ciki9904@gmail.com', 'ciki', 'ciki', 'ciki', 'tok_1PfDtmGmDqqbwnlQmXOm4fj8', 'Todak - Home,SRG Selangor Red Giants - Home', 230.00, 3, '2024-07-22 04:31:06'),
(44, 'ciki9904@gmail.com', 'ciki', 'ciki', 'ciki', 'tok_1PfDxhGmDqqbwnlQT34qFkPk', 'Todak - Home,Selangor Red Giants - MSC 2024', 200.00, 3, '2024-07-22 04:35:05'),
(45, 'ciki9904@gmail.com', 'ciki', 'ciki', 'ciki', 'tok_1PfE3hGmDqqbwnlQUPyBA8tD', 'Todak - Home,SRG Selangor Red Giants - Home', 230.00, 3, '2024-07-22 04:41:17'),
(46, 'ciki9904@gmail.com', 'plo', 'plo', 'plo', 'tok_1PfFtnGmDqqbwnlQa827xAoy', 'Selangor Red Giants - MSC 2024,SRG Selangor Red Giants - Home', 330.00, 10, '2024-07-22 06:39:28'),
(47, 'ciki9904@gmail.com', 'plo', 'plo', 'plo', 'tok_1PfFwDGmDqqbwnlQM6LjtWLO', 'Selangor Red Giants - MSC 2024,SRG Selangor Red Giants - Home', 330.00, 10, '2024-07-22 06:41:42'),
(48, 'ciki9904@gmail.com', 'ciki', 'ciki', 'ciki', 'tok_1PfG20GmDqqbwnlQftGVHA1Y', 'Todak - Home,Selangor Red Giants - MSC 2024', 200.00, 3, '2024-07-22 06:47:40'),
(49, 'ciki9904@gmail.com', 'ciki', 'ciki', 'ciki', 'tok_1PfGFmGmDqqbwnlQ4EH9gRwY', 'Todak - Home,Selangor Red Giants - MSC 2024', 300.00, 3, '2024-07-22 07:01:54'),
(50, 'ciki9904@gmail.com', 'ciki', 'ciki', 'ciki', 'tok_1PfGHlGmDqqbwnlQqnzyJyf4', 'Todak - Home,Selangor Red Giants - MSC 2024', 300.00, 3, '2024-07-22 07:03:57'),
(51, 'ciki9904@gmail.com', 'ciki', 'ciki', 'ciki', 'tok_1PfGSMGmDqqbwnlQbKR5sc1n', 'Todak - Home', 100.00, 3, '2024-07-22 07:14:54'),
(52, 'ciki9904@gmail.com', 'ciki', 'ciki', 'ciki', 'tok_1PfGUjGmDqqbwnlQDZB1jhDb', 'Todak - Home', 100.00, 3, '2024-07-22 07:17:21'),
(53, 'ciki9904@gmail.com', 'ciki', 'ciki', 'ciki', 'tok_1PfJfuGmDqqbwnlQvWOBTqLQ', 'Todak - Home', 100.00, 3, '2024-07-22 10:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` decimal(17,2) DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `category_id` int NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `file`, `description`, `status`, `category_id`, `create_at`) VALUES
(1, 'SRG Selangor Red Giants - Home', 'srghome.jpg', 130.00, 'invoice srg home.txt', 'FABRIC : POLY ATHLETIC - SOFT & COOLING FEEL\r\n\r\nLEFT CHEST :EMBROIDERY\r\n\r\nRIGHT CHEST : EMBROIDERY\r\n\r\nBOTTOM : PROTECH & PLAYAZ EMBROIDERY LOGO', 1, 1, '2024-07-19 12:42:15'),
(3, 'Selangor Red Giants - MSC 2024', 'srgmsc.jpg', 100.00, 'invoice srg msc.txt', 'Limited edition Selangor Red Giants Jersey, Mid Season Cup 2024 - Riyadh', 1, 1, '2024-07-19 12:42:15'),
(7, 'Todak - Home', 'todakhome.jpg', 100.00, 'invoice tdk home.txt', 'Todak Home Jersey - MPLMY 13', 1, 3, '2024-07-21 13:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mypassword`, `create_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$HYBBfWUqpKkqqSI1i33goO/9NVtLCSIF4oz.dLN/SmNC9lRUwlhyC', '2024-07-19 12:30:39'),
(3, 'ciki', 'ciki9904@gmail.com', '$2y$10$rq8VLSzwU6Dj6HTSyUFzyuuBIKigmzplUI7FuO.mkCpSTZbEQ2xYe', '2024-07-22 04:28:33'),
(6, 'root', 'root@gmail.com', '$2y$10$3XV6yJ/tx08N.6UtiTIVluSKHlwJDDgqIxHqtPlHxsbI/fbU7F0wy', '2024-07-22 06:18:34'),
(7, 'asdf', 'asdf@gmail.com', '$2y$10$lthm5v9hEje1/6zB3llRmuZBk1oM8aA/0W8RyvzZTwtEp6XLsrUN2', '2024-07-22 06:27:07'),
(8, 'qwert', 'qwert@gmail.com', '$2y$10$4ktzR8ut3wDxBzi3lfifseiBF4UQgT8Dl3.YcP9LKv/SmLv3kSmxG', '2024-07-22 06:29:39'),
(9, 'qaz', 'qaz@gmail.com', '$2y$10$rU54Q0ISl81es1nFehQ33uPVCoj5R.hN1KUe0i8I8vg3EuhGXSdJC', '2024-07-22 06:30:40'),
(10, 'plo', 'plo@gmail.com', '$2y$10$f1ETJo3yEHaIF8lkNBPEHuE2bnJL99NoRXTpKHDIQ/UE9tsETyhLK', '2024-07-22 06:31:24'),
(11, 'ciki', 'ciki9904@gmail.com', '$2y$10$PDUWa/3.DvVA71LseuTbQOQtGGgtW3pBeaiNeeWgV1eiqL/S7sSY2', '2024-07-22 07:10:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
