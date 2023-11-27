<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("user","fancy", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/user.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormUser', 'id' => 'AddFormUser', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('Generated/user/createuserjson/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"> <!-- login : login -->
		<label class="control-label" for="login">* 
			<?= lang('generated/user.form.login.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="login" id="login" required  >
			<span class="help-block valtype"><?= lang('generated/user.form.login.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- password : mot de passe -->
		<label class="control-label" for="password">* 
			<?= lang('generated/user.form.password.label') ?> :
		</label>
		<div class="controls"><div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-lock"></span>
				<input type="password" placeholder="Password" name="password" id="password" required >
			</div>
			<span class="help-block valtype"><?= lang('generated/user.form.password.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- name : nom -->
		<label class="control-label" for="name">
			<?= lang('generated/user.form.name.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="name" id="name"  >
			<span class="help-block valtype"><?= lang('generated/user.form.name.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- profile : Profil -->
		<label class="control-label" for="profile">* 
			<?= lang('generated/user.form.profile.label') ?> :
		</label>
		<div class="controls"><select name="profile" id="profile" required ><option value="ADMIN" >Administrateur</option><option value="WEBMASTER" >WebMaster</option></select>
			<span class="help-block valtype"><?= lang('generated/user.form.profile.description')?></span>
		</div>
	</div>

		<hr>
		<div class="row">
			<div class="col-md-offset-2 col-md-2 col-xs-offset-2 col-xs-2">
    			<button type="submit" class="btn btn-primary"><?= lang('form.button.save') ?></button>
    		</div>
    		<div class="col-md-offset-4 col-md-2 col-xs-offset-4 col-xs-2">
    			<a data-dismiss="modal" href="#" type="button" class="btn btn-default"><?= lang('form.button.cancel') ?></a>
    		</div>
    	</div>
			
		</fieldset>

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>www/js/Generated/user/createuser.fancy.js"></script>
