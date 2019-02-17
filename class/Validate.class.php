<?php

/*
 * 		文件名:Validate.class.php
 * 		概要: 数据验证类.
 */

class Validate {

  //==========================================
  // 函数: required($data)
  // 功能: 检验数据不能为空
  // 参数: $data 数据
  //==========================================
  static function required($data) {
    if (trim($data) == "") {
      return false;
    } else {
      return true;
    }
  }

  //==========================================
  // 函数: required($data)
  // 功能: 检验数据不能为空
  // 参数: $data 数据
  //==========================================
  static function noZero($data) {
    if (trim($data) == 0) {
      return false;
    } else {
      return true;
    }
  }

  //==========================================
  // 函数: checkLength($data)
  // 功能: 检验数据不能超过指定长度
  // 参数: $data 数据
  // 参数: $len 指定长度
  //==========================================
  static function checkLength($data, $len) {
    if (!is_int($len))
      exit("长度参数不是数字");
    if (strlen($data) > $len) {
      return false;
    } else {
      return true;
    }
  }

  //==========================================
  // 函数: isNumber($data)
  // 功能: 检查数据是否为数字
  // 参数: $data 数据
  //==========================================
  static function isNumber($data) {
    $re = "/^\d+$/";
    if (preg_match($re, $data))
      return true;
    else
      return false;
  }

  //==========================================
  // 函数: match($data, $re)
  // 功能: 检查数据是否匹配给定的模式
  // 参数: $data 数据
  // 参数: $re 过滤使用的正则表达式
  //==========================================
  static function match($data, $re) {
    if (preg_match($re, $data))
      return true;
    else
      return false;
  }

  //==========================================
  // 函数: equal($data1, $data2)
  // 功能: 检查给定两个数据是否相等
  // 参数: $data1,$data2 数据
  //==========================================
  static function equal($data1, $data2) {
    if ($data1 === $data2)
      return true;
    else
      return false;
  }

}

?>
