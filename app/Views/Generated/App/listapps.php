<?php
/*
 * Created by generator
 *
 */

?>
	<div class="container">

		<h2><?= lang('generated/App.form.list.title') ?></h2>
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
						<a href="<?= base_url() ?>/Generated/app/listapps/index/name/<?= ($orderBy == 'name'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'name'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'name'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/App.form.name.label') ?></a></th>
					<th class="sortable"><!-- owner_id -->
						<a href="<?= base_url() ?>/Generated/app/listapps/index/owner_id/<?= ($orderBy == 'owner_id'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'owner_id'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'owner_id'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/App.form.owner_id.label') ?></a></th>
					<th class="sortable"><!-- server -->
						<a href="<?= base_url() ?>/Generated/app/listapps/index/server/<?= ($orderBy == 'server'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'server'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'server'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/App.form.server.label') ?></a></th>
					<th><?= lang('App.object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$enum_server = array();
foreach($apps as $app):

?>
	<tr>

				<td valign="top"><?=$app['name']?></td>
				<td valign="top"><?=($app['owner_id'] == 0)?(""):($userCollection[$app['owner_id']]['name'])?>
			</td>
				<td valign="top"><?=$app['server']?></td>
					<td>
						<a class="btn btn-secondary" 
							href="<?= base_url() ?>/Generated/app/editapp/index/<?=$app['id']?>" 
							title="<?= lang('App.form.button.edit') ?>">
							<i class="bi bi-pencil-fill"></i>
						</a>
						<a class="btn btn-danger" href="#" 
							onclick="if( confirm('<?= addslashes(lang('generated/App.message.askConfirm.deletion'))?>')){document.location.href='<?= base_url() ?>/Generated/app/listapps/delete/<?=$app['id']?>';}" 
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
		
		<a href="<?= base_url('Generated/app/createapp/index')?>"
			role="button" class="btn btn-primary"><?= lang('generated/App.form.create.title') ?></a>
	</div><!-- .container -->
	

<script src="<?= base_url() ?>/js/Generated/app/listapps.js"></script>
