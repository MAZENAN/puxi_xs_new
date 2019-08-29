<?php /* Smarty version Smarty-3.1.19, created on 2019-08-29 09:36:48
         compiled from "E:\WWW\puxi\samao\tpls\model_act.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273875d672c30c422f7-34805379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '872a0d645bb4b239cd72c21b5cb20b6a2d31a1bd' => 
    array (
      0 => 'E:\\WWW\\puxi\\samao\\tpls\\model_act.tpl',
      1 => 1551752690,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273875d672c30c422f7-34805379',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'model' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d672c30c97dc9_91693020',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d672c30c97dc9_91693020')) {function content_5d672c30c97dc9_91693020($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $_smarty_tpl->tpl_vars['model']->value->attrs['title'];?>
</title>
<link rel="stylesheet" type="text/css" href="/public/samaores/css/form.plane.css"/>
<!--samao model css-->
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.validate.js"></script>
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
<?php smarty_template_function_model_title($_smarty_tpl,array('model'=>$_smarty_tpl->tpl_vars['model']->value));?>

<div class="samao-form">
<form method="post">
<?php smarty_template_function_model_tabs($_smarty_tpl,array('model'=>$_smarty_tpl->tpl_vars['model']->value));?>

<?php smarty_template_function_model_toptip($_smarty_tpl,array('model'=>$_smarty_tpl->tpl_vars['model']->value));?>

<?php smarty_template_function_model_form($_smarty_tpl,array('model'=>$_smarty_tpl->tpl_vars['model']->value));?>

<?php smarty_template_function_model_submit($_smarty_tpl,array('model'=>$_smarty_tpl->tpl_vars['model']->value));?>

</form>
</div></div>
</body>
</html>
<?php }} ?>
