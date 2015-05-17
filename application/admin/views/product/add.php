<!-- css -->
<link href="/static/admin/css/product_add.css" rel="stylesheet" type="text/css">

<link href="/static/lib/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
<script src="/static/lib/bootstrap-datepicker/js/bootstrap-datepicker.min.js" charset="UTF-8"></script>
<script src="/static/lib/bootstrap-datepicker/locales/bootstrap-datepicker.kr.min.js" charset="UTF-8"></script>
<script>
$(document).ready(function(){
	$('.datepicker').datepicker({
	    language: 'kr',
	    format: 'yyyy/mm/dd'
	});
});
</script>
<?php //echo validation_errors(); ?>

<div class="main-wrap col-md-10">
	<div class="main-title" class="col-md-12">제품 등록</div>
	<div id="productAdd">
	
		<?php echo form_open_multipart('admin.php/products/add'); ?>
		<div class="col-md-12">
			<div class="form-group">
				<label for="p_brand">카테고리 [<button class="btn btn-link btn-sm">카테고리 등록</button>]</label>
				<?php echo form_dropdown('pc_idx', $category_options, set_value('pc_idx'), 'class="form-control"')	?>
				<?php echo form_error('pc_idx'); ?>
			</div>
		
			<div class="form-group">
				<label for="p_brand">브랜드 [<button class="btn btn-link btn-sm">브랜드 등록</button>]</label>
				<?php echo form_dropdown('pb_idx', $brand_options, set_value('pb_idx'), 'class="form-control"')	?>
				<?php echo form_error('pb_idx'); ?>
			</div>
		
			<div class="form-group">
				<label for="p_name">제품명</label>
				<input type="text" class="form-control" name="p_name" id="p_name" placeholder="제품명을 입력하세요!" value="<?php echo set_value('p_name'); ?>">
				<?php echo form_error('p_name'); ?>
			</div>
			
			<div class="form-group">
				<label for="p_capacity">용량</label>
				<input type="text" class="form-control" name="p_capacity" id="p_capacity" placeholder="용량을 입력하세요!" value="<?php echo set_value('p_capacity'); ?>">
				<?php echo form_error('p_capacity'); ?>
			</div>
		
			<div class="form-group">
				<label for="p_color">색상</label>
				<input type="text" class="form-control" name="p_color" id="p_color" placeholder="컬러를 입력하세요!" value="<?php echo set_value('p_color'); ?>">
				<?php echo form_error('p_color'); ?>
			</div>
			
			<div class="form-group">
				<label for="p_price">가격</label>
				<input type="text" class="form-control" name="p_price" id="p_price" placeholder="가격을 입력하세요!" value="<?php echo set_value('p_price'); ?>">
				<?php echo form_error('p_price'); ?>
			</div>
			
			<div class="form-group">
				<label for="userfile">Thumbnail 이미지(450x450권장)</label>
				<input type="file" class="form-control" name="userfile" id="userfile" placeholder="" value="<?php echo set_value('userfile'); ?>">
				<?php echo form_error('userfile'); ?>
				<?php echo $error;?>
			</div>
			
			<div class="form-group">
				<label for="p_desc">간략 설명</label>
				<textarea class="form-control" name="p_desc" id="p_desc" placeholder="간단한 설명을 100자 내외로 적어 주세요!"><?php echo set_value('p_desc'); ?></textarea>
				<?php echo form_error('p_desc'); ?>
			</div>
			<div class="pull-right">
				<a href="/admin.php/products/lists/" class="btn">Cancel</a><button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
		
		</form>
	</div>
</div>