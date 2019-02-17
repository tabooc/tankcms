<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:52:41
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\articleslist.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68be69947c84_18159669',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f6b5c882f591525d31f037c976f9e48405f549dd' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\articleslist.tpl.html',
      1 => 1419038914,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68be69947c84_18159669 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'E:\\htdocs\\mygithub\\tankcms\\engine\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),1=>array('file'=>'E:\\htdocs\\mygithub\\tankcms\\engine\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>文章列表</title>
  <link href="css/main.css" rel="stylesheet" />
  <?php echo '<script'; ?>
 src="scripts/functions.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>
function checkkey(e){
    if(e.keywords.value==''){
     alert('搜索关键词不得为空');
     e.keywords.focus();
     return false;
    }
}
<?php echo '</script'; ?>
>
</head>
<body id="mainbox">
  <div class="layout">
    <div class="mianBaoXie">
      <p>文章列表</p>
      <div class="search">
        <form action="articlessearch.php" method="post" name="search" onsubmit="return checkkey(this)">
          <input type="text" name="keywords" class="searchinput" />
          <select name="arttype">
            <?php
$__section_list_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['typedata']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_list_0_total = $__section_list_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_list'] = new Smarty_Variable(array());
if ($__section_list_0_total !== 0) {
for ($__section_list_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] = 0; $__section_list_0_iteration <= $__section_list_0_total; $__section_list_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']++){
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['typedata']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['typedata']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['classname'];?>
</option>
            <?php
}
}
?>
          </select>
          <input type="submit" name="searchst" value=" 给我搜 "/>
        </form>
      </div>
    </div>
    <div class="Cnt">
        <form method="post" action="" name="myipform">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="content_list">
              <tr class="tb_header">
                <td width="100">ID</td>
                <td>文章标题</td>
                <td width="80">文章类别</td>
                <td width="80">作者</td>
                <td width="80">发布时间</td>
                <td width="50">状态</td>
                <td width="35">置顶</td>
                <td width="35">头条</td>
                <td width="76">操作</td>
              </tr>
              <?php
$__section_list_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_list_1_total = $__section_list_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_list'] = new Smarty_Variable(array());
if ($__section_list_1_total !== 0) {
for ($__section_list_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] = 0; $__section_list_1_iteration <= $__section_list_1_total; $__section_list_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']++){
?>
              <tr class="tb_list">
                <td><input type="checkbox" name="eng_id[]" id="eng_id[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
" />
                  <?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
</td>
                <td align="left"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['arttitle'],"90");?>
</td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['classname'];?>
</td>
                <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['artauthor'];?>
</td>
                <td align="left"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['arttime'],"%Y-%m-%d");?>
</td>
                <td align="left">
                  <?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['artaudit'] == '1') {?>已发布<?php } else { ?> <font color='#FF0000'>未发布</font>
                  <?php }?>
                </td>
                <td align="left">
                  <?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['artuptop'] == '1') {?> <font color='#FF0000'>是</font>
                  <?php } else { ?>否<?php }?>
                </td>
                <td align="left">
                  <?php if ($_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['artfirst'] == '1') {?>
                  <font color='#FF0000'>是</font>
                  <?php } else { ?>否<?php }?>
                </td>
                <td align="left">                  
                  <a href="<?php echo $_smarty_tpl->tpl_vars['con']->value;?>
?aid=<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
" >编辑文章</a>
                </td>
              </tr>
              <?php }} else {
 ?>
              <tr class="tb_list">
                <td align="left" colspan="9">没有记录！</td>
              </tr>
              <?php
}
?>
            </table>
            <div class="cz">
              选择你的操作：
              <a onclick="javascript:window.location.reload()">刷新当前页面</a>              
              <a onclick="javascript:alls('eng_id[]')">全选</a>/<a onclick="javascript:resets('eng_id[]')">反选</a>              
              <input type="submit" name="aud" value="发布选中项" id="logc" />              
              <input type="submit" name="up" value="置顶选中项" id="logc" />              
              <input type="submit" name="first" value="头条选中项" id="logc" />              
              <input type="submit" name="markno" value="冻结选中项" id="logc" />              
              <input type="submit" onclick="return confirm('确定要删除选中文章？')" name="del" value="删除选中项" id="logc"  />
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
