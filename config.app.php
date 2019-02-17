<?php

/*
 * 	文件名:config.app.php
 * 	概要: 整个系统的配置文件,一些参数的设置。
 *  开发者:DEV.Storm
 */

//数据库部分参数设置
define("DB_HOST", "localhost");       //数据库主机名
define("DB_USER", "root");           //数据库用户名
define("DB_PWD", "root");   //数据库密码
define("DB_NAME", "tankcms");           //数据库名称
define("TAB_PREFIX", "storm_");       //前缀
define("DB_CHARSET", 'utf8');       //编码

//应用程序相关设置
define("CMS_NAME", "TankCMS");             //应用程序名称
define("VERSION","3.2");    //版本 vsersion ,by smarty3.1.33
define('ENVIRONMENT', 'testing');      //报错级别
define('TIMEZONE', 'PRC');                 //时区设置
define('COPYRIGHT', 'TankCMS');  //版权设置
define('COPYRIGHTDOMAIN', 'http://www.uexts.com/');  //版权链接设置

//框架路径设置
define("CMS_ROOT", str_replace("\\", "/", dirname(__FILE__)) . '/');   //系统根目录
define("CMS_CLASS_PATH", CMS_ROOT . "class/");   //CLASS路径
define("CMS_UPLOAD_PATH", CMS_ROOT . "attached/");     //文章上传文件路径
define("ALBUMS_UPLOAD_PATH", CMS_UPLOAD_PATH . "albums/");     //相册上传文件路径
define("CMS_TEMP", CMS_ROOT . "runtime/");           //系统临时文件路径

//和Smarty模板主题相关的设置
define("THEMES_PATH", CMS_ROOT . "themes/");         //系统模板主题路径
define("THEMES_CONF_PATH", CMS_ROOT . "conf/");         //配置文件路径
define("THEMES_COMPILE_PATH", CMS_TEMP . "tpl_c/"); //系统模板编译后的路径
define("THEMES_CACHE_START", false);                      //缓存是否开启
define("THEMES_CACHE_LIFETIME", 60 * 3);                 //系统模板被缓存的时间
define("THEMES_CACHE_PATH", CMS_TEMP . "cache/");         //系统模板缓存文件存放的路径
define("LEFT_DELIMITER",'{storm:');      //设置模板语言中的左结束符
define("RIGHT_DELIMITER",'}');      //设置模板语言中的右结束符


//Session保存路径
$sessSavePath = CMS_TEMP . "app_sessions/";
if (is_writeable($sessSavePath) && is_readable($sessSavePath)) {
  session_save_path($sessSavePath);
}

define("__STATIC__", "../public/");       //静态文件路径
define("__CSS__", "../public/css/");       //静态文件CSS路径
define("__JS__", "../public/scripts/");       //静态文件scripts路径
define("__PLUGINS__", "../public/plugins/");       //第三方文件路径
define("CMS_STYLE", "webacp");                     //系统当前风格
define("ARTICLE_PAGE_SIZE", 20);                   //后台文章每页显示的数目
define("PICTURE_PAGE_SIZE", 10);                   //后台图片每页显示的数目
define("PICTURE_SHOW_TYPE", "list");               //后台图片显示的方式 list 列表 thumb缩略图

$styleList = array("default" => "默认风格","webacp"=>'后台样式');   //系统风格数组
$waterText = array('storm', 'www.uexts.com');   //定义加水印的文字
$pictureSize = array('maxWidth' => 300, 'maxHeight' => 300);   //定义生成后的大小
$thumbSize = array('width' => 100, 'height' => 100);      //定义缩略图的大小
?>