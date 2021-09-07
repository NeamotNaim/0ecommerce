-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 09:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `products` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orders` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blogs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reports` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_order` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `category`, `coupon`, `products`, `orders`, `blogs`, `other`, `reports`, `user_role`, `contact_message`, `product_comments`, `site_setting`, `return_order`, `stock`, `type`, `created_at`, `updated_at`) VALUES
(3, 'Admin', '123456789', 'admin@gmail.com', NULL, '$2y$10$sciNcl2TThJYsML3i.aLsOLMqCM4DNJtVQJ/KFenPXeh8KO6BckHa', NULL, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, NULL, '2021-02-09 16:27:09'),
(4, 'Susannad', '0187642537432', 'neamotnaim123456@gmail.com', NULL, '$2y$10$0bK9GMjFAoiGOmMoDWhg9OGZ2wuHB4mjR4Iizd0yXdzUb4E.Axeki', NULL, '1', NULL, '1', '1', '1', '1', '1', NULL, '1', '1', NULL, '1', '1', 2, NULL, NULL),
(6, 'Neamot', '67543224123', 'udemy@gmail.com', NULL, '$2y$10$q8TrV6ReyX.TAfH3o10p1uIl/KGDa9MpgkelmZkQcjf5W2NjLUCyS', NULL, '1', '1', '1', '1', '1', '1', '1', NULL, '1', '1', NULL, '1', NULL, 2, NULL, NULL),
(7, 'Test', '54346786970', 'test@gmail.com', NULL, '$2y$10$gyoVs4Ijax32bLlyiisWNuPe4uk33tmAlm22CYF/FHj8ggEXAeBYm', NULL, '1', '1', '1', '1', '1', '1', '1', NULL, '1', '1', '1', '1', '1', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(13, 'Sony', 'media/brand/sony_logo_PNG2.png140321_11_18_40.png', NULL, NULL),
(14, 'Rado', 'media/brand/rado-logo-vector.png140321_11_41_40.png', NULL, NULL),
(15, 'Lenovo', 'media/brand/Lenovo_logo_red.png140321_11_12_42.png', NULL, NULL),
(16, 'Asus', 'media/brand/Asus-Logo-PNG-Download-Image.png140321_11_40_42.png', NULL, NULL),
(17, 'Cannon', 'media/brand/Canon_logo_vector.png140321_11_58_43.png', NULL, NULL),
(18, 'Dell', 'media/brand/Dell_Logo.png140321_11_25_44.png', NULL, NULL),
(19, 'Gucci', 'media/brand/gucci-png-logo-transparent-10.png140321_11_05_45.png', NULL, NULL),
(20, 'Levis', 'media/brand/400px-Levi\'s_logo.svg.png140321_11_26_45.png', NULL, NULL),
(21, 'Nike', 'media/brand/nike_PNG12.png140321_11_54_45.png', NULL, NULL),
(22, 'Adidas', 'media/brand/adidas_PNG7.png140321_11_17_46.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(17, 'Mens Fashion', '2021-03-14 05:01:17', '2021-03-14 05:01:17'),
(18, 'Womens Fashion', '2021-03-14 05:01:35', '2021-03-14 05:01:35'),
(19, 'Childs', '2021-03-14 05:01:49', '2021-03-14 05:01:49'),
(20, 'Watch', '2021-03-14 05:02:04', '2021-03-14 05:02:04'),
(21, 'Furniture', '2021-03-14 05:02:17', '2021-03-14 05:02:17'),
(22, 'Electronics', '2021-03-14 05:02:29', '2021-03-14 05:02:29'),
(23, 'Health', '2021-03-14 05:02:44', '2021-03-14 05:02:44'),
(24, 'Beauty', '2021-03-14 05:02:52', '2021-03-14 05:02:52'),
(25, 'Sports & Outdoor', '2021-03-14 05:03:04', '2021-03-14 05:03:04'),
(26, 'Home & Living', '2021-03-14 05:03:39', '2021-03-14 05:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Susannad Boy', '01762152072', 'cajibet634@febula.com', 'adsfdgfhhkjl;\'', NULL, NULL),
(2, 'Neamot', '0155181949', 'udemy@gmail.com', 'Hi there , How is it going !', NULL, NULL),
(3, 'Niamatullah Naeem', '01553819490', 'rapiddev288@gmail.com', 'Hi, guys. How is it going!', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'Udemy', '99', NULL, NULL),
(2, 'SkillNation', '95', NULL, NULL),
(4, 'BSFMSTU', '100', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_05_052517_create_admins_table', 1),
(5, '2021_02_10_192056_create_categories_table', 2),
(6, '2021_02_10_192145_create_subcategories_table', 2),
(7, '2021_02_10_192218_create_brands_table', 2),
(8, '2021_02_25_001419_create_coupons_table', 3),
(9, '2021_02_25_220406_create_newsletter_table', 4),
(10, '2021_02_27_010121_create_products_table', 5),
(11, '2021_03_10_155442_create_post_category_table', 6),
(12, '2021_03_10_155622_create_posts_table', 6),
(13, '2021_03_21_213430_create_wishlist_table', 7),
(14, '2021_04_20_190519_create_setting_table', 8),
(15, '2021_04_20_191704_create_setting_table', 9),
(16, '2016_06_01_000001_create_oauth_auth_codes_table', 10),
(17, '2016_06_01_000002_create_oauth_access_tokens_table', 10),
(18, '2016_06_01_000003_create_oauth_refresh_tokens_table', 10),
(19, '2016_06_01_000004_create_oauth_clients_table', 10),
(20, '2016_06_01_000005_create_oauth_personal_access_clients_table', 10),
(21, '2021_05_03_162434_create_orders_table', 11),
(22, '2021_05_03_162734_create_orders_details_table', 11),
(23, '2021_05_03_162955_create_shipping_table', 11),
(24, '2021_05_07_092631_create_seo_table', 12),
(25, '2021_05_19_200342_create_site_setting_table', 13),
(26, '2021_05_27_000656_create_contact_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'naim@gmail.com', '2021-02-25 23:09:27', NULL),
(2, 'neamotnaim123456@gmail.com', '2021-02-25 23:16:43', NULL),
(4, 'rapiddev288@gmail.com', '2021-02-25 23:27:29', NULL),
(5, 'neamotnaim123@gmail.com', '2021-02-27 00:33:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'ryRtOiLFb1zgBXysgMyVcBN08S1yuuvRyOtkTfQG', 'http://localhost', 1, 0, 0, '2021-04-24 16:46:29', '2021-04-24 16:46:29'),
(2, NULL, 'Laravel Password Grant Client', 'YXZQ11Syz5Xg2JvLLeu2E0BOzvj1Qy9vvk1A5tgF', 'http://localhost', 0, 1, 0, '2021-04-24 16:46:29', '2021-04-24 16:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-04-24 16:46:29', '2021-04-24 16:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blnc_transection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_order` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `payment_type`, `payment_amount`, `blnc_transection`, `stripe_order_id`, `subtotal`, `shipping_charge`, `vat`, `total`, `status`, `status_code`, `return_order`, `month`, `date`, `year`, `created_at`, `updated_at`) VALUES
(1, '3', 'card_1InJv2DDUFgsaiyyAsQHzQTy', 'stripe', '192100', 'txn_1InJv4DDUFgsaiyyk3v3neKP', '60910a3872c1f', '1741', '76', '5', '1921', '4', '346678', '0', 'May', '04-05-21', '2021', NULL, NULL),
(2, '3', 'card_1InJw3DDUFgsaiyyp6ntQhhJ', 'stripe', '192100', 'txn_1InJw5DDUFgsaiyy3OMFUYFB', '60910a7793837', '1741', '76', '5', '1921', '0', '234567', '0', 'May', '04-05-21', '2021', NULL, NULL),
(3, '3', 'card_1InJx1DDUFgsaiyysX5e25Qt', 'stripe', '192100', 'txn_1InJx3DDUFgsaiyyk9bMr9er', '60910ab3b0778', '1741', '76', '5', '1921', '0', '346433', '0', 'May', '04-05-21', '2021', NULL, NULL),
(4, '3', 'card_1InKqODDUFgsaiyyxv8pKwaK', 'stripe', '37100', 'txn_1InKqQDDUFgsaiyy4QJB4yWh', '6091181c3e5fd', '190', '76', '5', '371', '1', '435678', '0', 'May', '04-05-21', '2021', NULL, NULL),
(5, '3', 'card_1InL9VDDUFgsaiyy9JXaFtoh', 'stripe', '256100', 'txn_1InL9XDDUFgsaiyycLLs1qQ1', '60911cbd855ec', '2480.00', '76', '5', '2561', '1', '42456', '0', 'May', '04-05-21', '2021', NULL, NULL),
(6, '3', 'card_1Injh2DDUFgsaiyyodcu2nBG', 'stripe', '113100', 'txn_1Injh6DDUFgsaiyy6uFrQNrZ', '60928d3d2bbc6', '951', '76', '5', '1131', '3', '35644', '0', 'May', '05-05-21', '2021', NULL, NULL),
(7, '3', 'card_1InlFDDDUFgsaiyycNpHICg6', 'stripe', '113100', 'txn_1InlJlDDUFgsaiyyld73q4Oq', '6092a59ee196b', '1050.00', '76', '5', '1131', '3', '34546', '2', 'May', '05-05-21', '2021', NULL, NULL),
(8, '3', 'card_1IoWUEDDUFgsaiyySI7WC9tB', 'stripe', '100100', 'txn_1IoWUIDDUFgsaiyypKBSude5', '609569e7cc13c', '920.00', '76', '5', '1001', '0', '975844', '0', 'May', '07-05-21', '2021', NULL, NULL),
(9, '3', 'card_1IooE6DDUFgsaiyyYDcYIsGb', 'stripe', '348100', 'txn_1IooEFDDUFgsaiyyOZ1p31QN', '60967446b4504', '3400.00', '76', '5', '3481', '3', '476245', '1', 'May', '08-05-21', '2021', NULL, NULL),
(10, '3', 'card_1J2zv1DDUFgsaiyysuX1sTxL', 'stripe', '86100', 'txn_1J2zv6DDUFgsaiyygqgfToeT', '60ca0d67ece54', '780.00', '76', '5', '861', '0', '532384', '0', 'June', '16-06-21', '2021', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singleprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `singleprice`, `totalprice`, `created_at`, `updated_at`) VALUES
(1, 3, '12', 'Watch-kids', 'gradient', 'suitatle', '2', '920', '1840', NULL, NULL),
(2, 4, '11', 'Watch-men', 'black', 'suitatle for all', '1', '290', '290', NULL, NULL),
(3, 5, '15', 'Watch-0980', 'mix', 'any', '2', '1050', '2100', NULL, NULL),
(4, 5, '20', 'Watch-T-78', 'black', 'any', '1', '380', '380', NULL, NULL),
(5, 6, '15', 'Watch-0980', 'mix', 'any', '1', '1050', '1050', NULL, NULL),
(6, 7, '15', 'Watch-0980', 'mix', 'any', '1', '1050', '1050', NULL, NULL),
(7, 8, '12', 'Watch-kids', 'gradient', 'suitatle', '1', '920', '920', NULL, NULL),
(8, 9, '18', 'Watch-0987', 'white', 'any', '1', '3400', '3400', NULL, NULL),
(9, 10, '4', 'New Product', 'red', 'l', '1', '780', '780', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_bn` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_in` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_details_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_category_id`, `post_title_en`, `post_title_in`, `post_title_bn`, `post_image`, `post_details_en`, `post_details_in`, `post_details_bn`, `created_at`, `updated_at`) VALUES
(2, 1, '189 Creative Blog Post Ideas That Will Delight Your Audience 72', '189 क्रिएटिव ब्लॉग पोस्ट विचार जो आपके श्रोता 72 को प्रसन्न करेंगे', '189 ক্রিয়েটিভ ব্লগ পোস্ট আইডিয়াগুলি যা আপনার শ্রোতাদের আনন্দিত করবে 72', 'media/post/1694198260341363.jpg', '<ul><li style=\"text-align: justify; \"><span style=\"background-color: rgb(255, 255, 0);\">Have you ever sat down to write your up-and-coming blog post just to find yourself staring blankly at your computer screen?</span></li></ul><p><br></p><p>I know I have. It’s a daunting task to get words out when you have no idea what you want to write. What makes it even worse is when the publish deadline is fast approaching and the cursor just continues to torment you with its blinky-ness. It might also feel like writer’s block, but I don’t really believe in writer’s block. It’s really a lack of good writing and blog planning.</p><p><br></p><p>So, I thought I’d help you plan and pull together a massive list of great blog ideas to pull you out of the doldrums.</p>', '<pre class=\"tw-data-text tw-text-large XcVN5d tw-ta\" data-placeholder=\"Translation\" id=\"tw-target-text\" dir=\"ltr\" style=\"unicode-bidi: isolate; font-size: 24px; line-height: 32px; background-color: rgb(248, 249, 250); border: none; padding: 2px 0.14em 2px 0px; position: relative; margin-top: -2px; margin-bottom: -2px; resize: none; overflow: hidden; width: 270.014px; white-space: pre-wrap; overflow-wrap: break-word; color: rgb(32, 33, 36); font-family: \"Google Sans\", arial, sans-serif !important;\"><span lang=\"hi\">क्या आपने कभी अपने कंप्यूटर स्क्रीन पर अपने आप को रिक्त रूप से देखने के लिए अपने अप और आने वाले ब्लॉग पोस्ट को लिखने के लिए बैठ गए हैं?\r\n\r\nमुझे पता है मेरे पास है। जब आप लिखना नहीं चाहते, तो आपको पता ही नहीं है कि शब्दों को बाहर निकालना कितना कठिन काम है। इससे भी बदतर तब होता है जब प्रकाशित समय सीमा तेजी से आ रही है और कर्सर अभी भी आपको अपने ब्लिंक-नेस के साथ पीड़ा दे रहा है। यह लेखक के ब्लॉक की तरह भी लग सकता है, लेकिन मैं वास्तव में लेखक के ब्लॉक पर विश्वास नहीं करता हूं। यह वास्तव में अच्छे लेखन और ब्लॉग योजना की कमी है।\r\n\r\nइसलिए, मैंने सोचा कि मैं आपकी योजना बनाने में मदद करता हूं और एक महान ब्लॉग विचारों की एक विशाल सूची आपको खींच के बाहर ले जाने में मदद करता हूं।</span></pre>', '<ul><li style=\"text-align: justify; \"><span style=\"background-color: rgb(255, 255, 0);\">Have you ever sat down to write your up-and-coming blog post just to find yourself staring blankly at your computer screen?</span></li></ul><p><br></p><p>I know I have. It’s a daunting task to get words out when you have no idea what you want to write. What makes it even worse is when the publish deadline is fast approaching and the cursor just continues to torment you with its blinky-ness. It might also feel like writer’s block, but I don’t really believe in writer’s block. It’s really a lack of good writing and blog planning.</p><p><br></p><p>So, I thought I’d help you plan and pull together a massive list of great blog ideas to pull you out of the doldrums.</p>', NULL, NULL),
(4, 1, 'How to Write a Blockbuster Blog Post in 45 Minutes', '45 मिनट में ब्लॉकबस्टर ब्लॉग पोस्ट कैसे लिखें', '45 মিনিটে ব্লকবাস্টার ব্লগ পোস্ট কীভাবে লিখবেন', 'media/post/1694198323990796.jpg', '<p>sdfghjkl;kjhgfdsaSDFGHJKLKKJHGFDSASDFGHJKHGFDSA</p>', '<p>asdfghjkkjfgsadsdfhjlkkjfhgsfddfghjkl;;lkjhgfdsdfghfgkhl;klkjhgfd</p>', '<p>sdfghjkl;kjhgfdsaSDFGHJKLKKJHGFDSASDFGHJKHGFDSA</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_in` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn` varchar(240) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `category_name_en`, `category_name_in`, `category_name_bn`, `created_at`, `updated_at`) VALUES
(1, 'service', 'सर्विस', 'পরিষেবা', NULL, NULL),
(2, 'prize', 'इनाम', 'দাম', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_prize` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_prize` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vedio_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `image_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `product_code`, `product_quantity`, `product_details`, `product_color`, `product_size`, `selling_prize`, `discount_prize`, `vedio_link`, `hot_deal`, `main_slider`, `mid_slider`, `best_rated`, `hot_new`, `trend`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, 5, 8, 'Arival-April_up', '2345', '500', '<p><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is avail</span><br></p>', '12asd,afaf', '21,121', '96000', '123456', 'https://www.google.com/search?q=lorem+ipsum&rlz=1C1CHBD_enBD848BD848&oq=lorem+ipsum&aqs=chrome..69i57.4399j0j7&sourceid=chrome&ie=UTF-8', 1, 1, 1, 1, 1, 1, 'media/product/1693682057678670.JPG', 'media/product/1693682144907114.JPG', 'media/product/1693682145085012.png', 1, NULL, NULL),
(2, 14, 5, 8, 'First-show-E', '7345', '43245', '<p>This product just arrive from china. It\'s all are brand product<span style=\"background-color: rgb(255, 255, 255);\">.<b style=\"\"> Hurry up to enjoy it </b></span>!</p>', 'black,white,red', 'l,m,xl,xll', '567', '23456', 'https://www.google.com/search?q=lorem+ipsum&rlz=1C1CHBD_enBD848BD848&oq=lorem+ipsum&aqs=chrome..69i57.4399j0j7&sourceid=chrome&ie=UTF-8', 1, 1, 1, 1, 1, 1, 'media/product/1693682985759416.jpg', 'media/product/1693682373394845.png', 'media/product/1693682455900040.jpg', 1, NULL, NULL),
(4, 17, 12, 21, 'New Product', '231457', '50', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'red,blue,ash', 'l,m,xl', '780', '', 'https://www.youtube.com/', 1, 1, 1, 1, 1, 1, 'media/product/1694208445983971.png', 'media/product/1694208446267711.png', 'media/product/1694208446467905.png', 1, NULL, NULL),
(5, 17, 11, 22, 'Mens-T-Shirt', '2314573423', '500', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'navy-blue,ash,light-yellow', 'm,l,xl,xxl', '799', NULL, 'https://www.youtube.com/watch?v=Kzk34mf599k', 1, 1, 1, 1, 1, 1, 'media/product/1694210950802545.png', 'media/product/1694210951039736.png', 'media/product/1694210951217301.png', 1, NULL, NULL),
(6, 18, 14, 20, 'Arival-April-Women', '223445676754', '120', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'pink,blue,white', 'm,l,xl', '1566', '199', 'https://www.youtube.com/watch?v=Kzk34mf599k', 1, 1, 1, 1, 1, 1, 'media/product/1694211743346068.png', 'media/product/1694211743544985.png', 'media/product/1694211743714023.png', 1, NULL, NULL),
(7, 19, 17, 19, 'Children-T-Shirt', '76465', '390', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'white,black', 'm', '490', '99', 'https://www.youtube.com/watch?v=Kzk34mf599k', 1, 1, 1, 1, 1, 1, 'media/product/1694211939587768.png', 'media/product/1694211939952017.png', 'media/product/1694211940199744.png', 1, NULL, NULL),
(8, 19, 18, 14, 'Children-Lotion', '07676643', '234', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'suitable', 'small,medium,large', '280', '46', 'https://www.google.com/search?q=lorem+ipsum&rlz=1C1CHBD_enBD848BD848&oq=lorem+ipsum&aqs=chrome..69i57.4399j0j7&sourceid=chrome&ie=UTF-8', 1, 1, NULL, 1, 1, 1, 'media/product/1694212555556266.png', 'media/product/1694212555912492.png', 'media/product/1694212556110364.png', 1, NULL, NULL),
(9, 18, 14, 20, 'Womem-T-shirt', '357568', '166', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'white,black,blue,gray', 'm,l,xl,xxl', '789', '89', 'https://www.youtube.com/', 1, 1, 1, 1, 1, 1, 'media/product/1694212687981717.png', 'media/product/1694212688174648.png', 'media/product/1694212688353100.png', 1, NULL, NULL),
(10, 17, 12, 22, 'Mens-Hoodie', '46743', '600', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'gray,blue,ash,black', 'm,l,xl,xxl', '1290', '1020', 'https://www.youtube.com/watch?v=Kzk34mf599k', 1, 1, 1, 1, 1, 1, 'media/product/1694212798475703.png', 'media/product/1694212798652829.png', 'media/product/1694212798811803.png', 1, NULL, NULL),
(11, 20, 20, 13, 'Watch-men', '646543643', '198', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'black,blue,ash,orange,mix', 'suitatle for all', '580', '290', 'https://www.youtube.com/watch?v=Kzk34mf599k', NULL, 1, NULL, 1, NULL, 1, 'media/product/1694212949890896.jpeg', 'media/product/1694212950141673.jpeg', 'media/product/1694212950318298.jpeg', 1, NULL, NULL),
(12, 20, 22, 19, 'Watch-kids', '354678', '120', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'gradient,blue,black', 'suitatle', '1020', '920', 'https://www.youtube.com/watch?v=Kzk34mf599k', NULL, NULL, NULL, NULL, NULL, NULL, 'media/product/1694213079694309.jpeg', 'media/product/1694213079968000.jpeg', 'media/product/1694213080213276.jpeg', 1, NULL, NULL),
(13, 22, 11, 15, 'Mobile-R99-05', '875644', '40', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'gray,gold', '5.9', '15890', '11111', 'https://www.youtube.com/watch?v=Kzk34mf599k', NULL, NULL, NULL, NULL, NULL, NULL, 'media/product/1694213291377572.jpeg', 'media/product/1694213291485080.jpeg', 'media/product/1694213291562935.jpeg', 1, NULL, NULL),
(14, 17, 12, 22, 'Shirt-Men', '4535', '345', '<p>asdfghjkl;\'lkjhgfdfghjkjhgfds</p>', 'blue,white,gray', 'm,l,xl', '1278', '1199', 'https://www.youtube.com/watch?v=Kzk34mf599k', 1, 1, NULL, 1, 1, 1, 'media/product/1694400923646855.png', 'media/product/1694400924133978.png', 'media/product/1694400924338893.png', 1, NULL, NULL),
(15, 20, 20, 16, 'Watch-0980', '65745', '1323', '<span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span>', 'mix', 'any', '1490', '1050', 'https://www.youtube.com/watch?v=Kzk34mf599k', 1, 1, 1, 1, 1, 1, 'media/product/1695153763812111.jpeg', 'media/product/1695153764092538.jpeg', 'media/product/1695153764303754.jpeg', 1, NULL, NULL),
(16, 20, 20, 16, 'Watch-Asus-89', '34567', '45', '<span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span>', 'mirjamta', 'any', '2900', '1500', 'https://www.google.com/search?q=lorem+ipsum&rlz=1C1CHBD_enBD848BD848&oq=lorem+ipsum&aqs=chrome..69i57.4399j0j7&sourceid=chrome&ie=UTF-8', 1, 1, 1, 1, 1, 1, 'media/product/1695153867309795.jpeg', 'media/product/1695153867502700.jpeg', 'media/product/1695153867724729.jpeg', 1, NULL, NULL),
(17, 20, 20, 13, 'Watch-0789', '43256', '34', '<p>Lorem ipsum doesn\'t have any bussiness.<span style=\"font-size: 0.875rem; font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"font-size: 0.875rem; color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span></p>', 'blue', 'any', '4000', '2340', 'https://www.google.com/search?q=lorem+ipsum&rlz=1C1CHBD_enBD848BD848&oq=lorem+ipsum&aqs=chrome..69i57.4399j0j7&sourceid=chrome&ie=UTF-8', 1, 1, 1, 1, 1, 1, 'media/product/1695153999079666.jpeg', 'media/product/1695153999261623.jpeg', 'media/product/1695153999451776.jpeg', 1, NULL, NULL),
(18, 20, 20, 13, 'Watch-0987', '231457', '70', '<span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the <b style=\"background-color: rgb(0, 255, 0);\">15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum</b> et Malorum for use in a type specimen book.</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span>', 'white', 'any', '5600', '3400', 'https://www.youtube.com/watch?v=Kzk34mf599k', 1, 1, 1, 1, 1, 1, 'media/product/1695154092955449.jpeg', 'media/product/1695154093168814.jpeg', 'media/product/1695154093321017.jpeg', 1, NULL, NULL),
(19, 20, 20, 16, 'Watch-sport-t80', '7345', '23', '<span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span>', 'blue ,black,orange', '12,34,56', '1200', '890', 'https://www.google.com/search?q=lorem+ipsum&rlz=1C1CHBD_enBD848BD848&oq=lorem+ipsum&aqs=chrome..69i57.4399j0j7&sourceid=chrome&ie=UTF-8', 1, 1, 1, 1, 1, 1, 'media/product/1695154226794449.jpeg', 'media/product/1695154227019411.jpeg', 'media/product/1695154227207702.jpeg', 1, NULL, NULL),
(20, 20, 11, 14, 'Watch-T-78', '7345', '500', '<span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span><span style=\"font-weight: bold; color: rgb(95, 99, 104); font-family: arial, sans-serif;\">Lorem ipsum</span><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif;\">, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.</span>', 'black', 'any', '580', '380', 'https://www.google.com/search?q=lorem+ipsum&rlz=1C1CHBD_enBD848BD848&oq=lorem+ipsum&aqs=chrome..69i57.4399j0j7&sourceid=chrome&ie=UTF-8', NULL, NULL, NULL, NULL, NULL, NULL, 'media/product/1695154340304420.jpeg', 'media/product/1695154340512841.jpeg', 'media/product/1695154340729782.jpeg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bing_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `google_analytics`, `bing_analytics`, `created_at`, `updated_at`) VALUES
(1, 'title sga sdghjlkjhghgdsf', 'author agagda fhgjhkjgfhdsfad', 'tag gagdasgs dfhghkjdgsfadss', 'description asdgagag gjdsfadsadfsdhfjg', 'google analytics asgdagas sfdgfgjhkhjghfgdfsda', 'bing analytics gadsgasgd jgfgdsfadsfdgfhghk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shipping_charge`, `shopname`, `email`, `phone`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, '5', '76', 'naimshop', 'naimmail@gmail.com', '345345345', 'Roghunandanpur', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `ship_name`, `ship_phone`, `ship_email`, `ship_address`, `ship_city`, `created_at`, `updated_at`) VALUES
(1, '1', 'Neamotullah Naim', '01553819490', 'naim@gmail.com', '433 Great Northern Road', 'Aberdeen', NULL, NULL),
(2, '2', 'Neamotullah Naim', '01553819490', 'naim@gmail.com', '433 Great Northern Road', 'Aberdeen', NULL, NULL),
(3, '3', 'Neamotullah Naim', '01553819490', 'naim@gmail.com', '433 Great Northern Road', 'Aberdeen', NULL, NULL),
(4, '4', 'Neamotullah Naim', '01553819490', 'naim@gmail.com', '433 Great Northern Road', 'Aberdeen', NULL, NULL),
(5, '5', 'Neamotullah Naim', '01553819490', 'naim@gmail.com', '433 Great Northern Road', 'Aberdeen', NULL, NULL),
(6, '6', 'Neamotullah Naim', '01553819490', 'naim@gmail.com', '433 Great Northern Road', 'Aberdeen', NULL, NULL),
(7, '7', 'Neamotullah Naim', '01762152072', 'rapiddev288@gmail.com', '433 Great Northern Road', 'Aberdeen', NULL, NULL),
(8, '8', 'Neamotullah Naim', '01553819490', 'admin@gmail.com', '433 Great Northern Road', 'Aberdeen', NULL, NULL),
(9, '9', 'Neamotullah Naim', '01553819490', 'udemy@gmail.com', '433 Great Northern Road', 'San Francisco', NULL, NULL),
(10, '10', 'Neamotullah Naim', '01553819490', 'naim@gmail.com', '433 Great Northern Road', 'Aberdeen', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sitesetting`
--

CREATE TABLE `sitesetting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vimeo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sitesetting`
--

INSERT INTO `sitesetting` (`id`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `youtube`, `twitter`, `instagram`, `vimeo`, `created_at`, `updated_at`) VALUES
(1, '32412412', '2354678', 'supportdev@gmail.com', 'Rapid dev', '433 Great Northern Road', 'https://www.facebook.com/profile.php?id=100011134933677', 'https://www.facebook.com/profile.php?id=100011134933677', 'https://www.facebook.com/profile.php?id=100011134933677', 'https://www.facebook.com/profile.php?id=100011134933677', 'https://www.facebook.com/profile.php?id=100011134933677', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(11, 17, 'Gents Tshirt', NULL, NULL),
(12, 17, 'Gents Shirt', NULL, NULL),
(13, 17, 'Gents Pant', NULL, NULL),
(14, 18, 'Womens Tshirt', NULL, NULL),
(15, 18, 'Womens Shirt', NULL, NULL),
(16, 18, 'Womens Pant', NULL, NULL),
(17, 19, 'Child Dress & Footware', NULL, NULL),
(18, 19, 'Child Body Care', NULL, NULL),
(19, 19, 'Child Diaper', NULL, NULL),
(20, 20, 'Gents Watch', NULL, NULL),
(21, 20, 'Womans Watch', NULL, NULL),
(22, 20, 'Kids Watch', NULL, NULL),
(23, 24, 'Body Spray', NULL, NULL),
(24, 24, 'Finger Ring', NULL, NULL),
(25, 24, 'Jewelry', NULL, NULL),
(26, 26, 'Appliances', NULL, NULL),
(27, 26, 'Room Decoration', NULL, NULL),
(28, 26, 'Light and Lamp', NULL, NULL),
(29, 26, 'Security', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ariyan', '01734678345', 'ariyan@gmail.com', NULL, NULL, '$2y$12$dMY5vrhg4kz.iP5sr.pH3uV.VlPhgEP30QR1PHY8s0F8vMXGyOvwq', NULL, '2019-10-04 23:27:57', '2019-10-04 23:27:57'),
(2, 'udemy', '019387654784', 'udemy@gmail.com', NULL, NULL, '$2y$12$dMY5vrhg4kz.iP5sr.pH3uV.VlPhgEP30QR1PHY8s0F8vMXGyOvwq', NULL, '2019-10-05 04:47:42', '2019-10-05 04:47:42'),
(3, 'Naim', '013897654897654', 'naim@gmail.com', NULL, NULL, '$2y$10$8tJB7Q9tVwLJwRYXKMhpfuGYFhopHxCVs.tGDxTUNLUnicOFp5iqi', NULL, '2021-02-07 10:03:03', '2021-02-07 10:03:03'),
(4, 'Neamot', '12345678', 'neam@gmail.com', NULL, NULL, '$2y$10$VA3vNjiO32Up61psp1n0/uTMDScc3OqlpY6u8CnWaOSIcP1b73Xdu', NULL, '2021-03-19 13:47:17', '2021-03-20 14:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 3, 14, NULL, NULL),
(2, 3, 13, NULL, NULL),
(3, 3, 10, NULL, NULL),
(4, 3, 7, NULL, NULL),
(5, 3, 9, NULL, NULL),
(6, 3, 11, NULL, NULL),
(7, 3, 8, NULL, NULL),
(8, 3, 12, NULL, NULL),
(9, 3, 16, NULL, NULL),
(10, 3, 18, NULL, NULL),
(11, 3, 17, NULL, NULL),
(12, 3, 4, NULL, NULL),
(13, 3, 6, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesetting`
--
ALTER TABLE `sitesetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sitesetting`
--
ALTER TABLE `sitesetting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
