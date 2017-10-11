<?php
namespace Admin\Controller;
class ManagerController extends CommonController {
    //展示管理员列表
    public function index(){
        $model = M('Manager');
        //获取管理员信息
        $manager = $model->alias('t1')->field('t1.*,t2.role_name')->join("left join tpshop_role as t2 on t1.role_id=t2.role_id")->select();
        $this->assign('manager',$manager);
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $data = I('post.');
            $model = D('Manager');
            if(!$model->create($data)){
                $error = $model->getError();
                $this->error($error);

            }
            $res = $model->add($data)
            if($res){
                $this->success('添加成功',U('Admin/Manager/index'));
            }else{
                $this->error('添加失败');
            }


        }else{
            $this->display();
        }
    }

    //修改管理员
    public function edit(){

        if(IS_POST){
            /*//J接受信息
            $data = I('post.');
            $data['update_time']=date('Y-m-d H:i:s',time());
            $res = M('Manager')->save($data);
            if($res !== false){
                $this->success("修改成功",U("Admin/Manager/index"));
            }else{
                $this->error('修改失败');
            }*/
            $data=I('post.');
            $data['update_time']=date('Y-m-d H:i:s',time());
            $res= D('Manager')->save($data);
            if($res !==false ){
                $this->success('修改成功',U('Admin/Manager/index'));
            }else{
                $this->error('修改失败');
            }

        }else{
            //接受需要编辑的用户id
            $id = I('get.id');
            $managerInfo=M("Manager")->where(array('id'=>$id))->find();
            $this->assign('managerInfo',$managerInfo);
            $this->display();
        }

    }

    //删除数据
    public function delete(){
        $id = I('get.id');
        $res = M('Manager')->delete($id);
        //判断删除成功与否
        if ($res!==false) {
            $this->success('删除成功',U('Admin/Manager/index'));
        }else{
            $this->error('删除失败');
        }
    }
}