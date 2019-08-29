{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}{@if $user_type=='' && $key==0@}订单列表{@else if $user_type=='' && $key==4@}高级销售审核订单列表{@else if $user_type==''&& $key==2@}财务审核订单列表{@else if $user_type==''&& $key==3@}BD审核订单列表{@else if $user_type==1@}分销商订单列表{@/if@}{@/block@}
<!--头部脚本区-->
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
<style>.smbox-list-content{ width:1900px;}</style>
<script type="text/javascript">
	$("#cancel").live('click', function() {
		var order_id=$(this).attr('rel');
		if (confirm("注意：该操作不可逆，确定取消订单吗？")) {
			window.location.href="__SELF__/cancel?id="+order_id;
		};
	});
</script>
{@/block@}
<!--头部标签区-->
{@block name=toptags@}
{@if !$key@}
<div class="smbox-toptags">
	<a href="?orderid={@$sch.orderid@}&type={@$sch.type@}&user_type={@$user_type@}"{@if !isset($smarty.get.state) || $smarty.get.state===''@}class="active"{@/if@}>全部订单</a>
	{@foreach from=['0'=>'未付款','1'=>'已付款','7'=>'未填报名表','8'=>'已完成','4'=>'退款中','5'=>'已退款','6'=>'已取消'] item=xs key=ik@}
	<a href="?orderid={@$sch.orderid@}&type={@$sch.type@}&state={@$ik@}&user_type={@$user_type@}" {@if isset($smarty.get.state) && $smarty.get.state!='' && $sch.state==$ik@}class="active"{@/if@}>{@$xs@}</a>
	{@/foreach@}
</div>
{@/if@}
{@/block@}
<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
	<form method="get">
		<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>
		&nbsp;&nbsp;&nbsp;&nbsp;
		{@form_select  options=[[1,'产品标题'],[2,'订单号']] name="screen" model=$schmodel @}&nbsp;&nbsp;
		{@form_text  style="width:120px" name="content" value="{@$sch['content']@}" placeholder= '请输入查找内容' model=$model@}
		<input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>
		&nbsp;&nbsp;
		<!-- {@form_select header='产品类型' options=[['cncamp','国内营'],['glcamp','国际营']] onchange='this.form.submit();' name="type" model=$schmodel@}&nbsp;&nbsp; -->
		{@form_select header='课程顾问' onchange='this.form.submit();' name="manage_id" model=$schmodel@}&nbsp;&nbsp;
		{@if !$key@}
		{@form_select header='流转状态选择' options=[[0,'销售未确认'],['1','销售已确认'],['2','财务已确认'],['3','BD已审退款'],['4','高级销售已审退款'],['7','销售已确认退补'],['9','高级销售已审退补'],['10','财务已审退补']] onchange='this.form.submit();' name="crm_state" model=$schmodel@}&nbsp;&nbsp;
		{@/if@}
		{@form_hidden  name="state" model=$schmodel@}&nbsp;&nbsp;
		<input type="hidden" name="user_type" value="{@$user_type@}">
		<input type="hidden" name="state" value="{@$state@}">
		<input type="hidden" name="key" value="{@$key@}"></form>
</div>
{@/block@}
<!--表头列-->
{@block name=table_ths@}
<th width="30">序号</th>
<th width="150">订单号</th>
<th width="80">联系人</th>
<th width="80">客户名</th>
<th width="420">产品标题</th>
<th width="100">总费用</th>
<th width="80">状态</th>
<th width="120">下单时间</th>
<th width="80">支付方式</th>
<th width="120">支付时间</th>
<th width="120">财务确认时间</th>
<th width="120">流转状态</th>
<th width="260">操作</th>
{@/block@}
<!--总列数合并单元格时可用-->
{@block name=colspan@}9{@/block@}
<!--表行列-->
{@block name=table_tds@}
<td align="center">
	<span class="blu">{@$ttl+1@}</span>
</td>
<td align="center">
	<span class="blu">{@$rs.orderid@}</span>
</td>
<td align="center">
	<span class="blu">{@$rs.ct1_name@}</span>
</td>
<td align="center">
	{@$rs.userid|smval:'@pf_member':'username'|default:'
	<span class=hui>--</span>
	'@}
</td>
<td align="left">
	<a href="/{@if $rs.type==0@}cncamp{@else@}glcamp{@/if@}-{@$rs.campid@}.html" target="_blank">{@$rs.title@}</a>
	({@$rs.departure_option@})
</td>
<td align="center">
	<span class="org">{@$rs.need_topay@}</span>元
</td>
<td align="center">
	{@if $rs.refund==1 && $rs.state<4@}
		申请退款中({@$rs.source|case:[0,1]:['前台','后台']@})
	{@else@}
		{@$rs.state|case:[0,1,2,3,4,5,6,8,-1]:['未付款','待填资料','待付尾款','已付款','退款中','已退款','已取消','已完成','已作废']@}
		{@if $rs.apply_state==0 && $rs.state==3@}(未填写报名表){@/if@}
                {@if $rs.cert_state == 1 && $rs.state == 0@}(用户确认){@/if@}
                ({@$rs.source|case:[0,1]:['前台','后台']@})
	{@/if@}
</td>
<td align="center">
	{@strtotime($rs.addtime)|date_format:'Y-m-d'@}
</td>
<td align="center">
	{@if $rs.paytype1@}{@$rs.paytype1@}{@else@}-{@/if@}
</td>
<td align="center">
	{@strtotime($rs.paytime1)|date_format:'Y-m-d'@}
</td>
<td align="center">
	{@strtotime($rs.crm_time)|date_format:'Y-m-d'@}
</td>
<td align="center">
	{@$rs.crm_state|case:['0','1','2','3','4','7','9','10']:['销售未确认','销售已确认','财务已确认','BD已审退款','高级销售已审退款','销售已确认退补','高级销售已审退补','财务已审退补']@}
</td>
<td align="left">
	<a dialog="1" class="samao-link-minibtn" href="__SELF__/detail?id={@$rs.id@}">查看订单</a>
	{@if !$key@}
		{@if $rs.crm_state ==0 && $rs.refund == 0 &&  ($rs.state <= 3 )@}
			<a  class="samao-link-minibtn" href="__SELF__/crm_show?id={@$rs.id@}&key={@$key@}">销售确认</a>
		{@/if@}
		{@if $rs.crm_state ==0 && $rs.state==0 && $rs.refund==0 @}
			<a  class="samao-link-minibtn" href="__SELF__/topay?id={@$rs.id@}">修改金额</a>
            <a  class="samao-link-minibtn" href="__SELF__/editPeople?id={@$rs.id@}">修改订单人数</a>
		{@/if@}
		{@if $rs.source==1&&$rs.state==0 @}
			<a class="samao-link-minibtn" id="cancel" rel="{@$rs.id@}">取消</a>
		{@/if@}
		{@if  $rs.state==6 @}
			<a class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
		{@/if@}
		{@if ($rs.crm_state ==2||$rs.crm_state ==10) && ($rs.state==3) && $rs.refund==0 @}
			<a  class="samao-link-minibtn" href="__SELF__/applyRefund?id={@$rs.id@}">申请退款</a>
		{@/if@}
		{@if $rs.crm_state ==0 && $rs.state==4 && $rs.refund==1 @}
			<a  class="samao-link-minibtn" href="__SELF__/checkRefund?id={@$rs.id@}&key={@$key@}"  >审核退款</a>
		{@/if@}
		{@if ($rs.crm_state ==2||$rs.crm_state ==10) && ($rs.state>=3) && $rs.refund==0 @}
			<a  class="samao-link-minibtn" href="__SELF__/payDifference?id={@$rs.id@}&key={@$key@}">退补差价</a>
		{@/if@}
                {@if $rs.apply_state==1 && $rs.refund==0 @}
			<a dialog="1" class="samao-link-minibtn" href="__SELF__/checkForm?id={@$rs.orderid@}">查看报名表</a>
		{@/if@}
                {@if $rs.state==3 && $rs.apply_state==0 && $rs.refund==0 @}
                <div id="copy{@$rs.id@}" class="theme-address" style="font-size:0px;height:0;" >{@$url@}/order/application_show.html?order_id={@$rs.orderid@}&user_id={@$rs.userid@}</div>
                        <a class="copyaddress_{@$rs.id@} samao-link-minibtn" type="button" data-clipboard-action="copy" data-clipboard-target="#copy{@$rs.id@}">复制报名表连接</a>
                        <a  class="samao-link-minibtn" href="__SELF__/editPeople?id={@$rs.id@}">修改订单人数</a>
                {@/if@}
	{@elseif $key==4@}
		{@if ($rs.crm_state ==1 && $rs.state==4 && $rs.refund==1) || ($rs.crm_state ==3 && $rs.state==4 && $rs.refund==1)  @}
			<a  class="samao-link-minibtn" href="__SELF__/checkRefund?id={@$rs.id@}&key={@$key@}"  >审核退款</a>
		{@/if@}
		{@if $rs.crm_state ==7 && $rs.state>=3 && $rs.refund==0 @}
			<a  class="samao-link-minibtn" href="__SELF__/payDifference?id={@$rs.id@}&key={@$key@}">审核退补差价</a>
		{@/if@}
	{@elseif $key==2@}
		{@if $rs.crm_state ==1 && $rs.refund == 0 &&  $rs.state <= 3@}
			<a  class="samao-link-minibtn" href="__SELF__/crm_show?id={@$rs.id@}&key={@$key@}">财务确认</a>
		{@/if@}
		{@if $rs.crm_state ==4 && $rs.state==4 && $rs.refund==1 @}
			<a  class="samao-link-minibtn" href="__SELF__/checkRefund?id={@$rs.id@}&key={@$key@}"  >审核退款</a>
		{@/if@}
		{@if $rs.crm_state ==9 && $rs.state>=3 && $rs.refund==0 @}
			<a  class="samao-link-minibtn" href="__SELF__/payDifference?id={@$rs.id@}&key={@$key@}">审核退补差价</a>
		{@/if@}
	{@elseif $key==3@}
		{@if $rs.crm_state ==1 && $rs.state==4 && $rs.refund==1 @}
			<a  class="samao-link-minibtn" href="__SELF__/checkRefund?id={@$rs.id@}&key={@$key@}"  >审核退款</a>
		{@/if@}
	{@/if@}

</td>
<script type="text/javascript" src="__PUBLIC__/js/clipboard.min.js"></script>
<script>
var clipboard = new Clipboard('.copyaddress_{@$rs.id@}');
clipboard.on('success', function(e) {
  alert("链接已复制到剪贴板中");
  console.log(e);
});

clipboard.on('error', function(e) {
  console.log(e);
});
</script>
{@/block@}
<!--分页控件区-->		
{@block name=pagebar@}
	<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}


