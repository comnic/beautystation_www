<?php 
	$SUBMENU_NO = "21";
?>
<link href="/static/css/member/recommend_contents.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/static/js/member/recommend_contents.js"></script>

<div id="myPageRecommendContents" class="container content">
	<!-- page navi -->
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"> <li><a href="/">HOME</a></li><li><a href="/member/mypage">MY PAGE</a></li><li class="active">추천해요</li> <li class="active">Contents</li></ol>
	</div><!-- page navi -->
	
	<!-- page wrap -->
	<div id="myPageContent" class="col-md-12 page-wrap">
	
		<!-- left sub menu -->
		<div class="sub-menu col-md-offset-1 col-md-2">
			<?php include_once 'static/sub/sub_mypage.php';	?>
		</div><!-- left sub menu -->

		<!-- page contents -->
		<div class="col-md-8 page-contents">
			
			<!-- page title -->
			<div id="pageTitle" class="col-md-12 page-title">
				<div class="top-bar"></div>
				<div class="col-md-12 title">추천해요</div>
				<div class="col-md-12 sub-title">Contents</div>
			</div><!-- page title -->
			
			<p class="hr col-md-12"></p>

			<div id="contentKindMenu" class="col-md-12">
				<ul id="contentKindMenuList">
					<li class="<?php if($cont_kind == "onair") echo("active");?>"><a href="/member/recommend_contents/onair">ON:AIR</a></li>
					<li class="<?php if($cont_kind == "magzine") echo("active");?>"><a href="/member/recommend_contents/magzine">MAGZINE</a></li>
				</ul>
			</div>
			
			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">
				<ul id="contentsList">
					<li>
						<div class="cont_img"><a href="/contents/onair/26"><img src="/static/images/content/26.jpg" width="170" height="109"></a></div>
						<div class="cont_title title1"><a href="/product/onair/26">[트루미쇼]</a></div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><a href="/contents/onair/26"><img src="/static/images/content/26.jpg" width="170" height="109"></a></div>
						<div class="cont_title title2"><a href="/product/onair/26">[홍스광뷰티]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><a href="/contents/onair/26"><img src="/static/images/content/26.jpg" width="170" height="109"></a></div>
						<div class="cont_title title3"><a href="/product/onair/26">[언니네핫초이스]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><a href="/contents/onair/26"><img src="/static/images/content/26.jpg" width="170" height="109"></a></div>
						<div class="cont_title title4"><a href="/product/onair/26">[미인식당]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><a href="/contents/onair/26"><img src="/static/images/content/26.jpg" width="170" height="109"></a></div>
						<div class="cont_title title1"><a href="/product/onair/26">[트루미쇼]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><a href="/contents/onair/26"><img src="/static/images/content/26.jpg" width="170" height="109"></a></div>
						<div class="cont_title title2"><a href="/product/onair/26">[홍스광뷰티]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><a href="/contents/onair/26"><img src="/static/images/content/26.jpg" width="170" height="109"></a></div>
						<div class="cont_title title2"><a href="/product/onair/26">[홍스광뷰티]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><a href="/contents/onair/26"><img src="/static/images/content/26.jpg" width="170" height="109"></a></div>
						<div class="cont_title title2"><a href="/product/onair/26">[홍스광뷰티]</a></div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
				</ul>
				<div class="col-md-12 text-center"><img id="btnMore" src="/static/images/btn_more.png"></div>
			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->


</div>
