
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑专题</title>
<link rel="stylesheet" type="text/css" href="/public/samaores/css/form.plane.css"/>
<link href="/public/samaores/css/jqueryui/custom.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="/public/samaores/js/jquery.js"></script>
<script type="text/javascript" src="/public/samaores/js/samao.validate.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/samaores/js/jquery-ui.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/samaores/js/samao.topdialog.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/samaores/js/samao.upfile.js"></script>
<script type="text/javascript">
$(function() {$("#image").initAjaxUpFile({extensions:"jpg,jpeg,gif,png",upurl:"\/service\/upfile.php",type:1,afterUpfile:function(){upload_showimg('#image');}});});
$(function() {$("#recommend_img").initAjaxUpFile({extensions:"jpg,jpeg,gif,png",upurl:"\/service\/upfile.php",type:1,afterUpfile:function(){upload_showimg('#recommend_img');}});});
$(function() {$("#share_img").initAjaxUpFile({extensions:"jpg,jpeg,gif,png",upurl:"\/service\/upfile.php",type:1,afterUpfile:function(){upload_showimg('#share_img');}});});
</script>
<style type="text/css">
    .samao-form{  float: left; }
    .samao-form2{ width: 400px; float: left; }
    .samao-form2 ul{ padding: 0 0 0 20px; }
    .samao-form2 ul li{ list-style: none; width: 460px; padding: 0 10px; min-height:150px; border:1px solid #ddd;}
    .samao-form2 ul li dl{ line-height: 30px; }
    .samao-form2 ul li dl dd{ float: right; }
    .samao-form2 ul li dl span{ background: #0095bb; padding: 3px 8px; border-radius: 3px; color: #fff; }
    .samao-form2 ul li dl dd a{ margin-left: 5px; font-style: normal; padding: 2px 8px; border-radius: 3px;  cursor: pointer; }
    .samao-form2 ul li dl dd a.edit{border:1px solid #0095bb; color: #0095bb;}
    .samao-form2 ul li dl dd a.del{ color: #999;}
    .samao-form2 ul li{ margin-bottom: 10px; }
    .samao-form2 ul li h1{ font-size: 14px;  text-align: center; }
    .samao-form2 ul .btn a{ display: block; color: #fff; padding: 0 10px; line-height: 35px; background: #0095bb; border-radius: 3px; width: 120px; text-align: center; }
    .samao-form2 ul li dd{ margin-left: 10px; position: relative; }
    .samao-form2 ul li dd span{ position: absolute; left: 0;top: 0; }
    .samao-form2 ul li dd p{ padding-left: 45px; }
    .form-submit{ width: 330px; }
    .form-submit a {background: #00A2CA;border: solid 1px #00A2CA;color:#FFFFFF;}
    .form-submit a.btn{ display: block; width: 78px; height: 28px; line-height: 28px; border-radius: 3px; float: left; text-align: center; margin-right: 30px; }
</style>
</head>
<body>

<div class="samao-body">
<div class="form-title">编辑专题</div>

<div class="samao-form">
<form method="post">


<div class="form-panel"  >
<div class="form-group"  id="row_name">
    <label class="form-label"  style="width:100px">专题标题：</label>
 <div class="form-box" > {@form_text name="name" model=$model class="form-control text"@}<span id="name_info" class="field-info"></span></div>
</div>

<div class="form-group"  id="row_lead">
    <label class="form-label"  style="width:100px">导语：</label>
 <div class="form-box" >{@form_textarea name="lead" model=$model class="form-control textarea"@}</div>
</div>

<div class="form-group"  id="row_image">
    <label class="form-label"  style="width:100px">专题头图：</label>
 <div class="form-box" >{@form_upimg name="image" model=$model class="form-control upimg"@}<span class="smbox-help">750*400</span></div>
</div>

<div class="form-group"  id="row_recommend_img">
    <label class="form-label"  style="width:100px">首页推荐图：</label>
 <div class="form-box" >{@form_upimg name="recommend_img" model=$model class="form-control upimg"@}<span class="smbox-help">325*325</span></div>
</div>

<div class="form-group"  id="row_share_title">
    <label class="form-label"  style="width:100px">分享标题：</label>
 <div class="form-box" >{@form_text name="share_title" model=$model class="form-control text"@}</div>
</div>

<div class="form-group"  id="row_share_content">
    <label class="form-label"  style="width:100px">分享内容：</label>
 <div class="form-box" >{@form_textarea name="share_content" model=$model class="form-control textarea"@}</div>
</div>

<div class="form-group"  id="row_share_img">
    <label class="form-label"  style="width:100px">分享图片：</label>
 <div class="form-box" >{@form_upimg name="share_img" model=$model class="form-control upimg"@}<span class="smbox-help">300*300</span></div>
</div>

<div class="form-group"  id="row_related_topic_1">
    <label class="form-label"  style="width:100px">关联专题1：</label>
 <div class="form-box" >{@form_text name="related_topic_1" model=$model class="form-control text"@}<span id="related_topic_1_info" class="field-info"></span></div>
</div>

<div class="form-group"  id="row_related_topic_2">
    <label class="form-label"  style="width:100px">关联专题2：</label>
 <div class="form-box" >{@form_text name="related_topic_2" model=$model class="form-control text"@}<span id="related_topic_2_info" class="field-info"></span></div>
</div>

<div class="form-group"  id="row_related_topic_3">
    <label class="form-label"  style="width:100px">关联专题3：</label>
 <div class="form-box" >{@form_text name="related_topic_3" model=$model class="form-control text"@}<span id="related_topic_3_info" class="field-info"></span></div>
</div>

<div class="form-group"  id="row_related_topic_4">
    <label class="form-label"  style="width:100px">关联专题4：</label>
 <div class="form-box" >{@form_text name="related_topic_4" model=$model class="form-control text"@}<span id="related_topic_4_info" class="field-info"></span></div>
</div>

<div class="form-group"  id="row_related_topic_5">
    <label class="form-label"  style="width:100px">关联专题5：</label>
 <div class="form-box" >{@form_text name="related_topic_5" model=$model class="form-control text"@}<span id="related_topic_5_info" class="field-info"></span></div>
</div>

<div style="clear:both"></div>
</div>

<div class="form-submit">
<input type="submit" class="submit" value="提交" />
<a href="/topic/index/{@$topic_id@}.html" class="btn" target="_blank">预览</a>
<!--<input type="button" class="submit" value="预览" onclick="javascript:window.location.href='/topic/index/{@$topic_id@}.html target=_blank';" />-->
<input type="button" class="back" value="返回" onclick="javascript:window.location.href='__SELF__';" />
<div style="clear:both"></div>
</div>
</form>
</div>
<div class="samao-form2">
    
    <ul>
        {@$i=1@}
        {@foreach from=$rows item=rs@}
        <li>
            <dl><span>分类{@$i@}</span>
                <dd><a dialog="1" href="__SELF__/camp_edit?cid={@$rs.id@}&edit=edit" class="edit"  class="edit">编辑</a><a href="__SELF__/camp_delete?id={@$rs.id@}"  class="del">删除</a></dd>
            </dl>
            <h1>{@$rs.category@}</h1>
            {@foreach from =$rs.title item=title key=k@}
            {@if $title@}
            <dd><span>产品{@$k+1@}</span><p>{@$title@}</p></dd>
            {@/if@}
            {@/foreach@}
        </li>
        <span style="display:none;">{@$i++@}</span>
        {@/foreach@}
        <!--<li>
            <dl><span>分类2</span>
                <dd><i class="edit">编辑</i><i class="del">删除</i></dd>
            </dl>
            <h1>C神带你在知识的海洋中翱翔</h1>
            <p>产品1戈壁成人礼——成长路上给孩子最好的礼物</p>
             <p>产品1戈壁成人礼——成长路上给孩子最好的礼物</p>
        </li>-->
        <div class="btn"><a dialog="1" href="__SELF__/camp_add?id={@$topic_id@}&edit=edit">添加分类</a></div>
    </ul>
</div>
</div>

</body>
</html>
