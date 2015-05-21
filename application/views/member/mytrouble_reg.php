<?php 
	$SUBMENU_NO = "4";
?>
<link href="/static/css/member/mytrouble_reg.css" rel="stylesheet" type="text/css">


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

			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">
			
				<p class="hr-red col-md-12" style="margin-bottom: 0px;"></p>
			
				<table id="mytroubleRegTable" class="col-md-12">
					<tbody>
						<tr>
							<th class="col-md-2 text-center bottom-line">카테고리</th>
							<td class="col-md-10">
								<label class="radio-inline col-md-2">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">트러블
								</label>
								<label class="radio-inline col-md-2">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">건조함
								</label>
								<label class="radio-inline col-md-2">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">지복합피부
								</label>
								<label class="radio-inline col-md-2">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">지복합피부
								</label>
								<label class="radio-inline col-md-2">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">지복합피부
								</label>
								<br>
								<label class="radio-inline col-md-2">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">지복합피부
								</label>
								<label class="radio-inline col-md-2">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">지복합피부
								</label>
								<label class="radio-inline col-md-2">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">지복합피부
								</label>
								<label class="radio-inline col-md-2">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">지복합피부
								</label>
								<label class="radio-inline col-md-2">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">지복합피부
								</label>						
							</td>
						</tr>
						<tr>
							<th class="col-md-2 text-center bottom-line">제목</th>
							<td class="col-md-10"><input type="text" class="form-control" id="subjct" placeholder="나의 고민에 대한 제목을 적어주세요!"></td>
						</tr>
						<tr>
							<th class="col-md-2 text-center">내용</th>
							<td class="col-md-10"><textarea class="form-control" rows="10"  placeholder="고민 내용을 작성해주세요!"></textarea></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="2" class="text-center" style="height: 50px; vertical-align: middle;"><button class="btn btn-cancel"> 취소 </button> <button class="btn btn-register">고민등록</button></td>
						</tr>
					</tfoot>
				</table>
				
			
			

			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->


</div>
