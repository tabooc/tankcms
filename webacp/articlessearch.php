<?php

/*
 * 文章搜索
 */
require "../init.app.php";
checklogin();

$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'articlessearch';
$jump = 'articleslist.php';
if (!empty($_POST['searchst'])) {
  $keywords = trim($_POST['keywords']);
  $arttype = trim($_POST['arttype']);

  $art = new Article();
  $artclass = new ArtClass();

  $getpagedata = $art->getPageData($page, 'search', 50, 12, "arttype='$arttype' and arttitle like '%$keywords%'");
  $data = $art->searchAll($getpagedata, $arttype, $keywords);
} else {
  $msg = '查询错误';
  infoWindow($msg, $jump);
}


$tank->assign('jump',$jump);
$tank->assign('keywords', $keywords); //查询的关键词
$tank->assign('con', 'articlesedit.php'); //查看详情要跳转到的action
$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->display("webacp/articlessearch.tpl.html");
?>