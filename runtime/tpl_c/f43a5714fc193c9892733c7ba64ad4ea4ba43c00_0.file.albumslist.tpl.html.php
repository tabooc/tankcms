<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:52:43
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\albumslist.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68be6b617602_59053419',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f43a5714fc193c9892733c7ba64ad4ea4ba43c00' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\albumslist.tpl.html',
      1 => 1419000867,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68be6b617602_59053419 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'E:\\htdocs\\mygithub\\tankcms\\engine\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'E:\\htdocs\\mygithub\\tankcms\\engine\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>相册列表</title>
  <link href="css/main.css" rel="stylesheet" />
  <?php echo '<script'; ?>
 src="scripts/functions.js"><?php echo '</script'; ?>
>
</head>
<body id="mainbox">
  <div class="layout">
    <div class="mianBaoXie">
      <p>相册列表</p>
    </div>
    <div class="Cnt">
      <form method="post" action="">
        <ul class="albumslist">
          <?php
$__section_list_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_list_0_total = $__section_list_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_list'] = new Smarty_Variable(array());
if ($__section_list_0_total !== 0) {
for ($__section_list_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] = 0; $__section_list_0_iteration <= $__section_list_0_total; $__section_list_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']++){
?>
          <li>
            <p class="pl-thumb">
              <img src="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['path'])===null||$tmp==='' ? '../attached/albums/none.gif' : $tmp);?>
" alt=""></p>
            <p><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['aname'],30);?>
</p>
            <p>创建时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['atime'],"%Y-%m-%d");?>
</p>
            <p>分类：<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['cname'];?>
</p>
            <p>排序：<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['asort'];?>
</p>
            <p class="sub-action">
              <input type="checkbox" name="eng_id[]" id="eng_id[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
" class="vm" />
              <a href="albumsedit.php?aid=<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
">编辑相册</a>
              <a href="photosedit.php?listid=<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
">查看内容</a>
              <a href="photosedit.php?aid=<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
">上传图片</a>
            </p>
          </li>
          <?php }} else {
 ?>
          <li>
            <a href="albumsedit.php">添加相册</a>
          </li>
          <?php
}
?>
        </ul>

        <div class="cz">
          选择你的操作：
          <a onclick="javascript:window.location.reload()">刷新当前页面</a>          
          <a onclick="javascript:alls('eng_id[]')">全选</a>/<a onclick="javascript:resets('eng_id[]')">反选</a>          
          <input type="submit" onclick="return confirm('确定要删除选中相册？这将会删除相册里所有的图片！')" name="del" value="删除选中项" id="logc"  />
        </div>
        <div class="fenye"><?php echo $_smarty_tpl->tpl_vars['getpagedata']->value;?>
</div>
      </form>

    </div>
  </div>
</body>
</html><?php }
}
