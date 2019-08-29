
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员跟进记录</title>
<link rel="stylesheet" type="text/css" href="/public/samaores/css/form.plane.css"/>
<link href="/public/samaores/css/jqueryui/custom.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.validate.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/samaores/js/jquery-ui.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/samaores/js/jquery.ui.datepicker-zh-CN.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/samaores/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/samaores/js/samao.select.js"></script>
<script type="text/javascript">
$(function() {$("#add_time").datetimepicker({dateFormat:'yy-mm-dd',changeMonth: true,changeYear:true});});</script>

</head>
<body>

<div class="samao-body">
<div class="form-title">会员跟进记录</div>

<div class="samao-form">
    <form action="__APPROOT__/client_record/addPost?client_id={@$client_id@}&type={@$type@}&flag={@$flag@}" method="post">


<div class="form-panel"  >
<div class="form-group"  id="row_add_time">
    <label class="form-label"  style="width:150px">跟进时间：</label>
 <div class="form-box" >{@form_text name='add_time' class='form-control text' model=$model@}<span id="add_time_info" class="field-info"></span></div>
</div>

<div class="form-group"  id="row_manage_id">
    <label class="form-label"  style="width:150px">跟进人：</label>
 <div class="form-box" >{@form_select name="manage_id"  model=$model@}<span id="manage_id_info" class="field-info"></span></div>
</div>

<div class="form-group"  id="row_contact">
    <label class="form-label"  style="width:150px">联系方式：</label>
 <div class="form-box" >{@form_select name="contact"  model=$model@}<span id="contact_info" class="field-info"></span></div>
</div>

<div class="form-group"  id="row_content">
    <label class="form-label"  style="width:150px">跟进结果：</label>
 <div class="form-box" >{@form_textarea  name="content"  model=$model@}<span id="content_info" class="field-info"></span></div>
</div>

<div class="form-group"  style="display:none" id="row_type">
    <label class="form-label"  style="width:180px">客户类型：</label>
 <div class="form-box" >{@form_text  name="type"  model=$model@}</div>
</div>
<div class="form-group"  style="display:none" id="row_flag">
    <label class="form-label"  style="width:180px">标志：</label>
 <div class="form-box" >{@form_text  name="flag"  model=$model@}</div>
</div>



<div style="clear:both"></div>
</div>

<div class="form-submit" >
<input type="submit" class="submit" value="提交  " />
<input value="add" name="action" type="hidden" />
<div style="clear:both"></div>
</div>

</form>
</div></div>
</body>
</html>
