<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function info(){
    	$this->display();
    }
    // 登陆界面
    public function login(){
    	
    	$this->display();
 
    }
    public function doLogin(){
    	$username=$_POST['username'];
    	$password=$_POST['password'];
		$m=M('buyer');
		$where['username']=$username;
		$where['password']=$password;
		$arr=$m->field('userid')->where($where)->find();//arr只有id
		if($arr){
			$_SESSION['username']=$username;
			$_SESSION['id']=$arr['userid'];
			$this->success('登陆成功',U('Index/index'));//跳转到首页
		}else{
			$this->error('用户名或者密码错误');
		}
    }
    public function doLogout(){
    	$_SESSION=array();
    	if(isset($_COOKIE[session_name()])){
				setcookie(session_name(),'',time()-1,'/');
			}
		session_destroy();
		$this->redirect('Index/index');

    }
    // 注册
    public function register(){
        $this->display();
    }
}