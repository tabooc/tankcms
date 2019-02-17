<?php

/*
 * 注销会话
 */
session_start();
if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 42000, '/');
    }
session_destroy();
echo "<script>window.top.location.href='index.php';</script>";
?>