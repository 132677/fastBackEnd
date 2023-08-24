<?php
require __DIR__. './../../../vendor/autoload.php';

use BEhandy\example\admin\AdminLang;
use BEhandy\example\user\UserLang;
use BEhandy\example\goods\GoodsLang;

// 语言库
$UserLang = new UserLang;
$GoodsLang = new GoodsLang;
$AdminLang = new AdminLang;
var_dump($AdminLang->column['admin_name']);
var_dump($AdminLang->column['create_time']);

echo '——— ———', PHP_EOL;

// 多重继承，继承优先级：A->import(B), A的优先级比B高，以此类推
$AdminLang->import($GoodsLang);
$AdminLang->import($AdminLang);
var_dump($AdminLang->column['admin_name']);
var_dump($AdminLang->column['goods_name']);
var_dump($AdminLang->column['create_time']);
var_dump($AdminLang->GoodsLang->column['create_time']);
var_dump($AdminLang->AdminLang->column['create_time']);