<?php

/*
 * 集团荣誉
 *
 */

require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'authnodemg';
$jump = 'authnodeedit.php';


$auth = new AuthNode();
$getpagedata = $auth->getPageData($page, $action);
$data = $auth->getAll($getpagedata);

//删除权限节点，同时将删除此节点下的所有下级节点
if (!empty($_POST['del'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($auth->uniondel($eng_id)) {
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
$tank->display("webacp/authnodemg.tpl.html");
?>