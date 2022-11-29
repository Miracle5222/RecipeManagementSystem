-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 08:35 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipems`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(100) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'Admin', 'test', 'Admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `comment_tbl`
--

CREATE TABLE `comment_tbl` (
  `comment_id` int(100) NOT NULL,
  `recipe_id` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `comment_date` date DEFAULT NULL,
  `ratings` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_tbl`
--

INSERT INTO `comment_tbl` (`comment_id`, `recipe_id`, `user_id`, `comment`, `comment_date`, `ratings`) VALUES
(25, 24, 1, 'fdf', '2022-11-26', 2),
(26, 21, 1, 'nice tutorials', '2022-11-26', 3),
(27, 21, 41, 'awesome!!', '2022-11-26', 5),
(28, 21, 41, 'shess', '2022-11-26', 5),
(29, 22, 1, 'nice', '2022-11-26', 1),
(31, 21, 1, 'type', '2022-11-26', 1),
(32, 23, 48, 'type', '2022-11-26', 1),
(33, 22, 48, 'yes sir', '2022-11-27', 5),
(34, 25, 48, 'sogoi', '2022-11-29', 5);

-- --------------------------------------------------------

--
-- Table structure for table `directions_tbl`
--

CREATE TABLE `directions_tbl` (
  `directions_id` int(100) NOT NULL,
  `recipe_id` int(100) DEFAULT NULL,
  `heading` varchar(100) DEFAULT NULL,
  `directions` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `directions_tbl`
--

INSERT INTO `directions_tbl` (`directions_id`, `recipe_id`, `heading`, `directions`) VALUES
(1, 22, '1', ' I used the all-purpose flour in here, you can also use cake flour to make'),
(2, 22, '2', 'Whip the egg whites to dry peaks, so the pancakes will come out thicker'),
(4, 22, '3', 'All the way low heat, about 5 minutes on each side, you can either add a small spoonful of water or not.                                                    ');

-- --------------------------------------------------------

--
-- Table structure for table `favorites_tbl`
--

CREATE TABLE `favorites_tbl` (
  `user_id` int(100) DEFAULT NULL,
  `recipe_id` int(100) DEFAULT NULL,
  `favorites_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites_tbl`
--

INSERT INTO `favorites_tbl` (`user_id`, `recipe_id`, `favorites_id`) VALUES
(1, 22, 8),
(1, 21, 9),
(1, 24, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ingridients_steps_tbl`
--

CREATE TABLE `ingridients_steps_tbl` (
  `ingridients_steps_id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `ingridient_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ingridient_tbl`
--

CREATE TABLE `ingridient_tbl` (
  `ingridient_id` int(100) NOT NULL,
  `ingridient_name` varchar(200) DEFAULT NULL,
  `recipe_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ingridient_tbl`
--

INSERT INTO `ingridient_tbl` (`ingridient_id`, `ingridient_name`, `recipe_id`) VALUES
(5, '500g Ground Pork', 21),
(6, '1 pack Lumpia Wrapper (25 pcs)', 21),
(8, '1 Carrot ', 21),
(10, '1 Chayote (Sayote)', 21),
(11, '1 Onion (medium)', 21),
(12, '1 bulb Garlic', 21),
(13, '1 Egg (Large)', 21),
(14, '1 tsp Salt', 21),
(15, '1 tsp Pepper', 21),
(16, '2 tbsp Sugar (white or brown)', 21),
(17, '1 sachet of Ginisa Mix (optional)', 21),
(18, '2pcs  Egg ', 22),
(20, '1 cup milk', 22),
(21, '30g (3.3 tbsp)   All-purpose flour', 22),
(22, '1.25ml (1/4 tsp)  Vinilla extract (optional)', 22),
(24, '2 eggs', 23),
(25, '40g sugar', 23),
(26, '1 tablespoon honey', 23),
(27, '1/2 teaspoon Vanilla extract', 23),
(28, '90g all purpose flour', 23),
(29, '1 teaspoon baking powder', 23),
(30, '10 ml water', 23),
(31, 'Potatoes', 24),
(32, 'Sausages', 24),
(33, ' Flour, eggs and bread crumbs', 24),
(34, 'Mozzarella Cheese', 24),
(35, '1 Cup / 200g White Basmati Rice (washed thoroughly with water)', 25),
(36, '2 Cups / 1 Can (540ml Can) Cooked Black Beans OR Pinto Beans (drained/rinsed)', 25),
(37, '3 Tablespoon Olive Oil', 25),
(38, '1 +1/2 / 200g Cup Onion - Chopped', 25),
(39, '1 Cup / 150g Green Bell Pepper - Chopped', 25),
(40, '1 Cup / 150g Red Bell Pepper - Chopped', 25),
(41, '2 Tablespoon Garlic - finely chopped', 25),
(42, '3/4 Cup / 175ml Strained Tomatoes / Passata / Tomato Puree', 25),
(43, '1 Teaspoon Cumin', 25),
(44, '1 Teaspoon Paprika', 25),
(45, '1/4 Teaspoon Cayenne Pepper or to taste', 25),
(46, '1 Cup / 125g Frozen Corn kernels (you can use fresh corn)', 25),
(47, ' Cup / 225ml Vegetable Broth (low sodium)', 25),
(48, 'Salt to Taste (I have added total 1+3/4 Tsp of Pink Himalayan Salt)', 25),
(52, '25g (2 tbsp) Sugar', 22);

-- --------------------------------------------------------

--
-- Table structure for table `log_tbl`
--

CREATE TABLE `log_tbl` (
  `log_id` int(100) NOT NULL,
  `activity_log` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mycomments_tbl`
--

CREATE TABLE `mycomments_tbl` (
  `userComment_Id` int(100) NOT NULL,
  `comment_id` int(100) DEFAULT NULL,
  `ratings_id` int(100) DEFAULT NULL,
  `recipe_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratings_tbl`
--

CREATE TABLE `ratings_tbl` (
  `ratings_id` int(100) NOT NULL,
  `ratings` int(30) DEFAULT 0,
  `recipe_id` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `recipe_tbl`
--

CREATE TABLE `recipe_tbl` (
  `recipe_id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `difficulty_level` varchar(200) DEFAULT NULL,
  `cuisine` varchar(200) DEFAULT NULL,
  `video` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `mainIngridients` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe_tbl`
--

INSERT INTO `recipe_tbl` (`recipe_id`, `title`, `description`, `type`, `date_created`, `difficulty_level`, `cuisine`, `video`, `image`, `mainIngridients`) VALUES
(21, 'Veggie & Meat Lumpia', 'In this recipe, youll learn how to make Veggie & Meat Lumpia, the best ever recipe! After watching this video, youll be able to make this delicious dish in no time at all!', 'Select Type', '2022-11-18', 'easy ', 'Filipino', '4zzhCbQE5iQ', 'filipino-lumpia.jpg', 'Vegetables'),
(22, 'Souffle pancake', 'Fluffy and Delicious Japanese street food! $1 Cheap ingredients! Easy homemade Souffle pancake! No baking powder.\" \" ', 'AppetizerSnack', '2022-11-18', 'medium ', 'Filipino', 'tBTNMo77h2Q', 'Souffle pancake.jpg', 'Eggs '),
(23, 'Pancake dorayaki', 'Japanese pancake dorayaki, this dorayaki is very delicious, soft and easy to make, the ingredients are very simple anyone can make.\" ', 'Breakfast', '2022-11-22', 'medium ', 'Japanese', '9usdfvpuH6E', 'pancake dorayaki.jpg', 'eggs'),
(24, 'Potato Hot Dogs', 'Crispy on the outside and really soft on the inside!! It is delicious potato cheese hotdog\" ', 'Breakfast', '2022-11-25', 'easy ', 'Japanese', '0TRokMB9AnI', 'mini-hot-dog-rolls.jpg', 'Hot Dogs'),
(25, 'Inspired Rice and Beans', 'Black beans are a good source of fiber, proteins, and vitamins.  Coupling with the fragrant basmati rice, peppers, cilantro, and lemon juice only ensures this meal is both aromatic and healthy at the same time.                      The addition of strained tomatoes, cumin, paprika, and cayenne spices gives this dish the flavor we look for in Mexican-inspired meals.  ➡️ This dish is for sure one of the easiest, most aromatic, and flavorful meals you could quickly fire up from your kitchen. You now have one recipe in your back pocket you could go to whenever you need a Mexican-inspired meal or just to have an excuse to open that can of black beans in the back of your pantry.', 'Breakfast', '2022-11-27', 'medium ', 'Mixican', 'UNMrwudowfg', 'Easy-Rice-and-Red-Beans-Recipe.jpg', 'Vegetables');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'user', 'password', 'ron@gmail.com'),
(41, 'rgb', 'rgb', 'rgb@gmail.com'),
(48, 'admins', 'password', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `FK_comment_tbl` (`user_id`),
  ADD KEY `FK_comments_tbl` (`recipe_id`);

--
-- Indexes for table `directions_tbl`
--
ALTER TABLE `directions_tbl`
  ADD PRIMARY KEY (`directions_id`),
  ADD KEY `FK_directions_tbl` (`recipe_id`);

--
-- Indexes for table `favorites_tbl`
--
ALTER TABLE `favorites_tbl`
  ADD PRIMARY KEY (`favorites_id`),
  ADD KEY `FK_favorites_user_tbl` (`user_id`),
  ADD KEY `FK_favorites_tbl` (`recipe_id`);

--
-- Indexes for table `ingridients_steps_tbl`
--
ALTER TABLE `ingridients_steps_tbl`
  ADD PRIMARY KEY (`ingridients_steps_id`),
  ADD KEY `FK_ingridients_steps_tbl` (`ingridient_id`);

--
-- Indexes for table `ingridient_tbl`
--
ALTER TABLE `ingridient_tbl`
  ADD PRIMARY KEY (`ingridient_id`),
  ADD KEY `FK_ingridient_tbl` (`recipe_id`);

--
-- Indexes for table `log_tbl`
--
ALTER TABLE `log_tbl`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `mycomments_tbl`
--
ALTER TABLE `mycomments_tbl`
  ADD PRIMARY KEY (`userComment_Id`),
  ADD KEY `FK_mycomments_tbl` (`comment_id`),
  ADD KEY `FK_mycomments_tblr` (`ratings_id`);

--
-- Indexes for table `ratings_tbl`
--
ALTER TABLE `ratings_tbl`
  ADD PRIMARY KEY (`ratings_id`),
  ADD KEY `FK_ratings_user_tbl` (`user_id`),
  ADD KEY `FK_ratings_tbl` (`recipe_id`);

--
-- Indexes for table `recipe_tbl`
--
ALTER TABLE `recipe_tbl`
  ADD PRIMARY KEY (`recipe_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `directions_tbl`
--
ALTER TABLE `directions_tbl`
  MODIFY `directions_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `favorites_tbl`
--
ALTER TABLE `favorites_tbl`
  MODIFY `favorites_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ingridients_steps_tbl`
--
ALTER TABLE `ingridients_steps_tbl`
  MODIFY `ingridients_steps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ingridient_tbl`
--
ALTER TABLE `ingridient_tbl`
  MODIFY `ingridient_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `log_tbl`
--
ALTER TABLE `log_tbl`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mycomments_tbl`
--
ALTER TABLE `mycomments_tbl`
  MODIFY `userComment_Id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings_tbl`
--
ALTER TABLE `ratings_tbl`
  MODIFY `ratings_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `recipe_tbl`
--
ALTER TABLE `recipe_tbl`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  ADD CONSTRAINT `FK_comment_tbl` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`user_id`),
  ADD CONSTRAINT `FK_comments_tbl` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_tbl` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `directions_tbl`
--
ALTER TABLE `directions_tbl`
  ADD CONSTRAINT `FK_directions_tbl` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_tbl` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorites_tbl`
--
ALTER TABLE `favorites_tbl`
  ADD CONSTRAINT `FK_favorites_tbl` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_tbl` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_favorites_user_tbl` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`user_id`);

--
-- Constraints for table `ingridients_steps_tbl`
--
ALTER TABLE `ingridients_steps_tbl`
  ADD CONSTRAINT `FK_ingridients_steps_tbl` FOREIGN KEY (`ingridient_id`) REFERENCES `ingridient_tbl` (`ingridient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingridient_tbl`
--
ALTER TABLE `ingridient_tbl`
  ADD CONSTRAINT `FK_ingridient_tbl` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_tbl` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mycomments_tbl`
--
ALTER TABLE `mycomments_tbl`
  ADD CONSTRAINT `FK_mycomments_tblr` FOREIGN KEY (`ratings_id`) REFERENCES `ratings_tbl` (`ratings_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
