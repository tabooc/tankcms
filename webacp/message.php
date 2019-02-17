<?php

/*
 * 留言管理
 *
 */
require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'message';
$jump = 'messageedit.php';


$msgboard = new MsgBoard();
$getpagedata = $msgboard->getPageData($page, $action);
$data = $msgboard->getAll($getpagedata);

if (!empty($_POST['delmsg'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($msgboard->del($eng_id)) {
      $msg = '已成功将选中项删除';
    } else {
      $msg = '删除失败!';
    }
  } else {
    $msg = '请先选择要删除的项！';
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}

if (!empty($_POST['markno'])) {
  if (!empty($_POST['eng_id'])) {
    $mdata['id'] = $_POST['eng_id'];
    $mdata['megstate'] = 0;
    if ($msgboard->mod($mdata)) {
      $msg = '已成功将选中项设置为未读！';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}

if (!empty($_POST['mark'])) {
  if (!empty($_POST['eng_id'])) {
    $mdata['id'] = $_POST['eng_id'];
    $mdata['megstate'] = 1;
    if ($msgboard->mod($mdata)) {
      $msg = '已成功将选中项设置为已读';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}

$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->assign("jump", $jump); //详情
$tank->display("webacp/message.tpl.html");
?>