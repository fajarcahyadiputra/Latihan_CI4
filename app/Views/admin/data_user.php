<div class="container mt-5">
	
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-md-6">
					<h3>Data User</h3>
				</div>
				<div class="col-md-6 text-right">
					<button class="btn btn-info" data-toggle="modal" data-target="#modal_tambahUser">Tambah User</button>
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
				<table class="table table-hover table-bordered table-striped" id="tableUser">
					<thead>
						<tr>
							<th>No</th>
							<th>kode User</th>
							<th>Nama User</th>
							<th>Email</th>
							<th>Status Aktif</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach ($user as $dt): ?>
						<tr>
							<td class="text-center"><?php echo $no++ ?></td>
							<td class="text-center"><?php echo $dt['kode_user'] ?></td>
							<td class="text-center"><?php echo $dt['nama_user'] ?></td>
							<td class="text-center"><?php echo $dt['email'] ?></td>
							<td class="text-center"><?php echo $dt['status_aktif'] ?></td>
							<td class="text-center">
								<button id="tombolHapusUser" class="btn btn-outline-danger" data-kode="<?php echo $dt['kode_user'] ?>">Hapus</button>
								<button id="tombolEditUser" class="btn btn-outline-warning" data-kode="<?php echo $dt['kode_user'] ?>">Edit</button>
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

<div class="modal fade" id="modal_tambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal Tambah User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form  id="form_tambahUser">
				<div class="modal-body">
					<div class="form-group">
						<label for="kode_user">Kode User</label>
						<input required="" type="text" name="kode_user" class="form-control" >
					</div>
					<div class="form-group">
						<label for="nama_user">Nama User</label>
						<input required="" type="text" name="nama_user" class="form-control" >
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input required="" type="email" name="email" class="form-control" >
					</div>
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

<div class="modal fade" id="modal_editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal Edit User</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form  id="form_editUser">
				
			</form>
		</div>
	</div>
</div>
<!-- end -->

