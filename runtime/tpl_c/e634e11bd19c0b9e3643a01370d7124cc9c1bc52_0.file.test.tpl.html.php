<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:58:12
  from 'E:\htdocs\mygithub\tankcms\themes\default\test.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68bfb4396c00_12532725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e634e11bd19c0b9e3643a01370d7124cc9c1bc52' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\default\\test.tpl.html',
      1 => 1550367873,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68bfb4396c00_12532725 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['data']->value;?>
</title>
</head>
<body>
<hr />
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['testarr']->value, 'list', false, NULL, 'outer', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['list']->value) {
?>
  <?php
$__section_listc_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['list']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_listc_0_total = $__section_listc_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_listc'] = new Smarty_Variable(array());
if ($__section_listc_0_total !== 0) {
for ($__section_listc_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_listc']->value['index'] = 0; $__section_listc_0_iteration <= $__section_listc_0_total; $__section_listc_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_listc']->value['index']++){
?>
  姓名:<?php echo $_smarty_tpl->tpl_vars['list']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listc']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listc']->value['index'] : null)]['username'];?>
 : 有 <?php echo $_smarty_tpl->tpl_vars['list']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listc']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listc']->value['index'] : null)]['count'];?>
条记录<br/>
<?php
}
}
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<?php echo $_smarty_tpl->tpl_vars['key']->value;?>

</body>
</html>
<?php }
}
