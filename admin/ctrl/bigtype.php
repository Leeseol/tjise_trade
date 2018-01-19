<?php
	$result = array();
	include 'conn.php';//连接数据库
	$rs = mysqli_query($conn,"select * from bigtype");
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result= $items;

	echo json_encode($result);
			
    $conn->close();
?>