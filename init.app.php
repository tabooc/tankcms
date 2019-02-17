<?php

/*
 * 	文件名:init.app.php
 * 	概要:系统初使化信息.
 *  开发者:DEV.Storm
 */

//包含通用的全局配置文件
require 'config.app.php';

//设置报错级别
if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            error_reporting(E_ALL);
            break;
        case 'testing':
            error_reporting(E_ALL & ~ E_NOTICE);
            break;
        case 'production':
            error_reporting(0);
            break;
        default:
            exit('The application environment is not set correctly.');
    }
}

//开启Session
session_start();

/*
 * 设置页面类型、编码
 */
$mime = !empty($_GET['mime']) ? htmlspecialchars($_GET['mime']) : 'html';
$charset = !empty($_GET['charset']) ? htmlspecialchars($_GET['charset']) : 'utf-8';
header("Content-type: text/$mime;charset=$charset");

//设置时区
date_default_timezone_set(TIMEZONE);


//包含通用的函数文件
require CMS_CLASS_PATH . 'common.func.php';

//包含Smarty类库所在的文件
require CMS_ROOT . "engine/Smarty.class.php";


/*
 * 设置自动加载所需要的类文件
 * smarty3.0以后，__autoload函数将不能直接使用，需采用spl_autoload_register方法注册，可以顺序添加多个
 *
 */

function autoload($className) {
    //包含类路径下面的对应类名的类文件
    $path = CMS_CLASS_PATH . $className . ".class.php";
    if (file_exists($path)) {
        require $path;
    } else {
        echo 'error:{ ' . $path . ' } not found.';
    }
}

spl_autoload_register('autoload');


//创建一个Smarty类的对象$tank
$tank = new Tank();
?>