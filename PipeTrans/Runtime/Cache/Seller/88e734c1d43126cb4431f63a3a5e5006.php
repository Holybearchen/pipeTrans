<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" type="text/css" href="/pipetrans/Public/Lib/bootstrap-3.3.7/dist/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/pipetrans/Public/Css/Seller/head.css" />
	<link rel="stylesheet" type="text/css" href="/pipetrans/Public/Css/Seller/foot.css" />
    <link rel="stylesheet" type="text/css" href="/pipetrans/Public/Css/Seller/my_content.css" />
	<script type="text/javascript" src="/pipetrans/Public/Lib/jquery-1.11.2.js"></script>
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script type="text/javascript" src="/pipetrans/Public/Lib/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/pipetrans/Public/Js/Seller/iteminfo.js"></script>
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
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="请输入要搜索的管材型号">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
        </form>

        <form class="navbar-form navbar-right">
            <span class="glyphicon glyphicon-plus-sign" data-toggle="modal" data-target="#myModal" style="font-size: xx-large; color: #0066ff;"></span>
        </form>
    </div>
    <br/>
    <div class="container">
    <?php if(is_array($itemlist)): $i = 0; $__LIST__ = $itemlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><!-- <div class="row"> -->
            <div class="col-md-3">
                <a href="/pipetrans/index.php/seller/item/itemDetails?itemid=<?php echo ($vo["itemid"]); ?>">
                    <div class="thumbnail">
                        <img src="/pipetrans/Public/Image/img1.jpg" alt="#10裂化管">
                        <div class="caption">
                            <strong><p class="money">￥100.00</p></strong>
                            <p>#10裂化管</p>
                        </div>
                    </div>
                </a>
            </div>
        <!-- </div> --><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
            
    <br/>
    <br/>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">添加管材</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="item_name" class="col-sm-4 control-label text-right">商品名称：</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="item_name" placeholder="请输入商品名称">
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <div class="form-group">
                            <label for="item_std" class="col-sm-4 control-label text-right">商品规格：</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="item_std" placeholder="请输入商品规格">
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <div class="form-group">
                            <label for="item_price" class="col-sm-4 control-label text-right">商品单价：</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="item_price"
                                       placeholder="请输入商品单价">
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <div class="form-group">
                            <label for="item_quantity" class="col-sm-4 control-label text-right">商品库存：</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="item_quantity" placeholder="请输入商品库存">
                            </div>
                        </div>
                        <br/>
                        <br/>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="item_intro" class="col-sm-4 control-label text-right">商品简介：</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="item_intro" rows="4" placeholder="请输入商品简介"></textarea>
                            </div>
                        </div>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <div class="form-group">
                            <label for="promise" class="col-sm-4 control-label text-right">卖家承诺：</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" id="promise" rows="3" placeholder="请输入卖家承诺"></textarea>
                            </div>
                        </div>
                        <br/>
                        <br/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary" onclick="additems()">添加</button>
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