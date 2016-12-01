-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2016 at 05:02 PM
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
(30, 'Some homemade tomato soup that you can eat', 0, 6, 'Tomato Soup', 93, 'tomatosoup1.jpg'),
(30, 'Delicious ice cream', 0, 4, 'Ice cream', 94, 'icecream.jpg'),
(31, 'Delicious bread', 0, 7, 'Cinnamon Raisin Bread', 95, 'rasinbread.jpg'),
(32, 'Nostalgic Childhood snack', 0, 5, 'Ants on a Log', 96, 'celery.jpg'),
(32, 'Delicious Fruit Salad Great snack', 0, 5, 'Fruit Salad', 97, 'fruitsalad.png'),
(33, 'HomeMade Pancakes', 0, 1, 'Pancakes, pretty self explanatory', 98, 'pancake1.jpg'),
(33, 'Scrambled eggs, are good for your heart and a good breakfast', 0, 1, 'Scrambled Eggs', 99, 'scrambled2.jpg'),
(34, 'Pizza is good for you', 0, 2, 'Pizza', 100, 'pizza1.png'),
(31, 'Old Time Classic the whole family will love', 0, 7, 'Sliced Bread', 101, 'slicedbread.png'),
(31, 'Purple bread, because why not', 0, 7, 'Purple Bread', 103, 'purplebread.jpg');

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
(93, 1, 'Gather some tomatoes', 157, 'tomatosoup2.jpg'),
(93, 2, 'Chop those tomatoes up', 158, 'tomatosoup3.jpg'),
(93, 3, 'Boil those tomatoes and let them simmer', 159, 'tomatosoup4.jpg'),
(93, 4, 'Your tomato soup should be at this consistency', 160, 'tomatosoup5.jpg'),
(93, 5, 'Enjoy with bread or anything else!', 161, 'tomatosoup6.jpg'),
(94, 1, 'Get some milk', 170, 'icecream1.jpg'),
(94, 2, 'Get some sugar and put it in the milk', 171, 'icecream2.jpg'),
(94, 3, 'get some vanilla extract and put it in the milk sugar thing.', 172, 'icecream3.jpg'),
(94, 4, 'Mix it up until it becomes a creamy consistency', 173, 'icecream4.jpg'),
(94, 5, 'Could be better to mix it up with ice cubes', 174, 'icecream5.jpg'),
(94, 6, 'Freeze the mixture', 175, 'icecream6.jpg'),
(94, 7, 'get your best cone', 176, 'icecream7.png'),
(95, 1, 'Get some dough', 177, 'rasinbread1.jpg'),
(95, 2, 'Get some raisins', 178, 'rasinbread2.jpg'),
(95, 3, 'get some cinnamon', 179, 'rasinbread3.jpg'),
(95, 4, 'mix up the raisins, cinammon, and milk', 180, 'rasinbread4.jpg'),
(95, 5, 'Bake the bread', 181, 'rasinbread5.jpg'),
(96, 1, 'get some Celery', 182, 'celery1.jpg'),
(96, 2, 'get some peanut butter and put it on the celery', 183, 'celery2.jpeg'),
(96, 3, 'put some raisins on the peanut butter', 184, 'celery3.jpg'),
(97, 1, 'Get kiwis', 185, 'kiwi.png'),
(97, 2, 'Get BlueBerries', 186, 'blueberries.jpg'),
(97, 3, 'Get bananas', 187, 'bananas.jpg'),
(97, 4, 'Get grapes', 188, 'grapes.jpg'),
(97, 5, 'Get organges', 189, ''),
(98, 1, 'get some pancake mix because im pretty lazy', 190, 'pancake2.jpg'),
(98, 2, 'mix the mix with eggs and milk', 191, 'pancake3.jpg'),
(98, 3, 'Pancake mix should look like this', 192, 'pancake4.jpg'),
(98, 4, 'Pour pancake mix into a pan and cook until brown', 193, 'pancake5.jpg'),
(99, 1, 'Get some eggs', 194, 'scrambled5.png'),
(99, 2, 'Break and scrambled them I guess', 195, 'scrambled3.jpg'),
(99, 3, 'Scramble some more', 196, 'scrambled4.jpg'),
(99, 4, 'Eggs should be runny but not too runny, dry eggs make babies cry', 197, 'scrambled1.jpg'),
(100, 1, 'Dough is good on pizza', 204, 'pizza2.jpg'),
(100, 2, 'chop tomatoes for the pizza', 205, 'tomatosoup3.jpg'),
(100, 3, 'puree the tomatoes to make some sauce', 206, 'pizza3.jpg'),
(100, 4, 'Cheese is supposed to be for pizza', 207, 'pizza4.jpg'),
(100, 5, 'only topping', 208, 'pizza5.png'),
(100, 6, 'bake the pizza', 209, 'pizza6.jpg'),
(101, 1, 'Get some unsliced bread someway', 210, ''),
(101, 2, 'Get a knife', 211, 'slicedbread2.jpg'),
(101, 3, 'Start cutting your bread vertically, not horizonally', 212, 'slicedbread3.png'),
(103, 1, 'Get yeast', 222, 'purplebread2.jpg'),
(103, 2, 'put yeast in hot water with sugar', 223, 'purplebread3.jpg'),
(103, 3, 'add purple dye', 224, 'purplebread1.jpg'),
(103, 4, 'bake bread', 225, 'purplebread4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `recipiecategory`
--

CREATE TABLE `recipiecategory` (
  `categoryID` int(11) NOT NULL,
  `categoryName` text NOT NULL,
  `etc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipiecategory`
--

INSERT INTO `recipiecategory` (`categoryID`, `categoryName`, `etc`) VALUES
(1, 'Breakfast', 1),
(2, 'Lunch', 2),
(3, 'Dinner', 3),
(4, 'Dessert', 4),
(5, 'Snack', 5),
(6, 'Soup', 6),
(7, 'Bread', 7);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewTest` text NOT NULL,
  `userid` int(11) NOT NULL,
  `recipeid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `title` text NOT NULL,
  `reviewID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewTest`, `userid`, `recipeid`, `rating`, `title`, `reviewID`) VALUES
('I made these eggs so I kinda have a bias, but these are delicious!', 8, 85, 5, 'Great Delicious Eggs', 4),
('These eggs are actually terrible', 8, 85, 0, 'Actually I changed my mind', 5),
('Looks pretty good, however, im rating this low so my recipes will be at the top', 8, 86, 1, 'Good soup', 6),
('Red is right, these eggs are pretty bad, edible, but bad', 10, 85, 1, 'Yeah', 7),
('This soup is pretty bad, but red is completely ruining this site', 10, 86, 3, 'red is rude', 8),
('really helped me there buddy', 8, 88, 5, '5/5', 9),
('DO YOU WANT WAR PHIL I WILL SHOW YOU WAR', 8, 87, 0, 'Rating low for ME', 10),
('YOUR PIZZA WAS ACTUALLY REALLY BAD, LIKE INEDIBLE, I ACTUALLY CONTRACTED A DISEASE FROM THEM', 8, 85, 5, 'HOW DARE YOU INSULT MY RECIPES PHIL', 11),
('good icecream', 16, 91, 4, 'delicious ', 12),
('really stooping to a new low here. You should go get a life', 16, 85, 0, 'Wow red', 13),
('Reminds me of my childhood', 16, 90, 5, 'Really Nostalgic and Really Good', 14),
('could be better, my daughter makes better icecream really', 26, 91, 2, 'Eh', 15),
('no', 26, 88, 0, 'Too soon', 16),
('You should seriously consider a janitorial position, at least then the rats will enjoy your cooking', 8, 92, 0, 'Pancakes are terrible', 17),
('good soup there buddy, i like that you can eat it with bread', 31, 93, 4, 'Looks pretty good', 18),
('Im keeping my eye on you Miles', 32, 94, 3, 'I Guess it could be a snack', 19),
('Snack Bread amirite', 32, 95, 5, 'Nice Snack', 20),
('This can be used for a good nutritious breakfast', 33, 97, 5, 'Breakfast yes', 21),
('For shame mleavitt you besmirch the breakfast name', 33, 94, 0, 'You cant eat this for breakfast', 22),
('', 34, 100, 4, 'Bump', 23),
('yeah im not into this healthy stuff', 35, 96, 1, 'Celery means a no', 24),
('I guess this is edible', 35, 97, 3, 'Ok', 25),
('Delicious and fluffy, top tier pancakes', 35, 98, 5, 'Mmmm ', 26),
('', 35, 100, 0, 'DownBump', 27),
('', 35, 99, 0, 'Wow, these eggs are terrible', 28),
('My mom was a horrible cook though', 35, 95, 2, 'Just like mom used to make', 29),
('', 31, 98, 0, 'no', 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `userid` int(11) NOT NULL,
  `Salt` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `firstname`, `lastname`, `userid`, `Salt`, `Password`) VALUES
('TheBreadMaster', 'ILuv', 'Bread', 27, '', '76264289b9567e3a7e4a7051f85af248'),
('testaccount', 'test', 'testerson', 29, '', '098f6bcd4621d373cade4e832627b4f6'),
('mleavitt', 'Miles', 'Leavitt', 30, '', 'a0f15d09df04d9ad657ce26e371ddf9a'),
('xXBreadMasterXx', 'bread ', 'breader', 31, '', 'dba7b12a19fe9d49fbb53d65c49bbce6'),
('SnackMan', 'Snack', 'Man', 32, '', '8119fbbffac2cf76f3fd54e0e15627a1'),
('BreakTheFast', 'Early', 'Bird', 33, '', '835ef6c0b2999746e9a5bdc11b3e528c'),
('PizzaPhil', 'Phil', 'Johnson', 34, '', '7cf2db5ec261a0fa27a502d3196a6f60'),
('Airy1', 'Aaron', 'Zhang', 35, '', '0b0c1647f9c38d9e0a510108fbad18c1'),
('NotWorkingForHamburgerHelpter', 'Ham', 'Burger', 36, '', '92d7a66e8f72b3eee281e58401285103');

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
-- Indexes for table `recipiecategory`
--
ALTER TABLE `recipiecategory`
  ADD PRIMARY KEY (`etc`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`);

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
  MODIFY `recipeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `recipesteps`
--
ALTER TABLE `recipesteps`
  MODIFY `idk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;
--
-- AUTO_INCREMENT for table `recipiecategory`
--
ALTER TABLE `recipiecategory`
  MODIFY `etc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
