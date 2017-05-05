<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" type="text/css" href="/Pipetrans/Public/Lib/bootstrap-3.3.7/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/Pipetrans/Public/Css/Seller/head.css" />
	<link rel="stylesheet" type="text/css" href="/Pipetrans/Public/Css/Seller/foot.css" />
    <link rel="stylesheet" type="text/css" href="/Pipetrans/Public/Css/Seller/my_content.css" />
	<script type="text/javascript" src="/Pipetrans/Public/Lib/jquery-1.11.2.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script type="text/javascript" src="/Pipetrans/Public/Lib/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/Pipetrans/Public/Js/Seller/modify.js"></script>
    <script type="text/javascript" src="/Pipetrans/Public/Js/Seller/iteminfo.js"></script>
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
                <li class="active"><a href="<?php echo U('Item/itemIndex');?>">商品管理</a></li>
                <li><a href="#">合同中心</a></li>
                <li><a href="<?php echo U('Order/index');?>">订单中心</a></li>
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
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="/Pipetrans/Public/Image/img1.jpg" alt="#10裂化管">
                <div class="caption">
                    <br/>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <img src="/Pipetrans/Public/Image/img1.jpg" alt="#10裂化管">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <img src="/Pipetrans/Public/Image/img1.jpg" alt="#10裂化管">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <img src="/Pipetrans/Public/Image/img1.jpg" alt="#10裂化管">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <img src="/Pipetrans/Public/Image/img1.jpg" alt="#10裂化管">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>商品名称：</strong></div>
                        <div class="col-md-4 text-left">
                            <span class="preInfo"><?php echo ($iteminfo["itemname"]); ?></span>
                            <input type="text" id="name" class="form-control modifiedInfo" value="<?php echo ($iteminfo["itemname"]); ?>" readonly="readonly" style="display: none;">
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>商品规格：</strong></div>
                        <div class="col-md-4 text-left">
                            <span class="preInfo"><?php echo ($iteminfo["standard"]); ?></span>
                            <input type="text" id="std" class="form-control modifiedInfo" value="<?php echo ($iteminfo["standard"]); ?>" readonly="readonly" style="display: none;">
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>商品单价：</strong></div>
                        <div class="col-md-3 text-left money">
                            <span class="preInfo">￥<?php echo ($iteminfo["price"]); ?></span>
                            <input type="text" id="price" class="form-control modifiedInfo" value="<?php echo ($iteminfo["price"]); ?>" style="display: none;">
                        </div>
                        <div class="col-md-2 text-right"><strong>商品库存：</strong></div>
                        <div class="col-md-3 text-left">
                            <span class="preInfo"><?php echo ($iteminfo["itemquantity"]); ?> 件</span>
                            <input type="text" id="quantity" class="form-control modifiedInfo" value="<?php echo ($iteminfo["itemquantity"]); ?>" style="display: none;">
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>商品简介：</strong></div>
                        <div class="col-md-8 text-left">
                            <span class="preInfo">
                                <?php echo ($iteminfo["introduction"]); ?>
                            </span>
                            <textarea class="form-control modifiedInfo" id="intro" rows="3" readonly="readonly" style="display: none;"><?php echo ($iteminfo["introduction"]); ?>
                            </textarea>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2 text-right"><strong>卖家承诺：</strong></div>
                        <div class="col-md-8 text-left">
                            <span class="preInfo">
                                <?php echo ($iteminfo["promise"]); ?>
                            </span>
                            <textarea class="form-control modifiedInfo" id="promise" rows="3" style="display: none;"><?php echo ($iteminfo["promise"]); ?></textarea>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10 text-right">
                            <button type="button" class="btn btn-danger" id="delete">
                                删除
                            </button>
                            <button type="button" class="btn btn-default" id="undo" style="display: none;">
                                取消
                            </button>
                            <button type="button" class="btn btn-primary" id="modify">
                                修改
                            </button>
                            <button type="button" class="btn btn-primary" id="save" style="display: none;" onclick="modifyitems(<?php echo ($iteminfo["itemid"]); ?>)">
                                保存
                            </button>
                        </div>
                        <div class="col-md-1"></div>
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