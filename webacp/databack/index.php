<?php

define('D_P', __FILE__ ? getdirname(__FILE__) . '/' : './');
define('R_P', D_P . "include/");
include D_P . "/inc.config.php";

$admin_file = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];

require_once(R_P . "/admin.php");
require_once(R_P . "/bakup.php");

function SafeFunc() {
  //Safe The Admin
}

function getdirname($path) {
  if (strpos($path, '\\') !== false) {
    return substr($path, 0, strrpos($path, '\\'));
  } elseif (strpos($path, '/') !== false) {
    return substr($path, 0, strrpos($path, '/'));
  } else {
    return '/';
  }
}

?>