{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}模块{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<form method="get">
<a class="samao-link-btn samao-link-btn-add" href="__SELF__/add?lesson_id={@$sch.lesson_id@}">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;

{@form_hidden  name="lesson_id" model=$schmodel@}&nbsp;&nbsp;
</form>
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th align="">标题</th>
<!-- <th width="180">权重排序</th>
 --><th width="180" align="center">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}5{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="left">{@$rs.title@}</td>

<!-- <td align="center">{@$rs.sort|sortopt:$rs.id@}</td>
 --><td align="center">
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}&lesson_id={@$sch.lesson_id@}">编辑</a>
<a onclick="return confirm('真的删除吗？');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}&lesson_id={@$sch.lesson_id@}">删除</a>
</td>
</form>
{@/block@}