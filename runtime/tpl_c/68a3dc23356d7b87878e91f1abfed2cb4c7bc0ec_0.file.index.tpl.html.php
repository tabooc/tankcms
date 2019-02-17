<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:52:39
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\index.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68be67c16887_62039317',
  'has_nocache_code' => false,
  'file_dependency' =>
  array (
    '68a3dc23356d7b87878e91f1abfed2cb4c7bc0ec' =>
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\index.tpl.html',
      1 => 1419137784,
      2 => 'file',
    ),
  ),
  'includes' =>
  array (
  ),
),false)) {
function content_5c68be67c16887_62039317 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>后台管理 - Powered by <?php echo @constant('COPYRIGHT');?>
</title>
  <meta name="Author" content="storm tabooc@gmail.com" />
  <meta name="renderer" content="webkit" />
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
  <link rel="stylesheet" href="css/main.css" />
</head>
<body>
  <div class="head">
    <div class="navbox" id="J_navBox">
      <ul class="nav" id="J_nav">
        <li class="active">首页</li>
        <li>内容</li>
        <li>商品</li>
        <li>文件</li>
        <li>用户</li>
        <li>工具</li>
      </ul>
    </div>
    <div class="head_left">
      <a href="<?php echo @constant('COPYRIGHTDOMAIN');?>
" target="_blank"><?php echo @constant('COPYRIGHT');?>
</a>
    </div>
    <div class="head_right">
      Hi，<?php echo $_SESSION['username'];?>
，你是： <strong><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['groupname'];?>
</strong>
      &nbsp;&nbsp;|&nbsp;&nbsp;
      <a href="outlogin.php">退出</a>
    </div>
  </div>
  <div class="g-mainbox" id="J_mainBox">
    <div id="J_leftmenu" class="m-leftmenu">
      <ul class="m-menu">
        <li>
          <a href="default.php" target="contentFrame">首页</a>
        </li>
      </ul>
      <ul class="m-menu">
        <li>
          <a href="articleslist.php" target="contentFrame">文章列表</a>
        </li>
        <li>
          <a href="articlesedit.php" target="contentFrame">添加文章</a>
        </li>
        <li>
          <a href="articlesclass.php" target="contentFrame">文章类别管理</a>
        </li>
        <li>
          <a href="recmg.php" target="contentFrame">招聘列表</a>
        </li>
        <li>
          <a href="recedit.php" target="contentFrame">添加招聘</a>
        </li>
        <li>
          <a href="recclass.php" target="contentFrame">招聘类别管理</a>
        </li>
        <li>
          <a href="coemg.php" target="contentFrame">大事记列表</a>
        </li>
        <li>
          <a href="coeedit.php" target="contentFrame">添加大事记</a>
        </li>
        <li>
          <a href="coeclass.php" target="contentFrame">大事记年份管理</a>
        </li>
        <li>
          <a href="honourmg.php" target="contentFrame">集团荣誉列表</a>
        </li>
        <li>
          <a href="honouredit.php" target="contentFrame">添加集团荣誉</a>
        </li>
      </ul>
      <ul class="m-menu">
        <li>
          <a href="orderlist.php" target="contentFrame">订单列表</a>
        </li>
        <li>
          <a href="goodslist.php" target="contentFrame">商品列表</a>
        </li>
        <li>
          <a href="goodsadd.php" target="contentFrame">添加商品</a>
        </li>
        <li>
          <a href="goodsclass.php" target="contentFrame">商品分类管理</a>
        </li>
      </ul>
      <ul class="m-menu">
        <li>
          <a href="albumslist.php" target="contentFrame">相册列表</a>
        </li>
        <li>
          <a href="albumsedit.php" target="contentFrame">添加相册</a>
        </li>
        <li>
          <a href="albumsclass.php" target="contentFrame">相册分类管理</a>
        </li>
        <li>
          <a href="uploadsmg.php" target="contentFrame">资料列表</a>
        </li>
        <li>
          <a href="uploadsedit.php" target="contentFrame">上传资料</a>
        </li>
      </ul>
      <ul class="m-menu">
        <li>
          <a href="authnodemg.php" target="contentFrame">权限节点列表</a>
        </li>
        <li>
          <a href="authnodeedit.php" target="contentFrame">添加权限节点</a>
        </li>
        <li>
          <a href="authgroupmg.php" target="contentFrame">用户权限组列表</a>
        </li>
        <li>
          <a href='usermg.php' target='contentFrame'>用户列表</a>
        </li>
        <li>
          <a href='useredit.php' target='contentFrame'>添加用户</a>
        </li>
        <li>
          <a href="message.php" target="contentFrame">留言列表</a>
        </li>
      </ul>
      <ul class="m-menu">
        <li>
          <a href='log.php' target='contentFrame'>登录日志</a>
        </li>
        <li>
          <a href='updateCache.php' target='contentFrame'>更新网站缓存</a>
        </li>
        <li>
          <a href='updateTemplates.php' target='contentFrame'>更新程序编译缓存</a>
        </li>
        <li>
          <a href='iplvi.php' target='contentFrame'>IP访问限制设置</a>
        </li>
        <li>
          <a href='databack.php' target='contentFrame'>数据库备份</a>
        </li>
      </ul>
    </div>
    <div class="g-rightbox" id="J_rightbox">
      <iframe src="auto:blank" name="contentFrame" id="J_contentFrame" frameborder="0" width="100%" height="100%"></iframe>
    </div>
  </div>
  <div class="m-foot">
    Copyright © 2009~<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
<a href="<?php echo @constant('COPYRIGHTDOMAIN');?>
" target="_blank" class="copyright"><?php echo @constant('COPYRIGHT');?>
</a>
    .All Rights Reserved.
  </div>
  <?php echo '<script'; ?>
 src="scripts/jquery-2.2.4.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="scripts/functions.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
      $(function(){

          $("#J_nav > li").on("click",function(){
            var $this = $(this),
                index = $this.index(),
                menu = $("#J_leftmenu > ul"),
                targetMenu = menu.eq(index);

            $this.addClass('active').siblings().removeClass('active');
            menu.hide().eq(index).show();
            targetMenu.children('li').removeClass('active').first().addClass('active').children('a')[0].click();
          });

          $(".m-menu a").on("click",function(){
            $(this).parent().addClass('active').siblings().removeClass('active');
          });

          $("#J_mainBox").css({height:document.documentElement.offsetHeight - 122});

          $("#J_nav > li").eq(0).trigger('click');


          $(window).on("resize",function(){
            $("#J_mainBox").css({height:document.documentElement.offsetHeight - 122});
          });



        //CODE END
      });
    <?php echo '</script'; ?>
>
</body>
</html><?php }
}
