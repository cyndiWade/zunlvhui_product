<?php
if (!defined('THINK_PATH'))exit();

return array(
		
	//	'DEFAULT_GROUP'         => 'Admin',  // 默认分组
	//	'DEFAULT_MODULE'        => 'Index', // 默认模块名称
	//	'DEFAULT_ACTION'        => 'index', // 默认操作名称


		/* 后台不需要验证的模块 */
		'USER_AUTH_ON' => false,						//是否开启用户权限验证
		'RBAC_NODE_TABLE' => 'node',				//节点表（系统所有资源）
		'RBAC_GROUP_TABLE' => 'group',			//组表
		'RBAC_GROUP_NODE_TABLE'	=>'group_node',	//组与节点关系表
		'RBAC_GROUP_USER_TABLE'	=>'group_user',	//组与用户关系表
		
		'ADMIN_AUTH_KEY' => 'admin',				//管理员账号标识，不用认证的账号
		//'NOT_AUTH_GROUP'=> '',						//无需认证分组，多个用,号分割
		'NOT_AUTH_MODULE' => 'HotelList', 	// 默认无需认证模块，多个用,号分割
		'NOT_AUTH_ACTION' => '', 						// 默认无需认证方法，多个用,号分割
	    'COUPON_IMG'      =>'http://yunqiserver.xicp.net/files/zun/images/',
		'NOT_PRICE' =>'暂未价格',

        'PAY_TYPE' => array(
                    1=>array(
                       'num'=>1,
                       'explain' =>'预付(微信支付)'
                    ),
                    2=>array(
                       'num'=>2,
                       'explain' =>'现付(酒店前台支付)'
                    )
                ),
         'IS_PAY' => array(
	                0=>array(
	                  'num'=>0,
	                  'explain'=>'未付款'
	                ),
	                1=>array(
	                  'num'=>1,
	                  'explain'=>'已付款'
	                )
                ),
        'ORDER_STATUS' => array(
				0 => array(
					'num' => 0,
					'explain' => '未处理',	
				),
				1 => array(
						'num' => 1,
						'explain' => '已处理',		
				),
				2 => array(
						'num' => 2,
						'explain' => '处理中',	
				),
				3 => array(
				        'num'=>3,
				        'explain'=> '订单已取消'
				)
		),
                
);
?>