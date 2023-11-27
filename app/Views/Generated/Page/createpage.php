<?php
/*
 * Created by generator
 *
 */

?>

	<div class="container-fluid">
	
		<h2><?= lang('generated/Page.form.create.title') ?></h2>
		
		<div class="row text-center ">
			<div class="col-12">
				<?= session()->getFlashdata('error') ?>
				<?= service('validation')->listErrors('errors_list') ?>
				<br />
			</div>
		</div>
		<div class="row-fluid">
<?php
echo form_open_multipart('Generated/page/createpage/add', 'class="form-horizontal"');
?>

	<!-- list of variables - auto-generated : -->
	

	<div class="row mb-3"><!-- nom : Nom de la page -->
		<label for="label" class="col-2 col-form-label">* <?= lang('generated/Page.form.label.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="label" 
				aria-describedby="labelHelp" id="label" required  >
			<span id="labelHelp" class="form-text">
				<?= lang('generated/Page.form.label.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- chemin : chemin de la page pour contrôle de sécurité -->
		<label for="path" class="col-2 col-form-label"><?= lang('generated/Page.form.path.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="path" 
				aria-describedby="pathHelp" id="path"  >
			<span id="pathHelp" class="form-text">
				<?= lang('generated/Page.form.path.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- application : Lien vers l'application -->
		<label for="app_id" class="col-2 col-form-label">* <?= lang('generated/Page.form.app_id.label') ?>
		</label>
		<div class="col-10">
			<select name="app_id" id="app_id" aria-describedby="app_idHelp" 
				class="form-control">
				<?php foreach ($appCollection as $appElt): ?>
				<option value="<?= $appElt['id'] ?>" ><?= $appElt['name'] ?> </option>
				<?php endforeach;?>
			</select>
			<span id="app_idHelp" class="form-text">
				<?= lang('generated/Page.form.app_id.description')?>
			</span>
		</div>
		
	</div>

		<hr>
		<div class="row">
			<div class="d-flex justify-content-around">
				<button type="submit" class="btn btn-primary"><?= lang('App.form.button.save') ?></button>
				<a href="<?= base_url() ?>/index.php/Generated/page/listpages/index" type="button" class="btn btn-secondary"><?= lang('App.form.button.cancel') ?></a>
			</div>
		</div>
			
		</form>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>/js/Generated/page/createpage.js"></script>
