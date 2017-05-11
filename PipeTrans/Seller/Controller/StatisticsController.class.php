<?php
namespace Seller\Controller;
use Think\Controller;


class StatisticsController extends Controller {
	public function statisticsIndex() {
		if (isset($_SESSION['username']) && $_SESSION['username'] != '')
		{
			$sellerid = $_SESSION['userid'];

			$searchyear = I('post.searchyear');

			if ($searchyear == '')
			{
				$year = date("Y");
			}
			else
			{
				$year = $searchyear;
			}

			$where['sellerid'] = $sellerid;
			$where['dstatus'] = array('EGT', 8);
			$m = M('Orderdetail');
			
			$where['orderdate'] = array(array('egt', strtotime($year.'-01-01')), array('lt', strtotime($year.'-02-01')));
			$rst1 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$where['orderdate'] = array(array('egt', strtotime($year.'-02-01')), array('lt', strtotime($year.'-03-01')));
			$rst2 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$where['orderdate'] = array(array('egt', strtotime($year.'-03-01')), array('lt', strtotime($year.'-04-01')));
			$rst3 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$where['orderdate'] = array(array('egt', strtotime($year.'-04-01')), array('lt', strtotime($year.'-05-01')));
			$rst4 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$where['orderdate'] = array(array('egt', strtotime($year.'-05-01')), array('lt', strtotime($year.'-06-01')));
			$rst5 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$where['orderdate'] = array(array('egt', strtotime($year.'-06-01')), array('lt', strtotime($year.'-07-01')));
			$rst6 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$where['orderdate'] = array(array('egt', strtotime($year.'-07-01')), array('lt', strtotime($year.'-08-01')));
			$rst7 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$where['orderdate'] = array(array('egt', strtotime($year.'-08-01')), array('lt', strtotime($year.'-09-01')));
			$rst8 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$where['orderdate'] = array(array('egt', strtotime($year.'-09-01')), array('lt', strtotime($year.'-10-01')));
			$rst9 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$where['orderdate'] = array(array('egt', strtotime($year.'-10-01')), array('lt', strtotime($year.'-11-01')));
			$rst10 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$where['orderdate'] = array(array('egt', strtotime($year.'-11-01')), array('lt', strtotime($year.'-12-01')));
			$rst11 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$where['orderdate'] = array(array('egt', strtotime($year.'-12-01')), array('elt', strtotime($year.'-12-31 23:59:59')));
			$rst12 = $m->join('__ORDER__ ON __ORDERDETAIL__.orderid = __ORDER__.orderid')->join('__ITEM__ ON __ORDERDETAIL__.itemid = __ITEM__.itemid')->where($where)->Sum('totalprice');

			$this->assign('year', $year);

			$this->assign('rst1', (int)$rst1);
			$this->assign('rst2', (int)$rst2);
			$this->assign('rst3', (int)$rst3);
			$this->assign('rst4', (int)$rst4);
			$this->assign('rst5', (int)$rst5);
			$this->assign('rst6', (int)$rst6);
			$this->assign('rst7', (int)$rst7);
			$this->assign('rst8', (int)$rst8);
			$this->assign('rst9', (int)$rst9);
			$this->assign('rst10', (int)$rst10);
			$this->assign('rst11', (int)$rst11);
			$this->assign('rst12', (int)$rst12);

			$this->display();
		}
		else
		{
			$this->redirect('User/login');
		}
	}

	public function statisticsItem() {
		if (isset($_SESSION['username']) && $_SESSION['username'] != '')
		{
			$sellerid = $_SESSION['userid'];

			$startdate = I('post.startdate');
			$enddate = I('post.enddate');

			if ($searchyear == '')
			{
				$year = date("Y");
			}
			else
			{
				$year = $searchyear;
			}

			$this->display();
		}
		else
		{
			$this->redirect('User/login');
		}
	}

	
}
?>