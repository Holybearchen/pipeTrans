<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" type="text/css" href="/pipeTrans/Public/Lib/bootstrap-3.3.7/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/pipeTrans/Public/Css/Seller/head.css" />
	<link rel="stylesheet" type="text/css" href="/pipeTrans/Public/Css/Seller/foot.css" />
    <link rel="stylesheet" type="text/css" href="/pipeTrans/Public/Css/Seller/my_content.css" />
	<script type="text/javascript" src="/pipeTrans/Public/Lib/jquery-1.11.2.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script type="text/javascript" src="/pipeTrans/Public/Lib/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Pipe</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo U('Index/index');?>">卖家首页</a></li>
                <li><a href="<?php echo U('Item/itemIndex');?>">商品管理</a></li>
                <li><a href="#">合同中心</a></li>
                <li class="active"><a href="<?php echo U('Order/index');?>">订单中心</a></li>
                <li><a href="#">信息统计</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo U('Info/companyInfo');?>">欢迎您, 骆京</a></li>
                <li><a href="#">退出</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="my_content">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a href="/pipeTrans/index.php/seller/order/index" class="list-group-item">
                    <span class="badge"><?php echo ($newcounter); ?></span>新订单
                </a>
                <a href="/pipeTrans/index.php/seller/order/ordering" class="list-group-item active">执行中</a>
                <a href="/pipeTrans/index.php/seller/order/ordered" class="list-group-item">已完成</a>
            </div>
        </div>

        <div class="col-md-10">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">订单详情</h3>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>订单编号：</strong></div>
                        <div class="col-md-3 text-left">44396412565</div>
                        <div class="col-md-2 text-right"><strong>买家姓名：</strong></div>
                        <div class="col-md-4 text-left">素的臊子面多加肉</div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>订单商品：</strong></div>
                        <div class="col-md-9 text-left">44396412565</div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>商品单价：</strong></div>
                        <div class="col-md-3 text-left money">￥<?php echo ($detail["price"]); ?></div>
                        <div class="col-md-2 text-right"><strong>订货数量：</strong></div>
                        <div class="col-md-4 text-left"><?php echo ($vo["quantity"]); ?></div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>收货地址：</strong></div>
                        <div class="col-md-9 text-left">陕西省西安市碑林区友谊西路127号</div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>联系电话：</strong></div>
                        <div class="col-md-9 text-left">17792243848</div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>总金额：</strong></div>
                        <div class="col-md-3 text-left money">￥<?php echo ($detail["total"]); ?></div>
                        <div class="col-md-2 text-right"><strong>预付款：</strong></div>
                        <div class="col-md-4 text-left money">￥1000.00</div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>下单时间：</strong></div>
                        <div class="col-md-3 text-left">2017-04-06 19:19:10
                        </div>
                        <div class="col-md-2 text-right"><strong>订单状态：</strong></div>
                        <div class="col-md-4 text-left state">待确认</div>
                    </div>

                    <br/>
                    <br/>
                    <br/>
                    <div class="row text-center">
                        <button type="button" class="btn btn-link">查看合同</button>
                        <button type="button" class="btn btn-primary">确定</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-fixed-bottom navbar-inverse" role="navigation">
    <div class="foot">
        2017 &nbsp Pipe
    </div>
</nav>
</body>
</html>