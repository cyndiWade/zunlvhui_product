<?php
class WxUserModel extends AppBaseModel{
	
	// 获得用户
	
	public  function get_wx_user($user_id){
	
	  $data=  $this->where(array('user_id'=>$user_id))->select();
	
	  //echo $this->getLastSql();
	  return $data;
	
	}
	
	public function get_all_wx_user($user_id){
	
// 	    $data = $this->field('w.*,h.hotel_name')
// 		->table($this->prefix.'wx_user AS w')
// 		->join($this->prefix.'hotel AS h ON h.id=w.hotel_id')
// 		->where(array('w.user_id'=>$user_id))
// 		->select();
	    
	    $data = $this->field('*')
	    ->table($this->prefix.'wx_user as u')
	    ->join($this->prefix.'wx_code as c on u.code_id = c.code_id')
	    ->where(array('u.user_id'=>$user_id))
	    ->select();
	    parent::set_all_time($data, array('subscribe_time'));
		return $data;
	}
	
	
	
}