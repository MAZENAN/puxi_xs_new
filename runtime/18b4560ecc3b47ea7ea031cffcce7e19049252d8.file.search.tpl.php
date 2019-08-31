<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:44:18
         compiled from ".\Apps\Home\views\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140975d6a79b285e3a2-13253325%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18b4560ecc3b47ea7ea031cffcce7e19049252d8' => 
    array (
      0 => '.\\Apps\\Home\\views\\search.tpl',
      1 => 1567259057,
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
  'nocache_hash' => '140975d6a79b285e3a2-13253325',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d6a79b28fe4b7_23343851',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6a79b28fe4b7_23343851')) {function content_5d6a79b28fe4b7_23343851($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_minimg')) include 'E:\\WWW\\puxi\\samao\\smarty\\ext\\plugins\\modifier.minimg.php';
if (!is_callable('smarty_function_pagebar')) include 'E:\\WWW\\puxi\\samao\\smarty\\ext\\plugins\\function.pagebar.php';
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
<link rel="stylesheet" href="/public/css/home/search.css">
<link href="/public/samaores/css/form.plane.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/list.plane.css" rel="stylesheet" type="text/css" />

</head>
<body>

<?php /*  Call merged included template "libs/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '140975d6a79b285e3a2-13253325');
content_5d6a79b28b6020_44183729($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/header.tpl" */?>
<main>
    <!--
    <div class="time-first">
        <ul class="year_ul">
            <li>
                <a href="#">

                </a>
                <span class="span-title">时间</span>

            </li>
            <li>
                <a href="#">
                    2018以来
                    <span class="span-Second">(1.2万)</span>
                </a>
            </li>
            <li>
                <a href="#">
                    2017以来
                    <span class="span-Second">(9.3万)</span>
                </a>
            </li>
            <li>
                <a href="#">
                    2016以来
                    <span class="span-Second">(19.3万)</span>
                </a>
            </li>
            <li>
                <input type="text" placeholder="年">-
                <input type="text" placeholder="年">
                <button type="button" class="btn btn-default">确认</button>
            </li>
        </ul>
    </div>
-->
    <div class="leibiao">

        <!-- 期刊类表 -->
        <?php if ($_smarty_tpl->tpl_vars['periodical']->value) {?>
        <div class="qikan_box">
            <a href="/journal/detail.html?id=<?php echo $_smarty_tpl->tpl_vars['periodical']->value['id'];?>
"> <img class="qikan_img" src="<?php echo smarty_modifier_minimg($_smarty_tpl->tpl_vars['periodical']->value['cover'],40,80,1);?>
" alt="" target="_blank"></a>
            <ul class="title_box">
                <li><a href="/journal/detail.html?id=<?php echo $_smarty_tpl->tpl_vars['periodical']->value['id'];?>
" target="_blank"><h1>《<?php echo $_smarty_tpl->tpl_vars['periodical']->value['title'];?>
》</h1> </a> </li>
                <li>出版日期 : <?php echo $_smarty_tpl->tpl_vars['periodical']->value['establish_at'];?>
年</li>
                <li>出版周期：<?php echo Comm::getCycle($_smarty_tpl->tpl_vars['periodical']->value['cycle']);?>
 </li>
                <li>主办单位:<?php echo $_smarty_tpl->tpl_vars['periodical']->value['sponsor_unit'];?>
</li>
            </ul>
        </div>
        <?php }?>
        <!-- 论文列表-->
        <span class="tiaoshu">论文找到约<?php echo $_smarty_tpl->tpl_vars['bar']->value['records_count'];?>
条相关结果</span>
        <?php  $_smarty_tpl->tpl_vars['paper'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paper']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['papers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paper']->key => $_smarty_tpl->tpl_vars['paper']->value) {
$_smarty_tpl->tpl_vars['paper']->_loop = true;
?>
        <div class="lunwen_box">
            <div class="right-text">
                <h3 class="h3_title">
                    <a href="/paper/index.html?id=<?php echo $_smarty_tpl->tpl_vars['paper']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['paper']->value['title'];?>
</a>
                </h3>
                <p class="p_title">
                    <?php echo $_smarty_tpl->tpl_vars['paper']->value['abstract'];?>

                </p>
                <p>
                    <?php echo $_smarty_tpl->tpl_vars['paper']->value['authors'];?>
  -  《<?php echo (($tmp = @DB::getval('@pf_periodical','title',$_smarty_tpl->tpl_vars['paper']->value['periodical_id']))===null||$tmp==='' ? '--' : $tmp);?>
》
                </p>
            </div>
        </div>
        <?php } ?>
        <!-- 论文列表end-->
    </div>

</main>
<!-- 分页 -->
<div class="page-bar">
    <div class="samao-pagebar"><?php echo smarty_function_pagebar(array('pdata'=>$_smarty_tpl->tpl_vars['bar']->value),$_smarty_tpl);?>
</div>
</div>>
<?php /*  Call merged included template "libs/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '140975d6a79b285e3a2-13253325');
content_5d6a79b28f60d7_99870567($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/footer.tpl" */?>

<script>
    $(document).ready(function (){
        $(".keyword1").text("搜索的内容");

    })
    //日期加颜色
    $('.year_ul li').each(function(index){
        $(this).click(function(){
            $(".year_ul li a").removeClass("title_red");//删除当前元素的样式
            $(".year_ul li a").eq(index).addClass("title_red");//添加当前元素的样式
        })
    })
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:44:18
         compiled from ".\Apps\Home\views\libs\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a79b28b6020_44183729')) {function content_5d6a79b28b6020_44183729($_smarty_tpl) {?><header id="header">
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:44:18
         compiled from ".\Apps\Home\views\libs\footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a79b28f60d7_99870567')) {function content_5d6a79b28f60d7_99870567($_smarty_tpl) {?><footer id="footer">
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
