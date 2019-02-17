<?php

/*
 * 资料管理类
 */

class Uploads extends BaseLogic {

    function __construct($showError = TRUE) {
        parent:: __construct($showError);
        $this->tabName = TAB_PREFIX . 'files';
        $this->fieldList = array('filepath', 'filename', 'fileext', 'filesize', 'filedes', 'uptime');
    }

    public function getAll($e) {
        $data = '';
        $sql = "SELECT * FROM `{$this->tabName}` ORDER BY id DESC";
        $sql.=$e['sqllimit']; //组合完整的SQL语句
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function delfiles($id) {
        if (is_array($id)) {
            $tmp = "IN (" . join(",", $id) . ")";
        } else {
            $tmp = "= $id";
        }

        $sql="SELECT filepath FROM {$this->tabName} WHERE id ".$tmp;
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            unlink($row['filepath']);
        }


        $sql = "DELETE FROM {$this->tabName} WHERE id " . $tmp;
        return $this->mysqli->query($sql);
    }

}

?>