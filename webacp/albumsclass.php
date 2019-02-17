<?php

/*
 * 相册分类管理
 */
require "../init.app.php";
checklogin();


$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'albumsclass';

$albums = new AlbumsClass();

$getpagedata = $albums->getPageData($page, $action);
$data = $albums->getAll($getpagedata);

if (!empty($_POST['del'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($albums->uniondel($eng_id)) {
      $msg = '已成功将选中项删除';
    } else {
      $msg = '删除失败!';
    }
  } else {
    $msg = '请先选择要删除的项！';
  }
  infoWindow($msg, $action . '.php');
}

if (!empty($_POST['addclass'])) {
  $cdata['cname'] = trim($_POST['adp']);
  $cdata['csort'] = $_POST['typept'];
  $cdata['ctime'] = time();

  $res = $albums->checkRepeat('cname', $cdata['cname']);
  if ($res > 0) {
    $msg = '此类型已存在！';
  } else {
    if ($albums->add($cdata)) {
      $msg = '添加类型成功！';
    } else {
      $msg = '添加类型失败';
    }
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}

if (!empty($_POST['editclass'])) {
  $cdata['id'] = $_POST['classid'];
  $cdata['cname'] = trim($_POST['editadp']);
  $cdata['csort'] = $_POST['edittypept'];
  $res = $albums->checkRepeat('cname', $cdata['cname']);
  if ($res > 1) {
    $msg = '此类型已存在！';
  } else {
    if ($albums->mod($cdata)) {
      $msg = '编辑成功！';
    } else {
      $msg = '编辑失败';
    }
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}


$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->display("webacp/albumsclass.tpl.html");
?>


