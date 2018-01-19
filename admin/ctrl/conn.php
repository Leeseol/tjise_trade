 <?php
 $server="localhost";
 $username="root";
 $userpwd="root";
 $dbname="tjise_trade";
 $conn=new mysqli($server,$username,$userpwd,$dbname);
 if($conn->connect_error){
     die("连接失败".$conn->connect_error);
 }
 mysqli_query($conn, "set names utf8");
 ?>
