<link href="/static/css/movie_list.css" rel="stylesheet" type="text/css">

<script src="/static/js/movie_list.js"></script>

<script>
	var category_idx = '<?php echo($data['category']);?>';
</script>


<?php
	if($data['category'] == 0){ 
?>
<nav id="topChannelList" class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">채널목록</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
<?php 
	foreach($data['channels']['items'] as $item){
?>
           	<li><a href="/movie_list/index/<?php echo($item['idx']);?>"><h5><span class="glyphicon glyphicon-facetime-video"></span> <?php echo($item['cc_title']);?> <?php if($item['new_cnt'] > 0){ ?><span class="badge"><?php echo($item['new_cnt']);?></span><?php }?></h5></a></li>
<?php 
	}
?>          
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="mainTop" class="col-xs-12 col-sm-12 col-md-12">
	<div id="mainTopLeft" class="col-xs-12 col-sm-2 col-md-2">
    	<div id="mainTopLeftMenu" class="panel panel-default">
    		<div class="panel-body">
	        	<ul>
	            	<li><a href="#">추천동영상</a></li>
	            </ul>
			</div>
        </div>
        <div id="mainTopLeftChannel" class="panel panel-default">
        	<div class="panel-body" style="padding-right: 5px;">
	        	<ul id="channelList">
<?php 
	foreach($data['channels']['items'] as $item){
?>
	            	<li><a href="/movie_list/index/<?php echo($item['idx']);?>"><h5><span class="glyphicon glyphicon-facetime-video"></span> <?php echo($item['cc_title']);?> <?php if($item['new_cnt'] > 0){ ?><span class="badge"><?php echo($item['new_cnt']);?></span><?php }?></h5></a></li>
<?php 
}
?>
	            </ul>
			</div>
        </div>
    </div>
    <div id="mainTopCenter" class="col-xs-12 col-sm-12 col-md-7">
    	<div id="mainBanner">
        
            <div id="mainBannerCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#mainBannerCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mainBannerCarousel" data-slide-to="1"></li>
                <li data-target="#mainBannerCarousel" data-slide-to="2"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <a href="/movie_list/index/1"><img src="/static/images/banner/main_banner_01.jpg" width="100%" alt="이청아와 함께하는 리얼 뷰티쇼!"></a>
                </div>
                <div class="item">
                  <a href="/movie_list/index/2"><img src="/static/images/banner/main_banner_02.jpg" width="100%" alt="홍스광뷰티!"></a>
                </div>
                <div class="item">
                  <a href="/movie_list/index/3"><img src="/static/images/banner/main_banner_03.jpg" width="100%" alt="언니네HOT초이스!"></a>
                </div>
              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#mainBannerCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">&lt;</span>
              </a>
              <a class="right carousel-control" href="#mainBannerCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">&gt;</span>
              </a>
            </div>

        </div>
    </div>
    <div id="mainTopRight" class="col-xs-12 col-sm-3 col-md-3 panel panel-default">
    	<div class="panel-body">
        	<img src="../../static/images/title_best.png">
        	<img src="../../static/images/line_best.png">
    		<ul id="ranking">
<?php 
$rank = 1;
foreach($data['best'] as $item){
?>
				<li data-cidx="<?php echo($item['idx']);?>"><p><span class="badge"><?php echo($rank++);?></span> &nbsp;&nbsp;<?php echo(hc($item['title'], 16));?></p></li>
<?php 
}
?>
            </ul>
        </div>
    </div>
</div>
<?php 
}	//category == 0
?>
<div id="mainList" class="col-xs-12 col-sm-12 col-md-12">
<?php
	if($data['category'] != 0){ 
?>
	<div id="subTitle"><img src="/static/images/title/movie_ch_subtitle_<?php echo($data['category']);?>.jpg"></div>
	<ul id="channelList2" class="col-xs-12 col-sm-12 col-md-12">
<?php 
	foreach($data['channels']['items'] as $item){
?>
	            	<li class="col-xs-4 col-sm-4 col-md-4"><a href="/movie_list/index/<?php echo($item['cc_idx']);?>"><h4><?php echo($item['cc_title']);?> <?php if($item['new_cnt'] > 0){ ?><span class="badge"><?php echo($item['new_cnt']);?></span><?php }?></h4></a></li>
<?php 
}
?>
	</ul>
	
	
<?php 
}
?>
	<div id="movieListWrap">
    	<ul id="movieList">

        </ul>
    </div>
    <div id="btnMore" class="col-xs-12 col-sm-12 col-md-12 text-center">
    	<button id="btnMoreContentList" type="button" class="col-xs-12 col-sm-12 col-md-12 btn btn-default">More...</button>
	</div>
</div>
<div></div>


<!-- Modal Movie View -->
<div id="modalMovieView" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div id="modalMovieDialog" class="modal-dialog">
    <div id="contentArea" class="modal-content">
		<div class="modal-header">
			<button id="bigModalCloseBtn" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title"><img src="/static/images/player_logo.png"></h4>
      	</div>   
    
		<div id="movieContent" class="modal-body" style="padding: 0px;">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div id="moviePlayer">

<!-- 16:9 aspect ratio -->
<div id="youtubePlayer" class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/yTdqytmnMFg"></iframe>
</div>

<!-- 4:3 aspect ratio -->
<!-- div class="embed-responsive embed-responsive-4by3">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/wcoXcQDWvLQ?list=PLsqLZbGHLTqNosOF3FDRKVe3RH36W0dtz"></iframe>
</div-->				
				</div>
				<div id="movieInfo">
					<p><h2 id="movieTitle">Title</h2></p>
					<p><h4 id="movieSummary">subTitle</h4></p>
					<p><h6 id="movieDesc">desc</h6></p>
				</div>
			</div>
		</div>
      	   
    </div>
    
	<div id="relationArea" class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>		
        	<h4 class="modal-title"></h4>
      	</div>
      	
      	<!-- 관련 상품 목록 -->
		<div id="relativeProduct" class="row modal-body" style="padding: 0 10px;">
				<div class="col-xs-12 col-sm-12 col-md-12" style="padding-left:15px;">
					<h5>Products</h5>
					<ul id="relationProductList" class="col-xs-12 col-sm-12 col-md-12">
					</ul>
				</div>
		</div>
		
		<!-- 태그 목록 -->
		<div id="tagContent" class="row modal-body" style="padding: 0 10px;">
			<div class="col-xs-12 col-sm-12 col-md-12" style="padding-left:15px;">
				<h5>Tags</h5>
				<ul id="contentTagList" >
					<li class="tag-box">#뷰티스테이션</li>
				</ul>
			</div>
		</div>
		
		
		<div id="movieContent" class="row modal-body" style="padding: 0 10px;">
			<div class="col-xs-12 col-sm-12 col-md-12" style="padding-left:15px;">
				<h5>Videos</h5>
				<ul id="relationContentList" class="col-xs-12 col-sm-12 col-md-12">
				
				</ul>
			</div>
		</div>
      	   
    </div>    
  </div>
</div>
<!-- Modal Movie View end -->


    <script>

      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
	</script>
<?php 

function hc( $str, $n = 500, $end_char = ' ...' )
{
	$CI =& get_instance();
	$charset = $CI->config->item('charset');

	if ( mb_strlen( $str , $charset) < $n ) {
		return $str ;
	}

	$str = preg_replace( "/\s+/iu", ' ', str_replace( array( "\r\n", "\r", "\n" ), ' ', $str ) );

	if ( mb_strlen( $str , $charset) <= $n ) {
		return $str;
	}
	return mb_substr(trim($str), 0, $n ,$charset) . $end_char ;
}
?>