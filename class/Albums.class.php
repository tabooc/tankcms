<?php

/*
 * 图册类
 */

class Albums extends BaseLogic {

    function __construct($showError = TRUE) {
        parent:: __construct($showError);
        $this->tabName = TAB_PREFIX . 'albums';
        $this->fieldList = array('aname', 'ades', 'aid', 'acover', 'atime', 'asort');
    }

    /*
     * 页表数据获取
     * @$e 分页偏移量
     * @$t 查询类型 1.后台全部查询 2.前台普通列表查询  3.前台首页查询
     * @$w 类型
     * @$indexlimit 前台首页需要展示的条目
     */

    function getAll($e, $t = 1, $w = '', $indexlimit = 6) {
        if (is_array($w)) {
            $tmp = "IN (" . join(",", $w) . ")";
        } else {
            $tmp = "= $w";
        }
        $data = '';
        $albumsclass = new AlbumsClass();
        $photos = new Photos();
        switch ($t) {
            case 1:
                $sql = "SELECT {$this->tabName}.*,{$albumsclass->tabName}.cname,{$photos->tabName}.path FROM `{$this->tabName}` LEFT JOIN `{$albumsclass->tabName}` ON {$this->tabName}.aid={$albumsclass->tabName}.id LEFT JOIN {$photos->tabName} ON {$this->tabName}.acover={$photos->tabName}.id ORDER BY {$this->tabName}.asort DESC,{$this->tabName}.id ASC";
                $sql.=$e['sqllimit']; //组合完整的SQL语句
                break;
            case 2:
                $sql = "SELECT {$this->tabName}.*,{$albumsclass->tabName}.cname FROM `{$this->tabName}`,`{$albumsclass->tabName}` WHERE {$this->tabName}.aid $tmp AND {$this->tabName}.artaudit=1 AND {$this->tabName}.aid={$albumsclass->tabName}.id ORDER BY asort	 DESC,id ASC";
                $sql.=$e['sqllimit'];
                break;
            case 3:
                $sql = "SELECT {$this->tabName}.*,{$albumsclass->tabName}.cname FROM `{$this->tabName}`,`{$albumsclass->tabName}` WHERE {$this->tabName}.aid $tmp AND {$this->tabName}.artaudit=1 AND {$this->tabName}.aid={$albumsclass->tabName}.id ORDER BY asort	 DESC,id ASC LIMIT $indexlimit";
                break;
        }
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function joinGet($id) {
        $data = '';
        $albumsclass = new AlbumsClass();
        $sql = "SELECT {$this->tabName}.*,{$albumsclass->tabName}.cname,{$albumsclass->tabName}.id as cid FROM `{$this->tabName}`,`{$albumsclass->tabName}` WHERE {$this->tabName}.id='$id' AND {$this->tabName}.aid={$albumsclass->tabName}.id ";
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function uniondel($id) {

        if (is_array($id)) {
            $tmp = "IN (" . join(",", $id) . ")";
        } else {
            $tmp = "= $id";
        }

        //1:物理删除图片
        //2: 删除图片记录
        $photos = new Photos();
        $sql = "SELECT path FROM {$photos->tabName} WHERE aid " . $tmp;
        $result = $this->mysqli->query($sql);
        while ($row = $result->fetch_assoc()) {
            unlink($row['path']);
        }


        $sql = "DELETE FROM {$photos->tabName} WHERE aid " . $tmp;
        $this->mysqli->query($sql);

        //删除图册记录
        $sql = "DELETE FROM {$this->tabName} WHERE id " . $tmp;
        return $this->mysqli->query($sql);
    }

}

?>