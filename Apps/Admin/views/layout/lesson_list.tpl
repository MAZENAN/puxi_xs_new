{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}课程列表{@/block@}

<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>

{@/block@}

<!--表格顶部区域-->

{@block name=table_topbar@}

<div class="smbox-list-toptab">
<form method="get" id="camp-form">
<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a class="samao-link-btn samao-link-btn-add" href="__SELF__/add">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
标题：{@form_text  name="title" model=$schmodel placeholder= '请输入查找标题' style="width:100px;"@}&nbsp;&nbsp;
<input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>&nbsp;&nbsp;
</form>
</div>
{@/block@}


<!--表头列-->
{@block name=table_ths@}
<th width="20">ID</th>
<th width="80">封面图片</th>
<th width="240">标题</th>

<th width="80">权重值</th>
<th width="70">是否上架</th>
<!--<th width="70">点击量</th>-->
<th width="130"}>操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}11{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="center">{@$rs.id@}</td>
<td align="center"><img src="{@$rs.cover|minimg:79:50:1@}" height="50" width="79"/></td>
<td align="center">{@$rs.title@}</td>

<td align="center">{@$rs.sort|sortopt:$rs.id:1@}</td>
<td align="center">{@$rs.allow|way@}</td>
<!--<td align="center">{@$rs.click@}</td>-->

<td align="center">
<!--<a dialog="1" class="samao-link-minibtn" href="__APPROOT__/video?lesson_id={@$rs.id@}">案例图片</a>-->
<a class="samao-link-minibtn" href="__SELF__/set{@if $rs.allow==1@}off{@else@}on{@/if@}_allow?id={@$rs.id@}">{@if $rs.allow==0@}上架{@else@}下架{@/if@}</a>
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}">编辑</a>
<a onclick="return confirm('确定要删除了吗？');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
</td>
</form>

{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}