<?php
//添加页面
$scid=$_POST["scid"];
$scname=$_POST["scname"];
$smalltypeInfo=$_POST["smalltypeInfo"];
$bcid=$_POST["bcname"];
//连接数据库
include 'conn.php';
$sql="INSERT INTO smalltype(smalltype_name, smalltype_info,bigtype_id) VALUES ('".$scname."','".$smalltypeInfo."',".$bcid.")";
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/protypelistsmall.html");
exit();
}
    
?>

