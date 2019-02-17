<?php /* Smarty version Smarty-3.1.21-dev, created on 2019-02-17 09:47:48
         compiled from "E:\htdocs\mygithub\tankcms\themes\webacp\iplvi.tpl.html" */ ?>
<?php /*%%SmartyHeaderCode:133985c68bd44b2c280-73705696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2f9d176a52e0004295bbaf1bd62fef6d03c85e0' => 
    array (
      0 => 'E:\\htdocs\\mygithub\\tankcms\\themes\\webacp\\iplvi.tpl.html',
      1 => 1419054785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133985c68bd44b2c280-73705696',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data' => 0,
    'getpagedata' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5c68bd44b99889_07111039',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5c68bd44b99889_07111039')) {function content_5c68bd44b99889_07111039($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <title>ip访问限制设置</title>
    <link href="css/main.css" rel="stylesheet" />
    <?php echo '<script'; ?>
 src="scripts/functions.js"><?php echo '</script'; ?>
>    
  </head>
  <body id="mainbox">
    <div class="layout">
      <div class="mianBaoXie">IP访问限制设置</div>
      <div class="ipCnt">
          <form method="post" action="" name="myipform">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" class="content_list">
                <tr class="tb_header">
                  <td width="100">ID</td>
                  <td>IP地址</td>
                  <td>访问限制</td>
                </tr>
                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>
                <tr class="tb_list">
                  <td align="left">
                    <input type="checkbox" name="eng_id[]" id="eng_id[]" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
" />
                    <?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['id'];?>
</td>
                  <td align="left"><?php echo $_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['ipaddress'];?>
</td>
                  <td align="left" width="120"><?php if ($_smarty_tpl->tpl_vars['data']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]['iptype']=='1') {?>允许访问<?php } else { ?><font color="#FF0000">禁止访问</font><?php }?></td>
                </tr>
                <?php endfor; else: ?>
                <tr class="tb_list">
                  <td align="left" colspan="3">没有记录！</td>
                </tr>
                <?php endif; ?>
              </table>
              <div class="cz">选择你的操作：<a onclick="javascript:window.location.reload()">刷新当前页面</a><a onclick="javascript:alls('eng_id[]')">全选</a>/<a onclick="javascript:resets('eng_id[]')">反选</a>
                <input type="submit" name="iplvidel" value="删除选中项" id="logc" />                
                <input type="submit" name="iplvino" value="禁止选中项" id="logc" />                
                <input type="submit" name="iplviok" value="允许选中项" id="logc" />                
                <a onclick="javascript:addIp()">添加IP</a>
              </div>
              <div class="fenye"><?php echo $_smarty_tpl->tpl_vars['getpagedata']->value;?>
</div>
              <div class="clear"></div>
          </form>
      </div>
      <div class="addip" id="addip" style="display:none;">
        <form method="post" action="" name="addIpForm" onsubmit="return check(addIpForm)">
          <input type="text" name="adp" />
          <select name="iplx"><option value="0">禁止访问</option><option value="1">授权访问</option></select>
          <input type="submit" name="addip" value="提交" id="ipadd" /><input type="reset" name="rst" value="清除"  id="ipadd" /><a onclick="closeDiv()">取消操作</a>
        </form>
      </div>
    </div>
    <?php echo '<script'; ?>
>
      function addIp(){
        var ipDiv=document.getElementById("addip");
        ipDiv.style.display='block';
      }
      function closeDiv(){
        var ipDiv=document.getElementById("addip");
        ipDiv.style.display='none';
      }
      function check(myform){
        var str = myform.adp.value;
        //alert(str);
        var strlength= str.length;
        if(strlength <1){
          alert("输入的内容不能为空");
          myform.adp.focus();
          return false;
        }else{
          if(strlength>15||strlength <7)          //IP的字段长度的限制
          {
            alert("您输入的IP长度不正确，必须是7到15位");
            myform.adp.focus();
            return false;
          }
          var patrn =/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/;//正则表达式，\d为数字,{1,3}一位或为三位.
          if(!patrn.exec(str)){
            alert("您输入的IP格式不正确，必须是000.000.000.000格式");
            myform.adp.focus();
            return false;
          }
          var laststr;
          laststr= str.split(".");    //用.把字符串str分开
          var last_patrn=/^\d{1,3}$/;
          if(parseInt(laststr[0])>255||parseInt(laststr[1])>255||parseInt(laststr[2])>255||parseInt(laststr[3])>255) //判断IP每位的大小
          {
            alert("您输入的IP范围不正确，必须是0~255之间");
            myform.adp.focus();
            return false;
          }
          if(!last_patrn.exec(laststr[3]))
          {
            alert("您输入的IP格式不正确，必须是000.000.000.000格式");
            myform.adp.focus();
            return false;
          }
          return true;
        }
      }
    <?php echo '</script'; ?>
>
  </body>
</html><?php }} ?>
