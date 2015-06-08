<?php 
$maxCh = 4;
$ch = $data['ch'];
if($ch == 1)
	$preCh = $maxCh;
else
	$preCh = $ch - 1;

if($ch == $maxCh)
	$nextCh = 1;
else
	$nextCh = $ch + 1;

?>

<link href="/static/css/contents/list_onair.css" rel="stylesheet" type="text/css">
<script src="/static/js/contents/list_onair.js"></script>
<script>
var ch = '<?=$ch?>';
</script>
<div class="container content">
	<!-- page navi -->
	<!-- div id="pageNavi" class="pull-right">
		<ol class="breadcrumb pageNavi"> <li><a href="/">HOME</a></li><li><a href="/contents/list/onair">Contents List</a></li><li class="active">OnAir</li></ol>
	</div--><!-- page navi -->
	
	<!-- page wrap -->
	<div id="contentsListWrap" class="col-md-12 page-wrap">
		<!-- nav buttons -->
		<div id="chNavLeft" data-ch="">
			<a href="/contents/lists/onair/<?=$preCh?>"><img class="leftChBanner" src="/static/images/content/list/btn_ch<?=$preCh?>_over.png"></a>
			<img class="leftBtn" src="/static/images/content/list/btn_ch<?=$ch?>_left.png">
		</div>
		<div id="chNavRight" data-ch="">
			<div id="innerWrap">
				<img class="rightBtn" src="/static/images/content/list/btn_ch<?=$ch?>_right.png">
				<a href="/contents/lists/onair/<?=$nextCh?>"><img class="rightChBanner" src="/static/images/content/list/btn_ch<?=$nextCh?>_over.png"></a>
			</div>
		</div>
		<!-- nav buttons -->
		
		<!-- top layer -->
		<div id="TopLayer" class="col-md-12 contents-list-ch<?=$ch?>">
			<div id="playerLayer" class="col-md-offset-1 col-md-10">
				<div class="big-player pull-left">
					<iframe width="625" height="352" src="https://www.youtube.com/embed/<?=$data['lists']['items'][0]['movie_id']?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="small-player pull-right">
					<iframe width="300" height="169" src="https://www.youtube.com/embed/<?=$data['lists']['items'][1]['movie_id']?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
				</div>
				<div class="small-player pull-right">
					<iframe width="300" height="169" src="https://www.youtube.com/embed/<?=$data['lists']['items'][2]['movie_id']?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>

		</div><!-- top layer -->
		
		<!-- bottom layer -->
		<div id="BottomLayer" class="col-md-12">
			<div id="titleLayer" class="col-md-offset-1 col-md-10">
				<p class="list-title">트루美쇼</p>
			</div>
		
			<!-- list layer -->
			<div id="listLayer" class="col-md-offset-1 col-md-10">
				<div id="contentsListWrap" class="col-md-12">
					<ul id="contentsList">
<?php 
	foreach($data['lists']['items'] as $item){
?>
						<li>
							<div><a href="/contents/onair/<?=$item['idx']?>"><img src="<?=$item['img']?>" width="100%"></a></div>
							<div>
								<a href="/contents/onair/<?=$item['idx']?>"><p class="title"><?=$item['title']?></p></a>
								<p class="desc">조회수 <?=$item['cnt']?>회</p>
							</div>
						</li>
<?php 
	}
?>
					</ul>
				</div>
				<div id="btnMoreLayer" class="col-md-12 text-center">
					<img id="btnMore" src="/static/images/common/btn_more.png">
				</div>
			</div><!-- list layer -->
			
		</div><!-- bottom layer -->
	
	</div><!-- page wrap -->
</div>
