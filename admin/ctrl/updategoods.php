<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品列表</title>
</head>
<body>
<?php
$goodsid=$_POST["goodsid"];
$examine=$_POST["examine"];
//连接数据库
include 'conn.php';
$sql="update goods set examine='".$examine."' where goods_id=".$goodsid;
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/goodslist.html");
}else{
    echo "修改失败！";
}
?>
</body>
</html>

