<?php /* Smarty version Smarty-3.1.19, created on 2019-08-28 14:38:06
         compiled from ".\Apps\Home\views\libs\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4215d66214e8e4db8-57493169%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da3aa1759d4b74d8766b6ba3a5a0793d73ca4936' => 
    array (
      0 => '.\\Apps\\Home\\views\\libs\\footer.tpl',
      1 => 1551752703,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4215d66214e8e4db8-57493169',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5d66214e8e6d81_46960972',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d66214e8e6d81_46960972')) {function content_5d66214e8e6d81_46960972($_smarty_tpl) {?><!-------底部开始------>
<footer>
    <div class="footer-content">
        <ul class="site-info-legal fl">
            <li>
                <img class="footer-logo" src="../../../../public/images/footer_logo.png" alt="">
            </li>
            <li>&copy;Herlar,LLC.All rights reserved.</li>
            <li>jing Daily is a registered U.S.trademark of Herlar,LLC.</li>
            <li class="info-company">2018英赫网络科技有限公司</li>
            <li class="info-num">苏ICP备14052390号-1</li>
        </ul>
        <div class="footer-right fr">
            <ul class="footer-nav fl">
                <li><a href="/Index/news.html?column_id=1">英赫快讯</a></li>
                <li><a href="/Index/list.html?column_id=3">英赫时尚评论</a></li>
                <li><a href="/Index/list.html?column_id=4">英赫人物</a></li>
            </ul>
            <ul class="aboutus fl">
                <li><a href="/index/contact.html">关于我们</a></li>
                <li><a href="/index/contact.html">商务合作</a></li>
                <li><a href="/index/contact.html">联系我们</a></li>
            </ul>
            <ul class="footer-share fl">
                <li class="webchat">
                    <a href="javascript:">
                        <img src="../../../../public/images/footer_icon/wechat_icon.png" alt="">
                        <span>WeChat</span>
                    </a>
                </li>
                <li class="sina">
                    <a href="javascript:">
                        <img src="../../../../public/images/footer_icon/sina_icon.png" alt="">
                        <span>Sina</span>
                    </a>
                </li>
                <li class="twitter">
                    <a href="javascript:">
                        <img src="../../../../public/images/footer_icon/twitter_icon.png" alt="">
                        <span>Twitter</span>
                    </a>
                </li>
                <li class="linkedin">
                    <a href="javascript:">
                        <img src="../../../../public/images/footer_icon/in_icon.png" alt="">
                        <span>Linkedln</span>
                    </a>
                </li>
            </ul>
            <img class="webchat-code" src="../../../../public/images/article_details_icon/code.png" alt="">
        </div>
    </div>
</footer>
<!-------底部结束------>
<script>
    $('.footer-share').on('click', 'li', function () {
        console.log($(this).attr('class'));
        let aimsName = $(this).attr('class');
        let webUrl = window.location.href;
        if (aimsName == 'webchat') {
            $(this).parents('.footer-right').children('.webchat-code').toggle();
        } else if (aimsName == 'sina') {
            window.open(`http://v.t.sina.com.cn/share/share.php?url=${webUrl}&title=${document.title}`,
                '_blank')
        } else if (aimsName == 'facebook') {
            window.open(`http://www.facebook.com/sharer/sharer.php?title=${document.title}&u=${webUrl}`,
                '_blank')
        } else if (aimsName == 'twitter') {
            window.open(`http://twitter.com/intent/tweet?url=${webUrl}&text=${document.title}`, '_blank')
        } else if (aimsName == 'linkedin') {
            // $.post('https://api.linkedin.com/v1/people/~/shares', {
            //     AccessControlAllowOrigin: "*",
            //     format: {
            //         'Content-Type': 'application/json',
            //         'x-li-format': 'json',
            //         "content": {
            //             "title": "LinkedIn Developers Resources",
            //             "description": "Leverage LinkedIn's APIs to maximize engagement",
            //             "submitted-url": "http://yinghe.com",
            //         }
            //     }
            // }, function (data, status) {
            //     if (status == 200) {
            //         console.log('linkedin分享接口调用成功', data)
            //     } else if (status == 500) {
            //         console.log('500,linkedin分享接口调用失败')
            //     } else {
            //         console.log('linkedin分享接口调用失败')
            //     }
            // })
            window.open(`http://www.linkedin.com/shareArticle?url=${webUrl}`, '_blank')
        }
    })
</script><?php }} ?>
