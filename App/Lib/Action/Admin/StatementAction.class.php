<?php
/**
 * 报表功能
 */
class StatementAction extends AdminBaseAction {
    
	private $MODULE = '报表管理';
	
	//初始化数据库连接
	protected  $db = array(
		'WxUser' 		=> 'WxUser',
	    'HotelOrder'	=> 'HotelOrder'

	);
	
	/**
	 * 构造方法
	 */
	public function __construct() {
		parent::__construct();
		
		$this->assign('MODULE_NAME',$this->MODULE);
		
	}
	
	/**
	 * 生成报表
	 * @param String $name			//文件名
	 * @param String $content		//内容
	 */
	private function set_excel($name,$content) {
		
		header('Content-Type:text/html;charset=utf-8');
		header("Content-Type: application/force-download");
		header("Content-Type: text/csv");					//CSV文件
		header("Content-Disposition: attachment; filename=$name.csv");					//强制跳出下载对话框
		header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
		header('Expires:0');
		header('Pragma:public');

		$content = (iconv( "UTF-8","gbk",$content)).',';
		echo $content;
		exit;
	}
	
 
    //后台客户数据报表
   public function down_all_wxuser() {
  	 	header('Content-Type:text/html;charset=utf-8');
   		$WxUser = $this->db['WxUser'];
   		
  	 	$wx_user_list = $WxUser->admin_get_wx_user();

		//不需要的字段
  	    $not_field = array('uid','nickname','sex','city','country','province','language','headimgurl','localimgurl','coupon','user_id','hotel_id','is_from','code_id','wxid');
		 
	   	//报列标题
	   	$title .= '是否关注,关注时间,姓名,手机号,酒店名称,酒店备注,二维码备注'."\n";

		if (!empty($wx_user_list)) {
			
			foreach ($wx_user_list as $key=>$val) {

				foreach ($wx_user_list[$key] as $k=>$v) {
					if (in_array($k,$not_field)) continue;
					//$str .= (iconv( "UTF-8","gbk",$val['oid'])).',';
					if($k=='subscribe') $v = $v==1 ? '已关注' : '已取消关注';
					if($k=='subscribe_time') $v = date('Y-m-d H:i:s',$v);
					$str .= $v.',';
				}
				$str .= "\n";
			}		
		}

		$this->set_excel('会员报表',$title.$str);
   }	
}