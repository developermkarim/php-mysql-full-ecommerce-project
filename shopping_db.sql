-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2023 at 01:13 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `com_logo` varchar(100) DEFAULT NULL,
  `com_name` varchar(100) NOT NULL,
  `com_email` varchar(60) NOT NULL,
  `com_phone` varchar(15) DEFAULT NULL,
  `com_address` varchar(255) DEFAULT NULL,
  `cur_format` varchar(10) NOT NULL,
  `admin_role` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `username`, `password`, `com_logo`, `com_name`, `com_email`, `com_phone`, `com_address`, `cur_format`, `admin_role`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, 'Inventory', 'inventory@gmail.com', NULL, NULL, '$', 1);

-- --------------------------------------------------------

--
-- Table structure for table `billing_addresses`
--

CREATE TABLE `billing_addresses` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_apartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `order_notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_addresses`
--

INSERT INTO `billing_addresses` (`id`, `first_name`, `last_name`, `country`, `address_street`, `address_apartment`, `city`, `state`, `postcode`, `phone`, `email`, `order_notes`, `created_at`) VALUES
(1, 'Leila', 'Stanley', 'Quis sit nemo qui om', 'Illo et et omnis exe', 'Sit blanditiis impe', 'Enim aperiam et et o', 'Impedit at sed aut', 'Voluptate ', '+1 (681) 459-1506', 'rebego@mailinator.com', 'Voluptatum occaecat', '2023-09-12 18:49:57'),
(5, 'Xerxes', 'Sanchez', 'Vel quo omnis dolore', 'Corrupti ab fuga C', 'Qui dolor quia sed i', 'Atque eos excepteur', 'Perspiciatis aut po', 'Possimus a', '+1 (663) 576-1363', 'wyrija@mailinator.com', 'Quia ut officia volu', '2023-09-15 08:53:12'),
(6, 'Brent', 'Williamson', 'Lorem minim suscipit', 'Commodo accusamus eo', 'Voluptatem Aut temp', 'Quam dolores velit', 'Temporibus incidunt', 'Veritatis ', '+1 (827) 877-2384', 'xybad@mailinator.com', 'Hic qui duis quod cu', '2023-09-15 08:53:18'),
(7, 'Bruno', 'Odom', 'Nam est eligendi ad', 'Aut et dolor sequi e', 'Magni quis non sunt', 'Reiciendis labore ne', 'Voluptate eos dolori', 'Ut maxime ', '+1 (493) 227-4055', 'henod@mailinator.com', 'Et in dignissimos id', '2023-09-15 09:00:15'),
(8, 'Dakota', 'White', 'Laboris velit corrup', 'Delectus autem iure', 'Animi est voluptate', 'Eu unde cum cum vel', 'In elit non adipisi', 'Inventore ', '+1 (608) 278-2366', 'popypady@mailinator.com', 'Optio nihil dolore', '2023-09-15 09:02:21'),
(9, 'Reece', 'Foley', 'Eligendi nostrum ea', 'Aut consequat Qui n', 'Dolor veritatis dolo', 'Veritatis sunt est q', 'Sit inventore minim', 'Excepteur ', '+1 (197) 664-3884', 'davaqu@mailinator.com', 'Sit deleniti omnis p', '2023-09-15 09:02:43'),
(10, 'Nicholas', 'Moore', 'Perferendis aliqua', 'Labore atque minima', 'Quo neque optio dol', 'Labore soluta nulla', 'Incidunt aliquip ex', 'Est deseru', '+1 (647) 941-8642', 'nusynogyni@mailinator.com', 'Rerum distinctio Ve', '2023-09-15 09:04:21'),
(11, 'Lysandra', 'Fletcher', 'Est eveniet archit', 'Maiores commodi maxi', 'Commodo optio quae', 'A optio consectetur', 'Aut accusamus in aut', 'Quia numqu', '+1 (295) 976-7236', 'qukoku@mailinator.com', 'Aperiam provident o', '2023-09-15 09:07:22'),
(12, 'Ulysses', 'Cooper', 'Rerum ad quo tempora', 'Vero aute odio sit a', 'Quo non consectetur', 'Quia sint quo quos e', 'Consequatur quia of', 'Esse volup', '+1 (242) 882-9252', 'wypaq@mailinator.com', 'Magni sunt eu commod', '2023-09-15 09:07:51'),
(13, 'Slade', 'Curtis', 'Ut sed molestias omn', 'Reprehenderit minus', 'Amet fugiat amet', 'Officia id officiis', 'Sit enim aliqua Ali', 'Non delect', '+1 (899) 364-8401', 'cepufe@mailinator.com', 'Hic officia aut volu', '2023-09-15 10:57:57'),
(14, 'Myles', 'Emerson', 'Culpa molestiae offi', 'Ex est perspiciatis', 'At consectetur aut e', 'Ut ipsum molestiae q', 'Saepe quisquam repel', 'Sed nihil ', '+1 (705) 986-8032', 'kajijoles@mailinator.com', 'Eveniet impedit au', '2023-09-15 10:58:15'),
(15, 'Joy', 'Lucas', 'Aliquid ex laborum d', 'Reiciendis voluptati', 'Itaque eos possimus', 'Cupidatat eum rem di', 'Quia esse nihil rer', 'Vel adipis', '+1 (108) 686-6905', 'femukoxoq@mailinator.com', 'Voluptates sit omnis', '2023-09-15 10:59:32'),
(16, 'Aline', 'Herman', 'Dolor adipisci nihil', 'Animi molestiae obc', 'Provident ea numqua', 'Aut nulla enim autem', 'Nihil quas tenetur d', 'Tempora ut', '+1 (923) 754-4543', 'jisuko@mailinator.com', 'Id cupiditate sit', '2023-09-15 10:59:41'),
(17, 'Wanda', 'Rojas', 'Quo esse quis ullamc', 'Maxime est nulla aut', 'Veniam anim deserun', 'Error rerum facilis', 'Aute autem beatae eu', 'Ratione op', '+1 (608) 272-9489', 'rawulibyp@mailinator.com', 'Voluptatibus deserun', '2023-09-15 11:00:01'),
(18, 'Hedley', 'Leon', 'Quis minus ut veniam', 'Ullamco cum ducimus', 'Laudantium est offi', 'In quidem voluptas v', 'Nihil explicabo Sin', 'Repudianda', '+1 (982) 192-4289', 'catetytywi@mailinator.com', 'Culpa vitae alias vo', '2023-09-15 11:00:14'),
(19, 'Adele', 'Guerrero', 'Aliquip mollitia lab', 'Esse eu repudiandae', 'Qui qui nisi deserun', 'Officia impedit ven', 'Perspiciatis sunt', 'Id eum vel', '+1 (477) 495-3763', 'tazy@mailinator.com', 'Neque ea laudantium', '2023-09-15 11:06:59'),
(20, 'Whoopi', 'Dickerson', 'Reiciendis aliquid p', 'Dignissimos sed quib', 'Ea esse repudiandae', 'Do vero quia digniss', 'Voluptas reprehender', 'Eos illo d', '+1 (279) 511-6299', 'tyzatu@mailinator.com', 'Dignissimos est duis', '2023-09-15 11:07:09'),
(21, 'Lani', 'Hunt', 'Cillum voluptate adi', 'In quidem in volupta', 'Optio ullam sit vel', 'Molestias cupiditate', 'Est rerum voluptatu', 'Voluptatem', '+1 (583) 837-6971', 'vycacyli@mailinator.com', 'Est placeat cumque', '2023-09-15 11:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL,
  `brand_cat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`, `brand_cat`) VALUES
(13, 'Realme', 9),
(12, 'Lenovo', 9),
(11, 'LG', 9),
(10, 'Samsung', 9),
(15, 'Walton', 24),
(22, 'Hatil', 13),
(24, 'Rupa', 23),
(20, 'Regal', 12),
(27, 'Armani', 23);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(45) NOT NULL,
  `product_id` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` decimal(50,0) NOT NULL,
  `user_id` int(50) NOT NULL,
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `quantity`, `price`, `user_id`, `updated_at`, `created_at`) VALUES
(157, 20, 3, '876', 40, '2023-09-10 16:43:29.169403', '2023-09-10 16:43:29'),
(158, 21, 1, '876', 40, '2023-09-08 06:48:32.879616', '2023-09-08 06:48:32'),
(180, 21, 4, '876', 43, '2023-09-12 09:58:04.768499', '2023-09-12 09:58:04'),
(181, 20, 7, '876', 43, '2023-09-15 11:10:43.593403', '2023-09-15 11:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL,
  `products` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `products`) VALUES
(12, 'Furniture', 0),
(13, 'Hardware', 0),
(23, 'Cloths', 0),
(24, 'Electronics', 0),
(30, 'Machinery', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `value`, `status`, `created_at`, `updated_at`) VALUES
(16, 'GOLD', 'GD45FQWT', '350', 1, NULL, NULL),
(17, 'SILVER', 'SRD48PVX', '220', 1, NULL, NULL),
(18, 'PLATINUM', 'PM521TEQ', '380', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `credit_cards`
--

CREATE TABLE `credit_cards` (
  `id` int(11) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiry_date` varchar(7) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_cards`
--

INSERT INTO `credit_cards` (`id`, `card_number`, `expiry_date`, `cvv`, `amount`) VALUES
(1, '4532015112830366', '09/23', '123', '1000.00'),
(2, '4916186500886158', '05/24', '456', '250.50'),
(3, '4024007127564247', '11/25', '789', '500.75'),
(4, '4716461587871985', '03/26', '234', '750.25'),
(5, '5469711978638757', '07/27', '567', '200.00'),
(6, '6011362890418543', '08/28', '890', '300.99'),
(7, '4556118708385412', '01/29', '123', '150.25'),
(8, '4916251538449540', '12/30', '456', '900.75'),
(9, '4024007123456789', '06/31', '789', '750.00'),
(10, '4929419667779634', '02/32', '234', '420.50'),
(11, '5555555555554444', '10/23', '123', '200.00'),
(12, '4111111111111111', '11/23', '456', '350.75'),
(13, '378282246310005', '01/24', '789', '600.25'),
(14, '6011111111111117', '09/24', '234', '150.50'),
(15, '3530111333300000', '07/25', '567', '900.99'),
(16, '5555555555555555', '12/26', '890', '750.25'),
(17, '340000000000009', '02/27', '123', '420.75'),
(18, '6011000990139424', '05/28', '456', '350.00'),
(19, '371449635398431', '04/29', '789', '250.50'),
(20, '6011000400000000', '03/30', '234', '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `s_no` int(11) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_title` varchar(100) DEFAULT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_desc` varchar(255) DEFAULT NULL,
  `footer_text` varchar(100) NOT NULL,
  `currency_format` varchar(20) NOT NULL,
  `contact_phone` varchar(15) DEFAULT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`s_no`, `site_name`, `site_title`, `site_logo`, `site_desc`, `footer_text`, `currency_format`, `contact_phone`, `contact_email`, `contact_address`) VALUES
(1, 'Super Market', 'Online Shopping Project for Mobiles, Clothes, Electronics and many more....', '16886037391607398563shopping-logo.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, perspiciatis quia repudiandae sapiente sed sunt.', 'Copyright 2023', 'Rs.', '9876541230', 'email@email1.com', '#123, Lorem Ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `product_qty` varchar(100) NOT NULL,
  `total_amount` varchar(10) NOT NULL,
  `product_user` int(11) NOT NULL,
  `order_date` varchar(11) NOT NULL,
  `pay_req_id` varchar(100) DEFAULT NULL,
  `confirm` tinyint(4) NOT NULL DEFAULT 0,
  `delivery` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_id`, `product_id`, `product_qty`, `total_amount`, `product_user`, `order_date`, `pay_req_id`, `confirm`, `delivery`) VALUES
(55, '18,', '1,', '52000', 40, '2023-09-12', 'bce523ee106e4b59bae3428535ad2363', 0, 0),
(37, '4,12,', '2,1,', '94279', 4, '2020-12-01', 'd19818d2ba3543ffa03a79a7eb64901b', 0, 0),
(36, '10,11,12,', '1,1,1,', '1342', 4, '2020-12-01', 'df952fa6bacd4f389de80b1080ed3871', 0, 1),
(39, '11,12,', '1,1,', '1058', 2, '2020-12-01', '700bf310ca4a4697b59184f61309275a', 0, 0),
(54, '18,', '1,', '52000', 40, '2023-09-12', '2cdbd366e47f4bb39cb89c63779ffec8', 0, 0),
(53, '18,', '1,', '52000', 40, '2023-09-12', '', 0, 0),
(42, '11,12,', '1,1,', '1058', 2, '2020-12-02', '153427404661463f83a5e8bd080a95e9', 0, 0),
(52, '24,', '1,', '599', 43, '2023-09-06', '', 0, 0),
(51, '24,', '45,', '26955', 43, '2023-09-06', '', 0, 0),
(45, '12,13,', '1,1,', '1532', 2, '2020-12-02', '63148f0e7b7043f5a5e470a9ac1d3dde', 0, 1),
(46, '12,', '1,', '299', 2, '2020-12-04', '3c209af45445486c8aefb6cfb55dcbb7', 0, 0),
(47, '21,', '1,', '876', 31, '2023-07-08', 'eb39dcf03a21477ab9143c75eb4e4be2', 0, 0),
(48, '21,', '1,', '876', 31, '2023-07-08', 'aa74348203b447a3926319dcf75d89e2', 0, 0),
(49, '19,', '2,', '37998', 31, '2023-07-08', 'afb39336431a424098fa0a36c8543b13', 0, 0),
(50, '17,19,', '2,1,', '122999', 31, '2023-07-08', '577da7758b0f49b581211202464c3c02', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `item_number`, `txn_id`, `payment_gross`, `currency_code`, `payment_status`) VALUES
(5, '11', 'd388939cdaca4087acca75574a34b035', 759.00, '', 'credit'),
(6, '12', '4e2738d7eade4f57b5fd32434239d35f', 299.00, '', 'credit'),
(7, '12', 'd7a5b179cd07480782fc2d21edec7031', 299.00, '', 'credit'),
(8, '12', 'a0f61b1acd6b444ba5856cc4387e7710', 299.00, '', 'pending'),
(9, '12', '0e2fdf1541994d338c676201097d2481', 598.00, '', 'credit'),
(10, '12', '8b0791e3eb764e45b497b0f0c401d9d6', 299.00, '', 'credit'),
(11, '12', '92c9c474ae864d01b81f7e2f4d3a098e', 299.00, '', 'credit'),
(20, '11', '6863fbdf68be45d5a77aa01774a80885', 759.00, '', 'credit'),
(21, '11', 'ee7d6cea937c4f06b6e5e1fffe47b778', 759.00, '', 'credit'),
(22, '12', 'f7ce91d5964c462fa3972f6cb5373d4a', 299.00, '', 'credit'),
(23, '11', '939d866425ef479c84e276e664ce5a31', 1518.00, '', 'credit'),
(29, '10,11,12,', 'df952fa6bacd4f389de80b1080ed3871', 1342.00, '', 'credit'),
(30, '4,12,', 'd19818d2ba3543ffa03a79a7eb64901b', 94279.00, '', 'pending'),
(31, '11,12,', '2c648ec714914c18b447309d691b7eef', 1058.00, '', 'credit'),
(32, '11,12,', '700bf310ca4a4697b59184f61309275a', 1058.00, '', 'credit'),
(33, '11,12,', '639ccfba60cd41eeba02ba5ff1849249', 1058.00, '', 'credit'),
(34, '11,12,', '792c6616026948e48a2fcc07eb35c158', 1058.00, '', 'credit'),
(35, '11,12,', '153427404661463f83a5e8bd080a95e9', 1058.00, '', 'credit'),
(36, '11,12,', '37473185580340ab8c54d102204c7bf9', 1058.00, '', 'credit'),
(37, '11,12,', '2bb8d2ccf3544d0089d211abf4d55e36', 1058.00, '', 'credit'),
(38, '12,13,', '63148f0e7b7043f5a5e470a9ac1d3dde', 1532.00, '', 'credit'),
(39, '12,', '3c209af45445486c8aefb6cfb55dcbb7', 299.00, '', 'credit'),
(40, '21,', 'eb39dcf03a21477ab9143c75eb4e4be2', 876.00, '', 'credit'),
(41, '21,', 'aa74348203b447a3926319dcf75d89e2', 876.00, '', 'credit'),
(42, '19,', 'afb39336431a424098fa0a36c8543b13', 37998.00, '', 'credit'),
(43, '17,19,', '577da7758b0f49b581211202464c3c02', 122999.00, '', 'credit'),
(44, '24,', '', 26955.00, '', 'credit'),
(45, '24,', '', 599.00, '', 'credit'),
(46, '18,', '', 52000.00, '', 'credit'),
(47, '18,', '2cdbd366e47f4bb39cb89c63779ffec8', 52000.00, '', 'credit'),
(48, '18,', 'bce523ee106e4b59bae3428535ad2363', 52000.00, '', 'credit');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_sub_cat` int(11) NOT NULL,
  `product_brand` int(100) DEFAULT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_desc` text NOT NULL,
  `featured_image` text NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `product_keywords` text DEFAULT NULL,
  `product_views` int(11) DEFAULT 0,
  `product_status` int(11) NOT NULL DEFAULT 1,
  `featured_product` tinyint(11) DEFAULT NULL,
  `product_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_cat`, `product_sub_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `featured_image`, `qty`, `product_keywords`, `product_views`, `product_status`, `featured_product`, `product_date`) VALUES
(17, '639c919ba8677', 9, 18, 13, 'Realme-15 Pro Latest 5G', '52000', 'realme pro plus 5G Mobile set', '1671205275banner-img.png', 14, NULL, 9, 1, 1, '2023-01-26'),
(18, '639c94a41c78e', 9, 18, 13, 'Realme-15 Pro Latest 45 new', '52000', 'realme pro plus 5G Mobile set', '1671206052banner-img.png', 14, NULL, 1, 0, 1, '2023-08-26'),
(19, '639cb19711537', 9, 18, 10, 'Lenovo 13 G6', '18999', 'sadffffffffffffffffsdfsdfsdfsdfddsftest', '16712134635-2-apple-iphone-png-picture1.png', 8, NULL, 5, 1, 0, '2023-08-26'),
(20, '63a171e72ffea', 12, 23, 0, 'Realme C3 (Volcano Grey, 32 GB)  (3 GB RAM)', '876', 'Magnam et in sunt et', '1671524839D1301D76-E04D-EF09-6195-53229DE6D543-1-removebg-preview.png', 272, NULL, 4, 1, 1, '2023-01-26'),
(21, '63a171f5f3713', 23, 30, 21, 'Navana Show', '876', 'Magnam et in sunt et', '517shoe.jpg', 272, NULL, 8, 1, 1, '2023-08-26'),
(24, '64eb6b807d888', 23, 29, 24, 'Pollo-Tshirt', '599', '&lt;font color=&quot;#bdc1c6&quot; face=&quot;arial, sans-serif&quot;&gt;Shop for the latest men\'s t-shirts online at Apex4u. Men\'s T-Shirts that are comfortable and affordable online in Bangladesh&lt;/font&gt;&lt;br&gt;', '1693150080bb48409213d9edf44655a4b7639fe874.jpg-400x400q75-product.jpg-.webp', 12, NULL, 8, 1, 0, '2023-08-27');

-- --------------------------------------------------------

--
-- Table structure for table `product_cart`
--

CREATE TABLE `product_cart` (
  `s_no` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_apartment` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `user_id`, `first_name`, `last_name`, `country`, `address_street`, `address_apartment`, `city`, `state`, `postcode`, `phone`, `created_at`) VALUES
(8, 43, 'fsdasdfdf', 'sdafsdafsdf', 'tyrty', 'tytry', 'dfgdg', 'dfgdfg', 'dfgdfg', '4546', '565456456', '2023-09-12 16:55:16'),
(9, 40, 'Angelica', 'Peterson', 'Sunt qui est ipsum u', 'Temporibus magna ali', 'Nostrum non ratione', 'Deserunt impedit er', 'Repellendus Laborum', '29643', '+1 (903) 696-6551', '2023-09-12 17:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_cat_id` int(11) NOT NULL,
  `sub_cat_title` varchar(100) NOT NULL,
  `cat_parent` int(11) NOT NULL,
  `cat_products` int(11) NOT NULL DEFAULT 0,
  `show_in_header` tinyint(4) NOT NULL DEFAULT 1,
  `show_in_footer` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_cat_id`, `sub_cat_title`, `cat_parent`, `cat_products`, `show_in_header`, `show_in_footer`) VALUES
(19, 'Laptops', 9, 0, 1, 0),
(21, 'Camera', 9, 0, 1, 0),
(20, 'Speakers', 9, 0, 1, 0),
(18, 'Mobiles', 9, 0, 1, 1),
(23, 'Tableware', 12, 0, 1, 0),
(24, 'Living Room', 12, 0, 1, 1),
(25, 'Beds', 12, -1, 1, 1),
(26, 'Men\'s T-Shirts', 10, 0, 1, 1),
(27, 'Kurti\'s', 11, -1, 0, 1),
(28, 'Sarees', 11, 0, 1, 1),
(30, 'Lubnan', 23, 0, 1, 1),
(29, 'panjabi', 23, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_code` varchar(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('pending','completed','failed') DEFAULT NULL,
  `payment_method` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_code`, `user_id`, `amount`, `description`, `status`, `payment_method`, `created_at`) VALUES
(4, '2465043914A4916', 43, '4298.00', 'Voluptates sit omnis', 'pending', 'nagad', '2023-09-15 10:59:32'),
(5, '65043AD3835B8', 43, '4298.00', 'Neque ea laudantium', 'pending', 'bkash', '2023-09-15 11:06:59'),
(6, '65043ADD2084D', 43, '4298.00', 'Dignissimos est duis', 'pending', 'bkash', '2023-09-15 11:07:09'),
(7, '65043B0E1D391', 43, '4298.00', 'Est placeat cumque ', 'pending', 'cash', '2023-09-15 11:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `user_role` int(11) DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `f_name`, `l_name`, `username`, `email`, `password`, `mobile`, `address`, `city`, `user_role`) VALUES
(2, 'user12', 'user', 'user@gmail.com', '', '24c9e15e52afc47c225b757e7bee1f9d', '9856231042', '#1234', 'delhi', 1),
(3, 'user2', 'user last', 'user2@gmail.com', '', '7e58d63b60197ceb55a1c487989a3720', '9999999999', '#kdjfg s gfd gdfjgkdsf gsdfkgjk', 'Delhi', 1),
(4, 'user3', 'user last', 'user3@gmail.com', '', '92877af70a45fd6a2ed7fe81e1236b78', '9999999999', '#hsd sdfsd fs df asdf', 'dsf asdf a', 1),
(5, 'user testing', 'user last', 'user4@gmail.com', '', '3f02ebe3d7929b091e3d8ccfde2f3bc6', '999999999', '#dsjg sdf sd f', 'dskfs f aslkf', 0),
(35, 'Tarik Potter', 'Demetrius Kennedy', 'degifefit@mailinator.com', '', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Do aliquid nece', 'Facilis excepteur ei', 'Quaerat veniam mini', 1),
(36, 'Tarik Potter', 'Demetrius Kennedy', 'degifefit@mailinator.com', '', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '4544445', 'Facilis excepteur ei', 'Quaerat veniam mini', 1),
(40, 'Mahmodul', 'Karim', 'halim@gmail.com', '', '2ee5a5e86bbfb546b1df5c094fe1a541', '016471135811', 'Khan Mension,Muhammad Pur,', 'Chittagong', 1),
(39, 'Wesley Merrill', 'Helen Wilkins', 'picu@mailinator.com', '', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '6456456456', 'Quos laboriosam sun', 'Est voluptas cumque', 1),
(38, 'Salvador Vang', 'Georgia Conrad', 'simusytl@mailinator.com', '', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '78545665', 'Ut maxime veniam qu', 'Consectetur quas si', 1),
(37, 'Salvador Vang', 'Georgia Conrad', 'simusyl@mailinator.com', '', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '78545665', 'Ut maxime veniam qu', 'Consectetur quas si', 1),
(34, 'Caldwell French', 'Hadassah Cochran', 'sywarelu4@mailinator.com', '', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '4564564564533', 'Voluptas vel ipsum s', 'Sed velit sunt qui', 1),
(33, 'Caldwell French', 'Hadassah Cochran', 'sywarelu@mailinator.com', '', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '45645645645', 'Voluptas vel ipsum s', 'Sed velit sunt qui', 1),
(32, 'Mahmodul', 'Karim', 'user32@gmail.com', '', '21232f297a57a5a743894a0e4a801fc3', '016471135812', 'Panthpath, Dhaka, Bangladesh', 'Dhaka', 1),
(31, 'Mahmodul', 'Karim', 'm.karimcu@gmail.com', '', '827ccb0eea8a706c4c34a16891f84e7b', '01647113581', 'Panthpath, Dhaka, Bangladesh', 'Dhaka', 1),
(41, 'Jessica Strickland', 'Stacy Rivers', 'user12345@gmail.com', '', 'ee11cbb19052e40b07aac0ca060c23ee', '45646686', 'Ut commodo tempora v', 'Nulla et maxime cons', 1),
(42, 'Mahmodul', 'Karim', 'user333@gmail.com', '', 'ee11cbb19052e40b07aac0ca060c23ee', '016471135814', 'Panthpath, Dhaka, Bangladesh', 'Dhaka', 1),
(43, 'Borhan', 'Uddin', 'borhan@gmail.com', '', 'ee11cbb19052e40b07aac0ca060c23ee', '0157656456', 'Molestiae dolor labo', 'Labore ex quae ipsum', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_cart`
--
ALTER TABLE `product_cart`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_cat_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_code` (`transaction_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_cart`
--
ALTER TABLE `product_cart`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
