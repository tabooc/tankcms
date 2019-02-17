<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:52:44
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\log.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68be6c5e0b07_92361473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df4d994d5b1329351b430d0dee88645859073723' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\log.tpl.html',
      1 => 1419054402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68be6c5e0b07_92361473 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>登录日志</title>
  <link href="css/main.css" rel="stylesheet" />
  <?php echo '<script'; ?>
 src="scripts/functions.js"><?php echo '</script'; ?>
>
</head>
<body id="mainbox">
  <div class="layout">
    <div class="mianBaoXie">登录日志</div>
    <div class="logCnt">
      <form method="post" action="" name="mylogform">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="content_list">
          <tr class="tb_header">
            <th width="100">ID</th>
            <th width="200">用户名</th>
            <th>操作</th>
            <th width="180">IP地址</th>
            <th width="180">操作时间</th>
          </tr>
          <?php
$__section_list_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_list_0_total = $__section_list_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_list'] = new Smarty_Variable(array());
if ($__section_list_0_total !== 0) {
for ($__section_list_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] = 0; $__section_list_0_iteration <= $__section_list_0_total; $__section_list_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']++){
?>
          <tr class="tb_list">
            <td>
              <input type="checkbox" name="eng_id[]" id="eng_id[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
" />
              <?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>

            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['username'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['caozuo'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['ipaddress'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['logintime'];?>
</td>
          </tr>
          <?php }} else {
 ?>
          <tr class="tb_list">
            <td colspan="5">没有记录！</td>
          </tr>
          <?php
}
?>
        </table>
        <div class="cz">
          选择你的操作：
          <a onclick="javascript:window.location.reload()">刷新当前页面</a>
          <a onclick="javascript:alls('eng_id[]')">全选</a>
          <a onclick="javascript:resets('eng_id[]')">反选</a>
          <input type="submit" name="logdel" value="删除选中项" class="logc" />
        </div>
        <div class="fenye"><?php echo $_smarty_tpl->tpl_vars['getpagedata']->value;?>
</div>
      </form>
    </div>
  </div>
</body>
</html><?php }
}
