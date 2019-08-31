<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 22:33:19
         compiled from ".\Apps\Admin\views\layout\periodical_category_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312285d6a852f353a65-33664027%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db4f5efb0b6eab831abeb42d63b87f0b8f0109c7' => 
    array (
      0 => '.\\Apps\\Admin\\views\\layout\\periodical_category_list.tpl',
      1 => 1566916056,
      2 => 'file',
    ),
    '88b69de7b0d997dd481b4cda5bcc28e873f074d4' => 
    array (
      0 => 'E:\\WWW\\puxi\\samao\\tpls\\model_list.tpl',
      1 => 1551752690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312285d6a852f353a65-33664027',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rows' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d6a852f3ecfa3_96734943',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6a852f3ecfa3_96734943')) {function content_5d6a852f3ecfa3_96734943($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>期刊分类</title>
<link href="/public/samaores/css/form.plane.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/list.plane.css" rel="stylesheet" type="text/css" />


<!--samao model script-->
</head>
<body>
<div class="tablebox listbox margintop">
<div class="smbox-list-title">期刊分类 <span id="inputbox_loading" style="display:none">正在提交中...</span></div>
<div class="smbox-list-content">


<div class="smbox-list-toptab">
    <a href="/admin/periodical_category/add" class="samao-link-btn samao-link-btn-add">新增分类</a>&nbsp;&nbsp;
    <form method='get'>
        <?php echo FormBox::select(array('header'=>'分类','options'=>DB::getopts('@pf_periodical_category','id,title',0,"pid=0"),'style'=>"width:100px;",'onchange'=>'this.form.submit();','value'=>((string)$_smarty_tpl->tpl_vars['id']->value),'name'=>"id",),$_smarty_tpl->tpl_vars['model']->value);?>&nbsp;&nbsp;
    </form>
</div>

<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  class="smbox-list-table" id="smbox-list-table">
<tr>

<th width="%10">ID</th>
<th width="%10">分类名</th>
<th width="%10">排序</th>
<th width="%10">是否启用</th>
<th width="180">操作</th>

</tr>
<?php  $_smarty_tpl->tpl_vars['rs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rs']->_loop = false;
 $_smarty_tpl->tpl_vars['ttl'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rs']->key => $_smarty_tpl->tpl_vars['rs']->value) {
$_smarty_tpl->tpl_vars['rs']->_loop = true;
 $_smarty_tpl->tpl_vars['ttl']->value = $_smarty_tpl->tpl_vars['rs']->key;
?>
<tr  onmouseover="this.oldBgcolor=this.style.backgroundColor;this.style.backgroundColor='#FCFCF8';" onmouseout="this.style.backgroundColor=this.oldBgcolor">

<form method="post">
    <input name="id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
" />
    <input name="action" type="hidden" value="editsort" />
    <td align="center"><?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['rs']->value['title'];?>
</td>
    <td align="center"><?php echo FormBox::digits(array('name'=>'sort','class'=>"form-control digits",'value'=>$_smarty_tpl->tpl_vars['rs']->value['sort'],'style'=>'width:40px;',));?>
        <input class="samao-mini-btn-change" title="修改" type="button" onclick="this.form.submit();" />
        <a href="/admin/periodical_category/upsortbypid?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
" class="up">上移</a>  <a href="/admin/periodical_category/dnsortbypid?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
" class="down">下移</a></td>
    <td align="center"><?php echo ($_smarty_tpl->tpl_vars['rs']->value['allow']==1?'<img src="/public/samaores/images/yes.gif" />':'<img src="/public/samaores/images/no.gif" />');?>
</td>
    <td align="center">
        <?php if ($_smarty_tpl->tpl_vars['rs']->value['allow']==0) {?><a href="/admin/periodical_category/seton_allow?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
">启用</a> |
        <?php } else { ?><a onclick="return confirm('确定要关闭该菜单吗？');" href="/admin/periodical_category/setoff_allow?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
">关闭</a> |
        <?php }?>
        <a href="/admin/periodical_category/edit?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
">编辑</a> |
        <a onclick="return confirm('确定要删除该菜单吗？一旦删除将无法恢复，请谨慎操作！');" href="/admin/periodical_category/delete?id=<?php echo $_smarty_tpl->tpl_vars['rs']->value['id'];?>
">删除</a>
    </td>
</form>

</tr>
<?php } ?>

</table>

</div>
<div class="smbox-info-tips">


</div>
</div>

</body>
</html><?php }} ?>
