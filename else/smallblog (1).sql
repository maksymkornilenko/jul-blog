-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 15 2019 г., 09:19
-- Версия сервера: 5.6.41
-- Версия PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `smallblog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `dateOfCreate` timestamp NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `text`, `dateOfCreate`, `news_id`) VALUES
(90, 'ghtrhtyty', 'tryrthtyhtyhtyh', '2019-07-15 06:07:29', 43),
(92, 'qwe', 'qwe', '2019-07-15 06:07:23', 43),
(96, 'zxc', 'zxc', '2019-07-15 06:07:03', 43),
(97, 'qwe', 'qwerty', '2019-07-15 06:07:43', 43),
(98, 'qwe', 'sad', '2019-07-15 06:07:54', 43),
(99, 'ghtrhtyty', 'qwe', '2019-07-15 06:07:19', 43),
(100, '123', '123', '2019-07-15 06:07:12', 43),
(101, '123', '123', '2019-07-15 06:07:07', 43),
(102, '123', '123', '2019-07-15 06:07:10', 43),
(103, '123', '123', '2019-07-15 06:07:05', 43),
(104, 'ghtrhtyty', 'qwer', '2019-07-15 06:07:50', 43),
(105, 'qwe', 'tryrthtyhtyhtyh', '2019-07-15 06:07:15', 43),
(106, '4354353', '32432535456465756876', '2019-07-15 07:07:38', 43),
(107, 'qwe', 'treytutyetytyyr', '2019-07-15 07:07:53', 43);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `text` text,
  `dateOfCreate` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `text`, `dateOfCreate`) VALUES
(43, '12432532543543634', '3123234324', '2019-07-14 19:07:23'),
(44, 'gfdgfdhgfhfghgfh', 'teryrthytjty', '2019-07-14 20:07:28');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
