-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 22 2016 г., 00:49
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `fus_applications`
--

INSERT INTO `fus_applications` (`id`, `date_create`, `date_start`, `date_finish`, `for_user`, `title`, `text`, `attach`, `from_user`, `controller`, `priority`, `finished`, `resolution`, `user_confirm`) VALUES
(7, '2016-09-20 01:20:59', '2016-09-16', '2016-09-21', 1, 'Какая то задача2', '<p>выаыв ывавы ыва ыва ываыва ыва ывавы<br></p>', '11111.png', 1, 1, 'обычный (выполнить за указанный срок)', 0, 1, 1),
(9, '2016-09-20 01:10:55', '2016-09-20', '2016-09-21', 1, 'Какая то задача', '<p>sdfd sdfsd sdfsd sdf sd<br></p>', '', 1, 1, 'обычный (выполнить за указанный срок)', 0, 1, 1);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `fus_messages`
--

INSERT INTO `fus_messages` (`id`, `text`, `title`, `date_create`, `from_user`, `to_user`, `attach`, `closed`) VALUES
(6, 'Подтвердите начало выполнения задачи !', 'Новая задача ожидает резолюции', '2016-09-16 01:44:48', 0, 1, '', 1),
(7, 'Подтвердите начало выполнения задачи !', 'Новая задача ожидает резолюции', '2016-09-16 01:44:56', 0, 1, '', 1),
(8, 'Вам пришло новое задание  Какая то задача2!  перейдите в раздел: Задания - Я исполняю что бы подтвердить', 'У вас одно новое задание', '2016-09-16 01:45:52', 0, 1, '', 1),
(9, 'Вы выбраны в качестве контролера для задания Какая то задача2', 'Вы выбраны контролером задания', '2016-09-16 01:46:02', 0, 1, '', 1),
(10, 'Вам пришло новое задание  Какая то задача!  перейдите в раздел: Задания - Я исполняю что бы подтвердить', 'У вас одно новое задание', '2016-09-16 01:46:07', 0, 1, '', 1),
(11, 'Вы выбраны в качестве контролера для задания Какая то задача', 'Вы выбраны контролером задания', '2016-09-16 01:46:11', 0, 1, '', 1),
(12, 'Пользователь Директор подтвердил начало выполненя задачи Какая то задача', 'Пользователь принял задачу', '2016-09-16 01:47:07', 0, 1, '', 1),
(13, 'Пользователь Директор подтвердил начало выполненя задачи Какая то задача2', 'Пользователь принял задачу', '2016-09-16 01:47:10', 0, 1, '', 1),
(14, 'Вам пришло новое задание  Какая то задача!  перейдите в раздел: Задания - Я исполняю что бы подтвердить', 'У вас одно новое задание', '2016-09-20 00:58:46', 0, 1, '', 1),
(15, 'Вы выбраны в качестве контролера для задания Какая то задача', 'Вы выбраны контролером задания', '2016-09-20 00:58:50', 0, 1, '', 1),
(16, 'Вам пришло новое задание  Какая то задача2!  перейдите в раздел: Задания - Я исполняю что бы подтвердить', 'У вас одно новое задание', '2016-09-20 00:58:54', 0, 1, '', 1),
(17, 'Вы выбраны в качестве контролера для задания Какая то задача2', 'Вы выбраны контролером задания', '2016-09-20 00:58:58', 0, 1, '', 1),
(18, 'Подтвердите начало выполнения задачи !', 'Новая задача ожидает резолюции', '2016-09-20 00:59:03', 0, 1, '', 1),
(19, 'Вам пришло новое задание  Какая то задача2!  перейдите в раздел: Задания - Я исполняю что бы подтвердить', 'У вас одно новое задание', '2016-09-20 00:59:08', 0, 1, '', 1),
(20, 'Вы выбраны в качестве контролера для задания Какая то задача2', 'Вы выбраны контролером задания', '2016-09-20 00:59:11', 0, 1, '', 1),
(21, 'Пользователь Директор подтвердил начало выполненя задачи Какая то задача2', 'Пользователь принял задачу', '2016-09-20 00:59:15', 0, 1, '', 1),
(22, 'Вам пришло новое задание  Какая то задача!  перейдите в раздел: Задания - Я исполняю что бы подтвердить', 'У вас одно новое задание', '2016-09-20 00:59:36', 0, 1, '', 0),
(23, 'Вы выбраны в качестве контролера для задания Какая то задача', 'Вы выбраны контролером задания', '2016-09-20 00:59:36', 0, 1, '', 0),
(24, 'Пользователь Директор подтвердил начало выполненя задачи Какая то задача', 'Пользователь принял задачу', '2016-09-20 01:00:37', 0, 1, '', 0),
(25, 'Пользователь Директор подтвердил начало выполненя задачи Какая то задача2', 'Пользователь принял задачу', '2016-09-20 01:00:42', 0, 1, '', 0),
(26, 'Пользователь Директор подтвердил начало выполненя задачи Какая то задача2', 'Пользователь принял задачу', '2016-09-20 01:09:11', 0, 1, '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `fus_users`
--

INSERT INTO `fus_users` (`id`, `name`, `profession`, `last_in`, `login`, `pass`, `email`, `role`) VALUES
(1, 'Директор', 'Директор', '2016-09-12 10:02:46', 'admin', 'a7a9ef8c053bdcc5e8f977a20dfc983a', 'tropic.r@gmail.com', 1),
(2, 'Иван', 'Бухгалтер', '2016-09-14 21:43:15', 'ivan', '96e79218965eb72c92a549dd5a330112', 'ivan@test.loc', 3),
(3, 'Сергей', 'Завхоз', '2016-09-14 22:10:28', 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.loc', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
