<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>普通用户列表</title>
</head>
<body>
<?php
move_uploaded_file($_FILES['uphoto']['tmp_name'],'../img/'.$_FILES['uphoto']['name']);
// 修改页面
$uid=$_POST["uid"];
$uname=$_POST["uname"];
$upwd=$_POST["upwd"];
$uphone=$_POST["uphone"];
$umail=$_POST["umail"];
$uphoto='img/'.$_FILES['uphoto']['name'];
$addid=$_POST["addname"];
//连接数据库
include 'conn.php';
$sql="update users set users_name='".$uname."',users_pwd='".$upwd."',users_phone='".$uphone."',users_mail='".$umail."',users_photo='".$uphoto."',address_id='".$addid."' where users_id=".$uid;
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/userslist.html");
exit();
}else{
    echo "修改失败！";
}
?>
</body>
</html>

