<?php
class IndexAction extends HotelBaseAction{

     public function __construct(){
      	parent::__construct();    
     }
	  public function index(){
	  	$url = $_SERVER["REQUEST_URI"];
	  	$html['hover'] = parent::getAction($url);
	    $this->assign('html',$html);
	    $this->display();
	  }
            


}