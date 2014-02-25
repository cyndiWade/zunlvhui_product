<?php
class HotelListAction extends HomeBaseAction{
  
     
    //初始化数据库连接
	 protected  $db = array(
		'Hotel'=>'Hotel',
	    'HotelRoom' =>'HotelRoom',
	    'RoomSchedule'=>'RoomSchedule',
        'Hotelorder'  =>'Hotelorder'
	 );
	 	/**
	 * 构造方法
	 */
		public function __construct() {
		
			parent::__construct();
		
			parent::global_tpl_view(array('module_name'=>$this->module_name));
		}
	
	
	  public function index(){
	     
	  	  $Hotel      = $this->db['Hotel']; // 酒店
	  	  $HotelRoom  = $this->db['HotelRoom'];
	  	  $RoomSchedule = $this->db['RoomSchedule'];
	      $list = $Hotel->get_hotels(array('hotel_cs'=>'黄山'));
	      
	      if($list == true){
	      	 $hotel_ids = getArrayByField($list,'id'); // 获得酒店的id
	      	 $rooms    = $HotelRoom->get_price_room(array('hotel_id'=>array('in',$hotel_ids) )); 
		     $room_sort     = regroupKey($rooms,'hotel_id');  
	         foreach ($list AS $key=>$val) {
				$list[$key]['roomtype']     = $room_sort[$val['id']];
				$list[$key]['spot_payment'] = !empty($room_sort[$val['id']][0]['spot_payment']) ? $room_sort[$val['id']][0]['prepay'] : C('NOT_PRICE'); // 微信支付
				$list[$key]['prepay'] =       !empty($room_sort[$val['id']][0]['prepay']) ? $room_sort[$val['id']][0]['prepay'] : C('NOT_PRICE') ;//到店支付
				
			 }
	      }
	      //echo '<pre>';print_R($list);echo '</pre>';exit;
	      $html = array('list'=>$list);
	      $this->assign('html',$html);
	      $this->display();
	  }

	  public function get_hotel_info(){
	     $Hotel  = $this->db['Hotel'];
	     $HotelRoom  = $this->db['HotelRoom'];
	  	 $hotel_id = $this->_get('hotel_id');
	     $list = $Hotel->get_one_hotel(array('id'=>$hotel_id));
	    
	     if($list == true){
	      	$rooms    = $HotelRoom->get_price_room(array('hotel_id'=>$hotel_id )); 
		    $room_sort     = regroupKey($rooms,'hotel_id');   
			$list['roomtype']     = $room_sort[$list['id']];

	      }
	     //echo '<pre>';print_R($list);echo '</pre>';exit;
	  	 $html = array('list'=>$list);
	     $this->assign('html',$html);
	  	 $this->display();
	  
	  }
	  
	  public function order(){
	  	
	      $room_id     = $this->_get('room_id');
	      $pay_type    = $this->_get('pay_type');
	      $checkinday  = $this->_get('checkinday');
	      $checkoutday = $this->_get('checkoutday');
	      $countday = countDays($checkinday,$checkoutday,1);
	      $user_code   = $this->_get('user_code');
	      $HotelRoom = $this->db['HotelRoom'];
	      $list = $HotelRoom->get_price_room(array('hr.id'=>$room_id));
	      $price = $pay_type ==1 ? $list[0]['spot_payment']  : $list[0]['prepay'];
	      $html = array(
		      'room_id'    =>$room_id,
		      'pay_type'   =>$pay_type,
		      'checkinday' =>$checkinday,
		      'checkoutday'=>$checkoutday,
		      'user_code'  =>$user_code,
	          'price'      => $price,
	          'total_price'=> $price *$countday, 
	          'list'       =>$list[0]
	      );
	      //echo '<pre>';print_R($html);echo '</pre>';exit;
	      $this->assign('html',$html);
	      $this->display();
	  }
	  
	  //地图
	  
	  public function map(){
	  	  $Hotel  = $this->db['Hotel'];
	      $list = $Hotel->get_hotels(array('hotel_cs'=>'黄山'));
		  $list = regroupKey($list,'id',true);
			if($id){		//ID存在时
				$list[$id] = $list[$id];	
			} else {
			    $key = array_keys($list);
				$id = $key[1];
			}
	  	  $html = array('list'=>$list,'hotel_id'=>$id);
	  	  //echo '<pre>';print_R($html);echo '</pre>';exit;
	  	  $this->assign('html',$html);
	  	  $this->display();
	  }
	  
	  
	  //ajax 更改价格
	  public function update_price(){
	  
	  	if($this->isPost()){
	  	  $room_id     = $this->_post('room_id');
	      $pay_type    = $this->_post('pay_type');
	      $checkinday  = $this->_post('checkinday');
	      $checkoutday = $this->_post('checkoutday');
	      $house = $this->_post('house');
	      $countday = countDays($checkinday,$checkoutday,1);
	      $user_code   = $this->_post('user_code');
	      $HotelRoom = $this->db['HotelRoom'];
	      $list = $HotelRoom->get_price_room(array('hr.id'=>$room_id));
	      $price = $pay_type ==1 ? $list[0]['spot_payment']  : $list[0]['prepay'];
	      $html = array(
		      'room_id'    =>$room_id,
		      'pay_type'   =>$pay_type,
		      'checkinday' =>$checkinday,
		      'checkoutday'=>$checkoutday,
		      'user_code'  =>$user_code,
	          'price'      => $price,
	          'total_price'=> $price *$countday*$house, 
	      );
	  	  parent::callback(C('STATUS_SUCCESS'),'处理成功！',$html);
	  	
	  	
	  	}else{
	  		parent::callback(C('STATUS_ACCESS'),'非法访问！');
	  	}
	 
	  
	  }
	  
	  
	  //订单处理
	  public function done_order(){

	  	  $room_id     = $this->_post('room_id');
	      $pay_type    = $this->_post('pay_type');
	      $checkinday  = $this->_post('checkinday');
	      $checkoutday = $this->_post('checkoutday');
	      $Inperson    = $this->_post('Inperson');
	      $telperson   = $this->_post('telperson');
	      $house       = $this->_post('house');
	      $order_total = $this->_post('order_total');
	      $tel         = $this->_post('tel');
	      $yq          = $this->_post('yq');
	      $countday = countDays($checkinday,$checkoutday,1);
	      $user_code   = $this->_post('user_code');
	      $data =array(
		      'order_sn'=>time(),
		      'order_tiime'=>time(),
		      'user_id'=>'',
		      'hotel_id'=>'',
		      'hotel_room_id'=>'',
		      'in_person'=>$in_person,
		      'contact_person'=>$telperson,
	      
	      
	      )
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      
	      $HotelOrder = $this->db['Hotelorder'];
	      $lastid = $HotelOrder->done_add($data);
	  	
	  	dump($this->_Post());
	  }


}