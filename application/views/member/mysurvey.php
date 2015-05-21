<?php 
	$SUBMENU_NO = "6";
?>
<link href="/static/css/member/mysurvey.css" rel="stylesheet" type="text/css">


<div id="myPageRecommendContents" class="container content">
	<!-- page navi -->
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"> <li><a href="/">HOME</a></li><li><a href="/member/mypage">MY PAGE</a></li><li class="active">나의 설문</li></ol>
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
				<div class="col-md-12 title">나의 설문</div>
				<div class="col-md-12 sub-title">List</div>
			</div><!-- page title -->
			
			<p class="hr col-md-12"></p>
						
			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">
				
				<div id="listWrap" class="col-md-12">
					<table id="mySurveyTable" class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>설문 제목</th>
								<th>답변수</th>
								<th>등록일</th>
								<th>관리</th>
							</tr>
						</thead>
  						<tbody id="mySurveylist">
  							<tr>
  								<td>10</td>
  								<td>아우 정말 건조해서 못살겠어요!!!</td>
  								<td>30명</td>
  								<td width="100">2015.05.10 11:00:00</td>
  								<td width="70">
  									<a class="btn btn-sm btn-survey">설문하기</a>
  									<a class="btn btn-sm btn-result">결과보기</a>
  								</td>
  							</tr>
  							<tr>
  								<td>9</td>
  								<td>아우 정말 건조해서 못살겠어요!!!</td>
  								<td>10명</td>
  								<td width="100">2015.05.10 11:00:00</td>
  								<td width="70">
  									<a class="btn btn-sm btn-survey">설문하기</a>
  									<a class="btn btn-sm btn-result">결과보기</a>
  								</td>
  							</tr>
  							<tr>
  								<td>8</td>
  								<td>아우 정말 건조해서 못살겠어요!!!</td>
  								<td>7명</td>
  								<td width="100">2015.05.10 11:00:00</td>
  								<td width="70">
  									<a class="btn btn-sm btn-survey">설문하기</a>
  									<a class="btn btn-sm btn-result">결과보기</a>
  								</td>
  							</tr>
  							
  							
  						</tbody>
  						
					</table>
				</div>
			
			
			
			
			

			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->


</div>
