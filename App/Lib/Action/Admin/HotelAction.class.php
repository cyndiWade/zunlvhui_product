<?php
/**
 * 酒店管理
 */
class HotelAction extends AdminBaseAction {
  	
	private $module_name = '商家管理';
	
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
	
	//酒店列表
	public function index () {

		$Hotel = $this->db['Hotel'];	
		$html['list'] = $Hotel->field('id,hotel_name,hotel_sf,hotel_cs,hotel_q,hotel_xj,hotel_pf,hotel_syq,hotel_dz,hotel_tel')->where(array('is_del'=>0))->select();

	//	dump($html);
		parent::global_tpl_view( array(
			'action_name'=>'酒店管理',
			'title_name'=>'酒店列表',
		));
		$this->assign('html',$html);
		$this->display('table_advanced');
	}
	
	
	/*
	
	
			foreach ($list as $key=>$val) {
			$Hotel->hotel_name = $val['hotel_name'];
			$Hotel->hotel_sf = $val['hotel_sf'];
			$Hotel->hotel_cs = $val['hotel_cs'];
			$Hotel->hotel_q = $val['hotel_q'];
			$Hotel->hotel_xj = $val['hotel_xj'];
			$Hotel->hotel_pf = $val['hotel_pf'];
			$Hotel->hotel_pfrs = $val['hotel_pfrs'];
			$Hotel->hotel_tel = $val['hotel_tel'];
			$Hotel->hotel_kynf = $val['hotel_kynf'];
			$Hotel->hotel_zxnf = $val['hotel_zxnf'];
			$Hotel->hotel_syq = $val['hotel_syq'];
			$Hotel->hotel_dz = $val['hotel_dz'];
			$Hotel->hotel_location_x = $val['hotel_location_x'];
			$Hotel->hotel_location_y = $val['hotel_location_y'];
			$Hotel->hotel_jj = $val['hotel_jj'];
			$Hotel->hotel_ll = $val['hotel_ll'];
			$Hotel->add();
		}
	 */
    
}