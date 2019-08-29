{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}{@$title@}{@/block@}

<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>

{@/block@}

<!--表格顶部区域-->

{@block name=table_topbar@}
<div class="smbox-list-toptab">
<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>
<a class="samao-link-btn samao-link-btn-add" href="__SELF__/add?client_id={@$sch.client_id@}{@if $type == 3@}&type=3{@/if@}">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;

</div>
{@/block@}
<!--表头列-->
{@block name=table_ths@}
<th width="30">ID</th>
<th width="100">跟进时间</th>
<th width="100">跟进人</th>
<th width="70">联系方式</th>
<th width="160">跟进结果</th>
<th width="100">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}11{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="center">{@$ttl + 1@}</td>
<td align="center">{@$rs.add_time@}</td>
<td align="center">{@$rs.manage_id|smval:'@pf_manage'@}</td>
<td align="center">{@$rs.contact@}</td>
<td align="center">{@$rs.content@}</td>

<td align="center">
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}&client_id={@$sch.client_id@}{@if $type == 3@}&type=3{@/if@}">编辑</a>
<a onclick="return confirm('确定要删除了吗？');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}&client_id={@$sch.client_id@}">删除</a>
</td>
</form>

{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}


