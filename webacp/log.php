<?php

/*
 * 日志
 */
require "../init.app.php";
checklogin();

$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'log';

$log = new Log();
$getpagedata = $log->getPageData($page, $action);
$data = $log->getAll($getpagedata);

if (!empty($_POST['logdel'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($log->del($eng_id)) {
      $msg = '已成功将选中项删除';
    } else {
      $msg = '删除失败!';
    }
  } else {
    $msg = '请先选择要删除的项！';
  }
  infoWindow($msg, $action.'.php');
}
$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->display("webacp/log.tpl.html");
?>