<?php
session_start();
//在页首先要开启session,
//error_reporting(2047);

//将session去掉，以每次都能取新的session值;
//用seesion 效果不错，也很方便

if(isset($_POST["error"])){
	
	$f=$_POST["error"];
	if($f!=null){
		switch ($f){
    case 0: echo '<script language="javascript">alert("ddd");</script>'; break;//echo '用户名错误'
    case 1: echo '<script language="javascript">$(".lgins").html("密码输入错误，请重新输入");</script>';break;//echo '密码输入错误'
    case 3: echo '<script language="javascript">$(".lgins").html("验证码错误，请重新输入");</script>';break;//echo '验证码错误'
	}
	
   }

}


?>
<!DOCTYPE html>

<head>
	<title>登录</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<style type="text/css">
#login p{
margin-top: 15px;
line-height: 20px;
font-size: 14px;
font-weight: bold;
}
#login img{
cursor:pointer;
}
form{
margin-left:20px;
}
</style>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/style-responsive.css" rel="stylesheet" />
	<!-- font CSS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="css/font.css" type="text/css" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //font-awesome icons -->
	<script src="js/jquery2.0.3.min.js"></script>
</head>

<body>
	<div class="log-w3">
		<div class="w3layouts-main">
			
			<h2 class="lgins">现在登录</h2>
			<form action="request.php" method="post">
				<input type="text" class="ggg" name="username" placeholder="请输入用户名" required="">
				<input type="password" class="ggg" name="userpwd" placeholder="请输入密码" required="">
					<p>
<span>验证码：</span>
<input type="text" style="color: #000000;"  name="validate" value="" size=10> 
<img  title="点击刷新" src="captcha.php" align="absbottom" onclick="this.src='captcha.php?'+Math.random();"></img>
</p>
				<div class="clearfix"></div>
				<input type="submit" value="登 录" name="login">
			</form>
			<?php
//打印上一个session;
//echo "上一个session：<b>".$_SESSION["authnum_session"]."</b><br>";
$validate="";
if(isset($_POST["validate"])){
$validate=$_POST["validate"];
echo "您刚才输入的是：".$_POST["validate"]."<br>状态：";
if($validate!=$_SESSION["authnum_session"]){
//判断session值与用户输入的验证码是否一致;
echo "<font color=red>输入有误</font>"; 
}else{
echo "<font color=green>通过验证</font>"; 
}
} 
/*
//打印全部session;
PrintArr($_SESSION);
function PrintArr($aArray){
echo '<xmp>';
print_r($aArray);
echo '</xmp>';
}
*/
?>
		</div>
	</div>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery.dcjqaccordion.2.7.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/jquery.slimscroll.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
	<script src="js/jquery.scrollTo.js"></script>
</body>

</html>