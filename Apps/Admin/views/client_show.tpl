<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员详情</title>
<link rel="stylesheet" type="text/css" href="__RES__/css/form.plane.css"/>
<link href="__RES__/css/list.default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__RES__/js/jquery.js"></script>
<script type="text/javascript" src="__RES__/js/samao.validate.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
<script type="text/javascript">
$(document).ready(function(){
//隐藏无数据项
       $(".client_left .client_list ul li").each(function(){
        if($(this).find("i").text()=="()"){
          $(this).find("i").hide();
        }
        if($(this).find("p").text()==""){
          $(this).find("p").hide();
        }
        if($(this).find("p").text()=="" && $(this).find("i").text()=="()" || $(this).find("dl").text()=="" ){
          $(this).hide();
          $(this).prev("h4").hide();
        }
       });
});
</script>
<style type="text/css">
body{ font-size: 14px; color: #333; }
h1,h2,h3,h4,h5{ font-weight: normal; margin: 0;}
ul{ padding: 0; margin: 0; }
li{ list-style: none; }
.client_show_head{float: left;  background: #fff; border-radius: 5px; border:1px solid #D8D8D9; padding: 15px 10px 15px 40px; overflow: hidden; margin-bottom: 20px; }
.client_show_head .head_name{ float: left; padding-top: 5px; margin-right: 50px; }
.client_show_head .head_name img{ float: left; height: 60px; }
.client_show_head .head_name h2{ float: left; color: #333; font-size: 24px; margin: 0; padding-left: 20px;  }
.client_show_head .head_name h2 p{ margin: 0; min-height: 31px; }
.client_show_head .head_name h2 span{ display: block; font-size: 14px; color: #999; margin-top: 7px;max-width: 158px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;  }
.client_show_head ul{ float: left; padding: 0 10px 0 40px; position: relative; }
.client_show_head ul:before{ position: absolute; display: block; content: ""; border-left: 2px solid #F1F0EE; height: 54px;left: 0; top: 50%; margin-top: -27px; }
.client_show_head ul li{ font-size: 14px; color: #333; list-style: none; position: relative; padding-left: 20px; line-height: 25px; height: 25px; width: 160px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;}
.client_show_head ul li:before{ display: block; content: ""; width: 10px; height: 10px; border-radius: 5px; background: #93c5f0;position: absolute; left: 0; top: 50%; margin-top: -5px; }
.client_show_edit{ float: left; background: #fff; margin:10px 0 0 20px; }
.client_show_edit a{ width: 80px; height: 80px; border-radius: 5px; border:1px solid #288ce2; text-align: center; font-size: 14px; color: #288ce2; display: -webkit-box; -webkit-box-align:center; -webkit-box-pack: center; background: url(../../public/mb/images/edit.png) no-repeat scroll center 15px; }
.client_show_edit a:hover{ color: #0066c9; border-color: #0066c9; background: url(../../public/images/edit_hover.png) no-repeat scroll center 15px;  }
.client_show_edit a img{ visibility: hidden; }
.cls{ clear: both; }
.fl{ float: left; }
.fr{ float: right; }
.client_left{ width: 500px; }
.client_center{ width: 300px; }
.client_right{width: 300px; }
.client_box{ margin:0 20px 20px 0; }
.client_box h3{ height: 38px; line-height: 38px; background: #288ce2; text-align: center; color: #fff; font-size: 16px; }
.client_box .client_list{ background: #fff; padding: 15px 0px; overflow: hidden; border:1px solid #288ce2; }
.client_box .client_list ul li{ line-height: 25px; min-height: 25px; position: relative; padding: 0 20px; }
.client_box .client_list ul li span{ position: absolute; left: 20px; top: 0; }
.client_box .client_list ul li dl{ padding-left: 150px; margin:0 0 20px 0; word-wrap: break-word; }
.client_box .client_list ul li dl p{ display: inline; margin: 0; }
.client_box .client_list ul li dl i{ color: #999 }
.client_box .client_list ul h4{ background: #288ce2; width: 100px; text-align: center; line-height: 25px; color: #fff; position: relative;}
.client_box .client_list ul h4:after{ position: absolute; display: block; content: "";width: 340px; border-bottom: 1px dotted #ddd; right: -360px; top: 50%; }
.client_center .client_list ul li{ padding-left: 30px;padding-bottom: 20px; }
.client_center .client_list ul li h5{ color: #999; font-size: 14px; position: relative;}
.client_center .client_list ul{ position: relative; }
.client_center .client_list ul:before{ display: block; content: ""; position: absolute; left: 16px; top: 10px; border-left: 1px dashed #ddd; height: 100%; }
.client_center .client_list ul li h5:before{ display: block; content: ""; width: 11px; height: 11px; border-radius: 5px; background: #93c5f0;position: absolute; left: -19px; top: 50%; margin-top: -5px; }
.client_center .client_list ul li p{ margin: 0; }
.client_right ul dd{ color: #288ce2; padding:0 0 15px 30px; margin: 0;  }
i{ font-style: normal; }
</style>
</head>
<body>
<div class="samao-body">
  <div class="client_show_head">  
    <div class="head_name">
    {@if $client.gender==1@}
    <img src="../../public/images/icon_head2.png">
    {@else@}
     <img src="../../public/images/icon_head.png">
    {@/if@}
    <h2><p>{@$client.name@}</p> {@if $client.wname@}<span>微信昵称：{@$client.wname@}</span>{@/if@}</h2>   
    </div>
    {@foreach from=array_slice($kids,0,2) item=kid@}
    <ul>
      <li>孩子: {@$kid.c_name@}</li>
      <li>{@if $kid.age@}{@$kid.age@}岁{@/if@} {@$kid.c_gender|case:['0','1']:['女孩','男孩']@}</li>
      <li>{@$kid.school@}</li>
    </ul>
    {@/foreach@}
  </div>
  <div class="client_show_edit"><a href="__SELF__/edit_camper?id={@$member.id@}"><img src="../../public/mb/images/edit.png"><br/>编辑会员</a></div>
  <div class="cls"></div>
  <div class="client_left fl">
    <div class="client_box">
        <h3>会员资料</h3>
        <div class="client_list">
          <ul>
            <li><span>昵称</span><dl><p>{@$member.nickname@}</p>&nbsp;&nbsp;&nbsp;<i>({@$client.nickname@})</i></dl></li>
            <li><span>手机号</span><dl><p>{@$member.mobile@}</p>&nbsp;&nbsp;&nbsp;<i>({@$client.mobile@})</i></dl></li>
            <li><span>会员生日</span><dl><p>{@$member.birthday@}</p>&nbsp;&nbsp;&nbsp;<i>({@$client.birthday@})</i></dl></li>
            <li><span>微信号（或关联手机号）</span><dl><p>{@$member.webchat@}</p>&nbsp;&nbsp;&nbsp;<i>({@$client.webchat@})</i></dl></li>            
            <li><span>微信昵称</span><dl><p>{@$member.wname@}</p>&nbsp;&nbsp;&nbsp;<i>({@$client.wname@})</i></dl></li>
            <li><span>QQ</span><dl><p>{@$member.QQ@}</p>&nbsp;&nbsp;&nbsp;<i>({@$client.QQ@})</i></dl></li>
            <li><span>邮箱</span><dl><p>{@$member.email@}</p>&nbsp;&nbsp;&nbsp;<i>({@$client.email@})</i></dl></li>
            <li><span>所在城市</span><dl><p>{@foreach from=json_decode($member.area) item=ad@}{@$ad|smval:'@pf_area'@}{@/foreach@}</p>&nbsp;&nbsp;&nbsp;<i>({@foreach from=json_decode($client.area) item=rd@}{@$rd|smval:'@pf_area'@}{@/foreach@})</i></dl></li>
            <li><span>联系地址</span><dl><p>{@$member.address@}</p><i>({@$client.address@})</i></dl></li>
            <li><span>备用联系人</span><dl><p>{@$member.alternate_contact@}</p><i>({@$client.alternate_contact@})</i></dl></li>
            <li><span>备用联系人电话</span><dl><p>{@$member.contact_phone@}</p><i>({@$client.contact_phone@})</i></dl></li>
            <li><span>所属销售</span><dl>{@$member.parent_id|smval:'@pf_manage'@}</dl></li>
            <li><span>客户来源</span><dl>{@$client.client_source|smval:'@pf_client_from'@}</dl></li>
            <li><span>感兴趣的营期</span><dl>{@foreach from=json_decode($client.interest_camp) item=ic@}{@$ic|smval:'@pf_camp_holiday'@}&nbsp;&nbsp;&nbsp;{@/foreach@}</dl></li>
            <li><span>成熟度</span><dl>{@$client.level|smval:'@pf_client_intention'@}</dl></li>
            <li><span>开户行(具体分理处）</span><dl>{@$client.bank@}</dl></li>
            <li><span>开户账户</span><dl><p>{@$client.bank_account@}</p></dl></li>
            <li><span>账户户名</span><dl><p>{@$client.bank_account_name@}</p></dl></li>
            <li><span>支付宝</span><dl><p>{@$client.alipay@}</p></dl></li>

          </ul>
        </div>
    </div>
{@foreach from=$kids item=k key=i@}
    <div class="client_box">
        <h3>子女营员{@$i+1@}</h3>
        <div class="client_list">
          <ul>
            <li><span>姓名</span><dl>{@$k.c_name@}</dl></li>
            <li><span>英文名</span><dl>{@$k.englishname@}</dl></li>
            <li><span>性别</span><dl>{@$k.c_gender|case:['0','1']:['女孩','男孩']@}</dl></li>
            <li><span>生日</span><dl>{@$k.c_birthday@}</dl></li>
            <li><span>学校名称</span><dl>{@$k.school@}</dl></li>
            <li><span>学校类别</span><dl>{@$k.school_type|smval:'@pf_school_type'@}</dl></li>
            <li><span>备注</span><dl>{@$k.c_remark@}</dl></li>
            <h4>健康信息</h4>
            <li><span>身高（cm）</span><dl>{@$k.height@}</dl></li>
            <li><span>体重（kg）</span><dl>{@$k.weight@}</dl></li>
            <li><span>饮食禁忌及过敏情况</span><dl>{@$k.taboo_allergy@}</dl></li>
            <li><span>有无重大疾病</span><dl>{@$k.sickness@}</dl></li>
            <h4>证件信息</h4>
            <li><span>身份证号</span><dl>{@$k.IDcard@}</dl></li>
            <li><span>护照号</span><dl>{@$k.passportNo@}</dl></li>
            <li><span>护照国籍</span><dl>{@$k.Nationality|smval:'@pf_nationality'@}</dl></li>
            <li><span>护照有效期</span><dl>{@$k.valid_date@}</dl></li>
          </ul>
        </div>
    </div>
{@/foreach@}
{@foreach from=$parents item=p key=m@}
    <div class="client_box">
        <h3>家长营员{@$m+1@}</h3>
        <div class="client_list">
          <ul>
            <li><span>姓名</span><dl>{@$p.c_name@}</dl></li>
            <li><span>性别</span><dl>{@$p.c_gender|case:['0','1']:['女士','先生']@}</dl></li>
            <li><span>联系电话</span><dl>{@$p.phone@}</dl></li>
            <li><span>备注</span><dl>{@$p.c_remark@}</dl></li>
            <h4>证件信息</h4>
            <li><span>身份证号</span><dl>{@$p.IDcard@}</dl></li>
            <li><span>护照号</span><dl>{@$p.passportNo@}</dl></li>
            <li><span>护照国籍</span><dl>{@$p.Nationality|smval:'@pf_nationality'@}</dl></li>
            <li><span>护照有效期</span><dl>{@$p.valid_date@}</dl></li>
          </ul>
        </div>
    </div>
{@/foreach@}
  </div>
  <div class="client_center fl">
    <div class="client_box">
      <h3>跟进记录</h3>
      <div class="client_list">
       <ul>
        {@if $client_record@}
        {@foreach from=$client_record item=c@}
         <li><h5>{@$c.add_time@} {@$c.manage_id|smval:'@pf_manage'@}</h5>
          <p>{@$c.content@}</p>
         </li>
         {@/foreach @}
         {@else@}
         <li><h5>无跟进记录</h5></li>
         {@/if@}
       </ul>
     </div>
    </div>
  </div>
  <div class="client_center client_right fl">
    <div class="client_box">
      <h3>参营记录</h3>
      <div class="client_list">
       <ul>
           {@if empty($order)&&empty($buy)@}
           <li><h5>无参营记录</h5></li>
           {@else@}
         {@foreach from=$order item=xrs@}  
           <li><h5>{@$xrs.addtime@}， {@$xrs.state|case:[0,1,2,3,4,5,6,7,8,9,10,-1]:['待付订金','待填资料','待付尾款','已付款','申请退款中','已退款','已取消','准备出发','已参加','退款审批成功','退款审批失败','已作废']@}</br>{@if $xrs.manage_id@}{@$xrs.manage_id|smval:'@pf_manage'@}&nbsp;&nbsp;&nbsp;{@/if@}{@$xrs.orderid@}</h5>
          <p>{@$xrs.title@}</br>{@$xrs.departure_option@}</p>
         </li>
         {@/foreach @}
         {@if $buy@}
         <dd> 购买记录</dd>
         {@/if@}
         {@foreach from=$buy item=b@}
          <li><h5>{@$b.time@}，已参加</h5>
              <p>{@$b.title@}</p>
         </li>
         {@/foreach@}
         {@/if@}
       </ul>
     </div>
    </div>
  </div>
  <div class="cls"></div>
</div>
</body>
</html>
