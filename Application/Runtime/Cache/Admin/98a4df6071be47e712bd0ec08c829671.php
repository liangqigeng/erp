<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>美黛拉内部管理系统</title>
    <meta name="keywords" content="Admin">
    <meta name="description" content="Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Core CSS  -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/glyphicons.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/theme.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/pages.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/plugins.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/responsive.css">

    <!-- Boxed-Layout CSS -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/boxed.css">

    <!-- Demonstration CSS -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/demo.css">

    <!-- Your Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/custom.css">

    <!-- Core Javascript - via CDN -->
    <script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/uniform.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/main.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/custom.js"></script>
    <script type="text/javascript">
        var getMsgUrl = "<?php echo U('Common:getMsg');?>";
    </script>
</head>

<body>
<!-- Start: Header -->
<header class="navbar navbar-fixed-top" style="background-image: none; background-color: rgb(240, 240, 240);">
    <div class="pull-left"> <a class="navbar-brand" href="#">
        <div class="navbar-logo"><img  src="/Public/Admin/images/csms.png" alt="logo"></div>
    </a>
    </div>

    <div class="pull-right header-btns">
        <a href=""><span class="menuicon2 iconfont">&#xe60a;</span>消息</a>
        <a href=""><span class="menuicon2 iconfont">&#xe613;</span>问题</a>
        <a href=""><span class="menuicon2 iconfont">&#xe622;</span><?php echo ($admin_name); ?></a>
        <a href="<?php echo U('Index/loginOut');?>"><span class="menuicon2 iconfont">&#xe641;</span>退出</a>
    </div>
    <div class="clear"></div>
    <div class="list">
        <div class="logo left"><a href="<?php echo U('Index/index');?>"><img class="img-responsive" src="/Public/Admin/images/logo.png" alt="美黛拉"></a></div>
        <div class="menu1 right">
            <ul class="menu1-wrap">
                <?php if(is_array($action)): $i = 0; $__LIST__ = $action;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="menu left <?php echo ($v["color"]); ?>">
                        <div class="menuicon1 iconfont">
                            <a href="<?php echo U($v['control'].'/'.$v['act']);?>"><?php echo ($v["font"]); ?></a>
                        </div>
                        <div>
                            <a href="<?php echo U($v['control'].'/'.$v['act']);?>"><?php echo ($v["name"]); ?></a>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
         </div>
    </div>
</header>
<div class="clear"></div>
<!-- End: Header -->
<!-- Start: Main -->
<div id="main" style="margin-top: 200px">
    <!-- Start: Sidebar -->
    <aside id="sidebar" class="affix">
        <div id="sidebar-search ">
            <div class="sidebar-toggle"><span class="glyphicon glyphicon-resize-horizontal"></span></div>
        </div>
        <div id="sidebar-menu">
            <ul class="nav sidebar-nav">
                <li class="menuc"><div class="menuicon1 iconfont "><a href="<?php echo U('add');?>">&#xe60f;</a></div><div><a href="<?php echo U('add');?>">问题录入</a></div></li>
                <li class="menuc"><div class="menuicon1 iconfont "><a href="">&#xe684;</a></div><div><a href="">问题检索</a></div></li>
                <li class="menuc"><div class="menuicon1 iconfont "><a href="">&#xe743;</a></div><div><a href="">领取问题</a></div></li>
                <li class="menuc"><div class="menuicon1 iconfont "><a href="">&#xe62e;</a></div><div><a href="">处理问题</a></div></li>
                <li class="menuc"><div class="menuicon1 iconfont "><a href="">&#xe667;</a></div><div><a href="">旧系统检索</a></div></li>
                <li class="menuc"><div class="menuicon1 iconfont "><a href="">&#xe63c;</a></div><div><a href="">滞留列表</a></div></li>
                <li class="menuc"><div class="menuicon1 iconfont "><a href="">&#xe662;</a></div><div><a href="">联运平台</a></div></li>
                <li class="menuc"><div class="menuicon1 iconfont "><a href="">&#xe616;</a></div><div><a href="">分类管理</a></div></li>
                <li class="menuc"><div class="menuicon1 iconfont "><a href="">&#xe62b;</a></div><div><a href="">补偿方案</a></div></li>
                <li class="menuc"><div class="menuicon1 iconfont "><a href="">&#xe60f;</a></div><div><a href="">问题录入</a></div></li>

            </ul>
        </div>
    </aside>
    <!-- End: Sidebar -->
    <!-- Start: Content -->
    <section id="content">
        <div id="topbar" class="affix">
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo U('Index/index');?>"><span class="glyphicon glyphicon-home"></span></a></li>
            </ol>
        </div>
        <div class="container">





		
		<div class="col-md-12 col-lg-12">
			<div id="docs-content">
				<h2 class="page-header margin-top-none">未处理消息</h2>
					<div class="msg_deal"></div>
				<h2 class="page-header margin-top-none">历史消息</h2>
				<input type="button" value="点我一下" class="pp">
			</div>
		</div>
    </div> 
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --></body>
<script src="/Public/Admin/js/index.js"></script>
</html>