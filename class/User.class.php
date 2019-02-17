<?php

/*
 * 		文件名:User.class.php
 * 		概要: 用户管理类.
 */

class User extends BaseLogic {

    function __construct($showError = TRUE) {
        parent:: __construct($showError);
        $this->tabName = TAB_PREFIX . "user";
        $this->fieldList = array("username", "password", "usertype", "userstatus", "regtime", "endlogin");
    }

    function login($uname, $pwd) {
        $sql = "SELECT * FROM {$this->tabName} WHERE userstatus='1' AND username = '{$uname}'";
        $result = $this->mysqli->query($sql);
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();
            if ($data['password'] == md5($pwd)) {
                $_SESSION['login'] = true;
                $_SESSION['uid'] = $endlogin['id'] = $data['id'];
                $_SESSION['username'] = $uname;
                $_SESSION['usertype'] = $data['usertype'];

                $auth = new AuthGroup();
                $authnode = "SELECT grouplist FROM {$auth->tabName} WHERE id={$data['usertype']}";
                $res = $this->mysqli->query($authnode);
                $group = $res->fetch_assoc();
                $_SESSION['grouplist'] = $group['grouplist'];


                $endlogin['endlogin'] = date("Y-m-d H:i:s");
                $this->mod($endlogin);
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function getUserName($username) {
        $result = $this->mysqli->query("SELECT id FROM {$this->tabName} WHERE username='{$username}'");
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getAll($e, $usertype = 1, $username = '') {
        $data = '';
        $authgroup = new AuthGroup();

        if ($usertype == 1) {
            $sql = "SELECT {$this->tabName}.*,{$authgroup->tabName}.groupname FROM {$this->tabName},{$authgroup->tabName} WHERE {$this->tabName}.usertype = {$authgroup->tabName}.id ORDER BY {$this->tabName}.usertype,{$this->tabName}.id";
            $sql.=$e['sqllimit']; //组合完整的SQL语句
        } else {
            $sql = "SELECT {$this->tabName}.*,{$authgroup->tabName}.groupname FROM {$this->tabName},{$authgroup->tabName} WHERE {$this->tabName}.usertype = {$authgroup->tabName}.id AND {$this->tabName}.id='{$_SESSION["uid"]}' ";
        }

        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function userGetPageData($page, $action = 'usermg', $size = 20, $len = 12) {
        $getpageinfo = '';
        $counts = $this->getFliterRows($_SESSION['usertype'], $_SESSION['uid']);
        $getpageinfo = pagesfun($action, $page, $counts, $size, $len);
        return $getpageinfo;
    }

    //获取符合用户权限条件的总行数
    function getFliterRows($ut, $uid) {
        $rows = 0;
        if ($ut == 1) {
            $sql = "SELECT id FROM {$this->tabName}";
        } else {
            $sql = "SELECT id FROM {$this->tabName} WHERE id='$uid'";
        }
        $result = $this->mysqli->query($sql);
        $rows = $result->num_rows;
        return $rows;
    }

    function unionget($id) {
        $authgroup = new AuthGroup();
        $sql = "SELECT {$this->tabName}.*,{$authgroup->tabName}.groupname FROM {$this->tabName},{$authgroup->tabName} WHERE {$this->tabName}.usertype = {$authgroup->tabName}.id AND {$this->tabName}.id='$id' ";
        $result = $this->mysqli->query($sql);
        if ($result && $result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }


    /*
     * $uid  数组
      删除用户的同时减少所属用户组成员数量
      显示权限组用户数量有两种方法，一种是权限组联合查询出用户数量，还有一种就是用户进行添加或删除的时候改变权限组里固定字段的值
     */

    function uniondel($uid) {
        $authgroup = new AuthGroup();
        $utype = array();
        $sum = 0;

        foreach ($uid as $key => $value) {

            $sql = "SELECT {$this->tabName}.usertype FROM {$this->tabName} WHERE id='$value'";
            if ($result = $this->mysqli->query($sql)) {
                $rows = $result->fetch_assoc();
                if (!in_array($rows['usertype'], $utype)) {
                    $utype[$rows['usertype']] += 1;
                }
            }
        }
        $tmp = "IN (" . join(",", $uid) . ")";
        foreach ($utype as $key => $value) {
            $sql = "UPDATE {$authgroup->tabName} SET `groupsum`=`groupsum`-$value WHERE id='$key'";
            $authgroup->mysqli->query($sql);
        }

        //避免admin被删除
        $sql = "DELETE FROM {$this->tabName} WHERE id<>1 AND id " . $tmp;
        return $this->mysqli->query($sql);
    }

    /*
      添加用户的同时增加所属用户组成员数量
     */

    function unionadd($postList) {
        $fieldList = '';
        $value = '';
        foreach ($postList as $k => $v) {
            if (in_array($k, $this->fieldList)) {
                $fieldList.=$k . ",";
                if (!get_magic_quotes_gpc()) {
                    $value .= "'" . addslashes($v) . "',";
                } else {
                    $value .= "'" . $v . "',";
                }
            }
        }

        $fieldList = rtrim($fieldList, ",");
        $value = rtrim($value, ",");

        $sql = "INSERT INTO {$this->tabName} (" . $fieldList . ") VALUES(" . $value . ")";
        $result = $this->mysqli->query($sql);

        $authgroup = new AuthGroup();
        $sql = "UPDATE {$authgroup->tabName} SET `groupsum`=`groupsum`+1 WHERE id={$postList['usertype']}";
        $authgroup->mysqli->query($sql);

        if ($result && $this->mysqli->affected_rows > 0) {
            return $this->mysqli->insert_id;
        } else {
            return false;
        }
    }

}

?>
