<?php
namespace Seller\Controller;
use Think\Controller;


class UserController extends Controller {
	public function login() {
		
		$this->display();
	}

	public function doLogin() {
		$email = $_POST['email'];
    	$password = $_POST['password'];

		$m = M('Seller');
		$where['email'] = $email;
		$where['password'] = md5($password);
		$where['status'] = 1;

		$arr=$m->where($where)->find();
		if($arr){
			$_SESSION['username'] = $arr['username'];
			$_SESSION['userid'] = $arr['userid'];
			$this->success('登录成功',U('Item/itemIndex'));//跳转到首页
		}else{
			$this->error('用户名或者密码错误，或者账号未通过审核！');
		}
	}

	public function doLogout(){
    	$_SESSION = array();
    	if(isset($_COOKIE[session_name()])){
				setcookie(session_name(),'',time()-1,'/');
			}
		session_destroy();
		$this->redirect('login');

    }

	public function register() {
		
		$this->display();
	}
	
	public function doRegister() {
		$email = $_POST['email'];
    	$password = $_POST['password'];
		$username = $_POST['username'];
		$license = $_POST['license'];
		$name = $_POST['name'];
		$idnumber = $_POST['idnumber'];

		if ($email == '' || $password == '' || $username == '' || $license == '' || $name == '' || $idnumber == '')
		{
			$this->error('请完善信息！！！');
		}
		else
		{
			$m = M('Seller');
			$where['email'] = $email;
			$arr=$m->where($where)->find();

			if ($arr)
			{
				$this->error('注册失败，该邮箱已注册！');
			}
			else
			{
				$data['email'] = $email;
				$data['username'] = $username;
				$data['license'] = $license;
				$data['area'] = '';
				$data['password'] = md5($password);
				$data['phonenumber'] = '';
				$data['status'] = 0;
				$data['idnumber'] = 0;
				$data['name'] = $name;
				$data['level'] = 0;

				$upload = new \Think\Upload();
				$upload->maxSize = 3145728;
				$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
				$upload->rootPath = './Public/Uploads/Sellers/';
				$upload->autoSub  =  true;
				$upload->subName = $photo;

				$info = $upload->uploadOne($_FILES['photo']);
				if (!$info)
				{
					$this->error($upload->getError());
				}
				else
				{
					$data['url'] = $info['savename'];
					

					$addedid = $m->add($data);
					$this->success('注册成功，请等待审核结果！', 'login');
				}
			}
		}		
	}
}
?>