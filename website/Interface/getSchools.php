<?php
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:GET');
error_reporting(0);
$db=new mysqli("127.0.0.1","root","sjtuigem2016","IGEM");

if($db->connect_error) {
		echo "连接失败".$db->connect_error;
} else {
		// echo "连接成功";
}

$sql="select * from Schools";
if (!$result=$db->query($sql))
{
    die("There was an error running the query [".$db->error."]");
}
$teamIndex=0;
$arr = array();
$str = "[";
while ($row=$result->fetch_assoc()) {
    $teamIndex=$teamIndex+1;
	$oneJsonData = json_encode($row);
    if(!$oneJsonData){
        continue;
    }
	array_push($arr , $oneJsonData);
	$str = $str.$oneJsonData.",";
}

$sss = substr($str , 0 , -1);
echo $sss."]";
?>
