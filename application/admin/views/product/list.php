<!-- css -->
<link href="/static/admin/css/product_list.css" rel="stylesheet" type="text/css">
<style type="text/css">
	a img {
		border: none;
	} 
	#largeImage {
		position: absolute;
		padding: .5em;
		background: #e3e3e3;
		border: 1px solid;
	}
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
			$.getJSON('/admin.php/products/delete/'+idx, function(response){
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
	<div class="main-title" class="col-md-12">상품 목록</div>
	<div id="productList">
		<table class="table table-striped">
			<thead>
				<tr>
					<td class="text-center">no</td>
					<td>이미지</td>
					<td>카테고리</td>
					<td>brand</td>
					<td>상품명</td>
					<td class="text-center">관리</td>
				</tr>
			</thead>
			<tbody>
<?php 
	foreach ($items as $row){
		$p_img = ($row['p_img'] == "") ? "/static/images/product/none.png" : $row['p_img']; 
?>
				<tr>
					<td class="text-center"><?=$start_idx--?></td>
					<td><img class="thumb_img" src="<?=$p_img?>" width="100"></td>
					<td><span class="catName"><?=$row['pc_display_name']?></span></td>
					<td><?=$row['pb_name']?></td>
					<td><?=$row['p_name']?></td>
					<td class="text-center"><a href="/admin.php/products/modify/<?=$row['idx']?>" class="btn btn-sm btn-success">수정</a> <button class="btn-delete btn btn-sm btn-danger" data-no="<?=$row['p_idx']?>">삭제</button></td>
				</tr>
<?php }	?>
				<tfoot>
					<tr>
						<td colspan="5" class="text-center">
							<?php echo($pagination); ?>
						</td>
						<td class="text-center"><a href="/admin.php/products/add" class="btn btn-primary">등록하기</a></td>
					</tr>
				</tfoot>
			</tbody>
		
		</table>
	</div>
</div>