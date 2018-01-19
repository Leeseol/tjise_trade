<?php
// 删除页面
$adid=$_GET['adid'];
//连接数据库
include 'conn.php';
$sql="delete from address where address_id=".$adid;
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/addresslist.html");
exit();
}else{
    echo "删除失败!";
}
?>
