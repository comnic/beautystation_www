		<div id="myPageSubMenu" class="col-md-12 submenu">
			<p class="title">
				PRODUCT			
			</p>
			<div class="underbar"></div>
			<ul class="nav menuItems">
				<li>
					<a href="/member/recommend_contents">상품목록</a>
					<ul class="nav">
						<li <?php if($SUBMENU_NO == "11") echo(' class="active"');?>><a href="/member/recommend_contents">- 브랜드별</a></li>
						<li <?php if($SUBMENU_NO == "12") echo(' class="active"');?>><a href="/member/recommend_products">- 카테고리별</a></li>
						<li <?php if($SUBMENU_NO == "13") echo(' class="active"');?>><a href="/member/recommend_products">- 검색</a></li>
					</ul>
				</li>
				<li <?php if($SUBMENU_NO == "2") echo(' class="active"');?>><a href="/member/mypage">내가 찾는 상품</a></li>
				<li <?php if($SUBMENU_NO == "3") echo(' class="active"');?>><a href="#">상품랭킹</a></li>
			</ul>

		</div>