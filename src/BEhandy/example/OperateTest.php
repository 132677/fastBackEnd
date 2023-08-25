<?php
use BEhandy\example\user\UserAdd;
use BEhandy\example\user\UserCheck;

// 操作和验证类
$UserCheck = new UserCheck(false);
$UserAdd = UserAdd::instance();
$UserAdd->setCheck($UserCheck, 'add'); // 可以省略不写
$res = $UserAdd->make('commit', ['张三', '123456']);
var_dump($res); // 操作返回结果
var_dump($UserAdd->getCheckErrors()); // 获取检测的所有错误
var_dump($UserAdd->fieldAttr->hasK('status', '未激活')); // 调用字段属性库