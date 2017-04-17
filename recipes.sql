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
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `FollowerID` int(11) NOT NULL,
  `FollowingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`FollowerID`, `FollowingID`) VALUES
(37, 31),
(37, 38),
(38, 37),
(38, 48),
(50, 38);

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
(31, 'Purple bread, because why not', 0, 7, 'Purple Bread', 103, 'purplebread.jpg'),
(31, 'Mac and Cheese an old favorite', 0, 2, 'Mac And Cheese', 115, 'macandcheese.jpg'),
(31, 'Delicious RibEye', 0, 3, 'Steak', 116, 'steak.jpg'),
(31, 'Tacos', 0, 2, 'Tacos', 117, 'tacos_main.jpeg'),
(31, 'doughuts', 0, 4, 'Doughnuts', 118, 'doughnuts.jpg'),
(40, 'A cake for birthdays', 0, 4, 'Birthday Cake', 128, 'birthdaycake.jpg'),
(38, 'Delicious roasted chicken, flavored with a million spices.', 0, 3, 'Roasted Chicken', 129, 'roastedchicken.jpg'),
(38, 'Delicious soup for soup lovers', 0, 6, 'Broccoli Cheddar Soup', 130, 'bcsoup.jpg'),
(49, 'Beef Wellington that would make gordon ramsey drool', 0, 3, 'Beef Wellington', 131, 'bw.jpg'),
(50, 'Waffles to eat when you wake up', 0, 1, 'Waffles', 132, 'waffle.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `groupmembers`
--

CREATE TABLE `groupmembers` (
  `UserID` int(11) NOT NULL,
  `GroupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupmembers`
--

INSERT INTO `groupmembers` (`UserID`, `GroupID`) VALUES
(37, 9),
(38, 9),
(38, 27);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `GroupID` int(11) NOT NULL,
  `GroupName` text NOT NULL,
  `GroupDescription` text NOT NULL,
  `PinnedDescription` text NOT NULL,
  `LeaderID` int(11) NOT NULL,
  `GroupPicture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GroupID`, `GroupName`, `GroupDescription`, `PinnedDescription`, `LeaderID`, `GroupPicture`) VALUES
(9, 'Third Group', 'Third Group', '', 37, '16251454_10206839814428928_1907262116_o.jpg'),
(27, 'grouploop', 'group', '', 38, '3(3).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pinnedrecipes`
--

CREATE TABLE `pinnedrecipes` (
  `GroupID` int(11) NOT NULL,
  `RecipeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinnedrecipes`
--

INSERT INTO `pinnedrecipes` (`GroupID`, `RecipeID`) VALUES
(27, 128);

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
(103, 4, 'bake bread', 225, 'purplebread4.jpg'),
(114, 1, 'Test', 248, 'starwars.jpg'),
(114, 2, 'test2', 249, 'Capture.PNG'),
(115, 1, 'Mac ', 250, 'macarooni.jpg'),
(115, 2, 'add cheese', 251, 'cheese.jpg'),
(116, 1, 'Aquire Cow', 252, 'cow.jpg'),
(116, 2, 'Cook cow', 253, 'cooking meat.jpg'),
(117, 1, 'get shells', 254, 'PKU-Image_Tortillas.jpeg'),
(117, 2, 'put ingredients in shells', 255, 'taco_ingredients.png'),
(118, 1, 'dough', 256, 'doughnuts1.jpg'),
(118, 2, 'icing', 257, 'doughnuts2.jpg'),
(128, 2, 'Mix Cake Batter', 277, 'birthdaycake2.jpg'),
(128, 3, 'Put in oven for some time until made', 278, 'birthdaycake3.jpg'),
(128, 4, 'Put frosting over it', 279, 'birthdaycake4.jpg'),
(129, 1, 'Get a chicken', 280, 'chicken1.png'),
(129, 2, 'Roast it', 281, 'chicken2.jpg'),
(129, 3, 'Season the chicken', 282, 'chicken3.jpg'),
(130, 1, 'Gather Broccoli', 283, 'bcsoup1.jpg'),
(130, 2, 'Gather Cheddar', 284, 'bcsoup2.jpg'),
(130, 3, 'Eat with bread if possible', 285, 'bcsoup3.jpeg'),
(131, 1, 'Get beef', 286, 'bw1.jpg'),
(131, 2, 'Get Bread', 287, 'bw2.jpg'),
(131, 3, 'Cook', 288, 'bw3.jpg'),
(132, 1, 'Get waffle batter', 289, 'waffle1.jpg'),
(132, 2, 'Bake Waffle in waffle maker', 290, 'waffe2.jpg'),
(132, 3, 'Put whatever toppings you want', 291, 'waffle3.jpg');

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
('', 31, 98, 0, 'no', 30),
('', 31, 97, 0, 'Terrible', 31),
('title says alll', 40, 97, 0, 'pretty bad', 32),
('', 38, 93, 4, 'Nice', 38),
('Delicious BirthDay Cake', 48, 128, 5, 'Birthday Cake', 44),
('Looks Great', 49, 129, 5, 'Love chicken', 47);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `userid` int(11) NOT NULL,
  `Password` text NOT NULL,
  `LastLoggedIn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `firstname`, `lastname`, `userid`, `Password`, `LastLoggedIn`) VALUES
('TheBreadMaster', 'ILuv', 'Bread', 27, '76264289b9567e3a7e4a7051f85af248', '0000-00-00'),
('testaccount', 'test', 'testerson', 29, '098f6bcd4621d373cade4e832627b4f6', '0000-00-00'),
('mleavitt', 'Miles', 'Leavitt', 30, 'a0f15d09df04d9ad657ce26e371ddf9a', '0000-00-00'),
('Bread Gentleman', 'bread ', 'breader', 31, 'dba7b12a19fe9d49fbb53d65c49bbce6', '0000-00-00'),
('SnackMan', 'Snack', 'Man', 32, '8119fbbffac2cf76f3fd54e0e15627a1', '0000-00-00'),
('BreakTheFast', 'Early', 'Bird', 33, '835ef6c0b2999746e9a5bdc11b3e528c', '0000-00-00'),
('PizzaPhil', 'Phil', 'Johnson', 34, '7cf2db5ec261a0fa27a502d3196a6f60', '0000-00-00'),
('Airy1', 'Aaron', 'Zhang', 35, '0b0c1647f9c38d9e0a510108fbad18c1', '0000-00-00'),
('NotWorkingForHamburgerHelpter', 'Ham', 'Burger', 36, '92d7a66e8f72b3eee281e58401285103', '0000-00-00'),
('NewLIfe', 'New', 'Life', 37, 'c48c29157e2b358cc144027f3e2d8cb4', '0000-00-00'),
('wewlads2', 'wew', 'lads', 38, 'c48c29157e2b358cc144027f3e2d8cb4', '0000-00-00'),
('newlife3', 'new', 'life', 39, 'c48c29157e2b358cc144027f3e2d8cb4', '0000-00-00'),
('BirthdayBoi', 'Birthday', 'Boi', 48, 'a3e2a6cbf4437e50816a60a64375490e', '0000-00-00'),
('BreakfastMan', 'Breafkast', '4lyfe', 50, '31d4541b8e926a24f0c9b835b68cfdf3', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`FollowerID`,`FollowingID`);

--
-- Indexes for table `generalrecipes`
--
ALTER TABLE `generalrecipes`
  ADD PRIMARY KEY (`recipeid`);

--
-- Indexes for table `groupmembers`
--
ALTER TABLE `groupmembers`
  ADD PRIMARY KEY (`UserID`,`GroupID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GroupID`);

--
-- Indexes for table `pinnedrecipes`
--
ALTER TABLE `pinnedrecipes`
  ADD PRIMARY KEY (`RecipeID`,`GroupID`);

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
  MODIFY `recipeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `GroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `recipesteps`
--
ALTER TABLE `recipesteps`
  MODIFY `idk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
--
-- AUTO_INCREMENT for table `recipiecategory`
--
ALTER TABLE `recipiecategory`
  MODIFY `etc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
