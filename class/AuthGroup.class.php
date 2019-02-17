<?php

/*
 * 用户权限组类
 * 显示权限组用户数量有两种方法，一种是权限组联合查询出用户数量，还有一种就是用户进行添加或删除的时候改变权限组里固定字段的值，当前用的是固定字段方法
 */

class AuthGroup extends BaseLogic {

    function __construct($showError = TRUE) {
        parent:: __construct($showError);
        $this->tabName = TAB_PREFIX . 'authgroup';
        $this->fieldList = array('groupname', 'grouplist', 'groupsum');
    }

    public function getAll($e) {
        $data = '';
        $sql = "SELECT * FROM `{$this->tabName}` ORDER BY id";
        if ($e) {
            $sql.=$e['sqllimit']; //组合完整的SQL语句  分页用
        }
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    //获取用户组详情
    public function getById($id) {

        $data = '';
        $sql = "SELECT {$this->tabName}.* FROM `{$this->tabName}` WHERE {$this->tabName}.id='$id' ";
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    //删除节点的同时删除节点下所有用户
    public function uniondel($gid) {
        if (is_array($gid)) {
            foreach ($gid as $key => $value) {
                if ($value != 1) {
                    $tmp[] = $value;
                }
            }
            $tmp = "IN (" . join(",", $tmp) . ")";
        } else {
            if ($gid == 1) {
                return false;
            }
            $tmp = "= $gid";
        }
        $user = new User();
        $sql = "DELETE FROM {$user->tabName} WHERE usertype " . $tmp;
        $this->mysqli->query($sql);

        $sql = "DELETE FROM {$this->tabName} WHERE id " . $tmp;
        return $this->mysqli->query($sql);
    }

}

?>