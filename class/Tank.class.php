<?php

/*
 * 初始化配置项
 *
 */

class Tank extends Smarty {

  function __construct() {

    parent::__construct();

    $this->setTemplateDir(THEMES_PATH);    //设置所有模板文件存放的目录
    $this->setConfigDir(THEMES_CONF_PATH);  //配置文件目录
    $this->setCompileDir(THEMES_COMPILE_PATH);   //设置所有编译过的模板文件存放的目录
    $this->setCacheDir(THEMES_CACHE_PATH);         //设置存放Smarty缓存文件的目录
    $this->caching = THEMES_CACHE_START;            //设置Smarty缓存是否开启
    $this->cache_lifetime = THEMES_CACHE_LIFETIME;  //设置模板缓存有效时间段的长度 在$caching为false的时候此项设置无效
    $this->left_delimiter = LEFT_DELIMITER;         //设置模板语言中的左结束符
    $this->right_delimiter = RIGHT_DELIMITER;       //设置模板语言中的右结束符
  }

}
?>