<?php 
ini_set('display_errors',1);
echo __FILE__;
class WeixinAction extends AppBaseAction{
	
  //初始化数据库连接
	 protected  $db = array(
		'Hotel'=>'Hotel',
	    'HotelRoom' =>'HotelRoom',
	    'RoomSchedule'=>'RoomSchedule',
        'HotelOrder'  =>'HotelOrder',
	    'UsersHotel'   => 'UsersHotel',
	    'OrderState'   => 'OrderState'
	 );

	   public function index(){
	   
	   
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
					//tolog('/web/www/ftp/tjr/zun/App/Lib/Action/Api/a.txt',$step);
				    //$resultStr = $this->step($postObj,$step);
					$resultStr = $this->receiveText($postObj);
					//$resultStr = $this->receiveText($postObj);
				    tolog('/web/www/ftp/tjr/zun/App/Lib/Action/Api/a.txt',$resultStr);
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
		 $text = empty($postObj->Content) ? $postObj->Recognition  : $postObj->Content;
         switch($step){
		 
		     case 0 :
				    
					$arr_item = $Hotel->get_all_hotel();					
					$resultStr = $this->transmitNews($postObj, $arr_item, $flag = 0);
				 break;
			 case 1 :
				 break;
			 case 2 :
				 break;
			 case 3 :
				 break;
			 case 4 :
				 break;
			 default :
				 break;
		 
		 }
		 return $resultStr;
   
   
   
   
   }

   public function test(){
   
          $OrderState = $this->db['OrderState'];

		  echo $OrderState->get_step('o_vzytyfkGq8jriMsxpj5rJyvqXs');
       
   
   }

}


?>