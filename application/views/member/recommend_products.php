<?php 
	$SUBMENU_NO = "22";
?>
<link href="/static/css/member/recommend_products.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/static/js/member/recommend_products.js"></script>

<div id="myPageRecommendContents" class="container content">
	<!-- page navi -->
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"> <li><a href="/">HOME</a></li><li><a href="/member/mypage">MY PAGE</a></li><li class="active">추천해요</li> <li class="active">Products</li></ol>
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
				<div class="col-md-12 sub-title">Products</div>
			</div><!-- page title -->
			
			<p class="hr col-md-12"></p>

			<div id="contentKindMenu" class="col-md-12">
				<ul id="contentKindMenuList">
					<li class="<?php if($cont_kind == "1") echo("active");?>"><a href="/member/recommend_products/1">건성</a></li>
					<li class="<?php if($cont_kind == "2") echo("active");?>"><a href="/member/recommend_products/2">20대</a></li>
					<li class="<?php if($cont_kind == "3") echo("active");?>"><a href="/member/recommend_products/3">쿨톤</a></li>
					<li class="<?php if($cont_kind == "4") echo("active");?>"><a href="/member/recommend_products/4">각질</a></li>
					<li class="<?php if($cont_kind == "5") echo("active");?>"><a href="/member/recommend_products/5">민감성</a></li>
					<li class="<?php if($cont_kind == "6") echo("active");?>"><a href="/member/recommend_products/6">주름</a></li>
				</ul>
			</div>
			
			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">
				<ul id="contentsList">
					<li>
						<div class="cont_img"><img src="/static/images/product/77757815441f54b24e81402b35386c50.png" width="170" height="170" class="thumbnail"></div>
						<div class="cont_brand text-center">[Dior]</div>
						<div class="cont_title text-center">예뻐져라 로션</div>
						<div class="cont_price text-center">12,000원</div>
						<div class="cont_buy_btn text-center center-block">BUY</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/product/77757815441f54b24e81402b35386c50.png" width="170" height="170" class="thumbnail"></div>
						<div class="cont_brand text-center">[Dior]</div>
						<div class="cont_title text-center">예뻐져라 로션</div>
						<div class="cont_price text-center">12,000원</div>
						<div class="cont_buy_btn text-center center-block">BUY</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/product/77757815441f54b24e81402b35386c50.png" width="170" height="170" class="thumbnail"></div>
						<div class="cont_brand text-center">[Dior]</div>
						<div class="cont_title text-center">예뻐져라 로션</div>
						<div class="cont_price text-center">12,000원</div>
						<div class="cont_buy_btn text-center center-block">BUY</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/product/77757815441f54b24e81402b35386c50.png" width="170" height="170" class="thumbnail"></div>
						<div class="cont_brand text-center">[Dior]</div>
						<div class="cont_title text-center">예뻐져라 로션</div>
						<div class="cont_price text-center">12,000원</div>
						<div class="cont_buy_btn text-center center-block">BUY</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/product/77757815441f54b24e81402b35386c50.png" width="170" height="170" class="thumbnail"></div>
						<div class="cont_brand text-center">[Dior]</div>
						<div class="cont_title text-center">예뻐져라 로션</div>
						<div class="cont_price text-center">12,000원</div>
						<div class="cont_buy_btn text-center center-block">BUY</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/product/77757815441f54b24e81402b35386c50.png" width="170" height="170" class="thumbnail"></div>
						<div class="cont_brand text-center">[Dior]</div>
						<div class="cont_title text-center">예뻐져라 로션</div>
						<div class="cont_price text-center">12,000원</div>
						<div class="cont_buy_btn text-center center-block">BUY</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/product/77757815441f54b24e81402b35386c50.png" width="170" height="170" class="thumbnail"></div>
						<div class="cont_brand text-center">[Dior]</div>
						<div class="cont_title text-center">예뻐져라 로션</div>
						<div class="cont_price text-center">12,000원</div>
						<div class="cont_buy_btn text-center center-block">BUY</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/product/77757815441f54b24e81402b35386c50.png" width="170" height="170" class="thumbnail"></div>
						<div class="cont_brand text-center">[Dior]</div>
						<div class="cont_title text-center">예뻐져라 로션</div>
						<div class="cont_price text-center">12,000원</div>
						<div class="cont_buy_btn text-center center-block">BUY</div>
					</li>

				</ul>
				<div class="col-md-12 text-center"><img id="btnMore" src="/static/images/btn_more.png"></div>
			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->


</div>
