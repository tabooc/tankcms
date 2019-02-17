<?php

/*
 * 添加、编辑招聘
 *
 */
require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'recclass';

$recclass = new RecClass();

$getpagedata = $recclass->getPageData($page, $action);
$data = $recclass->getAll($getpagedata);

if (!empty($_POST['del'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($recclass->del($eng_id)) {
      $msg = '已成功将选中项删除';
    } else {
      $msg = '删除失败!';
    }
  } else {
    $msg = '请先选择要删除的项！';
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}

if (!empty($_POST['addclass'])) {
  $cdata['zptype'] = trim($_POST['adp']);
  $cdata['typeid'] = $_POST['typept'];
  $res = $recclass->checkRepeat('zptype', $cdata['zptype']);
  if ($res > 0) {
    $msg = '此类型已存在！';
  } else {
    if ($recclass->add($cdata)) {
      $msg = '添加类型成功！';
    } else {
      $msg = '添加类型失败';
    }
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}

if (!empty($_POST['editclass'])) {
  $cdata['id'] = $_POST['classid'];
  $cdata['zptype'] = trim($_POST['editadp']);
  $cdata['typeid'] = $_POST['edittypept'];
  $res = $recclass->checkRepeat('zptype', $cdata['zptype']);
  if ($res > 0) {
    $msg = '此类型已存在！';
  } else {
    if ($recclass->mod($cdata)) {
      $msg = '编辑成功！';
    } else {
      $msg = '编辑失败';
    }
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}


$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->display("webacp/recclass.tpl.html");
?>