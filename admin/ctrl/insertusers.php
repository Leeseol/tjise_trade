<?php
move_uploaded_file($_FILES['uphoto']['tmp_name'],'../img/'.$_FILES['uphoto']['name']);
// 添加页面
$uid=$_POST["uid"];
$uname=$_POST["uname"];
$upwd=$_POST["upwd"];
$uphone=$_POST["uphone"];
$umail=$_POST["umail"];
$uphoto='img/'.$_FILES['uphoto']['name'];
$addid=$_POST["addname"];
//连接数据库
include 'conn.php';
$sql="INSERT INTO users(users_name, users_pwd,users_phone,users_mail,users_photo,address_id) VALUES ('".$uname."','".$upwd."','".$uphone."','".$umail."','".$uphoto."',".$addid.")";
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/userslist.html");
exit();
}else{
	echo '修改失败！';
}
    
?>

