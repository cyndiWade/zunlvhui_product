<?php
class HotelRoomModel extends AppBaseModel{
	
    public function get_room_type ($condition,$field = '*') {
		$con = array('is_del'=>0);
		array_add_to($con,$condition);

		return $this->where($con)->field($field)->select();
	}
	
}