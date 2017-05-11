<?php
namespace Seller\Controller;
use Think\Controller;
class OrderController extends Controller {
    public function index() {
        if (isset($_SESSION['username']) && $_SESSION['username'] != '')
        {
            $sellerid = $_SESSION['userid'];

            $order = M('Orderdetail');
            $where['status'] = 0;
            $where['dstatus'] = 0;
            $where['sellerid'] = $sellerid;
            $rst = $order->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')
                    ->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')
                    ->where($where)->select();

            $counter = sizeof($rst);
            
            $this->assign('counter', $counter);
            $this->assign('newOrders', $rst);
        	$this->display();
        }
        else
        {
            $this->redirect('User/login');
        }
    }

    public function ordering()
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != '')
        {
            $sellerid = $_SESSION['userid'];

            $order = M('Orderdetail');
            $where['sellerid'] = $sellerid;       
            $where['status'] = 2;
            $where['dstatus'] = 2;
            
            $rst1 = $order->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')
                    ->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')
                    ->where($where)->select();

            $where['status'] = 6;
            $where['dstatus'] = 6;
            $rst2 = $order->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')
                    ->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')
                    ->where($where)->select();

            $counter = max(sizeof($rst1), sizeof($rst2));

            $this->assign('counter', $counter);
            $this->assign('ordering', $rst1);
            $this->assign('mailing', $rst2);
        	$this->display();
        }
        else
        {
            $this->redirect('User/login');
        }
    }

    public function ordered()
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != '')
        {
            $sellerid = $_SESSION['userid'];

            $order = M('Orderdetail');
            $where['sellerid'] = $sellerid;       
            $where['status'] = 8;
            $where['dstatus'] = 8;
            
            $rst1 = $order->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')
                    ->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')
                    ->where($where)->select();

            $where['status'] = 9;
            $where['dstatus'] = 9;
            $rst2 = $order->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')
                    ->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')
                    ->where($where)->select();

            $counter = max(sizeof($rst1), sizeof($rst2));

            $this->assign('counter', $counter);
            $this->assign('ordered', $rst1);
            $this->assign('commented', $rst2);
            $this->display();
        }
        else
        {
            $this->redirect('User/login');
        }
    }

    public function orderDetails()
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != '')
        {
            $sellerid = $_SESSION['userid'];
            $orderid = (int)$_GET['orderid'];    

            $order = M('Orderdetail');
            $where['sellerid'] = $sellerid;
            $where['pipe_order.orderid'] = $orderid;

            $rst = $order->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')
                    ->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')
                    ->where($where)->find();

            $m = M('Orderdetail');
            $map['orderid'] = $orderid;
            $r = $m->where($map)->find();

            $this->assign('order', $r);
        	$this->assign('detail', $rst);
        	$this->display();
        }
        else
        {
            $this->redirect('User/login');
        }
    }

    public function orderingDetails()
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != '')
        {
            $sellerid = $_SESSION['userid'];
            $orderid = (int)$_GET['orderid'];

            $order = M('Orderdetail');
            $where['sellerid'] = $sellerid;
            $where['pipe_order.orderid'] = $orderid;

            $rst = $order->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')
                    ->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')
                    ->where($where)->find();

            $m = M('Orderdetail');
            $map['orderid'] = $orderid;
            $r = $m->where($map)->find();
            
            $this->assign('order', $r);
            $this->assign('detail', $rst);
            $this->display();
        }
        else
        {
            $this->redirect('User/login');
        }
    }

    public function mailingorder()
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != '')
        {
            $sellerid = $_SESSION['userid'];
            $orderid = (int)$_GET['orderid'];

            $order = M('Orderdetail');
            $where['sellerid'] = $sellerid;
            $where['pipe_order.orderid'] = $orderid;

            $rst = $order->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')
                    ->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')
                    ->where($where)->find();

            $m = M('Orderdetail');
            $map['orderid'] = $orderid;
            $r = $m->where($map)->find();
            
            $this->assign('mailingorder', $r);
            $this->assign('mailing', $rst);
            $this->display();
        }
        else
        {
            $this->redirect('User/login');
        }
    }

    public function orderedDetails()
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != '')
        {
            $sellerid = $_SESSION['userid'];
            $orderid = (int)$_GET['orderid'];

            $order = M('Orderdetail');
            $where['sellerid'] = $sellerid;
            $where['pipe_order.orderid'] = $orderid;

            $rst = $order->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')
                    ->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')
                    ->where($where)->find();

            $m = M('Orderdetail');
            $map['orderid'] = $orderid;
            $r = $m->where($map)->find();
            
            $this->assign('order', $r);
            $this->assign('ordered', $rst);
            $this->display();
        }
        else
        {
            $this->redirect('User/login');
        }
    }

    public function acceptOrder()
    {
        $orderid = I('orderid');
        
        $m = M('Order');
        $where['orderid'] = $orderid;
        $count = $m->where($where)->setField('status','2');

        $m = M('Orderdetail');
        $count = $m->where($where)->setField('dstatus','2');
        
        $contract = M('Contract');
        $data['date'] = strtotime(date('Y-m-d H:i:s'));
        $data['c-status'] = 1;
        $contract->where($where)->save($data);

        $rst = $m->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')
                    ->where($where)->find();
        $quantity['itemquantity'] = (int)$rst['itemquantity'] - (int)$rst['quantity'];
        $condition['itemid'] = $rst['itemid'];
        $item = M('Item');
        $item->where($condition)->save($quantity);

        $this->ajaxReturn($count);
        
    }

    public function refuseOrder()
    {
        $orderid = I('orderid');
        
        $m = M('Order');
        $where['orderid'] = $orderid;
        $count = $m->where($where)->setField('status','3');

        $m = M('Orderdetail');
        $count = $m->where($where)->setField('dstatus','3');

        $contract = M('Contract');
        $data['date'] = strtotime(date('Y-m-d H:i:s'));
        $data['c-status'] = 0;
        $contract->where($where)->save($data);
        
        $this->ajaxReturn($count);
        
    }

    public function sendItem()
    {
        $orderid = (int)I('orderid');
        $tracknumber = I('tracknumber');
        $trackcompany = I('trackcompany');

        $m = M('Order');
        $where['orderid'] = $orderid;
        $m->where($where)->setField('status','6');

        $order = M('Orderdetail');
        $data['tracknumber'] = $tracknumber;
        $data['trackcompany'] = $trackcompany;
        $data['dstatus'] = 6;
        $data['send-time'] = strtotime(date('Y-m-d H:i:s'));
        $count = $order->where($where)->save($data);

        $this->ajaxReturn($count);
    }
}