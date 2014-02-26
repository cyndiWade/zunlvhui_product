<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
ini_set('display_errors',1);
class WeixinAction extends Action{

	public function index(){
		/* 加载微信SDK */
		
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
				case "text" :
				case "voice":
					//$resultStr = $this->receiveText($postObj);
				//$item['Title'], $item['Description'], $item['Picurl'], $item['Url']
					$arr_item = array(array(
						'Title'=>'22222',
						'Description'=>'1222',
						'Picurl' =>'',
						'Url'    =>'http://baidu.com',
						)
						);
						
					$resultStr = $this->transmitNews($postObj, $arr_item, $flag = 0);
					$contentStr = 'dddd';
					//$resultStr = $this->transmitText($postObj,$contentStr, $flag = 0);
					break;

			    case "event":
					$resultStr = $this->receiveEvent($postObj);
					break;


				case "video":
					$contentStr = 'dddd';
					$resultStr = $this->transmitText($postObj,$contentStr, $flag = 0);
					break;
				case "link":
					$contentStr = 'dddd';
					$resultStr = $this->transmitText($postObj,$contentStr, $flag = 0);
					break;
				
				case "image":
					$contentStr = 'dddd';
					$resultStr = $this->transmitText($postObj,$contentStr, $flag = 0);
					break;
				case "location":
					$contentStr = 'dddd';
					$resultStr = $this->transmitText($postObj,$contentStr, $flag = 0);
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
*文本消息的处理xml transmitText($object, $content, $flag = 0)
*图文消息处理xml   transmitNews($object, $arr_item, $flag = 0)
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
			<FuncFlag>%d</FuncFlag>
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
				$item_str .= sprintf($itemTpl, $item['Title'], $item['Description'], $item['Picurl'], $item['Url']);

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



}
