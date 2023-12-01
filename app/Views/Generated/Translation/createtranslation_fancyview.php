<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("translation","fancy", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/translation.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormTranslation', 'id' => 'AddFormTranslation', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('Generated/translation/createtranslationjson/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"> <!-- element_id : element -->
		<label class="control-label" for="element_id">* 
			<?= lang('generated/translation.form.element_id.label') ?> :
		</label>
		<div class="controls">
			<select name="element_id" id="element_id"> 
				<?php foreach ($elementCollection as $elementElt): ?>
				<option value="<?= $elementElt->id ?>" ><?= $elementElt->name ?> </option>
				<?php endforeach;?>
			</select>
		
			<span class="help-block valtype"><?= lang('generated/translation.form.element_id.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- lang_id : langue -->
		<label class="control-label" for="lang_id">* 
			<?= lang('generated/translation.form.lang_id.label') ?> :
		</label>
		<div class="controls">
			<select name="lang_id" id="lang_id"> 
				<?php foreach ($languageCollection as $languageElt): ?>
				<option value="<?= $languageElt->id ?>" ><?= $languageElt->label ?> </option>
				<?php endforeach;?>
			</select>
		
			<span class="help-block valtype"><?= lang('generated/translation.form.lang_id.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- html : texte -->
		<label class="control-label" for="html">
			<?= lang('generated/translation.form.html.label') ?> :
		</label>
		<div class="controls">
			<textarea class="editor" name="html" id="html" ></textarea>
		
			<span class="help-block valtype"><?= lang('generated/translation.form.html.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- alt : texte alternatif -->
		<label class="control-label" for="alt">
			<?= lang('generated/translation.form.alt.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="alt" id="alt"  >
			<span class="help-block valtype"><?= lang('generated/translation.form.alt.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- title : texte survol -->
		<label class="control-label" for="title">
			<?= lang('generated/translation.form.title.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="title" id="title"  >
			<span class="help-block valtype"><?= lang('generated/translation.form.title.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- src : source d'image -->
		<label class="control-label" for="src">
			<?= lang('generated/translation.form.src.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="src" id="src"  >
			<span class="help-block valtype"><?= lang('generated/translation.form.src.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- href : lien -->
		<label class="control-label" for="href">
			<?= lang('generated/translation.form.href.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="href" id="href"  >
			<span class="help-block valtype"><?= lang('generated/translation.form.href.description')?></span>
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

<script src="<?= base_url() ?>www/js/Generated/translation/createtranslation.fancy.js"></script>
