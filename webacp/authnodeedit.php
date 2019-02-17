<?php

/*
 * 权限节点详情
 *
 */

require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'authnodeedit';
$jump = 'authnodemg.php';

$auth = new AuthNode();

if (empty($_GET['aid'])) {

  $data = $auth->getAll('');

  if (!empty($_POST['add'])) {
    $hdata['nodename'] = $_POST['nodename'];
    $hdata['nodemark'] = trim($_POST['nodemark']);
    $hdata['nodedes'] = $_POST['nodedes'];
    $hdata['nodefid'] = $_POST['nodefid'];

    if ($auth->add($hdata)) {
      $msg = '发布成功';
    } else {
      $msg = '发布失败';
    }
    infoWindow($msg, $jump);
  }

  $tank->assign('data', $data);
  $tank->assign('jump', $jump);
  $tank->assign('nowdate', date("Y-m-d H:i:s"));
  $tank->display("webacp/authnodeadd.tpl.html");
} else {
  $aid = abs($_GET['aid']);
  $hdata = $auth->get($aid);
  $ndata = $auth->getAll('');
  if ('del' == $_GET['want']) {

    if ($auth->del($aid)) {
      $msg = '删除成功!';
    } else {
      $msg = '删除失败';
    }
    infoWindow($msg, $jump);
  }

  if (!empty($_POST['up'])) {
    $updata['id'] = $aid;
    $updata['nodename'] = $_POST['nodename'];
    $updata['nodemark'] = trim($_POST['nodemark']);
    $updata['nodedes'] = $_POST['nodedes'];
    $updata['nodefid'] = $_POST['nodefid'];

    if ($auth->mod($updata)) {
      $msg = '编辑成功';
    } else {
      $msg = '编辑失败';
    }
    infoWindow($msg, $jump);
  }

  $tank->assign('jump', $jump);
  $nextid = $auth->nextOrPrevId($aid);
  $previd = $auth->nextOrPrevId($aid, 2);

  $tank->assign('nextid', $nextid);
  $tank->assign('previd', $previd);
  $tank->assign("data", $hdata); //数据
  $tank->assign("ndata", $ndata); //节点列表数据

  $tank->display("webacp/authnodecon.tpl.html");
}
?>