<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 17:10:44
         compiled from ".\Apps\Admin\views\layout\group_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:246115d6a3994b24026-95510022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '63ab45beb80f2b17b54124b732befbeaa311f8f9' => 
    array (
      0 => '.\\Apps\\Admin\\views\\layout\\group_list.tpl',
      1 => 1566805040,
      2 => 'file',
    ),
    '88b69de7b0d997dd481b4cda5bcc28e873f074d4' => 
    array (
      0 => 'E:\\WWW\\puxi\\samao\\tpls\\model_list.tpl',
      1 => 1551752690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '246115d6a3994b24026-95510022',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d6a3994bc71f3_12428204',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6a3994bc71f3_12428204')) {function content_5d6a3994bc71f3_12428204($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理组</title>
<link href="/public/samaores/css/form.plane.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/list.plane.css" rel="stylesheet" type="text/css" />


<!--samao model script-->
</head>
<body>
<div class="tablebox listbox margintop">
<div class="smbox-list-title">管理组 <span id="inputbox_loading" style="display:none">正在提交中...</span></div>
<div class="smbox-list-content">


<div class="smbox-list-toptab">
<a class="samao-link-btn samao-link-btn-add" href="/admin/group/add">新增</a>
</div>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  class="smbox-list-table" id="smbox-list-table">
<tr>

<th width="50%">管理组</th>
<th width="50%">操作</th>

</tr>
<?php  $_smarty_tpl->tpl_vars['rs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rs']->_loop = false;
 $_smarty_tpl->tpl_vars['ttl'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rs']->key => $_smarty_tpl->tpl_vars['rs']->value) {
$_smarty_tpl->tpl_vars['rs']->_loop = true;
 $_smarty_tpl->tpl_vars['ttl']->value = $_smarty_tpl->tpl_vars['rs']->key;
?>
<tr  onmouseover="this.oldBgcolor=this.style.backgroundColor;this.style.backgroundColor='#FCFCF8';" onmouseout="this.style.backgroundColor=this.oldBgcolor">

<td align="center"><?php echo $_smarty_tpl->tpl_vars['rs']->value['name'];?>
</td>
<td align="center">
<a class="samao-link-minibtn" href="/admin/group/node?group=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
">管理节点</a>
<a class="samao-link-minibtn" href="/admin/group/edit?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
">编辑</a>
<a class="samao-link-minibtn" href="/admin/group/delete?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
">删除</a>
</td>

</tr>
<?php } ?>

</table>

</div>
<div class="smbox-info-tips">


</div>
</div>

</body>
</html><?php }} ?>
