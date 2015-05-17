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

<?php echo form_open_multipart('admin/movie_add'); ?>
<div class="col-md-4">
	<div class="form-group">
		<label for="c_kind">컨텐츠 종류</label>
		<select class="form-control" name="c_kind" id="c_kind">
			<option value="" <?php echo set_select('c_kind', ''); ?>>컨텐츠 종류를 선택하세요!</option>
			<option value="MV" <?php echo set_select('c_kind', 'MV'); ?>>Movie</option>
			<option value="MZ" <?php echo set_select('c_kind', 'MZ'); ?>>Magzine</option>
		</select>
		<?php echo form_error('c_kind'); ?>
	</div>

	<div class="form-group">
		<label for="c_channel">채널</label>
		<select class="form-control" name="c_channel" id="c_channel">
			<option value="" <?php echo set_select('c_channel', ''); ?>>채널을 선택하세요!</option>
			<option value="1" <?php echo set_select('c_channel', '1'); ?>>트루美쇼</option>
			<option value="2" <?php echo set_select('c_channel', '2'); ?>>홍스광뷰티</option>
			<option value="3" <?php echo set_select('c_channel', '3'); ?>>언니네 HOT 초이스</option>
		</select>
		<?php echo form_error('c_channel'); ?>
	</div>
	
	<div class="form-group">
		<label for="c_seq">회차</label>
		<input type="number" class="form-control" name="c_seq" id="c_seq" placeholder="회차를 입력하세요!" value="<?php echo set_value('c_seq'); ?>">
		<?php echo form_error('c_seq'); ?>
	</div>
	
	<div class="form-group">
		<label for="c_title">제목</label>
		<input type="text" class="form-control" name="c_title" id="c_title" placeholder="제목을 입력하세요!" value="<?php echo set_value('c_title'); ?>">
		<?php echo form_error('c_title'); ?>
	</div>

	<div class="form-group">
		<label for="c_movie">동영상 링크(유투브 동영상 ID)</label>
		<input type="text" class="form-control" name="c_movie" id="c_movie" placeholder="유투브 ID를 입력하세요!" value="<?php echo set_value('c_movie'); ?>">
		<?php echo form_error('c_movie'); ?>
	</div>

	<div class="form-group">
		<label for="userfile">Thumbnail 이미지(740x480권장)</label>
		<input type="file" class="form-control" name="userfile" id="userfile" placeholder="유투브 ID를 입력하세요!" value="<?php echo set_value('userfile'); ?>">
		<?php echo form_error('userfile'); ?>
		<?php echo $error;?>
	</div>
	
	<div class="form-group">
		<label for="c_summary">간략 설명</label>
		<textarea class="form-control" name="c_summary" id="c_summary" placeholder="간단한 설명을 100자 내외로 적어 주세요!"><?php echo set_value('c_summary'); ?></textarea>
		<?php echo form_error('c_summary'); ?>
	</div>
	
	<div class="form-group">
		<label for="c_content">내용</label>
		<textarea class="form-control" name="c_content" id="c_content" placeholder="간단한 설명을 300자 내외로 적어 주세요!"><?php echo set_value('c_content'); ?></textarea>
		<?php echo form_error('c_content'); ?>
	</div>

	<div class="form-group">
		<label for="c_publish">발행일</label>
		<input type="text" class="datepicker form-control" name="c_publish" id="c_publish" value="<?php echo set_value('c_publish'); ?>">
		<?php echo form_error('c_publish'); ?>
	</div>

	<button type="submit" class="col-md-12 btn btn-primary">Submit</button>
</div>

</form>