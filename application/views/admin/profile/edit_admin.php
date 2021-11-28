<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Edit Profile</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Home</a></li>
						<li class="breadcrumb-item"><a href="<?=base_url()?>admin/profile/<?=$admin_data->username?>">Profile</a></li>
						<li class="breadcrumb-item active">Edit Profile</li>
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
					<h3 class="card-title">Edit Profile</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form class="form-horizontal" method="POST" action="<?= base_url(); ?>admin/profile/edit_proc" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Nama:</label>
								<div class="col-sm-10">
									<input class="form-control" id="nofak" type="hidden" value="<?= $admin_data->admin_id ?>" name="admin_id" required>
									<input class="form-control" id="nofak" type="text" value="<?= $admin_data->nama ?>" name="nama" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Username:</label>
								<div class="col-sm-10">
									<input class="form-control" type="hidden" value="<?= $admin_data->username ?>" name="username_old">
									<input class="form-control" type="text" value="<?= $admin_data->username ?>" name="username" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Email :</label>
								<div class="col-sm-10">
									<input class="form-control" type="email" value="<?= $admin_data->email ?>" name="email" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Nomor Telepon :</label>
								<div class="col-sm-10">
									<input class="form-control" type="number" value="<?= $admin_data->nomor_telp ?>" name="nomor_telp" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Foto :</label>
								<div class="col-sm-10">
									<!-- old foto -->
									<input class="form-control" type="hidden" value="<?= $admin_data->foto ?>" name="old_foto" required>
									<div class="input-group mb-3">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="fileupload1" name="foto" accept="image/png, image/jpg, image/jpeg">
											<label class="custom-file-label" for="fileupload1">Pilih Foto...</label>
										</div>
									</div>
									<?php if (isset($admin_data->foto)) { ?>
										<img src="<?= base_url(); ?>upload/admin/<?= $admin_data->foto ?>" height='90'>
									<?php } ?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Password:</label>
								<div class="col-sm-10">
									<input class="form-control" type="password" name="pass" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Re-type Password:</label>
								<div class="col-sm-10">
									<input class="form-control" type="password" name="pass2" required>
								</div>
							</div>
						</div>
				</div>
				<!-- /.card-body -->
				<!-- card-footer -->
				<div class="card-footer">
					<button type="submit" class="float-right btn btn-info " onclick="return confirm('Simpan Perubahan?')">Save</button>
					<a href="<?= base_url(); ?>admin/profile/detail/<?= $admin_data->username ?>" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>
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
