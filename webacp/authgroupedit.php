<?php

/*
 * 用户组权限管理详情
 *
 */

require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$aid = abs($_GET['aid']);
$action = 'authgroupedit';
$jump = 'authgroupmg.php';

$auth = new AuthNode();
$authgroup = new AuthGroup();

$rootnode = $auth->getRootNode();

$authgroupcon = $authgroup->getById($aid);
$grouplist = $authgroupcon[0]['grouplist'];
if ($grouplist) {
    $grouplist = explode(',', $grouplist);
} else {
    $grouplist = array();
}

$check = '';
$str = '';
foreach ($rootnode as $key => $value) {
    if (in_array($value['id'], $grouplist) || $value['nodemark'] == 'default') {
        $check = 'checked=checked';
    } else {
        $check = '';
    }
    $str .='<ul class="nodelist"><li data-lev="root"><input type="checkbox" name="node[]" ' . $check . ' value="' . $value['id'] . '" />' . $value['nodename'];
    $str .= $auth->getChildrenTree($value['id'], $grouplist);
    $str .='</li></ul>';
}


if (!empty($_POST['update'])) {
    $updata['id'] = $aid;
    $updata['groupname'] = trim($_POST['groupname']);
    $updata['grouplist'] = join(",", $_POST['node']);

    if ($authgroup->mod($updata)) {
        $msg = '编辑成功';
    } else {
        $msg = '编辑失败';
    }
    infoWindow($msg, $jump);
}

$tank->assign('authgroupcon', $authgroupcon[0]); //权限组详情
$tank->assign('str', $str);
$tank->assign('jump', $jump);
$tank->assign('nodelist', $nodelist);


$tank->display("webacp/authgroupcon.tpl.html");
?>