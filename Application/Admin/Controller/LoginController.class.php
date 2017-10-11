<?php
namespace Admin\Controller;
use       Think\Controller;
class LoginController extends Controller{
    public function login(){
        if(IS_POST){
            //接受数据
            $data = I('post.');
            //验证验证码是否正确
            $verify = new \Think\Verify;
            $check = $verify->check($data['verify']);
            if(!$check){
                $this->error('验证码错误');
            }
            //实例化model
            $model = M('Manager');
            $manager=$model->where(array('username'=>$data['username']))->find();
            //验证用户名密码是否正确
            if($manager && $manager['password']==encrypt_password($data['password'])){
                session('userinfo',$manager);
                //在上述验证都成功的情况下
                $this->success('登录成功',U("Admin/Index/index"));
            }else{
                $this->error('用户名或密码错误');
            }





        }else{
            $this->display();
        }
    }

   /* //生成验证码
    Public function verify1(){
        //实例化验证码类
        $config=array(
            // 'useImgBg'  =>  true,           // 使用背景图片
            'length'    =>  4,               // 验证码位数
            'useCurve'  =>  false,            // 是否画混淆曲线
            'useNoise'  =>  false,            // 是否添加杂点
        );
        //实例化验证码类
        $verify= new \Think\Verify($config);
        //调用entry() 方法生成并输出验证码
        $verify->entry();
    }*/

    //生成验证码
    Public function captcha(){
        $config=array(
            "length"=>4,
            'useCurve'=>false,
            'useNoise'=>false,
        );
        //实例化验证码类
        $verify=new \Think\Verify($config);
        //调用entry()方法生成并输出验证码
        $verify->entry();
    }
}