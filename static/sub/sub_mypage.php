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
					<a href="/member/wish_list">위시리스트</a>
					<ul class="nav">
						<li <?php if($SUBMENU_NO == "31") echo(' class="active"');?>><a href="/member/wish_list/onair">- On:Air</a></li>
						<li <?php if($SUBMENU_NO == "32") echo(' class="active"');?>><a href="/member/wish_list/magzine">- Magzine</a></li>
						<li <?php if($SUBMENU_NO == "33") echo(' class="active"');?>><a href="/member/wish_list/brand">- Brand</a></li>
						<li <?php if($SUBMENU_NO == "34") echo(' class="active"');?>><a href="/member/wish_list/product">- product</a></li>
					</ul>
				</li>
				<li <?php if($SUBMENU_NO == "4") echo(' class="active"');?>><a href="/member/mytrouble">나의 고민</a></li>
				<li <?php if($SUBMENU_NO == "5") echo(' class="active"');?>><a href="/member/powderroom">파우더 룸</a></li>
				<li <?php if($SUBMENU_NO == "6") echo(' class="active"');?>><a href="/member/mysurvey">설문</a></li>
				<li <?php if($SUBMENU_NO == "7") echo(' class="active"');?>><a href="#">포인트</a></li>
				<li <?php if($SUBMENU_NO == "8") echo(' class="active"');?>><a href="#">통계</a></li>
			</ul>

		</div>