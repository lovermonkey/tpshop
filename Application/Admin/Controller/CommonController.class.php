<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller{
    public function __construct() {
        /*//调用父类构造函数  若不调用的话就是将父类的构造方法重写
        parent::__construct();
        //判断session中有没有$manager
        if (!session('?manager_info')) {
            //没有登录 跳转
            $this->redirect('Admin/Login/login','请先登录！');
        }
        //调用getnav 方法获取左侧权限
        $this->getnav();
        //调用checknav() 方法 检测访问者 有没有范文当前页面的权限
        $this->checkauth();*/

        //调用父类构造函数 若不调动的话就是讲父类的构造函数重写
        parent::__construct();
        //判断用户书否已经登录
        if(!session('?userinfo')){
            $this->redirect("Admin/Login/login","请先登录");
        }
    }


}
