<?php 
	$SUBMENU_NO = "4";
?>
<link href="/static/css/member/mytrouble.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/static/js/member/recommend_contents.js"></script>

<div id="myPageRecommendContents" class="container content">
	<!-- page navi -->
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"> <li><a href="/">HOME</a></li><li><a href="/member/mypage">MY PAGE</a></li><li><a href="/member/mytrouble">나의 고민</a></li><li class="active">등록하기</li></ol>
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
				<div class="col-md-12"><div class="top-bar"></div></div>
				<div class="col-md-12 title">나의 고민</div>
				<div class="col-md-12 sub-title">Register</div>
			</div><!-- page title -->
			
			<p class="hr-red col-md-12"></p>
			
			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">

<form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">카테고리</label>
    <div class="col-md-10">

    
    
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-md-2 control-label">제목</label>
    <div class="col-md-9">
      <input type="text" class="form-control" id="subjct" placeholder="나의 고민에 대한 제목을 적어주세요!">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-md-2 control-label">내용</label>
    <div class="col-md-9">
      <textarea class="form-control" rows="5"></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-offset-2 col-md-9">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
			
			

			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->


</div>
