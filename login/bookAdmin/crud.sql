-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Database: `crud`
-- Table structure for table `googles`
--

CREATE TABLE `googles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sight` varchar(100) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB;

ALTER TABLE `googles`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `googles`
ALTER TABLE `googles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

SET @i := 0;
UPDATE `googles` SET `id` = (@i := @i +1);
  
