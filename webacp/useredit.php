<?php

/*
 * 用户编辑
 */
require "../init.app.php";
checklogin();

$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'useredit';
$jump = 'usermg.php';

if ($_SESSION['usertype'] != 1 && $_SESSION['uid'] != $_GET['uid']) {
  $msg = '无权限';
  infoWindow($msg, $jump, 2);
  exit();
}


$user = new User();
$authgroup = new AuthGroup();
$groupdata = $authgroup->getAll('');


if (empty($_GET['uid'])) {

  if (!empty($_POST['addsub'])) {
    $nuser = htmlspecialchars(trim($_POST['usr']));
    if ($user->getUserName($nuser)) {
      $msg = '用户已存在！';
      infoWindow($msg, $action . '.php?page=' . $page);
    } else {
      $udata['username'] = $nuser;
      $udata['password'] = md5(trim($_POST['pwd']));
      $udata['usertype'] = $_POST['userty'];
      $udata['userstatus'] = $_POST['userst'];
      $udata['regtime'] = date("Y-m-d H:i:s");
      if ($user->unionadd($udata)) {
        $msg = '添加用户成功！';
        infoWindow($msg, $jump);
      } else {
        $msg = '添加用户失败！';
        infoWindow($msg, $jump);
      }
    }
  }
  $tank->assign('groupdata', $groupdata);
  $tank->display("webacp/useradd.tpl.html");
} else {

   $edituserdata = $user->unionget(abs($_GET['uid']));
  if (!empty($_POST['addsub'])) {
    $mdata['id'] = $_POST['userid'];
    $mdata['username'] = htmlspecialchars(trim($_POST['usr']));
    $mdata['password'] = md5(htmlspecialchars(trim($_POST['pwd2'])));
    if($_SESSION['usertype'] == 1){
       $mdata['usertype'] = $_POST['userty'];
    }
    $mdata['userstatus'] = $_POST['userst'];

    if ($user->mod($mdata)) {
      $msg = '已成功编辑选中项';
    } else {
      $msg = '编辑失败!';
    }
    infoWindow($msg, $jump);
  }


  $tank->assign('jump', $jump);
  $tank->assign('groupdata', $groupdata);
  $tank->assign('data', $edituserdata);
  $tank->display("webacp/useredit.tpl.html");
}
?>