<?php
	$result = array();
	include 'conn.php';//连接数据库
	
// 	$rs = mysqli_query($conn,"select count(*) from bigtype");
// 	$row = mysqli_fetch_row($rs);
// 	$result["total"] = $row[0];
	$rs = mysqli_query($conn,"select smalltype_id,smalltype_name,smalltype_info,bigtype.bigtype_name from smalltype,bigtype where bigtype.bigtype_id=smalltype.bigtype_id");
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result= $items;

	echo json_encode($result);
			
    $conn->close();
?>