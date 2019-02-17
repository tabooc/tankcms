<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:52:43
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\authnodemg.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68be6bdcff09_45227759',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93100dbdab9bc9ce615ee63b1ee2bb6f7d57b8ec' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\authnodemg.tpl.html',
      1 => 1419041356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68be6bdcff09_45227759 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <title>权限节点列表</title>
    <link href="css/main.css" rel="stylesheet" />
    <?php echo '<script'; ?>
 src="scripts/functions.js"><?php echo '</script'; ?>
>
  </head>
  <body id="mainbox">
    <div class="layout">
      <div class="mianBaoXie">权限节点列表<span class="tips red_font">(注意：删除节点的同时将删除当前节点所拥有的所有下级节点!)</span></div>
      <div class="ipCnt">
          <form method="post" action="" name="myipform">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="content_list">
                <tr class="tb_header">
                  <td width="100">ID</td>
                  <td>节点名称</td>
                  <td>节点标记</td>
                  <td width="90">是否根栏目</td>
                  <td width="90">操作</td>
                </tr>
                <?php
$__section_list_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_list_0_total = $__section_list_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_list'] = new Smarty_Variable(array());
if ($__section_list_0_total !== 0) {
for ($__section_list_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] = 0; $__section_list_0_iteration <= $__section_list_0_total; $__section_list_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']++){
?>
                <tr class="tb_list">
                  <td align="left">
                    <input type="checkbox" name="eng_id[]" id="eng_id[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
" />
                    <?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
</td>
                  <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['nodename'];?>
</td>
                  <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['nodemark'];?>
</td>
                  <td align="left"><?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['nodefid'] == '0') {?>是<?php } else { ?>否<?php }?></td>
                  <td align="left"><a href="<?php echo $_smarty_tpl->tpl_vars['jump']->value;?>
?aid=<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
" >编辑节点</a></td>
                </tr>
                <?php }} else {
 ?>
                <tr class="tb_list">
                  <td align="left" colspan="5">没有记录！</td>
                </tr>
                <?php
}
?>
              </table>
              <div class="cz">选择你的操作：<a onclick="javascript:window.location.reload()">刷新当前页面</a><a onclick="javascript:alls('eng_id[]')">全选</a>/<a onclick="javascript:resets('eng_id[]')">反选</a>
                <input type="submit" name="del" value="删除选中项" id="logc" />
              </div>
              <div class="fenye"><?php echo $_smarty_tpl->tpl_vars['getpagedata']->value;?>
</div>
              <div class="clear"></div>
          </form>
      </div>
    </div>
  </body>
</html><?php }
}
