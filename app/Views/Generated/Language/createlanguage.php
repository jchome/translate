<?php
/*
 * Created by generator
 *
 */

?>

	<div class="container-fluid">
	
		<h2><?= lang('generated/Language.form.create.title') ?></h2>
		
		<div class="row text-center ">
			<div class="col-12">
				<?= session()->getFlashdata('error') ?>
				<?= service('validation')->listErrors('errors_list') ?>
				<br />
			</div>
		</div>
		<div class="row-fluid">
<?php
echo form_open_multipart('Generated/language/createlanguage/add', 'class="form-horizontal"');
?>

	<!-- list of variables - auto-generated : -->
	

	<div class="row mb-3"><!-- libellé : Nom de la langue -->
		<label for="label" class="col-2 col-form-label">* <?= lang('generated/Language.form.label.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="label" 
				aria-describedby="labelHelp" id="label" required  >
			<span id="labelHelp" class="form-text">
				<?= lang('generated/Language.form.label.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- code : Code sur 2 caractères -->
		<label for="code" class="col-2 col-form-label">* <?= lang('generated/Language.form.code.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="code" 
				aria-describedby="codeHelp" id="code" required  >
			<span id="codeHelp" class="form-text">
				<?= lang('generated/Language.form.code.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- drapeau : Image du drapeau -->
		<label for="flag" class="col-2 col-form-label"><?= lang('generated/Language.form.flag.label') ?>
		</label>
		<div class="col-10">
			<input class="input-file" id="flag_file" name="flag_file" class="form-control" type="file" />
			<input type="hidden" name="flag" id="flag"/>
			<span id="flagHelp" class="form-text">
				<?= lang('generated/Language.form.flag.description')?>
			</span>
		</div>
		
	</div>

		<hr>
		<div class="row">
			<div class="d-flex justify-content-around">
				<button type="submit" class="btn btn-primary"><?= lang('App.form.button.save') ?></button>
				<a href="<?= base_url() ?>/index.php/Generated/language/listlanguages/index" type="button" class="btn btn-secondary"><?= lang('App.form.button.cancel') ?></a>
			</div>
		</div>
			
		</form>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>/js/Generated/language/createlanguage.js"></script>
