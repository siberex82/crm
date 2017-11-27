-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 07 2017 г., 17:29
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `crm_systems`
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
-- Структура таблицы `fus_applications`
--

CREATE TABLE IF NOT EXISTS `fus_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `for_user` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `attach` text NOT NULL,
  `from_user` int(11) NOT NULL,
  `controller` int(11) NOT NULL,
  `priority` text NOT NULL,
  `finished` int(11) NOT NULL,
  `resolution` int(11) NOT NULL,
  `user_confirm` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `fus_applications`
--

INSERT INTO `fus_applications` (`id`, `date_create`, `date_start`, `date_finish`, `for_user`, `title`, `text`, `attach`, `from_user`, `controller`, `priority`, `finished`, `resolution`, `user_confirm`) VALUES
(20, '2016-09-26 00:15:50', '2016-09-26', '2016-09-27', 6, 'Полить цветы в офисе', '<p>Много не лить, поставить все на солнце<br></p>', 'crm_systems.sql', 1, 1, 'обычный (выполнить за указанный срок)', 1, 1, 1);

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

-- --------------------------------------------------------

--
-- Структура таблицы `fus_messages`
--

CREATE TABLE IF NOT EXISTS `fus_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `title` varchar(250) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `attach` text NOT NULL,
  `closed` int(11) NOT NULL,
  `popup_show` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=94 ;

--
-- Дамп данных таблицы `fus_messages`
--

INSERT INTO `fus_messages` (`id`, `text`, `title`, `date_create`, `from_user`, `to_user`, `attach`, `closed`, `popup_show`) VALUES
(86, 'Подтвердите начало выполнения задачи !', 'Новая задача ожидает резолюции', '2016-09-26 00:02:25', 0, 1, '', 1, 1),
(87, 'Вам пришло новое задание  Полить цветы в офисе!  перейдите в раздел: Задания - Я исполняю что бы подтвердить', 'У вас одно новое задание', '2016-09-26 00:12:27', 0, 6, '', 1, 1),
(88, 'Вы выбраны в качестве контролера для задания Полить цветы в офисе', 'Вы выбраны контролером задания', '2016-09-26 00:02:20', 0, 1, '', 1, 1),
(89, 'Пользователь Руслан подтвердил начало выполненя задачи Полить цветы в офисе', 'Пользователь принял задачу', '2016-09-26 00:02:16', 0, 1, '', 1, 1),
(90, 'Вам пришло новое задание  Полить цветы в офисе!  перейдите в раздел: Задания - Я исполняю что бы подтвердить', 'У вас одно новое задание', '2016-09-26 00:14:16', 0, 6, '', 1, 1),
(91, 'Вы выбраны в качестве контролера для задания Полить цветы в офисе', 'Вы выбраны контролером задания', '2016-09-26 00:14:41', 0, 1, '', 1, 1),
(92, 'Пользователь Руслан подтвердил начало выполненя задачи Полить цветы в офисе', 'Пользователь принял задачу', '2016-09-26 00:14:29', 0, 1, '', 1, 1),
(93, 'Пользователь Руслан(Программист) выполнил задачу (Полить цветы в офисе)  <a href=''http://crm.loc/applications/ipuzzle/''>посмотреть</a> ', 'Задача была выполнена пользователем.', '2016-09-26 00:16:55', 0, 1, '', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `fus_reminders`
--

CREATE TABLE IF NOT EXISTS `fus_reminders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `for_user` int(11) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_event` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `fus_report`
--

CREATE TABLE IF NOT EXISTS `fus_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_application` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `for_user` int(11) NOT NULL,
  `text` text NOT NULL,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `fus_settings`
--

CREATE TABLE IF NOT EXISTS `fus_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` text NOT NULL,
  `setting_mode` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `fus_users`
--

CREATE TABLE IF NOT EXISTS `fus_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `profession` text NOT NULL,
  `last_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `role` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `fus_users`
--

INSERT INTO `fus_users` (`id`, `name`, `profession`, `last_in`, `login`, `pass`, `email`, `role`) VALUES
(1, 'Директор', 'Директор', '2016-09-12 10:02:46', 'admin', 'a7a9ef8c053bdcc5e8f977a20dfc983a', 'tropic.r@gmail.com', 1),
(6, 'Руслан', 'Программист', '2016-09-24 10:44:33', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
