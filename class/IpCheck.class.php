<?php

/*
 * IP类
 */

class IpCheck extends BaseLogic {

  function __construct($showError=TRUE) {
    parent:: __construct($showError);
    $this->tabName = TAB_PREFIX . "ipaddress";
    $this->fieldList = array("ipaddress", "iptype");
  }

//检查登录IP地址是否在禁止之列
  function checkLoginIP($ip) {
    $result = $this->mysqli->query("SELECT * FROM {$this->tabName} WHERE ipaddress='" . $ip . "' AND iptype='0'");
    if ($result->num_rows > 0) {
      return true;
    } else {
      return false;
    }
  }

 //获取所有按需求排序的IP记录
  function getAll($e) {
    $data = '';
    $sql = "select * from `{$this->tabName}` order by id desc";
    $sql.=$e['sqllimit']; //组合完整的SQL语句
    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

  //添加IP
  function addIP($ipaddress, $iptype) {
    $data["ipaddress"] = $ipaddress;
    $data["iptype"] = $iptype;
    if ($this->add($data)) {
      return true;
    } else {
      return false;
    }
  }

}

?>