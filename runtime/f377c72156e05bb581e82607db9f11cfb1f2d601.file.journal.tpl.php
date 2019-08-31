<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 22:22:43
         compiled from ".\Apps\Home\views\journal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:168045d6a82b37e6800-86779742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f377c72156e05bb581e82607db9f11cfb1f2d601' => 
    array (
      0 => '.\\Apps\\Home\\views\\journal.tpl',
      1 => 1567256090,
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
  'nocache_hash' => '168045d6a82b37e6800-86779742',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d6a82b389dd79_02657711',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6a82b389dd79_02657711')) {function content_5d6a82b389dd79_02657711($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_minimg')) include 'E:\\WWW\\puxi\\samao\\smarty\\ext\\plugins\\modifier.minimg.php';
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
	
<link rel="stylesheet" href="/public/css/home/reset.css"><!--reset通用样式-->
<link rel="stylesheet" href="/public/css/home/header.css"><!--头部样式-->
<link rel="stylesheet" href="/public/css/home/footer.css"><!--底部样式-->
<link rel="stylesheet" href="/public/css/home/newly.css">
<link href="/public/samaores/css/form.plane.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/list.plane.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="app">
    <?php /*  Call merged included template "libs/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '168045d6a82b37e6800-86779742');
content_5d6a82b383cdc4_21027356($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/header.tpl" */?>
    <main>
        <span class="t_h3">期刊频道 </span> <span class="dangqian">当前位置></span><span class="weizhi"><?php echo $_smarty_tpl->tpl_vars['pos']->value;?>
</span>

        <div class="title_classif">
            <div class="tiao_div"></div>
            <a href="/journal/index.html" class="quan_a">全部</a>

            <div class="title_ul">
                <?php  $_smarty_tpl->tpl_vars['cate'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cate']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cate']->key => $_smarty_tpl->tpl_vars['cate']->value) {
$_smarty_tpl->tpl_vars['cate']->_loop = true;
?>
                <div class="index-nav-frame-line" tabindex="-1">
                    <span class="index_nav_title"> <?php echo $_smarty_tpl->tpl_vars['cate']->value['title'];?>
</span>
                    <div class="index-nav-frame-line-center">
                        <div class="index-nav-frame-line-li">
                            <a href="?cid=<?php echo $_smarty_tpl->tpl_vars['cate']->value['id'];?>
">全部</a>
                        </div>
                        <?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cate']->value['childs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
                        <div class="index-nav-frame-line-li">
                            <a href="?cid=<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['child']->value['title'];?>
</a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="index-nav-frame-line-focus" tabindex="-1"></div>
                </div>
                <?php } ?>
            </div>
        </div>
        <!--所有期刊-->
        <div class="all_journal">
            <div class="one_pieces">
                <div class="search_box">
                    <form action="/journal/index.html" method="get" id="journal_form">
                        <input type="text" class="inputs" placeholder="期刊名、ISSN、CN" name="journal_key" value="<?php echo $_smarty_tpl->tpl_vars['journalKey']->value;?>
">
                        <a href="javascript:;" onclick="journal_search()">  <img src="/public/images/icon/sou.png" alt=""></a>
                    </form>
                </div>
                <h5>数据库</h5>
                <ul class="database">
                    <?php  $_smarty_tpl->tpl_vars['db'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['db']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dbs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['db']->key => $_smarty_tpl->tpl_vars['db']->value) {
$_smarty_tpl->tpl_vars['db']->_loop = true;
?>
                    <li><a href="?dblevel=<?php echo $_smarty_tpl->tpl_vars['db']->value['id'];?>
<?php if ($_GET['cid']) {?>&cid=<?php echo $_GET['cid'];?>
<?php }?>" <?php if ($_GET['dblevel']==$_smarty_tpl->tpl_vars['db']->value['id']) {?>class="title_red"<?php }?>><?php echo $_smarty_tpl->tpl_vars['db']->value['name'];?>
<span>(<?php echo $_smarty_tpl->tpl_vars['db']->value['count'];?>
)</span></a></li>
                    <?php } ?>
                </ul>
            </div>
            <!-- 所有期刊 -->
            <div class="tow_pieces">
                <!-- f1-1 -->
                <?php  $_smarty_tpl->tpl_vars['journal'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['journal']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['journals']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['journal']->key => $_smarty_tpl->tpl_vars['journal']->value) {
$_smarty_tpl->tpl_vars['journal']->_loop = true;
?>
                <div class="journal_pieces">
                    <div class="journal_box">
                        <a href="/journal/detail.html?id=<?php echo $_smarty_tpl->tpl_vars['journal']->value['id'];?>
">
                            <img class="journal_img" src="<?php echo smarty_modifier_minimg($_smarty_tpl->tpl_vars['journal']->value['cover'],40,80,1);?>
" alt="加载失败">
                        </a>
                        <!--details详情-->
                        <div class="details">
                            <ul>
                                <li>
                                    <a href="/journal/detail.html?id=<?php echo $_smarty_tpl->tpl_vars['journal']->value['id'];?>
"> <h3 class="${l.title}"><?php echo $_smarty_tpl->tpl_vars['journal']->value['title'];?>
</h3> </a>
                                </li>
                                <!--参数-->
                                <li class="parameter">
                                    <p>发表周期：<?php echo ((FALSE!==$_tempkey=array_search($_smarty_tpl->tpl_vars['journal']->value['cycle'],array('1','2','3','4','5','6','7'))) && array_key_exists($_tempkey,$_temparr=array('旬刊','半月刊','月刊','双月刊','季刊','半年刊','年刊'))?$_temparr[$_tempkey]:'');?>
<span></span></p>
                                </li>
                                <li class="parameter">
                                    <p>产品形式：	WEB版（网上包库）、镜像站版</p>
                                </li>
                                <li class="label_block">
                                    <?php  $_smarty_tpl->tpl_vars['db'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['db']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['journal']->value['dbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['db']->key => $_smarty_tpl->tpl_vars['db']->value) {
$_smarty_tpl->tpl_vars['db']->_loop = true;
?>
                                    <span><?php echo $_smarty_tpl->tpl_vars['db']->value;?>
</span>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <?php } ?>
                <!-- end -->
            </div>
        </div>
    </main>

    <!--分页-->
    <div class="page-bar">
        <div class="samao-pagebar"><?php echo smarty_function_pagebar(array('pdata'=>$_smarty_tpl->tpl_vars['bar']->value),$_smarty_tpl);?>
</div>
    </div>

    <?php /*  Call merged included template "libs/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '168045d6a82b37e6800-86779742');
content_5d6a82b3894229_11050580($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/footer.tpl" */?>
    <!--app结束-->
</div>
<script>
    $(document).ready(function(){
        $('.title_ul li').mouseenter(function (e){
            e.preventDefault();
            $(this).find(".xiaoguo").css('height',"4rem")
        }).mouseleave(function (){
            $(this).find(".xiaoguo").css('height',"0")
        })
    });

    function journal_search(){
        var key = $("input[name='journal_key']").val()
        if (key ==''){
            alert('检索词不能为空')
            return;
        }
        $("#journal_form").submit()
    }
    $.get("/login/sendmbcode.html");
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 22:22:43
         compiled from ".\Apps\Home\views\libs\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a82b383cdc4_21027356')) {function content_5d6a82b383cdc4_21027356($_smarty_tpl) {?><header id="header">
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 22:22:43
         compiled from ".\Apps\Home\views\libs\footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a82b3894229_11050580')) {function content_5d6a82b3894229_11050580($_smarty_tpl) {?><footer id="footer">
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
