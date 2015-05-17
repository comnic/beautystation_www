<div class="row">
	<?php echo form_open_multipart('/member/myinfo1', 'onsubmit="chkSubmit(this.form);"'); ?>
	<div class="col-md-12 btn-group" data-toggle="buttons">
	  <label class="col-md-6 btn btn-default" style="padding:50px;">
	    <input type="radio" name="gender" id="gender1" value="M" autocomplete="off" >남성
	  </label>
	  <label class="col-md-6 btn btn-default" style="padding:50px;">
	    <input type="radio" name="gender" id="gender2" value="F" autocomplete="off"> 여성
	  </label>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
	 	<label>생년월일</label>
		<input type="number" class="form-control" name="birth_year" id="birth_year" placeholder="출생년도를 입력해 주세요!(yyyy)">
		<input type="number" class="form-control" name="birth_month" id="birth_month" placeholder="출생월을 입력해 주세요!(mm)">
		<input type="number" class="form-control" name="birth_day" id="birth_day" placeholder="출생일을 입력해 주세요!(dd)">
	</div>
	<div class="col-md-12">
		<button type="submit" class="col-md-12 btn btn-primary" style="height:50px;">저장하기</button>
	</div>
	</form>
</div>