<?php
/*
 * 和其数据备份
 */
include('../../config.app.php');
error_reporting(E_ALL & ~ E_NOTICE);

$dbhostname = DB_HOST;  //数据库主机
$dbusername = DB_USER;   //数据库用户
$dbpassword = DB_PWD;   //数据库密码
$dbdataname = DB_NAME;  //数据库名称

$dbconntype = 0;    //连接方式，1为持续连接,0为一般链接(虚拟主机用户推荐)

$app_name = "mysql_";

$dbtablepre = "vn_";

date_default_timezone_set(TIMEZONE);
$charset = DB_CHARSET;
?>