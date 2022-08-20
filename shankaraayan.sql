-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 20, 2022 at 09:12 AM
-- Server version: 8.0.27
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shankaraayan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$ZLGcbNzCCYzZtYjDiP85fegxI5Ct8.MRba9Gr4NolQ4hjTp7FIrd.', 'dNn2rqIAbNhjjwm4LGwaX8skQewtgmlgjymbt6zR5RpymKIQ7c5mWyEVbtRM', '2022-08-01 11:46:15', '2022-08-01 11:46:15');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_bars`
--

DROP TABLE IF EXISTS `announcement_bars`;
CREATE TABLE IF NOT EXISTS `announcement_bars` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `hashtag` text COLLATE utf8_unicode_ci,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `announcement_bars`
--

INSERT INTO `announcement_bars` (`id`, `hashtag`, `facebook`, `instagram`, `twitter`, `linkedin`, `youtube`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(2, '#shankaraayanFoundation', 'https://www.facebook.com/ShankaraayanFoundation', 'https://www.instagram.com/shankaraayanfoundation/', 'https://twitter.com/ShankaraayanNGO', 'https://www.linkedin.com/company/shankaraayan-foundation/', 'https://youtube.com/ShankaraayanNGO', '7014875375', 'support@shankaraayan.com', '2022-08-15 01:44:16', '2022-08-15 04:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `automatic_discounts`
--

DROP TABLE IF EXISTS `automatic_discounts`;
CREATE TABLE IF NOT EXISTS `automatic_discounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `discountTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discountType` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'percentage',
  `discountValue` int NOT NULL,
  `discountMinPurchaseAmt` int DEFAULT '0',
  `discountStartDate` date NOT NULL,
  `discountEndDate` date DEFAULT NULL,
  `discountStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_category_unique` (`category`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(7, 'Education', 'education', NULL, '2022-08-18 09:50:30', '2022-08-19 05:13:11'),
(6, 'Community Empowerment', 'community-empowerment', NULL, '2022-08-18 09:50:04', '2022-08-18 09:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

DROP TABLE IF EXISTS `checkouts`;
CREATE TABLE IF NOT EXISTS `checkouts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `customers_id` bigint NOT NULL,
  `customers_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recovery_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_quantities` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_codes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_types` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `combos`
--

DROP TABLE IF EXISTS `combos`;
CREATE TABLE IF NOT EXISTS `combos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `combo_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `combo_sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `combo_pic1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `combo_pic2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_pic3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_pic4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_mrp` int DEFAULT NULL,
  `combo_selling_price` int DEFAULT NULL,
  `price_filter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `combo_product_1_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `combo_product_2_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `combo_product_3_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `combo_hasVariants` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variantType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variant1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variant2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variant3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variant4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variant5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variant1sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variant2sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variant3sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variant4sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variant5sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_variant1price` int DEFAULT NULL,
  `combo_variant2price` int DEFAULT NULL,
  `combo_variant3price` int DEFAULT NULL,
  `combo_variant4price` int DEFAULT NULL,
  `combo_variant5price` int DEFAULT NULL,
  `combo_variant1mrp` int DEFAULT NULL,
  `combo_variant2mrp` int DEFAULT NULL,
  `combo_variant3mrp` int DEFAULT NULL,
  `combo_variant4mrp` int DEFAULT NULL,
  `combo_variant5mrp` int DEFAULT NULL,
  `combo_description` text COLLATE utf8_unicode_ci,
  `combo_ingredients` text COLLATE utf8_unicode_ci,
  `combo_nutritionalFacts` text COLLATE utf8_unicode_ci,
  `combo_benefits` text COLLATE utf8_unicode_ci,
  `combo_otherInfo` text COLLATE utf8_unicode_ci,
  `combo_discountType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `combo_discountValue` int DEFAULT NULL,
  `combo_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `combo_most-viewed` bigint NOT NULL,
  `combo_bestsellers` bigint NOT NULL,
  `combo_seoTitle` text COLLATE utf8_unicode_ci,
  `combo_seoDescription` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `phone1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `map` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone1`, `phone2`, `email1`, `email2`, `address`, `map`, `created_at`, `updated_at`) VALUES
(1, '7014875375', NULL, 'support@shankaraayan.com', NULL, 'C-110 Nirman Nagar, Jaipur, Rajasthan - 302019', 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14233.375070863076!2d75.75791999769312!3d26.89258301379075!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1660651877206!5m2!1sen!2sin', '2022-08-16 05:53:06', '2022-08-16 06:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` bigint NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subscribed_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_pincode` bigint DEFAULT NULL,
  `phone` bigint DEFAULT NULL,
  `billing_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_pincode` bigint DEFAULT NULL,
  `billing_phone` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

DROP TABLE IF EXISTS `discount_codes`;
CREATE TABLE IF NOT EXISTS `discount_codes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `discountCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discountType` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'percentage',
  `discountValue` int NOT NULL,
  `discountMinPurchaseAmt` int DEFAULT '0',
  `discountStartDate` date NOT NULL,
  `discountEndDate` date DEFAULT NULL,
  `discountStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discountOncePerUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

DROP TABLE IF EXISTS `enquiries`;
CREATE TABLE IF NOT EXISTS `enquiries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `eventName` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `venue` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `date` date DEFAULT NULL,
  `shortContent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `desktopImg` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `mobileImg` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventName`, `venue`, `date`, `shortContent`, `content`, `desktopImg`, `mobileImg`, `type`, `created_at`, `updated_at`) VALUES
(2, 'School Bag Distribution', 'JKK, Jaipur, Rajasthan - 302019', '2022-08-01', 'That neces ecommerce platform optime your store ecommerce platform', 'That neces ecommerce platform optime your store ecommerce platformThat neces ecommerce platform optime your store ecommerce platformThat neces ecommerce platform optime your store ecommerce platformThat neces ecommerce platform optime your store ecommerce platformThat neces ecommerce platform optime your store ecommerce platform', 'shankaraayan-fund-raising-for-save-forest.-desktopImage-14351518082022.jpg', 'shankaraayan-fund-raising-for-save-forest.-mobileImg-14351518082022.jpg', 'Event', '2022-08-18 09:05:15', '2022-08-18 09:11:00'),
(4, 'School Books Distribution', 'JKK, Jaipur', '2022-08-01', 'Dummy Content here short description', 'Dummy Content here short descriptionDummy Content here short descriptionDummy Content here short descriptionDummy Content here short descriptionDummy Content here short descriptionDummy Content here short descriptionDummy Content here short description', 'shankaraayan-school-books-distribution-desktopImage-14415318082022.jpg', 'shankaraayan-school-books-distribution-mobileImg-14415318082022.jpg', 'Event', '2022-08-18 09:11:53', '2022-08-18 09:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filters`
--

DROP TABLE IF EXISTS `filters`;
CREATE TABLE IF NOT EXISTS `filters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `filter_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `filter_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `filters`
--

INSERT INTO `filters` (`id`, `filter_value`, `filter_type`, `created_at`, `updated_at`) VALUES
(1, 'Newest', 'sorting', '2022-08-14 06:13:55', '2022-08-14 06:13:55'),
(2, 'Price Lowest', 'sorting', '2022-08-14 06:13:55', '2022-08-14 06:13:55'),
(3, 'Price Highest', 'sorting', '2022-08-14 06:13:55', '2022-08-14 06:13:55'),
(4, 'Test', 'tag_filter', NULL, NULL),
(5, 'Education', 'tag_filter', NULL, NULL),
(6, 'Community Empowerment', 'tag_filter', NULL, NULL),
(7, 'Community Empowerment Education', 'product_category', NULL, NULL),
(8, 'Community Empowerment Edu', 'product_category', NULL, NULL),
(9, '', 'program_category', NULL, NULL),
(10, 'Sabko Shiksha', 'tag_filter', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_banners`
--

DROP TABLE IF EXISTS `home_banners`;
CREATE TABLE IF NOT EXISTS `home_banners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sequence` int DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subHeading` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desktopImg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobileImg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `btnText` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `btnLink` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_banners`
--

INSERT INTO `home_banners` (`id`, `sequence`, `heading`, `subHeading`, `desktopImg`, `mobileImg`, `btnText`, `btnLink`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Support Shankaraayan To Changing Lives!', 'Every child has access to realize their full potential through quality education and holistic learning to become young empowered leaders in the urban and the rural segments, to contribute towards a self-reliant India.', 'shankaraayan-support-shankaraayan-to-changing-lives!-desktopImage-07252915082022.jpg', 'shankaraayan-support-shankaraayan-to-changing-lives!-mobileImg-07252915082022.jpg', 'Know More', 'what-we-do/education/sabko-shiksha', 'Active', '2022-08-15 01:55:29', '2022-08-15 04:01:22'),
(3, 2, 'Help To Bring Hope By Joining Our Campaign', 'Know more about our campaign & donate to support us', 'shankaraayan-help-to-bring-hope-by-joining-our-campaign-desktopImage-07281915082022.jpeg', 'shankaraayan-help-to-bring-hope-by-joining-our-campaign-mobileImg-07281915082022.jpeg', 'Know More', 'what-we-do/volunteer', 'Active', '2022-08-15 01:58:19', '2022-08-15 03:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `main_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_id` int NOT NULL,
  `program_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_program_id_foreign` (`program_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `main_menu`, `menu_slug`, `program_id`, `program_slug`, `created_at`, `updated_at`) VALUES
(1, 'Education', 'education', 4, 'sabko-shiksha-abhiyan', '2022-08-19 10:42:54', '2022-08-19 12:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_16_075258_create_orders_table', 1),
(6, '2021_12_16_075342_create_checkouts_table', 1),
(7, '2021_12_16_075612_create_orders_customers_table', 1),
(8, '2021_12_16_075636_create_orders_items_table', 1),
(34, '2021_12_16_075714_create_products_table', 12),
(10, '2021_12_16_075748_create_customers_table', 1),
(11, '2021_12_16_075812_create_shippings_table', 1),
(12, '2021_12_16_075833_create_taxes_table', 1),
(13, '2021_12_16_075855_create_payments_table', 1),
(14, '2021_12_16_075916_create_automatic_discounts_table', 1),
(15, '2021_12_16_075938_create_discount_codes_table', 1),
(16, '2021_12_16_082206_create_categories_table', 1),
(17, '2021_12_16_084808_create_combos_table', 1),
(18, '2021_12_16_085144_create_filters_table', 1),
(19, '2021_12_28_053600_create_enquiries_table', 1),
(27, '2022_05_13_143603_create_announcement_bars_table', 6),
(21, '2022_07_12_194829_create_admins_table', 1),
(22, '2022_05_13_164029_create_home_banners_table', 2),
(23, '2022_05_13_211012_create_who_we_are_table', 3),
(24, '2022_05_13_211046_create_red_sections_table', 3),
(28, '2022_05_13_211012_create_who_we_ares_table', 7),
(31, '2022_05_13_211046_create_success_stories_table', 9),
(30, '2022_08_15_102815_create_testimonials_table', 8),
(32, '2022_08_16_110434_create_contacts_table', 10),
(33, '2022_08_16_175026_create_events_table', 11),
(35, '2022_08_19_152826_create_menus_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `custom_order_id` bigint NOT NULL,
  `cust_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `discount_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount_value` int NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_cost` int NOT NULL,
  `cod_charges` int NOT NULL,
  `tax` decimal(8,2) NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razorpay_orderID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razorpay_paymentID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razorpay_signature` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_carrier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_tracking_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_tracking_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `return_carrier` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `return_tracking_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `return_tracking_link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_trigger` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_customers`
--

DROP TABLE IF EXISTS `orders_customers`;
CREATE TABLE IF NOT EXISTS `orders_customers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `orders_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subscribed_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_pincode` bigint NOT NULL,
  `phone` bigint NOT NULL,
  `billing_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_pincode` bigint NOT NULL,
  `billing_phone` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_customers_orders_id_foreign` (`orders_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
CREATE TABLE IF NOT EXISTS `orders_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `orders_id` bigint UNSIGNED NOT NULL,
  `product_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DBID` int NOT NULL,
  `product_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_pic1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int NOT NULL,
  `product_mrp` int DEFAULT NULL,
  `product_sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` int NOT NULL,
  `product_hasVariant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_variationType` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_variationNumber` int DEFAULT NULL,
  `product_variationValue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_variationSKU` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_variationNOPPP` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_items_orders_id_foreign` (`orders_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `min_order_value` int NOT NULL,
  `max_order_value` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `country`, `state`, `payment_mode`, `min_order_value`, `max_order_value`, `created_at`, `updated_at`) VALUES
(1, 'India', 'All', 'Online', 0, 0, '2022-08-14 06:13:55', '2022-08-14 06:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `programName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subHeading` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_pic1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `program_pic2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_pic3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `program_pic4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `programDescription` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `parent_heading` text COLLATE utf8_unicode_ci,
  `program_additional` text COLLATE utf8_unicode_ci,
  `video_link` text COLLATE utf8_unicode_ci,
  `program_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_most-viewed` bigint NOT NULL,
  `product_bestsellers` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `programName`, `program_code`, `program_category`, `program_url`, `heading`, `subHeading`, `program_pic1`, `program_pic2`, `program_pic3`, `program_pic4`, `filter`, `programDescription`, `description`, `parent_heading`, `program_additional`, `video_link`, `program_status`, `product_most-viewed`, `product_bestsellers`, `created_at`, `updated_at`) VALUES
(4, 'Sabko Shiksha Abhiyan', 'SSA01', 'education', 'sabko-shiksha-abhiyan', 'What We Are Doing', 'How We Do', 'Shankaraayan-sabko-shiksha-abhiyan-1.jpg', 'Shankraayan-sabko-shiksha-abhiyan-2.jpg', 'Shankraayan-sabko-shiksha-abhiyan-3.jpg', 'Shankraayan-sabko-shiksha-abhiyan-4.jpg', 'Education', 'Education is the kindling of a flame, not the filling of a vessel. \r\nShankaraayan foundation plays a vital role to bring a drastic change in less privileged children life by means of education, which is a major property of each and every one.\r\n<br><br>\r\nIn 2022, the Sabko Shiksha Abhiyan was established in Jaipur, Rajasthan  as a response to the high rate of drop-outs in the urban community. SHANKARAAAYAN traced this down to factors such as poor foundational skills, lack of access to quality teaching, safe infrastructure or even nutritious meals. An empty stomach never devoured much knowledge!', 'We set up a safe space for providing quality academic engagement to academically weak students (grades 1-10) from BPL families providing them remedial education support along with nutritious mid-day meals, health camps and regular counselling sessions. Our successes in Sangam Vihar became a foundation for our nationwide programmes and the flagship school now serves as a laboratory for continued programme development.', 'Our Aim', 'Our aim is that we should make people aware that they should help the needy children to study further, in which we tell them many options to cooperate, such as the children around you who are not going to school or Trying to send them to school if they are doing some kind of labor, or if they are not able to send them to school, then take out some of their time for those children and provide them the necessary education at their level, provide them with the things they need. If those people extend a helping hand to someone, then Shankarayan will support them, it should be financial in helping them. Or if they cannot do this, they can help us in the form of some donation amount.', NULL, 'Active', 0, 0, '2022-08-19 04:46:41', '2022-08-19 12:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
CREATE TABLE IF NOT EXISTS `shippings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deliverable` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int NOT NULL,
  `min_order_value` int NOT NULL,
  `max_order_value` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `success_stories`
--

DROP TABLE IF EXISTS `success_stories`;
CREATE TABLE IF NOT EXISTS `success_stories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `page` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `success_stories`
--

INSERT INTO `success_stories` (`id`, `heading`, `content`, `page`, `section`, `created_at`, `updated_at`) VALUES
(1, 'Our children are the change we wish to see', 'We work directly with government schools and local communities to provide holistic support to less privileged children of India.', 'home_page', 'Main_page', '2022-08-16 00:36:23', '2022-08-16 00:37:38'),
(2, 'You can connect with us', 'Kinship for Humanitarian Social and Holistic Intervention in India (SHANKARAAYAN) is an independent Not for Profit Organisation founded in 2022', 'home_page', 'Footer', '2022-08-16 00:38:07', '2022-08-16 00:38:07'),
(3, 'A step to help the needy', 'A small help from you can bring a smile to everyone\'s face. And will inspire us to move forward.', 'home_page', 'Donation', '2022-08-16 00:44:57', '2022-08-16 00:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
CREATE TABLE IF NOT EXISTS `taxes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax` int NOT NULL,
  `charge` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taxes`
--

INSERT INTO `taxes` (`id`, `country`, `tax`, `charge`, `created_at`, `updated_at`) VALUES
(1, 'India', 12, 'No', '2022-08-14 06:13:55', '2022-08-14 06:13:55');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `content`, `post`, `status`, `created_at`, `updated_at`) VALUES
(1, 'kartik maandothiya', 'Shankaraayan Doing good in social welfare', 'CEO, google', 'Active', '2022-08-16 00:09:49', '2022-08-16 01:39:54'),
(2, 'Devanshu Kumar', 'It very good NGO', 'President, Shankaraayan', 'Active', '2022-08-16 01:40:43', '2022-08-16 01:41:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'kartik', 'kartik@gmail.com', NULL, '$2y$10$ZLGcbNzCCYzZtYjDiP85fegxI5Ct8.MRba9Gr4NolQ4hjTp7FIrd.', 'AOBcaZKBIFffRO71zm2gUezpPpnKJrbSKZ1OlfYUd5kR15lxCYD8yDuTZVH1', '2022-08-14 06:19:11', '2022-08-14 06:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `who_we_ares`
--

DROP TABLE IF EXISTS `who_we_ares`;
CREATE TABLE IF NOT EXISTS `who_we_ares` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `heading` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci,
  `btnText` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `btnURL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `who_we_ares`
--

INSERT INTO `who_we_ares` (`id`, `heading`, `content`, `btnText`, `btnURL`, `image`, `created_at`, `updated_at`) VALUES
(7, 'A Help Initiative NGO India', '8.1 million children need help to stay in school. These are the children whom education has passed by. These are the children whom we dream will, one day, all have access to schooling. Are these numbers daunting? Yes, perhaps. Yet, to us, transforming these numbers is what drives us each morning.\r\n<br><br>\r\nEstablished in 2022 by IT professional K.Shankaraayan, Social Worker Rakesh Kumar (Rajasthan), and Political strategist Devanshu Kumar Yadav, SHANKARAAYAN works tirelessly to keep children in school, through holistic interventions that impact the community. In Starting years, SHANKARAAYAN has transformed the lives of over 20+ women and children.', 'Know', 'what-we-do/volunteer', 'shankaraayan-a-help-initiative-ngo-india-desktopImage-09540015082022.jpg', '2022-08-15 02:32:16', '2022-08-15 04:24:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
