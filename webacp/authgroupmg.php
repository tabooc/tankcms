<?php

/*
 * 用户权限组管理
 */
require "../init.app.php";
checklogin();


$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'authgroupmg';
$jump = 'authgroupedit.php';
$authgroup = new AuthGroup();

$getpagedata = $authgroup->getPageData($page, $action);
$data = $authgroup->getAll($getpagedata);

if (!empty($_POST['del'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($authgroup->uniondel($eng_id)) {
      $msg = '已成功将选中项删除';
    } else {
      $msg = '删除失败!';
    }
  } else {
    $msg = '请先选择要删除的项！';
  }
  infoWindow($msg, $action . '.php');
}

if (!empty($_POST['add'])) {
  $cdata['groupname'] = trim($_POST['adp']);
  $res = $authgroup->checkRepeat('groupname', $cdata['groupname']);
  if ($res > 0) {
    $msg = '此名称已存在！';
  } else {
    if ($authgroup->add($cdata)) {
      $msg = '添加成功！';
    } else {
      $msg = '添加失败';
    }
  }
  infoWindow($msg, $action . '.php');
}


$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->assign("jump", $jump); //数据
$tank->display("webacp/authgroupmg.tpl.html");
?>


