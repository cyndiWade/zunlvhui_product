<?php
/**
 * 酒店订单管理
 */
class HotelOrderAction extends AdminBaseAction {
	//控制器说明
	private $module_name = '订单管理';
	
	//初始化数据库连接
	protected  $db = array(
		'HotelOrder'=>'HotelOrder',		//订单表
		'OrderLog' => 'OrderLog'			//订单日志表
	);
	

	/**
	 * 构造方法
	 */
	public function __construct() {
	
		parent::__construct();
	
		parent::global_tpl_view(array('module_name'=>$this->module_name));
	}
	
	
	
	//酒店列表
	public function index () {
		$user_id = $this->_get('user_id');
		
		//连接数据库
		$HotelOrder = $this->db['HotelOrder'];	
		$order_list = $HotelOrder->seek_order_list();
		
		if ($order_list == true) {
			foreach ($order_list as $key=>$val) {
				$order_list[$key]['order_explain'] = $this->order_status[$val['order_status']]['explain'];
				$order_list[$key]['dispose_admin_explain'] = $this->dispose_status[$val['dispose_status']]['admin_explain'];
				//订单状态是酒店无法处理，等待尊旅会协商处理的。
				if ($val['order_status'] == $this->order_status[2]['num']) {
					$order_list[$key]['dispose'] = true;
				}
			}
		}

		
		parent::global_tpl_view( array(
			'action_name'=>'订单列表',
			'title_name'=>'订单列表',
		));
		
		$html['list'] = $order_list;
		$this->assign('html',$html);
		$this->display();
	}
	
	
	//订单处理
	public function order_dispose () {
		$hotel_order_id = $this->_get('hotel_order_id');
		$HotelOrder = $this->db['HotelOrder'];
		
		if (empty($hotel_order_id)) $this->error('非法操作！');
		$order_info = $HotelOrder->seek_one_hotel(array('id'=>$hotel_order_id),'id,order_sn,dispose_content,feedback,order_status');
		if (empty($order_info)) $this->error('此订单不存在！');		
		
		if ($order_info['order_status'] == $this->order_status[1]['num']) $this->error('此订单已处理，请勿重复操作！');
		
		if ($this->isPost()) {
			$HotelOrder->create();
			$HotelOrder->order_status = $this->order_status[1]['num'];		//订单状态为已处理
			$HotelOrder->save_one_data(array('id'=>$hotel_order_id)) ? $this->success('成功') : $this->error('失败');
			exit;		
		}
		
		parent::global_tpl_view( array(
				'action_name'=>'订单处理',
				'title_name'=>'订单号：'.$order_info['order_sn'],
		));
		$html['order_info'] = $order_info;
		$html['dispose_status'] = $this->dispose_status;
		$this->assign('html',$html);
		$this->display();
	}
	
	
	
	//订单日志
	public function order_log () {
		$hotel_order_id = $this->_get('hotel_order_id');
		$HotelOrder = $this->db['HotelOrder'];
		
		if (empty($hotel_order_id)) $this->error('非法操作！');
		$order_info = $HotelOrder->seek_one_hotel(array('id'=>$hotel_order_id),'id,order_sn');
		if (empty($order_info)) $this->error('此订单不存在！');
		
		
		parent::global_tpl_view( array(
				'action_name'=>'订单日志',
				'title_name'=>'订单：'.$order_info['order_sn'].'-日志',
		));
		$this->assign('html',$html);
		
		
	}
    
}