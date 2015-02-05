<div id="container">
	<h1>CodeIgniter with MongoDB Database</h1>

	<div id="body">
		<div id="errorMsg" align="center" style="color: red;"><?= (!empty($errorMsg)) ? $errorMsg : '' ?></div>
		<div id="errorMsg" align="center" style="color: green;"><?= (!empty($successMsg)) ? $successMsg : '' ?></div>
		<a class="btn btn-primary" href="<?= site_url() ?>/welcome/add">
			<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 
			Add new data
		</a>
		<form class="form-inline pull-right" method="POST">
			<div class="form-group">
			    <label class="sr-only" for="search">Search Button</label>
			    <div class="input-group">
			    	<input type="text" class="form-control" name="search" id="search" placeholder="Ketik Pencarian" data-toggle="tooltip" data-placement="bottom" title="Ketik pencarian lalu tekan enter">
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
					<th>Nama</th>
					<th>Alamat</th>
					<th>Hobi</th>
					<th>Aksi</th>
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
										<a class="btn btn-warning" href="<?= site_url() ?>/welcome/edit/<?= $value["_id"] ?>">
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
											Edit
										</a> 
										<a class="btn btn-danger" href="<?= site_url() ?>/welcome/delete/<?= $value["_id"] ?>">
											<span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Delete
										</a>
									</td>
								</tr>
				<?php 			$no++;
							}
						}else{ ?>
						<tr><td colspan="5" align="center">No Data</td></tr>
				<?php 	} ?>
			</tbody>
		</table>
		<?= $hal ?>
	</div>
</div>