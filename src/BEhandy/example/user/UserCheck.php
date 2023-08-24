<?php

namespace BEhandy\example\user;

use BEhandy\core\ACheck;

class UserCheck extends ACheck
{
    // 添加
    public function add($name, $password)
    {
        var_dump('UserCheck--add', $name, $password);
        $this->addError('name', '用户名称未填');
        $this->addError('password', '密码未填');
        return true;
    }
}
