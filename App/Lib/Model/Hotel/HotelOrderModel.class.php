<?php 
class HotelOrderModel extends AppBaseModel{
	
	
	//获得所有的订单
	
	public function get_all_order($condition,$field = '*'){
		
		$con = array('is_del'=>0);
		array_add_to($con,$condition);
		return $this->where($con)->field($field)->select();
	}
	
	
	
	
	
	
}


?>