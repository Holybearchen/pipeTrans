<?php
namespace Home\Controller;
use Think\Controller;
class ContractController extends Controller {
    public function addContract(){
    }
    public function removeContract(){
    }
    public function detail(){
    	$id=$_GET['orderid'];
    	$map['detailid']=$id;
    	$contract=M('orderdetail')->join('pipe_contract ON pipe_orderdetail.contractid=pipe_contract.contractid')->where($map)->find();
    	// var_dump($contract);
    	$this->assign('con',$contract);
        $this->display();
    }
}