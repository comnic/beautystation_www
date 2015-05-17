<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Beauty Station</title>
<link href="/static/css/boilerplate.css" rel="stylesheet" type="text/css">

<!-- Bootstrap -->
<link href="/static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<!-- link href="/static/lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" -->

<link href="/static/css/common.css" rel="stylesheet" type="text/css">

<script type="text/javascript" src="/static/lib/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/static/lib/jquery/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="/static/lib/jquery/jquery.scrollUp.min.js"></script>

<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="/static/js/respond.min.js"></script>
<script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>
<style>
	body{padding-top:20px;}
	#beautystationMain{padding-bottom:20px;}
	#topNavbar{height: 20px;}
	#SNSList{margin-top:-2px;}
	#innerMenuList>li>a,#topMenuList>ul>li>a{padding:0px;color:white;}
	#topMyMenu{font-size:11px; margin-top:2px;color:white;}
	#topMenuList{margin-left:386px;}
	#topMyMenu{display:none;}
	#topMenuList{display:none;}
	.navbar{min-height:20px;}
	#scrollUp {
	  bottom: 44px;
	  right: 74px;
	  padding: 10px 20px;
	  background: #555;
	  color: #fff;
	}
</style>
</head>
<body>
<div id="beautystationMain" class="container">

<div class="navbar navbar-fixed-top">

	<div id="topNavbar" class="navbar-inner">
		<div class="container">
			<div id="topMyMenu" class=" pull-left">
				<ul class="list-inline">
					<li><img src="https://graph.facebook.com/comnics/picture" class="img-circle" width="15" height="15"></li>
					<li>My page</li>
					<li>담은 컨텐츠</li>
					<li>추천 컨텐츠</li>
					<li>추천 상품</li>
				</ul>
			</div>
			<div id="topMenuList" class="nav pull-left">
				<ul class="nav navbar-nav">
					<li><a href="#">MY PAGE</a></li>
					<li><a href="#">CONTENTS</a></li>
					<li><a href="#">PRODUCT</a></li>
					<li><a href="#">EVENT</a></li>			
				</ul>			
			</div>
	 
			<ul id="SNSList" class="collapse navbar-collapse navbar-nav pull-right">
	        	<li><a href="https://www.facebook.com/beautystation.tv" target="_blank"><img src="/static/images/icon_sns_fb.png" width="15"></a></li>
				<li><a href="https://www.youtube.com/channel/UCuQL6RvLuJUE3WLV57wTbBA" target="_blank"><img src="/static/images/icon_sns_youtube.png" width="15"></a></li>
	          	<li><a href="https://instagram.com/beautystation.tv" target="_blank"><img src="/static/images/icon_sns_insta.png" width="15"></a></li>
				<!-- li><a href="#" target="_blank"><img src="/static/images/icon_sns_navertv.png"></a></li-->
			</ul>

	    </div>
	</div>
  
</div>
<nav id="innerTop" class="navbar navbar-inner">
<div class="container">
	<ul id="innerMenuList" class="nav navbar-nav">
		<li><a href="#">MY PAGE</a></li>
		<li><a href="#">CONTENTS</a></li>
		<li><a href="#">PRODUCT</a></li>
		<li><a href="#">EVENT</a></li>
	</ul>
</div>
</nav>
<div id="waypoint1"></div>
