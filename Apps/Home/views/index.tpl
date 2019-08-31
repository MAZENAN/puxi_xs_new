{@extends file='libs/layout.tpl'@}
{@block name=title@}普西学术{@/block@}
{@block name=head@}
<link rel="stylesheet" href="__PUBLIC__/css/home/reset.css">
<link rel="stylesheet" href="__PUBLIC__/css/home/index.css">
{@/block@}
{@block name=main@}
<header>

    {@if empty($user.id) || empty($user.name) @}
    <div class="login">
        <a href="/login/index.html">快速登录</a> <!--<a href="account/register">注册</a>-->
    </div>
    {@else@}
    <div class="welcome">
        <span class="sessname">{@$user.name@}</span>
        <a  href="/login/out.html" id="zhuxiao"> 注销</a>
    </div>
    {@/if@}
</header>
<main>
    <div class="logo">
        <img src="__PUBLIC__/images/home/logo.png" alt="">
    </div>
    <div class="search">
        <input type="text" name="inp" placeholder="请输入搜索的内容" autofocus>
        <button class="btn">点击搜索</button>
    </div>
</main>
<!--联系我们-->
<div class="contact_us">
    <img class="us_img" src="__PUBLIC__/images/icon/guanbi.png" alt="">
    <p>普西学术网</p>
    <p>电话：{@$customer.tel@}</p>

    <p>咨询微信：{@$customer.weixin@}</p>
    <!-- <p>投稿邮箱：88888888@qq.com </p> -->

</div>
<footer>

    <a id="dingyue" class="bot_nav" href="/user/collect.html">
        <img src="__PUBLIC__/images/home/shoucang.png" alt="">
        <p>订阅收藏</p>
    </a>
    <a  id="qikan" href="/journal/index.html" target="_blank" class="bot_nav">
        <img src="__PUBLIC__/images/home/qikan.png" alt="">
        <p>期刊频道</p>
    </a>
    <a  id="guanyu" class="bot_nav" href="#">
        <img src="__PUBLIC__/images/home/guanyu.png" alt="">
        <p>联系我们</p>
    </a>
    <a href="/about/index.html" id="lianxi" class="bot_nav">
        <img src="__PUBLIC__/images/home/lianxi.png" alt="">
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
        if(searchText.length==0){
            alert("输入的内容不能为空");
            return;
        }
        /*跳转传值*/
        var searchUrl = '/search/index.html?words=' //使用encodeURI编码
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
{@/block@}