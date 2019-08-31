<header id="header">
	<div class="header">
		<div class="logo">
			<a href="/"> <img src="__PUBLIC__/images/home/logohen.png" alt=""></a>
		</div>
		<div class="lists">
			<div class="title_list">
				<a href="/index/index.html">首页</a>
				<a href="/user/collect.html" id="shoucang">订阅收藏</a>
				<a href="#" class="tougao" >立即投稿</a>
				<a href="/about/index.html">关于我们</a>
			</div>

		</div>
		<div class="search">
			<div>
				<input type="text" placeholder="请输入搜索的内容" name="key" value="{@$word@}"> <button class="btn" id="headerbtn">搜索</button>
			</div>

		</div>


		{@if empty($user.id) || empty($user.name)@}
		<div class="login denglu">
			<div>
				<a href="/login/index.html">快速登录</a>
				<!--<a href="/account/register.html">注册</a>-->
			</div>
		</div>
		{@else@}
		<div class="welcome huanying">
			<div>
				<span class="sessname">{@$user.name@}</span> <a id="zhuxiao" href="/login/out.html">注销</a>
			</div>

		</div>
		{@/if@}
	</div>
	<div class="he_top"> </div>
	<div class="contact_us">
		<img class="us_img" src="__PUBLIC__/images/icon/guanbi.png" alt="">
		<p>电话：{@$customer.tel@}</p>

		<p>咨询微信：{@$customer.weixin@}</p>
		<!-- <p>投稿邮箱：88888888@qq.com </p> -->


	</div>
</header>