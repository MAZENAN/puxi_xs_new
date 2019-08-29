<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看订单-{@$rs.orderid@}</title>
<link rel="stylesheet" type="text/css" href="__RES__/css/form.default.css"/>
<link href="__RES__/css/list.default.css" rel="stylesheet" type="text/css" />
<style type="text/css">
html,body {
    background-color: #FFF;
}

.infotable{
border-collapse: collapse;
margin-top:5px;
}
.infotable td,.infotable th{
	line-height:24px;
	padding:5px;
	border:1px solid #ddd;
}
.infotable th{ background-color:#F2F1F0;}

.infotable td .storage{font-size:14px; color:  #09F;}
.infotable td .order{font-size:14px; color:#9B410E;}
</style>
<script type="text/javascript" src="__RES__/js/jquery.js"></script>
<script type="text/javascript" src="__RES__/js/samao.topdialog.js"></script>
</head>
<body>
<div class="samao-form">
<table class="infotable" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <th width="15%">订单号</th>
    <td ><b class="storage">{@$rs.orderid@}</b></td>
    <th width="15%">联系人</th>
    <td >{@$rs.ct1_name@}</td></td>
    </tr>
  <tr>
    <th>服务机构</th>
    <td >{@$rs.mechanism@}</td>
    <th>状态</th>
    <td> {@if $rs.refund==1 && $rs.state<4@}申请退款中{@else@}
         {@$rs.state|case:[0,1,2,3,4,5,6,8]:['待付订金','待填资料','待付尾款','准备出发','申请退款中','已退款','已取消','已参加']@}
         {@/if@}
    </td>
    </tr>
    
  <tr>
    <th>客户名称</th>
    <td>{@if $rs.userid|smval:'@pf_member':'username' != ''@}{@$rs.userid|smval:'@pf_member':'username'@}{@else if $rs.userid|smval:'@pf_member':'name' !=''@}{@$rs.userid|smval:'@pf_member':'name'@}{@else@}{@$rs.userid|smval:'@pf_member':'nickname'@}{@/if@}</td>
    <th>费　　用：</th>
    <td>
        <span class="blu">{@$rs.need_topay|money@}</span>元&nbsp;&nbsp; 
        已付金额：<span class="org">{@$rs.paid|money@}</span>元
      {@if $rs.refund >1@} ( 已退款：<span class="red">{@$rs.refund_fees|money@}</span>元 ){@/if@}
    </td>
  </tr>
  
  
   <tr>
    <th>产品标题</th>
    <td colspan="3">{@$rs.title@}</td>
  </tr>
    <tr>
    <th>出发选项</th>
    <td colspan="3">{@$rs.departure_option@}</td>
  </tr>
  
  <tr>
   {@*  <th>出发城市</th>
    <td>{@$rs.starting_city@}</td> *@}
     <th>下单时间</th>
    <td colspan="3">{@$rs.addtime|date_format:'%Y-%m-%d %H:%M:%S'@}
    </td>
  </tr>
  <tr>
   <tr>
    <th>支付时间</th>
    <td colspan="3">{@$rs.paytime1@}</td>
  </tr>
   <tr>
    <th>财务确认时间</th>
    <td colspan="3">{@$rs.crm_time@}</td>
  </tr>
    <th>课程顾问</th>
    <td colspan="3">{@$rs.manage_id|smval:'@pf_manage':'name'@}</td>
  </tr>
   {@if !empty($rs.payremark1) || !empty($rs.payremark2) @}
  <tr>
    <th>付款备注</th>
    <td colspan="3">
    {@if !empty($rs.payremark1)  @}
    <div>预付款备注：{@$rs.payremark1|htmlcode:1@}</div>
    {@/if@}
    {@if !empty($rs.payremark2)  @}
    <div>尾款备注：{@$rs.payremark2|htmlcode:1@}</div>
    {@/if@}</td>
  </tr>
  {@/if@}
   {@if !empty($rs.settle_remark) @}
  <tr>
    <th>结算备注</th>
    <td colspan="3">
    <div>预{@$rs.settle_remark|htmlcode:1@}</div>
    </td>
  </tr>
  {@/if@}
  
  
  </table>
   {@if $rs.refund >0@}
   <h3>申请退款信息</h3>
   <div class="pay3-list">
   <table class="infotable" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <th width="15%">退款联系人</th>
    <td ><b class="storage">{@$rs.contact_person@}</b></td>
    <th width="15%">联系电话：</th>
    <td ><b class="order">{@$rs.contact_phone@}</b></td>
    </tr>
   <tr>
    <th>退款原因</th>
    <td colspan="3">{@$rs.refund_reasons|htmlcode:1@}</td>
  </tr>
  
  {@if $rs.refund >1@}
   <tr>
    <th>管理员退款金额</th>
    <td colspan="3">{@$rs.refund_fees|money@} 元</td>
  </tr>
   <tr>
    <th>管理员备注</th>
    <td colspan="3">{@$rs.refund_remarks|htmlcode:1@}</td>
  </tr>
 {@/if@}

  </table>
   </div>
   {@/if@}
   
  {@if count($chids)>0@}
 <h3>参与人员</h3>
  <div class="pay3-list">
    <table id="stulist" class="infotable"   width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="8%" align="left" valign="middle" bgcolor="#ebf4e3">&nbsp;&nbsp;姓名</th>
        <th width="7%" align="center" valign="middle" bgcolor="#ebf4e3">身份</th>
        <th width="5%" align="center" valign="middle" bgcolor="#ebf4e3">性别</th>
        <th width="10%" align="center" valign="middle" bgcolor="#ebf4e3">出生日期</th>
        <th width="5%" align="center" valign="middle" bgcolor="#ebf4e3">年龄</th>
        <th width="12%" align="left" valign="middle" bgcolor="#ebf4e3">学校(家长证件)</th>
        <th width="5%" align="left" valign="middle" bgcolor="#ebf4e3">年级</th>
        <th align="left" valign="middle" bgcolor="#ebf4e3">居住地址</th>
        <th width="8%" align="left" valign="middle" bgcolor="#ebf4e3">联系电话</th>
        <th width="10%" align="left" valign="middle" bgcolor="#ebf4e3">邮箱</th>
      </tr>
      {@foreach from=$chids item=xrs@}
      <tr>
        <td align="left" valign="middle">&nbsp;&nbsp;{@$xrs.name@}</td>
        <td align="center" valign="middle" >{@$xrs.family|case:1:'家长':'学生'@}</td>
        <td align="center" valign="middle" >{@$xrs.gender@}</td>
        <td align="center" valign="middle">{@$xrs.birthday@}</td>
        <td  align="center" valign="middle">{@if $xrs.birthday@}{@$xrs.birthday|reckon@}{@/if@}</td>
        {@if $xrs.family==1@}
        <td align="center" colspan="2" valign="middle">{@$xrs.idcard|default:'-'@}</td>
        {@else@}
        <td align="center" valign="middle">{@$xrs.school|default:'-'@}</td>
        <td align="center" valign="middle">{@$xrs.grade|default:'-'@}</td>
        {@/if@}
        <td align="center" valign="middle">{@Comm::areaNames($rs.ct1_area)@}  {@$rs.ct1_address@}</td>

        <td align="left" valign="middle">{@$xrs.telephone@}</td>
        <td  align="left" valign="middle">{@$xrs.email@}</td>
      </tr>
      {@/foreach@}
    </table>
  </div>
  {@if !empty($rs.ct1_name) || !empty($rs.ct1_phone)@}
  <h3>紧急联系人</h3>
  <div class="pay1-box">
    <table  class="infotable"  width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th align="right" valign="top"></th>
        <th align="left" valign="top">联系人1</th>
        <!-- {@if !empty($rs.ct2_name)@}
        <th align="left" valign="top">联系人2</th>
        {@/if@} -->
      </tr>

      <tr>
        <th align="right" valign="top">
          <span class="tit">紧急联系人：</span>
        </th>
        <td align="left" valign="top">{@$rs.ct1_relat@}</td>
       <!--  {@if !empty($rs.ct2_name)@}
       <td align="left" valign="top">{@$rs.ct2_relat@}</td>
       {@/if@} -->
      </tr>

      <tr>
        <th width="100" align="right" valign="top">
          <span class="tit">姓　　名：</span>
        </th>
        <td align="left" valign="top">{@$rs.ct1_name@}</td>
        <!-- {@if !empty($rs.ct2_name)@}
        <td align="left" valign="top">{@$rs.ct2_name@}</td>
        {@/if@} -->
      </tr>

      <tr>
        <th align="right" valign="top">
          <span class="tit">联系电话：</span>
        </th>
        <td align="left" valign="top">{@$rs.ct1_phone@}</td>
       <!--  {@if !empty($rs.ct2_name)@}
       <td align="left" valign="top">{@$rs.ct2_phone@}</td>
       {@/if@} -->
      </tr>

      <tr>
        <th align="right" valign="top">
          <span class="tit">Email：</span>
        </th>
        <td align="left" valign="top">{@$rs.ct1_email@}</td>
        <!-- {@if !empty($rs.ct2_name)@}
        <td align="left" valign="top">{@$rs.ct2_email@}</td>
        {@/if@} -->
      </tr>

      <tr>
        <th align="right" valign="top">
          <span class="tit">居住地址：</span>
        </th>
        <td align="left" valign="top">{@Comm::areaNames($rs.ct1_area)@}  {@$rs.ct1_address@}</td>
        <!-- {@if !empty($rs.ct2_name)@}
        <td align="left" valign="top">{@Comm::areaNames($rs.ct2_area)@}  {@$rs.ct2_address@}</td>
        {@/if@} -->
      </tr>

    </table>

  </div>

  <h3>备注信息</h3>
  <div style="padding:10px 10px;">{@$rs.remarks|htmlcode:1@}</div>
  {@/if@}
{@/if@}
{@if count($order_logs)>0@}
 <h3>审核日志</h3>
  <div class="pay3-list">
    <table id="stulist" class="infotable"   width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="25%" align="center" valign="middle" bgcolor="#ebf4e3">时间</th>
        <th width="25%" align="center" valign="middle" bgcolor="#ebf4e3">审核人</th>
        <th width="25%" align="center" valign="middle" bgcolor="#ebf4e3">环节</th>
        <th width="25%" align="center" valign="middle" bgcolor="#ebf4e3">审核结果</th>
      </tr>
      {@foreach from=$order_logs item=xrs@}
      <tr>
        <td align="center" valign="middle">&nbsp;&nbsp;{@$xrs.add_time@}</td>
        <td align="center" valign="middle" >{@$xrs.manage_id|smval:'@pf_manage':'name'@}</td>
        <td align="center" valign="middle" >{@$xrs.type|case:['1','2','3','4','6','7','8','9','10','11','12','13']:['财务审核已付款','销售审核退款','高级销售审核退款','财务审核退款','高级销售审核退补差价','财务审核退补差价','BD审核退款','BD修改供应商结算价格','高级销售修改供应商结算价格','BD审核供应商结算','高级销售审核供应商结算','财务审核供应商结算']@}</td>
        <td align="center" valign="middle">{@$xrs.log@}</td>
      </tr>
      {@/foreach@}
    </table>
  </div>
{@/if@}
{@if count($corr_fees)>0@}
 <h3>业绩修正值</h3>
  <div class="pay3-list">
    <table id="stulist" class="infotable"   width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <th width="20%" align="center" valign="middle" bgcolor="#ebf4e3">添加时间</th>
        <th width="20%" align="center" valign="middle" bgcolor="#ebf4e3">类型</th>
        <th width="20%" align="center" valign="middle" bgcolor="#ebf4e3">金额</th>
        <th width="20%" align="center" valign="middle" bgcolor="#ebf4e3">状态</th>
        <th width="20%" align="center" valign="middle" bgcolor="#ebf4e3">审核时间</th>
      </tr>
      {@foreach from=$corr_fees item=xrs @}
      <tr>
        <td align="center" valign="middle">&nbsp;&nbsp;{@$xrs.add_time@}</td>
        <td align="center" valign="middle" >{@$xrs.type|case:1:'加':'减'@}</td>
        <td align="center" valign="middle" >{@$xrs.fees@}</td>
        <td align="center" valign="middle">
          {@if $xrs.state==1@}审核成功
          {@elseif $xrs.state==2@}审核失败
          {@elseif $rs.crm_state==7@}等待高级销售审核
          {@elseif $rs.crm_state==9@}等待财务审核
          {@else@}审核失败
          {@/if@}
        </td>
        <td align="center" valign="middle" >{@$xrs.check_time@}</td>
      </tr>
      {@/foreach@}
    </table>
  </div>
{@/if@}

</div>
</body>
</html>
