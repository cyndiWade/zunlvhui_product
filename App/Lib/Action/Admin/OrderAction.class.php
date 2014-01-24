<?php
/**
 * 用车申请订单处理类
 */
class OrderAction extends OrderBaseAction {
	
	protected  $db = array(
		'StaffBase' => 'StaffBase',
		'MemberBase' => 'MemberBase'	,
		'Cars' => 'Cars',
		'StaffBase' => 'StaffBase',
		'Order' => 'Order'
	);
	
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		
		parent::__construct();

		import("@.Tool.Validate");							//验证类
	}
	
	private function data_check() {
		//数据过滤
		if (Validate::checkNull($_POST['cars_id'])) $this->error('车辆资源为空');
		if (Validate::checkNull($_POST['start'])) $this->error('用车开始时间为空');
		if (Validate::checkNull($_POST['estimate_over'])) $this->error('预计还车时间为空');
	}
	

	/* 申请订单列表 */
	public function apply () {
		$Order = $this->db['Order'];													//车辆资源表
		/* 获取申请订单列表 */
		$map['o.order_state'] = array('in',array($this->order_state[0]['order_status'],$this->order_state[-2]['order_status']));
		$html_list = $Order->seek_user_order($map);
		//$html_list = $Order->seek_user_order(array('o.order_state'=>$this->order_state[0]['order_status']));	

			
		if ($html_list) {
			foreach ($html_list AS $key=>$val) {
				$html_list[$key]['order_from'] =  $this->order_from[mb_substr($val['order_num'], 0,1)];		//获取订单来源
				$html_list[$key]['order_explain'] = $this->order_state[$val['order_state']]['order_explain'];		//订单状态
				$html_list[$key]['is_need_driver'] = $this->is_need_driver[$val['is_need_driver']]['name'];		//司机
				$html_list[$key]['give_car'] = $this->give_car[$val['give_car']]['name'];									//是否需要送车
				$html_list[$key]['all_remarks'] = $val['remarks'];
			}
			set_str_len($html_list, array('remarks'), 10);		//字符长度限制
		}


		$this->assign('ACTION_NAME','用车申请');
		$this->assign('TITILE_NAME','用车申请列表');
		$this->assign('html_list',$html_list);
		$this->assign('order_state',$this->order_state);
		$this->assign('is_cancel',$this->is_cancel);
		$this->display();
	}
	

	
	/**
	 * 添加用车申请
	 */
	public function edit_apply () {
		$act = $this->_get('act');														//用户动作
		$member_base_id = $this->_get('member_base_id');			//会员基础信息ID
		$id = $this->_get('id');															//订单ID
		if (empty($member_base_id)) $this->error('非法操作！');
		
		$MemberResource = D('MemberResource');			// 会员等级对应可用资源表（会员）
		$MemberBase = D('MemberBase');						//会员基本信息表
		$Cars = D('Cars');													//车辆资源表
		$Order = D('Order');												//订单模型表
		
		/* 通过会员ID，找到会员对应的会员信息，以及会员级别 */
		$member_info = $MemberBase->get_one_data(array('status'=>0,'id'=>$member_base_id),'member_rank_id,use_car_number,name,mobile_phone,over_date');
		if (empty($member_info)) $this->error('此会员不存在！');
		
		$member_rank_id = $member_info['member_rank_id'];			//会员级别ID
		$use_car_number = $member_info['use_car_number'];			//会员已使用天数
		$member_name = $member_info['name'];									//会员姓名
		$over_date  = $member_info['over_date'];									//会员到期日期
		$mobile_phone = $member_info['mobile_phone'];						//会员手机号码

		switch ($act) {
			case  'add':
				/* 保存提交订单 */
				if ($this->isPost()) {
					$this->data_check();
					
					/* 转换日期为时间戳 */
					$start = strtotime($this->_post('start'));		
					$estimate_over = strtotime($this->_post('estimate_over'));
					$over_date = strtotime($over_date);		
					if ($start > $over_date)  {		
						$this->error('用车日期不得大于会员的截止日期');
					}
					
					/* 生成订单号 */
					$create_order =  parent::create_order_num('N');
					if ($create_order['status'] == false) $this->error($create_order['info']);
					$order_num = $create_order['info'];
					
					//订单信息写入数据
					$Order->create();
					$Order->order_num = $order_num;
					$Order->member_base_id = $member_base_id;
					$Order->start = $start;
					$Order->estimate_over = $estimate_over;
					$Order->order_state	= $this->order_state[0]['order_status'];	//申请订单
					$order_id = $Order->add_order_data ();
					if ($order_id) {
						parent::order_history($order_id,'提交申请订单');
						$this->success('生成订单成功,请填写短息内容',U('Admin/Order/order_send_msg',array('id'=>$order_id)));
					//	$this->success('生成订单成功！');
					} else {
						$this->error('申请失败，请重新尝试！');
					}
					exit;
				}
				break;
		
			case 'update' :
				if ($this->isPost()) {
					$this->data_check();
					/* 转换日期为时间戳 */
					$start = strtotime($this->_post('start'));
					$estimate_over = strtotime($this->_post('estimate_over'));		//预计还车日期
					$over_date = strtotime($over_date);
					if ($start > $over_date)  {
						$this->error('用车日期不得大于会员的截止日期');
					}
					
					$Order->create();
					$Order->start = $start;
					$Order->estimate_over = $estimate_over;
					if ($Order->save_one_data(array('id'=>$id))) {
						parent::order_history($id,'修改订单');
						$this->success('修改成功！');
					} else {
						$this->error('没有做出修改');
					}
					
					exit;
				}
				//获取修改数据
				$html_info = $Order->seek_one_data($id);
				if (empty($html_info)) $this->error('此订单不存在');

				break;
		
			case 'delete':
			//	$Cars->del(array('id'=>$id)) ? $this->success('删除成功！') : $this->error('删除失败，请重新尝试！');
				exit;
				break;
		
			default:
				$this->error('非法操作！');
		}
		
		
		/* 按照会员级别，获取会员享有资源类型(如车辆资源) */
		$resource_detail = $MemberResource->seek_member_resource($member_rank_id,$this->resource_type[1]);
		$resource_detail = $resource_detail[0];

		$car_number = $resource_detail['car_number'];		//车辆资源可使用天数

		$html_radio = '';		//可用车辆资源的HTML

		
		/**
		if ($resource_detail) {
			$cars_grade_id = $resource_detail['id'];					//车辆资源级别ID
			$car_number = $resource_detail['car_number'];		//车辆资源可使用天数
			$company_id = 1;														//车辆所属区域，目前业务暂时只在深圳
			
			// 获取当前类型下，会员可享受的车辆资源列表
			$cars_list = $Cars->seek_cars_list($cars_grade_id,$company_id,$this->cars_disabled);	

			if ($cars_list) {
				foreach ($cars_list AS $key=>$val) {
					$cars_list[$key]['car_status_name']  = $this->car_status[$val['car_status']];
					//对不能使用的车辆禁止选择
					if (in_array($val['car_status'],$this->cars_disabled)) $disabled = 'disabled="disabled"';
					$html_radio .= '
					<label class="radio line">
					<input type="radio" name="cars_id" value="'.$val['id'].'" '.$disabled.'/>
					'.$val['brand'].' ->状态：('.$this->car_status[$val['car_status']].') ->车辆类型：('.$val['type'].') ->车辆颜色('.$val['color'].')
					</label>';
					$disabled = NULL;
				}
				
			} else {
				$html_radio = '暂无可用车辆资源';
			}
			
		} else {
			$html_radio = '此级别的会员没有可分配的车辆资源';
		}
		*/

		/* 计算过会员使用天数信息 */
		$count_day['sum'] = $car_number;	//总天数
		$count_day['use'] = $use_car_number;		//已使用
		$count_day['residue'] = $count_day['sum'] - $count_day['use']; 	//剩余天数
		
		$this->assign('ACTION_NAME','订单处理');
		$this->assign('TITILE_NAME',$member_name.'--订单处理');

		$this->assign('count_day',$count_day);
		$this->assign('over_date',$over_date);
		
		$this->assign('is_need_driver',$this->is_need_driver);
		$this->assign('driver_price',$this->driver_price);

		$html_info['member_base_id'] = $member_base_id;
		$html_info['identifying'] = U('Admin/CarsSchedule/cars_schedule_show',array('identifying'=>$resource_detail['identifying']));
		$this->assign('html_info',$html_info);
		$this->display();
	}
	
	
	/**
	 * 派车申请、订单取消等操作
	 */
	public function set_order_state () {
		$id = $this->_get('id');
		$order_state = $this->_get('order_state');			//订单状态
		$Order = D('Order');												//订单模型表;
		
		//修改订单状态为派车社情
		if ($Order->where(array('id'=>$id))->data(array('order_state'=>$order_state))->save()) {		
			
			//取消订单时
			if ($this->order_state[-2]['order_status'] == $order_state) {
				parent::order_history($id,'订单取消！');
			//派车申请时	
			} elseif ($this->order_state[1]['order_status'] == $order_state) {
				parent::order_history($id,'提交派车申请！');
				
				//派车申请的时候，发送短信给车辆管理部门的指定职位的人员
				$list = $this->db['StaffBase']->seek_usable_driver_list($this->occupation_cars_id);
				if ($list) {
					$phones = array();
					foreach ($list AS $key=>$val) {
						array_push($phones, $val['phone']);
					}
					$send_result = parent::send_shp($phones, '有新订单，请及时处理！');		//发送短信
				}
			}
			
			$this->success('成功！');
		
		} else {
			$this->error('失败！');
		}
	
	}
	

	/**
	 * 车辆调度列表
	 */
	public function cars_arrange_list () {
		$Order = D('Order');													//车辆资源表
		
		/* 获取对应订单状态 */
		$map['o.order_state']  = array('in',
			array(
					$this->order_state[1]['order_status'],	//派车申请
					$this->order_state[2]['order_status'],	//派车申请通过
					$this->order_state[3]['order_status'],	//派车申请拒绝
			)
		);
		$map['o.give_back_state'] = $this->give_back_state[0]['status_num'];		//车辆状态为，未归还
	
		
		$html_list = $Order->seek_user_order($map);
		
		if ($html_list) {
			foreach ($html_list AS $key=>$val) {
				$html_list[$key]['order_from'] =  $this->order_from[mb_substr($val['order_num'], 0,1)];
				$html_list[$key]['order_explain'] = $this->order_state[$val['order_state']]['order_explain'];		//订单状态
				$html_list[$key]['is_need_driver'] = $this->is_need_driver[$val['is_need_driver']]['name'];		//司机
				$html_list[$key]['give_car'] = $this->give_car[$val['give_car']]['name'];									//是否需要送车
				$html_list[$key]['all_remarks'] = $val['remarks'];
			}
			set_str_len($html_list, array('remarks'), 10);		//字符长度限制
		}
		
		$this->assign('ACTION_NAME','派车申请');
		$this->assign('TITILE_NAME','派车申请列表');
		$this->assign('html_list',$html_list);
		$this->assign('order_state',$this->order_state);
		$this->display();
	}
	
	
	
	/**
	 * 派车处理
	 */
	public function cars_arrange_edit () {
		$Order = D('Order');													//订单表
		$Cars = D('Cars');														//车辆资源表
		$MemberBase = D('MemberBase');							//会员基本信息表
		$StaffBase = D('StaffBase');										//员工基本信息表
		$CarsSchedule = D('CarsSchedule');						//车辆日程表
		$id = $this->_get('id');												//订单ID
				
		//获取订单数据
		$html_info = $Order->seek_one_data($id);
		if (empty($html_info)) $this->error('此订单不存在');
		$cars_id = $html_info['cars_id'];		//车辆ID
		
		/**
		 * 当需要司机时进行html处理
		 */
		if ($html_info['is_need_driver'] == $this->is_need_driver[1]['id']) {
			parent::get_driver_list();	//写入司机列表
			
			$html_tmp  = '<div class="control-group">
							<label class="control-label">选择司机<span class="required">*</span></label>
							<div class="controls">
								<select class="small m-wrap" tabindex="1" name="driver_id">';
								if (empty($this->driver_id)) {
									$html_tmp .= '<option value="">暂无可用司机</option>';
								} else {
									foreach ($this->driver_id AS $key=>$val) {
										$html_tmp .= '<option value='.$val['id'].'>'.$val['name'].'</option>';
									}
								}		
			$html_tmp .= '</select>
							</div>
						</div>';		
			$html_info['driver_id'] = $html_tmp;
		}
		
		//dump($html_info);
	//	exit;
		/**
		 * 修改订单
		 */
		if ($this->isPost()) {
			
			$check_cars_id = $this->_post('check_cars_id');		//车辆ID
			$check_start = $this->_post('check_start');	//用车开始时间
			$check_estimate_over = $this->_post('check_estimate_over');		//用车结束时间
			$driver_id = $this->_post('driver_id') ;			//司机ID
			$order_state = $this->_post('order_state');		//处理状态

			
			$Order->create();
			/* 当订单审核通过时 */
			if ($order_state == $this->order_state[2]['order_status']) {
				/* 如果需要司机时，修改司机的状态为已出车。 */
				if (!empty($driver_id)) $StaffBase->where(array('id'=>$driver_id))->save(array('driver_status'=>1));
			} else {
				$Order->driver_id = null;
			}
			
			/* 更新订单状态 */
			$save_status = $Order->where(array('id'=>$id))->save();		//修改订单状态
			if ($save_status) {
				
				$state_content =  $this->order_state[$order_state]['order_explain'];		//操作状态
				
				/* 派车申请通过时*/
				if ($order_state == $this->order_state[2]['order_status']) {
					//修改车辆状态为已租用
					$Cars->where(array('id'=>$cars_id))->save(array('car_status'=>3));				
							
					/* 写入日程数据到数据库中 */
					$CarsSchedule->cars_id = $check_cars_id;
					$CarsSchedule->title = '用车';
					$CarsSchedule->start_schedule_time = $check_start;
					$CarsSchedule->over_schedule_time = $check_estimate_over;
					$CarsSchedule->add_one_schedule();
				}
					
				parent::order_history($id,$state_content);
				$this->success('提交成功,请填写短息内容',U('Admin/Order/order_send_msg',array('id'=>$id)));
			} else {
				$this->error('提交失败,请重新尝试');
			}
			exit;
		}
		
		
		$html_info['is_need_driver'] = $this->is_need_driver[$html_info['is_need_driver']]['name'] ;		//司机
		$mobile_phone = $MemberBase->get_one_data(array('id'=>$html_info['member_base_id']),'mobile_phone');
		$html_info['mobile_phone'] = $mobile_phone['mobile_phone'];	
		$this->assign('ACTION_NAME','派车申请');
		$this->assign('TITILE_NAME','派车申请列表');
		$this->assign('html_info',$html_info);
		$this->assign('order_state',$this->order_state);
		$this->display();
	}
	
	
	/**
	 * 还车管理列表
	 */
	public function give_back_car_list () {
		$Order = D('Order');													//车辆资源表
		
		/* 获取对应订单状态 */
		$map['o.order_state']  = array(
				$this->order_state[2]['order_status'],	//派车申请通过
		);

		$html_list = $Order->seek_user_order($map);

		if ($html_list) {
			foreach ($html_list AS $key=>$val) {
				$html_list[$key]['order_from'] =  $this->order_from[mb_substr($val['order_num'], 0,1)];
				/* 订单状态状态说明 */
				$html_list[$key]['order_state_explain'] = $this->order_state[$val['order_state']]['order_explain'];
				/* 车辆归还状态说明 */
				$html_list[$key]['give_back_state_explain'] = $this->give_back_state[$val['give_back_state']]['status_explain'];
				$html_list[$key]['is_need_driver'] = $this->is_need_driver[$val['is_need_driver']]['name'];		//司机
				$html_list[$key]['all_remarks'] = $val['remarks'];
			}
			set_str_len($html_list, array('remarks'), 10);		//字符长度限制
		}

		
		$this->assign('ACTION_NAME','还车管理');
		$this->assign('TITILE_NAME','还车信息列表');
		$this->assign('html_list',$html_list);
		$this->assign('give_back_state',$this->give_back_state);
		$this->display();

	}
	
	
	/**
	 * 编辑还车信息
	 */
	public function give_back_car_edit () {
		$Order = D('Order');													//订单表
		$Cars= D('Cars');														//车辆资源表
		$MemberBase = D('MemberBase');							//会员基本信息表
		$MemberResource = D('MemberResource');			// 会员等级对应可用资源表（会员）	
		$StaffBase = D('StaffBase');										//员工基本信息
		$id = $this->_get('id');												//订单ID
		
		/* 获取订单数据 */
		$html_info = $Order->seek_one_data($id);
		if (empty($html_info)) $this->error('此订单不存在！');
		$cars_id = $html_info['cars_id'];			//租用车辆ID

		/* 通过订单，查找会员信息 */
		$member_info = $MemberBase->get_one_data(array('status'=>0,'id'=>$html_info['member_base_id']),'id,member_rank_id,use_car_number,over_date');
		if (empty($member_info)) $this->error('订单会员不存在！');
		$member_rank_id = 	$member_info['member_rank_id'];		//会员级别ID
		$use_car_number = $member_info['use_car_number'];		//会员已使用天数
		$over_date  = $member_info['over_date'];								//会员到期日期

		/* 通过会员级别，找出这个级别会员可以享用的车辆资源信息 */
		$resource_detail = $MemberResource->seek_member_resource($member_rank_id,$this->resource_type[1]);
		$resource_detail = $resource_detail[0];
		
		/* 如果有可用资源 */
		if ($resource_detail) {		
			$car_number = $resource_detail['car_number'];		//车辆资源可使用天数
			/* 计算过会员使用天数信息 */
			$count_day['sum'] = $car_number;				//总天数
			$count_day['use'] = $use_car_number;		//已使用
			$count_day['residue'] = $count_day['sum'] - $count_day['use']; 	//剩余天数
			
		} else {
			$this->error('此级别的用户暂无可用资源！');
		}
 		
		
		if ($this->isPost()) {

			/* 初始化参数，都是时间戳 */
			$start = strtotime($html_info['start']);							//开始用车日期
			$over = strtotime($this->_post('over'));						//归还日期
			$over_date = strtotime($over_date);							//会员过期日期
			
			/* 归还日期，不得小于，用车日期 */
			if ($over < $start ) {
				$this->error('归还日期，不得小于，用车日期');
			}

			/* 计算总用车天数 = 借车日期 - 还车日期 */
			//$count_days = sex_day($start,$over);
			$count_days = format_sex_day($start,$over);
			
			/* 起租天数，满6小时为1天，不满6小时也为1天。 */
			$count_days < 1 ? $length = 1 : $length = $count_days;

			/* 业务逻辑处理 */
			if ($over > $over_date ) {			//归还日期 超过 会员过期日期，处理
				$exceed_date = format_sex_day($over_date,$over);		//计算会员过期日期与还车日期之间相差的天数，就是超出天数
				
				/* 订车日期到会员截止日期之间的用车天数 -  会员还剩余的使用天使 = 会员期内可免除的使用天数 */
				$member_days = format_sex_day($start,$over_date);						//会员期时间段内用车天数
				$residue_days =	$car_number - $use_car_number;						//会员期时间段内剩余天数	
				if ($residue_days < 0) $residue_days= 0;											//如果剩余天数已用光，则不计算
				
				//会员期内使用天数 - 会员期时间段内剩余天数
				$practical_days = $member_days - $residue_days;					//会员期内实际用车天数	
	
				if ($practical_days < 0) $practical_days = 0;		//对会员期内过期的天数进行排除
				$exceed_date += $practical_days;					//扣除会员剩余天数，得出的最后超出天数

			} else {
				
				//剩余可用天数
				$residue_days =	$car_number - $use_car_number;						//会员期时间段内剩余天数
				
				//超出天数
			//	$exceed_date = $residue_days - $length;											//剩余天数 - 用车数。
				if ($length > $residue_days) {		//租用天数大于剩余天数
					$exceed_date = $length - $residue_days;		//计算超出天数
				} elseif ($length < $residue_days)  {
					$exceed_date = 0;
				} else {
					$exceed_date = 0;
				}
			}
			
			/* 更新到数据库中 */
			$Order->startTrans() ;											//开启事物		
			$Order->over = $over;											//用车结束日期
			$Order->length = $length;										//用车时长
			$Order->exceed_date = $exceed_date;				//超出天数用车日期
			if ($exceed_date > 0) {						//当超出时
				$Order->give_back_state = $this->give_back_state[2]['status_num'];		//归还状态；
			} else if ($exceed_date <= 0) {		//当没有时
				$Order->give_back_state = $this->give_back_state[1]['status_num'];		//归还状态；
			}
			$save_status = $Order->where(array('id'=>$id))->save();		//修改订单状态		
			$Order->commit();		//提交事物
			
			if ($save_status) {		
				/* 累加用户使用次数 */
				$member_status =  $MemberBase->where(array('id'=>$member_info['id']))->setInc('use_car_number',$length);
				$Cars->where(array('id'=>$cars_id))->save(array('car_status'=>0)) ;			//更新车辆状态
				
				/* 更新司机状态为可用 */
				if ($html_info['is_need_driver'] == $this->is_need_driver[1]['id']) {
					$StaffBase->where(array('id'=>$html_info['driver_id']))->save(array('driver_status'=>0));
				}
				
				if ($member_status == false) {
					$Order->rollback();		//事务回滚
				}
				parent::order_history($id,'还车确认！');
				
				$this->success('提交成功,请填写短息内容',U('Admin/Order/order_send_msg',array('id'=>$id)));
				//$this->success('提交成功',U('Admin/Order/give_back_car_list'));
			} else {
				$this->error('提交失败,请重新尝试');
			}
			exit;
		}
		
		
		$this->assign('ACTION_NAME','还车信息');
		$this->assign('TITILE_NAME','订单号：'.$html_info['order_num']);
		$this->assign('TITILE_NAME','还车信息填写。'.'订单号：'.$html_info['order_num']);
		$this->assign('count_day',$count_day);
		$this->assign('over_date',$over_date);
		$this->assign('html_info',$html_info);
		$this->display();
	
	}
	
	
	/**
	 * 发送短信
	 */
	public function order_send_msg () {
		$Order = D('Order');													//车辆资源表
		$MemberBase = D('MemberBase');							//会员基本信息表
		$StaffBase = D('StaffBase');										//员工基本信息表
		$id = $this->_get('id');												//订单ID
		
		if ($this->isPost()) {
			$mobile_phone = $_POST['mobile_phone'];		//客人手机号码
			$driver_phone = $_POST['driver_phone'];			//司机手机号码
			$mobile_phone_message = $_POST['mobile_phone_message'];		//发送内容
			//$state_content =  $this->order_state[$_POST['order_state']]['order_explain'];		//操作状态
				
			/* 发送短信 */
			if (!empty($driver_phone)) {
				$phones_string = array($mobile_phone,$driver_phone);
			} else {
				$phones_string = $mobile_phone;
			}

			//执行发送短信
			$send_result = parent::send_shp($phones_string, $mobile_phone_message);	
			
			if ($send_result['status'] == true) {
				
				$Order->create();
				$Order->where(array('id'=>$id))->save();
				
				parent::order_history($id,'发送短信，状态为：成功。短信内容：'. $mobile_phone_message);
				
		//		$this->success('短信发送成功！',U('Admin/Order/cars_arrange_list'));
				$this->success($send_result['msg']);
			} else {
				parent::order_history($id,'发送短信，状态为：失败。');
				$this->error($send_result['msg']);
			}
			exit;
		}
		
		/* 获取订单信息 */
		$html_info = $Order->get_one_data(array('id'=>$id,'status'=>0));
		
		if (empty($html_info)) $this->error('此订单不存在');
		$mobile_phone = $MemberBase->get_one_data(array('id'=>$html_info['member_base_id'],'status'=>0),'mobile_phone');
		$html_info['mobile_phone'] = $mobile_phone['mobile_phone'];
		$html_info['auth_code'] = mt_rand(1000, 9999);	//生成提车码
		
		/* 当需要司机时显示司机手机号码。*/
		if ($html_info['is_need_driver'] == 1) {
			$driver_phone = $StaffBase->get_one_data(array('id'=>$html_info['driver_id']),'phone');
			$html_info['driver_phone'] = $driver_phone['phone'];
		}
	
		
		$html_info['now_state'] = $html_info['order_state'];							//当前订单状态
		$html_info['order_state'] = $this->order_state;							//订单状态说明
			
		$html_info['now_give_back_state'] = $html_info['give_back_state'];		//当前还车状态;		
		$html_info['give_back_state'] = $this->give_back_state;			//还车状态说明

		$this->assign('ACTION_NAME','发送短信');
		$this->assign('TITILE_NAME','订单号：'.$html_info['order_num']);
		$this->assign('html_info',$html_info);
		$this->display();
		
	}
	
	
	/**
	 * 订单历史列表
	 */
	public function order_history_list () {
		$order_id = $this->_get('order_id');
		$html_list = D('OrderHistory')->get_order_history($order_id);

		if ($html_list == true) {
			foreach ($html_list AS $key=>$val) {
				if ($val['users_id'] == 0) {
					$html_list[$key]['account'] = '客人';
				}
			}
		}

		
		$this->assign('html_list',$html_list);	
		$this->assign('ACTION_NAME','操作历史');
		$this->assign('TITILE_NAME','操作历史列表');
		$this->display();
	}
	
	
	
	/**
	 * 补订单
	 */
	public function order_supplement () {
		$act = $this->_get('act');		//动作
		$MemberBase = $this->db['MemberBase'];
		$Cars = $this->db['Cars'];
		$StaffBase = $this->db['StaffBase'];
		$Order = $this->db['Order'];

		switch ($act) {
			case 'add':
				
				if ($this->isPost()) {
					$member_base_id = $this->_post('member_base_id');		//会员ID
					
					$start = strtotime($this->_post('start'));							//开始用车日期
					$over = strtotime($this->_post('over'));						//归还日期
					if ($start > $over) $this->error('开始日期不得大于用车日期');	//

					$length = $this->_post('length');			//使用天数
					
					$driver_id = $this->_post('driver_id');
					if (!empty($driver_id)) {
						$is_need_driver = 1;
					} else {
						$is_need_driver = 0;
					}
					
					$order_state = $this->order_state[2]['order_status'];
					$give_back_state = $this->give_back_state[1]['status_num'];
					
					/* 生成订单号 */
					$create_order =  parent::create_order_num('S');
					if ($create_order['status'] == false) $this->error($create_order['info']);
					$order_num = $create_order['info'];
					
					//写入数据库
					$Order->create();
					$Order->order_num  = $order_num;
					$Order->start  = $start;
					$Order->over  = $over;
					$Order->driver_id  = $driver_id;
					$Order->is_need_driver  = $is_need_driver;
					$Order->order_state  = $order_state;
					$Order->give_back_state  = $give_back_state;
					$order_id = $Order->add_order_data();
					if ($order_id) {
						$MemberBase->where(array('id'=>$member_base_id))->setInc('use_car_number',$length); //累加用户使用天数
						parent::order_history($order_id,'手补订单！');
						$this->success('添加成功！');
					} else {
						$this->error('添加失败请重新尝试！');
					}					
					/* 计算总用车天数 = 借车日期 - 还车日期 */
				//	$count_days = format_sex_day($start,$over);
						
					/* 起租天数，满6小时为1天，不满6小时也为1天。 */
				//	$count_days < 1 ? $length = 1 : $length = $count_days;
					
					exit;
				}
				
				break;
			default:
				$this->error('非法操作！');	
		}
		
		//获取会员数据
		$member_base_list = $MemberBase->get_spe_data(array('status'=>0),'id,name');
		
		//获取车辆数据
		$cars_list = $Cars->get_spe_data(array('status'=>0),'id,brand,car_num');
		
		//获取司机数据
		$driver_list = $StaffBase->get_spe_data(array('occupation_id'=>$this->occupation_driver_id),'id,name');
		
		$html['member_base_list'] = $member_base_list;
		$html['cars_list'] = $cars_list;
		$html['driver_list'] = $driver_list;
		$this->assign('html',$html);
		$this->assign('ACTION_NAME','添加会员用车记录');
		$this->assign('TITILE_NAME','补订单');
		$this->display();
	}
	
	
}


?>