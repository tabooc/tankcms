<?php
/* Smarty version 3.1.33, created on 2019-02-17 09:53:20
  from 'E:\htdocs\mygithub\tankcms\themes\webacp\recadd.tpl.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c68be9088c488_76537938',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c650fd3e899245f1a6144ec3be570bf206d3bbbc' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\recadd.tpl.html',
      1 => 1419047237,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c68be9088c488_76537938 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>添加招聘</title>
  <link href="css/main.css" rel="stylesheet" />
  <?php echo '<script'; ?>
 charset="utf-8" src="<?php echo @constant('__PLUGINS__');?>
kindeditor-4.1.10/kindeditor.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 charset="utf-8" src="<?php echo @constant('__PLUGINS__');?>
kindeditor-4.1.10/lang/zh_CN.js"><?php echo '</script'; ?>
>
</head>
<body id="mainbox">
  <div class="layout">
    <div class="mianBaoXie">添加招聘</div>
    <div class="Cnt">
      <form method="post" action="" name="recForm" class="recform">
        <div class="title-common">招聘类型：</div>
        <div>
          <select name="zptype" class="sel-common">
            <?php
$__section_list_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['typedata']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_list_0_total = $__section_list_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_list'] = new Smarty_Variable(array());
if ($__section_list_0_total !== 0) {
for ($__section_list_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] = 0; $__section_list_0_iteration <= $__section_list_0_total; $__section_list_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']++){
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['typedata']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['typedata']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)]['zptype'];?>
</option>
            <?php
}
}
?>
          </select>
        </div>
        <div class="title-common">招聘职位：</div>
        <div>
          <input type="text" name="zhiweipt" class="text-common text-short" maxlength="33" />
        </div>
        <div class="title-common">职位性质：*例如全职、兼职</div>
        <div>
          <input type="text" name="xingzhipt" class="text-common text-short" maxlength="33" />          
        </div>
        <div class="title-common">发布时间：*标准示例：2014-09-26</div>
        <div>
          <input type="text" name="zptimept" class="text-common text-short" maxlength="33" value="<?php echo $_smarty_tpl->tpl_vars['nowdate']->value;?>
" />          
        </div>
        <div class="title-common">工作经验：</div>
        <div>
          <input type="text" name="yearpt" class="text-common text-short" maxlength="33" />
        </div>
        <div class="title-common">学历要求：</div>
        <div>
          <input type="text" name="xuelipt" class="text-common text-short" maxlength="33" />
        </div>
        <div class="title-common">招聘人数：</div>
        <div>
          <input type="text" name="numpt" class="text-common text-short" maxlength="33" />
        </div>
        <div class="title-common">掌握语言：</div>
        <div>
          <input type="text" name="yuyanpt" class="text-common text-short" maxlength="33" />
        </div>
        <div class="title-common">月薪：</div>
        <div>
          <input type="text" name="yuexinpt" class="text-common text-short" maxlength="33" />
        </div>
        <div class="title-common">简历语言：</div>
        <div>
          <input type="text" name="jlyypt" class="text-common text-short" maxlength="33" />
        </div>
        <div class="title-common">工作地点：</div>
        <div>
          <input type="text" name="gzddpt" class="text-common text-short" maxlength="66" />
        </div>        
        <div class="title-common">工作描述：</div>
        <div>
          <?php echo '<script'; ?>
>
            var editor;
            KindEditor.ready(function(K) {
              editor = K.create('textarea[name="miaoshu"]', {
                resizeType : 1,
                allowPreviewEmoticons : false,
                          urlType:'relative',
                items : [
              'source','fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
              'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
              'insertunorderedlist', '|','link']
              });
            });
          <?php echo '</script'; ?>
>
          <textarea name="miaoshu" cols="80" rows="20" wrap="PHYSICAL" id="miaoshu"></textarea>
        </div>
        <div class="cz">
          选择你的操作：          
          <input type="submit" name="add" value="提交" id="recbot" />
          <a href="main.php?action=recmg">返回列表</a>
          <a onclick="javascript:window.location.reload()">刷新当前页面</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html><?php }
}
