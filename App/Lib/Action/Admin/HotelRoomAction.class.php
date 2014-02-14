<?php
/**
 * 酒店管理
 */
class HotelRoomAction extends AdminBaseAction {
  	
	private $module_name = '商家管理';
	
	//初始化数据库连接
	protected  $db = array(
		'Hotel'=>'Hotel',
		'HotelRoom' => 'HotelRoom'
	);
	
	
	/**
	 * 构造方法
	 */
	public function __construct() {
	
		parent::__construct();
	
		parent::global_tpl_view(array('module_name'=>$this->module_name));
	}
	
	
	
	//酒店房型列表
	public function index () {
		echo 
C('UPLOAD_DIR.web_dir').C('UPLOAD_DIR.image');
		exit;
		//获取参数
		$hotel_id = $this->_get('hotel_id');
		if (empty($hotel_id)) $this->error('酒店不存在！');
		
		//连接数据库表
		$HotelRoom = $this->db['HotelRoom'];		//酒店房型表
		$Hotel = $this->db['Hotel'];				//酒店表
		
		//查询酒店
		$hotel_info = $Hotel->get_one_hotel(array('id'=>$hotel_id),'hotel_name');
		if (empty($hotel_info)) $this->error('酒店不存在！');

		//酒店房型列表
		$html['list'] = $HotelRoom->get_hotel_rooms($hotel_id);

		parent::global_tpl_view( array(
			'action_name'=>'酒店房型',
			'title_name'=> $hotel_info['hotel_name'].'--所有房型',
			'add_name'=>'添加房型'
		));
		$html['hotel_id'] = $hotel_id;
		$this->assign('html',$html);
		$this->display();
	}
	
	
	/**
	 * 房型编辑
	 */
	public function room_edit () {
		//获取参数
		$act = $this->_get('act');						//操作类型
		$hotel_id = $this->_get('hotel_id');		//酒店账号ID
		$hotel_room_id = $this->_get('hotel_room_id');		//酒店房型ID
		
		//连接数据库
		$Hotel = $this->db['Hotel'];						//酒店表
		$HotelRoom = $this->db['HotelRoom'];		//酒店房型表
		
		
		if ($act == 'add') {								//添加
			if ($this->isPost()) {
				$HotelRoom->create();
				$HotelRoom->hotel_id = $hotel_id;
				$HotelRoom->add() ? $this->success('添加成功！',U('Admin/HotelRoom/index',array('hotel_id'=>$hotel_id))) : $this->error('添加失败请重新尝试！');
				exit;
			}
			
			//查询酒店
			$hotel_info = $Hotel->get_one_hotel(array('id'=>$hotel_id),'hotel_name');
			if (empty($hotel_info)) $this->error('酒店不存在或已被删除！');
			
			//表单标题
			$title_name = $hotel_info['hotel_name'].'---添加房型';

		} else if ($act == 'update') {			//修改
			if ($this->isPost()) {
				$HotelRoom->create();
				$HotelRoom->save_one_data(array('id'=>$hotel_room_id)) ? $this->success('修改成功！') : $this->error('没有做出任何修改！');
				exit;
			}
			//查找房型
			$hotel_room_info = $HotelRoom->get_one_data(array('id'=>$hotel_room_id),'title,info');
			if (empty($hotel_room_info)) $this->error('您编辑的房型不存在！');
			$title_name = $hotel_room_info['title'].'---编辑';
			$html = $hotel_room_info;
			
		} else if ($act == 'delete') {			//删除
			$HotelRoom->del_one_data($hotel_room_id) ? $this->success('删除成功！') : $this->error('删除失败，请稍后重试！');
			exit;
		}
		
		
		parent::global_tpl_view( array(
				'action_name'=>'房型编辑',
				'title_name' => $title_name
		));

		$this->assign('html',$html);
		$this->display();
	}
	

    
}