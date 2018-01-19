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
    $result1= mysqli_query($con,"select orders_id,orders_state,orders_data,pay_state,users.users_name,goods.goods_name,goods.goods_img,goods.goods_img,goods.goods_price,goods.goods_id from orders,users,goods where users.users_id=orders.users_id and goods.goods_id=orders.goods_id and users.users_name='".$_SESSION['uname']."' order by orders_id desc");
    $result2= mysqli_query($con,"select orders_id,orders_state,orders_data,pay_state,users.users_name,goods.goods_name,goods.goods_img,goods.goods_img,goods.goods_price,goods.goods_id from orders,users,goods where users.users_id=orders.users_id and goods.goods_id=orders.goods_id and users.users_name='".$_SESSION['uname']."'");
    $result3= mysqli_query($con,"select goods_id,goods_img,goods_name,goods_price,goods_data,goods_ps,users.users_name from goods,users where users.users_id=goods.users_id and users.users_name='".$_SESSION['uname']."' order by goods_id desc");
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>会员中心-我的求购</title>
<meta name="description" content="天软"/>
<meta name="keywords" content="天软二手"> 
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css"/>
<link rel="stylesheet" type="text/css" href="css/hurst.css">
<!--<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css">-->

<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>


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
		<a href="/">天软二手平台</a>><a href="#">会员中心</a>><a href="#">我的求购</a>
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
						<a class="on">我的订单</a>
						<a>我的发布</a>
						<a>已买到的宝贝</a>
						<a>已卖出的宝贝</a>
                        <a>收藏的宝贝</a>
					</div>
					<div class="me-box">
						<div class="me-dl" style="display:block;">
<div class="left dInline aLeft">
					<div class="carSou">
						<div class="cs-list">
							<ul>
								<?php
            		 while($row=mysqli_fetch_array($result1)){
            		      ?>
								<li class="clearfix" style="position: relative;"> <span class="carImg left dInline">
            <a href="details.php?goodsid=<?php echo $row['goods_id']?>" target="_blank">
              <div class="car_bg"> </div>
              <img src="<?php echo $row['goods_img']?>"  width="300" /></a> </span>
									<div class="carTxt right dInline" style="margin-top: 10px;">
										<h2><a href="maiche_list.php" target="_blank">订单名称：<?php echo $row['goods_name']?></a></h2>
										<div class="price clearfix" style="margin:8px 0;">
											<div class="left dInline pNum" style="width:110px;">
												<font>一口价</font><br/>
												<span class="num nBlue"><?php echo $row['goods_price']?></span>
												<font> 元</font>
											</div>
										</div>
										<div class="cs_bt clearfix" style="padding-top:7px;">
											<a href="javascript:void(0)" class="cs-q" id="Order_1165"><?php echo $row['orders_state']?></a>
											<a href="javascript:void(0)" class="" id="collection_1165">未付款</a>
											<span>订单编号：<?php echo $row['orders_id']?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
											<span>订单时间：<?php echo $row['orders_data']?></span>
											
										</div>
									</div>
								</li>
								<?php
								}
									?>
							</ul>
							<div class="pages">
								<a class="on" href="#">1</a>
								<a class="" href="#">2</a>
								<a class="" href="#">3</a>
								<a class="" href="#">4</a>
								<a class="" href="#">5</a>
								<a href="#">>>
									
								</a>
								<a href="#">32</a>
							</div>
						</div>
					</div>
				</div>
						</div>
						<div class="me-dl">
							<div class="me-one" id="me-four">
								<div class="me-dl" style="display:block;">
                  <div class="left dInline aLeft">
					<div class="carSou">
						<div class="cs-list">
							<ul>
							<?php
            		 while($row=mysqli_fetch_array($result3)){
            		
            		     ?>
								<li class="clearfix" style="position: relative;"> <span class="carImg left dInline">
            <a href="details.php?goodsid=<?php echo $row['goods_id']?>" target="_blank">
              <div class="car_bg"> </div>
              <img src="<?php echo $row['goods_img']?>"  width="300" /></a> </span>
									<div class="carTxt right dInline" style="margin-top: 10px;">
										<h2><a href="#" target="_blank">商品名称：<?php echo $row['goods_name']?></a></h2>
										<div class="price clearfix" style="margin:8px 0;">
											<div class="left dInline pNum" style="width:300px;">
												<span class="">商品价格：<?php echo $row['goods_price']?></span><br/><br/>
												<span class="">发布日期：<?php echo $row['goods_data']?></span><br/><br/>
												
											</div>
										</div>
										<div class="cs_bt clearfix" style="padding-top:7px;">
											<a href="javascript:void(0)" class="cs-q" id="Order_1165">发布已完成</a>
											<span class="">使用年限：<?php echo $row['goods_ps']?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
											<span>我的发布：<?php echo $row['users_name']?></span>
										</div>
									</div>
								</li>
								<?php
								}
									?>
							</ul>
							<div class="pages">
								<a class="" href="#">1</a>
								<a class="on" href="#">2</a>
								<a class="" href="#">3</a>
								<a class="" href="#">4</a>
								<a class="" href="#">5</a>
								<a href="#">>>
									
								</a>
								<a href="#">32</a>
							</div>
						</div>
					</div>
				</div>
						</div>	
																												
							</div>
						</div>
						
						
                        <div class="me-dl">
							<div class="me-one" id="me-four">
								<div class="me-dl" style="display:block;">
                  <div class="left dInline aLeft">
					<div class="carSou">
						<div class="cs-list">
							<ul>
							<?php
            		 while($row=mysqli_fetch_array($result2)){
            		
            		     ?>
								<li class="clearfix" style="position: relative;"> <span class="carImg left dInline">
            <a href="details.php?goodsid=<?php echo $row['goods_id']?>" target="_blank">
              <div class="car_bg"> </div>
              <img src="<?php echo $row['goods_img']?>"  width="300" /></a> </span>
									<div class="carTxt right dInline" style="margin-top: 10px;">
										<h2><a href="#" target="_blank">订单名称：<?php echo $row['goods_name']?></a></h2>
										<div class="price clearfix" style="margin:8px 0;">
											<div class="left dInline pNum" style="width:110px;">
												<font>一口价</font><br/>
												<span class="num nBlue"><?php echo $row['goods_price']?></span>
												<font> 元</font>
											</div>
										</div>
										<div class="cs_bt clearfix" style="padding-top:7px;">
											<a href="javascript:void(0)" class="cs-q b-login" id="Order_1165">交易完成</a>
											<a href="javascript:void(0)" class="b-login" id="collection_1165"><?php echo $row['pay_state']?></a>
											<span>订单编号：<?php echo $row['orders_id']?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
											<span>订单时间：<?php echo $row['orders_data']?></span>
											
										</div>
									</div>
								</li>
								<?php
								}
									?>
							</ul>
							<div class="pages">
								<a class="" href="#">1</a>
								<a class="" href="#">2</a>
								<a class="on" href="#">3</a>
								<a class="" href="#">4</a>
								<a class="" href="#">5</a>
								<a href="#">>>
									
								</a>
								<a href="#">32</a>
							</div>
						</div>
					</div>
				</div>
						</div>	
																												
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="overlay">
	<div class="popup-over t-center" style="margin-left:-380px; height:420px;margin-top: -200px;">
		<div class="popDiv popDiv1">
			<div class="pop-head clearfix">
				<h2 class="left dInline">上传资料</h2>
                <h1 id="p_closedziliao" style="float:right">关闭</h1>
			</div>
			<div class="pop-cont">
            	<form action="/Member/cardImg/channel/7.html"  method="post" id="uploadIdForm" name="uploadIdForm" enctype="multipart/form-data"><!-- onsubmit="subc();"-->
				<dl>
					<dt>必要认证资料</dt>
					<dd>
						<ul class="clearfix verify_ul">
							<li>
								<span>身份认正证</span>
								<div class="ver-a">
                                	<img src="images/qzx.jpg" id="imgPreview1" width="200" height="130" /><br />
                                    <input type="file" name="postfile1" onchange='PreviewImage1(this)' />
								</div>
							</li>
                            <li>
								<span>身份认反证</span>
								<div class="ver-a">
                                	<img src="images/qzx.jpg" id="imgPreview2" width="200" height="130" /><br />
                                    <input type="file" name="postfile2" onchange='PreviewImage2(this)' />
								</div>
							</li>
						</ul>
					</dd>
				</dl>
                	<input type="hidden" name="memId" value="" id="memId" />
				<a class="pop_submit" href="javascript:void(0)" onclick="$('#uploadIdForm').submit()">提交资料</a>
                </form>
			</div>
		</div>
	</div>
</div>
<style type="text/css">
#showdiv{width:586px;background:#fff;overflow: hidden;color:#333;}
#showdiv .showTit{color: #000;font-size:18px;border-bottom:1px solid #a0a0a0;padding:20px;background:#f3f3f3;}
#showdiv .dk_r{width:205px;}
#showdiv .dk_div{width:516px;background:#f3f3f3;height:180px;margin:15px auto;}
.dk_tit{height:37px;line-height:37px;background:#ccd3e0}
.dk_tit span{display:inline-block;float:left;width: 50%;text-align:center;color:#3865c0;font-size:14px;position:relative;height:37px;cursor: pointer;}
.dk_tit span.on{color:#fff;background:#3865c0}
.dk_tit span.on i{position:absolute;left:50%;margin-left:-3px;background:url(images/dk_d.png) no-repeat;width:6px;height:4px;bottom:-4px;}
.dk_dl{padding:30px 0px 0 40px;}
.dk_dl label{width: 70px;display:block;height:25px;margin-right:20px;}
.dk_dl li{height:25px;line-height:25px;font-size:14px;color:#000;margin-bottom:20px}
.dk_tag span{display:inline-block;padding:0 13px;margin-right:10px;cursor: pointer;cursor: pointer;}
.dk_tag span.on{background:#3865c0;color: #fff;}

a.dk_btn{display:block;background-color: #1663B1;color:#fff;font-size:14px;height:30px;line-height:30px;width:215px;margin:0 auto;text-align: center;margin-top:10px}
#showdiv li .yh_s{cursor: pointer;}
.buy_je{text-align: center;font-size:18px;padding:15px 0 0 0;line-height:38px;}
.buy_je strong{font-weight: normal;color: #3865c0;font-size:38px;display:inline-block;padding:0 6px;}
.dk_result{background:#f3f3f3;padding:20px 0;text-align:center;margin-top:25px;}
.dk_tel{font-size:18px;color:#484848;padding:10px 0 4px 0;}
.dk_result p{color:#969696;}
</style>
<script type="text/javascript">
$(function(){
	$('.dk_tit span').each(function(index){
		$(this).click(function(){
			$(this).addClass('on').siblings().removeClass('on');
			$('.dk_dl ul').eq(index).removeClass('hide').siblings().addClass('hide');
		})
	});
	$('.dk_tag span').click(function(){
		$(this).addClass('on').siblings().removeClass('on');
	})
})
</script>



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
<script type="text/javascript"> var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://"); document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Faa70c6792578150b40ad413464080efa' type='text/javascript'%3E%3C/script%3E")) </script>		