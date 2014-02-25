<?php
class HotelOrderModel extends HomeBaseModel{
	
	public function done_add($data){
		
		$this->data($data)->add();
		return $this->getLastInsID();
	}
}