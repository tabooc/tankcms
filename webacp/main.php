<?php

/*
 * 主界面处理
 */
require "../init.app.php";
checklogin();
if (!empty($_GET['action'])) {
  $mc = new MainControl($tank, $_GET['action']);
} else {
  $mc = new MainControl($tank);
}
?>


