<?php
// 删除页面
$uid=$_GET['uid'];
//连接数据库
include 'conn.php';
$sql="delete from users where users_id=".$uid;
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/userslist.html");
exit();
}else{
    echo "删除失败！";
}
?>
