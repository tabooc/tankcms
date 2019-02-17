<?php

/*
 * 		文件名:FileUpload.class.php
 * 		概要: 文件上传管理类.
 */

class FileUpload {

  private $filePath;   //* 文件目的路径
  private $fileField; //* 默认$_FILES[$fileField],通过$_FILES环境变量获取上传文件信息
  private $originName; //源文件名
  private $tmpFileName; //临时文件名
  private $fileType; //文件类型(文件后缀)
  private $fileSize; //文件大小
  private $newFileName; //新文件名
  private $allowType = array('jpg', 'gif', 'png');
  private $maxSize = 2000000; //允许文件上传的最大长度2m
  private $isUserDefName = false; //是否采用用户自定义名
  private $userDefName; //用户定义名称
  private $isRandName = true; //是否随机重命名
  private $randName; //系统随机名称
  private $errorNum = 0; //错误号
  private $isCoverModer = true; //是否覆盖模式

  function __construct($options=array()) {
    $this->setOptions($options); //设置上传时属性列表
  }

  function uploadFile($filefield) {
    $this->setOption('errorNum', 0); //设置错误位
    $this->setOption('fileField', $filefield); //设置fileField
    $this->setFiles(); //设置文件信息
    $this->checkValid(); //判断合法性
    $this->checkFilePath(); //检查文件路径
    $this->setNewFileName(); //设置新文件名
    if ($this->errorNum < 0) //检查是否出错
      return $this->errorNum;
    return $this->copyFile(); //上传文件
  }

  private function setOptions($options=array()) {
    foreach ($options as $key => $val) {
      if (!in_array($key, array('filePath', 'fileField', 'originName', 'allowType', 'maxSize', 'isUserDefName', 'userDefName', 'isRandName', 'randName')))
        continue;
      $this->setOption($key, $val);
    }
  }

  private function setFiles() {
    if ($this->getFileErrorFromFILES() != 0) {
      $this->setOption('errorNum', -1);
      return $this->errorNum;
    }

    $this->setOption('originName', $this->getFileNameFromFILES());
    $this->setOption('tmpFileName', $this->getTmpFileNameFromFILES());
    $this->setOption('fileType', $this->getFileTypeFromFILES());
    $this->setOption('fileSize', $this->getFileSizeFromFILES());
  }

  private function setOption($key, $val) {
    $this->$key = $val;
  }

  private function setNewFileName() {
    if ($this->isRandName == false && $this->isUserDefName == false) {
      $this->setOption('newFileName', $this->originName);
    } else if ($this->isRandName == true && $this->isUserDefName == false) {
      $this->setOption('newFileName', $this->proRandName() . '.' . $this->fileType);
    } else if ($this->isRandName == false && $this->isUserDefName == true) {
      $this->setOption('newFileName', $this->userDefName);
    } else {
      $this->setOption('errorNum', -4);
    }
  }

  private function checkValid() {
    $this->checkFileSize();
    $this->checkFileType();
  }

  private function checkFileType() {
    if (!in_array($this->fileType, $this->allowType))
      $this->setOption('errorNum', -2);
    return $this->errorNum;
  }

  private function checkFileSize() {
    if ($this->fileSize > $this->maxSize)
      $this->setOption('errorNum', -3);
    return $this->errorNum;
  }

  private function checkFilePath() {
    if (!file_exists($this->filePath)) {
      if ($this->isCoverModer) {
        $this->makePath();
      } else {
        $this->setOption('errorNum', -6);
      }
    }
  }

  private function proRandName() {
    $tmpStr = "abcdefghijklmnopqrstuvwxyz0123456789";
    $str = "";
    for ($i = 0; $i < 8; $i++) {
      $num = rand(0, strlen($tmpStr));
      $str .= $tmpStr[$num];
    }
    return $str;
  }

  private function makePath() {
    if (!@mkdir($this->filePath, 0755)) {
      $this->setOption('errorNum', -7);
    }
  }

  private function copyFile() {
    $filePath = $this->filePath;
    if ($filePath[strlen($filePath) - 1] != '/') {
      $filePath .= '/';
    }

    $filePath .= $this->newFileName;
    if (!@move_uploaded_file($this->tmpFileName, $filePath)) {
      $this->setOption('errorNum', -5);
    }
    return $this->errorNum;
  }

  function getNewFileName() {
    return $this->newFileName;
  }

  private function getFileErrorFromFILES() {
    return $this->fileField['error'];
  }

  private function getFileTypeFromFILES() {
    $str = $this->fileField['name'];
    $aryStr = split("\.", $str);
    $ret = strtolower($aryStr[count($aryStr) - 1]);
    return $ret;
  }

  private function getFileNameFromFILES() {
    return $this->fileField['name'];
  }

  private function getTmpFileNameFromFILES() {
    return $this->fileField['tmp_name'];
  }

  private function getFileSizeFromFILES() {
    return $this->fileField['size'];
  }

  public function getErrorMsg() {
    $str = "上传文件出错 : ";
    switch ($this->errorNum) {
      case -1:
        $str .= "未知错误";
        break;
      case -2:
        $str .= "未允许类型";
        break;
      case -3:
        $str .= "文件过大";
        break;
      case -4:
        $str .= "产生文件名出错";
        break;
      case -5:
        $str .= "上传失败";
        break;
      case -6:
        $str .= "目录不存在";
        break;
      case -7:
        $str .= "建立目录失败";
        break;
    }
    return $str;
  }

}

?>
