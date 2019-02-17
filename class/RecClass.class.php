<?php

/*
 * 招聘类型类
 */

class RecClass extends BaseLogic {

  function __construct($showError=TRUE) {
    parent:: __construct($showError);
    $this->tabName = TAB_PREFIX . "recclass";
    $this->fieldList = array("zptype", "typeid");
  }

  function getAll($e) {
    $data = '';
    $sql = "SELECT * FROM `{$this->tabName}` ORDER BY typeid DESC";
    $sql.=$e['sqllimit']; //组合完整的SQL语句  分页用
    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

}

?>