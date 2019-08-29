<?php /* Smarty version Smarty-3.1.19, created on 2019-08-29 08:13:15
         compiled from ".\Apps\Admin\views\layout\member_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107765d67189ba58417-80364331%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85483bb6a2909b5102fa414b40b41039001301ee' => 
    array (
      0 => '.\\Apps\\Admin\\views\\layout\\member_list.tpl',
      1 => 1566805060,
      2 => 'file',
    ),
    '88b69de7b0d997dd481b4cda5bcc28e873f074d4' => 
    array (
      0 => 'E:\\WWW\\puxi\\samao\\tpls\\model_list.tpl',
      1 => 1551752690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107765d67189ba58417-80364331',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d67189bb13f71_82101899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d67189bb13f71_82101899')) {function content_5d67189bb13f71_82101899($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'E:\\WWW\\puxi\\samao\\smarty\\libs\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_function_pagebar')) include 'E:\\WWW\\puxi\\samao\\smarty\\ext\\plugins\\function.pagebar.php';
?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?>会员列表<?php } else { ?>讲师列表<?php }?></title>
<link href="/public/samaores/css/form.plane.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/list.plane.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
<script type="text/javascript" src="/public/js/clipboard.min.js"></script>

<!--samao model script-->
</head>
<body>
<div class="tablebox listbox margintop">
<div class="smbox-list-title"><?php if ($_smarty_tpl->tpl_vars['type']->value==1) {?>会员列表<?php } else { ?>讲师列表<?php }?> <span id="inputbox_loading" style="display:none">正在提交中...</span></div>
<div class="smbox-list-content">


<div class="smbox-list-toptab">
<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
<form method="get">
<a class="samao-link-btn samao-link-btn-add" href="/admin/member/add?type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
手机号：<?php echo FormBox::text(array('style'=>"width:120px",'name'=>"mobile",),$_smarty_tpl->tpl_vars['schmodel']->value);?>&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo FormBox::hidden(array('style'=>"width:120px",'name'=>"type",),$_smarty_tpl->tpl_vars['schmodel']->value);?>&nbsp;&nbsp;&nbsp;&nbsp;

<input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>
<input type="hidden" name="type" value="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
</form>
</div>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  class="smbox-list-table" id="smbox-list-table">
<tr>

<?php if ($_smarty_tpl->tpl_vars['type']->value==3) {?>
<style>
.smbox-list-content{ width:100%;}
</style>
<?php }?>

<th width="80">ID</th>

<th width="80">昵称</th>
<th width="80">手机号码</th> 	
<th width="80">城市</th>		
<th width="100">备注</th>
<th width="80">状态</th>
<th width="80">最近登陆</th>
<th width="240">操作</th>

</tr>
<?php  $_smarty_tpl->tpl_vars['rs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rs']->_loop = false;
 $_smarty_tpl->tpl_vars['ttl'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rs']->key => $_smarty_tpl->tpl_vars['rs']->value) {
$_smarty_tpl->tpl_vars['rs']->_loop = true;
 $_smarty_tpl->tpl_vars['ttl']->value = $_smarty_tpl->tpl_vars['rs']->key;
?>
<tr  onmouseover="this.oldBgcolor=this.style.backgroundColor;this.style.backgroundColor='#FCFCF8';" onmouseout="this.style.backgroundColor=this.oldBgcolor">

<td align="center"><?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
</td>
<td align="center"><?php echo $_smarty_tpl->tpl_vars['rs']->value['nickname'];?>
</td>
<td align="center"><?php echo DB::getval('@pf_area','name',$_smarty_tpl->tpl_vars['rs']->value['province']);?>
 <?php echo DB::getval('@pf_area','name',$_smarty_tpl->tpl_vars['rs']->value['city']);?>
</td>
<td align="center"><?php echo $_smarty_tpl->tpl_vars['rs']->value['mobile'];?>
</td>
<td align="center"><?php echo $_smarty_tpl->tpl_vars['rs']->value['remark'];?>
</td>
<td align="center"><?php echo ((FALSE!==$_tempkey=array_search($_smarty_tpl->tpl_vars['rs']->value['status'],array(0,1,2,3))) && array_key_exists($_tempkey,$_temparr=array('未认证','认证中','已认证'))?$_temparr[$_tempkey]:'');?>
</td>

<td align="center"><?php echo smarty_modifier_date_format(strtotime($_smarty_tpl->tpl_vars['rs']->value['last_login_time']),'Y-m-d');?>
</td>
<td align="center">
<a class="samao-link-minibtn" href="/admin/member/edit?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
&type=<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">编辑</a>
<a onclick="return confirm('确定要删除该用户吗？一旦删除将无法恢复，请谨慎操作！');" class="samao-link-minibtn" href="/admin/member/delete?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
">删除</a>
</td>

</tr>
<?php } ?>

</table>

<div class="samao-pagebar"><?php echo smarty_function_pagebar(array('pdata'=>$_smarty_tpl->tpl_vars['bar']->value),$_smarty_tpl);?>
</div>

</div>
<div class="smbox-info-tips">


</div>
</div>

</body>
</html><?php }} ?>
