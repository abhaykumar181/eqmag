-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 02:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eqmag`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(100) NOT NULL,
  `catName` text NOT NULL,
  `catUrl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `catName`, `catUrl`) VALUES
(20583, 'Chronos', 'https://equicapmag.com/category/chronos/'),
(41996, 'Hospitality', 'https://equicapmag.com/category/hospitality/'),
(43149, 'Art', 'https://equicapmag.com/category/art/'),
(44182, 'Aviation', 'https://equicapmag.com/category/aviation/'),
(53772, 'Magazine', 'https://equicapmag.com/magazine/'),
(67714, 'Yachting', 'https://equicapmag.com/category/yachting/'),
(90309, 'Hamptons', 'https://equicapmag.com/category/hamptons/'),
(96835, 'Wheels', 'https://equicapmag.com/category/wheels/'),
(97131, 'Real Estate', 'https://equicapmag.com/category/real-estate/');

-- --------------------------------------------------------

--
-- Table structure for table `newsletterdates`
--

CREATE TABLE `newsletterdates` (
  `nid` int(100) NOT NULL,
  `date` date NOT NULL,
  `utm_id` text NOT NULL,
  `preheader` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletterdates`
--

INSERT INTO `newsletterdates` (`nid`, `date`, `utm_id`, `preheader`) VALUES
(79673510, '2023-08-05', 'eqnAug052023', 'Fun in the sun with Northrop & Johnson, International Yacht Company, and Burgess Yachts');

-- --------------------------------------------------------

--
-- Table structure for table `postsdata`
--

CREATE TABLE `postsdata` (
  `postid` int(100) NOT NULL,
  `cid` int(100) NOT NULL,
  `nid` int(100) NOT NULL,
  `title` text NOT NULL,
  `imgurl` text NOT NULL,
  `description` text NOT NULL,
  `posturl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postsdata`
--

INSERT INTO `postsdata` (`postid`, `cid`, `nid`, `title`, `imgurl`, `description`, `posturl`) VALUES
(556168274, 96835, 79673510, 'Interview with Rolls-Royce CEO Torsten Müller-Ötvös', 'https://equicapmag.com/wp-content/uploads/2023/06/Goodwood_Ghost_00017.jpg', 'Torsten Müller-Ötvös leans forward to emphasise a point. “A journalist described being behind the wheel of the Spectre is like the feeling of carrying the very first iPhone in your pocket in 2007. It’s a cool statement.” I’m sitting outside in the warm evening sunshine with the man who has been the CEO of Rolls-Royce Motor Cars since 2010. Gazing out across an Austrian mountain range, the setting worthy of a showdown at a villain’s lair from a James Bond movie. ', 'https://equicapmag.com/wheels/rolls-royce-torsten-muller-otvos/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `newsletterdates`
--
ALTER TABLE `newsletterdates`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `postsdata`
--
ALTER TABLE `postsdata`
  ADD PRIMARY KEY (`postid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `newsletterdates`
--
ALTER TABLE `newsletterdates`
  MODIFY `nid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79673511;

--
-- AUTO_INCREMENT for table `postsdata`
--
ALTER TABLE `postsdata`
  MODIFY `postid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=556168275;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
