<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:53:18
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\articlesclass.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68be8ef3b389_61836087',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5cb6b79540375f33890e6e5e5e62f7483a6fd6dd' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\articlesclass.tpl.html',
      1 => 1419003027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68be8ef3b389_61836087 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <title>文章类别管理</title>
    <link href="css/main.css" rel="stylesheet" />
    <?php echo '<script'; ?>
 src="scripts/functions.js"><?php echo '</script'; ?>
>    
  </head>
  <body id="mainbox">
    <div class="layout">
      <div class="mianBaoXie">文章类别管理</div>
      <div class="Cnt">
          <form method="post" action="" name="myipform">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="content_list">
                <tr class="tb_header">
                  <td width="100">ID</td>
                  <td>类别名称</td>
                  <td width="80">类型编号</td>
                  <td width="80">类型编辑</td>
                </tr>
                <?php
$__section_list_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_list_0_total = $__section_list_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_list'] = new Smarty_Variable(array());
if ($__section_list_0_total !== 0) {
for ($__section_list_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] = 0; $__section_list_0_iteration <= $__section_list_0_total; $__section_list_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']++){
?>
                <tr class="tb_list">
                  <td><input type="checkbox" name="eng_id[]" id="eng_id[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
" />
                    <?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
</td>
                  <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['classname'];?>
</td>
                  <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['pid'];?>
</td>
                  <td align="left"><a href="javascript:editclass(<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['classname'];?>
',<?php echo $_smarty_tpl->tpl_vars['data']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['pid'];?>
)">编辑分类</a></td>
                </tr>
                <?php }} else {
 ?>
                <tr class="tb_list">
                  <td align="left" colspan="4">没有记录！</td>
                </tr>
                <?php
}
?>
              </table>
              <div class="cz">选择你的操作：<a onclick="javascript:window.location.reload()">刷新当前页面</a><a onclick="javascript:alls('eng_id[]')">全选</a>/<a onclick="javascript:resets('eng_id[]')">反选</a>
                <input type="submit" name="del" value="删除选中项" id="logc" />                
                <a onclick="javascript:addrecclass('addclass')">添加分类</a>
              </div>
              <div class="fenye"><?php echo $_smarty_tpl->tpl_vars['getpagedata']->value;?>
</div>
              <div class="clear"></div>
          </form>
      </div>
<!--添加文章类型 -->
      <div class="addip" id="addclass" style="display:none;">
        <form method="post" action="" name="addclassForm" onsubmit="return check(addclassForm)">
          文章类型：<input type="text" name="adp" maxlength="21" />
          类型编号：<input type="text" name="typept" maxlength="6" />
          <input type="submit" name="addclass" value="提交" id="ipadd" /><input type="reset" name="rst" value="清除"  id="ipadd" /><a onclick="closeDiv('addclass')">取消操作</a>
        </form>
      </div>
      <!--编辑类型-->
      <div class="addip" id="editclass" style="display:none;">
        <form method="post" action="" name="editclassForm" onsubmit="return check2(this)">
          <input type="hidden" name="classid" id="classid" value="" />
          文章类型：<input type="text" name="editadp" id="editadp" maxlength="27" />
          类型编号：<input type="text" name="edittypept" id="edittypept" maxlength="6" />
          <input type="submit" name="editclass" value="提交" id="ipadd" /><input type="reset" name="rst" value="清除"  id="ipadd" /><a onclick="closeDiv('editclass')">取消操作</a>
        </form>
      </div>
    </div>
    <?php echo '<script'; ?>
>
      function check(w){
        if(w.adp.value==""){
          alert("类型不得为空");w.adp.focus();return false;
        }
        if(w.typept.value=="" || isNaN(w.typept.value)){
          alert("编号不得为空且必须为阿拉伯数字!");w.typept.focus();return false;
        }
      }
      function check2(w){
        if(w.editadp.value==""){
          alert("类型不得为空");w.editadp.focus();return false;
        }
        if(w.edittypept.value=="" || isNaN(w.edittypept.value)){
          alert("编号不得为空且必须为阿拉伯数字!");w.edittypept.focus();return false;
        }
      }
      function editclass(a,b,c){
        addrecclass('editclass');
        var classid=document.getElementById("classid");
        var editadp=document.getElementById("editadp");
        var edittypept=document.getElementById("edittypept");

        classid.setAttribute("value",a);
        editadp.setAttribute("value",b);
        edittypept.setAttribute("value",c);
      }
    <?php echo '</script'; ?>
>
  </body>
</html><?php }
}
