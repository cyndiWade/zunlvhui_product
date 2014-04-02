-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 02 月 26 日 05:05
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `order_sn` char(25) NOT NULL COMMENT '订单号',
  `order_time` int(10) unsigned NOT NULL COMMENT '下单时间',
  `user_code` varchar(30) NOT NULL COMMENT '微信的uid',
  `user_id` int(10) unsigned NOT NULL COMMENT '酒店用户的id',
  `hotel_id` int(10) unsigned NOT NULL COMMENT '酒店的id',
  `hotel_room_id` int(10) unsigned NOT NULL COMMENT '房型的id',
  `in_person` varchar(10) NOT NULL COMMENT '入住人',
  `contact_person` varchar(10) NOT NULL COMMENT '联系人',
  `ask_for` varchar(255) NOT NULL COMMENT ' 客人要求',
  `phone` varchar(11) NOT NULL COMMENT '手机号',
  `total_price` decimal(9,2) NOT NULL COMMENT '总价',
  `room_num` tinyint(3) unsigned NOT NULL COMMENT '房间数量',
  `in_date` int(10) unsigned NOT NULL COMMENT '入住日期',
  `out_date` int(10) unsigned NOT NULL COMMENT '离开日期',
  `order_status` tinyint(1) unsigned NOT NULL COMMENT '订单的状态',
  `dispose_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '处理意见1表示同意2表示拒绝',
  `dispose_content` varchar(255) NOT NULL COMMENT '意见内容',
  `feedback` varchar(255) DEFAULT NULL COMMENT '回馈内容',
  `is_from` tinyint(1) unsigned NOT NULL COMMENT '1来自网页2来自微信',
  `order_type` tinyint(1) unsigned NOT NULL COMMENT '订单类型（1预付微信支付2现付酒店前台支付）',
  `is_pay` tinyint(1) unsigned NOT NULL COMMENT '0未付款,1已付款',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除(0正常，-2删除)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `app_hotel_order`
--

INSERT INTO `app_hotel_order` (`id`, `order_sn`, `order_time`, `user_code`, `user_id`, `hotel_id`, `hotel_room_id`, `in_person`, `contact_person`, `ask_for`, `phone`, `total_price`, `room_num`, `in_date`, `out_date`, `order_status`, `dispose_status`, `dispose_content`, `feedback`, `is_from`, `order_type`, `is_pay`, `is_del`) VALUES
(1, '201402201392879901', 1392879901, '', 40, 1, 2, '唐吉荣', '唐吉荣', '', '13764343326', '100.00', 1, 1392879901, 1392879901, 2, 2, '不好', NULL, 1, 1, 0, 0),
(2, '201402201392879901', 1392879901, '', 40, 1, 1, '唐吉荣', '唐吉荣', '', '13764343326', '100.00', 1, 1392879901, 1392879901, 2, 3, '哈哈', NULL, 2, 2, 0, 0),
(3, '201402201392879901', 1392879901, '', 40, 1, 1, '唐吉荣d', '唐吉荣', '', '13764343326', '100.00', 1, 1392879901, 1392879901, 0, 0, '12346', NULL, 1, 1, 0, 0),
(4, '1393381096', 0, 'o_kNsuDTFNH42UvcZIN7BH4mszPY', 0, 0, 0, '唐', '唐', '唐', '', '0.00', 0, 0, 0, 0, 0, '', NULL, 0, 1, 0, 0),
(5, '1393381536', 1393381536, 'name=\\&quot;user_code\\&quot;', 0, 0, 233, '唐吉荣', '唐吉荣', '无', '13764343326', '1200.00', 3, 2014, 2014, 0, 0, '', NULL, 0, 1, 0, 0),
(6, '1393381834', 1393381834, 'name=\\&quot;user_code\\&quot;', 0, 0, 233, '唐吉荣', '唐吉荣', '无', '13764343326', '1200.00', 3, 2014, 2014, 0, 0, '', NULL, 1, 1, 0, 0),
(7, '1393382631', 1393382631, 'name=\\&quot;user_code\\&quot;', 0, 1, 233, '唐吉荣', '唐吉荣', '无', '13764343326', '1200.00', 3, 1392879901, 1392879901, 0, 0, '', NULL, 1, 1, 0, 0),
(8, '1393386715', 1393386715, 'html.list', 0, 0, 233, '唐吉荣', '汤剂偶然那个', '无', '13764343326', '400.00', 1, 2014, 2014, 0, 0, '', NULL, 1, 1, 0, 0),
(9, '1393387264', 1393387264, 'html.list', 0, 0, 233, '唐吉荣', '吉荣', '无', '13764343326', '400.00', 1, 1393344000, 1393516800, 0, 0, '', NULL, 1, 1, 0, 0),
(10, '1393389773', 1393389773, 'html.list', 0, 233, 233, '唐吉荣', '阿迪法国队', '当官的', '13764343326', '400.00', 1, 1393344000, 1393516800, 0, 0, '', NULL, 1, 1, 0, 0),
(11, '1393390727', 1393390727, 'html.list', 0, 233, 233, '唐吉荣', '阿迪法国队', '当官的', '13764343326', '400.00', 1, 1393344000, 1393516800, 0, 0, '', NULL, 1, 1, 0, 0),
(12, '1393390961', 1393390961, 'html.list', 40, 233, 233, '唐吉荣', '阿迪法国队', '当官的', '13764343326', '400.00', 1, 1393344000, 1393516800, 0, 0, '', NULL, 1, 1, 0, 0);

DELIMITER $$
--
-- 事件
--
CREATE DEFINER=`root`@`localhost` EVENT `e_test` ON SCHEDULE EVERY 2 SECOND STARTS '2014-01-07 09:46:59' ON COMPLETION PRESERVE ENABLE DO INSERT into test.123 (name) VALUES('唐吉荣')$$

CREATE DEFINER=`root`@`localhost` EVENT `e_test_insert` ON SCHEDULE EVERY 1 SECOND STARTS '2014-01-07 09:49:25' ON COMPLETION NOT PRESERVE ENABLE DO INSERT INTO test.aaa VALUES (CURRENT_TIMESTAMP)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
