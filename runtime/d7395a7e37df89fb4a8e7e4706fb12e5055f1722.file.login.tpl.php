<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:04:30
         compiled from ".\Apps\Home\views\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:135825d6a705e16ad26-03514271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7395a7e37df89fb4a8e7e4706fb12e5055f1722' => 
    array (
      0 => '.\\Apps\\Home\\views\\login.tpl',
      1 => 1567233051,
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
  'nocache_hash' => '135825d6a705e16ad26-03514271',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d6a705e1f6ae3_38218867',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d6a705e1f6ae3_38218867')) {function content_5d6a705e1f6ae3_38218867($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>注册</title>
	<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon" />
	<script src="/public/js/jquery-3.3.1.min.js"></script>
	
<link rel="stylesheet" href="/public/css/home/reset.css">
<link rel="stylesheet" href="/public/css/home/login.css">
<link rel="stylesheet" href="/public/css/home/header.css"><!--头部样式-->
<link rel="stylesheet" href="/public/css/home/footer.css"><!--底部样式-->
<script type="text/javascript" src="/public/mb/js/jquery.min.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.validate.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.timebtn.js"></script>

</head>
<body>

<?php /*  Call merged included template "libs/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '135825d6a705e16ad26-03514271');
content_5d6a705e1b8ae6_03127799($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/header.tpl" */?>
<div class="loginbox">
    <div class="head">
        <img src="/public/images/home/toux.png" alt="">
    </div>
    <div class="cue">
        欢迎登录
        <span class="tishi"></span>
    </div>
    <form action="/login/login_msg.html" ajax="true">
    <div class="case">
        <?php echo FormBox::text(array('name'=>"mobile",'id'=>"account",'autocomplete'=>"off",),$_smarty_tpl->tpl_vars['model']->value);?><br>
       <!-- <input type="password" name="password" id="password" placeholder="密码"><br>-->
        <div class="codes" style="display: inline-block;">
        <?php echo FormBox::text(array('class'=>"code",'style'=>"width: 60px",'name'=>"code",'autocomplete'=>"off",'id'=>"captcha",),$_smarty_tpl->tpl_vars['model']->value);?>
            <!--<img src="" alt="验证码" id="code">-->
            <input type="button" id="timebtn" value="获取验证码" style="width: 150px"/>
            <!--<a href="javascript:void(0)" onclick="change()">换一个</a>-->
            <!-- <span class="numcode"></span> -->
        </div>
        <button class="login_btn" type="submit">快速登录</button>
    </div>
    </form>
   <!-- <a href="/account/findpwd/vertify">忘记密码?</a><a href="/account/register}">立即注册</a>-->
    <div class="party">
        <img src="/public/images/home/logohen.png" alt="">
    </div>
</div>
<?php /*  Call merged included template "libs/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("libs/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '135825d6a705e16ad26-03514271');
content_5d6a705e1ee8e7_69216330($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "libs/footer.tpl" */?>
<script type="text/javascript">
    var countdown = 60;
    $("#timebtn").click(function (){
        sendyzm($("#timebtn"));
    });
    //用ajax提交到后台的发送短信接口
    function sendyzm(obj){
        var phone = $("#account").val();
        var result = isPhoneNum();
        if(result) {
            $.ajax({
                url:"/login/sendmbcode.html",
                data:{mobile:phone},
                dataType:"json",
                type:"post",
                async : false,
                cache : false,
                success:function(res){
                    if(res.success){
                        alert(res.success);
                    }else if (res.error) {
                        alert(res.error);
                    }
                },
                error:function(){
                    alert("验证码发送失败");
                }
            })
            setTime(obj);//开始倒计时
        }
    }

    //60s倒计时实现逻辑

    function setTime(obj) {
        if (countdown == 0) {
            obj.prop('disabled', false);
            obj.val("获取验证码");
            countdown = 60;//60秒过后button上的文字初始化,计时器初始化;
            return;
        } else {
            obj.prop('disabled', true);
            obj.val("("+countdown+"s)后重新发送") ;
            countdown--;
        }
        setTimeout(function() { setTime(obj) },1000) //每1000毫秒执行一次
    }


    //校验手机号是否合法
    function isPhoneNum() {
        var phonenum = $("#account").val();
        var reg = /^1[34578]\d{9}$/;
        if (!reg.test(phonenum)) {
            alert('请输入有效的手机号码！');
            return false;
        } else {
            return true;
        }
    }

    $('form').on('success', function (ev, data) {
        //document.getElementById('codeimg').src = '{ @ #SERVICE_VALIDCODE_URL# @}?r=' + Math.random();
        if (data.error) {
            alert(data.error);
            return false;
        }

        if (data.url) {
            setTimeout(function () {
                window.location = data.url;
            }, 1000);
        }
        return false;
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:04:30
         compiled from ".\Apps\Home\views\libs\header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a705e1b8ae6_03127799')) {function content_5d6a705e1b8ae6_03127799($_smarty_tpl) {?><header id="header">
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
<?php /* Smarty version Smarty-3.1.19, created on 2019-08-31 21:04:30
         compiled from ".\Apps\Home\views\libs\footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5d6a705e1ee8e7_69216330')) {function content_5d6a705e1ee8e7_69216330($_smarty_tpl) {?><footer id="footer">
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
