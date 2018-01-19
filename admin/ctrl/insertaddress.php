<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>地址列表</title>
</head>
<body>
<?php
$adid=$_POST["adid"];
$adname=$_POST["adname"];
//连接数据库
include 'conn.php';
$sql="INSERT INTO address(address_name) VALUES ('".$adname."')";
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/addresslist.html");
exit();
}else{
    echo "添加失败！";
}
?>
</body>
</html>

