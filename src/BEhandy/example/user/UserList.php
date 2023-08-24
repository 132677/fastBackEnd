<?php

namespace BEhandy\example\user;

use BEhandy\core\ListFunc\Simple;

class UserList
{
    public $where = [];
    public $cwhere = [];

    use Simple;

    public function index()
    {
        $that = $this;
        // 不为空写法
        $this->noEmptyString($that, [
            ['name', '张三'],
            ['age', ''],
        ], ['where', 'cwhere']);


        var_dump($this->where, $this->cwhere);
    }
}
