<?php
/**
 *	后台用户管理
 *
 */
class UserAction extends AdminBaseAction {
   
	private $MODULE = '权限管理';
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
		$this->assign('MODULE_NAME',$this->MODULE);
	}
	
	//用户列表	
	public function index () {
		$Users = D('Users');
		$user_status = C('ACCOUNT_STATUS');		//状态
		$user_list = $Users->seek_all_data();
		
		foreach ($user_list AS $key=>$val) {
			$user_list[$key]['status'] = $user_status[$val['status']];
		}
		
		$this->assign('user_list',$user_list);
		$this->assign('ACTION_NAME','用户管理');
		$this->display();
	}
	
	/**
	 * 修改用户账号状态
	 */
	public function user_status () {
		$Users = D('Users');
		$id = $this->_get('id');
		$status = $this->_get('status');
		$Users->status = $status;
		$Users->save_one_data(array('id'=>$id)) ? $this->success('已修改') : $this->error('没有做出修改');
	}
	
	/**
	 * 修改用户账号状态
	 */
	public function modifi_password () {
		$password = $this->_post('password');
		$new_password = $this->_post('new_password');
		$re_new_password = $this->_post('re_new_password');
		import("@.Tool.Validate");
		$Users = D('Users');
		//数据过滤
		if (Validate::checkNull($password)) $this->error('密码不得为空');
		if (Validate::checkNull($new_password)) $this->error('新密码不得为空');
		if (Validate::checkNull($re_new_password)) $this->error('重复密码不得为空');
		if (!Validate::checkEquals($new_password,$re_new_password)) $this->error('新密码不一致');
		//读取用户数据
		$user_info = $Users->get_user_info(array('account'=>$_SESSION['user_info']['account'],'status'=>0));
		//验证密码
		if (md5($password) != $user_info['password']) {
			$this->error('密码错误！');
			
			
		} else {//密码修改
			
			$mes=$Users->modifi_user_password($user_info['id'],md5($new_password));
			if($mes){ $this->success('密码修改成功！新密码为 '.$new_password);
			}else {$this->success('密码修改失败！');
			}
		} 
	}
	
	
	/**
	 * 个人中心模块
	 */
	public function personal () {

		$this->display();
	}

	

}