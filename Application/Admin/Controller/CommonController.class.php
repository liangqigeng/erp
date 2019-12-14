<?php
/**
 * Created by PhpStorm.
 * User: 2
 * Date: 2019/12/6
 * Time: 16:10
 */

namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller{
    //初始化操作，默认调用的方法
    public function _initialize(){
        $is_login = session('is_login');
        if(empty($is_login)||$is_login!=1) {
            //重定向,不提示直接跳转
            $this->redirect('Login/login');
            exit();
        }
        $admin_id = cookie('admin_id');
        //echo $admin_id;die;
        $act_list = M('admin')
            ->alias('a')
            ->join('erp_admin_role as b on a.role_id = b.role_id')
            ->field('act_list')
            ->where("admin_id = $admin_id")
            ->find();
        $act_list = $act_list['act_list'];
        $action = M('action')
            ->field('name,control,act,color,font')
            ->where("is_show =1 AND action_id in($act_list)")
            ->order('ord asc')
            ->select();
        $admin_name = cookie('admin_name');
        $this->assign('admin_name',$admin_name);
        $this->assign('action',$action);
    }

    //异步轮询推送消息
    public function getMsg() {
        if(!IS_AJAX) {
            E('页面不存在');
        }
        $admin_id = cookie('admin_id');
        $usermsg = M('question')->where("to_id = $admin_id")->select();
        foreach ($usermsg  as $k=>$v){
            $usermsg[$k]['que_addtime']=date('Y-m-d',$v['que_addtime']);
            $usermsg[$k]['que_remark']=str_cut($v['que_remark'],0,45);
        }
        $msg = S('usermsg',$usermsg);
        if($msg) {
            echo json_encode($usermsg);
        }
    }

    /**
     * 图片上传
     * @param $path [保存文件夹名称]
     * @param $width [缩略图宽度多个用,号分隔]
     * @param $height [缩略图高度多个用,号分隔]
     */
    Private function _upload($path,$width,$height) {
        $obj = new \Think\UploadFile();// 实例化文件上传类
        $obj->maxSize = C('UPLOAD_MAX_SIZE'); // 图片最大上传大小
        $obj->savePath = C('UPLOAD_PATH') .$path. '/'; //文件保存路径
        $obj->saveRule = 'uniqid'; //保存文件名
        $obj->uploadReplace = true; //覆盖同名文件
        $obj->allowExts = C('UPLOAD_EXTS'); //允许上传文件的后缀名
        $obj->thumb = true;//生成缩略图
        $obj->thumbMaxWidth = $width; //缩略图宽度
        $obj->thumbMaxHeight = $height; //缩略图高度
        $obj->thumbPrefix = 'max_,medium_,mini_'; //缩略图前缀名
        $obj->thumbPath = $obj->savePath .date('Y-m'). '/'; //缩略图保存路径
        $obj->thumbRemoveOrigin = true; //删除原图
        $obj->autoSub = true; //使用子目录保存文件
        $obj->subType ='date'; //使用日期为子目录名称
        $obj->dateFormat = 'Y-m'; //使用 年_月 形式

        if($obj->upload()) {
          $info = $obj->getUploadFileInfo();
          $pic = explode('/',$info[0]['savename']);
          return array(
              'path' => array(
                 'max' => $pic[0].'/max_'.$pic[1],
                 'medium' => $pic[0].'/medium_'.$pic[1],
                 'mini' => $pic[0].'/mini_'.$pic[1],
              )
          );
        }
    }
    //错误页面跳转
    public function _empty() {
        $this->redirect('Login/404');
        exit();
    }
}