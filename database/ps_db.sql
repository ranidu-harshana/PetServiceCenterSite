-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 11:28 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ps_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstname`, `lastname`, `email`, `password`, `created_at`) VALUES
(4, 'Main', 'Admin', 'admin@gmail.com', '$2y$12$KnY8shMFmOX1ANC1X78vbexDWO8RDlpSYjm8RkqKcofLj5a/7L7jq', '2021-09-04 13:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(4) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(200) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `customer_mobile` varchar(20) NOT NULL,
  `customer_image` varchar(255) NOT NULL,
  `customer_longitude` double NOT NULL,
  `customer_latitude` double NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_address`, `gender`, `customer_mobile`, `customer_image`, `customer_longitude`, `customer_latitude`, `customer_password`, `created_at`, `status`) VALUES
(1, 'Customer1', 'user1@gmail.com', '98 Maliban Street, 11', 1, '94778965214', '1.jpg', 79.861243, 7.09115, '$2y$12$t7SB0AnSQ3E9mQvC8LceKu4B9jxjSMnHf6egNMmIve8DLRJKgTuIS', '2021-11-05 18:52:51', 1),
(2, 'Customer2', 'user2@gmail.com', '47 3rd Cross Ln Borupana Ratmalana', 1, '94776006495', '1.jpg', 79.999634, 7.09115, '$2y$12$UJjqpiWqFvO4WOsSYMeS.u9EuHyPqCUDnLNhbXhusVKUHscKjx5PG', '2021-11-05 19:23:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Random Visitor 1', 'visitor@gmail.com', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ips', '2021-11-05 20:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `pet_shop`
--

CREATE TABLE `pet_shop` (
  `ps_id` int(10) NOT NULL,
  `ps_name` varchar(100) NOT NULL,
  `ps_email` varchar(100) NOT NULL,
  `ps_profile_title` varchar(255) NOT NULL,
  `ps_about` text NOT NULL,
  `ps_address` varchar(100) NOT NULL,
  `ps_mobNo` varchar(12) NOT NULL,
  `ps_image` varchar(255) NOT NULL,
  `ps_brpp` int(4) NOT NULL,
  `ps_petCount` int(4) NOT NULL,
  `ps_petType` varchar(255) NOT NULL,
  `ps_password` varchar(255) NOT NULL,
  `ps_longitude` double DEFAULT NULL,
  `ps_latitude` double DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_shop`
--

INSERT INTO `pet_shop` (`ps_id`, `ps_name`, `ps_email`, `ps_profile_title`, `ps_about`, `ps_address`, `ps_mobNo`, `ps_image`, `ps_brpp`, `ps_petCount`, `ps_petType`, `ps_password`, `ps_longitude`, `ps_latitude`, `created_at`, `status`) VALUES
(1, 'Pet Shop1', 'petshop1@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '25/1 Sumner Place, 08', '94779683265', '1.jpg', 23, 3, 'Dog, Cat', '$2y$12$uqykpG9sX4K2WHn6rerRE.WPYdgqvxqQnB1ELvJwDzIjJw9yyi3Iq', 79.861864, 6.927035, '2021-11-05 18:39:34', 1),
(2, 'Pet Shop2', 'petshop2@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '25/1 Sumner Place, 08', '94778956523', '2.jpg', 34, 2, 'Dog, Cat', '$2y$12$fxOs8TM5XUUHAKa0zI1hN.q5CsHGURdvphyNn3nOeM9j593IMIbBO', 79.999843, 7.091098, '2021-11-05 18:42:41', 1),
(3, 'Pet Shop3', 'petshop3@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '25/1 Sumner Place, 08', '94778523695', '3.jpg', 23, 1, 'Dog, Cat', '$2y$12$ZvW3JgQ7u2O4xh1sZdcR/uWBKjE1dJcy69DbYE/ZaWmgOjW1ZZkYS', 80.000192, 7.091263, '2021-11-05 18:43:52', 0),
(4, 'Pet Shop4', 'petshop4@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '25/1 Sumner Place, 08', '94702589865', '4.jpg', 32, 2, 'Dog, Cat', '$2y$12$l7Sqzc/TddqUBToNj1tyku6YHcj54o6/QURbPIatYK2rFmFGEq.NG', 79.999428, 7.091063, '2021-11-05 18:44:44', 1),
(6, 'Pet Shop5', 'petshop5@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '25/1 Sumner Place, 08', '94758966523', '5.jpg', 43, 4, 'Dog, Cat', '$2y$12$GaOPgMbwwWiJzep6oi6r3.7Nzdq9c6PI7yq.9kFuffwuW6P/CUu6O', 79.997544, 7.092517, '2021-11-05 18:47:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pet_sitter`
--

CREATE TABLE `pet_sitter` (
  `dc_id` int(10) NOT NULL,
  `dc_name` varchar(100) NOT NULL,
  `dc_email` varchar(100) NOT NULL,
  `dc_profile_title` varchar(255) NOT NULL,
  `dc_about` text NOT NULL,
  `dc_address` varchar(100) NOT NULL,
  `dc_mobNo` varchar(12) NOT NULL,
  `dc_image` varchar(255) NOT NULL,
  `dc_brpp` int(4) NOT NULL,
  `dc_petCount` int(4) NOT NULL,
  `dc_petType` varchar(255) NOT NULL,
  `dc_password` varchar(255) NOT NULL,
  `dc_longitude` double DEFAULT NULL,
  `dc_latitude` double DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pet_sitter`
--

INSERT INTO `pet_sitter` (`dc_id`, `dc_name`, `dc_email`, `dc_profile_title`, `dc_about`, `dc_address`, `dc_mobNo`, `dc_image`, `dc_brpp`, `dc_petCount`, `dc_petType`, `dc_password`, `dc_longitude`, `dc_latitude`, `created_at`, `status`) VALUES
(1, 'Pet Sitter1', 'petsitter1@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '96 Bazaar Street, TR', '94776005698', '1.jpg', 23, 3, 'Dog, Cat', '$2y$12$QoUl4ehHUMU4lkCNhDxD1uV0WdX/Ou3qEvJnkngGV8wFq3J/y5TzW', 79.861243, 6.9270786, '2021-11-05 21:07:27', 1),
(2, 'Pet Sitter2', 'petsitter2@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '96 Bazaar Street, TR', '94756325789', '2.jpg', 23, 3, 'Dog, Cat', '$2y$12$f5hFijJEwwmW.wLXRfmrEOEFOASH7k34/H2Xpqv43u.d6WywK5/Vi', 79.861243, 6.9270786, '2021-11-05 21:08:25', 0),
(3, 'Pet Sitter3', 'petsitter3@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '96 Bazaar Street, TR', '94756321548', '3.jpg', 54, 1, 'Dog, Cat', '$2y$12$WoRz8MB2NDojzax5Oa/l4udCDl4vhohk4PITIqvyInE2Xclvi88OS', 79.861243, 6.9270786, '2021-11-05 21:09:16', 1),
(4, 'Pet Sitter4', 'petsitter4@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '96 Bazaar Street, TR', '94756321458', '4.jpg', 32, 3, 'Dog, Cat', '$2y$12$pwPj4Yo/DJMQPZmS88qhaeuoUTy4QZ1BE0nC1c3cNdrbalsinSteS', 79.861243, 6.9270786, '2021-11-05 21:10:04', 0),
(5, 'Pet Sitter5', 'petsitter5@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '96 Bazaar Street, TR', '94756982158', '5.jpg', 23, 1, 'Dog, Cat', '$2y$12$9jktObbfn.0xntL0Z009EOMzHvx7vgQuly7Ki4LqVe6sjjhJhZmeO', 79.861243, 6.9270786, '2021-11-05 21:10:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(4) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_image` varchar(100) NOT NULL,
  `post_author` varchar(100) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_content`, `post_image`, `post_author`, `tags`, `created_at`, `status`) VALUES
(1, 'How to Keep your Rabbits Cool in Summer', 'The summer has arrived and while many of us are enjoying the wonderful hot weather of the season, our pets may not be enjoying it quite so much.\n\nRabbits in particular are vulnerable to heat stroke and rely on their owners to provide them with cooler conditions during the summer months. Wild rabbits go underground or hide under shrubs and bushes to keep cool, so here we look at how, as pet owners, we can help in keeping rabbits cool in the hot weather.\n\nGive your Rabbit Plenty of Shade\n\nKeep your rabbit hutch out of direct sunlight as much as possible. Metal hutches in particular can warm up very quickly and will retain the heat throughout the day. Placing your hutch in a shaded area of your garden is ideal, preferably under a tree or large bush in order to allow some light to shine through, whilst protecting your rabbits from intense heat.  If you are unable to move your hutch, then try placing a large sun umbrella close by. This will help to break up the intensity of the sunlight.\n\nThe same applies to your rabbit run, as they are mostly made of wire mesh and are completely exposed to the sun\'s harmful rays.  A lightweight cover that allows the wind to circulate and keep it ventilated, but also offers shelter from the sun, will ensure they can enjoy their exercise time without overheating.\n\nTry placing some ceramic or slate tiles inside the rabbit hutch. They are a cold material and your rabbits will like the cooling feeling against their body as they lie on top. A tunnel or hideaway is also a great idea for inside the hutch, perfect for an extra layer of shade.\n\n \n\nOffer your Rabbit Fresh, Cool Water\n\nA fresh supply of water is always essential and this should be replenished at regular intervals throughout the day during the summer months.  A combination of water bowls and bottles will give your rabbit access to plenty of liquids and you may find that they even enjoy lying in the bowls when the weather is extremely hot.\n\nAdding ice-cubes to the water bowl will offer some cooling relief, as will offering a supply of fresh vegetables. These naturally contain a large amount of water and your rabbit will enjoy munching on them during those long hot days, whilst being kept hydrated at the same time.\n\n \n\nKeep Flies at Bay\n\nFlies are perhaps the most annoying thing about summer!  They are the most persistent of creatures that can drive us to distraction and unfortunately, they have the same effect on our rabbits.\n\nFlies can cause serious harm if they lay eggs on your rabbit, so keeping them away from your rabbit hutch is vital.  Scrupulous hygiene is essential and only regular cleaning of your pets bedding and litter will help keep these critters away.  If you see flies around your rabbit hutch consider hanging some flypaper nearby (out of your rabbits reach) and check your pet regularly for any signs of infestation. Keeping your rabbit groomed and removing excess hair will not only help to keep them cooler in the heat, but it will also give flies less places to lay their eggs.', 'shutterstock_57742570.jpg', 'Ranidu Harshana', 'dasdasdas', '2021-09-21 21:22:30', 0),
(3, 'The Best Outdoor Dog Kennels', 'A tortoise is a wonderful pet to have, but like all exotic creatures they have specific needs and some basic requirements that must be met in order to keep them happy and healthy.\r\n\r\nIf cared for properly a tortoise will have a very long lifespan, with many living to be over 100 years old. This is why, before taking one of these delightful pets into your home, you should consider that it will most likely be a lifelong commitment and they may well outlive you!\r\n\r\nWhen deciding whether or not a tortoise is right for you, you should think about where it will live, what conditions it will need and how much time and attention you will need to provide.\r\n\r\n\r\nWhat essentials do I need?\r\n\r\nBegin by collecting all of the equipment that you will need for looking after a tortoise. If you are starting to build the perfect care kit for a tortoise or terrapin, we\'d recommend the following:\r\n\r\nVivexotic Viva Tortoise Table - 90cm x 45cm x 21.5cm\r\nExo Terra Reptile Feeding Dish\r\nHabistat Hamp Substrate\r\nExo Terra Dial Thermometer\r\nExo Terra Glow Light & Reflector\r\nExo Terra Mercury Vapour Solar Glo Lamp\r\nExo Terra Heat Mat\r\n \r\nHow do I house a tortoise?\r\n\r\nThe right tortoise house is essential and sadly many tortoises do not thrive in a classic Vivarium style enclosure. Fortunately, we offer a number of habitats that are more than suitable for tortoises and terrapins.\r\n\r\nUnlike a standard reptile vivarium, the Vivexotic Viva Tortoise Table has been designed specifically for tortoises and features a removable tray, a play area and a stand.  The base of the pen has a metal skirt, which will prevent your tortoise from climbing and falling onto its back. The top of the pen has a table area where light and heat lamps can be fitted and the base tray is removable so that you can use this pen outdoors, placing it directly onto the grass.\r\n\r\nThe tortoise table is quick and easy to set up, but if you need a little bit of help putting it together here is a helpful instructional video.', 'tortoise-2.jpg', 'Ranidu Harshana', 'sdadasd', '2021-09-21 21:25:50', 1),
(65, 'Complete Bearded Dragon Care Guide', 'Like owning any pet, getting a Bearded Dragon is a great responsibility, and not something you should even consider doing unless you are 100% informed and completely prepared to care for and look after these animals. There are many things you ought to take into account before getting a new pet – including your lifestyle, income, and number of household members – but assuming you\'ve considered it and are still adamant about giving one of these beautiful Australian reptiles a new home, this Complete Bearded Dragon Care Guide will provide you with everything you need to know.\n\nWhat Do Bearded Dragons Eat?\nbearded-dragon-314833_1280The first thing you should know, before you even think about how you\'re going to house them, is what do Bearded Dragons eat? The good news is that, like humans, bearded dragons eat both animals and plants. The bad news is you have to be very careful about the size of the food you give it.\nAs a rule, whatever food you give these omnivorous creatures must be smaller than the space between their eyes. Providing them with food that is larger than this may possibly result in a number of possible conditions, including impaction (a blockage of the digestive tract) and hind-leg paralysis; both of which are incredibly unpleasant.', 'bearded-dragon-314833_1280-1024x682.jpg', 'Ranidu Harshana', 'd', '2021-09-23 17:25:43', 1),
(66, 'How To Prevent Pet Theft', 'You probably did not know this, but last week was Pet Theft Awareness week; which is funny considering apparently no one was aware of it. Despite its lack of publicity, we feel that all pet owners should be well aware that pet theft does happen, and by no means is it an uncommon occurrence. Statistics suggest that around 2,000,000 dogs are stolen each year in the USA, and even though the average number of pet thefts reported in the UK is only around 4,000, it\'s clear that it is still a very big issue.\n\nbernese-mountain-dog-111878_1280\n\nPets that are stolen tend to be sold to laboratories that use them for testing new products, which is why preventing pet theft is an important part of pet ownership and it is essential that you take every precaution. There are lots of things you can do to prevent pet theft and most of them are incredibly simple and easy to do, however the most helpful thing you can do is spread awareness of pet theft and ensure that your neighbours and loved ones know that it is something they should keep an eye out for.\n\nApart from spreading awareness, the following things should help you to ensure your beloved pets are safe and will not fall victim to petnappers:\n\nDon\'t leave your pet tied up outside shops for any prolonged period of time, and if you have to leave them outside make sure that their lead cannot easily slide up over the top of the post.\nFor health reasons, you should never really leave your pet locked up in a car; but another reason why you should think twice about doing so is that it is easy for pet thieves to break into your car and whisk them away. A pet locked in a car is a sitting duck.\nMake sure that your pet has a collar with an ID tag and your contact details on, so that it is not confused for a stray. We recommend that you never include your pet\'s name on their ID tag.\nRegularly take photos of your pet from various angles (for missing posters) and focus on any distinguishing marks or characteristics. It\'s also a good idea to take photos of yourself with your pet to prove that they are yours.\nNever rely on strangers to care for your pet whilst you are away, always use a reputable kennel or pet boarding house.\nIt may be a hassle, but try to vary the time at which you take your dog for a walk and alternate the routes you take. Some dognappers will try to steal your pet when they know they are out of the home, and regimented behaviour makes it a lot easier for pet thieves to anticipate your movements.\nEven if it\'s just outside in the garden, never let your pet out of your site.\nDo not let your pet outdoors when you are not at home.\nKeep animals on a lead when you\'re taking them for a walk.\nMicrochip your pet so that you can be identified and contacted if they are found.\nIt\'s ok to let people interact with your pet, but if they start asking too many questions about it (particularly its name and gender) you should start to become suspicious.\n\nTrying to follow these precautions as much as you can should help to prevent your pet from being stolen, but nothing is foolproof and there is always a chance that a particularly cunning pet thief will succeed in stealing your pet. If this should happen you ought to do the following:\nReport the theft immediately. If you are certain your pet has been stolen, and is not just missing, make that very clear to the police.\nAsk your neighbours or anyone else around at the time of the theft if they saw anything, e.g. someone acting suspiciously.\nIf you pet has a microchip, report the theft to the microchip database, that way if the pet thief tries to register it as theirs or if your pet is found, you will be notified.\nPut up posters with the most recent pictures of your pet. Include key details and features.\nSpread word of your missing pet to animal shelters and pet owner websites, the more eyes looking the better.\nInform local vets so that they know to keep an eye peeled.', 'bernese-mountain-dog-111878_1280-1024x682.jpg', 'Ranidu Harshana', 'dasd', '2021-09-23 17:32:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vet_clinic`
--

CREATE TABLE `vet_clinic` (
  `vc_id` int(10) NOT NULL,
  `vc_name` varchar(100) NOT NULL,
  `vc_email` varchar(100) NOT NULL,
  `vc_profile_title` varchar(255) NOT NULL,
  `vc_about` text NOT NULL,
  `vc_address` varchar(100) NOT NULL,
  `vc_mobNo` varchar(12) NOT NULL,
  `vc_image` varchar(255) NOT NULL,
  `vc_brpp` int(4) NOT NULL,
  `vc_petCount` int(4) NOT NULL,
  `vc_petType` varchar(255) NOT NULL,
  `vc_password` varchar(255) NOT NULL,
  `vc_longitude` double DEFAULT NULL,
  `vc_latitude` double DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vet_clinic`
--

INSERT INTO `vet_clinic` (`vc_id`, `vc_name`, `vc_email`, `vc_profile_title`, `vc_about`, `vc_address`, `vc_mobNo`, `vc_image`, `vc_brpp`, `vc_petCount`, `vc_petType`, `vc_password`, `vc_longitude`, `vc_latitude`, `created_at`, `status`) VALUES
(1, 'Vet Clinic1', 'vetclinic1@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '47 3rd Cross Ln Borupana Ratmalana', '94852145655', '1.jpg', 23, 2, 'Dog', '$2y$12$Es6eVXH/AYF57pwn1jBTc.2gHiPoMbd3C34WWZyq.SEaQLRRn8KDi', 79.8604, 6.927258, '2021-11-05 19:40:55', 0),
(2, 'Vet Clinic2', 'vetclinic2@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '47 3rd Cross Ln Borupana Ratmalana', '94865895626', '2.jpg', 23, 1, 'Dog', '$2y$12$ggHHKD6K2QeR320jc7rvJ.PIzi8PA9qqlhCkYellEsKOJ32hkYqhK', 79.860881, 6.926651, '2021-11-05 19:41:52', 0),
(3, 'Vet Clinic3', 'vetclinic3@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '47 3rd Cross Ln Borupana Ratmalana', '94775698745', '3.jpg', 23, 2, 'Dog', '$2y$12$iKykwD8tNYxGOaI1Zvu47eAPFDYn7nmc5RMQtdbpVKVedY/YJrzKy', 79.86157, 6.927, '2021-11-05 19:43:22', 1),
(4, 'Vet Clinic4', 'vetclinic4@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '47 3rd Cross Ln Borupana Ratmalana', '94775698321', '4.jpg', 23, 3, 'Dog', '$2y$12$3qIwaeL25x716iKFk5O9oeVFYIwjm.2k5/Ci4JT64kMTTd2i7./Bm', 79.999945, 7.091, '2021-11-05 19:44:04', 1),
(5, 'Vet Clinic5', 'vetclinic5@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '47 3rd Cross Ln Borupana Ratmalana', '94756985632', '5.jpg', 23, 3, 'Dog', '$2y$12$9O56Pzztv6VGObyVxzz6mOR0g98VNi45fy3.2bfvWpL1rf9aRMlQe', 79.999252, 7.09174, '2021-11-05 19:44:46', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pet_shop`
--
ALTER TABLE `pet_shop`
  ADD PRIMARY KEY (`ps_id`),
  ADD UNIQUE KEY `ps_email` (`ps_email`);

--
-- Indexes for table `pet_sitter`
--
ALTER TABLE `pet_sitter`
  ADD PRIMARY KEY (`dc_id`),
  ADD UNIQUE KEY `dc_email` (`dc_email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `vet_clinic`
--
ALTER TABLE `vet_clinic`
  ADD PRIMARY KEY (`vc_id`),
  ADD UNIQUE KEY `vc_email` (`vc_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pet_shop`
--
ALTER TABLE `pet_shop`
  MODIFY `ps_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pet_sitter`
--
ALTER TABLE `pet_sitter`
  MODIFY `dc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `vet_clinic`
--
ALTER TABLE `vet_clinic`
  MODIFY `vc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
