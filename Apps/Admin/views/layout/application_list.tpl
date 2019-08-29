{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}导出报名表{@/block@}
<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript">
$(function(){
     var count=0;
	 $("#btnCheckAll").live("click", function () {
                $(".checkbox").attr("checked", true);
                $("#btnCheckAll").val("取消全选");
                $("input[type='button']").attr("id",'clearCheckAll');
                count=0;
                $(".checkbox").each(function() { 
	               count += 1;
			    }); 
			    $(".check_count").html(count);
     });

	 $("#clearCheckAll").live("click", function () {
                $(".checkbox").attr("checked", false);
                $("#clearCheckAll").val("全选");
                $("input[type='button']").attr("id",'btnCheckAll');
                count=0;
                $(".check_count").html(count);
           });
	  $(".checkbox").live("click", function () {  
        if ($(this).attr("checked")) {  
            count += 1;
        }  else{
        	count -= 1;  
        }
        $(".check_count").html(count);
    });  
	$("#submit").live('click',function(){
	 	if(count==0){
	 		alert('请选择！！');
	 		return;
	}
	var the_title='';
	 	$(":checkbox[checked]").each(function(index) {
	 		var campid=$(this).val();
	 		var title=$("#same_title"+campid).attr('href');
	 		if (index==0) {
	 			the_title=title;
	 		};
	        if (title!=the_title) {
	        	alert('请选择同一产品！！');
	        	the_title='';
	 			exit;
	        };
		}); 
	 	$("#form").submit();
	 });
	
		// $("#smbox-list-table tr").each(function(){
		// 	$(this).children().click(function(event){              
		// 		if($(this).find(".checkbox").attr("checked")=="checked"){
		// 			$(this).find(".checkbox").removeAttr("checked","checked");
		// 			return false;						
		// 		}else if($(this).find(".checkbox").attr("checked",false)){				
  //                   $(this).find(".checkbox").attr("checked","checked");
  //                   return false;
		// 		}
		// 	});							
	 //    });
	});
	
</script>
<style type="text/css">
	.form-submit{ width: 380px; }
	.form-submit dt{ float: left; line-height: 30px; padding-right: 20px; }
	.form-submit input{ float: left; }
	.form-submit input{ width: 102px; }
	.form-submit dt span.check_count{ min-width:20px; text-align: center; display: inline-block; }	
    span.blu{ width: 100%; height: 100%; display: block; cursor: pointer;}
</style>
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
		{@form_select  options=[[1,'产品标题'],[2,'联系人']] name="screen" model=$schmodel @}&nbsp;&nbsp;
		{@form_text  style="width:120px" name="content" value="{@$sch['content']@}" placeholder= '请输入查找内容' model=$model@}
		&nbsp;&nbsp;
		{@form_date  name="start_date" model=$schmodel placeholder= '请输入出发日期' style="width:100px;"@}-
		{@form_date  name="start_date_to" model=$schmodel placeholder= '请输入出发日期' style="width:100px;"@}&nbsp;&nbsp;
		<input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>
		&nbsp;&nbsp;
		{@form_select header='流转状态选择' options=[[0,'销售未确认'],['1','销售已确认'],['2','财务已确认'],['7','销售已确认退补'],['9','高级销售已审退补'],['10','财务已审退补']] onchange='this.form.submit();' name="crm_state" model=$schmodel@}&nbsp;&nbsp;
		
	</form>
</div>
{@/block@}
<!--表头列-->
{@block name=table_ths@}
<form method="post" action="__SELF__/export" id="form">
<th width="30">序号</th>
<th width="30">选择</th>
<th width="80">联系人</th>
<th width="80">客户名</th>
<th width="220">产品标题</th>
<th width="220">出发时间</th>
<th width="120">下单时间</th>
<th width="120">流转状态</th>
{@/block@}
<!--总列数合并单元格时可用-->
{@block name=colspan@}9{@/block@}
<!--表行列-->
{@block name=table_tds@}

<td align="center">
	<span class="blu">{@$ttl+1@}</span>
</td>

<td align="center" ><label for="order_id{@$rs.id@}">
	<span class="blu"><input type="checkbox" name="order_id[]" class="checkbox" id="order_id{@$rs.id@}" value="{@$rs.id@}"/></span></label>
</td>
<td align="center" ><label for="order_id{@$rs.id@}">
	<span class="blu">{@$rs.ct1_name@}</span></label>
</td>
<td align="center" ><label for="order_id{@$rs.id@}">
	<span class="blu">{@$rs.userid|smval:'@pf_member':'username'|default:'--'@}</span></label>
</td>
<td align="left" >
	<a href="/{@if $rs.type==0@}cncamp{@else@}glcamp{@/if@}-{@$rs.campid@}.html" target="_blank" id="same_title{@$rs.id@}">{@$rs.title@}</a>
</td>
<td align="left"><label for="order_id{@$rs.id@}">
	<span class="blu">{@$rs.departure_option@}</span></label>
</td>
<td align="center"><label for="order_id{@$rs.id@}">
	<span class="blu">
	{@strtotime($rs.addtime)|date_format:'Y-m-d'@}</span></label>
</td>
<td align="center">
	{@$rs.crm_state|case:['0','1','2','3','4','7','9','10']:['销售未确认','销售已确认','财务已确认','BD已审退款','高级销售已审退款','销售已确认退补','高级销售已审退补','财务已审退补']@}
</td>

{@/block@}
{@block name=information@}
</form>

<div class="form-submit" >
	<dt>已选择<span class="check_count">0</span>个</dt>
<input type="button" class="back" value="全选"  id="btnCheckAll"/>
<input type="submit" class="submit" value="导出" id="submit"/>
<div style="clear:both"></div>
</div>

{@/block@}
<!--分页控件区-->		
{@block name=pagebar@}
	<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}


