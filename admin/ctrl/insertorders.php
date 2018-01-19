<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>订单列表</title>
</head>
<body>
<?php
$ordersid=$_POST["ordersid"];
$ordersstate=$_POST["ordersstate"];
$ordersdata=$_POST["ordersdata"];
$paystate=$_POST["paystate"];
$uname=$_POST["uname"];
$goodsname=$_POST["goodsname"];
//连接数据库
include 'conn.php';
$sql="INSERT INTO orders(orders_state,orders_data,pay_state,users_id,goods_id) VALUES ('".$ordersstate."','".$ordersdata."','".$paystate."',".$uname.",".$goodsname.")";
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/orderslist.html");
exit();
}else{
    echo "修改失败！";
}
?>
</body>
</html>

