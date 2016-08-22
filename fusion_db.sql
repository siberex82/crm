-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 18 2016 г., 06:07
-- Версия сервера: 5.5.45
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `fusion_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `fus_admins`
--

CREATE TABLE IF NOT EXISTS `fus_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fus_name` varchar(250) NOT NULL,
  `fus_hash` text NOT NULL,
  `fus_role` int(11) NOT NULL,
  `fus_email` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `fus_admins`
--

INSERT INTO `fus_admins` (`id`, `fus_name`, `fus_hash`, `fus_role`, `fus_email`) VALUES
(1, 'admin', '702618d5a3a2739b84360c3a41c94a71', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `fus_lang`
--

CREATE TABLE IF NOT EXISTS `fus_lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(250) NOT NULL,
  `flag` varchar(15) NOT NULL,
  `default` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `fus_lang`
--

INSERT INTO `fus_lang` (`id`, `lang`, `flag`, `default`) VALUES
(1, 'русский', 'ru', 0),
(2, 'english', 'en', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
