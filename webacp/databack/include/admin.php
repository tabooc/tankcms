<?php

!defined('R_P') && exit('Forbidden');

unset($_ENV, $HTTP_ENV_VARS, $_REQUEST, $HTTP_POST_VARS, $HTTP_GET_VARS, $HTTP_POST_FILES, $HTTP_COOKIE_VARS);
if (!get_magic_quotes_gpc()) {
  Add_S($_POST);
  Add_S($_GET);
  Add_S($_FILES);
  Add_S($_COOKIE);
}

foreach ($_POST as $_key => $_value) {
  !ereg("^\_", $_key) && !isset($$_key) && $$_key = $_POST[$_key];
}
foreach ($_GET as $_key => $_value) {
  !ereg("^\_", $_key) && !isset($$_key) && $$_key = $_GET[$_key];
}
include_once(R_P . '/db_mysql.php');

//数据库连接

$db = new DB($dbhostname, $dbusername, $dbpassword, $dbdataname, $dbconntype);
unset($dbhostname, $dbusername, $dbpassword, $dbdataname, $dbconntype);

function Cookie($ck_Var, $ck_Value, $ck_Time = 'F') {
  global $cookietime;
  if ($ck_Time == 'F')
    $ck_Time = $cookietime;
  $S = $_SERVER['SERVER_PORT'] == '443' ? 1 : 0;
  setCookie($ck_Var, $ck_Value, $ck_Time, '/', '', $S);
}

function GetCookie($Var) {
  return $_COOKIE[$Var];
}

function Add_S(&$array) {
  if ($array) {
    foreach ($array as $key => $value) {
      if (!is_array($value)) {
        $array[$key] = addslashes($value);
      } else {
        Add_S($array[$key]);
      }
    }
  }
}

function HtmlConvert(&$array) {
  if (is_array($array)) {
    foreach ($array as $key => $value) {
      if (!is_array($value)) {
        $array[$key] = htmlspecialchars($value);
      } else {
        HtmlConvert($array[$key]);
      }
    }
  } else {
    $array = htmlspecialchars($array);
  }
}

function StrCode($string, $action = 'ENCODE') {
  $key = substr(md5($_SERVER["HTTP_USER_AGENT"] . $GLOBALS['db_hash']), 8, 18);
  $string = $action == 'ENCODE' ? $string : base64_decode($string);
  $len = strlen($key);
  $code = '';
  for ($i = 0; $i < strlen($string); $i++) {
    $k = $i % $len;
    $code .= $string[$i] ^ $key[$k];
  }
  $code = $action == 'DECODE' ? $code : base64_encode($code);
  return $code;
}

function gets($filename, $value) {
  if ($handle = @fopen($filename, "rb")) {
    flock($handle, LOCK_SH);
    $getcontent = fread($handle, $value); //fgets调试
    fclose($handle);
  }
  return $getcontent;
}

function P_unlink($filename) {
  strpos($filename, '..') !== false && exit('Forbidden');
  @unlink($filename);
}

function readover($filename, $method = "rb") {
  strpos($filename, '..') !== false && exit('Forbidden');
  if ($handle = @fopen($filename, $method)) {
    flock($handle, LOCK_SH);
    $filedata = @fread($handle, filesize($filename));
    fclose($handle);
  }
  return $filedata;
}

function writeover($filename, $data, $method = "rb+", $iflock = 1, $check = 1, $chmod = 1) {
  $check && strpos($filename, '..') !== false && exit('Forbidden');
  touch($filename);
  $handle = fopen($filename, $method);
  if ($iflock) {
    flock($handle, LOCK_EX);
  }
  fwrite($handle, $data);
  if ($method == "rb+")
    ftruncate($handle, strlen($data));
  fclose($handle);
  $chmod && @chmod($filename, 0777);
}

function GetLang($lang, $EXT = "php") {
  global $tankpath;
  if ($lang == 'email' || $lang == 'log' || $lang == 'bbscode') {
    $path = R_P . "template/$tankpath/lang_$lang.$EXT";
    !file_exists($path) && $path = R_P . "template/wind/lang_$lang.$EXT";
    return $path;
  } else {
    $L_P = eregi('^c_', $lang) ? C_P : R_P;
    $adminpath = file_exists($L_P . "template/admin_$tankpath") ? "admin_$tankpath" : 'admin';
    $path = $L_P . "template/$adminpath/cp_lang_$lang.$EXT";
  }
  return $path;
}

function adminmsg($msg, $jumpurl = '', $t = 2) {
  extract($GLOBALS, EXTR_SKIP);
  !$basename && $basename = $REQUEST_URI;
  if ($jumpurl != '') {
    $ifjump = "<META HTTP-EQUIV='Refresh' CONTENT='$t; URL=$jumpurl'>";
  }
  require_once GetLang('cpmsg');
  $lang[$msg] && $msg = $lang[$msg];
  include PrintEot('message');
  exit;
}

function deldir($path) {
  if (file_exists($path)) {
    if (is_file($path)) {
      P_unlink($path);
    } else {
      $handle = opendir($path);
      while ($file = readdir($handle)) {
        if (($file != ".") && ($file != "..") && ($file != "")) {
          if (is_dir("$path/$file")) {
            deldir("$path/$file");
          } else {
            P_unlink("$path/$file");
          }
        }
      }
      closedir($handle);
      rmdir($path);
    }
  }
}

function get_date($timestamp, $timeformat = '') {
  global $db_datefm, $db_timedf, $_datefm, $_timedf;
  $date_show = $timeformat ? $timeformat : ($_datefm ? $_datefm : $db_datefm);
  if ($_timedf) {
    $offset = $_timedf == '111' ? 0 : $_timedf;
  } else {
    $offset = $db_timedf == '111' ? 0 : $db_timedf;
  }
  return gmdate($date_show, $timestamp + $offset * 3600);
}

function PrintEot($template, $EXT = "htm") {
  global $tankpath;
  $L_P = preg_match('/^c_/i', $template) ? C_P : R_P;
  ///cms
  if ($template == 'bbscode' || $template == 'c_header' || $template == 'c_footer') {
    $path = $L_P . "template/$tankpath/$template.$EXT";
    !file_exists($path) && $path = $L_P . "template/wind/$template.$EXT";
    return $path;
  }
  ///cms
  $adminpath = file_exists($L_P . "template/admin_$tankpath") ? "admin_$tankpath" : 'admin';
  if (!$template)
    $template = 'N';
  $path = $L_P . "template/$adminpath/$template.$EXT";
  return $path;
}

function CheckVar($var) {
  if (is_array($var)) {
    foreach ($var as $key => $value) {
      if (!in_array($key, array('module'))) {
        CheckVar($value);
      }
    }
  } else {
    $tar = array('<iframe', '<meta', '<script');
    foreach ($tar as $k => $v) {
      if (strpos(strtolower($var), $v) !== false) {
        global $basename;
        $basename = "javascript:history.go(-1);";
        adminmsg('word_error');
      }
    }
  }
}

function PostLog($log) {
  foreach ($log as $key => $val) {
    if (is_array($val)) {
      $data .= "$key=array(" . PostLog($val) . ")";
    } else {
      $val = str_replace(array("\n", "\r", "|"), array('', '', '&#124;'), $val);
      $data .= "$key=$val, ";
    }
  }
  return $data;
}

?>