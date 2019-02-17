<?php

/*
 * 大事记
 */
require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'coemg';
$jump = 'coeedit.php';

$coe = new Coe();

$getpagedata = $coe->getPageData($page, $action);
$data = $coe->getAll($getpagedata);

if (!empty($_POST['aud'])) {
  if (!empty($_POST['eng_id'])) {
    $cdata['id'] = $_POST['eng_id'];
    $cdata['coestate'] = 1;
    if ($coe->mod($cdata)) {
      $msg = '已成功发布选中项！';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}

if (!empty($_POST['markno'])) {
  if (!empty($_POST['eng_id'])) {
    $cdata['id'] = $_POST['eng_id'];
    $cdata['coestate'] = 0;
    if ($coe->mod($cdata)) {
      $msg = '已成功冻结选中项！';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}
if (!empty($_POST['del'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($coe->del($eng_id)) {
      $msg = '已成功将选中项删除';
    } else {
      $msg = '删除失败!';
    }
  } else {
    $msg = '请先选择要删除的项！';
  }
  infoWindow($msg, $action . '.php?page=' . $page);
}


$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->assign("jump", $jump); //详情
$tank->display("webacp/coemg.tpl.html");
?>