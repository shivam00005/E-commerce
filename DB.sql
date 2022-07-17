-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2022 at 09:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_tittle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_tittle`) VALUES
(1, 'Apple'),
(2, 'HP'),
(3, 'Dell'),
(4, 'Acer'),
(5, 'Nikon'),
(6, 'Lenovo'),
(7, 'SaskTel');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(300) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `p_quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `c_email`, `p_quantity`) VALUES
(5, '::1', ' ', 2),
(3, '::1', 'ram@ram.com', 1),
(6, '::1', 'sam@sam.com', 1),
(3, '::1', 'sam@sam.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_tittle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_tittle`) VALUES
(1, 'Laptop'),
(2, 'Moblie'),
(3, 'Computer'),
(4, 'Camera'),
(5, 'Wifi');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_ip` varchar(100) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(300) NOT NULL,
  `customer_image` varchar(250) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(100) NOT NULL,
  `customer_address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_password`, `customer_image`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`) VALUES
(6, '::1', 'Rama', 'ram@ram.com', '$2y$10$QAcO0YdU8FLb/AQKuMnFOuCmAXI1eJAOyW64syhVonyaV7hAlnISm', 'dog.jpg', 'bangladesh', 'cdcd', 0, 'cadc'),
(7, '::1', 'sam', 'sam@sam.com', '$2y$10$eMZ5kOn6gsmGu0q3VPsDre9G/Vqb6EIju8TSRTMzI5S9wSOjCVEJm', 'default_user.png', 'germany', 'acd', 0, 'sca'),
(8, '::1', 'rohit', 'rohit@rohit.com', '$2y$10$9DEg7sl01ycLQkK8O.BES.CHve/n35F9SyNMmpP6lHXFrtgmvvIfK', 'dog.jpg', 'bangladesh', 'njkf', 0, 'fmkvf');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_cat` varchar(100) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_tittle` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` varchar(1000) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_keywords` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_tittle`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, '3', '4', 'Acer desktop', 1200, '<h2><strong>Desktop Computers</strong></h2>\n\n<h3>Recommended Configurations</h3>\n\n<p>We recommend systems that meet or exceed the following specifications:</p>\n\n', 'acer-desktop-computer.jpeg', 'new desktop, computer, acer'),
(2, '3', '2', 'Hp desktop', 2100, '<table>\r\n		<tr>\r\n			<td rowspan=\"1\" style=\"vertical-align:top\">\r\n			<p><strong>Product Number</strong></p>\r\n			</td>\r\n			<td rowspan=\"1\" style=\"vertical-align:top\">\r\n			<p>4YR38AA</p>\r\n			</tr>\r\n</table>', 'hp_desktop.jpeg', 'new, computer, desktop, hp'),
(3, '2', '1', 'iPhone 13', 1000, '<h3><strong>DESCRIPTION</strong></h3>\r\n\r\n<p>The iPhone 13 Pro is Apple&#39;s smaller premium iPhone with a 6.1&quot; screen size and for the first time in an iPhone, it comes with a 120Hz ProMotion di', 'iphone_13.jpg', 'new phone, iPhone, apple'),
(4, '2', '1', 'iPhone 12', 850, '<h3><strong>DESCRIPTION</strong></h3>\r\n\r\n<p>Apple iPhone 12 is the bigger version of the regular iPhone 12 mini. The handset&#39;s hardware include a 6.1-inch OLED display, 5nm Apple A14 Bionic proces', 'iphone_12.jpg', 'new phone, iPhone, apple'),
(5, '1', '3', 'dell inspiron 3500', 780, '<table>\n	<caption><strong>Description</strong></caption>\n	<thead>\n		<tr>\n			<th>DESCRIPTION</th>\n			<th>VALUES</th>\n			<th>VALUES</th>\n			<th>VALUES</th>\n			<th>VALUES</th>\n			<th>VALUES</th>\n</tr>\n</thead>\n</table>\n', 'dell inspiron.jpg', 'dell, new laptop, news'),
(6, '1', '3', 'Dell Latitude', 2100, '<p><strong>Description</strong></p>\r\n\r\n<ul>\r\n	<li>11th Gen Intel&reg; Core&trade; i5-1135G7</li>\r\n	<li>Windows 10 Pro (Windows 11 Pro license included)</li>\r\n	<li>(Dell Technologies recommends Windows', 'peripherals_laptop_latitude_3420.jpg', 'dell, new laptop, news'),
(7, '4', '5', 'Nikon D90P8', 1500, '<h3>Feature list</h3>\r\n\r\n<ul>\r\n	<li>Nikon&#39;s 12.3&nbsp;<a href=\"https://en.wikipedia.org/wiki/Megapixel\" title=\"Megapixel\">megapixel</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Nikon_DX_format\"', 'Nikon_D90P8.jpg', 'camera, Nikon, new camera news'),
(8, '4', '5', 'Nikon d5500', 1000, '<h3><strong>Nikon D5500 key features</strong></h3>\r\n\r\n<ul>\r\n	<li>24.2MP CMOS sensor with no optical low-pass filter</li>\r\n	<li>Ultra-compact and lightweight body</li>\r\n	<li>Multi-CAM 4800DX&nbsp;39-po', 'nikon 5500.jpg', 'camera, Nikon, new camera news');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
