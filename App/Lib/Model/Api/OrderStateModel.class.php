<?php
class OrderStateModel extends ApiBaseModel{

<<<<<<< HEAD
  
      public function get_step($wxuid){
	  
	       $step = $this->where(array('user_code'=>$wxuid))->getField('step');
=======
      // 获得步骤
      public function get_step($wxuid){
	  
	       $step = $this->where(array('user_code'=>"$wxuid"))->getField('step');
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9
	  
	       $step = empty($step) ? 0 : $step; 
		   
		   return $step;
	  }

<<<<<<< HEAD
=======
      // 添加数据
	  public function add_step($data){
	  
	  
         $this->add($data);

	  }

	  public function get_hotel_id($wxuid){
	  
	      return $this->where(array('user_code'=>"$wxuid"))->getField('hotel_id');
	  
	  }
      //删除过期的数据
	  public function del_data(){
	  
	  
	     $this->where(array('endtime'=>array('LT',time()) ) )->delete(); 

	  }
      public function del_data_user($user_code){
	  
	  
	     $this->where(array('user_code'=>"$user_code" ) )->delete(); 

	  }
	  public function get_order_info($wxuid){
	  
	  
	    $data = $this->where(array('user_code'=>"$wxuid") )->find();

		$day = daysDiff($data['endlikai'],$data['startrz']);

        $arr = array('total'=>$day*$data['room_price']);

		$this->where(array('user_code'=>"$wxuid"))->save($arr);

	    $result['str'] = '您选的是：'.$data['hotel_name']."\n".
			   '房型是：'.$data['room_name']."\n".
			   '入住时间是：'.date('Y-m-d',$data['startrz'])."\n".
			   '离开时间是：'.date('Y-m-d',$data['endlikai'])."\n".
			   '总费用是：'.$day*$data['room_price']."\n";
		$result['data'] = $data;
		return $result;
	  }
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9

}