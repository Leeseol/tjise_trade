<?php
// 删除页面
$goodsid=$_GET['goodsid'];
//连接数据库
include 'conn.php';
$sql="delete from goods where goods_id=".$goodsid;
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/goodslist.html");
exit();
}else{
    echo "删除失败！";
}
?>
