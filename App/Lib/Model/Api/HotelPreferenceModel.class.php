<?php
class HotelPreferenceModel extends {




      //���ÿ���ػݵľƵ��id;

	  public function get_id(){
	  
	  
	     return $this->where(  array('is_del'=>0,'time'=>strtotime( date('Y-m-d',time())) )   )->select();
	  
	  
	  }



}