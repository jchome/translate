<?php
/*
 * Created by generator
 *
 */

?>

	<div class="container-fluid">
	
		<h2><?= lang('generated/Language.form.edit.title') ?></h2>
		
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
$fields_info = array('id' => $language['id']);
echo form_open_multipart('Generated/language/editlanguage/save', $attributes_info, $fields_info );

?>

	<!-- list of variables - auto-generated : -->

	<div class="row mb-3"><!-- libellé : Nom de la langue -->
		<label for="label" class="col-2 col-form-label">* <?= lang('generated/Language.form.label.label') ?>
		</label>
		
		<div class="col-10">
			<input class="form-control" type="text" name="label" 
			aria-describedby="labelHelp" id="label" value="<?= $language['label'] ?>" required  >
			<span id="labelHelp" class="form-text">
				<?= lang('generated/Language.form.label.description')?>
			</span>
		</div>
	</div>
	
	<div class="row mb-3"><!-- code : Code sur 2 caractères -->
		<label for="code" class="col-2 col-form-label">* <?= lang('generated/Language.form.code.label') ?>
		</label>
		
		<div class="col-10">
			<input class="form-control" type="text" name="code" 
			aria-describedby="codeHelp" id="code" value="<?= $language['code'] ?>" required  >
			<span id="codeHelp" class="form-text">
				<?= lang('generated/Language.form.code.description')?>
			</span>
		</div>
	</div>
	
	<div class="row mb-3"><!-- drapeau : Image du drapeau -->
		<label for="flag" class="col-2 col-form-label"><?= lang('generated/Language.form.flag.label') ?>
		</label>
		
		<div class="col-10">
			<?php if($language['flag'] != "") { ?>
			<div class="row">
				<img src="<?= base_url() ?>/uploads/<?= $language['flag'] ?>"class="col-4 img-fluid mb-4" style="width: 150px;">
			</div>
			<div class="row">
				<div class="col-2"><i><?= lang('App.form.file.current')?></i></div>
				<div class="col-2" id="flag_currentFile">
					<a href="<?= base_url() ?>/uploads/<?= $language['flag'] ?>" target="_new" class="btn btn-primary btn-sm">
						<i class="bi bi-file-earmark-fill"></i> <?= lang('App.form.button.download')?>
					</a>
				</div>
				<div class="col-2" id="flag_deleteButton">
					<a onclick='deleteFile_flag()' class="btn btn-danger btn-sm">
						<i class="bi bi-trash"></i> <?= lang('App.form.button.delete')?>
					</a>
				</div>
			</div>
			<hr/>
			<?php } ?>
			<div class="row">
				<div class="col-2"><i><?= lang('App.form.file.new')?></i></div>
				<div class="col-10">
					<input class="input-file" id="flag_file" name="flag_file" class="form-control" type="file">
					<input type="hidden" name="flag" id="flag" value="<?= $language['flag'] ?>">
				</div>
			</div>
			<span id="flagHelp" class="form-text">
				<?= lang('generated/Language.form.flag.description')?>
			</span>
		</div>
	</div>
		
		
		<hr>
		<div class="row">
			<div class="d-flex justify-content-around">
				<button type="submit" class="btn btn-primary"><?= lang('App.form.button.save') ?></button>
				<a href="<?= base_url() ?>/Generated/language/listlanguages/index" type="button" class="btn btn-secondary"><?= lang('App.form.button.cancel') ?></a>
			</div>
		</div>
			

<?php
echo form_close('');
?>

		</div> <!-- .row-fluid -->
	</div> <!-- .container -->

<script src="<?= base_url() ?>/js/Generated/language/editlanguage.js"></script>
