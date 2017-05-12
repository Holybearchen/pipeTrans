<?php
namespace Communication\Controller;
use Think\Controller;
class IndexController extends Controller {
    //登陆默认页面        
    public function index(){
        //显示最近联系人及其状态以及对话信息
        $m = M('msg'); 
        
        $arr = $m->select();

        $receiver=$m->where("sender='Tom'")->field('tosend')->group('tosend')->select();
        $sender=$m->where("tosend='Tom'")->field('sender')->group('sender')->select();
        // Select sender from msg where (tosend=tom) group by tosend
        //$this->assign('msg',$arr);  
        $this->assign('receiver',$receiver);
        $this->assign('sender',$sender);

        $this->display();         
    } 
    //获取最近发送信息
    public function getSend(){
        $userName=$_POST['userName'];
        $m=M('msg');
        $userDialog['sender']="Tom";
        $userDialog['tosend']=$userName;
        $arr=$m->where($userDialog)->order('id asc')->limit('5')->select(); 

        echo (json_encode($arr));
    }
    //获取最近接收信息
    public function getReceive(){
        $userName=$_POST['userName'];
        $m=M('msg');
        $userDialog['sender']=$userName;
        $userDialog['tosend']="Tom";
        $arr=$m->where($userDialog)->order('id asc')->limit('5')->select(); 

        echo (json_encode($arr));
    }

    //利用ajaxreturn以JSON方式返回聊天内容
    public function ajax(){
        $data=array();
        $m=M('msg');
        $data['content']=$_POST['content'];
        $data['tosend']=$_POST['tosend'];
        $data['time']=time();
        $data['timee']=date('Y-m-d H:i:s',time());
        $data['sender']="Tom";
        $dd=$m->data($data)->add();

        $tosendNow['tosend']=$_POST['tosend'];
        if($dd){
            $dataa=$m->where($tosendNow)->order('id asc')->limit('5')->select();
            $this->ajaxReturn(json_encode($dataa));
        }
    } 
    
    //即时返回最新五条聊天内容
    public function fresh(){
        $data=M(msg)->order('id sesc')->limit('5')->select();
        $this->ajaxReturn(json_encode($data));
    }
    
    //刷新时获取最新十条聊天内容和在线用户
    public function homePage(){
        $this->msg=M(msg)->order('id desc')->limit('10')->select();
        $this->user=M(user)->where(array('status'=>1))->select();
        $this->display();
    }
    
    //即时返回在线用户
    public function freshUser(){
        $dat=M(user)->where(array('status'=>1))->select();
        $this->ajaxReturn($dat);
    }
}
?>