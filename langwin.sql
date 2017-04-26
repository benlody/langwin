-- phpMyAdmin SQL Dump
-- version 4.3.0
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2017 年 01 月 26 日 15:51
-- 伺服器版本: 5.5.43-MariaDB
-- PHP 版本： 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `langwin`
--

-- --------------------------------------------------------

--
-- 資料表結構 `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`company_id` int(11) NOT NULL,
  `name` text,
  `desc` text,
  `contact` text,
  `logo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `designer`
--

CREATE TABLE IF NOT EXISTS `designer` (
`designer_id` int(11) NOT NULL,
  `name` text,
  `desc` text,
  `contact` text,
  `photo` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
`portfolio_id` int(11) NOT NULL,
  `name` text,
  `title` text,
  `spec` text,
  `content` text,
  `designer_id` int(11) DEFAULT '0',
  `company_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`company_id`), ADD UNIQUE KEY `company_id` (`company_id`), ADD UNIQUE KEY `name` (`name`(32));

--
-- 資料表索引 `designer`
--
ALTER TABLE `designer`
 ADD PRIMARY KEY (`designer_id`), ADD UNIQUE KEY `designer_id` (`designer_id`), ADD UNIQUE KEY `name` (`name`(32));

--
-- 資料表索引 `portfolio`
--
ALTER TABLE `portfolio`
 ADD PRIMARY KEY (`portfolio_id`), ADD UNIQUE KEY `portfolio_id` (`portfolio_id`), ADD UNIQUE KEY `name` (`name`(32));

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `company`
--
ALTER TABLE `company`
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `designer`
--
ALTER TABLE `designer`
MODIFY `designer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `portfolio`
--
ALTER TABLE `portfolio`
MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



