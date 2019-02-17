<?php

/*
 * 文章类
 */

class AuthNode extends BaseLogic {

    function __construct($showError = TRUE) {
        parent:: __construct($showError);
        $this->tabName = TAB_PREFIX . "authnode";
        $this->fieldList = array("nodename", "nodemark", "nodedes", "nodefid");
    }

    /*
     * 页表数据获取
     * @$e 分页偏移量
     */

    public function getAll($e) {

        $sql = "SELECT {$this->tabName}.* FROM `{$this->tabName}` ORDER BY id";
        if ($e) {
            $sql.=$e['sqllimit']; //组合完整的SQL语句
        }
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function uniondel($id) {
        $tmp = '';

        $count = count($id);
        for ($i = 0; $i < $count; $i++) {
            $tmp .=$id[$i] . $this->getChildrenIds($id[$i]) . ',';
        }

        $tmp = rtrim($tmp, ',');
        $tmp = explode(',', $tmp);
        $tmp = array_unique($tmp);
        $where = 'IN(' . join(',', $tmp) . ')';

        $sql = "DELETE FROM {$this->tabName} WHERE id " . $where;
        return $this->mysqli->query($sql);
    }

    public function getChildrenIds($id) {
        $ids = '';
        $sql = "SELECT * FROM {$this->tabName}  WHERE `nodefid` = '{$id}'";
        $res = $this->mysqli->query($sql);
        if ($res) {
            while ($row = $res->fetch_assoc()) {
                $ids .= ',' . $row['id'];
                $ids .=$this->getChildrenIds($row['id']);
            }
        }
        return $ids;
    }

    public function getRootNode() {
        $sql = "SELECT * FROM `{$this->tabName}` WHERE nodefid=0 ORDER BY id";
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    //循环输出树节点
    public function getChildrenTree($id, $glist) {

        $sql = "SELECT * FROM {$this->tabName}  WHERE `nodefid` = '{$id}'";
        $res = $this->mysqli->query($sql);
        if ($res->num_rows > 0) {
            $ids = '<ul>';
            while ($row = $res->fetch_assoc()) {
                if (in_array($row['id'], $glist)) {
                    $check = 'checked=checked';
                } else {
                    $check = '';
                }
                $ids .= '<li data-lev="childer"><input type="checkbox" name="node[]" ' . $check . ' value="' . $row['id'] . '" />' . $row['nodename'];
                $ids .= $this->getChildrenTree($row['id'], $glist);
                $ids .='</li>';
            }
            $ids .= '</ul>';
        }
        return $ids;
    }

    //获取节点详情
    public function joinGet($id) {
        $data = '';

        $sql = "SELECT {$this->tabName}.* FROM `{$this->tabName}` WHERE {$this->tabName}.id='$id' ";
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    //获取节点ID
    public function getid($nodemark) {

        $sql = "SELECT id FROM {$this->tabName} WHERE nodemark = '$nodemark'";
        $result = $this->mysqli->query($sql);
        return $result;
    }

    //根据用户权限生成左侧主导航
    public function menu() {

        $menu = '';
        $sql = "SELECT * FROM {$this->tabName} WHERE nodefid =0 AND nodemark<>'default' AND id in({$_SESSION['grouplist']})";
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $menu .= '<div>';
            $menu .= '<h3>' . $row['nodename'] . '</h3><dl>';
            $subsql = "SELECT * FROM {$this->tabName} WHERE nodefid = '{$row['id']}' AND id in({$_SESSION['grouplist']})";
            $subresult = $this->mysqli->query($subsql);
            while ($subrow = $subresult->fetch_assoc()) {
                $menu .= "<dd><a href='{$subrow['nodemark']}.php' target='contentFrame'>{$subrow['nodename']}</a></dd>";
            }
            $menu .= '</dl></div>';
        }

        return $menu;
    }

}

?>