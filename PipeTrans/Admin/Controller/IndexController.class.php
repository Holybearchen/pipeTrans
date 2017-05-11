<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		echo "admin";
		$m=M('order');
		$arr=$m->select();
		$this->assign('arr',$arr);
		$this->display();
		
    }
}