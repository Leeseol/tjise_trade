<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>普通用户列表</title>
</head>
<body>
<?php
session_start();
$uid=$_POST["uid"];
echo $uid;
$realname=$_POST["realname"];
$upwd=$_POST["pwd"];
$mobile=$_POST["mobile"];
$umail=$_POST["email"];
$addid=$_POST["addname"];
//连接数据库
include 'conn.php';
$sql="update users set users_name='".$realname."',users_pwd='".$upwd."',users_phone='".$mobile."',users_mail='".$umail."',address_id='".$addid."' where users_id=".$uid;
$r=$conn->query($sql);
if($r){
	$_SESSION['uname']=$realname;
header("Refresh:1;url=http://10.96.129.26:80/tjise_trade/huiyuan4.php");

}else{
    echo "修改失败！";
}
?>
</body>
</html>

