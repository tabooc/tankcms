<?php

/*
 * 集团荣誉类
 */

class Honour extends BaseLogic {

  function __construct($showError=TRUE) {
    parent:: __construct($showError);
    $this->tabName = TAB_PREFIX . "Honour";
    $this->fieldList = array("hondate", "honct", "honupdate", "honstate");
  }

  function getAll($e) {
    $data = '';
    $sql = "SELECT * FROM `{$this->tabName}` ORDER BY honupdate DESC";
    $sql.=$e['sqllimit']; //组合完整的SQL语句
    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

}
?>