<?php

/*
 *      文件名：DateDay.calss.php
 * 		概要: 日期时间类.
 */

class DateDay {

  private $date;
  private $day;

  function __construct() {
    $this->date = date("Y年m月d日");
    $this->day = $this->getDay();
  }

  private function getDay() {
    $week = array("星期天", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六");
    return $week[date("w")];
  }

  public function getDateDay() {
    return $this->date . "&nbsp;" . $this->day;
  }

}

?>
