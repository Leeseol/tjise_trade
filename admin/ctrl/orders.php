<?php
	$result = array();
	include 'conn.php';//连接数据库
	$rs = mysqli_query($conn,"select orders_id,orders_state,orders_data,pay_state,users.users_name,goods.goods_name from orders,users,goods where users.users_id=orders.users_id and goods.goods_id=orders.goods_id");
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result= $items;
	echo json_encode($result);			
    $conn->close();
?>