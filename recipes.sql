-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2016 at 04:40 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipes`
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
  `recipeid` int(11) NOT NULL,
  `imagename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `generalrecipes`
--

INSERT INTO `generalrecipes` (`userid`, `description`, `parentid`, `category`, `Title`, `recipeid`, `imagename`) VALUES
(12, 'food', 0, 5, 'testaccount5 food', 49, ''),
(10, 'Nice Bread', 0, 1, 'PhilsBread', 55, ''),
(8, 'reder', 0, 3, 'redlife', 56, ''),
(8, 'fasdfdsfs', 0, 1, 'dfasdfdf', 57, ''),
(13, 'SoupySoup', 0, 6, 'MilesDeliciousSoup', 58, ''),
(13, 'SoupySoup', 0, 6, 'MilesDeliciousSoup', 59, ''),
(13, 'dfadsfdasfadsfs', 0, 2, 'fsdafadsfdsaf', 60, ''),
(13, 'fdsafadsfdsa', 0, 1, 'fdfdasfdsa', 61, ''),
(13, 'Breakfast', 0, 1, 'MilesBreakfast', 62, ''),
(13, 'dsfsdfsdf', 0, 1, 'efdsfadsf', 63, ''),
(13, 'dsfsdfsdf', 0, 1, 'efdsfadsf', 64, ''),
(13, '', 0, 0, '', 65, ''),
(13, 'dsfsdfsdf', 0, 1, 'efdsfadsf', 66, ''),
(13, 'dsfsdfsdf', 0, 1, 'efdsfadsf', 67, ''),
(13, 'dsfsdfsdf', 0, 1, 'efdsfadsf', 68, ''),
(13, 'dsfsdfsdf', 0, 1, 'efdsfadsf', 69, ''),
(13, 'dsfsdfsdf', 0, 1, 'efdsfadsf', 70, ''),
(13, 'dsfsdfsdf', 0, 1, 'efdsfadsf', 71, ''),
(13, 'dsfsdfsdf', 0, 1, 'efdsfadsf', 72, ''),
(13, 'dsfdsfdsfasdf', 0, 1, 'dsafsdfdsf', 73, ''),
(13, 'dsfdsafdsfdsf', 0, 4, 'dsafdsafdsf', 74, ''),
(0, 'dsfdsafasdf', 0, 4, 'fasdfdsaf', 75, ''),
(8, 'dfaasdfsdfsd', 0, 1, 'dsafsdafdsfs', 76, ''),
(0, 'sdfdsafdsf', 0, 1, 'fdsfsdafsd', 77, ''),
(8, 'dsfasdafsdf', 0, 3, 'dsafdsfdasfds', 78, ''),
(8, 'afdsfsdfds', 0, 1, 'fdsafdsfsd', 79, ''),
(8, 'yummy yummy', 0, 3, 'memesalad', 80, ''),
(8, 'rdve', 0, 3, 'bedv', 81, ''),
(8, 'soup', 0, 4, 'soupy', 82, '');

-- --------------------------------------------------------

--
-- Table structure for table `recipesteps`
--

CREATE TABLE `recipesteps` (
  `recipeID` int(11) NOT NULL,
  `stepnumber` int(11) NOT NULL,
  `stepdescription` text NOT NULL,
  `idk` int(11) NOT NULL,
  `imagename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipesteps`
--

INSERT INTO `recipesteps` (`recipeID`, `stepnumber`, `stepdescription`, `idk`, `imagename`) VALUES
(49, 1, 'test', 56, ''),
(49, 2, 'testing', 57, ''),
(55, 1, '', 63, ''),
(55, 2, 'Get Rasins and put them in bread', 64, ''),
(55, 3, 'bake bread some more\r\n', 65, ''),
(55, 4, 'eat bread', 66, ''),
(56, 1, 'get the color red', 67, ''),
(56, 2, 'get the color purple', 68, ''),
(56, 3, 'put more reds', 69, ''),
(57, 1, 'dfdsfdasfdsfaf', 70, ''),
(57, 2, 'dsafasdfsdfsda', 71, ''),
(58, 1, 'Get some broth', 72, ''),
(58, 2, 'add some food to the broth', 73, ''),
(58, 3, 'b r o t h ', 74, ''),
(59, 1, 'Get some broth', 75, ''),
(60, 1, 'dsfdsfsdfa', 76, ''),
(61, 1, 'fadsfadsfsfa', 77, ''),
(62, 1, 'brea', 78, ''),
(63, 1, 'dsafsdfasdfsadf', 79, ''),
(64, 1, 'dsafsdfasdfsadf', 80, ''),
(64, 2, 'fsdaf', 81, ''),
(66, 1, 'dsafsdfasdfsadf', 82, ''),
(67, 1, 'dsafsdfasdfsadf', 83, ''),
(68, 1, 'dsafsdfasdfsadf', 84, ''),
(69, 1, 'dsafsdfasdfsadf', 85, ''),
(69, 2, 'dsfdsfdsfsdaffdsdff', 86, ''),
(70, 1, 'dsafsdfasdfsadf', 87, ''),
(71, 1, 'dsafsdfasdfsadf', 88, ''),
(72, 1, 'dsafsdfasdfsadf', 89, ''),
(73, 1, 'dsfsdafsdafsdfsdsfsdd', 90, ''),
(73, 2, 'dsafdsafds', 91, ''),
(74, 1, 'sdfdasfds', 92, ''),
(74, 2, 'dsfdsafsdafs', 93, ''),
(74, 3, 'dsafsdfdfa', 94, ''),
(75, 1, 'dsfsdafadsfs', 95, ''),
(75, 2, 'dsfdsf', 96, ''),
(76, 1, 'afdsafsdfsadfdafd', 97, ''),
(76, 2, 'redsafdsfsdf', 98, ''),
(76, 3, 'fsdfsdfsddf', 99, ''),
(77, 1, 'sfdsfsdafdsfsadf', 100, 'cyber.gif'),
(77, 2, 'dsfsdafsdafsda', 101, 'boxplot SelfConcept gender.PNG'),
(78, 1, 'afdsfsdfasdf', 102, 'server_dust___swings_by_vioxtar-dae94r2.jpg'),
(78, 2, 'dsafdsfdsfasdfsda', 103, 'time_paulryan_20111205_04021.jpg'),
(79, 1, 'fsdfdsfsdafdsafsd', 104, 'somehting.png'),
(79, 2, 'dsfdsfdsfsdafdsfsdafsd', 105, 'c29bf435b98b.jpg'),
(80, 1, 'redted', 106, 'european city snow.jpg'),
(80, 2, 'hrecfd', 107, 'snowy road.jpg'),
(81, 1, 'ferv', 108, 'red room.jpg'),
(81, 2, 'rcvfre', 109, 'snowy.jpg'),
(82, 1, 'get soup from can', 110, 'img_8733.jpg'),
(82, 2, 'eat soup', 111, 'winter in instanbull.jpg');

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
  `rating` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('testaccount5', 'test', 'tester', 'test', 12),
('mleavitt', 'password', 'Miles', 'Leavitt', 13),
('helloworld', 'hello', 'Hello', 'World', 14),
('red2', 'red', 'red', 'rederson', 15),
('red5', 'red5', 'red', 'redestson', 16),
('testaccount2', 'test4', 'test', 'testerfather', 23),
('testaccount3', 'rew', 'test', 'testermother', 24);

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
  MODIFY `recipeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `recipesteps`
--
ALTER TABLE `recipesteps`
  MODIFY `idk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
