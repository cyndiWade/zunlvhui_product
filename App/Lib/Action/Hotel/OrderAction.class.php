<?php
class OrderAction extends HotelBaseAction{

    private $module_name = '订单管理';
	
	//初始化数据库连接
	protected  $db = array(
		'Hotel'        => 'Hotel',
		'Users'        => 'Users',
		'UsersHotel'   => 'UsersHotel',
	    'RoomSchedule' => 'RoomSchedule',	
	    'HotelOrder'   => 'HotelOrder',
	    'HotelRoom'    => 'HotelRoom'
	);
	
	
	/**
	 * 构造方法
	 */
	public function __construct() {
	
		parent::__construct();
	
		parent::global_tpl_view(array('module_name'=>$this->module_name));
	}
	
	public function index(){
	
		$HotelOrder = $this->db['HotelOrder'];
		$HotelRoom  = $this->db['HotelRoom'];
		$Hotel      = $this->db['Hotel'];
		$userId =  $this->oUser->id;
		$list = $HotelOrder->get_all_order(array('user_id'=>$userId));
		if($list == true){
			$hotel_ids   = getArrayByField($list,'hotel_id');
			$hotel_room_id = getArrayByField($list,'hotel_room_id');
			$Hotels     = $Hotel->get_hotels(array('id'=>array('in',$hotel_ids) ),'hotel_name,id') ;   
			$HotelRooms = $HotelRoom->get_room_type( array('hotel_id'=>array('in',$hotel_room_id) ),'id,title');	
			$Hotels_sort = regroupKey($Hotels,'id');
			$HotelRooms_sort  = regroupKey($HotelRooms,'id');
			$pay_type =  C('PAY_TYPE');
			$is_from  =  C('IS_FROM');
			foreach ($list as $key=>$val){
			    $list[$key]['order_time']            = date('Y-m-d',$val['order_time']);
				$list[$key]['in_date']               = date('Y-m-d',$val['in_date']);
				$list[$key]['order_type']            = $pay_type[$val['order_type']];
			    $list[$key]['is_from']               = $is_from[$val['is_from']];
				$list[$key]['hotel_id']  = $Hotels_sort[$val['hotel_id']][0]['hotel_name'];
				$list[$key]['hotel_room_id']  = $HotelRooms_sort[$val['hotel_id']][0]['title'];
			 
			}
		}
		$hover = parent::getAction($_SERVER["REQUEST_URI"]);
		$html  = array(
		         'list'=>$list,
		         'hover'=>$hover
		) ;
	    $this->assign('html',$html);
	    $this->display();
	}

}