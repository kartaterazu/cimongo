<?php
$segment3 = $this->uri->segment(3)?$this->uri->segment(3):0;
$segment4 = $this->uri->segment(4);
$segment5 = $this->uri->segment(5)?$this->uri->segment(5):0;
?>
<div id="container">
	<div id="lang" class="pull-right">
		<?= $this->lang->line('lang_title'); ?> : 
		<a href="<?= site_url() ?>/welcome/view/<?= $segment3 ?>/en/<?= $segment5 ?>/">English</a> |
		<a href="<?= site_url() ?>/welcome/view/<?= $segment3 ?>/id/<?= $segment5 ?>/">Indonesia</a>
	</div>
	<h1>CodeIgniter <?= $this->lang->line('title_separator'); ?> MongoDB <?= $this->lang->line('database'); ?></h1>
	
	<div id="body">
		<div id="errorMsg" align="center" style="color: red;"><?= (!empty($errorMsg)) ? $errorMsg : '' ?></div>
		<div id="errorMsg" align="center" style="color: green;"><?= (!empty($successMsg)) ? $successMsg : '' ?></div>
		<a class="btn btn-primary" href="<?= site_url() ?>/welcome/add/<?= $segment3 ?>/<?= $segment4 ?>/<?= $segment5 ?>/">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
			<?= $this->lang->line('add_button'); ?>
		</a>
		<form class="form-inline pull-right" method="POST" action="<?= site_url() ?>/welcome/view/<?= $segment3 ?>/<?= $segment4 ?>/<?= $segment5 ?>/">
			<div class="form-group">
			    <label class="sr-only" for="search">Search Button</label>
			    <div class="input-group">
			    	<input type="text" class="form-control" name="search" id="search" placeholder="<?= $this->lang->line('search_ph'); ?>" data-toggle="tooltip" data-placement="bottom" title="<?= $this->lang->line('search_title'); ?>">
			    	<div class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></div>
			    </div>
			</div>
		  <!--<button type="submit" class="btn btn-primary">Cari</button>-->
		</form>
		<br /><br />
		<table class="table table-responsive table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th><?= $this->lang->line('tabel_name'); ?></th>
					<th><?= $this->lang->line('tabel_address'); ?></th>
					<th><?= $this->lang->line('tabel_hobby'); ?></th>
					<th><?= $this->lang->line('tabel_action'); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php 	if(!empty($data)){
							$no = 1+$no;
							foreach($data as $value){?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $value["nama"] ?></td>
									<td><?= $value["alamat"] ?></td>
									<td><?= $value["hobi"] ?></td>
									<td>
										<a class="btn btn-warning" href="<?= site_url() ?>/welcome/edit/<?= $value["_id"] ?>/<?= $segment4 ?>/<?= $segment5 ?>/">
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
											<?= $this->lang->line('edit_button'); ?>
										</a> 
										<a class="btn btn-danger" href="<?= site_url() ?>/welcome/delete/<?= $value["_id"] ?>">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> <?= $this->lang->line('delete_button'); ?>
										</a>
									</td>
								</tr>
				<?php 			$no++;
							}
						}else{ ?>
						<tr><td colspan="5" align="center"><?= $this->lang->line('empty_result'); ?></td></tr>
				<?php 	} ?>
			</tbody>
		</table>
		<?= $hal ?>
	</div>
</div>