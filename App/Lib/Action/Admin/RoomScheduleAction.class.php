<?php
/**
 * 酒店房型价格管理
 */
class RoomScheduleAction extends AdminBaseAction {
  	
	private $module_name = '房型价格管理';
	
	//初始化数据库连接
	protected  $db = array(
		'RoomSchedule'=>'RoomSchedule',
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

		//获取参数
		$hotel_room_id = $this->_get('hotel_room_id');
		if (empty($hotel_room_id)) $this->error('此房型不存在！');
		
	
		parent::global_tpl_view( array(
			'action_name'=>'酒店房型',
			'title_name'=> $hotel_info['hotel_name'].'--所有房型',
			'add_name'=>'添加房型'
		));
		$html['hotel_room_id'] = $hotel_room_id;
		$this->assign('html',$html);
		$this->display();
	}
	
	
	//编辑日程
	public function Ajax_room_schedule_edit() {
		if ($this->isPost()) {
			$arr = array('hotel_room_id','spot_payment','prepay');
			$post_data = $this->_post();
			$int_start_time= strtotime($post_data['start_time']);		//开始日期
			$int_over_time = strtotime($post_data['over_time']);		//结束如期
			
			//连接数据库
			$RoomSchedule = $this->db['RoomSchedule'];	

			//检测非法字段
			foreach ($arr AS $key) {
				if (empty($post_data[$key])) {
					parent::callback(C('STATUS_NOT_DATA'),$key.'不得为空！');
				}
			}

			//对只有一天数据的处理
			if ($int_start_time == $int_over_time) {
				$day = $int_start_time; 
				$RoomSchedule->create();
				$RoomSchedule->day = $day;
				$id = $RoomSchedule->add_one_schedule();
				$id ? parent::callback(C('STATUS_SUCCESS'),'添加成功！',array('id'=>$id)) : parent::callback(C('STATUS_UPDATE_DATA'),'添加失败！');

			//对于多天数据的处理	
			} elseif ($int_over_time > $int_start_time) {
				
				$days_count = countDays($int_start_time,$int_over_time);		//计算相差天数
				$day = $int_start_time;	
				
				//累计添加数据
				for ($i=0;$i<=$days_count;$i++) {
				
					//查找数据库是否有数据
					$RoomSchedule->create();
					$RoomSchedule->day = $day;
					$RoomSchedule->seek_update_data(array('hotel_room_id'=>$post_data['hotel_room_id'],'day'=>$day));
	
					$day = $day + 3600 * 24;		//每次写入数据库后，累加一天
				}
						
			} else {	//错误的处理
				parent::callback(C('STATUS_OTHER'),'非法操作！');
			}
			
		} else {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
	}
	

	
	/**
	 * 获取日程API
	 */
	public function AJAX_Get_Schedule() {
		
		if ($this->isPost()) {
			$RoomSchedule = $this->db['RoomSchedule'];	
			$hotel_room_id = $this->_post('hotel_room_id');
			if (empty($hotel_room_id)) {
				parent::callback(C('STATUS_NOT_DATA'),'请求客房不存在！');
			}	
			$data_list = $RoomSchedule->Seek_All_Schedule($hotel_room_id);
			$data_list ?  parent::callback(C('STATUS_SUCCESS'),'添加成功！',$data_list) : parent::callback(C('STATUS_NOT_DATA'),'暂无数据！') ;
		} else {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
		
	}
    
}