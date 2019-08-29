{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}期刊论文{@/block@}
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
    <form method="get" id="target-form">
        <a class="samao-link-btn samao-link-btn-add" href="__SELF__/add?document_id={@IGet('document_id')@}&periodical_id={@IGet('periodical_id')@}">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
    </form>
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th width="10%">ID</th>
<th width="10%">标题</th>
<th width="10%">排序</th>
<th width="10%">是否启用</th>
<th width="10%">目录</th>
<th width="18%">操作</th>
{@/block@}
<!--总列数合并单元格时可用-->
{@block name=colspan@}7{@/block@}

<!--表行列-->
{@block name=table_tds@}
<td align="center">{@$rs.id@}</td>
<td align="center">{@$rs.title@}</td>
<td align="center">{@$rs.sort@}</td>
<td align="center">{@$rs.allow|way@}</td>
<td align="center">{@$rs.catalog_id@}</td>

<td align="center">
    <a dialog="1" class="samao-link-minibtn" href="__SELF__/show?id={@$rs.id@}">详情</a>
    <a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}">编辑</a>
    <a onclick="return confirm('确定要删除吗？一旦删除将无法恢复，请谨慎操作！');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
</td>
{@/block@}
<!--分页控件区-->
<!--分页控件区-->		
{@block name=pagebar@}
	<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}
