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
  				<a href="/pipetrans/index.php/seller/order/index" class="list-group-item active">
    				<span class="badge"><?php echo ($counter); ?></span>新订单
  				</a>
  				<a href="/pipetrans/index.php/seller/order/ordering" class="list-group-item">执行中</a>
  				<a href="/pipetrans/index.php/seller/order/ordered" class="list-group-item">已完成</a>
			</div>
		</div>

		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
    				<h3 class="panel-title">新订单</h3>
  				</div>

  				<?php if(($counter) == "0"): ?><h3>目前没有新订单</h3>
	        	<?php else: ?>
		  			<table class="table table-hover table-bordered">
		  				<thead>
		        			<tr>
		            			<th>订单编号</th>
		            			<th>订单商品</th>
		            			<th>买家姓名</th>
		            			<th>下单时间</th>
		            			<th>金额明细</th>
		            			<th>订单状态</th>
		            			<th>操作</th>
		        			</tr>
		        		</thead>
		        		<tbody>

		        			<?php if(is_array($newOrders)): $i = 0; $__LIST__ = $newOrders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			                		<td><?php echo ($vo["orderid"]); ?></td>
			                		<td><?php echo ($vo["itemname"]); ?></td>
			                		<td><?php echo ($vo["name"]); ?></td>
			                		<td>
			                			<span class="tab_time">
			                			<?php echo ($vo["orderdate"]); ?>
			                			<br>
			                			19:19:10
			                			</span>
			                		</td>
			                		<td>
			                			<dl class="pdeta">
											<dt>
												<div class="fore1">总金额：</div>
												<div class="fore2">￥<?php echo ($vo["totalprice"]); ?></div>
											</dt>

											<div class="fore1">预付款：</div>
											<div class="fore2">￥100.00</div>
										</dl>
			                		</td>
			                		<td>
			                			<span class="state">待确认</span>
			                		</td>
			                		<td><a href="/pipetrans/index.php/seller/order/orderDetails?orderid=<?php echo ($vo["orderid"]); ?>">查看</a></td>
			                	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
							
	        			</tbody>
	  				</table><?php endif; ?>
			</div>

			<nav aria-label="Page navigation" style="text-align: center;">
				<ul class="pagination">
    				<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
    				<li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
    				<li><a href="#">2</a></li>
    				<li><a href="#">3</a></li>
    				<li><a href="#">4</a></li>
    				<li><a href="#">5</a></li>
    				<li>
      					<a href="#" aria-label="Next">
        					<span aria-hidden="true">&raquo;</span>
      					</a>
    				</li>
  				</ul>
			</nav>
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