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

<script type="text/javascript" src="/static/lib/jquery/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="/static/lib/jquery/jquery.scrollUp.min.js"></script>

<link href="/static/css/common.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/static/js/common.js"></script>

<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="/static/js/respond.min.js"></script>
<script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div id="beautystationMain" class="container">

<div class="navbar navbar-fixed-top">

	<div id="topNavbar" class="container-fluid">
	
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      
		      <a href="/"><img src="/static/images/common/top_logo.png"></a>
		      
		    </div>
		    
		    
  		 	<!-- Collect the nav links, forms, and other content for toggling -->
    		<div class="collapse navbar-collapse">
      			<ul id="topMenu" class="top-navi navbar-left">
        			<li><a href="/member/mypage">MY PAGE</a></li>
        			<li><a href="/movie_list">ON:AIR</a></li>
        			<li><a href="/">MAGZINE</a></li>
        			<li><a href="/">PRODUCT</a></li>
        			<li><a href="/">EVENT</a></li>
        		</ul>

        		
        		<!-- 상단 우측 -->
				<ul id="topRight" class="navbar-right nav-pills">
				    <?php
				    if($this->session->userdata('is_login')){
						if($this->session->userdata('login_type') == "sns" && $this->session->userdata('login_kind') == "facebook")
							echo('<li><img src="https://graph.facebook.com/'.$this->session->userdata('fbid').'/picture?type=square" alt="facebook picture" class="img-circle" width="25"></li>');
				    ?>
				        <li style="padding-top: 14px;"><a href="/auth/logout">로그아웃</a></li>
				    <?php
				    } else {
				    ?>
				        <li><a href="/auth/login" data-toggle="modal00" data-target="#loginModal000">LOGIN</a> | <a href="/auth/register">JOIN</a> | SITEMAP | </li>
				        <li class="dropdown">
				        	<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
				        	CHANNEL <span class="caret"></span></a>
				        	<ul id="topChannelMenu" class="dropdown-menu" role="menu">
<?php 
	foreach($channel as $cidx => $cname){
		echo("<li><a href='/ch/{$cidx}'>{$cname}</a></li>");
	}
?>
							</ul>
				        </li>
				        <li>| <span class="glyphicon glyphicon-search" aria-hidden="true"></span></li>
				    <?php
				    }
				    ?>
				</ul>
        		
        	</div>		    
		    

		</div>
	</div><!-- topNavbar -->
</div>

<div class="modal fade" id="loginModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">BEAUTY STATION LOGIN</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php 
/*
			<!-- Everything you want hidden at 940px or less, place within here -->
			<ul id="SNSList" class="collapse navbar-collapse navbar-nav pull-right">
	        	<li><a href="https://www.facebook.com/beautystation.tv" target="_blank"><img src="/static/images/icon_sns_fb.png"></a></li>
				<li><a href="https://www.youtube.com/channel/UCuQL6RvLuJUE3WLV57wTbBA" target="_blank"><img src="/static/images/icon_sns_youtube.png"></a></li>
	          	<li><a href="https://instagram.com/beautystation.tv" target="_blank"><img src="/static/images/icon_sns_insta.png"></a></li>
				<!-- li><a href="#" target="_blank"><img src="/static/images/icon_sns_navertv.png"></a></li-->
			</ul>

	    </div>
	</div>
*/
?>	 
 
