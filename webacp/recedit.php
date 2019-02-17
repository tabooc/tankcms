<?php

/*
 * 添加、编辑招聘
 *
 */
require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'reccon';
$jump = 'recmg.php';

$rec = new Rec();
$recclass = new RecClass();
$typedata = $recclass->selectAll();

if (empty($_GET['aid'])) {

  if (!empty($_POST['add'])) {
    $cdata['zhiwei'] = trim($_POST['zhiweipt']);
    $cdata['xingzhi'] = trim($_POST['xingzhipt']);
    $cdata['zptime'] = trim($_POST['zptimept']);
    $cdata['gzyear'] = trim($_POST['yearpt']);
    $cdata['xueli'] = trim($_POST['xuelipt']);
    $cdata['number'] = trim($_POST['numpt']);
    $cdata['yuyan'] = trim($_POST['yuyanpt']);
    $cdata['yuexin'] = trim($_POST['yuexinpt']);
    $cdata['jlyy'] = trim($_POST['jlyypt']);
    $cdata['place'] = trim($_POST['gzddpt']);
    $cdata['miaoshu'] = $_POST['miaoshu'];
    $cdata['recstate'] = 0;
    $cdata['leixing'] = $_POST['zptype'];
    $cdata['uptop'] = 0;

    if ($rec->add($cdata)) {
      $msg = '发布成功';
    } else {
      $msg = '发布失败';
    }
    infoWindow($msg, $jump);
  }
  $tank->assign('typedata', $typedata);
  $tank->assign('nowdate', date("Y-m-d"));
  $tank->display("webacp/recadd.tpl.html");
} else {

  $aid = abs($_GET['aid']);
  $data = $rec->joinGet($aid);

  $optionsvalues = '';
  $output = '';
  foreach ($typedata as $key => $value) {
    $optionsvalues.=$value['id'] . ',';
    $output.=$value['zptype'] . ',';
  }
  $optionsvalues = explode(',', rtrim($optionsvalues, ',')); //字符串转换为数组
  $output = explode(',', rtrim($output, ','));

  if (!empty($_POST['edit'])) {
    $cpdata['id'] = $aid;
    $cpdata['zhiwei'] = trim($_POST['zhiweipt']);
    $cpdata['xingzhi'] = trim($_POST['xingzhipt']);
    $cpdata['zptime'] = trim($_POST['zptimept']);
    $cpdata['gzyear'] = trim($_POST['yearpt']);
    $cpdata['xueli'] = trim($_POST['xuelipt']);
    $cpdata['number'] = trim($_POST['numpt']);
    $cpdata['yuyan'] = trim($_POST['yuyanpt']);
    $cpdata['yuexin'] = trim($_POST['yuexinpt']);
    $cpdata['jlyy'] = trim($_POST['jlyypt']);
    $cpdata['place'] = trim($_POST['gzddpt']);
    $cpdata['miaoshu'] = $_POST['miaoshu'];
    $cpdata['leixing'] = $_POST['zptype'];

    if ($rec->mod($cpdata)) {
      $msg = '编辑成功';
    } else {
      $msg = '编辑失败';
    }
    infoWindow($msg, $jump);
  }

  $nextid = $rec->nextOrPrevId($aid);
  $previd = $rec->nextOrPrevId($aid, 2);

  $tank->assign('nextid', $nextid);
  $tank->assign('previd', $previd);

  $tank->assign('data', $data); //数据
  $tank->assign('typeid', $data[0]['cid']);

  $tank->assign('ccdata', $typedata);
  $tank->assign('optionsvalues', $optionsvalues);
  $tank->assign('output', $output);
  $tank->assign('jump', $jump);

  $tank->display("webacp/reccon.tpl.html");
}
?>