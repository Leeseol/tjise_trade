<?php
	$result = array();
	include 'conn.php';//连接数据库
	$rs = mysqli_query($conn,"select users_id,users_name,users_pwd,users_phone,users_mail,users_photo,address.address_name from users LEFT JOIN address ON users.address_id=address.address_id");
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result= $items;
	echo json_encode($result);	
    $conn->close();
?>