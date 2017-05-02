<?php 
namespace Seller\Controller;
use Think\Controller;

class InfoController extends Controller {
	public function companyInfo() {
		$sellerid = 2;

		$seller = M('Seller');
		$sellerinfo = $seller->find($sellerid);

		$this->assign('status', (int)$sellerinfo['status']);
		$this->assign('info', $sellerinfo);
		$this->display();
	}

	public function modifyinformation() {
		$sellerid = 2;

		$email = I('email');
		$address = I('address');
		$name = I('pname');
		$phonenumber = (int)I('phone');
		$idnumber = (int)I('idnumber');

		$seller = M('Seller');
		$data['email'] = $email;
		$data['area'] = $address;
		$data['name'] = $name;
		$data['phonenumber'] = $phonenumber;
		$data['idnumber'] = $idnumber;
		$count = $seller->where('userid=2')->save($data);
		$this->ajaxReturn($count);
	}
}
?>