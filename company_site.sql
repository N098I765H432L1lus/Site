-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 01 2024 г., 15:20
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `company_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Acceptance`
--

CREATE TABLE `Acceptance` (
  `id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci COMMENT='Место приёма заказов и выдочи';

--
-- Дамп данных таблицы `Acceptance`
--

INSERT INTO `Acceptance` (`id`, `image`, `name`, `address`) VALUES
(1, 'Место выдочи 10430145639_.png', 'Место выдочи 1 edit', 'улица такая то дом такой то');

-- --------------------------------------------------------

--
-- Структура таблицы `Accessories`
--

CREATE TABLE `Accessories` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `id_w_shop` int NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Jobs`
--

CREATE TABLE `Jobs` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `id_w_shop` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Дамп данных таблицы `Jobs`
--

INSERT INTO `Jobs` (`id`, `name`, `id_w_shop`) VALUES
(1, '3', 1),
(2, '2', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `role` int NOT NULL,
  `jobs_id` int NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `surname`, `role`, `jobs_id`, `password`) VALUES
(1, 'Admin@ya.ru', 'Никита', 'Бузилов', 1, 2, '321'),
(5, 'Acce@ya.ru', 'ace', 'ace', 9, 1, '321');

-- --------------------------------------------------------

--
-- Структура таблицы `Workshops`
--

CREATE TABLE `Workshops` (
  `id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Дамп данных таблицы `Workshops`
--

INSERT INTO `Workshops` (`id`, `image`, `name`, `address`) VALUES
(1, 'Мастерская 10430130414_.png', 'Мастерская 1', 'улица такая то дом такой то');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Acceptance`
--
ALTER TABLE `Acceptance`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Accessories`
--
ALTER TABLE `Accessories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_w_shop` (`id_w_shop`);

--
-- Индексы таблицы `Jobs`
--
ALTER TABLE `Jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_w_shop` (`id_w_shop`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Workshops`
--
ALTER TABLE `Workshops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Acceptance`
--
ALTER TABLE `Acceptance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `Accessories`
--
ALTER TABLE `Accessories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Jobs`
--
ALTER TABLE `Jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `Workshops`
--
ALTER TABLE `Workshops`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Accessories`
--
ALTER TABLE `Accessories`
  ADD CONSTRAINT `accessories_ibfk_1` FOREIGN KEY (`id_w_shop`) REFERENCES `Workshops` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
