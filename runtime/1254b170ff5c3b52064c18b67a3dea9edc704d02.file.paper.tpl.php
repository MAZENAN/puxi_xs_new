<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:44:42
         compiled from ".\Apps\Home\views\paper.tpl" */ ?>
<?php /*%%SmartyHeaderCode:65985d6a79caf37a39-44304755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1254b170ff5c3b52064c18b67a3dea9edc704d02' => 
    array (
      0 => '.\\Apps\\Home\\views\\paper.tpl',
      1 => 1567258673,
      2 => 'file',
    ),
    '6dbd9eb7f662b4a53b788479749f2f1ab8de17cb' => 
    array (
      0 => '.\\Apps\\Home\\views\\libs\\layout1.tpl',
      1 => 1567255089,
      2 => 'file',
    ),
    '5a79c665eecc3fa21c92d91e5c40b6cac9fcfcbb' => 
    array (
      0 => '.\\Apps\\Home\\views\\libs\\header.tpl',
      1 => 1567254631,
      2 => 'file',
    ),
    'da3aa1759d4b74d8766b6ba3a5a0793d73ca4936' => 
    array (
      0 => '.\\Apps\\Home\\views\\libs\\footer.tpl',
      1 => 1567243677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '65985d6a79caf37a39-44304755',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d6a79cb094603_86426908',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6a79cb094603_86426908')) {function content_5d6a79cb094603_86426908($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_minimg')) include 'E:\\WWW\\puxi\\samao\\smarty\\ext\\plugins\\modifier.minimg.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>普西学术</title>
	<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon" />
	<script src="/public/js/jquery-3.3.1.min.js"></script>
	
<link rel="stylesheet" href="/public/css/home/reset.css">
<link rel="stylesheet" href="/public/css/home/header.css"><!--头部样式-->
<link rel="stylesheet" href="/public/css/home/footer.css"><!--底部样式-->
<link rel="stylesheet" href="/public/css/home/paperCon.css">

</head>
<body>

<div id="app">
    <?php /*  Call merged included template "libs/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '65985d6a79caf37a39-44304755');
content_5d6a79cb04e520_59198562($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/header.tpl" */?>
    <main>
        <h1 class="h_title keyword1"><?php echo $_smarty_tpl->tpl_vars['paper']->value['title'];?>
</h1>
        <div class="nav_list">
            <img class="xiazia_gif" src="/public/images/home/timg.gif" ><div id="xiazai" ><span class="login shouzhi"> <?php if (!empty($_smarty_tpl->tpl_vars['user']->value['id'])||!empty($_smarty_tpl->tpl_vars['user']->value['name'])) {?><a href="<?php echo $_smarty_tpl->tpl_vars['domain']->value;?>
<?php echo $_smarty_tpl->tpl_vars['paper']->value['file'];?>
">PDF点击下载</a> <?php } else { ?> <a href="/login/index.html">登录下载</a> <?php }?></span></div>
        </div>
        <ul class="ul_zhaiyao">
            <li> 【作者】 <br> <span> <?php echo $_smarty_tpl->tpl_vars['paper']->value['authors'];?>
</span></li>
            <li>【摘要】 <span> <?php echo $_smarty_tpl->tpl_vars['paper']->value['abstract'];?>
 </span></li>
            <li>

                <?php if (!empty($_smarty_tpl->tpl_vars['user']->value['id'])||!empty($_smarty_tpl->tpl_vars['user']->value['name'])) {?>
                【收藏】
                <?php if ($_smarty_tpl->tpl_vars['collect']->value) {?>
                <a href="javascript:;" onclick="unCollect(<?php echo $_smarty_tpl->tpl_vars['paper']->value['id'];?>
)" id="collect_fun"><span class="sc_box shoucang">
                            <img src="/public/images/icon/sc0.png" alt="已收藏" id="col_img">
                   <?php } else { ?>
                       <a href="javascript:;" onclick="collect(<?php echo $_smarty_tpl->tpl_vars['paper']->value['id'];?>
)" id="collect_fun"><span class="sc_box shoucang">
                       <img src="/public/images/icon/sc1.png" alt="未收藏" id="col_img">
                      <?php }?>
                    <?php } else { ?>
                       【登录收藏】
                       <a href="/login/index.html" ><span class="sc_box shoucang">
                       <img src="/public/images/icon/sc1.png" alt="登录收藏" id="col_img">
                    </span></a>
                <?php }?>
            </li>
        </ul>
        <div class="nav_list">

            <div> <img src="/public/images/icon/sprite.png" alt="加载失败"><span class="shouzhi">内容预览</span></div>

        </div>
        <div class="img_con">
            <?php  $_smarty_tpl->tpl_vars['preview'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['preview']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paperImgs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['preview']->key => $_smarty_tpl->tpl_vars['preview']->value) {
$_smarty_tpl->tpl_vars['preview']->_loop = true;
?>
            <img src="<?php echo smarty_modifier_minimg($_smarty_tpl->tpl_vars['preview']->value,40,80,1);?>
" alt="《<?php echo $_smarty_tpl->tpl_vars['paper']->value['title'];?>
》论文预览图"><br>
            <?php } ?>
        </div>

    </main>
    <?php /*  Call merged included template "libs/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '65985d6a79caf37a39-44304755');
content_5d6a79cb08a709_02945797($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/footer.tpl" */?>
</div>

<script>
    function collect(pid){
        $.ajax({
            url:'/paper/collect.html',
            type:'post',
            data:{id:pid},
            success:function(result){
                if (result.code==1) {
                    $("#col_img").attr('src','/public/images/icon/sc0.png')
                    $("#collect_fun").attr('onclick','unCollect(<?php echo $_smarty_tpl->tpl_vars['paper']->value['id'];?>
)')
                }
            }
        })
    }
    function unCollect(pid){
        $.ajax({
            url:'/paper/unCollect.html',
            type:'post',
            data:{id:pid},
            success:function(result){
                if (result.code==1) {
                    $("#col_img").attr('src','/public/images/icon/sc1.png')
                    $("#collect_fun").attr('onclick','collect(<?php echo $_smarty_tpl->tpl_vars['paper']->value['id'];?>
)')
                }
            }
        })
    }
</script>


<script>
	function search(){
		var searchText=$("input[name='key']").val()
		searchText = searchText.trim()
		if(searchText.length==0){
			alert("输入的内容不能为空");
			return;
		}
		/*跳转传值*/
		var searchUrl = '/search/index.html?words=' //使用encodeURI编码
		location.href = searchUrl+encodeURIComponent(searchText);
	}
	$("#headerbtn").click(function (){
		search();
	})
	/*隐藏显示*/
	$(".us_img").click(function (){
		$(".contact_us").css("display","none")
	})
	$(".tougao").click(function(){
		$(".contact_us").css("display","block")
	})
</script>
</body>
</html><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:44:43
         compiled from ".\Apps\Home\views\libs\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a79cb04e520_59198562')) {function content_5d6a79cb04e520_59198562($_smarty_tpl) {?><header id="header">
	<div class="header">
		<div class="logo">
			<a href="/"> <img src="/public/images/home/logohen.png" alt=""></a>
		</div>
		<div class="lists">
			<div class="title_list">
				<a href="/index/index.html">首页</a>
				<a href="/user/collect.html" id="shoucang">订阅收藏</a>
				<a href="#" class="tougao" >立即投稿</a>
				<a href="/about/index.html">关于我们</a>
			</div>

		</div>
		<div class="search">
			<div>
				<input type="text" placeholder="请输入搜索的内容" name="key" value="<?php echo $_smarty_tpl->tpl_vars['word']->value;?>
"> <button class="btn" id="headerbtn">搜索</button>
			</div>

		</div>


		<?php if (empty($_smarty_tpl->tpl_vars['user']->value['id'])||empty($_smarty_tpl->tpl_vars['user']->value['name'])) {?>
		<div class="login denglu">
			<div>
				<a href="/login/index.html">快速登录</a>
				<!--<a href="/account/register.html">注册</a>-->
			</div>
		</div>
		<?php } else { ?>
		<div class="welcome huanying">
			<div>
				<span class="sessname"><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
</span> <a id="zhuxiao" href="/login/out.html">注销</a>
			</div>

		</div>
		<?php }?>
	</div>
	<div class="he_top"> </div>
	<div class="contact_us">
		<img class="us_img" src="/public/images/icon/guanbi.png" alt="">
		<p>电话：<?php echo $_smarty_tpl->tpl_vars['customer']->value['tel'];?>
</p>

		<p>咨询微信：<?php echo $_smarty_tpl->tpl_vars['customer']->value['weixin'];?>
</p>
		<!-- <p>投稿邮箱：88888888@qq.com </p> -->


	</div>
</header><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:44:43
         compiled from ".\Apps\Home\views\libs\footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a79cb08a709_02945797')) {function content_5d6a79cb08a709_02945797($_smarty_tpl) {?><footer id="footer">
    <div class="footer1">
        <div class="guanyu">
            <h2>关于我们</h2>
            <p>普西学术集成海量学术资源，为科研工作者提供，全面快捷的学术服务。</p>
            <p>在这里我们保持学习的态度，不忘初心，砥砺前行。</p>
            <a href="/about/index.html">了解更多>>>></a>
        </div>
        <div class="lianxi">
            <h3>联系我们</h3>
            <span class="lianxi_img">
                            <br>
                <!-- <a href="#"> <img src="./image/weixin.png" alt=""></a>
                <a href="#"> <img src="./image/QQ.png" alt=""></a>
                <a href="#"> <img src="./image/weibo.png" alt=""></a> -->
                   		<p>电话：<?php echo $_smarty_tpl->tpl_vars['customer']->value['tel'];?>
</p>

		<p>咨询微信：<?php echo $_smarty_tpl->tpl_vars['customer']->value['weixin'];?>
</p>

                    </span>
        </div>
    </div>
    <div class="footer2">
        <span><?php echo $_smarty_tpl->tpl_vars['config']->value['keep'];?>
</span>
    </div>
</footer><?php }} ?>
