<?php
/*
 * Created by generator
 *
 */

?>
	<div class="container">

		<h2><?= lang('generated/Element.form.list.title') ?></h2>
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
					<th class="sortable"><!-- name -->
						<a href="<?= base_url() ?>/Generated/element/listelements/index/name/<?= ($orderBy == 'name'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'name'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'name'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Element.form.name.label') ?></a></th>
					<th class="sortable"><!-- selector -->
						<a href="<?= base_url() ?>/Generated/element/listelements/index/selector/<?= ($orderBy == 'selector'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'selector'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'selector'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Element.form.selector.label') ?></a></th>
					<th class="sortable"><!-- page_id -->
						<a href="<?= base_url() ?>/Generated/element/listelements/index/page_id/<?= ($orderBy == 'page_id'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'page_id'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'page_id'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Element.form.page_id.label') ?></a></th>
					<th><?= lang('App.object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$enum_page_id = array();
foreach($elements as $element):

?>
	<tr>

				<td valign="top"><?=$element['name']?></td>
				<td valign="top"><?=$element['selector']?></td>
				<td valign="top"><?=($element['page_id'] == 0)?(""):($pageCollection[$element['page_id']]['label'])?>
			</td>
					<td>
						<a class="btn btn-secondary" 
							href="<?= base_url() ?>/Generated/element/editelement/index/<?=$element['id']?>" 
							title="<?= lang('App.form.button.edit') ?>">
							<i class="bi bi-pencil-fill"></i>
						</a>
						<a class="btn btn-danger" href="#" 
							onclick="if( confirm('<?= addslashes(lang('generated/Element.message.askConfirm.deletion'))?>')){document.location.href='<?= base_url() ?>/Generated/element/listelements/delete/<?=$element['id']?>';}" 
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
		
		<a href="<?= base_url('Generated/element/createelement/index')?>"
			role="button" class="btn btn-primary"><?= lang('generated/Element.form.create.title') ?></a>
	</div><!-- .container -->
	

<script src="<?= base_url() ?>/js/Generated/element/listelements.js"></script>
