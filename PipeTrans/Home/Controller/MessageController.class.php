<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller {
    //消息列表
     public function show(){
     	// $m=M('message');
     	// $map['']
     	// $messages=$m->where($map)->select();
    	$this->display();
    }
    //消息详情
    public function detail(){
    	$this->display();
    }
}