-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 04 2024 г., 21:50
-- Версия сервера: 8.0.19
-- Версия PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ramil_city`
--

-- --------------------------------------------------------

--
-- Структура таблицы `task`
--

CREATE TABLE `task` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `task`
--

INSERT INTO `task` (`id`, `user_id`, `title`, `category`, `description`, `created_at`) VALUES
(7, 8, 'tret', 'Улицы', 'ret', '2024-04-04 22:13:31'),
(8, 8, 'fgh', 'Улицы', 'fghf', '2024-04-04 22:13:43'),
(9, 8, 'fghfg', 'Улицы', 'fghf', '2024-04-04 22:13:58'),
(10, 8, 'fghfg', 'Улицы', 'fghf', '2024-04-04 22:14:53'),
(11, 8, 'sdfsd', 'Улицы', 'sdf', '2024-04-04 22:14:59'),
(12, 8, 'fsdf', 'Улицы', 'sdfs', '2024-04-04 22:15:03'),
(13, 8, 'fsdf', 'Улицы', 'sdfs', '2024-04-04 22:17:47'),
(14, 8, 'dsfsdf', 'Улицы', 'sdfsdf', '2024-04-04 22:29:53'),
(15, 8, 'dsfsdf', 'Улицы', 'sdfsdf', '2024-04-04 22:29:56'),
(16, 8, 'dsfsdf', 'Улицы', 'sdfsdf', '2024-04-04 22:30:19'),
(17, 8, 'sdfsdf', 'Улицы', 'sfsf', '2024-04-04 22:30:22'),
(18, 8, 'fsdfsd', 'Улицы', 'fsdf', '2024-04-04 22:30:25'),
(19, 8, 'fsdfsd', 'Улицы', 'fsdf', '2024-04-04 22:30:44'),
(20, 8, 'sdfs', 'Дома', 'sdfsdf', '2024-04-04 22:31:46'),
(21, 11, 'dsfs', 'Улицы', 'sdfsdf', '2024-04-04 22:34:51'),
(22, 11, 'dsfs', 'Улицы', 'sdfsdf', '2024-04-04 22:35:05'),
(23, 11, 'dsfs', 'Улицы', 'sdfsdf', '2024-04-04 22:35:10'),
(24, 11, 'dsfs', 'Улицы', 'sdfsdf', '2024-04-04 22:35:29'),
(25, 11, 'fdgdfgdf', 'Дороги', 'dfgdfg', '2024-04-04 22:37:07'),
(26, 8, 'asda', 'Улицы', 'asda', '2024-04-04 22:43:07'),
(27, 8, 'asda', 'Улицы', 'asda', '2024-04-04 22:43:35');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `patrynomic` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `patrynomic`, `login`, `email`, `password`, `created_at`) VALUES
(8, 'dsfsd', 'fsdf', 'sdfsdf', 'Test', 'mail@mail.ru', '1', '2024-04-04 20:23:26'),
(9, '23', '12312', '312312', 'Testsdfs', 'dsfsdfd@mial.ru', '1', '2024-04-04 20:24:57'),
(10, 'dsfsdf', 'dfsd', 'sdfsdf', 'sdfsdfsd', 'sdffgygf@mail.ru', '1', '2024-04-04 20:28:20'),
(11, 'dfsdf', 'sdfsdf', 'sdfsdf', 'Test2', 'dfgfdghf@mail.ru', '2', '2024-04-04 21:07:25'),
(12, 'dsfsd', 'fsdfds', 'fsdfsdf', 'Test232', 'fghgfhgf@mail.ru', '3', '2024-04-04 21:56:46'),
(13, 'vcbcvb', 'cvbcv', 'bcvbcvb', 'dfdgdg', 'sdfd6yh@mail.ru', '1', '2024-04-04 21:59:07'),
(14, 'dfgf', 'dfg', 'dgdfg', 'Test6', 'sdfdgdf@mail.ru', '1', '2024-04-04 22:01:25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `task`
--
ALTER TABLE `task`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
