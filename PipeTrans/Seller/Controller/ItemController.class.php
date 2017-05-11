<?php
namespace Seller\Controller;
use Think\Controller;


class ItemController extends Controller {
	public function itemIndex() {
		if (isset($_SESSION['username']) && $_SESSION['username'] != '')
		{
			$sellerid = $_SESSION['userid'];
			$item = M('Item');
			$where['sellerid'] = (int)$sellerid;
			$rst = $item->where($where)->select();
			$length = sizeof($rst);
			
			$j = 0;
			for ($i = 0; $i <= sizeof($rst); $i = $i + 4)
			{
				$itemlist[$j] = array($rst[$i], $rst[$i + 1], $rst[$i + 2], $rst[$i + 3]);
				$j++;
			}
			
			$this->assign('length', $length);
			$this->assign('itemlist', $itemlist);
			$this->display();
		}
		else
		{
			$this->redirect('User/login');
		}
	}

	public function itemdetails() {
		if (isset($_SESSION['username']) && $_SESSION['username'] != '')
		{
			$itemid = I('get.itemid');

			$item = M('Item');
			$where['itemid'] = (int)$itemid;

			$rst = $item->where($where)->find();

			$comment = M('Comment');
			$msg = $comment->join('__BUYER__ ON __COMMENT__.userid = __BUYER__.userid')
	                ->where($where)->select();

			$this->assign('iteminfo', $rst);
			$this->assign('count', sizeof($msg));
			$this->assign('msg', $msg);
			$this->display();
		}
		else
		{
			$this->redirect('User/login');
		}
	}

	public function addItem() {
		if (isset($_SESSION['username']) && $_SESSION['username'] != '')
		{
			$this->display();
		}
		else
		{
			$this->redirect('User/login');
		}
	}

	public function saveItem() {

		$sellerid = $_SESSION['userid'];
		$name = I('post.name');
		$std = I('post.std');
		$price = I('post.price');
		$quantity = I('post.quantity');
		$sendarea = I('post.address');
		$intro = I('post.intro');
		$promise = I('post.promise');
		$itemfreight = I('post.itemfreight');

		$item = M('Item');
		$data['sellerid'] = $sellerid;
		$data['itemname'] = $name;
		$data['send-area'] = $sendarea;
		$data['standard'] = $std;
		$data['price'] = (double)$price;
		$data['itemquantity'] = (int)$quantity;
		$data['introduction'] = $intro;
		$data['promise'] = $promise;
		$data['score'] = 5;
		$data['date'] = strtotime(date('Y-m-d H:i:s'));
		$data['itemfreight'] = (double)$itemfreight;

		$upload = new \Think\Upload();
		$upload->maxSize = 3145728;
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
		$upload->rootPath = './Public/Uploads/Items/';
		$upload->autoSub  =  true;
		$upload->subName = $photo;
	
		$info = $upload->upload();
		
		if (!$info)
		{
			$this->error($upload->getError());
		}
		else
		{
			$data['url1'] = $info[0]['savename'];
			$data['url2'] = $info[1]['savename'];
			$data['url3'] = $info[2]['savename'];
			$data['url4'] = $info[3]['savename'];
			

			$addedid = $item->add($data);
			$this->redirect('itemIndex');
		}		
	}

	public function deleteitem() {
		$itemid = I('itemid');
		$where['itemid'] = $itemid;

		$item = M('Item');
		$count = $item->where($where)->delete();

		$this->ajaxReturn($count);
	}

	public function modifyitem() {
		$itemid = I('itemid');
		$price = I('price');
		$quantity = I('quantity');
		$address = I('address');
		$promise = I('promise');
		$newitem = I('newitem');

		if ($newitem == '')
		{
			$newquantity = 0;
		}
		else
		{
			$newquantity = (int)$newitem;
		}

		$itemquantity = (int)$quantity + $newquantity;
		$item = M('Item');
		$data['price'] = (double)$price;
		$data['itemquantity'] = $itemquantity;
		$data['send-area'] = $address;
		$data['promise'] = $promise;
		$where['itemid'] = $itemid;

		$count = $item->where($where)->save($data);
		$this->ajaxReturn($count);
	}

	public function searchItem() {
		if (isset($_SESSION['username']) && $_SESSION['username'] != '')
		{
			$sellerid = $_SESSION['userid'];
			$searchstd = I('post.searchstd');

			$item = M('Item');
			$where['standard'] = array('LIKE', '%'.$searchstd.'%');
			$where['sellerid'] = $sellerid;
			
			$rst = $item->where($where)->select();
			$length = sizeof($rst);
			
			$j = 0;
			for ($i = 0; $i <= sizeof($rst); $i = $i + 4)
			{
				$itemlist[$j] = array($rst[$i], $rst[$i + 1], $rst[$i + 2], $rst[$i + 3]);
				$j++;
			}
			
			$this->assign('length', $length);
			$this->assign('itemlist', $itemlist);
			$this->display();
		}
		else
		{
			$this->redirect('User/login');
		}
	}
}
?>