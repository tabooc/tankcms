<?php

/*
 * 添加、编辑文章
 */
require "../init.app.php";
checklogin('articlesadd');

$action = 'articlesedit';
$jump = 'articleslist.php';
$art = new Article();
$artclass = new ArtClass();
$typedata = $artclass->selectAll();
if (empty($_GET['aid'])) {
  if (!empty($_POST['add'])) {
    $cdata['arttype'] = trim($_POST['arttype']);
    $cdata['arttitle'] = trim($_POST['arttitle']);
    $cdata['artauthor'] = trim($_POST['artauthor']);
    $cdata['artsource'] = trim($_POST['artsource']);
    $cdata['outlink'] = trim($_POST['outlink']);
    $cdata['arttime'] = trim($_POST['arttime']);
    $cdata['artthumb'] = str_replace("<br />", '', trim($_POST['artthumb']));
    $cdata['artdes'] = trim($_POST['artdescription']);
    $cdata['artcontent'] = trim($_POST['artcontent']);
    $cdata['artaudit'] = $_POST['artaudit'];

    if ($art->add($cdata)) {
      $msg = '发布成功';
    } else {
      $msg = '发布失败';
    }
    infoWindow($msg, $jump);
  }

  $tank->assign('jump', $jump); //跳转
  $tank->assign('typedata', $typedata);
  $tank->assign('nowdate', date("Y-m-d H:i:s"));
  $tank->display("webacp/articlesadd.tpl.html");
} else {

  $aid = abs($_GET['aid']);
  $data = $art->joinGet($aid);

  $optionsvalues = '';
  $output = '';
  foreach ($typedata as $key => $value) {
    $optionsvalues.=$value['id'] . ',';
    $output.=$value['classname'] . ',';
  }
  $optionsvalues = explode(',', rtrim($optionsvalues, ',')); //字符串转换为数组
  $output = explode(',', rtrim($output, ','));

  if (!empty($_POST['edit'])) {
    $cpdata['id'] = $aid;
    $cpdata['arttype'] = trim($_POST['arttype']);
    $cpdata['arttitle'] = trim($_POST['arttitle']);
    $cpdata['artauthor'] = trim($_POST['artauthor']);
    $cpdata['artsource'] = trim($_POST['artsource']);
    $cpdata['outlink'] = trim($_POST['outlink']);
    $cpdata['arttime'] = trim($_POST['arttime']);
    $cpdata['artthumb'] = str_replace("<br />", '', trim($_POST['artthumb']));
    $cpdata['artdes'] = trim($_POST['artdescription']);
    $cpdata['artcontent'] = trim($_POST['artcontent']);

    if ($art->mod($cpdata)) {
      $msg = '编辑成功';
    } else {
      $msg = '编辑失败';
    }
    infoWindow($msg, $jump);
  }

  $nextid = $art->nextOrPrevId($aid);
  $previd = $art->nextOrPrevId($aid, 2);

  $tank->assign('nextid', $nextid);
  $tank->assign('previd', $previd);

  $tank->assign('data', $data); //数据
  $tank->assign('typeid', $data[0]['cid']);

  $tank->assign('optionsvalues', $optionsvalues);
  $tank->assign('output', $output);

  $tank->assign('jump', $jump); //跳转
  $tank->assign('action', $action);
  $tank->display("webacp/articlescon.tpl.html");
}
?>


