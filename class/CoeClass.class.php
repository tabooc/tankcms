<?php

/*
 * 大事记年份类
 */

class CoeClass extends BaseLogic {

  function __construct($showError=TRUE) {
    parent:: __construct($showError);
    $this->tabName = TAB_PREFIX . "coeclass";
    $this->fieldList = array("coeyear", "markid");
  }

  function getAll($e) {
    $data = '';
    $sql = "SELECT * FROM `{$this->tabName}` ORDER BY markid DESC";
    $sql.=$e['sqllimit']; //组合完整的SQL语句
    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

}

?>