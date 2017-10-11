<?php
//密码加盐
function encrypt_password($password){
    $salt = 'asdasdas;asddasd';
    return md5($salt.md5($password));
}