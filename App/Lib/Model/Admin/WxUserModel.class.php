<?php

//微信关注的用户
class  WxUserModel extends  AdminBaseModel {

		//获取所有订单列表
		public function seek_all_data ($order_id,$field='*')  {
			/*$data = $this->field($field)
			->table($this->prefix.'wx_user as u')
			->join($this->prefix.'wx_code as c on u.code_id = c.code_id')
			->where(array('c.is_del'=>0))
			->select();
			*/
			$data = $this->field($field)->select();
			parent::set_all_time($data, array('subscribe_time'));
			return $data;
		}
}

?>