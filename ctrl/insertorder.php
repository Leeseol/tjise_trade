<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
session_start();
$uid=$_SESSION['uid'];
$goodsid=$_GET['goodsid'];
include 'conn.php';
$sql="INSERT INTO orders(orders_state,orders_data,users_id,goods_id) VALUES ('未发货','".date("Y-m-d")."',".$uid.",".$goodsid.")";
$r=$conn->query($sql);
if($r){
Header("Location: http://10.96.129.26:80/tjise_trade/jiesuan.php");

exit();
}else{
echo "添加失败！";
}
?>
</body>
</html>

