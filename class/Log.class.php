<?php

/*
 * 日志类
 */

class Log extends BaseLogic {

  function __construct($showError=TRUE) {
    parent:: __construct($showError);
    $this->tabName = TAB_PREFIX . "log";
    $this->fieldList = array("username", "ipaddress", "logintime", "caozuo");
  }

  function getAll($e) {
    $data = '';
    $sql = "select * from `{$this->tabName}` order by logintime desc,id desc";
    $sql.=$e['sqllimit']; //组合完整的SQL语句
    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

}
?>