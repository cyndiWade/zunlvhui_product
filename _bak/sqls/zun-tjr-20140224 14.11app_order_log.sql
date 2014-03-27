-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 02 月 24 日 06:10
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `zun`
--

-- --------------------------------------------------------

--
-- 表的结构 `app_order_log`
--

CREATE TABLE IF NOT EXISTS `app_order_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志id',
  `user_id` tinyint(3) unsigned NOT NULL COMMENT '操作日志的用户',
  `order_id` tinyint(3) unsigned NOT NULL COMMENT '操作的订单的id',
  `addtime` int(10) NOT NULL COMMENT '操作时间',
  `msg` varchar(255) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `app_order_log`
--

INSERT INTO `app_order_log` (`id`, `user_id`, `order_id`, `addtime`, `msg`) VALUES
(1, 40, 2, 1393219640, '同意订单'),
(2, 40, 3, 1393221756, '拒绝订单'),
(3, 40, 3, 1393221846, '拒绝订单'),
(4, 40, 1, 1393222062, '拒绝订单'),
(5, 40, 2, 1393222114, '拒绝订单');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
