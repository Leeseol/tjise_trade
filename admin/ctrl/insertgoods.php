<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
move_uploaded_file($_FILES['goodsimg']['tmp_name'],'../img/'.$_FILES['goodsimg']['name']);
// 修改页面
$goodsid=$_POST["goodsid"];
$goodsInfo=$_POST["goodsInfo"];
$goodsname=$_POST["goodsname"];
$goodsprice=$_POST["goodsprice"];
$goodsdata=$_POST["goodsdata"];
$goodsimg='img/'.$_FILES['goodsimg']['name'];
$goodsps=$_POST["goodsps"];
$smallid=$_POST["smallname"];
$uid=$_POST["username"];
$examine=$_POST["examine"];
//连接数据库
include 'conn.php';
$sql="INSERT INTO goods(goods_img, goods_info,goods_name,goods_data,goods_price,goods_ps,examine,smalltype_id,users_id) VALUES ('".$goodsimg."','".$goodsInfo."','".$goodsname."','".$goodsdata."','".$goodsprice."','".$goodsps."','".$examine."',".$smallid.",".$uid.")";
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/goodslist.html");
exit();
}else{
    echo "添加失败！";
}
?>
</body>
</html>

