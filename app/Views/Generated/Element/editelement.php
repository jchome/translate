<?php
/*
 * Created by generator
 *
 */

?>

	<div class="container-fluid">
	
		<h2><?= lang('generated/Element.form.edit.title') ?></h2>
		
		<div class="row text-center ">
			<div class="col-12">
				<?= session()->getFlashdata('error') ?>
				<?= service('validation')->listErrors('errors_list') ?>
				<br />
			</div>
		</div>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditForm', 'class' => 'form-horizontal');
$fields_info = array('id' => $element['id']);
echo form_open_multipart('Generated/element/editelement/save', $attributes_info, $fields_info );

?>

	<!-- list of variables - auto-generated : -->

	<div class="row mb-3"><!-- nom : Nom de l'élément -->
		<label for="name" class="col-2 col-form-label">* <?= lang('generated/Element.form.name.label') ?>
		</label>
		
		<div class="col-10">
			<input class="form-control" type="text" name="name" 
			aria-describedby="nameHelp" id="name" value="<?= $element['name'] ?>" required  >
			<span id="nameHelp" class="form-text">
				<?= lang('generated/Element.form.name.description')?>
			</span>
		</div>
	</div>
	
	<div class="row mb-3"><!-- sélecteur : Sélecteur jQuery de l'objet à traduire -->
		<label for="selector" class="col-2 col-form-label">* <?= lang('generated/Element.form.selector.label') ?>
		</label>
		
		<div class="col-10">
			<input class="form-control" type="text" name="selector" 
			aria-describedby="selectorHelp" id="selector" value="<?= $element['selector'] ?>" required  >
			<span id="selectorHelp" class="form-text">
				<?= lang('generated/Element.form.selector.description')?>
			</span>
		</div>
	</div>
	
	<div class="row mb-3"><!-- page : Lien vers la page -->
		<label for="page_id" class="col-2 col-form-label">* <?= lang('generated/Element.form.page_id.label') ?>
		</label>
		
		<div class="col-10">
			<select name="page_id" id="page_id" aria-describedby="page_idHelp" 
				class="form-control">
				<?php foreach ($pageCollection as $pageElt): ?>
				<option value="<?= $pageElt['id'] ?>" <?= ($pageElt['id'] == $element['page_id'])?("selected"):("")?>><?= $pageElt['label'] ?> </option>
				<?php endforeach;?>
			</select>
			<span id="page_idHelp" class="form-text">
				<?= lang('generated/Element.form.page_id.description')?>
			</span>
		</div>
	</div>
		
		
		<hr>
		<div class="row">
			<div class="d-flex justify-content-around">
				<button type="submit" class="btn btn-primary"><?= lang('App.form.button.save') ?></button>
				<a href="<?= base_url() ?>/Generated/element/listelements/index" type="button" class="btn btn-secondary"><?= lang('App.form.button.cancel') ?></a>
			</div>
		</div>
			

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>/js/Generated/element/editelement.js"></script>
