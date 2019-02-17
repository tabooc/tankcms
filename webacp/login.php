<?php

/*
 * 登录
 */

require "../init.app.php";
checkSession();

$track = md5(CMS_NAME);
$_SESSION['track'] = $track;

$tank->assign('track', $track);
$tank->display("webacp/login.tpl.html");
?>