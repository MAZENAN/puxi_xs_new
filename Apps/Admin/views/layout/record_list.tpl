{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}销售跟进记录{@/block@}
<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/samaores/js/jquery-ui.js"></script>
<script type="text/javascript" src="/public/samaores/js/jquery.ui.datepicker-zh-CN.js"></script>
<script type="text/javascript" src="/public/js/highcharts.js"></script>
<script type="text/javascript" src="/public/js/exporting.js"></script>

<script type="text/javascript">
$(function() {$("#addtime").datepicker({dateFormat:'yy-mm-dd',changeMonth: true,changeYear:true,yearRange:'1900:2050'});});
$(function() {$("#addtime_to").datepicker({dateFormat:'yy-mm-dd',changeMonth: true,changeYear:true,yearRange:'1900:2050'});});</script>
<script language="javascript" type="text/javascript" src="/public/js/admin/TableSorterV2.js"></script>
<script language="javascript" type="text/javascript">
window.onload = function()
{
    new TableSorter("smbox-list-table");
}
    </script>
<style>.smbox-list-table{ width:1760px;} .smbox-list-table100{ width: 100%;} .form-list h3{ padding-left: 20px;}
table{ float: left; margin-left: 20px; }
.form-list{overflow: hidden;}
.form-list h3{ float: left; }
.form-list h3.first{ width: 900px; }
</style>
<link href="/public/samaores/css/jqueryui/custom.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/list.plane.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/form.plane.css" rel="stylesheet" type="text/css" />

{@/block@}
<!--头部标签区-->
{@block name=toptags@}
<div class="smbox-toptags">
	<form method="get">
		<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;
		{@form_select onchange='this.form.submit();' header="课程顾问"  options=DB::getopts('@pf_manage','id,name',0,"type in(7,8,12,13) and islock = 0") name="manage_id" value="{@$sch.manage_id@}" model=$schmodel@}&nbsp;&nbsp;
		<input name="addtime" id="addtime" class="form-control date" style="width:100px;" placeholder="请选择跟进日期" type="text" {@if $sch.addtime@}value="{@$sch.addtime@}" {@/if@}/>-
		<input name="addtime_to" id="addtime_to" class="form-control date" style="width:100px;" placeholder="请选择截至日期" type="text" {@if $sch.addtime_to@}value="{@$sch.addtime_to@}" {@/if@}/>		
		<input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>&nbsp;&nbsp;
	</form>
</div>
{@/block@}
<br/>
{@block name=table_topbar@}<div class="form-list"><h3 class="first">跟进记录</h3>{@if empty($sch['manage_id'])@}<h3>总数</h3>{@/if@}</div>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="1" class="smbox-list-table2 table" id="smbox-list-table2" >
	<tr>
		<th width="10%" align="center" bgcolor="#f7f7f7">负责人</th>
		<th width="15%" align="center" bgcolor="#f7f7f7">时间</th>
		<th width="10%" align="center" bgcolor="#f7f7f7">跟进用户</th>
		{@if $sch.manage_id @}
		<th width="10%" align="center" bgcolor="#f7f7f7">用户手机号</th>
		<th width="10%" align="center" bgcolor="#f7f7f7">跟进方式</th>
		{@/if@}
		<th width="55%" align="center" bgcolor="#f7f7f7">跟进结果</th>
		
	</tr>
	{@foreach from=$rows item=manage key=i@}
	<tr>
		<td align="center" bgcolor="#FFFFFF">
		    <span class="blu">{@$manage.manage_id|smval:'@pf_manage'@}</span>
		</td>
		<td align="center" bgcolor="#FFFFFF">
			<span class="blu">{@$manage.add_time@}</span>
		</td>
		<td align="center" bgcolor="#FFFFFF">
			<span class="blu">{@$manage.c_name@}</span>
		</td>
		{@if $sch.manage_id @}
		<td align="center" bgcolor="#FFFFFF">
			<span class="blu">{@$manage.c_mobile@}</span>
		</td>
		<td align="center" bgcolor="#FFFFFF">
			<span class="blu">{@$manage.contact@}</span>
		</td>
		{@/if@}
		<td align="center" bgcolor="#FFFFFF">
	                <span class="blu">{@$manage.content@}</span>
		</td>
	</tr>
	{@/foreach@}	
</table>
{@if empty($sch['manage_id'])@}
<table width="150" border="0" align="center" cellpadding="0" cellspacing="1" class="smbox-list-table2 table2" id="smbox-list-table2" >
	<tr>
		<th align="center" bgcolor="#f7f7f7">全部</th>	
                <th align="center" bgcolor="#f7f7f7">{@$count@}</th>
	</tr>
        {@foreach from=$info item=m key=n@}
            {@if is_array($m)@}
	<tr>
		<td align="center" bgcolor="#ffffff">{@$m.mid|smval:'@pf_manage'@}</td>		
                <td align="center" bgcolor="#ffffff">{@$m.num@}</td>
        </tr>
	
        {@/if@}
            {@/foreach@}
</table>
{@/if@}
<div class="cls"></div>

{@/block@}
<!--分页控件区-->		
{@block name=pagebar@}
	<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
	<script type="text/javascript">
	$(document).ready(function(){
		$(".table2").prev(".table").width("900px");
	});
</script>
{@/block@}

