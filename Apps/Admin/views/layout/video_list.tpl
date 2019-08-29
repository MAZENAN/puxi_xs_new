{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}视频列表{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<form method="get">
<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a class="samao-link-btn samao-link-btn-add"  href="__SELF__/add?lesson_id={@$sch.lesson_id@}">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
{@form_hidden  name="lesson_id" model=$schmodel@}&nbsp;&nbsp;
</form>
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th width="80">期数</th>
<th>标题</th>
<th width="80">状态</th>
<th width="180">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}7{@/block@}

<!--表行列-->
{@block name=table_tds@}
<td align="center">第{@$rs.periods@}期</td>
<td align="center">{@$rs.title@}</td>
<td align="center">{@$rs.allow|way@}</td>
<td align="right">
<a class="samao-link-minibtn" href="__SELF__/set{@if $rs.allow==1@}off{@else@}on{@/if@}_allow?id={@$rs.id@}">{@if $rs.allow==0@}上架{@else@}下架{@/if@}</a>
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}&lesson_id={@$sch.lesson_id@}">编辑</a>
<a class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}&lesson_id={@$sch.lesson_id@}">删除</a>
</td>
{@/block@}