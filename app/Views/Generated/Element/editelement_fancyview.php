<?php
/*
 * Created by generator
 *
 */

if(session()->get('user_id') == "") {
	redirect('welcome/index');
}
?>

	<?= htmlNavigation("element","edit", $this->session); ?>
	
	<div class="container-fluid">
	
		<h2><?= lang('generated/element.form.edit.title') ?></h2>
			
		<div class="row-fluid">
<?php
$attributes_info = array('name' => 'EditFormElement', 'id' => 'EditFormElement', 'class' => 'form-horizontal');
$fields_info = array('id' => $element->id);
echo form_open_multipart('Generated/element/getelementjson/save', $attributes_info, $fields_info );

?>

			<fieldset>
	<!-- list of variables - auto-generated : -->

	<div class="control-group"><!-- nom : Nom de l'élément -->
		<label class="col-md-2 control-label" for="name">* <?= lang('generated/element.form.name.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="name" id="name" value="<?= $element->name ?>" required  >
			<span class="help-block"><?= lang('generated/element.form.name.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- sélecteur : Sélecteur jQuery de l'objet à traduire -->
		<label class="col-md-2 control-label" for="selector">* <?= lang('generated/element.form.selector.label') ?> :</label>
		<div class="controls">
		<input class="form-control" type="text" name="selector" id="selector" value="<?= $element->selector ?>" required  >
			<span class="help-block"><?= lang('generated/element.form.selector.description')?></span>
		</div>
	</div>
	
	<div class="control-group"><!-- page : Lien vers la page -->
		<label class="col-md-2 control-label" for="page_id">* <?= lang('generated/element.form.page_id.label') ?> :</label>
		<div class="controls">
		<select name="page_id" id="page_id" class="form-control">
			<?php foreach ($pageCollection as $pageElt): ?>
				<option value="<?= $pageElt->id ?>" <?= ($pageElt->id == $element->page_id)?("selected"):("")?>><?= $pageElt->label ?> </option>
			<?php endforeach;?>
		</select>
		
			<span class="help-block"><?= lang('generated/element.form.page_id.description')?></span>
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


<script src="<?= base_url() ?>/js/Generated/element/editelement.fancy.js"></script>
