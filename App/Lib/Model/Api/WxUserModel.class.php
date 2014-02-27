<?php
class WxUserModel extends ApiBaseModel{


	public function The_existence_of_wxuser($wxuid){

	    $res =  $this->where(array('wxid'=>$wxuid))->find();
        
		if(empty($res)){
			  $data = array(
				  'wxid' =>$wxuid,
				  'subscribe_time'=>time()
			  );
			  $this->data($data)->add();		
		}
	
	
	}



}