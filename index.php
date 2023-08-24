<?php
/*
 * @Author: 林先生 937777466@qq.com
 * @Date: 2023-08-24 22:15:53
 * @LastEditors: 林先生 937777466@qq.com
 * @LastEditTime: 2023-08-25 00:26:18
 * @FilePath: \fastBackEnd\index.php
 * @Description: 这是默认设置,请设置`customMade`, 打开koroFileHeader查看配置 进行设置: https://github.com/OBKoro1/koro1FileHeader/wiki/%E9%85%8D%E7%BD%AE
 */

require 'vendor/autoload.php';

use fastBackEnd\user\UserList;

$UserList = new UserList;
$UserList->index();

// 111  2222   3333