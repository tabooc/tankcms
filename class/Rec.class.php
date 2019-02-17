<?php

/*
 * 招聘类
 */

class Rec extends BaseLogic {

  function __construct($showError=TRUE) {
    parent:: __construct($showError);
    $this->tabName = TAB_PREFIX . "rec";
    $this->fieldList = array("zhiwei", "xingzhi", "zptime", "gzyear","xueli","number","yuyan","yuexin","jlyy","place","miaoshu","recstate","leixing","uptop");
  }

  function getAll($e) {
    $data = '';
    $recclass = new RecClass();

    $sql = "SELECT {$this->tabName}.*,{$recclass->tabName}.zptype FROM `{$this->tabName}`,`{$recclass->tabName}` WHERE {$this->tabName}.leixing={$recclass->tabName}.id ORDER BY uptop DESC,zptime DESC";

    $sql.=$e['sqllimit']; //组合完整的SQL语句
    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }


    function joinGet($id) {
    $data = '';
    $recclass = new RecClass();
    $sql = "SELECT {$this->tabName}.*,{$recclass->tabName}.zptype,{$recclass->tabName}.id as cid FROM `{$this->tabName}`,`{$recclass->tabName}` WHERE {$this->tabName}.id='$id' AND {$this->tabName}.leixing={$recclass->tabName}.id ";
    $result = $this->mysqli->query($sql);
     while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }


}
?>