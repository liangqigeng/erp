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
<!-- End: Header -->
<!-- Start: Main -->
<div id="main">
    <!-- Start: Sidebar -->
    <aside id="sidebar" class="affix">
        <div id="sidebar-search">
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


<style>
    #upload{
        opacity:0;
    }
    #img{
        display:block;
        border:1px solid #999;
        height:200px;
        width:200px;
        text-align:center;
        margin-top:-20px;

    }
    ::-webkit-datetime-edit { padding: 1px; }
    ::-webkit-datetime-edit-fields-wrapper { background-color: #eee; }
    ::-webkit-datetime-edit-text { color: #4D90FE; padding: 0 .3em; }
    ::-webkit-datetime-edit-year-field { color: purple; }
    ::-webkit-datetime-edit-month-field { color: blue; }
    ::-webkit-datetime-edit-day-field { color: green; }
    ::-webkit-inner-spin-button { visibility: hidden; }
    ::-webkit-clear-button{ visibility: hidden; }
    ::-webkit-calendar-picker-indicator {
        border: 1px solid #ccc;
        border-radius: 2px;
        box-shadow: inset 0 1px #fff, 0 1px #eee;
        background-color: #eee;
        background-image: -webkit-linear-gradient(top, #f0f0f0, #e6e6e6);
        color: #666;
    }
    input[type=date] {
        -webkit-appearance: none;
    }

</style>

	 <div class="row">
        <div class="col-md-10 col-lg-8 center-column">
        <form action="" method="post" class="cmxform" enctype="multipart/form-data">
        	<div class="panel">
            <div class="panel-heading">
              <div class="panel-title">问题录入</div>
              <div class="panel-btns pull-right margin-left">
              <a href="case_list.html" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
            	  </div>
            </div>
            <div class="panel-body">
            	<div class="col-md-7">
                    <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">所属分类</span>
                        <select name="li_id" class="form-control">
                              <option value="1">生产订单</option>
                              <option value="2">售后申请</option>
                              <option value="3">采购申请</option>
                              <option value="4">快递申请</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">标题：</span>
                        <input type="text" name="que_title" value="" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon">出货时间</span>
                            <input type="text" onfocus="(this.type='date')" name="que_addtime" value="" id="date" class="form-control" placeholder="尽量按时出货，最多拖一天">
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">备注：</span>
                          <input type="text" name="que_remark" value="" class="form-control">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">附件：</span>
                          <input type="file" name="que_photo" id="upload"/>
                          <label for="upload" style="margin-bottom:0;">
                              <img src="/Public/Admin/img/upload.png" alt="" id="img">
                          </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group"> <span class="input-group-addon">所属分类</span>
                          <select name="admin_id" class="form-control">
                              <option value="1">小明</option>
                              <option value="2">小田</option>
                              <option value="3">小梁</option>
                              <option value="4">小李</option>
                          </select>
                      </div>
                    </div>
                </div>

                <div class="col-md-7">
	                <div class="form-group">
	                  <input type="submit" value="提交" class="submit btn btn-blue">
	                </div>
                </div>
            </div>
          </div>
          </form>
        </div>
    </div>
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main -->
<script src="/Public/Admin/js/plugins/layer/laydate/laydate.js"></script>

</body>
<script>
    //做图片上传预览
    function getObjectURL(file) {
        var url = null ;
        if (window.createObjectURL!=undefined) { // basic
            url = window.createObjectURL(file) ;
        } else if (window.URL!=undefined) { // mozilla(firefox)
            url = window.URL.createObjectURL(file) ;
        } else if (window.webkitURL!=undefined) { // webkit or chrome
            url = window.webkitURL.createObjectURL(file) ;
        }
        return url ;
    }
    $('#upload').change(function(){
        var url=getObjectURL(this.files[0]);
        if(url){
            $('#img').attr('src',url);
        }
    })
    $('#upload').change(function(){
        var url=getObjectURL(this.files[0]);
        if(url){
            $('#img').attr('src',url);
        }
    })
    laydate({elem:"#date",event:"focus"});
</script>
</html>