-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2019-07-09 13:00:38
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_wish`
--

-- --------------------------------------------------------

--
-- 表的结构 `wish`
--

CREATE TABLE IF NOT EXISTS `wish` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '愿望ID',
  `name` varchar(14) NOT NULL COMMENT '作者名字',
  `content` varchar(80) NOT NULL COMMENT '许愿内容',
  `time` int(10) unsigned NOT NULL COMMENT '发表时间',
  `color` varchar(10) NOT NULL COMMENT '贴纸颜色',
  `password` varchar(6) NOT NULL COMMENT '保护密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `wish`
--

INSERT INTO `wish` (`id`, `name`, `content`, `time`, `color`, `password`) VALUES
(2, '网友孙笑川', 'NMSL,WSND', 1490241675, 'yellow', ''),
(3, '匿名', '希望早日加入新日暮里！', 1490251234, 'blue', '000000'),
(4, '刘波', '今日，我随死，但，还是，洗漱霸王！', 1490252675, 'yellow', '123'),
(5, 'HAN', '如果暴力不是为了杀戮，那就毫无意义了。', 1490252666, 'red', ''),
(6, '药酱的粉丝', '妹妹，你不要搞黄色，知道吗', 1495552666, 'yellow', ''),
(7, '菜虚困', '我是铁five，请你们教我打篮球吧', 1539923166, 'blue', ''),
(8, 'ikungirls', '菜虚困永不言败！', 1539923166, 'green', ''),
(9, '暴打坤坤', '我想暴打坤坤！', 1556024396, 'red', ''),
(10, '刘波的哥哥', '男孩子都喜欢染黄头发的妹妹', 1556024972, 'yellow', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
