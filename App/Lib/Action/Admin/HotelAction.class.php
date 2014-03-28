<?php
/**
 * 酒店管理
 */
class HotelAction extends AdminBaseAction {
  	
	//初始化数据库连接
	protected  $db = array(
			'Hotel'=>'Hotel',
			'Users' =>'Users',
			'UsersHotel' => 'UsersHotel',
			'HotelImg' => 'HotelImg'
	);
	
	//控制器说明
	private $module_name = '商家管理';
	
	//酒店星级
	private $hotel_xj_type = array(
		1=> array(
			'num'=>1,
			'explain'=>'一星级'
		),
		2=> array(
			'num'=>2,
			'explain'=>'二星级'
		),
		3=> array(
			'num'=>3,
			'explain'=>'三星级'
		),
		4=> array(
			'num'=>4,
			'explain'=>'四星级'
		),
		5=> array(
			'num'=>5,
			'explain'=>'五星级'
		)
	);
	
	//酒店图片类型
	private $img_type = array(
// 		1 => array(
// 			'num'=>1,
// 			'explain'=>'房型360x200',
// 		),
// 		2 => array(
// 			'num'=>2,
// 			'explain'=>'房型200x200',
// 		),
		3 => array(
			'num'=>3,
			'explain'=>'外景360x200',
		),		
		4 => array(
			'num'=>4,
			'explain'=>'外景200x200',		
		),
		5 => array(
			'num'=>5,
			'explain'=>'酒店logo',
		)
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
		$Hotel = $this->db['Hotel'];	
		$UsersHotel = $this->db['UsersHotel'];

		if (empty($user_id)) {
			$html['list'] = $Hotel->field('id,hotel_name,hotel_sf,hotel_cs,hotel_q,hotel_xj,hotel_pf,hotel_syq,hotel_dz,hotel_tel')->where(array('is_del'=>0))->select();
		} else {
			$html['list'] = $UsersHotel->get_user_hotels($user_id);
		}

		parent::global_tpl_view( array(
			'action_name'=>'酒店管理',
			'title_name'=>'酒店列表',
		));
		$this->assign('html',$html);
		$this->display();
	}
	
	
	/**
	 * 编辑酒店
	 */
	public function hotel_edit () {
		$Users = $this->db['Users'];				//用户表
		$Hotel = $this->db['Hotel'];				//酒店表
		$UsersHotel = $this->db['UsersHotel'];		//酒店用户关系表
		$act = $this->_get('act');						//操作类型
		$user_id = $this->_get('user_id');			//酒店账号ID
		$hotel_id = $this->_get('hotel_id');		//酒店ID

		if ($act == 'add') {								//添加
			if ($this->isPost()) {
				$Hotel->create();
				$hotel_id = $Hotel->add();
				if ($hotel_id == true) {
					$UsersHotel->user_id = $user_id;
					$UsersHotel->hotel_id = $hotel_id;
					$UsersHotel->add() ? $this->success('添加成功！',U('Admin/Hotel/hotel_img',array('hotel_id'=>$hotel_id))) : $this->error('添加失败请重新尝试！');
				} else {
					$this->error('酒店添加失败，请重新尝试！');
				}
				exit;
			}
			
			//获取用户账号信息
			$account_info = $Users->get_account(array('id'=>$user_id));
			if (empty($account_info)) $this->error('此酒店账号不存在或已被删除');
			$html['account'] = $account_info['account'];		//账号

			//模板标题
			$title_name = '添加酒店';
			
		} else if ($act == 'update') {			//修改
			if ($this->isPost()) {
				$Hotel->create();
				$Hotel->save_one_data(array('id'=>$hotel_id)) ? $this->success('修改成功！') : $this->error('没有做出任何修改！');
				exit;
			}
			
			//酒店是否存在验证
			if (empty($hotel_id)) $this->error('酒店不存在！');
			$hotel_info = $Hotel->get_one_hotel(array('id'=>$hotel_id),'*');
			if (empty($hotel_info)) $this->error('酒店不存在！');

			//模板标题
			$title_name = $hotel_info['hotel_name'].'--编辑';
			
			//模板注入内容
			$html = $hotel_info;
			
		} else if ($act == 'delete') {			//删除
			$is_del = $Hotel->del_one_hotel($hotel_id);
			if ($is_del == true) {
				//del_user_hotel
				$this->success('删除成功！');
			} else {
				$this->error('删除失败，请稍后重试！');
			}
			
			exit;
		}
		

		parent::global_tpl_view( array(
				'action_name'=>'酒店编辑',
				'title_name' => $title_name
		));
		
		$html['hotel_xj_type'] = $this->hotel_xj_type; 
		$this->assign('html',$html);
		$this->display();
	}
	
	
	
	//酒店图片编辑
	public function hotel_img () {
		$hotel_id = $this->_get('hotel_id');
		$Hotel = $this->db['Hotel'];				//酒店表
		$HotelImg = $this->db['HotelImg'];	//酒店图片表
		
		//酒店是否存在验证
		if (empty($hotel_id)) $this->error('酒店不存在！');
		$hotel_info = $Hotel->get_one_hotel(array('id'=>$hotel_id),'id,hotel_name');
		if (empty($hotel_info)) $this->error('酒店不存在！');
		
		//获取酒店图片数据
		$photo_list = $HotelImg->get_hotel_images(array('hotel_id'=>$hotel_id),'id,type,url');
		if (!empty($photo_list)) {
			parent::public_file_dir($photo_list, array('url'), 'images/');		//组合访问地址
			$photo_type_list = regroupKey($photo_list,'type');						//按照图片类似分类
		}

		
		//注入模板
		$html['hotel_id'] = $hotel_info['id'];
		$html['img_type'] = $this->img_type;
		$html['photo_type_list'] = $photo_type_list;
		parent::global_tpl_view( array(
				'action_name'=>'酒店图片',
				'title_name' => $hotel_info['hotel_name'].'--上传图片'
		));
		$this->assign('html',$html);
		$this->display();
	}
	

	
	/**
	 * AJAX处理上传车辆图片
	 */
	public function ajax_photo_upload() {
		header('Content-Type:text/html;charset=utf-8');

		if ($this->isPost()) {
			/* 上传文件目录 */
			$upload_dir = C('UPLOAD_DIR');
			$dir = $upload_dir['web_dir'].$upload_dir['image'];		//图片文件保存地址
			$HotelImg = $this->db['HotelImg'];		//酒店图片表
	
			/* 执行上传 */
			$file = $_FILES['photo_files'];					//上传的文件
			$hotel_id = $this->_post('hotel_id');				//车辆ID
			$type = $this->_post('type');						//图片类型
	
			/* 参数验证 */
			if (empty($hotel_id) || empty($type)) parent::callback(C('STATUS_DATA_LOST'),'参数错误！');
				
			/* 执行上传 */
			$result = parent::upload_file($file, $dir,5120000);
	
			/* 上传结果处理 */
			if ($result['status'] == true) {
				$HotelImg->hotel_id = $hotel_id;
				$HotelImg->type = $type;
				$HotelImg->url = $result['info'][0]['savename'];
				$hotel_img_id = $HotelImg->add();		//写入数据库
	
				if ($hotel_img_id) {
					$return['success'] = true;
					$return['info'] = '保存成功';
					echo json_encode($return);
				} else {
					$return['success'] = false;
					$return['info'] = '保存失败';
					echo json_encode($return);
				}
			} else {
				$return['success'] = false;
				$return['info'] = '上传失败';
				echo json_encode($return);
			}
	
		} else {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
	
	}
	
	
	/**
	 * AJAX车辆删除图片
	 */
	public function ajax_photo_remove () {
		if ($this->isPost()) {
			$id = $this->_post('id');
			$HotelImg = $this->db['HotelImg'];		//酒店图片表
			$HotelImg->del_one_image($id) ? parent::callback(C('STATUS_SUCCESS'),'删除成功') : parent::callback(C('STATUS_UPDATE_DATA'),'删除失败') ;
		} else {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
	}
    
}