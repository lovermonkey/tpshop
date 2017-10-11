<?php
namespace Admin\Model;
use Think\Model;
class ManagerModel extends Model{
    protected $_validate = array(
        array('username','require','用户名不能为空','0','','3'),
        array('username','','用户名不能为空','0','unique','3'),
        array('password','require','密码不能为空','0','','3'),
        array('confpwd','password','密码不正确','0','confirm','3'),
        array('email','require','邮箱不能为空','0','','3'),
    );

    //自动完成
    protected $_auto = array(
        array('create_time','time','1','function'),
        array('password','encrypt_password','1','function'),
    );
}