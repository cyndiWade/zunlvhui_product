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
	
	
}