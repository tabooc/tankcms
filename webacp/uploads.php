<?php

/*
 * 资料上传处理
 */

require "../init.app.php";
checklogin();


// Define a destination
$targetFolder = '../attached/down'; // Relative to the root

if (!empty($_FILES)) {
    $uploads = new Uploads();
    $tempFile = $_FILES['Filedata']['tmp_name'];
    $targetPath = $targetFolder;

    // Validate the file type
    $fileTypes = array('jpg', 'jpeg', 'gif', 'png','docx','doc','rar','zip','7z','gz','excl','elx'); // File extensions
    $fileParts = pathinfo($_FILES['Filedata']['name']);
    $ext = $fileParts['extension'];
//    $filename = str_replace('.'.$ext, '', $fileParts['basename']);
    $filename = str_replace('.'.$ext, '', $_FILES['Filedata']['name']);
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

        $data['filepath'] = $targetFile;
        $data['filename'] = $filename;
        $data['fileext'] = $ext;
        $data['filesize'] = $filesize.$suffix;
        $data['filedes'] = $filename.'.'.$ext;
        $data['uptime'] = $time;
        $uploads->add($data);

        echo '1';


    } else {
        echo 'Invalid file type.';
    }
}else{
      echo 'Invalid file type.';
}
?>