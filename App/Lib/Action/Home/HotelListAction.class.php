<?php
class HotelListAction extends HomeBaseAction{
  
     
    //初始化数据库连接
	 protected  $db = array(
		'Hotel'=>'Hotel',
	    'HotelRoom' =>'HotelRoom',
	    'RoomSchedule'=>'RoomSchedule',
        'HotelOrder'  =>'HotelOrder',
	    'UsersHotel'   => 'UsersHotel'
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
<<<<<<< HEAD
	      $list = $Hotel->get_hotels(array('hotel_cs'=>'青岛'));
=======
		 
		  $hotel_cs = passport_decrypt(urldecode($this->_get('hotel_cs')),'hotel');
		 
	      $list = $Hotel->get_hotels(array('hotel_cs'=>"$hotel_cs"));
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9
	      
	      if($list == true){
	      	 $hotel_ids = getArrayByField($list,'id'); // 获得酒店的id
	      	 $rooms    = $HotelRoom->get_price_room(array('hotel_id'=>array('in',$hotel_ids) )); 
		     $room_sort     = regroupKey($rooms,'hotel_id');  
	         foreach ($list AS $key=>$val) {
<<<<<<< HEAD
=======
				$list[$key]['img']          = $Hotel->get_img($val['id'],4);
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9
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
	  	 $user_code = $this->_get('user_code');
	     $list = $Hotel->get_one_hotel(array('id'=>$hotel_id));
	    
	     if($list == true){
	      	$rooms    = $HotelRoom->get_price_room(array('hotel_id'=>$hotel_id )); 
		    $room_sort     = regroupKey($rooms,'hotel_id');   
<<<<<<< HEAD
=======
			$list['img']         = $Hotel->get_img($list['id'],3);
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9
			$list['roomtype']     = $room_sort[$list['id']];

	      }
	     //echo '<pre>';print_R($list);echo '</pre>';exit;
	  	 $html = array(
		  	 'list'=>$list,
		  	 'user_code'=>$user_code
	  	 );
	     $this->assign('html',$html);
	  	 $this->display();
	  
	  }
	  
	  public function order(){
	  	
	      $room_id     = $this->_get('room_id');
	      $pay_type    = $this->_get('pay_type');
	      $checkinday  = $this->_get('checkinday');
	      $checkoutday = $this->_get('checkoutday');
	      $user_code   = $this->_get('user_code');
	      $hotel_id    = $this->_get('hotel_id');
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
	          'list'       =>$list[0],
	          'user_code'=>$user_code,
	          'hotel_id'=>$hotel_id,
	      );
	      //echo '<pre>';print_R($html);echo '</pre>';exit;
	      $this->assign('html',$html);
	      $this->display();
	  }
	  
	  //地图
	  
	  public function map(){
	  	  $id = $this->_get('hotel_id');
	  	  $user_code = $this->_get('user_code');
<<<<<<< HEAD
	  	  if(!empty($id)){
	  	  	 $con = array('id'=>$id);
	  	  }else{
	  	  	 $con = array('hotel_cs'=>'黄山');
=======
		  $hotel_cs  = passport_decrypt(urldecode($this->_get('hotel_cs')),'hotel');
	  	  if(!empty($id)){
	  	  	 $con = array('id'=>$id);
	  	  }else{
	  	  	 $con = array('hotel_cs'=>"$hotel_cs");
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9
	  	  }
	  	  $Hotel  = $this->db['Hotel'];  
	      $list = $Hotel->get_hotels($con);
		  $list = regroupKey($list,'id',true);
			if($id){		//ID存在时
				$list[$id] = $list[$id];	
			} else {
			    $key = array_keys($list);
				$id = $key[1];
			}
	  	  $html = array(
	  	
		  	  'list'=>$list,
		  	  'hotel_id'=>$id,
	  	      'user_code'=>$user_code
	  	  );
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
	      $hotel_id    = $this->_post('hotel_id');
	      $countday = countDays($checkinday,$checkoutday,1);
	      $user_code   = $this->_post('user_code');
          $UsersHotel = $this->db['UsersHotel'];
<<<<<<< HEAD
          $user_id = $UsersHotel->get_user_id(array('hotel_id'=>$hotel_id));
	      
=======

          $user_id = $UsersHotel->get_user_id(array('hotel_id'=>$hotel_id));
	      $user_id = $user_id == true ? $user_id : 0;
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9
          $data =array(
		      'order_sn'           => time(),
		      'order_time'         => time(),
		      'user_id'			   => $user_id,
		      'hotel_id' 		   => $hotel_id,
		      'hotel_room_id'      => $room_id,
		      'in_person'		   => $Inperson,
		      'contact_person'	   => $telperson,
	          'ask_for'   		   => $yq,
	          'user_code'          => $user_code,
	          'is_from'            => 1,
	          'phone'			   => $tel,
	          'total_price'        => $order_total,
	          'room_num'           => $house,
	          'in_date'            => strtotime($checkinday),
	          'out_date'           => strtotime($checkoutday),
	          'order_status'       => 0,
	          'dispose_status'     => 0,
	          'order_type'         =>$pay_type,
	          'is_pay'=>0,
	          'is_del'=>0      
	      );
	      
	      $HotelOrder = $this->db['HotelOrder'];
	      $lastid = $HotelOrder->done_add($data);
<<<<<<< HEAD
	  	  if(!empty($lastid)){

	  	  	  header("location:index.php?s=/Home/HotelList/order_info/order_id/$lastid");
=======

	  	  if(!empty($lastid)){

	  	  	  header("location:index.php?s=/Home/HotelList/order_info/order_id/$lastid/showwxpaytitle/1");
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9
	  	  }
	  }
	  
	  
	  //订单详情
	  public function order_info(){
	  	$PAY_TYPE    = C('PAY_TYPE');
	  	$IS_PAY      = C('IS_PAY');
	  	$order_id = $this->_get('order_id');
	  	$HotelOrder = $this->db['HotelOrder'];
	  	$list = $HotelOrder->order_info(array('o.id'=>$order_id));
	  	
	  	$list['in_date'] = date('Y-m-d',$list['in_date']);
	  	$list['order_time'] = date('Y-m-d',$list['order_time']);
	  	$list['out_date'] = date('Y-m-d',$list['out_date']);
	  	$list['explain'] = $PAY_TYPE[$list['order_type']]['explain'];
	  	$list['is_pay']     = $IS_PAY[$list['is_pay']]['explain'];
<<<<<<< HEAD
=======
		$list['total_price'] = str_replace('.','',$list['total_price']);
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9
	  	$this->assign('html',$list);
	  	$this->display();
	  }


}