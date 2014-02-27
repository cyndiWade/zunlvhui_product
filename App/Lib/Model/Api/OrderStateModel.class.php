<?php
class OrderStateModel extends ApiBaseModel{

      // 获得步骤
      public function get_step($wxuid){
	  
	       $step = $this->where(array('user_code'=>"$wxuid"))->getField('step');
	  
	       $step = empty($step) ? 0 : $step; 
		   
		   return $step;
	  }

      // 添加数据
	  public function add_step($data){
	  
	  
         $this->add($data);

	  }

	  public function get_hotel_id($wxuid){
	  
	      return $this->where(array('user_code'=>"$wxuid"))->getField('hotel_id');
	  
	  }

	  public function del_data(){
	  
	  
	     $this->where(array('endtime'=>array('LT',time()) ) )->delete(); 

	  }

}