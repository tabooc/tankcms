<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:53:19
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\recmg.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68be8fac2b09_11465401',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b18b157f0cfbececb84d1927a228c990e1a0933f' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\recmg.tpl.html',
      1 => 1419048343,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68be8fac2b09_11465401 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>招聘列表</title>
  <link href="css/main.css" rel="stylesheet" />
  <?php echo '<script'; ?>
 src="scripts/functions.js"><?php echo '</script'; ?>
>
</head>
<body id="mainbox">
  <div class="layout">
    <div class="mianBaoXie">招聘列表</div>
    <div class="Cnt">
      <form method="post" action="" name="myipform">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="content_list">
          <tr class="tb_header">
            <td width="100">ID</td>
            <td>招聘职位</td>
            <td width="80">招聘人数</td>
            <td width="120">招聘类型</td>
            <td width="80">发布时间</td>
            <td width="70">状态</td>
            <td width="70">是否置顶</td>
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
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['zhiwei'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['number'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['zptype'];?>
</td>
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['zptime'];?>
</td>
            <td align="left">
              <?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['recstate'] == '1') {?>已发布<?php } else { ?> <font color='#FF0000'>未发布</font>
              <?php }?>
            </td>
            <td align="left">
              <?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['uptop'] == '1') {?> <font color='#FF0000'>是</font>
              <?php } else { ?>否<?php }?>
            </td>
            <td align="left">
              <a href="<?php echo $_smarty_tpl->tpl_vars['con']->value;?>
?aid=<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
" >编辑</a>
            </td>
          </tr>
          <?php }} else {
 ?>
          <tr class="tb_list">
            <td align="left" colspan="8">没有记录！</td>
          </tr>
          <?php
}
?>
        </table>
        <div class="cz">
          选择你的操作：
          <a onclick="javascript:window.location.reload()">刷新当前页面</a>
          <a onclick="javascript:alls('eng_id[]')">全选</a>
          /
          <a onclick="javascript:resets('eng_id[]')">反选</a>
          <input type="submit" name="aud" value="发布此职位" id="logc" />
          <input type="submit" name="up" value="置顶此职位" id="logc" />
          <input type="submit" name="markno" value="冻结此职位" id="logc" />
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
