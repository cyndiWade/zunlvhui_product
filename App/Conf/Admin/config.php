<?php
if (!defined('THINK_PATH'))exit();

return array(
		
		'DEFAULT_GROUP'         => 'Admin',  // 默认分组
		'DEFAULT_MODULE'        => 'Login', // 默认模块名称
		'DEFAULT_ACTION'        => 'login', // 默认操作名称


		/* 后台不需要验证的模块 */
		'USER_AUTH_ON' => false,						//是否开启用户权限验证
		'RBAC_NODE_TABLE' => 'node',				//节点表（系统所有资源）
		'RBAC_GROUP_TABLE' => 'group',			//组表
		'RBAC_GROUP_NODE_TABLE'	=>'group_node',	//组与节点关系表
		'RBAC_GROUP_USER_TABLE'	=>'group_user',	//组与用户关系表
		
		'ADMIN_AUTH_KEY' => 'admin',				//管理员账号标识，不用认证的账号
		//'NOT_AUTH_GROUP'=> '',						//无需认证分组，多个用,号分割
		'NOT_AUTH_MODULE' => 'Login', 	// 默认无需认证模块，多个用,号分割
		'NOT_AUTH_ACTION' => '', 						// 默认无需认证方法，多个用,号分割
		
		//订单状态
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
		),
		
		//处理状态
		'DISPOSE_STATUS'=> array(
				0 => array(
					'num' => 0,
					'explain' => '新订单',	
					'admin_explain'	=> '新预订'
				),
				1 => array(
					'num' => 1,
					'explain' => '确认',
					'admin_explain'	=> '等待确认'			
				),
				2 => array(
					'num' => 2,
					'explain' => '无法确认',
					'admin_explain'	=> '酒店拒绝'
				),
				3 => array(
					'num' => 3,
					'explain' => '客人同意拒绝',
					'admin_explain'	=> '客人同意拒绝'
				),
				4 => array(
					'num' => 4,
					'explain' => '客人不同意拒绝',
					'admin_explain'	=> '客人不同意拒绝'
				),
		),
		
		
);
?>