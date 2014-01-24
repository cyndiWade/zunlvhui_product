<?php 
/*
 * 二维码管理
 */
class TwoCodeAction extends AdminBaseAction{

    private $MODULE = '二维码管理';
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
		$this->assign('MODULE_NAME',$this->MODULE);
	}
    
	public  function index(){
		
		
		$this->display();
	}
}


?>