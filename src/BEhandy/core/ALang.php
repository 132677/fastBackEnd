<?php
namespace BEhandy\core;

// 语言库
abstract class ALang
{
    // 以字段键值对的方式
    public $column = [];
    // 以模板的方式，里面有占位符
    private $temp = [];
    //  以状态信息的方式，里面有占位符
    private $code = [];
    // 导入模板
    public function import($instance)
    {
        // 导入遇到相同参数，优先级：本实例 > 导入的类
        $this->temp = array_merge($instance->temp, $this->temp);
        $this->column = array_merge($instance->column, $this->column);
        $this->code = array_merge($instance->code, $this->code);
        if (class_exists($instance::class)) {
            // 利用反射获取类对象
            $name = (new \ReflectionClass($instance))->getShortName();
            $this->{$name} = $instance;
        }
    }

    // 导出模板信息
    public function outTemp($key, $data = [])
    {
        if (!is_array($data)) return '';
        if (!isset($this->temp[$key])) return '';
        return sprintf($this->temp[$key], ...$data);
    }

    // 导出状态信息
    public function outCode($key, $data = [])
    {
        if (!is_array($data)) return [];
        if (!isset($this->code[$key])) return [];
        $code_data = $this->code[$key];
        $code_data['message'] = sprintf($code_data['message'], ...$data);
        return $code_data;
    }
}
