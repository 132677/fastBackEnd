<?php
namespace BEhandy\core;

use BEhandy\core\AAttribute;
use BEhandy\core\ALang;
use BEhandy\core\ACheck;

// 操作类
abstract class AOperate
{
    public $fieldAttr;
    public $lang;
    private $check_ins;
    private $check_method;
    public function __construct(AAttribute $attribute,  ALang $lang)
    {
        $this->fieldAttr = $attribute;
        $this->lang = $lang;
    }
    // 提交
    abstract protected function commit();
    // 批量提交
    abstract protected function moreCommit();
    // 实例化
    abstract public static function instance();
    // 导入check方法
    public function setCheck(ACheck $check_ins, $check_method = '')
    {
        $this->check_ins = $check_ins;
        // 将 语言库 和 字段属性库 也一同赋值给 验证类
        $this->check_ins->fieldAttr = $this->fieldAttr;
        $this->check_ins->lang = $this->lang;
        $this->check_method = $check_method;
    }
    // 调用
    public function make($method, $attr = [])
    {
        if ($method != 'commit' && $method != 'moreCommit') {
            return false;
        }
        if ($this->check_ins && $this->check_method) {
            // check验证
            $check_method = $this->check_method;
            $res = $this->check_ins->$check_method(...$attr);
            if (!$res) {
                return false;
            }
        }
        return $this->$method(...$attr);
    }
    // 获取错误
    public function getCheckErrors()
    {
        if ($this->check_ins) {
            return $this->check_ins->errors;
        }
        return [];
    }
}
