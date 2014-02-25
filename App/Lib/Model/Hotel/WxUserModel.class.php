<?php
class WxUserModel extends AppBaseModel{
	
	// 获得用户
	
	public  function get_wx_user($user_id){
	
	  $data=  $this->where(array('user_id'=>$user_id))->select();
	
	  //echo $this->getLastSql();
	  return $data;
	
	}
	
	public function get_all_wx_user($user_id){
	
	    $data = $this->field('w.*,h.hotel_name')
		->table($this->prefix.'wx_user AS w')
		->join($this->prefix.'hotel AS h ON h.id=w.hotel_id')
		->where(array('w.user_id'=>$user_id))
		->select();
		return $data;
	}
	
	
	
}