<div>
	<?php echo form_open('/member/myinfo2', 'onsubmit="chkSubmit(this.form);"'); ?>
	<div class="row">
		<h1>피부타입</h1>
		<div class="col-md-12 btn-group" data-toggle="buttons">
		  <label class="col-md-3 btn btn-default" style="padding:50px;">
		    <input type="radio" name="skin_type" id="skin_type1" value="1" autocomplete="off" >건성
		  </label>
		  <label class="col-md-3 btn btn-default" style="padding:50px;">
		    <input type="radio" name="skin_type" id="skin_type2" value="2" autocomplete="off"> 중성
		  </label>
		  <label class="col-md-3 btn btn-default" style="padding:50px;">
		    <input type="radio" name="skin_type" id="skin_type3" value="3" autocomplete="off"> 지성
		  </label>
		  <label class="col-md-3 btn btn-default" style="padding:50px;">
		    <input type="radio" name="skin_type" id="skin_type4" value="4" autocomplete="off"> 복합성
		  </label>
		</div>
	</div>
	<div class="row">
		<h1>피부톤</h1>
		<div class="col-md-12 btn-group" data-toggle="buttons">
		  <label class="col-md-4 btn btn-default" style="padding:50px;">
		    <input type="radio" name="skin_tone" id="skin_tone2" value="1" autocomplete="off"> 쿨톤
		  </label>
		  <label class="col-md-4 btn btn-default" style="padding:50px;">
		    <input type="radio" name="skin_tone" id="skin_tone1" value="2" autocomplete="off" >웜톤
		  </label>
		  <label class="col-md-4 btn btn-default" style="padding:50px;">
		    <input type="radio" name="skin_tone" id="skin_tone3" value="3" autocomplete="off"> 뉴트롤
		  </label>
		</div>		
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<button type="submit" class="col-md-12 btn btn-primary" style="height:50px;">저장하기</button>
		</div>
	</div>
	</form>
</div>