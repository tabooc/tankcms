<?php

/*
 * 用户登录验证
 */
require "../init.app.php";
$track = htmlspecialchars(trim($_POST['track']));
$info = array('2' => '非法路径，请返回！', '3' => '用户名不得为空！', '4' => '密码不得为空！', '5' => '当前IP在限制访问之列！', '6' => '登录成功！', '7' => '用户无权限或密码错误！');

if ($_SESSION['track'] != $track) {
    echo json_encode(array('error' => 'error','errno' => 2,'msg' => $info[2] ));
    exit();
}

$ip = $_SERVER["REMOTE_ADDR"];
$ipcheck = new IpCheck();
$checkip = $ipcheck->checkLoginIP($ip);

if (true == $checkip) {
    echo json_encode(array('error' => 'error','errno' => 5,'msg' => $info[5] ));
    exit();
}
$time = date("Y-m-d H:i:s");
$link = new MyDB();
$username = htmlspecialchars(trim($_POST['username']));
if (strlen($username) < 1) {
    echo json_encode(array('error' => 'error','errno' => 3,'msg' => $info[3] ));
    exit();
} else {
    $username = $link->real_escape_string($username);
}
$pwd = htmlspecialchars(trim($_POST['pwd']));
if (strlen($pwd) < 1) {
    echo json_encode(array('error' => 'error','errno' => 4,'msg' => $info[4] ));
    exit();
} else {
    $pwd = $link->real_escape_string($pwd);
}
$user = new User();
$result = $user->login($username, $pwd);
if (true == $result) {
    $log = new Log();
    $data["username"] = $username;
    $data["ipaddress"] = $ip;
    $data["logintime"] = $time;
    $data["caozuo"] = '登录成功';
    $log->add($data);
    echo json_encode(array('error' => 'ok','errno' => 6,'msg' => $info[6] ));
    exit();
} else {
    echo json_encode(array('error' => 'error','errno' => 7,'msg' => $info[7] ));
}
?>