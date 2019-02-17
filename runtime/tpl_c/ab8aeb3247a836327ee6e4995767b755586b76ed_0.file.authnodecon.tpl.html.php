<?php
/* Smarty version 3.1.33, created on 2019-02-17 10:36:36
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\authnodecon.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68c8b4a64f05_76955668',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab8aeb3247a836327ee6e4995767b755586b76ed' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\authnodecon.tpl.html',
      1 => 1419056073,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68c8b4a64f05_76955668 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>编辑权限节点</title>
  <link href="css/main.css" rel="stylesheet" />
</head>
<body id="mainbox">
  <div class="layout">
    <div class="mianBaoXie">编辑权限节点</div>
    <div class="Cnt">
      <form method="post" action="#" name="recForm" class="recform">
        <div class="title-common">父节点：</div>
        <div>
          <select name="nodefid" class="sel-common">
            <option value="0">根目录</option>
            <?php
$__section_list_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['ndata']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_list_0_total = $__section_list_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_list'] = new Smarty_Variable(array());
if ($__section_list_0_total !== 0) {
for ($__section_list_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] = 0; $__section_list_0_iteration <= $__section_list_0_total; $__section_list_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']++){
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['ndata']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['data']->value['nodefid'] == $_smarty_tpl->tpl_vars['ndata']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ndata']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['nodename'];?>
</option>
            <?php
}
}
?>
          </select>
        </div>
        <div class="title-common">权限节点名称：*例如：文章管理</div>
        <div>
          <input type="text" name="nodename" class="text-common text-short" maxlength="33" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['nodename'];?>
" />
        </div>
        <div class="title-common">权限节点标记：*例如：articleslist</div>
        <div>
          <input type="text" name="nodemark" class="text-common text-short" maxlength="33" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['nodemark'];?>
" />
        </div>
        <div class="title-common">权限节点简述：</div>
        <div>
          <textarea name="nodedes" class="textarea-common" wrap="PHYSICAL"><?php echo $_smarty_tpl->tpl_vars['data']->value['nodedes'];?>
</textarea>
        </div>
        <div class="cz">
          选择你的操作：
            <a onclick="javascript:window.location.reload()">刷新当前页面</a>
            <input type="submit" name="up" value="提交" id="recbot" />
            <?php if ($_smarty_tpl->tpl_vars['nextid']->value != '') {?>
            <a href='?aid=<?php echo $_smarty_tpl->tpl_vars['nextid']->value;?>
'>查看下一条</a>
            <?php }
if ($_smarty_tpl->tpl_vars['previd']->value != '') {?>
            <a href='?aid=<?php echo $_smarty_tpl->tpl_vars['previd']->value;?>
'>查看上一条</a>
            <?php }?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['jump']->value;?>
">返回列表</a>
          </div>
        </form>
      </div>
    </div>
</body>
</html><?php }
}
