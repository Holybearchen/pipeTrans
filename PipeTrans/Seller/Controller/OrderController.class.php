<?php
namespace Seller\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index() {
        $sellerid = 2;

        $model = new \Think\Model();
        $rst = $model->query("select * from pipe_order, pipe_orderdetail, pipe_item where (pipe_order.orderid = pipe_orderdetail.orderid) and (pipe_orderdetail.itemid = pipe_item.itemid) and (status = 0) and (sellerid = $sellerid)");

        $counter = sizeof($rst);

        $this->assign('counter', $counter);
        $this->assign('newOrders', $rst);

    	$this->display();


    }

    public function ordering()
    {
        $sellerid = 2;

        $model = new \Think\Model();
        $newcounter = $model->query("select count(*) from pipe_order, pipe_orderdetail, pipe_item where (pipe_order.orderid = pipe_orderdetail.orderid) and (pipe_orderdetail.itemid = pipe_item.itemid) and (status = 0) and (sellerid = $sellerid)");
    	
        $rst1 = $model->query("select * from pipe_order, pipe_orderdetail, pipe_item where (pipe_order.orderid = pipe_orderdetail.orderid) and (pipe_orderdetail.itemid = pipe_item.itemid) and (status = 2) and (sellerid = $sellerid)");

        $rst2 = $model->query("select * from pipe_order, pipe_orderdetail, pipe_item where (pipe_order.orderid = pipe_orderdetail.orderid) and (pipe_orderdetail.itemid = pipe_item.itemid) and (status = 6) and (sellerid = $sellerid)");

        $counter = max(sizeof($rst1), sizeof($rst2));

        $this->assign('newcounter', $newcounter);
        $this->assign('counter', $counter);
        $this->assign('ordering', $rst1);
        $this->assign('mailing', $rst2);
    	
    	$this->display();
    }

    public function ordered()
    {
        $sellerid = 2;

        $model = new \Think\Model();
        $newcounter = $model->query("select count(*) from pipe_order, pipe_orderdetail, pipe_item where (pipe_order.orderid = pipe_orderdetail.orderid) and (pipe_orderdetail.itemid = pipe_item.itemid) and (status = 0) and (sellerid = $sellerid)");

        $rst = $model->query("select * from pipe_order, pipe_orderdetail, pipe_item where (pipe_order.orderid = pipe_orderdetail.orderid) and (pipe_orderdetail.itemid = pipe_item.itemid) and (status = 8) and (sellerid = $sellerid)");
        $counter = sizeof($rst);

        $this->assign('newcounter', $newcounter);
        $this->assign('counter', $counter);
        $this->assign('ordered', $rst);
        
        $this->display();
    }

    public function orderDetails()
    {
        $sellerid = 2;
        $orderid = (int)$_GET['orderid'];
                
        $model = new \Think\Model();
        $newcounter = $model->query("select count(*) from pipe_order, pipe_orderdetail, pipe_item where (pipe_order.orderid = pipe_orderdetail.orderid) and (pipe_orderdetail.itemid = pipe_item.itemid) and (status = 0) and (sellerid = $sellerid)");

        $rst = $model->query("select * from pipe_order, pipe_orderdetail, pipe_item where (pipe_order.orderid = pipe_orderdetail.orderid) and (pipe_item.itemid = pipe_orderdetail.itemid) and (status = 0) and (pipe_order.orderid = $orderid)");
    	
        $this->assign('newcounter', $newcounter);
    	$this->assign('detail', $rst);
        
    	$this->display();
    }

    public function orderingDetails()
    {
        $m = M('Order');
        $newcounter = $m->where("status=0")->count();
        $m = M('Orderdetail');
        $orderid = $_GET['id'];
        $rst = $m->where($orderid)->find();
        $this->assign('newcounter', $newcounter);
        $this->assign('detail', $rst);
        $this->display();
    }

    public function orderedDetails()
    {
        $m = M('Order');
        $newcounter = $m->where("status=0")->count();
        $m = M('Orderdetail');
        $orderid = $_GET['id'];
        $rst = $m->where($orderid)->find();
        $this->assign('newcounter', $newcounter);
        $this->assign('detail', $rst);
        $this->display();
    }

    public function acceptOrder()
    {
        $orderid = I('orderid');
        //$this->ajaxReturn(5);
        $m = M('Order');
        $count = $m->where("orderid=$orderid")->setField('status','2');
        
            $this->display('Order:orderingDetails');
        
    }

    public function hi() {
    	$m = M('Order');
    	$where['orderid'] = 1;
    	$rst = $m
    		->join('__ORDERDETAIL__ ON __ORDER__.orderid = __ORDERDETAIL__.orderid')->select();
    	var_dump($rst);

    	print_r(explode(' ', $rst[0]['orderdate']));
    	echo date('Y-m-d H:i:s');
    }
}