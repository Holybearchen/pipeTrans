<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	echo "index";
    }
    public function hi(){
    	echo "hi";
    }
    public function testsql(){
    	echo "123";
    	$m=M('temp');
    	// $condition['a_name']=$name;
    	$arr=$m->find();
		var_dump($arr);

    }
}