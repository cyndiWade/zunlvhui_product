<?php
class HotelModel extends ApiBaseModel{



      public function get_all_hotel($hotel_cs){

	        if(empty($hotel_cs))$hotel_cs ='青岛';
			$h = passport_encrypt($hotel_cs,'hotel');
			$data = $this->field('h.id,h.hotel_name , h.hotel_syq, h.hotel_pf ,rs.spot_payment,rs.prepay')
			->table($this->prefix.'hotel AS h')
			->join($this->prefix.'hotel_room AS hr ON h.id=hr.hotel_id')
			->join($this->prefix.'room_schedule AS rs on rs.hotel_room_id = hr.id')
			->where(array('hotel_cs'=>$hotel_cs,'h.is_del'=>0,'rs.day'=>strtotime( date('Y-m-d',time())) )  )
			->order('h.sort DESC')
			->select();
			$arr = array();
            $arr[0] = array(
						'Title'=>'酒店地图',
						'Description'=>'',
						'Picurl' =>$this->get_map("$hotel_cs"),//C('logo_url'),
						'Url'    =>C('HOTEL_MAP').urlencode($h),
						);
			$i = 1 ;
			foreach($data as $key=>$val){
			    if($i>8)break;
			    $arr[$i] = array(
						'Title'=>$val['hotel_name']."\n". $val['hotel_syq']."\n".$val['hotel_pf'].'分 预付 ￥'.$val['spot_payment'].' 现付 ￥'.$val['prepay'],
						'Description'=>'',
						'Picurl' =>$this->get_img($val['id'],4),//C('logo_url'),
						'Url'    =>C('Hotel_info_url').$val['id'],
						);
			    
			  $i++;
			}
			$arr[10] = array(
						'Title'=>'更多酒店',
						'Description'=>'',
						'Picurl' =>C('logo_url'),
						'Url'    =>C('Hotel_more').urlencode($h),
						);
			
           
			return $arr;
	  
	  }
	  
	  
	  //根据客人说的酒店名
	  
	  public function get_Hotel($hotel_name){
	  
	  	    if(empty($hotel_name))$hotel_name ='上海中环';
			$data = $this->field('h.id,h.hotel_name , hr.title, h.hotel_pf ,rs.spot_payment,rs.prepay')
			->table($this->prefix.'hotel AS h')
			->join($this->prefix.'hotel_room AS hr ON h.id=hr.hotel_id')
			->join($this->prefix.'room_schedule AS rs on rs.hotel_room_id = hr.id')
			->where(array('hotel_name'=>array('like',"%$hotel_name%"),'h.is_del'=>0,'rs.day'=>strtotime( date('Y-m-d',time())) )  )
			->select();
			$arr = array();
			$i = 1 ;
			foreach($data as $key=>$val){
			    if($i>10)break;
			    $arr[] = array(
						'Title'=>$val['hotel_name']."\n". $val['title']."\n".$val['hotel_pf'].'分 预付 ￥'.$val['spot_payment'].' 现付 ￥'.$val['prepay'],
						'Description'=>'',
						'Picurl' =>$this->get_room_img($val['id'],2),//C('logo_url'),
						'Url'    =>C('Hotel_info_url').$val['id'],
						);
			   $hotel_id =$val['id'];
			   $hotel_name = $val['hotel_name'];
			    
			  $i++;
			}
			$result['list']       = $arr;
			$result['hotel_id']   = $hotel_id; 
			$result['hotel_name'] = $hotel_name;
			return $result; 
	  
	  
	  }

      //获取酒店的图片
	  public function get_img($hotel_id,$type){
	  
	        

			 $data = $this->table($this->prefix.'hotel AS h')
			->join($this->prefix.'hotel_img AS hr ON h.id=hr.hotel_id')
			->where( array('hr.hotel_id'=>$hotel_id,'hr.is_del'=>0,'hr.type'=>$type) )
			->getField('url');

			 return C('PUBLIC_VISIT.domain').C('UPLOAD_DIR.image').$data;
	  
	  
	  }
	  //获得房型图片
	  public function get_room_img($room_id,$type=1){
	  	$where = array(
	  			'i.is_del'=>0,
	  			'i.hotel_room_id' =>$room_id,
	  			'i.type'  =>$type
	  	);
	  	$data = $this->table($this->prefix.'room_img as i')
	  	->where($where)->getField('url');
	  	$img = empty($data) ? C('NO_PIC') : $data;
	  	return C('PUBLIC_VISIT.domain').C('UPLOAD_DIR.image').$img;
	  
	  }

	  public function get_map($hotel_cs){
	  
	  
	  $citymap =array('三亚'=>'0.png','上海'=>'1.png','上饶'=>'2.png','东莞'=>'3.png','中山'=>'4.png','丰城'=>'5.png','丽江'=>'6.png','义乌'=>'7.png','乌市'=>'8.png','乌鲁木齐'=>'9.png','乐山'=>'10.png','佛山'=>'11.png','保定'=>'12.png','克拉玛依'=>'13.png','包头'=>'14.png','北京'=>'15.png','十堰'=>'16.png','南京'=>'17.png','南充'=>'18.png','南宁'=>'19.png','南通'=>'20.png','厦门'=>'21.png','合肥'=>'22.png','吉首'=>'23.png','呼伦贝尔'=>'24.png','呼和浩特'=>'25.png','哈尔滨'=>'26.png','商丘'=>'27.png','喀什'=>'28.png','增城'=>'29.png','大同'=>'30.png','大连'=>'31.png','天津'=>'32.png','太原'=>'33.png','威海'=>'34.png','宁波'=>'35.png','安阳'=>'36.png','宜昌'=>'37.png','宝鸡'=>'38.png','常州'=>'39.png','常德'=>'40.png','常熟'=>'41.png','广州'=>'42.png','库尔勒'=>'43.png','延吉'=>'44.png','开封'=>'45.png','徐州'=>'46.png','德州'=>'47.png','忻州'=>'48.png','惠州'=>'49.png','成都'=>'50.png','扬州'=>'51.png','招远'=>'52.png','新乡'=>'53.png','无锡'=>'54.png','昆明'=>'55.png','景德镇'=>'56.png','曲阜'=>'57.png','杭州'=>'58.png','柳州'=>'59.png','桂林'=>'60.png','武汉'=>'61.png','江门'=>'62.png','江阴'=>'63.png','沈阳'=>'64.png','河源'=>'65.png','泰安'=>'66.png','洛阳'=>'67.png','济南'=>'68.png','济宁'=>'69.png','海口'=>'70.png','淄博'=>'71.png','深圳'=>'72.png','湘潭'=>'73.png','湘西土家族苗族自治州'=>'74.png','潍坊'=>'75.png','烟台'=>'76.png','焦作'=>'77.png','珠海'=>'78.png','眉山'=>'79.png','石家庄'=>'80.png','福州'=>'81.png','秦皇岛'=>'82.png','红河州'=>'83.png','绍兴'=>'84.png','绵阳'=>'85.png','自贡'=>'86.png','苏州'=>'87.png','襄阳'=>'88.png','西宁'=>'89.png','西安'=>'90.png','西昌'=>'91.png','贵港'=>'92.png','贵阳'=>'93.png','运城'=>'94.png','连云港'=>'95.png','遂宁'=>'96.png','遵义'=>'97.png','邢台'=>'98.png','邯郸'=>'99.png','邹城'=>'100.png','郑州'=>'101.png','郴州'=>'102.png','酒泉'=>'103.png','酒泉敦煌'=>'104.png','重庆'=>'105.png','金华'=>'106.png','铁岭'=>'107.png','长春'=>'108.png','长沙'=>'109.png','长治'=>'110.png','青岛'=>'111.png','韶关'=>'112.png','香港'=>'113.png','高雄'=>'114.png','鹤壁'=>'115.png','鹤山'=>'116.png','黄山'=>'117.png');

	  return C('HOTEL_MAP_IMG').$citymap[$hotel_cs];
	  
	  
	  }


	  //获得每日特惠的酒店的id
	  public function get_id(){
	  
	  
	      $data = $this->field('hotel_id')->table($this->prefix.'hotel_preference ')->where(  array('is_del'=>0,'time'=>strtotime( date('Y-m-d',time())) )   )->select();

		  foreach($data as $key=>$val){

			   $arr[] = $val['hotel_id'];

		  }
		  return $arr;
	   
	  
	  }

    //获得每日优惠的酒店
	  public function get_hotel_p(){

	        $hotel_ids = $this->get_id();
		
			$data = $this->field('h.id,h.hotel_name , h.hotel_syq, h.hotel_pf ,rs.spot_payment,rs.prepay')
			->table($this->prefix.'hotel AS h')
			->join($this->prefix.'hotel_room AS hr ON h.id=hr.hotel_id')
			->join($this->prefix.'room_schedule AS rs on rs.hotel_room_id = hr.id')
			->where(array('h.id'=>array('in',$hotel_ids),'h.is_del'=>0,'rs.day'=>strtotime( date('Y-m-d',time())) )  )
			->select();
			$arr = array();
			$i = 1 ;
			foreach($data as $key=>$val){
			    if($i>8)break;
			    $arr[$i] = array(
						'Title'=>$val['hotel_name']."\n". $val['hotel_syq']."\n".$val['hotel_pf'].'分 预付 ￥'.$val['spot_payment'].' 现付 ￥'.$val['prepay'],
						'Description'=>'',
						'Picurl' =>$this->get_img($val['id'],4),//C('logo_url'),
						'Url'    =>C('Hotel_info_url').$val['id'],
						);
			    
			  $i++;
			}
			      
			return $arr;
	  
	  }

      


}