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
	   
	  $where = array('is_del'=>0);
	  array_add_to($where,$condition);
	  $data = $this->where($where)->field($field)->order('sort asc')->limit(9)->select();
	  $arr = array();
	  $i = 1 ;
	  $domain = C('PUBLIC_VISIT');
	  foreach($data as $key=>$val){
	  	if($val['type'] == 2)$h = passport_encrypt($val['url'],'hotel');
	  	$Url = $val['type'] == 2 ? C('Sphotel_more').urlencode($h).'/hotel_type/'.$condition['use_state'] : C('Sphotel_info_url').$val['url'] ;
		$image = $i==1 ? $val['pic_url'] : $val['pic_url_xiao'];
	  	if($i>10)break;
		$arr[$i] = array(
				'Title'=>$val['title'],
				'Description'=>$val['description'],
				'Picurl' =>$domain['domain'].'zunlvhui/'.$image,//C('logo_url'),
				'Url'    =>$Url,
			);			    
		$i++;
	   }
	   tolog('/data/www/zunlvhui/App/Lib/Action/Api/a.txt',print_r($arr));
	  return $arr;
	 
	 // return $data;
	
	}
    


}