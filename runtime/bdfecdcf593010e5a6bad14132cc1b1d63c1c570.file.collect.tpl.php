<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:46:44
         compiled from ".\Apps\Home\views\collect.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18525d6a7a44500c35-64482713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdfecdcf593010e5a6bad14132cc1b1d63c1c570' => 
    array (
      0 => '.\\Apps\\Home\\views\\collect.tpl',
      1 => 1567242375,
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
  'nocache_hash' => '18525d6a7a44500c35-64482713',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d6a7a44596e14_46871615',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6a7a44596e14_46871615')) {function content_5d6a7a44596e14_46871615($_smarty_tpl) {?><?php if (!is_callable('smarty_function_pagebar')) include 'E:\\WWW\\puxi\\samao\\smarty\\ext\\plugins\\function.pagebar.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>我的收藏</title>
	<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon" />
	<script src="/public/js/jquery-3.3.1.min.js"></script>
	
<link rel="stylesheet" href="/public/css/home/reset.css">
<link rel="stylesheet" href="/public/css/home/header.css"><!--头部样式-->
<link rel="stylesheet" href="/public/css/home/footer.css"><!--底部样式-->
<link rel="stylesheet" href="/public/css/home/collection.css">
<link href="/public/samaores/css/form.plane.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/list.plane.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div id="app">
    <?php /*  Call merged included template "libs/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '18525d6a7a44500c35-64482713');
content_5d6a7a44560988_61964704($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/header.tpl" */?>
    <section class="cartMain">
        <div class="cartMain_hd">
            <ul class="order_lists cartTop">
                <li class="list_con">标 题</li>
                <li class="list_info">摘 要</li>
                <li class="list_price">作者</li>
                <li class="list_amount"></li>
                <li class="list_sum"></li>
                <li class="list_op">操作</li>
            </ul>
        </div>
        <!--商品-->

        <div class="cartBox">
            <div class="shop_info">
                <div class="all_check">
                    <!--店铺全选-->
                </div>
                <div class="shop_name">
                    <a href="javascript:;"></a>
                </div>
            </div>
            <div class="order_content">
                <?php  $_smarty_tpl->tpl_vars['paper'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paper']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['papers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paper']->key => $_smarty_tpl->tpl_vars['paper']->value) {
$_smarty_tpl->tpl_vars['paper']->_loop = true;
?>
                <ul class="order_lists">
                    <li class="list_con">
                        <div class="list_img"><a href="javascript:;"> </a></div>
                        <div class="list_text"><a href="/paper/index.html?id=<?php echo $_smarty_tpl->tpl_vars['paper']->value['id'];?>
" target="_back"> <?php echo $_smarty_tpl->tpl_vars['paper']->value['title'];?>
</a></div>
                    </li>
                    <li class="list_info">
                        <p><?php echo $_smarty_tpl->tpl_vars['paper']->value['abstract'];?>
</p>
                    </li>
                    <li class="list_price">
                        <p class="price"><?php echo $_smarty_tpl->tpl_vars['paper']->value['authors'];?>
</p>
                    </li>
                    <li class="list_amount">
                        <div class="amount_box">
                            <p></p>
                        </div>
                    </li>
                    <li class="list_sum">
                        <p class="sum_price"></p>
                    </li>
                    <li class="list_op">
                        <p class="del"><a href="javascript:;" class="delBtn">移除</a><input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['paper']->value['id'];?>
"></p>
                    </li>
                </ul>
                <?php } ?>
            </div>
            <div class="samao-pagebar"><?php echo smarty_function_pagebar(array('pdata'=>$_smarty_tpl->tpl_vars['bar']->value),$_smarty_tpl);?>
</div>
        </div>
    </section>
    <section class="model_bg"></section>
    <section class="my_model">
        <p class="title">删除<span class="closeModel">X</span></p>
        <p>您确认要删除该文章吗？</p>
        <div class="opBtn"><a href="javascript:;" class="dialog-sure">确定</a><a href="javascript:;" class="dialog-close">关闭</a></div>
    </section>
    <?php /*  Call merged included template "libs/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '18525d6a7a44500c35-64482713');
content_5d6a7a4458b477_04004056($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/footer.tpl" */?>
</div>
<script>
    /**
     * Created by Administrator on 2017/5/24.
     */
    var current_id = -1;
    $(function () {
        //全局的checkbox选中和未选中的样式
        var $allCheckbox = $('input[type="checkbox"]'),     //全局的全部checkbox
            $wholeChexbox = $('.whole_check'),
            $cartBox = $('.cartBox'),                       //每个商铺盒子
            $shopCheckbox = $('.shopChoice'),               //每个商铺的checkbox
            $sonCheckBox = $('.son_check');                 //每个商铺下的商品的checkbox
        $allCheckbox.click(function () {
            if ($(this).is(':checked')) {
                $(this).next('label').addClass('mark');
            } else {
                $(this).next('label').removeClass('mark')
            }
        });

        //===============================================全局全选与单个商品的关系================================
        $wholeChexbox.click(function () {
            var $checkboxs = $cartBox.find('input[type="checkbox"]');
            if ($(this).is(':checked')) {
                $checkboxs.prop("checked", true);
                $checkboxs.next('label').addClass('mark');
            } else {
                $checkboxs.prop("checked", false);
                $checkboxs.next('label').removeClass('mark');
            }
            totalMoney();
        });


        $sonCheckBox.each(function () {
            $(this).click(function () {
                if ($(this).is(':checked')) {
                    //判断：所有单个商品是否勾选
                    var len = $sonCheckBox.length;
                    var num = 0;
                    $sonCheckBox.each(function () {
                        if ($(this).is(':checked')) {
                            num++;
                        }
                    });
                    if (num == len) {
                        $wholeChexbox.prop("checked", true);
                        $wholeChexbox.next('label').addClass('mark');
                    }
                } else {
                    //单个商品取消勾选，全局全选取消勾选
                    $wholeChexbox.prop("checked", false);
                    $wholeChexbox.next('label').removeClass('mark');
                }
            })
        })

        //=======================================每个店铺checkbox与全选checkbox的关系/每个店铺与其下商品样式的变化===================================================

        //店铺有一个未选中，全局全选按钮取消对勾，若店铺全选中，则全局全选按钮打对勾。
        $shopCheckbox.each(function () {
            $(this).click(function () {
                if ($(this).is(':checked')) {
                    //判断：店铺全选中，则全局全选按钮打对勾。
                    var len = $shopCheckbox.length;
                    var num = 0;
                    $shopCheckbox.each(function () {
                        if ($(this).is(':checked')) {
                            num++;
                        }
                    });
                    if (num == len) {
                        $wholeChexbox.prop("checked", true);
                        $wholeChexbox.next('label').addClass('mark');
                    }

                    //店铺下的checkbox选中状态
                    $(this).parents('.cartBox').find('.son_check').prop("checked", true);
                    $(this).parents('.cartBox').find('.son_check').next('label').addClass('mark');
                } else {
                    //否则，全局全选按钮取消对勾
                    $wholeChexbox.prop("checked", false);
                    $wholeChexbox.next('label').removeClass('mark');

                    //店铺下的checkbox选中状态
                    $(this).parents('.cartBox').find('.son_check').prop("checked", false);
                    $(this).parents('.cartBox').find('.son_check').next('label').removeClass('mark');
                }
                totalMoney();
            });
        });


        //========================================每个店铺checkbox与其下商品的checkbox的关系======================================================

        //店铺$sonChecks有一个未选中，店铺全选按钮取消选中，若全都选中，则全选打对勾
        $cartBox.each(function () {
            var $this = $(this);
            var $sonChecks = $this.find('.son_check');
            $sonChecks.each(function () {
                $(this).click(function () {
                    if ($(this).is(':checked')) {
                        //判断：如果所有的$sonChecks都选中则店铺全选打对勾！
                        var len = $sonChecks.length;
                        var num = 0;
                        $sonChecks.each(function () {
                            if ($(this).is(':checked')) {
                                num++;
                            }
                        });
                        if (num == len) {
                            $(this).parents('.cartBox').find('.shopChoice').prop("checked", true);
                            $(this).parents('.cartBox').find('.shopChoice').next('label').addClass('mark');
                        }

                    } else {
                        //否则，店铺全选取消
                        $(this).parents('.cartBox').find('.shopChoice').prop("checked", false);
                        $(this).parents('.cartBox').find('.shopChoice').next('label').removeClass('mark');
                    }
                    totalMoney();
                });
            });
        });


        //=================================================商品数量==============================================
        var $plus = $('.plus'),
            $reduce = $('.reduce'),
            $all_sum = $('.sum');
        $plus.click(function () {
            var $inputVal = $(this).prev('input'),
                $count = parseInt($inputVal.val())+1,
                $obj = $(this).parents('.amount_box').find('.reduce'),
                $priceTotalObj = $(this).parents('.order_lists').find('.sum_price'),
                $price = $(this).parents('.order_lists').find('.price').html(),  //单价
                $priceTotal = $count*parseInt($price.substring(1));
            $inputVal.val($count);
            $priceTotalObj.html('￥'+$priceTotal);
            if($inputVal.val()>1 && $obj.hasClass('reSty')){
                $obj.removeClass('reSty');
            }
            totalMoney();
        });

        $reduce.click(function () {
            var $inputVal = $(this).next('input'),
                $count = parseInt($inputVal.val())-1,
                $priceTotalObj = $(this).parents('.order_lists').find('.sum_price'),
                $price = $(this).parents('.order_lists').find('.price').html(),  //单价
                $priceTotal = $count*parseInt($price.substring(1));
            if($inputVal.val()>1){
                $inputVal.val($count);
                $priceTotalObj.html('￥'+$priceTotal);
            }
            if($inputVal.val()==1 && !$(this).hasClass('reSty')){
                $(this).addClass('reSty');
            }
            totalMoney();
        });

        $all_sum.keyup(function () {
            var $count = 0,
                $priceTotalObj = $(this).parents('.order_lists').find('.sum_price'),
                $price = $(this).parents('.order_lists').find('.price').html(),  //单价
                $priceTotal = 0;
            if($(this).val()==''){
                $(this).val('1');
            }
            $(this).val($(this).val().replace(/\D|^0/g,''));
            $count = $(this).val();
            $priceTotal = $count*parseInt($price.substring(1));
            $(this).attr('value',$count);
            $priceTotalObj.html('￥'+$priceTotal);
            totalMoney();
        })

        //======================================移除商品========================================

        var $order_lists = null;
        var $order_content = '';
        $('.del').click(function () {
            var id = $(this).find('input').val();
            current_id = id;
            console.info(id)
            $order_lists = $(this).parents('.order_lists');
            $order_content = $order_lists.parents('.order_content');
            $('.model_bg').fadeIn(300);
            $('.my_model').fadeIn(300);

        });

        //关闭模态框
        $('.closeModel').click(function () {
            closeM();
        });
        $('.dialog-close').click(function () {
            closeM();
        });
        function closeM() {
            $('.model_bg').fadeOut(300);
            $('.my_model').fadeOut(300);
        }
        //确定按钮，移除商品
        $('.dialog-sure').click(function () {
            if (current_id!=-1){
                $.ajax(
                    {
                        type:"POST",
                        url:"/paper/unCollect.html",
                        data:"id="+current_id,
                        success:function (data) {
                            if (data.code==1){
                                $order_lists.remove();
                                if($order_content.html().trim() == null || $order_content.html().trim().length == 0){
                                    $order_content.parents('.cartBox').remove();
                                }
                                closeM()
                            } else{
                                closeM()
                            }
                        },
                        error:function (data) {
                            closeM()
                        }
                    }
                )

            } else{
                closeM();
            }
            // $order_lists.remove();
            // if($order_content.html().trim() == null || $order_content.html().trim().length == 0){
            // 	$order_content.parents('.cartBox').remove();
            // }
            //closeM();
            //$sonCheckBox = $('.son_check');
            //totalMoney();
        })

        //======================================总计==========================================

        function totalMoney() {
            var total_money = 0;
            var total_count = 0;
            var calBtn = $('.calBtn a');
            $sonCheckBox.each(function () {
                if ($(this).is(':checked')) {
                    var goods = parseInt($(this).parents('.order_lists').find('.sum_price').html().substring(1));
                    var num =  parseInt($(this).parents('.order_lists').find('.sum').val());
                    total_money += goods;
                    total_count += num;
                }
            });
            $('.total_text').html('￥'+total_money);
            $('.piece_num').html(total_count);

            // console.log(total_money,total_count);

            if(total_money!=0 && total_count!=0){
                if(!calBtn.hasClass('btn_sty')){
                    calBtn.addClass('btn_sty');
                }
            }else{
                if(calBtn.hasClass('btn_sty')){
                    calBtn.removeClass('btn_sty');
                }
            }
        }


    });
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:46:44
         compiled from ".\Apps\Home\views\libs\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a7a44560988_61964704')) {function content_5d6a7a44560988_61964704($_smarty_tpl) {?><header id="header">
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:46:44
         compiled from ".\Apps\Home\views\libs\footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a7a4458b477_04004056')) {function content_5d6a7a4458b477_04004056($_smarty_tpl) {?><footer id="footer">
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
