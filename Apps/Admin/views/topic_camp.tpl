<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{@if $action=='edit'@}编辑{@else@}添加{@/if@}</title>
<link rel="stylesheet" type="text/css" href="__RES__/css/form.plane.css"/>
<link href="__RES__/css/list.plane.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.box_left {
  float: left;
  margin-right: 40px;
  width: 46%;
  border: 1px solid #ddd;
}
.box_right {
  float: left;
  width: 46%;
  border: 1px solid #ddd;
}
.box_right li.active {
  background: #ddd;
}
li {
  list-style: none;
}
.box ul {
  overflow: auto;
  height: 220px;
  padding: 0;
  -webkit-user-select: none;
}
.box ul li {
  height: 30px;
  line-height: 30px;
  overflow-x: hidden;
  border-bottom: 1px solid #ddd;
  padding-left: 20px;
  cursor: pointer;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.search {
  margin: 10px 0;
}
.direction dd {
  font-size: 18px;
  color: #0095bb;
  width: 30px;
  height: 30px;
  text-align: center;
}
.box_parent {
  position: relative;
}
.box_parent dd {
  cursor: pointer;
  -webkit-user-select: none;
}
.box_parent .add {
  position: absolute;
  left: 46%;
  margin-left: 10px;
  top: 20%;
}
.box_parent .del {
  position: absolute;
  left: 46%;
  margin-left: 10px;
  bottom: 20%;
}
.box_parent .up {
  position: absolute;
  right: 0;
  margin-left: 10px;
  top: 20%;
}
.box_parent .down {
  position: absolute;
  right: 0;
  margin-left: 10px;
  bottom: 20%;
}
</style>
<script type="text/javascript" src="__RES__/js/jquery.js"></script>
<script type="text/javascript" src="__RES__/js/samao.topdialog.js"></script>
<script type="text/javascript" src="__RES__/js/samao.validate.js"></script>
</head>
<body>
<div class="samao-body">
  <div class="samao-form"> {@if $action=="edit"@}
    <form method="post" id="formid" action="__SELF__/save_edit" onkeydown="if(event.keyCode==13)return false;">
    {@else@}
    <form method="post" id="formid" action="__SELF__/save_add" onkeydown="if(event.keyCode==13)return false;">
      {@/if@}
      <div class="form-panel">
        <div class="form-group">
          <label class="form-label" style="width:100px">分类标题：</label>
          <div class="form-box"> {@form_text name='category' class='form-control text' value="{@$row['category']@}" model=$model@} <span id="name_info" class="field-info"></span> </div>

            <label class="form-label" style="width:100px">标题图片：</label>
          <div class="form-box"> {@form_upimg name='img' class='form-control text' value="{@$row['img']@}" model=$schmodel@} <span id="name_info" class="field-info"></span> </div>
        </div>
        <div class="form-group">
          <label class="form-label" style="width:100px">分类排序：</label>
          <div class="form-box"> {@form_text name='sort' class='form-control text' value="{@$row['sort']@}" model=$model@} <span id="name_info" class="field-info"></span> </div>
          <label class="form-label" style="width:100px">图片URL：</label>
          <div class="form-box" style="width:402px;"> {@form_text name='img_url' class='form-control text' value="{@$row['img_url']@}" model=$schmodel@} <span id="name_info" class="field-info"></span><span class="smbox-help">例如: /order/index?id=1</span></div>
          
        </div>
         
        <div class="search">
          <input class="form-control text"  placeholder="请输入查找内容" type="text" value="" id ="search_text" >
          <input type="button" value="查找" id ="search2" class="samao-mini-btn samao-mini-btn-search">
          <input name="camp_id" value="" id="campid" type="hidden" />
        </div>
        <div style="clear:both"></div>
      </div>
      <div class="box_parent">
        <div class="box box_left">
          <ul>
          </ul>
        </div>
        <div class="box box_right">
          <ul>
            {@foreach from=$camps item=camp key=i@}
            <li data-id="{@$camp.id@}">{@$camp.id@}&nbsp;&nbsp;&nbsp;{@$camp.title@}</li>
            {@/foreach@}
          </ul>
        </div>
        <div class="direction">
          <dd class="add">→</dd>
          <dd class="del">←</dd>
          <dd class="up">↑</dd>
          <dd class="down">↓</dd>
        </div>
        <div style="clear:both"></div>
      </div>
      <div class="form-submit">
        <input type="submit" class="submit" value="提交" >
        <input type="button" class="back" value="返回" onclick="window.location.href='__SELF__/category?id={@$id@}';">
        {@form_text name='topic_id' value="{@$id@}"  class='form-control text' model=$model@}
        {@form_text name='cid' value="{@$row['id']@}"  class='form-control text' model=$model@}
        <input name="edit" value="{@$edit@}"  type="hidden" />
        <div style="clear:both"></div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  $(function(){
  //查找产品
    function search(){
       var content = $(".search .text").val();
            if (content=='') {
                return;
            };
            $.post('__SELF__/search.html',{content:content},function(data){
              if(data){ 
                if (data.status==false) {
                    alert(data.msg);
                    return;
                }
                var str = ""; 
                $.each(data,function(index,array){ 
                   str += "<li data-id='"; 
                   str += array['id']+"'>"+array['id']+"&nbsp;&nbsp;&nbsp;";
                   str += array['title']+"</li>"; 
                }); 
              }else{ 
                return false; 
              } 
           $(".box_left ul").empty();
           $(".box_left ul").append(str);          
        }, 'json');        
    }
     $("#search2").click(function(){
           search();
     });
     $("#search_text").keydown(function(event) {
      detectEnter();
     });    
      function detectEnter(event) {
        var e = event || window.event;
        var o = e.target || e.srcElement;
        var keyCode = e.keyCode || e.which; // 按键的keyCode
        if (keyCode == 13) {
            e.keyCode = 9;
            e.returnValue = false;
            $("#search2").click();
            return false; 
        }
    }
    $(function () {
        $("#search_text").keypress(function (e) { detectEnter(e); });
    });
      //on 追加元素绑定事件，
    $(".box_left ul").on("dblclick","li",function(){
      var num = $(".box_right ul li").length;
      var i = 0;
      var campid = $(this).attr("data-id");
        $(".box_right ul li").each(function(){    
        if(campid==$(this).attr("data-id")){
          return;
        }else{
          i++;
        }
      });
      if(i==num){
         $($(".box_left ul li[data-id='"+campid+"']")).clone().appendTo($(".box_right ul"));
      }
    });
        //双击右侧，消失
        $(".box_right ul").on("dblclick","li",function(){
            $(this).remove();
        });             
        //提交表单时,获取选中产品id
            var arr = new Array();
            $("form").submit(function(){
                $(".box_right ul li").each(function(){
                    arr.push($(this).attr("data-id"));
                });  
                $("#campid").val(arr);
              });
    //右侧进行排序
    var click_id=0;
        $(".box_right ul").on("click","li",function(){
          $(this).addClass("active").siblings().removeClass("active");//选中添加active，再遍历元素，未选中取消active
                click_id = $(this).attr("data-id");              
            });
            $(".up").click(function() {
                if (click_id==0) {
                    return;
                };
                if($("li[data-id='"+click_id+"']").prev()){ 
                  $(".box_right ul li[data-id='"+click_id+"']").prev().before($(".box_right ul li[data-id='"+click_id+"']"));
                  }else{
                   return;
                  }
            });
                        
            $(".down").click(function() {
                if (click_id==0) {
                return;
            };
                    if($("li[data-id='"+click_id+"']").next()){
                          $(".box_right ul li[data-id='"+click_id+"']").next().after($(".box_right ul li[data-id='"+click_id+"']"));
                    }else{
                        return;
                    } 
            });   
});
</script>
</body>
</html>