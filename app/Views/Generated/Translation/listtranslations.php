<?php
/*
 * Created by generator
 *
 */

?>
	<div class="container">

		<h2><?= lang('generated/Translation.form.list.title') ?></h2>
			<?php 
			$msg = session()->getFlashdata('msg_info');    if($msg != ""){echo '<div class="alert alert-info" role="alert">' . $msg . '</div>';}
			$msg = session()->getFlashdata('msg_confirm'); if($msg != ""){echo '<div class="alert alert-success" role="alert">' . $msg . '</div>';}
			$msg = session()->getFlashdata('msg_warn');    if($msg != ""){echo '<div class="alert alert-warning" role="alert">' . $msg . '</div>';}
			$msg = session()->getFlashdata('msg_error');   if($msg != ""){echo '<div class="alert alert-danger" role="alert">' . $msg . '</div>';}
			
		?>
		
		<table class="table table-striped table-bordered table-condensed">
			<thead>
				<tr>
		<!-- table header auto-generated : -->
					<th class="sortable"><!-- element_id -->
						<a href="<?= base_url() ?>/Generated/translation/listtranslations/index/element_id/<?= ($orderBy == 'element_id'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'element_id'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'element_id'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Translation.form.element_id.label') ?></a></th>
					<th class="sortable"><!-- lang_id -->
						<a href="<?= base_url() ?>/Generated/translation/listtranslations/index/lang_id/<?= ($orderBy == 'lang_id'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'lang_id'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'lang_id'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Translation.form.lang_id.label') ?></a></th>
					<th class="sortable"><!-- html -->
						<a href="<?= base_url() ?>/Generated/translation/listtranslations/index/html/<?= ($orderBy == 'html'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'html'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'html'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Translation.form.html.label') ?></a></th>
					<th class="sortable"><!-- alt -->
						<a href="<?= base_url() ?>/Generated/translation/listtranslations/index/alt/<?= ($orderBy == 'alt'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'alt'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'alt'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Translation.form.alt.label') ?></a></th>
					<th class="sortable"><!-- title -->
						<a href="<?= base_url() ?>/Generated/translation/listtranslations/index/title/<?= ($orderBy == 'title'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'title'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'title'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Translation.form.title.label') ?></a></th>
					<th class="sortable"><!-- src -->
						<a href="<?= base_url() ?>/Generated/translation/listtranslations/index/src/<?= ($orderBy == 'src'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'src'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'src'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Translation.form.src.label') ?></a></th>
					<th><?= lang('App.object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$enum_src = array();
foreach($translations as $translation):

?>
	<tr>

				<td valign="top"><?=($translation['element_id'] == 0)?(""):($elementCollection[$translation['element_id']]['name'])?>
			</td>
				<td valign="top"><?=($translation['lang_id'] == 0)?(""):($languageCollection[$translation['lang_id']]['label'])?>
			</td>
				<td valign="top"><?=$translation['html']?></td>
				<td valign="top"><?=$translation['alt']?></td>
				<td valign="top"><?=$translation['title']?></td>
				<td valign="top"><?=$translation['src']?></td>
					<td>
						<a class="btn btn-secondary" 
							href="<?= base_url() ?>/Generated/translation/edittranslation/index/<?=$translation['id']?>" 
							title="<?= lang('App.form.button.edit') ?>">
							<i class="bi bi-pencil-fill"></i>
						</a>
						<a class="btn btn-danger" href="#" 
							onclick="if( confirm('<?= addslashes(lang('generated/Translation.message.askConfirm.deletion'))?>')){document.location.href='<?= base_url() ?>/Generated/translation/listtranslations/delete/<?=$translation['id']?>';}" 
							title="<?= lang('App.form.button.delete') ?>">
							<i class="bi bi-x"></i>
						</a>
					</td>
				</tr>
<?php 
endforeach; ?>

			</tbody>
		</table>
	
		<div class="row">
			<ul class="pagination">
			<?= $pager->links('bootstrap', 'bootstrap_pagination') ?>
			</ul>
		</div><!-- .pagination -->
		
		<a href="<?= base_url('Generated/translation/createtranslation/index')?>"
			role="button" class="btn btn-primary"><?= lang('generated/Translation.form.create.title') ?></a>
	</div><!-- .container -->
	

<script src="<?= base_url() ?>/js/Generated/translation/listtranslations.js"></script>
