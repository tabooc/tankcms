<?php

/*
 * 文章类型管理
 */
require "../init.app.php";
checklogin('articlesclass');


$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'articlesclass';

$artclass = new ArtClass();

$getpagedata = $artclass->getPageData($page, $action);
$data = $artclass->getAll($getpagedata);

if (!empty($_POST['del'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($artclass->del($eng_id)) {
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
  $cdata['classname'] = trim($_POST['adp']);
  $cdata['pid'] = $_POST['typept'];
  $res = $artclass->checkRepeat('classname', $cdata['classname']);
  if ($res > 0) {
    $msg = '此类型已存在！';
  } else {
    if ($artclass->add($cdata)) {
      $msg = '添加类型成功！';
    } else {
      $msg = '添加类型失败';
    }
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}

if (!empty($_POST['editclass'])) {
  $cdata['id'] = $_POST['classid'];
  $cdata['classname'] = trim($_POST['editadp']);
  $cdata['pid'] = $_POST['edittypept'];
  $res = $artclass->checkRepeat('classname', $cdata['classname']);
  if ($res > 0) {
    $msg = '此类型已存在！';
  } else {
    if ($artclass->mod($cdata)) {
      $msg = '编辑成功！';
    } else {
      $msg = '编辑失败';
    }
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}


$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->display("webacp/articlesclass.tpl.html");
?>


