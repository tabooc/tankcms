<?php

/*
 * 		文件名:ValidationCode.class.php
 * 		概要: 验证码管理类.
 *
 */
/* 通过该类的对象可以动态获取验证码图片，和验证码字符串              */

class ValidationCode {

  private $width;                                 //验证码图片的宽度
  private $height;                                //验证码图片的高度
  private $codeNum;                             //验证码字符的个数
  private $checkCode;                            //验证码字符
  private $image;                                //验证码画布

  /* 构造方法用来实例化验证码对象，并为一些成员属性初使化        */
  /* 参数width: 设置验证码图片的宽度，默认宽度值为60像素         */
  /* 参数height: 设置验证码图片的高度，默认高度值为20像素        */
  /* 参数codeNum: 设置验证码中字母和数字的个数，默认个数为4个    */

  function __construct($width=60, $height=20, $codeNum=4) {
    $this->width = $width;                      //为成员属性width初使化
    $this->height = $height;                      //为成员属性height初使化
    $this->codeNum = $codeNum;                 //为成员属性codeNum初使化
    $this->checkCode = $this->createCheckCode();   //为成员属性checkCode初使化
  }

  function showImage() {                          //通过访问该方法向浏览器中输出图像
    $this->getCreateImage();                  //调用内部方法创建画布并对其进行初使化
    $this->outputText();                      //向图像中输出随机的字符串
    $this->setDisturbColor();                  //向图像中设置一些干扰像素
    $this->outputImage();                     //生成相应格式的图像并输出
  }

  function getCheckCode() {                       //访问该方法获取随机创建的验证码字符串
    return $this->checkCode;                  //返回成员属性$checkCode保存的字符串
  }

  private function getCreateImage() {               //用来创建图像资源，并初使化背影
    $this->image = imageCreate($this->width, $this->height);
    $back = imageColorAllocate($this->image, 255, 255, 255);
    $border = imageColorAllocate($this->image, 0, 0, 0);
    imageRectangle($this->image, 0, 0, $this->width - 1, $this->height - 1, $border);
  }

  private function createCheckCode() {             //随机生成用户指定个数的字符串
    for ($i = 0; $i < $this->codeNum; $i++) {
      $number = rand(0, 2);
      switch ($number) {
        case 0 : $rand_number = rand(48, 57);
          break;    //数字
        case 1 : $rand_number = rand(65, 90);
          break;    //大写字母
        case 2 : $rand_number = rand(97, 122);
          break;   //小写字母
      }
      $ascii = sprintf("%c", $rand_number);
      $ascii_number = $ascii_number . $ascii;
    }
    return $ascii_number;
  }

  private function setDisturbColor() {    //设置干扰像素，向图像中输出不同颜色的100个点
    for ($i = 0; $i <= 50; $i++) {
      $color = imagecolorallocate($this->image, rand(0, 255), rand(0, 255), rand(0, 255));
      imagesetpixel($this->image, rand(1, $this->width - 2), rand(1, $this->height - 2), $color);
    }
  }

  private function outputText() {       //随机颜色、随机摆放、随机字符串向图像中输出
    for ($i = 0; $i <= $this->codeNum; $i++) {
      $bg_color = imagecolorallocate($this->image, rand(0, 255), rand(0, 128), rand(0, 255));
      $x = floor($this->width / $this->codeNum) * $i + 3;
      $y = rand(0, $this->height - 15);
      imagechar($this->image, 5, $x, $y, $this->checkCode[$i], $bg_color);
    }
  }

  private function outputImage() {                //自动检测GD支持的图像类型，并输出图像
    if (imagetypes() & IMG_GIF) {            //判断生成GIF格式图像的函数是否存在
      header("Content-type: image/gif");   //发送标头信息设置MIME类型为image/gif
      imagegif($this->image);            //以GIF格式将图像输出到浏览器
    } elseif (imagetypes() & IMG_JPG) {       //判断生成JPG格式图像的函数是否存在
      header("Content-type: image/jpeg");  //发送标头信息设置MIME类型为image/jpeg
      imagejpeg($this->image, "", 0.5);    //以JPEN格式将图像输出到浏览器
    } elseif (imagetypes() & IMG_PNG) {       //判断生成PNG格式图像的函数是否存在
      header("Content-type: image/png");   //发送标头信息设置MIME类型为image/png
      imagepng($this->image);           //以PNG格式将图像输出到浏览器
    } elseif (imagetypes() & IMG_WBMP) {     //判断生成WBMP格式图像的函数是否存在
      header("Content-type: image/vnd.wap.wbmp");   //发送标头为image/wbmp
      imagewbmp($this->image);        //以WBMP格式将图像输出到浏览器
    } else {                                //如果没有支持的图像类型
      die("PHP不支持图像创建！");      //不输出图像，输出一错误消息，并退出程序
    }
  }

  function __destruct() {                        //当对象结束之前销毁图像资源释放内存
    imagedestroy($this->image);              //调用GD库中的方法销毁图像资源
  }

}

?>
