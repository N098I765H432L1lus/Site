-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 06 2024 г., 21:12
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
  `id` varchar(250) COLLATE utf8mb4_german2_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `id_w_shop` int NOT NULL,
  `id_type_aces` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `id_dev` varchar(255) COLLATE utf8mb4_german2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Дамп данных таблицы `Accessories`
--

INSERT INTO `Accessories` (`id`, `images`, `name`, `id_w_shop`, `id_type_aces`, `id_dev`) VALUES
('1', 'intel core0502142959_.png', 'intel core', 1, '1', NULL),
('123_1', 'опер_10505143415_.png', 'опер_1', 1, '6', NULL),
('123_2', 'опер_20505143451_.jpg', 'опер_2', 1, '6', NULL),
('245', 'Iron_disc0505143615_.jpg', 'Iron_disc', 1, '8', NULL),
('423', 'Куллер geb0505142904_.png', 'Куллер geb', 1, '4', NULL),
('4324', 'acse micro0505142819_.png', 'acse micro', 1, '2', NULL),
('63', 'Microsoft V0505142949_.png', 'Microsoft V', 1, '5', NULL),
('734', 'energi0505143526_.png', 'energi', 1, '7', NULL);

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
-- Структура таблицы `technic`
--

CREATE TABLE `technic` (
  `id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL,
  `Type_dev` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `Type_aces`
--

CREATE TABLE `Type_aces` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Дамп данных таблицы `Type_aces`
--

INSERT INTO `Type_aces` (`id`, `name`, `quantity`) VALUES
(1, 'процессоры', '1'),
(2, 'Материнки', '1'),
(3, 'Другие', '0'),
(4, 'Охлаждение', '1'),
(5, 'Видео карта', '1'),
(6, 'планки оперативной памяти', '2'),
(7, 'Блок питания', '1'),
(8, 'Жёсткий диск', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `Type_dev`
--

CREATE TABLE `Type_dev` (
  `id` int NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_german2_ci NOT NULL,
  `quantity_aces` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `quantity` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Дамп данных таблицы `Type_dev`
--

INSERT INTO `Type_dev` (`id`, `name`, `description`, `quantity_aces`, `quantity`) VALUES
(5, 'Компьютерный блок', 'Блок', '8', NULL),
(6, 'Планшет', 'description', '5', NULL);

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
-- Индексы таблицы `technic`
--
ALTER TABLE `technic`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Type_aces`
--
ALTER TABLE `Type_aces`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Type_dev`
--
ALTER TABLE `Type_dev`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT для таблицы `Jobs`
--
ALTER TABLE `Jobs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `technic`
--
ALTER TABLE `technic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `Type_aces`
--
ALTER TABLE `Type_aces`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `Type_dev`
--
ALTER TABLE `Type_dev`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
