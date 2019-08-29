{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}需求列表{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
    <!--<a class="samao-link-btn samao-link-btn-add" href="__SELF__/add">新增</a>-->
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th width="5%">ID</th>
<th width="10%">姓名</th>
<th width="10%">公司</th>
<th width="10%">电话</th>
<th width="10%">邮箱</th>
<th width="30%">需求</th>
<th width="10%">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}4{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
    <input name="id" type="hidden" value="{@$rs.id@}" />
    <input name="action" type="hidden" value="editsort" />
    <td align="center">{@$rs.id@}</td>
    <td align="center">{@$rs.name@}</td>
    <td align="center">{@$rs.company@}</td>
    <td align="center">{@$rs.tel@}</td>
    <td align="center">{@$rs.email@}</td>
    <td align="center">{@$rs.content@}</td>
    <td align="center">
        <!--<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}">编辑</a>-->
        <a class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
    </td>
</form>
{@/block@}