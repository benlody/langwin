-- phpMyAdmin SQL Dump
-- version 4.3.0
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2016 年 11 月 27 日 18:02
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
-- 資料表結構 `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
`portfolio_id` int(11) NOT NULL,
  `name` text,
  `spec` text,
  `content` text,
  `designer_id` int(11) DEFAULT '0',
  `company_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `portfolio`
--
ALTER TABLE `portfolio`
 ADD PRIMARY KEY (`portfolio_id`), ADD UNIQUE KEY `portfolio_id` (`portfolio_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `portfolio`
--
ALTER TABLE `portfolio`
MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
