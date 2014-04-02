<?php
class IndexAction extends HotelBaseAction{

	private $module_name = '客户管理';
    public function __construct() {
	
		parent::__construct();
	
		parent::global_tpl_view(array('module_name'=>$this->module_name));
	}
     protected $db = array(
        'WxUser'=>'WxUser'

     );
     
	  public function index(){
	  	$WxUser = $this->db['WxUser'];
	  	//$list = $WxUser->get_wx_user($this->oUser->id);
	 
	  	$list =$WxUser->get_all_wx_user($this->oUser->id);

//echo '<pre>';print_R($list);echo '</pre>';exit;
	  	$url = $_SERVER["REQUEST_URI"];
	  	$html = array('hover'=>parent::getAction($url),
	  		'list'=>$list,
	  	    'user_id'=>$this->oUser->id
	  	);
	    $this->assign('html',$html);
	    $this->display();
	  }
	       


}