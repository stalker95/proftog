-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Час створення: Чрв 14 2019 р., 16:34
-- Версія сервера: 10.1.24-MariaDB-cll-lve
-- Версія PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `softspri_omry_tv`
--

-- --------------------------------------------------------

--
-- Структура таблиці `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `marque`
--

CREATE TABLE `marque` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo_display` tinyint(1) DEFAULT NULL,
  `marque_display` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `marques`
--

CREATE TABLE `marques` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `type` text,
  `active` tinyint(1) DEFAULT NULL,
  `video` varchar(255) NOT NULL DEFAULT '0',
  `id_category` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `media`
--

INSERT INTO `media` (`id`, `name`, `file`, `created`, `modified`, `type`, `active`, `video`, `id_category`, `description`, `user_id`) VALUES
(1, '1557138560.png', 'uploads/files/1557138560.png', '2019-05-06 10:29:21', '2019-05-06 10:29:21', 'video', 1, 'uploads/files/1557138560SampleVideos2.mp4', NULL, NULL, NULL),
(2, 'Sample720.mp4', 'uploads/files/1557139187.png', '2019-05-06 10:39:47', '2019-05-06 10:39:47', 'video', 1, 'uploads/files/1557139187Sample720.mp4', NULL, NULL, NULL),
(3, 'file_example_MP4_640_3MG.mp4', 'uploads/files/1557139203.png', '2019-05-06 10:40:03', '2019-05-06 10:40:03', 'video', 1, 'uploads/files/1557139203file_example_MP4_640_3MG.mp4', NULL, NULL, NULL),
(4, 'Sample Videos 4.mp4', 'uploads/files/1557139249.png', '2019-05-06 10:40:49', '2019-05-06 10:40:49', 'video', 1, 'uploads/files/1557139249SampleVideos4.mp4', NULL, NULL, NULL),
(5, 'Sample Videos 5.mp4', 'uploads/files/1557139277.png', '2019-05-06 10:41:18', '2019-05-06 10:41:18', 'video', 1, 'uploads/files/1557139277SampleVideos5.mp4', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `notifications`
--

INSERT INTO `notifications` (`id`, `text`, `status`) VALUES
(1, 'User testfirstname testlastname Just add new Media in Playlist ', 0),
(2, 'User testfirstname testlastname Just add new Media in Playlist ', 0),
(3, 'User testfirstname testlastname Just add new Media in Playlist ', 0),
(4, 'User testfirstname testlastname Just add new Media in Playlist ', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20190404150518, 'CreateUsers', '2019-04-04 13:09:21', '2019-04-04 13:09:22', 0),
(20190409064804, 'AddPassword', '2019-04-09 08:07:52', '2019-04-09 08:07:52', 0),
(20190409134253, 'AddColumnToken', '2019-04-10 09:35:14', '2019-04-10 09:35:14', 0),
(20190409143945, 'AddNewFieldToUsers', '2019-04-10 09:35:14', '2019-04-10 09:35:15', 0),
(20190410134405, 'CreateMediaTable', '2019-04-11 09:42:58', '2019-04-11 09:42:58', 0),
(20190412071409, 'CreateVideoFileColumn', '2019-04-18 05:08:31', '2019-04-18 05:08:31', 0),
(20190416132716, 'TablePlayList', '2019-04-18 05:08:31', '2019-04-18 05:08:31', 0),
(20190416144021, 'CategoryTable', '2019-04-18 05:08:31', '2019-04-18 05:08:31', 0),
(20190417083233, 'PlaylistCategoryTable', '2019-04-18 05:08:31', '2019-04-18 05:08:31', 0),
(20190422065228, 'AddColumnParentIdUsersTable', '2019-04-24 05:32:17', '2019-04-24 05:32:18', 0),
(20190422094220, 'CreateTablePlayListsUsers', '2019-04-24 05:32:18', '2019-04-24 05:32:18', 0),
(20190502085156, 'TablePlaylistsMedia', '2019-05-03 12:26:26', '2019-05-03 12:26:26', 0),
(20190502113010, 'AddColumnNamePlaylistItemInPlaylistsMedia', '2019-05-03 12:26:26', '2019-05-03 12:26:27', 0),
(20190503114018, 'TableTags', '2019-05-06 07:44:42', '2019-05-06 07:44:42', 0),
(20190503125419, 'InsertColumnIdCategoryAndDescription', '2019-05-06 07:44:42', '2019-05-06 07:44:42', 0),
(20190503130739, 'TableTagsMedia', '2019-05-06 07:44:42', '2019-05-06 07:44:42', 0),
(20190517114320, 'CreateThemeTable', '2019-05-27 04:18:04', '2019-05-27 04:18:04', 0),
(20190517120637, 'AddColumnThemeidPlaylists', '2019-05-27 04:18:04', '2019-05-27 04:18:05', 0),
(20190519180947, 'AddNewFieldsInUsersTable', '2019-05-27 04:18:05', '2019-05-27 04:18:05', 0),
(20190521105730, 'AddColumnUserIdMediaTable', '2019-05-27 04:18:05', '2019-05-27 04:18:05', 0),
(20190531070800, 'CreateMarqueTable', '2019-06-14 12:22:40', '2019-06-14 12:22:40', 0),
(20190610121253, 'NotificationTable', '2019-06-14 12:22:40', '2019-06-14 12:22:40', 0),
(20190613085216, 'AddNewColumnInMarqueTable', '2019-06-14 12:22:40', '2019-06-14 12:22:40', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `theme_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `user_id`, `category_id`, `city`, `region`, `time`, `created`, `modified`, `theme_id`) VALUES
(1, 'John Doe', '2', 0, '', '', NULL, '2019-05-06 09:31:30', '2019-05-06 09:31:30', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `playlists_categories`
--

CREATE TABLE `playlists_categories` (
  `id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `playlists_media`
--

CREATE TABLE `playlists_media` (
  `id` int(11) NOT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  `media_id` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `playlists_media`
--

INSERT INTO `playlists_media` (`id`, `playlist_id`, `media_id`, `rank`, `name`) VALUES
(1, 1, 1, 2, NULL),
(2, 1, 2, 1, NULL),
(3, 1, 2, 3, NULL),
(4, 1, 1, 4, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `playlists_users`
--

CREATE TABLE `playlists_users` (
  `id` int(11) NOT NULL,
  `playlist_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `tags_media`
--

CREATE TABLE `tags_media` (
  `id` int(11) NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  `tags_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `write` tinyint(1) NOT NULL DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `delete` tinyint(1) NOT NULL DEFAULT '0',
  `parent_id` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `business` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `mail`, `is_admin`, `active`, `created`, `modified`, `password`, `token`, `read`, `write`, `edit`, `delete`, `parent_id`, `address`, `city`, `zone`, `phone`, `business`) VALUES
(1, 'testfirstname', 'testlastname', 'test@test.com', 2, 1, '2019-04-10 11:40:12', '2019-04-10 11:46:11', '$2y$10$kKnLlfEoOOXhWZ3BZyRqT.lV2FhmylHIJV9qgewvERf8izN3ysVp2', '', 1, 1, 1, 1, 0, '', '', '', '', ''),
(2, 'John', 'Doe', 'ostapchuk@softsprint.net', 1, 0, '2019-05-06 09:31:30', '2019-05-06 09:31:30', '$2y$10$wpMw4wiiySqAsEyMCpxlUeZcu8K9buvZaSnlF2BYkANll38UvL/UC', '', 0, 0, 0, 0, 0, '', '', '', '', '');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Індекси таблиці `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `playlists_categories`
--
ALTER TABLE `playlists_categories`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `playlists_media`
--
ALTER TABLE `playlists_media`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `playlists_users`
--
ALTER TABLE `playlists_users`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tags_media`
--
ALTER TABLE `tags_media`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `EMAIL_INDEX` (`mail`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `marque`
--
ALTER TABLE `marque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `marques`
--
ALTER TABLE `marques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `playlists_categories`
--
ALTER TABLE `playlists_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `playlists_media`
--
ALTER TABLE `playlists_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `playlists_users`
--
ALTER TABLE `playlists_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `tags_media`
--
ALTER TABLE `tags_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
