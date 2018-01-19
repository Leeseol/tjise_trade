<?php
session_start();
$con=mysqli_connect("localhost","root","root","tjise_trade");
if(mysqli_connect_errno()){
		echo "链接失败：".mysqli_connect_error();
	}
	mysqli_query($con, "set names utf8");
	if($_SESSION['uname']==null){
		header("Location: index.php");
	}
	else{
	$result=mysqli_query($con,"select users_name,users_phone,users_mail from users where users_name='".$_SESSION['uname']."'");
    $sql="select users_id,users_name,users_pwd,users_phone,users_mail,users_photo,address.address_name from users,address where address.address_id=users.address_id and users_name='".$_SESSION['uname']."'";
    $rs = $con->query($sql);
    $att= $rs->fetch_row();
	}
	
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>会员中心-账户管理</title>
<meta name="description" content="天软"/>
<meta name="keywords" content="天软二手"> 
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/layout.css">
<link rel="stylesheet" type="text/css" href="css/hurst.css">
<link rel="stylesheet" type="text/css" href="css/footer.css"/>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script src="js/jquery.cookie.js" type="text/javascript"></script>
<!--[if IE 6]>
<script type="text/javascript" src="js/DD_belatedPNG.js"></script>
<script>
        DD_belatedPNG.fix('*');
    </script>
<![endif]--> 
</head>                                        
<body>
<div id="header">
			<div class="top">
				<div class="wrap clearfix">
					<a href="#" class="logo left"></a>
					<div class="nav left dInline" id="headerMenu">
						<a href="index.html"><img src="img/leftlogo.png" /></a>
						<a href="index.php">首页</a>
						<a href="maiche_list.php">我要买</a>
						<a href="srdz.php">我要卖</a>					
						<a class="on" id="MemberMenuChange" href="huiyuan1.php" target="_self">会员中心</a>
						<a href="about.php">关于二手平台</a>
					</div>
					<span class="right" id="rightMenuHtml">
						<a style="color:orange;">欢迎<?php   
		                     echo $_SESSION['uname'];
		                    
		            ?></a>
				<a href="#" class="b-login" id="b-login">登录</a>|<a href="#" id="b-regist">注册</a>|&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/phone.png"/>			
                </span> </div>
			</div>
			<div class="head-search">
				<div class="wrap clearfix">
					<div class="yjxj clearfix left" action="/index/keyword/" method="post" enctype="multipart/form-data">
						<input type="text" name="keyword" placeholder="请输入您想要的二手物品" class="left" />
						<input type="submit" value="搜 索" class="right" />
					</div>
					<div class="hotWords left dInline"> 热门种类：
						<a href="#">服饰</a>
						<a href="#">书籍</a>
						<a href="#">电子产品</a>
						<a href="#">自行车</a>
						<a href="#">文体用品</a>
					</div>
				</div>
			</div>
		</div>

<div id="about">
	<div class="mTags wrap">
		<a href="/">天软二手平台</a>><a href="/member/index/channel/7.html">会员中心</a>><a href="/Member/manage/channel/7/list/15.html">账户管理</a>
	</div>
	<div class="mebBox">
		<div class="meb-cont clearfix wrap">
			<div class="meb-nav left dInline">
				<ul class="clearfix">
					<li class="on"><a href="huiyuan1.php">会员中心</a></li>
                    <li ><a href="huiyaun2.php">我的订单</a></li>
                    <li><a href="huiyuan3.php">我的求购</a></li>
                    <li><a href="huiyuan4.php">账户管理</a></li>				
                </ul>
			</div>
			<div class="meb-right right dInline">
            	<div class="mr-top">
    <div class="mr-top-div clearfix">
        <span class="left">
            <img src="images/photo.png"/>
        </span>
        <div class="mr-infor left dInline">
            <h2>中午好，尊敬的会员 <b>
            	<?php
              		echo $_SESSION['uname'];
            	?>
            </b></h2>
            <p>
                 <?php
            		while($row=mysqli_fetch_array($result)){
            		
            		?>
                           手机：<?php echo $row['users_phone']?>   邮箱：<?php echo $row['users_mail']?>   |  [ <a href="huiyuan4.php">管理账户信息</a> ]
                  <?php
                  }
                  	?>     
            </p>
        </div>
    </div>
</div>
				<div class="mr-detail">
					<div class="mr-tab clearfix">
						<a class="on">个人资料管理 </a>
                        <a>修改密码</a>
					</div>
					<div class="me-box me-box1">
						<div class="me-dl" style="display:block;">
							<div class="me-one">
								<div class="accForm">
										<form action="ctrl/updateusers.php" enctype="multipart/form-data" name="editM" method="post" onsubmit="return checkpost();">
										<input type="hidden" class="ar-txt" name="uid" placeholder="" value="<?php echo $att[0];?>" />
										<div class="afl clearfix">
											<label class="left">
												手机号码
											</label>
											<div class="af-r left dInline">
												<input type="text" class="ar-txt" name="mobile" placeholder="请输入手机号码" value="<?php echo $att[3];?>"/>
											</div>
										</div>
										<div class="afl clearfix">
											<label class="left">
												姓名
											</label>
											<div class="af-r left dInline">
												<input type="text" class="ar-txt" name="realname" placeholder="请输入您的姓名" value="<?php echo $att[1];?>" />
											</div>
										</div>
										<div class="afl clearfix">
											<div class="af-r left dInline">
												<input type="hidden" class="ar-txt" name="pwd" placeholder="请输入您的密码" value="<?php echo $att[2];?>" />
											</div>
										</div>
										<div class="afl clearfix">
											<label class="left">
												邮箱
											</label>
											<div class="af-r left dInline">
												<input type="text" class="ar-txt" name="email" placeholder="请输入您的邮箱" value="<?php echo $att[4];?>" />
											</div>
										</div>
										<div class="afl clearfix">
											<label class="left">
												地址
											</label>
											<div class="af-r left dInline">
												<select class="form-control" name="addname">
												     <?php
												     include 'ctrl/conn.php';//连接数据库
												     $sql="select * from address";
												     $r=$conn->query($sql);
												     $attaddress=$r->fetch_all();
												     //数组的遍历
												     foreach ($attaddress as $v){
												         //小类表的大类名称与大类表的大类名称进行比较
												         if($att[6]==$v[1]){
												             echo "<option value='".$v[0]."' selected='selected'>".$v[1]."</option>";
												         }else{
												             echo "<option value='".$v[0]."'>".$v[1]."</option>"; 
												              }
												     }
												     ?>
												     </select>
											</div>
										</div>
										<div class="afl clearfix">
											<label class="left">
											</label>
											<div class="af-r left dInline">
												<input type="submit" value="提 交" class="ar-btn">
											</div>
										</div>
									</form>
			
								</div>
							</div>
						</div>
                        <div class="me-dl" style="display:none;">
							<div class="me-one">
								<div class="accForm">
									<form action="ctrl/updatepwds.php" enctype="multipart/form-data" name="editP" method="post">
                                                                         <input type="hidden" class="ar-txt" name="uid" placeholder="" value="<?php echo $att[0];?>" />
										<div class="afl clearfix">
											<label class="left">
												当前密码
											</label>
											<div class="af-r left dInline">
												<input type="password" class="ar-txt" name="password" placeholder="请输入当前密码" value="" />
											</div>
										</div>
										<div class="afl clearfix">
											<label class="left">
												新密码
											</label>
											<div class="af-r left dInline">
												<input type="password" class="ar-txt" name="password1" placeholder="请输入新密码" value="" />
											</div>
										</div>
										<div class="afl clearfix">
											<label class="left">
												确认新密码
											</label>
											<div class="af-r left dInline">
												<input type="password" class="ar-txt" name="password2" placeholder="请确认输入的新密码" value="" />
											</div>
										</div>
										<div class="afl clearfix">
											<label class="left">
											</label>
											<div class="af-r left dInline">
												<input type="submit" value="提 交" class="ar-btn">
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--footer部分开始-->

<footer>
			<div class="banquan01">版权所有 天津市大学软件学院
				<br>地址：天津市西青区宾水西道399号 | 邮编：300387
				<br>津ICP备10200771号 | 津教备0499号 | 服务热线：022-5856-5050
			</div>
			<div class="banquan02">
				<img src="img/footer.jpg">
			</div>
		</footer>
	

<!--footer部分结束-->
<div id="miniBus" style="right:-270px;">
	<div class="mini-bar">
		<div class="mini-barlist">
			<ul>
				<li class="miItem">
					<div class="mini-mi browse">
						<i class="mini-ease"></i>
						<code></code>
						<span>最近浏览</span>
					</div>
				</li>
				<li class="miItem">
					<div class="mini-mi collec">
						<i class="mini-ease"></i>
						<code></code>
						<span>我的收藏</span>
					</div>
				</li>
				<li>
					<div class="mini-mi service">
						<i class="mini-ease" id="BizQQWPA"></i>
						<code></code>
						<span>在线客服</span>
                       
					</div>
				</li>
				<li class="callItem">
					<div class="mini-mi callback">
						<i class="mini-ease"></i>
						<code></code>
						<span>意见反馈</span>
					</div>
				</li>
				
			</ul>
		</div>
		<a class="mini-gotop"></a>
		<a class="wx1"><img src="images/wx1.png"></a>
		<div class="wmImg hide">
			<img src="img/wx.png">
		</div>
	</div>
	<div class="mini-cont">
		<div class="mini-contlist">
			<div class="mini-ni">
				<div class="mini-h clearfix">
					<a class="mini-close mini-ease lf-fl"></a>
					<span class="lf-fr"><code>最近浏览</code></span>
				</div>
				<div class="miList" id="Liulan">
					<ul>
											</ul>
				</div>
			</div>
			<div class="mini-ni">
				<div class="mini-h clearfix">
					<a class="mini-close mini-ease lf-fl"></a>
					<span class="lf-fr"><code>我的收藏</code></span>
				</div>
				<div class="miList" id="shoucang">
					<ul>
											</ul>
<a  href="javascript:void(0)" class="mini-fav b-login">查看更多收藏</a>
				</div>
			</div>
			<!--<div class="mini-ni">
				<div class="mini-h clearfix">
					<a class="mini-close mini-ease lf-fl"></a>
					<span class="lf-fr"><code>在线客服</code></span>
				</div>
			</div>-->
			<div class="mini-ni" id="shopping">
				<div class="mini-h clearfix">
					<a class="mini-close mini-ease lf-fl"></a>
					<span class="lf-fr"><code>对比商品</code></span>
                    <span class="lf-fr" style="margin:auto 10px; font-size:26px; font-weight:bolder" id="deletealldb"><a><code></code></a></span>
				</div>
                <div class="miList" id="Carduibi">
					<ul>
											</ul>
					<a href="../../../../../Cars/contrast/channel/2.html" class="mini-fav">立即对比</a>
				</div>
			</div>
		</div>
	</div>
	<div class="lf-view" id="lf-view">
    	<form onsubmit="return Lmessage();" enctype="multipart/form-data" method="post" name="leaveMess" id="leaveMess">
		<b>您对我们的看法~</b>
		<div>
			<textarea placeholder="您的声音对我们很重要哟(必填)~" name="bankAuthSrc"></textarea>
		</div>
		<div>
			<a id="viewSubmit" onclick="$('#leaveMess').submit()"></a>
            <input type="text" placeholder="请留下您的手机号码(必填)" id="viewAbout" name="mobile" />
            		</div>
        </form>
		<a id="viewClose"></a>
		<i id="viewIcon"></i>
		<p id="viewSign"></p>
	</div>
</div>

<div id="popBox">
	<div class="popCont">
		<a class="p_closed">关闭</a>
		<div class="p-tab">
			<a>会员登录<i></i></a><a>会员注册<i></i></a>
		</div>
		<div class="p-detail">
			<div class="p-dl">
				<form onsubmit="return check();" enctype="multipart/form-data" method="post" name="form" id="form">
					 <ul class="login-items">
			            <li>
			                <label>用户名(手机号)</label>
			                <input class="input" type="text" value="" maxlength="32"  name="username" placeholder="请输入您的手机号">
			            </li>
			            <li>
			                <label>密码</label>
			                <input class="input" type="password" value="" maxlength="16"  name="password">
			            </li>
			        </ul>
			        <div class="login-check">
			            <input type="checkbox" name="checkbox" style=" width:auto;" />
			            <label>记住我</label>
			            <a href="/Meet/editPass">忘记登录密码？</a>
			        </div>
			        <div class="login-button">
                    	<input type="hidden" value="" name="carid" class="ordercarid" />
                        <input type="hidden" value="" name="carstatus" class="orderstatus" />
			            <input type="button"  value="登&nbsp;&nbsp;&nbsp;&nbsp;陆" class="fM" onclick="$('#form').submit()" />
			        </div>
			        <!--<div class="security-pro">
			            <i class="icons ver-green-down"></i>
			            <b>您的信息已通过256位SGC加密保护，数据传输安全</b>
			        </div>-->
				</form>
			</div>
			<div class="p-dl">
				<form class="registForm" onsubmit="return regcheck();" enctype="multipart/form-data" method="post" name="reg" id="reg">
					 <ul class="login-items">
			            <li class="clearfix">
			                <input class="input" name="mobile" id="mobile" type="text" value="" placeholder="手机号码（登录帐号）">
			            </li>
			            <li class="clearfix">
			                <input class="input left" type="text" value=""  name="verify" placeholder="输入验证码" style="width:100px;" />
			                <div id="send"><a href="#" class="send_code right">获取验证码</a></div>
			            </li>
			            <li class="clearfix">
			                <input class="input" type="text" value=""  name="realname" placeholder="姓名">
			            </li>
			            <li class="clearfix sex">
			                <input type="radio" checked="" name="gender" value="M" /> 男&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="F" /> 女 
			            </li>
			            <li class="clearfix">
			                <input id="" class="input" type="password" name="password" value="" placeholder="输入密码（六位字符）">
			            </li>
			        </ul>
			      
			        <div class="login-button">
                    	<input type="hidden" value="" name="carid" class="ordercarid" />
                        <input type="hidden" value="" name="carstatus" class="orderstatus" />
			            <input type="button"  value="立即注册" class="fM" onclick="$('#reg').submit()" />
			        </div>
			      
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="js/miniBar.js"></script>
<script type="text/javascript" src="js/lg_reg.js"></script>
<script type="text/javascript">
$(function(){
	$('.mr-tab a').each(function(index){
		$(this).click(function(){
			$(this).addClass('on').siblings().removeClass('on');
			$('.me-dl').eq(index).show().siblings().hide();
		})
	});
})
</script>
<script>
function checkpost(){
	var realname=editM.realname.value;//手机号
	var gender=editM.gender.value;//验证码
	var email=editM.email.value;//姓名
	var Yemail = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/; //邮箱验证
	var url='/Member/manage/channel/7/list/15';
	if(realname.length>10){
		alert("姓名要不得大于10个字符");
		editM.realname.focus();
		return false;
	}
	if(!Yemail.exec(email)&&email!=''){
		alert("邮箱格式不正确");
		editM.email.focus();
		return false;
	}
	$.ajax({
		 type: "POST",
		 url: url,
		 data: {realname:realname, gender:gender,email:email},
		 dataType: "json",
		 success: function(data){
			 alert(data.msg);
		}
	 });
	 return false;
}
function checkPasspost(){
	var password=editP.password.value;//性别
	var password1=editP.password1.value;//密码
	var password2=editP.password2.value;//密码
	var Ypass=/\S{6,}/;//密码验证
	var url='/Member/manage/channel/7/list/15';
	if(!password1){
		alert("请输入新密码");
		editP.password1.focus();
		return false;
	}
	if(!password2){
		alert("请重复输入新密码");
		editP.password2.focus();
		return false;
	}
	if(password1!=password2){
		alert("两次新密码输入不同");
		editP.password1.focus();
		return false;
	}
	if(!Ypass.exec(password1)){
		alert("密码格式不正确，必须以字母开头的6-16 字母，数字");
		editP.password1.focus();
		return false;
	}
	$.ajax({
		 type: "POST",
		 url: url,
		 data: {password:password,password1:password1},
		 dataType: "json",
		 success: function(data){
			 alert(data.msg);
		}
	 });
	 return false;
}
</script>




</body>
</html>
