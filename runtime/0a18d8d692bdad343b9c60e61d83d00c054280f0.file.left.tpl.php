<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 22:33:24
         compiled from ".\Apps\Admin\views\left.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42995d6a8534c6b942-43709425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a18d8d692bdad343b9c60e61d83d00c054280f0' => 
    array (
      0 => '.\\Apps\\Admin\\views\\left.tpl',
      1 => 1566805059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42995d6a8534c6b942-43709425',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'items' => 0,
    'item' => 0,
    'rs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d6a8534ca6a66_80849891',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6a8534ca6a66_80849891')) {function content_5d6a8534ca6a66_80849891($_smarty_tpl) {?><dl style="margin-top:10px;">
    <dd><a href="/admin/index/welcome" hidefocus="true" target="Main">后台首页</a></dd>
</dl>
<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['items']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['item']->key;
?>
<dl>
    <dt><span><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</span><i class="icon folder-open"></i></dt>
    <?php  $_smarty_tpl->tpl_vars['rs'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rs']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rs']->key => $_smarty_tpl->tpl_vars['rs']->value) {
$_smarty_tpl->tpl_vars['rs']->_loop = true;
?>
    <dd <?php echo (is_array(0)&&is_array('style="display:none"') ? ((FALSE!==$_tempkey=array_search($_smarty_tpl->tpl_vars['item']->value['show'],0)) && array_key_exists($_tempkey,$_temparr='style="display:none"')?$_temparr[$_tempkey]:'') : ($_smarty_tpl->tpl_vars['item']->value['show']==0?'style="display:none"':''));?>
><a href="/admin/<?php echo $_smarty_tpl->tpl_vars['rs']->value['url'];?>
" hidefocus="true" target="Main"><?php echo $_smarty_tpl->tpl_vars['rs']->value['title'];?>
</a></dd>
     <?php } ?>
</dl>
<?php } ?>
<?php }} ?>
