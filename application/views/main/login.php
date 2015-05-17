<?php 
/*
 * Intro
 */
?>
<link href="/static/css/intro.css" rel="stylesheet" type="text/css">
<script src="/static/js/intro.js" charset="UTF-8"></script>

<div class="container">
	<div class="mt120 col-md-offset-4 col-md-4 text-center">
		<div id="loginLogo"><img src="/static/images/intro/logo_login.png"></div>
		<div>
			<div id="btnLogin" class="btn col-md-12">LOGIN</div>
			<div id="loginForm">
				<div id="loginFormEmail">
					<?php echo form_open_multipart('/auth/authentication', 'onsubmit="chkSubmit(this.form);"'); ?>
						<div class="container col-md-8">
							<input type="email" class="form-control" name="login_email" id="login_email" placeholder="e-mail" value="<?php echo set_value('login_email'); ?>">
							<div class="divider"></div>
							<input type="password" class="form-control" name="login_passwd" id="login_passwd" placeholder="password" value="<?php echo set_value('login_passwd'); ?>">
						</div>
						<div class="col-md-4">
							<input type="submit" id="btnSubmit" class="btn col-md-12" value="LOGIN">
						</div>
					</form>
				</div>
				<div id="socialLoginForm">
					<ul>
						<a href="<?php echo($data['facebook_login_url']);?>"><li class="btn col-md-12">facebook으로 로그인<img src="/static/images/intro/btn_social_login_fb.png" class="pull-right"></li></a>
						<a href="<?php echo($data['kakao_login_url']);   ?>"><li class="btn col-md-12">카카오로 로그인<img src="/static/images/intro/btn_social_login_kk.png" class="pull-right"></li></a>
						<a href="<?php echo($data['naver_login_url']);   ?>"><li class="btn col-md-12">네이버로 로그인<img src="/static/images/intro/btn_social_login_n.png" class="pull-right"></li></a>
					</ul>
				</div>
			</div>
			<a id="btnJoin" class="btn col-md-12" href="/auth/register/">JOIN</a>
		</div>
		
	</div>
</div>

