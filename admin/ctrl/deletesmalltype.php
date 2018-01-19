<?php
// 删除页面
$scid=$_GET['scid'];
//连接数据库
include 'conn.php';
$sql="delete from smalltype where smalltype_id=".$scid;
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/protypelistsmall.html");
exit();
}else{
    echo "删除失败！这个小类在产品表里有外键关系！";
}
?>
