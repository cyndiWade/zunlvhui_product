<?php
class HotelModel extends HomeBaseModel{
	
	
    //获取一条酒店数据
	public function get_one_hotel ($condition,$field = '*') {
		$con = array('is_del'=>0);
		array_add_to($con,$condition);

		return $this->where($con)->field($field)->find();
	}
	
	public function get_hotels($condition,$field = '*'){
		
		$con = array('is_del'=>0);
		array_add_to($con,$condition);
        
		return $this->where($con)->field($field)->select();
		
	}
	public function get_all_data($hotel_cs){
	
	    $data = $this->field('*')
		->table($this->prefix.'hotel AS h')
		->join($this->prefix.'hotel_room AS hr ON h.id=hr.hotel_id')
		->join($this->prefix.'room_schedule AS rs on rs.hotel_room_id = hr.id')
		->where(array('hotel_cs'=>$hotel_cs,'h.is_del'=>0))
		->select();
		return $data;
	
	
	}
	
	
}