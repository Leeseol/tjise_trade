<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php
session_start();
$uname=$_POST["username"];
$upwd=$_POST["userpwd"];
$validate="";
 
//创建连接4
$flag=0;
include 'ctrl/conn.php';
//编写sql语句
$sql="select admin_name,admin_pwd from admin";
$result=$conn->query($sql);
if($result->num_rows>0){
    //输出数据
    while ($row=$result->fetch_assoc()){
        if($uname==$row["admin_name"]){
            $flag=1;
            if($upwd==$row["admin_pwd"]){
                $flag=2;
                 $_SESSION['uname']=$row['admin_name'];
                 $_SESSION['upwd']=$row['admin_pwd'];
               
            }
        }
    }
}else{
    echo "0 结果";
}
if(isset($_POST["validate"])){
$validate=$_POST["validate"];

if($validate!=$_SESSION["authnum_session"]){
$_SESSION["error"]=3;

 $flag=3;
}
}
switch ($flag){
    case 0: $_SESSION["error"]=0;Header("Location: login.php");break;//echo '用户名错误'
    case 1: $_SESSION["error"]=1;Header("Location: login.php");break;//echo '密码输入错误'
    case 3: $_SESSION["error"]=3;Header("Location: login.php");break;//echo '验证码错误'
    case 2: Header("Location: userslist.html");break;
}
?>
</body>
</html>