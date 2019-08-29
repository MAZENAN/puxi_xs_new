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
  <div class="samao-form"> 
    <form method="post" id="formid" action="__APPROOT__/channel_camp/save_camp" onkeydown="if(event.keyCode==13)return false;">
      <div class="form-panel">
      
        <div class="search">
          <input class="form-control text"  placeholder="请输入产品名称" type="text" value="" id ="search_text" >
          <input type="button" value="查找" id ="search2" class="samao-mini-btn samao-mini-btn-search">
          <input name="camp_id" value="" id="campid" type="hidden" />
          <input name="channel_id" value="{@$id@}" id="channel_id" type="hidden" />
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
        <input type="button" class="back" value="返回" onclick="javascript:window.opener=null;window.open('','_self');window.close();">

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