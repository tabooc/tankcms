<?php

/*
 * 图册添加、详情
 *
 */

require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'albumsedit';
$jump = 'albumslist.php';

$albums = new Albums();
$albumsclass = new AlbumsClass();
$typedata = $albumsclass->selectAll();

if (empty($_GET['aid'])) {

     $tpl = 'webacp/albumsadd.tpl.html';


    if (!empty($_POST['addrecord'])) {

        $updata['aname'] = trim($_POST['aname']);
        $updata['ades'] = trim($_POST['ades']);
        $updata['aid'] = trim($_POST['aid']);
        $updata['atime'] = time();
        $updata['asort'] = trim($_POST['asort']);

        if ($albums->add($updata)) {
            $msg = '添加成功';
        } else {
            $msg = '添加失败';
        }
        infoWindow($msg, $jump);

    }

    $tank->assign('typedata', $typedata);
    $tank->assign('jump', $jump);
    $tank->assign('nowdate', date("Y-m-d H:i:s"));
    $tank->display($tpl);
} else {
    $aid = abs($_GET['aid']);
    $hdata = $albums->joinGet($aid);

    if (!empty($_POST['update'])) {
        $updata['id'] = $aid;
        $updata['aname'] = $_POST['aname'];
        $updata['ades'] = trim($_POST['ades']);
        $updata['aid'] = $_POST['aid'];
        $updata['asort'] = trim($_POST['asort']);

        if ($albums->mod($updata)) {
            $msg = '编辑成功';
        } else {
            $msg = '编辑失败';
        }
        infoWindow($msg, $jump);
    }

    $tank->assign('jump', $jump);
    $tank->assign('typedata', $typedata);

    $nextid = $albums->nextOrPrevId($aid);
    $previd = $albums->nextOrPrevId($aid, 2);

    $tank->assign('nextid', $nextid);
    $tank->assign('previd', $previd);
    $tank->assign("data", $hdata[0]); //数据

    $tank->display("webacp/albumscon.tpl.html");
}
?>