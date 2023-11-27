<?php
/*
 * Created by generator
 *
 */

?>
	<div class="container">

		<h2><?= lang('generated/Page.form.list.title') ?></h2>
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
					<th class="sortable"><!-- label -->
						<a href="<?= base_url() ?>/Generated/page/listpages/index/label/<?= ($orderBy == 'label'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'label'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'label'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Page.form.label.label') ?></a></th>
					<th class="sortable"><!-- path -->
						<a href="<?= base_url() ?>/Generated/page/listpages/index/path/<?= ($orderBy == 'path'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'path'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'path'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Page.form.path.label') ?></a></th>
					<th class="sortable"><!-- app_id -->
						<a href="<?= base_url() ?>/Generated/page/listpages/index/app_id/<?= ($orderBy == 'app_id'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'app_id'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'app_id'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Page.form.app_id.label') ?></a></th>
					<th><?= lang('App.object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$enum_app_id = array();
foreach($pages as $page):

?>
	<tr>

				<td valign="top"><?=$page['label']?></td>
				<td valign="top"><?=$page['path']?></td>
				<td valign="top"><?=($page['app_id'] == 0)?(""):($appCollection[$page['app_id']]['name'])?>
			</td>
					<td>
						<a class="btn btn-secondary" 
							href="<?= base_url() ?>/Generated/page/editpage/index/<?=$page['id']?>" 
							title="<?= lang('App.form.button.edit') ?>">
							<i class="bi bi-pencil-fill"></i>
						</a>
						<a class="btn btn-danger" href="#" 
							onclick="if( confirm('<?= addslashes(lang('generated/Page.message.askConfirm.deletion'))?>')){document.location.href='<?= base_url() ?>/Generated/page/listpages/delete/<?=$page['id']?>';}" 
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
		
		<a href="<?= base_url('Generated/page/createpage/index')?>"
			role="button" class="btn btn-primary"><?= lang('generated/Page.form.create.title') ?></a>
	</div><!-- .container -->
	

<script src="<?= base_url() ?>/js/Generated/page/listpages.js"></script>
