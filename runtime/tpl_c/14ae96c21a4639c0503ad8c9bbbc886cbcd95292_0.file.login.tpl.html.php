<?php
/* Smarty version 3.1.33, created on 2019-02-17 10:34:15
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\login.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68c82703b608_11318343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14ae96c21a4639c0503ad8c9bbbc886cbcd95292' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\login.tpl.html',
      1 => 1550370854,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68c82703b608_11318343 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo @constant('CMS_NAME');?>
 <?php echo @constant('VERSION');?>
 - 登录 - Powered by <?php echo @constant('COPYRIGHT');?>
</title>
<link href="css/main.css" rel="stylesheet" />
</head>
<body>
<div class="myform">
  <h1><a href="<?php echo @constant('COPYRIGHTDOMAIN');?>
" target="_blank"><?php echo @constant('COPYRIGHT');?>
</a></h1>
  <p class="bstips">请使用现代浏览器进行操作</p>
  <form name="loginform" id="loginform" action="" method="post" class="form">
    <p>
      <input name="track" type="hidden" id="track" value="<?php echo $_smarty_tpl->tpl_vars['track']->value;?>
" />
      <label for="user_login">用户名</label>
      <input type="text" name="username" id="user_login" class="input" value="" size="20" />
    </p>
    <p>
      <label for="user_pass">密码</label>
      <input type="password" name="pwd" id="user_pass" class="input" value="" size="20" />
    </p>
    <p class="submit">
      <input type="submit" name="acp-submit" id="acp-submit" class="button-primary" value="登录" />
    </p>
    <div class="showinfo" id="showinfo"></div>
  </form>
</div>
<?php echo '<script'; ?>
 src="<?php echo @constant('__JS__');?>
/jquery-2.2.4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
      $(function(){
        $("#user_login").focus();
        $("#loginform").submit(function(){

             if($.trim($("#user_login").val()) == '' || $.trim($("#user_pass").val()) == ''){
                 logininfo(1,'请填写用户名和密码');
                 return false;
             }
            $.post('checkLogin.php', $("#loginform").serialize(),function(res){
                logininfo(res.errno,res.msg);
            },'json');

            return false;

        });
        function logininfo(state,msg){
            var $showinfo = $("#showinfo");

                $showinfo.html(msg);
                if(state == '6'){
                  // window.top.location.href='index.php';
                  return true;
                }
                setTimeout(function(){
                    $showinfo.html('');
                },2000);
        }

        //JQ CODE END
      });
    <?php echo '</script'; ?>
>
</body>
</html><?php }
}
