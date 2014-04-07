<?php
/**
 * 产品控制器
 */
class CommodityAction extends AdminBaseAction {
	//控制器说明
	private $module_name = '产品管理';
	
	//初始化数据库连接
	protected  $db = array(
		'Commodity'=>'Commodity',		//语义表
	);
	
	private $Commodity_Status;


	/**
	 * 构造方法
	 */
	public function __construct() {
	
		parent::__construct();
		
		$this->Commodity_Status = C('Commodity_Status');
	
		parent::global_tpl_view(array('module_name'=>$this->module_name));
		
	}
	
	
	
	//语义列表
	public function index () {		
		$this->error('研发中');
		//连接数据库
		$Commodity = $this->db['Commodity'];
		
// 		//所有数据列表
// 		$list = $Commodity->seek_all_data();

// 		if ($list == true) {
// 			foreach ($list as $key=>$val) {
// 				$list[$key]['status'] = $this->Commodity_Status[$val['status']]['explain'];
// 			}
// 		}

		parent::global_tpl_view( array(
			'action_name'=>'产品首页',
			'title_name'=>'产品',
			'add_name' =>'添加产品',
		));
		
		$html['list'] = $list;
		$this->assign('html',$html);
		$this->display();
	}
	
	
	public function edit () {
		$act = $this->_get('act');						//操作类型
		$Commodity = $this->db['Commodity'];
		$Commodity_id = $this->_get('Commodity_id');
		$this->Commodity_Type = C('Commodity_Type');
		

		if ($act == 'add') {								//添加
			if ($this->isPost()) {
				//组合商家类型
				$Commodity_type = $this->_post('Commodity_type');
				$Commodity_type = implode(',',$Commodity_type);
				$Commodity->create();
				$Commodity->Commodity_type = $Commodity_type;
				$id = $Commodity->add();
				$id ? $this->success('添加成功！',U('Admin/Commodity/index')) : $this->error('添加失败请重新尝试！');
				exit;
			}
			//表单标题
			$title_name = '添加商铺';
		
		} else if ($act == 'update') {			//修改
			if ($this->isPost()) {
				$Commodity->create();
				$Commodity->save_one_Commodity($Commodity_id) ? $this->success('修改成功！') : $this->error('没有做出任何修改！');
				exit;
			}
			//查找
			$info = $Commodity->seek_one_data(array('id'=>$Commodity_id));

			if (empty($info)) $this->error('您编辑的数据不存在！');
			
			$Commodity_type = explode(',',$info['Commodity_type']);

			foreach ($this->global_system->Commodity_Type AS $key=>$val) {
				if (in_array($val['explain'],$Commodity_type)) {
					$this->global_system->Commodity_Type[$key]['checked'] = 'checked="checked"';
				}
			}
			
			$title_name = $info['name'].'---编辑';
			$html = $info;
		
		} else if ($act == 'delete') {			//删除
			$Commodity->del_one_data($Commodity_id) ? $this->success('删除成功！') : $this->error('删除失败，请稍后重试！');
			exit;
		} else {
			$this->error('非法操作！');
		}
		
		//语音类型
		$html['Commodity_Type'] = $this->global_system->Commodity_Type;
		$html['Commodity_Status'] = $this->Commodity_Status;

		parent::global_tpl_view( array(
				'action_name'=>'编辑',
				'title_name'=>$title_name,
		));
		$this->assign('html',$html);
		$this->display();
	}

	
	

    
}