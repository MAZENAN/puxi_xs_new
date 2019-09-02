{@extends file='libs/layout1.tpl'@}
{@block name=title@}注册{@/block@}
{@block name=head@}
<link rel="stylesheet" href="__PUBLIC__/css/home/reset.css">
<link rel="stylesheet" href="__PUBLIC__/css/home/login.css">
<link rel="stylesheet" href="__PUBLIC__/css/home/header.css"><!--头部样式-->
<link rel="stylesheet" href="__PUBLIC__/css/home/footer.css"><!--底部样式-->
<script type="text/javascript" src="__PUBLIC__/mb/js/jquery.min.js"></script>
<script type="text/javascript" src="__RES__/js/samao.validate.js"></script>
<script type="text/javascript" src="__RES__/js/samao.timebtn.js"></script>
{@/block@}
{@block name=main@}
{@include file="libs/header.tpl"@}
<div class="loginbox">
    <div class="head">
        <img src="__PUBLIC__/images/home/toux.png" alt="">
    </div>
    <div class="cue">
        欢迎登录
        <span class="tishi"></span>
    </div>
    <form action="/login/login_msg.html" ajax="true">
    <div class="case">
        {@form_text name="mobile" id="account"  autocomplete="off" model=$model@}<br>
       <!-- <input type="password" name="password" id="password" placeholder="密码"><br>-->
        <div class="codes" style="display: inline-block;">
        {@form_text class="code"  style="width: 60px" name="code" autocomplete="off" id="captcha" model=$model@}
            <!--<img src="" alt="验证码" id="code">-->
            <input type="button" id="timebtn" value="获取验证码" style="width: 150px"/>
            <!--<a href="javascript:void(0)" onclick="change()">换一个</a>-->
            <!-- <span class="numcode"></span> -->
        </div>
        <button class="login_btn" type="submit">快速登录</button>
    </div>
    </form>
   <!-- <a href="/account/findpwd/vertify">忘记密码?</a><a href="/account/register}">立即注册</a>-->
    <div class="party">
        <img src="__PUBLIC__/images/home/logohen.png" alt="">
    </div>
</div>

<div class="phone-err">
    <img class="us_img" src="__PUBLIC__/images/icon/guanbi.png" alt="">
    <p>手机号格式不正确</p>
</div>
{@include file="libs/footer.tpl"@}
<script type="text/javascript">
    var countdown = 60;
    $("#timebtn").click(function (){
        sendyzm($("#timebtn"));
    });
    //用ajax提交到后台的发送短信接口
    function sendyzm(obj){
        var phone = $("#account").val();
        var result = isPhoneNum();
        if(result) {
            $.ajax({
                url:"/login/sendmbcode.html",
                data:{mobile:phone},
                dataType:"json",
                type:"post",
                async : false,
                cache : false,
                success:function(res){
                    if(res.success){
                        alert(res.success);
                    }else if (res.error) {
                        alert(res.error);
                    }
                },
                error:function(){
                    alert("验证码发送失败");
                }
            })
            setTime(obj);//开始倒计时
        }
    }

    //60s倒计时实现逻辑

    function setTime(obj) {
        if (countdown == 0) {
            obj.prop('disabled', false);
            obj.val("获取验证码");
            countdown = 60;//60秒过后button上的文字初始化,计时器初始化;
            return;
        } else {
            obj.prop('disabled', true);
            obj.val("("+countdown+"s)后重新发送") ;
            countdown--;
        }
        setTimeout(function() { setTime(obj) },1000) //每1000毫秒执行一次
    }


    //校验手机号是否合法
    function isPhoneNum() {
        var phonenum = $("#account").val();
        var reg = /^1[34578]\d{9}$/;
        if (!reg.test(phonenum)) {

            $(".phone-err").css("display","block");
            return false;
        } else {
            return true;
        }
    }

    $('form').on('success', function (ev, data) {
        //document.getElementById('codeimg').src = '{ @ #SERVICE_VALIDCODE_URL# @}?r=' + Math.random();
        if (data.error) {
            alert(data.error);
            return false;
        }

        if (data.url) {
            setTimeout(function () {
                window.location = data.url;
            }, 1000);
        }
        return false;
    });
 /*手机号错误显示*/
    $(".us_img").click(function (){
        $(".phone-err").css("display","none")
    })
</script>
{@/block@}