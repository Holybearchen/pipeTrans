<?php
namespace Home\Controller;
use Think\Controller;
class orderController extends Controller {
    public function confirm(){
        if(isset($_SESSION['username'])&&$_SESSION['username']!=''){
            $this->display;
        }else{
            $this->redirect('Index/index');
        }
        $iid=$_POST['itemid'];
        $amount=$_POST['amount'];
        $username=$_POST['username'];

        $mItem=M('item')->join('pipe_seller ON pipe_item.sellerid=pipe_seller.userid');
        $map["itemid"]=$iid;
        $item=$mItem->where($map)->find();
        $this->assign("item",$item);
        $this->assign("amount",$amount);
        $this->display();
    }

    // 提交订单操作
    public function submitOrder(){
        // var_dump($_POST); 
        // 登陆判断
        if(isset($_SESSION['username'])&&$_SESSION['username']!=''){
            $this->display;
        }else{
             $this->error('请登陆');
        }
        // $mItem=M('item');
        $mItem=M('item')->join('pipe_seller ON pipe_item.sellerid=pipe_seller.userid');
        $mOrder=M("order");
        $mdetail=M('orderdetail');
        $mContract=M('contract');
        $mItem->startTrans();
        $mOrder->startTrans();
        $mdetail->startTrans();
        $mContract->startTrans();
        $username=$_POST['username'];
        $buyername=$_POST['name'];
        $iid=$_POST['itemid'];
        $province=$_POST['province'];
        $city=$_POST['city']; 
        $area=$_POST['area'];
        $address=$_POST['address'];
        $pcode=$_POST['pcode'];
        $name=$_POST['name'];
        $mobile=$_POST['mobile'];
        $phone_1=$_POST['phone-1'];
        $phone_2=$_POST['phone-2'];
        $phone_3=$_POST['phone-3'];
        $quantity=$_POST['quantity'];
        $data['userid']=(int)$_SESSION['id'];
        $data['name']=$buyername;
        $data['orderdate']=mktime();
        $data['status']=0;
        // // $data['contractid']=$inperson;
        $data['province']="$province";
        $data['city']=$city;
        $data['area']=$area;
        $data['address']=$address;
        $data['p-code']=$pcode;
        $data['mobile']=$mobile;
        $data['phone']= $phone_1.$phone_2.$phone_3;
        $data['freight']= 0;
        // 获取商品
        $map["itemid"]=$iid;
        $item=$mItem->where($map)->find();
        $price=$item["price"];
        $data['totalprice']=$quantity*$price;
        $data1['userid']=55;
        $lastOrderid=$mOrder->add($data);
        if(!$lastOrderid){
             $this->error('失败');
        }
        // 处理合同
        $mapC['itemname']=$item['name'];
        // $mapC['area']=$item['send-area'];
        $mapC['area']="123";
        $mapC['type']='0';
        $mapC['standard']=$item['standard'];
        $mapC['price']=$price;
        $mapC['quantity']=$quantity;
        $mapC['total']=$price*$quantity;
        $mapC['date']=0;
        $mapC['buyername']=$_SESSION['username'];
        $mapC['sellername']=$item['username'];
        $mapC['c-status']=0;
        $contractId=$mContract->add($mapC);
        // 处理订单详情
        $detailDate['orderid']=$lastOrderid;
        $detailDate['itemid']=$iid; 
        $detailDate['price']=$price;
        $detailDate['quantity']=$quantity;
        $detailDate['total']=$price*$quantity;
        $detailDate['contractid']=$contractId;
        $lastid=$mdetail->add($detailDate);
        if($lastid&&$contractId){ 
            $mOrder->commit();
            $mdetail->commit();
            $mContract->commit();
            $this->redirect('Order/succ?orderid='.$lastOrderid,$a);
            // $this->succ($a);
        }else{
            $mOrder->rollback();
            $mdetail->rollback();
            $mContract->rollback();
            $this->error('失败');
        }
     
    }
    public function succ(){
        $oid=$_GET['orderid'];
        $this->assign("oid",$oid);
    	$this->display();
    }
    //订单列表
     public function show(){
        $userid=$_SESSION['id'];
        $m=M('order');
        $data['userid']=$userid;
        $orders=$m->where($data)->select();
        foreach ($orders as &$order) {
            $data1['orderid']=$order['orderid'];
            $details=M('orderdetail')->where($data1)->select();
            foreach ($details as &$detail) {
                $iid=$detail['itemid'];
                $data2['itemid']=$iid;
                $item=M('item')->where($data2)->find();
                $iname=$item['itemname'];
                $detail['itemname']=$iname;
            }
            $order['details']=$details;
            // var_dump($order['details']);
        }
        $this->assign('orders',$orders);
    	$this->display();
    }
    // 订单详情
    public function detail(){
        $oid=$_GET['orderid'];
        $map1['orderid']=$oid;
        $order=M('order')->where($map1)->find();
        $map2['orderid']=$oid;
        $details=M('orderdetail')->join('pipe_item ON pipe_item.itemid=pipe_orderdetail.itemid')->where($map2)->select();
        $sellerid=$details.['sellerid'];
        $map3['sellerid']=$sellerid;
        $seller=M('seller')->where($map3)->find();
        $sellername=$seller['name'];
        $this->assign('sellername',$sellername);
        $this->assign('order',$order);
        $this->assign('details',$details);
    	$this->display();
    }
    // 取消订单
    public function undo(){
        $id=$_GET['orderid'];
        $mOrder=M('order'); 
        $md=M('orderdetail');
        $mOrder->startTrans();
        $md->startTrans();
        $map1['orderid']=$id;
        $order=$mOrder->where($map1)->find();
        if($order['userid']!=$_SESSION['id']){
            $this->error('失败');
        }
        else{
            $data['orderid']=$id;
            $data['status']=1;
            $result1=$mOrder->save($data);
           
            $data1['orderid']=$id;
            $result2=$md->where($data1)->setField('dstatus',1);
            // $result2=$md->save($data1);
            $result=$result1&&$result2;
            if($result) {
                $mOrder->commit();
                $md->commit();
                $this->success('取消订单成功');
            }
            else{
                $mOrder->rollback();
                $md->rollback();
                // $this.error('失败');
                echo "sb";
            }
        }
    }
    //确认收货
    public function receive(){
        $id=$_GET['id'];
        $mOrder=M('order'); 
        $md=M('orderdetail');
        $mOrder->startTrans();
        $md->startTrans();
        $map1['detailid']=$id;
        $orderdetail=$md->where($map1)->find();
        $orderid=$orderdetail['orderid'];
        $map2['orderid']=$orderid;
        $order=$mOrder->where($map2)->find();
        if($order['userid']!=$_SESSION['id']){
            $this->error('失败');
        }
        else{
            $data['orderid']=$orderid;
            $data['status']=8;
            $result1=$mOrder->save($data);
            $data1['detailid']=$id;
            $result2=$md->where($data1)->setField('dstatus',8);
            // $result2=$md->save($data1);
            $result=$result1&&$result2;
            if($result) {
                $mOrder->commit();
                $md->commit();
                $this->success('取消订单成功');
            }
            else{
                $mOrder->rollback();
                $md->rollback();
                // $this.error('失败');
                echo "sb";
            }
        }
    }
}