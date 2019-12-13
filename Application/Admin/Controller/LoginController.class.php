<?php
/**
 * Created by PhpStorm.
 * User: 2
 * Date: 2019/12/6
 * Time: 14:54
 */

namespace Admin\Controller;
use Think\Controller;


class LoginController extends Controller
{
    public function login(){
        if(I('post.')) {
            $verify = I('post.verify');
            if($this->check_verify($verify)) {
                $admin_name = I('post.admin_name');
                $admin_pwd = md5(I('post.admin_pwd'));
                $admin = M('admin')
                     ->field('admin_id,admin_name,admin_lasttime')
                     ->where("admin_name = '$admin_name' AND admin_pwd = '$admin_pwd'")
                     ->find();
                if($admin) {
                    //设置cookie和session
                    cookie('admin_id',$admin['admin_id']);
                    cookie('admin_name',$admin['admin_name']);
                    //获取最后登录时间
                    cookie('admin_lasttime1',$admin['admin_lasttime']);
                    //刷新最后登录时间
                    cookie('admin_lasttime',time());
                    session('is_login',1);
                    $this->success('登录成功',U('Index/index'));
                    exit();
                } else {
                    $this->error('用户名或密码错误');
                    exit();
                }
            }else {
                $this->error('验证码输入有误');
                exit();
            }

        }
        $this->display();
    }

    //生成验证码
    public function verify(){
        $config = array(
            'fontSize'=>16,
            'length'=>4,
        );
        $verify = new \Think\Verify($config);
        $verify->entry();
    }

    //配对验证码
    public function check_verify($code,$id=''){
        $verify = new \Think\Verify();
        return $verify->check($code,$id);
    }
}