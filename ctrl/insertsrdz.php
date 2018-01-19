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
$goodsInfo=$_POST["goodsinfo"];
$goodsname=$_POST["goodsname"];
$goodsprice=$_POST["goodsprice"];
$goodsdata=$_POST["goodsdata"];
$goodsimg='img/'.$_FILES['goodsimg']['name'];
$goodsps=$_POST["goodsps"];
$smallid=$_POST["smallname"];
session_start();
$_SESSION['uid'];

//连接数据库
include 'conn.php';
$sql="INSERT INTO goods(goods_img,goods_name,goods_info,goods_data,goods_price,goods_ps,smalltype_id,users_id) VALUES ('".$goodsimg."','".$goodsname."','".$goodsInfo."','".$goodsdata."','".$goodsprice."','".$goodsps."',".$smallid.",".$_SESSION['uid'].")";
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/maiche_list.php");
exit();
}else{
echo "添加失败！";
}
?>
</body>
</html>

