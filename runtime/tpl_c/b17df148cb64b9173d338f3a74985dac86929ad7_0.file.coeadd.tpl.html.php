<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:53:37
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\coeadd.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68bea13d1588_64387406',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b17df148cb64b9173d338f3a74985dac86929ad7' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\coeadd.tpl.html',
      1 => 1419041761,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68bea13d1588_64387406 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>添加大事记</title>
  <link href="css/main.css" rel="stylesheet" />
</head>
<body id="mainbox">
  <div class="layout">
    <div class="mianBaoXie">添加大事记</div>
    <div class="Cnt">
      <form method="post" action="#" name="recForm" class="recform">
        <div class="title-common">大事记所属年份：</div>
        <div>          
          <select name="coeyear" class="sel-common">
            <?php
$__section_ylist_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['yeardata']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_ylist_0_total = $__section_ylist_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_ylist'] = new Smarty_Variable(array());
if ($__section_ylist_0_total !== 0) {
for ($__section_ylist_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_ylist']->value['index'] = 0; $__section_ylist_0_iteration <= $__section_ylist_0_total; $__section_ylist_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_ylist']->value['index']++){
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['yeardata']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ylist']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ylist']->value['index'] : null)]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['yeardata']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_ylist']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_ylist']->value['index'] : null)]['coeyear'];?>
</option>
            <?php
}
}
?>
          </select>
        </div>
        <div class="title-common">大事记时间：*例如：2009年8月2日</div>
        <div>          
          <input type="text" name="coedate" class="text-common text-short" maxlength="33" />          
        </div>
        <div class="title-common">发布时间：*标准示例：2014-12-20 10:14:06</div>
        <div>          
          <input type="text" name="coeupdate" class="text-common text-short" value="<?php echo $_smarty_tpl->tpl_vars['nowdate']->value;?>
" />          
        </div>        
        <div class="title-common">大事记内容：</div>
        <div>          
          <textarea name="coecontent" class="textarea-common" wrap="PHYSICAL"></textarea>
        </div>
        <div class="cz">
          <input type="submit" name="add" value="提交" class="submit-common" />
          <a href="<?php echo $_smarty_tpl->tpl_vars['jump']->value;?>
">返回列表</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html><?php }
}
