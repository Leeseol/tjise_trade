<!DOCTYPE html>
<head>
<title>网站后台管理后台</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap-3.3.4-dist/css/bootstrap.css"/>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link href="../umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="../umeditor/third-party/jquery.min.js"></script>
    <script type="text/javascript" src="../umeditor/third-party/template.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../umeditor/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../umeditor/umeditor.min.js"></script>
    <script type="text/javascript" src="../umeditor/lang/zh-cn/zh-cn.js"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <a href="index.html" class="logo">
        天软二手交易平台
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<span class="username">
							   欢迎登录
							</span>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu extended logout">
							<!--<li>
								<a href="registration.html"><i class="fa fa-cog"></i> 注册</a>
							</li>-->
							<li>
								<a href="login.php"><i class="fa fa-key"></i> 登录</a>
							</li>
							<li>
								<a href="login.php"><i class="fa fa-key"></i>退出</a>
							</li>
						</ul>
		</li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li class="sub-menu">
                    <a class="active" href="javascript:;">
                        <i class="fa fa-user"></i>
                        <span>用户管理</span>
                    </a>
                    <ul class="sub">
                        <li><a href="userslist.html">普通用户管理</a></li>
                        <li><a href="adminlist.html">管理员管理</a></li>
                        <li><a href="addresslist.html">用户地址管理</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="active" href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>商品类别管理</span>
                    </a>
                    <ul class="sub">
                        <li><a href="protypelistbig.html">商品大类管理</a></li>
                        <li><a href="protypelistsmall.html">商品小类管理</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="active" href="javascript:;">
                        <i class="fa fa-print"></i>
                        <span>商品管理</span>
                    </a>
                    <ul class="sub">
                        <li><a href="goodslist.html">商品列表管理</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a class="active" href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>订单管理</span>
                    </a>
                    <ul class="sub">
                        <li><a href="orderslist.html">订单管理</a></li>
                    </ul>
                </li>
            </ul> 
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      添加商品
    </div>
    <div class="row w3-res-tb">
    </div>
    <div class="table-responsive">
     <div style="margin: 5px;">
     <form action="ctrl/insertgoods.php" role="form" method="post" enctype="multipart/form-data">
    <input type="hidden" class="form-control" name="goodsid" value=""/>
   <div class="form-group has-success has-feedback">
      <label class="control-label" for="goodsimg">商品图片：</label>
      <input type="file" class="form-control" name="goodsimg" value=""/>
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
   </div>
    <div class="form-group has-warning has-feedback">
      <label class="control-label" for="goodsInfo">商品介绍</label>
      <script type="text/plain" name="goodsInfo" id="myEditor" style="width:1000px;height:240px;">
      
      </script>
      <script type="text/javascript">
      //实例化编辑器
       var um = UM.getEditor('myEditor');
      </script>
      <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
    </div>   
     <div class="form-group has-warning has-feedback">
      <label class="control-label" for="goodsname">商品名：</label>
      <input type="text" class="form-control" name="goodsname" value=""/>
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
    </div> 
    <div class="form-group has-success has-feedback">
      <label class="control-label" for="goodsprice">商品价格：</label>
      <input type="text" class="form-control" name="goodsprice" value=""/>
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
    </div> 
     <div class="form-group has-warning has-feedback">
      <label class="control-label" for="goodsdata">商品发布日期：</label>
      <input type="date" class="form-control" name="goodsdata" value=""/>
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
    </div> 
    <div class="form-group has-warning has-feedback">
      <label class="control-label" for="goodsps">商品备注：</label>
      <input type="text" class="form-control" name="goodsps" value=""/>
      <span class="glyphicon glyphicon-ok form-control-feedback"></span>
    </div>     
     <label class="control-label" for="smallname">所属类别：</label>
     <select class="form-control" name="smallname">
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
    <label class="control-label" for="username">发布人：</label>
     <select class="form-control" name="username">
     <?php
     include 'ctrl/conn.php';//连接数据库
     $sql="select * from users";
     $r=$conn->query($sql);
     $attusers=$r->fetch_all();
     //数组的遍历
     foreach ($attusers as $v){
         //小类表的大类名称与大类表的大类名称进行比较
       echo "<option value='".$v[0]."'>".$v[1]."</option>"; 
     }
     ?>
     </select>
     <label class="control-label" for="examine">审核状态：</label>
     <select class="form-control" name="examine">
     <?php
    $examine=array("1"=>"通过","2"=>"未通过");
     //数组的遍历
     foreach ($examine as $key=>$value){
             echo "<option value='".$value."'>".$value."</option>"; 
         }    
     ?>
     </select>
    <input type="submit" class="btn btn-success" value="添加"/>
   </form>
     </div>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>
 <!-- footer -->
		  <!--<div class="footer">
			<div class="wthree-copyright">
			  <p>Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></p>
			</div>
		  </div>-->
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
