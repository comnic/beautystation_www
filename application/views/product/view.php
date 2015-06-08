<?php 
	$SUBMENU_NO = "11";
	$ISLOGIN = $this->session->userdata('is_login');
?>
<link href="/static/css/product/view.css" rel="stylesheet" type="text/css">
<script src="/static/js/product/view.js"></script>
<script>
var pidx = '<?php echo($product_info['idx']);?>';
var bidx = '<?php echo($product_info['pb_idx']);?>';

</script>

<div id="myPageRecommendContents" class="container content">
	<!-- page navi -->
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"><li><a href="#">HOME</a></li><li><a href="#">PRODUCT</a></li><li><a href="#">상품목록</a></li><li class="active">상품보기</li></ol>
	</div><!-- page navi -->

	<!-- page wrap -->
	<div id="myPageContent" class="col-md-12 page-wrap">
	
		<!-- left sub menu -->
		<div class="sub-menu col-md-offset-1 col-md-2">
			<?php include_once 'static/sub/sub_product.php';	?>
		</div><!-- left sub menu -->

		<!-- page contents -->
		<div class="col-md-8 page-contents">

			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">
			

<?php 
$thumbnail = $product_info['p_img'];
if( $thumbnail == "")
	$thumbnail = "/static/images/product/none.png";
?>
			
				<!-- Top Layer -->
				<div id="topLayer" class="col-md-12">
					<!-- contnetsArea -->
					<div id="contnetsArea" class="col-md-9">
						<div id="productImageLayer" class="col-md-6">
							<div id="bigImage"><img class="thumbnail" src="<?php echo $thumbnail;?>"></div>
						</div>
						
						<div id="productDesc" class="col-md-6">
							<div id="basicInfo" class="col-md-12">
								<div id="brandTitle" class="col-md-12">[<a href="/brand/view/<?php echo $product_info['pb_idx'];?>"><?php echo $product_info['pb_name'];?></a>]</div>
								<div id="productTitle" class="col-md-12"><?php echo $product_info['p_name'];?></div>
								
								<div id="iconList" class=" pull-right">
									<ul>
										<li><a href="#"><img src="/static/images/main/myinfo_icon02.png"></a></li> 
										<li><a href="#"><img src="/static/images/main/myinfo_icon03.png"></a></li>
										<li><a href="#"><img src="/static/images/main/myinfo_icon04.png"></a></li>
									</ul>
								</div>
								
								<div class="col-md-12 hr"></div>
								
								<div id="desc" class="col-md-12">
									<?php echo $product_info['p_desc'];?>
									<p>
									수상 내역 추가!
									</p>
									<br>
								</div>
								<div id="optionDesc">
									<div class="col-md-12"><span class="col-md-3 title">색상</span><span class="col-md-9"><?php echo $product_info['p_color'];?></span></div>
									<div class="col-md-12"><span class="col-md-3 title">용량</span><span class="col-md-9"><?php echo $product_info['p_capacity'];?></span></div>
									<div class="col-md-12"><span class="col-md-3 title">가격</span><span class="col-md-9 price"><?php echo $product_info['p_price'];?>원</span></div>
								</div>
								
								<div class="col-md-12 hr"></div>
								
								<div id="btnGrpLayer" class="col-md-12 text-right">
									<button class="btn btn-sm btn-ranking"><img src="/static/images/common/icon_crown.png"> 랭킹보기</button>
									<button class="btn btn-sm btn-oder-link">구매하러가기</button>
								
								</div>					
							</div>
						</div>
						<div id="productEval" class="col-md-12">
								<p class="title">평가하기</p>
								<div>
									<div id="productEvalGroup" class="col-md-12 btn-group btn-group-justified" data-toggle="buttons">
									  <label class="btn btn-default <?php if($content_eval == 4) echo("active");?>" data-no="4">
									    <input type="radio" name="cont_eval" id="cont_eval1" value="4" autocomplete="off" > 또살래!
									  </label>
									  <label class=" btn btn-default <?php if($content_eval == 3) echo("active");?>" data-no="3">
									    <input type="radio" name="cont_eval" id="cont_eval2" value="3" autocomplete="off"> 맘에들어!
									  </label>
									  <label class=" btn btn-default <?php if($content_eval == 2) echo("active");?>" data-no="2">
									    <input type="radio" name="cont_eval" id="cont_eval3" value="2" autocomplete="off"> 괜찮아!
									  </label>
									  <label class=" btn btn-default <?php if($content_eval == 1) echo("active");?>" data-no="1">
									    <input type="radio" name="cont_eval" id="cont_eval4" value="1" autocomplete="off"> 그저그래!
									  </label>
									 </div>
								</div>
							</div>
						
														
					</div><!-- contnetsArea -->

					<!-- productAndTagArea -->
					<div id="productAndOnairArea" class="col-md-3">
						<p class="title col-md-12">Relative Product</p>
						<div>
							<ul id="RPList">
							</ul>
						</div>
						
						<div class="col-md-12 hr"></div>
						
						<p class="title" style="clear: both;">Relative On:Air</p>
						<div id="ROListWrap" class="col-md-12">
							<ul id="ROList">
							</ul>
						</div>
						
						<div class="col-md-12 hr"></div>
						
					</div><!-- productAndTagArea -->

				</div><!-- Top Layer -->
				
				<div class="col-md-12 hr"></div>
				
				<!-- Bottom Layer -->
				<div id="bottomLayer">
					
					<p class="title">댓글(<span class="replyCnt"><?php echo($reply_total);?></span>)</p>
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
						<div id="replyWriteForm" class="col-md-10 ">

							<input type="text" class="col-md-11" name="reply_cont" <?php if($ISLOGIN){ echo('placeholder="댓글달기"'); }else{ echo('placeholder="로그인을 먼저 하셔야 댓글 작성이 가능합니다." readonly');}?>>
							<button class="btn btn-lg col-md-1" <?php if(!$ISLOGIN){ echo('disabled="disabled"'); }?>>등록</button>

						</div>
					</form>
					</div>
					<div id="replyListLayer" class="col-md-offset-2 col-md-10">
						<ul id="replyList">

						</ul>
						<button id="btnReplyMore" class="btn col-md-12">더 보기</button>
					</div>
				
				</div><!-- Top Layer -->
						
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->


</div>