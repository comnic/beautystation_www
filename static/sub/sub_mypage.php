		<div id="myPageSubMenu" class="col-md-12 submenu">
			<p class="title">
				MY<BR>
				PAGE			
			</p>
			<div class="underbar"></div>
			<ul class="nav menuItems">
				<li <?php if($SUBMENU_NO == "11") echo(' class="active"');?>><a href="/member/mypage">상세정보</a></li>
				<li>
					<a href="/member/recommend_contents">추천해요</a>
					<ul class="nav">
						<li <?php if($SUBMENU_NO == "21") echo(' class="active"');?>><a href="/member/recommend_contents">- contents</a></li>
						<li <?php if($SUBMENU_NO == "22") echo(' class="active"');?>><a href="/member/recommend_products">- products</a></li>
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