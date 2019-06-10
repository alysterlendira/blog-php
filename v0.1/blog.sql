-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2017 at 11:56 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ca_id` int(11) NOT NULL,
  `ca_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ca_id`, `ca_name`) VALUES
(1, 'News'),
(2, 'Events'),
(3, 'Tutorials'),
(4, 'Misc');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `po_id` int(11) NOT NULL,
  `po_category` int(11) NOT NULL,
  `po_title` varchar(255) NOT NULL,
  `po_body` text NOT NULL,
  `po_author` varchar(255) NOT NULL,
  `po_tags` varchar(255) NOT NULL,
  `po_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`po_id`, `po_category`, `po_title`, `po_body`, `po_author`, `po_tags`, `po_date`) VALUES
(1, 1, 'Your Predisposition', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc auctor, lorem id porta elementum, erat metus gravida enim, ac gravida nisl mi eget ligula. Etiam rhoncus imperdiet risus, quis maximus urna aliquam quis. Phasellus suscipit velit in pulvinar egestas. Quisque sollicitudin tempor dui, luctus dapibus tortor rutrum vitae. Duis sit amet elit magna. Aliquam sodales orci non purus cursus, sit amet commodo risus pulvinar. Suspendisse potenti. Proin vestibulum tortor a iaculis maximus. </p>\r\n<p>Aenean vulputate id libero eget placerat. Cras eleifend molestie elit quis imperdiet. Phasellus dapibus tellus est, et dapibus nibh luctus sit amet. Praesent accumsan tortor vitae molestie suscipit. Donec tristique risus in convallis tincidunt. Nam ornare consequat dictum. Proin mi lacus, venenatis quis libero in, malesuada tincidunt tellus. Ut ligula lectus, laoreet non velit egestas, iaculis fringilla dui. Aenean quam lacus, semper a feugiat at, scelerisque id nisl. Ut accumsan nunc ac egestas maximus. Cras a malesuada sem, iaculis viverra dui. </p>\r\n', 'Muhammad Majeed', 'self,discovery,illuminate', '2017-06-15 10:53:51'),
(2, 1, 'PHP Internationl Conference', '<p> Vivamus mattis tellus ut arcu congue tincidunt. Fusce varius tortor at enim tempor tincidunt. Nulla tellus mauris, efficitur a efficitur ac, molestie vitae velit. Ut convallis nisi id risus sodales pharetra. Aliquam maximus libero non imperdiet ullamcorper. Duis tristique tempor pulvinar. Nullam finibus turpis nisi, bibendum cursus est accumsan ac. Nunc laoreet libero mauris, et ultrices metus porttitor quis. Vestibulum ut dui sagittis, pellentesque sapien vitae, tristique urna. Nulla eu purus velit. Nullam lacinia, erat vitae dictum pretium, sem augue congue nibh, et interdum ex velit in sem. Etiam felis turpis, euismod eget consequat et, venenatis sed enim. Sed at sollicitudin felis, eget faucibus turpis. Duis elit lacus, condimentum in tincidunt ac, auctor ac lacus. </p>\r\n<p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>        ', 'Jake Jacobs', 'php,conference,news', '2017-06-16 02:46:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`po_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
