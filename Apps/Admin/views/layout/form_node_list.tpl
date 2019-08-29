{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}报名表节点{@/block@}
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
{@/block@}
<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<a class="samao-link-btn samao-link-btn-add" href="__SELF__/add">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;

<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
</div>
{@/block@}

<!--表头列-->

{@block name=table_ths@}

<th width="80">ID</th>
<th width="80">组别</th>
<th width="100">名称</th>
<th width="60">字段英文</th>
<th width="80">类型</th>
<th width="80">预选项</th>
<th width="40">必填</th>
<th width="80">排序</th>
<th width="150">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}9{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="center">{@$rs.id@}</td>
<td align="center">{@$rs.belong|case:[0,1,2]:['学生信息','家长信息','其他']@}</td>
<td align="center">{@$rs.name@}</td>
<td align="center">{@$rs.field@}</td>
<td align="center">{@$rs.type@}</td>
<td align="center">{@$rs.values@}</td>
<td align="center">{@$rs.required|case:1:'是':'否'@}</td>
<td align="center">{@$rs.sort|sortopt:$rs.id:1@}</td>
<td align="center">
	{@if $rs.belong==2@}
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}">编辑</a>
<a onclick="return confirm('确定要删除该节点吗？一旦删除将无法恢复，请谨慎操作！');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>{@/if@}
</td>
</form>
{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}