-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 13 2022 г., 14:52
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `token` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Scorpions', '+74837493848', 'wtEhHBvf4Hcxw', '2022-04-12 20:43:37', '2022-04-12 23:23:43'),
(3, 'Hacker', '+78473650684', 'wts3wiN9wS6iw', '2022-04-12 20:58:06', NULL),
(4, 'Tito&Tarantula', '+94837493842', 'wt/8EtA6SaF7c', '2022-04-12 22:51:13', NULL),
(5, 'After Dark', '+94837493848', 'wtQk1.K4CEW66', '2022-04-12 22:58:44', NULL),
(6, 'Boo-noo-noo-noos', '+74837493848', 'wthCxytiDi0/w', '2022-04-13 13:54:59', '2022-04-13 14:33:51'),
(10, 'Testing post', '+74837493848', 'wtCw61dxBpV.6', '2022-04-13 16:20:55', NULL),
(11, 'Testing post', '+74837493848', 'wtCw61dxBpV.6', '2022-04-13 16:21:10', NULL),
(12, 'Testing post', '+74837493840', 'wtjKUNV19OFTQ', '2022-04-13 16:22:21', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
