<?php
if (!defined('THINK_PATH'))exit();

return array(
		
	//	'DEFAULT_GROUP'         => 'Admin',  // 默认分组
	//	'DEFAULT_MODULE'        => 'Index', // 默认模块名称
	//	'DEFAULT_ACTION'        => 'index', // 默认操作名称

		/* 后台不需要验证的模块 */
		'USER_AUTH_ON' => false,							//是否开启
		'ADMIN_AUTH_KEY' => 'admin',					//管理员账号标识，不用认证的账号
		//'NOT_AUTH_GROUP'=> '',							//无需认证分组，多个用,号分割
		'NOT_AUTH_MODULE' => '', 						// 默认无需认证模块，多个用,号分割
		'NOT_AUTH_ACTION' => '', 							// 默认无需认证方法，多个用,号分割
		
		//客户端加密、解密钥匙
		'UNLOCAKING_KEY' => 'cheshencar',

		'Hotel_info_url' =>'http://www.zunlvhui.com.cn/zunlvhui/index.php?s=/Home/HotelList/get_hotel_info/hotel_id/',
        'Sphotel_info_url' =>'http://www.zunlvhui.com.cn/zunlvhui/index.php?s=/Home/SphotelList/get_hotel_info/hotel_id/',
		'logo_url'=>'http://www.zunlvhui.com.cn/zunlvhui/App/Public/Home/images/4.jpg',
        'Sphotel_more'=>'http://www.zunlvhui.com.cn/zunlvhui/index.php?s=/Home/SphotelList/index/hotel_cs/',
		'Hotel_more'=>'http://www.zunlvhui.com.cn/zunlvhui/index.php?s=/Home/HotelList/index/hotel_cs/',

		//'HOTELMAPIMAGES'=>'http://zunlvhui.com.cn/zunlvhui/App/Public/Home/images/city/',
		'HOTELMAPIMAGES'=>'http://www.zunlvhui.com.cn/zunlvhui/App/Public/Home/mapimages/',
		'COUPON_IMG'=>'http://www.zunlvhui.com.cn/files/zunlvhui/images/',// 优惠券图片的url;
		'COUPON_URL'=>'http://www.zunlvhui.com.cn/zunlvhui/index.php?s=/Home/HotelList/get_coupon/coupon_id/', //优惠券详情的url
		'HOTEL_MAP' => 'http://www.zunlvhui.com.cn/zunlvhui/index.php?s=/Home/HotelList/map/hotel_cs/',
		//'SPHOTEL_MAP'=> 'http://www.zunlvhui.com.cn/zunlvhui/index.php?s=/Home/SphotelList/map/hotel_cs/',
		'ORDER_INFO'=>'http://www.zunlvhui.com.cn/zunlvhui/index.php?s=/Home/HotelList/order_info/order_id/',

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
        'TestCode'=>1,
        'TestCodeUser'=>array('o_kNsuDTFNH42UvcZIN7BH4mszPY'),
		
);
?>