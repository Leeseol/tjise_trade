<?php
// 删除页面
$ordersid=$_GET['ordersid'];
//连接数据库
include 'conn.php';
$sql="delete from orders where orders_id=".$ordersid;
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/orderslist.html");
exit();
}else{
    echo "删除失败！";
}
?>
