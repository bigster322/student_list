-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 22 2019 г., 09:52
-- Версия сервера: 10.1.31-MariaDB
-- Версия PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `2ch_tasks`
--

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `id` int(16) NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `score` int(3) NOT NULL,
  `birthday` date NOT NULL,
  `regional` tinyint(1) NOT NULL,
  `gender` int(11) NOT NULL,
  `group_id` int(8) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id`, `name`, `surname`, `email`, `score`, `birthday`, `regional`, `gender`, `group_id`, `password`) VALUES
(1, 'Arsenii', 'Killer', 'serega228@mail.naeb', 121, '2016-01-14', 1, 1, 322, ''),
(3, 'Sergay', 'Mavrodi', 'serega228@mail.naeb1', 228, '2016-01-14', 1, 1, 1488, ''),
(4, 'Andrey', 'Pizdun', 'serega228@mail.naeb2', 148, '2016-01-14', 1, 1, 32, ''),
(5, 'Sergey', 'Lezhnev', 'serega228@mail.naeb3', 222, '2016-01-14', 1, 1, 15, ''),
(6, 'Viktor', 'Rassohin', 'serega228@mail.naeb4', 95, '2016-01-14', 1, 1, 987, ''),
(7, 'Nikolya', 'Belyaev', 'serega228@mail.naeb5', 143, '2016-01-14', 1, 1, 911, ''),
(8, 'Masha', 'Korol', 'serega228@mail.naeb6', 197, '2016-01-14', 1, 1, 73, ''),
(13, 'vik', 'ras', '31@31.com', 228, '1997-12-21', 1, 1, 321, ''),
(18, 'Iliya', 'Khalilov', 'kl1nt3213@mail.ru', 228, '1997-12-21', 1, 1, 321, ''),
(24, 'Andrey', 'Debrov', 'millioner@dinahpidor.org', 12, '1955-03-16', 0, 1, 176, '123'),
(27, 'Chis12', 'Tor', 'chistor@poe.tv', 278, '1987-02-01', 0, 1, 91, '321'),
(28, 'Sadam22', 'Hussein', 'isis@boom.terror', 1, '2001-12-22', 1, 1, 321, 'iloveislam'),
(29, 'рандом', 'random', 'random@ran.dom', 167, '1997-06-22', 0, 1, 322, 'random'),
(30, 'Андрей', 'Горбунов', 'angor@mail.ru', 300, '1996-02-19', 1, 0, 32, 'qweqwe');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
