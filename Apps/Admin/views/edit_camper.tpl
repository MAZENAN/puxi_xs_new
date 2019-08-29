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
    $(".form-group").each(function(){
      var fbox2=$(this).children(".form-box2").children();
      var fbox1=$(this).children(".form-box1").text();
      var fbox1_1=$(this).children(".form-box1");
      $(this).children(".addright").click(function(){
           fbox2.val(fbox1);   
           fbox2.find("option").each(function(index, el) {
             if(fbox1==$(this).text()){
              $(this).attr("selected","selected");  
              fbox2.change();
             }
           });
           $("#linkage_area select").eq(0).children().each(function(){
             var area_val=$(this).text();
             if(fbox1_1.children().eq(0).text()==area_val){
                   $(this).attr("selected","selected");  
                   $("#linkage_area select").eq(0).change();                
             }
           });          
           $("#linkage_area select").eq(1).children().each(function(){
             var area_val=$(this).text();
             if(fbox1_1.children().eq(1).text()==area_val){
                   $(this).attr("selected","selected");  
                   $("#linkage_area select").eq(1).change();                 
             }
           });
      });
    });
   $(".add_children_btn").click(function(){
        $("#box_add_child").toggle();
        $(document).scrollTop($("#box_add_child").offset().top);
        $(document).scrollLeft($("#box_add_child").offset().left);
        });
   $(".add_parents_btn").click(function(){
        $("#box_add_parent").toggle();
        $(document).scrollTop($("#box_add_parent").offset().top);
        $(document).scrollLeft($("#box_add_parent").offset().left);
        });
   $("#box_add_child h3 a").click(function() {
        $("#box_add_child").toggle();
       });
   $("#box_add_parent h3 a").click(function() {
        $("#box_add_parent").toggle();
       });
});
</script>
<style type="text/css">
body{ font-size: 14px; color: #333; }
h1,h2,h3,h4,h5{ font-weight: normal; margin: 0;}
ul{ padding: 0; margin: 0; }
li{ list-style: none; }
.client_show_head{float: left; background: #fff; border-radius: 5px; border:1px solid #D8D8D9; padding: 15px 10px 15px 40px; overflow: hidden; margin-bottom: 20px; }
.client_show_head .head_name{ float: left; padding-top: 5px; margin-right: 50px; }
.client_show_head .head_name img{ float: left; height: 60px; }
.client_show_head .head_name h2{ float: left; color: #333; font-size: 24px; margin: 0; padding-left: 20px;  }
.client_show_head .head_name h2 p{ margin: 0; min-height: 31px; }
.client_show_head .head_name h2 span{ display: block; font-size: 14px; color: #999; margin-top: 7px; max-width: 158px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
.client_show_head ul{ float: left; padding: 0 10px 0 40px; position: relative; }
.client_show_head ul:before{ position: absolute; display: block; content: ""; border-left: 2px solid #F1F0EE; height: 54px;left: 0; top: 50%; margin-top: -27px; }
.client_show_head ul li{ font-size: 14px; color: #333; list-style: none; position: relative; padding-left: 20px; line-height: 25px; height: 25px; width: 160px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;} 
.client_show_head ul li:before{ display: block; content: ""; width: 10px; height: 10px; border-radius: 5px; background: #93c5f0;position: absolute; left: 0; top: 50%; margin-top: -5px; }
.client_show_edit{ float: left; background: #fff; margin:10px 0 0 20px; }
.client_show_edit a{ width: 80px; height: 80px; border-radius: 5px; border:1px solid #288ce2; text-align: center; font-size: 14px; color: #288ce2; display: -webkit-box; -webkit-box-align:center; -webkit-box-pack: center; background: url(../../public/images/icon_back.png) no-repeat scroll center 15px; }
.client_show_edit a:hover{ color: #0066c9; border-color: #0066c9; background: url(../../public/images/icon_back_hover.png) no-repeat scroll center 15px;  }
.client_show_edit a img{ visibility: hidden; }
.client_btn{ float: left; width: 300px; margin-top: 10px; }
.client_btn a{ display:inline-block; width: 120px; height: 30px; line-height: 30px; border-radius: 5px; border:1px solid #288ce2; text-align: center; background: #fff; margin:0 0 18px 20px; color: #288ce2; }
.client_btn a:hover{ color: #0066c9; border-color: #0066c9; }
.cls{ clear: both; }
.fl{ float: left; }
.fr{ float: right; }
i{ font-style: normal; }
.client_left{ width: 500px; }
.client_center{ width: 300px; }
.client_right{width: 300px;}
.client_box{ margin:0 20px 20px 0; }
.client_box h3{ position: relative; height: 38px; line-height: 38px; background: #288ce2; text-align: center; color: #fff; font-size: 16px; }
.client_box h3 a{ position: absolute; right: 20px; display: block; background: #fff; border-radius: 3px; font-size: 14px; color: #ff8800; width: 80px; height: 30px; line-height: 30px; top: 50%; margin-top: -15px; cursor: pointer; }
.client_box .client_list{ background: #fff; padding: 15px 0px; overflow: hidden; border:1px solid #288ce2; }
.client_box .client_list ul li{ line-height: 25px; position: relative; padding:10px 20px;}
.client_box .client_list ul li:hover{ background: #fcfcf8; }
.client_box_follow .client_list ul li:hover{ background: none; }
.client_box .client_list ul li ul li.form-control{ padding: 0; width: 96px !important; margin-bottom: 3px; }
.client_box .client_list ul li span{ position: absolute; left: 20px; top: 10px; color: #666; }
.client_box .client_list ul li dl{ padding-left: 190px; margin:0; word-wrap: break-word; }
.client_box .client_list ul li dl i{ color: #999 }
.client_box .client_list ul h4{ background: #288ce2; width: 100px; text-align: center; line-height: 25px; color: #fff; position: relative;}
.client_box .client_list ul h4:after{ position: absolute; display: block; content: "";width: 540px; border-bottom: 1px dotted #ddd; right: -560px; top: 50%; }
.client_center .client_list ul li{ padding-left: 30px;padding-bottom: 20px; }
.client_box .client_list ul li dl .form-control{ width: 470px; }
.client_box .client_list ul li dl select.form-control{ width: 476px; }
.client_box .client_list ul .form-group{ border-bottom:0; padding: 5px 0; position: relative; }
.form-group .form-box2 textarea,.form-group .form-box2 input{ width: 250px !important; }
.form-group .form-box2 select{ width: 100px; float: left; margin-right: 10px; }
.form-group .form-box2 select#Nationality,.form-group .form-box2 select#school_type{ width: 256px; }
.form-group .form-box2 ul li{ width: 50%; float: left; padding: 0; }
.form-group .form-box2 ul li input{ width: auto !important; }
.form-group .form-box2 ul{ width: 250px; }
.form-group .form-box2{ padding-left: 32px; }
.client_list ul li h5{ color: #999; font-size: 14px; position: relative;}
.client_center .client_list ul{ position: relative; }
.client_center .client_list ul:before{ display: block; content: ""; position: absolute; left: 16px; top: 10px; border-left: 1px dashed #ddd; height: 100%; }
.client_list ul li h5:before{ display: block; content: ""; width: 11px; height: 11px; border-radius: 5px; background: #93c5f0;position: absolute; left: -19px; top: 50%; margin-top: -5px; }
.client_center .client_list ul li p{ margin: 0; }
.client_right ul dd{ color: #288ce2; padding:0 0 15px 30px; margin: 0;  }
.client_50{ width: 700px; }
.client_50 .client_list ul li dl{ padding-left: 160px;  }
.samao-body{ width: 1400px; }
.client_list .form-label{ width: 120px; padding-left: 20px; }
.client_list .form-box1{ width: 210px; }
.client_box_follow .client_list ul{ padding-left: 20px; }
.client_box_follow .client_list ul li{ position: relative;}
.client_box_follow .client_list ul li:before{ display: block; content: ""; position: absolute; left: 6px; top: 27px; border-left: 1px dashed #ddd; height: 100%; }
.client_box_follow .client_list ul li h5{ color: #333; width: 210px; float: left; }
.client_box_follow .client_list ul li.add_follow{ clear: both; }
.client_box_follow .client_list ul li h5 i{ color: #999; width: 50%; display: inline-block; }
.client_box_follow .client_list ul li h5:before{ top: 13px; }
.client_box_follow .client_list ul li p{ float: left; width: 400px; margin: 0; }
.client_box_follow .client_list ul li.add_follow h5 a{ display: block; width: 120px; height: 30px; text-align: center; line-height: 30px; color: #ff8800; border-radius: 3px; border:1px solid #ff8800; }
.client_box_follow .client_list ul li.add_follow h5 a:hover{ color: #ff5500; border-color: #ff5500; }
.client_box_follow .client_list ul li.add_follow:before{ display: none; }
.form-submit-one{ width: 110px; }
.form-submit-one input.submit{ background: #288ce2; }
.form-submit-one input.submit:hover{ background: #0066c9; }
#box_add_parent,#box_add_child{ display: none; }
.addright{ width: 24px; height: 24px; border-radius: 3px; border:1px solid #ddd; font-size: 0; display: block; position: absolute; cursor:pointer; top: 50%; margin-top: -12px; }
.addright:after{position: absolute;
    content: "";
    display: block;
    color: #ddd;
    border-top: 6px solid transparent;
    border-bottom: 6px solid transparent;
    border-left: 8px solid;
    top: 50%;
    margin-top: -6px;
    width: 0px;
    height: 0px;
    left: 50%;
    margin-left: -3px;}
ul.samao-box{ margin:0; }
.form-group .form-box2 input[type=radio]{ -webkit-appearance: none; border:1px solid #d9d9d9; border-radius: 50%; width: 16px !important; height: 16px; float: left; position: relative; top: 1px;}
.form-group .form-box2 input[type=radio]:checked{ border:3px solid #00a2ca; }
input[type=checkbox]{ border-radius: 2px; width: 16px; height: 16px; -webkit-appearance: none; border:1px solid #d9d9d9; margin: 0 3px 0 0; position: relative; top: 3px;  }
input[type=checkbox]:checked{ background: url(../../public/images/checkbox.png) no-repeat; border:0; background-size: 16px; border:0; }

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
    <h2><p>{@$client.name@}</p> 
          {@if $client.wname@}<span>微信昵称：{@$client.wname@}</span>{@/if@}</h2>   
    </div>
    {@foreach from=array_slice($students,0,2) item=kid@}
    <ul>
      <li>孩子: {@$kid.c_name@}</li>
      <li>{@if $kid.age@}{@$kid.age@}岁{@/if@} {@$kid.c_gender|case:['0','1']:['女孩','男孩']@}</li>
      <li>{@$kid.school@}</li>
    </ul>
    {@/foreach@}
  </div>
  <div class="client_show_edit"><a href="__SELF__/client_show?id={@$id@}"><img src="../../public/images/icon_back.png"><br/>返回</a></div>
  <div class="client_btn">
    <a href="javascript:()" class="add_children_btn">新增学生营员</a>
     <a dialog="1"  href="__SELF__/addRord?client_id={@$id@}&type={@if $member.type == 1@}1{@elseif $member.type == 3 || $member.type ==4@}3{@/if@}&flag=1">新增跟进记录</a>
      <a href="javascript:()" class="add_parents_btn">新增家长营员</a>
  </div>
  <div class="cls"></div>
  <div class="client_50 fl">
    <div class="client_box">
        <h3>会员资料</h3>
        <div class="client_list">
            <form action="__SELF__/saveMember" method="post">
          <ul>
          <div class="form-group">
            <label class="form-label">姓名</label>
            <div class="form-box form-box1">{@$member.name@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text name='name' class='form-control text' model=$model@}</div>
          </div>  
          <div class="form-group">
            <label class="form-label">昵称</label>
            <div class="form-box form-box1">{@$member.nickname@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text name='nickname' class='form-control text' model=$model@}</div>
          </div>  
          <div class="form-group">
            <label class="form-label">性别</label>
            <div class="form-box form-box1">{@$member.gender|case:['0','1']:['女','男']@}</div>
            <a class=""></a>
            <div class="form-box form-box2">{@form_radiogroup name='gender' class='form-control ' model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">手机号码</label>
            <div class="form-box form-box1">{@$member.mobile@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text name='mobile' class='form-control text' model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">微信号（或关联手机号）</label>
            <div class="form-box form-box1">{@$member.webchat@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text name='webchat' class='form-control text' model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">微信昵称</label>
            <div class="form-box form-box1">{@$member.wname@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text name='wname' class='form-control text' model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">QQ</label>
            <div class="form-box form-box1">{@$member.QQ@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text name='QQ' class='form-control text' model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">邮箱</label>
            <div class="form-box form-box1">{@$member.email@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text name='email' class='form-control text' model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">联系电话</label>
            <div class="form-box form-box1">{@$member.telephone@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text name='telephone' class='form-control text' model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">会员生日</label>
            <div class="form-box form-box1">{@$member.birthday@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_date name='birthday' class='form-control text' model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">所在城市</label>
            <div class="form-box form-box1">{@foreach from=json_decode($member.area) item=rd@}<i>{@$rd|smval:'@pf_area'@}</i>　{@/foreach@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_linkage  name="area" model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">联系地址</label>
            <div class="form-box form-box1">{@$member.address@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_textarea  name="address" model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">备用联系人</label>
            <div class="form-box form-box1">{@$member.alternate_contact@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text name='alternate_contact' class='form-control text' model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">备用联系人电话</label>
            <div class="form-box form-box1">{@$member.contact_phone@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text name='contact_phone' class='form-control text' model=$model@}</div>
          </div>

          <h4>会员档案</h4>
          <li><span>上次登录时间</span><dl>{@if $member.last_login_time@}{@$member.last_login_time@}{@else@}-{@/if@}</dl></li>    
          <li><span>本次登录时间</span><dl>{@if $member.this_login_time@}{@$member.this_login_time@}{@else@}-{@/if@}</dl></li>    
          <li><span>错误次数</span><dl>{@if $member.errtice@}{@$member.errtice@}{@else@}-{@/if@}</dl></li>    
          <li><span>所属销售</span><dl>{@form_select name="parent_id" value={@$member.parent_id@} model=$model@}</dl></li>
          <li><span>客户来源</span><dl>{@form_select header="选择客户来源"  name="client_source" model=$model@}</dl></li>
          <li><span>感兴趣的营</span><dl>
            <ul id="interest_camp" class="samao-box">
            {@form_checkgroup  name="interest_camp" model=$model@}
            </ul>
          </dl></li>  
          <li><span>成熟度</span><dl>{@form_select header="选择成熟度"  name="level" model=$model@}</dl></li>
          <li><span>备注</span><dl>{@form_textarea  name="remark" value={@$member.remark@} model=$model@}</dl></li>       
          <h4>支付信息</h4>   
          <li><span>银行账户户名</span><dl>{@form_text  name="bank_account_name" model=$model@}</dl></li>        
           <li><span>开户行</span><dl>{@form_text  name="bank" model=$model@}</dl></li>        
            <li><span>银行账号</span><dl>{@form_text  name="bank_account" model=$model@}</dl></li>        
             <li><span>支付宝账号</span><dl>{@form_text  name="alipay" model=$model@}</dl></li>        
          </ul>
          <div class="form-submit form-submit-one">
          <input type="hidden" id="user_id" name="user_id" value="{@$id@}" />
          <input type="submit" class="submit" value="保存" id="">
        </div>
</form>
        </div>
    </div>
  </div>
  <div class="client_50 fl">
    <div class="client_box client_box_follow">
      <h3>跟进记录</h3>
      <div class="client_list">
       <ul>
            {@if $client_record@}
        {@foreach from=$client_record item=c@}
        <li><h5><dt>{@$c.add_time@}</dt> <i>{@$c.manage_id|smval:'@pf_manage'@}</i><i>{@$c.contact@}</i></h5>
          <p>{@$c.content@}</p>
           <div class="cls"></div>
         </li>
         {@/foreach @}
         {@else@}
         <li><h5>无跟进记录</h5></li>
         {@/if@}
         <li class="add_follow"><h5><a dialog="1"  href="__SELF__/addRord?client_id={@$id@}&type={@if $member.type == 1@}1{@elseif $member.type == 3 || $member.type ==4@}3{@/if@}&flag=1">新增跟进记录</a></h5>
         </li>
       </ul>
     </div>
    </div> 
{@foreach from=$children item=ch key=i@} 
<div class="client_box">
<form action="__SELF__/addKids" method="post">
    <h3>{@if $ch.id@}<a onclick="return confirm('确定要删除该内容吗？一旦删除将无法恢复，请谨慎操作！');" href="__SELF__/deleteCamper?id={@$ch.id@}">{@if $kids[$i]@}<span>清空</span>{@else@}<span>删除</span>{@/if@}</a>{@/if@}子女营员{@$i+1@}</h3>
        <div class="client_list">
          <ul>
          <div class="form-group">
            <label class="form-label">姓名</label>
            <div class="form-box form-box1">{@$kids[$i].c_name@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text  name="c_name" value={@$ch.c_name@} model=$model@}</div>
          </div>  
          <div class="form-group">
            <label class="form-label">英文名</label>
            <div class="form-box form-box1">{@$kids[$i].englishname@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text  name="englishname" value={@$ch.englishname@} model=$model@}</div>
          </div>  
          <div class="form-group">
            <label class="form-label">性别</label>
            <div class="form-box form-box1">{@$kids[$i].c_gender|case:['0','1']:['女','男']@}</div>
            <a class=""></a>
            <div class="form-box form-box2">{@form_radiogroup name='c_gender' id="c_gender{@$i@}" class='form-control ' value={@$ch.c_gender@}  model=$model@}</div>
          </div> 
              <div class="form-group">
            <label class="form-label">生日</label>
            <div class="form-box form-box1">{@$kids[$i].c_birthday@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_date name='c_birthday' id="birthday_{@$i@}" class='form-control text' value={@$ch.c_birthday@}  model=$model@}</div>
          </div> 
          <div class="form-group">
            <label class="form-label">就读学校</label>
            <div class="form-box form-box1">{@$kids[$i].school@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text  name="school" value={@$ch.school@} model=$model@}</div>
          </div> 
          <div class="form-group">
            <label class="form-label">学校类别</label>
            <div class="form-box form-box1"></div>
            <a class=""></a>
            <div class="form-box form-box2">{@form_select name="school_type" header="选择学校类别" value={@$ch.school_type@} model=$model@}</div>
          </div> 
          <div class="form-group">
            <label class="form-label">子女备注</label>
            <div class="form-box form-box1"></div>
            <a class=""></a>
            <div class="form-box form-box2">{@form_textarea  name="c_remark" value={@$ch.c_remark@} model=$model@}</div>
          </div> 
          
          <h4>健康信息</h4>
            <div class="form-group">
            <label class="form-label">身高(cm)</label>
            <div class="form-box form-box1">{@$kids[$i].height@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text  name="height" value={@$ch.height@} model=$model@}</div>
          </div> 
          <div class="form-group">
            <label class="form-label">体重(kg)</label>
            <div class="form-box form-box1">{@$kid[$i].weight@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text  name="weight" value={@$ch.weight@} model=$model@} </div>
          </div>
          <div class="form-group">
            <label class="form-label">饮食禁忌及过敏情况</label>
            <div class="form-box form-box1">{@$kid[$i].taboo_allergy@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2"> {@form_textarea  name="taboo_allergy" value={@$ch.taboo_allergy@} model=$model@}</div>
          </div> 
          <div class="form-group">
            <label class="form-label">有无重大疾病</label>
            <div class="form-box form-box1">{@$kid[$i].sickness@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_textarea  name="sickness" value={@$ch.sickness@}  model=$model@} </div>
          </div> 
          <h4>证件信息</h4>
            <div class="form-group">
            <label class="form-label">身份证号</label>
            <div class="form-box form-box1">{@$kids[$i].IDcard@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text  name="IDcard" value={@$ch.IDcard@}  model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">护照国籍</label>
            <div class="form-box form-box1">{@$kids[$i].Nationality|smval:'@pf_nationality'@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_select header="选择护照国籍" name="Nationality" value={@$ch.Nationality@} model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">护照号</label>
            <div class="form-box form-box1">{@$kids[$i].passportNo@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text  name="passportNo" value={@$ch.passportNo@}  model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">护照有效期</label>
            <div class="form-box form-box1">{@$kids[$i].valid_date@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_date name='valid_date' id="valid_{@$i@}" class='form-control text' value={@$ch.valid_date@}  model=$model@}</div>
          </div>
          </ul>
          <div class="form-submit form-submit-one">
              <input type="hidden" id="user_id" name="user_id" value="{@$id@}" />
            <input type="hidden" name="client_id" value="{@if $client['id']@}{@$client['id']@}{@else $client_id@}{@/if@}" />
            <input type="hidden" name="id" value="{@$ch.id@}" />
            <input type="submit" class="submit" name="" value="保存">
          </div>
        </div>
    </form> </div> 
{@/foreach@}
      
        {@foreach from=$genearch item=gen key=m@}
        <div class="client_box">
          <form action="__SELF__/addParent" method="post">
    <h3>{@if $gen.id@}<a onclick="return confirm('确定要删除该内容吗？一旦删除将无法恢复，请谨慎操作！');" href="__SELF__/deleteCamper?id={@$gen.id@}">{@if $parents[$m]@}<span>清空</span>{@else@}<span>删除</span>{@/if@}</a>{@/if@}家长营员{@$m+1@}</h3>
        <div class="client_list">
          <ul>
          <div class="form-group">
            <label class="form-label">姓名</label>
            <div class="form-box form-box1">{@$parents[$m].c_name@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text  name="c_name" value="{@$gen.c_name@}" model=$model@}</div>
          </div>  
          <div class="form-group">
            <label class="form-label">性别</label>
            <div class="form-box form-box1">{@$parents[$m].c_gender|case:['0','1']:['女','男']@}</div>
            <a class=""></a>
            <div class="form-box form-box2">{@form_radiogroup name='c_gender' id="c_gender_{@$m@}"  class='form-control ' value="{@$gen.c_gender@}" model=$model@}</div>
          </div>  
          <div class="form-group">
            <label class="form-label">联系电话</label>
            <div class="form-box form-box1">{@$parents[$m].phone@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text  name="phone" value="{@$gen.phone@}" model=$model@}</div>
          </div> 
           <div class="form-group">
            <label class="form-label">备注</label>
            <div class="form-box form-box1">{@$parents[$m].c_remark@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_textarea  name="c_remark" value="{@$gen.c_remark@}" model=$model@}</div>
          </div> 
          <h4>证件信息</h4>
          <div class="form-group">
            <label class="form-label">身份证号</label>
            <div class="form-box form-box1">{@$parents[$m].IDcard@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text  name="IDcard" value={@$gen.IDcard@}  model=$model@}</div>
          </div>
           <div class="form-group">
            <label class="form-label">护照国籍</label>
            <div class="form-box form-box1">{@$parents[$m].Nationality|smval:'@pf_nationality'@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_select header="选择护照国籍" name="Nationality" value="{@$gen.Nationality@}" model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">护照号</label>
            <div class="form-box form-box1">{@$parents[$m].passportNo@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_text  name="passportNo" value="{@$gen.passportNo@}" model=$model@}</div>
          </div>
          <div class="form-group">
            <label class="form-label">护照有效期</label>
            <div class="form-box form-box1">{@$parents[$m].valid_date@}</div>
            <a class="addright">添加</a>
            <div class="form-box form-box2">{@form_date name='valid_date' id="date_{@$m@}" class='form-control text' value="{@$gen.valid_date@}"  model=$model@}</div>
          </div>
          </ul>
          <div class="form-submit form-submit-one">
              <input type="hidden" id="user_id" name="user_id" value="{@$id@}" />
            <input type="hidden" name="client_id" value="{@if $client['id']@}{@$client['id']@}{@else $client_id@}{@/if@}" />
            <input type="hidden" name="id" value="{@$gen.id@}" />
            <input type="submit" class="submit" name="" value="保存">
          </div>
        </div>
        </form> </div>
    {@/foreach@}
   
    <div class="client_box" id="box_add_child">
    <h3><a href="javascript:()">删除</a>新增学生营员</h3>
        <div class="client_list">
           <form action="__SELF__/addKids" method="post">
          <ul>         
          <li><span>姓名</span><dl>{@form_text  name="c_name" @}</dl></li>    
          <li><span>英文名</span><dl>{@form_text name='englishname' @}</dl></li>    
          <li><span>性别</span><dl>{@form_radiogroup name='c_gender' value='' id="c_gender_a"  class='form-control ' model=$model@}</dl></li>
          <li><span>生日</span><dl>{@form_date name='c_birthday' class='form-control text' @}</dl></li>  
          <li><span>就读学校</span><dl>{@form_text  name="school" @}</dl></li>  
          <li><span>学校类别</span><dl>{@form_select header="选择学校类别" name="school_type" model=$model value=''@}</dl></li>  
          <li><span>备注</span><dl>{@form_textarea  name="c_remark" @}</dl></li>          
          <h4>健康信息</h4>
          <li><span>身高(cm)</span><dl>{@form_text  name="height" @}</dl></li>                      
          <li><span>体重(kg)</span><dl>{@form_text  name="weight" @}</dl></li>
          <li><span>饮食禁忌及过敏情况</span><dl>{@form_textarea  name="taboo_allergy" @}</dl></li>                      
          <li><span>有无重大疾病</span><dl>{@form_textarea  name="sickness" @}</dl></li>
          <h4>证件信息</h4>
          <li><span>身份证号</span><dl>{@form_text  name="IDcard" @}</dl></li>                      
          <li><span>护照国籍</span><dl>{@form_select header="选择护照国籍" name="Nationality" value=''  model=$model@}</dl></li>
          <li><span>护照号</span><dl>{@form_text  name="passportNo" @}</dl></li>
          <li><span>护照有效期</span><dl>{@form_date name='valid_date' id="vd"  value="" class='form-control text' model=$model@}</dl></li>
          </ul>
          <div class="form-submit form-submit-one">
              <input type="hidden" id="user_id" name="user_id" value="{@$id@}" />
            <input type="hidden" name="client_id" value="{@if $client['id']@}{@$client['id']@}{@else $client_id@}{@/if@}" />          
          <input type="submit" class="submit" value="保存" id="">
        </div>
        </form>
        </div>
    </div>
    <div class="client_box" id="box_add_parent">
        <h3><a href="javascript:()">删除</a>新增家长营员</h3>
        <div class="client_list">
          <form action="__SELF__/addParent" method="post">
          <ul>         
          <li><span>姓名</span><dl>{@form_text  name="c_name" @}</dl></li>    
          <li><span>性别</span><dl>{@form_radiogroup name='c_gender' value='' id="c_gender_b" class='form-control ' model=$model@}</dl></li>    
          <li><span>联系电话</span><dl>{@form_text  name="phone" @}</dl></li>
          <li><span>备注</span><dl>{@form_textarea  name="c_remark" @}</dl></li>       
          <h4>证件信息</h4>
          <li><span>身份证号</span><dl>{@form_text  name="IDcard" @}</dl></li>                      
           <li><span>护照国籍</span><dl>{@form_select header="选择护照国籍" name="Nationality" value='' model=$model@}</dl></li>
          <li><span>护照号</span><dl>{@form_text  name="passportNo" @}</dl></li>
          <li><span>护照有效期</span><dl>{@form_date name='valid_date' id="valid_d" class='form-control text' value="" model=$model@}</dl></li>
          </ul>
          <div class="form-submit form-submit-one">
              <input type="hidden" id="user_id" name="user_id" value="{@$id@}" />
            <input type="hidden" name="client_id" value="{@if $client['id']@}{@$client['id']@}{@else $client_id@}{@/if@}" />
          <input type="submit" class="submit" value="保存" id="">
        </div>
          </form>
        </div>
    </div>
  </div>
  <div class="cls"></div>
</div>
</body>
</html>
