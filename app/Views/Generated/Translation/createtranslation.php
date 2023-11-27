<?php
/*
 * Created by generator
 *
 */

?>

	<div class="container-fluid">
	
		<h2><?= lang('generated/Translation.form.create.title') ?></h2>
		
		<div class="row text-center ">
			<div class="col-12">
				<?= session()->getFlashdata('error') ?>
				<?= service('validation')->listErrors('errors_list') ?>
				<br />
			</div>
		</div>
		<div class="row-fluid">
<?php
echo form_open_multipart('Generated/translation/createtranslation/add', 'class="form-horizontal"');
?>

	<!-- list of variables - auto-generated : -->
	

	<div class="row mb-3"><!-- element : Lien vers l'élément à traduire -->
		<label for="element_id" class="col-2 col-form-label">* <?= lang('generated/Translation.form.element_id.label') ?>
		</label>
		<div class="col-10">
			<select name="element_id" id="element_id" aria-describedby="element_idHelp" 
				class="form-control">
				<?php foreach ($elementCollection as $elementElt): ?>
				<option value="<?= $elementElt['id'] ?>" ><?= $elementElt['name'] ?> </option>
				<?php endforeach;?>
			</select>
			<span id="element_idHelp" class="form-text">
				<?= lang('generated/Translation.form.element_id.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- langue : Lien vers la langue -->
		<label for="lang_id" class="col-2 col-form-label">* <?= lang('generated/Translation.form.lang_id.label') ?>
		</label>
		<div class="col-10">
			<select name="lang_id" id="lang_id" aria-describedby="lang_idHelp" 
				class="form-control">
				<?php foreach ($languageCollection as $languageElt): ?>
				<option value="<?= $languageElt['id'] ?>" ><?= $languageElt['label'] ?> </option>
				<?php endforeach;?>
			</select>
			<span id="lang_idHelp" class="form-text">
				<?= lang('generated/Translation.form.lang_id.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- texte : Traduction pour le texte contenu dans l'élément -->
		<label for="html" class="col-2 col-form-label"><?= lang('generated/Translation.form.html.label') ?>
		</label>
		<div class="col-10">
			<textarea class="ckeditor" name="html" id="html" class="form-control" >
			</textarea>
			<span id="htmlHelp" class="form-text">
				<?= lang('generated/Translation.form.html.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- texte alternatif : Texte apparaissant à la place d'une image non trouvée -->
		<label for="alt" class="col-2 col-form-label"><?= lang('generated/Translation.form.alt.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="alt" 
				aria-describedby="altHelp" id="alt"  >
			<span id="altHelp" class="form-text">
				<?= lang('generated/Translation.form.alt.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- texte survol : Texte apparaissant au survol par la souris -->
		<label for="title" class="col-2 col-form-label"><?= lang('generated/Translation.form.title.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="title" 
				aria-describedby="titleHelp" id="title"  >
			<span id="titleHelp" class="form-text">
				<?= lang('generated/Translation.form.title.description')?>
			</span>
		</div>
		
	</div>

	<div class="row mb-3"><!-- source d'image : Lien http vers l'image traduite -->
		<label for="src" class="col-2 col-form-label"><?= lang('generated/Translation.form.src.label') ?>
		</label>
		<div class="col-10">
			<input class="form-control" type="text" name="src" 
				aria-describedby="srcHelp" id="src"  >
			<span id="srcHelp" class="form-text">
				<?= lang('generated/Translation.form.src.description')?>
			</span>
		</div>
		
	</div>

		<hr>
		<div class="row">
			<div class="d-flex justify-content-around">
				<button type="submit" class="btn btn-primary"><?= lang('App.form.button.save') ?></button>
				<a href="<?= base_url() ?>/index.php/Generated/translation/listtranslations/index" type="button" class="btn btn-secondary"><?= lang('App.form.button.cancel') ?></a>
			</div>
		</div>
			
		</form>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>/js/Generated/translation/createtranslation.js"></script>
