<?php
namespace Admin\Controller;
class AuthController extends CommonController {
    //管理员列表的展示
    public function index(){
        //得到管理员信息
        /*$model=M('Manager');
        $managers = $model->select();
        $this->assign('manager',$managers);*/
        $this->dispaly();


    }
}