<?php
namespace Admin\Controller;

class IndexController extends CommonController {
    public function index(){
        $this->display();

    }

    public function add(){
        $que_addtime =!empty(I('post.que_addtime'))?strtotime(I('post.que_addtime')):time();
        if(I('post.')){
            //p(I('post.'));die;
            $data = array(
                'que_title' => I('post.que_title'),
                'que_remark' => I('post.que_remark'),
                'que_addtime' => $que_addtime,
                'from_id' =>  cookie('admin_id'),
                'to_id' => I('post.admin_id'),
                'li_id' => I('post.li_id'),
            );
            //上传图片
            $upload = new \Think\Upload();
            $upload->exts = array('jpg','jpeg','png','gif');
            $upload->rootPath = './Upload/';
            $upload->savePath = 'Question/';
            $info = $upload->upload();
            //p($info);die;
            if($info) {
                $path = $info['que_photo']['savepath'].$info['que_photo']['savename'];
                $thumb_path = $info['que_photo']['savename'];
                //生成缩略图
                $image = new \Think\Image();
                $image->open('./Upload/'.$path);
                $image->thumb(200,200)->save('./Thumb/Question/'.$thumb_path);
                $data['que_photo'] = $path;
                $data['que_thumb'] = $thumb_path;
            }
            $res = M('question')->add($data);
            if($res) {
                $this->success('添加成功',U('index'));
                exit();
            } else {
                $this->error('数据执行有误，请重试...');
                exit();
            }
        }
        $this->display();
    }


    public function loginOut() {
        session_unset();
        session_destroy();
        @setcookie('admin_id','',time()-1,'/');
        @setcookie('admin_name','',time()-1,'/');
        @setcookie('admin_lasttime1','',time()-1,'/');
        @setcookie('admin_lasttime','',time()-1,'/');
        redirect(U('Login/login'));
    }
}