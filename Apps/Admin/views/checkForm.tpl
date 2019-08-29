<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>查看报名表信息</title>
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
    {@if $kids@}
    <h3>子女营员信息</h3>
 <div class="pay3-list">
    <table id="stulist" class="infotable"   width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th width="8%" align="center" valign="middle" bgcolor="#ebf4e3">&nbsp;&nbsp;姓名</th>
        <th width="5%" align="center" valign="middle" bgcolor="#ebf4e3">性别</th>
        <th width="10%" align="center" valign="middle" bgcolor="#ebf4e3">出生日期</th>
        <th width="10%" align="center" valign="middle" bgcolor="#ebf4e3">学校</th>
        <th width="26%" align="center" valign="middle" bgcolor="#ebf4e3">证件信息</th>
        
        <th width="10%" align="center" valign="middle" bgcolor="#ebf4e3">身高cm</th>
        <th width="10%" align="center" valign="middle" bgcolor="#ebf4e3">体重kg</th>
        <th align="center" valign="middle" bgcolor="#ebf4e3">其它</th>
      </tr>
      {@foreach from=$kids item=kid@}
      <tr>
          <td align="center" valign="middle">{@$kid.c_name@}</td>
          <td align="center" valign="middle">{@$kid.c_gender|case:[0,1]:['女','男']@}</td>
          <td align="center" valign="middle">{@$kid.c_birthday@}</td>
          <td align="center" valign="middle">{@$kid.school@}</td>
          <td align="left" valign="middle">{@if $kid.IDcard@}身份证：{@$kid.IDcard@}<br />{@/if@}{@if $kid.Nationality@}国籍:{@$kid.Nationality|smval:"@pf_nationality"@}{@/if@} {@if $kid.passportNo@}护照号:{@$kid.passportNo@}{@/if@} {@if $kid.valid_date@}有效期:{@$kid.valid_date@}{@/if@}</td>
          <td align="center" valign="middle">{@$kid.height@}</td>
          <td align="center" valign="middle">{@$kid.weight@}</td>
          <td align="center" valign="middle">{@if $kid.taboo_allergy@}饮食禁忌及过敏情况:{@$kid.taboo_allergy@}{@/if@}<br />{@if $kid.sickness@}有无重大疾病:{@$kid.sickness@}{@/if@}</td>
      </tr>
      {@/foreach@}
</table>
 </div>
{@/if@}
{@if $parent@}
<h3>家长营员信息</h3>
  <div class="pay3-list">
    <table id="stulist" class="infotable"   width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th width="8%" align="center" valign="middle" bgcolor="#ebf4e3">&nbsp;&nbsp;姓名</th>
        <th width="5%" align="center" valign="middle" bgcolor="#ebf4e3">性别</th>
        <th width="10%" align="center" valign="middle" bgcolor="#ebf4e3">联系方式</th>
        <th width="14%" align="center" valign="middle" bgcolor="#ebf4e3">证件信息</th>
      </tr>
      {@foreach from=$parent item=fm@}
      <tr>
          <td align="center" valign="middle">{@$fm.c_name@}</td>
          <td align="center" valign="middle">{@$fm.c_gender|case:[0,1]:['女','男']@}</td>
          <td align="center" valign="middle">{@$fm.phone@}</td>
          <td align="left" valign="middle">{@if $fm.IDcard@}身份证：{@$fm.IDcard@}<br />{@/if@}{@if $fm.Nationality@}国籍:{@$fm.Nationality|smval:"@pf_nationality"@}{@/if@} {@if $fm.passportNo@}护照号:{@$fm.passportNo@}{@/if@} {@if $fm.valid_date@}有效期:{@$fm.valid_date@}{@/if@}</td>
      </tr>
      {@/foreach@}
</table>
  </div>
{@/if@}
{@if $others@}
<h3>其它信息</h3>
  <div class="pay3-list">
      <table id="stulist" class="infotable"   width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
              <th align="center" valign="middle" bgcolor="#ebf4e3">其它信息</th>
          </tr>
          <tr>
              <td align="center" valign="middle">{@foreach from=$others item=oth key=key@}  {@$key@}：{@$others.$key@}； &nbsp;&nbsp;{@/foreach@}</td>
          </tr>
      </table>
  </div>
{@/if@}

</div>
</body>
</html>
