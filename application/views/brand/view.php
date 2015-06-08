<?php 
	$SUBMENU_NO = "1";
	$ISLOGIN = $this->session->userdata('is_login');
?>
<link href="/static/css/brand/view.css" rel="stylesheet" type="text/css">
<script src="/static/js/brand/view.js"></script>
<script>
var bidx = '<?php echo($brand_info['idx']);?>';

</script>

<div id="myPageRecommendContents" class="container content">
	<!-- page navi -->
	<div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"><li><a href="#">HOME</a></li><li><a href="#">BRAND</a></li><li><a href="#">브랜드 목록</a></li><li class="active">브랜드 보기</li></ol>
	</div><!-- page navi -->

	<!-- page wrap -->
	<div id="myPageContent" class="col-md-12 page-wrap">
	
		<!-- left sub menu -->
		<div class="sub-menu col-md-offset-1 col-md-2">
			<?php include_once 'static/sub/sub_brand.php';	?>
		</div><!-- left sub menu -->

		<!-- page contents -->
		<div class="col-md-8 page-contents">

			<!-- page body -->
			<div id="pageBody" class="col-md-12 page-body">
			

<?php 
$thumbnail = $brand_info['pb_img'];
if( $thumbnail == "")
	$thumbnail = "/static/images/product/none.png";
?>
			
				<!-- Top Layer -->
				<div id="topLayer" class="col-md-12">
					<!-- contnetsArea -->
					<div id="contnetsArea" class="col-md-11">
						<div id="brandImageLayer" class="col-md-offset-1 col-md-6">
							<div id="bigImage"><img class="thumbnail" src="<?php echo $thumbnail;?>"></div>
						</div>
						
						<div id="brandDesc" class="col-md-5">
							<div id="basicInfo" class="col-md-12">
								<div id="brandTitle" class="col-md-12">[<?php echo $brand_info['pb_name'];?><?php echo $brand_info['pb_eng_name'] != "" ? "(".$brand_info['pb_eng_name'].")" : "";?>]</div>
								
								<div id="iconList" class=" pull-right">
									<ul>
										<li><a href="#"><img src="/static/images/main/myinfo_icon02.png"></a></li> 
										<li><a href="#"><img src="/static/images/main/myinfo_icon03.png"></a></li>
										<li><a href="#"><img src="/static/images/main/myinfo_icon04.png"></a></li>
									</ul>
								</div>
								
								<div class="col-md-12 hr"></div>
								
								<div id="desc" class="col-md-12">
									<?php echo $brand_info['pb_desc'];?>
									<p>
									수상 내역 추가!
									</p>
									<br>
								</div>
								<div id="optionDesc">

								</div>
								
								<div class="col-md-12 hr"></div>
								
							</div>
						</div>
						<div id="brandEval" class="col-md-12">
								<p class="title">평가하기</p>
								<div>
									<div id="brandEvalGroup" class="col-md-12 btn-group btn-group-justified" data-toggle="buttons">
									  <label class=" btn btn-default <?php if($brand_eval == 3) echo("active");?>" data-no="3">
									    <input type="radio" name="cont_eval" id="cont_eval2" value="3" autocomplete="off"> 짱좋아!
									  </label>
									  <label class=" btn btn-default <?php if($brand_eval == 2) echo("active");?>" data-no="2">
									    <input type="radio" name="cont_eval" id="cont_eval3" value="2" autocomplete="off"> 좋아!
									  </label>
									  <label class=" btn btn-default <?php if($brand_eval == 1) echo("active");?>" data-no="1">
									    <input type="radio" name="cont_eval" id="cont_eval4" value="1" autocomplete="off"> 보통!
									  </label>
									 </div>
								</div>
							</div>
					</div><!-- contnetsArea -->
					
				</div><!-- Top Layer -->
				
				<div class="col-md-12 hr"></div>
				
				<!-- Bottom Layer -->
				<div id="bottomLayer">
					
						<div id="brandProductListWrap" class="col-md-12">
							<ul id="brandProductList">
								<li class="col-md-3">
									<div>
										<div><a href="/product/view/1"><img src="/static/images/common/brand_none.png" ></a></div>
										<div class="product-desc">
											<div class="title text-center"><a href="/product/view/1">제품이름</a></div>
											<div class="price text-center"><a href="/product/view/1">12,000원</a></div>
											<div class="text-center"><a class="btn btn-sm btn-buy">BUY</a></div>
										</div>
									</div>
								</li>
								
							</ul>
						</div>
						
						<div class="col-md-12 hr"></div>
					
				
				</div><!-- Bottom Layer -->
						
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			</div><!-- page body -->
			
		</div><!-- page contents -->
	
	</div><!-- page wrap -->


</div>