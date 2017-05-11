<?php
namespace Home\Controller;
use Think\Controller;
class ItemController extends Controller {
    public function search(){
	  if(!($_GET['page'])){
	            $page=1;
	        }else{
	            $page=$_GET['page'];
	        }
	        $everyPage=4;//设置每页数量
	    	$keyword=$_GET['searchItem'];
	        $mItem=M('item')->join('pipe_seller ON pipe_item.sellerid=pipe_seller.userid');
	        $where['_string']='(itemname LIKE "%'.$keyword.'%") OR (introduction LIKE "%'.$keyword.'%")OR (standard LIKE "%'.$keyword.'%")';
	        $arr=$mItem->where($where)->limit(($page-1)*$everyPage,$everyPage)->select();
	         // var_dump($arr);
	         // exit();
	        $maxPage=$mItem->count()/$everyPage;
	        $this->assign('data',$arr);
	        $this->assign('page',$page);
	        $this->assign('maxPage',$maxPage);
	        $this->display();
    }
    public function collection(){
        $m=M('collection');
        $map["userid"]=$_SESSION['id'];
        $collections=$m->where($map)->join('pipe_item ON pipe_collection.itemid=pipe_item.itemid')->select();
        $this->assign("collections",$collections);
        $this->display();
    }
    public function addCollection(){

        $uname=$_POST["uname"];
        $iid=$_POST["iid"];
        // $uname=chen;
        // $iid=2;
        $mUser=M("buyer");
        $map["username"]=$uname;
        $user=$mUser->where($map)->find();

        $m=M('collection');
        $data['userid']=$user['userid'];
        $data['itemid']=$iid;
        $lastid=$m->add($data);

        if ($lastid) {
            echo 1;
        }else{
            echo 0;
        } 

    }
    public function removeCollection(){
        $collectionid=$_GET['id'];
        $m=M('collection');
        $map['collectionid']=$collectionid;
        $map['userid']=$_SESSION['id'];
        $co=$m->where($map)->delete();
        if ($co) {
            echo "suc";
            exit();
        }else{
            echo "error";
            exit();
        }
    }
    public function detail(){
    	$itemId=$_GET['id'];
        // var_dump($itemId);
        // exit();
        $mItem=M('item')->join('pipe_seller ON pipe_item.sellerid=pipe_seller.userid');
        $where['itemid']=$itemId;
        $arr=$mItem->where($where)->find();
        // var_dump($arr);
        // exit();
        if (!$arr) {
            echo "该物品不存在";
            exit();
        }
        // 收藏
        $mCollection=M('collection');
        $dataCol['itemid']=$itemId;
        $dataCol['userid']=$_SESSION['id'];
        $collection=$mCollection->where($dataCol)->find();
        if($collection){
            $this->assign('collection','1');
        }
        else{
            $this->assign('collection','0');
        }
        // 评论
        $mComment=M("comment");  
        $map['itemid'] = $itemId;
        $comments=$mComment->join('pipe_buyer ON pipe_comment.userid=pipe_buyer.userid')->where($map)->select();
        $commentCount= (count($comments));
        // 评论数
        $this->assign("commentCount",$commentCount);
        $this->assign('item',$arr);
        $this->assign('commentList',$comments);
        $this->assign('itemId',$itemId);
        $this->display();

    }
    public function addComment(){
        $iid=$_GET['itemid'];
        $did=$_GET['detailid'];
        $this->assign("iid",$iid);
        $this->assign("did",$did);
        $this->display();
    }
    public function doAddComment(){
        $mItem=M('item');
        $uid=$_SESSION['id'];
        $iid=$_POST['iid'];
        $did=(int)$_POST['did'];
        $content=$_POST['comment-con'];

        // 插入评论
        $m=M('comment');
        $m1=M('orderdetail');
        $m->startTrans();
        $m1->startTrans();
        $mItem->startTrans();
        $data['userid']=$uid;
        $data['itemid']=$iid;
        $data['content']=$content;
        $data['date']=mktime();
        // var_dump($data);

        $data['commentscore']=$_POST['stars'];
        $m->add($data); 
        // 商品分数更新
        $map['itemid']=$iid;
        $item=$mItem->where($map)->find();
        $commentCount=$item['commentcount'];
        $score=$item['score']; 
        $data2['itemid']=$iid;
        $data2['score']=($srore*$commentCount+$_POST['stars'])/($commentcount+1);
        $temp=$mItem->save($data2);
        // 更新状态
        $data1['detailid']=$did;
        $data1['dstatus']=9;
        $result=$m1->save($data1);

        if($result!==false){
            // echo "1";
            // exit();
            $m->commit();
            $m1->commit();
            $mItem->commit();
            $this->success('Successful！Thank you for choosing us',U('Order/show'));
        }
        else{
            $m->rollback();
            $m1->rollback();
            $mItem->rollback();
            $this.error('Error！');
        }
    }

}