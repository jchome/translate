<?php
/*
 * Created by generator
 *
 */

?>
	<div class="container">

		<h2><?= lang('generated/Language.form.list.title') ?></h2>
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
						<a href="<?= base_url() ?>/Generated/language/listlanguages/index/label/<?= ($orderBy == 'label'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'label'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'label'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Language.form.label.label') ?></a></th>
					<th class="sortable"><!-- code -->
						<a href="<?= base_url() ?>/Generated/language/listlanguages/index/code/<?= ($orderBy == 'code'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'code'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'code'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Language.form.code.label') ?></a></th>
					<th class="sortable"><!-- flag -->
						<a href="<?= base_url() ?>/Generated/language/listlanguages/index/flag/<?= ($orderBy == 'flag'&& $asc == 'asc')?('desc'):('asc') ?>"
						<?php if($orderBy == 'flag'&& $asc == 'asc') {?>
							class=" sortAsc"
						<?php }else if($orderBy == 'flag'&& $asc == 'desc') {?>
							class=" sortDesc"
						<?php }?>
						><?= lang('generated/Language.form.flag.label') ?></a></th>
					<th><?= lang('App.object.tableheader.actions') ?></th>
				</tr>
			</thead>
			<tbody>
<?php
$enum_flag = array();
foreach($languages as $language):

?>
	<tr>

				<td valign="top"><?=$language['label']?></td>
				<td valign="top"><?=$language['code']?></td>
				<td valign="top">
					<?php 
					$ext = ($language['flag'] == null)?(""):(substr($language['flag'], -3));
					if( in_array($ext, ['png', 'gif', 'jpg']) ) {?>
						<img src="<?= base_url() ?>/uploads/<?=$language['flag']?>" class="img-zoom" alt="<?=$language['flag']?>" width="50">
					<?php }else{?>
						<a href="<?= base_url() ?>/uploads/<?=$language['flag']?>" target="_new" class="downloadFile">
					<?php } ?>
				</td>
					<td>
						<a class="btn btn-secondary" 
							href="<?= base_url() ?>/Generated/language/editlanguage/index/<?=$language['id']?>" 
							title="<?= lang('App.form.button.edit') ?>">
							<i class="bi bi-pencil-fill"></i>
						</a>
						<a class="btn btn-danger" href="#" 
							onclick="if( confirm('<?= addslashes(lang('generated/Language.message.askConfirm.deletion'))?>')){document.location.href='<?= base_url() ?>/Generated/language/listlanguages/delete/<?=$language['id']?>';}" 
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
		
		<a href="<?= base_url('Generated/language/createlanguage/index')?>"
			role="button" class="btn btn-primary"><?= lang('generated/Language.form.create.title') ?></a>
	</div><!-- .container -->
	

<script src="<?= base_url() ?>/js/Generated/language/listlanguages.js"></script>
