<?php

/*
 * 大事记
 */
require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'coeedit';
$jump = 'coemg.php';

$coe = new Coe();
$coeclass = new CoeClass();
$yeardata = $coeclass->selectAll();


if (empty($_GET['aid'])) {

  if (!empty($_POST['add'])) {
    $cdata['coedate'] = $_POST['coedate'];
    $cdata['coeupdate'] = $_POST['coeupdate'];
    $cdata['coeyearid'] = $_POST['coeyear'];
    $cdata['coecontent'] = $_POST['coecontent'];
    $cdata['coestate'] = 0;

    if ($coe->add($cdata)) {
      $msg = '发布成功';
    } else {
      $msg = '发布失败';
    }
    infoWindow($msg, $action . '.php?page=' . $page);
  }
  $tank->assign('jump', $jump);
  $tank->assign('yeardata', $yeardata);
  $tank->assign('nowdate', date("Y-m-d H:i:s"));
  $tank->display("webacp/coeadd.tpl.html");
} else {


  $aid = abs($_GET['aid']);
  $data = $coe->joinGet($aid);


  $optionsvalues = '';
  $output = '';
  foreach ($yeardata as $key => $value) {
    $optionsvalues.=$value['id'] . ',';
    $output.=$value['coeyear'] . ',';
  }
  $optionsvalues = explode(',', rtrim($optionsvalues, ',')); //字符串转换为数组
  $output = explode(',', rtrim($output, ','));


  if (!empty($_POST['edit'])) {
    $cpdata['id'] = $aid;
    $cpdata['coedate'] = $_POST['coedate'];
    $cpdata['coeupdate'] = trim($_POST['coeupdate']);
    $cpdata['coeyearid'] = $_POST['coeyear'];
    $cpdata['coecontent'] = $_POST['coecontent'];

    if ($coe->mod($cpdata)) {
      $msg = '编辑成功';
    } else {
      $msg = '编辑失败';
    }
    infoWindow($msg, $action . '.php?page=' . $page);
  }

  $tank->assign('jump', $jump);

  $nextid = $coe->nextOrPrevId($aid);
  $previd = $coe->nextOrPrevId($aid, 2);

  $tank->assign('nextid', $nextid);
  $tank->assign('previd', $previd);

  $tank->assign('data', $data); //数据
  $tank->assign('coeyearid', $data[0]['cid']);

  $tank->assign('ccdata', $yeardata);
  $tank->assign('optionsvalues', $optionsvalues);
  $tank->assign('output', $output);

  $tank->display("webacp/coecon.tpl.html");
}
?>