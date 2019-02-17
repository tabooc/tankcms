<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:53:44
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\honouradd.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68bea864a284_99657846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3a70a86989f71ba14b623baf06f01ab922b3dcb1' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\honouradd.tpl.html',
      1 => 1419043346,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68bea864a284_99657846 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>添加集团荣誉</title>
  <link href="css/main.css" rel="stylesheet" />
</head>
<body id="mainbox">
  <div class="layout">
    <div class="mianBaoXie">添加集团荣誉</div>
    <div class="Cnt">
      <form method="post" action="" name="recForm" class="recform">
        <div class="title-common">集团荣誉时间：*例如：2011年8月2日</div>
        <div>
          <input type="text" name="rydate" class="text-common text-short" maxlength="33" />
        </div>
        <div class="title-common">发布时间：*标准示例：2011-08-02 10:59:33</div>
        <div>
          <input type="text" name="ryupdate" class="text-common text-short" value="<?php echo $_smarty_tpl->tpl_vars['nowdate']->value;?>
" />
        </div>
        <div class="title-common">集团荣誉内容：</div>
        <div>
          <textarea name="rycontent" class="textarea-common" wrap="PHYSICAL"></textarea>
        </div>
        <div class="title-common">立即发布：</div>
        <div>
          <input type="radio" name="aud" value="1" checked="checked" />
          是
          <input type="radio" name="aud" value="0" />
          否
        </div>
        <br>
        <div class="cz">
          <input type="submit" name="honouradd" value="提交" class="submit-common" />
          <a href="<?php echo $_smarty_tpl->tpl_vars['jump']->value;?>
">返回列表</a>          
        </div>
      </form>
      <br>
    </div>
  </div>
</body>
</html><?php }
}
