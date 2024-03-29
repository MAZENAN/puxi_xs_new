{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}结算明细数据{@/block@}
<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/samaores/js/jquery-ui.js"></script>
<script type="text/javascript" src="/public/samaores/js/jquery.ui.datepicker-zh-CN.js"></script>
<script type="text/javascript" src="/public/js/highcharts.js"></script>
<script type="text/javascript" src="/public/js/exporting.js"></script>
<script type="text/javascript" src="/public/js/highcharts-3d.js"></script>
<script type="text/javascript">
$(function() {$("#settle_time").datepicker({dateFormat:'yy-mm-dd',changeMonth: true,changeYear:true,yearRange:'1900:2050'});});
$(function() {$("#settle_time_to").datepicker({dateFormat:'yy-mm-dd',changeMonth: true,changeYear:true,yearRange:'1900:2050'});});</script>
<script language="javascript" type="text/javascript" src="/public/js/admin/TableSorterV2.js"></script>
<script language="javascript" type="text/javascript">
window.onload = function()
{
    new TableSorter("smbox-list-table");
}
    </script>
<style>.smbox-list-table{ width:1360px;} .smbox-list-table100{ width: 100%;} .form-list h3{ padding-left: 20px;}</style>
<link href="/public/samaores/css/jqueryui/custom.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/list.plane.css" rel="stylesheet" type="text/css" />
<link href="/public/samaores/css/form.plane.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">

	$(document).ready(function(){	       	
        $("#seller_id").change(function(){
        	$("#seller_id option").each(function(){
               if($(this).attr("selected")=="selected"){
               	$(".seller_cont input").val($(this).text());
               }
        	});
        });
        $("#title").keyup(function(){
        	
        	 if (event.keyCode == "13") {
       　　　　　$("#camp-form").submit();
                return false;
            }
        });
	    $(".samao-mini-btn-search").click(function(){
	    	$("#camp-form").submit();
	    });	
		$("#seller_id").click(function(){
			$(".supplier .seller_cont").css("zIndex","999");
			$(".supplier .seller_cont").focus();
		});
        $(".seller_cont input").bind("input propertychange",function(){
        	$(".seller_select").show();
        	$(".seller_select ul").empty();
    	$("#seller_id option").each(function(){   		
    		 if($(this).text().indexOf($(".seller_cont input").val())>=0){
    		 	var otext=$(this).text();
    		 	$(".seller_select ul").append("<li data-id="+$(this).val()+">"+otext+"</li>");  
              }    

        	}); 
    	$(".seller_select ul li").each(function(){
        	$(this).click(function(){
               var thisid=$(this).data("id");
                $(".seller_cont input").val($(this).text());
                $(".seller_select").hide();
        		$("#seller_id option").each(function(index, el) {
        			if($(this).val()==thisid){
        				$(this).attr("selected","selected");
        				$("#seller_id").change();
        			}
        		});
        	});
        });	     
        });
       
	});
</script>
{@/block@}
<!--头部标签区-->
{@block name=toptags@}
<div class="smbox-toptags">
	<form method="get">
		<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;
       <div class="supplier"> 
       {@form_select onchange='this.form.submit();' header="选择供应商" options=DB::getopts('@pf_member','id,nickname',0,"type=3") name="seller_id" value="{@$sch.seller_id@}" model=$schmodel@}&nbsp;&nbsp;
		<div class="seller_cont">
        {@$info=DB::getrow('@pf_member',$sch.seller_id)@}
        {@$seller=$info['nickname']@}
		<input placeholder='选择供应商' name="seller" value="{@$seller@}" class="form-control text" style="width:160px;"/>
		</div>
		<div class="seller_select">
			<ul></ul>
		</div>
		</div>
		

		<input name="settle_time" id="settle_time" class="form-control date" style="width:100px;" placeholder="请输入开始日期" type="text" {@if $sch.settle_time@}value="{@$sch.settle_time@}" {@/if@}/>-
		<input name="settle_time_to" id="settle_time_to" class="form-control date" style="width:100px;" placeholder="请输入截至日期" type="text" {@if $sch.settle_time_to@}value="{@$sch.settle_time_to@}" {@/if@}/>		
		<input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>&nbsp;&nbsp;
	</form>

{@/block@}
<br/>
{@block name=table_topbar@}<div class="form-list"><h3>结算额</h3></div>
<table width="800" border="0" align="center" cellpadding="0" cellspacing="1" style="margin:0 auto;" class="smbox-list-table2" id="smbox-list-table2" >
	<tr>
		<th align="left" bgcolor="#f7f7f7">供应商</th>
		<th align="left" bgcolor="#f7f7f7">结算金额</th>
		<th align="left" bgcolor="#f7f7f7">退款金额</th>
		<th align="left" bgcolor="#f7f7f7">成单数量</th>
		<th align="left" bgcolor="#f7f7f7">退单数量</th>
		<th align="left" bgcolor="#f7f7f7">总金额</th>
	</tr>
	{@foreach from=$single item=report key=i@}
	<tr>
		<td align="left" bgcolor="#FFFFFF">
		    <span class="blu">{@$i|smval:'@pf_member':'nickname'@}</span>
		</td>
		<td align="left" bgcolor="#FFFFFF">
			<span class="blu">{@if $report.paid>0@}{@$report.paid@}元{@else@}-{@/if@}</span>
		</td>
		<td align="left" bgcolor="#FFFFFF">
			<span class="blu">{@if $report.refund_fees>0@}{@$report.refund_fees@}元{@else@}-{@/if@}</span>
		</td>
		<td align="left" bgcolor="#FFFFFF">
			<span class="blu">{@if $report.paid_num>0@}{@$report.paid_num@}单{@else@}-{@/if@}</span>
		</td>
		<td align="left" bgcolor="#FFFFFF">
                        <span class="blu">{@if $report.refund_num>0@}{@$report.refund_num@}单{@else@}-{@/if@}</span>
		</td>
		<td align="left" bgcolor="#FFFFFF">
			<span class="blu">{@$report.paid-$report.refund_fees|default:0@}元</span>
		</td>

	</tr>
	{@/foreach@}
	{@if !$sch.seller_id@}
		<tr>
		<td align="left" bgcolor="#FFFFFF">
		    <span class="blu">总计</span>
		</td>
		<td align="left" bgcolor="#FFFFFF">
			<span class="blu">{@if $total.paid>0@}{@$total.paid@}元{@else@}-{@/if@}</span>
		</td>
		<td align="left" bgcolor="#FFFFFF">
			<span class="blu">{@if $total.refund_fees>0@}{@$total.refund_fees@}元{@else@}-{@/if@}</span>
		</td>
		<td align="left" bgcolor="#FFFFFF">
			<span class="blu">{@if $total.paid_num>0@}{@$total.paid_num@}单{@else@}-{@/if@}</span>
		</td>
		<td align="left" bgcolor="#FFFFFF">
			<span class="blu">{@if $total.refund_num>0@}{@$total.refund_num@}单{@else@}-{@/if@}</span>
		</td>
		<td align="left" bgcolor="#FFFFFF">
			<span class="blu">{@$total.paid-$total.refund_fees|default:0@}元</span>
		</td>
	</tr>
	{@/if@}
</table>
<div class="cls"></div>
<div id="container" style="min-width:700px;height:400px;"></div>
{@/block@}

{@block name=table_ths@}
<div class="form-list">
<h3>订单详情<a onclick="return confirm('确定要导出表格吗？');" class="samao-link-minibtn" href="__SELF__/exportList?seller_id={@$sch.seller_id@}&settle_time={@$sch.settle_time@}&settle_time_to={@$sch.settle_time_to@}" style="float:right">导出表格</a></h3>
</div>
<th width="130">供应商</th>
<th width="80">订单号</th>
<th width="400">产品标题</th>
<th width="100">结算金额</th>
<th width="80">佣金比例</th>
<th width="120">状态</th>
<th width="120">结算时间</th>
<th width="100">退款金额</th>
<th width="120">结算退款时间</th>
<th width="360">结算备注</th>

{@/block@}
<!--总列数合并单元格时可用-->
{@block name=colspan@}9{@/block@}
<!--表行列-->

{@block name=table_tds@}

<td align="center">
	<span class="blu">{@$rs.seller_id|smval:'@pf_member':'nickname'@}</span>
</td>
<td align="center">
	<span class="blu">{@$rs.orderid@}</span>
</td>

<td align="left">
	<a href="/{@$rs.type@}-{@$rs.campid@}.html" target="_blank">{@$rs.title@}</a>
	({@$rs.departure_option@})
</td>
<td align="center">
	<span class="org">{@if $rs.scommision>0@}{@$rs.scommision@}</span>元{@else@}-{@/if@}
</td>
<td align="center">
	{@if $rs.scommision>0 @}{@(($rs.need_topay-$rs.scommision)/$rs.scommision*100)|sprint@}&nbsp;%{@else@}-{@/if@}
</td>
<td align="center">
	{@$rs.settle_state|case:[0,1,2,3,4,5,6,7]:['待BD审核','待高级销售审核','待财务审核','结算完成','结算退款中待bd审核','结算退款中待高级销售审核','结算退款中待财务审核','结算退款完成']@}
	
</td>
<td align="center">
	{@strtotime($rs.settle_time)|date_format:'Y-m-d'@}
</td>
<td align="center">
	{@if $rs.settle_refund_time@}{@$rs.scommision@}元{@else@}-{@/if@}
</td>
<td align="center">
	{@if $rs.settle_refund_time@}{@strtotime($rs.settle_refund_time)|date_format:'Y-m-d'@}{@else@}-{@/if@}
</td>
<td align="center">
	{@$rs.settle_remark@}
</td>
{@/block@}
{@block name=allopts@}

<div class="cls"></div>
<script>
	﻿$(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
        title: {
            text: '供应商结算饼状图'
        },
        subtitle: {
            text: '每个供应商结算金额和比例'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: '结算总金额',
            data: {@$single_pie@}
        }]
    });
});
</script>

{@/block@}

