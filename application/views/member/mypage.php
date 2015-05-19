<?php 
	$SUBMENU_NO = "11";
?>
<link href="/static/css/member/mypage.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/static/js/member/mypage.js"></script>

<div id="myPageRecommendContents" class="container content">
	<!-- page navi -->
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"><li><a href="#">HOME</a></li><li><a href="#">MY PAGE</a></li><li class="active">상세정보</li></ol>
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
				<div class="col-md-12 title">상세정보</div>
				<div class="col-md-12"><div class="top-bar"></div></div>
			</div><!-- page title -->

			<p class="hr col-md-12"></p>
			
			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">
			
			
			
			
			
			
			
			<div class="col-md-offset-2 col-md-10">
				<div class="col-md-12">
					<div id="basicInfo" class="col-md-5">
						<div id="myPhotoBox">
							<div id="myProfilePhoto">
								<?php 
									if($this->session->userdata('login_type') == "sns" && $this->session->userdata('login_kind') == "facebook")
										echo('<img src="https://graph.facebook.com/'.$this->session->userdata('fbid').'/picture?width=230&height=230" alt="facebook profile picture" width="230" height="230">');
									else
										echo('<img src="/static/images/main/main_no_profile.png">');
								?>
							</div>
							<div id="myProfileCover"><img src="/static/images/mypage/profile_cover.png"></div>
						</div>
					</div>
					<div id="detailInfo" class="col-md-5">
						<div class="title">아이디</div>
						<div class="title">이름</div>
						<div id="divider"></div>
						<div id="icons" class="pull-right"><a href="#"><img src="/static/images/main/myinfo_icon01.png"></a> <a href="#"><img src="/static/images/main/myinfo_icon02.png"></a> <a href="#"><img src="/static/images/main/myinfo_icon03.png"></a> <a href="#"><img src="/static/images/main/myinfo_icon04.png"></a></div>
					</div>
				</div>
				
				<div class="col-md-12 dividerLine"></div>
				
				<div class="col-md-12">
<?php echo form_open('/member/mypage', 'onsubmit="return chkSubmit(this.form);"'); ?>
					<div>
						<div class="title">Email</div>
						<div><input type="email" name="email" value="<?php echo($member_info->mb_email);?>" size="50" /></div>
					</div>

					<div>
						<div class="title">연락처</div>
						<div><input type="text" name="phone" value="<?php echo($member_info->mb_phone);?>" size="20" /></div>
					</div>
					
					<div id="gender">
						<div class="title">성별</div>

						<div class="col-md-12 btn-group" data-toggle="buttons">
						  <label class="col-md-6 btn btn-default <?php if($member_info->md_gender == "M") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="gender" id="gender1" value="M" autocomplete="off" <?php if($member_info->md_gender == "M") echo("checked");?>>남성
						  </label>
						  <label class="col-md-6 btn btn-default <?php if($member_info->md_gender == "F") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="gender" id="gender2" value="F" autocomplete="off" <?php if($member_info->md_gender == "F") echo("checked");?>> 여성
						  </label>
						</div>
					</div>
					
					<div>
						<div class="title">생일</div>
<?php 
	$arrBirth = explode("-", $member_info->md_birth);
?>
						<input type="number" class="form-control" name="birth_year" id="birth_year" placeholder="출생년도를 입력해 주세요!(yyyy)" value="<?php echo($arrBirth[0]);?>">
						<input type="number" class="form-control" name="birth_month" id="birth_month" placeholder="출생월을 입력해 주세요!(mm)" value="<?php echo($arrBirth[1]);?>">
						<input type="number" class="form-control" name="birth_day" id="birth_day" placeholder="출생일을 입력해 주세요!(dd)" value="<?php echo($arrBirth[2]);?>">
						
					</div>
					<div>
						<div class="title">피부타입</div>
						<div class="col-md-12 btn-group" data-toggle="buttons">
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_type == "1") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_type" id="skin_type1" value="1" autocomplete="off" <?php if($member_info->md_skin_type == "1") echo("checked");?>>건성
						  </label>
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_type == "2") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_type" id="skin_type2" value="2" autocomplete="off" <?php if($member_info->md_skin_type == "2") echo("checked");?>>중성
						  </label>
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_type == "3") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_type" id="skin_type3" value="3" autocomplete="off" <?php if($member_info->md_skin_type == "3") echo("checked");?>>지성
						  </label>
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_type == "4") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_type" id="skin_type4" value="4" autocomplete="off" <?php if($member_info->md_skin_type == "4") echo("checked");?>>복합성
						  </label>
						</div>
					</div>
					<div>
						<div class="title">피부톤</div>
						<div class="col-md-12 btn-group" data-toggle="buttons">
						  <label class="col-md-4 btn btn-default <?php if($member_info->md_skin_tone == "1") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_tone" id="skin_tone1" value="1" autocomplete="off" <?php if($member_info->md_skin_tone == "1") echo("checked");?>>쿨톤
						  </label>
						  <label class="col-md-4 btn btn-default <?php if($member_info->md_skin_tone == "2") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_tone" id="skin_tone2" value="2" autocomplete="off" <?php if($member_info->md_skin_tone == "2") echo("checked");?>>웜톤
						  </label>
						  <label class="col-md-4 btn btn-default <?php if($member_info->md_skin_tone == "3") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_tone" id="skin_tone3" value="3" autocomplete="off" <?php if($member_info->md_skin_tone == "3") echo("checked");?>>뉴트롤
						  </label>
						</div>						
					</div>
					<div>
						<div class="title">피부고민</div>
						<div class="col-md-12 btn-group" data-toggle="buttons">
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_trouble == "1") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_trouble" id="skin_trouble1" value="1" autocomplete="off" <?php if($member_info->md_skin_trouble == "1") echo("checked");?>>건조
						  </label>
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_trouble == "2") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_trouble" id="skin_trouble2" value="2" autocomplete="off" <?php if($member_info->md_skin_trouble == "2") echo("checked");?>>주름
						  </label>
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_trouble == "3") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_trouble" id="skin_trouble3" value="3" autocomplete="off" <?php if($member_info->md_skin_trouble == "3") echo("checked");?>>탄력
						  </label>
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_trouble == "4") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_trouble" id="skin_trouble4" value="4" autocomplete="off" <?php if($member_info->md_skin_trouble == "4") echo("checked");?>>각질
						  </label>
						</div>
						<div class="col-md-12 btn-group" data-toggle="buttons">
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_trouble == "5") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_trouble" id="skin_trouble5" value="5" autocomplete="off" <?php if($member_info->md_skin_trouble == "5") echo("checked");?>>모공
						  </label>
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_trouble == "6") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_trouble" id="skin_trouble6" value="6" autocomplete="off" <?php if($member_info->md_skin_trouble == "6") echo("checked");?>>잡티
						  </label>
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_trouble == "7") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_trouble" id="skin_trouble7" value="7" autocomplete="off" <?php if($member_info->md_skin_trouble == "7") echo("checked");?>>미백
						  </label>
						  <label class="col-md-3 btn btn-default <?php if($member_info->md_skin_trouble == "8") echo("active");?>" style="padding:50px;">
						    <input type="radio" name="skin_trouble" id="skin_trouble8" value="8" autocomplete="off" <?php if($member_info->md_skin_trouble == "8") echo("checked");?>>트러블
						  </label>
						</div>
					</div>
					<div>
						<div class="title">SNS연동</div>
						<div></div>
					</div>
				
				</div>
				
				<div class="col-md-12 dividerLine"></div>
				<div>
					<button class="btn">저장하기</button>
				</div>
</form>
			</div>
			
			
			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->


</div>