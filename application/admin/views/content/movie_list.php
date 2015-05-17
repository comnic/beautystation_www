<div id="movieList" class="container">
	Movie List
	<table class="table table-striped">
		<thead>
			<tr>
				<td>No.</td>
				<td>Ch</td>
				<td>Title</td>
				<td>Thumbnail</td>
				<td>Man</td>
			</tr>
		</thead>
		<tbody>
<?php
print_r($items);
$no = 1;
foreach($items as $item){
?>		
		<tr>
			<td><?=$no++?></td>
			<td><?=$item['category']?></td>
			<td><?=$item['title']?></td>
			<td><img src='<?=$item['img']?>' width="100"></td>
			<td>
				<button class="btn btn-sm btn-primary">미리보기</button>
				<button class="btn btn-sm btn-primary">수정</button>
				<button class="btn btn-sm btn-primary">삭제</button>
			</td>
		</tr>	
<?php 
}
?>		
		</tbody>
	</table>


</div>