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
.infotable th{ background-color:#f2f1f0; border-right:none;}
.infotable td{  border-left:none;}
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
    <th width="15%">用户名</th>
    <td ><b class="storage">{@$rs.username@}</b></td>
    <th width="15%">昵称</th>
    <td ><b class="order">{@$rs.nickname@}</b></td>
    </tr>
  <tr>
    <th>电子邮箱</th>
    <td >{@$rs.email@}</td>
    <th>手机号码</th>
    <td>{@$rs.mobile@}</td>
    </tr>
  </table>
  
<div style="line-height:24px; margin-top:10px; padding:5px; background:#F1F1F1; border-bottom:1px solid #DDD; font-weight:bold;">基本资料</div>
   <div class="pay3-list">
   <table class="infotable" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
    <th width="15%">姓名</th>
    <td ><b class="storage">{@$rs.name@}</b></td>
    <th width="15%">联系电话：</th>
    <td >{@$rs.telephone@}</td>
    </tr>
   <tr>
    <th>居住地址</th>
    <td colspan="3">{@Comm::areaNames($rs.area)@} {@$rs.address@}</td>
  </tr>
  
  <tr>
    <th>邮件地址</th>
    <td colspan="3">{@$rs.express_address@}</td>
  </tr>
  

   <tr>
    <th>备注</th>
    <td colspan="3">{@$rs.remark|htmlcode:1@}</td>
  </tr>
  </table>
</div>

</div>
</body>
</html>
