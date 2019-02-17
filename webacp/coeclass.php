<?php
/*
 * 大事记年份
 */

require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'coeclass';
$jump = 'coemg.php';


    $coeclass = new coeClass();

    $getpagedata = $coeclass->getPageData($page,$action);
    $data = $coeclass->getAll($getpagedata);

    if (!empty($_POST['del'])) {
      if (!empty($_POST['eng_id'])) {
        $eng_id = $_POST['eng_id'];
        if ($coeclass->del($eng_id)) {
          $msg = '已成功将选中项删除';
        } else {
          $msg = '删除失败!';
        }
      } else {
        $msg = '请先选择要删除的项！';
      }
      infoWindow($msg, $action.'.php?page='.$page);
    }

    if (!empty($_POST['addclass'])) {
      $cdata['coeyear'] = trim($_POST['adp']);
      $cdata['markid'] = $_POST['typept'];
      $res = $coeclass->checkRepeat('coeyear',$cdata['coeyear']);
      if ($res > 0) {
        $msg = '此年份已存在！';
      } else {
        if ($coeclass->add($cdata)) {
          $msg = '添加年份成功！';
        } else {
          $msg = '添加年份失败';
        }
      }
      infoWindow($msg, $action.'.php?page='.$page);
    }

    if (!empty($_POST['editclass'])) {
      $cdata['id'] = $_POST['classid'];
      $cdata['coeyear'] = trim($_POST['editadp']);
      $cdata['markid'] = $_POST['edittypept'];
      $res = $coeclass->checkRepeat('coeyear',$cdata['coeyear']);
      if ($res > 0) {
        $msg = '此年份已存在！';
      } else {
        if ($coeclass->mod($cdata)) {
          $msg = '编辑成功！';
        } else {
          $msg = '编辑失败';
        }
      }
      infoWindow($msg, $action.'.php?page='.$page);
    }


    $tank->assign("getpagedata", $getpagedata['pagecode']); //分页
    $tank->assign("data", $data); //数据
    $tank->display("webacp/coeclass.tpl.html");

?>