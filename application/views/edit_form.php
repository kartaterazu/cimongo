<div id="container">
	<h1>CodeIgniter with MongoDB Database
		<a class="btn btn-primary pull-right" href="<?= site_url() ?>/welcome/">
			<span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> Kembali
		</a>
	</h1>

	<div id="body">
		<div id="content"><?= (!empty($content)?$content:'')?></div>
		<div class="row">
			<div class="col-md-3">
				<form name="addData" method="POST" action="<?= site_url() ?>/welcome/ubah/<?= $data["_id"] ?>">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input class="form-control" type="text" name="nama" placeholder="Masukan Nama Anda" value="<?= $data["nama"] ?>"/>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input class="form-control" type="text" name="alamat" placeholder="Masukan Alamat Anda" value="<?= $data["alamat"] ?>"/>
					</div>
					<div class="form-group">
						<label for="hobi">Hobi</label>
						<input class="form-control" type="text" name="hobi" placeholder="Masukan Hobi Anda" value="<?= $data["hobi"] ?>"/>
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="submit" value="Ubah"/></td>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>