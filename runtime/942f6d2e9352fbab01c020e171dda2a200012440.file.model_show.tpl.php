<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 17:14:22
         compiled from "E:\WWW\puxi\samao\tpls\model_show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:250585d6a3a6e90a5b3-74936643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '942f6d2e9352fbab01c020e171dda2a200012440' => 
    array (
      0 => 'E:\\WWW\\puxi\\samao\\tpls\\model_show.tpl',
      1 => 1551752690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '250585d6a3a6e90a5b3-74936643',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d6a3a6e956153_84325781',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6a3a6e956153_84325781')) {function content_5d6a3a6e956153_84325781($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['model']->value->attrs['title'];?>
</title>
<link rel="stylesheet" type="text/css" href="/public/samaores/css/form.plane.css"/>
<!--samao model css-->
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<?php if ($_smarty_tpl->tpl_vars['model']->value->attrs['istab']&&!$_smarty_tpl->tpl_vars['model']->value->attrs['tabsplit']) {?>
<script type="text/javascript" src="/public/samaores/js/samao.model.tabs.js"></script>
<?php }?>
<!--samao model script-->
</head>
<body>
<?php if ($_smarty_tpl->tpl_vars['model']->value->usehtml) {?>
<?php echo $_smarty_tpl->getSubTemplate ("modeltpl:".((string)$_smarty_tpl->tpl_vars['model']->value->name), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }?>
<?php echo $_smarty_tpl->getSubTemplate ("modelskin:default", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="samao-body">
<div class="form-title"><span style="float:left"><?php echo $_smarty_tpl->tpl_vars['model']->value->attrs['title'];?>
</span></div>
<div class="samao-form">
<?php smarty_template_function_model_tabs($_smarty_tpl,array('model'=>$_smarty_tpl->tpl_vars['model']->value));?>

<?php smarty_template_function_model_toptip($_smarty_tpl,array('model'=>$_smarty_tpl->tpl_vars['model']->value));?>

<?php smarty_template_function_model_form($_smarty_tpl,array('model'=>$_smarty_tpl->tpl_vars['model']->value));?>

</div></div>
</body>
</html>
<?php }} ?>
