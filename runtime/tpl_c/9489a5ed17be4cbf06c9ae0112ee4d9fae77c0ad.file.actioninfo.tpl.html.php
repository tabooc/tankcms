<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-17 09:48:13
         compiled from "E:\htdocs\mygithub\tankcms\themes\webacp\actioninfo.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:114795c68bd5d64a284-79103812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9489a5ed17be4cbf06c9ae0112ee4d9fae77c0ad' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\actioninfo.tpl.html',
      1 => 1418907297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114795c68bd5d64a284-79103812',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg' => 0,
    'sec' => 0,
    'url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c68bd5d690786_51830079',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c68bd5d690786_51830079')) {function content_5c68bd5d690786_51830079($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <title>信息提示</title>
    <link href="css/main.css" rel="stylesheet" />
  </head>
  <body id="mainbox">
    <div id="infoWindow"><span><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</span><br/>系统将会在<?php echo $_smarty_tpl->tpl_vars['sec']->value;?>
秒后跳转<br/>如果不想等待，可以<a href="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['url']->value)===null||$tmp==='' ? 'window.history.go(-1)' : $tmp);?>
">点击此处跳转</a></div>
    <?php echo '<script'; ?>
>

        setTimeout(function(){
            window.location.href='<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
';

        },<?php echo $_smarty_tpl->tpl_vars['sec']->value;?>
*1000);

    <?php echo '</script'; ?>
>
  </body>
</html><?php }} ?>
