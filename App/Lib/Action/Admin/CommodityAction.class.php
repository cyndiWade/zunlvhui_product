<?php
/**
 * 产品控制器
 */
class CommodityAction extends AdminBaseAction {
	//控制器说明
	private $module_name = '产品管理';
	
	//初始化数据库连接
	protected  $db = array(
		'Commodity'=>'Commodity',		//产品表
		'Merchant' => 'Merchant'
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
		//$this->error('研发中');
		//连接数据库
		$Commodity = $this->db['Commodity'];
		$Merchant = $this->db['Merchant'];
		$merchant_id = $this->_get('merchant_id');

		$con_info = $Merchant->seek_one_data(array('id'=>$merchant_id),'id,merchant_type');
		if (empty($con_info)) $this->error('你编辑的数据不存在');
		
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
		$html['merchant_id'] = $merchant_id;
		$this->assign('html',$html);
		$this->display();
	}
	
	
	public function edit () {
		$act = $this->_get('act');						//操作类型
		$this->Commodity_Type = C('Commodity_Type');
		$merchant_id = $this->_get('merchant_id');		//商品店铺ID
		$commodity_id = $this->_get('commodity_id');	//产品ID
		
		$Merchant = $this->db['Merchant'];
		$Commodity = $this->db['Commodity'];
		
		$con_info = $Merchant->seek_one_data(array('id'=>$merchant_id),'id,	merchant_type');
		if (empty($con_info)) $this->error('你编辑的数据不存在');
		
		//$Merchant_Type = explode(',',$con_info['merchant_type']);
		
		
		$tmp_merchant_type = explode(',',$con_info['merchant_type']);
		$Merchant_Type = array();
		foreach ($tmp_merchant_type AS $v) {
			if (!empty($this->global_system->Merchant_Type[$v]['num'])) {
				array_push($Merchant_Type,$this->global_system->Merchant_Type[$v]);
				//$str .= $this->global_system->Merchant_Type[$v]['explain'].',';
			}
		}
		
		
		
		if ($act == 'add') {								//添加
			if ($this->isPost()) {
				$Commodity->create();
				$Commodity->merchant_id = $merchant_id;
				$id = $Commodity->add_one_data();
				$id ? $this->success('添加成功！') : $this->error('添加失败请重新尝试！');
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
		
		
		$html['Merchant_Type'] = $Merchant_Type;
		parent::global_tpl_view( array(
				'action_name'=>'编辑',
				'title_name'=>$title_name,
		));
		$this->assign('html',$html);
		$this->display();
	}

	
	

    
}