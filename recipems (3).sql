-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 09:29 AM
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
(25, 22, 1, 'fdf', '2022-11-26', 2),
(29, 22, 1, 'nice', '2022-11-26', 1),
(32, 22, 48, 'type', '2022-11-26', 1),
(33, 22, 48, 'yes sir', '2022-11-27', 5),
(34, 22, 48, 'sogoi', '2022-11-29', 5),
(35, 22, 1, 'nice', '2023-05-14', 1);

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
(4, 22, '3', 'All the way low heat, about 5 minutes on each side, you can either add a small spoonful of water or not.                                                    '),
(5, 26, '1', 'Rinse the rice and cook according to package instructions. Once cooked, let it cool for 5-10 minutes.'),
(6, 26, '2', 'Cut the beef into thin slices and marinate with soy sauce, sesame oil, and pepper for at least 30 minutes.'),
(7, 26, '3', 'Prepare the vegetables by blanching them in boiling water for 1-2 minutes. Rinse them in cold water and drain well.'),
(8, 26, '4', 'Preheat the dolsot (Korean stone bowl) on the stovetop over medium heat for 5-7 minutes.'),
(9, 26, '5', 'Add a tablespoon of vegetable oil to the hot dolsot and swirl it around to coat the bottom.'),
(10, 26, '6', 'Place a layer of cooked rice in the bottom of the dolsot, followed by the marinated beef and vegetables on top.'),
(11, 26, '7', 'Cover the dolsot with a lid and cook for 5-7 minutes, or until the rice on the bottom is crispy and brown.'),
(12, 26, '8', 'Crack an egg over the top of the rice and cook for an additional 2-3 minutes.'),
(13, 26, '9', 'Serve the dolsot bibimbap hot with gochujang sauce on the side.'),
(14, 27, '1', 'Start by tenderizing your pork by adding shallow cuts along where the meat attaches to the fat - use a tenderizing hammer or similar gadget to make small holes in the pork (or a fork) - this will prevent your tonkatsu from curling up'),
(15, 27, '2', 'Then season your pork on both sides with salt and pepper'),
(16, 27, '3', 'Once seasoned, coat in flour - wipe off the excess, dip in a beaten egg and then cover in panko - press down firmly to make sure all the pork is covered'),
(17, 27, '4', 'Heat a pot or frying pan with cooking oil (I used rice oil) - enough to cover the meat. Once the oil reaches 160°C or 320°F add your pork - try not to move the pork around too much or the breading may fall apart.'),
(18, 27, '5', 'Cook for around 3 minutes or until golden brown, try to keep the temperature around the same while frying, then flip the pork and fry again for another 3 minutes'),
(19, 27, '6', ' Once the katsu is nice and golden brown take out and let rest on a rack - place the tonkatsu standing so the fat drips off '),
(20, 27, '7', 'While the katsu is resting, prepare ¼ of an onion into slices and optionally thinly slice some negi green onion and mitsuba (japanese parsley)'),
(21, 27, '8', 'Once the egg is starting to set but still a little a little bit runny use a spatula to make sure its not stuck and then gently place it on a bowl of rice!');

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
(1, 24, 10),
(1, 25, 11);

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
(53, '7 oz beef   ', 26),
(54, '7 oz radish', 26),
(55, '4 oz soy bean sprouts ', 26),
(56, '3 oz spinach  ', 26),
(57, '1/2 carrot  ', 26),
(58, '1/2 zucchini  ', 26),
(59, '2 eggs', 26),
(60, '1 inch thick pork shoulder slice', 27),
(61, 'flour (around 3 tbsp)', 27),
(62, '1 beaten egg ', 27),
(63, ' panko (enough to cover the pork) ', 27),
(64, '(alternatively you can use 2 tsp water and 1 tsp cooking oil to make a batter for your tonkatsu) Oil for frying (I used rice oil)', 27),
(65, '¼ Onion ', 27),
(66, 'Green Onion (Japanese Negi - about an inch)', 27),
(67, 'Mitsuba (Japanese Parsley - this is optional though!)', 27);

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
  `mainIngridients` varchar(200) DEFAULT NULL,
  `videoYou` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe_tbl`
--

INSERT INTO `recipe_tbl` (`recipe_id`, `title`, `description`, `type`, `date_created`, `difficulty_level`, `cuisine`, `video`, `image`, `mainIngridients`, `videoYou`, `status`) VALUES
(22, 'Souffle pancake', 'Fluffy and Delicious Japanese street food! $1 Cheap ingredients! Easy homemade Souffle pancake! No baking powder.\" \" ', 'AppetizerSnack', '2022-11-18', 'medium ', 'Filipino', 'tBTNMo77h2Q', 'Souffle pancake.jpg', 'Eggs ', NULL, 'Active'),
(23, 'Pancake dorayaki', 'Japanese pancake dorayaki, this dorayaki is very delicious, soft and easy to make, the ingredients are very simple anyone can make.\" ', 'Breakfast', '2022-11-22', 'medium ', 'Japanese', '9usdfvpuH6E', 'pancake dorayaki.jpg', 'eggs', NULL, 'Active'),
(24, 'Potato Hot Dogs', 'Crispy on the outside and really soft on the inside!! It is delicious potato cheese hotdog\" ', 'Breakfast', '2022-11-25', 'easy ', 'Japanese', '0TRokMB9AnI', 'mini-hot-dog-rolls.jpg', 'Hot Dogs', NULL, 'Active'),
(25, 'Inspired Rice and Beans', 'Black beans are a good source of fiber, proteins, and vitamins.  Coupling with the fragrant basmati rice, peppers, cilantro, and lemon juice only ensures this meal is both aromatic and healthy at the same time.                      The addition of strained tomatoes, cumin, paprika, and cayenne spices gives this dish the flavor we look for in Mexican-inspired meals.  ➡️ This dish is for sure one of the easiest, most aromatic, and flavorful meals you could quickly fire up from your kitchen. You now have one recipe in your back pocket you could go to whenever you need a Mexican-inspired meal or just to have an excuse to open that can of black beans in the back of your pantry.', 'Breakfast', '2022-11-27', 'medium ', 'Mixican', 'UNMrwudowfg', 'Easy-Rice-and-Red-Beans-Recipe.jpg', 'Vegetables', NULL, 'Active'),
(26, 'Dolsot bibimbap & Bibimbap', 'Bibimbap and Dolsot Bibimbap are traditional Korean dishes that consist of rice topped with various vegetables, meat, and a fried egg, often served with a spicy chili paste sauce.  Dolsot Bibimbap is prepared in a hot stone bowl that is heated until it sizzles, giving the rice a crispy texture on the bottom. The dish is then mixed together before eating, creating a flavorful and filling meal.  Bibimbap, on the other hand, is typically served in a regular bowl and mixed together before eating. Both dishes can be customized to suit individual tastes, with a variety of vegetables, meats, and sauces available to choose from. Bibimbap is a staple dish in Korean cuisine, enjoyed by locals and tourists alike.', 'Lunch', '2023-04-25', 'medium ', 'Korean', 'aj9_FPyLT2Y', 'Dolsot-Bibimbap-500x375.jpg', 'Vegetables', NULL, 'Active'),
(27, ' Katsudon', 'Katsudon is a popular Japanese dish consisting of a breaded and deep-fried pork cutlet (tonkatsu) that is simmered in a sweet and savory sauce with onions and eggs, then served over a bed of steamed rice. The dish is typically garnished with green onions and sesame seeds and can be enjoyed for any meal of the day. Katsudon is a hearty and flavorful dish that is easy to prepare and enjoyed by many in Japan and around the world.\" ', 'Breakfast', '2023-04-25', 'medium ', 'Japanese', 'kV4Aw6MpoSU', 'katsudon-2031259-hero-01-eaeaad239007461ab5fdb909bcf52c76.jpg', 'Beef', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `userrecipe_tbl`
--

CREATE TABLE `userrecipe_tbl` (
  `userRecipeId` int(100) NOT NULL,
  `recipe_id` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `recipeStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `views_tbl`
--

CREATE TABLE `views_tbl` (
  `views_id` int(255) NOT NULL,
  `recipe_id` int(255) DEFAULT NULL,
  `views` int(255) DEFAULT NULL,
  `users` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `views_tbl`
--

INSERT INTO `views_tbl` (`views_id`, `recipe_id`, `views`, `users`) VALUES
(19, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(20, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(21, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(22, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(23, 26, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(24, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(25, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(33, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(35, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(36, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(37, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(38, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(41, 24, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(45, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(46, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(47, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(48, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(49, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(50, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(51, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(52, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(53, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(54, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(55, 26, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(56, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(57, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(58, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(59, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(60, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(61, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511');

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
-- Indexes for table `userrecipe_tbl`
--
ALTER TABLE `userrecipe_tbl`
  ADD PRIMARY KEY (`userRecipeId`),
  ADD KEY `FK_userrecipe_tbl` (`recipe_id`),
  ADD KEY `FK_userrecipe_tbls` (`user_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `views_tbl`
--
ALTER TABLE `views_tbl`
  ADD PRIMARY KEY (`views_id`),
  ADD KEY `FK_views_tbl` (`recipe_id`);

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
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `directions_tbl`
--
ALTER TABLE `directions_tbl`
  MODIFY `directions_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `favorites_tbl`
--
ALTER TABLE `favorites_tbl`
  MODIFY `favorites_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ingridients_steps_tbl`
--
ALTER TABLE `ingridients_steps_tbl`
  MODIFY `ingridients_steps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ingridient_tbl`
--
ALTER TABLE `ingridient_tbl`
  MODIFY `ingridient_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

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
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `userrecipe_tbl`
--
ALTER TABLE `userrecipe_tbl`
  MODIFY `userRecipeId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `views_tbl`
--
ALTER TABLE `views_tbl`
  MODIFY `views_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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

--
-- Constraints for table `userrecipe_tbl`
--
ALTER TABLE `userrecipe_tbl`
  ADD CONSTRAINT `FK_userrecipe_tbl` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_tbl` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_userrecipe_tbls` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `views_tbl`
--
ALTER TABLE `views_tbl`
  ADD CONSTRAINT `FK_views_tbl` FOREIGN KEY (`recipe_id`) REFERENCES `recipe_tbl` (`recipe_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
