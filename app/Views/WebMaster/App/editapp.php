<?php

?>

	<div class="container-fluid">
	
		<h2><?= lang('generated/App.form.edit.title') ?></h2>
		
		<div class="row text-center ">
			<div class="col-12">
				<?= session()->getFlashdata('error') ?>
				<?= service('validation')->listErrors('errors_list') ?>
				<br />
			</div>
		</div>
			
		<div class="row-fluid">

			<form>
				<input type="hidden" id="app_id" value="<?= $app->id ?>"/>
				<input type="hidden" id="app_server" value="<?= $app->server ?>"/>

				<!-- list of variables - auto-generated : -->

				<div class="row mb-3"><!-- nom : Nom de l'application -->
					<label for="name" class="col-2 col-form-label">* <?= lang('generated/App.form.name.label') ?>
					</label>
					
					<div class="col-10">
						<input class="form-control" type="text" name="name" 
						aria-describedby="nameHelp" id="name" value="<?= $app->name ?>" required  >
						<span id="nameHelp" class="form-text">
							<?= lang('generated/App.form.name.description')?>
						</span>
					</div>
				</div>
				
				<div class="row mb-3"><!-- serveur : nom du serveur et port de l'application, pour contrôle de sécurité -->
					<label for="server" class="col-2 col-form-label"><?= lang('generated/App.form.server.label') ?>
					</label>
					
					<div class="col-10">
						<input class="form-control" type="text" name="server" 
						aria-describedby="serverHelp" id="server" value="<?= $app->server ?>"  >
						<span id="serverHelp" class="form-text">
							<?= lang('generated/App.form.server.description')?>
						</span>
					</div>
				</div>
					
				
			</form>
			
			<hr>

			<h3>Liste des pages</h3>
			<select id="langId" onchange="getPages(<?= $app->id ?>)">
				<?php foreach ($languages as $language) {?>
					<option value="<?= $language->id ?>" data-code="<?= $language->code ?>"><?= $language->label ?></option>
				<?php } ?>
			</select>
			<div class="row mx-5" id="pages">
				
			</div>
		</div> <!-- .row-fluid -->
	</div> <!-- .container -->


<!-- MODAL Edit translation -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<input type="hidden" id="elementId" value="">
			<input type="hidden" id="pageId" value="">
			<input type="hidden" id="translationId" value="">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="editModalLabel">
					Modifier la traduction de "<span id="elementName"></span>" pour la langue "<span id="langName"></span>"
				</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body" id="editModalBody">
				<div class="row mb-2">
					<div class="col-2">
						<label for="translationHtml">Contenu</label>
					</div>
					<div class="col-10">
						<trix-editor class="form-control" input="translationHtml"></trix-editor>
						<input id="translationHtml" type="hidden" name="content">
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-2">
						<label for="translationHref">Lien</label>
					</div>
					<div class="col-4">
						<input type="text" class="form-control" id="translationHref">
					</div>
					<div class="col-2">
						<label for="translationAlt">Texte alternatif</label>
					</div>
					<div class="col-4">
						<input type="text" class="form-control" id="translationAlt">
					</div>
				</div>
				<div class="row">
					<div class="col-2">
						<label for="translationTitle">Bulle</label>
					</div>
					<div class="col-4">
						<input type="text" class="form-control" id="translationTitle">
					</div>
					<div class="col-2">
						<label for="translationSrc">Image</label>
					</div>
					<div class="col-4">
						<input type="text" class="form-control" id="translationSrc">
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<div class="flex-fill row">
					<div class="col-2">
						<label for="elementSelector">Sélecteur</label>
					</div>
					<div class="col-6">
						<input type="text" class="form-control" id="elementSelector">
					</div>
				</div>
				<div class="buttons">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
					<button type="button" class="btn btn-primary" onclick="applyTranslation()">Appliquer</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="<?= base_url() ?>/js/WebMaster/app/editapp.js"></script>
