-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2015 at 06:35 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ysestracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE IF NOT EXISTS `committees` (
`comm_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `contactno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`events_id` int(10) unsigned NOT NULL,
  `theme` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `sem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oah_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_shouts`
--

CREATE TABLE IF NOT EXISTS `event_shouts` (
  `shout` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `events_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heads`
--

CREATE TABLE IF NOT EXISTS `heads` (
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `comm_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) unsigned NOT NULL,
  `comm_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2015_12_19_155337_create_session_table', 1),
('2015_12_25_080835_create_users_table', 1),
('2015_12_25_080840_create_events_table', 1),
('2015_12_25_081351_create_committees_table', 1),
('2015_12_25_081514_create_tasks_table', 1),
('2015_12_25_081655_create_heads_table', 1),
('2015_12_25_081835_create_members_table', 1),
('2015_12_25_081958_create_contacts_table', 1),
('2015_12_25_082142_create_event_shouts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
`task_id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `progress` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `assigned_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  `createdby_id` int(10) unsigned NOT NULL,
  `comm_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `studno` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `username`, `email`, `password`, `studno`, `department`, `batch`, `created_at`, `updated_at`) VALUES
(1, 'Jason', 'Hey', 'Derulo', 'jason@gmail.com', 'gelloguiam@yahoo', '$2y$10$Tj7kY5myr9GM4tQCaG2zpue', '2013-00000', 'PAD', 'blendeD', '2015-12-26 09:21:52', '2015-12-26 09:21:52'),
(2, 'Angelo', 'Capa', 'Guiam', 'gelloguiam', 'acguiam@gmail.com', '$2y$10$5lwX5lhIkqAeTL/m7Yex7.c', '2013-04596', 'HELLO', '4tified', '2015-12-26 09:33:06', '2015-12-26 09:33:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
 ADD PRIMARY KEY (`comm_id`), ADD KEY `committees_events_id_foreign` (`events_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
 ADD PRIMARY KEY (`id`,`contactno`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`events_id`), ADD KEY `events_oah_id_foreign` (`oah_id`);

--
-- Indexes for table `event_shouts`
--
ALTER TABLE `event_shouts`
 ADD PRIMARY KEY (`events_id`,`shout`);

--
-- Indexes for table `heads`
--
ALTER TABLE `heads`
 ADD PRIMARY KEY (`id`,`comm_id`), ADD KEY `heads_comm_id_foreign` (`comm_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`id`,`comm_id`), ADD KEY `members_comm_id_foreign` (`comm_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
 ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`task_id`), ADD KEY `tasks_createdby_id_foreign` (`createdby_id`), ADD KEY `tasks_comm_id_foreign` (`comm_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_username_unique` (`username`), ADD UNIQUE KEY `users_email_unique` (`email`), ADD UNIQUE KEY `users_studno_unique` (`studno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
MODIFY `comm_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `events_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
MODIFY `task_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `committees`
--
ALTER TABLE `committees`
ADD CONSTRAINT `committees_events_id_foreign` FOREIGN KEY (`events_id`) REFERENCES `events` (`events_id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
ADD CONSTRAINT `contacts_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
ADD CONSTRAINT `events_oah_id_foreign` FOREIGN KEY (`oah_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `event_shouts`
--
ALTER TABLE `event_shouts`
ADD CONSTRAINT `event_shouts_events_id_foreign` FOREIGN KEY (`events_id`) REFERENCES `events` (`events_id`);

--
-- Constraints for table `heads`
--
ALTER TABLE `heads`
ADD CONSTRAINT `heads_comm_id_foreign` FOREIGN KEY (`comm_id`) REFERENCES `committees` (`comm_id`),
ADD CONSTRAINT `heads_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
ADD CONSTRAINT `members_comm_id_foreign` FOREIGN KEY (`comm_id`) REFERENCES `committees` (`comm_id`),
ADD CONSTRAINT `members_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
ADD CONSTRAINT `tasks_comm_id_foreign` FOREIGN KEY (`comm_id`) REFERENCES `committees` (`comm_id`),
ADD CONSTRAINT `tasks_createdby_id_foreign` FOREIGN KEY (`createdby_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
