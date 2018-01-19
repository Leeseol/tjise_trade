<?php
	
	$result=array();
	$bigid=$_POST['bigid'];
			include_once("ctrl/conn.php"); //链接数据库 
			mysqli_query($conn,"set names utf8");
			$rs=mysqli_query($conn,"select * from smalltype where bigtype_id=".$bigid);
			while($row=mysqli_fetch_object($rs)){

				array_push($result,$row);
			}
			echo json_encode($result);
			$conn->close();
	
	


?>
