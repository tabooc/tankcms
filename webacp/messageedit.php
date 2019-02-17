<?php

/*
 * 留言详情
 *
 */
require "../init.app.php";
checklogin();
$action = 'messageedit';
$jump = 'message.php';


$msgboard = new MsgBoard();
$aid = abs($_GET['aid']);
$msgdata = $msgboard->get($aid);
$updatemsg['id'] = $aid;
$updatemsg['megstate'] = '1';
$msgboard->mod($updatemsg);

if ('del' == $_GET['want']) {
  if (!empty($_GET['aid'])) {
    if ($msgboard->del($aid)) {
      $msg = '删除成功!';
    } else {
      $msg = '删除失败';
    }
    infoWindow($msg, $jump);
  }
}

$nextid = $msgboard->nextOrPrevId($aid);
$previd = $msgboard->nextOrPrevId($aid, 2);

$tank->assign('jump', $jump);
$tank->assign('nextid', $nextid);
$tank->assign('previd', $previd);
$tank->assign("data", $msgdata); //数据
$tank->display("webacp/megcnt.tpl.html");
?>