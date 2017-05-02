<?php
namespace Seller\Controller;
use Think\Controller;


class ItemController extends Controller {
	public function itemIndex() {
		$sellerid = 2;

		$item = M('Item');
		$rst = $item->where('sellerid=2')->select();
		
		$this->assign('itemlist', $rst);
		$this->display();
	}

	public function itemdetails() {
		$itemid = I('get.itemid');

		$item = M('Item');
		$where['itemid'] = $itemid;

		$rst = $item->where($where)->find();
		
		$this->assign('iteminfo', $rst);
		$this->display();
	}

	public function additem() {
		$sellerid = 2;
		$name = I('name');
		$std = I('std');
		$price = I('price');
		$quantity = I('quantity');
		$intro = I('intro');
		$promise = I('promise');
		
		$item = M('Item');
		$data['sellerid'] = $sellerid;
		$data['itemname'] = $name;
		$data['send-area'] = '';
		$data['standard'] = $std;
		$data['price'] = (double)$price;
		$data['itemquantity'] = (int)$quantity;
		$data['introduction'] = $intro;
		$data['promise'] = $promise;
		$data['score'] = 0;
		$data['date'] = '';
		

		$addedid = $item->add($data);
		
		$this->ajaxReturn($addedid);
	}

	public function modifyitem() {
		$itemid = I('itemid');
		$price = I('price');
		$quantity = I('quantity');
		$promise = I('promise');

		$item = M('Item');
		$data['price'] = (double)$price;
		$data['itemquantity'] = (int)$quantity;
		$data['promise'] = $promise;
		$where['itemid'] = $itemid;

		$count = $item->where($where)->save($data);
		$this->ajaxReturn($count);
	}
}
?>