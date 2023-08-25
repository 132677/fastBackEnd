<?php

use BEhandy\example\user\UserAttribute;

$UserAttr = new UserAttribute;
$res = $UserAttr->getKtoV('status', 0, 1);
var_dump($res);

$res2 = $UserAttr->toJs($res);
var_dump($res2);