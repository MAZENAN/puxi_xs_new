<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>创建订单</title>
<link rel="stylesheet" type="text/css" href="__RES__/css/form.plane.css"/>
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
.infotable th{ background-color:#f7f7f7; border-right:none; color:#676a6c; width:15%; font-weight:normal;}
.infotable td{  border-left:none;}
.infotable td .storage{font-size:14px; color:  #09F;}
.infotable td .order{font-size:14px; color:#9B410E;}
.btn_add{background:rgb(240,240,240);  height:26px; border:0; text-align:center; line-height:15px; color:#676a6c;  vertical-align:middle;}
.btn_add:active{ background:rgb(240,240,240);}
#shuliang{ height:22px; width:100px; text-align:center; border:1px solid #DDD; vertical-align:middle;}
#search_camp{    color: #FFFFFF;
    border: 0;
    padding: 0px 10px 0 25px; line-height:28px; height:28px; border-radius:4px;
	background:url(../../public/samaores/css/imgs/icon-select.png) scroll 10px center no-repeat #00A2CA;}
#search_camp:hover{background:url(../../public/samaores/css/imgs/icon-select.png) scroll 10px center no-repeat #33B5D4;}
#tourists{ padding-right:15px;}
</style>
<script type="text/javascript" src="__RES__/js/jquery.js"></script>
<script type="text/javascript" src="__RES__/js/samao.topdialog.js"></script>
<script type="text/javascript" src="__RES__/js/samao.validate.js"></script>
</head>
<body>

  <div class="samao-body">
  <div class="form-title">创建订单</div>
  <form method="post" action="__SELF__/createOrder" onSubmit="return checkInput()"> 
<div class="samao-form">
<div class="form-panel">
<div class="form-group">
    <label class="form-label" style="width:200px">产品标题:</label>
 <div class="form-box">
 <a class="samao-link-btn get_camp" id="search_camp" href="__APPROOT__/camp?client=1" dialog="1">选择产品</a>
 <span id="title"></span><span class="field-title field-val-error"></span>

     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">服务机构:</label>
 <div class="form-box">
 <span id="mechanism"></span>
     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">出发选项:</label>
 <div class="form-box">
 <span id="departure_option"></span>
     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">单　　价:</label>
 <div class="form-box">
 <span id="price" data-val="">0</span>元
     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">数　　量:</label>
 <div class="form-box">
 <input type="button" value="－" class="btn inp btn_add" /><input type="text" id='shuliang' name="shuliang" value="1" class="inp" readonly/><input type="button" value="＋" class="btn inp btn_add" />
     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">人　　数:</label>
 <div class="form-box">
 <span id="tourists" data-val=""></span><span id="parent" data-val=""></span>
     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">费用共计:</label>
 <div class="form-box">
 {@form_text name='need_topay' class='form-control text' model=$model@}  元
     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">联系人:</label>
 <div class="form-box">
 {@form_text name='ct1_name' class='form-control text' model=$model@}
     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">联系电话:</label>
 <div class="form-box">
 {@form_text name='ct1_phone' class='form-control text' model=$model@}
     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">Email:</label>
 <div class="form-box">
 {@form_text name='ct1_email' class='form-control text' model=$model@}
     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">下单时间:</label>
 <div class="form-box">
 {@form_datetime name='adddate' class='form-control text' model=$model@}
     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">备　　注:</label>
 <div class="form-box">
 {@form_textarea name='remarks' class='form-control textarea' model=$model@}
     </div>
</div>
<div class="form-group">
    <label class="form-label" style="width:200px">课程顾问:</label>
 <div class="form-box">
 {@form_select  name="manage_id" model=$model@}
     </div>
</div>
</div>
</div>
<div class="form-submit"> 
        <input type="submit" class="submit" value="提交" /> 
        <input type="button" class="back" value="返回" onclick="javascript:history.back();" /> 
        <input type="hidden" name="id"  value="{@$user_id@}"/>
        {@form_hidden name='campid' class='inp' model=$model@}
        <input type="hidden" name="date_id" id="date_id"  value=""/>
      </div>
      </form> </div>
</body>
<script>
function checkInput(){
	if($("#title").html()==""){		
		$(".field-title").html("请选择产品");		
		return false;
		}else{			
			return true;
			}
	};

    $(function () {
        $(".btn").on("click", function () {
            var _that = $(this);
            if (_that.attr("value") == '－') {
                if ((parseInt($("#shuliang").val()) - 1) > 0) {
                    $("#shuliang").val(parseInt($("#shuliang").val()) - 1);
                    $("#need_topay").val(formatCurrency($("#price").html() * parseInt($("#shuliang").val())));
                    $("#tourists").html("小："+$("#tourists").attr("data-val") * parseInt($("#shuliang").val()));
                    $("#parent").html("大："+$("#parent").attr("data-val") * parseInt($("#shuliang").val()));
                }
            }
            if (_that.attr("value") == '＋') {
                if ((parseInt($("#shuliang").val()) + 1) <= 99) {
                    $("#shuliang").val(parseInt($("#shuliang").val()) + 1);
                    $("#need_topay").val(formatCurrency($("#price").html() * parseInt($("#shuliang").val())));
                    $("#tourists").html("小："+$("#tourists").attr("data-val") * parseInt($("#shuliang").val()));
                    $("#parent").html("大："+$("#parent").attr("data-val") * parseInt($("#shuliang").val()));
                }
            }
        });

    });
    function formatCurrency(num) {
        num = num.toString().replace(/\$|\,/g, '');
        if (isNaN(num))
            num = "0";
        sign = (num == (num = Math.abs(num)));
        num = Math.floor(num * 100 + 0.50000000001);
        cents = num % 100;
        num = Math.floor(num / 100).toString();
        if (cents < 10)
            cents = "0" + cents;
        for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
            num = num.substring(0, num.length - (4 * i + 3))  +
                    num.substring(num.length - (4 * i + 3));
        return (((sign) ? '' : '-') + num + '.' + cents);
    }


</script>
</html>
