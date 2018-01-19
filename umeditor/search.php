<?php
$con=mysqli_connect("localhost","root","root","tjise_trade");
	if(mysqli_connect_errno()){
		echo "链接失败：".mysqli_connect_error();
	}
	$keyword=$_POST['keyword'];
	mysqli_query($con, "set names utf8");
	$result=mysqli_query($con,"SELECT * FROM goods WHERE goods_name LIKE '%".$keyword."%'");
	$sql="select * from smalltype";
	$resultsmall=$con->query($sql);
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>天软二手_价格_图片</title>
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/pro.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	</head>

	<body>
		<div id="header">
			<div class="top">
				<div class="wrap clearfix">
					<a href="#" class="logo left"><img src="img/logo.png"></a>
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
                </span> </div>
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
		<style>
			/*.s-form { margin-top:5px;}*/
			
			.toselect {
				background-color: rgb(64, 100, 156);
				color: #FFF
			}
		</style>
		<div id="about">
			<div class="wrap text-left">
				<div class="carfliter-box">
					<div class="condition">
						<ul>
							<li class=""> <span class="c-name left">所属：</span>
								<div class="spec-moudle left dInline">
									<a href="#">数码</a>
									<a href="#">家具家电</a>
									<a href="#">服装箱包</a>
									<a href="#">美容保健</a>
									<a href="#">文体户外</a>
								</div>
							</li>
							<li class=""> <span class="c-name left">价格：</span>
								<div class="spec-moudle left dInline">
									<a href="#">500以内</a>
									<a href="#">500-1000</a>
									<a href="#">1000-2000</a>
									<a href="#">2000-3000</a>
									<a href="#">3000-4000</a>
									<a href="#">4000-5000</a>
									<a href="#">5000-1万</a>
									<a href="#">1万以上</a>
									<div class="pro_smore">
										<div class="clearfix ps-b">
											<table>
												<tr>
													<td><input type="text" class="sTxt" id="price_L" value="" /></td>
													<td>-</td>
													<td><input type="text" class="sTxt" id="price_R" value="" /></td>
													<td>万元</td>
													<td><input type="submit" value="确定" class="sBtn" id="tjprice" style="line-height:10px" /></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</li>
							<li class="" style="height:48px;"> <span class="c-name left">类型：</span>
								<div class="spec-moudle left dInline" style="height:auto;">
									<?php while($row=mysqli_fetch_array($resultsmall)){?>
									<a href="<?php echo "maiche_list1.php?sc_id=".$row['smalltype_id']?>"><?php echo $row['smalltype_name']?></a>
								<?php }?>
								</div>
							</li>
							<li class=""> <span class="c-name left">使用年限：</span>
								<div class="spec-moudle left dInline">
									<a href="#" id="0-1">3月以内</a>
									<a href="#" id="0-2">半年以内</a>
									<a href="#" id="0-3">1年以内</a>
									<a href="#" id="3-5">1-2年</a>
									<a href="#" id="5-0">2年以上</a>
									<div class="pro_smore">
										<div class="clearfix ps-b">
											<table>
												<tr>
													<td><input type="text" class="sTxt" id="cheling_L" value="" /></td>
													<td>-</td>
													<td><input type="text" class="sTxt" id="cheling_R" value="" /></td>
													<td>年</td>
													<td><input type="submit" value="确定" class="sBtn" id="tjcheling" style="line-height:10px" /></td>
												</tr>
											</table>
										</div>
									</div>
								</div>
							</li>
							<li class=""> <span class="c-name left">标准：</span>
								<div class="spec-moudle left dInline">
									<a href="#" id="1" onclick="changeload('pl',this.id)">5成新以下</a>
									<a href="#" id="2" onclick="changeload('pl',this.id)">5-6成新</a>
									<a href="#" id="2" onclick="changeload('pl',this.id)">6-7成新</a>
									<a href="#" id="2" onclick="changeload('pl',this.id)">7-8成新</a>
									<a href="#" id="2" onclick="changeload('pl',this.id)">8-9成新</a>
									<a href="#" id="2" onclick="changeload('pl',this.id)">9-10成新</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="aWrap clearfix wrap">
				<div class="left dInline aLeft">
					<div class="carSou">
						<div class="cs-list">
							<ul>
								<?php
			               while($row=mysqli_fetch_array($result)){
			            ?>
								<li class="clearfix" style="position: relative;"> <span class="carImg left dInline">
            <a href="details.php?goodsid=<?php echo $row['goods_id']?>" target="_blank">
              <div class="car_bg"> </div>
              <img src="<?php echo $row['goods_img'];?>"  width="300" /></a> </span>
									<div class="carTxt right dInline" style="margin-top: 10px;">
										<h2><a href="details.php?goodsid=<?php echo $row['goods_id']?>" target="_blank"><?php echo $row['goods_name'];?></a></h2>
										<div class="price clearfix" style="margin:8px 0;">
											<div class="left dInline pNum" style="width:110px;">
												<font>一口价</font><br/>
												<span class="num nBlue"><?php echo $row['goods_price'];?></span>
												<font> 元</font>
											</div>
										</div>
										<div class="cs_bt clearfix" style="padding-top:7px;">
											<a href="details.php?goodsid=<?php echo $row['goods_id']?>" class="cs-q b-login" id="Order_1165">查看详情</a>
											<a href="" class="b-login" id="collection_1165">收藏</a>
											<span><?php echo $row['goods_data'];?></span>
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
								<a href="#">>></a>
								<a href="#">32</a>
							</div>
						</div>
					</div>
				</div>
				<div class="right dInline aRight">
					<div class="dBox">
						<link rel="stylesheet" type="text/css" href="css/alert.css">
						<style type="text/css">
							input::-webkit-input-placeholder,
							textarea::-webkit-input-placeholder {
								color: #000;
							}
							
							input:-moz-placeholder,
							textarea:-moz-placeholder {
								color: #000;
							}
							
							input::-moz-placeholder,
							textarea::-moz-placeholder {
								color: #000;
							}
							
							input:-ms-input-placeholder,
							textarea:-ms-input-placeholder {
								color: #000;
							}
						</style>
						<form class="dForm" name="dForm" id="dForm" method="post" enctype="multipart/form-data" action="ctrl/insertsrdz.php">
							<h2>快速发布</h2>
							<p></p>
							<table>
								<tr>
									<td>
										<select class="Smakeid" name="bigname" id="" placeholder="所属类别">
											<option value=""> 选择大类（必选）</option>
											<?php
     include 'ctrl/conn.php';//连接数据库
     $sql="select * from bigtype";
     $r=$conn->query($sql);
     $attbig=$r->fetch_all();
     //数组的遍历
     foreach ($attbig as $v){
             echo "<option value='".$v[0]."'>".$v[1]."</option>";
     }
     ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<div id="xlselect">
											<select name="smallname">
												<option>选择小类(必选)</option>
												<?php
     include 'ctrl/conn.php';//连接数据库
     $sql="select * from smalltype";
     $r=$conn->query($sql);
     $attsmalltype=$r->fetch_all();
     //数组的遍历
     foreach ($attsmalltype as $v){
         //小类表的大类名称与大类表的大类名称进行比较
       echo "<option value='".$v[0]."'>".$v[1]."</option>";
     }
     ?>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<select name="goodsps">
											<option value="不限">选择使用年限</option>					
											<?php
    $goodsps=array("1"=>"3个月以内","2"=>"半年以内","3"=>"1年以内","4"=>"1-2年","5"=>"2年以上");
     //数组的遍历
     foreach ($goodsps as $key=>$value){
             echo "<option value='".$value."'>".$value."</option>"; 
     }
     ?>
										</select>
									</td>
								</tr>
								<tr>
									<td><input type="text" value="" placeholder="发布时间" style="height: 12px;width: 100%;" class="form_datetime dateTxt" name="goodsdata" data-date-format="yyyy-mm"></td>
								</tr>
								<tr>
									<td>
									    <input name="goodsname" type="text" placeholder="名称" style="height: 12px;width: 100%;"  >				
								    </td>
								   
								</tr>
								<tr>
									<td>
										<input name="goodsprice" type="text" placeholder="价格" style="height: 12px;width: 40%;"> 元										
									</td>
									
								</tr>
								<tr>
									<td>
										<label>图片</label><input type="file" name="goodsimg" id="goodsimg" value="" />
									</td>         									
								</tr>
								<tr>
									<td colspan="2" style="text-align:right;">
											<input type="submit" value="立即发布" class="btn"/>
								    </td>
								</tr>
							</table>
						</form>
					</div>

					<style type="text/css">
						.sameCar {
							margin-top: 20px;
							padding-bottom: 15px;
							border: 1px solid #ccc;
							border-top: none;
						}
						
						.sameCar h4 {
							font-size: 14px;
							color: #fff;
							padding: 10px;
							background: #3F7DDD;
						}
						
						.sameCar ul {}
						
						.sameCar li {
							line-height: 20px;
							margin: 0px 10px;
							border-bottom: 1px solid #ccc;
							padding: 5px 0;
						}
						
						.nav_fixed {
							position: fixed;
							top: 0px;
							z-index: 10;
						}
						
						* html .nav_fixed {
							position: absolute;
							bottom: auto;
							top: expression(eval(document.documentElement.scrollTop));
						}
						
						#header {
							position: absolute;
						}
						
						#d_gd,
						.gd_box {
							width: 253px;
							overflow: hidden;
						}
					</style>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(function() {
				$(window).scroll(function() {
					/*var amNavTop= $('#d_gd').offset().top;*/
					var b = $(window).scrollTop();
					if(b >= amNavTop) {
						$('#d_gd').find('.gd_box').addClass('nav_fixed');
					} else {
						$('#d_gd').find('.gd_box').removeClass('nav_fixed');
					};

				});
			})
		</script>
		<footer>
			<div class="banquan01">版权所有 天津市大学软件学院
				<br>地址：天津市西青区宾水西道399号 | 邮编：300387
				<br>津ICP备10200771号 | 津教备0499号 | 服务热线：022-5856-5050 						
			</div>
			<div class="banquan02">
				<img src="img/footer.jpg">
			</div>			
		</footer>
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