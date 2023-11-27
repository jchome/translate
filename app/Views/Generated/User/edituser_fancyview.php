<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("user","edit", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/user.form.edit.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditFormUser', 'id' => 'EditFormUser', 'class' => 'form-horizontal');
$fields_info = array('id' => $user->id);
echo form_open_multipart('Generated/user/getuserjson/save', $attributes_info, $fields_info );

?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"><!-- login : Login de l'utilisateur -->
		<label class="col-md-2 control-label" for="login">* <?= lang('generated/user.form.login.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="login" id="login" value="<?= $user->login ?>" required  >
			<span class="help-block"><?= lang('generated/user.form.login.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- mot de passe : Mot de passe de connexion -->
		<label class="col-md-2 control-label" for="password">* <?= lang('generated/user.form.password.label') ?> :</label>
		<div class="controls">
		<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-lock"></span>
				<input type="password" placeholder="Password" name="password" class="form-control" id="password" value="<?= $user->password ?>" required >
			</div>
			<span class="help-block"><?= lang('generated/user.form.password.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- nom : Nom de l'utilisateur -->
		<label class="col-md-2 control-label" for="name"><?= lang('generated/user.form.name.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="name" id="name" value="<?= $user->name ?>"  >
			<span class="help-block"><?= lang('generated/user.form.name.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- Profil : Profil applicatif de l'utilisateur -->
		<label class="col-md-2 control-label" for="profile">* <?= lang('generated/user.form.profile.label') ?> :</label>
		<div class="controls">
		<select name="profile" id="profile" class="form-control" required >
			<option value="ADMIN" <?= ($user->profile == "ADMIN")?("selected"):("")?> >Administrateur</option>
			<option value="WEBMASTER" <?= ($user->profile == "WEBMASTER")?("selected"):("")?> >WebMaster</option>
		</select>
			<span class="help-block"><?= lang('generated/user.form.profile.description')?></span>
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


<script src="<?= base_url() ?>/js/Generated/user/edituser.fancy.js"></script>
