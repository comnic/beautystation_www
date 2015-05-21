<?php 
	$SUBMENU_NO = "4";
?>
<link href="/static/css/member/mytrouble.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/static/js/member/recommend_contents.js"></script>

<div id="myPageRecommendContents" class="container content">
	<!-- page navi -->
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"> <li><a href="/">HOME</a></li><li><a href="/member/mypage">MY PAGE</a></li><li class="active">나의 고민</li></ol>
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
				<div class="col-md-12 sub-title">List</div>
			</div><!-- page title -->
			
			<p class="hr col-md-12"></p>
			<div class="col-md-12">
				<form class="form-horizontal" role="search">
				  <div class="form-group" style="margin-bottom: 0px;">
				  	<label class="col-md-1 control-label" for="searchKeyword">검색 &nbsp;&nbsp;</label>
				  	<div class="col-md-6">
				    	<input type="text" name="search_key" id="searchKeyword" class="form-control input-sm" placeholder="Search">
				    </div>
				    <div class="col-md-4">&nbsp;&nbsp;
				    	<button type="submit" class="btn btn-default btn-sm">검색</button>
				    </div>
				  </div>
				</form>			
			</div>
			<p class="hr col-md-12"></p>
			
			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">

				<div class="pull-right"><a href="/member/mytrouble_reg" class="btn" style="background-color: #000; color: #fff">고민등록</a></div>
				
				<div id="listWrap" class="col-md-12">
					<table id="myTroubleTable" class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>카테고리</th>
								<th>제목</th>
								<th>답변수</th>
								<th>등록일</th>
								<th>최근답변일</th>
								<th>관리</th>
							</tr>
						</thead>
  						<tbody id="myTroublelist">
  							<tr>
  								<td>10</td>
  								<td class="mytrouble-category">피부타입</td>
  								<td><a href="/trouble/view/2">아우 정말 건조해서 못살겠어요!!!</a></td>
  								<td>0</td>
  								<td width="100">2015.05.10 11:00:00</td>
  								<td width="100">2015.05.10 11:00:00</td>
  								<td width="70">
  									<button class="btn-modify">수정</button>
  									<button class="btn-delete">X 삭제</button>
  								</td>
  							</tr>
  							<tr>
  								<td>9</td>
  								<td class="mytrouble-category">피부타입</td>
  								<td><a href="/trouble/view/2">아우 정말 건조해서 못살겠어요!!!</a></td>
  								<td>0</td>
  								<td width="100">2015.05.10 11:00:00</td>
  								<td width="100">2015.05.10 11:00:00</td>
								<td width="70">
  									<button class="btn-modify">수정</button>
  									<button class="btn-delete">X 삭제</button>
  								</td>
  							</tr>
  							<tr>
  								<td>8</td>
  								<td class="mytrouble-category">피부타입</td>
  								<td><a href="/trouble/view/2">아우 정말 건조해서 못살겠어요!!!</a></td>
  								<td>0</td>
  								<td width="100">2015.05.10 11:00:00</td>
  								<td width="100">2015.05.10 11:00:00</td>
								<td width="70">
  									<button class="btn-modify">수정</button>
  									<button class="btn-delete">X 삭제</button>
  								</td>
  							</tr>
  							<tr>
  								<td>7</td>
  								<td class="mytrouble-category">피부타입</td>
  								<td><a href="/trouble/view/2">아우 정말 건조해서 못살겠어요!!!</a></td>
  								<td>0</td>
  								<td width="100">2015.05.10 11:00:00</td>
  								<td width="100">2015.05.10 11:00:00</td>
								<td width="70">
  									<button class="btn-modify">수정</button>
  									<button class="btn-delete">X 삭제</button>
  								</td>
  							</tr>
  							<tr>
  								<td>6</td>
  								<td class="mytrouble-category">피부타입</td>
  								<td><a href="/trouble/view/2">아우 정말 건조해서 못살겠어요!!!</a></td>
  								<td>0</td>
  								<td width="100">2015.05.10 11:00:00</td>
  								<td width="100">2015.05.10 11:00:00</td>
								<td width="70">
  									<button class="btn-modify">수정</button>
  									<button class="btn-delete">X 삭제</button>
  								</td>
  							</tr>
  							<tr>
  								<td>5</td>
  								<td class="mytrouble-category">피부타입</td>
  								<td><a href="/trouble/view/2">아우 정말 건조해서 못살겠어요!!!</a></td>
  								<td>0</td>
  								<td width="100">2015.05.10 11:00:00</td>
  								<td width="100">2015.05.10 11:00:00</td>
								<td width="70">
  									<button class="btn-modify">수정</button>
  									<button class="btn-delete">X 삭제</button>
  								</td>
  							</tr>
  							
  						</tbody>
  						
					</table>
				</div>
			
			
			
			
			

			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->


</div>
