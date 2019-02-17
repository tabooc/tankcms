<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:53:33
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\coemg.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68be9d6bf582_99220005',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd55d24fc89ee920af47e7a61f37b2555de7f902' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\coemg.tpl.html',
      1 => 1419042957,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68be9d6bf582_99220005 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'E:\\htdocs\\mygithub\\tankcms\\engine\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'E:\\htdocs\\mygithub\\tankcms\\engine\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>大事记列表</title>
  <link href="css/main.css" rel="stylesheet" />
  <?php echo '<script'; ?>
 src="scripts/functions.js"><?php echo '</script'; ?>
>
</head>
<body id="mainbox">
  <div class="layout">
    <div class="mianBaoXie">大事记列表</div>
    <div class="ipCnt">
      <form method="post" action="" name="myipform">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" class="content_list">
          <tr class="tb_header">
            <td width="100">ID</td>
            <td width="160">大事记年份</td>
            <td>大事记概述</td>
            <td width="80">发布时间</td>
            <td width="70">状态</td>
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
            <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['coeyear'];?>
</td>
            <td align="left"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['coecontent'],60);?>
</td>
            <td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['coeupdate'],"%Y-%m-%d");?>
</td>
            <td align="left">
              <?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['coestate'] == '1') {?>已发布<?php } elseif ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['coestate'] == '0') {?> <font color='#FF0000'>未发布</font>
              <?php } else { ?> <font color="#CCCCCC">回收站</font>
              <?php }?>
            </td>
            <td align="left">
              <a href="<?php echo $_smarty_tpl->tpl_vars['jump']->value;?>
?aid=<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
" >编辑</a>
            </td>
          </tr>
          <?php }} else {
 ?>
          <tr class="tb_list">
            <td align="left" colspan="6">没有记录！</td>
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
          <input type="submit" name="aud" value="发布此信息" class="logc" />
          <input type="submit" name="markno" value="冻结此信息" class="logc" />
          <input type="submit" name="del" value="删除选中项" class="logc" />
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
