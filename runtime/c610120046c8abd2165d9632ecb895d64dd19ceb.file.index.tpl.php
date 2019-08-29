<?php /* Smarty version Smarty-3.1.19, created on 2019-08-29 09:37:59
         compiled from ".\Apps\Home\views\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182595d672c7768e3c4-28879533%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c610120046c8abd2165d9632ecb895d64dd19ceb' => 
    array (
      0 => '.\\Apps\\Home\\views\\index.tpl',
      1 => 1567002119,
      2 => 'file',
    ),
    'c83b1d8e37701e76e6b28125a776fca5ec483540' => 
    array (
      0 => '.\\Apps\\Home\\views\\libs\\layout.tpl',
      1 => 1566974909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182595d672c7768e3c4-28879533',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d672c776de132_15139429',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d672c776de132_15139429')) {function content_5d672c776de132_15139429($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>普西学术</title>
	<link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon" />
	<script src="/public/js/jquery-3.3.1.min.js"></script>
	
<link rel="stylesheet" href="/public/css/home/reset.css">
<link rel="stylesheet" href="/public/css/home/index.css">

</head>
<body>
<!--{{ @include file="libs/header.tpl" @} -->

<header>
    <div class="welcome">
        <span class="sessname"></span>
        <a  href="/account/logout" id="zhuxiao"> 注销</a>
    </div>
    <div class="login">
        <a href="account/login{{config('myroute.suffix','html')}}?redirect_url=">登录</a> <a href="account/register">注册</a>
    </div>
</header>
<main>
    <div class="logo">
        <img src="/public/images/home/logo.png" alt="">
    </div>
    <div class="search">
        <input type="text" name="inp" placeholder="请输入搜索的内容" autofocus>
        <button class="btn">点击搜索</button>
    </div>
</main>
<!--联系我们-->
<div class="contact_us">
    <img class="us_img" src="/home/image/icon/guanbi.png" alt="">
    <p>普西学术网</p>
    <p>电话：{{$site->phone}}</p>

    <p>咨询微信：{{$site->wechat}}</p>
    <!-- <p>投稿邮箱：88888888@qq.com </p> -->

</div>
<footer>

    <a id="dingyue" class="bot_nav" href="usercenter/collection{{config('myroute.suffix','html')}}">
        <img src="/public/images/home/shoucang.png" alt="">
        <p>订阅收藏</p>
    </a>
    <a  id="qikan" href="/journal/index.html" target="_blank" class="bot_nav">
        <img src="/public/images/home/qikan.png" alt="">
        <p>期刊频道</p>
    </a>
    <a  id="guanyu" class="bot_nav" href="#">
        <img src="/public/images/home/guanyu.png" alt="">
        <p>联系我们</p>
    </a>
    <a href="/about/index.html" id="lianxi" class="bot_nav">
        <img src="/public/images/home/lianxi.png" alt="">
        <p>关于我们</p>
    </a>
    <!-- <a href="javascript:void(0)" id="lianxi" onclick="window.open('http://www.baidu.com','_self');" target="_blank" class="bot_nav">
        <img src="/home/image/lianxi.png" alt="">
        <p>联系我们</p>
    </a>-->
</footer>

<script type="text/javascript">

    /*搜索*/
    function search(){
        var searchText=$("input[name='inp']").val()
        searchText = searchText.replace(/[\/]+/g, "")
        if(searchText.length==0){
            alert("输入的内容不能为空");
            return;
        }
        /*跳转传值*/
        var searchUrl = 'search/' //使用encodeURI编码
        location.href = searchUrl+encodeURIComponent(searchText);
    }
    /*鼠标点击*/
    $(".btn").click(function(){
            search()
        }

    )
    /*键盘事件*/
    $(document).keyup(function(event){
        if(event.keyCode ==13){
            search()
        }
        /*判断session是否存在 切换登录和欢迎*/

    });
    function jianceuname(html){
        if(sessionStorage.getItem('uname')){
            $(location).prop('href', html)
            console.log(123)
        }else{
            $(location).prop('href', 'login.html');
            return;
        }
    }
    /*控制联系我们隐藏显示*/
    $("#guanyu").click(function(){
        $(".contact_us").css("display","block")
    })

    $(".us_img").click(function (){
        $(".contact_us").css("display","none")

    })
</script>

<!--{ @include file="libs/footer.tpl"@}-->
</body>
</html><?php }} ?>
