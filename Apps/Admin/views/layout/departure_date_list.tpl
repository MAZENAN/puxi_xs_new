{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}出发日期{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<form method="get">
<a class="samao-link-btn" href="__SELF__/add?campid={@$sch.campid@}">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
{@form_hidden  name="campid" model=$schmodel@}&nbsp;&nbsp;
</form>
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th width="80">期数</th>
<th>起始日期</th>
<th width="80">出发天数</th>
<th width="100">学生/家长人数</th>
<th width="80">备注</th>
<th width="80">订金/费用</th>
<th width="180">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}7{@/block@}

<!--表行列-->
{@block name=table_tds@}
<td align="center">第{@$rs.periods@}期</td>
<td align="center">{@$rs.start@}</td>
<td align="center">{@$rs.days@}天</td>
<td align="center">{@$rs.tourists@}/{@$rs.parent@}人</td>
<td align="center">{@$rs.remark@}</td>
<td align="center">￥{@$rs.deposit@}/￥{@$rs.cost@}</td>
<td align="right">
<a class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}&campid={@$sch.campid@}">编辑</a>
<a class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}&campid={@$sch.campid@}">删除</a>
</td>
{@/block@}