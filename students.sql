-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Фев 22 2015 г., 16:34
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
  `sex` enum('male','female') NOT NULL,
  `groupnum` int(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `points` int(3) NOT NULL,
  `year` year(4) NOT NULL,
  `place` enum('local','nonlocal') NOT NULL,
  `code` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `name`, `surname`, `sex`, `groupnum`, `email`, `points`, `year`, `place`, `code`) VALUES
(1, 'Petr', 'Semenov', 'male', 1111, 'petrmail@mail.bb', 235, 1995, 'nonlocal', 'eyus9r3amjx2tczw8q05t6g628ymimpr'),
(2, 'Galina', 'Favova', 'female', 4567, 'fg@mailb.com', 300, 1996, 'local', 'ls2bmiqn2xaoktfsggdqzpu9ecnrkus1'),
(3, 'Ivan', 'Vodaka', 'male', 6767, 'vodvan@non.ml', 350, 1994, 'nonlocal', 'jzv5h7ffl6u8s4mlaiin7nqxzckhpcm9'),
(4, 'Zoy', 'Ivanova', 'female', 8899, 'ivaz@br.ml', 200, 1997, 'nonlocal', '7xizdt2eejbbbe6n20vjnyjd0h0nqa93'),
(5, 'Nikolay', 'Vodka', 'male', 6767, 'rt@vd.bb', 390, 1995, 'local', 'k9pv6ec7wofg76976fa4qeugekkzb5q5'),
(6, 'Ivan', 'Ivanov', 'male', 6767, 'ivanov@ivanov.com', 400, 1995, 'local', 'r28diu5oekpy5036ssjfp27h5my37c4v');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
