<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Layanan</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Layanan</li>
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
					<h3 class="card-title">Tambah Data Layanan</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form class="form-horizontal" method="POST" action="<?= base_url(); ?>admin/layanan/save_layanan" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Judul Layanan :</label>
								<div class="col-sm-10">
									<input class="form-control" id="nofak" type="text" placeholder="....." value="<?= $this->session->flashdata('judul_layanan'); ?>" name="judul_layanan" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">deskripsi Layanan :</label>
								<div class="col-sm-10">
									<textarea class="form-control" placeholder="Deskripsi..." id="floatingTextarea" value="<?= $this->session->flashdata('deskripsi_layanan'); ?>" name="deskripsi_layanan" required></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 ">File :</label>
								<div class="col-sm-10">
									<div class="input-group mb-3">
										<div class="custom-file">
											<input type="file" class="custom-file-input" id="fileupload1" name="file" accept=".doc, .docx, .pdf">
											<label class="custom-file-label" for="fileupload1">Pilih File...</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Tanggal :</label>
								<div class="col-sm-6">
									<input class="form-control" id="date" type="date" name="date_created" required>
								</div>
							</div>

						</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="float-right btn btn-info">Save</button>
					<a href="<?= base_url(); ?>admin/layanan" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>
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
	document.getElementById("layanan").setAttribute("class", "nav-link active");
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
