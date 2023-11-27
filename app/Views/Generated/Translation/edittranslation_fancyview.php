<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("translation","edit", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/translation.form.edit.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditFormTranslation', 'id' => 'EditFormTranslation', 'class' => 'form-horizontal');
$fields_info = array('id' => $translation->id);
echo form_open_multipart('Generated/translation/gettranslationjson/save', $attributes_info, $fields_info );

?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"><!-- element : Lien vers l'élément à traduire -->
		<label class="col-md-2 control-label" for="element_id">* <?= lang('generated/translation.form.element_id.label') ?> :</label>
		<div class="controls">
		<select name="element_id" id="element_id" class="form-control">
			<?php foreach ($elementCollection as $elementElt): ?>
				<option value="<?= $elementElt->id ?>" <?= ($elementElt->id == $translation->element_id)?("selected"):("")?>><?= $elementElt->name ?> </option>
			<?php endforeach;?>
		</select>
		
			<span class="help-block"><?= lang('generated/translation.form.element_id.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- langue : Lien vers la langue -->
		<label class="col-md-2 control-label" for="lang_id">* <?= lang('generated/translation.form.lang_id.label') ?> :</label>
		<div class="controls">
		<select name="lang_id" id="lang_id" class="form-control">
			<?php foreach ($languageCollection as $languageElt): ?>
				<option value="<?= $languageElt->id ?>" <?= ($languageElt->id == $translation->lang_id)?("selected"):("")?>><?= $languageElt->label ?> </option>
			<?php endforeach;?>
		</select>
		
			<span class="help-block"><?= lang('generated/translation.form.lang_id.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- texte : Traduction pour le texte contenu dans l'élément -->
		<label class="col-md-2 control-label" for="html"><?= lang('generated/translation.form.html.label') ?> :</label>
		<div class="controls">
		<textarea class="ckeditor" name="html" class="form-control" id="html" ><?= $translation->html ?></textarea>
			<span class="help-block"><?= lang('generated/translation.form.html.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- texte alternatif : Texte apparaissant à la place d'une image non trouvée -->
		<label class="col-md-2 control-label" for="alt"><?= lang('generated/translation.form.alt.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="alt" id="alt" value="<?= $translation->alt ?>"  >
			<span class="help-block"><?= lang('generated/translation.form.alt.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- texte survol : Texte apparaissant au survol par la souris -->
		<label class="col-md-2 control-label" for="title"><?= lang('generated/translation.form.title.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="title" id="title" value="<?= $translation->title ?>"  >
			<span class="help-block"><?= lang('generated/translation.form.title.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- source d'image : Lien http vers l'image traduite -->
		<label class="col-md-2 control-label" for="src"><?= lang('generated/translation.form.src.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="src" id="src" value="<?= $translation->src ?>"  >
			<span class="help-block"><?= lang('generated/translation.form.src.description')?></span>
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


<script src="<?= base_url() ?>/js/Generated/translation/edittranslation.fancy.js"></script>
