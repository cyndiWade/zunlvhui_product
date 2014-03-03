<?php
class WxUserModel extends ApiBaseModel{


	public function The_existence_of_wxuser($wxuid){

<<<<<<< HEAD
	    $res =  $this->where(array('wxid'=>$wxuid))->find();
        
		if(empty($res)){
			  $data = array(
				  'wxid' =>$wxuid,
=======
	    $res =  $this->where(array('wxid'=>"$wxuid"))->find();
        
		if(empty($res)){
			  $data = array(
				  'wxid' =>"$wxuid",
				  'subscribe'=>1,
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9
				  'subscribe_time'=>time()
			  );
			  $this->data($data)->add();		
		}
	
	
	}

<<<<<<< HEAD
=======
	//判断是否有手机号 

	public function The_existence_of_phone($wxuid){
	
	   return $this->where(array('wxid'=>"$wxuid"))->getField('phone');
	}

	//取消关注 
	public function unsubscribe($wxuid){
	
	    $res =  $this->where(array('wxid'=>"$wxuid"))->find();
        
		if(!empty($res)){
			  $data = array(
				  'subscribe'=>2,
				  'subscribe_time'=>time()
			  );
			  $this->where(array('wxid'=>"$wxuid"))->save($data);		
		}
	
	}

>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9


}