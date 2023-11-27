<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("language","fancy", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/language.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormLanguage', 'id' => 'AddFormLanguage', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('Generated/language/createlanguagejson/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"> <!-- label : libellé -->
		<label class="control-label" for="label">* 
			<?= lang('generated/language.form.label.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="label" id="label" required  >
			<span class="help-block valtype"><?= lang('generated/language.form.label.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- code : code -->
		<label class="control-label" for="code">* 
			<?= lang('generated/language.form.code.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="code" id="code" required  >
			<span class="help-block valtype"><?= lang('generated/language.form.code.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- flag : drapeau -->
		<label class="control-label" for="flag">
			<?= lang('generated/language.form.flag.label') ?> :
		</label>
		<div class="controls"><input class="input-file" id="flag_file" name="flag_file" type="file" />
		<input type="hidden" name="flag" id="flag"/>
			<span class="help-block valtype"><?= lang('generated/language.form.flag.description')?></span>
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

<script src="<?= base_url() ?>www/js/Generated/language/createlanguage.fancy.js"></script>
