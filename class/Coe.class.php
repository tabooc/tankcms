<?php

/*
 * 大事记类
 */

class Coe extends BaseLogic {

  function __construct($showError=TRUE) {
    parent:: __construct($showError);
    $this->tabName = TAB_PREFIX . "coe";
    $this->fieldList = array("coedate", "coecontent", "coeyearid", "coeupdate","coestate");
  }

  function getAll($e) {
    $data = '';
    $coeclass = new CoeClass();

    $sql = "SELECT {$this->tabName}.*,{$coeclass->tabName}.coeyear FROM `{$this->tabName}`,`{$coeclass->tabName}` WHERE {$this->tabName}.coeyearid={$coeclass->tabName}.id ORDER BY coeupdate DESC";

    $sql.=$e['sqllimit']; //组合完整的SQL语句
    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

    function joinGet($id) {
    $data = '';
    $coeclass = new CoeClass();
    $sql = "SELECT {$this->tabName}.*,{$coeclass->tabName}.coeyear,{$coeclass->tabName}.id as cid FROM `{$this->tabName}`,`{$coeclass->tabName}` WHERE {$this->tabName}.id='$id' AND {$this->tabName}.coeyearid={$coeclass->tabName}.id ";
    $result = $this->mysqli->query($sql);
     while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }


}
?>