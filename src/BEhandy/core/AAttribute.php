<?php
namespace BEhandy\core;

// 字段属性类
abstract class AAttribute
{
    private $k_to_v_arr = [];  // kv缓存
    protected $C_to_A = []; // 状态
    // 检测是否存在该键
    public function hasK($column, $search_value)
    {
        if (isset($this->k_to_v_arr[$column][$search_value])) {
            // 先从kv缓存读取
            return true;
        }
        if (isset($this->C_to_A[$column])) {
            $len = count($this->C_to_A[$column]);
            for ($i = 0; $i < $len; $i++) {
                if (in_array($search_value, $this->C_to_A[$column][$i])) {
                    $this->k_to_v_arr[$column][$search_value] = [];
                    return true;
                }
            }
        }
        return false;
    }
    // 获取值
    public function getV($column, $search_value, $index)
    {
        if (isset($this->k_to_v_arr[$column][$search_value][$index])) {
            return $this->k_to_v_arr[$column][$search_value][$index];
        }
        if (isset($this->C_to_A[$column])) {
            $len = count($this->C_to_A[$column]);
            for ($i = 0; $i < $len; $i++) {
                if (in_array($search_value, $this->C_to_A[$column][$i])) {
                    $value = $this->C_to_A[$column][$i][$index];
                    $this->k_to_v_arr[$column][$search_value][$index] = $value;
                    return $value;
                }
            }
        }
        return null;
    }
    // 返回数组为 field 和 titile 的两个一起的数组
    public function getKV($column, $k_index, $v_index, $k_key_name = 'value', $v_key_name = 'text')
    {
        $res = [
            $k_key_name => [],
            $v_key_name => []
        ];
        if (isset($this->C_to_A[$column])) {
            $len = count($this->C_to_A[$column]);
            for ($i = 0; $i < $len; $i++) {
                // k_key_array
                $k_ = $this->C_to_A[$column][$i][$k_index];
                $res[$k_key_name][] = $k_;
                // v_key_array
                $v_ = $this->C_to_A[$column][$i][$v_index];
                $res[$v_key_name][] = $v_;
            }
        }
        return $res;
    }
    // 返回数组 键为 field ，值为 titile 
    public function getKtoV($column, $k_index, $v_index)
    {
        $res = [];
        if (isset($this->C_to_A[$column])) {
            $len = count($this->C_to_A[$column]);
            for ($i = 0; $i < $len; $i++) {
                $k_ = $this->C_to_A[$column][$i][$k_index];
                $v_ = $this->C_to_A[$column][$i][$v_index];
                $res[$k_] = $v_;
            }
        }
        return $res;
    }
    // 返回二维数组，二维数组包含 field 和 title 的键名 
    public function getIncludeKV($column, $k_index, $v_index, $k_key_name = 'value', $v_key_name = 'text')
    {
        $res = [];
        if (isset($this->C_to_A[$column])) {
            $len = count($this->C_to_A[$column]);
            for ($i = 0; $i < $len; $i++) {
                $k_ = $this->C_to_A[$column][$i][$k_index];
                $v_ = $this->C_to_A[$column][$i][$v_index];
                $res[$i] = [
                    $k_key_name => $k_,
                    $v_key_name => $v_,
                ];
            }
        }
        return $res;
    }
}
