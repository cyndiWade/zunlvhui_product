<?php
class KfLogModel extends AdminBaseModel {

	  public function add_log($data){
	  	 
	  	 return $this->add($data);
	  	 //return $this->getLastInsertID();
	  }
	  
	  public function get1(){
	  	echo 'a';
	  }
}