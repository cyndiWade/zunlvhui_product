<?php

/**
 * 产品表
 */
class CommodityModel extends AdminBaseModel {
	
	//获取所有数据
	public function seek_all_data ($condition) {
		$con = array('is_del'=>0);
		array_add_to($con,$condition);
		$data = $this->where($con)->select();
		parent::set_all_time($data,array('indate_start','indate_over'),'Y-m-d');
		return $data;
	}
	
	//添加一条数据
	public function add_one_data () {
		$this->indate_start	 = strtotime($this->indate_start);
		$this->indate_over = strtotime($this->indate_over);
		return $this->add();
	
	}
	
	
	//获取一条数据
	public function seek_one_data ($condition,$field = '*') {
		$con = array('is_del'=>0);
		array_add_to($con,$condition);

		return $this->where($con)->field($field)->find();
	}
	

	public function save_one_merchant ($merchant_id) {
		return $this->where(array('merchant_id'=>$merchant_id))->save();
	}
	
	//删除一条数据
	public function del_one_data ($id) {
		return $this->where(array('id'=>$id))->data(array('is_del'=>-2))->save();
	}
	
	

	

	
}

?>
