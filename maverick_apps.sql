-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2017 at 04:19 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maverick_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email_address` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `email_address`, `password`) VALUES
(1, 'Tanveer Hossain', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(2) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `category_icon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `category_icon`) VALUES
(1, 'WordPress', 'We make awesome custom themes and plugins for WP', 1, 'fa-wordpress'),
(2, 'Joomla', 'We make awesome custom themes and plugins for Joomla', 1, 'fa-joomla'),
(3, 'Drupal', 'We make awesome custom themes and plugins for Drupal', 1, 'fa-drupal'),
(4, 'PHP', 'Need Blazing fast PHP Web Apps? We got you covered.', 1, 'fa-spinner'),
(5, 'Javascript', 'Need cutting edge JS app to rock the world? Yes, please.', 1, 'fa-times'),
(6, 'Python', '<span style=\"color: rgb(12, 60, 38); font-family: Palatino, \" palatino=\"\" linotype\",=\"\" \"book=\"\" antiqua\",=\"\" \"hoefler=\"\" text\",=\"\" georgia,=\"\" \"lucida=\"\" bright\",=\"\" cambria,=\"\" times,=\"\" \"times=\"\" new=\"\" roman\",=\"\" serif;=\"\" font-size:=\"\" 18px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\">Django is a high-level Python Web framework.</span>', 1, 'fa-rocket ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feature`
--

CREATE TABLE `tbl_feature` (
  `feature_id` int(2) NOT NULL,
  `feature_name` varchar(50) NOT NULL,
  `feature_description` varchar(100) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `feature_icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_feature`
--

INSERT INTO `tbl_feature` (`feature_id`, `feature_name`, `feature_description`, `publication_status`, `feature_icon`) VALUES
(3, 'Clean Code', 'Our code are as clean as', 1, 'fa-bolt'),
(4, 'Responsive', 'Responsive', 1, 'fa-laptop '),
(5, 'All Browser', 'our websites work on all devices', 1, 'fa-check');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `pages_id` int(2) NOT NULL,
  `pages_name` varchar(50) NOT NULL,
  `pages_description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`pages_id`, `pages_name`, `pages_description`, `publication_status`) VALUES
(2, 'about us', 'we are team maverick', 1),
(3, 'contact us', 'contact me', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(256) NOT NULL,
  `category_id` int(3) NOT NULL,
  `product_short_description` text NOT NULL,
  `product_long_description` text NOT NULL,
  `product_image` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `product_short_description`, `product_long_description`, `product_image`, `publication_status`) VALUES
(1, 'Portfolio website', 1, 'website with my portfolio', '', '../assets/admin_assets/product_images/portfolio.jpg', 0),
(2, 'HomeTrust Living Ltd', 1, 'A wordpress site for a Real Estate firm', '', '../assets/admin_assets/product_images/ht.jpg', 1),
(3, 'Neovista', 1, 'A website for NeoVista E-Power Engineering.', '', '../assets/admin_assets/product_images/nvepe.jpg', 0),
(4, 'Multibuzz', 1, 'A simple WP theme from HTML', '', '../assets/admin_assets/product_images/multibuzz.jpg', 0),
(5, 'Smartphonescity', 1, 'A mobile phone firm of Bangladesh. I installed the theme and plugin in this website.', '', '../assets/admin_assets/product_images/smartphonescity.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_feature`
--
ALTER TABLE `tbl_feature`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`pages_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_feature`
--
ALTER TABLE `tbl_feature`
  MODIFY `feature_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `pages_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
