    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/assets/jquery/jquery.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/sweetalert/sweetalert2.all.min.js"></script>
</body>
<script>
	$(document).ready(function(){
		//ajax untuk tambah Hadiah
		$('#form_tambahHadiah').on('submit', function(e){
			e.preventDefault();
			const data = $('#form_tambahHadiah').serialize();
			$.ajax({
			url: "/tambah_hadiah", //ubah ininya fir ke base_url(nama_controller/methodnya)
			data: data,
			type: 'post',
			dataType: 'json',
			success: function(hasil){
				$('#modal_tambahHadiah').modal('hide');
				$('.loading').show();
				setTimeout(()=>{
					if(hasil.tambah === true){
						$('.loading').css({'width' : '100%'});
						$('.loading').html(`<div style="width:100%" class="btn btn-success text-center">Selamat Data Berhasil Di Masukan</div>`);
					}else{
						$('.loading').html(`<div style="width:100%" class="btn btn-danger text-center">Data Gagal Di Masukan</div>`);
					}
				},2000)

				setTimeout(()=>{
					location.reload();
				},3200)
			}
		})
		})
	//end

	//ajax untuk hapus data
	$('#tableHadiah').on('click','#tombolHapusHadiah',(e)=>{
		const kode = e.target.getAttribute('data-kode');

		Swal.fire({
			title: 'Apakah kamu yakin?',
			text: "Ingin Menghapus Data ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
			if (result.value) {

				$.ajax({
			url: "/hapus_hadiah", //ubah ininya fir ke base_url(nama_controller/methodnya)
			data: {'kode': kode},
			type: 'post',
			dataType: 'json',
			success: function(hasil){
				if(hasil.hapus == true){
					Swal.fire({
						icon: 'success',
						title: 'Berhasil...',
						text: 'Selamat Data Berhasil Di Hapus!',
					})
				}else{
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Data Gagal Di Hapus!',
					})
				}
				setTimeout(function(){
					location.reload();
				},800);
			}
		})

			}
		})
	})
	//end

	//ajax untuk tampil edit hadiah
	$('#tableHadiah').on('click','#tombolEditHadiah', function(){
		const kode = $(this).data('kode');

		$.ajax({
			url: '/tampil_data', //ubah ininya fir ke base_url(nama_controller/methodnya)
			data: {'kode':kode},
			dataType: 'json',
			type: 'post',
			success: function(hasil){
				$('#modal_editHadiah').modal('show');
				$('#form_editHadiah').html(`
					<div class="modal-body">
					<div class="form-group">
					<label for="kode_hadiah">Kode Hadiah</label>
					<input required="" type="text" name="kode_hadiah" class="form-control" value="${hasil.kode_hadiah}">
					<input required="" type="text" name="kode_hadiah_lama" hidden value="${hasil.kode_hadiah}">
					</div>
					<div class="form-group">
					<label for="nama_hadiah">Nama Hadiah</label>
					<input required="" type="text" name="nama_hadiah" class="form-control" value="${hasil.nama_hadiah}">
					</div>
					<div class="form-group">
					<label for="stok">Stok Hadiah</label>
					<input required="" type="number" name="stok" class="form-control" value="${hasil.stok}">
					</div>
					</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Edit</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
					`);
			}
		})
	})
	//end

	//ajax untuk edit hadiah
	$('#form_editHadiah').on('submit', function(e){
		e.preventDefault();
		const data = $('#form_editHadiah').serialize();

		$.ajax({
			url: '/edit_hadiah', //ubah ininya fir ke base_url(nama_controller/methodnya)
			type: 'post',
			dataType: 'json',
			data: data,
			success: function(hasil){
				$('#modal_editHadiah').modal('hide');
				$('.loading').show();
				setTimeout(()=>{
					if(hasil.edit === true){
						$('.loading').css({'width' : '100%'});
						$('.loading').html(`<div style="width:100%" class="btn btn-success text-center">Selamat Data Berhasil Di Edit</div>`);
					}else{
						$('.loading').html(`<div style="width:100%" class="btn btn-danger text-center">Data Gagal Di Edit</div>`);
					}
				},2000)

				setTimeout(()=>{
					location.reload();
				},3200)
			}
		})
	})
	//end

	//ajax untuk tambah data user
	$('#form_tambahUser').on('submit', function(e){
		e.preventDefault();
		const data = $('#form_tambahUser').serialize();
		$.ajax({
			url: '/tambah_user',
			data: data,
			type: 'post',
			dataType: 'json',
			success: function(hasil){
				$('#modal_tambahUser').modal('hide');
				$('.loading').show();
				setTimeout(()=>{
					if(hasil.tambah === true){
						$('.loading').css({'width' : '100%'});
						$('.loading').html(`<div style="width:100%" class="btn btn-success text-center">Selamat Data Berhasil Di Masukan</div>`);
					}else{
						$('.loading').html(`<div style="width:100%" class="btn btn-danger text-center">Data Gagal Di Masukan</div>`);
					}
				},2000)

				setTimeout(()=>{
					location.reload();
				},3200)
			}
		})
	})
	//edn

	//ajax untuk hapus data user
	$('#tableUser').on('click','#tombolHapusUser', function(){
		const kode = $(this).data('kode');

		Swal.fire({
			title: 'Apakah kamu yakin?',
			text: "Ingin Menghapus Data ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, Hapus!'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: '/hapus_user',
					data:{'kode': kode},
					dataType: 'json',
					type: 'post',
					success: function(hasil){
						if(hasil.hapus == true){
							Swal.fire({
								icon: 'success',
								title: 'Berhasil...',
								text: 'Selamat Data Berhasil Di Hapus!',
							})
						}else{
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'Data Gagal Di Hapus!',
							})
						}
						setTimeout(function(){
							location.reload();
						},800);
					}
				})
			}
		})
	})
	//end

	//ajax untuk tampil data edit user
	$('#tableUser').on('click','#tombolEditUser', function(){
		const kode = $(this).data("kode");
		$.ajax({
			url: '/tampil_user',
			data: {"kode":kode},
			type: 'post',
			dataType: 'json',
			success: function(hasil){
				$('#modal_editUser').modal('show');
				$('#form_editUser').html(`
					<div class="modal-body">
					<div class="form-group">
					<label for="kode_user">Kode User</label>
					<input required="" type="text" name="kode_user" class="form-control" value="${hasil.kode_user}" >
					<input required="" type="text" name="kode_user_lama" hidden value="${hasil.kode_user}" >
					</div>
					<div class="form-group">
					<label for="nama_user">Nama User</label>
					<input required="" type="text" name="nama_user" class="form-control"  value="${hasil.nama_user}" >
					</div>
					<div class="form-group">
					<label for="email">Email</label>
					<input required="" type="email" name="email" class="form-control"  value="${hasil.email}" >
					</div>
					<div class="form-group">
					<label for="status_aktif">Status Aktif</label>
					<select name="status_aktif" id="status_aktif" class="form-control">
					<option ${hasil.status_aktif === 'aktif'?'selected':''} value="aktif">Akti</option>
					<option  ${hasil.status_aktif === 'tidak'?'selected':''} value="tidak">Tidak</option>
					</select>
					</div>
					</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Edit</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
					`);
			}
		})
	})
	//end

	//ajax untuk edit data user
	$('#form_editUser').on('submit', function(e){
		e.preventDefault();
		const data = $('#form_editUser').serialize();
		$.ajax({
			url: '/edit_user',
			type: 'post',
			data: data,
			dataType: 'json',
			success: function(hasil){
				$('#modal_editUser').modal('hide');
				$('.loading').show();
				setTimeout(()=>{
					if(hasil.edit === true){
						$('.loading').css({'width' : '100%'});
						$('.loading').html(`<div style="width:100%" class="btn btn-success text-center">Selamat Data Berhasil Di Edit</div>`);
					}else{
						$('.loading').html(`<div style="width:100%" class="btn btn-danger text-center">Data Gagal Di Edit</div>`);
					}
				},2000)

				setTimeout(()=>{
					location.reload();
				},3200)
			}
		})
	})
	//end

	
})
</script>
</html>

