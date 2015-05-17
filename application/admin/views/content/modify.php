<!-- css -->
<link href="/static/admin/css/content_modify.css" rel="stylesheet" type="text/css">
<script src="/static/admin/js/content_modify.js" charset="UTF-8"></script>

<link href="/static/lib/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
<link href="/static/lib/tagsly/tagsly.css" rel="stylesheet" type="text/css">

<script src="/static/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js" charset="UTF-8"></script>
<script src="/static/lib/bootstrap-datepicker/locales/bootstrap-datepicker.kr.min.js" charset="UTF-8"></script>
<script src="/static/lib/tagsly/tagsly.js" charset="UTF-8"></script>

<script>
$(document).ready(function(){
	$('.datepicker').datepicker({
	    language: 'kr',
	    format: 'yyyy/mm/dd'
	});
});
</script>


<script>
$(function() {
	$('#c_tags').tagsly({
		suggestions: function(input, cb) {
			cb([<?=$data['suggestion_tags']?>]);	//DB에서 tag목록을 가져와서 뿌려 줘야 함. 많으면 상위 몇개만 짤라서...
		},
		placeholder: 'Enter Tags!',
		maxItems: 100
	});
});
</script>


<div class="main-wrap col-md-10">
	<div class="main-title" class="col-md-12">상품 목록</div>
	<div id="contentModify">
<?php echo form_open_multipart('admin.php/contents/modify/'.$data['c_idx']); ?>
<div class="">
	<div class="form-group">
		<label for="c_kind">컨텐츠 종류</label>
		<?php echo form_dropdown('c_kind', $data['kind_options'], set_value('c_kind', $data['c_kind']), 'class="form-control"')	?>
		<?php echo form_error('c_kind'); ?>
	</div>

	<div class="form-group">
		<label for="c_channel">채널</label>
		<?php echo form_dropdown('c_channel', $data['channel_options'], set_value('c_channel', $data['cc_idx']), 'class="form-control"')	?>
		<?php echo form_error('c_channel'); ?>
	</div>
	
	<div class="form-group">
		<label for="c_seq">회차</label>
		<input type="number" class="form-control" name="c_seq" id="c_seq" placeholder="회차를 입력하세요!" value="<?php echo set_value('c_seq', $data['c_seq']); ?>">
		<?php echo form_error('c_seq'); ?>
	</div>
	
	<div class="form-group">
		<label for="c_title">제목</label>
		<input type="text" class="form-control" name="c_title" id="c_title" placeholder="제목을 입력하세요!" value="<?php echo set_value('c_title', $data['c_title']); ?>">
		<?php echo form_error('c_title'); ?>
	</div>
	
	<div class="form-group">
		<label for="c_tags">태그 <?=set_value('c_tags')?></label>
		<input type="text" class="form-control" name="c_tags" id="c_tags" placeholder="태그 목록을 입력하세요!" value="<?php echo set_value('c_tags', $data['tags']); ?>">
		<?php echo form_error('c_tags'); ?>
	</div>
	
	<div class="form-group">
		<label for="c_movie">동영상 링크(유투브 동영상 ID)</label>
		<input type="text" class="form-control" name="c_movie" id="c_movie" placeholder="유투브 ID를 입력하세요!" value="<?php echo set_value('c_movie', $data['c_movie_link']); ?>">
		<?php echo form_error('c_movie'); ?>
	</div>

	<div class="form-group">
		<label for="userfile">Thumbnail 이미지(740x480권장)</label>
		<br>
		<img class="thumbnail" src="<?=$data['c_img']?>" width="200">
		<?php 
			$img_info = getimagesize(substr($data['c_img'], 1));
			echo($img_info[0] . "x" . $img_info[1] . "(" . $img_info['mime'] . ")");
		?>
		<input type="file" class="form-control" name="userfile" id="userfile" placeholder="유투브 ID를 입력하세요!" value="<?php echo set_value('userfile'); ?>">
		<?php echo form_error('userfile'); ?>
		<?php echo $error;?>
	</div>
	
	<div class="form-group">
		<label for="c_summary">간략 설명</label>
		<textarea class="form-control" name="c_summary" id="c_summary" placeholder="간단한 설명을 100자 내외로 적어 주세요!"><?php echo set_value('c_summary', $data['c_summary']); ?></textarea>
		<?php echo form_error('c_summary'); ?>
	</div>
	
	<div class="form-group">
		<label for="c_content">내용</label>
		<textarea class="form-control" name="c_content" id="c_content" placeholder="간단한 설명을 300자 내외로 적어 주세요!"><?php echo set_value('c_content', $data['c_content']); ?></textarea>
		<?php echo form_error('c_content'); ?>
	</div>

			<div class="form-group">
				<label for="c_relative_product">관련상품</label>				
				<div id="relative_list" class="col-md-12 well">
					<ul id="relative_list_items">
						<li><div id="btnRegRelativeProduct" style="width:100px;height:100px;padding-top:40px;" class="btn btn-primary">추가하기</div></li>
<?php 
foreach($data['product_list'] as $item){
?>
					<li data-idx="<?=$item[0]?>">
						<img src="<?=$item[1]?>" width="100" class="img-responsive thumbnail">
						<p class="delRelativeProduct btn btn-link">X</p>
					</li>
<?php 
}
?>
					</ul>
				</div>
				<?php echo form_error('c_relative_product'); ?>
			</div>
	
	<div class="form-group">
		<label for="c_publish">발행일</label>
		<input type="text" class="datepicker form-control" name="c_publish" id="c_publish" value="<?php echo set_value('c_publish', $data['c_publish_date']); ?>">
		<?php echo form_error('c_publish'); ?>
	</div>
	
	<div class="form-group">
		<label for="c_publish">활성화</label><br>
		<div class="btn-group" data-toggle="buttons">
		  <label class="btn btn-danger <?=$data['c_active'] == 'Y'?'active':''?>">
		    <input type="checkbox" name="c_active" id="c_active" value="Y" autocomplete="off"> 활성화
		  </label>
		</div>	
	</div>	
	
	<div class="text-right">
		<a href="/admin.php/contents/lists/" class="btn">Cancel</a><button type="submit" class="btn btn-primary">Submit</button>
	</div>
</div>

</form>

</div>
</div>


<!-- Modal -->
<div class="modal fade" id="relativeProductModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">관련상품 등록</h4>
      </div>
      <div class="modal-body">
		
		<div class="">
			<div class="form-group">
				<label for="p_brand">카테고리</label>
				<?php echo form_dropdown('pc_idx', $data['category_options'], set_value('pc_idx'), 'class="form-control" onchange="loadProductList(this.value);"')	?>
				<?php echo form_error('pc_idx'); ?>
			</div>
			<div id="lyrProductList">
				<ul id="popProductList">
				</ul>
			</div>
			<div>
				<button id="btnAddRelativeProduct" class="btn btn-primary center-block">관련상품 추가</button>
			</div>
		</div>
		
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
