{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}投诉列表{@/block@}
<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>

{@/block@}
<!--头部标签区-->
{@block name=toptags@}
{@/block@}
<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
	<form method="get">
		<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>
		&nbsp;&nbsp;&nbsp;&nbsp;
                {@form_select header="是否处理" options=[[0,'未处理'],[1,'已处理']] onchange='this.form.submit()' name="state" value="{@$sch.state@}"  model=$model@}&nbsp;&nbsp;
		{@form_text  style="width:120px" name="title" value="{@$sch['title']@}" placeholder= '产品标题' model=$model@}
		<input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>
		&nbsp;&nbsp;
	</form>
</div>
{@/block@}
<!--表头列-->
{@block name=table_ths@}
<th width="30">ID</th>
<th width="340">产品标题</th>
<th width="90">订单联系人</th>
<th width="90">联系电话</th>
<th width="420">投诉内容</th>
<th width="170">投诉时间</th>
<th width="80">状态</th>
<th width="260">操作</th>
{@/block@}
<!--总列数合并单元格时可用-->
{@block name=colspan@}9{@/block@}
<!--表行列-->
{@block name=table_tds@}
<td align="center">
	<span class="blu">{@$rs.id@}</span>
</td>
<td align="center">
	<span class="blu">{@$rs.title@}</span>
</td>
<td align="center">
	<span class="blu">{@$rs.ct1_name@}</span>
</td>
<td align="center">
	<span class="blu">{@$rs.ct1_phone@}</span>
</td>
<td align="center">
	<span class="blu">{@$rs.info@}</span>
</td>
<td align="left">
	<span class="blu">{@$rs.add_time@}</span>
</td>
<td align="center">
	<span class="blu">{@if $rs.state@}已处理{@else@}未处理{@/if@}</span>
</td>
<td align="left">
	<a dialog="1" class="samao-link-minibtn" href="__APPROOT__/order/detail?id={@$rs.oid@}">查看订单</a>
        {@if $rs.state == 0@}<a dialog="1" class="samao-link-minibtn" href="__SELF__/edit?id={@$rs.id@}">标记为已处理</a>{@/if@}
        {@if $rs.state == 1@}<a dialog="1" class="samao-link-minibtn" href="__SELF__/show?id={@$rs.id@}">处理结果</a>{@/if@}
</td>
{@/block@}
<!--分页控件区-->		
{@block name=pagebar@}
	<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}


