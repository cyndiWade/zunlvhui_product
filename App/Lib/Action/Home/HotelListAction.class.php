<?php
class HotelListAction extends HomeBaseAction{

    //初始化数据库连接
	 protected  $db = array(
		'Hotel'=>'Hotel',
	 );
	 	/**
	 * 构造方法
	 */
		public function __construct() {
		
			parent::__construct();
		
			parent::global_tpl_view(array('module_name'=>$this->module_name));
		}
	
	
	  public function index(){
	     
	  	  $Hotel  = $this->db['Hotel'];
	      $list = $Hotel->get_hotels(array('hotel_cs'=>'黄山'));
	  
	      $html = array('list'=>$list);
	      $this->assign('html',$html);
	      $this->display();
	  }

	  public function get_hotel_info(){
	     $Hotel  = $this->db['Hotel'];
	  	 $hotel_id = $this->_get('hotel_id');
	     $list = $Hotel->get_one_hotel(array('id'=>$hotel_id));
	  	 $html = array('list'=>$list);
	     $this->assign('html',$html);
	  	 $this->display();
	  
	  }
	  
	  public function map(){
	  	  $Hotel  = $this->db['Hotel'];
	      $list = $Hotel->get_hotels(array('hotel_cs'=>'黄山'));
		  $list = regroupKey($list,'id',true);
			if($id){		//ID存在时
				$list[$id] = $list[$id];	
			} else {
			    $key = array_keys($list);
				$id = $key[1];
			}
	  	  $html = array('list'=>$list,'hotel_id'=>$id);
	  	  //echo '<pre>';print_R($html);echo '</pre>';exit;
	  	  $this->assign('html',$html);
	  	  $this->display();
	  }


}