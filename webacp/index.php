<?php

/*
 * 		文件名:index.php
 * 		概要: 管理平台主索引页面.
 */
require "../init.app.php";

checklogin();
$user = new User();
$userinfo = $user->unionget($_SESSION['uid']);
$groupname = $userinfo['groupname'];


// $node = new AuthNode();
// $menu = $node->menu();


// $tank->assign('menu', $menu);
$tank->assign('userinfo', $userinfo);
$tank->assign('year', date('Y'));
$tank->display("webacp/index.tpl.html");
?>