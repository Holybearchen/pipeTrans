<?php 
namespace Seller\Controller;
use Think\Controller;

class InfoController extends Controller {
	public function companyInfo() {
		if (isset($_SESSION['username']) && $_SESSION['username'] != '')
		{
			$sellerid = $_SESSION['userid'];

			$seller = M('Seller');
			$sellerinfo = $seller->find($sellerid);

			$this->assign('status', (int)$sellerinfo['status']);
			$this->assign('info', $sellerinfo);
			$this->display();
		}
		else
		{
			$this->redirect('User/login');
		}
	}

	public function modifyinformation() {
		$sellerid = $_SESSION['userid'];

		$email = I('email');
		$address = I('address');
		$name = I('pname');
		$phonenumber = (int)I('phone');
		$idnumber = (int)I('idnumber');

		$seller = M('Seller');
		$where['userid'] = $sellerid;
		$data['email'] = $email;
		$data['area'] = $address;
		$data['name'] = $name;
		$data['phonenumber'] = $phonenumber;
		$data['idnumber'] = $idnumber;
		$count = $seller->where($where)->save($data);
		$this->ajaxReturn($count);
	}

	public function modifyPWD() {
		if (isset($_SESSION['username']) && $_SESSION['username'] != '')
		{
			$this->display();
		}
		else
		{
			$this->redirect('User/login');
		}
	}

	public function changePWD() {
		$sellerid = $_SESSION['userid'];

		$prepwd = I('prepwd');
		$newpwd = I('newpwd');
		$renewpwd = I('renewpwd');

		$m = M('Seller');
		$where['userid'] = $sellerid;
		$rst = $m->where($where)->find();
		if ($newpwd != '')
		{
			if (strcmp($rst['password'], md5($newpwd)) == 0)
			{
				$this->error('新密码不能与原密码相同，请重试！');
			}
			else
			{
				if (strcmp($rst['password'], md5($prepwd)) == 0)
				{
					if (strcmp($newpwd, $renewpwd) == 0)
					{
						$data['password'] = md5($newpwd);
						$m->where($where)->save($data);

						$this->success('修改成功!', 'companyInfo');
					}
					else
					{
						$this->error('密码修改失败，请重试!');
					}
				}
				else
				{
					$this->error('密码修改失败，请重试!');
				}
			}
		}
		else
		{
			$this->error('密码修改失败，请重试！');
		}
	}
}
?>