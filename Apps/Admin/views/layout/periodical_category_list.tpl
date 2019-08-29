{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}期刊分类{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
    <a href="__SELF__/add" class="samao-link-btn samao-link-btn-add">新增分类</a>&nbsp;&nbsp;
    <form method='get'>
        {@form_select header='分类' options=DB::getopts('@pf_periodical_category','id,title',0,"pid=0") style="width:100px;" onchange='this.form.submit();' value="{@$id@}" name="id" model=$model@}&nbsp;&nbsp;
    </form>
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th width="%10">ID</th>
<th width="%10">分类名</th>
<th width="%10">排序</th>
<th width="%10">是否启用</th>
<th width="180">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}5{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
    <input name="id" type="hidden" value="{@$rs.id@}" />
    <input name="action" type="hidden" value="editsort" />
    <td align="center">{@$rs.id@}</td>
    <td>{@$rs.title@}</td>
    <td align="center">{@form_digits name='sort' class="form-control digits" value=$rs.sort style='width:40px;'@}
        <input class="samao-mini-btn-change" title="修改" type="button" onclick="this.form.submit();" />
        <a href="__SELF__/upsortbypid?id={@$rs.id@}" class="up">上移</a>  <a href="__SELF__/dnsortbypid?id={@$rs.id@}" class="down">下移</a></td>
    <td align="center">{@$rs.allow|way@}</td>
    <td align="center">
        {@if $rs.allow == 0@}<a href="__SELF__/seton_allow?id={@$rs.id@}">启用</a> |
        {@else@}<a onclick="return confirm('确定要关闭该菜单吗？');" href="__SELF__/setoff_allow?id={@$rs.id@}">关闭</a> |
        {@/if@}
        <a href="__SELF__/edit?id={@$rs.id@}">编辑</a> |
        <a onclick="return confirm('确定要删除该菜单吗？一旦删除将无法恢复，请谨慎操作！');" href="__SELF__/delete?id={@$rs.id@}">删除</a>
    </td>
</form>
{@/block@}