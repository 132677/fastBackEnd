<?php

namespace BEhandy\example\user;

use BEhandy\core\AOperate;

class UserAdd extends AOperate
{
    // 提交
    protected function commit($name = '', $password = '')
    {
        var_dump('commit');
        var_dump($name, $password);
    }
    // 批量提交
    protected function moreCommit($name = '', $password = '')
    {
        var_dump('moreCommit');
        var_dump($name, $password);
    }
    // 内部实例化
    public static function instance()
    {
        $UserLang = new UserLang;
        $UserLang->import(new \BEhandy\example\admin\AdminLang);
        return new self(new \BEhandy\example\user\UserAttribute, $UserLang);
    }
    // 获取验证错误
    public function getCheckErrors()
    {
        return parent::getCheckErrors();
    }
}
