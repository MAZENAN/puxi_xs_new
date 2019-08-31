{@extends file='libs/layout1.tpl'@}
{@block name=title@}普西学术{@/block@}
{@block name="head"@}
<link rel="stylesheet" href="__PUBLIC__/css/home/reset.css">
<link rel="stylesheet" href="__PUBLIC__/css/home/header.css"><!--头部样式-->
<link rel="stylesheet" href="__PUBLIC__/css/home/footer.css"><!--底部样式-->
<link rel="stylesheet" href="__PUBLIC__/css/home/paperCon.css">
{@/block@}
{@block name=main@}
<div id="app">
    {@include file="libs/header.tpl"@}
    <main>
        <h1 class="h_title keyword1">{@$paper.title@}</h1>
        <div class="nav_list">
            <img class="xiazia_gif" src="__PUBLIC__/images/home/timg.gif" ><div id="xiazai" ><span class="login shouzhi"> {@if !empty($user.id) || !empty($user.name)@}<a href="{@$domain@}{@$paper.file@}">PDF点击下载</a> {@else@} <a href="/login/index.html">登录下载</a> {@/if@}</span></div>
        </div>
        <ul class="ul_zhaiyao">
            <li> 【作者】 <br> <span> {@$paper.authors@}</span></li>
            <li>【摘要】 <span> {@$paper.abstract@} </span></li>
            <li>

                {@if !empty($user.id) || !empty($user.name)@}
                【收藏】
                {@if $collect@}
                <a href="javascript:;" onclick="unCollect({@$paper.id@})" id="collect_fun"><span class="sc_box shoucang">
                            <img src="__PUBLIC__/images/icon/sc0.png" alt="已收藏" id="col_img">
                   {@else@}
                       <a href="javascript:;" onclick="collect({@$paper.id@})" id="collect_fun"><span class="sc_box shoucang">
                       <img src="__PUBLIC__/images/icon/sc1.png" alt="未收藏" id="col_img">
                      {@/if@}
                    {@else@}
                       【登录收藏】
                       <a href="/login/index.html" ><span class="sc_box shoucang">
                       <img src="__PUBLIC__/images/icon/sc1.png" alt="登录收藏" id="col_img">
                    </span></a>
                {@/if@}
            </li>
        </ul>
        <div class="nav_list">

            <div> <img src="__PUBLIC__/images/icon/sprite.png" alt="加载失败"><span class="shouzhi">内容预览</span></div>

        </div>
        <div class="img_con">
            {@foreach $paperImgs as $preview@}
            <img src="{@$preview|minimg:40:80:1@}" alt="《{@$paper.title@}》论文预览图"><br>
            {@/foreach@}
        </div>

    </main>
    {@include file="libs/footer.tpl"@}
</div>

<script>
    function collect(pid){
        $.ajax({
            url:'/paper/collect.html',
            type:'post',
            data:{id:pid},
            success:function(result){
                if (result.code==1) {
                    $("#col_img").attr('src','__PUBLIC__/images/icon/sc0.png')
                    $("#collect_fun").attr('onclick','unCollect({@$paper.id@})')
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
                    $("#col_img").attr('src','__PUBLIC__/images/icon/sc1.png')
                    $("#collect_fun").attr('onclick','collect({@$paper.id@})')
                }
            }
        })
    }
</script>
{@/block@}