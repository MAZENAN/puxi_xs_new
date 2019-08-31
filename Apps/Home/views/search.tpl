{@extends file='libs/layout1.tpl'@}
{@block name=title@}普西学术{@/block@}
{@block name="head"@}
<link rel="stylesheet" href="__PUBLIC__/css/home/reset.css">
<link rel="stylesheet" href="__PUBLIC__/css/home/header.css"><!--头部样式-->
<link rel="stylesheet" href="__PUBLIC__/css/home/footer.css"><!--底部样式-->
<link rel="stylesheet" href="__PUBLIC__/css/home/search.css">
<link href="/public/samaores/css/form.plane.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/list.plane.css" rel="stylesheet" type="text/css" />
{@/block@}
{@block name=main@}
{@include file="libs/header.tpl"@}
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
        {@if $periodical@}
        <div class="qikan_box">
            <a href="/journal/detail.html?id={@$periodical.id@}"> <img class="qikan_img" src="{@$periodical.cover|minimg:40:80:1@}" alt="" target="_blank"></a>
            <ul class="title_box">
                <li><a href="/journal/detail.html?id={@$periodical.id@}" target="_blank"><h1>《{@$periodical.title@}》</h1> </a> </li>
                <li>出版日期 : {@$periodical.establish_at@}年</li>
                <li>出版周期：{@Comm::getCycle($periodical.cycle)@} </li>
                <li>主办单位:{@$periodical.sponsor_unit@}</li>
            </ul>
        </div>
        {@/if@}
        <!-- 论文列表-->
        <span class="tiaoshu">论文找到约{@$bar.records_count@}条相关结果</span>
        {@foreach $papers as $paper@}
        <div class="lunwen_box">
            <div class="right-text">
                <h3 class="h3_title">
                    <a href="/paper/index.html?id={@$paper.id@}" target="_blank">{@$paper.title@}</a>
                </h3>
                <p class="p_title">
                    {@$paper.abstract@}
                </p>
                <p>
                    {@$paper.authors@}  -  《{@$paper.periodical_id|smval:'@pf_periodical':'title'|default:'--'@}》
                </p>
            </div>
        </div>
        {@/foreach@}
        <!-- 论文列表end-->
    </div>

</main>
<!-- 分页 -->
<div class="page-bar">
    <div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
</div>>
{@include file="libs/footer.tpl"@}

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
{@/block@}