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
        
<<<<<<< HEAD
		return $this->where($con)->field($field)->select();
=======
		$data = $this->where($con)->field($field)->select();
		foreach ($data as $key=>$val){
            $data[$key]['img'] = $this->get_img($val['id'],2);//array('hotel_id'=>$hotel_id )
		}
		return $data;
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9
		
	}
	public function get_all_data($hotel_cs){
	
	    $data = $this->field('*')
		->table($this->prefix.'hotel AS h')
		->join($this->prefix.'hotel_room AS hr ON h.id=hr.hotel_id')
		->join($this->prefix.'room_schedule AS rs on rs.hotel_room_id = hr.id')
		->where(array('hotel_cs'=>$hotel_cs,'h.is_del'=>0))
		->select();
		return $data;
	
	
	}
<<<<<<< HEAD
=======

   //获得图片
	public function get_img($hotel_id,$type){
	  
	        

			 $data = $this->table($this->prefix.'hotel AS h')
			->join($this->prefix.'hotel_img AS hr ON h.id=hr.hotel_id')
			->where( array('hr.hotel_id'=>$hotel_id,'hr.is_del'=>0,'hr.type'=>$type) )
			->getField('url');

			 return C('PUBLIC_VISIT.domain').C('UPLOAD_DIR.image').$data;
	  
	  
	  }

	  public function get_price(){
	  
	  }
>>>>>>> db724fabc3d921028b530455fd731488edf8c9f9
	
	
}