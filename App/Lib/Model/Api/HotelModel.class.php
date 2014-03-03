<?php
class HotelModel extends ApiBaseModel{



      public function get_all_hotel(){
	  
	        $hotel_cs ='青岛';
			//$data = $this->field('*')
			$data = $this->field('h.id,h.hotel_name , h.hotel_syq, h.hotel_pf ,rs.spot_payment,rs.prepay')
			->table($this->prefix.'hotel AS h')
			->join($this->prefix.'hotel_room AS hr ON h.id=hr.hotel_id')
			->join($this->prefix.'room_schedule AS rs on rs.hotel_room_id = hr.id')
			->where(array('hotel_cs'=>$hotel_cs,'h.is_del'=>0,'rs.day'=>strtotime( date('Y-m-d',time())) )  )
			->select();
			$arr = array();
			foreach($data as $key=>$val){
			
			    $arr[] = array(
						'Title'=>$val['hotel_name']."\n". $val['hotel_syq']."\n".$val['hotel_pf'].'分'.$val['spot_payment'].$val['prepay'],
						'Description'=>'1222',
						'Picurl' =>C('logo_url'),
						'Url'    =>C('Hotel_info_url').$val['id'],
						);
			    
			
			}
			return $arr;
	  
	  }
	  
	  
	  //根据客人说的酒店名
	  
	  public function get_Hotel(){
	  
	  	   
	  
	  
	  }



}