<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{@block name="title"@}{@/block@}</title>
	<link rel="shortcut icon" href="__PUBLIC__/favicon.ico" type="image/x-icon" />
	<script src="__PUBLIC__/js/jquery-3.3.1.min.js"></script>
	{@block name="head"@}{@/block@}
</head>
<body>
{@block name="main"@}{@/block@}

<script>
	function search(){
		var searchText=$("input[name='key']").val()
		searchText = searchText.trim()
		if(searchText.length==0){
			alert("输入的内容不能为空");
			return;
		}
		/*跳转传值*/
		var searchUrl = '/search/index.html?words=' //使用encodeURI编码
		location.href = searchUrl+encodeURIComponent(searchText);
	}
	$("#headerbtn").click(function (){
		search();
	})
	/*隐藏显示*/
	$(".us_img").click(function (){
		$(".contact_us").css("display","none")
	})
	$(".tougao").click(function(){
		$(".contact_us").css("display","block")
	})
</script>
</body>
</html>