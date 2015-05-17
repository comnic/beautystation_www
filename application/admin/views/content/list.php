<!-- css -->
<link href="/static/admin/css/content_list.css" rel="stylesheet" type="text/css">
<style type="text/css">
	a img {border: none;} 
	#largeImage {position: absolute;padding: .5em;background: #e3e3e3;border: 1px solid;}
</style>
<script type="text/javascript">
	$(function(){
		var offsetX = 20;
		var offsetY = 10;
                
		$('.thumb_img').hover(function(e){
			//mouse on
			var src = $(this).attr('src');
			$('<img id="largeImage" src="' + src + '">').css('top', e.pageY + offsetY).css('left', e.pageX + offsetX).appendTo('body');
		}, function(){
			//mouse off
			$('#largeImage').remove();
		});
                
		$('a').mousemove(function(e){
			$('#largeImage').css('top', e.pageY + offsetY).css('left', e.pageX + offsetX);
		})
                
	});
</script>

<script>
$(document).ready(function(){
	$('.btn-delete').click(function(){
		if(confirm('정말 삭제하시겠습니까?')){
			var obj = $(this);
			var idx = $(this).data('no');
			$.getJSON('/admin.php/contents/delete/'+idx, function(response){
				if(response.result == "OK"){
					$($(obj).parent().parent()).hide();
				}else{
					alert(response.msg);
				}
			});
		}
	});

});

</script>
<div class="main-wrap col-md-10">
	<div class="main-title" class="col-md-12">컨텐츠 목록</div>
	<div id="contentList">
		<table class="table table-striped">
			<thead>
				<tr>
					<td class="text-center">no</td>
					<td>이미지</td>
					<td>채널</td>
					<td>타이틀</td>
					<td>발행일</td>
					<td>활성화</td>
					<td class="text-center">관리</td>
				</tr>
			</thead>
			<tbody>
<?php foreach ($items as $row){ ?>
				<tr>
					<td class="text-center"><?=$start_idx--?></td>
					<td><img class="thumb_img" src="<?=$row['img']?>" width="100"></td>
					<td><?=$row['channel']?></td>
					<td><span class="title"><?=$row['title']?></span></td>
					<td><?=$row['publish_date']?></td>
					<td><?=$row['active']?></td>
					<td class="text-center"><a href="/admin.php/contents/modify/<?=$row['idx']?>" class="btn btn-sm btn-success">수정</a> <button class="btn-delete btn btn-sm btn-danger" data-no="<?=$row['idx']?>">삭제</button></td>
				</tr>
<?php }	?>
				<tfoot>
					<tr>
						<td colspan="6" class="text-center">
							<?php echo($pagination); ?>
						</td>
						<td class="text-center"><a href="/admin.php/contents/add" class="btn btn-primary">등록하기</a></td>
					</tr>
				</tfoot>
			</tbody>
		
		</table>
	</div>
</div>