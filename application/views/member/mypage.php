<link href="/static/css/mypage.css" rel="stylesheet" type="text/css">

<div id="myPage" class="container content">
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi">
		  <li><a href="#">HOME</a></li>
		  <li><a href="#">MY PAGE</a></li>
		  <li class="active">상세정보</li>
		</ol>
	</div>
	<div id="myPageContent" class="col-md-offset-1 col-md-10">
		<div id="myPageSubMenu" class="col-md-2 submenu">
			<p class="title">
				MY<BR>
				PAGE			
			</p>
			<div class="underbar"></div>
			<ul class="nav menuItems">
				<li class="active"><a href="#">상세정보</a></li>
				<li>
					<a href="#">추천해요</a>
					<ul class="nav">
						<li><a href="#">- contents</a></li>
						<li><a href="#">- products</a></li>
					</ul>
				</li>
				<li>
					<a href="#">위시리스트</a>
					<ul class="nav">
						<li><a href="#">- On:Air</a></li>
						<li><a href="#">- Magzine</a></li>
						<li><a href="#">- Brand</a></li>
						<li><a href="#">- product</a></li>
					</ul>
				</li>
				<li><a href="#">나의 고민</a></li>
				<li><a href="#">파우더 룸</a></li>
				<li><a href="#">설문</a></li>
				<li><a href="#">포인트</a></li>
				<li><a href="#">통계</a></li>
			</ul>

		</div>
		<!-- page contents -->
		<div class="col-md-10 pageContents">
			<div class="col-md-12 title">상세정보</div>
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
					<div class="title">성별</div>
					<div class="title">생일</div>
					<div class="title">피부타입</div>
					<div class="title">피부톤</div>
					<div class="title">피부고민</div>
					<div class="title">SNS연동</div>
				
				</div>
				
				<div class="col-md-12 dividerLine"></div>
				<div>
					<button class="btn">저장하기</button>
				</div>
			
			</div>
		</div><!-- page contents -->
	
	</div>


</div>

<?php echo validation_errors(); ?>

<?php echo form_open('form'); ?>

<h5>Username</h5>
<input type="text" name="username" value="<?php echo($member_info->mb_name);?>" size="50" />

<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo($member_info->mb_email);?>" size="50" />

<h5>생년월일</h5>
<input type="text" name="birth" value="<?php echo($member_info->md_birth);?>" size="50" />

<h5>핸드폰</h5>
<input type="text" name="phone" value="<?php echo($member_info->mb_phone);?>" size="15" />

<h5>SNS 연동</h5>

<h5>포인트</h5>
<input type="text" name="" value="<?php echo($member_info->mb_total_point);?>" size="10" readonly/>

<h5>mailing</h5>
<input type="checkbox" name="mailing" value="<?php echo($member_info->md_mailing);?>" size="10" />수신

<h5>관심사</h5>
<input type="text" name="mailing" value="<?php echo($member_info->md_favority);?>" size="50" />

<h5>직업</h5>
<?php 
$this->load->view('member/select_job', $job_list);
?>

<h5>취미</h5>
<input type="text" name="hobby" value="<?php echo($member_info->hobby_idx);?>" size="50" />

<h5>선호 브랜드</h5>
<input type="text" name="hobby" value="<?php echo($member_info->brand_idx);?>" size="50" />

<h5>화장품 주요 구입처</h5>
<input type="text" name="cosme_buying" value="<?php echo($member_info->md_cosme_buying);?>" size="50" />

<h5>화장품 정보 입수처</h5>
<input type="text" name="cosme_info" value="<?php echo($member_info->md_cosme_info);?>" size="50" />

<h5>피부타입</h5>
<input type="text" name="skin_type" value="<?php echo($member_info->md_skin_type);?>" size="50" />


<div><input type="submit" value="Submit" /></div>

</form>
