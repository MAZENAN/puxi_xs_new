<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 22:02:33
         compiled from ".\Apps\Home\views\journal_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:37825d6a7df9d3f8e9-74369392%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df75c922fd83f1850982a81cf6a56dc499bc32be' => 
    array (
      0 => '.\\Apps\\Home\\views\\journal_detail.tpl',
      1 => 1567260144,
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
  'nocache_hash' => '37825d6a7df9d3f8e9-74369392',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d6a7df9e10bf1_27649790',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6a7df9e10bf1_27649790')) {function content_5d6a7df9e10bf1_27649790($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_minimg')) include 'E:\\WWW\\puxi\\samao\\smarty\\ext\\plugins\\modifier.minimg.php';
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
<link rel="stylesheet" href="/public/css/home/style.css">
<link rel="stylesheet" href="/public/css/home/preview.css">

</head>
<body>

<!-- 期刊详情 -->
<div id="app">
    <?php /*  Call merged included template "libs/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '37825d6a7df9d3f8e9-74369392');
content_5d6a7df9db8348_10682358($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/header.tpl" */?>
    <main>
        <div class="img_cover">
            <div class="p_img">
                <img src="<?php echo smarty_modifier_minimg($_smarty_tpl->tpl_vars['journal']->value['cover'],40,80,1);?>
" alt="">
            </div>
            <div class="p_title">
                <p class="keyword1"><?php echo $_smarty_tpl->tpl_vars['journal']->value['title'];?>
</p>
                <ul>
                    <li><?php echo $_smarty_tpl->tpl_vars['journal']->value['foreign_title'];?>
</li>
                    <li>ISSN : <?php echo (($tmp = @$_smarty_tpl->tpl_vars['journal']->value['issn'])===null||$tmp==='' ? '未知' : $tmp);?>
<span> CN:<?php echo (($tmp = @$_smarty_tpl->tpl_vars['journal']->value['cn'])===null||$tmp==='' ? '未知' : $tmp);?>
</span> </li>
                    <li>出版周期 :  <?php echo Comm::getCycle($_smarty_tpl->tpl_vars['journal']->value['cycle']);?>
</li>

                </ul>
            </div>
            <div class="zaiyao">
                <p>[期刊信息]</p>
                <p><span>主管 : <?php echo (($tmp = @$_smarty_tpl->tpl_vars['journal']->value['competent_unit'])===null||$tmp==='' ? '未知' : $tmp);?>
</span> <span>主办单位 : <?php echo (($tmp = @$_smarty_tpl->tpl_vars['journal']->value['sponsor_unit'])===null||$tmp==='' ? '未知' : $tmp);?>
</span></p>
                <p>[联系方式]</p>
                <p><span>电话 : <?php echo (($tmp = @$_smarty_tpl->tpl_vars['journal']->value['mobile'])===null||$tmp==='' ? '未知' : $tmp);?>
</span> <span>邮箱 :  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['journal']->value['email'])===null||$tmp==='' ? '未知' : $tmp);?>
</span></p>
            </div>
        </div>
        <h3 class="lunwen">论文浏览</h3>
        <div class="cut"></div>
        <!--分割线-->

        <div class="option"> <!--论文和期刊-->
            <span class="shouzhi lunqi ">经典论文</span>
            <span class="shouzhi lunqi">期刊预览 </span>
        </div>
        <!---论文-->
        <!--经典论文-->
        <div class="back test pot_box">
            <h2 class="change_h2">经典论文</h2>
            <!-- f1 -->
            <?php  $_smarty_tpl->tpl_vars['paper'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paper']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['papers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paper']->key => $_smarty_tpl->tpl_vars['paper']->value) {
$_smarty_tpl->tpl_vars['paper']->_loop = true;
?>
            <ul class="sutra_paper">
                <li> <a href="/paper/index.html?id=<?php echo $_smarty_tpl->tpl_vars['paper']->value['id'];?>
" > <?php echo $_smarty_tpl->tpl_vars['paper']->value['title'];?>
</a></li>

                <li><?php echo $_smarty_tpl->tpl_vars['paper']->value['authors'];?>
 《<?php echo $_smarty_tpl->tpl_vars['journal']->value['title'];?>
》</li>
            </ul>
            <?php } ?>
        </div>

        <!--期刊-->
        <div>
            <div class="year pot_box">
                <!--左侧年份 -->
                <div class="sfq_box">
                   <?php  $_smarty_tpl->tpl_vars['yearAndPhase'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['yearAndPhase']->_loop = false;
 $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['phaseArr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['yearAndPhase']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['yearAndPhase']->key => $_smarty_tpl->tpl_vars['yearAndPhase']->value) {
$_smarty_tpl->tpl_vars['yearAndPhase']->_loop = true;
 $_smarty_tpl->tpl_vars['year']->value = $_smarty_tpl->tpl_vars['yearAndPhase']->key;
 $_smarty_tpl->tpl_vars['yearAndPhase']->index++;
 $_smarty_tpl->tpl_vars['yearAndPhase']->first = $_smarty_tpl->tpl_vars['yearAndPhase']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['first'] = $_smarty_tpl->tpl_vars['yearAndPhase']->first;
?>
                    <div class="vtitle" ><em class="v v02"></em><?php echo $_smarty_tpl->tpl_vars['year']->value;?>
</div>
                    <div class="vcon" <?php if (!$_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['first']) {?> style="display: none;" <?php }?>>
                        <ul class="vconlist clearfix">
                            <?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yearAndPhase']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
                            <li class="select">
                                <a class="ul_li_a" href="javascript:;" onclick="catalog(<?php echo $_smarty_tpl->tpl_vars['journal']->value['id'];?>
,<?php echo $_smarty_tpl->tpl_vars['year']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
)">No<?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
                <!--左侧年份end -->
                <!-- 右边列表 -->

                <ul class="title_vcon" id="title_vcon">
                </ul>
                <!-- 右边列表end -->
            </div>
        </div>
    </main>
    <?php /*  Call merged included template "libs/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '37825d6a7df9d3f8e9-74369392');
content_5d6a7df9e06826_38377825($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/footer.tpl" */?>
</div>
<script>
    var navLists=["经典论文","期刊预览"];
    $(document).ready(function (){
        $(".back").addClass("disp");
        $(".lunqi").eq(0).addClass("red")
        $('.lunqi').each(function(index){
            $(this).click(function(){
                // console.log(index)
                $(".lunqi").removeClass("red");//删除当前元素的样式
                $(".lunqi").eq(index).addClass("red");//添加当前元素的样式

                $(".pot_box").removeClass("disp");
                $(".pot_box").eq(index).addClass("disp");
            })
        })


        /*手风琴*/
//菜单隐藏展开
        var tabs_i=0
        $('.vtitle').click(function(){
            var _self = $(this);
            var j = $('.vtitle').index(_self);
            if( tabs_i == j ) return false; tabs_i = j;
            $('.vtitle em').each(function(e){
                if(e==tabs_i){
                    $('em',_self).removeClass('v01').addClass('v02');
                }else{
                    $(this).removeClass('v02').addClass('v01');
                }
            });
            $('.vcon').slideUp().eq(tabs_i).slideDown();
        });

// end
    })
    function catalog(id,year,phase) {
        $.ajax(
            {
                url:'/paper/catalog.html',
                type:'get',
                data:'id='+id+'&year='+year+'&phase='+phase,
                success:function(data){
                    if (data.message=='ok'){
                        $("#title_vcon").empty()
                        var catalog = data.data
                        catalog.forEach(function(e,i){
                            var obj =  "<li><a href='/paper/index.html?id="+e.id+"' target='_blank'> "+e.title+" </a> <p> "+e.authors+"- 《<?php echo $_smarty_tpl->tpl_vars['journal']->value['title'];?>
》 </p> </li> ";
                            $("#title_vcon").append(obj)
                        })
                    }
                }
            }
        )
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 22:02:33
         compiled from ".\Apps\Home\views\libs\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a7df9db8348_10682358')) {function content_5d6a7df9db8348_10682358($_smarty_tpl) {?><header id="header">
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 22:02:33
         compiled from ".\Apps\Home\views\libs\footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a7df9e06826_38377825')) {function content_5d6a7df9e06826_38377825($_smarty_tpl) {?><footer id="footer">
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
