<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>报名表预览</title>
<script type="text/javascript" src="__PUBLIC__/js/jquery.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.jslides.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/simplefoucs.js"></script>
<script type="text/javascript" src="__RES__/js/samao.validate.js"></script>
<link rel="shortcut icon" href="__PUBLIC__/images/favicon.ico" />
<link rel="stylesheet" href="__PUBLIC__/mb/css/preview.css" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<style>

</style>
 <script type="text/javascript">
  {*    $(document).ready(function(){  
          var ref=0;
          var p_ref=0;
          $(".select_kid").click(function(event) {
              $(".kids_name").show();
              ref = $(this).attr("ref");//当前模块排序  
          });
          $(".children").click(function(){             
                var info = $(this).attr("info");          
                var s =$.parseJSON(info);
                for(var key in s){
                    if($("input[name="+key+ref+"]").attr("type")=='radio'||$("input[name="+key+ref+"]").attr("type")=='select'){
                       $(".kids #"+key+ref+"_"+s[key]).attr("checked","checked");
                     }else{
                      $(".kids #"+key+ref).val(s[key]);
                    }
                }
                $(".kids_name").hide();
            });
        
        $(".select_parent").click(function(event) {
              $(".parents_name").show();
              p_ref = $(this).attr("ref");//当前模块排序 

          });   
        $(".patriarch").click(function(){
            var info = $(this).attr("info");
            var s =$.parseJSON(info);       
                for(var key in s){
                    if (key=='c_name') {
                      $(".parents #p_name"+p_ref).val(s[key]);
                    }else if (key=='c_gender') {
                       $(".parents #p_gender"+p_ref+"_"+s[key]).attr("checked","checked");
                    }else if (key=='IDcard') {
                      $(".parents #p_IDcard"+p_ref).val(s[key]);
                    }else{
                      if($("input[name="+key+p_ref+"]").attr("type")=='radio'||$("input[name="+key+p_ref+"]").attr("type")=='select'){
                       $(".parents #"+key+p_ref+"_"+s[key]).attr("checked","checked");
                     }else{
                      $(".parents #"+key+p_ref).val(s[key]);
                    }
                    }                    
                }
                $(".parents_name").hide();
        });
              $(".close").click(function(){
                $(this).parent().hide();
              });
      });*}
    </script>
</head>
<body>
<div class="page">
<header class="head">
  <h2>{@$form_info['title']@}</h2>
</header>
<div class="banner"> <img src="{@$form_info['img']|minimg:640:402:1@}" width="100%" /> </div>
<div class="content"> 
<h4>快来报名吧！</h4>
    <p>
{@$form_info['info']@}
</p>
<br>
<p>课程名称 : <label>探秘疯狂动物城，畅游童话世界——千叶亲子营</label></p><br>
<p>开营日期 : <label>2016-10-21</label></p>
  <form action="add.html"  method="post">
    {@if !empty($rows0)@}
    <h2>子女信息</h2>
    

    <div class="kids_name">
    <div class="close">
      <img src="../../../public/images/special/close.png" width="15" />
    </div>
    </div>

    <div class="kid_parent">
        <ul class="kids">
              
      {@foreach from=$rows0 item=rs key=i@}
      <li>
        {@if $i == 0@}
        <dt>
          <span>学生信息1</span>
          <span class="select_kid" ref="{@$i@}">选择子女</span></dt>
          <input type="hidden" name="camper_id{@$i@}" id="camper_id{@$i@}" value="">
        {@/if@}
        
        <p>{@$rs.name@}</p>
        {@if $rs.type == 'text'@}
        {@form_text  name="{@$rs.field@}" id="{@$rs.field@}"  class='inp inp1' model=$model@}
        {@else if $rs.type == 'radiogroup'@}
        {@form_radiogroup  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'checkgroup'@}
        {@form_checkgroup  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'input'@}
        {@form_input  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'linkage'@} 
        {@form_linkage  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'select'@} 
        {@form_select  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'textarea'@} 
        {@form_textarea  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'date'@} 
        {@form_date  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@/if@}
      </li>
      {@/foreach@}

      </ul>
    </div>
    {@/if@}
        
  {@if !empty($rows1)@}
  <h2>家长营员信息</h2>
 
  <div class="parents_name">
  <div class="close">
      <img src="../../../public/special/close.png" width="15">
    </div>
 
  </div>
  <div class="parent_par"><ul class="parents">
    {@foreach from=$rows1 item=rs key=j@}
    <li>
      {@if $j == 0@}
        <dt><span class="select_parent" ref="{@$j@}">选择家长</span>
          <span>家长信息1</span>   </dt> 
        <input type="hidden" name="p_camper_id{@$j@}" id="p_camper_id{@$j@}" value="">
      {@/if@}
      <p>{@$rs.name@}</p>
      {@if $rs.type == 'text'@}
        {@form_text  name="{@$rs.field@}" id="{@$rs.field@}"  class='inp inp1' model=$model@}
        {@else if $rs.type == 'radiogroup'@}
        {@form_radiogroup  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'checkgroup'@}
        {@form_checkgroup  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'input'@}
        {@form_input  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'linkage'@} 
        {@form_linkage  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'select'@} 
        {@form_select  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'textarea'@} 
        {@form_textarea  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'date'@} 
        {@form_date  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@/if@}
     <span id="c_name_info" class="field-val-error"></span></li>
    {@/foreach@}
    </ul></div>
    {@/if@}
  
    {@if !empty($rows2)@}
    <h2>其它</h2>
   
    <li>
      <p class="yellow"></p>
    </li>
    <label></label>
    <a class="addparent"></a> 
    {@/if@}
    <ul class="">
      {@foreach from=$rows2 item=rs@}
      <li>
        <p>{@$rs.name@}</p>
        {@if $rs.type == 'text'@}
        {@form_text  name="{@$rs.field@}" id="{@$rs.field@}"  class='inp inp1' model=$model@}
        {@else if $rs.type == 'radiogroup'@}
        {@form_radiogroup  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'checkgroup'@}
        {@form_checkgroup  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'input'@}
        {@form_input  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'linkage'@} 
        {@form_linkage  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'select'@} 
        {@form_select  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'textarea'@} 
        {@form_textarea  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@else if $rs.type == 'date'@} 
        {@form_date  name="{@$rs.field@}" id="{@$rs.field@}" class='inp inp1' model=$model@}
        {@/if@}
        <span id="c_name_info" class="field-val-error"></span> </li>
      {@/foreach@}
      
    </ul>
    <div class="form-submit">
        <input type="button" class="submit" value="返回" onclick="window.location.href='__SELF__/form';">
        <div style="clear:both"></div>
      </div>
  </form>
</div>
</div>
</body>
</html>