<?php 
$ISLOGIN = $this->session->userdata('is_login');
?>

<link href="/static/css/contents/onair.css" rel="stylesheet" type="text/css">
<script src="/static/js/contents/onair.js"></script>
<script>
var cidx = '<?php echo($data['idx']);?>';
var category_idx = '<?php echo($data['channel_idx']);?>';
var movie_id = '<?php echo($data['movie_link']);?>';

</script>
<div class="container content">
	<!-- page navi -->
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"> <li><a href="/">HOME</a></li><li><a href="/contents/list/onair">Contents OnAir</a></li><li class="active">Viewer</li></ol>
	</div><!-- page navi -->
	
	<!-- page wrap -->
	<div class="col-md-12 page-wrap">
	
		<!-- page contents -->
		<div class="col-md-offset-1 col-md-10 page-contents">
			
			<!-- page title -->
			<div id="pageTitle" class="col-md-12 page-title">
				<div class="col-md-12 title2">ON:AIR</div>
				<div class="col-md-12"><div class="top-bar2"></div></div>
			</div><!-- page title -->

			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">
			
				<!-- Top Layer -->
				<div id="topLayer" class="col-md-12">
					<!-- contnetsArea -->
					<div id="contnetsArea" class="col-md-9">
						<div id="MoviePlayer">
							<!-- 16:9 aspect ratio -->
							<div id="youtubePlayer" class="embed-responsive-16by9"></div>
							
							<!-- 4:3 aspect ratio -->
							<!-- div class="embed-responsive embed-responsive-4by3">
							  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wcoXcQDWvLQ?list=PLsqLZbGHLTqNosOF3FDRKVe3RH36W0dtz"></iframe>
							</div-->
						</div>
						
						<div id="contentsDesc">
							<div class="col-md-12">
								<div id="channelTitle" class="col-md-8">[<?php echo($data['channel_title']);?>]</div>
								
								<div id="iconList" class="pull-right">
									<a href="#"><img src="/static/images/main/myinfo_icon01.png"></a> 
									<a href="#"><img src="/static/images/main/myinfo_icon02.png"></a> 
									<a href="#"><img src="/static/images/main/myinfo_icon03.png"></a> 
									<a href="#"><img src="/static/images/main/myinfo_icon04.png"></a>
									랭킹보기
								
								</div>
														
							</div>
							<div class="col-md-12">
								<div id="contentTitle"><?php echo($data['title']);?></div>
								<div id="contentDesc"><?php echo($data['content']);?></div>
							</div>
							<div id="contentEval" class="col-md-12">
								<p class="title">평가하기</p>
								<div>
									<div id="contentsEvalGroup" class="col-md-12 btn-group btn-group-justified" data-toggle="buttons">
									  <label class=" btn btn-default <?php if($data['content_eval'] == 4) echo("active");?>" data-no="4">
									    <input type="radio" name="cont_eval" id="cont_eval1" value="4" autocomplete="off" > 베스트!
									  </label>
									  <label class=" btn btn-default <?php if($data['content_eval'] == 3) echo("active");?>" data-no="3">
									    <input type="radio" name="cont_eval" id="cont_eval2" value="3" autocomplete="off"> 또볼래요!
									  </label>
									  <label class=" btn btn-default <?php if($data['content_eval'] == 2) echo("active");?>" data-no="2">
									    <input type="radio" name="cont_eval" id="cont_eval3" value="2" autocomplete="off"> 유용해요!
									  </label>
									  <label class=" btn btn-default <?php if($data['content_eval'] == 1) echo("active");?>" data-no="1">
									    <input type="radio" name="cont_eval" id="cont_eval4" value="1" autocomplete="off"> 괜찮네요!
									  </label>
									 </div>
								</div>
							</div>
						</div>
									
					</div><!-- contnetsArea -->

					<!-- productAndTagArea -->
					<div id="productAndTagArea" class="col-md-3">
						<p class="title col-md-12">Relative Product</p>
						<div>
							<ul id="RPList">
									
							</ul>
						</div>
						
						<div class="col-md-12 hr"></div>
						
						<p class="title col-md-12">Tag</p>
						<div id="tagContent" class="col-md-12">
							<ul id="tagList">
							</ul>
						</div>
						
						<div class="col-md-12 hr"></div>

						<p class="title" style="clear: both;">Relative On:Air</p>
						<div>
							<ul id="onairList">
<?php 
foreach($data['relative_contents']['items'] as $item){
?>
								<li><a href="/contents/onair/<?=$item['idx']?>">
									<div class="">
										<div class="onair-thumbnail pull-left"><img src="<?=$item['img']?>" width="110" height="65"></div>
										<div class="onair-desc pull-right">
											<div class="channel-title">[<?=$item['channel_title']?>]</div>
											<div class="content-title"><?=$item['title']?></div>
										</div>
									</div>
									</a>
								</li>
<?php 
}
?>
							</ul>
						</div>
						
						<div class="col-md-12 hr"></div>
						
					</div><!-- productAndTagArea -->

				</div><!-- Top Layer -->
				
				<div class="col-md-12 hr"></div>
				
				<!-- Bottom Layer -->
				<div id="bottomLayer">
					<p class="title">함께 재생된 동영상</p>
					
					<div id="onairListLayer" class="col-md-12">
						<ul class="col-md-12">
							<li class="col-md-2">
								<div class="">
									<div class="onair-thumbnail"><img src="/static/images/content/25.jpg" width="100%"></div>
									<div class="onair-desc">
										<div class="channel-title">[홍스광뷰티]</div>
										<div class="content-title">ep.04 예고2 "스프링 리퀴드 파운데이션"</div>
									</div>
								</div>
							</li>
							
							<li class="col-md-2">
								<div class="">
									<div class="onair-thumbnail"><img src="/static/images/content/15.jpg" width="100%"></div>
									<div class="onair-desc">
										<div class="channel-title">[홍스광뷰티]</div>
										<div class="content-title">ep.04 예고2 "스프링 리퀴드 파운데이션"</div>
									</div>
								</div>
							</li>
							
							<li class="col-md-2">
								<div class="">
									<div class="onair-thumbnail"><img src="/static/images/content/21.jpg" width="100%"></div>
									<div class="onair-desc">
										<div class="channel-title">[홍스광뷰티]</div>
										<div class="content-title">ep.04 예고2 "스프링 리퀴드 파운데이션"</div>
									</div>
								</div>
							</li>
							
							<li class="col-md-2">
								<div class="">
									<div class="onair-thumbnail"><img src="/static/images/content/19.jpg" width="100%"></div>
									<div class="onair-desc">
										<div class="channel-title">[홍스광뷰티]</div>
										<div class="content-title">ep.04 예고2 "스프링 리퀴드 파운데이션"</div>
									</div>
								</div>
							</li>
							
							<li class="col-md-2">
								<div class="">
									<div class="onair-thumbnail"><img src="/static/images/content/17.jpg" width="100%"></div>
									<div class="onair-desc">
										<div class="channel-title">[홍스광뷰티]</div>
										<div class="content-title">ep.04 예고2 "스프링 리퀴드 파운데이션"</div>
									</div>
								</div>
							</li>
							
							<li class="col-md-2">
								<div class="">
									<div class="onair-thumbnail"><img src="/static/images/content/10.jpg" width="100%"></div>
									<div class="onair-desc">
										<div class="channel-title">[홍스광뷰티]</div>
										<div class="content-title">ep.04 예고2 "스프링 리퀴드 파운데이션"</div>
									</div>
								</div>
							</li>
							
						</ul>
					</div>
					
					<div class="col-md-12 hr"></div>
					
					<p class="title">댓글(<span class="replyCnt"><?php echo($data['reply_total']);?></span>)</p>
					<div id="replyWriteFormLayer" class="col-md-12">
<?php echo form_open('/', 'name="replyWriteForm" onsubmit="return chkReplySubmit();"'); ?>
						<div id="replyWriteProfilePhoto" class="col-md-1">
							<div id="myProfile">
<?php 
								if($this->session->userdata('login_type') == "sns" && $this->session->userdata('login_kind') == "facebook")
									echo('<img src="https://graph.facebook.com/'.$this->session->userdata('fbid').'/picture?width=70&height=70" alt="facebook profile picture" width="70" height="70">');
								else
									echo('<img src="/static/images/main/main_no_profile.png">');
?>
							</div>
							<div id="myProfileCover"><img src="/static/images/main/profile_cover.png"></div>
						
						</div>
						<div id="replyWriteForm" class="col-md-10">

							<input type="text" class="col-md-11" name="reply_cont" <?php if($ISLOGIN){ echo('placeholder="댓글달기"'); }else{ echo('placeholder="로그인을 먼저 하셔야 댓글 작성이 가능합니다." readonly');}?>>
							<button class="btn btn-lg col-md-1" <?php if(!$ISLOGIN){ echo('disabled="disabled"'); }?>>등록</button>

						</div>
					</form>
					</div>
					<div id="replyListLayer" class="col-md-11">
						<ul id="replyList">
						</ul>
						<button id="btnReplyMore" class="btn col-md-12">더 보기</button>
					</div>
				
				</div><!-- Top Layer -->
			

			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->
</div>
