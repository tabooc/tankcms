<?php

/*
 * 文章列表管理
 */
require "../init.app.php";
checklogin('articleslist');

$page =!empty($_GET['page'])?abs($_GET['page']):1;
$action = 'articleslist';
$art = new Article();
$artclass = new ArtClass();
$typedata = $artclass->selectAll();

$getpagedata = $art->getPageData($page, $action);
$data = $art->getAll($getpagedata);

if (!empty($_POST['aud'])) {
  if (!empty($_POST['eng_id'])) {
    $cdata['id'] = $_POST['eng_id'];
    $cdata['artaudit'] = 1;
    if ($art->mod($cdata)) {
      $msg = '已成功发布选中项！';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action . '.php');
}

if (!empty($_POST['up'])) {
  if (!empty($_POST['eng_id'])) {
    $cdata['id'] = $_POST['eng_id'];
    $cdata['artaudit'] = 1;
    $cdata['artuptop'] = 1;
    if ($art->mod($cdata)) {
      $msg = '已成功置顶选中项！';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action . '.php?page='.$page);
}

if (!empty($_POST['first'])) {
  if (!empty($_POST['eng_id'])) {
    $cdata['id'] = $_POST['eng_id'];
    $cdata['artaudit'] = 1;
    $cdata['artfirst'] = 1;
    if ($art->mod($cdata)) {
      $msg = '已成功将选中项设置为头条！';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action . '.php?page='.$page);
}

if (!empty($_POST['markno'])) {
  if (!empty($_POST['eng_id'])) {
    $cdata['id'] = $_POST['eng_id'];
    $cdata['artaudit'] = 0;
    $cdata['artfirst'] = 0;
    $cdata['artuptop'] = 0;
    if ($art->mod($cdata)) {
      $msg = '已成功冻结选中项！';
    } else {
      $msg = '操作失败!';
    }
  } else {
    $msg = '请先选择要操作的项！';
  }
  infoWindow($msg, $action . '.php?page='.$page);
}
if (!empty($_POST['del'])) {
  if (!empty($_POST['eng_id'])) {
    $eng_id = $_POST['eng_id'];
    if ($art->del($eng_id)) {
      $msg = '已成功将选中项删除';
    } else {
      $msg = '删除失败!';
    }
  } else {
    $msg = '请先选择要删除的项！';
  }
  infoWindow($msg, $action . '.php');
}

$tank->assign('con', 'articlesedit.php'); //查看详情要跳转到的action
$tank->assign("getpagedata", $getpagedata['pagecode']); //分页
$tank->assign("data", $data); //数据
$tank->assign("typedata", $typedata); //文章类型，搜索用
$tank->display("webacp/articleslist.tpl.html");
?>


