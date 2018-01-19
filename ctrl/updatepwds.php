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
$nowpwd=$_POST["password"];
$newpwds=$_POST["password1"];
//连接数据库
include 'conn.php';
$sql="update users set users_pwd='".$newpwds."' where users_id=".$uid;
$r=$conn->query($sql);
if($r){
$_SESSION['uname']=$realname;
header("Refresh:1;url=http://10.96.129.26/tjise_trade/huiyuan4.php");

}else{
    echo "修改失败！";
}
?>
</body>
</html>

