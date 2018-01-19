<?php
	session_start();
	if($_SESSION['uname']==null){		
		header("Location: index.php");
	}
?>
<!DOCTYPE HTML>
<html>

	<head>
		<meta charset="UTF-8">
		<title>中软二手交易平台-信息发布</title>
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/ding.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css" />
		<link href="umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
        <script type="text/javascript" src="umeditor/third-party/jquery.min.js"></script>
        <script type="text/javascript" src="umeditor/third-party/template.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="umeditor/umeditor.min.js"></script>
        <script type="text/javascript" src="umeditor/lang/zh-cn/zh-cn.js"></script>
		<!--<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
		<script src="js/jquery.cookie.js" type="text/javascript"></script>-->
	</head>

	<body>
		<div id="header">
			<div class="top">
				<div class="wrap clearfix">
					<a href="#" class="logo left"><img src="img/logo.png" /></a>
					<div class="nav left dInline" id="headerMenu">
						<a href="index.php">首页</a>
						<a href="maiche_list.php">我要买</a>
						<a href="srdz.php">我要卖</a>						
						<a id="MemberMenuChange" href="huiyuan1.php" target="_self">会员中心</a>
						<a href="about.php">关于二手平台</a>
					</div>
					<span class="right" id="rightMenuHtml"> <a style="color:orange;">欢迎<?php   
		        		                     echo $_SESSION['uname'];		                     
		            ?></a><a href="#" class="b-login" id="b-login">登录</a>|<a href="#" id="b-regist">注册</a>|&nbsp;&nbsp;&nbsp;&nbsp;<img src="img/tel.png"/> </span> </div>
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
			input::-webkit-input-placeholder,
			textarea::-webkit-input-placeholder {
				color: #656565;
			}
			
			input:-moz-placeholder,
			textarea:-moz-placeholder {
				color: #656565;
			}
			
			input::-moz-placeholder,
			textarea::-moz-placeholder {
				color: #656565;
			}
			
			input:-ms-input-placeholder,
			textarea:-ms-input-placeholder {
				color: #656565;
			}
		</style>
		<div id="about" style="margin-bottom: 14%;">
			<div class="mTags">
				<div class="wrap">
					<a href="#">天软二手交易</a>>
					<a href="4.html">信息发布</a>
				</div>
			</div>
			<div class="dBox">
				<div class="dzDetail">
					<div class="wrap clearfix">
						<div class="diForm">
							<form id="dForm" name="dForm" method="post" enctype="multipart/form-data"  action="ctrl/insertsrdz.php">
								<h3>提交信息，帮您快速转出！</h3>
								<!--<h4 style="color: #166cbe;">闲置物品换成money</h4>-->
								<table>
									<tr>
										<td>
											<select class="Smakeid" name="bigname" id="bigname" placeholder="所属大类" style="width: 100%;">
												
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
											<script type="text/javascript">
												$(function(){ 
   getselect();
    $("#bigname").change(function(){ 
    	 getselect();
    	
        
    }); 
}); 
function getselect(){
	  $.post("server.php",{bigid:$("#bigname").val()},
    function(data,status){
     
      var jsonDate=eval(data); 
       var smallname = $("#smallname"); 
        $("option",smallname).remove();
     
				
				 var html = '';
				for(var i = 0; i < jsonDate.length; i++) {
					var aobj=jsonDate[i];
					html+= "<option value='"+ aobj.smalltype_id + "'>" + aobj.smalltype_name +"</option>";
					
				}
				smallname.html(html);
			
 
				
				
    });
}

											</script>
											<div id="xlselect">
		
												<select class="" name="smallname" id="smallname" placeholder="所属车型" style="width: 100%;">
													
													
												</select>
											</div>
										</td>
									</tr>
									<tr>
										<td>
											<select name="goodsps" style="width:100%;">
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
										<td><input type="text" value="" placeholder="发布时间" style="padding:0px;width: 100%;" class="form_datetime dateTxt" name="goodsdata" data-date-format="yyyy-mm"></td>
									</tr>
									<tr>
										<td><label class="f14">名称</label>
											<input name="goodsname" type="text" style="padding:0px;width: 100%;" class="ysTxt" >				
									    </td>
									    <td></td>
									</tr>
									<tr>
										<td><label class="f14">价格</label>
											<input name="goodsprice" type="text" style="padding:0px" class="ysTxt" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" />
											<label> 元</label>&nbsp;&nbsp;&nbsp;&nbsp;

										</td>
										<td></td>
									</tr>
									<tr>
										<td>
											<label> 图片</label><input type="file" name="goodsimg" id="goodsimg" value="" />
										</td>         
										<!--<td colspan="2"><textarea name="goodsinfo" class="f14" placeholder="其他要求（例如外观、颜色、几成新等）" style="width: 98%;"></textarea></td>-->
									</tr>
									<tr>
										<td colspan="2">
											<script type="text/plain" name="goodsinfo" id="myEditor" style="width:70%;height:240px;">
												
											</script>
											<script type="text/javascript">
												//实例化编辑器
												var um = UM.getEditor('myEditor');
											</script>
											
										</td>
									</tr>
									<tr>
										<td colspan="2" style="text-align:right;">
											<input type="submit" value="立即发布" class="btn"/>
										</td>
									</tr>									
								</table>
								<div id="umditor"  style="height:240px;">
									<img src="img/sdrz1.png" style="float: right;">
								</div>

							</form>
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
		<script type="text/javascript" src="js/miniBar.js"></script>
		<script type="text/javascript" src="js/lg_reg.js"></script>
		<script language="javascript" type="text/javascript" src="datepicker/WdatePicker.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-datetimepicker.css">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script type="text/javascript">
			$('.form_datetime').datetimepicker({
				format: 'yyyy-mm',
				language: "zh-CN",
				startView: 3,
				minView: 3,
				autoclose: true
			});
		</script>
		<script type="text/livescript">
			$("#sendMESS").live("click", function() {
				var ckmobile = $("#ckmobile").val();
				if(ckmobile) {
					$("#yzcode").attr("src", '/Admin/Login/buildVerify');
					$('#popBoxYzm').fadeIn();
				} else {
					sendtosend();
				}
			});

			function sendtosend() {
				if($('#remembermobile').attr('checked')) {
					remember = 2;
				} else {
					remember = '';
				}
				var mobile = $("#shoujihao").val();
				var verify = $("#yanzhengma").val();
				var re = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
				if(!re.exec(mobile)) {
					alert("手机号格式不正确");
					$("#shoujihao").focus();
					return false;
				} else {
					$("#input-phone").val(mobile);
					$("#input-verify").val(verify);
					$('#popBoxYzm').fadeOut();
					$('#dForm').submit();
				}
			}
		</script>
		<style>
			.dzDetail {
				/*height: 492px;*/
				width: 100%;
				/*				background: url(img/srdz.png) no-repeat center top;*/
			}
			
			.diForm {
				float: right;
				width: 100%;
				/*height: 432px;*/
			}
			
			.dzLeft {
				font-size: 14px;
				color: #166cbe;
				width: 415px;
				line-height: 20px;
				margin-top: 150px;
			}
			
			.dzLeft strong {
				font-size: 40px;
				display: block;
				padding-bottom: 15px;
			}
			
			.diForm table textarea {
				width: 300px;
				padding: 5px;
				height: 60px;
			}
			
			.diForm table {
				width: 30%;
				float: left;				
				/*margin-top:4%;*/
			}
			
			.diForm #umditor {
				width: 60%;
				height:300px;
				float: left;
				
			}
			
			.diForm form {
				padding: 0px 44px 0 44px;
				margin-top: 25px;
			}
			
			.diForm form h3 {
				font-weight: normal;
				font-size: 18px;
				color: #166cbe;
				text-align: left;
				padding-bottom: 13px;
			}
			
			.diForm table td {
				padding-bottom: 0;
				color: #656565;
				height: auto;
				padding: 7px 0;
			}
			
			.diForm table .dateTxt {
				padding-left: 4px;
				width: 303px;
			}
			
			.diForm table .btn {
				font-size: 16px;
				width: 165px;
				margin: 0;
			}
		</style>
	</body>
</html>