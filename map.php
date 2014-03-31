<?php
header('Content-Type:text/html;charset=utf-8');
define('ROOT_PATH',str_replace('\\','/',str_replace('test.php','',__FILE__)));
include 'mysql.class.php';
global $db;

//$data = $db->getAll("SELECT id,hotel_cs,hotel_location_x,hotel_location_y FROM `app_hotel` WHERE 1  group by hotel_cs");
$sqlc =  "SELECT hotel_cs FROM `app_hotel` WHERE 1 and is_del =0  group by hotel_cs";

$queryc = $db->query($sqlc);

$a = 0;
while($row = $db->fetchRow($queryc)){
    $city =  $row['hotel_cs'];
	$sql = "select id,hotel_location_x,hotel_location_y from app_hotel where hotel_cs = '$city' and is_del = 0 limit 0, 15 ";
	//echo $sql.'</br>';
	$result = $db->getAll($sql);
	$num = count($result);
	$query = $db->query($sql);
	$mar = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k');
	$i=0;
	while($row = $db->fetchRow($query)){
		$m = $num-1 > $i ?  '|' : '';
		$arr = array(
		  'markers'=>$row['hotel_location_x'].','.$row['hotel_location_y'],
		  'markerStyle'=>'l,'.$mar[$i],
		  'm' => $m,
		);
		$result[$i] = $arr;
		$id[$a][$i] = $row['id'];
		unset($arr);
		$i++;
		//echo '<pre>';print_R($row);echo'</pre>';
	}
	
	$mar = '';
	$mars = '';
	foreach($result as $key=>$val){
	   $mar  .= $val['markers'].$val['m'];
	   $mars .= $val['markerStyle'].$val['m'];
	   
	}

	$url = 'http://api.map.baidu.com/staticimage?width=360&height=200'."&center=".$result[0]['markers'].'&zoom=11&markers='.$mar.'&markerStyles='.$mars;
    //echo $url.'</br>';
	/* foreach($id[$a] as $key=>$v){
		if(file_exists(ROOT_PATH.'mapimg/'.$v.'.png')){
			
			@unlink(ROOT_PATH.'mapimg/'.$v.'.png');
			Dowload_code2($url,ROOT_PATH.'mapimg/'.$v.'.png').'</br>';
		}
		
	} */
    
  
   unset($id);
   $a++;

}

//echo Dowload_code2($url,'shanghai.png');

function Dowload_code2($url,$filename=""){
		ob_start();
		readfile($url);
		$img = ob_get_contents();
		ob_end_clean();
		$size = strlen($img);
		$fp2 = fopen($filename , "a");
		fwrite($fp2, $img);
		fclose($fp2);
		return $filename;
}


