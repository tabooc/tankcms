<?php

/*
 * 上传文件、详情
 *
 */

require "../init.app.php";
checklogin();
$page = !empty($_GET['page']) ? abs($_GET['page']) : 1;
$action = 'photosedit';
$jump = 'albumslist.php';

$photos = new Photos();
$albums = new Albums();

if (!empty($_GET['aid'])) {

    $aid = abs($_GET['aid']);
    $tplpath = 'webacp/photosadd.tpl.html';


    // Define a destination
    $targetFolder = '../attached/albums/' . $aid; // Relative to the root

    if (!file_exists($targetFolder)) {

        mkdir($targetFolder);
    }


    if (!empty($_FILES)) {
        $tempFile = $_FILES['Filedata']['tmp_name'];
        $targetPath = $targetFolder;

        // Validate the file type
        $fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'bmp'); // File extensions
        $fileParts = pathinfo($_FILES['Filedata']['name']);
        $ext = $fileParts['extension'];
//    $filename = str_replace('.'.$ext, '', $fileParts['basename']);
        $filename = str_replace('.' . $ext, '', $_FILES['Filedata']['name']);
        $random = mt_rand(10000, 99999);
        $time = time();
        $targetFile = rtrim($targetPath, '/') . '/' . $ext . '_' . md5($time) . '_' . $random . '.' . $ext;
        if (in_array($ext, $fileTypes)) {

            move_uploaded_file($tempFile, $targetFile);
            $filesize = filesize($targetFile);

            $filesize = round($filesize / 1024);
            $suffix = 'KB';
            if ($filesize > 1000) {
                $filesize = round($filesize / 1000);
                $suffix = 'MB';
            }

            $data['aid'] = $aid;
            $data['path'] = $targetFile;
            $data['pname'] = $filename;
            $data['pext'] = $ext;
            $data['psize'] = $filesize . $suffix;
            $data['ptime'] = $time;
            $photos->add($data);

            echo '1';
        } else {
            echo 'Invalid file type.';
        }
    }

    $token = md5('tankcms' . time());
    $upload_max_filesize = ini_get("upload_max_filesize");


    $tank->assign('aid', $aid);
    $tank->assign('upload_max_filesize', $upload_max_filesize);
    $tank->assign('token', $token);
    $tank->assign('jump', $jump);
    $tank->assign('nowdate', date("Y-m-d H:i:s"));
    $tank->display($tplpath);
} else if (!empty($_GET['id'])) {

    //未启用
    $aid = abs($_GET['id']);
    $hdata = $photos->get($aid);

    $tank->assign('jump', $jump);
    $nextid = $photos->nextOrPrevId($aid, 1, 'aid=' . $aid);
    $previd = $photos->nextOrPrevId($aid, 2, 'aid=' . $aid);

    $tank->assign('nextid', $nextid);
    $tank->assign('previd', $previd);
    $tank->assign("data", $hdata); //数据

    $tank->display("webacp/photoscon.tpl.html");
} else {

    //listid
    $listid = abs($_GET['listid']);



    if (!empty($_POST['del'])) {
        if (!empty($_POST['eng_id'])) {
            $eng_id = $_POST['eng_id'];
            if ($photos->delfiles($eng_id)) {
                $msg = '已成功将选中项删除';
            } else {
                $msg = '删除失败!';
            }
        } else {
            $msg = '请先选择要删除的项！';
        }
        infoWindow($msg, $action . '.php?listid='.$listid);
    }

    if (!empty($_POST['upcover'])) {
        if (!empty($_POST['eng_id'])) {
            $eng_id = $_POST['eng_id'];
            $id= array_pop($eng_id);

            $adata['id'] = $listid;
            $adata['acover'] = $id;

            if ($photos->setcover($id,$listid) && $albums->mod($adata)) {
                $msg = '已成功将选中项最后一个设置为封面';
            } else {
                $msg = '设置失败!';
            }
        } else {
            $msg = '请先选择要操作的项！';
        }
        infoWindow($msg, $action . '.php?listid='.$listid);
    }





    $getpagedata = $photos->getPageData($page, $action);
    $data = $photos->getAll($getpagedata,'aid='.$listid);

    $tank->assign('action', $action);
    $tank->assign('jump', $jump);
    $tank->assign("listid", $listid); //相册ID
    $tank->assign("getpagedata", $getpagedata['pagecode']); //分页
    $tank->assign("data", $data); //数据
    $tank->display("webacp/photoslist.tpl.html");
}
?>