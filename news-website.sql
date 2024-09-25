-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2024 at 02:57 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `active`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$ppgxIq.Et2eSUV/now9KquARuz/xK5fWRKCmdx1ZbqnumTcHsJpoO', 0, 'kaIEq4qS4Aq3Lik8E2WiprlQAPVO5X03d8Rd9TM5ywWad39Z3olMLUneMVby', '2024-06-27 09:07:00', '2024-06-27 09:07:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sport', '2024-06-27 18:03:58', '2024-06-27 18:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `news_id`, `content`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 'Not good!', '2024-08-08 17:38:49', '2024-08-08 17:38:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2024_05_15_011521_create_admins_table', 1),
(5, '2024_05_15_011735_create_categories_table', 1),
(6, '2024_05_15_011818_create_news_table', 1),
(7, '2024_06_05_003109_add_content_column_to_news_table', 1),
(8, '2024_06_12_003942_add_active_column_to_admins_table', 1),
(9, '2024_06_12_020615_add_active_column_to_users_table', 1),
(10, '2024_06_21_004021_create_comments_table', 1),
(11, '2024_06_21_004044_create_replies_table', 1),
(12, '2024_06_21_004105_create_setting_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `admin_id`, `category_id`, `created_at`, `updated_at`, `content`) VALUES
(1, 'Female archer books 15th ticket for Vietnam to Paris 2024 Olympics', '/storage/images/news/448761923488879867132003609182-2625-9736-1719457751.jpg', 1, 1, '2024-06-27 18:06:08', '2024-06-27 18:06:08', '<p><span style=\"color:rgb(34, 34, 34); font-family:georgia,times new roman,times,serif; font-size:18px\">The Vietnamese sports delegation has secured its 15th spot at the Paris 2024 Olympics, scheduled from July 26 to Aug. 11, as female archer Do Thi Anh Nguyet booked her ticket to the summer games.</span></p>\r\n\r\n<div class=\"fck_detail\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; position: relative; min-height: 200px; color: rgb(0, 0, 0); font-family: Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; float: left; width: 679.792px;\">\r\n<p>The World Archery Association - the international federation for the Olympic sport of archery - confirmed Nguyet as one of the last five archers to go to the 2024 Olympics based on the world rankings in the individual content.</p>\r\n</div>'),
(2, 'Biggest stars yet to catch fire at Euro 2024', '/storage/images/news/ronaldo17194461173271171944631-6338-7688-1719480246.jpg', 1, 1, '2024-06-27 18:06:54', '2024-06-27 18:06:54', '<p><span style=\"color:rgb(34, 34, 34); font-family:georgia,times new roman,times,serif; font-size:18px\">With exciting football and vibrant fans lighting up cities across Germany, Euro 2024 has thrilled even though the European game\'s biggest stars have failed to take the tournament by storm.</span></p>\r\n\r\n<div class=\"fck_detail\" style=\"margin: 0px; padding: 0px; box-sizing: border-box; position: relative; min-height: 200px; color: rgb(0, 0, 0); font-family: Georgia, &quot;Times New Roman&quot;, Times, serif; font-size: 18px; float: left; width: 679.792px;\">\r\n<p>Between injury struggles, shaky form and bad luck, many of football\'s leading lights have underwhelmed in the group phase.</p>\r\n</div>'),
(3, 'Jamie Smith eases England into lead against Sri Lanka on rain-hit day', '/storage/images/news/2700.avif', 1, 1, '2024-08-22 18:09:21', '2024-08-22 18:09:21', '<p><span style=\"color:rgb(18, 18, 18); font-family:guardiantextegyptian,guardian text egyptian web,georgia,serif; font-size:17px\">It was thought that Sri Lanka might well be the reverse of West Indies: tourists who boast experience with the bat while potentially being light with the ball. But on a tense second day that prediction was creaking slightly, Dhananjaya de Silva’s attack having delivered a disciplined, probing display to leave this first Test delicately poised.</span></p>'),
(4, 'Premier League: 10 things to look out for this weekend', '/storage/images/news/5000.avif', 1, 1, '2024-08-22 18:13:48', '2024-08-22 18:13:48', '<p><span style=\"color:rgb(18, 18, 18); font-family:guardiantextegyptian,guardian text egyptian web,georgia,serif; font-size:17px\">It was intriguing to hear Fabian Hürzeler’s thoughts on the composition of his squad with so much transfer activity at Brighton in the last few days. Hot on the heels&nbsp;</span><a href=\"https://www.theguardian.com/football/article/2024/aug/19/brighton-georginio-rutter-leeds-record-fee-transfer-window\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border-top: 0px; border-right: 0px; border-bottom: 1px solid var(--article-link-border); border-left: 0px; border-image: initial; font-variant-ligatures: common-ligatures; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 17px; line-height: inherit; font-family: GuardianTextEgyptian, &quot;Guardian Text Egyptian Web&quot;, Georgia, serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; text-decoration-line: none; color: var(--article-link-text);\">of Georgino Rutter</a><span style=\"color:rgb(18, 18, 18); font-family:guardiantextegyptian,guardian text egyptian web,georgia,serif; font-size:17px\">&nbsp;and&nbsp;</span><a href=\"https://www.theguardian.com/football/article/2024/aug/15/bournemouth-splash-record-40m-on-evanilson-as-brighton-bid-40m-for-rutter\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; border-top: 0px; border-right: 0px; border-bottom: 1px solid var(--article-link-border); border-left: 0px; border-image: initial; font-variant-ligatures: common-ligatures; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-variant-position: inherit; font-stretch: inherit; font-size: 17px; line-height: inherit; font-family: GuardianTextEgyptian, &quot;Guardian Text Egyptian Web&quot;, Georgia, serif; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; text-decoration-line: none; color: var(--article-link-text);\">Brajan Gruda</a><span style=\"color:rgb(18, 18, 18); font-family:guardiantextegyptian,guardian text egyptian web,georgia,serif; font-size:17px\">, who could both make their debuts against Manchester United on Saturday, Ferdi Kadioglu and Matt O’Riley are the next two potential arrivals at the Amex Stadium if reports are to be believed. But there is a question mark over whether Billy Gilmour will still be part of the squad amid interest from Antonio Conte’s Napoli, despite Hürzeler’s assurances to the contrary. “There are things I can’t influence,” he said. “If a player doesn’t have the feeling that they can do it here, of course, he has to look for another way. The only thing I can say is the players know how we plan with them, and then it’s up to them.”&nbsp;</span><strong>Ed Aarons</strong></p>'),
(5, 'City Of Troy has run last race in Europe this year with Breeders’ Cup next target', '/storage/images/news/3812.avif', 1, 1, '2024-08-22 18:23:02', '2024-08-22 18:23:02', '<p><span style=\"color:rgb(18, 18, 18); font-family:guardiantextegyptian,guardian text egyptian web,georgia,serif; font-size:17px\">Aidan O’Brien’s sublime summer on the British turf continued here on Thursday as Content and Ryan Moore justified 3-1 favouritism in the Group One Yorkshire Oaks. While City Of Troy, his stable star, seems to have run his last race in Europe this year, he has plenty of stable companions that will continue the onslaught.</span></p>');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `logo`, `created_at`, `updated_at`) VALUES
(6, 'storage/setting/logo.png', '2024-06-27 17:57:21', '2024-06-27 17:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `active`) VALUES
(2, 'Luan', 'nguyenhuuluan17@gmail.com', NULL, '$2y$10$r2ycguHSdVnomgUrSVP8PeiADsIZ4GNSV7bXJ6IO52Zb233M0h8/G', 'Y9udWqJkrvyT7ut1fLrcU15AU4KygnJN6WKgtjpVTBNA4DUJHwlQmSvHC8A5', '2024-07-07 18:01:11', '2024-07-07 18:01:11', 1),
(3, 'Test', 'test@gmail.com', NULL, '$2y$10$xiZsJ33YUbnVFfav7EsiMOw9NIwo1T.GZUVkvLQicW7DF7FLSNQtu', 'Ndn1p9mkZ4tx2xltPK1uo8dcTC0cOKXS0Kr84Fm21QVoVmWSotw42P7e10Zn', '2024-08-08 17:53:41', '2024-08-08 17:53:41', 1);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_index` (`user_id`),
  ADD KEY `comments_news_id_index` (`news_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_admin_id_index` (`admin_id`),
  ADD KEY `news_category_id_index` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_comment_id_index` (`comment_id`),
  ADD KEY `replies_user_id_index` (`user_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
