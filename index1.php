<!DOCTYPE HTML>
<?php
	$con=mysqli_connect("localhost","root","root","tjise_trade");
	if(mysqli_connect_errno()){
		echo "链接失败：".mysqli_connect_error();
	}
	mysqli_query($con, "set names utf8");
	$result=mysqli_query($con,"SELECT * FROM goods WHERE examine='通过' order by goods_id desc limit 1");
    $result1=mysqli_query($con,"SELECT * FROM goods WHERE examine='通过' order by goods_id desc limit 2,4");
    $result2=mysqli_query($con,"SELECT * FROM goods WHERE examine='通过' order by goods_id desc limit 5,1");
    $result3=mysqli_query($con,"SELECT * FROM goods WHERE examine='通过' order by goods_id desc limit 6,4");
    $result4=mysqli_query($con,"SELECT * FROM goods where examine='通过' and smalltype_id=".$_GET['sc_id']." limit 4");
    $sql="select * from smalltype limit 8";
	$resultsmall=$con->query($sql);
    $sql1="select * from smalltype limit 12";
	$resultsmall1=$con->query($sql1);
?>
<html>

	<head>
		<meta charset="UTF-8">
		<title>天软二手交易平台</title>
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css"/>
		<link rel="stylesheet" type="text/css" href="css/texiao.css"/>
		<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	</head>

	<body>
		<div id="header">
			<div class="top">
				<div class="wrap clearfix">
					<a href="#" class="logo left"><img src="img/leftlogo.png" /></a>
					<div class="nav left dInline" id="headerMenu">
						<a class="on" href="index.html"><img src="img/leftlogo.png" /></a>
						<a href="index.php">首页</a>
						<a href="maiche_list.php">我要买</a>
						<a href="srdz.php">我要卖</a>						
						<a id="MemberMenuChange" href="huiyuan1.php" target="_self">会员中心</a>
						<a href="about.php">关于二手平台</a>
					</div>
					<span class="right" id="rightMenuHtml">
						<a style="color:orange;">欢迎<?php   
		                     session_start();
		                     echo $_SESSION['uname'];
		                    
		            ?></a>
				<a href="#" class="b-login" id="b-login">登录</a>|<a href="#" id="b-regist">注册</a>|&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/phone.png"/>			
                </span> </div>
			</div>
			<div class="head-search">
				<div class="wrap clearfix">
					<div class="yjxj clearfix left" action="search.php" method="post" enctype="multipart/form-data">
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

		<div id="banner">
			<div class="banShow clearfix" style="width:100%;">
				<a href="#" class="bDiv" style="background: url(img/banner1.jpg) no-repeat center top;"></a>				
			</div>
			<div class="searchBox">
				<div class="xbg"></div>
				<div class="xnrj">
					<form class="clearfix" action="search.php" method="post" enctype="multipart/form-data">
						<input type="text" maxlength="" name="keyword" placeholder="请输入您想要的二手物品" class="left" />
						<input type="submit" value="" class="right" />
					</form>
				</div>
			</div>

		</div>
		<div id="choose-nav">
			<div class="wrap clearfix">
				<!-- 品牌 -->
				<div class="item-brand c-item">
					<div class="trigger-icon"></div>
					<div class="brand-wrapper">
						<div class="hd cBlue">二手分类</div>
						<div class="bd clearfix">
							<?php while($row=mysqli_fetch_array($resultsmall1)){?>
									<a href="<?php echo "maiche_list1.php?sc_id=".$row['smalltype_id']?>"> <?php echo $row['smalltype_name']?></a>
								<?php }?>
						</div>
					</div>
				</div>

				<div id="choose_model" class="item-model c-item">
					<div class="trigger-icon"></div>
					<div class="model-wrapper">
						<div class="hd cBlue">捡漏</div>
						<div class="bd">
							<a href="" class="model-item" target="_blank">
								七折转手</a>
							<a href="#" class="model-item" target="_blank">
								仅此一件</a>
							<a href="#" class="model-item" target="_blank">
								数码极客</a>
							<a href="#" class="model-item" target="_blank">
								超性价比</a>
							<a href="#" class="model-item" target="_blank">
								壕的世界</a>
							<a href="#" class="model-item" target="_blank">
								天软周边								
							</a>
						</div>
					</div>
				</div>
				<!-- 价格 -->
				<div class="item-price">
					<div class="hd cBlue">价格</div>
					<div class="bd">
						<a target="_blank" href="jg0-30.html" class="price-item" style="width:auto">10元以下</a>
						<a target="_blank" href="jg30-50.html" class="price-item" style="width:auto">10-100元</a>
						<a target="_blank" href="jg50-100.html" class="price-item" style="width:auto">100元-1000元</a>
						<a target="_blank" href="jg100-0.html" class="price-item" style="width:auto">1000元以上</a>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div id="main">
			<div class="main-a mDiv" id="box1">
				<div class="wrap">
					<div class="in-tit clearfix">
						<h1 class="left dInline"> 热门推荐 </h1>
					</div>
					<div class="inBox clearfix">
						<div class="thPic left dInline pve tBox pic">
							<?php
			               while($row=mysqli_fetch_array($result)){
			            ?>
			                
							<a href="details.php?goodsid=<?php echo $row['goods_id']?>" target="_blank">
								<div class="mb">
			                	    <p><?php echo $row['goods_name']?></p>
			                	    <p><?php echo $row['goods_price']?> 元</p>
			                	    <p>欲购从速呦~</p>
			                    </div>
							    <img src="<?php echo $row['goods_img']?>" height="100%" class="imgVt" /> <span class="icon icon_th"></span> 
							</a>
						<?php
                             }
   	                     ?>	
						</div>
						<div class="tBox right pve dInline thPicRight">
							<div class="thPic1 left dInline pve">
								<ul class="clearfix">
									<?php
			               while($row=mysqli_fetch_array($result1)){
			            ?>
									<li class="pve">
										<a href="details.php?goodsid=<?php echo $row['goods_id']?>" target="_blank"> <span class="icon icon_th"></span>
											<div class="car-pic"> <img src="<?php echo $row['goods_img']?>" height="90%" /> </div>
											<div class="price">
												<font>一口价</font> <span class="num nBlue"><?php echo $row['goods_price']?> </span>
												<font>&nbsp;&nbsp;元</font>
											</div>
											<p><?php echo $row['goods_name']?>											
									</li>
                         <?php
                             }
   	                     ?>									
								</ul>
							</div>
							<div class="pve right dInline hdPic">
								<a href="pp96_/ord/sta.html" target="_blank"> <img src="img/right1.jpg" class="imgVt" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mDiv" id="box2">
				<div class="wrap">
					<div class="in-tit clearfix">
						<h1 class="left dInline"> 最新发布 </h1>
					</div>
					<div class="inBox clearfix">
						<div class="tBox left pve dInline thPicRight">
							<div class="thPic1 left dInline pve">
								<ul class="clearfix">
									<?php
			               while($row=mysqli_fetch_array($result3)){
			            ?>
									<li class="pve">
										<a href="details.php?goodsid=<?php echo $row['goods_id']?>" target="_blank">
											<div class="car-pic"> <img src="<?php echo $row['goods_img']?>" height="228"> </div>
										</a>
									</li>
						<?php
                             }
   	                     ?>	
   	                                <li class="pve liHd">
										<a href="Cars/index/channel/2/id/949.html" target="_blank"> <img src="img/chang1.jpg" class="imgVt" width="480px" height="226px" /> </a>
									</li>
								</ul>
							</div>
						</div>
						<div class="thPic right dInline pve tBox pic">
							<?php
			               while($row=mysqli_fetch_array($result2)){
			            ?>
							<a href="details.php?goodsid=<?php echo $row['goods_id']?>" target="_blank">
								<div class="mb">
			                	    <p><?php echo $row['goods_name']?></p>
			                	    <p>只需 <?php echo $row['goods_price']?> 元 即可拿到</p>
			                	    <p>还不赶紧剁手？！</p>
			                    </div>
							    <img src="<?php echo $row['goods_img']?>" height="100%" class="imgVt" /> <span class="icon icon_th"></span> 
							</a>
							<?php
                             }
   	                     ?>	
						</div>
					</div>
				</div>
			</div>

			<div class="mDiv main-a">
				<div class="wrap">
					<div class="in-tit clearfix">
						<h1 class="left dInline"> 热门分类 </h1>
					</div>
					<div class="jpBox">
						<div class="jpTit">
							<!--<a> <img src="img/cLogo.png" /> <span>分类</span> <i></i></a>
							<a> <img src="img/book.png" width="50" height="38" /> <span>图书音像</span> <i></i></a>
							<a> <img src="img/ele.png" width="50" height="38" /> <span>电子产品</span> <i></i></a>
							<a> <img src="img/beautify.png" width="50" height="38" /> <span>美容保健</span> <i></i></a>
							<a> <img src="img/outdoor.png" width="50" height="38" /> <span>文体户外</span> <i></i></a>
							<a> <img src="img/custume.png" width="50" height="38" /> <span>服装衣帽</span> <i></i></a>
							<a> <img src="img/life.png" width="50" height="38" /> <span>生活用品</span> <i></i></a>
							<a class="last"> <img src="img/1.png" width="50" height="38" /> <span>其他分类</span> <i></i></a>-->
							<?php while($row=mysqli_fetch_array($resultsmall)){?>
									<a href="<?php echo "index1.php?sc_id=".$row['smalltype_id']?>"><?php echo $row['smalltype_name']?></a>
								<?php }?>
						</div>
						<div class="jpCont">
							<div class="jpDl" style="display: block;">
								<ul class="clearfix">
								<?php
			               while($row=mysqli_fetch_array($result4)){
			            ?>	
									<li class="clearfix" style="position: relative;">
										<a href="details.php?goodsid=<?php echo $row['goods_id']?>" target="_blank">
											<div class="carImg left dInline transf">
												<img src="<?php echo $row['goods_img']?>" height="92%" />
											</div>

											<div class="right carTxt dInline pve">
												<div class="c-txt">
													<h3>
                     <a href="#" target="_blank"><?php echo $row['goods_name']?></a>
                    </h3>

													<p><?php echo $row['goods_data']?> | <?php echo $row['goods_ps']?></p>
													<div class="price">
														<p>一口价：</p>
														<i>￥</i> <span class="num nBlue"><?php echo $row['goods_price']?> </span>
														<font> 元</font>
														<!--<font> 省：￥ 2000 元</font>-->
													</div>

												</div>
											</div>

										</a>
									</li>
                              <?php
                              }
   	                           ?>									
								</ul>
								<div class="proMore">
									<a href="maiche_list.php" target="_blank">查看更多>></a>
								</div>
							</div>

							<!--<div class="jpDl">
								<ul class="clearfix">
									<li class="clearfix" style="position: relative;">
										<a href="#" target="_blank">
											<div class="carImg left dInline"> <img src="img/fenlei.jpg" width="266" /> </div>
											<div class="right carTxt right dInline pve">
												<div class="c-txt">
													<h3>
                     <a href="#" target="_blank">二手ipad</a>
                    </h3>

													<p>2017-10 | ipad air | 64G | 国行</p>
													<div class="price">
														<p>一口价：</p>
														<i>￥</i> <span class="num nBlue">1299 </span>
														<font> 元</font>
														<font> 省：￥ 2000 元</font>
													</div>

												</div>
											</div>
										</a>
									</li>

									<li class="clearfix" style="position: relative;">
										<a href="#" target="_blank">
											<div class="carImg left dInline"> <img src="img/fenlei.jpg" width="266" /> </div>
											<div class="right carTxt right dInline pve">
												<div class="c-txt">
													<h3>
                     <a href="#" target="_blank">二手ipad</a>
                    </h3>

													<p>2017-10 | ipad air | 64G | 国行</p>
													<div class="price">
														<p>一口价：</p>
														<i>￥</i> <span class="num nBlue">1299 </span>
														<font> 元</font>
														<font> 省：￥ 2000 元</font>
													</div>

												</div>
											</div>
										</a>
									</li>

								</ul>
								<div class="proMore">
									<a href="#" target="_blank">查看更多>></a>
								</div>
							</div>-->

						</div>
					</div>
				</div>
			</div>
		</div>

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


