<?php

/*
 * 缓存更新
 */
require "../init.app.php";
checklogin();

$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'iplvi';

$iplvi = new IpCheck();
$getpagedata = $iplvi->getPageData($page, $action);
$data = $iplvi->getAll($getpagedata);

if (!empty($_POST['iplvidel'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($iplvi->del($eng_id)) {
      $msg = '已成功将选中项删除';
    } else {
      $msg = '删除失败!';
    }
  } else {
    $msg = '请先选择要删除的项！';
  }
  infoWindow($msg, $action . '.php');
}

if (!empty($_POST['iplvino'])) {
  if (!empty($_POST['eng_id'])) {
    $pdata['id'] = $_POST['eng_id'];
    $pdata['iptype'] = 0;
    if ($iplvi->mod($pdata)) {
      $msg = '已成功将选中项冻结';
    } else {
      $msg = '冻结失败!';
    }
  } else {
    $msg = '请先选择要冻结的项！';
  }
  infoWindow($msg, $action . '.php');
}

if (!empty($_POST['iplviok'])) {
  if (!empty($_POST['eng_id'])) {
    $pdata['id'] = $_POST['eng_id'];
    $pdata['iptype'] = 1;
    if ($iplvi->mod($pdata)) {
      $msg = '已成功将选中项解禁';
    } else {
      $msg = '解禁失败!';
    }
  } else {
    $msg = '请先选择要解禁的项！';
  }
  infoWindow($msg, $action . '.php');
}

if (!empty($_POST['addip'])) {
  $pdata['ipaddress'] = trim($_POST['adp']);
  $pdata['iptype'] = $_POST['iplx'];
  $res = $iplvi->checkRepeat('ipaddress', $pdata['ipaddress']);
  if ($res > 0) {
    $msg = '此IP地址已存在！';
  } else {
    if ($iplvi->add($pdata)) {
      $msg = '添加IP成功！';
    } else {
      $msg = '添加IP失败';
    }
  }
  infoWindow($msg, $action . '.php');
}

$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->display("webacp/iplvi.tpl.html");
?>