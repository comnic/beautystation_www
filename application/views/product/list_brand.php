<?php 
	$SUBMENU_NO = "11";
?>
<link href="/static/css/product/list.css" rel="stylesheet" type="text/css">
<script src="/static/js/product/list.js"></script>

<script>
var bidx = '<?php echo($idx);?>';

</script>

<div id="myPageRecommendContents" class="container content">
	<!-- page navi -->
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"> <li><a href="/">HOME</a></li><li><a href="/product/lists">PRODUCT</a></li><li class="active">브랜드별 LIST</li></ol>
	</div><!-- page navi -->
	
	<!-- page wrap -->
	<div id="myPageContent" class="col-md-12 page-wrap">
	
		<!-- left sub menu -->
		<div class="sub-menu col-md-offset-1 col-md-2">
			<?php include_once 'static/sub/sub_product.php';	?>
		</div><!-- left sub menu -->

		<!-- page contents -->
		<div class="col-md-8 page-contents">
			
			<!-- page title -->
			<div id="pageTitle" class="col-md-12 page-title">
				<div class="top-bar"></div>
				<div class="col-md-12 title">상품목록</div>
				<div class="col-md-12 sub-title">브랜드별</div>
			</div><!-- page title -->
			
			<p class="hr col-md-12"></p>

			<div id="brandList">
				브랜드 리스트 추가 영역!
			</div>			
			
			<p class="hr col-md-12"></p>
			
			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">
				<p class="title">[브랜드명]</p>
				<ul id="productList">
				</ul>
				<div class="col-md-12 text-center"><img id="btnMore" src="/static/images/common/btn_more.png"></div>
			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->


</div>
