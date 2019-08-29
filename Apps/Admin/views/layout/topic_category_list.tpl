{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}专题分类管理{@/block@}
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/clipboard.min.js"></script>
{@/block@}
<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
<form method="get">
<a class="samao-link-btn samao-link-btn-add" href="__SELF__/camp_add?id={@$id@}">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
<input type="hidden" name="type" value="{@$type@}">
<input type="hidden" name="key" value="{@$key@}">
<input type="hidden" name="status" value="{@$status@}">
</form>
</div>
{@/block@}

<!--表头列-->

{@block name=table_ths@}
<th width="60">ID</th>
<th width="80">分类标题</th>
<th width="260">产品</th>
<th width="60">排序</th>
<th width="100">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}5{@/block@}

<!--表行列-->
{@block name=table_tds@}
<td align="center">{@$rs.id@}</td>
<td align="center">{@$rs.category@}</td>
<td align="left">{@foreach from=$rs.camp item=camp key=i@}&nbsp;&nbsp;产品{@$i+1@} &nbsp;&nbsp; {@$camp.title@}<br />{@/foreach@}</td>
<td align="center">{@$rs.sort@}</td>
<td align="center">
<a class="samao-link-minibtn" href="__SELF__/camp_edit?cid={@$rs.id@}">编辑</a>
<a onclick="return confirm('确定要删除该用户吗？一旦删除将无法恢复，请谨慎操作！');" class="samao-link-minibtn" href="__SELF__/camp_delete?id={@$rs.id@}">删除</a>
</td>
{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}