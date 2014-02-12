<?php
class IndexAction extends HotelBaseAction{

   
	  public function index(){
	  
	    echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];;
	    $this->display();
	  }
            


}