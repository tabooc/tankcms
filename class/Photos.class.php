<?php

/*
 * 资料管理类
 */

class Photos extends BaseLogic {

    function __construct($showError = TRUE) {
        parent:: __construct($showError);
        $this->tabName = TAB_PREFIX . 'photos';
        $this->fieldList = array('aid', 'pcover', 'path', 'pname', 'pext', 'psize', 'ptime');
    }

    /*
     * $t 类型 数值
     */

    public function getAll($e, $where = '1=1') {
        $data = '';
        $sql = "SELECT * FROM `{$this->tabName}` WHERE $where ORDER BY id DESC";
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

        $sql = "SELECT path FROM {$this->tabName} WHERE id " . $tmp;
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            unlink($row['path']);
        }


        $sql = "DELETE FROM {$this->tabName} WHERE id " . $tmp;
        return $this->mysqli->query($sql);
    }

    //设置id = $id的照片为相册封面
    public function setcover($id, $aid) {
        $sql = "UPDATE {$this->tabName} SET pcover=0 WHERE aid=$aid";
        $this->mysqli->query($sql);

        $sql = "UPDATE {$this->tabName} SET pcover=1 WHERE id=$id";
        return $this->mysqli->query($sql);
    }

}

?>