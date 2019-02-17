<?php

/*
 * 上传文件、详情
 *
 */

require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'uploadsedit';
$jump = 'uploadsmg.php';

$uploads = new Uploads();

if (empty($_GET['aid'])) {

    if ('t' == $_GET['work']) {
        $tpl = 'webacp/uploadsadd2.tpl.html';
    } else {
        $tpl = 'webacp/uploadsadd.tpl.html';
    }

    if (!empty($_POST['addrecord'])) {
        $updata['filename'] = trim($_POST['filename']);

        if (!file_exists($updata['filename'])) {
            $msg = '文件不存在！';
            infoWindow($msg, $jump);
        }

        $updata['filepath'] = trim($_POST['filepath']);
        $pathinfo = pathinfo($updata['filepath']);
        $updata['fileext'] = $pathinfo['extension'];
        $updata['filedes'] = trim($_POST['filedes']);
        $updata['uptime'] = time();

        $fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'txt', 'excel', 'docx', 'doc', 'xls', 'rar', 'zip', 'gz', '7z');

        if (!in_array($updata['fileext'], $fileTypes)) {
            $msg = '这是不允许的文件类型！';
            infoWindow($msg, $jump);
        }

        $filesize = filesize($updata['filepath']);

        $filesize = round($filesize / 1024);
        $suffix = 'KB';
        if ($filesize > 1000) {
            $filesize = round($filesize / 1000);
            $suffix = 'MB';
        }

        $updata['filesize'] = $filesize . $suffix;


        if ($uploads->add($updata)) {
            $msg = '添加成功';
        } else {
            $msg = '添加失败';
        }
        infoWindow($msg, $jump);
    }

    $token = md5('tankcms' . time());
    $upload_max_filesize = ini_get("upload_max_filesize");


    $tank->assign('upload_max_filesize', $upload_max_filesize);
    $tank->assign('token', $token);
    $tank->assign('jump', $jump);
    $tank->assign('nowdate', date("Y-m-d H:i:s"));
    $tank->display($tpl);
} else {
    $aid = abs($_GET['aid']);
    $hdata = $uploads->get($aid);

    if ('del' == $_GET['want']) {

        if ($uploads->delfiles($aid)) {
            $msg = '删除成功!';
        } else {
            $msg = '删除失败';
        }
        infoWindow($msg, $jump);
    }

    if (!empty($_POST['update'])) {
        $updata['id'] = $aid;
        $updata['filename'] = $_POST['filename'];
        $updata['filepath'] = $_POST['filepath'];
        $updata['filedes'] = trim($_POST['filedes']);

        if ($uploads->mod($updata)) {
            $msg = '编辑成功';
        } else {
            $msg = '编辑失败';
        }
        infoWindow($msg, $jump);
    }

    $tank->assign('jump', $jump);
    $nextid = $uploads->nextOrPrevId($aid);
    $previd = $uploads->nextOrPrevId($aid, 2);

    $tank->assign('nextid', $nextid);
    $tank->assign('previd', $previd);
    $tank->assign("data", $hdata); //数据

    $tank->display("webacp/uploadscon.tpl.html");
}
?>