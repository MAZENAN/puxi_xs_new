{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}首页频道{@/block@}

<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
 <a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a class="samao-link-btn samao-link-btn-add" href="__SELF__/add">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th width="80">ID</th>
<th width="110">频道名称</th>
<th width="110">图标</th>
<th width="180">权重排序</th>
<th width="100">类型</th>
<th width="120">上架时间</th>
<th width="120">下架时间</th>
<th width="80">状态</th>
<th width="180">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}8{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="center">{@$rs.id@}</td>
<td align="center">{@$rs.name@}</td>
<td align="center"><img src="{@$rs.icon|minimg:70:50:1@}" height="50" width="70"/></td>
<td align="center">{@$rs.sort|sortopt:$rs.id:1@}</td>
<td align="center">{@$rs.type|case:[0,1,2]:['专题','关联营期','产品列表']@}</td>
<td align="center">{@if $rs.uptime!='0000-00-00 00:00:00'@}{@$rs.uptime@}{@/if@}</td>
<td align="center">{@if $rs.downtime!='0000-00-00 00:00:00'@}{@$rs.downtime@}{@/if@}</td>
<td align="center">{@$rs.allow|way@}</td>
<td align="center">
<a class="samao-link-minibtn" href="__SELF__/set{@if $rs.allow==1@}off{@else@}on{@/if@}_allow?id={@$rs.id@}">{@if $rs.allow==0@}上架{@else@}下架{@/if@}</a>
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}">编辑</a>
{@if $rs.type==2@}<a class="samao-link-minibtn" href="__APPROOT__/channel_camp/index?id={@$rs.id@}">产品列表</a>{@/if@}
<a onclick="return confirm('确定要删除了吗？');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
</td>
</form>
{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}