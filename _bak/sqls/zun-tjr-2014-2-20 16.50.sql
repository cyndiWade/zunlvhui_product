-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 02 月 20 日 08:49
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
-- 表的结构 `app_hotel_order`
--

CREATE TABLE IF NOT EXISTS `app_hotel_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `order_sn` varchar(25) NOT NULL COMMENT '订单号',
  `order_time` int(10) NOT NULL COMMENT '下单时间',
  `user_id` int(11) NOT NULL COMMENT '酒店用户的id',
  `hotel_id` int(11) NOT NULL COMMENT '酒店的id',
  `hotel_room_id` int(11) NOT NULL COMMENT '房型的id',
  `in_person` char(5) NOT NULL COMMENT '入住人',
  `contact_person` varchar(5) NOT NULL COMMENT '联系人',
  `phone` varchar(11) NOT NULL COMMENT '手机号',
  `total_price` decimal(9,2) NOT NULL COMMENT '总价',
  `room_num` int(11) NOT NULL COMMENT '房间数量',
  `in_date` int(11) NOT NULL COMMENT '入住日期',
  `out_date` int(11) NOT NULL COMMENT '离开日期',
  `order_status` int(11) NOT NULL COMMENT '订单的状态',
  `is_from` int(11) NOT NULL COMMENT '1来自网页2来自微信',
  `order_type` int(11) NOT NULL COMMENT '订单类型（1预付微信支付2现付酒店前台支付）',
  `is_pay` int(11) NOT NULL COMMENT '0未付款,1已付款',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除(0正常，-2删除)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `app_hotel_order`
--

INSERT INTO `app_hotel_order` (`id`, `order_sn`, `order_time`, `user_id`, `hotel_id`, `hotel_room_id`, `in_person`, `contact_person`, `phone`, `total_price`, `room_num`, `in_date`, `out_date`, `order_status`, `is_from`, `order_type`, `is_pay`, `is_del`) VALUES
(1, '201402201392879901', 1392879901, 40, 1, 2, '唐吉荣', '唐吉荣', '13764343326', '100.00', 1, 1392879901, 1392879901, 0, 1, 1, 0, 0),
(2, '201402201392879901', 1392879901, 40, 1, 1, '唐吉荣', '唐吉荣', '13764343326', '100.00', 1, 1392879901, 1392879901, 0, 2, 2, 0, 0),
(3, '201402201392879901', 1392879901, 40, 1, 1, '唐吉荣', '唐吉荣', '13764343326', '100.00', 1, 1392879901, 1392879901, 0, 1, 1, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
