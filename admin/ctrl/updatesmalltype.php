<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>商品小类列表</title>
</head>
<body>
<?php
// 修改页面
$scid=$_POST["scid"];
$scname=$_POST["scname"];
$smalltypeInfo=$_POST["smalltypeInfo"];
$bcid=$_POST["bcname"];
//连接数据库
include 'conn.php';
$sql="update smalltype set smalltype_name='".$scname."',smalltype_info='".$smalltypeInfo."',bigtype_id=".$bcid." where smalltype_id=".$scid;
$r=$conn->query($sql);
if($r){
header("Refresh:0.5;url=http://10.96.129.26:80/tjise_trade/admin/protypelistsmall.html");
exit();
}else{
    echo "修改失败！";
}
?>
</body>
</html>

