{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}期刊信息{@/block@}
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
    <form method="get" id="target-form">
        <a class="samao-link-btn samao-link-btn-add" href="__SELF__/add">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            {@form_text  style="width:120px" name="title" value="{@$sch['title']@}" placeholder= '请输入期刊名' model=$model@}
        <input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>
    </form>
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th width="10%">ID</th>
<th width="10%">期刊名</th>
<th width="10%">期刊封面</th>
<th width="10%">是否启用</th>
<th width="18%">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}4{@/block@}

<!--表行列-->
{@block name=table_tds@}
<td align="center">{@$rs.id@}</td>
<td align="center">{@$rs.title@}</td>
<td align="center"><img src="{@$rs.cover|minimg:40:80:1@}" height="60" width="50"/></td>
<td align="center">{@$rs.allow|way@}</td>
<td align="center">
    <!--<a dialog="1" class="samao-link-minibtn" href="__SELF__/show?id={ @ $rs.id@}">详情</a> -->
    <a dialog="1" class="samao-link-minibtn" href="/admin/document?periodical_id={@$rs.id@}">期刊 论文上传</a>
    <a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}">编辑</a>
    <a class="samao-link-minibtn" href="__SELF__/set{@if $rs.allow==1@}off{@else@}on{@/if@}_allow?id={@$rs.id@}">{@if $rs.allow==0@}上架{@else@}下架{@/if@}</a>
    <a onclick="return confirm('确定要删除吗？一旦删除将无法恢复，请谨慎操作！');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
</td>
{@/block@}
<!--分页控件区-->
<!--分页控件区-->		
{@block name=pagebar@}
	<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}
