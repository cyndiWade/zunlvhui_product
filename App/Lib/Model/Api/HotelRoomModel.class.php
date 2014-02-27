<?php
class HotelRoomModel extends ApiBaseModel{



      public function get_room_type($room,$hotel_id,$pay_type){

	     $data =  $this->field('hr.id as room_id ,hr.*,rs.*')
			->table($this->prefix.'hotel_room AS hr')
			->join($this->prefix.'room_schedule AS rs on rs.hotel_room_id = hr.id')
			->where(array('hr.hotel_id'=>$hotel_id,'title'=>array('like',"%$room%"),'hr.is_del'=>0,'rs.day'=>strtotime( date('Y-m-d',time())) )  )
			->find();
	    $data['price'] = $pay_type==1 ? $data['spot_payment'] : $data['prepay'];
		$data['pay_type'] = $pay_type;
	    return $data;
	  }


}