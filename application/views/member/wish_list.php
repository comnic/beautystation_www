<?php 
	$SUBMENU_NO = "31";
	$subTitle = "On:Air";
	
	if($cont_kind == "magzine"){
		$SUBMENU_NO = "32";
		$subTitle = "Magzine";
	}
	if($cont_kind == "brand"){	
		$SUBMENU_NO = "33";
		$subTitle = "Brand";
	}
	if($cont_kind == "product"){
		$SUBMENU_NO = "34";
		$subTitle = "Product";
	}
	
	$listClassName = "content";
	if($cont_kind == "brand" || $cont_kind == "product") $listClassName = "product";
?>
<link href="/static/css/member/wish_list.css" rel="stylesheet" type="text/css">


<div id="myPageRecommendContents" class="container content">
	<!-- page navi -->
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"> <li><a href="/">HOME</a></li><li><a href="/member/mypage">MY PAGE</a></li><li class="active">위시리스트</li> <li class="active"><?php echo($subTitle);?></li></ol>
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
				<div class="col-md-12 title">위시리스트</div>
				<div class="col-md-12 sub-title"><?php echo($subTitle);?></div>
			</div><!-- page title -->
			
			<p class="hr col-md-12"></p>
			
			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">
			
				<ul id="contentsList" class="<?php echo($listClassName);?>">
					<li>
						<div class="cont_img"><img src="/static/images/content/26.jpg" width="170" height="109"></div>
						<div class="cont_title title1">[트루미쇼]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/content/26.jpg" width="170" height="109"></div>
						<div class="cont_title title2">[홍스광뷰티]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/content/26.jpg" width="170" height="109"></div>
						<div class="cont_title title3">[언니네핫초이스]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/content/26.jpg" width="170" height="109"></div>
						<div class="cont_title title4">[미인식당]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/content/26.jpg" width="170" height="109"></div>
						<div class="cont_title title1">[트루미쇼]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/content/26.jpg" width="170" height="109"></div>
						<div class="cont_title title2">[홍스광뷰티]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/content/26.jpg" width="170" height="109"></div>
						<div class="cont_title title2">[홍스광뷰티]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
					<li>
						<div class="cont_img"><img src="/static/images/content/26.jpg" width="170" height="109"></div>
						<div class="cont_title title2">[홍스광뷰티]</div>
						<div class="cont_summary">ep.05 "5살 어려보이는 비법! 하트라인 만들기"</div>
					</li>
				</ul>
				<div class="col-md-12 text-center"><img id="btnMore" src="/static/images/btn_more.png"></div>
			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->


</div>
