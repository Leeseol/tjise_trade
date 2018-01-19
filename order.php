<?php
	$conn=mysqli_connect("localhost","root","root","tjise_trade");
	if(mysqli_connect_errno()){
		echo "链接失败：".mysqli_connect_error();
	}
	mysqli_query($conn, "set names utf8");
	$result=mysqli_query($conn,"select goods_id,goods_img,goods_info,goods_name,goods_price,goods_data,goods_ps,users.users_name,users.users_phone,smalltype.smalltype_name FROM goods,users,smalltype where smalltype.smalltype_id=goods.smalltype_id and goods.users_id=users.users_id and goods_id=".$_GET['goodsid']);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>中软二手交易平台-提交订单</title>
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/pro.css">
		<link rel="stylesheet" type="text/css" href="css/sell.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css"/>
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script src="js/jquery.cookie.js" type="text/javascript"></script>
	</head>

	<body>
		<div id="header">
			<div class="top">
				<div class="wrap clearfix">
					<a href="#" class="logo left"><img src="img/logo.png" /></a>
					<div class="nav left dInline" id="headerMenu">
						<a href="index.php">首页</a>
						<a class="on" href="maiche_list.php">我要买</a>
						<a href="srdz.php">我要卖</a>						
						<a id="MemberMenuChange" href="huiyuan1.php" target="_self">会员中心</a>
						<a href="about.php">关于二手平台</a>
					</div>
					<span class="right" id="rightMenuHtml">
						<a style="color:orange;">欢迎<?php   
		                     session_start();
		                     echo $_SESSION['uname'];
		                    
		            ?></a>
				<a href="#" class="b-login" id="b-login">登录</a>|<a href="#" id="b-regist">注册</a>|&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/tel.png"/>		
                </span>
				</div>
			</div>
			<div class="head-search">
				<div class="wrap clearfix">
					<div class="yjxj clearfix left" action="/index/keyword/" method="post" enctype="multipart/form-data">
						<input type="text" name="keyword" placeholder="请输入您想要的类别" class="left" />
						<input type="submit" value="搜 索" class="right" />
					</div>
					<div class="hotWords left dInline">
						热门类别：
						<a href="#">彩妆</a>
						<a href="xl2412_pp3.html">鞋</a>
						<a href="xl1987_pp2.html">服装</a>
						<a href="xl2593_pp9.html">乐器</a>
						<a href="#">体育用品</a>
					</div>
				</div>
			</div>
		</div>

		<div id="about">
			<?php
			    while($row=mysqli_fetch_array($result)){
			  ?>
			<div class="mTags">
				<div class="wrap">
					<a href="#"><?php echo $row['smalltype_name'];?>><?php echo $row['goods_name'];?></a>
				</div>
			</div>
			<div id="xDan" class="wrap clearfix">
				<div class="xdImg left dInline">
					<div class="car_bg"> </div>
					<a href="#"><img src="<?php echo $row['goods_img'];?>" style="width: 400px;height: 260px;"></a>
				</div>
				<div class="buyTxt right dInline">
					<h1><?php echo $row['goods_name'];?></h1>
					<div class="byDl clearfix byDl_tab">
						<span class="left byPrice bItem">
                          天软一口价<br/>
					<b><?php echo $row['goods_price'];?></b> 元
				</span>
						<span class="left bItem">
					发布时间
					<p><?php echo $row['goods_data'];?></p>
				</span>
						<span class="left bItem">
					发布人
					<p><?php echo $row['users_name'];?></p>
				</span>
						<span class="left bItem">
					联系方式
					<p><?php echo $row['users_phone'];?></p>
				</span>
						<span class="left bItem">
					使用年限
					<p><?php echo $row['goods_ps'];?></p>
				</span>
					</div>
					<form  enctype="multipart/form-data" method="post" id="Order" >
						<!--<input type="hidden" value="1180" name="carid" />-->
						<a class="payBtn" href="ctrl/insertorder.php?goodsid=<?php echo $row['goods_id']?>" >
							确认提交
						</a>
					</form>
					
					    
					
				</div>
			</div>
			 <?php
                }
   	         ?>	
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

				<!--右侧内容的开始-->
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

<!--右侧内容的结束-->

<!--会员登录与注册开始-->

<div id="popBox">
	<div class="popCont">
		<a class="p_closed">关闭</a>
		<div class="p-tab">
			<a>会员登录<i></i></a><a>会员注册<i></i></a>
		</div>
		<div class="p-detail">
			<div class="p-dl">
				<form  enctype="multipart/form-data" method="post" name="form" id="form" action="request.php">
					 <ul class="login-items">
			            <li>
			                <label>用户名</label>
			                <input class="input" type="text" value="" maxlength="32"  name="username" placeholder="请输入您的用户名">
			            </li>
			            <li>
			                <label>密码</label>
			                <input class="input" type="password" value="" maxlength="16"  name="password" placeholder="请输入您的密码">
			            </li>
			        </ul>
			        <div class="login-check">
			            <input type="checkbox" name="checkbox" style=" width:auto;" />
			            <label>记住我</label>
			            <a href="../../../../../Meet/editPass">忘记登录密码？</a>
			        </div>
			        <div class="login-button">
                    	<input type="hidden" value="" name="carid" class="ordercarid" />
                        <input type="hidden" value="" name="carstatus" class="orderstatus" />
			            <input type="submit"  value="登&nbsp;&nbsp;&nbsp;&nbsp;陆" class="fM" onclick="$('#form').submit()" />
			        </div>			       
				</form>
			</div>
			<div class="p-dl">
				<form class="registForm" enctype="multipart/form-data" method="post" name="reg" id="reg" action="ctrl/insertusers.php">
					 <ul class="login-items">
			            <li class="clearfix">
			                <input class="input" name="mobile" id="mobile" type="text" value="" placeholder="请输入手机号">
			            </li>
			            
			            <li class="clearfix">
			                <input class="input" type="text" value=""  name="realname" placeholder="请输入您的用户名">
			            </li>
			            <li class="clearfix">
			                <input id="" class="input" type="password" name="password" value="" placeholder="请输入输入密码">
			            </li>
			        </ul>
			      
			        <div class="login-button">
                    	<input type="hidden" value="" name="carid" class="ordercarid" />
                        <input type="hidden" value="" name="carstatus" class="orderstatus" />
			            <input type="submit"  value="立即注册" class="fM" onclick="$('#reg').submit()" />
			        </div>
			      
				</form>
			</div>
		</div>
	</div>
</div>

<!--会员登录与注册开始-->



<script type="text/javascript" src="js/miniBar.js"></script>
<script type="text/javascript" src="js/lg_reg.js"></script>

		

	</body>

</html>