<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Dosen</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Dosen</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="card">

				<div class="card-header">
					<h3 class="card-title">Tambah Data Dosen</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form class="form-horizontal" method="POST" action="<?= base_url(); ?>admin/dosen/save_dosen" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Nama Dosen :</label>
								<div class="col-sm-10">
									<input class="form-control" id="nofak" type="text" placeholder="....." name="nama_dosen" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Nidn Dosen :</label>
								<div class="col-sm-10">
									<input class="form-control" id="kodsu" type="number" placeholder="....." name="nidn_dosen" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Nip Dosen :</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" placeholder="....." name="nip_dosen" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Prodi :</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="....." name="prodi" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Email :</label>
								<div class="col-sm-10">
									<input class="form-control" type="email" placeholder="example@gmail.com" name="email" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Jabatan Struktural :</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" placeholder="....." name="jabatan_struktural" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Nomor Telepon :</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" placeholder="....." name="nomor_telp" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 ">Foto :</label>
								<div class="col-sm-10">
									<div class="input-group mb-3">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="fileupload1" name="foto" accept="image/png, image/jpg, image/jpeg">
											<label class="custom-file-label" for="fileupload1">Pilih Foto...</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 ">Status :</label>
								<div class="col-sm-10">
									<select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="status">
										<option value="aktif" selected>Aktif</option>
										<option value="non-aktif">Non-Aktif</option>
									</select>
								</div>
							</div>

						</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="float-right btn btn-info">Save</button>
					<a href="<?= base_url(); ?>admin/dosen" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>

				</div>
				</form>
			</div>

			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php $this->load->view('admin/foot_asset'); ?>
<script type="text/javascript">
	document.getElementById("datapegawai").setAttribute("class", " nav-item has-treeview menu-open");
	document.getElementById("dosen").setAttribute("class", "nav-link active");
	$('#fileupload1').on('change', function() {
		//get the file name
		var fileName = $(this).val();
		//replace the "Choose a file" label
		var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
		$(this).next('.custom-file-label').html(cleanFileName);
	});
</script>
</body>

</html>
