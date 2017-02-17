-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2017 at 06:21 PM
-- Server version: 5.5.53
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lightit`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_message` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL,
  `user_id` int(225) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `id_message`, `parent_id`, `name`, `user_id`, `message`, `created`) VALUES
(2, 1, 0, 'Дима', 0, 'sdfsdf', '2017-02-15 11:58:50'),
(3, 1, 0, 'Дима', 0, 'вацукцукцук', '2017-02-15 12:20:07'),
(4, 1, 0, 'Дима', 0, 'Ка́пча (от CAPTCHA — англ. Completely Automated Public Turing test to tell Computers and Humans Apart — полностью автоматизированный публичный тест Тьюринга для различения компьютеров и людей) — компьютерный тест, используемый для того, чтобы определить, кем является пользователь системы: человеком или компьютером.', '2017-02-15 12:54:21'),
(5, 1, 0, 'Дима', 0, 'sdsfsdf', '2017-02-15 13:42:00'),
(21, 1, 0, 'Дима', 10101188, 'Functions In a Separate File\r\nIf your website contains a lot of pages, and you want your jQuery functions to be easy to maintain, you can put your jQuery functions in a separate .js file.', '2017-02-15 15:57:29'),
(22, 1, 0, 'Дима', 10101188, 'gogogog', '2017-02-15 16:35:47'),
(26, 1, 0, 'Дима', 10101188, 'Query takes a lot of common tasks that require many lines of JavaScript code to accomplish, and wraps them into methods that you can call with a single line of code.', '2017-02-15 17:24:35'),
(27, 1, 0, 'Дима', 10101188, 'What is jQuery?\r\njQuery is a lightweight, \"write less, do more\", JavaScript library.', '2017-02-15 19:41:18'),
(30, 1, 0, 'Дима', 10101188, '.slideDown() | jQuery API Documentation\r\napi.jquery.com/slidedown/\r\nПеревести эту страницу\r\nA Boolean indicating whether to place the animation in the effects queue. If false, the animation will begin immediately. As of jQuery 1.7, the queue option can ...\r\n', '2017-02-16 07:37:53'),
(33, 2, 31, 'Дима', 10101188, 'test comment', '2017-02-16 12:32:39'),
(34, 1, 0, 'Дима', 10101188, 'new comment', '2017-02-16 13:16:43'),
(35, 2, 34, 'Дима', 10101188, 'test new comment', '2017-02-16 13:17:28'),
(41, 2, 40, 'Дима', 10101188, 'level 1', '2017-02-16 13:59:41'),
(42, 2, 41, 'Дима', 10101188, 'level 2', '2017-02-16 13:59:48'),
(43, 2, 42, 'Дима', 10101188, 'level 3', '2017-02-16 13:59:54'),
(45, 1, 0, 'Дима', 10101188, 'level 0', '2017-02-16 18:42:30'),
(46, 2, 45, 'Дима', 10101188, 'level 1', '2017-02-16 18:42:43'),
(47, 2, 46, 'Дима', 10101188, 'level 2', '2017-02-16 18:42:51'),
(48, 2, 47, 'Дима', 10101188, '3', '2017-02-16 19:03:01'),
(49, 2, 48, 'Дима', 10101188, '4', '2017-02-16 19:03:05'),
(60, 2, 59, 'Дима', 10101188, '15', '2017-02-16 19:03:47'),
(61, 2, 60, 'Дима', 10101188, '16', '2017-02-16 19:03:52'),
(62, 2, 61, 'Дима', 10101188, '17', '2017-02-16 19:03:58'),
(63, 2, 62, 'Дима', 10101188, '18', '2017-02-16 19:04:03'),
(64, 2, 63, 'Дима', 10101188, '19', '2017-02-16 19:04:08'),
(65, 2, 64, 'Дима', 10101188, '20', '2017-02-16 19:04:13'),
(66, 2, 65, 'Дима', 10101188, '21', '2017-02-16 19:04:36'),
(67, 2, 66, 'Дима', 10101188, '22', '2017-02-16 19:04:41'),
(68, 2, 67, 'Дима', 10101188, '23', '2017-02-16 19:04:49'),
(69, 2, 68, 'Дима', 10101188, '24', '2017-02-16 19:05:00'),
(70, 1, 0, 'Дима', 10101188, 'row 01', '2017-02-17 06:09:57'),
(72, 2, 70, 'Дима', 10101188, 'row 1.2', '2017-02-17 06:10:12'),
(73, 2, 70, 'Дима', 10101188, 'row 1.3', '2017-02-17 06:10:19'),
(74, 2, 72, 'Дима', 10101188, 'row 2.2', '2017-02-17 06:10:32'),
(75, 2, 74, 'Дима', 10101188, 'row 3.2', '2017-02-17 06:10:50'),
(92, 2, 5, 'Дима', 10101188, 'Comment', '2017-02-17 11:42:54'),
(95, 2, 94, 'Дима', 10101188, '3', '2017-02-17 12:37:44'),
(96, 2, 95, 'Дима', 10101188, '4', '2017-02-17 12:37:48'),
(97, 2, 96, 'Дима', 10101188, '5', '2017-02-17 12:37:52'),
(98, 2, 96, 'Дима', 10101188, '6', '2017-02-17 12:37:58'),
(101, 2, 100, 'Дима', 10101188, '4', '2017-02-17 12:40:27'),
(102, 2, 101, 'Дима', 10101188, '5', '2017-02-17 12:40:30'),
(103, 2, 102, 'Дима', 10101188, '6', '2017-02-17 12:40:34'),
(104, 2, 102, 'Дима', 10101188, '7', '2017-02-17 12:40:38'),
(106, 2, 105, 'Дима', 10101188, '4', '2017-02-17 12:41:56'),
(107, 2, 106, 'Дима', 10101188, '5', '2017-02-17 12:41:59'),
(108, 2, 99, 'Дима', 10101188, '3', '2017-02-17 12:45:07'),
(110, 2, 109, 'Дима', 10101188, '3', '2017-02-17 12:47:39'),
(111, 2, 110, 'Дима', 10101188, '4', '2017-02-17 12:47:43'),
(114, 2, 113, 'Дима', 10101188, '2', '2017-02-17 12:55:45'),
(121, 2, 119, 'Дима', 10101188, 'd', '2017-02-17 13:02:43'),
(126, 2, 115, 'Дима', 10101188, '3', '2017-02-17 13:43:11'),
(127, 2, 115, 'Дима', 10101188, '4', '2017-02-17 13:43:16'),
(129, 2, 70, 'Ольга', 18372757, '123', '2017-02-17 14:04:08'),
(130, 1, 0, 'Ольга', 18372757, 'Декларация скалярных типов введена в двух вариантах: принуждающая (по умолчанию) и строгая. Следующие типы могут использоваться для декларации параметров (в обоих вариантах): строки (string), целые (int), рациональные числа (float) и логические значения (bool). Они дополняют аргументы других типов, введенных в PHP 5: имена классов, интерфейсов, array и callable.', '2017-02-17 14:04:43'),
(131, 2, 130, 'Ольга', 18372757, 'Для установки строгого режима, в самом начале файла необходимо поместить одну директиву declare. Это означает, что строгость декларации работает на уровне файла и не затрагивает весь остальной код. Эта директива затрагивает не только декларацию параметров, но и возвращаемые значения функций (смотри декларация возвращаемого типа), встроенные функции PHP и функции загруженных расширений.', '2017-02-17 14:04:54'),
(132, 1, 0, 'Ольга', 18372757, 'Был добавлен оператор объединения с nul (??), являющийся синтаксическим сахаром для достаточно распространенного действия, когда совместно используются тернарный оператор и функция isset(). Он возвращает первый операнд, если он задан и не равен NULL, а в обратном случае возвращает второй операнд.', '2017-02-17 14:05:05'),
(134, 2, 132, 'Дима', 10101188, 'Оператор spaceship (космический корабль) ', '2017-02-17 14:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_id`, `name`, `last_name`) VALUES
(3, 0, 'Александр', 'alex@mail.com'),
(4, 0, 'Виктор Зинченко', 'zinchenko.us@gmail.com'),
(5, 0, 'Сергей', 'serg@mail.com'),
(6, 10101188, 'Дима', 'Шумейко'),
(7, 10101188, 'Дима', 'Шумейко'),
(8, 10101188, 'Дима', 'Шумейко'),
(9, 10101188, 'Дима', 'Шумейко'),
(10, 10101188, 'Дима', 'Шумейко'),
(11, 18372757, 'Ольга', 'Шумейко');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
