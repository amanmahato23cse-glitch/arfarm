-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2025 at 04:16 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agriculturedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Crops\r\n'),
(3, 'Fruits\r\n'),
(5, 'Seeds'),
(4, 'Spices'),
(2, 'Vegetable\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `farmer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`farmer_id`, `name`, `phone`, `email`, `password`, `address`, `registration_date`, `image_url`) VALUES
(1, 'Krishna\r\n', '9548623546', NULL, 'atul123', 'Ahmedabad', '2025-01-28 13:43:52', 'farmers/krishna.jpg'),
(2, 'Arjunbhai', '9458692134', NULL, NULL, 'Mehsana', '2025-01-28 13:46:11', 'farmers/arjunbhai.jpg'),
(3, 'Rajukishan', '8956472356', NULL, NULL, 'Patna', '2025-01-28 13:46:47', 'farmers/rajukishan.jpg'),
(4, 'AmanKumar', '9986547562', NULL, NULL, 'Uttarpradesh', '2025-01-28 13:47:21', 'farmers/amankumar.jpg'),
(5, 'Parthkishan', '5478965234', NULL, NULL, 'Rajasthan', '2025-01-28 13:47:54', 'farmers/parthkishan.jpg'),
(7, 'atul', '', 'atul@gmail.com', 'atul123', 'Ahmedabad', '2025-01-29 08:54:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `moved_products`
--

CREATE TABLE `moved_products` (
  `moved_product_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `farmer_id` int(11) DEFAULT NULL,
  `moved_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moved_products`
--

INSERT INTO `moved_products` (`moved_product_id`, `product_id`, `product_name`, `subcategory_id`, `price`, `stock_quantity`, `description`, `created_at`, `updated_at`, `image_url`, `farmer_id`, `moved_at`) VALUES
(1, 5, 'BLACK RICE', 1, '250.00', 5, 'Black rice has a deep purple-black color, often referred to as \"forbidden rice.\" It’s rich in antioxidants, fiber, and iron, and is known for its unique flavor.', '2025-01-29 10:54:56', '0000-00-00 00:00:00', 'products/steptodown.com364980 (1).jpg', 7, '2025-01-31 10:23:32'),
(2, 9, 'MOGRA RICE', 1, '100.00', 9, 'Mogra rice is a fragrant, medium-grain rice primarily used for making biryani and pilaf. It has a subtle aroma similar to Basmati but is less expensive.', '2025-01-29 11:12:35', '0000-00-00 00:00:00', 'products/steptodown.com288611.jpg', 7, '2025-01-31 11:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL,
  `farmer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `subcategory_id`, `price`, `stock_quantity`, `description`, `created_at`, `updated_at`, `image_url`, `farmer_id`) VALUES
(1, 'BASMATI RICE', 1, '120.00', 5, 'Basmati rice is known for its long grains and aromatic fragrance. It\'s a staple in Indian and Middle Eastern cuisines, perfect for biryani, pilaf, and curry dishes.', '2025-01-29 03:16:46', '2025-01-29 10:44:15', 'products/rice.jpg', 4),
(2, 'JASMINE RICE', 1, '150.00', 2, 'Jasmine rice is a long-grain, aromatic rice that is often used in Thai and other Southeast Asian cuisines. It has a soft, sticky texture when cooked.', '2025-01-29 04:47:47', '2025-01-29 10:46:53', 'products/basmati_rice.jpg', 1),
(3, 'SONA MASOORI RICE', 1, '50.00', 6, 'Sona Masoori rice is a medium-grain rice commonly grown in the Indian subcontinent. It\'s lighter and fluffier compared to Basmati and is widely used in daily meals and traditional South Indian dishes.', '2025-01-29 10:50:05', '2025-01-29 17:13:11', 'products/steptodown.com993695.jpg', 5),
(4, 'RED RICE', 1, '80.00', 2, 'Red rice retains its bran and has a reddish-brown color. It\'s rich in fiber and is often used for its health benefits. This type of rice is commonly consumed in Southern India.', '2025-01-29 10:51:37', '2025-01-29 16:59:57', 'products/steptodown.com740752.jpg', 1),
(6, 'ARBORIO RICE', 1, '300.00', 3, 'Arborio rice is a short-grain, starchy rice typically used in Italian dishes like risotto. Its creamy texture makes it perfect for cooking creamy dishes.', '2025-01-29 11:01:29', '2025-01-29 17:15:13', 'products/steptodown.com821647.jpg', 3),
(7, 'BROWN RICE', 1, '120.00', 4, ' Brown rice is a whole grain rice with a nutty flavor and chewy texture. It’s considered healthier than white rice because it retains the bran and germ, providing more fiber.', '2025-01-29 11:04:32', '2025-01-29 17:19:34', 'products/steptodown.com740752.jpg', 2),
(8, 'STICKY RICE', 1, '120.00', 5, 'Sticky rice is used in Asian cuisines, particularly for making dumplings and sticky rice desserts. It has a glutinous texture that clumps together when cooked.', '2025-01-29 11:10:54', '2025-01-29 17:17:46', 'products/steptodown.com488876.jpg', 5),
(10, 'GEHU', 2, '50.00', 10, 'This is the most commonly used wheat in India for making roti (flatbread), chapati, and other staple foods. It\'s available in both soft and hard varieties.', '2025-01-29 11:21:24', '2025-01-29 17:21:28', 'products/wheat.jpg', 3),
(12, 'DURUM WHEAT', 2, '100.00', 9, ' Durum wheat is a hard variety known for its high protein content, used primarily for making pasta, semolina (suji), and couscous. It is mostly grown in the states of Rajasthan, Madhya Pradesh, and parts of Uttar Pradesh.', '2025-01-29 11:23:48', '2025-01-29 17:22:05', 'products/steptodown.com902271.jpg', 2),
(13, 'DESI GEHU', 2, '50.00', 20, ' \"Desi\" wheat refers to indigenous wheat varieties grown in India, usually with smaller grains. These types are often preferred for making traditional rotis (flatbreads).\r\n', '2025-01-29 11:25:51', '2025-01-29 17:24:17', 'products/steptodown.com521140.jpg', 1),
(14, 'SHARBATI GEHU', 2, '90.00', 16, ' A premium variety of wheat, Sharbati wheat is known for its soft texture and is often used for making high-quality chapatis. It is grown primarily in Madhya Pradesh and Rajasthan.', '2025-01-29 11:27:50', '2025-01-29 17:25:22', 'products/steptodown.com873293.jpg', 3),
(15, 'PUSA WHEAT', 2, '75.00', 10, 'Pusa wheat is a high-yielding variety developed by the Indian Agricultural Research Institute (IARI). It is known for its good quality and is commonly used in making chapatis and other wheat-based dishes.', '2025-01-29 11:29:36', '2025-01-29 17:26:15', 'products/steptodown.com433491.jpg', 4),
(16, 'SOFT WHEAT', 2, '35.00', 12, 'Soft wheat has lower protein content and is often used in products like cakes, biscuits, and pastries. It is milled into finer flour and is softer than hard wheat varieties.', '2025-01-29 11:32:59', '2025-01-29 17:27:07', 'products/steptodown.com275075.jpg', 5),
(17, 'HARD RED SPRING WHEAT', 2, '60.00', 6, 'This is a high-protein variety of wheat that is best suited for bread-making and other baked goods. It has a strong gluten structure, making it ideal for dough that requires rise and structure.', '2025-01-29 11:35:38', '2025-01-29 17:28:11', 'products/wheat.jpg', 2),
(18, 'TOOR DAL', 3, '120.00', 23, 'Toor dal is one of the most widely used pulses in Indian cuisine, especially for making dal (lentil soup). It is yellow in color and has a slightly sweet flavor. It is commonly used in sambar, dal fry, and various other curries.', '2025-01-29 11:50:41', '2025-01-29 17:30:28', 'products/steptodown.com717947.jpg', 3),
(19, 'MASOOR DAL', 3, '90.00', 10, 'Masoor dal is a small, reddish-orange lentil that cooks quickly and is often used in soups, curries, and salads. It has a mild flavor and is rich in protein, iron, and fiber.\r\n', '2025-01-29 11:53:21', '2025-01-29 17:31:08', 'products/steptodown.com771522.jpg', 4),
(20, 'CHANA DAL', 3, '80.00', 8, 'Chana dal is made from split chickpeas and is yellow in color. It is slightly sweet in taste and is used in a variety of Indian dishes like dal fry, soups, and curries. It has a nutty flavor and a firm texture.', '2025-01-29 12:00:04', '2025-01-29 17:32:29', 'products/steptodown.com369459.jpg', 3),
(21, 'URAD DAL', 3, '140.00', 22, 'Urad dal is a black, split legume used in many South Indian dishes, including dosa batter and idli. It has a distinctive earthy flavor and is rich in protein and iron.', '2025-01-29 12:01:48', '2025-01-29 17:33:43', 'products/steptodown.com611559.jpg', 7),
(22, 'MOONG DAL', 3, '70.00', 36, 'Moong dal is a green, split lentil that is commonly used in Indian dishes. It is light and easy to digest, making it a favorite for soups, salads, and lighter curries. Moong dal is also available in yellow and whole versions.', '2025-01-29 12:04:00', '2025-01-29 17:34:28', 'products/steptodown.com509728.jpg', 1),
(23, 'RAJMA', 3, '150.00', 10, 'Rajma is a kidney-shaped bean, usually red in color, used in the famous Rajma Chawal (kidney beans with rice). It has a creamy texture when cooked and is rich in protein and fiber.\r\n', '2025-01-29 12:07:52', '2025-01-29 17:35:24', 'products/steptodown.com109403.jpg', 4),
(24, 'LOBIA', 3, '110.00', 23, 'Lobia is a small, oval-shaped legume with a black spot on one side. It has a mild, earthy flavor and is used in various curries, stews, and salads.\r\n', '2025-01-29 12:10:59', '2025-01-29 17:36:16', 'products/steptodown.com502168.jpg', 1),
(25, 'ROASTED GROUNDNUTS', 7, '80.00', 5, 'Peanuts that have been roasted, often salted or seasoned.', '2025-01-29 12:19:15', '2025-01-29 17:41:21', 'products/images (1).jpg', 2),
(26, 'ORGANIC GROUNDNUT', 7, '300.00', 10, 'Organic groundnuts are grown without the use of chemical fertilizers, pesticides, or herbicides. They are often more expensive than conventional peanuts due to the organic farming process and are highly favored for health-conscious consumers.', '2025-01-29 12:21:34', '2025-01-29 17:39:00', 'products/steptodown.com983529.jpg', 5),
(27, 'KERNELS', 7, '200.00', 6, 'Kernels are peanuts that have been peeled (blanched) to remove their skin. They are commonly used in cooking, baking, or as snacks. Blanched groundnuts are perfect for making peanut-based sauces, snacks, or as a topping for various dishes.', '2025-01-29 12:23:13', '2025-01-29 17:41:55', 'products/images.jpg', 1),
(28, 'GROUNDNUT OIL', 7, '250.00', 10, 'Groundnut oil is a type of vegetable oil made from peanuts. It is widely used for frying, sautéing, and as a cooking oil due to its high smoking point and mild flavor. It is also used in traditional and gourmet cooking.', '2025-01-29 12:27:03', '2025-01-29 17:42:36', 'products/steptodown.com658870.jpg', 4),
(30, 'CASTOR', 8, '100.00', 10, 'Castor plants are grown for the oil extracted from their seeds. Castor oil is known for its medicinal, industrial, and cosmetic applications. It is commonly used in the pharmaceutical industry as a laxative and also for its anti-inflammatory properties.', '2025-01-29 12:29:26', '2025-01-29 17:43:29', 'products/steptodown.com850057.jpg', 2),
(31, 'HYBRID CASTOR SEED', 8, '180.00', 15, 'Hybrid castor varieties are crossbred for higher yield, disease resistance, and improved oil content. These varieties are particularly suited for commercial cultivation and are preferred for high-oil output.', '2025-01-29 12:30:47', '2025-01-29 17:45:25', 'products/castor.jpg', 7),
(32, 'SWEET CASTOR SEED', 8, '200.00', 5, ' Sweet castor seeds are a variety that has a lower toxicity level compared to regular castor seeds. They are mainly used for oil extraction and are more suitable for non-toxic oil production, often used in food-grade applications.\r\n', '2025-01-29 12:32:11', '2025-01-29 17:46:29', 'products/steptodown.com642213.jpg', 5),
(33, 'COMMON CASTOR SEED', 8, '80.00', 2, ' Common castor seeds are the most widely cultivated and used variety for oil extraction. The oil has numerous industrial applications and is also used in medicine. Castor seeds are toxic in their raw form due to the presence of ricin, a harmful protein.', '2025-01-29 12:34:13', '2025-01-29 17:47:22', 'products/steptodown.com850057.jpg', 3),
(34, 'DESI COTTON', 9, '120.00', 45, 'Desi cotton is the traditional cotton variety grown in India, known for its shorter staple length compared to hybrid varieties. It is characterized by its rough texture and is often used for making coarse fabrics like khadi, handlooms, and traditional Indian garments.', '2025-01-29 12:36:34', '2025-01-29 17:49:41', 'products/steptodown.com196195.jpg', 4),
(35, 'KAPAS', 9, '150.00', 23, 'Kapas cotton, also known as \"tree cotton,\" is a type of cotton plant native to India. It is known for its natural color and is used primarily for producing rough and durable fabrics. Kapas cotton is popular in the traditional handloom industry and is eco-friendly.', '2025-01-29 12:37:58', '2025-01-29 17:50:39', 'products/steptodown.com286877.jpg', 2),
(36, 'AMERICAN COTTON', 9, '170.00', 12, ' American cotton refers to the hybrid cotton varieties that are more commonly grown in India due to their higher yield and longer staple length. These varieties are more resistant to pests and diseases and are widely used for producing fine and smooth fabrics used in the textile industry.', '2025-01-29 12:39:17', '2025-01-29 17:53:03', 'products/cotton.jpg', 7),
(37, 'SUVIN COTTON', 9, '450.00', 7, 'Suvin cotton is one of the finest cotton varieties grown in India. It is a hybrid of the Egyptian and Indian cotton varieties. Known for its long, silky fibers, Suvin cotton is prized in the textile industry for its softness, strength, and high-quality fabric production.', '2025-01-29 12:40:51', '2025-01-29 17:53:50', 'products/steptodown.com975485.jpg', 1),
(38, 'RED ONIONS', 4, '25.00', 50, 'Red onions are the most common type of onion found in Indian kitchens. They are known for their slightly sweet, mild flavor and are often used in salads, curries, and for garnishing. They have a reddish-purple outer skin and white or pinkish flesh.', '2025-01-29 12:44:00', '2025-01-29 17:54:50', 'products/steptodown.com697769.jpg', 5),
(39, 'YELLOW ONIONS', 4, '30.00', 10, ' Yellow onions have a stronger flavor compared to red onions. They are the most widely used variety for cooking due to their robust taste and slightly spicy flavor. They are perfect for soups, stews, and curries.', '2025-01-29 12:45:56', '2025-01-29 17:57:01', 'products/steptodown.com329200.jpg', 3),
(40, 'WHITE ONIONS', 4, '50.00', 55, 'White onions have a milder flavor compared to yellow and red onions. They are slightly sweeter and have a crisp texture. They are often used in raw preparations like salads, salsas, or as a garnish in dishes like biryanis.', '2025-01-29 12:47:56', '2025-01-29 17:58:13', 'products/steptodown.com994705.jpg', 4),
(41, 'SHALLOTS', 4, '70.00', 20, 'Shallots are smaller than regular onions and have a mild, sweet flavor with a hint of garlic. They are often used in South Indian cooking and are essential for making chutneys, curries, and sauces.', '2025-01-29 12:49:44', '2025-01-29 17:59:02', 'products/onion.jpg', 3),
(42, 'SPRING ONIONS', 4, '20.00', 30, 'Green onions, also known as spring onions or scallions, are a type of vegetable from the allium family, which also includes garlic, onions, and leeks. Unlike regular onions, green onions have a milder flavor, making them a popular ingredient for garnishes, salads, and cooked dishes.', '2025-01-29 12:51:51', '2025-01-29 18:00:03', 'products/steptodown.com340885.jpg', 1),
(43, 'KASHMIRI RED CHILLI', 5, '400.00', 20, 'Kashmiri red chili is known for its vibrant red color and mild heat. It is mostly used to add color to dishes without adding too much heat. It has a slightly sweet flavor and is a key ingredient in many North Indian curries and gravies.', '2025-01-29 12:55:38', '2025-01-29 18:01:14', 'products/steptodown.com577661.jpg', 7),
(44, 'HARI MIRCH', 5, '70.00', 19, 'Hari Mirch refers to fresh green chilies commonly used in everyday cooking across India. They have a medium to high heat level and are used in both raw and cooked forms. The flavor is sharp and tangy, perfect for spicing up curries, sauces, and snacks.', '2025-01-29 12:58:22', '2025-01-29 18:02:37', 'products/steptodown.com229034.jpg', 5),
(45, 'BANANA GREEN CHILLIES', 5, '100.00', 10, 'Banana green chilies are large, mild to moderately spicy, and have a slightly tangy flavor. They are known for their less intense heat compared to other green chilies and are often used in stuffed chili recipes or fried with spices.', '2025-01-29 13:00:27', '2025-01-29 18:04:43', 'products/steptodown.com384592.jpg', 4),
(46, 'GUNTUR CHILLI', 5, '250.00', 10, 'Guntur chili is famous for its heat and pungency. It\'s one of the hottest varieties of Indian chili, and it is widely used in cooking, especially in Andhra cuisine. Guntur chili is used both whole and ground in curries, pickles, and spice mixes.', '2025-01-29 13:04:45', '2025-01-29 18:05:45', 'products/chili.jpg', 2),
(47, 'DESI TOMATOES', 6, '30.00', 20, ' Desi tomatoes are the most common variety grown in India. They tend to have a more tart flavor compared to other varieties. These tomatoes are typically used in everyday Indian cooking for curries, gravies, chutneys, and salads. The skin is thinner, and the flesh is juicy, which helps create flavorful gravies', '2025-01-29 13:09:53', '2025-01-29 18:07:37', 'products/tomato.jpg', 3),
(48, 'PUDINA TOMATOES', 6, '80.00', 12, 'Pudina tomatoes are a variety that is often used in South Indian cooking. They are medium-sized, round, and have a distinct tangy flavor. These tomatoes are usually used in chutneys, sambar, and various types of curries. They pair well with mint (pudina), giving dishes a fresh, aromatic quality.', '2025-01-29 13:11:02', '2025-01-29 18:08:50', 'products/steptodown.com914131.jpg', 5),
(49, 'CHERRY TOMATOES', 6, '400.00', 10, ' Cherry tomatoes are small, round, and sweet. They’re great for snacking, salads, or roasting. They come in various colors, including red, yellow, and orange, and add a burst of sweetness to any dish.\r\n', '2025-01-29 13:12:02', '2025-01-29 18:09:36', 'products/steptodown.com900147.jpg', 1),
(50, 'KUMATO TOMATOES', 6, '100.00', 10, 'Kumato tomatoes are dark-brownish to reddish tomatoes with a unique, rich flavor. While they are not native to India, they have become increasingly popular in markets, especially in urban areas. Kumatos are used in salads, soups, and even as a garnish due to their distinctive color and taste.', '2025-01-29 13:15:40', '2025-01-29 18:10:30', 'products/steptodown.com794114.jpg', 7),
(51, 'KUFRI JYOTI', 10, '50.00', 10, 'Kufri Jyoti is a well-known variety of potato grown primarily in the northern regions of India, especially in Himachal Pradesh and Jammu & Kashmir. These potatoes have a smooth, thin skin and are known for their high starch content. They are ideal for making French fries, chips, and mashed potatoes.', '2025-01-29 13:18:39', '2025-01-29 18:11:24', 'products/steptodown.com912503.jpg', 2),
(52, 'KUFRI PUKHRAJ', 10, '45.00', 10, 'Kufri Pukhraj is another variety from the Kufri family, grown mostly in the northern states. It has yellowish flesh and is commonly used for making curry, boiling, and frying. The texture is soft and fluffy when cooked, making it suitable for dishes like aloo masala and dum aloo.', '2025-01-29 13:50:43', '2025-01-29 18:12:33', 'products/steptodown.com507351.jpg', 4),
(57, 'INDIRA POTATOES', 10, '50.00', 20, 'Indira potatoes are primarily grown in states like Uttar Pradesh and Madhya Pradesh. They are medium-sized, round to oval, with a light brown skin. They have a relatively low starch content, making them great for boiling, sautéing, and making curries.', '2025-01-29 13:54:53', '2025-01-29 18:13:15', 'products/steptodown.com584398.jpg', 4),
(67, 'DESI GARLIC', 11, '120.00', 30, 'Desi garlic, also known as Indian garlic, is small but very flavorful and pungent. It has a strong aroma and is often used in traditional Indian cooking, especially in curries, chutneys, and pickles. The cloves are typically smaller compared to other varieties but pack a punch in terms of taste. It is known for its medicinal properties as well, commonly used for boosting immunity.', '2025-01-29 14:04:52', '2025-01-29 18:15:07', 'products/steptodown.com949104.jpg', 5),
(68, 'LAHSUN', 11, '100.00', 22, ' Lahsun is a general term used in India for garlic and is available in various forms. The cloves can vary in size and color, but it is usually a white variety. It\'s the most commonly used garlic for cooking and has a medium pungency. Lahsun is widely used in dishes like dal tadka, sabzis, and for tempering in many Indian recipes.', '2025-01-29 14:06:19', '2025-01-29 18:16:09', 'products/steptodown.com378903.jpg', 3),
(69, 'WHITE GARLIC', 11, '120.00', 11, 'White garlic is the most common variety available in Indian markets. It has large, white, plump cloves and a mild to medium pungency, making it versatile for a wide range of dishes. It is used in everything from curries and stews to sauces and salad dressings. White garlic has a relatively milder flavor compared to its purple counterparts.', '2025-01-29 14:07:44', '2025-01-29 18:17:05', 'products/garlic.jpg', 4),
(70, 'INDIAN PURPLE BRINJAL', 12, '30.00', 33, 'This is the most common variety of brinjal in India. It has a deep purple skin and a round or oval shape. The flesh is light green and spongy. Indian purple brinjal is commonly used in curries, baingan bharta (roasted and mashed brinjal), and other traditional Indian dishes. It\'s known for its mild bitterness and soft texture when cooked.', '2025-01-29 14:10:57', '2025-01-29 18:18:18', 'products/steptodown.com904641.jpg', 2),
(71, 'LONG BRINJAL', 12, '50.00', 20, 'This variety has a long, slender, light green skin. The flesh is tender and less bitter than the round purple variety, making it a popular choice for dishes like bharta and stir-fries. Long green brinjal is often used in Tamil, Kerala, and Andhra cuisines. It can be sliced, stuffed, or even used in sambars and curries.', '2025-01-29 14:13:43', '2025-01-29 18:19:25', 'products/steptodown.com817541.jpg', 7),
(72, 'BABY BRINJAL\r\n', 12, '60.00', 10, 'Baby brinjal, or small brinjal, is the smaller version of the regular purple variety. It has a smooth, shiny, and deep purple skin with a firm, spongy texture. It’s often stuffed with spices and cooked in a curry (like bharwa baingan). Due to their size, they cook quickly and are perfect for shallow frying or baking.\r\n', '2025-01-29 14:15:27', '2025-01-29 18:20:14', 'products/brinjal.jpg', 1),
(73, 'BANANA BRINJAL', 12, '80.00', 20, 'Banana brinjal is a variety that is slightly smaller and shaped like a banana, with a light green to yellowish skin. This brinjal is less bitter than most others and has a very mild, almost sweet taste when cooked. It\'s typically used in South Indian and coastal cuisines, often cooked in gravies or stews.', '2025-01-29 14:16:19', '2025-01-29 18:22:07', 'products/steptodown.com817541.jpg', 5),
(74, 'KASHMIRI APPLES', 18, '100.00', 20, ' Kashmiri apples are small to medium-sized apples with a deep red color. They are known for their sweet, juicy flavor and smooth texture. Grown primarily in the Kashmir Valley, these apples are very popular in India and are often used for fresh eating or making juices. They have a mild sweetness with a subtle tartness.\r\n', '2025-01-29 14:27:25', '2025-01-29 18:23:22', 'products/steptodown.com221739.jpg', 4),
(75, 'GREEN APPLE', 18, '80.00', 30, 'Green apples are small to medium-sized apples with a deep red color. They are known for their sweet, juicy flavor and smooth texture. Grown primarily in the Kashmir Valley, these apples are very popular in India and are often used for fresh eating or making juices. \r\n', '2025-01-29 14:28:17', '2025-01-29 18:24:39', 'products/steptodown.com914131.jpg', 7),
(76, 'GOLDEN APPLE', 18, '120.00', 50, 'Golden apples are small to medium-sized apples with a deep red color. \r\n', '2025-01-29 14:29:14', '2025-01-29 18:28:59', 'products/steptodown.com617026.jpg', 3),
(77, 'BANANA', 19, '50.00', 50, 'This is the most commonly grown and consumed variety of banana in India and globally.  bananas are long, with smooth, yellow skins that ripen from green to yellow. They have a mild, sweet flavor and a soft, creamy texture. These bananas are typically eaten raw, but can also be used in smoothies, milkshakes, or baked goods.', '2025-01-29 14:31:54', '2025-01-29 18:29:53', 'products/banana.jpg', 3),
(78, 'GREEN BANANA', 19, '70.00', 90, 'This is the most commonly grown and consumed variety of banana in India and globally. Green bananas are long, with smooth, yellow skins that ripen from green to green.', '2025-01-29 14:32:54', '2025-01-29 18:31:13', 'products/steptodown.com222034.jpg', 4),
(79, 'BIG BANANA', 19, '80.00', 60, 'They have a mild, sweet flavor and a soft, creamy texture. These bananas are typically eaten raw, but can also be used in smoothies, milkshakes, or baked goods.', '2025-01-29 14:33:50', '2025-01-29 18:33:10', 'products/steptodown.com418849.jpg', 1),
(80, 'SMALL BANANA', 19, '120.00', 100, 'This is the most commonly grown and consumed variety of banana in India and globally.', '2025-01-29 14:34:28', '2025-01-29 18:34:12', 'products/steptodown.com798391.jpg', 3),
(81, 'BLACKBERRY', 24, '50.00', 60, 'The Indian variety of blackberry, also known as Jamun, is widely grown across the country, particularly in regions like Uttar Pradesh, Maharashtra, and Andhra Pradesh. These berries are small, oval, and have a deep purple to black color when ripe. They have a unique sweet-sour taste with a hint of astringency. Jamun is typically eaten fresh, but it is also used to make jams, juices, syrups, and traditional Indian medicines due to its numerous health benefits, especially for regulating blood sugar levels.', '2025-01-29 14:35:48', '2025-01-29 18:35:38', 'products/steptodown.com424192.jpg', 4),
(82, 'LOGAN BERRY', 24, '120.00', 60, 'They have a unique sweet-sour taste with a hint of astringency. Jamun is typically eaten fresh, but it is also used to make jams, juices, syrups, and traditional Indian medicines due to its numerous health benefits, especially for regulating blood sugar levels.', '2025-01-29 14:36:48', '2025-01-29 18:36:54', 'products/blackberry.jpg', 2),
(83, 'GRAPES', 21, '50.00', 50, 'grapes are one of the most widely consumed varieties in India. These grapes are greenish-yellow or light green, with a sweet and slightly tangy flavor. As the name suggests, they are seedless, making them convenient for snacking or adding to fruit salads, smoothies, and desserts. They are also commonly used to make raisins.\r\n', '2025-01-29 14:38:16', '2025-01-29 18:37:42', 'products/grape.jpg', 7),
(84, 'BLACK GRAPES', 21, '100.00', 60, ' As the name suggests, they are seedless, making them convenient for snacking or adding to fruit salads, smoothies, and desserts. They are also commonly used to make raisins.\r\n', '2025-01-29 14:38:56', '2025-01-29 18:39:33', 'products/steptodown.com276800.jpg', 5),
(85, 'ORANGE', 20, '80.00', 10, 'oranges, also known as Kinnow, are one of the most famous varieties in India. Grown primarily in Nagpur (Maharashtra), these oranges are medium-sized with bright orange skin. They are juicy, sweet, and tangy, making them ideal for fresh consumption, juicing, or making marmalades. Kinnow oranges are known for their high juice content and easy-to-peel skin.', '2025-01-29 14:40:30', '2025-01-29 15:51:27', 'products/steptodown.com443871.jpg', 3),
(86, 'GREEN ORANGES', 20, '120.00', 50, 'Mosambi, or sweet lime, is a mild, non-tart citrus fruit that is light green or yellow in color when ripe. It is sweet and slightly tangy with a juicy, refreshing taste. Mosambis are very popular in India for making fresh juice, which is a common refreshing drink during summer months. This variety is known for being easy to peel and has minimal seeds.', '2025-01-29 14:41:40', '2025-01-29 15:37:09', 'products/greenorange.jpg', 4),
(87, 'SWEET ORANGE', 20, '70.00', 20, 'sweet lime, is a mild, non-tart citrus fruit that is light green or yellow in color when ripe. It is sweet and slightly tangy with a juicy, refreshing taste. SWEET LIME are very popular in India for making fresh juice, which is a common refreshing drink during summer months. This variety is known for being easy to peel and has minimal seeds.', '2025-01-29 14:42:43', '2025-01-29 18:26:31', 'products/orange.jpg', 3),
(88, 'PINEAPPLE', 22, '120.00', 50, 'pineapples are commonly grown in Maharashtra, particularly around the Konkan region. They are larger than Queen pineapples, with a vibrant golden-yellow skin and a mild, sweet flavor. The flesh is firm and slightly tangy, making it perfect for fresh consumption or adding to desserts and smoothies.', '2025-01-29 14:43:57', '2025-01-29 18:40:46', 'products/steptodown.com277685.jpg', 2),
(89, 'BANGALORE PINEAPPLE', 22, '100.00', 20, ' Grown primarily in the Bangalore region of Karnataka, these pineapples are medium-sized with a good balance of sweetness and acidity. The flesh is firm, and it has a rich, tangy taste, making it perfect for both fresh consumption and cooking. Bangalore pineapples are often used in making fruit salads, curries, or smoothies.', '2025-01-29 14:44:51', '2025-01-29 18:42:05', 'products/pineapple.jpg', 1),
(90, 'POMEGRANATE', 25, '120.00', 50, 'The pomegranate is one of the most popular and widely consumed varieties in India. It is typically medium to large-sized, with a tough, leathery skin that is deep red or pink. The fruit has sweet, juicy seeds with a tangy undertone, making it ideal for fresh consumption, juicing, or garnishing dishes. It is primarily grown in Maharashtra and Karnataka.', '2025-01-29 14:46:13', '2025-01-29 18:43:09', 'products/pomegranate.jpg', 4),
(91, 'KESAR POMEGRANATE', 25, '120.00', 60, 'The Kesar pomegranate is one of the most popular and widely consumed varieties in India. It is typically medium to large-sized, with a tough, leathery skin that is deep red or pink. ', '2025-01-29 14:47:03', '2025-01-29 18:44:02', 'products/steptodown.com441005.jpg', 1),
(92, 'BLUEBERRY', 23, '120.00', 50, 'The variety is one of the most common types of blueberries grown in cooler climates. It produces medium to large-sized berries with a deep blue-purple color. Highbush blueberries have a sweet-tart flavor and are known for their plump, juicy texture. They are commonly consumed fresh, used in smoothies, baked goods, or as a topping for cereals. These are typically available in premium supermarkets or specialty stores in India.\r\n', '2025-01-29 14:48:50', '2025-01-29 18:44:51', 'products/steptodown.com379638.jpg', 5),
(93, 'LEGACY BLUEBERRY', 24, '80.00', 20, 'The Legacy blueberry is a newer cultivar known for its mild sweetness and smooth texture. The berries are medium-sized, with a pale blue color. These blueberries are commonly consumed fresh or used in desserts, fruit salads, and smoothies. They have a longer shelf life compared to other varieties, making them ideal for transportation to international markets.', '2025-01-29 14:49:32', '2025-01-29 18:45:50', 'products/steptodown.com740215.jpg', 5),
(94, 'ZANZIBAR CLOVES', 13, '1000.00', 20, 'Zanzibar cloves are known for their high quality and are often considered some of the best cloves in the world. These cloves are large, with a strong, aromatic fragrance and a bold flavor. They are grown on the spice island of Zanzibar (off the coast of Tanzania) and are known for their high oil content, making them ideal for use in cooking, perfumes, and essential oils. Zanzibar cloves are commonly used in both sweet and savory dishes, as well as in beverages like mulled wine.', '2025-01-29 14:57:05', '2025-01-29 18:48:33', 'products/steptodown.com914727.jpg', 4),
(95, 'INDIAN CLOVES ', 13, '800.00', 12, 'Kerala cloves are one of the most commonly found varieties of cloves in India. These cloves are harvested from the Malabar region of Kerala and are known for their strong flavor, high oil content, and high pungency. Indian cloves are typically small to medium in size and are often used in Indian cuisine for both cooking and preparation of masalas. They are also used in traditional medicine for their antiseptic and medicinal properties.', '2025-01-29 14:57:59', '2025-01-29 18:49:33', 'products/steptodown.com963371.jpg', 2),
(96, 'SRI LANKAN CLOVES', 13, '600.00', 9, 'Sri Lankan cloves are very similar to Kerala cloves in terms of their strong, aromatic flavor and high oil content. They are slightly more delicate than the Indian variety and have a slightly sweet taste. These cloves are commonly used in both cooking and in the production of clove oil, which is used in various health and beauty products. Sri Lankan cloves are prized for their distinct, aromatic fragrance.', '2025-01-29 14:59:01', '2025-01-29 18:51:04', 'products/clove.jpg', 3),
(97, 'BLACK CUMIN', 14, '400.00', 12, ' Shah Jeera, also known as black cumin, is a smaller, darker, and more aromatic variety of cumin. It is widely used in North Indian and Mughlai cuisine and has a distinct, slightly sweet and spicy flavor with earthy undertones. The seeds are used in cooking whole, especially in rice dishes, biryanis, and various meat curries. Shah Jeera is considered milder and more refined compared to regular cumin and is often used in higher-end dishes due to its unique taste.', '2025-01-29 15:01:40', '2025-01-29 18:52:37', 'products/steptodown.com210428.jpg', 7),
(98, 'WHITE CUMIN', 14, '200.00', 11, 'White cumin, commonly known as Jeera, is the most popular and widely available variety of cumin in India. The seeds are light brown to yellow-brown and have a strong, pungent aroma with a nutty, slightly bitter flavor. Jeera is used in almost every Indian kitchen to make tempering for dals, vegetables, and curries, and is also a key ingredient in spice mixes like garam masala. It is commonly used both whole and ground, and is a staple in Indian cuisine.', '2025-01-29 15:03:06', '2025-01-29 18:53:27', 'products/cumin.jpg', 1),
(99, 'CEYLON CINNAMON', 15, '1500.00', 10, 'Ceylon cinnamon, also known as \"true cinnamon,\" is considered the highest quality cinnamon. It has a delicate, sweet flavor and is made from the inner bark of the Cinnamomum verum tree, primarily grown in Sri Lanka. The texture is soft, with thin, layered sticks that easily break into smaller pieces. Ceylon cinnamon is often preferred in baking, desserts, and beverages because of its mild, sweet taste. It is also considered healthier because it contains lower levels of coumarin, a compound that can be harmful in high doses.', '2025-01-29 15:05:57', '2025-01-29 18:54:24', 'products/cinnamon.jpg', 3),
(100, 'CASSIA CINNAMON', 15, '400.00', 23, 'Cassia cinnamon, or Chinese cinnamon, is the most common variety found in supermarkets around the world, including India. It is made from the bark of the Cinnamomum cassia tree and has a stronger, spicier flavor compared to Ceylon cinnamon. The sticks are thick and hard and have a deep, pungent aroma. Cassia cinnamon is commonly used in Indian cooking, especially in spice blends like garam masala, biryanis, and curries. It\'s also used in baking and to flavor hot beverages like chai.\r\n3. Indonesian Cinnamon\r\nPrice: ₹350-₹600 per kg\r\nDescription: Indonesian cinnamon is a variety of cassia cinnamon but is slightly milder and sweeter in taste. It is often considered a bridge between Ceylon and Cassia cinnamon, as it has a flavor that\'s more intense than Ceylon but less pungent than Cassia. The cinnamon sticks are hard, similar to Cassia, but not as thick. Indonesian cinnamon is commonly used in cooking and baking, especially in Southeast Asian and Indian cuisines. It\'s also popular in the making of cinnamon rolls, cakes, and desserts.\r\n4. Saigon Cinnamon\r\nPrice: ₹500-₹900 per kg (imported)\r\nDescription: Saigon cinnamon is a type of Cassia cinnamon that originates from Vietnam. It is one of the strongest and most aromatic cinnamon varieties, with a very rich and spicy flavor. The sticks are thick and have a deep reddish-brown color. Saigon cinnamon has the highest coumarin content, which is why it is generally not recommended for daily consumption in large quantities, but it is prized for its intense flavor in baking, hot drinks, and desserts.\r\n5. Vietnamese Cinnamon\r\nPrice: ₹400-₹800 per kg (imported)\r\nDescription: Vietnamese cinnamon is another variety of cassia cinnamon, similar to Saigon cinnamon but with a slightly milder flavor profile. It has a warm, sweet aroma and is commonly used in baking, desserts, and savory dishes. Vietnamese cinnamon is often used in spice blends and can be found in premium or specialty markets. Its smooth, sweet flavor makes it a versatile option for various dishes, from rice puddings to curries.\r\n6. Malabar Cinnamon\r\nPrice: ₹300-₹500 per kg\r\nDescription: Malabar cinnamon is a local variety grown in the Malabar region of India, specifically in Kerala. It is similar to Cassia cinnamon but has a more subtle flavor profile. Malabar cinnamon sticks are thinner and have a slightly smoother texture compared to the typical cassia varieties. This cinnamon is commonly used in Indian cooking for both sweet and savory dishes, such as biryanis, chai, and spice blends.\r\n7. Sri Lankan Cinnamon\r\nPrice: ₹500-₹800 per kg\r\nDescription: Sri Lankan cinnamon is often regarded as the highest quality variety in the cassia family, and sometimes it is referred to as Ceylon cinnamon, but it’s specifically sourced from Sri Lanka. Known for its unique sweetness and aromatic flavor, Sri Lankan cinnamon is used in a variety of Indian and international dishes, including sweets, curries, and spiced beverages. It has thinner, more fragile bark layers compared to regular cassia and is widely used for making essential oils.\r\nUses and Applications:\r\nCulinary Uses: Cinnamon is commonly used in Indian cooking for flavoring curries, rice dishes (like biryani), and beverages (such as chai). It’s also used in Western cooking for baking, particularly in cinnamon rolls, cakes, and pies.\r\nMedicinal Uses: Cinnamon is valued for its medicinal properties, including its ability to help regulate blood sugar levels, improve digestion, and reduce inflammation. Ceylon cinnamon, in particular, is recommended for regular consumption due to its lower coumarin content.\r\nAromatherapy: Cinnamon oil, derived from all types of cinnamon, is used in aromatherapy for its warm, soothing scent and its potential to improve circulation and reduce stress.\r\nNote: The prices for cinnamon can vary based on region, quality, and whether the variety is local or imported. The prices provided are approximate and can fluctuate depending on seasonality and availability.\r\n\r\n\r\n\r\n\r\n', '2025-01-29 15:11:54', '2025-01-29 18:55:26', 'products/steptodown.com773008.jpg', 1),
(101, 'FENNEL', 16, '80.00', 20, 'fennel, or Saunf, is the most commonly used variety of fennel in India. These fennel seeds are light green to yellowish-brown in color and have a sweet, aromatic flavor with a slight licorice taste. Saunf is used in Indian cuisine for both savory dishes (like vegetable curries, rice, and stews) and sweet dishes (such as in desserts or in digestive mixtures). It’s also commonly used after meals to aid digestion and freshen the breath.', '2025-01-29 15:39:48', '2025-01-29 18:56:38', 'products/fennel.jpg', 3),
(102, 'BLACKPEPPER', 17, '80.00', 50, 'black pepper is one of the most well-known and widely grown varieties in India, particularly in the Malabar coast (Kerala). The peppercorns are medium to large in size, with a bold, sharp flavor and a rich, robust aroma. Malabar pepper is used extensively in Indian cooking, especially in meat dishes, curries, and spice mixes. It is considered to be of high quality due to its bold flavor and strong aroma. It is also known for its versatility in both whole and ground forms.', '2025-01-29 15:40:52', '2025-01-29 18:57:41', 'products/steptodown.com963371.jpg', 3),
(103, 'GRASS SEED', 32, '80.00', 20, 'Grass seeds are used primarily for growing grass lawns, pastures, and turf. These seeds are carefully cultivated to ensure quick germination and strong growth. Common types of grass seeds include Bermuda grass, Fescue, and Bluegrass. They are often used in landscaping, sports fields, and for livestock grazing.\r\nUses: Lawn care, pasture grass, erosion control, and sports fields.', '2025-01-29 15:42:48', '2025-01-29 18:58:50', 'products/steptodown.com493863.jpg', 7),
(104, 'MUSTARD SEED', 27, '80.00', 20, 'Mustard seeds are small round seeds of the mustard plant, available in three main varieties—yellow, brown, and black. Mustard seeds are known for their pungent flavor and are commonly used in cooking, particularly in Indian, Middle Eastern, and European cuisines. The seeds are rich in essential oils, which give them their characteristic spicy and tangy flavor.\r\nUses: Culinary (mustard oil, pickles, spice mixes), health (rich in omega-3 fatty acids), and in traditional medicine for digestive health and inflammation.', '2025-01-29 15:43:32', '2025-01-29 18:59:58', 'products/steptodown.com267227.jpg', 5),
(105, 'VEGETABLES SEED', 26, '50.00', 20, 'Vegetable seeds are the seeds used to grow various vegetables. These seeds can range from tomatoes and cucumbers to spinach and peas. They are usually grown in home gardens, farms, and greenhouses. The seeds vary in size and care requirements depending on the vegetable.\r\nUses: Home gardening, farming, and crop production. Vegetable seeds are essential for growing fresh produce for consumption.', '2025-01-29 15:44:22', '2025-01-29 19:01:47', 'products/vegetableseed.jpg', 4),
(106, 'FRUIT SEED', 31, '100.00', 50, 'Fruit seeds are the seeds found inside fruits, such as apple, mango, banana, and grapes. These seeds are typically used for growing new fruit trees or plants. Some fruit seeds, like avocado or papaya, can be easily germinated in home gardens, while others require specific conditions or grafting methods for optimal growth.\r\nUses: Cultivating fruit trees and plants for edible produce, gardening, and landscaping.', '2025-01-29 15:45:04', '2025-01-29 19:03:11', 'products/fruitseed.jpg', 2),
(107, 'OIL SEED', 30, '70.00', 50, 'Oil seeds are seeds that contain high oil content, which can be extracted for various uses, including cooking, cosmetics, and industrial applications. Common oil seeds include sunflower seeds, sesame seeds, soybeans, mustard seeds, and canola seeds. These seeds are often processed to produce vegetable oils.\r\nUses: Cooking oils, biodiesel, cosmetic products, and for medicinal purposes (like in Ayurveda or homeopathy). They also have nutritional benefits due to their healthy fats.', '2025-01-29 15:45:57', '2025-01-29 19:04:10', 'products/oilseed.jpg', 7),
(120, 'Demo ', 1, '123.00', 1, 'this', '2025-01-30 04:56:32', '2025-01-30 04:56:32', '0', 7);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`subcategory_id`, `subcategory_name`, `category_id`, `image_url`) VALUES
(1, 'Rice', 1, 'products/rice.jpg'),
(2, 'Wheat', 1, 'products/wheat.jpg'),
(3, 'Pulses', 1, 'products/pulses.jpg'),
(4, 'Onion', 2, 'products/onion.jpg'),
(5, 'chili', 2, 'products/chili.jpg'),
(6, 'Tomatoes', 2, 'products/tomato.jpg'),
(7, 'Groundnut', 1, 'products/groundnut.jpg'),
(8, 'Castor', 1, 'products/castor.jpg'),
(9, 'Cotton', 1, 'products/cotton.jpg'),
(10, 'Potato', 2, 'products/potato.jpg'),
(11, 'Garlic', 2, 'products/garlic.jpg'),
(12, 'Brinjal', 2, 'products/brinjal.jpg'),
(13, 'Cloves', 4, 'products/clove.jpg'),
(14, 'Cumin', 4, 'products/cumin.jpg'),
(15, 'Cinnamon', 4, 'products/cinnamon.jpg'),
(16, 'Fennel', 4, 'products/fennel.jpg'),
(17, 'Black Pepper', 4, 'products/blackpepper.jpg'),
(18, 'Apples', 3, 'products/apple.jpg'),
(19, 'Bananas', 3, 'products/banana.jpg'),
(20, 'Oranges', 3, 'products/orange.jpg'),
(21, 'Grapes', 3, 'products/grape.jpg'),
(22, 'Pineapple', 3, 'products/pineapple.jpg'),
(23, 'Blueberry', 3, 'products/blueberry.jpg'),
(24, 'Blackberry', 3, 'products/blackberry.jpg'),
(25, 'Pomegranate', 3, 'products/pomegranate.jpg'),
(26, 'Vegetable Seeds', 5, 'products/vegetableseed.jpg'),
(27, 'Mustard Seeds', 5, 'categories/mustardseed.jpg'),
(28, 'Edible Seeds', 5, 'categories/edibleseed.jpg'),
(29, 'Grain Seeds', 5, 'categories/grainseed.jpg'),
(30, 'Oil Seeds', 5, 'categories/oilseed.jpg'),
(31, 'Fruit Seeds', 5, 'categories/fruitseed.jpg'),
(32, 'Grass Seeds', 5, 'categories/grassseed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `phone`, `email`, `password`, `address`, `registration_date`, `image_url`) VALUES
(2, 'Anshu', '9745785478', 'anshu@gmail.com', 'anshu@123', 'Ahmedabad', '2025-01-30 07:12:24', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`farmer_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `moved_products`
--
ALTER TABLE `moved_products`
  ADD PRIMARY KEY (`moved_product_id`),
  ADD KEY `farmer_id` (`farmer_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `subcategory_id` (`subcategory_id`),
  ADD KEY `fk_product_farmer` (`farmer_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `farmer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `moved_products`
--
ALTER TABLE `moved_products`
  MODIFY `moved_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `moved_products`
--
ALTER TABLE `moved_products`
  ADD CONSTRAINT `moved_products_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `farmers` (`farmer_id`),
  ADD CONSTRAINT `moved_products_ibfk_2` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`subcategory_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_farmer` FOREIGN KEY (`farmer_id`) REFERENCES `farmers` (`farmer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`subcategory_id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
