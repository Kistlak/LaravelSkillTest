-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2019 at 04:12 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `json_forms`
--

DROP TABLE IF EXISTS `json_forms`;
CREATE TABLE IF NOT EXISTS `json_forms` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity_in_stock` int(11) NOT NULL,
  `price_per_item` int(11) NOT NULL,
  `total_value_number` int(11) NOT NULL,
  `saved_json_data` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `json_forms`
--

INSERT INTO `json_forms` (`id`, `product_name`, `quantity_in_stock`, `price_per_item`, `total_value_number`, `saved_json_data`, `created_at`, `updated_at`) VALUES
(1, 'Bun', 2, 15, 30, '{\"Quantity\": \"2\", \"ProductName\": \"Bun\", \"PricePerItem\": \"15\", \"TotalValueNumber\": 30}', '2019-07-10 22:10:20', '2019-07-10 22:10:20'),
(14, 'Pan Cake', 10, 60, 600, '{\"Quantity\": \"10\", \"ProductName\": \"Pan Cake\", \"PricePerItem\": \"60\", \"TotalValueNumber\": 600}', '2019-07-10 22:40:22', '2019-07-10 22:40:22'),
(16, 'Chocolate', 5, 80, 400, '{\"Quantity\": \"5\", \"ProductName\": \"Chocolate\", \"PricePerItem\": \"80\", \"TotalValueNumber\": 400}', '2019-07-10 22:41:24', '2019-07-10 22:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_11_032835_create_json_forms_table', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
