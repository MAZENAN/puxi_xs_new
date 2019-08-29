<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>报名表详情</title>
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
.infotable th{ background-color:#F2F1F0; border-right:none;}
.infotable td{  border-left:none;}
.infotable td .storage{font-size:14px; color:  #09F;}
.infotable td .order{font-size:14px; color:#9B410E;}
.form-list h3{ display: inline-block; margin-right: 15px;}
</style>
<link href="__RES__/css/form.plane.css" rel="stylesheet" type="text/css" />
<link href="__RES__/css/list.plane.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__RES__/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.topdialog.js"></script>
<script type="text/javascript">
$("document").ready(function(){
 
  $("input[type='checkbox']").live('click',function(){
      var id =$(this).attr("id");
      var req =$(this).attr("checked");
      var required = '';
        required = 0;
      if(req != undefined){
          required = 1;
        }

     window.location.href="__SELF__/click?required="+required+"&id="+id;
  });
});
</script>
</head>
<body>

<div class="samao-body">

 <div class="form-title">报名表详情</div>
<div class="samao-form">
<div class="form-panel">
<div class="form-group">
    <label class="form-label" style="width:200px">报名表名称:</label>
 <div class="form-box">{@form_text name="title" model=$model@}</div>
   
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">标题图片:</label>
 <div class="form-box">{@form_upimg name="img" model=$model@}</div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">表头信息:</label>
 <div id="ajax" class="form-box">{@form_textarea name="info"  model=$model@}</div>
</div>
<div style="clear:both"></div>
</div>

</div>
  <div class="form-list"><a class="samao-link-btn samao-link-btn-add" href="__SELF__/form_edit?type=1&id={@$base_id@}">编辑</a></div>
                     <div class="pay1-box">
                    <table id="stulist" class="smbox-list-table"   width="100%" border="0" cellspacing="0" cellpadding="0" >
                            <tr>
                                <th width="8%" align="center" valign="middle" bgcolor="#ebf4e3">&nbsp;&nbsp;序号</th>
                               
                                <th width="15%" align="center" valign="middle" bgcolor="#ebf4e3">选项名称</th>
                                <th width="15%" align="center" valign="middle" bgcolor="#ebf4e3">组别</th>
                                <th width="10%" align="center" valign="middle" bgcolor="#ebf4e3">非必填项</th>
                                <th width="10%" align="center" valign="middle" bgcolor="#ebf4e3">排序</th>
                              
                                <th width="8%" align="center" valign="middle" bgcolor="#ebf4e3">操作</th>
                                
                          </tr>
                            {@foreach from=$rows item=rs@}
                            <form method="post" action="editsort">
                           <tr>
                               
                                <td align="center" valign="middle" ><input type="hidden" name="id[]" value="{@$rs.id@}"><input type="hidden" name="extend_id" value="{@$rs.extend_id@}">{@$rs.id@}</td>
                                <td align="center" valign="middle" >{@$rs.name@}</td>
                                <td align="center" valign="middle" >{@$rs.pid|smval:'@pf_form_node':'name'@}</td>
                                <td align="center" valign="middle"><input type="checkbox" value="{@$rs.id@}" name="required[]" {@if $rs.req == 1@}checked  disabled="disabled"{@/if@}{@if $rs.required==1@}checked{@/if@} id="{@$rs.extend_id@}" req="{@$rs.required@}"></td>
                                <td  align="center"><input type="hidden" name="sorts[]" value="{@$rs.sort@}">{@$rs.sort|sortopt:$rs.extend_id:1:0@}</td>
                                <td  align="center" valign="middle"><a href="__SELF__/delete_extend?id={@$rs.extend_id@}">删除</a></td> 
                                
                                
                                 </tr>
                                 </form >
                            {@/foreach@}

                        </table>
                        
                        </div>
 
<div class="form-submit">
  <input type="button" class="submit" value="返回" onclick="window.history.go(-1);">
<div style="clear:both"></div>
</div>
</div>
</body>
</html>
