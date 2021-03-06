<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>欢迎来到空课统计</title>

    <link href="/freeclass/Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/freeclass/Public/css/datepicker3.css" rel="stylesheet">
    <link href="/freeclass/Public/css/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="/freeclass/Public/js/html5shiv.js"></script>
    <script src="/freeclass/Public/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">空课统计</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo U('Index/Logout');?>"><span class="glyphicon glyphicon-log-out"></span> 注销登陆</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <ul class="nav menu">
        <li class="active"><a href="<?php echo U('Index/index');?>"><span class="glyphicon glyphicon-dashboard"></span> 我的课表</a></li>
        <li><a href="<?php echo U('FreeClass/InputOption');?>"><span class="glyphicon glyphicon-stats"></span> 空课统计</a></li>
        <li class="parent ">
            <a data-toggle="collapse" href="#sub-item-1">
                <span class="glyphicon glyphicon-calendar"></span> 课表管理 <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="<?php echo U('Course/AddCourse');?>">
                        <span class="glyphicon glyphicon-share-alt"></span> 添加课程
                    </a>
                </li>
                <li>
                    <a class="" href="<?php echo U('Course/ResetCourse');?>">
                        <span class="glyphicon glyphicon-share-alt"></span> 更新课程
                    </a>
                </li>
                <li>
                    <a class="" href="<?php echo U('Course/DeleteCourse');?>">
                        <span class="glyphicon glyphicon-share-alt"></span> 删除课程
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent ">
            <a href="#sub-item-2" data-toggle="collapse">
                <span class="glyphicon glyphicon-th"></span> 群组管理 <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li>
                    <a class="" href="<?php echo U('Group/MyGroup');?>">
                        <span class="glyphicon glyphicon-share-alt"></span> 我的群组
                    </a>
                </li>
                <li>
                    <a class="" href="<?php echo U('Group/AddGroup');?>">
                        <span class="glyphicon glyphicon-share-alt"></span> 新建群组
                    </a>
                </li>
                <li>
                    <a class="" href="<?php echo U('Group/JoinGroup');?>">
                        <span class="glyphicon glyphicon-share-alt"></span> 加入群组
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div><!--/.sidebar-->
<link rel="stylesheet" href="/freeclass/Public/self/css/InputOption.css">
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">空课统计</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">空课统计</h1>
        </div>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">空课统计</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" action="<?php echo U('FreeClass/GetFreeClass',array('action'=>'submit'));?>" method="post" onsubmit="return CheckSubmit();">

                            <div class="form-group">
                                <label>请选择要统计的群组名</label>
                                <select class="form-control" name="groupname">
                                    <?php $__FOR_START_1977084411__=0;$__FOR_END_1977084411__=count($mygroups);for($i=$__FOR_START_1977084411__;$i < $__FOR_END_1977084411__;$i+=1){ ?><option value="<?php echo ($mygroups[$i]['id']); ?>"><?php echo ($mygroups[$i]['name']); ?></option><?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="weeklabel">请选择要统计的周次范围</label>
                                <select class="form-control weekselect" id="week1" onchange="GetFAnWei();">
                                    <?php $__FOR_START_2077355645__=1;$__FOR_END_2077355645__=21;for($i=$__FOR_START_2077355645__;$i < $__FOR_END_2077355645__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
                                </select>
                                <span class="weekfan">到</span>
                                <select class="form-control weekselect" id="week2" onchange="GetFAnWei();">
                                    <?php $__FOR_START_632360351__=1;$__FOR_END_632360351__=21;for($i=$__FOR_START_632360351__;$i < $__FOR_END_632360351__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
                                </select>
                                <input type="text" id="week" name="week" class="form-control"  placeholder="请选择周次" onfocus="ShowWeek();">
                                <div class="panel dropweek" id="dropweek">
                                    <div class="panel-body">
                                        <div id="wb"></div>
                                        <div class="wb"><button type="button" class="btn weekbtn" onclick="Choose('single');">单周</button><button type="button" class="btn weekbtn" onclick="Choose('double')">双周</button><button type="button" class="btn weekbtn" onclick="Choose('all');">全选</button></div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">确认统计</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->
</div><!--/.main -->
<script src="/freeclass/Public/js/jquery-1.11.1.min.js"></script>
<script src="/freeclass/Public/js/bootstrap.min.js"></script>
<script src="/freeclass/Public/js/chart.min.js"></script>
<script src="/freeclass/Public/js/chart-data.js"></script>
<script src="/freeclass/Public/js/easypiechart.js"></script>
<script src="/freeclass/Public/js/easypiechart-data.js"></script>
<script src="/freeclass/Public/js/bootstrap-datepicker.js"></script>
<script src="/freeclass/Public/js/bootstrap-table.js"></script>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>

<script src="/freeclass/Public/self/js/InputOption.js"></script>
</body>

</html>