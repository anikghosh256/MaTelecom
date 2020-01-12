-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2019 at 07:23 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ma_telecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_t`
--

CREATE TABLE `admin_t` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `adminImg` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `senderMail` varchar(250) NOT NULL,
  `senderName` varchar(250) NOT NULL,
  `senderMsg` text NOT NULL,
  `msgOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `senderMail`, `senderName`, `senderMsg`, `msgOn`) VALUES
(1, 'test@test.com', 'test', 'test test', '2019-09-30 05:04:24'),
(2, 'test@test.com', 'test 2', 'hey, this is a test also . .. for testing inbox', '2019-09-30 05:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productTitle` varchar(250) NOT NULL,
  `productSlug` varchar(250) NOT NULL,
  `productName` varchar(250) NOT NULL,
  `productPrice` int(4) NOT NULL,
  `productSD` varchar(250) NOT NULL,
  `productDes` text NOT NULL,
  `productImg` varchar(250) NOT NULL,
  `productOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `productView` int(11) NOT NULL DEFAULT 0,
  `authId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productTitle`, `productSlug`, `productName`, `productPrice`, `productSD`, `productDes`, `productImg`, `productOn`, `productView`, `authId`) VALUES
(2, 'Maximus P7 Plus', 'Maximus-P7-Plus', 'Maximus P7 Plus', 4900, '4G phone under BDT 5,000 is the tagline of Maximus P7 Plus. It is indeed a great deal for those looking for a faster mobile internet connection at minimum budget. Android Go version will support the speed even more when browsing through Google Chrome', '<h2>Maximus P7 Plus Highlights</h2>\r\n<h3>4G Support with Android Oreo Go</h3>\r\n<p>4G phone under BDT 5,000 is the tagline of Maximus P7 Plus. It is indeed a great deal for those looking for a faster mobile internet connection at minimum budget. Android Go version will support the speed even more when browsing through Google Chrome, use YouTube Go app and so on. Mobile data can be saved as well because of the Go version.</p>\r\n<h3>5.45&Prime; IPS HD+ Screen</h3>\r\n<p>Relatively large display with HD+ resolution is among its top features. It is sometimes hard to find HD+ quality even at higher budget phones. Maximus has done an excellent job to add the 720p screen resolution.</p>\r\n<h3>Satisfactory Camera</h3>\r\n<p>5 MP front and 5 MP back camera is in fact a good deal keeping the price in mind. Moreover, the back camera has a dual Xenon flash to capture better photos at night or low-light conditions.</p>\r\n<h3>Decent Performance</h3>\r\n<p>1GB RAM with Android Go version should handle everyday light tasks smoothly. But one should handle the phone with care and patience to enjoy better performance and durability.</p>', 'cb7596fe8e56283cd16977f0aba1d14175195caa.png', '2019-09-25 04:03:39', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `serviceName` varchar(250) NOT NULL,
  `serviceDes` text NOT NULL,
  `serviceImg` varchar(250) NOT NULL,
  `serviceOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `serviceName`, `serviceDes`, `serviceImg`, `serviceOn`) VALUES
(5, 'sim card', 'sim card sell', 'b2560ae907b3789d135bf0a0f114268635d55d0f.jpg', '2019-09-28 11:33:06'),
(6, 'flexiload', 'flexiload', '1ed03a191662be368774a42d330ad8f41e404fce.jpg', '2019-09-28 11:33:45'),
(7, 'mobile banking', 'mobile banking', '6210468f051dda38a90b1ee272e0a005f8d72422.jpg', '2019-09-28 11:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `siteabout`
--

CREATE TABLE `siteabout` (
  `id` int(11) NOT NULL,
  `siteName` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `shortDes` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siteabout`
--

INSERT INTO `siteabout` (`id`, `siteName`, `title`, `shortDes`, `description`, `img`) VALUES
(1, 'Ma Telecom', 'welcome to ma telecom', 'incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pari', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>\r\n<p> </p>\r\n<p><strong>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</strong></p>', '74677ed423e5d35973a68e0effaab2c5186ecb54.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sliderimgs`
--

CREATE TABLE `sliderimgs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL,
  `imgOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliderimgs`
--

INSERT INTO `sliderimgs` (`id`, `title`, `img`, `imgOn`) VALUES
(3, 'a', '6ae825f1e9cf8609c46c597f3016b40778b919e2.jpg', '2019-09-28 05:25:48'),
(4, 'b', '68474728974a18fe7b08fa3329a1684f42b3f0b0.jpg', '2019-09-28 05:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `sociallinks`
--

CREATE TABLE `sociallinks` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(250) NOT NULL,
  `icon` varchar(250) NOT NULL,
  `linkOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sociallinks`
--

INSERT INTO `sociallinks` (`id`, `title`, `url`, `icon`, `linkOn`) VALUES
(1, 'facebook', 'https://facebook.com/anikghosh356', 'fab fa-facebook-square', '2019-09-27 11:24:10'),
(4, 'twitter', 'https://github.com/anikghosh356', 'fab fa-github', '2019-09-28 14:14:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_t`
--
ALTER TABLE `admin_t`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siteabout`
--
ALTER TABLE `siteabout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliderimgs`
--
ALTER TABLE `sliderimgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sociallinks`
--
ALTER TABLE `sociallinks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_t`
--
ALTER TABLE `admin_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `siteabout`
--
ALTER TABLE `siteabout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliderimgs`
--
ALTER TABLE `sliderimgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sociallinks`
--
ALTER TABLE `sociallinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
