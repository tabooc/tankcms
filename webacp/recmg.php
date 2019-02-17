<?php

/*
 * 招聘列表
 *
 */
require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'recmg';
$con = 'recedit.php';
$rec = new Rec();

$getpagedata = $rec->getPageData($page, $action);
$data = $rec->getAll($getpagedata);

if (!empty($_POST['aud'])) {
  if (!empty($_POST['eng_id'])) {
    $cdata['id'] = $_POST['eng_id'];
    $cdata['recstate'] = 1;
    if ($rec->mod($cdata)) {
      $msg = '已成功发布选中项！';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action . '.php?page='.$page);
}

if (!empty($_POST['up'])) {
  if (!empty($_POST['eng_id'])) {
    $cdata['id'] = $_POST['eng_id'];
    $cdata['recstate'] = 1;
    $cdata['uptop'] = 1;
    if ($rec->mod($cdata)) {
      $msg = '已成功置顶选中项！';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action . '.php?page='.$page);
}

if (!empty($_POST['markno'])) {
  if (!empty($_POST['eng_id'])) {
    $cdata['id'] = $_POST['eng_id'];
    $cdata['recstate'] = 0;
    $cdata['uptop'] = 0;
    if ($rec->mod($cdata)) {
      $msg = '已成功冻结选中项！';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action . '.php?page='.$page);
}
if (!empty($_POST['del'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($rec->del($eng_id)) {
      $msg = '已成功将选中项删除';
    } else {
      $msg = '删除失败!';
    }
  } else {
    $msg = '请先选择要删除的项！';
  }
  infoWindow($msg, $action . '.php?page='.$page);
}


$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->assign("con", $con); //详情
$tank->display("webacp/recmg.tpl.html");
?>