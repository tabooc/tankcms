<?php

!function_exists('readover') && exit('Forbidden');

Class DB {

  var $query_num = 0;

  function __construct($dbhostname, $dbusername, $dbpassword, $dbdataname, $dbconntype = 0) {
    $this->connect($dbhostname, $dbusername, $dbpassword, $dbdataname, $dbconntype);
  }

  function connect($dbhostname, $dbusername, $dbpassword, $dbdataname, $dbconntype = 0) {
    $dbconntype == 0 ? @mysql_pconnect($dbhostname, $dbusername, $dbpassword) : @mysql_pconnect($dbhostname, $dbusername, $dbpassword);
    mysql_errno() != 0 && $this->halt("Connect($dbconntype) to MySQL ($dbhostname,$dbusername) failed");
    if ($this->server_info() > '4.1' && $GLOBALS['charset']) {
      mysql_query("SET NAMES '" . $GLOBALS['charset'] . "'");
    }
    if ($this->server_info() > '5.0') {
      mysql_query("SET sql_mode=''");
    }
    if ($dbdataname) {
      if (!@mysql_select_db($dbdataname)) {
        $this->halt('Cannot use database ' . $dbdataname);
      }
    }
  }

  function close() {
    return mysql_close();
  }

  function select_db($dbdataname) {
    if (!@mysql_select_db($dbdataname)) {
      $this->halt('Cannot use database ' . $dbdataname);
    }
  }

  function server_info() {
    return mysql_get_server_info();
  }

  function query($SQL, $method = '') {
    $GLOBALS['PW'] == 'pw_' or $SQL = str_replace('pw_', $GLOBALS['PW'], $SQL);
    if ($method == 'U_B' && function_exists('mysql_unbuffered_query')) {
      $query = mysql_unbuffered_query($SQL);
    } else {
      $query = @mysql_query($SQL);
    }
    $this->query_num++;

    //echo $SQL.'<br>'.$this->query_num.'<br>';
    //if (!$query)  $this->halt('Query Error: ' . $SQL);
    return $query;
  }

  function get_one($SQL) {

    $query = $this->query($SQL, 'U_B');

    $rs = & mysql_fetch_array($query, MYSQL_ASSOC);

    return $rs;
  }

  function pw_update($SQL_1, $SQL_2, $SQL_3) {
    $rt = $this->get_one($SQL_1);
    if ($rt) {
      $this->update($SQL_2);
    } else {
      $this->update($SQL_3);
    }
  }

  function update($SQL) {
    $GLOBALS['PW'] == 'pw_' or $SQL = str_replace('pw_', $GLOBALS['PW'], $SQL);
    if ($GLOBALS['db_lp'] == 1) {
      if (substr($SQL, 0, 7) == 'REPLACE') {
        $SQL = substr($SQL, 0, 7) . ' LOW_PRIORITY' . substr($SQL, 7);
      } else {
        $SQL = substr($SQL, 0, 6) . ' LOW_PRIORITY' . substr($SQL, 6);
      }
    }
    if (function_exists('mysql_unbuffered_query')) {
      $query = mysql_unbuffered_query($SQL);
    } else {
      $query = @mysql_query($SQL);
    }
    $this->query_num++;

    //echo $SQL.'<br>'.$this->query_num.'<br>';
    //if (!$query)  $this->halt('Update Error: ' . $SQL);
    return $query;
  }

  function fetch_array($query, $result_type = MYSQL_ASSOC) {
    return mysql_fetch_array($query, $result_type);
  }

  function affected_rows() {
    return mysql_affected_rows();
  }

  function num_rows($query) {
    $rows = mysql_num_rows($query);
    return $rows;
  }

  function free_result($query) {
    return mysql_free_result($query);
  }

  function insert_id() {
    $id = mysql_insert_id();
    return $id;
  }

  function halt($msg = '') {
    new DB_ERROR($msg);
  }

}

Class DB_ERROR {

  function DB_ERROR($msg) {
    global $db_bbsname, $db_obstart, $REQUEST_URI;
    $sqlerror = mysql_error();
    $sqlerrno = mysql_errno();
    ob_end_clean();
    $db_obstart == 1 ? ob_start('ob_gzhandler') : ob_start();
    echo"<html><head><title>$db_bbsname</title><style type='text/css'>P,BODY{FONT-FAMILY:tahoma,arial,sans-serif;FONT-SIZE:11px;}A { TEXT-DECORATION: none;}a:hover{ text-decoration: underline;}TD { BORDER-RIGHT: 1px; BORDER-TOP: 0px; FONT-SIZE: 16pt; COLOR: #000000;}</style><body>\n\n";
    echo"<table style='TABLE-LAYOUT:fixed;WORD-WRAP: break-word'><tr><td>$msg";
    echo"<br><br><b>The URL Is</b>:<br>http://$_SERVER[HTTP_HOST]$REQUEST_URI";
    echo"<br><br><b>MySQL Server Error</b>:<br>$sqlerror  ( $sqlerrno )";
    echo"</td></tr></table>";
    exit;
  }

}

?>