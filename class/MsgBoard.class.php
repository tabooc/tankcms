<?php

/*
 * 留言类
 */

class MsgBoard extends BaseLogic {

  function __construct($showError=TRUE) {
    parent:: __construct($showError);
    $this->tabName = TAB_PREFIX . "message";
    $this->fieldList = array("meguser", "megemail", "megtel", "megcontent","megtime","megstate");
  }

  function getAll($e) {
    $data = '';
    $sql = "SELECT * FROM `{$this->tabName}` ORDER BY megtime DESC";
    $sql.=$e['sqllimit']; //组合完整的SQL语句
    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

}
?>