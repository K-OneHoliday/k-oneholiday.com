-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2018 at 04:10 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `k_one`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `pdf` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `img`, `pdf`, `description`) VALUES
(1, '8坂神社 (3).jpg', NULL, NULL),
(2, '月光園遊月山莊 (2).jpg', NULL, NULL),
(3, '月光園遊月山莊 (3).jpg', '\"pdf sample\".pdf', NULL),
(4, '月光園遊月山莊 (4).jpg', NULL, '月光園遊月山莊'),
(5, '有馬溫泉 (3).jpg', '<@!&>&@.pdf', '一個人一生一定要去有馬溫泉起碼一次。'),
(6, '神戶HARBOUR LAND.jpg', NULL, NULL),
(7, '渡月橋 (2).jpg', 'PDF 檔案.pdf', 'This is the best place on Earth!'),
(8, 'WORLD DREAM.jpg', NULL, '&#@*^$&*#!*&@#^$!(\"\'\"&&&\"\'');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
