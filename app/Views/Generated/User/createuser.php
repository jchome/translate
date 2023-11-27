<?php
/*
 * Created by generator
 *
 */

?>

	<div class="container-fluid">
	
		<h2><?= lang('generated/User.form.create.title') ?></h2>
		
		<div class="row text-center ">
			<div class="col-12">
				<?= session()->getFlashdata('error') ?>
				<?= service('validation')->listErrors('errors_list') ?>
				<br />
			</div>
		</div>
		<div class="row-fluid">
<?php
echo form_open_multipart('Generated/user/createuser/add', 'class="form-horizontal"');
?>

	<!-- list of variables - auto-generated : -->
	

	<div class="row mb-3"><!-- login : Login de l'utilisateur -->
		<label for="login" class="col-2 col-form-label">* <?= lang('generated/User.form.login.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="login" 
				aria-describedby="loginHelp" id="login" required  >
			<span id="loginHelp" class="form-text">
				<?= lang('generated/User.form.login.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- mot de passe : Mot de passe de connexion -->
		<label for="password" class="col-2 col-form-label">* <?= lang('generated/User.form.password.label') ?>
		</label>
		<div class="col-10">
			<div class="input-group">
				<span class="input-group-addon glyphicon glyphicon-lock"></span>
				<input type="password" placeholder="Password" name="password" id="password" 
					aria-describedby="passwordHelp" class="form-control" required >
			</div>
			<span id="passwordHelp" class="form-text">
				<?= lang('generated/User.form.password.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- nom : Nom de l'utilisateur -->
		<label for="name" class="col-2 col-form-label"><?= lang('generated/User.form.name.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="name" 
				aria-describedby="nameHelp" id="name"  >
			<span id="nameHelp" class="form-text">
				<?= lang('generated/User.form.name.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- Profil : Profil applicatif de l'utilisateur -->
		<label for="profile" class="col-2 col-form-label">* <?= lang('generated/User.form.profile.label') ?>
		</label>
		<div class="col-10">
			<select name="profile" id="profile" class="form-control" 
				aria-describedby="profileHelp" required >
				<option value="ADMIN" >Administrateur</option>
				<option value="WEBMASTER" >WebMaster</option>
			</select>
			<span id="profileHelp" class="form-text">
				<?= lang('generated/User.form.profile.description')?>
			</span>
		</div>
		
	</div>

		<hr>
		<div class="row">
			<div class="d-flex justify-content-around">
				<button type="submit" class="btn btn-primary"><?= lang('App.form.button.save') ?></button>
				<a href="<?= base_url() ?>/index.php/Generated/user/listusers/index" type="button" class="btn btn-secondary"><?= lang('App.form.button.cancel') ?></a>
			</div>
		</div>
			
		</form>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>/js/Generated/user/createuser.js"></script>
