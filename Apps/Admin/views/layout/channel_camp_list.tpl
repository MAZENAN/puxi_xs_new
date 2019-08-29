{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}频道_产品列表{@/block@}

<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>

{@/block@}

<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a dialog="1" class="samao-link-btn samao-link-btn-add" href="__SELF__/addCamp?id={@$id@}">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a class="samao-link-btn samao-link-btn-back" href="__APPROOT__/channel">返回</a>&nbsp;&nbsp;&nbsp;&nbsp;
</div>
{@/block@}

<!--表头列-->
{@block name=table_ths@}
<th width="80">ID</th>
<th width="180">产品名称</th>
<th width="150">权重排序</th>
<th width="80">状态</th>
<th width="100">操作</th>
{@/block@}

<!--总列数合并单元格时可用-->
{@block name=colspan@}8{@/block@}

<!--表行列-->
{@block name=table_tds@}
<form method="post">
<input name="id" type="hidden" value="{@$rs.id@}" />
<input name="action" type="hidden" value="editsort" />
<td align="center">{@$rs.camp_id@}</td>
<td align="center">{@$rs.title@}</td>
<td align="center">{@$rs.sort|sortopt:$rs.id:1@}</td>
<td align="center">{@$rs.allow|way@}</td>
<td align="center">
<a onclick="return confirm('确定要删除了吗？');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
</td>
</form>
{@/block@}

<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}