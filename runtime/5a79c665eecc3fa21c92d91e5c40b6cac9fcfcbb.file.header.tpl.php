<?php /* Smarty version Smarty-3.1.19, created on 2019-08-28 14:38:06
         compiled from ".\Apps\Home\views\libs\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:285985d66214e8af154-41101442%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a79c665eecc3fa21c92d91e5c40b6cac9fcfcbb' => 
    array (
      0 => '.\\Apps\\Home\\views\\libs\\header.tpl',
      1 => 1551752703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '285985d66214e8af154-41101442',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'column' => 0,
    'col' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d66214e8d9f69_12194306',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d66214e8d9f69_12194306')) {function content_5d66214e8d9f69_12194306($_smarty_tpl) {?><!-------导航开始------>
<div class="home-container">
	<div class="follow-header">
		<ul class="header-share">

			<li>
				<a href="">
					<img src="../../../../public/images/footer_icon/wechat_icon.png" alt="">
				</a>
			</li>
			<li>
				<a href="">
					<img src="../../../../public/images/footer_icon/sina_icon.png" alt="">
				</a>
			</li>
			<li>
				<a href="">
					<img src="../../../../public/images/footer_icon/twitter_icon.png" alt="">
				</a>
			</li>
			<li>
				<a href="">
					<img src="../../../../public/images/footer_icon/in_icon.png" alt="">
				</a>
			</li>
			<li class="follow-title">
				FOLLOW/US
			</li>
		</ul>
	</div>
	<!--头部导航栏容器-->
	<div class="header-container">
		<!--搜索框-->
		<div class="search-container">
			<input class="search-input" type="" name="" id="" value="" placeholder="请输入关键字" />
			<input type="submit" class="search-icon" name="" id="" value="" style="background: url('../../../public/images/search_icon.png');background-size: cover;" />
			<!--<img class="search-icon" src="../../../public/images/search_icon.png" />-->
		</div>
		<div class="header-content">
			<!--其它页logo显示-->
			<?php if (!empty($_GET['column_id'])||!empty($_GET['article_id'])) {?>
			<div class="other-logo">
				<a style="cursor:default" class="logo-content" href="/index/index.html"><img style="cursor:pointer" class="logo-img-other" src="../../../public/images/logo.png" /></a>
			</div>
			<?php }?>
			<nav class="navbar navbar-default add-navbar">
				
				<div class="container-fluid">
					<div class="navbar-header">
						<!--主页小屏显示logo，其它页面不显示-->
                        <?php if (empty($_GET['column_id'])&&empty($_GET['article_id'])) {?>
						<div class="logo-container">
							<a href="/index/index.html"><img class="s-logo-img" src="../../../public/images/logo.png" /></a>
						</div>
						<?php }?>
						<button type="button" class="navbar-toggle collapsed s-nav-btn" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
                    </button>

					</div>

					<!--导航条-->
					<div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
						<ul class="nav nav-center">
							<?php  $_smarty_tpl->tpl_vars['col'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['col']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['column']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['col']->key => $_smarty_tpl->tpl_vars['col']->value) {
$_smarty_tpl->tpl_vars['col']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['col']->key;
?>
							<li>
								<a data-index="1" href="<?php echo $_smarty_tpl->tpl_vars['col']->value['url'];?>
?column_id=<?php echo $_smarty_tpl->tpl_vars['col']->value['id'];?>
" <?php if ($_GET['column_id']==$_smarty_tpl->tpl_vars['col']->value['id']) {?>class="header-choose-font-family" <?php } else { ?> class="header-default-font-family" <?php }?>><?php echo $_smarty_tpl->tpl_vars['col']->value['title'];?>
</a>
								<div class="choose-line" style="display:<?php if ($_GET['column_id']==$_smarty_tpl->tpl_vars['col']->value['id']) {?>block<?php } else { ?>none<?php }?>;"><span></span></div>
							</li>
							<?php } ?>

						</ul>
					</div>
				</div>
			</nav>
			<!--导航条上的搜索-->
			<div>
				<img class="nav-search-icon" src="../../../public/images/search_icon.png" />
			</div>
			<div>
				<img class="search-close-icon" src="../../../public/images/close_search.png" />
			</div>
		</div>
	</div>

	<!--主页logo显示，其它页面不显示-->
    <?php if (empty($_GET['column_id'])&&empty($_GET['article_id'])) {?>
	<div class="logo-container">
		<a style="cursor:default" class="logo-content" href="/index/index.html"><img style="cursor:pointer" class="logo-img" src="../../../public/images/logo.png" /></a>
	</div>
    <?php }?>
</div>
<script type="text/javascript">
	//	搜索事件
	$(".nav-search-icon").on('click', function() {
		$(".search-container").animate({
			height: 'toggle'
		});
		$('.search-close-icon').show()
		$('.nav-search-icon').hide()
	})
	$(".search-close-icon").on('click', function() {
		$(".search-container").animate({
			height: 'toggle'
		});
		$('.nav-search-icon').show()
		$('.search-close-icon').hide()
	})
	$('.search-icon').on('click',function() {
		let searchKey = $('.search-input').val();
		console.log('搜索关键字：',searchKey)
		if( searchKey != '' ) {
			//跳转到搜索结果页result
			window.location.href=`/index/jump.html?search_key=${searchKey}`;
		}
	}) 
	//	导航栏
	console.log($('.nav-center>li').find(this))
	$('.nav-center>li').on('click', function() {
		$(this).find('a').css('background-color', '#FFFFFF'); //改变默认背景色
		$(this).find('.choose-line').css('display', 'block');
		$(this).siblings('.nav-center>li').find('.choose-line').css('display', 'none');
		$(this).find('a').addClass('header-choose-font-family').removeClass('header-default-font-family');
		$(this).siblings('.nav-center>li').find('a').removeClass('header-choose-font-family').addClass('header-default-font-family');
	})
	//	导航栏滚动事件

	$(window).scroll(function() {
		//		console.log($(window).scrollTop())
		if($(window).scrollTop() >= 45) {
			//			$(".header-container").addClass("nav-container");
			//			$('.header-content').addClass("add-nav-content");
			//			$('.navbar-collapse').addClass("add-nav-content");
			//			$('.navbar-default').addClass("add-nav-content");
			//			$('.container-fluid').addClass("add-nav-content");
			//			$('.nav-center').addClass("add-nav-content");

		} else {
			$(".header-container").removeClass("nav-container");

		}
	});
</script><?php }} ?>
