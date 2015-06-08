<link href="/static/css/main.css" rel="stylesheet" type="text/css">
<link href="/static/css/main_individual.css" rel="stylesheet" type="text/css">

<div class="container">
	<!-- top section -->
	<div id="topSection">
	
		<!-- My Info -->
		<div id="myInfo" class="box col-md-3">
			<div id="profilePhoto" class="center-block">
				<div id="myProfile">
<?php 
						if($this->session->userdata('login_type') == "sns" && $this->session->userdata('login_kind') == "facebook")
							echo('<img src="https://graph.facebook.com/'.$this->session->userdata('fbid').'/picture?width=165&height=165" alt="facebook profile picture" width="165" height="165">');
						else
							echo('<img src="/static/images/main/main_no_profile.png">');
?>
				</div>
				<div id="myProfileCover"><img src="/static/images/main/profile_cover.png"></div>
			</div>
			<div id="myName" class="text-center">
				<p><?php echo($this->session->userdata('bs_mbname'));?></p>
			</div>
			<div id="myInfoDetail">
				연동된 SNS : <br>
				최근 로그인 시간 : <br>
				My Point : <br>
			</div>
			<div id="myChannel">
			
			</div>
			<div id="divider"></div>
			<div id="icons" class="pull-right"><a href="#"><img src="/static/images/main/myinfo_icon01.png"></a> <a href="#"><img src="/static/images/main/myinfo_icon02.png"></a> <a href="#"><img src="/static/images/main/myinfo_icon03.png"></a> <a href="#"><img src="/static/images/main/myinfo_icon04.png"></a></div>
		
		</div><!-- My Info -->

		<div class="box-fill box11 col-md-5">
			<div class="con-movie-lg">
				<div class="pic">
					<a href="/contents/onair/16"><img src="/static/images/content/16.jpg" width="100%"></a>
				</div>

				<div class="desc">
					<a href="/contents/onair/16">
						<p class="title">[언니네 핫 초이스]</p>
						<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
					</a>
					<p>모두가 놀란 국주언니의....	모두가 놀란 국주언니의....모두가 놀란 국주언니의....모두가 놀란 국주언니의....모두가 놀란 국주언니의....모두가 놀란 국주언니의....</p>
				</div>
				<div class="wish-box pull-right">WISH <span class="glyphicon glyphicon-heart" aria-hidden="true"></span></div>
				
			</div>
		</div>
		
		<!-- topRightContents -->
		<div id="topRightContents" class="col-md-4">
		
			<div class="box box2 col-md-12">
				<div class="con-movie">
					<div class="pic">
						<a href="/contents/onair/26"><img src="/static/images/content/26.jpg" width="100%"></a>
					</div>
							
					<div class="wish-box pull-right">WISH <span class="glyphicon glyphicon-heart" aria-hidden="true"></span></div>
							
					<div class="desc">
							<a href="/contents/onair/26">
								<p class="title">[언니네 핫 초이스]</p>
								<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
							</a>
							<p>모두가 놀란 국주언니의....모두가 놀란 국주언니의....모두가 놀란 국주언니의....모두가 놀란 국주언니의....모두가 놀란 국주언니의....</p>
					</div>

				</div>
			</div>

			<div class="box box3 col-md-6">
				<div class="tag-list">
					<p class="title text-center">많이 찾는 해시 뷰티 태그</p>
					<ul>
						<li><a href="/tag/search/1">#뷰티스테이션</a></li>
						<li><a href="/tag/search/1">#홍석천</a></li>
						<li><a href="/tag/search/1">#언니네 핫 초이스</a></li>
						<li><a href="/tag/search/1">#이청아</a></li>
						<li><a href="/tag/search/1">#손호영</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-6">
				<ul>
					<li class="box-fill box1 col-md-6">
						<div class="con-fill">
							<a href="/contents/onair/25"><img src="/static/images/content/25.jpg"></a>
						</div>
						<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
					</li>
					<li class="box-fill box1 col-md-6">
						<div class="con-fill">
							<a href="/contents/onair/21"><img src="/static/images/content/21.jpg" width="100%"></a>
						</div>
						<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
					</li>
					<li class="box-fill box1 col-md-6">
						<div class="con-fill">
							<a href="/contents/onair/22"><img src="/static/images/content/22.jpg" width="100%"></a>
						</div>
						<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
					</li>
					<li class="box-fill box1 col-md-6">
						<div class="con-fill">
							<a href="/contents/onair/23"><img src="/static/images/content/23.jpg" width="100%"></a>
						</div>
						<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
					</li>
				</ul>
			
			</div>

		</div><!-- topRightContents -->
		
		
	</div>
	<div class="box box4 col-md-5">
		
		<div class="con-movie">
			<div class="pic thumbnail">
				<a href="/contents/onair/11"><img src="/static/images/content/11.jpg" width="100%"></a>
			</div>
					
			<div class="wish-box pull-left">WISH <span class="glyphicon glyphicon-heart" aria-hidden="true"></span></div>
					
			<div class="desc">
				<a href="/contents/onair/11">
					<p class="title">[언니네 핫 초이스]</p>
					<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
				</a>
				<p>모두가 놀란 국주언니의...모두가 놀란 국주언니의.모두가 놀란 국주언니의.모두가 놀란 국주언니의.모두가 놀란 국주언니의.모두가 놀란 국주언니의....</p>
				
			</div>
		</div>
		
	</div>		
	<div class="box4 col-md-2">
		<div class="box box5 col-md-12">
			<div class="con-product-sm">
				<div class="pic thumbnail"><a href="/product/view/1"><img src="/static/images/product/77757815441f54b24e81402b35386c50.png" width="100%"></a></div>
				<div class="desc">
					<p class="brand"><a href="/brand/view/1">[마몽드]</a></p>
					<p class="title"><a href="/product/view/1">젤리 블러셔</a></p>
					<p class="price">\18,000원</p>
				</div>
				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
			</div>
		</div>
		<div class="box box5 col-md-12">
			<div class="con-product-sm">
				<div class="pic thumbnail"><a href="/contents/onair/09"><img src="/static/images/content/09.jpg" width="100%"></a></div>
				<div class="desc">
					<a href="/contents/onair/09">
						<p>이국주와 함께하는 [언네네 HOT 초이스]</p>
					</a>
				</div>
				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
			</div>
		</div>
	</div>
	<div class="box box4 col-md-2">
		<div class="con-movie">
			<div class="pic thumbnail"><a href="/contents/onair/11"><img src="/static/images/content/11.jpg" width="100%"></a></div>
				
			<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				
			<div class="desc">
				<a href="/contents/onair/11">
					<p class="title">[언니네 핫 초이스]</p>
					<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
				</a>
				<p>모두가 놀란 국주언니의..모두가 놀란 국주언니의...모두가 놀란 국주언니의...모두가 놀란 국주언니의.,.모두가 놀란 국주언니의...모두가 놀란 국주언니의....</p>
				
			</div>
		</div>
	</div>	

	<div class="col-md-12 hr-bar"></div>
	
	<!-- section #2 -->
	<div id="section2">
		<div class="col-md-3">
			<div class="box box6 col-md-8">
				<div class="con-movie-sm">
					<div class="pic thumbnail">
						<a href="/contents/onair/11"><img src="/static/images/content/11.jpg" width="100%"></a>
					</div>
					
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
					
					<div class="desc">
						<a href="/contents/onair/11">
							<p class="title">[언니네 핫 초이스]</p>
							<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
						</a>
					</div>				
				</div>
			</div>
			<div class="box-fill box1 col-md-4">
				<div class="con-fill">
					<a href="/contents/onair/25"><img src="/static/images/content/25.jpg"></a>
				</div>
				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
			</div>
			<div class="box-fill box1 col-md-4">
				<div class="con-fill">
					<a href="/contents/onair/26"><img src="/static/images/content/26.jpg"></a>
				</div>
				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
			</div>
		</div>
		<div class="box box6 col-md-2">
			<div class="con-movie-sm">
				<div class="pic thumbnail">
					<a href="/contents/onair/04"><img src="/static/images/content/04.jpg" width="100%"></a>
				</div>
					
				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
					
				<div class="desc">
					<a href="/contents/onair/04">
						<p class="title">[언니네 핫 초이스]</p>
						<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
					</a>
				</div>				
			</div>
		</div>
		<div class="box box6 col-md-3">
			<div class="con-movie-sm">
				<div class="pic thumbnail">
					<a href="/contents/onair/07"><img src="/static/images/content/07.jpg" width="100%"></a>
				</div>

				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>

				<div class="desc">
					<a href="/contents/onair/07">
						<p class="title">[언니네 핫 초이스]</p>
						<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
					</a>
				</div>
			</div>
		</div>
		<div class="box box6 col-md-4">
				<div class="con-product">
					<div class="pic thumbnail"><a href="/product/view/2"><img src="/static/images/product/77757815441f54b24e81402b35386c50.png" width="100%"></a></div>
					<div class="desc">
						<p class="brand"><a href="/brand/view/1">[마몽드]</a></p>
						<p class="title"><a href="/product/view/2">젤리 블러셔</a></p>
						<p class="price">\18,000원</p>
					</div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
		
		</div>
		
	</div><!-- section #2 -->
	
	<!-- section #3 -->
	<div id="section3">

		<div class="box box4 col-md-3">
			<div class="con-board">
				<p class="title"><a href="/trouble/view/1">[피부가 건조해 죽겠어요! ㅠㅜ;]</a></p>
				<p class="content">
					<a href="/trouble/view/1">
						샤넬은 1883년 프랑스 남서부의 소뮈르(Saumur)의 가난한 집안에서 태어나 어린 시절 어머니와 사별하고 아버지에 의해 수도원에서 운영하는 보육원에 맡겨졌다. 보육원 시절 직업 교육의 일환으로 바느질을 배웠고, 이렇게 습득한 바느질 기술은 훗날 샤넬이 패션업을 시작해 그녀의 패션 감각을 구체화할 수 있는 발판이 되었다. 샤넬은 나중에 보육원을 나와 술집에서 노래를 부르게 되는데, 이때부터 샤넬 로고에 사용된 두 개의 ‘C’의 출처인 ‘코코(Coco)’라는 별칭을 사용했을 것으로 추정한다. 샤넬이 거짓말을 통해 숨기고자 했던 그녀의 이러한 불우한 성장 과정과 틀에 매인 교육의 부재는, 그녀가 기존의 관습을 깨고 시대적 변화의 흐름에 맞는 발상의 전환을 통해 새로운 스타일을 제안할 수 있었던 원동력이 되었다.
					</a>
				</p>
				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>

			</div>
		</div>
		<div class="box box4 col-md-5">
			<div class="con-movie">
				<div class="pic thumbnail">
					<a href="/contents/onair/19"><img src="/static/images/content/19.jpg" width="100%"></a>
				</div>
					
				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
					
				<div class="desc">
					<a href="/contents/onair/04">
						<p class="title">[언니네 핫 초이스]</p>
						<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
					</a>
					<p>모두가 놀란 국주언니의..모두가 놀란 국주언니의..	모두가 놀란 국주언니의...	모두가 놀란 국주언니의.모두가 놀란 국주언니의.모두가 놀란 국주언니의....</p>
				</div>				
			</div>
		
		</div>
		<div class="col-md-4">
			<div class="box box5 col-md-6">
				<div class="con-product-sm">
					<div class="pic thumbnail"<a href="/product/view/2"><img src="/static/images/product/1818bd54ca624cbf0e4a465335832da2.png" width="100%"></a></div>
					<div class="desc">
						<p class="brand"><a href="/brand/view/1">[마몽드]</a></p>
						<p class="title"><a href="/product/view/2">젤리 블러셔</a></p>
						<p class="price">\18,000원</p>
					</div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			
			</div>
			<div class="box box5 col-md-6">
				<div class="con-product-sm">
					<div class="pic thumbnail"><a href="/product/view/2"><img src="/static/images/product/3b17fc7b04f48343b089799a967434f0.png" width="100%"></a></div>
					<div class="desc">
						<p class="brand"><a href="/brand/view/1">[마몽드]</a></p>
						<p class="title"><a href="/product/view/2">젤리 블러셔</a></p>
						<p class="price">\18,000원</p>
					</div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			
			</div>
			<div class="box box5 col-md-6">
				<div class="con-product-sm">
					<div class="pic thumbnail"><a href="/product/view/2"><img src="/static/images/product/e7a4ba88c8da181509824dacd5a1954b.png" width="100%"></a></div>
					<div class="desc">
						<p class="brand"><a href="/brand/view/1">[마몽드]</a></p>
						<p class="title"><a href="/product/view/2">젤리 블러셔</a></p>
						<p class="price">\18,000원</p>
					</div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			
			</div>
			<div class="box box5 col-md-6">
				<div class="con-product-sm">
					<div class="pic thumbnail"><a href="/product/view/2"><img src="/static/images/product/87be969b8cce95fb7327f3eb69413025.png" width="100%"></a></div>
					<div class="desc">
						<p class="brand"><a href="/brand/view/1">[마몽드]</a></p>
						<p class="title"><a href="/product/view/2">젤리 블러셔</a></p>
						<p class="price">\18,000원</p>
					</div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			
			</div>
		</div>
	</div><!-- section #3 -->
	
	<!-- section #4 -->
	<div id="section4">
		<div class="col-md-2">
			<div class="box-fill box7 col-md-6">
				<div class="con-product-xs">
					<div class="pic"><a href="/product/view/2"><img src="/static/images/product/3b17fc7b04f48343b089799a967434f0.png" width="100%"></a></div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			</div>
			<div class="box-fill box7 col-md-6">
				<div class="con-product-xs">
					<div class="pic"><a href="/product/view/2"><img src="/static/images/product/87be969b8cce95fb7327f3eb69413025.png" width="100%"></a></div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			</div>
			<div class="box-fill box7 col-md-6">
				<div class="con-product-xs">
					<div class="pic"><a href="/product/view/2"><img src="/static/images/product/87be969b8cce95fb7327f3eb69413025.png" width="100%"></a></div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			</div>
			<div class="box-fill box7 col-md-6">
				<div class="con-product-xs">
					<div class="pic"><a href="/product/view/2"><img src="/static/images/product/1818bd54ca624cbf0e4a465335832da2.png" width="100%"></a></div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			</div>
			
			<div class="box-fill box8 col-md-12">
				<div class="con-movie-sm">
					<div class="pic">
						<a href="/contents/onair/04"><img src="/static/images/content/26.jpg" width="100%"></a>
					</div>
					
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			</div>
		</div>
		<div class="box box2 col-md-3">
			<div class="con-movie">
				<div class="pic thumbnail">
					<a href="/contents/onair/04"><img src="/static/images/content/19.jpg" width="100%"></a>
				</div>
					
				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
					
				<div class="desc">
					<a href="/contents/onair/04">
						<p class="title">[언니네 핫 초이스]</p>
						<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
					</a>
					<p>모두가 놀란 국주언니의..모두가 놀란 국주언니의..모두가 놀란 국주언니의....모두가 놀란 국주언니의..모두가 놀란 국주언니의...모두가 놀란 국주언니의....</p>
				</div>				
			</div>
		
		</div>
		<div class="box box2 col-md-3">
			<div class="con-movie">
				<div class="pic thumbnail">
					<a href="/contents/onair/15"><img src="/static/images/content/15.jpg" width="100%"></a>
				</div>
					
				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
					
				<div class="desc">
					<a href="/contents/onair/15">
						<p class="title">[언니네 핫 초이스]</p>
						<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
						<p>모두가 놀란 국주언니의...모두가 놀란 국주언니의...모두가 놀란 국주언니의...모두가 놀란 국주언니의...모두가 놀란 국주언니의...모두가 놀란 국주언니의....</p>
					</a>
				</div>				
			</div>		
		</div>
		<div class="box box2 col-md-4">
			<div class="con-movie">
				<div class="pic thumbnail">
					<a href="/contents/onair/14"><img src="/static/images/content/14.jpg" width="100%"></a>
				</div>
					
				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
					
				<div class="desc">
					<a href="/contents/onair/14">
						<p class="title">[언니네 핫 초이스]</p>
						<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
					</a>
					<p>모두가 놀란 국주언니의...모두가 놀란 국주언니의....모두가 놀란 국주언니의.모두가 놀란 국주언니의....모두가 놀란 국주언니의....</p>
				</div>				
			</div>		
		</div>
	</div><!-- section #4 -->
	
	<!-- section #5 -->
	<div id="section5">
		<div class="box box9 col-md-5">
		
			<div class="con-product-lg">
				<div class="pic"><a href="/product/view/1"><img src="/static/images/product/87be969b8cce95fb7327f3eb69413025.png" width="100%"></a></div>
				<div class="desc">
					<p class="brand"><a href="/brand/view/1">[마몽드]</a></p>
					<p class="title"><a href="/product/view/1">젤리 블러셔</a></p>
					<p class="price">\18,000원</p>
				</div>
				<div class="wish-box-up pull-right">WISH <span class="glyphicon glyphicon-heart" aria-hidden="true"></span></div>
			</div>
		
		</div>
		<div class="col-md-7">
			<div class="box box6 col-md-7">
				<div class="con-movie">
					<div class="pic thumbnail">
						<a href="/contents/onair/19"><img src="/static/images/content/19.jpg" width="100%"></a>
					</div>
						
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
						
					<div class="desc">
						<a href="/contents/onair/19">
							<p class="title">[언니네 핫 초이스]</p>
							<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
						</a>
						<p>모두가 놀란 국주언니의...모두가 놀란 국주언니의....모두가 놀란 국주언니의..모두가 놀란 국주언니의...모두가 놀란 국주언니의....</p>
					</div>				
				</div>			
			</div>
			<div class="box box6 col-md-5">
				<div class="box box6 col-md-8">
					<div class="con-movie-sm">
						<div class="pic thumbnail">
							<a href="/contents/onair/11"><img src="/static/images/content/11.jpg" width="100%"></a>
						</div>
						
						<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
						
						<div class="desc">
							<a href="/contents/onair/11">
								<p class="title">[언니네 핫 초이스]</p>
								<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
							</a>
						</div>				
					</div>
				</div>
				<div class="box-fill box1 col-md-4">
					<div class="con-fill">
						<a href="/contents/onair/25"><img src="/static/images/content/25.jpg"></a>
					</div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
				<div class="box-fill box1 col-md-4">
					<div class="con-fill">
						<a href="/contents/onair/26"><img src="/static/images/content/26.jpg"></a>
					</div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>			
			</div>
		</div>
		<div class="col-md-7">
			<div class="box box10 col-md-7">
				<div class="con-movie">
					<div class="pic thumbnail">
						<a href="/contents/onair/13"><img src="/static/images/content/13.jpg" width="100%"></a>
					</div>
						
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
						
					<div class="desc">
						<a href="/contents/onair/13">
							<p class="title">[언니네 핫 초이스]</p>
							<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
						</a>
						<p>모두가 놀란 국주언니의...모두가 놀란 국주언니의....모두가 놀란 국주언니의...모두가 놀란 국주언니의...모두가 놀란 국주언니의....</p>
					</div>				
				</div>					
			</div>
			<div class="box box10 col-md-5">
				<div class="con-movie">
					<div class="pic thumbnail">
						<a href="/contents/onair/12"><img src="/static/images/content/12.jpg" width="100%"></a>
					</div>
						
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
						
					<div class="desc">
						<a href="/contents/onair/12">
							<p class="title">[언니네 핫 초이스]</p>
							<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
						</a>
						<p>모두가 놀란 국주언니의...모두가 놀란 국주언니의...모두가 놀란 국주언니의...모두가 놀란 국주언니의....</p>
					</div>				
				</div>					
			</div>
		</div>
	</div><!-- section #5 -->
	
	<!-- section #6 -->
	<div id="section6">
		<div class="col-md-4">
			<div class="box box5 col-md-6">
				<div class="con-product-sm">
					<div class="pic thumbnail"><a href="/product/view/1"><img src="/static/images/product/1818bd54ca624cbf0e4a465335832da2.png" width="100%"></a></div>
					<div class="desc">
						<p class="brand"><a href="/brand/view/1">[마몽드]</a></p>
						<p class="title"><a href="/product/view/1">젤리 블러셔</a></p>
						<p class="price">\18,000원</p>
					</div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			
			</div>
			<div class="box box5 col-md-6">
				<div class="con-product-sm">
					<div class="pic thumbnail"><a href="/product/view/2"><img src="/static/images/product/3b17fc7b04f48343b089799a967434f0.png" width="100%"></a></div>
					<div class="desc">
						<p class="brand"><a href="/brand/view/1">[마몽드]</a></p>
						<p class="title"><a href="/product/view/1">젤리 블러셔</a></p>
						<p class="price">\18,000원</p>
					</div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			
			</div>
			<div class="box box5 col-md-6">
				<div class="con-product-sm">
					<div class="pic thumbnail"><a href="/product/view/3"><img src="/static/images/product/e7a4ba88c8da181509824dacd5a1954b.png" width="100%"></a></div>
					<div class="desc">
						<p class="brand"><a href="/brand/view/1">[마몽드]</a></p>
						<p class="title"><a href="/product/view/1">젤리 블러셔</a></p>
						<p class="price">\18,000원</p>
					</div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			
			</div>
			<div class="box box5 col-md-6">
				<div class="con-product-sm">
					<div class="pic thumbnail"><a href="/product/view/4"><img src="/static/images/product/87be969b8cce95fb7327f3eb69413025.png" width="100%"></a></div>
					<div class="desc">
						<p class="brand"><a href="/brand/view/1">[마몽드]</a></p>
						<p class="title"><a href="/product/view/1">젤리 블러셔</a></p>
						<p class="price">\18,000원</p>
					</div>
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
				</div>
			
			</div>		
		</div>
		<div class="box box4 col-md-4">
			<div class="con-board">
				<p class="title"><a href="/trouble/view/2">[화장이 잘 안 먹어요!]</a></p>
				<p class="content">
					<a href="/trouble/view/2">
						샤넬은 1883년 프랑스 남서부의 소뮈르(Saumur)의 가난한 집안에서 태어나 어린 시절 어머니와 사별하고 아버지에 의해 수도원에서 운영하는 보육원에 맡겨졌다. 보육원 시절 직업 교육의 일환으로 바느질을 배웠고, 이렇게 습득한 바느질 기술은 훗날 샤넬이 패션업을 시작해 그녀의 패션 감각을 구체화할 수 있는 발판이 되었다. 샤넬은 나중에 보육원을 나와 술집에서 노래를 부르게 되는데, 이때부터 샤넬 로고에 사용된 두 개의 ‘C’의 출처인 ‘코코(Coco)’라는 별칭을 사용했을 것으로 추정한다. 샤넬이 거짓말을 통해 숨기고자 했던 그녀의 이러한 불우한 성장 과정과 틀에 매인 교육의 부재는, 그녀가 기존의 관습을 깨고 시대적 변화의 흐름에 맞는 발상의 전환을 통해 새로운 스타일을 제안할 수 있었던 원동력이 되었다.
					</a>
				</p>
				<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>

			</div>
		
		</div>
		<div class="box box4 col-md-4">
				<div class="con-movie">
					<div class="pic thumbnail">
						<a href="/contents/onair/12"><img src="/static/images/content/12.jpg" width="100%"></a>
					</div>
						
					<div class="wish-box-sm pull-right"><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span></div>
						
					<div class="desc">
						<a href="/contents/onair/12">
							<p class="title">[언니네 핫 초이스]</p>
							<p>ep.05 "5살 어려보이는 비법! 하트라인 만들기"</p>
						</a>
						<p>모두가 놀란 국주언니의...모두가 놀란 국주언니의..모두가 놀란 국주언니의...모두가 놀란 국주언니의...모두가 놀란 국주언니의....</p>
					</div>				
				</div>					
		
		</div>
	</div><!-- section #6 -->
	
</div>
<div class="container hr-bar-bs"></div>

