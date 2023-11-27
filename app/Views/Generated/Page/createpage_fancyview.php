<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("page","fancy", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/page.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormPage', 'id' => 'AddFormPage', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('Generated/page/createpagejson/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"> <!-- label : nom -->
		<label class="control-label" for="label">* 
			<?= lang('generated/page.form.label.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="label" id="label" required  >
			<span class="help-block valtype"><?= lang('generated/page.form.label.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- path : chemin -->
		<label class="control-label" for="path">
			<?= lang('generated/page.form.path.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="path" id="path"  >
			<span class="help-block valtype"><?= lang('generated/page.form.path.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- app_id : application -->
		<label class="control-label" for="app_id">* 
			<?= lang('generated/page.form.app_id.label') ?> :
		</label>
		<div class="controls">
			<select name="app_id" id="app_id"> 
				<?php foreach ($appCollection as $appElt): ?>
				<option value="<?= $appElt->id ?>" ><?= $appElt->name ?> </option>
				<?php endforeach;?>
			</select>
		
			<span class="help-block valtype"><?= lang('generated/page.form.app_id.description')?></span>
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

<script src="<?= base_url() ?>www/js/Generated/page/createpage.fancy.js"></script>
