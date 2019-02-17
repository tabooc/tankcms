<?php

/*
 * 集团荣誉
 *
 */

require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'honourmg';
$jump = 'honouredit.php';


$honour = new Honour();
$getpagedata = $honour->getPageData($page, $action);
$data = $honour->getAll($getpagedata);

if (!empty($_POST['aud'])) {
  if (!empty($_POST['eng_id'])) {
    $hdata['id'] = $_POST['eng_id'];
    $hdata['honstate'] = 1;
    if ($honour->mod($hdata)) {
      $msg = '已成功审核选中项！';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action.'.php?page='.$page);
}

if (!empty($_POST['rec'])) {
  if (!empty($_POST['eng_id'])) {
    $hdata['id'] = $_POST['eng_id'];
    $hdata['honstate'] = 0;
    if ($honour->mod($hdata)) {
      $msg = '已成功冻结选中项';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action.'.php?page='.$page);
}
if (!empty($_POST['del'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($honour->del($eng_id)) {
      $msg = '已成功将选中项删除';
    } else {
      $msg = '删除失败!';
    }
  } else {
    $msg = '请先选择要删除的项！';
  }
  infoWindow($msg, $action.'.php?page='.$page);
}


$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->assign("jump", $jump); //详情
$tank->display("webacp/honourmg.tpl.html");
?>