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
<!--{{ @include file="libs/header.tpl" @} -->
{@block name="main"@}{@/block@}
<!--{ @include file="libs/footer.tpl"@}-->
</body>
</html>