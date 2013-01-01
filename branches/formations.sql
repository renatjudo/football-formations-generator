-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 02 2013 г., 03:32
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `generator`
--

-- --------------------------------------------------------

--
-- Структура таблицы `formations`
--

CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `json` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `formations`
--

INSERT INTO `formations` (`id`, `name`, `json`) VALUES
(3, '4-4-2', '{"players":[{"name":"","number":1,"x":"45px","y":"169px"},{"name":"","number":2,"x":"141px","y":"41px"},{"name":"","number":3,"x":"141px","y":"137px"},{"name":"","number":4,"x":"141px","y":"201px"},{"name":"","number":5,"x":"141px","y":"297px"},{"name":"","number":6,"x":"261px","y":"41px"},{"name":"","number":7,"x":"261px","y":"137px"},{"name":"","number":8,"x":"261px","y":"201px"},{"name":"","number":9,"x":"261px","y":"297px"},{"name":"","number":10,"x":"381px","y":"201px"},{"name":"","number":11,"x":"381px","y":"137px"}]}'),
(4, '4-2-3-1', '{"players":[{"name":"","number":1,"x":"45px","y":"169px"},{"name":"","number":2,"x":"117px","y":"41px"},{"name":"","number":3,"x":"117px","y":"137px"},{"name":"","number":4,"x":"117px","y":"201px"},{"name":"","number":5,"x":"117px","y":"297px"},{"name":"","number":6,"x":"213px","y":"201px"},{"name":"","number":7,"x":"213px","y":"105px"},{"name":"","number":8,"x":"333px","y":"265px"},{"name":"","number":9,"x":"309px","y":"169px"},{"name":"","number":10,"x":"333px","y":"73px"},{"name":"","number":11,"x":"405px","y":"169px"}]}'),
(5, '3-5-2', '{"players":[{"name":"","number":1,"x":"21px","y":"169px"},{"name":"","number":2,"x":"165px","y":"41px"},{"name":"","number":3,"x":"117px","y":"105px"},{"name":"","number":4,"x":"117px","y":"169px"},{"name":"","number":5,"x":"117px","y":"233px"},{"name":"","number":6,"x":"165px","y":"297px"},{"name":"","number":7,"x":"285px","y":"73px"},{"name":"","number":8,"x":"213px","y":"169px"},{"name":"","number":9,"x":"285px","y":"265px"},{"name":"","number":10,"x":"381px","y":"201px"},{"name":"","number":11,"x":"381px","y":"137px"}]}'),
(8, '4-4-1-1', '{"players":[{"name":"","number":1,"x":"45px","y":"169px"},{"name":"","number":2,"x":"141px","y":"41px"},{"name":"","number":3,"x":"141px","y":"137px"},{"name":"","number":4,"x":"141px","y":"201px"},{"name":"","number":5,"x":"141px","y":"297px"},{"name":"","number":6,"x":"261px","y":"41px"},{"name":"","number":7,"x":"261px","y":"137px"},{"name":"","number":8,"x":"261px","y":"201px"},{"name":"","number":9,"x":"261px","y":"297px"},{"name":"","number":10,"x":"405px","y":"169px"},{"name":"","number":11,"x":"333px","y":"169px"}]}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
