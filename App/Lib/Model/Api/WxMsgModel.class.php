<?php
class WxMsgModel extends ApiBaseModel{
    //消息优惠类型
	private $msg_use_state = array(
		4=> array(
			'num'=>4,
			'explain'=>'不使用'
		),
		1=> array(
			'num'=>1,
			'explain'=>'特价酒店'
		),
		2=> array(
			'num'=>2,
			'explain'=>'预定送免房'
		),
		3=> array(
			'num'=>3,
			'explain'=>'订房返红包'
		),
	
	);

	//消息类别
	private $msg_type = array(
		1=> array(
			'num'=>1,
			'explain'=>'酒店'
		),
		2=> array(
			'num'=>2,
			'explain'=>'城市'
		)
	);

	//获得推送的信息

	public function getMsg($condition,$field = '*'){
	  $domain = C('PUBLIC_VISIT.domain'); 
	  $where = array('is_del'=>0);
	  array_add_to($where,$condition);
	  $data = $this->table($this->prefix.'wx_msg')
			->field('*')
			->where($where)
			->order('sort ASC')
			->limit(9)
			->select();

	  //$data = $this->where($where)->order('sort  ASC ')->limit(9)->select();
	  $i = 1 ;
      $datas = array();
	  foreach($data as $key=>$val){
	  	  if($i>10)break;
	      if($val['type'] == 2){
	      	$url = passport_encrypt($val['url'],'hotel');
	      	//$url = urlencode($h);
	      }
	      $Url = $val['type'] == 2 ? C('Sphotel_more').$url.'/hotel_type/'.$condition['use_state'] : C('Sphotel_info_url').$val['url'] ;
		  $image = $i==1 ? $val['pic_url'] : $val['pic_url_xiao'];
	      $datas[$key]['Title']       = $val['title'];
          $datas[$key]['Description'] = $val['description'];
          $datas[$key]['Picurl']      = $domain.'zunlvhui/'.$image;
          $datas[$key]['Url']         = $Url;
	  }
	   $arr = array();
       $arr[0] = array(
						'Title'=>'酒店地图',
						'Description'=>'',
						'Picurl' =>$this->get_map("$hotel_cs"),//C('logo_url'),
						'Url'    =>C('HOTEL_MAP').urlencode($h),
						);
	  $i = 1 ;
	  foreach($datas as $key=>$val){
			    if($i>8)break;
			    
			    $arr[$i] = array(
						'Title'=>$val['Title'],
				        'Description'=>$val['Description'],
				        'Picurl' =>$val['Picurl'],
						'Url'    =>$val['Url']
						);
			    
			  $i++;
	  }
/*	  $arr = array();
	  $i = 1 ;
	  foreach($data as $key=>$val){
	  	if($i>10)break;
		$arr[] = array(
				'Title'=>$val['Title'],
				'Description'=>'',//$val['Description'],
				'Picurl' =>$val['Picurl'],
				'Url'    =>$val['Url']
			);			    
		$i++;
	   }*/
	   //echo '<pre>';print_R($datas);echo'</pre>a';
	  return  $arr;
	 
	 // return $data;
	
	}
    


}