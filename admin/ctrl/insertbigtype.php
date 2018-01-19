<?php
//添加页面
$bcid=$_POST["bcid"];
$bcname=$_POST["bcname"];
$bigtypeInfo=$_POST["bigtypeInfo"];
//连接数据库
include 'conn.php';
$sql="INSERT INTO bigtype(bigtype_name, bigtype_info) VALUES ('".$bcname."','".$bigtypeInfo."')";
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/protypelistbig.html");
exit();
}
    
?>

