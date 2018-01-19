<?php
	$result = array();
	$state=$_POST['state'];
	include 'ctrl/conn.php';//连接数据库
	$rs = mysqli_query($conn,"select goods_id,goods_img,goods_info,goods_name,goods_price,goods_data,goods_ps,examine,smalltype.smalltype_name,users.users_name FROM goods,smalltype,users where smalltype.smalltype_id=goods.smalltype_id and users.users_id=goods.users_id and state='".$state."' order by goods_id desc");
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result= $items;

	echo json_encode($result);
			
    $conn->close();

?>