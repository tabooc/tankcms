<?php

/*
 * 相册类型类
 */

class AlbumsClass extends BaseLogic {

    function __construct($showError = TRUE) {
        parent:: __construct($showError);
        $this->tabName = TAB_PREFIX . "albumsclass";
        $this->fieldList = array('cname', 'csort', 'ctime');
    }

    public function getAll($e) {
        $data = '';
        $sql = "SELECT * FROM `{$this->tabName}` ORDER BY csort DESC, id ASC";
        $sql.=$e['sqllimit']; //组合完整的SQL语句  分页用
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function uniondel($id) {
        if (is_array($id)) {
            $tmp = "IN (" . join(",", $id) . ")";
        } else {
            $tmp = "= $id";
        }

        


        $sql = "DELETE FROM {$this->tabName} WHERE id " . $tmp;
        return $this->mysqli->query($sql);
    }

}

?>