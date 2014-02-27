<?php
class OrderStateModel extends ApiBaseModel{

  
      public function get_step($wxuid){
	  
	       $step = $this->where(array('user_code'=>$wxuid))->getField('step');
	  
	       $step = empty($step) ? 0 : $step; 
		   
		   return $step;
	  }


}