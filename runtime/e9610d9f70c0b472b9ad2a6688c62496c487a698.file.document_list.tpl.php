<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 22:33:30
         compiled from ".\Apps\Admin\views\layout\document_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:109125d6a853a806818-80525463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9610d9f70c0b472b9ad2a6688c62496c487a698' => 
    array (
      0 => '.\\Apps\\Admin\\views\\layout\\document_list.tpl',
      1 => 1567261255,
      2 => 'file',
    ),
    '88b69de7b0d997dd481b4cda5bcc28e873f074d4' => 
    array (
      0 => 'E:\\WWW\\puxi\\samao\\tpls\\model_list.tpl',
      1 => 1551752690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109125d6a853a806818-80525463',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d6a853a8a9d66_08647299',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6a853a8a9d66_08647299')) {function content_5d6a853a8a9d66_08647299($_smarty_tpl) {?><?php if (!is_callable('smarty_function_pagebar')) include 'E:\\WWW\\puxi\\samao\\smarty\\ext\\plugins\\function.pagebar.php';
?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>期刊文档</title>
<link href="/public/samaores/css/form.plane.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/list.plane.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>

<!--samao model script-->
</head>
<body>
<div class="tablebox listbox margintop">
<div class="smbox-list-title">期刊文档 <span id="inputbox_loading" style="display:none">正在提交中...</span></div>
<div class="smbox-list-content">


<div class="smbox-list-toptab">
    <form method="get" id="target-form">
        <a class="samao-link-btn samao-link-btn-add" href="/admin/document/add?periodical_id=<?php echo IGet('periodical_id');?>
">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
    </form>
</div>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  class="smbox-list-table" id="smbox-list-table">
<tr>

<th width="10%">ID</th>
<th width="10%">期刊年份</th>
<th width="10%">期刊期数</th>
<th width="10%">文档备注</th>
<th width="10%">是否启用</th>
<th width="10%">所属期刊</th>

<th width="30%">操作</th>

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
<td align="center"><?php echo $_smarty_tpl->tpl_vars['rs']->value['year'];?>
</td>
<td align="center"><?php echo $_smarty_tpl->tpl_vars['rs']->value['phase'];?>
</td>
<td align="center"><?php echo $_smarty_tpl->tpl_vars['rs']->value['note'];?>
</td>
<td align="center"><?php echo ($_smarty_tpl->tpl_vars['rs']->value['allow']==1?'<img src="/public/samaores/images/yes.gif" />':'<img src="/public/samaores/images/no.gif" />');?>
</td>
<td align="center"><?php echo (($tmp = @DB::getval('@pf_periodical','title',$_smarty_tpl->tpl_vars['rs']->value['periodical_id']))===null||$tmp==='' ? '--' : $tmp);?>
</td>

<td align="center">
    <a dialog="1" class="samao-link-minibtn" href="/admin/periodical_catalog?document_id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
">目录管理</a>
    <a dialog="1" class="samao-link-minibtn" href="/admin/periodical_paper?document_id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
&periodical_id=<?php echo IGet('periodical_id');?>
">期刊论文</a>
    <a class="samao-link-minibtn" href="/admin/document/edit?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
">编辑</a>
    <a class="samao-link-minibtn" href="/admin/document/set<?php if ($_smarty_tpl->tpl_vars['rs']->value['allow']==1) {?>off<?php } else { ?>on<?php }?>_allow?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['rs']->value['allow']==0) {?>上架<?php } else { ?>下架<?php }?></a>
    <a onclick="return confirm('确定要删除吗？一旦删除将无法恢复，请谨慎操作！');" class="samao-link-minibtn" href="/admin/document/delete?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
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
