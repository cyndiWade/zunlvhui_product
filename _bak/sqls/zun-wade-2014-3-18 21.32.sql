-- phpMyAdmin SQL Dump
-- version 3.5.0
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 03 月 18 日 21:38
-- 服务器版本: 5.1.69
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- 表的结构 `app_coupon`
--

DROP TABLE IF EXISTS `app_coupon`;
CREATE TABLE IF NOT EXISTS `app_coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `text` text COMMENT '介绍',
  `start_time` int(10) unsigned NOT NULL COMMENT '开始日期',
  `over_time` int(10) unsigned NOT NULL COMMENT '结束日期',
  `number` int(10) unsigned NOT NULL COMMENT '数量',
  `type` tinyint(2) unsigned NOT NULL COMMENT '类别',
  `city` varchar(10) NOT NULL COMMENT '城市',
  `msg_content` varchar(255) NOT NULL COMMENT '短信内容',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态：0上架、1下架',
  `create_time` int(10) unsigned NOT NULL COMMENT '添加日期',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '-2删除，0正常',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='优惠券' AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_coupon_img`
--

DROP TABLE IF EXISTS `app_coupon_img`;
CREATE TABLE IF NOT EXISTS `app_coupon_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `coupon_id` int(10) unsigned NOT NULL COMMENT '优惠ID',
  `type` tinyint(2) unsigned NOT NULL COMMENT '图片类型',
  `url` varchar(50) NOT NULL COMMENT '图片路径',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除(0正常，-2删除)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='酒店图片表' AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_group`
--

DROP TABLE IF EXISTS `app_group`;
CREATE TABLE IF NOT EXISTS `app_group` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(6) unsigned NOT NULL COMMENT '父id',
  `name` char(20) NOT NULL COMMENT '组名',
  `title` varchar(255) DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0启用1禁用',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组' AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_group_node`
--

DROP TABLE IF EXISTS `app_group_node`;
CREATE TABLE IF NOT EXISTS `app_group_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` smallint(6) unsigned NOT NULL COMMENT '组id',
  `node_id` smallint(6) unsigned NOT NULL COMMENT '节点id',
  PRIMARY KEY (`id`),
  KEY `groupId` (`group_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组与节点关系表' AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_group_user`
--

DROP TABLE IF EXISTS `app_group_user`;
CREATE TABLE IF NOT EXISTS `app_group_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `group_id` smallint(6) unsigned NOT NULL COMMENT '组id',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='组与用户关系表' AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_hotel`
--

DROP TABLE IF EXISTS `app_hotel`;
CREATE TABLE IF NOT EXISTS `app_hotel` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(40) NOT NULL COMMENT '酒店名',
  `hotel_sf` varchar(10) NOT NULL COMMENT '省份',
  `hotel_cs` varchar(10) NOT NULL COMMENT '城市',
  `hotel_q` varchar(10) NOT NULL COMMENT '区域',
  `hotel_xj` smallint(6) unsigned NOT NULL COMMENT '酒店星级',
  `hotel_pf` float(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '酒店评分',
  `hotel_pfrs` int(11) NOT NULL DEFAULT '0' COMMENT '评分人数',
  `hotel_tel` varchar(20) DEFAULT NULL COMMENT '酒店电话',
  `hotel_kynf` varchar(10) DEFAULT NULL COMMENT '开业年份',
  `hotel_zxnf` varchar(10) DEFAULT NULL COMMENT '装修年份',
  `hotel_syq` varchar(255) DEFAULT NULL COMMENT '商业圈',
  `hotel_dz` varchar(255) NOT NULL COMMENT '酒店地址',
  `hotel_location_x` double(20,17) NOT NULL COMMENT '经度',
  `hotel_location_y` double(20,17) NOT NULL COMMENT '纬度',
  `hotel_jtxx` varchar(255) DEFAULT NULL COMMENT '交通详情',
  `hotel_jj` text COMMENT '简介',
  `sort` smallint(5) unsigned NOT NULL COMMENT '排序',
  `hotel_ll` varchar(255) DEFAULT NULL COMMENT '来源',
  `hotel_remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除(0正常，-2删除)',
  PRIMARY KEY (`id`),
  KEY `hotel_location_x` (`hotel_location_x`),
  KEY `hotel_location_y` (`hotel_location_y`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='酒店表' AUTO_INCREMENT=661 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_hotel_img`
--

DROP TABLE IF EXISTS `app_hotel_img`;
CREATE TABLE IF NOT EXISTS `app_hotel_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `hotel_id` int(10) unsigned NOT NULL COMMENT '酒店id',
  `type` tinyint(2) unsigned NOT NULL COMMENT '图片类型',
  `url` varchar(50) NOT NULL COMMENT '图片路径',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除(0正常，-2删除)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='酒店图片表' AUTO_INCREMENT=1822 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_hotel_order`
--

DROP TABLE IF EXISTS `app_hotel_order`;
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
  `ask_for` varchar(255) NOT NULL COMMENT '客人要求',
  `phone` varchar(11) NOT NULL COMMENT '手机号',
  `total_price` decimal(9,2) NOT NULL COMMENT '总价',
  `room_num` tinyint(3) unsigned NOT NULL COMMENT '房间数量',
  `in_date` int(10) unsigned NOT NULL COMMENT '入住日期',
  `out_date` int(10) unsigned NOT NULL COMMENT '离开日期',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '订单的状态',
  `dispose_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '处理状态',
  `dispose_content` varchar(255) DEFAULT NULL COMMENT '处理意见',
  `feedback` varchar(255) DEFAULT NULL COMMENT '回馈内容',
  `is_from` tinyint(1) unsigned NOT NULL COMMENT '1来自网页2来自微信',
  `order_type` tinyint(1) unsigned NOT NULL COMMENT '订单类型（1预付微信支付2现付酒店前台支付）',
  `is_pay` tinyint(1) unsigned NOT NULL COMMENT '0未付款,1已付款',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除(0正常，-2删除)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=123 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_hotel_preference`
--

DROP TABLE IF EXISTS `app_hotel_preference`;
CREATE TABLE IF NOT EXISTS `app_hotel_preference` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `hotel_id` int(10) unsigned NOT NULL COMMENT '酒店ID',
  `time` int(10) unsigned NOT NULL COMMENT '特惠日期',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0正常，-1删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='酒店特惠关系表' AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_hotel_room`
--

DROP TABLE IF EXISTS `app_hotel_room`;
CREATE TABLE IF NOT EXISTS `app_hotel_room` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `hotel_id` int(10) unsigned NOT NULL COMMENT '酒店ID',
  `title` varchar(50) NOT NULL COMMENT '房型名称',
  `info` varchar(255) DEFAULT NULL COMMENT '房型介绍',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除(0正常，-2删除)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='酒店房型' AUTO_INCREMENT=660 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_node`
--

DROP TABLE IF EXISTS `app_node`;
CREATE TABLE IF NOT EXISTS `app_node` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(6) unsigned NOT NULL COMMENT '父id',
  `name` char(40) NOT NULL COMMENT '名称',
  `title` varchar(20) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `level` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '等级:1分组、2模块、3方法',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0启用1禁用',
  PRIMARY KEY (`id`),
  KEY `level` (`level`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='节点表(1项目、2模块、3方法)的关系' AUTO_INCREMENT=151 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_order_log`
--

DROP TABLE IF EXISTS `app_order_log`;
CREATE TABLE IF NOT EXISTS `app_order_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '日志id',
  `user_id` tinyint(3) unsigned NOT NULL COMMENT '操作日志的用户',
  `order_id` tinyint(3) unsigned NOT NULL COMMENT '操作的订单的id',
  `addtime` int(10) NOT NULL COMMENT '操作时间',
  `msg` varchar(255) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_order_state`
--

DROP TABLE IF EXISTS `app_order_state`;
CREATE TABLE IF NOT EXISTS `app_order_state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` varchar(255) NOT NULL,
  `step` int(11) NOT NULL,
  `endtime` varchar(25) NOT NULL,
  `hotel_add` varchar(255) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `room_price` float NOT NULL,
  `pay_type` tinyint(1) unsigned NOT NULL COMMENT '付款方式',
  `startrz` varchar(255) NOT NULL,
  `endlikai` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=779 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_room_img`
--

DROP TABLE IF EXISTS `app_room_img`;
CREATE TABLE IF NOT EXISTS `app_room_img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `hotel_room_id` int(10) unsigned NOT NULL COMMENT '房型id',
  `type` tinyint(2) unsigned NOT NULL COMMENT '图片类型',
  `url` varchar(50) NOT NULL COMMENT '图片路径',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除(0正常，-2删除)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='房型图片表' AUTO_INCREMENT=163 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_room_putaway`
--

DROP TABLE IF EXISTS `app_room_putaway`;
CREATE TABLE IF NOT EXISTS `app_room_putaway` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `hotel_room_id` int(10) unsigned NOT NULL COMMENT '房型ID',
  `start_time` int(10) unsigned NOT NULL COMMENT '开始日期（时间戳）',
  `over_time` int(10) unsigned NOT NULL COMMENT '结束时间',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注内容',
  `create_time` int(10) unsigned NOT NULL COMMENT '创建时间',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除（0未删除，-2删除）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='酒店房型上下架时间' AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_room_schedule`
--

DROP TABLE IF EXISTS `app_room_schedule`;
CREATE TABLE IF NOT EXISTS `app_room_schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `hotel_room_id` int(10) unsigned NOT NULL COMMENT '房型ID',
  `day` int(10) unsigned NOT NULL COMMENT '安排日期（时间戳）',
  `spot_payment` decimal(9,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '预付：微信支付',
  `prepay` decimal(9,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '现付：酒店支付',
  `room_num` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '房间数量',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除（0未删除，-2删除）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='酒店房型日程价格安排' AUTO_INCREMENT=27832 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_siri`
--

DROP TABLE IF EXISTS `app_siri`;
CREATE TABLE IF NOT EXISTS `app_siri` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `keyword` char(20) NOT NULL COMMENT '关键字',
  `explain` varchar(50) NOT NULL COMMENT '说明',
  `type` tinyint(1) unsigned NOT NULL COMMENT '类型1城市2语音关键字',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='语义分析' AUTO_INCREMENT=729 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_users`
--

DROP TABLE IF EXISTS `app_users`;
CREATE TABLE IF NOT EXISTS `app_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(11) NOT NULL,
  `nickname` varchar(20) DEFAULT NULL COMMENT '称呢',
  `password` char(32) NOT NULL,
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0',
  `last_login_ip` char(20) DEFAULT NULL,
  `login_count` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '登陆次数',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL COMMENT '用户类型:0管理员，1酒店用户',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0正常',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除，0正常，-2删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='员工账号表' AUTO_INCREMENT=64 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_users_hotel`
--

DROP TABLE IF EXISTS `app_users_hotel`;
CREATE TABLE IF NOT EXISTS `app_users_hotel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '酒店id',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `hotel_id` int(10) unsigned NOT NULL COMMENT '酒店id',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否删除(0正常，-2删除)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='酒店用户关系表' AUTO_INCREMENT=85 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_user_coupon`
--

DROP TABLE IF EXISTS `app_user_coupon`;
CREATE TABLE IF NOT EXISTS `app_user_coupon` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `wxid` char(40) NOT NULL COMMENT '微信的id',
  `coupon_id` int(10) unsigned NOT NULL COMMENT '优惠券的id',
  `is_del` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户、优惠券关系表' AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_wx_code`
--

DROP TABLE IF EXISTS `app_wx_code`;
CREATE TABLE IF NOT EXISTS `app_wx_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_id` varchar(25) NOT NULL,
  `code_url` text NOT NULL,
  `hotel_id` tinyint(4) NOT NULL COMMENT '酒店的id',
  `user_id` tinyint(4) NOT NULL COMMENT '账号的id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40757 ;

-- --------------------------------------------------------

--
-- 表的结构 `app_wx_user`
--

DROP TABLE IF EXISTS `app_wx_user`;
CREATE TABLE IF NOT EXISTS `app_wx_user` (
  `uid` int(7) NOT NULL AUTO_INCREMENT,
  `subscribe` tinyint(1) unsigned NOT NULL,
  `wxid` char(28) NOT NULL,
  `nickname` varchar(200) NOT NULL,
  `sex` tinyint(1) unsigned NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `language` varchar(50) NOT NULL,
  `headimgurl` varchar(200) NOT NULL,
  `subscribe_time` int(10) unsigned NOT NULL COMMENT '关注时间',
  `localimgurl` varchar(200) NOT NULL,
  `uname` varchar(50) NOT NULL COMMENT '姓名',
  `coupon` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL COMMENT '手机号',
  `user_id` tinyint(4) NOT NULL COMMENT '酒店账号id',
  `hotel_id` tinyint(4) NOT NULL COMMENT '酒店的id',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=251 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
