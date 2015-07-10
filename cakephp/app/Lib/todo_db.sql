-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015 年 7 朁E10 日 03:22
-- サーバのバージョン： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `todo_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `account_tbs`
--

CREATE TABLE IF NOT EXISTS `account_tbs` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pass` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `account_tbs`
--

INSERT INTO `account_tbs` (`id`, `name`, `pass`) VALUES
(1, 'koshikawa', 3115),
(2, 'wataru', 3115);

-- --------------------------------------------------------

--
-- テーブルの構造 `label_tbs`
--

CREATE TABLE IF NOT EXISTS `label_tbs` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `label_tbs`
--

INSERT INTO `label_tbs` (`id`, `title`, `account_id`) VALUES
(1, 'l1', 1),
(2, 'ラベル２', 1),
(3, 'ラベル3', 2),
(4, 'ラベル4', 2);

-- --------------------------------------------------------

--
-- テーブルの構造 `project_tbs`
--

CREATE TABLE IF NOT EXISTS `project_tbs` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `project_tbs`
--

INSERT INTO `project_tbs` (`id`, `title`, `account_id`) VALUES
(1, 'p1', 1),
(2, 'プロジェクト２', 2),
(4, 'test', 1),
(5, 'test', 1),
(6, 'testesteszae', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `task_tbs`
--

CREATE TABLE IF NOT EXISTS `task_tbs` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `account_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `label_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `completion` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `task_tbs`
--

INSERT INTO `task_tbs` (`id`, `title`, `text`, `date`, `account_id`, `project_id`, `label_id`, `file`, `completion`) VALUES
(1, 'タスク１', 'てｓｔ', '2015-07-09 14:31:59', 1, 1, 1, '', 1),
(2, 'task9', 'test', '1999-10-10 00:00:00', 1, 1, 1, '', 0),
(3, 'testetesz', 'tawerfeawer', '2015-07-09 00:00:00', 1, 1, 1, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_tbs`
--
ALTER TABLE `account_tbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `label_tbs`
--
ALTER TABLE `label_tbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_tbs`
--
ALTER TABLE `project_tbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_tbs`
--
ALTER TABLE `task_tbs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_tbs`
--
ALTER TABLE `account_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `label_tbs`
--
ALTER TABLE `label_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project_tbs`
--
ALTER TABLE `project_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `task_tbs`
--
ALTER TABLE `task_tbs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
