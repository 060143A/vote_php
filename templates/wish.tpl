<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>北京科技大学第八届“研师益友”评选 -- iBeiKe</title>

<link rel="stylesheet" href="./static/style/style.css" type="text/css">
<link rel="stylesheet" type="text/css" href="./wishwell/styles.css" />
<link rel="stylesheet" type="text/css" href="./wishwell/fancybox/jquery.fancybox-1.2.6.css" media="screen" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="wishwell/fancybox/jquery.fancybox-1.2.6.pack.js"></script>

<script type="text/javascript" src="./wishwell/script.js"></script>

</head>
<body>
<div id="page">
<div id="header"><a class="logo"
	href="./index.php"><img
	src="./static/images/logo.png" alt="" title=""
	border="0" /></a>
<div id="menu">
<ul>
	<li><a href="./index.php">主页</a></li>
	<li><a href="./wish.php">祝福</a></li>
	<li><a href="./index.php?p=result">投票结果</a></li>
</ul>
</div>
</div>

<h1>为老师送祝福</h1>


<div id="main">
	
	<{section name=i loop=$result}>
    <div class="note <{$result[i].color}>" style="left:<{$result[i].left}>px;top:<{$result[i].top}>px;z-index:<{$result[i].zindex}>">
		<{$result[i].text}>
		<div class="author"><{$result[i].name}></div>
		<span class="data"><{$result[i].id}></span>
	</div>
<{/section}>


    
</div>



<{include file="footer.tpl"}>