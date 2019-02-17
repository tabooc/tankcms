<?php

require "init.app.php";

$testarr = array(
'2012-05-13'=>array(
            array('count' => '669','adddate' => '2012-05-13','userid' => '1','username' => '小明','time' => '2012-05-13'),
            array('count' => '456', 'adddate' => '2012-05-13', 'userid' => '2', 'username' => '小红', 'time' => '2012-05-13')
  ),
     '2012-07-27'=>array(
            array('count' => '321','adddate' => '2012-05-13','userid' => '3','username' => '小强','time' => '2012-05-13'),
            array('count' => '1200', 'adddate' => '2012-05-13', 'userid' => '4', 'username' => '小刚', 'time' => '2012-05-13')
  )
 );


$dataarr =array (
	'id'=>'test3',
	'title'=>'test4',
);




$info = array('2' => '非法路径，请返回！', '3' => '用户名不得为空！', '4' => '密码不得为空！', '5' => '当前IP在限制访问之列！', '6' => '登录成功！', '7' => '用户无权限或密码错误！');

echo $info[7];


$tank->assign('test',$dataarr);
$tank->assign('testarr',$testarr);



$tank->assign('data', date("Y-m-d H:i:s"));
$tank->assign('key', MD5('111111'));
$tank->display("default/test.tpl.html");
?>