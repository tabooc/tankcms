<?php

/*
 * 用户管理
 */
require "../init.app.php";
checklogin();

$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'usermg';
$jump = 'useredit.php';

$user = new User();
$getpagedata = $user->userGetPageData($page,$action);
$data = $user->getAll($getpagedata, $_SESSION['usertype'], $_SESSION['username']);

if (!empty($_POST['deluser'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($user->uniondel($eng_id)) {
      $msg = '已成功将选中项删除';
    } else {
      $msg = '删除失败!';
    }
  } else {
    $msg = '请先选择要删除的项！';
  }
  infoWindow($msg, $action.'.php');
}

if (!empty($_POST['freeze'])) {
  if (!empty($_POST['eng_id'])) {
    $udata['id'] = $_POST['eng_id'];
    $udata['userstatus'] = 0;
    if ($user->mod($udata)) {
      $msg = '已成功将选中项冻结';
    } else {
      $msg = '冻结失败!';
    }
  } else {
    $msg = '请先选择要冻结的项！';
  }
  infoWindow($msg, $action.'.php?page='.$page);
}

if (!empty($_POST['unc'])) {
  if (!empty($_POST['eng_id'])) {
    $udata['id'] = $_POST['eng_id'];
    $udata['userstatus'] = 1;
    if ($user->mod($udata)) {
      $msg = '已成功将选中项解禁';
    } else {
      $msg = '解禁失败!';
    }
  } else {
    $msg = '请先选择要解禁的项！';
  }
  infoWindow($msg, $action.'.php?page='.$page);
}

$tank->assign('jump', $jump);
$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->display("webacp/usermg.tpl.html");
?>