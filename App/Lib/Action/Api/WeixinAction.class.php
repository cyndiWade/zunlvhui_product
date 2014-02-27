<?php 
ini_set('display_errors',1);
//echo __FILE__;
class WeixinAction extends AppBaseAction{
	
  //初始化数据库连接
	 protected  $db = array(
		'Hotel'=>'Hotel',
	    'HotelRoom' =>'HotelRoom',
	    'RoomSchedule'=>'RoomSchedule',
        'HotelOrder'  =>'HotelOrder',
	    'UsersHotel'   => 'UsersHotel',
	    'OrderState'   => 'OrderState',
		
	 );

	   public function index(){
	      $OrderState = $this->db['OrderState'];
	      $OrderState->del_data();
		  $this->responseMsg();
	   }
/*
*==========================================================
* 响应类型
*==========================================================
*/  
	public function responseMsg()
	{
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
		if (!empty($postStr)){
			$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
			$RX_TYPE = trim($postObj->MsgType);

			switch ($RX_TYPE)
			{
				case "text":
				case "voice":
				    $OrderState = $this->db['OrderState'];
					$step = $OrderState->get_step('o_vzytyfkGq8jriMsxpj5rJyvqXs');
				    $resultStr = $this->step($postObj,$step);
					break;
				case "image":
					$resultStr = $this->receiveText($postObj);
					break;
				case "location":
					$resultStr = $this->receiveText($postObj);
					break;
				case "video":
					$resultStr = $this->receiveText($postObj);
					break;
				case "link":
					$resultStr = $this->receiveText($postObj);
					break;
				case "event":
					$resultStr = $this->receiveEvent($postObj);
					break;
				default:
					$resultStr = "unknow msg type: ".$RX_TYPE;
					break;
			}
			echo $resultStr;
		}else {
			echo "";
			exit;
		}
	}
/*
*==========================================================
* 响应类型
*==========================================================
*/

/*
*==========================================================
* 处理事件的方法  
*==========================================================
*/ 
	private function receiveEvent($object)
	{
			$contentStr = "";
			switch ($object->Event)
			{
				case "subscribe":
					$contentStr = "欢迎关注尊旅会公众号";
					break;
				case "unsubscribe":
					$contentStr = "";
					break;
				case "CLICK":
					switch ($object->EventKey)
					{
						case 'menu_1_1':
							//特惠商品
							break;
						case 'menu_1_2':
							//特惠商品
							break;
						case 'menu_1_3':
							//特惠商品
							break;
						case 'menu_1_4':
							//特惠商品
							break;
						default:
							$contentStr = "你点击了菜单: ".$object->EventKey;
							break;
					}
					break;
				default:
					$contentStr = "receive a new event: ".$object->Event;
					break;
			}
			$resultStr = $this->transmitText($object, $contentStr);
			return $resultStr;
	}
/*
*==========================================================
* 处理事件的方法  
*==========================================================
*/ 


/*
*===========================================================
* 文本的xml
*文本消息的处理xml transmitText($object, $content, $flag = 0)
*图文消息处理xml   transmitNews($object, $arr_item, $flag = 0)
*音乐处理xml       transmitMusic($object, $musicArray, $flag = 0)
*===========================================================
*/
	//文本消息的处理xml
	private function transmitText($object, $content, $flag = 0)
	{
			$textTpl = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[text]]></MsgType>
			<Content><![CDATA[%s]]></Content>
			<FuncFlag>%s</FuncFlag>
			</xml>";
			$resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
			return $resultStr;
	}
	//图文消息处理xml
	private function transmitNews($object, $arr_item, $flag = 0)
	{
			if(!is_array($arr_item))
				return;

			$itemTpl = "<item>
			<Title><![CDATA[%s]]></Title>
			<Description><![CDATA[%s]]></Description>
			<PicUrl><![CDATA[%s]]></PicUrl>
			<Url><![CDATA[%s]]></Url>
			</item>";
			$item_str = "";
			foreach ($arr_item as $item)
				$item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['Picurl'], $item['Url'].'/user_code/'.$object->FromUserName);

			$newsTpl = "<xml>
			<ToUserName><![CDATA[%s]]></ToUserName>
			<FromUserName><![CDATA[%s]]></FromUserName>
			<CreateTime>%s</CreateTime>
			<MsgType><![CDATA[news]]></MsgType>
			<Content><![CDATA[]]></Content>
			<ArticleCount>%s</ArticleCount>
			<Articles>
			$item_str</Articles>
			<FuncFlag>%s</FuncFlag>
			</xml>";

			$resultStr = sprintf($newsTpl, $object->FromUserName, $object->ToUserName, time(), count($arr_item), $flag);
			return $resultStr;
	}

/*
*===========================================================
* 文本的xml
*===========================================================
*/






// 文本消息
private function receiveText($object)
{
        $funcFlag = 0;
        $contentStr = "你发送的是文本，内容为：".$object->Content;
        $resultStr = $this->transmitText($object, $contentStr, $funcFlag);
        return $resultStr;
}

   //判断流程

   public function step($postObj,$step){
        
		 $OrderState = $this->db['OrderState'];
         $Hotel = $this->db['Hotel'];
		 $HotelRoom = $this->db['HotelRoom'];
		 $text = $postObj->Content;
		 $user_code = $postObj->FromUserName;
		 if(empty($text)){
		   $text = $postObj->Recognition ;
		 }
		 $T= 60*30;
         switch($step){
		 
		     case 0 :
				 //城市名
				    $data = array('user_code'=>"$user_code",'hotel_add'=>"$text",'step'=>$step+1,'starttime'=>time(),'endtime'=>time()+$T);
					$arr_item = $Hotel->get_all_hotel("$text");					
					$resultStr = $this->transmitNews($postObj, $arr_item, $flag = 0);
				 break;
			 case 1 :	
				 //该城市下的酒店
				 $arr_item = $Hotel->get_Hotel("$text");
				 $data = array('step'=>$step+1,'hotel_name'=>$arr_item['hotel_name'],'hotel_id'=>$arr_item['hotel_id'],'starttime'=>time(),'endtime'=>time()+$T);
				 $resultStr = $this->transmitNews($postObj, $arr_item['list'], $flag = 0);
				 break;
			 case 2 :
				 //选择房型
			     $PAY_TYPE = C('PAY_TYPE');
                 $hotel_id = $OrderState->get_hotel_id($user_code);
                 $arr_item = $HotelRoom->get_room_type("$text",$hotel_id,$pay_type=2);
				 $data = array('step'=>$step+1,'room_id'=>$arr_item['room_id'],'room_name'=>$arr_item['title'],'room_price'=>$arr_item['price'],'pay_type'=>$arr_item['pay_type'],'starttime'=>time(),'endtime'=>time()+$T);
				 $contentStr = '您选了：'.$arr_item['title']." 房型 \n".'价格为 ：'.$arr_item['price'] .'￥ '."\n".'付款方式为 : '.$PAY_TYPE[$arr_item['pay_type']]['explain'];
				 $resultStr = $this->transmitText($postObj, $contentStr, $funcFlag);
				 break;
			 case 3 :
				 // 入住时间

				 break;
			 case 5 :
				 // 离店时间

				 break;
		     case 4 :
				 // 确认订单
				 break;
			 default :
				 break;
		 
		 }
		 if($step == 0){
              $OrderState->add_step($data);
			
		 }else{
		      $OrderState->where(array('user_code'=>"$user_code"))->save($data);
			 
		 }
         

		 return $resultStr;
   
   
   
   
   }
   
   public function test(){
   
          $OrderState = $this->db['OrderState'];
		  $Hotel = $this->db['Hotel'];
		  $HotelRoom = $this->db['HotelRoom'];
          //$data = $Hotel->get_Hotel();
		  $data = $HotelRoom->get_room_type('高级',291,2);
		  $OrderState->del_data();
		  echo $OrderState->get_hotel_id('o_vzytyfkGq8jriMsxpj5rJyvqXs');
		  echo $Hotel->getLastSql();
		  echo '<pre>';print_R($data);echo '</pre>';
		  echo $OrderState->get_step('o_vzytyfkGq8jriMsxpj5rJyvqXs');
       
   
   }

}


?>