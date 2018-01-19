<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>管理员列表</title>
</head>
<body>
<?php
$adid=$_POST["adid"];
$adname=$_POST["adname"];
$adpwd=$_POST["adpwd"];
//连接数据库
include 'conn.php';
$sql="INSERT INTO admin(admin_name, admin_pwd) VALUES ('".$adname."','".$adpwd."')";
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/adminlist.html");
exit(); 
}else{
    echo "添加失败！";
}
?>
</body>
</html>

