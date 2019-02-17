<?php

/*
 * 操作信息提示
 */

require '../init.app.php';
checklogin();
$msg = $_GET['msg'];
$url = $_GET['url'];

$sec = abs($_GET['sec']);

$tank->assign('sec', $sec);
$tank->assign('msg', $msg);
$tank->assign('url', $url);
$tank->display("webacp/actioninfo.tpl.html");
?>



