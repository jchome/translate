<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("language","edit", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/language.form.edit.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditFormLanguage', 'id' => 'EditFormLanguage', 'class' => 'form-horizontal');
$fields_info = array('id' => $language->id);
echo form_open_multipart('Generated/language/getlanguagejson/save', $attributes_info, $fields_info );

?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"><!-- libellé : Nom de la langue -->
		<label class="col-md-2 control-label" for="label">* <?= lang('generated/language.form.label.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="label" id="label" value="<?= $language->label ?>" required  >
			<span class="help-block"><?= lang('generated/language.form.label.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- code : Code sur 2 caractères -->
		<label class="col-md-2 control-label" for="code">* <?= lang('generated/language.form.code.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="code" id="code" value="<?= $language->code ?>" required  >
			<span class="help-block"><?= lang('generated/language.form.code.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- drapeau : Image du drapeau -->
		<label class="col-md-2 control-label" for="flag"><?= lang('generated/language.form.flag.label') ?> :</label>
		<div class="controls">
		
		<?php if($language->flag != "") { ?>
		<div class="row">
			<div class="col-md-2"><i><?= lang('form.file.current')?></i></div>
			<div class="col-md-2" id="flag_currentFile">
				<a href="<?=base_url()?>www/uploads/<?= $language->flag ?>" target="_new" class="btn btn-default btn-xs">
					<i class="glyphicon glyphicon-file"></i> <?= lang('form.button.download')?>
				</a>
			</div>
			<div class="col-md-2" id="flag_deleteButton">
				<a onclick='deleteFile_flag()' class="btn btn-default btn-xs">
					<i class="glyphicon glyphicon-remove"></i> <?= lang('form.button.delete')?>
				</a>
			</div>
		</div>
		<hr/>
		<?php } ?>
		<div class="row">
			<div class="col-md-2"><i><?= lang('form.file.new')?></i></div>
			<div class="col-md-10">
				<input class="input-file" id="flag_file" name="flag_file" class="form-control" type="file" >
				<input type="hidden" name="flag" id="flag" value="<?= $language->flag ?>">
			</div>
		</div>
		
			<span class="help-block"><?= lang('generated/language.form.flag.description')?></span>
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


<script src="<?= base_url() ?>/js/Generated/language/editlanguage.fancy.js"></script>
