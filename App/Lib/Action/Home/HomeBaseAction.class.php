<?php

/**
 *  前台核心类
 */
class HomeBaseAction extends AppBaseAction {
	
	/**
	 * 保存用户信息，供子类调用
	 */
	protected $oUser;					//用户数据
	

	/**
	 * 构造方法
	 */
	public function __construct() {
		parent:: __construct();			//重写父类构造方法
		
		//初始化
		$this->_init();
	}
	
	
	//初始化用户数据
	private function _init() {
		
	}

	
}


?>