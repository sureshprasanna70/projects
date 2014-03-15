<?php
if(isset($message))
{
echo'<div class="alert alert-danger">';echo $message;echo '</div>';	
}

$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);
if ($login_by_username AND $login_by_email) {
	$login_label = 'Email or login';
} else if ($login_by_username) {
	$login_label = 'Login';
} else {
	$login_label = 'Email';
}
$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);
$remember = array(
	'name'	=> 'remember',
	'id'	=> 'remember',
	'value'	=> 1,
	'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
	'name'	=> 'captcha',
	'id'	=> 'captcha',
	'maxlength'	=> 8,
);
?>
<?php echo form_open('auth/login'); ?>
<div class="row">
	<div class="col-md-3">
		<?php echo form_label($login_label, $login['id']); ?>
	</div>
<div class="col-md-5">
		<input class="form-control input-md" type="text" name="login" value="" id="login" maxlength="80" size="30"  />
	</div>
		<div class="col-md-2  alert alert-error">
			<?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?>
		</div>
	</div>
	<div class="row">
	<div class="col-md-3"><?php echo form_label('Password', $password['id']); ?></div>
<div class="col-md-5">
		<input class="form-control input-md" type="password" name="password" value="" id="password" size="30"  /></div>
		<div class="col-md-2  alert alert-error"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></div>
	</div>

	<?php if ($show_captcha) {
		if ($use_recaptcha) { ?>
	<div class="row">
	<div class="col-md-3">
			<div id="recaptcha_image"></div>
		</div>
<div class="col-md-5">
			<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
			<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
			<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
		</div>
	</div>
	<tr>
		<td>
			<div class="recaptcha_only_if_image">Enter the words above</div>
			<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
		</td>
		<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
		<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
		<?php echo $recaptcha_html; ?>
	</tr>
	<?php } else { ?>
	<div class="row">
	<div class="col-md-3">
			<p>Enter the code exactly as it appears:</p>
			<?php echo $captcha_html; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3"><?php echo form_label('Confirmation Code', $captcha['id']); ?></div>
		<div class="col-md-5"><?php echo form_input($captcha); ?></div>
		<div class="col-md-3 alert alert-error"><?php echo form_error($captcha['name']); ?></div>
	</div>
		<?php }
	} ?>

	<div class="row">
		<div class="col-md-3">
			<?php echo form_checkbox($remember); ?>
			<?php echo form_label('Remember me', $remember['id']); ?>
		</div>
		<div class="col-md-5">
			<?php echo anchor('/auth/forgot_password/', 'Forgot password'); ?>
			<?php //if ($this->config->item('allow_registration', 'tank_auth')) echo anchor('/auth/register/', 'Register'); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
<input type="submit" class="form-control btn btn-success" name="submit" value="Open Sesame"/>
</div>
<div class="col-md-3">
<input type="reset" class="form-control btn btn-danger" name="reset" value="Clear your throat"/>
</div>
</div>
<?php echo form_close(); ?>