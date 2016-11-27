-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2016 at 11:07 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TestRecipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `breakfastrecipes`
--

CREATE TABLE `breakfastrecipes` (
  `recipeid` int(11) NOT NULL,
  `stepnumber` int(11) NOT NULL,
  `steptext` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generalrecipes`
--

CREATE TABLE `generalrecipes` (
  `userid` int(11) NOT NULL,
  `description` text NOT NULL,
  `parentid` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `Title` text NOT NULL,
  `recipeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalrecipes`
--

INSERT INTO `generalrecipes` (`userid`, `description`, `parentid`, `category`, `Title`, `recipeid`) VALUES
(8, 'Crunchy tacos with handmade tortillas!', 49, 1, 'Tacos', 1),
(12, 'food', 0, 5, 'testaccount5 food', 49);

-- --------------------------------------------------------

--
-- Table structure for table `recipesteps`
--

CREATE TABLE `recipesteps` (
  `recipeID` int(11) NOT NULL,
  `stepnumber` int(11) NOT NULL,
  `stepdescription` text NOT NULL,
  `idk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipesteps`
--

INSERT INTO `recipesteps` (`recipeID`, `stepnumber`, `stepdescription`, `idk`) VALUES
(49, 1, 'food by testaccount5', 55);

-- --------------------------------------------------------

--
-- Table structure for table `recipiecategory`
--

CREATE TABLE `recipiecategory` (
  `categoryID` int(11) NOT NULL,
  `categoryName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipiecategory`
--

INSERT INTO `recipiecategory` (`categoryID`, `categoryName`) VALUES
(1, 'breakfast'),
(2, 'Lunch'),
(3, 'Dinner'),
(4, 'Dessert'),
(5, 'Snack'),
(6, 'Soup'),
(8, 'Bread');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL,
  `reviewTest` text NOT NULL,
  `userid` int(11) NOT NULL,
  `recipeid` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `reviewTest`, `userid`, `recipeid`, `rating`) VALUES
(1, 'This is cold.', 4, 1, 5),
(2, 'This is great!', 10, 1, 4),
(3, 'Super Yummy. I made it of course. Not gonna write a bad review for myself of course.', 8, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` text NOT NULL,
  `password` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `firstname`, `lastname`, `userid`) VALUES
('testaccount', 'test1', 'Aaron', 'Zhang', 4),
('red', 'red', 'red', 'rederson', 8),
('phil', 'phil', 'phil', 'phillerson', 10),
('testaccount4', 'test4', 'Tester', 'Testerson', 11),
('testaccount5', 'test', 'tester', 'test', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `generalrecipes`
--
ALTER TABLE `generalrecipes`
  ADD PRIMARY KEY (`recipeid`);

--
-- Indexes for table `recipesteps`
--
ALTER TABLE `recipesteps`
  ADD PRIMARY KEY (`idk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `generalrecipes`
--
ALTER TABLE `generalrecipes`
  MODIFY `recipeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `recipesteps`
--
ALTER TABLE `recipesteps`
  MODIFY `idk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
