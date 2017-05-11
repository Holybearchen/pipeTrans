<?php
namespace Seller\Controller;
use Think\Controller;


class ComplainController extends Controller {
	public function complainIndex() {
		if (isset($_SESSION['username']) && $_SESSION['username'] != '')
		{
			$sellerid = $_SESSION['userid'];

            $complain = M('Complain');
            $where['pipe_complain.status'] = 0;
            $where['pipe_complain.sellerid'] = $sellerid;
            $rst = $complain->join('__BUYER__ ON __COMPLAIN__.buyerid = __BUYER__.userid')
                    ->where($where)->select();

            $counter = sizeof($rst);
            
            $this->assign('counter', $counter);
            $this->assign('complains', $rst);
			$this->display();
		}
		else
		{
			$this->redirect('User/login');
		}
	}

	public function dealComplain() {
		$complainid = I('complainid');

		$complain = M('Complain');
		$data['status'] = 1;
		$where['complainid'] = $complainid;

		$count = $complain->where($where)->save($data);

		$this->ajaxReturn($count);
	}
}
?>