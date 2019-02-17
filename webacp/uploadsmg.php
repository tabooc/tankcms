<?php

/*
 * 资料管理
 *
 */

require "../init.app.php";
checklogin();

$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'uploadsmg';
$jump = 'uploadsedit.php';


$uploads = new Uploads();
$getpagedata = $uploads->getPageData($page, $action);
$data = $uploads->getAll($getpagedata);


if (!empty($_POST['del'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($uploads->delfiles($eng_id)) {
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
$tank->assign("jump", $jump); //详情
$tank->display("webacp/uploadsmg.tpl.html");
?>