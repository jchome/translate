<?php
/*
 * Created by generator
 *
 */

?>

	<div class="container-fluid">
	
		<h2><?= lang('generated/App.form.create.title') ?></h2>
		
		<div class="row text-center ">
			<div class="col-12">
				<?= session()->getFlashdata('error') ?>
				<?= service('validation')->listErrors('errors_list') ?>
				<br />
			</div>
		</div>
		<div class="row-fluid">
<?php
echo form_open_multipart('Generated/app/createapp/add', 'class="form-horizontal"');
?>

	<!-- list of variables - auto-generated : -->
	

	<div class="row mb-3"><!-- nom : Nom de l'application -->
		<label for="name" class="col-2 col-form-label">* <?= lang('generated/App.form.name.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="name" 
				aria-describedby="nameHelp" id="name" required  >
			<span id="nameHelp" class="form-text">
				<?= lang('generated/App.form.name.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- propriétaire : Lien vers l'utilisateur propriétaire de l'application -->
		<label for="owner_id" class="col-2 col-form-label">* <?= lang('generated/App.form.owner_id.label') ?>
		</label>
		<div class="col-10">
			<select name="owner_id" id="owner_id" aria-describedby="owner_idHelp" 
				class="form-control">
				<?php foreach ($userCollection as $userElt): ?>
				<option value="<?= $userElt['id'] ?>" ><?= $userElt['name'] ?> </option>
				<?php endforeach;?>
			</select>
			<span id="owner_idHelp" class="form-text">
				<?= lang('generated/App.form.owner_id.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- serveur : nom du serveur et port de l'application, pour contrôle de sécurité -->
		<label for="server" class="col-2 col-form-label"><?= lang('generated/App.form.server.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="server" 
				aria-describedby="serverHelp" id="server"  >
			<span id="serverHelp" class="form-text">
				<?= lang('generated/App.form.server.description')?>
			</span>
		</div>
		
	</div>

		<hr>
		<div class="row">
			<div class="d-flex justify-content-around">
				<button type="submit" class="btn btn-primary"><?= lang('App.form.button.save') ?></button>
				<a href="<?= base_url() ?>/index.php/Generated/app/listapps/index" type="button" class="btn btn-secondary"><?= lang('App.form.button.cancel') ?></a>
			</div>
		</div>
			
		</form>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>/js/Generated/app/createapp.js"></script>
