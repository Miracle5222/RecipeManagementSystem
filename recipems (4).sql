-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 08:48 AM
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
  `ratings` int(100) DEFAULT NULL,
  `commentStatus` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment_tbl`
--

INSERT INTO `comment_tbl` (`comment_id`, `recipe_id`, `user_id`, `comment`, `comment_date`, `ratings`, `commentStatus`) VALUES
(45, 22, 41, 'asdfsdf', '2023-05-23', 3, NULL),
(46, 22, 1, 'asdfasdf', '2023-05-23', 3, NULL),
(47, 27, 1, 'user nni', '2023-05-23', 3, NULL),
(48, 27, 41, 'fasdfd', '2023-05-23', 4, NULL);

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
-- Table structure for table `likes_tbl`
--

CREATE TABLE `likes_tbl` (
  `likes_id` int(100) NOT NULL,
  `comment_id` int(100) DEFAULT NULL,
  `likesCount` int(100) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes_tbl`
--

INSERT INTO `likes_tbl` (`likes_id`, `comment_id`, `likesCount`, `user_id`) VALUES
(8, 45, 1, 1);

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
  `comment` varchar(250) DEFAULT NULL,
  `likes` varchar(200) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `comment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mycomments_tbl`
--

INSERT INTO `mycomments_tbl` (`userComment_Id`, `comment_id`, `comment`, `likes`, `user_id`, `comment_date`) VALUES
(25, 45, 'asdf', NULL, 1, '2023-05-23'),
(26, 45, 'asdf', NULL, 1, '2023-05-23'),
(27, 45, 'asdf', NULL, 1, '2023-05-23');

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
  `status` varchar(200) DEFAULT NULL,
  `authorName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recipe_tbl`
--

INSERT INTO `recipe_tbl` (`recipe_id`, `title`, `description`, `type`, `date_created`, `difficulty_level`, `cuisine`, `video`, `image`, `mainIngridients`, `videoYou`, `status`, `authorName`) VALUES
(22, 'Souffle pancake', 'Fluffy and Delicious Japanese street food! $1 Cheap ingredients! Easy homemade Souffle pancake! No baking powder.\" \" ', 'AppetizerSnack', '2022-11-18', 'medium ', 'Filipino', 'tBTNMo77h2Q', 'Souffle pancake.jpg', 'Eggs ', NULL, 'Active', NULL),
(23, 'Pancake dorayaki', 'Japanese pancake dorayaki, this dorayaki is very delicious, soft and easy to make, the ingredients are very simple anyone can make.\" ', 'Breakfast', '2022-11-22', 'medium ', 'Japanese', '9usdfvpuH6E', 'pancake dorayaki.jpg', 'eggs', NULL, 'Active', NULL),
(24, 'Potato Hot Dogs', 'Crispy on the outside and really soft on the inside!! It is delicious potato cheese hotdog\" ', 'Breakfast', '2022-11-25', 'easy ', 'Japanese', '0TRokMB9AnI', 'mini-hot-dog-rolls.jpg', 'Hot Dogs', NULL, 'Active', NULL),
(25, 'Inspired Rice and Beans', 'Black beans are a good source of fiber, proteins, and vitamins.  Coupling with the fragrant basmati rice, peppers, cilantro, and lemon juice only ensures this meal is both aromatic and healthy at the same time.                      The addition of strained tomatoes, cumin, paprika, and cayenne spices gives this dish the flavor we look for in Mexican-inspired meals.  ➡️ This dish is for sure one of the easiest, most aromatic, and flavorful meals you could quickly fire up from your kitchen. You now have one recipe in your back pocket you could go to whenever you need a Mexican-inspired meal or just to have an excuse to open that can of black beans in the back of your pantry.', 'Breakfast', '2022-11-27', 'medium ', 'Mixican', 'UNMrwudowfg', 'Easy-Rice-and-Red-Beans-Recipe.jpg', 'Vegetables', NULL, 'Active', NULL),
(26, 'Dolsot bibimbap & Bibimbap', 'Bibimbap and Dolsot Bibimbap are traditional Korean dishes that consist of rice topped with various vegetables, meat, and a fried egg, often served with a spicy chili paste sauce.  Dolsot Bibimbap is prepared in a hot stone bowl that is heated until it sizzles, giving the rice a crispy texture on the bottom. The dish is then mixed together before eating, creating a flavorful and filling meal.  Bibimbap, on the other hand, is typically served in a regular bowl and mixed together before eating. Both dishes can be customized to suit individual tastes, with a variety of vegetables, meats, and sauces available to choose from. Bibimbap is a staple dish in Korean cuisine, enjoyed by locals and tourists alike.', 'Lunch', '2023-04-25', 'medium ', 'Korean', 'aj9_FPyLT2Y', 'Dolsot-Bibimbap-500x375.jpg', 'Vegetables', NULL, 'Active', NULL),
(27, ' Katsudon', 'Katsudon is a popular Japanese dish consisting of a breaded and deep-fried pork cutlet (tonkatsu) that is simmered in a sweet and savory sauce with onions and eggs, then served over a bed of steamed rice. The dish is typically garnished with green onions and sesame seeds and can be enjoyed for any meal of the day. Katsudon is a hearty and flavorful dish that is easy to prepare and enjoyed by many in Japan and around the world.\" ', 'Breakfast', '2023-04-25', 'medium ', 'Japanese', 'kV4Aw6MpoSU', 'katsudon-2031259-hero-01-eaeaad239007461ab5fdb909bcf52c76.jpg', 'Beef', NULL, 'Active', NULL),
(53, 'egg log', 'asdfsdf', 'Breakfast', '2023-05-23', 'easy ', 'Filipino', '', 'm1.png', 'SeaFood', 'name.mp4', 'Active', 'Joan');

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

--
-- Dumping data for table `userrecipe_tbl`
--

INSERT INTO `userrecipe_tbl` (`userRecipeId`, `recipe_id`, `user_id`, `recipeStatus`) VALUES
(12, 53, 1, 'Active');

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
(64, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(65, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(66, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(67, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(68, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(69, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(70, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(71, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(72, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(73, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(74, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(75, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(76, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(77, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(78, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(79, 23, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(80, 23, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(81, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(82, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(83, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(84, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(85, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(86, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(87, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(88, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(89, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(90, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(91, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(92, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(93, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(94, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(95, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(96, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(97, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(98, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(99, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(100, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(101, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(102, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(103, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(104, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(105, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(106, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(107, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(108, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(109, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(110, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(111, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(112, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(113, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(114, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(115, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(116, 23, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(117, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(118, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(119, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(120, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(121, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(122, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(123, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(124, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(125, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(126, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(127, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(128, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(129, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(130, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(131, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(132, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(133, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(134, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(135, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(136, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(137, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(138, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(139, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(140, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(141, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(142, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(143, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(144, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(145, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(146, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(147, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(148, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(149, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(150, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(151, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(152, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(153, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(154, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(155, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(156, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(157, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(158, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(159, 26, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(160, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(161, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(162, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(163, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(164, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(165, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(166, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(167, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(168, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(169, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(170, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(171, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(172, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(173, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(174, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(175, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(176, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(177, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(178, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(179, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(180, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(181, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(182, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(183, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(184, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(185, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(186, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(187, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(188, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(189, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(190, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(191, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(192, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(193, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(194, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(195, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(196, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(197, 26, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(198, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(199, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(200, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(201, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(202, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(203, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(204, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(205, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(206, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(207, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(208, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(209, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(210, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(211, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(212, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(213, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(214, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(215, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(216, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(217, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(218, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(219, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(220, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(221, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(222, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(223, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(224, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(225, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(226, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(227, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(228, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(229, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(230, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(231, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(232, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(233, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(234, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(235, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(236, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(237, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(238, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(239, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(240, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(241, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(242, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(243, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(244, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(245, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(246, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(247, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(248, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(249, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(250, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(251, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(252, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(253, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(254, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(255, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(256, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(257, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(258, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(259, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(260, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(261, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(262, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(263, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(264, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(265, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(266, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(267, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(268, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(269, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(270, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(271, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(272, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(273, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(274, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(275, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(276, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(277, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(278, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(279, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(280, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(281, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(282, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(283, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(284, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(285, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(286, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(287, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(288, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(289, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(290, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(291, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(292, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(293, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(294, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(295, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(296, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(297, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(298, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(299, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(300, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(301, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(302, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(303, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(304, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(305, 23, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(306, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(308, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(309, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(310, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(311, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(312, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(313, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(314, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(315, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(316, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(317, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(318, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(319, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(320, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(321, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(322, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(323, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(324, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(325, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(326, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(327, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(328, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(329, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(330, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(331, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(332, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(333, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(334, 26, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(335, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(336, 25, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(337, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(338, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(339, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(340, 23, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(341, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(342, 25, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(343, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(344, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(345, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(346, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(347, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(348, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(349, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(350, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(351, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(352, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(353, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(354, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(355, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(356, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(357, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(358, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(359, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(360, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(361, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(362, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(363, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(364, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(365, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(366, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(367, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(368, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(369, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(370, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(371, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(372, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(373, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(374, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(375, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(376, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(377, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(378, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(379, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(380, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(381, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(382, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(383, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(384, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(385, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(386, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(387, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(388, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(389, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(390, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(391, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(392, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(393, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(394, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(395, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(396, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(397, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(398, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(399, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(400, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(401, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(402, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(403, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(404, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(405, 23, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(406, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(407, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(408, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(409, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(410, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(411, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(412, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(413, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(414, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(415, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(416, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(417, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(418, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(419, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(420, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(421, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(422, 25, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(423, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(424, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(425, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(426, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(427, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(428, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(429, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(430, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(431, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(432, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(433, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(434, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(435, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(436, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(437, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(438, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(439, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(440, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(441, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(442, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(443, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(444, 25, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(445, 25, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(446, 23, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(447, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(448, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(449, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(450, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(451, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(452, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(453, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(454, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(455, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(456, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(457, 23, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(458, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(459, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(460, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(461, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(462, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(463, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(464, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(465, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(466, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(467, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(468, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(469, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(470, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(471, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(472, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(473, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(474, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(475, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(476, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(477, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(478, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(479, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(480, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(481, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(482, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(483, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(484, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(485, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(486, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(487, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(488, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(489, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(490, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(491, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(492, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(493, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(494, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(495, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(496, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(497, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(498, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(499, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(500, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(501, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(502, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(503, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(504, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(505, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(506, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(507, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(508, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(509, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(510, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(511, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(512, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(513, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(514, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(515, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(516, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(517, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(518, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(519, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(520, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(521, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(522, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(523, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(524, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(525, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(526, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(527, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(528, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(529, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(530, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(531, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(532, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(533, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(534, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(535, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(536, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(537, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(538, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(539, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(540, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(541, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(542, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(543, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(544, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(545, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(546, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(547, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(548, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(549, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(550, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(551, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(552, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(553, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(554, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(555, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(556, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(557, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(558, 24, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(559, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(560, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(561, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(562, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(563, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(564, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(565, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(566, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(567, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(568, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(569, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(570, 22, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(571, 24, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(572, 23, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(573, 25, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(574, 26, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(575, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(576, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(577, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(578, 27, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(579, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(580, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(581, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(582, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(583, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(584, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(585, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(586, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(587, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(588, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(589, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(590, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(591, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(592, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(593, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(594, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(595, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(596, 53, 1, '906718842d0ea2d44b37b7fa4f87b8c4'),
(597, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(598, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(599, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(600, 53, 1, 'c2e8770a57bb05f02fa99fc10237a511'),
(601, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(602, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(603, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(604, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(605, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(606, 25, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(607, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(608, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(609, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(610, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(611, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(612, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(613, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(614, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(615, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(616, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(617, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(618, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(619, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(620, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(621, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(622, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(623, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(624, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(625, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(626, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(627, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(628, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(629, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(630, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(631, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(632, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(633, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(634, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(635, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(636, 22, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(637, 24, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(638, 23, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(639, 25, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(640, 53, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(641, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(642, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(643, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(644, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(645, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(646, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(647, 27, 1, '3416a75f4cea9109507cacd8e2f2aefc'),
(648, 53, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(649, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(650, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(651, 27, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(652, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(653, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(654, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(655, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(656, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(657, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(658, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(659, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(660, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(661, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(662, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(663, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(664, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(665, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(666, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(667, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(668, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(669, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(670, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(671, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(672, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(673, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(674, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(675, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(676, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(677, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(678, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(679, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(680, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(681, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(682, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(683, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(684, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(685, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(686, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(687, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(688, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(689, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(690, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b'),
(691, 22, 1, 'c4ca4238a0b923820dcc509a6f75849b');

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
-- Indexes for table `likes_tbl`
--
ALTER TABLE `likes_tbl`
  ADD PRIMARY KEY (`likes_id`),
  ADD KEY `FK_likes_tbl` (`comment_id`);

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
  ADD KEY `FK_mycomments_tbl` (`comment_id`);

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
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
-- AUTO_INCREMENT for table `likes_tbl`
--
ALTER TABLE `likes_tbl`
  MODIFY `likes_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_tbl`
--
ALTER TABLE `log_tbl`
  MODIFY `log_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mycomments_tbl`
--
ALTER TABLE `mycomments_tbl`
  MODIFY `userComment_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ratings_tbl`
--
ALTER TABLE `ratings_tbl`
  MODIFY `ratings_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `recipe_tbl`
--
ALTER TABLE `recipe_tbl`
  MODIFY `recipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `userrecipe_tbl`
--
ALTER TABLE `userrecipe_tbl`
  MODIFY `userRecipeId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `views_tbl`
--
ALTER TABLE `views_tbl`
  MODIFY `views_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=692;

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
-- Constraints for table `likes_tbl`
--
ALTER TABLE `likes_tbl`
  ADD CONSTRAINT `FK_likes_tbl` FOREIGN KEY (`comment_id`) REFERENCES `comment_tbl` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mycomments_tbl`
--
ALTER TABLE `mycomments_tbl`
  ADD CONSTRAINT `FK_mycomments_tbl` FOREIGN KEY (`comment_id`) REFERENCES `comment_tbl` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
