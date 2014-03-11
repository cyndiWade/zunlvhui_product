<?php
class HotelOrderModel extends ApiBaseModel{


       public function get_order($user_code){
	   
	     $data = $this->field('o.*,o.id as oid ,h.*,hr.*')
			->table($this->prefix.'hotel_order AS o')
			->join($this->prefix.'hotel_room AS hr ON o.hotel_room_id=hr.id')
			->join($this->prefix.'hotel AS h on h.id = o.hotel_id')
			->where(array('user_code'=>"$user_code",'o.is_del'=>0,'o.order_status'=>array('neq',3))  )
			->select();
		    $arr = array();
	        $i = 1 ;
			foreach($data as $key=>$val){
			    if($i>10)break;
			    $arr[$i] = array(
						'Title'=>'订单号：'.$val['order_sn']."\n".

					  "---------------------------------\n".
				      '入住时间: '.date('Y-m-d',$val['in_date'])."\n".

					  "---------------------------------\n".
					  '离店时间: '.date('Y-m-d',$val['out_date'])."\n".

					  /*"----------------------------------------------\n".
					  '离店时间: '.$val['checkoutday']."\n".*/

					  "---------------------------------\n".
					  '酒店名字: '.$val['hotel_name']."\n".

					  "---------------------------------\n".
					  '酒店房型: '.$val['title']."\n".

					  "---------------------------------\n".

                          '订单金额: ￥'.$val['total_price']."\n".

					  "---------------------------------\n".

                          '下单日期： '.date('Y-m-d',$val['order_time'])."\n".

				      "---------------------------------\n\n\n",
						'Description'=>'',
						'Picurl' =>'',//C('logo_url'),
						'Url'    =>C('ORDER_INFO').$val['oid'],
						);
			    
			  $i++;
			}
	     return $arr;
	   }

}