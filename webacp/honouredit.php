<?php

/*
 * 集团荣誉详情
 *
 */

require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'honouredit';
$jump = 'honourmg.php';

$honour = new Honour();

if (empty($_GET['aid'])) {

  if (!empty($_POST['honouradd'])) {
    $hdata['hondate'] = $_POST['rydate'];
    $hdata['honct'] = $_POST['rycontent'];
    $hdata['honupdate'] = $_POST['ryupdate'];
    $hdata['honstate'] = $_POST['aud'];

    if ($honour->add($hdata)) {
      $msg = '发布成功';
    } else {
      $msg = '发布失败';
    }
    infoWindow($msg, $action . '.php?page=' . $page);
  }

  $tank->assign('jump', $jump);
  $tank->assign('nowdate', date("Y-m-d H:i:s"));
  $tank->display("webacp/honouradd.tpl.html");
} else {
  $aid = abs($_GET['aid']);
  $hdata = $honour->get($aid);


  if (!empty($_POST['uphonour'])) {
    $updata['id'] = $aid;
    $updata['hondate'] = $_POST['rydate'];
    $updata['honct'] = trim($_POST['content']);
    $updata['honupdate'] = $_POST['ryupdate'];

    if ($honour->mod($updata)) {
      $msg = '编辑成功';
    } else {
      $msg = '编辑失败';
    }
    infoWindow($msg, $action . '.php?page=' . $page);
  }

  $tank->assign('jump', $jump);
  $nextid = $honour->nextOrPrevId($aid);
  $previd = $honour->nextOrPrevId($aid, 2);

  $tank->assign('nextid', $nextid);
  $tank->assign('previd', $previd);
  $tank->assign("data", $hdata); //数据

  $tank->display("webacp/honourcon.tpl.html");
}
?>