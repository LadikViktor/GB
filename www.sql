-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 06 2020 г., 19:07
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `www`
--

DROP TABLE IF EXISTS `www`;
CREATE TABLE `www` (
  `id` int(11) NOT NULL,
  `text` text COLLATE ujis_bin NOT NULL,
  `name` varchar(60) COLLATE ujis_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ujis COLLATE=ujis_bin;

--
-- Дамп данных таблицы `www`
--

INSERT INTO `www` (`id`, `text`, `name`) VALUES
(1, 'Add', 'Andy'),
(2, 'cxcx', 'cxc'),
(3, 'cxcx', 'cxc'),
(4, 'ffdf', 'dfdf'),
(5, ':)', 'fghfg'),
(6, ':(', 'hhg'),
(7, ':)\r\n', 'g'),
(8, 'dfd', 'fdf');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `www`
--
ALTER TABLE `www`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `www`
--
ALTER TABLE `www`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
