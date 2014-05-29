create table if not exists app_wx_msg  (
  id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  title	varchar(255) not null COMMENT '标题',
  description text NOT NULL COMMENT '内容',
  pic_url varchar(255) not null COMMENT '图片url',
  url varchar(255) not null COMMENT '超连接url',
  use_state tinyint(4) NOT NULL COMMENT '使用状态：0未使用1特价酒店2预定送免房3订房返红包',
  is_del tinyint(1) NOT NULL COMMENT '是否删除：0正常-2删除',
  sort tinyint(5)  COMMENT '排序',
  PRIMARY KEY (id)
)ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='图文推送表';

