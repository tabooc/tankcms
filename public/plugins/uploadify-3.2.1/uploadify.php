<?php

/*
  Uploadify
  Copyright (c) 2012 Reactive Apps, Ronnie Garcia
  Released under the MIT License <http://www.opensource.org/licenses/mit-license.php>
 */


// Define a destination
$targetFolder = './uploads'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

$track = $_POST['track'];//测试表单中的其他数据
if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
    $tempFile = $_FILES['Filedata']['tmp_name'];
//    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
    $targetPath = $targetFolder;

    // Validate the file type
    $fileTypes = array('jpg', 'jpeg', 'gif', 'png'); // File extensions
    $fileParts = pathinfo($_FILES['Filedata']['name']);
    $ext = $fileParts['extension'];
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

       // $sql = "insert into uploads(filename,fileext,filesize,uptime,other) values('$targetFile','$ext','$filesize $suffix','$time','$track')";
     //   mysql_query($sql);

        echo '1';
    } else {
        echo 'Invalid file type.';
    }
}
?>