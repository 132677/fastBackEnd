<?php

namespace BEhandy\example\user;

use BEhandy\core\AAttribute;

class UserAttribute extends AAttribute
{
    // 状态
    protected $C_to_A = [
        'status' => [
            ['NOENABLE', 0, '未激活'],
            ['ENABLE', 1, '激活'],
            ['DISABLE', -1, '禁用']
        ]
    ];
}
