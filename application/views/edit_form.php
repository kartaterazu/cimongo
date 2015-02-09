<?php
$segment3 = $this->uri->segment(3);
$segment4 = $this->uri->segment(4);
$segment5 = $this->uri->segment(5);
?>
<div id="container">
	<div id="lang" class="pull-right">
		<?= $this->lang->line('lang_title'); ?> : 
		<a href="<?= site_url() ?>/welcome/edit/<?= $segment3 ?>/en/<?= $segment5 ?>/">English</a> |
		<a href="<?= site_url() ?>/welcome/edit/<?= $segment3 ?>/id/<?= $segment5 ?>/">Indonesia</a>
	</div>
	<h1>CodeIgniter <?= $this->lang->line('title_separator'); ?> MongoDB <?= $this->lang->line('database'); ?></h1>

	<div id="body">
		<div id="content"><?= (!empty($content)?$content:'')?></div>
		<div class="row">
			<div class="col-md-3">
				<form name="addData" method="POST" action="<?= site_url() ?>/welcome/ubah/<?= $data["_id"] ?>">
					<div class="form-group">
						<label for="nama"><?= $this->lang->line('tabel_name'); ?></label>
						<input class="form-control" type="text" name="nama" placeholder="<?= $this->lang->line('input_nama_pl'); ?>" value="<?= $data["nama"] ?>"/>
					</div>
					<div class="form-group">
						<label for="alamat"><?= $this->lang->line('tabel_address'); ?></label>
						<input class="form-control" type="text" name="alamat" placeholder="<?= $this->lang->line('input_address_pl'); ?>" value="<?= $data["alamat"] ?>"/>
					</div>
					<div class="form-group">
						<label for="hobi"><?= $this->lang->line('tabel_hobby'); ?></label>
						<input class="form-control" type="text" name="hobi" placeholder="<?= $this->lang->line('input_hobby_pl'); ?>" value="<?= $data["hobi"] ?>"/>
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="submit" value="<?= $this->lang->line('update_button'); ?>"/>
						<a class="btn btn-default" href="<?= site_url() ?>/welcome/view/<?= $segment3 ?>/<?= $segment4 ?>/<?= $segment5 ?>/">
							<span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> <?= $this->lang->line('back_button'); ?>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>