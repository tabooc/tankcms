<?php

/*
 * 缓存更新
 */
require "../init.app.php";
checklogin();

$tank->assign("dtitle", '缓存更新成功');
$tank->clearCompiledTemplate();
$tank->display("webacp/updateCache.tpl.html");
?>