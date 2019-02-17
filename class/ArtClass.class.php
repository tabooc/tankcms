<?php

/*
 * 文章类型类
 */

class ArtClass extends BaseLogic {

  function __construct($showError=TRUE) {
    parent:: __construct($showError);
    $this->tabName = TAB_PREFIX . "artclass";
    $this->fieldList = array("classname", "pid");
  }

  function getAll($e) {
    $data = '';
    $sql = "SELECT * FROM `{$this->tabName}` ORDER BY id";
    $sql.=$e['sqllimit']; //组合完整的SQL语句  分页用
    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

}

?>