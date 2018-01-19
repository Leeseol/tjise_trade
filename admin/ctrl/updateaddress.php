<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>管理员列表</title>
</head>
<body>
<?php
// 修改页面
$adid=$_POST["adid"];
$adname=$_POST["adname"];
//连接数据库
include 'conn.php';
$sql="update address set address_name='".$adname."' where address_id=".$adid;
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/addresslist.html");
exit();
}else{
    echo "修改失败！";
}
?>
</body>
</html>

