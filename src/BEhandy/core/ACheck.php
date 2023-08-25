<?php
namespace BEhandy\core;

/**
 * 验证类
 * Class ACheck
 * @package BEhandy\core
 */
abstract class ACheck
{
    public $fieldAttr;
    public $lang;
    public $errors = [];
    private $whenever_first_error = false;
    public function __construct($whenever_first_error = false)
    {
        $this->whenever_first_error = $whenever_first_error;
    }
    /**
     * 添加错误
     * @param string $field 字段
     * @param string $msg 消息
     */
    protected function addError($field, $msg)
    {

        if (empty($this->errors) && $this->whenever_first_error) {
            // 只要第一个错误
            $this->errors[$field] = $msg;
        }
        if (!$this->whenever_first_error) {
            // 需要所有错误
            $this->errors[$field] = $msg;
        }
    }
}
