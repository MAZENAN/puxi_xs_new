{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}流程服务{@/block@}

<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>

{@/block@}

<!--表格顶部区域-->

{@block name=table_topbar@}

<div class="smbox-list-toptab">
    <form method="get" id="camp-form">
        <a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="samao-link-btn samao-link-btn-add" href="__SELF__/add">新增</a>
    </form>
</div>
{@/block@}


<!--表头列-->
{@block name=table_ths@}
<th width="6%">ID</th>
<th width="10%">标题</th>
<th width="10%">图标</th>
<th width="30%">背景图</th>
<th width="30%">描述</th>
<th width="20%"}>操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}11{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
    <input name="id" type="hidden" value="{@$rs.id@}" />
    <input name="action" type="hidden" value="editsort" />
    <td align="center">{@$rs.id@}</td>
    <td align="center">{@$rs.title@}</td>
    <td align="center"><img src="{@$rs.icon|minimg:79:50:1@}" height="50" width="79"/></td>
    <td align="center"><img src="{@$rs.bg_img|minimg:79:50:1@}" height="50" width="79"/></td>
    <td align="center">{@$rs.desc@}</td>

    <td align="center">

        <a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}">编辑</a>
        <a onclick="return confirm('确定要删除了吗？');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
    </td>
</form>

{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}