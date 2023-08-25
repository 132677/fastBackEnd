<?php

namespace BEhandy\core\listFunc;

/**
 * 列表类的普通函数
 * Trait Simple
 * @package BEhandy\core\listFunc
 */
trait Simple
{
    public $where = [];
    // 遍历函数
    function forCall($func, $arr)
    {
        foreach ($arr as $value) {
            $func(...$value);
        }
    }
    //

    /**
     * 查找不为空字符串
     * @param $that $this
     * @param array $attr 属性数组
     * @param string $res_arr 条件数组
     */
    function noEmptyString($that, $attr, $res_arr = 'where')
    {
        $this->forCall(function ($field, $value) use ($that, $res_arr) {
            if ($value !== '') {
                if (is_array($res_arr)) {
                    foreach ($res_arr as $v) {
                        $that->$v[$field] = $value;
                    }
                } else {
                    $that->$res_arr[$field] = $value;
                }
            }
        }, $attr);
    }
}
