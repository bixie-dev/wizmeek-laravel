-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 01 2022 г., 23:12
-- Версия сервера: 10.1.48-MariaDB
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `wzmknew`
--

-- --------------------------------------------------------

--
-- Структура таблицы `channels`
--

CREATE TABLE `channels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `description_short` text COLLATE utf8_unicode_ci,
  `description_full` text COLLATE utf8_unicode_ci,
  `logo` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stream` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `poster` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `channels`
--

INSERT INTO `channels` (`id`, `name`, `description_short`, `description_full`, `logo`, `stream`, `poster`, `created_at`, `updated_at`) VALUES
(4, 'H.A.M.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, voluptatem!', 'Here goes full description... Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum fuga ea sapiente quae illo, obcaecati quaerat repellendus, error natus corporis quod blanditiis ullam sit perferendis hic, nesciunt et vitae minima. Voluptate numquam tenetur quisquam temporibus ducimus illum, rem, est cupiditate fuga expedita a, maiores velit inventore. Voluptatum possimus nihil odio incidunt? Temporibus earum unde quas illo tempore assumenda fuga nobis.', 'channels/logos/mlCpkI9sNZH3ee1RFkn1gMiZ4VgnrzM5WrDrWgRe.png', 'https://stream-link.com', 'channels/posters/OrQRo3d5rsgdFOdkdFHSe0dsY3G6PUDFljxJM2dH.png', '2022-11-01 14:55:00', '2022-11-01 14:55:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `channels`
--
ALTER TABLE `channels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
