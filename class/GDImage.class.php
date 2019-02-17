<?php

/*
 * 		文件名:GDImage.class.php
 * 		概要: 图像处理类.
 */

class GDImage {

  private $picPath;                  //图片所在的路径
  private $picName;                  //图片的名称
  private $newName;                  //新图片的名称
  private $imageInfo;     //图片信息
  private $img;      //图片资源类型
  private $newImg;                   //新图片资源
  private $width;                    //新图片的宽度
  private $height;                   //新图片的高度

  function __construct($picPath, $picName) {
    $this->picPath = $picPath;
    $this->picName = $picName;
    list($fileName, $extension) = explode(".", $picName);
    $this->newName = $fileName . "_new." . $extension;
    $this->imageInfo = $this->getInfo();
    $this->img = $this->getImg($picPath . $picName);
  }

  private function getInfo() {
    $data = getimagesize($this->picPath . $this->picName);
    $imageInfo["width"] = $data[0];
    $imageInfo["height"] = $data[1];
    $imageInfo["type"] = $data[2];
    $imageInfo["name"] = basename($file);
    $imageInfo["size"] = filesize($file);
    return $imageInfo;
  }

  private function getImg($sourFile) {
    switch ($this->imageInfo["type"]) {
      case 1: //gif
        $img = imagecreatefromgif($sourFile);
        break;
      case 2: //jpg
        $img = imagecreatefromjpeg($sourFile);
        break;
      case 3: //png
        $img = imagecreatefrompng($sourFile);
        break;
      default:
        return false;
        break;
    }
    if ($img)
      return $img;
    else
      return false;
  }

  function makeThumb($maxWidth, $maxHeight, $new=true) {

    $isThumb = false;
    if ($maxWidth < $this->imageInfo["width"]) {
      $width = $maxWidth;
      $isThumb = true;
    } else {
      $width = $this->imageInfo["width"];
    }

    if ($maxHeight < $this->imageInfo["height"]) {
      $height = $maxHeight;
      $isThumb = true;
    } else {
      $height = $this->imageInfo["height"];
    }

    if ($isThumb) {
      $srcW = $this->imageInfo["width"];
      $srcH = $this->imageInfo["height"];
      if ($srcW * $width > $srcH * $height) {
        $height = round($srcH * $width / $srcW);
      } else {
        $width = round($srcW * $height / $srcH);
      }
      $this->height = $height;
      $this->width = $width;

      $this->newImg = $this->kidOfImage($this->img, $srcW, $srcH);

      if ($new) {
        return $this->createNewImage($this->picPath . $this->newName);
      } else {
        return $this->createNewImage($this->picPath . $this->picName);
      }
    } else {
      if ($new) {
        copy($this->picPath . $this->picName, $this->picPath . $this->newName);
      }
      $this->newImg = $this->getImg($this->picPath . $this->picName);
      $this->width = $width;
      $this->height = $height;
    }
    return true;
  }

  private function kidOfImage($toImg, $ow, $oh) {
    $imtn = imagecreatetruecolor($this->width, $this->height);
    $originaltransparentcolor = imagecolortransparent($toImg);
    if ($originaltransparentcolor >= 0 && $originaltransparentcolor < imagecolorstotal($toImg)) {
      $transparentcolor = imagecolorsforindex($toImg, $originaltransparentcolor);
      $newtransparentcolor = imagecolorallocate(
              $imtn, $transparentcolor['red'], $transparentcolor['green'], $transparentcolor['blue']
      );

      imagefill($imtn, 0, 0, $newtransparentcolor);
      imagecolortransparent($imtn, $newtransparentcolor);
    }
    imagecopyresized($imtn, $toImg, 0, 0, 0, 0, $this->width, $this->height, $ow, $oh);
    return $imtn;
  }

  function waterMark($text) {

    $white = imageColorAllocate($this->newImg, 255, 255, 255);
    $black = imageColorAllocate($this->newImg, 0, 0, 0);
    $alpha = imageColorAllocateAlpha($this->newImg, 230, 230, 230, 40);

    ImageFilledRectangle($this->newImg, 0, $this->height - 26, $this->width, $this->height, $alpha);
    ImageFilledRectangle($this->newImg, 13, $this->height - 21, 14, $this->height - 6, $black);

    $fontName = $this->picPath . "simsun.ttc";

    ImageTTFText($this->newImg, 6.0, 0, 20, $this->height - 16, $black, $fontName, $this->toCode($text[0]));
    ImageTTFText($this->newImg, 6.0, 0, 20, $this->height - 6, $black, $fontName, $this->toCode($text[1]));

    return $this->createNewImage($this->picPath . $this->newName);
  }

  private function toCode($text) {
    return iconv("GB2312", "UTF-8", $text);
  }

  private function createNewImage($newName) {

    $result = false;
    switch ($this->imageInfo["type"]) {
      case 1: //gif
        $result = imageGIF($this->newImg, $newName);
        break;
      case 2: //jpg
        $result = imageJPEG($this->newImg, $newName);
        break;
      case 3: //png
        $result = imagePng($this->newImg, $newName);
        break;
      default:
        return false;
        break;
    }
    if ($result) {
      return true;
    } else {
      return false;
    }
  }

  function closeImg() {
    imagedestroy($this->img);
    imagedestroy($this->newImg);
    $this->img = false;
  }

  function __destruct() {
    $this->closeImg();
  }

}

?>
