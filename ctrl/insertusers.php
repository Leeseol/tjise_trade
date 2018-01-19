<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
$usersphone=$_POST["mobile"];
$usersname=$_POST["realname"];
$userspwd=$_POST["password"];
//连接数据库
include 'conn.php';
$sql="INSERT INTO users(users_name,users_pwd,users_phone) VALUES ('".$usersname."','".$userspwd."','".$usersphone."')";
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/index.php");
exit();
}else{
echo "添加失败！";
}
?>
</body>
</html>

