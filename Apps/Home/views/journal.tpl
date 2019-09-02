{@extends file='libs/layout1.tpl'@}
{@block name=title@}普西学术{@/block@}
{@block name="head"@}
<link rel="stylesheet" href="__PUBLIC__/css/home/reset.css"><!--reset通用样式-->
<link rel="stylesheet" href="__PUBLIC__/css/home/header.css"><!--头部样式-->
<link rel="stylesheet" href="__PUBLIC__/css/home/footer.css"><!--底部样式-->
<link rel="stylesheet" href="__PUBLIC__/css/home/newly.css?v=1.1">
<link href="/public/samaores/css/form.plane.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/list.plane.css" rel="stylesheet" type="text/css" />
{@/block@}
{@block name=main@}
<div id="app">
    {@include file="libs/header.tpl"@}
    <main>
        <span class="t_h3">期刊频道 </span> <span class="dangqian">当前位置></span><span class="weizhi">{@$pos@}</span>

        <div class="title_classif">
            <div class="tiao_div"></div>
            <a href="/journal/index.html" class="quan_a">全部</a>

            <div class="title_ul">
                {@foreach $cates as $cate@}
                <div class="index-nav-frame-line" tabindex="-1">
                    <span class="index_nav_title"> {@$cate.title@}</span>
                    <div class="index-nav-frame-line-center">
                        <div class="index-nav-frame-line-li">
                            <a href="?cid={@$cate.id@}">全部</a>
                        </div>
                        {@foreach $cate['childs'] as $child@}
                        <div class="index-nav-frame-line-li">
                            <a href="?cid={@$child.id@}">{@$child.title@}</a>
                        </div>
                        {@/foreach@}
                    </div>
                    <div class="index-nav-frame-line-focus" tabindex="-1"></div>
                </div>
                {@/foreach@}
            </div>
        </div>
        <!--所有期刊-->
        <div class="all_journal">
            <div class="one_pieces">
                <div class="search_box">
                    <form action="/journal/index.html" method="get" id="journal_form">
                        <input type="text" class="inputs" placeholder="期刊名、ISSN、CN" name="journal_key" value="{@$journalKey@}">
                        <a href="javascript:;" onclick="journal_search()">  <img src="__PUBLIC__/images/icon/sou.png" alt=""></a>
                    </form>
                </div>
                <h5>数据库</h5>
                <ul class="database">
                    {@foreach $dbs as $db@}
                    <li><a href="?dblevel={@$db.id@}{@if $smarty.get.cid@}&cid={@$smarty.get.cid@}{@/if@}" {@if $smarty.get.dblevel==$db.id@}class="title_red"{@/if@}>{@$db.name@}<span>({@$db.count@})</span></a></li>
                    {@/foreach@}
                </ul>
            </div>
            <!-- 所有期刊 -->
            <div class="tow_pieces">
                <!-- f1-1 -->
                {@foreach $journals as $journal@}
                <div class="journal_pieces">
                    <div class="journal_box">
                        <a href="/journal/detail.html?id={@$journal.id@}">
                            <img class="journal_img" src="{@$journal.cover|minimg:40:80:1@}" alt="加载失败">
                        </a>
                        <!--details详情-->
                        <div class="details">
                            <ul>
                                <li>
                                    <a href="/journal/detail.html?id={@$journal.id@}"> <h3 class="${l.title}">{@$journal.title@}</h3> </a>
                                </li>
                                <!--参数-->
                                <li class="parameter">
                                    <p>发表周期：{@$journal.cycle|case:['1','2','3','4','5','6','7']:['旬刊','半月刊','月刊','双月刊','季刊','半年刊','年刊']@}<span></span></p>
                                </li>
                                <li class="parameter">
                                    <p>产品形式：	WEB版（网上包库）、镜像站版</p>
                                </li>
                                <li class="label_block">
                                    {@foreach $journal['dbs'] as $db@}
                                    <span>{@$db@}</span>
                                    {@/foreach@}
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                {@/foreach@}
                <!-- end -->
            </div>
        </div>
    </main>

    <!--分页-->
    <div class="page-bar">
        <div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
    </div>

    {@include file="libs/footer.tpl"@}
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
{@/block@}