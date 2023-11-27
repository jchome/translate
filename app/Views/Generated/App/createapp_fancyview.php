<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("app","fancy", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/app.form.create.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'AddFormApp', 'id' => 'AddFormApp', 'class' => 'form-horizontal');
$fields_info = array();
echo form_open_multipart('Generated/app/createappjson/add', $attributes_info, $fields_info );
?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"> <!-- name : nom -->
		<label class="control-label" for="name">* 
			<?= lang('generated/app.form.name.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="name" id="name" required  >
			<span class="help-block valtype"><?= lang('generated/app.form.name.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- owner_id : propriétaire -->
		<label class="control-label" for="owner_id">* 
			<?= lang('generated/app.form.owner_id.label') ?> :
		</label>
		<div class="controls">
			<select name="owner_id" id="owner_id"> 
				<?php foreach ($userCollection as $userElt): ?>
				<option value="<?= $userElt->id ?>" ><?= $userElt->name ?> </option>
				<?php endforeach;?>
			</select>
		
			<span class="help-block valtype"><?= lang('generated/app.form.owner_id.description')?></span>
		</div>
	</div>
	
	<div class="control-group"> <!-- server : serveur -->
		<label class="control-label" for="server">
			<?= lang('generated/app.form.server.label') ?> :
		</label>
		<div class="controls"><input class="input-xlarge valtype form-control" type="text" name="server" id="server"  >
			<span class="help-block valtype"><?= lang('generated/app.form.server.description')?></span>
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

<script src="<?= base_url() ?>www/js/Generated/app/createapp.fancy.js"></script>
