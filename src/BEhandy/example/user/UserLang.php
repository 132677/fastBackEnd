<?php

namespace BEhandy\example\user;

use BEhandy\core\ALang;

class UserLang extends ALang
{
    // 以字段键值对的方式
    public $column = [
        'user_name' => '用户名',
        'create_time' => '用户创建时间'
    ];
    // 以模板的方式，里面有占位符
    protected $temp = [
        "int_s1" => "%s 必须是整数类型！"
    ];
    //  以状态信息的方式，里面有占位符
    protected $code = [
        'error_s1' => ['code' => 500, 'message' => '%s 必须是整数类型！']
    ];
}
