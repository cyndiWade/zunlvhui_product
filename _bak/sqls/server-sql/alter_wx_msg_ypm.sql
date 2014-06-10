alter table app_wx_msg add type tinyint(1) DEFAULT NULL COMMENT '类别：1酒店 2城市';

alter table app_wx_msg add pic_url_xiao varchar(125) DEFAULT NULL COMMENT '小图url';
