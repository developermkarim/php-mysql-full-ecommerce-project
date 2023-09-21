-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2023 at 06:42 AM
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
(21, 'Lani', 'Hunt', 'Cillum voluptate adi', 'In quidem in volupta', 'Optio ullam sit vel', 'Molestias cupiditate', 'Est rerum voluptatu', 'Voluptatem', '+1 (583) 837-6971', 'vycacyli@mailinator.com', 'Est placeat cumque', '2023-09-15 11:07:57'),
(22, 'Shaine', 'Fry', 'Officia quod hic con', 'Nisi et dolore omnis', 'Ut voluptatibus ut s', 'Corporis dolorem do', 'Ut maiores nostrud i', 'Esse nulla', '+1 (783) 348-6356', 'xadejokar@mailinator.com', 'Aperiam qui magni qu', '2023-09-15 13:48:54'),
(23, 'Byron', 'Mcdowell', 'Magnam in iusto volu', 'Dolor ratione qui fa', 'Voluptate qui commod', 'Alias sed sint odit', 'Anim mollitia verita', 'Aspernatur', '+1 (692) 333-8644', 'hepyca@mailinator.com', 'Minima aspernatur sa', '2023-09-15 13:55:50'),
(24, 'Nina', 'Waters', 'Deleniti nesciunt l', 'In deserunt fugit a', 'Eligendi vel veritat', 'Libero consectetur', 'Sed quia aut numquam', 'Quos eiusm', '+1 (124) 226-1884', 'qetadagumu@mailinator.com', 'Quae ea quasi dolore', '2023-09-15 18:24:43'),
(25, 'Forrest', 'Dejesus', 'Voluptatem quaerat c', 'Maxime eaque adipisc', 'Et culpa omnis lore', 'Minus vitae officia', 'Dolorum culpa sunt', 'In eveniet', '+1 (171) 376-4798', 'juwukanuru@mailinator.com', 'Exercitation et id', '2023-09-15 18:45:36'),
(26, 'Simon', 'Potts', 'Quia aliqua Magna e', 'Asperiores tempore', 'Ipsam unde rerum vol', 'Voluptates qui dolor', 'Incidunt nostrud co', 'Irure natu', '+1 (375) 796-9542', 'cesehohydy@mailinator.com', 'Pariatur Molestias', '2023-09-15 18:45:52'),
(27, 'Carly', 'Sears', 'Voluptatem itaque am', 'Qui nulla qui aute b', 'Provident necessita', 'Animi voluptate in', 'Aliquam et laudantiu', 'Saepe culp', '+1 (416) 281-3286', 'fuqen@mailinator.com', 'Molestias deserunt v', '2023-09-15 18:46:40'),
(28, 'Sharon', 'Francis', 'Et numquam vel lauda', 'Assumenda saepe fugi', 'Porro explicabo Opt', 'Non voluptates omnis', 'Quis voluptate possi', 'Maxime sun', '+1 (381) 226-3789', 'qafosa@mailinator.com', 'Eaque laborum Itaqu', '2023-09-15 18:48:58'),
(29, 'Mallory', 'Flowers', 'Est in incidunt un', 'Dolor autem in enim', 'Non sed assumenda mo', 'Anim praesentium mag', 'Eu quos voluptas cor', 'Ex ipsum v', '+1 (699) 932-9009', 'riciqoguq@mailinator.com', 'Aut accusamus volupt', '2023-09-15 18:53:51'),
(30, 'Randall', 'Nicholson', 'Optio error autem n', 'Provident assumenda', 'In tempor ut dolorem', 'Magnam aut voluptate', 'Qui a saepe eveniet', 'Praesentiu', '+1 (552) 706-5172', 'gunizup@mailinator.com', 'Voluptatem qui aut', '2023-09-15 18:54:27'),
(31, 'Edward', 'Everett', 'Quod aut molestiae u', 'Qui sit ut eos reic', 'Voluptate enim Nam i', 'Beatae voluptas id', 'Amet consequuntur u', 'Consequatu', '+1 (452) 445-3994', 'zisib@mailinator.com', 'Quibusdam deserunt a', '2023-09-15 18:55:52'),
(32, 'Gregory', 'Bernard', 'Occaecat quasi dolor', 'Pariatur Assumenda', 'Est dolore sint sed', 'Voluptatem porro ma', 'Dolor nisi consequat', 'Quis magni', '+1 (617) 474-3149', 'dyfobofify@mailinator.com', 'In consequatur rerum', '2023-09-15 19:01:46'),
(33, 'Sacha', 'Macdonald', 'Laboriosam consequa', 'Eiusmod perferendis', 'Tempore labore repe', 'Velit sit eu distinc', 'Et obcaecati fugiat', 'Laudantium', '+1 (464) 631-4522', 'nabequdid@mailinator.com', 'Aliquam occaecat off', '2023-09-15 19:05:12'),
(34, 'Teegan', 'Silva', 'Ipsum est aut ut ni', 'Velit aut maxime di', 'Occaecat ducimus te', 'Fugiat commodo labor', 'Aut reprehenderit re', 'Quo earum ', '+1 (105) 663-1877', 'dydyxa@mailinator.com', 'Enim qui atque sunt', '2023-09-15 19:07:09'),
(35, 'Solomon', 'Oneil', 'Exercitation maxime', 'Itaque ut mollit in', 'Sed et enim dolores', 'Rerum rerum aut mole', 'Alias cillum facere', 'Enim deser', '+1 (809) 123-3569', 'xawab@mailinator.com', 'Impedit voluptatem', '2023-09-15 19:08:43'),
(36, 'Violet', 'Jefferson', 'Ex cupiditate qui do', 'Ut et aut sed labori', 'Officia est consecte', 'Magni nesciunt magn', 'Aut corrupti lorem', 'Est dolore', '+1 (355) 782-6489', 'vuxedanuwi@mailinator.com', 'Minim dignissimos en', '2023-09-15 19:10:38'),
(37, 'Morgan', 'Keith', 'Ad tempora voluptas', 'Dolore aut voluptate', 'Laboris quas modi qu', 'Commodo et excepturi', 'Deleniti aut proiden', 'Qui ex eu ', '+1 (872) 587-1529', 'lyhys@mailinator.com', 'Voluptate nihil moll', '2023-09-15 19:21:47'),
(38, 'Sydney', 'Rasmussen', 'Totam autem est even', 'Dolor est amet sed', 'In deserunt soluta e', 'Nostrum laboris at v', 'Nihil laborum volupt', 'Qui et lab', '+1 (842) 568-4407', 'sunakifasu@mailinator.com', 'Autem impedit archi', '2023-09-15 19:32:34'),
(39, 'Alden', 'England', 'Quo proident evenie', 'Corrupti reiciendis', 'Veritatis enim rerum', 'Dolor do sed qui fug', 'Provident amet dol', 'Rerum eius', '+1 (407) 925-7403', 'zypefuzur@mailinator.com', 'Aliquam esse quia r', '2023-09-16 05:34:30'),
(40, 'Madison', 'Middleton', 'Excepturi excepturi', 'Dolor esse consequun', 'Nulla eius dolorem s', 'Ex dignissimos offic', 'Laborum proident do', 'Sint sed e', '+1 (142) 441-6393', 'raki@mailinator.com', 'Laborum culpa quis c', '2023-09-16 06:09:37'),
(41, 'Harlan', 'Hayden', 'Veniam omnis in adi', 'Fuga Ut cum ea aute', 'Veniam non nostrum', 'Mollitia quia praese', 'Voluptatem Et cum r', 'Officiis d', '+1 (477) 788-1738', 'hobam@mailinator.com', 'Eos accusantium sit', '2023-09-16 18:41:35'),
(42, 'Paloma', 'Mooney', 'Qui quibusdam volupt', 'Repudiandae rem dolo', 'Ratione laborum Aut', 'Deserunt in error eo', 'Illo voluptas offici', 'Id quia al', '+1 (768) 481-3003', 'vuwedigino@mailinator.com', 'Rerum odio ipsa sim', '2023-09-17 02:30:07'),
(43, 'Rowan', 'Collins', 'Totam vitae officia', 'Eaque voluptates ips', 'A rem aliquam rem qu', 'Esse aut vitae veni', 'Aut minim incididunt', 'Tempor bla', '+1 (544) 168-5413', 'fusu@mailinator.com', 'Et similique nemo vo', '2023-09-17 02:36:38'),
(44, 'Merrill', 'Munoz', 'Possimus commodi qu', 'Ad reprehenderit sus', 'Velit excepteur et', 'Numquam consectetur', 'Deleniti sunt quia h', 'Eu minim u', '+1 (862) 543-2828', 'pefevozek@mailinator.com', 'Dignissimos quis ut', '2023-09-17 02:39:00'),
(45, 'Armando', 'Hurst', 'Quia et elit non vo', 'Sed inventore obcaec', 'Enim sed vel perfere', 'Fuga Fuga Blanditi', 'Et excepteur dolorum', 'Aut tempor', '+1 (384) 465-7624', 'hubatuhiv@mailinator.com', 'Duis sit placeat v', '2023-09-17 02:47:41'),
(46, 'Kimberley', 'Robertson', 'Aute saepe voluptate', 'Ipsam nihil deleniti', 'Sint ea et hic incid', 'Laborum Veniam eli', 'Impedit laborum per', 'Ipsum pari', '+1 (872) 146-2243', 'hami@mailinator.com', 'Ea consequatur Ea v', '2023-09-17 02:52:01'),
(47, 'Cleo', 'Stanton', 'Amet quaerat volupt', 'Id exercitationem pa', 'Non nobis ea tempori', 'Ullam quidem dicta o', 'Molestias dolor est', 'Iusto volu', '+1 (348) 508-1285', 'kesazax@mailinator.com', 'Illum est ex nobis', '2023-09-17 02:53:55'),
(48, 'Debra', 'Garner', 'Et dolor vero quae i', 'Voluptatem suscipit', 'Similique ut vel fac', 'Voluptates est eu de', 'Rerum sit irure sin', 'Ut aut sed', '+1 (944) 784-3298', 'lehamopuq@mailinator.com', 'Aliquam eius ipsam s', '2023-09-17 02:56:10'),
(49, 'Kadeem', 'Avila', 'Eos velit aut quis', 'Est repellendus Rei', 'In esse quo voluptat', 'Reprehenderit recusa', 'Impedit itaque cons', 'Rerum inve', '+1 (741) 279-5479', 'dacaremota@mailinator.com', 'Lorem nihil perspici', '2023-09-17 03:21:26'),
(50, 'Lisandra', 'David', 'Tempora irure sed qu', 'Sint quaerat verita', 'Ducimus sint sint v', 'Est ad exercitatione', 'Iusto sapiente conse', 'Quis volup', '+1 (436) 437-1775', 'zyputyhacy@mailinator.com', 'Voluptatem Proident', '2023-09-17 03:28:21'),
(51, 'Kelsie', 'Bradley', 'Laborum in perferend', 'Eum ut in ab id quo', 'Id fuga Molestiae c', 'Illum eius fugiat', 'Ut in sunt magnam si', 'Consectetu', '+1 (901) 833-1668', 'zukubufa@mailinator.com', 'Obcaecati sunt quae', '2023-09-17 03:30:49'),
(52, 'Raphael', 'Boone', 'Sint quisquam nulla', 'Maiores est veniam', 'Et laborum est quae', 'Ex eu minima maxime', 'Ut mollitia laborum', 'Est sit de', '+1 (676) 688-1631', 'wemy@mailinator.com', 'Ut voluptatibus dolo', '2023-09-17 03:36:28'),
(53, 'Mercedes', 'Hubbard', 'Dolor placeat ut do', 'Placeat ut qui est', 'Tenetur ad ut commod', 'Dolore adipisicing t', 'Cumque placeat ea i', 'Ut odit ve', '+1 (364) 402-4017', 'monenuhe@mailinator.com', 'Hic aut aut pariatur', '2023-09-17 03:47:43'),
(54, 'Armand', 'Foley', 'Quibusdam lorem maio', 'Omnis possimus esse', 'In non ut sed recusa', 'Autem ut earum autem', 'Modi sunt praesentiu', 'Explicabo ', '+1 (743) 431-1465', 'vukycyjonu@mailinator.com', 'Tempor aliqua Esse', '2023-09-17 04:25:37'),
(55, 'Kaye', 'Wynn', 'Lorem et voluptas id', 'Facere irure officii', 'Voluptatem Ratione', 'Impedit dolore qui', 'Error et ut duis vol', 'Commodo id', '+1 (265) 876-7614', 'kasybiwoba@mailinator.com', 'Adipisci quos et et', '2023-09-17 04:29:02'),
(56, 'Allen', 'Vaughan', 'Non architecto assum', 'Sed eaque maxime exe', 'Amet vero consequat', 'Magni duis at sed al', 'Tenetur in aut cupid', 'Repudianda', '+1 (164) 367-1412', 'zewukud@mailinator.com', 'A tempore alias des', '2023-09-17 04:35:28');

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
(205, 76, 3, '30', 43, '2023-09-19 06:24:54.837493', '2023-09-19 06:24:54'),
(206, 79, 1111, '500', 43, '2023-09-19 06:24:46.296537', '2023-09-19 06:24:46'),
(208, 92, 1, '72', 43, '2023-09-19 18:12:23.437886', '2023-09-19 18:12:23');

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
(12, 'Home and Furniture', 0),
(13, 'Hardware', 0),
(23, 'Clothing', 0),
(24, 'Electronics', 0),
(30, 'Machinery', 0),
(32, 'Food and Groceries', 0),
(33, 'Health and Beauty', 0);

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
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `image_path` varchar(150) DEFAULT NULL,
  `gallery_image` varchar(150) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `product_id`, `product_name`, `image_path`, `gallery_image`, `upload_date`) VALUES
(1, 86, '', '', 'gallery_img-114-jpg', '2023-09-19 15:37:49'),
(2, 86, '', '', 'gallery_img-665-webp', '2023-09-19 15:37:49'),
(3, 86, '', '', 'gallery_img-291-webp', '2023-09-19 15:37:50'),
(4, 87, '', '', 'gallery_img-138-jpg', '2023-09-19 15:38:11'),
(5, 87, '', '', 'gallery_img-718-webp', '2023-09-19 15:38:12'),
(6, 87, '', '', 'gallery_img-200-webp', '2023-09-19 15:38:12'),
(10, 92, '348fg', 'admin/product_images/gallery_img-249-jpg', 'gallery_img-249-jpg', '2023-09-19 18:10:37'),
(11, 92, '348fg', 'admin/product_images/gallery_img-841-jpeg', 'gallery_img-841-jpeg', '2023-09-19 18:10:37'),
(12, 92, '348fg', '/admin/product_images/gallery_img-940-jpg', 'gallery_img-940-jpg', '2023-09-19 18:10:37');

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
  `user_id` int(11) NOT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('Pending','Processing','Shipped','Delivered') COLLATE utf8_unicode_ci DEFAULT 'Pending',
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tracking_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_code` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `user_id`, `address`, `status`, `transaction_id`, `tracking_id`, `currency`, `order_code`) VALUES
(34, 'Kaye Wynn', 'kasybiwoba@mailinator.com', '+1 (265) 876-7614', 1670, 43, 'Facere irure officii,Voluptatem Ratione,Error et ut duis vol,Impedit dolore qui,Lorem et voluptas id', 'Pending', '6506808E9AD34', '6506808EAEF3E', 'BDT', '#924250'),
(35, 'Allen Vaughan', 'zewukud@mailinator.com', '+1 (164) 367-1412', 1670, 43, 'Sed eaque maxime exe,Amet vero consequat,Tenetur in aut cupid,Magni duis at sed al,Non architecto assum', 'Pending', '65068210CA69F', '65068210D9448', 'BDT', '#A94AC9');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `user_id`, `price`, `quantity`, `created_at`) VALUES
(1303, 34, 20, 43, 3504, 4, '2023-09-17 04:35:28'),
(1304, 35, 20, 43, 3504, 4, '2023-09-17 04:35:28'),
(1305, 34, 21, 43, 876, 1, '2023-09-17 04:35:29'),
(1306, 35, 21, 43, 876, 1, '2023-09-17 04:35:29');

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
(18, '639c94a41c78e', 9, 18, 13, 'Realme-15 Pro Latest 45 new', '52000', 'realme pro plus 5G Mobile set', '1671206052banner-img.png', 14, NULL, 1, 0, 1, '2023-08-26'),
(19, '639cb19711537', 9, 18, 10, 'Lenovo 13 G6', '18999', 'sadffffffffffffffffsdfsdfsdfsdfddsftest', '16712134635-2-apple-iphone-png-picture1.png', 8, NULL, 5, 1, 0, '2023-08-26'),
(20, '63a171e72ffea', 12, 23, 0, 'Realme C3 (Volcano Grey, 32 GB)  (3 GB RAM)', '876', 'Magnam et in sunt et', '1671524839D1301D76-E04D-EF09-6195-53229DE6D543-1-removebg-preview.png', 272, NULL, 4, 1, 1, '2023-01-26'),
(21, '63a171f5f3713', 23, 30, 21, 'Navana Show', '876', 'Magnam et in sunt et', '517shoe.jpg', 272, NULL, 8, 1, 1, '2023-08-26'),
(24, '64eb6b807d888', 23, 29, 24, 'Pollo-Tshirt', '599', '&lt;font color=&quot;#bdc1c6&quot; face=&quot;arial, sans-serif&quot;&gt;Shop for the latest men\'s t-shirts online at Apex4u. Men\'s T-Shirts that are comfortable and affordable online in Bangladesh&lt;/font&gt;&lt;br&gt;', '1693150080bb48409213d9edf44655a4b7639fe874.jpg-400x400q75-product.jpg-.webp', 12, NULL, 8, 1, 0, '2023-08-27'),
(26, 'f73e91bea7ce6', 3, 12, 8, 'Samsung Galaxy S21', '69999', 'Samsung S21 flagship smartphone', '1671205275s21-img.png', 10, NULL, 12, 1, 1, '2023-02-14'),
(27, '2d4ca9198a773', 7, 15, 9, 'Apple MacBook Air', '99999', 'Thin and light MacBook Air', '1671205275macbook-img.png', 8, NULL, 15, 1, 1, '2023-03-05'),
(28, '8c91a763be79f', 1, 5, 4, 'Dell Inspiron 15', '59999', 'Powerful Dell laptop for productivity', '1671205275dell-img.png', 12, NULL, 8, 1, 1, '2023-04-20'),
(29, '3e71a92b76ce9', 24, 32, 0, 'OnePlus 9T 5G', '44999', 'OnePlus flagship with 5G support', '916Xiaomi-Civi-2.jpg', 15, NULL, 11, 1, 1, '2023-05-11'),
(30, '1f76c9a2b9ae3', 3, 11, 8, 'Samsung Galaxy Tab S7', '49999', 'Samsung tablet for entertainment', '1671205275tab-s7-img.png', 6, NULL, 14, 1, 1, '2023-06-27'),
(31, '9a28b37e1c69a', 7, 16, 10, 'HP Pavilion Gaming Laptop', '79999', 'HP gaming laptop with high performance', '1671205275hp-gaming-img.png', 7, NULL, 10, 1, 1, '2023-07-19'),
(32, '8a9c37e1b2e7f', 1, 6, 5, 'Lenovo ThinkPad X1 Carbon', '84999', 'Lenovo business laptop for professionals', '1671205275thinkpad-img.png', 9, NULL, 13, 1, 1, '2023-08-02'),
(33, '5f6ba9172c398', 24, 32, 0, 'Xiaomi Mi 11 Ultra', '62999', 'Xiaomi flagship smartphone with ultra camera', '674Xiaomi-Redmi-Pad.jpg', 11, NULL, 9, 1, 1, '2023-09-15'),
(34, 'b91a3c78e6a2f', 3, 12, 7, 'Google Pixelbook Go', '79999', 'Google Chromebook for on-the-go', '1671205275pixelbook-img.png', 14, NULL, 12, 1, 1, '2023-10-08'),
(35, '6c9b7ae3f21a8', 7, 15, 11, 'Acer Predator Helios 300', '89999', 'Acer gaming laptop for hardcore gamers', '1671205275predator-img.png', 7, NULL, 15, 1, 1, '2023-11-21'),
(36, '29c1ae7b39fca', 1, 5, 3, 'Asus ROG Zephyrus G14', '109999', 'Asus gaming laptop with AMD Ryzen', '1671205275rog-zephyrus-img.png', 8, NULL, 8, 1, 1, '2023-12-04'),
(37, 'a9e3f21c876ba', 24, 32, 0, 'Sony Xperia 1 III', '89999', 'Sony Xperia flagship with 4K display', '884sony-xperia-1-iii.jpg', 10, NULL, 11, 1, 1, '2024-01-17'),
(38, 'e3c9bf71a286b', 3, 11, 9, 'Amazon Fire HD 10', '24999', 'Amazon tablet for reading and entertainment', '1671205275fire-hd-img.png', 12, NULL, 14, 1, 1, '2024-02-29'),
(39, 'c876a2f9e31ab', 7, 16, 12, 'MSI GS66 Stealth', '129999', 'MSI gaming laptop with RTX graphics', '1671205275msi-gs66-img.png', 9, NULL, 13, 1, 1, '2024-03-13'),
(40, '3a1c876baf92e', 1, 6, 4, 'HP Envy x360', '74999', 'HP 2-in-1 laptop with AMD Ryzen', '1671205275envy-x360-img.png', 11, NULL, 10, 1, 1, '2024-04-26'),
(41, '9f2e3c71ba687', 24, 32, 0, 'Vivo V23 Pro', '32999', 'Vivo smartphone with selfie camera', '798tp-7.jpg', 14, NULL, 9, 1, 1, '2024-05-09'),
(42, '7b3e9f2ca1f86', 3, 12, 8, 'Samsung Galaxy Book Flex', '79999', 'Samsung 2-in-1 laptop with S Pen', '1671205275galaxy-book-img.png', 8, NULL, 12, 1, 1, '2024-06-22'),
(43, '2ca1f86b39e7f', 7, 15, 10, 'Dell Alienware M15', '119999', 'Dell gaming laptop with high refresh rate', '1671205275alienware-img.png', 7, NULL, 15, 1, 1, '2024-07-05'),
(44, 'b39e7f2ca1f86', 1, 5, 5, 'Lenovo Yoga C940', '89999', 'Lenovo 2-in-1 laptop with 4K display', '1671205275yoga-c940-img.png', 9, NULL, 8, 1, 1, '2024-08-18'),
(45, '6b3e9a2cf7e1a', 24, 32, 0, 'Sony WH-1000XM5', '34999', 'Sony noise-canceling headphones', '872tp-9.jpg', 12, NULL, 11, 1, 1, '2024-09-30'),
(46, 'f7e1a2c86b39e', 3, 11, 9, 'Apple iPad Pro', '69999', 'Apple tablet with M1 chip', '1671205275ipad-pro-img.png', 14, NULL, 14, 1, 1, '2024-10-13'),
(47, 'a2c86b3e9f2ca', 7, 16, 11, 'Razer Blade 15', '139999', 'Razer gaming laptop with RTX 30 series', '1671205275razer-blade-img.png', 8, NULL, 13, 1, 1, '2024-11-26'),
(48, '3e9f2ca1f86b3', 1, 6, 3, 'Acer Aspire 5', '49999', 'Acer laptop for everyday use', '1671205275aspire-5-img.png', 11, NULL, 10, 1, 1, '2024-12-09'),
(49, '1f86b3e9f2ca7', 24, 32, 0, 'Xiaomi Redmi Note 12', '18999', 'Xiaomi budget smartphone', '794redmi-note-12-5g-international.jpg', 14, NULL, 9, 1, 1, '2025-01-22'),
(50, '9f2ca1f86b3e9', 3, 12, 8, 'Microsoft Surface Pro 8', '89999', 'Microsoft 2-in-1 laptop with Windows 11', '1671205275surface-pro-img.png', 8, NULL, 12, 1, 1, '2025-02-05'),
(51, '6b3e9f2ca1f86', 7, 15, 10, 'MSI Prestige 14', '79999', 'MSI laptop for content creators', '1671205275msi-prestige-img.png', 7, NULL, 15, 1, 1, '2025-03-20'),
(52, 'f2ca1f86b3e9a', 1, 5, 4, 'Dell XPS 13', '84999', 'Dell laptop with InfinityEdge display', '1671205275xps-13-img.png', 9, NULL, 8, 1, 1, '2025-04-02'),
(53, '639c919ba8677', 12, 1, 1, 'Solid Oak Dining Table', '799.99', 'High-quality solid oak dining table', 'https://example.com/images/table1.jpg', 10, 'oak, dining table, furniture', 150, 1, 0, '2023-01-26'),
(54, '739c919ba8678', 12, 2, 2, 'Leather Sofa Set', '1299.99', 'Luxurious leather sofa set', 'https://example.com/images/sofa1.jpg', 5, 'leather, sofa, furniture', 250, 1, 0, '2023-01-27'),
(55, '839c919ba8679', 13, 3, 3, 'Power Drill', '89.99', 'High-powered cordless drill', 'https://example.com/images/drill1.jpg', 20, 'power drill, hardware', 300, 1, 1, '2023-01-28'),
(56, '939c919ba867a', 13, 4, 4, 'Toolbox Set', '49.99', 'Complete toolbox set for DIY projects', 'https://example.com/images/toolbox1.jpg', 15, 'toolbox, hardware', 200, 1, 0, '2023-01-29'),
(57, 'a39c919ba867b', 23, 5, 5, 'Men\'s Dress Shirt', '39.99', 'Elegant men\'s dress shirt', 'https://example.com/images/shirt1.jpg', 30, 'dress shirt, men, clothing', 350, 1, 0, '2023-01-30'),
(58, 'b39c919ba867c', 23, 6, 6, 'Women\'s Evening Dress', '149.99', 'Stunning women\'s evening dress', 'https://example.com/images/dress1.jpg', 10, 'evening dress, women, clothing', 400, 1, 1, '2023-01-31'),
(59, 'c39c919ba867d', 24, 7, 7, 'Smart LED TV', '699.99', 'High-definition smart LED TV', 'https://example.com/images/tv1.jpg', 8, 'smart TV, LED, electronics', 600, 1, 0, '2023-02-01'),
(60, 'd39c919ba867e', 24, 8, 8, 'Wireless Headphones', '79.99', 'Wireless headphones with noise cancellation', 'https://example.com/images/headphones1.jpg', 25, 'headphones, wireless, electronics', 450, 1, 0, '2023-02-02'),
(61, 'e39c919ba867f', 30, 9, 9, 'Industrial Generator', '2999.99', 'Heavy-duty industrial generator', 'https://example.com/images/generator1.jpg', 2, 'generator, machinery', 200, 1, 1, '2023-02-03'),
(62, 'f39c919ba867g', 30, 10, 10, 'Construction Excavator', '59999.99', 'Powerful construction excavator', 'https://example.com/images/excavator1.jpg', 1, 'excavator, construction, machinery', 300, 1, 0, '2023-02-04'),
(63, 'g39c919ba867h', 12, 11, 11, 'Wooden Coffee Table', '149.99', 'Elegant wooden coffee table', 'https://example.com/images/table2.jpg', 10, 'wooden table, coffee table, furniture', 180, 1, 0, '2023-02-05'),
(64, 'h39c919ba867i', 12, 12, 12, 'Leather Recliner Chair', '799.99', 'Comfortable leather recliner chair', 'https://example.com/images/chair1.jpg', 5, 'leather chair, recliner, furniture', 210, 1, 1, '2023-02-06'),
(65, 'i39c919ba867j', 13, 13, 13, 'Cordless Screwdriver', '69.99', 'Compact cordless screwdriver', 'https://example.com/images/screwdriver1.jpg', 15, 'screwdriver, hardware', 270, 1, 0, '2023-02-07'),
(66, 'j39c919ba867k', 13, 14, 14, 'Hammer Set', '24.99', 'Essential hammer set for household tasks', 'https://example.com/images/hammer1.jpg', 20, 'hammer, hardware', 230, 1, 0, '2023-02-08'),
(67, 'k39c919ba867l', 23, 15, 15, 'Women\'s Casual T-Shirt', '19.99', 'Comfortable women\'s casual t-shirt', 'https://example.com/images/tshirt1.jpg', 40, 'casual t-shirt, women, clothing', 400, 1, 1, '2023-02-09'),
(68, 'l39c919ba867m', 23, 16, 16, 'Men\'s Jeans', '49.99', 'Stylish men\'s jeans', 'https://example.com/images/jeans1.jpg', 25, 'jeans, men, clothing', 300, 1, 0, '2023-02-10'),
(69, 'm39c919ba867n', 24, 17, 17, '4K Ultra HD TV', '999.99', '4K Ultra HD smart TV', 'https://example.com/images/tv2.jpg', 5, '4K TV, Ultra HD, electronics', 500, 1, 0, '2023-02-11'),
(70, 'n39c919ba867o', 24, 18, 0, 'Bluetooth Speaker', '39.99', 'Portable Bluetooth speaker', '554BluetoothSpeaker.jpg', 30, 'speaker, Bluetooth, electronics', 380, 1, 1, '2023-02-12'),
(71, 'o39c919ba867p', 30, 19, 0, 'Industrial Welding Machine', '1899.99', 'Industrial-grade welding machine', '999IndustrialWeldingMachine.webp', 3, 'welding machine, machinery', 210, 1, 0, '2023-02-13'),
(72, 'p39c919ba867q', 30, 20, 20, 'Construction Bulldozer', '79999.99', 'Heavy-duty construction bulldozer', '609H57d4375ed1cb4841b86f16544196695fv.png-300x300.webp', 1, 'bulldozer, construction, machinery', 250, 1, 0, '2023-02-14'),
(73, 'q39c919ba867r', 12, 21, 0, 'Modern TV Stand', '149.99', 'Modern TV stand with storage', '823Minimalist-Wood-White-TV-Stand-Panel-Large-Modern-Console-With-Storage-600x374.jpg', 10, 'TV stand, modern furniture', 160, 1, 1, '2023-02-15'),
(74, 'r39c919ba867s', 12, 22, 22, 'Corner Bookshelf', '79.99', 'Space-saving corner bookshelf', 'https://example.com/images/bookshelf1.jpg', 15, 'bookshelf, corner, furniture', 220, 1, 0, '2023-02-16'),
(75, 's39c919ba867t', 13, 23, 0, 'Corded Circular Saw', '129.99', 'Corded circular saw for precision cutting', '72981+WUGRi9XS.-AC-UL480-FMwebp-QL65-.webp', 8, 'circular saw, hardware', 260, 1, 0, '2023-02-17'),
(76, 't39c919ba867u', 13, 24, 24, 'Adjustable Wrench Set', '29.99', 'Adjustable wrench set for various tasks', '73961JIny75DnL.-AC-UL480-FMwebp-QL65-.webp', 20, 'wrench set, hardware', 220, 1, 1, '2023-02-18'),
(77, 'u39c919ba867v', 23, 25, 0, 'Women\'s Hooded Sweatshirt', '34.99', 'Comfortable women\'s hooded sweatshirt', '59761qTPaU7dYL.-AC-UX522-.jpg', 35, 'hooded sweatshirt, women, clothing', 320, 1, 0, '2023-02-19'),
(78, 'v39c919ba867w', 23, 26, 0, 'Men\'s Cargo Shorts', '29.99', 'Stylish men\'s cargo shorts', '869pants.jpg', 30, 'cargo shorts, men, clothing', 280, 1, 0, '2023-02-20'),
(79, 'w39c919ba867x', 24, 20, 15, 'Home Theater System', '499.99', 'Complete home theater system', '721home-theater.webp', 4, 'home theater, electronics', 450, 1, 1, '2023-02-21'),
(80, 'x39c919ba867y', 24, 28, 0, 'Digital Camera', '299.99', 'High-quality digital camera', '933camera.jpg', 12, 'digital camera, electronics', 420, 1, 0, '2023-02-22'),
(81, 'y39c919ba867z', 30, 29, 0, 'Power Generator', '2499.99', 'Portable power generator', '774generator.jpg', 2, 'power generator, machinery', 180, 1, 0, '2023-02-23'),
(82, 'z39c919ba8680', 30, 30, 0, 'Construction Crane', '89999.99', 'Heavy-duty construction crane', '561crane.jpeg', 1, 'crane, construction, machinery', 220, 1, 1, '2023-02-24'),
(83, '650996ffe2365', 12, 23, 0, '683', '998', 'rtfghgfh', '1695127295H57d4375ed1cb4841b86f16544196695fv.png-300x300.webp', 304, NULL, 0, 1, 1, '2023-09-19'),
(84, '65099c49ed45d', 12, 25, 0, '287', '440', 'hhgjghjhg', '169512864961JIny75DnL.-AC-UL480-FMwebp-QL65-.webp', 354, NULL, 0, 1, 1, '2023-09-19'),
(85, '6509bbec1a676', 12, 25, 0, 'dsfsdfsdf', '440', 'hhgjghjhg', '169513674861JIny75DnL.-AC-UL480-FMwebp-QL65-.webp', 354, NULL, 0, 1, 1, '2023-09-19'),
(86, '6509c04d80da2', 24, 32, 0, '505', '203', 'dfsdfdf', '169513786981+WUGRi9XS.-AC-UL480-FMwebp-QL65-.webp', 852, NULL, 0, 1, 0, '2023-09-19'),
(87, '6509c0639094c', 24, 32, 0, '505rfgf', '203', 'dfsdfdf', '169513789181+WUGRi9XS.-AC-UL480-FMwebp-QL65-.webp', 852, NULL, 0, 1, 1, '2023-09-19'),
(88, '6509c2afb567b', 23, 29, 27, '148', '192', 'fdgdfgdfs', '1695138479d21c20b5fbac742d97c0517c8e180359.jpg-400x400q75-product.jpg-.webp', 851, NULL, 0, 1, 1, '2023-09-19'),
(89, '6509c30638ad0', 23, 29, 27, 'test product', '192', 'fdgdfgdfs', '1695138566d21c20b5fbac742d97c0517c8e180359.jpg-400x400q75-product.jpg-.webp', 851, NULL, 0, 1, 1, '2023-09-19'),
(90, '6509c3b777285', 23, 30, 0, 'test 2', '813', 'Ut eligendi ullam fu.', '16951387434000.webp', 425, NULL, 0, 1, 1, '2023-09-19'),
(91, '6509e3c25fa77', 12, 25, 20, '348', '72', 'sdfdfsfsd', '16951469463028GWQlgJHxcVKHi4oZ.jpeg', 716, NULL, 0, 1, 1, '2023-09-20'),
(92, '6509e41d5d55b', 12, 25, 20, 'Crane and Tools', '72', 'sdfdfsfsd', '16951470373028GWQlgJHxcVKHi4oZ.jpeg', 716, NULL, 0, 1, 1, '2023-09-20');

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
(18, 'Mobiles', 9, -2, 1, 1),
(32, 'Mobile', 24, 2, 1, 1),
(23, 'Tableware', 12, 1, 1, 0),
(24, 'Living Room', 12, 0, 1, 1),
(25, 'Beds', 12, 3, 1, 1),
(26, 'Men\'s T-Shirts', 10, 0, 1, 1),
(27, 'Kurti\'s', 11, -1, 0, 1),
(28, 'Sarees', 11, 0, 1, 1),
(30, 'Lubnan', 23, 1, 1, 1),
(29, 'panjabi', 23, 3, 1, 1),
(33, 'the inclined plane', 30, 0, 1, 1);

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
(7, '65043B0E1D391', 43, '4298.00', 'Est placeat cumque ', 'pending', 'cash', '2023-09-15 11:07:58'),
(8, '650460C665E5C', 43, '9554.00', 'Aperiam qui magni qu', 'pending', 'nagad', '2023-09-15 13:48:54'),
(9, '6504626659042', 43, '9554.00', 'Minima aspernatur sa', 'pending', 'bkash', '2023-09-15 13:55:50'),
(10, '6504A16BC2B55', 43, '9554.00', 'Quae ea quasi dolore', 'pending', 'nagad', '2023-09-15 18:24:43'),
(11, '6504A652842E1', 43, '9554.00', 'Exercitation et id ', 'pending', 'nagad', '2023-09-15 18:45:38'),
(12, '6504A6605E78A', 43, '9554.00', 'Pariatur Molestias ', 'pending', '', '2023-09-15 18:45:52'),
(13, '6504A6901CB8B', 43, '9554.00', 'Molestias deserunt v', 'pending', 'bkash', '2023-09-15 18:46:40'),
(14, '6504A71AC19E4', 43, '9554.00', 'Eaque laborum Itaqu', 'pending', 'bkash', '2023-09-15 18:48:58'),
(15, '6504A83FE3C93', 43, '4518.00', 'Aut accusamus volupt', 'pending', 'nagad', '2023-09-15 18:53:51'),
(16, '6504A8632BD19', 43, '4518.00', 'Voluptatem qui aut ', 'pending', 'nagad', '2023-09-15 18:54:27'),
(17, '6504A8B92D802', 43, '4518.00', 'Quibusdam deserunt a', 'pending', 'nagad', '2023-09-15 18:55:53'),
(18, '6504AA1ACC630', 43, '4518.00', 'In consequatur rerum', 'pending', 'nagad', '2023-09-15 19:01:46'),
(19, '6504AAE8E70C9', 43, '4518.00', 'Aliquam occaecat off', 'pending', 'nagad', '2023-09-15 19:05:12'),
(20, '6504AB5D9ED13', 43, '4518.00', 'Enim qui atque sunt ', 'pending', 'nagad', '2023-09-15 19:07:09'),
(21, '6504ABBB2E295', 43, '4518.00', 'Impedit voluptatem ', 'pending', 'nagad', '2023-09-15 19:08:43'),
(22, '6504AC2E5A453', 43, '4518.00', 'Minim dignissimos en', 'pending', 'nagad', '2023-09-15 19:10:38'),
(23, '6504AECB563B4', 43, '9554.00', 'Voluptate nihil moll', 'pending', 'nagad', '2023-09-15 19:21:47'),
(24, '6504B15325513', 43, '9554.00', 'Autem impedit archi', 'pending', 'nagad', '2023-09-15 19:32:35'),
(25, '65053E66BC3C8', 43, '98.00', 'Aliquam esse quia r', 'pending', 'cash', '2023-09-16 05:34:30'),
(26, '650546A1DD464', 43, '1890.00', 'Laborum culpa quis c', 'pending', 'nagad', '2023-09-16 06:09:37'),
(27, '6505F6DFED809', 43, '945.00', 'Eos accusantium sit ', 'pending', 'bkash', '2023-09-16 18:41:35'),
(28, '650664AFA87E9', 43, '945.00', 'Rerum odio ipsa sim', 'pending', 'nagad', '2023-09-17 02:30:07'),
(29, '650666367DFA0', 43, '945.00', 'Et similique nemo vo', 'pending', 'cash', '2023-09-17 02:36:38'),
(30, '650666C4ABE30', 43, '1670.00', 'Dignissimos quis ut ', 'pending', 'nagad', '2023-09-17 02:39:00'),
(31, '650668CDEEF27', 43, '1670.00', 'Duis sit placeat v', 'pending', 'bkash', '2023-09-17 02:47:42'),
(32, '650669D19035C', 43, '2546.00', 'Ea consequatur Ea v', 'pending', 'nagad', '2023-09-17 02:52:01'),
(33, '65066A43B7713', 43, '1670.00', 'Illum est ex nobis', 'pending', 'nagad', '2023-09-17 02:53:55'),
(34, '65066ACAB240E', 43, '1670.00', 'Aliquam eius ipsam s', 'pending', 'nagad', '2023-09-17 02:56:10'),
(35, '650670B61DCC6', 43, '945.00', 'Lorem nihil perspici', 'pending', 'bkash', '2023-09-17 03:21:26'),
(36, '650672552DB2D', 43, '2546.00', 'Voluptatem Proident', 'pending', 'cash', '2023-09-17 03:28:21'),
(37, '650672E94D966', 43, '945.00', 'Obcaecati sunt quae ', 'pending', 'nagad', '2023-09-17 03:30:49'),
(38, '6506743C9A300', 43, '945.00', 'Ut voluptatibus dolo', 'pending', 'nagad', '2023-09-17 03:36:28'),
(39, '650676DF7E7A0', 43, '945.00', 'Hic aut aut pariatur', 'pending', 'bkash', '2023-09-17 03:47:43'),
(40, '65067FC1DC5C5', 43, '945.00', 'Tempor aliqua Esse ', 'pending', 'nagad', '2023-09-17 04:25:37'),
(41, '6506808E9AD34', 43, '1670.00', 'Adipisci quos et et ', 'pending', 'nagad', '2023-09-17 04:29:02'),
(42, '65068210CA69F', 43, '1670.00', 'A tempore alias des', 'pending', 'nagad', '2023-09-17 04:35:28');

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
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tracking_id` (`tracking_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `s_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1307;

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
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

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
  MODIFY `sub_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
