-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 19 2015 г., 13:21
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `students`
--

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `sex` int(1) NOT NULL,
  `groupnum` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `points` int(3) NOT NULL,
  `year` int(4) NOT NULL,
  `place` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `name`, `surname`, `sex`, `groupnum`, `email`, `points`, `year`, `place`) VALUES
(1, 'Ivan', 'Ivanov', 0, 9999, 'ivan@ivan.ivan', 400, 1999, 0),
(2, 'Sema', 'Ivanov', 1, 4444, '26666', 300, 1998, 1),
(3, 'Arr', 'Arr', 1, 1111, '1@1.mm', 222, 1995, 1),
(4, 'dDD', 'FFF', 0, 1111, 'R@R.co', 222, 1995, 0),
(5, 'GGG', 'Vp', 1, 1234, 'dd@dd.mm', 222, 1998, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
