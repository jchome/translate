<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("app","edit", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/app.form.edit.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditFormApp', 'id' => 'EditFormApp', 'class' => 'form-horizontal');
$fields_info = array('id' => $app->id);
echo form_open_multipart('Generated/app/getappjson/save', $attributes_info, $fields_info );

?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"><!-- nom : Nom de l'application -->
		<label class="col-md-2 control-label" for="name">* <?= lang('generated/app.form.name.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="name" id="name" value="<?= $app->name ?>" required  >
			<span class="help-block"><?= lang('generated/app.form.name.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- propriétaire : Lien vers l'utilisateur propriétaire de l'application -->
		<label class="col-md-2 control-label" for="owner_id">* <?= lang('generated/app.form.owner_id.label') ?> :</label>
		<div class="controls">
		<select name="owner_id" id="owner_id" class="form-control">
			<?php foreach ($userCollection as $userElt): ?>
				<option value="<?= $userElt->id ?>" <?= ($userElt->id == $app->owner_id)?("selected"):("")?>><?= $userElt->name ?> </option>
			<?php endforeach;?>
		</select>
		
			<span class="help-block"><?= lang('generated/app.form.owner_id.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- serveur : nom du serveur et port de l'application, pour contrôle de sécurité -->
		<label class="col-md-2 control-label" for="server"><?= lang('generated/app.form.server.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="server" id="server" value="<?= $app->server ?>"  >
			<span class="help-block"><?= lang('generated/app.form.server.description')?></span>
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


<script src="<?= base_url() ?>/js/Generated/app/editapp.fancy.js"></script>
