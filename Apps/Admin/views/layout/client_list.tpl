{@extends file='@model_list.tpl'@}
<!--标题-->
{@block name=title@}会员管理{@/block@}
{@block name=head@}
<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
{@/block@}
<!--表格顶部区域-->
{@block name=table_topbar@}
<div class="smbox-list-toptab">
<a class="samao-link-btn samao-link-btn-refresh" href="javascript:window.location.reload()">刷新</a>&nbsp;&nbsp;&nbsp;&nbsp;
<form method="get">

手机号：{@form_text  style="width:120px" name="mobile" model=$schmodel value="{@$sch.mobile@}"@}&nbsp;&nbsp;&nbsp;&nbsp;

{@form_select header='所属销售' options=$parent style="width:100px;" onchange='this.form.submit();' value="{@$sch.parent_id@}" name="parent_id" model=$model@}&nbsp;&nbsp;
{@form_select header='最近跟进时间' options=[[1,'一周内'],[2,'一个月内'],[3,'90天未跟进'],[4,'从未跟进过']] style="width:100px;" onchange='this.form.submit();' value="{@$sch.client_record@}" name="client_record" model=$model@}&nbsp;&nbsp;

{@form_select header='客户来源' options=DB::getopts('@pf_client_from',null,0) style="width:100px;" onchange='this.form.submit();' value="{@$sch.client_source@}" name="client_source" model=$model@}&nbsp;&nbsp;
<br/><div class="martop_10"></div>
<a class="samao-link-btn samao-link-btn-add" href="__APPROOT__/member/add?type=">新增</a>&nbsp;&nbsp;&nbsp;&nbsp;

年龄区间&nbsp;&nbsp;{@form_amountdigits placeholder="开始年龄"   value="{@if $sch.agefrom != ''@}{@$sch.agefrom@}{@/if@}" name="agefrom" model=$model@}&nbsp;
至&nbsp;{@form_amountdigits placeholder="结束年龄"  value="{@if $sch.ageto != ''@}{@$sch.ageto@}{@/if@}" name="ageto" model=$model@}&nbsp;&nbsp;
&nbsp;&nbsp;
{@form_select header='感兴趣的营期' options=DB::getopts('@pf_camp_holiday',null,0) style="width:100px;" onchange='this.form.submit();' value="{@$sch.interest_camp@}" name="interest_camp" model=$model@}&nbsp;&nbsp;
{@form_select header='学校类型' options=DB::getopts('@pf_school_type',null,0)  onchange='this.form.submit();' value="{@$sch.school_type@}" name="school_type" model=$model@}&nbsp;&nbsp;

{@form_select header='子女性别' options=[[1,'男'],[2,'女']]  onchange='this.form.submit();' value="{@$sch.gender@}" name="gender" model=$model@}&nbsp;&nbsp;
{@form_select header='护照国籍' options=DB::getopts('@pf_nationality',null,0)  onchange='this.form.submit();' value="{@$sch.nationality@}" name="nationality" model=$model@}&nbsp;&nbsp;
{@form_select header='购买情况' options=[[1,'已购买'],[2,'未购买']]  onchange='this.form.submit();' value="{@$sch.buy@}" name="buy" model=$model@}&nbsp;&nbsp;
{@form_select header='客户成熟度' options=DB::getopts('@pf_client_intention',null,0)  onchange='this.form.submit();' value="{@$sch.level@}" name="level" model=$model@}&nbsp;&nbsp;
{@form_select header='所属城市' options=DB::getOpts('@pf_area','id,name',0,"pid=0") style="width:80px;" onchange='this.form.submit();' value="{@$sch.area@}" name="area" model=$model@}

&nbsp;&nbsp;&nbsp;
<input type="submit" value="查找" class="samao-mini-btn samao-mini-btn-search"/>
<input type="hidden" name="type" value="{@$type@}">
<input type="hidden" name="key" value="{@$key@}">
<input type="hidden" name="status" value="{@$status@}">
</form>
</div>
{@/block@}

<!--表头列-->
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0"  class="smbox-list-table" id="smbox-list-table">
{@block name=table_ths@}
<th width="80">姓名</th>
<th width="80">微信昵称</th>                   
<th width="80">手机号码</th>  
<th width="80">城市</th>
<th width="60">参营次数</th>
<th width="80">子女</th>
<th width="80">年龄</th>
<th width="60">性别</th>
<th width="100">学校</th>
<th width="60">所属销售</th>
<th width="240">操作</th>
{@/block@}
<!--表行列rowspan="2"-->

{@foreach from=$rows item=rs key=ttl@}
{@block name=table_tds@}
<td align="center" >{@$rs.name@}</td>
<td align="center" >{@$rs.wname@}</td>
<td align="center" >{@$rs.mobile@}</td>
<td align="center" >{@foreach from=json_decode($rs.area) item=rd@}{@$rd|smval:'@pf_area'@} {@/foreach@}</td>
<td align="center" >{@$rs.num@}</td>
<td align="center">{@foreach from=$rs.kids item=kid key=i@}{@if $kid.c_name@}{@$kid.c_name@}{@else@}-{@/if@}<br />{@/foreach@}</td>
<td align="center">{@foreach from=$rs.kids item=kid key=i@}{@if $kid.age@}{@$kid.age@}{@else@}-{@/if@}<br />{@/foreach@}</td>
<td align="center">{@foreach from=$rs.kids item=kid key=i@}{@$kid.c_gender|case:[0,1]:['女','男']@}<br />{@/foreach@}</td>
<td align="center">{@foreach from=$rs.kids item=kid key=i@}{@if $kid.school@}{@$kid.school@}{@else@}-{@/if@}<br />{@/foreach@}</td>
<td align="center">{@$rs.parent_id|smval:'@pf_manage'@}</td>
<td align="center" >
<a dialog="1" class="samao-link-minibtn" href="__APPROOT__/client_record?client_id={@$rs.id@}&type={@if $rs.type == 1@}1{@elseif $rs.type == 3 || $rs.type ==4@}3{@/if@}">跟进记录</a>
<a class="samao-link-minibtn" href="__APPROOT__/member/createOrder?id={@$rs.id@}">下单</a>
<a class="samao-link-minibtn" href="__APPROOT__/member/client_show?id={@$rs.id@}">查看详情</a>
<a class="samao-link-minibtn" href="__APPROOT__/member/edit?id={@$rs.id@}">编辑</a>
<a onclick="return confirm('确定要删除该用户吗？一旦删除将无法恢复，请谨慎操作！');" class="samao-link-minibtn" href="__SELF__/delete?id={@$rs.id@}">删除</a>
</td>
{@/block@}
{@/foreach@}

</table>
<!--分页控件区-->
{@block name=pagebar@}
<div class="samao-pagebar">{@pagebar pdata=$bar@}</div>
{@/block@}