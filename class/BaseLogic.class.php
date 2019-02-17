<?php

/*
 * 		文件名:BaseLogic.class.php
 * 		概要: 数据处理公共类.
 */

class BaseLogic extends MyDB {

  protected $tabName;  //表的名称
  protected $fieldList;
  protected $messList;

  //==========================================
  // 函数: add($postList)
  // 功能: 添加
  // 参数: $postList 提交的变量列表
  // 返回: 此次操作的自增ID
  //==========================================
  function add($postList) {
    $fieldList = '';
    $value = '';
    foreach ($postList as $k => $v) {
      if (in_array($k, $this->fieldList)) {
        $fieldList.=$k . ",";
        if (!get_magic_quotes_gpc())
          $value .= "'" . addslashes($v) . "',";
        else
          $value .= "'" . $v . "',";
      }
    }

    $fieldList = rtrim($fieldList, ",");
    $value = rtrim($value, ",");

    $sql = "INSERT INTO {$this->tabName} (" . $fieldList . ") VALUES(" . $value . ")";
    $result = $this->mysqli->query($sql);

    if ($result && $this->mysqli->affected_rows > 0){
      return $this->mysqli->insert_id;
    }else{
      return false;
    }
  }

  //==========================================
  // 函数: mod($postList)
  // 功能: 修改表数据
  // 参数: $postList 提交的变量列表
  // 需确保ID在数组第一个位置
  //==========================================
  function mod($postList) {
    $id = $postList["id"];
    if (is_array($id)){
      $tmp = "IN (" . join(",", $id) . ")";
    }else{
      $tmp = "= $id";
    }
    array_shift($postList); //将数组开头的单元移出数组
    $value = '';
    foreach ($postList as $k => $v) {
      if (in_array($k, $this->fieldList)) {
        if (!get_magic_quotes_gpc()){
          $value .= $k . " = '" . addslashes($v) . "',";
        }else{
          $value .= $k . " = '" . $v . "',";
        }
      }
    }
    $value = rtrim($value, ",");
    $sql = "UPDATE {$this->tabName} SET {$value} WHERE id " . $tmp;
    return $this->mysqli->query($sql);
  }

  //==========================================
  // 函数: del($id)
  // 功能: 删除
  // 参数: $id 编号或ID列表数组
  // 返回: 0 失败 成功为删除的记录数
  //==========================================
  function del($id) {
    if (is_array($id)){
      $tmp = "IN (" . join(",", $id) . ")";
    }else{
      $tmp = "= $id";
    }
    $sql = "DELETE FROM {$this->tabName} WHERE id " . $tmp;
    return $this->mysqli->query($sql);
  }

  function get($id) {
    $sql = "SELECT * FROM {$this->tabName} WHERE id ={$id}";
    $result = $this->mysqli->query($sql);
    if ($result && $result->num_rows == 1) {
      return $result->fetch_assoc();
    } else {
      return false;
    }
  }

  //id上下的临近信息
  /*
   * @$id 当前文章ID
   * @$type 查找类型 1为下一条信息，2为上一条
   * @$and 查询条件
   * @$info 默认查询字段
   * @ret 返回字段数据
   *
   */
  function nextOrPrevId($id, $type=1,$and='1=1',$info='id',$ret=1) {
    if ('1' == $type) {
      $sql = "SELECT $info FROM `{$this->tabName}` WHERE $and AND id>'$id' ORDER BY id LIMIT 0,1 ";
    } else {
      $sql = "SELECT $info FROM `{$this->tabName}` WHERE $and AND id<'$id' ORDER BY id DESC LIMIT 0,1 ";
    }
    $result = $this->mysqli->query($sql);
    $arr = $result->fetch_assoc();
    if ($arr) {
      if('1'==$ret){
      return $arr[$info];
      }else{
        return $arr;
      }
    } else {
      return false;
    }
  }

  //获取总记录行数
  function getAllRows($where='1=1') {
    $rows = 0;
    $sql = "SELECT id from {$this->tabName} WHERE $where ";
    $result = $this->mysqli->query($sql);
    $rows = $result->num_rows;
    return $rows;
  }

  //分页
  function getPageData($page, $action='log', $size=20, $len=12,$where='1=1') {
    $getpageinfo = '';
    $counts = $this->getAllRows($where);
    $getpageinfo = pagesfun($action, $page, $counts, $size, $len);
    return $getpageinfo;
  }

  //获取数据表中所有信息
    function selectAll() {
    $data = '';
    $sql = "SELECT * FROM `{$this->tabName}` ORDER BY id";
    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

  //添加特定记录的时候检查是否已经存在记录
  function checkRepeat($field,$type) {
    $rows = 0;
    $sql = "SELECT id from {$this->tabName} where $field='$type'";
    $result = $this->mysqli->query($sql);
    $rows = $result->num_rows;
    return $rows;
  }

}

?>
