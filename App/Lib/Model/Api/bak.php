<?php
class HotelModel extends ApiBaseModel{



      public function get_all_hotel($hotel_cs){
	        if(empty($hotel_cs))$hotel_cs ='青岛';
			$data = $this->field('h.id,h.hotel_name , h.hotel_syq, h.hotel_pf ,rs.spot_payment,rs.prepay')
			->table($this->prefix.'hotel AS h')
			->join($this->prefix.'hotel_room AS hr ON h.id=hr.hotel_id')
			->join($this->prefix.'room_schedule AS rs on rs.hotel_room_id = hr.id')
			->where(array('hotel_cs'=>$hotel_cs,'h.is_del'=>0,'rs.day'=>strtotime( date('Y-m-d',time())) )  )
			->select();
			$arr = array();
			$i = 1 ;
			foreach($data as $key=>$val){
			    if($i>10)break;
			    $arr[] = array(
						'Title'=>$val['hotel_name']."\n". $val['hotel_syq']."\n".$val['hotel_pf'].'分 预付 ￥'.$val['spot_payment'].' 现付 ￥'.$val['prepay'],
						'Description'=>'',
						'Picurl' =>C('logo_url'),
						'Url'    =>C('Hotel_info_url').$val['id'],
						);
			    
			  $i++;
			}
			
			return $arr;
	  
	  }
	  
	  
	  //根据客人说的酒店名
	  
	  public function get_Hotel($hotel_name){
	  
	  	    if(empty($hotel_name))$hotel_name ='上海中环';
			$data = $this->field('h.id,h.hotel_name , hr.title, h.hotel_pf ,rs.spot_payment,rs.prepay')
			->table($this->prefix.'hotel AS h')
			->join($this->prefix.'hotel_room AS hr ON h.id=hr.hotel_id')
			->join($this->prefix.'room_schedule AS rs on rs.hotel_room_id = hr.id')
			->where(array('hotel_name'=>array('like',"%$hotel_name%"),'h.is_del'=>0,'rs.day'=>strtotime( date('Y-m-d',time())) )  )
			->select();
			$arr = array();
			$i = 1 ;
			foreach($data as $key=>$val){
			    if($i>10)break;
			    $arr[] = array(
						'Title'=>$val['hotel_name']."\n". $val['title']."\n".$val['hotel_pf'].'分 预付 ￥'.$val['spot_payment'].' 现付 ￥'.$val['prepay'],
						'Description'=>'',
						'Picurl' =>C('logo_url'),
						'Url'    =>C('Hotel_info_url').$val['id'],
						);
			   $hotel_id =$val['id'];
			   $hotel_name = $val['hotel_name'];
			    
			  $i++;
			}
			$result['list']       = $arr;
			$result['hotel_id']   = $hotel_id; 
			$result['hotel_name'] = $hotel_name;
			return $result; 
	  
	  
	  }


      


}