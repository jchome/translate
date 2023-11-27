<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("element","fancy", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/element.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormElement', 'id' => 'AddFormElement', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('Generated/element/createelementjson/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"> <!-- name : nom -->
		<label class="control-label" for="name">* 
			<?= lang('generated/element.form.name.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="name" id="name" required  >
			<span class="help-block valtype"><?= lang('generated/element.form.name.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- selector : sélecteur -->
		<label class="control-label" for="selector">* 
			<?= lang('generated/element.form.selector.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="selector" id="selector" required  >
			<span class="help-block valtype"><?= lang('generated/element.form.selector.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- page_id : page -->
		<label class="control-label" for="page_id">* 
			<?= lang('generated/element.form.page_id.label') ?> :
		</label>
		<div class="controls">
			<select name="page_id" id="page_id"> 
				<?php foreach ($pageCollection as $pageElt): ?>
				<option value="<?= $pageElt->id ?>" ><?= $pageElt->label ?> </option>
				<?php endforeach;?>
			</select>
		
			<span class="help-block valtype"><?= lang('generated/element.form.page_id.description')?></span>
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

<script src="<?= base_url() ?>www/js/Generated/element/createelement.fancy.js"></script>
