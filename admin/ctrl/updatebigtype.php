<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品大类列表</title>
</head>
<body>
<?php
// 修改页面
$bcid=$_POST["bcid"];
$bcname=$_POST["bcname"];
$bigtypeInfo=$_POST["bigtypeInfo"];
//连接数据库
include 'conn.php';
$sql="update bigtype set bigtype_name='".$bcname."',bigtype_info='".$bigtypeInfo."' where bigtype_id=".$bcid;
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/protypelistbig.html");
exit();
}else{
    echo "修改失败！";
}
?>
</body>
</html>

