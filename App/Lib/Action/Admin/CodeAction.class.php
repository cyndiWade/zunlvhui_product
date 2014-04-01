<?php
/**
 * 二维码管理
 */
class CodeAction extends AdminBaseAction {
	//控制器说明
	private $module_name = '二维码管理';
	
	//初始化数据库连接
	protected  $db = array(
		'WxCode' => 'WxCode',	//微信二维码
	);

	
	/**
	 * 构造方法
	 */
	public function __construct() {
	
		parent::__construct();
	
		parent::global_tpl_view(array('module_name'=>$this->module_name));
		
	}
	
	
	
	public function inbox() {
		$this->display();
	}
	
	//
	public function manage () {		
		$this->error('开发中');
		//连接数据库
		$Siri = $this->db['Siri'];
		$WxCode = $this->db['WxCode'];
		
		//所有数据列表
		$type['type'] = array('neq',1);
		$siri_list = $Siri->seek_all_data($type);

		if ($siri_list == true) {
			foreach ($siri_list as $key=>$val) {
				$siri_list[$key]['type'] =  $this->global_system->siri_type[$val['type']]['explain'];
			}
		}


		parent::global_tpl_view( array(
			'action_name'=>'所有语义',
			'title_name'=>'所有语义',
		));
		
		$html['list'] = $siri_list;
		$this->assign('html',$html);
		$this->display();
	}
	
	public function edit () {
		$act = $this->_get('act');						//操作类型
		$Siri = $this->db['Siri'];
		$siri_id = $this->_get('siri_id');
		
		if ($act == 'add') {								//添加
			if ($this->isPost()) {
				$Siri->create();
				$id = $Siri->add();
				$id ? $this->success('添加成功！',U('Admin/Siri/index')) : $this->error('添加失败请重新尝试！');
				exit;
			}
			//表单标题
			$title_name = '添加关键字';
		
		} else if ($act == 'update') {			//修改
			if ($this->isPost()) {
				$Siri->create();
				$Siri->save_one_siri($siri_id) ? $this->success('修改成功！') : $this->error('没有做出任何修改！');
				exit;
			}
			//查找
			$info = $Siri->seek_one_data(array('id'=>$siri_id));

			if (empty($info)) $this->error('您编辑的语义不存在！');
			$title_name = $info['keyword'].'---编辑';
			$html = $info;
		
		} else if ($act == 'delete') {			//删除
			$Siri->del_one_data($siri_id) ? $this->success('删除成功！') : $this->error('删除失败，请稍后重试！');
			exit;
		}
		
		//语音类型
		$html['siri_type'] = $this->global_system->siri_type;
		parent::global_tpl_view( array(
				'action_name'=>'编辑',
				'title_name'=>$title_name,
		));
		$this->assign('html',$html);
		$this->display();
	}

	
	
	//管理二维码
	public function allocation () {
		import('@.ORG.Util.Page');
		
		//二维码列表
		$WxCode = $this->db['WxCode'];

		$map['hotel_id'] = 0;
		$map['is_del'] = 0;
		
		//计算结果记录条数
		$code_count = $WxCode->where($map)->count();
		$Page = new Page($code_count,10);	//分页
		
		//计算查询结果集
		$orderList = $WxCode->where($map)->limit($Page->firstRow.','.$Page->listRows)->select();

		//设置分页样式
		$Page->setConfig('prev','<span class="pageAnthor">上一页</span>');
		$Page->setConfig('next','<span class="pageAnthor">下一页</span>');
		$Page->setConfig('first','<span class="pageAnthor" title="第一页">...</span>');
		$Page->setConfig('last','<span class="pageAnthor" title="最后一页">...</span>');
		$Page->setConfig('theme','%first% %upPage%　%linkPage% %downPage%　%end%　%nowPage%/%totalPage%页');
		
		$html['list'] = $orderList;
		$html['page'] = $Page->show();
		
		parent::global_tpl_view( array(
				'action_name'=>'分配二维码',
				'title_name'=>$title_name,
		));
		
		$this->assign('html',$html);
		$this->display();
	}
	
	//ajax设置二维码归属的酒店
	public function AJAX_set_code_from_hotel () {
		if ($this->isPost()) {
			$code_ids = $this->_post('code_ids');
			$hotel_id = $this->_post('hotel_id');
			
			if (empty($code_ids) || empty($hotel_id)) parent::callback(C('STATUS_DATA_LOST'),'上传数据丢失！');
			
			$WxCode = $this->db['WxCode'];
			$code_ids = explode(',',$code_ids);
			
			if (is_array($code_ids)) {
				$is_save_ok = false;
				foreach ($code_ids as $val) {
					$WxCode->hotel_id = $hotel_id;
					if ($WxCode->where(array('id'=>$val))->save()) $is_save_ok = true;
				}
				if ($is_save_ok == true) {
					parent::callback(C('STATUS_SUCCESS'),'分配成功！');
				} else {
					parent::callback(C('STATUS_UPDATE_DATA'),'没有数据被修改！');
				}
			} else {
				parent::callback(C('STATUS_DATA_LOST'),'上传数据丢失！');
			}
			
			
		} else {
			parent::callback(C('STATUS_ACCESS'),'非法访问！');
		}
	}
	

    
}