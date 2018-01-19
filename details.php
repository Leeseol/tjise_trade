<!DOCTYPE HTML>
<?php
	$conn=mysqli_connect("localhost","root","root","tjise_trade");
	if(mysqli_connect_errno()){
		echo "链接失败：".mysqli_connect_error();
	}
	mysqli_query($conn, "set names utf8");
	$result=mysqli_query($conn,"select goods_id,goods_img,goods_info,goods_name,goods_price,goods_data,goods_ps,users.users_name,users.users_phone,smalltype.smalltype_name,address.address_name FROM goods,users,smalltype,address where smalltype.smalltype_id=goods.smalltype_id and goods.users_id=users.users_id and users.address_id=address.address_id and goods_id=".$_GET['goodsid']);
?>
<html>
<head>
<meta charset="UTF-8">
<title>天软二手物品详情</title>
<link rel="stylesheet" type="text/css" href="css/base.css">
<link rel="stylesheet" type="text/css" href="css/layout.css">
<link rel="stylesheet" type="text/css" href="css/pro.css">
<link rel="stylesheet" type="text/css" href="css/alert.css">
<!--<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css">
<link rel="stylesheet" type="text/css" href="css/jquery.ad-gallery.css">-->
<link rel="stylesheet" href="css/quanju.css" type="text/css" media="all">
	<link rel="stylesheet" type="text/css" href="css/footer.css" />
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="admin/js/xiangqing3D.js" ></script>


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
<style type="text/css">
#header{position:absolute;}
.nav_fixed{position:fixed;top:0px;}
* html .nav_fixed{position:absolute;bottom:auto;top:expression(eval(document.documentElement.scrollTop));}
.mTags span.right{font-size:14px;padding-top:4px;display:inline-block;}
.mTags span.right a{font-size:14px;color:#f60;}
.l_dizhi{height:35px; line-height:35px;}
.l_dizhi img{vertical-align: middle;position:relative;top:-1px;}
#jShow{position:absolute;left:0;top:0;color:#fff;background:#d00;width:20px;text-align: center;z-index: 100;padding:10px;font-size:18px;font-weight: bold;}
.tp{
	perspective: 800px;
	border-radius: 5px;
	transform-style: preserve-3d;
	transform-origin: 50% 50%;
	transform: rotateY(0deg) rotateX(0deg);
}
 .br_hide{
            text-decoration:none;
        }
               
        .br_hide g{
            animation:first1 5s linear infinite;
            stroke:#155497;
            opacity: 0.8;
            stroke-width:6;
            /*-moz-animation:first1 5s linear;
            -webkit-animation:first1 5s linear;*/
            animation-iteration-count:infinite;
        }
        @-moz-keyframes first1
        {
            0%   {stroke-dasharray: 0%, 500%;stroke-dashoffset: 0%;}
            100%  {stroke-dasharray: 500%, 0%;stroke-dashoffset: 0%;}
        }
        @-webkit-keyframes first1
        {
            0%   {stroke-dasharray: 0%, 500%;stroke-dashoffset: 0%;}
            100%  {stroke-dasharray: 500%, 250%;stroke-dashoffset: 0%;}
        }
</style>
<div id="about">
	<?php
			    while($row=mysqli_fetch_array($result)){
			  ?>
  <div class="mTags wrap"> <a href="#">天软二手交易平台</a>><a href="#">我要买</a>><a href="#"><?php echo $row['smalltype_name'];?>  >  <?php echo $row['goods_name'];?></a></div>
  <div class="wrap clearfix buyTop" style="padding-bottom:40px;">
    <div class="left dInline " style="width:592px;height: 400px;" >
    	    <a class="img_a br_hide">
    		<!--<img class="tp" src="<?php echo $row['goods_img'];?>" style="height: 100%;width: 95%;">-->
    			 <svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="100%" width="90%">
        <image xlink:href="<?php echo $row['goods_img'];?>" x="0" y="0" height="100%" width="100%" preserveAspectRatio="none" class="tp"/> 
        <g fill="none" >
            <rect width="100%" height="100%"/>
        </g>
    </svg>
    			
    		</a> 
    		    
    </div>
    <div class="buyTxt right dInline">
      <h1><?php echo $row['goods_name'];?></h1>
      <div class="byDl clearfix">
        <div class="price" style="width:235px;">
          <p>天软一口价：</p>
          <span class="num nBlue"> <?php echo $row['goods_price'];?></span> <font>元</font>
          
        </div>
        <div class="right dInline jPrice" style="line-height:22px;"> 天软二手平台不接受分期付款方案<br/>
         不接受砍价<br/>
          <!--<a id="dBtn" style="display:block;" href="#showdiv"> <img src="images/btn1.png" width="18" /> 计算分期详情 </a> --></div>
      </div>
      <div class="byDl clearfix byDl_tab"> <span class="left bItem">
        <div> 发布时间
          <p><?php echo $row['goods_data'];?></p>
        </div>
        </span> <span class="left bItem">
        <div> 发布人
          <p><?php echo $row['users_name'];?></p>
        </div>
        </span> <span class="left bItem">
        <div> 联系方式
          <p><?php echo $row['users_phone'];?></p>
        </div>
        </span> <span class="left bItem">
        <div> 使用年限
          <p><?php echo $row['goods_ps'];?></p>
        </div>
        </span> </div>
      <div class="byBtn clearfix"> <a class="by_qd" href="order.php?goodsid=<?php echo $row['goods_id']?>" >立即购买</a> 
        <div class="jiathis_style_32x32"> <a href="http://www.jiathis.com/share?uid=2069164" title="收藏" class="jiathis " style="text-decoration:none; text-align:center;display:inline-block;height:35px;  margin-right:12px">收藏</a> </div>       
      </div>
      <div class="b_ly clearfix">
        <div class="l_dizhi" style="line-height:35px;font-size:13px;;"> 地址：<?php echo $row['address_name'];?>　 </div>
      </div>
    </div>
  </div>

  <div class="wrap">
    <div class="buyDetail">
      <div class="b_tab_nav">
        <div class="b-tab"> <a class="on b_ta" href="#cBox1" data-scroll data-speed="1000">基本信息<i></i></a></div>
      </div>
      <div class="b-cont">
        <div id="cBox1" class="c_box">
          <h2><?php echo $row['goods_name'];?></h2>
          <div class="cbox-a">
            <div class="ca-dl"> <span class="caItem on">详细描述</span>
              <div class="clearfix">
                <table>
                  <tr>
                    <td colspan="8">
                    	<?php echo $row['goods_info'];?>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>   
      </div>
    </div>
  </div>
  <?php
    }
   ?>	
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