CREATE TABLE IF NOT EXISTS `app_gift` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(20) NOT NULL COMMENT '礼包名称',
  `is_del` tinyint(1) NOT NULL DEFAULT '0' COMMENT '删除(0正常，-2删除)',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='礼品表' AUTO_INCREMENT=610 ;