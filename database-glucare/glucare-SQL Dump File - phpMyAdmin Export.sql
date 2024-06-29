-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 29, 2024 at 11:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glucare`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `morning` text NOT NULL,
  `noon` text NOT NULL,
  `night` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `morning`, `noon`, `night`, `created_at`, `updated_at`) VALUES
(1, 'runing fo thirty mint\'s ', 'go to gem', 'yoga', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(2, '30-minute brisk walk', '15-minute stretching exercises', '10-minute meditation', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(3, '20-minute yoga session', 'Light strength training (upper body)', 'Short evening walk', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(4, '25-minute cycling', '10-minute relaxation exercises', 'Gentle stretching before bed', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(5, '30-minute swimming', '15-minute resistance band workout', '5-minute breathing exercises', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(6, '30-minute jog', '20-minute Pilates', 'Light stretching', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(7, '25-minute aerobic exercises', '15-minute Tai Chi', '10-minute yoga session', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(8, '30-minute brisk walk', '10-minute core workout', '5-minute breathing exercises', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(9, '20-minute dance workout', 'Light strength training (lower body)', 'Short evening walk', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(10, '25-minute treadmill walk', '10-minute relaxation exercises', 'Gentle stretching before bed', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(11, '30-minute cycling', '15-minute chair exercises', '10-minute meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(12, '30-minute brisk walk', '20-minute yoga session', '15-minute meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(13, '25-minute swimming', '15-minute strength training (upper body)', '10-minute stretching', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(14, '30-minute dance workout', '10-minute core workout', '5-minute breathing exercises', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(15, '20-minute treadmill walk', '25-minute Pilates', '15-minute relaxation exercises', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(16, '35-minute cycling', '15-minute Tai Chi', '10-minute yoga session', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(17, '30-minute jog', '20-minute resistance band workout', '5-minute breathing exercises', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(18, '25-minute aerobic exercises', '15-minute chair exercises', '10-minute meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(19, '20-minute yoga session', '10-minute relaxation exercises', 'Short evening walk', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(20, '30-minute brisk walk', '20-minute strength training (lower body)', 'Gentle stretching before bed', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(21, '25-minute cycling', '15-minute core workout', '10-minute relaxation exercises', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(22, '25-minute cycling', '15-minute core workout', '10-minute relaxation exercises', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(23, '30-minute yoga', '20-minute walk', '5-minute meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(24, '20-minute jog', '10-minute stretching', '15-minute deep breathing', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(25, '15-minute HIIT workout', '20-minute lunchtime walk', '10-minute bedtime yoga', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(26, '40-minute weightlifting', '15-minute office stretches', '10-minute mindfulness practice', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(27, '45-minute run', '10-minute desk yoga', '20-minute progressive muscle relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(28, '20-minute bike ride', '10-minute plank', '15-minute guided meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(29, '30-minute dance workout', '15-minute walk in the park', '10-minute bedtime stretches', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(30, '20-minute jump rope', '5-minute office yoga', '15-minute mindfulness session', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(31, '10-minute bodyweight exercises', '20-minute lunch break walk', '10-minute deep breathing before bed', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(32, '15-minute jog', '10-minute desk stretches', '20-minute yoga for relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(33, '25-minute bike ride', '10-minute core workout', '15-minute meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(34, '30-minute Pilates', '15-minute walk around the block', '10-minute bedtime yoga sequence', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(35, '20-minute interval training', '10-minute stretch break', '15-minute guided sleep meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(36, '45-minute hike', '20-minute lunchtime stroll', '10-minute wind-down yoga', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(37, '15-minute bike ride', '10-minute yoga at your desk', '20-minute mindfulness meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(38, '20-minute jog', '15-minute stretch session', '10-minute bedtime yoga routine', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(39, '30-minute cardio workout', '10-minute desk yoga flow', '15-minute deep breathing exercises', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(40, '25-minute walk', '15-minute core-strengthening exercises', '10-minute guided relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(41, '40-minute bike ride', '10-minute stretching break', '15-minute meditation for sleep', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(42, '15-minute jog', '20-minute lunchtime walk', '10-minute bedtime stretches', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(43, '30-minute yoga flow', '15-minute office yoga', '10-minute deep breathing before bed', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(44, '20-minute HIIT workout', '10-minute stretching routine', '15-minute guided sleep meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(45, '45-minute run', '20-minute lunchtime jog', '10-minute wind-down yoga sequence', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(46, '25-minute bike ride', '10-minute core workout', '15-minute meditation for relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(47, '30-minute Pilates session', '15-minute walk in nature', '10-minute bedtime yoga', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(48, '20-minute interval training', '10-minute stretch', '15-minute guided sleep meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(49, '45-minute hike', '20-minute lunchtime walk', '10-minute yoga for relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(50, '15-minute bike ride', '10-minute desk yoga', '20-minute mindfulness meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(51, '20-minute jog', '15-minute stretch session', '10-minute bedtime yoga routine', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(52, '30-minute cardio workout', '10-minute desk yoga flow', '15-minute deep breathing exercises', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(53, '25-minute walk', '15-minute core-strengthening exercises', '10-minute guided relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(54, '40-minute bike ride', '10-minute stretching break', '15-minute meditation for sleep', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(55, '15-minute jog', '20-minute lunchtime walk', '10-minute bedtime stretches', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(56, '30-minute yoga flow', '15-minute office yoga', '10-minute deep breathing before bed', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(57, '20-minute HIIT workout', '10-minute stretching routine', '15-minute guided sleep meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(58, '45-minute run', '20-minute lunchtime jog', '10-minute wind-down yoga sequence', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(59, '25-minute bike ride', '10-minute core workout', '15-minute meditation for relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(60, '30-minute Pilates session', '15-minute walk in nature', '10-minute bedtime yoga', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(61, '20-minute interval training', '10-minute stretch', '15-minute guided sleep meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(62, '45-minute hike', '20-minute lunchtime walk', '10-minute yoga for relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(63, '15-minute bike ride', '10-minute desk yoga', '20-minute mindfulness meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(64, '20-minute jog', '15-minute stretch session', '10-minute bedtime yoga routine', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(65, '30-minute cardio workout', '10-minute desk yoga flow', '15-minute deep breathing exercises', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(66, '25-minute walk', '15-minute core-strengthening exercises', '10-minute guided relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(67, '40-minute bike ride', '10-minute stretching break', '15-minute meditation for sleep', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(68, '25-minute jogging', '20-minute pilates', '10-minute stretching', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(69, '30-minute swimming', '15-minute mindfulness walk', '10-minute meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(70, '20-minute HIIT', '20-minute yoga', '15-minute reading', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(71, '40-minute cycling', '10-minute desk exercises', '10-minute journaling', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(72, '30-minute brisk walk', '15-minute dance break', '10-minute deep breathing', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(73, '15-minute bodyweight workout', '20-minute elliptical', '5-minute progressive muscle relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(74, '45-minute hike', '10-minute core exercises', '10-minute guided imagery', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(75, '20-minute interval running', '15-minute tai chi', '10-minute stretching', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(76, '30-minute rowing', '20-minute stair climbing', '10-minute yoga nidra', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(77, '25-minute dance workout', '10-minute posture exercises', '10-minute body scan meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(78, '35-minute power walk', '15-minute resistance band workout', '10-minute gratitude practice', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(79, '20-minute crossfit', '20-minute meditation walk', '15-minute coloring', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(80, '30-minute treadmill', '15-minute shoulder exercises', '10-minute guided breathing', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(81, '25-minute skipping rope', '10-minute neck stretches', '10-minute bedtime yoga', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(82, '40-minute kayaking', '20-minute leg exercises', '10-minute reading', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(83, '30-minute strength training', '15-minute seated exercises', '5-minute meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(84, '15-minute circuit training', '10-minute shoulder stretches', '10-minute progressive relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(85, '45-minute swimming', '20-minute resistance training', '15-minute visualization', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(86, '20-minute power yoga', '10-minute wrist exercises', '10-minute aromatherapy', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(87, '30-minute mountain biking', '15-minute balance exercises', '10-minute bedtime storytelling', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(88, '25-minute running', '20-minute kickboxing', '10-minute self-massage', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(89, '35-minute rowing', '10-minute hip stretches', '10-minute tai chi', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(90, '30-minute Tai Chi', '15-minute Pilates', '10-minute guided imagery', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(91, '20-minute kettlebell workout', '10-minute resistance band exercises', '15-minute gratitude journaling', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(92, '35-minute nature walk', '10-minute wall sits', '10-minute deep breathing', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(93, '25-minute hula hooping', '15-minute stair climbing', '10-minute body scan meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(94, '40-minute rollerblading', '10-minute chair yoga', '15-minute yoga Nidra', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(95, '30-minute trail run', '10-minute shadow boxing', '10-minute progressive relaxation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(96, '20-minute elliptical workout', '15-minute chair exercises', '10-minute tai chi', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(97, '35-minute strength training', '10-minute leg stretches', '10-minute mantra meditation', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(98, '25-minute rowing', '15-minute arm workout', '10-minute yoga breathing', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(99, '40-minute swimming', '10-minute core exercises', '15-minute bedtime reading', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(100, '30-minute kickboxing', '10-minute resistance training', '10-minute self-reflection', '2024-06-24 14:00:17', '2024-06-24 14:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `status` enum('pending','approved','cancelled','paid') NOT NULL DEFAULT 'pending',
  `note` text DEFAULT NULL,
  `payment_status` enum('pending','paid','failed','cancelled') NOT NULL DEFAULT 'pending',
  `appointment_datetime` datetime DEFAULT NULL,
  `zoom_meeting_url` varchar(255) DEFAULT NULL,
  `duration_in_minute` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','archived') NOT NULL DEFAULT 'active',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT 1,
  `direct_message` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'text',
  `data` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_user`
--

CREATE TABLE `chat_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `status` enum('approved','pending','rejected') NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `answered` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `breakfast` varchar(255) NOT NULL,
  `lunch` varchar(255) NOT NULL,
  `dinner` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `totalCalories` int(11) NOT NULL,
  `carbohydrates` int(11) NOT NULL,
  `proteins` int(11) NOT NULL,
  `fats` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `breakfast`, `lunch`, `dinner`, `image`, `totalCalories`, `carbohydrates`, `proteins`, `fats`, `created_at`, `updated_at`) VALUES
(1, 'Oatmeal with berries', 'Grilled chicken salad', 'Baked salmon with vegetables', NULL, 1500, 150, 100, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(2, 'Greek yogurt with nuts', 'Turkey sandwich on whole grain bread', 'Stir-fried tofu with vegetables', NULL, 1600, 160, 110, 60, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(3, 'Smoothie with spinach and banana', 'Quinoa salad with chickpeas', 'Grilled steak with broccoli', NULL, 1700, 170, 120, 70, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(4, 'Scrambled eggs with spinach', 'Lentil soup with whole grain bread', 'Chicken curry with brown rice', NULL, 1800, 180, 130, 80, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(5, 'Cottage cheese with fruit', 'Tuna salad with mixed greens', 'Shrimp stir-fry with vegetables', NULL, 1900, 190, 140, 90, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(6, 'Avocado toast', 'Grilled fish tacos', 'Pork tenderloin with roasted vegetables', NULL, 2000, 200, 150, 100, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(7, 'Chia pudding', 'Chicken Caesar salad', 'Beef stew with potatoes', NULL, 2100, 210, 160, 110, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(8, 'Whole grain pancakes with berries', 'Hummus and vegetable wrap', 'Turkey chili with beans', NULL, 2200, 220, 170, 120, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(9, 'Protein shake with banana', 'Spinach and feta stuffed chicken', 'Grilled vegetables with quinoa', NULL, 2300, 230, 180, 130, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(10, 'Omelet with vegetables', 'Salmon and avocado sushi', 'Beef stir-fry with brown rice', NULL, 2400, 240, 190, 140, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(11, 'Foul medames with whole wheat bread', 'Grilled kofta with cucumber salad', 'Baked fish with steamed vegetables', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(12, 'Greek yogurt with sliced cucumber and mint', 'Stuffed grape leaves with minced meat and brown rice', 'Grilled chicken with sautéed spinach', NULL, 1450, 140, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(13, 'Shakshuka with bell peppers and tomatoes', 'Lentil soup with lemon', 'Stuffed zucchini with minced meat', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(14, 'Cheese and tomato sandwich on whole wheat bread', 'Beef kebab with roasted vegetables', 'Chicken and vegetable stew', NULL, 1500, 140, 100, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(15, 'Whole wheat pita with hummus', 'Grilled fish with tahini salad', 'Lentil and spinach curry', NULL, 1420, 135, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(16, 'Eggs with sautéed vegetables', 'Roasted chicken with green beans', 'Baked eggplant with minced meat', NULL, 1380, 130, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(17, 'Low-fat cheese with whole wheat crackers', 'Stuffed peppers with quinoa and vegetables', 'Grilled lamb with mixed greens salad', NULL, 1480, 145, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(18, 'Feta cheese with olives and tomatoes', 'Vegetable stew with chickpeas', 'Baked chicken with roasted cauliflower', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(19, 'Chickpea omelet with herbs', 'Spiced lentils with brown rice', 'Stuffed cabbage leaves with minced meat', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(20, 'Whole grain cereal with almond milk', 'Grilled turkey with mixed vegetable salad', 'Baked shrimp with zucchini noodles', NULL, 1450, 140, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(21, 'Whole grain toast with avocado and a boiled egg', 'Vegetable and lentil soup', 'Grilled tilapia with mixed greens', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(22, 'Cottage cheese with fresh fruit', 'Stuffed bell peppers with ground turkey', 'Chicken and broccoli stir-fry', NULL, 1450, 135, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(23, 'Omelet with spinach and feta cheese', 'Bulgur wheat salad with chickpeas', 'Beef and vegetable kebabs', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(24, 'Greek yogurt with nuts and berries', 'Quinoa tabbouleh with grilled chicken', 'Baked fish with tomato and olive salsa', NULL, 1500, 140, 100, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(25, 'Whole wheat pancakes with fresh fruit', 'Vegetarian stuffed grape leaves', 'Lamb stew with vegetables', NULL, 1420, 135, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(26, 'Smoothie with spinach, banana, and almond milk', 'Chicken shawarma salad', 'Baked eggplant with tomato sauce', NULL, 1380, 130, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(27, 'Whole grain cereal with low-fat milk', 'Lentil and vegetable stew', 'Grilled lamb chops with salad', NULL, 1480, 145, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(28, 'Scrambled eggs with tomatoes and parsley', 'Baked falafel with tahini sauce', 'Grilled chicken with quinoa and vegetables', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(29, 'Whole grain pita with labneh and olives', 'Vegetable couscous with grilled shrimp', 'Stuffed zucchini with rice and meat', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(30, 'Low-fat cheese with tomatoes and cucumbers', 'Spiced chickpea and spinach stew', 'Grilled fish with roasted sweet potatoes', NULL, 1450, 140, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(31, 'Oatmeal with almonds and dried fruits', 'Chicken and vegetable kebabs', 'Vegetable moussaka', NULL, 1500, 150, 100, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(32, 'Smoothie with Greek yogurt, berries, and spinach', 'Stuffed eggplant with ground meat and vegetables', 'Roasted chicken with cauliflower rice', NULL, 1420, 135, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(33, 'Whole wheat toast with almond butter', 'Lentil salad with cucumbers and tomatoes', 'Grilled beef steak with steamed vegetables', NULL, 1380, 130, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(34, 'Greek yogurt with honey and walnuts', 'Vegetarian stuffed peppers with quinoa', 'Baked fish with lemon and garlic', NULL, 1480, 145, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(35, 'Whole grain cereal with berries', 'Grilled chicken with tabbouleh salad', 'Vegetable and chickpea curry', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(36, 'Eggs with mushrooms and tomatoes', 'Vegetable and lentil stew', 'Stuffed cabbage leaves with beef', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(37, 'Smoothie with banana, spinach, and almond milk', 'Grilled shrimp with vegetable salad', 'Baked chicken with steamed broccoli', NULL, 1500, 150, 100, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(38, 'Whole grain bread with avocado and egg', 'Stuffed peppers with rice and ground meat', 'Grilled salmon with mixed greens', NULL, 1420, 135, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(39, 'Cottage cheese with sliced cucumber', 'Quinoa salad with grilled vegetables', 'Beef stew with carrots and potatoes', NULL, 1380, 130, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(40, 'Scrambled eggs with spinach and tomatoes', 'Chicken and vegetable soup', 'Baked fish with roasted vegetables', NULL, 1480, 145, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(41, 'Foul medames with a side of cucumber slices', 'Grilled chicken with a mixed green salad', 'Baked fish with steamed broccoli', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(42, 'Greek yogurt with fresh berries', 'Stuffed bell peppers with ground turkey and brown rice', 'Grilled lamb with roasted vegetables', NULL, 1450, 135, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(43, 'Oatmeal with almond milk and sliced almonds', 'Lentil soup with a side salad', 'Chicken and vegetable kebabs', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(44, 'Whole grain toast with avocado and a boiled egg', 'Quinoa salad with chickpeas and grilled vegetables', 'Baked fish with a tomato and cucumber salad', NULL, 1500, 140, 100, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(45, 'Smoothie with spinach, banana, and almond milk', 'Vegetable stew with chickpeas', 'Grilled chicken with quinoa and steamed vegetables', NULL, 1420, 135, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(46, 'Scrambled eggs with tomatoes and onions', 'Chicken shawarma salad', 'Baked eggplant with minced meat', NULL, 1380, 130, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(47, 'Whole wheat pita with hummus and sliced tomatoes', 'Grilled fish with a side of mixed greens', 'Vegetable and lentil curry', NULL, 1480, 145, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(48, 'Low-fat cheese with cucumber slices', 'Stuffed grape leaves with rice and minced meat', 'Grilled chicken with a side of sautéed spinach', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(49, 'Omelet with spinach and tomatoes', 'Vegetable couscous with grilled shrimp', 'Stuffed zucchini with minced meat and rice', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(50, 'Whole grain cereal with low-fat milk', 'Vegetarian stuffed peppers with quinoa', 'Grilled beef with mixed vegetables', NULL, 1450, 140, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(51, 'Greek yogurt with honey and walnuts', 'Vegetable moussaka', 'Grilled fish with a side of steamed carrots', NULL, 1500, 150, 100, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(52, 'Smoothie with berries, spinach, and almond milk', 'Bulgur wheat salad with chickpeas', 'Chicken and vegetable stew', NULL, 1420, 135, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(53, 'Whole wheat toast with almond butter', 'Spiced lentils with a side of mixed greens', 'Grilled beef steak with steamed vegetables', NULL, 1380, 130, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(54, 'Greek yogurt with honey and berries', 'Vegetarian stuffed grape leaves', 'Baked fish with lemon and garlic', NULL, 1480, 145, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(55, 'Whole grain cereal with fresh berries', 'Grilled chicken with tabbouleh salad', 'Vegetable and chickpea curry', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(56, 'Scrambled eggs with mushrooms and tomatoes', 'Vegetable and lentil stew', 'Stuffed cabbage leaves with minced beef', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(57, 'Smoothie with banana, spinach, and almond milk', 'Grilled shrimp with a side of mixed greens', 'Baked chicken with steamed broccoli', NULL, 1500, 150, 100, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(58, 'Whole wheat bread with avocado and egg', 'Stuffed peppers with rice and minced meat', 'Grilled salmon with mixed greens', NULL, 1420, 135, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(59, 'Cottage cheese with sliced cucumber', 'Quinoa salad with grilled vegetables', 'Beef stew with carrots and potatoes', NULL, 1380, 130, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(60, 'Scrambled eggs with spinach and tomatoes', 'Chicken and vegetable soup', 'Baked fish with roasted vegetables', NULL, 1480, 145, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(61, 'Foul medames with a side of sliced tomatoes', 'Grilled chicken with a mixed green salad', 'Baked fish with steamed green beans', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(62, 'Greek yogurt with sliced almonds', 'Stuffed bell peppers with ground beef and brown rice', 'Grilled lamb with roasted vegetables', NULL, 1450, 135, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(63, 'Oatmeal with fresh fruit and nuts', 'Lentil soup with a side salad', 'Chicken and vegetable kebabs', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(64, 'Whole grain toast with avocado and a boiled egg', 'Quinoa salad with chickpeas and grilled vegetables', 'Baked fish with a tomato and cucumber salad', NULL, 1500, 140, 100, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(65, 'Smoothie with spinach, banana, and almond milk', 'Vegetable stew with chickpeas', 'Grilled chicken with quinoa and steamed vegetables', NULL, 1420, 135, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(66, 'Scrambled eggs with tomatoes and onions', 'Chicken shawarma salad', 'Baked eggplant with minced meat', NULL, 1380, 130, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(67, 'Whole wheat pita with hummus and sliced tomatoes', 'Grilled fish with a side of mixed greens', 'Vegetable and lentil curry', NULL, 1480, 145, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(68, 'Low-fat cheese with cucumber slices', 'Stuffed grape leaves with rice and minced meat', 'Grilled chicken with a side of sautéed spinach', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(69, 'Omelet with spinach and tomatoes', 'Vegetable couscous with grilled shrimp', 'Stuffed zucchini with minced meat and rice', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(70, 'Whole grain cereal with low-fat milk', 'Vegetarian stuffed peppers with quinoa', 'Grilled beef with mixed vegetables', NULL, 1450, 140, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(71, 'Greek yogurt with honey and walnuts', 'Vegetable moussaka', 'Grilled fish with a side of steamed carrots', NULL, 1500, 150, 100, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(72, 'Foul medames with a side of cucumber slices', 'Grilled chicken with a mixed green salad', 'Baked fish with steamed broccoli', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(73, 'Greek yogurt with fresh berries', 'Stuffed bell peppers with ground turkey and brown rice', 'Grilled lamb with roasted vegetables', NULL, 1450, 135, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(74, 'Oatmeal with almond milk and sliced almonds', 'Lentil soup with a side salad', 'Chicken and vegetable kebabs', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(75, 'Whole grain toast with avocado and a boiled egg', 'Quinoa salad with chickpeas and grilled vegetables', 'Baked fish with a tomato and cucumber salad', NULL, 1500, 140, 100, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(76, 'Smoothie with spinach, banana, and almond milk', 'Vegetable stew with chickpeas', 'Grilled chicken with quinoa and steamed vegetables', NULL, 1420, 135, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(77, 'Scrambled eggs with tomatoes and onions', 'Chicken shawarma salad', 'Baked eggplant with minced meat', NULL, 1380, 130, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(78, 'Whole wheat pita with hummus and sliced tomatoes', 'Grilled fish with a side of mixed greens', 'Vegetable and lentil curry', NULL, 1480, 145, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(79, 'Low-fat cheese with cucumber slices', 'Stuffed grape leaves with rice and minced meat', 'Grilled chicken with a side of sautéed spinach', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(80, 'Omelet with spinach and tomatoes', 'Vegetable couscous with grilled shrimp', 'Stuffed zucchini with minced meat and rice', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(81, 'Foul medames with a side of sliced tomatoes', 'Grilled chicken with a mixed green salad', 'Baked fish with steamed green beans', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(82, 'Greek yogurt with sliced almonds', 'Stuffed bell peppers with ground beef and brown rice', 'Grilled lamb with roasted vegetables', NULL, 1450, 135, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(83, 'Oatmeal with fresh fruit and nuts', 'Lentil soup with a side salad', 'Chicken and vegetable kebabs', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(84, 'Whole grain toast with avocado and a boiled egg', 'Quinoa salad with chickpeas and grilled vegetables', 'Baked fish with a tomato and cucumber salad', NULL, 1500, 140, 100, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(85, 'Smoothie with spinach, banana, and almond milk', 'Vegetable stew with chickpeas', 'Grilled chicken with quinoa and steamed vegetables', NULL, 1420, 135, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(86, 'Scrambled eggs with tomatoes and onions', 'Chicken shawarma salad', 'Baked eggplant with minced meat', NULL, 1380, 130, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(87, 'Whole wheat pita with hummus and sliced tomatoes', 'Grilled fish with a side of mixed greens', 'Vegetable and lentil curry', NULL, 1480, 145, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(88, 'Low-fat cheese with cucumber slices', 'Stuffed grape leaves with rice and minced meat', 'Grilled chicken with a side of sautéed spinach', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(89, 'Omelet with spinach and tomatoes', 'Vegetable couscous with grilled shrimp', 'Stuffed zucchini with minced meat and rice', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(90, 'Whole grain cereal with low-fat milk', 'Vegetarian stuffed peppers with quinoa', 'Grilled beef with mixed vegetables', NULL, 1450, 140, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(91, 'Greek yogurt with honey and walnuts', 'Vegetable moussaka', 'Grilled fish with a side of steamed carrots', NULL, 1500, 150, 100, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(92, 'Smoothie with berries, spinach, and almond milk', 'Bulgur wheat salad with chickpeas', 'Chicken and vegetable stew', NULL, 1420, 135, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(93, 'Whole wheat toast with almond butter', 'Spiced lentils with a side of mixed greens', 'Grilled beef steak with steamed vegetables', NULL, 1380, 130, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(94, 'Greek yogurt with honey and berries', 'Vegetarian stuffed grape leaves', 'Baked fish with lemon and garlic', NULL, 1480, 145, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(95, 'Whole grain cereal with fresh berries', 'Grilled chicken with tabbouleh salad', 'Vegetable and chickpea curry', NULL, 1400, 130, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(96, 'Scrambled eggs with mushrooms and tomatoes', 'Vegetable and lentil stew', 'Stuffed cabbage leaves with minced beef', NULL, 1350, 125, 85, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(97, 'Oatmeal with sliced almonds and blueberries', 'Grilled chicken salad with vinaigrette dressing', 'Salmon with quinoa and steamed vegetables', NULL, 1400, 120, 85, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(98, 'Greek yogurt with sliced strawberries and a sprinkle of chia seeds', 'Turkey and avocado wrap with whole wheat tortilla', 'Lean beef stir-fry with broccoli and brown rice', NULL, 1450, 130, 95, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(99, 'Oatmeal with sliced almonds and blueberries', 'Grilled chicken salad with mixed greens and vinaigrette dressing', 'Salmon with quinoa and steamed vegetables', NULL, 1450, 120, 95, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(100, 'Greek yogurt with sliced strawberries and a sprinkle of nuts', 'Turkey and avocado wrap with whole grain tortilla', 'Vegetable stir-fry with tofu and brown rice', NULL, 1400, 130, 85, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(101, 'Greek yogurt with chia seeds and raspberries', 'Turkey and avocado wrap with mixed greens', 'Grilled cod with brown rice and roasted Brussels sprouts', NULL, 1300, 110, 90, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(102, 'Scrambled eggs with spinach and whole grain toast', 'Quinoa salad with black beans, corn, and bell peppers', 'Chicken stir-fry with broccoli and snap peas', NULL, 1350, 115, 100, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(103, 'Smoothie with kale, banana, and almond milk', 'Grilled salmon salad with mixed greens and a lemon vinaigrette', 'Baked chicken breast with sweet potatoes and green beans', NULL, 1450, 130, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(104, 'Overnight oats with apple slices and walnuts', 'Lentil soup with a side of mixed vegetables', 'Pork tenderloin with roasted asparagus and quinoa', NULL, 1400, 120, 85, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(105, 'Cottage cheese with peach slices and a sprinkle of flaxseeds', 'Veggie burger on a whole grain bun with a side salad', 'Tilapia with wild rice and steamed broccoli', NULL, 1380, 115, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(106, 'Smoothie bowl with berries, spinach, and chia seeds', 'Grilled chicken Caesar salad with a light dressing', 'Shrimp and vegetable stir-fry with brown rice', NULL, 1420, 125, 88, 47, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(107, 'Whole grain toast with avocado and a poached egg', 'Chickpea and spinach salad with lemon tahini dressing', 'Baked salmon with quinoa and sautéed kale', NULL, 1370, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(108, 'Chia pudding with almond milk and strawberries', 'Turkey and vegetable wrap with hummus', 'Grilled chicken with roasted carrots and brown rice', NULL, 1410, 122, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(109, 'Greek yogurt with mixed berries and granola', 'Lentil and quinoa bowl with avocado and cherry tomatoes', 'Stuffed bell peppers with ground turkey and brown rice', NULL, 1360, 120, 87, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(110, 'Smoothie with spinach, mango, and coconut milk', 'Chicken and vegetable stir-fry with whole grain noodles', 'Baked cod with sweet potato and green beans', NULL, 1450, 125, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(111, 'Omelet with bell peppers, onions, and tomatoes', 'Mixed green salad with chickpeas and a balsamic vinaigrette', 'Grilled tilapia with quinoa and roasted zucchini', NULL, 1400, 120, 85, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(112, 'Almond flour pancakes with fresh blueberries', 'Chicken and black bean salad with avocado', 'Grilled shrimp with wild rice and steamed broccoli', NULL, 1350, 115, 95, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(113, 'Smoothie bowl with kale, pineapple, and chia seeds', 'Quinoa and vegetable salad with lemon dressing', 'Baked chicken with roasted vegetables and brown rice', NULL, 1420, 125, 88, 47, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(114, 'Whole grain toast with almond butter and banana slices', 'Lentil soup with a side salad', 'Salmon with quinoa and sautéed spinach', NULL, 1380, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(115, 'Greek yogurt with honey and walnuts', 'Turkey wrap with mixed greens and hummus', 'Grilled chicken with sweet potato and green beans', NULL, 1410, 122, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(116, 'Chia pudding with almond milk and raspberries', 'Vegetable stir-fry with tofu and brown rice', 'Baked cod with wild rice and roasted Brussels sprouts', NULL, 1360, 120, 87, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(117, 'Smoothie with spinach, banana, and almond milk', 'Grilled chicken Caesar salad with a light dressing', 'Shrimp and vegetable stir-fry with quinoa', NULL, 1450, 130, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(118, 'Scrambled eggs with spinach and whole grain toast', 'Chickpea salad with mixed greens and lemon vinaigrette', 'Grilled salmon with brown rice and steamed broccoli', NULL, 1350, 115, 100, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(119, 'Overnight oats with berries and almonds', 'Quinoa bowl with black beans, corn, and avocado', 'Chicken stir-fry with snap peas and brown rice', NULL, 1400, 120, 85, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(120, 'Greek yogurt with granola and strawberries', 'Turkey and avocado wrap with a side salad', 'Baked chicken with roasted carrots and quinoa', NULL, 1380, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(121, 'Buckwheat pancakes with fresh strawberries', 'Grilled tofu salad with sesame dressing', 'Turkey meatballs with zucchini noodles and marinara sauce', NULL, 1400, 120, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(122, 'Smoothie with spinach, apple, and ginger', 'Chickpea and cucumber salad with lemon dressing', 'Baked salmon with cauliflower rice and roasted vegetables', NULL, 1350, 110, 95, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(123, 'Quinoa porridge with blueberries and almonds', 'Vegetable lentil stew with a side of mixed greens', 'Grilled chicken with mashed cauliflower and green beans', NULL, 1420, 125, 88, 47, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(124, 'Cottage cheese with pineapple chunks and chia seeds', 'Grilled shrimp salad with avocado and lime dressing', 'Turkey chili with a side of mixed vegetables', NULL, 1380, 115, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(125, 'Smoothie with kale, banana, and flaxseeds', 'Chicken and quinoa bowl with roasted veggies', 'Baked cod with sweet potato fries and sautéed spinach', NULL, 1370, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(126, 'Egg white omelet with mushrooms and tomatoes', 'Tuna salad with mixed greens and olive oil dressing', 'Grilled pork chop with asparagus and wild rice', NULL, 1410, 122, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(127, 'Oatmeal with sliced peaches and walnuts', 'Vegetarian chili with a side salad', 'Grilled chicken with roasted Brussels sprouts and quinoa', NULL, 1360, 120, 87, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(128, 'Smoothie with spinach, pineapple, and coconut water', 'Grilled salmon with mixed greens and vinaigrette', 'Stuffed bell peppers with ground chicken and brown rice', NULL, 1450, 130, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(129, 'Avocado toast with cherry tomatoes and poached egg', 'Black bean and corn salad with cilantro lime dressing', 'Baked tilapia with mashed sweet potatoes and green beans', NULL, 1380, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(130, 'Greek yogurt with honey and mixed nuts', 'Chicken and vegetable stir-fry with quinoa', 'Grilled shrimp with brown rice and steamed broccoli', NULL, 1410, 122, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(131, 'Smoothie bowl with spinach, mango, and chia seeds', 'Lentil and spinach salad with lemon tahini dressing', 'Grilled chicken with roasted cauliflower and brown rice', NULL, 1360, 120, 87, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(132, 'Buckwheat waffles with fresh raspberries', 'Turkey and avocado salad with mixed greens', 'Baked salmon with wild rice and roasted zucchini', NULL, 1450, 130, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(133, 'Smoothie with kale, apple, and almond milk', 'Chickpea and quinoa bowl with avocado and cherry tomatoes', 'Baked chicken breast with sweet potato and sautéed kale', NULL, 1350, 115, 100, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(134, 'Greek yogurt with mixed berries and flaxseeds', 'Tuna and avocado wrap with mixed greens', 'Grilled pork tenderloin with mashed cauliflower and green beans', NULL, 1420, 125, 88, 47, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(135, 'Overnight oats with sliced apples and almonds', 'Vegetable lentil soup with a side of mixed greens', 'Grilled chicken with roasted carrots and brown rice', NULL, 1400, 120, 85, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(136, 'Scrambled eggs with bell peppers and onions', 'Mixed green salad with chickpeas and balsamic vinaigrette', 'Grilled tilapia with quinoa and roasted vegetables', NULL, 1350, 115, 100, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(137, 'Smoothie with spinach, banana, and almond milk', 'Turkey and avocado salad with lemon dressing', 'Baked salmon with wild rice and sautéed spinach', NULL, 1380, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(138, 'Chia pudding with almond milk and fresh berries', 'Vegetable stir-fry with tofu and brown rice', 'Grilled chicken with roasted sweet potatoes and green beans', NULL, 1420, 125, 88, 47, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(139, 'Oatmeal with sliced almonds and banana', 'Quinoa and black bean bowl with avocado', 'Baked cod with cauliflower rice and roasted Brussels sprouts', NULL, 1360, 120, 87, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(140, 'Greek yogurt with granola and fresh blueberries', 'Chicken and vegetable stir-fry with quinoa', 'Baked salmon with brown rice and steamed broccoli', NULL, 1450, 130, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(141, 'Spinach and feta omelet with whole grain toast', 'Grilled vegetable wrap with hummus', 'Roasted chicken with Brussels sprouts and quinoa', NULL, 1350, 115, 100, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(142, 'Smoothie with kale, blueberries, and almond milk', 'Mixed green salad with grilled shrimp and avocado', 'Baked salmon with wild rice and steamed asparagus', NULL, 1400, 120, 85, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(143, 'Greek yogurt with chia seeds and honey', 'Lentil and sweet potato stew', 'Grilled turkey breast with roasted carrots and brown rice', NULL, 1420, 125, 88, 47, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(144, 'Whole grain toast with peanut butter and sliced banana', 'Quinoa salad with roasted vegetables and lemon dressing', 'Grilled shrimp with zucchini noodles and marinara sauce', NULL, 1380, 115, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(145, 'Smoothie with spinach, mango, and chia seeds', 'Turkey and avocado wrap with mixed greens', 'Baked cod with mashed cauliflower and green beans', NULL, 1370, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(146, 'Oatmeal with cinnamon, apples, and walnuts', 'Tuna salad with mixed greens and olive oil dressing', 'Grilled chicken with sweet potato and roasted vegetables', NULL, 1410, 122, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(147, 'Cottage cheese with sliced pears and chia seeds', 'Vegetable stir-fry with tofu and brown rice', 'Grilled pork chop with mashed sweet potatoes and green beans', NULL, 1360, 120, 87, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(148, 'Smoothie with spinach, apple, and ginger', 'Grilled chicken salad with mixed greens and balsamic vinaigrette', 'Baked tilapia with wild rice and roasted Brussels sprouts', NULL, 1450, 130, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(149, 'Whole grain toast with avocado and scrambled eggs', 'Black bean and corn salad with cilantro lime dressing', 'Grilled salmon with quinoa and sautéed spinach', NULL, 1380, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(150, 'Greek yogurt with honey and pecans', 'Chickpea salad with mixed greens and lemon tahini dressing', 'Baked chicken breast with roasted carrots and brown rice', NULL, 1410, 122, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(151, 'Chia pudding with almond milk and fresh raspberries', 'Vegetable lentil soup with a side salad', 'Grilled shrimp with roasted vegetables and quinoa', NULL, 1360, 120, 87, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(152, 'Smoothie with spinach, pineapple, and coconut water', 'Grilled turkey and vegetable wrap with hummus', 'Baked salmon with mashed cauliflower and steamed broccoli', NULL, 1450, 130, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(153, 'Oatmeal with sliced almonds and blueberries', 'Quinoa bowl with black beans, corn, and avocado', 'Grilled chicken with sweet potato and green beans', NULL, 1350, 115, 100, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(154, 'Greek yogurt with granola and strawberries', 'Tuna and avocado salad with mixed greens', 'Grilled pork tenderloin with roasted vegetables and brown rice', NULL, 1420, 125, 88, 47, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(155, 'Overnight oats with berries and flaxseeds', 'Vegetarian chili with a side salad', 'Baked cod with wild rice and steamed asparagus', NULL, 1400, 120, 85, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(156, 'Smoothie with kale, banana, and almond milk', 'Mixed green salad with chickpeas and balsamic vinaigrette', 'Grilled chicken with roasted sweet potatoes and green beans', NULL, 1350, 115, 100, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(157, 'Chia pudding with coconut milk and fresh blueberries', 'Grilled vegetable and quinoa salad with lemon dressing', 'Baked salmon with brown rice and roasted zucchini', NULL, 1380, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(158, 'Buckwheat pancakes with fresh raspberries', 'Turkey and avocado wrap with mixed greens', 'Grilled shrimp with wild rice and sautéed spinach', NULL, 1420, 125, 88, 47, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(159, 'Greek yogurt with chia seeds and strawberries', 'Lentil and quinoa salad with mixed greens and lemon dressing', 'Grilled chicken with roasted Brussels sprouts and quinoa', NULL, 1400, 120, 85, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(160, 'Smoothie with spinach, mango, and almond milk', 'Grilled tofu and vegetable stir-fry with brown rice', 'Baked cod with mashed cauliflower and green beans', NULL, 1370, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(161, 'Chia seed pudding with fresh strawberries', 'Lentil soup with a side of whole-grain bread', 'Grilled tilapia with a side of mixed greens', NULL, 1350, 115, 80, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(162, 'Low-fat Greek yogurt with mixed nuts and honey', 'Chickpea salad with cucumbers, tomatoes, and feta cheese', 'Stir-fried tofu with broccoli and bell peppers', NULL, 1300, 110, 75, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(163, 'Egg white omelette with spinach and mushrooms', 'Turkey wrap with avocado and sprouts', 'Baked chicken breast with roasted cauliflower', NULL, 1400, 120, 85, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(164, 'Smoothie with kale, banana, and almond milk', 'Quinoa salad with cherry tomatoes and pine nuts', 'Grilled pork chop with apple sauce and green beans', NULL, 1450, 125, 90, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(165, 'Whole grain pancakes with a dollop of ricotta cheese', 'Vegetable stir-fry with brown rice', 'Roasted turkey with sweet potato mash', NULL, 1500, 130, 95, 60, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(166, 'Smoothie with spinach, pineapple, and chia seeds', 'Quinoa salad with roasted butternut squash and cranberries', 'Grilled swordfish with quinoa and steamed broccoli', NULL, 1400, 120, 85, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(167, 'Scrambled eggs with spinach and tomatoes', 'Chicken Caesar salad with light dressing', 'Baked haddock with wild rice and green beans', NULL, 1350, 115, 100, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(168, 'Greek yogurt with pumpkin seeds and cinnamon', 'Turkey and vegetable stir-fry with brown rice', 'Grilled chicken with cauliflower rice and roasted carrots', NULL, 1420, 125, 88, 47, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(169, 'Overnight oats with almond butter and sliced bananas', 'Spinach and strawberry salad with grilled chicken', 'Baked trout with sweet potato and steamed broccoli', NULL, 1380, 115, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(170, 'Smoothie with kale, apple, and ginger', 'Vegetable lentil soup with a side of whole grain bread', 'Grilled lamb chops with quinoa and roasted Brussels sprouts', NULL, 1370, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(171, 'Greek yogurt with blueberries and walnuts', 'Quinoa and chickpea salad with lemon dressing', 'Grilled chicken with mashed sweet potatoes and green beans', NULL, 1410, 122, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(172, 'Smoothie with spinach, mango, and flaxseeds', 'Tuna salad with avocado and mixed greens', 'Baked salmon with wild rice and roasted vegetables', NULL, 1360, 120, 87, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(173, 'Oatmeal with raspberries and almonds', 'Turkey and cranberry wrap with mixed greens', 'Grilled shrimp with quinoa and steamed spinach', NULL, 1450, 130, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(174, 'Greek yogurt with granola and mixed berries', 'Vegetable quinoa bowl with lemon tahini dressing', 'Grilled pork chop with mashed cauliflower and green beans', NULL, 1380, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(175, 'Smoothie with spinach, banana, and almond milk', 'Chickpea and vegetable stir-fry with brown rice', 'Baked cod with wild rice and roasted Brussels sprouts', NULL, 1410, 122, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(176, 'Scrambled eggs with mushrooms and bell peppers', 'Mixed green salad with grilled chicken and avocado', 'Grilled salmon with quinoa and steamed asparagus', NULL, 1360, 120, 87, 45, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(177, 'Greek yogurt with chia seeds and honey', 'Turkey and avocado wrap with mixed greens', 'Baked chicken breast with roasted carrots and brown rice', NULL, 1450, 130, 95, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(178, 'Oatmeal with sliced peaches and walnuts', 'Vegetarian chili with a side salad', 'Grilled chicken with mashed cauliflower and roasted vegetables', NULL, 1350, 115, 100, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(179, 'Smoothie with kale, banana, and flaxseeds', 'Mixed green salad with chickpeas and balsamic vinaigrette', 'Baked tilapia with quinoa and sautéed spinach', NULL, 1420, 125, 88, 47, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(180, 'Greek yogurt with granola and fresh berries', 'Lentil and vegetable stew with a side salad', 'Grilled turkey breast with roasted Brussels sprouts and quinoa', NULL, 1400, 120, 85, 55, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(181, 'Chia pudding with almond milk and fresh strawberries', 'Grilled shrimp and vegetable skewers with brown rice', 'Baked chicken with wild rice and steamed broccoli', NULL, 1370, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(182, 'Scrambled eggs with spinach and feta cheese', 'Quinoa salad with black beans, corn, and avocado', 'Grilled pork tenderloin with roasted sweet potatoes and green beans', NULL, 1380, 118, 92, 48, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(183, 'Smoothie with spinach, pineapple, and ginger', 'Tuna and avocado salad with mixed greens', 'Baked salmon with quinoa and roasted vegetables', NULL, 1410, 122, 90, 50, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(184, 'Greek yogurt with chia seeds and mixed berries', 'Vegetable and chickpea curry with brown rice', 'Grilled chicken with mashed cauliflower and green beans', NULL, 1350, 115, 100, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(185, 'Overnight oats with almond butter and fresh blueberries', 'Grilled vegetable wrap with hummus', 'Baked cod with wild rice and steamed broccoli', NULL, 1420, 125, 88, 47, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(186, 'Greek yogurt with berries and chia seeds', 'Black bean and corn salad with whole wheat tortilla', 'Turkey chili with whole wheat bread', NULL, 500, 60, 40, 20, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(187, 'Scrambled eggs with whole wheat toast and avocado', 'Tuna salad sandwich on whole wheat bread with side salad', 'Chicken stir-fry with brown rice and mixed vegetables', NULL, 600, 70, 70, 30, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(188, 'Whole wheat pancakes with cottage cheese and fruit', 'Lentil soup with whole grain crackers', 'Baked cod with roasted sweet potato and broccoli', NULL, 700, 80, 60, 35, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(189, 'Chia pudding with almond milk and sliced almonds', 'Chicken breast with mixed greens, walnuts, and vinaigrette', 'Vegetarian chili with a side of brown rice', NULL, 650, 75, 55, 30, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(190, 'Whole wheat toast with nut butter and banana slices', 'Salmon salad with mixed greens and quinoa', 'Lentil pasta with roasted vegetables and feta cheese', NULL, 800, 90, 70, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(191, 'Hard-boiled eggs with whole wheat toast and tomato slices', 'Black bean burger on a whole wheat bun with sweet potato fries', 'Tofu stir-fry with brown rice and mixed vegetables', NULL, 750, 85, 65, 35, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(192, 'Smoothie with Greek yogurt, spinach, berries, and protein powder', 'Chicken Caesar salad with whole wheat croutons (light dressing)', 'Shrimp scampi with whole wheat pasta and steamed broccoli', NULL, 600, 70, 50, 25, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(193, 'Oatmeal with pumpkin seeds and chopped apple', 'Tuna salad with whole wheat crackers and a side salad', 'Turkey meatballs with zucchini noodles and marinara sauce', NULL, 550, 65, 45, 20, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(194, 'Whole wheat waffles with ricotta cheese and sliced pears', 'Chicken breast sandwich on whole wheat bread with avocado', 'Salmon with roasted Brussels sprouts and quinoa', NULL, 700, 80, 65, 30, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(195, 'Cottage cheese with fruit and a sprinkle of granola', 'Lentil soup with a side salad and whole wheat roll', 'Baked chicken with roasted sweet potato and asparagus', NULL, 650, 75, 50, 35, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(196, 'Scrambled tofu with spinach and whole wheat toast', 'Chickpea salad sandwich on whole wheat bread with side salad', 'Grilled flank steak with quinoa salad', NULL, 700, 85, 60, 30, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(197, 'Protein smoothie with almond milk, banana, and protein powder', 'Black bean soup with a whole wheat tortilla', 'Baked cod with roasted asparagus and brown rice', NULL, 650, 70, 50, 25, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(198, 'Whole wheat English muffin with poached egg and avocado slices', 'Turkey and vegetable wrap with a whole wheat tortilla', 'Chicken fajitas with whole wheat tortillas, grilled peppers, and onions', NULL, 800, 90, 75, 35, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(199, 'Greek yogurt parfait with granola, berries, and a drizzle of honey', 'Salmon with quinoa and steamed green beans', 'Lentil and vegetable stew with a side of whole wheat bread', NULL, 750, 80, 60, 40, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(200, 'Whole wheat pancakes with nut butter and sliced banana', 'Chicken breast salad with mixed greens, cranberries, and balsamic vinaigrette', 'Tofu scramble with whole wheat toast and roasted vegetables', NULL, 600, 65, 55, 20, '2024-06-24 14:00:16', '2024-06-24 14:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `queue`, `payload`, `attempts`, `reserved_at`, `available_at`, `created_at`) VALUES
(1, 'default', '{\"uuid\":\"664161cf-e5ed-49e7-af43-a7eff2da201a\",\"displayName\":\"App\\\\Events\\\\GluCare\\\\Detection\\\\PatientDataAddedEvent\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\",\"command\":\"O:38:\\\"Illuminate\\\\Broadcasting\\\\BroadcastEvent\\\":13:{s:5:\\\"event\\\";O:50:\\\"App\\\\Events\\\\GluCare\\\\Detection\\\\PatientDataAddedEvent\\\":4:{s:4:\\\"user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:2:{i:0;s:5:\\\"roles\\\";i:1;s:11:\\\"permissions\\\";}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:11:\\\"patientData\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:50:\\\"App\\\\Models\\\\GluCare\\\\Detection\\\\PatientDataOfDiabetes\\\";s:2:\\\"id\\\";i:1;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:10:\\\"prediction\\\";i:0;s:4:\\\"type\\\";s:6:\\\"Normal\\\";}s:5:\\\"tries\\\";N;s:7:\\\"timeout\\\";N;s:7:\\\"backoff\\\";N;s:10:\\\"connection\\\";N;s:5:\\\"queue\\\";N;s:15:\\\"chainConnection\\\";N;s:10:\\\"chainQueue\\\";N;s:19:\\\"chainCatchCallbacks\\\";N;s:5:\\\"delay\\\";N;s:11:\\\"afterCommit\\\";N;s:10:\\\"middleware\\\";a:0:{}s:7:\\\"chained\\\";a:0:{}}\"}}', 0, NULL, 1719241277, 1719241277);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `likeable_type` varchar(255) NOT NULL,
  `likeable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_00_00_000000_create_websockets_statistics_entries_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_03_20_125801_create_permission_tables', 1),
(7, '2024_03_28_203835_create_website_settings_table', 1),
(8, '2024_03_31_011647_create_media_table', 1),
(9, '2024_04_04_160136_create_jobs_table', 1),
(10, '2024_04_12_222530_create_notifications_table', 1),
(11, '2024_04_14_192530_create_categories_table', 1),
(12, '2024_04_16_190657_create_posts_table', 1),
(13, '2024_04_22_143937_create_tags_table', 1),
(14, '2024_04_22_144020_create_post_tag_table', 1),
(15, '2024_04_23_142831_create_comments_table', 1),
(16, '2024_04_23_180151_add_views_and_comments_and_likes_to_posts', 1),
(17, '2024_04_24_173213_create_likes_table', 1),
(18, '2024_04_26_110559_create_patient_data_of_diabetes_table', 1),
(19, '2024_04_27_224352_create_chats_table', 1),
(20, '2024_04_27_224711_create_chat_messages_table', 1),
(21, '2024_04_27_225142_create_chat_user_table', 1),
(22, '2024_04_30_162350_create_appointments_table', 1),
(23, '2024_05_02_115614_add_doctor_details_to_users_table', 1),
(24, '2024_05_04_133559_create_payments_table', 1),
(25, '2024_05_10_140628_create_providers_table', 1),
(26, '2024_05_26_151916_create_contact_forms_table', 1),
(27, '2024_06_17_132214_create_foods_table', 1),
(28, '2024_06_17_134221_create_user_food_likes_table', 1),
(29, '2024_06_24_121143_create_activities_table', 1),
(30, '2024_06_24_122533_create_user_activity_likes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('185a0f53-cd8d-44c8-80fe-c9eea30cb1a8', 'App\\Notifications\\Auth\\LoginNotification', 'App\\Models\\User', 1, '{\"message\":\"Your login was successful.\",\"name\":\"Admin\",\"email\":\"admin@gmail.com\"}', NULL, '2024-06-24 14:00:46', '2024-06-24 14:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_data_of_diabetes`
--

CREATE TABLE `patient_data_of_diabetes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gender` enum('female','male') NOT NULL,
  `age` int(11) NOT NULL,
  `hypertension` int(11) NOT NULL,
  `heart_disease` int(11) NOT NULL,
  `smoking_history` enum('former','No info','never','current','not current') NOT NULL,
  `bmi` double(8,2) NOT NULL,
  `height` double(8,2) NOT NULL,
  `weight` double(8,2) NOT NULL,
  `HbA1c_level` double(8,2) NOT NULL,
  `blood_glucose_level` int(11) NOT NULL,
  `diabetes_type` enum('normal','diabetes') NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_data_of_diabetes`
--

INSERT INTO `patient_data_of_diabetes` (`id`, `user_id`, `gender`, `age`, `hypertension`, `heart_disease`, `smoking_history`, `bmi`, `height`, `weight`, `HbA1c_level`, `blood_glucose_level`, `diabetes_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'female', 24, 0, 0, 'never', 23.80, 157.10, 58.80, 6.60, 140, 'normal', NULL, '2024-06-24 14:01:17', '2024-06-24 14:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `currency` char(255) NOT NULL DEFAULT 'USD',
  `status` enum('pending','paid','failed','cancelled') NOT NULL DEFAULT 'pending',
  `transaction_id` varchar(255) DEFAULT NULL,
  `transaction_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`transaction_data`)),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'categories_view', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(2, 'posts_view', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(3, 'comments_create', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(4, 'comments_edit', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(5, 'comments_delete', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(6, 'comments_view', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(7, 'comments_show', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(8, 'likes_create', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(9, 'PatientDataOfDiabetes_view', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(10, 'PatientDataOfDiabetes_show', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(11, 'PatientDataOfDiabetes_create', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(12, 'PatientDataOfDiabetes_edit', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(13, 'PatientDataOfDiabetes_delete', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(14, 'chat_get_chats', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(15, 'chat_create_chat', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(16, 'chat_get_chat_by_id', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(17, 'chat_send_text_message', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(18, 'chat_search_user', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(19, 'chat_message_status', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(20, 'chat_user/join_chat', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(21, 'chat_user/leave_chat', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(22, 'doctors_view', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(23, 'doctors_show', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(24, 'appointments_create', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(25, 'appointments_view', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(26, 'appointments_edit', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(27, 'appointments_delete', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(28, 'payment_create', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(29, 'ask_chatbot', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(30, 'glucose-readings', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(31, 'age_readings', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(32, 'hypertension_readings', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(33, 'heart-disease-readings', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(34, 'smoking-history-readings', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(35, 'bmi_readings', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(36, 'HbA1c_level_readings', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(37, 'submit_contact_form', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(38, 'food_create', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(39, 'food_view', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(40, 'food_edit', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(41, 'food_delete', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(42, 'recommend', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(43, 'foodByUserId_view', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(44, 'activity_create', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(45, 'activity_view', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(46, 'activity_edit', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(47, 'activity_delete', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(48, 'activityByUserId_view', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(49, 'role-permissions-create', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(50, 'role-permissions-view', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(51, 'role-permissions-edit', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(52, 'role-permissions-delete', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(53, 'users_create', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(54, 'users_view', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(55, 'users_edit', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(56, 'users_delete', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(57, 'settings_create', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(58, 'settings_view', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(59, 'settings_edit', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(60, 'settings_delete', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(61, 'categories_create', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(62, 'categories_edit', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(63, 'categories_delete', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(64, 'posts_create', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(65, 'posts_edit', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(66, 'posts_delete', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(67, 'comments_approve', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(68, 'comments_reject', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(69, 'appointments_approve', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(70, 'appointments_cancel', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(71, 'today_appointments_reports', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(72, 'money_transfers_reports', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(73, 'total_patients_reports', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(74, 'answer_question_from_contact_form', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(75, 'foods_create', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(76, 'foods_view', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(77, 'foods_edit', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(78, 'foods_delete', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'iphone', 'c06ee59cfd8892692a53819eb7f194f1fab2a41abad5d68cead52422c4e3f0d2', '[\"*\"]', '2024-06-24 14:01:57', NULL, '2024-06-24 14:00:46', '2024-06-24 14:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_published` enum('published','draft') NOT NULL DEFAULT 'published',
  `published_at` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `comments` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `likes` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(255) NOT NULL,
  `provider_id` varchar(255) NOT NULL,
  `provider_token` varchar(1000) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2024-06-24 14:00:14', '2024-06-24 14:00:14'),
(2, 'admin', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(3, 'employee', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15'),
(4, 'doctor', 'web', '2024-06-24 14:00:15', '2024-06-24 14:00:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(14, 4),
(15, 1),
(15, 2),
(15, 4),
(16, 1),
(16, 2),
(16, 4),
(17, 1),
(17, 2),
(17, 4),
(18, 1),
(18, 2),
(18, 4),
(19, 1),
(19, 2),
(19, 4),
(20, 1),
(20, 2),
(20, 4),
(21, 1),
(21, 2),
(21, 4),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(26, 2),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(30, 4),
(31, 1),
(31, 2),
(31, 4),
(32, 1),
(32, 2),
(32, 4),
(33, 1),
(33, 2),
(33, 4),
(34, 1),
(34, 2),
(34, 4),
(35, 1),
(35, 2),
(35, 4),
(36, 1),
(36, 2),
(36, 4),
(37, 1),
(37, 2),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(69, 4),
(70, 2),
(70, 4),
(71, 2),
(71, 4),
(72, 2),
(72, 4),
(73, 2),
(73, 4),
(74, 2),
(74, 3),
(75, 2),
(76, 2),
(77, 2),
(78, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `device_name` varchar(50) DEFAULT NULL,
  `role` enum('admin','employee','doctor','user') NOT NULL DEFAULT 'user',
  `code` int(11) DEFAULT NULL,
  `code_expired_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `specialization` varchar(255) DEFAULT NULL,
  `experience_years` int(11) DEFAULT NULL,
  `qualifications` text DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `currency` varchar(255) DEFAULT 'USD',
  `availabilities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`availabilities`)),
  `gender` enum('female','male') DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `phone` varchar(255) DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `device_name`, `role`, `code`, `code_expired_at`, `email_verified_at`, `is_online`, `first_name`, `last_name`, `username`, `image`, `specialization`, `experience_years`, `qualifications`, `amount`, `currency`, `availabilities`, `gender`, `status`, `phone`, `phone_verified_at`, `birth_date`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$GcYF/WEY.EBi5Aakz4MB4O/UQ.fV01X5FXwuc1JINeQl.gtSuz/gG', 'iphone', 'admin', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(2, 'Employee', 'employee@gmail.com', '$2y$10$dgsT/bNKpcmb20g0zj/wcOr.7jXFizMyO58YwdfZGPK4p.0ePaIzi', 'iphone', 'employee', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(3, 'Doctor', 'doctor@gmail.com', '$2y$10$UaF04pMDHXCTQKXahtdIaODYbSshbTNmi9/kR7p0XNrsJeRbQM8mm', 'iphone', 'doctor', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Cardiology', 5, '\"MD, MBBS\"', 100.00, 'USD', '\"[\\\"2024-04-30 16:23\\\",\\\"2024-05-01 16:25\\\"]\"', NULL, 'active', NULL, NULL, NULL, NULL, NULL, '2024-06-24 14:00:16', '2024-06-24 14:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity_likes`
--

CREATE TABLE `user_activity_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `like_status` varchar(255) DEFAULT NULL,
  `favorite_activity` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_activity_likes`
--

INSERT INTO `user_activity_likes` (`id`, `user_id`, `activity_id`, `like_status`, `favorite_activity`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '1', 'Light stretching', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(2, 2, 10, '0', 'Gentle stretching before bed', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(3, 3, 15, '1', '15-minute relaxation exercises', '2024-06-24 14:00:17', '2024-06-24 14:00:17'),
(4, 1, 8, '0', '5-minute breathing exercises', '2024-06-24 14:00:17', '2024-06-24 14:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `user_food_likes`
--

CREATE TABLE `user_food_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `like_status` varchar(255) DEFAULT NULL,
  `favorite_food` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_food_likes`
--

INSERT INTO `user_food_likes` (`id`, `user_id`, `food_id`, `like_status`, `favorite_food`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '1', 'Oatmeal with berries', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(2, 2, 10, '0', 'Omelet with vegetables', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(3, 3, 15, '1', 'Whole wheat pita with hummus', '2024-06-24 14:00:16', '2024-06-24 14:00:16'),
(4, 1, 8, '0', 'Whole grain pancakes with berries', '2024-06-24 14:00:16', '2024-06-24 14:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `name`, `image`, `email`, `description`, `facebook_link`, `twitter_link`, `instagram_link`, `created_at`, `updated_at`) VALUES
(1, 'GluCare', 'https://glucare.com/images/logo.png', 'glucare@gmail.com', 'A website for diabetics offering information,resources, and support tailored to individuals living with diabetes', 'https://www.facebook.com/GluCare', 'https://twitter.com/GluCare', 'https://www.instagram.com/GluCare', '2024-06-24 14:00:16', '2024-06-24 14:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_messages_chat_id_foreign` (`chat_id`),
  ADD KEY `chat_messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `chat_user`
--
ALTER TABLE `chat_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_user_chat_id_foreign` (`chat_id`),
  ADD KEY `chat_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_likeable_type_likeable_id_index` (`likeable_type`,`likeable_id`),
  ADD KEY `likes_user_id_foreign` (`user_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patient_data_of_diabetes`
--
ALTER TABLE `patient_data_of_diabetes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_data_of_diabetes_user_id_foreign` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `providers_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_activity_likes`
--
ALTER TABLE `user_activity_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_activity_likes_user_id_foreign` (`user_id`),
  ADD KEY `user_activity_likes_activity_id_foreign` (`activity_id`);

--
-- Indexes for table `user_food_likes`
--
ALTER TABLE `user_food_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_food_likes_user_id_foreign` (`user_id`),
  ADD KEY `user_food_likes_food_id_foreign` (`food_id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `website_settings_email_unique` (`email`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_user`
--
ALTER TABLE `chat_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `patient_data_of_diabetes`
--
ALTER TABLE `patient_data_of_diabetes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_activity_likes`
--
ALTER TABLE `user_activity_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_food_likes`
--
ALTER TABLE `user_food_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD CONSTRAINT `chat_messages_chat_id_foreign` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `chat_user`
--
ALTER TABLE `chat_user`
  ADD CONSTRAINT `chat_user_chat_id_foreign` FOREIGN KEY (`chat_id`) REFERENCES `chats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chat_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_data_of_diabetes`
--
ALTER TABLE `patient_data_of_diabetes`
  ADD CONSTRAINT `patient_data_of_diabetes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `providers`
--
ALTER TABLE `providers`
  ADD CONSTRAINT `providers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_activity_likes`
--
ALTER TABLE `user_activity_likes`
  ADD CONSTRAINT `user_activity_likes_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_activity_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_food_likes`
--
ALTER TABLE `user_food_likes`
  ADD CONSTRAINT `user_food_likes_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_food_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
