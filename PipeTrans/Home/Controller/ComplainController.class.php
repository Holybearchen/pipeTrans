<?php
namespace Home\Controller;
use Think\Controller;
// 0:待处理
// 1：已处理
class ComplainController extends Controller {
    public function submit(){
    	$detailid=$_GET['orderid'];
    	$this->assign('did',$detailid);
       	$this->display();
    }
    public function addComplain(){
    	$mc=M('complain');
    	$map2['detailid']=$_POST['did'];
    	$con=$_POST['con'];
    	$details=M('orderdetail')->join('pipe_item ON pipe_item.itemid=pipe_orderdetail.itemid')->join('pipe_seller on pipe_item.sellerid=pipe_seller.userid')->where($map2)->find();
    	$map['buyerid']=(int)$_SESSION['id'];

    	$map['sellerid']=(int)$details['sellerid'];
    	$map['content']=$con;
    	$map['status']=0;
    	// exit();
    	$lastid=$mc->add($map);
    	if($lastid){
    		// $this->success('投诉成功，请等待我们处理并联系你');
            $this->success('投诉成功，请等待我们处理并联系你',U('Order/show'));//跳转到首页
    	}else{
    		$this->error('错误');
    	}
    }

   
}