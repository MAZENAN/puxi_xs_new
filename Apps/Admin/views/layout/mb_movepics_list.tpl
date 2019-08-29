{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}首页滚动图片{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<a href="__SELF__/add" class="samao-link-btn samao-link-btn-add">新增</a>
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th width="80">ID</th>
<th width="100">上传图片</th>
<th width="120">图片名称</th>
<th width="280">图片连接</th>
<th width="160">排序</th>
<th width="80">是否启用</th>
<th width="180">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}7{@/block@}

<!--表行列-->
{@block name=table_tds@}
<td align="center">{@$rs.id@}</td>
<td align="center"><img src="{@$rs.src@}" height=40 /></td>
<td align="center">{@$rs.name@}</td>
<td align="center">{@$rs.link@}</td>
<td align="center">{@$rs.sort|sortopt:$rs.id:5@}</td>
<td align="center">{@$rs.allow|way@}</td>
<td align="center">
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}">编辑</a>
<a class="samao-link-minibtn" href="__SELF__/set{@if $rs.allow==1@}off{@else@}on{@/if@}_allow?id={@$rs.id@}">{@if $rs.allow==1@}撤销{@else@}审核{@/if@}</a>
<a onclick="return confirm('确定删除该项吗？');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
</td>
{@/block@}