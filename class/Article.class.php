<?php

/*
 * 文章类
 */

class Article extends BaseLogic {

  function __construct($showError=TRUE) {
    parent:: __construct($showError);
    $this->tabName = TAB_PREFIX . "article";
    $this->fieldList = array("arttype", "arttitle", "artauthor", "artsource","outlink","arttime","artthumb","indexthumb","artdes","artcontent","artuptop","artaudit","artfirst");
  }

    /*
   * 页表数据获取
   * @$e 分页偏移量
   * @$t 查询类型 1.后台全部查询 2.前台普通列表查询  3.前台首页查询
   * @$w 文章类型
   * @$indexlimit 前台首页需要展示的条目
   */
  function getAll($e, $t=1,$w='',$indexlimit=6) {
    if (is_array($w)){
      $tmp = "IN (" . join(",", $w) . ")";
    }else{
      $tmp = "= $w";
      }
    $data = '';
    $artclass = new ArtClass();
    switch ($t) {
      case 1:
        $sql = "SELECT {$this->tabName}.*,{$artclass->tabName}.classname FROM `{$this->tabName}`,`{$artclass->tabName}` WHERE {$this->tabName}.arttype={$artclass->tabName}.id ORDER BY artfirst DESC,artuptop DESC,arttime DESC";
        $sql.=$e['sqllimit']; //组合完整的SQL语句
        break;
      case 2:
        $sql = "SELECT {$this->tabName}.*,{$artclass->tabName}.classname FROM `{$this->tabName}`,`{$artclass->tabName}` WHERE {$this->tabName}.arttype $tmp AND {$this->tabName}.artaudit=1 AND {$this->tabName}.arttype={$artclass->tabName}.id ORDER BY artfirst DESC,artuptop DESC,arttime DESC";
        $sql.=$e['sqllimit'];
        break;
      case 3:
        $sql = "SELECT {$this->tabName}.*,{$artclass->tabName}.classname FROM `{$this->tabName}`,`{$artclass->tabName}` WHERE {$this->tabName}.arttype $tmp AND {$this->tabName}.artaudit=1 AND {$this->tabName}.arttype={$artclass->tabName}.id ORDER BY artfirst DESC,artuptop DESC,arttime DESC LIMIT $indexlimit";
        break;
    }

    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }


      /*
   * 页表数据获取
   * @$e 分页偏移量
   * @$t 文章类型
   * @$w 关键词
   */
  function searchAll($e, $t=1,$k='') {
    if (is_array($t)){
      $tmp = "IN (" . join(",", $t) . ")";
    }else{
      $tmp = "= $t";
      }
    $data = '';
    $artclass = new ArtClass();

        $sql = "SELECT {$this->tabName}.*,{$artclass->tabName}.classname FROM `{$this->tabName}`,`{$artclass->tabName}` WHERE {$this->tabName}.arttype $tmp AND {$this->tabName}.arttype={$artclass->tabName}.id AND {$this->tabName}.arttitle like '%$k%' ORDER BY artfirst DESC,artuptop DESC,arttime DESC";
        $sql.=$e['sqllimit']; //组合完整的SQL语句

    $result = $this->mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }

    function joinGet($id) {
    $data = '';
    $artclass = new ArtClass();
    $sql = "SELECT {$this->tabName}.*,{$artclass->tabName}.classname,{$artclass->tabName}.id as cid FROM `{$this->tabName}`,`{$artclass->tabName}` WHERE {$this->tabName}.id='$id' AND {$this->tabName}.arttype={$artclass->tabName}.id ";
    $result = $this->mysqli->query($sql);
     while ($row = $result->fetch_assoc()) {
      $data[] = $row;
    }
    return $data;
  }


}
?>