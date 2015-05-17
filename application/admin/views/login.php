<style>
	#adminLogin { margin-top: 70px; width: 450px; }

</style>

<div class="row">
	<div id="adminLogin" class="center-block panel panel-danger">
		<div class="panel-heading">Beauty station Admin Login</div>
		<div class="panel-body">
		<?php echo form_open_multipart('admin.php/auth/authentication', 'class="form-horizontal"' ); ?>
			  <div class="form-group">
			    <label for="inputEmail" class="col-sm-3 control-label">Email </label>
			    <div class="col-sm-8" style="padding-left: 10px;">
			      <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="inputPassword" class="col-sm-3 control-label">Password </label>
			    <div class="col-sm-8" style="padding-left: 10px;">
			      <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-10">
			      <div class="checkbox">
			        <label>
			          <input type="checkbox"> Remember me
			        </label>
			      </div>
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-9">
			      <button type="submit" class="btn btn-default">Sign in</button>
			    </div>
			  </div>
		</form>
		</div>
	</div>
	
</div>