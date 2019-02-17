<?php

/*
 * 相册列表管理
 */
require "../init.app.php";
checklogin();

$page =!empty($_GET['page'])?abs($_GET['page']):1;
$action = 'albumslist';
$albums = new Albums();

$getpagedata = $albums->getPageData($page, $action,15);
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

$tank->assign('con', 'albumsedit.php'); //查看详情要跳转到的action
$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->display("webacp/albumslist.tpl.html");
?>


