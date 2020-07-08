<div class="container mt-5">
	
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6">
					<h3>Data Barang</h3>
				</div>
				<div class="col-md-6 text-right">
					<button class="btn btn-info" data-toggle="modal" data-target="#modal_tambahHadiah">Tambah Hadiah</button>
				</div>
			</div>
		</div>

		<div class="card-body">
			<center>
				<div class="loading" style="display: none; margin-bottom: 15px;">
					
					<div class="spinner-grow text-primary" role="status">
						<span class="sr-only">Loading...</span>
					</div>
					<div class="spinner-grow text-secondary" role="status">
						<span class="sr-only">Loading...</span>
					</div>
					<div class="spinner-grow text-success" role="status">
						<span class="sr-only">Loading...</span>
					</div>
					<div class="spinner-grow text-danger" role="status">
						<span class="sr-only">Loading...</span>
					</div>
					<div class="spinner-grow text-warning" role="status">
						<span class="sr-only">Loading...</span>
					</div>
					<div class="spinner-grow text-info" role="status">
						<span class="sr-only">Loading...</span>
					</div>
					<div class="spinner-grow text-dark" role="status">
						<span class="sr-only">Loading...</span>
					</div>

				</div>
			</center>
			<div class="table-responsive">
				<table class="table table-hover table-bordered table-striped" id="tableHadiah">
					<thead>
						<tr>
							<th>No</th>
							<th>kode Hadiah</th>
							<th>Nama Hadiah</th>
							<th>Stok</th>
							<th>Tanggal Buat</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($hadiah as $br): ?>
						<tr>
							<td class="text-center"><?php echo $no++ ?></td>
							<td class="text-center"><?php echo $br['kode_hadiah'] ?></td>
							<td class="text-center"><?php echo $br['nama_hadiah'] ?></td>
							<td class="text-center"><?php echo $br['stok'] ?></td>
							<td class="text-center"><?php echo $br['tanggal_buat'] ?></td>
							<td class="text-center">
								<button  id="tombolHapusHadiah" class="btn btn-outline-danger" data-kode="<?php echo $br['kode_hadiah'] ?>">Hapus</button>
								<button id="tombolEditHadiah" class="btn btn-outline-warning" data-kode="<?php echo $br['kode_hadiah'] ?>">Edit</button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>


<!-- Modal Tambah Barang -->

<div class="modal fade" id="modal_tambahHadiah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal Tambah Hadiah</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form  id="form_tambahHadiah" name="form_tambahHadiah">
				<div class="modal-body">
					<div class="form-group">
						<label for="kode_hadiah">Kode Hadiah</label>
						<input required="" type="text" name="kode_hadiah" class="form-control" >
					</div>
					<div class="form-group">
						<label for="nama_hadiah">Nama Hadiah</label>
						<input required="" type="text" name="nama_hadiah" class="form-control" >
					</div>
					<div class="form-group">
						<label for="stok">Stok Hadiah</label>
						<input required="" type="number" name="stok" class="form-control" >
					</div>
					<!-- <div class="custom-file">
						<input type="file" class="custom-file-input" name="foto_barang" id="customFile">
						<label class="custom-file-label" for="customFile">Choose file</label>
					</div> -->
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end -->


<!-- Modal Edit Barang -->

<div class="modal fade" id="modal_editHadiah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal Edit Hadiah</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form  id="form_editHadiah">
				
			</form>
		</div>
	</div>
</div>
<!-- end -->

