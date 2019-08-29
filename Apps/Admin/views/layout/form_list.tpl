{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}报名表列表{@/block@}
<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>

{@/block@}
<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<a class="samao-link-btn samao-link-btn-add" href="__SELF__/formAdd">新增报名表</a>&nbsp;&nbsp;
	
</div>
{@/block@}
<!--表头列-->
{@block name=table_ths@}
<th width="20">序号</th>
<th width="20">报名表名称</th>
<th width="20">操作</th>
{@/block@}
<!--总列数合并单元格时可用-->
{@block name=colspan@}

{@/block@}
<!--表行列-->

{@block name=table_tds@}
<td align="center">{@$rs.id@}</td>
<td align="center">{@$rs.title@}</td>
<td align="center">
	<a class="samao-link-minibtn" href="__SELF__/form_edit?id={@$rs.id@}">报名表详情</a>
	<a class="samao-link-minibtn" href="__SELF__/preview?id={@$rs.id@}">预览</a>
	<a class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
</td>
{@/block@}


