<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data About</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/about">Daftar About</a></li>
						<li class="breadcrumb-item active">Tambah About</li>
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
					<h3 class="card-title">Tambah Data About</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form class="form-horizontal" method="POST" action="<?= base_url(); ?>admin/about/save_about" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Judul About :</label>
								<div class="col-sm-10">
									<input class="form-control" id="nofak" type="text" placeholder="....." value="<?= $this->session->flashdata('judul_about'); ?>" name="judul_about" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">deskripsi About :</label>
								<div class="col-sm-10">
									<textarea id="desc_about" name="deskripsi_about"><?= $this->session->flashdata('deskripsi_about'); ?></textarea>
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

						</div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
					<button type="submit" class="float-right btn btn-info">Save</button>
					<a href="<?= base_url(); ?>admin/about" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>
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
	document.getElementById("about").setAttribute("class", "nav-link active");
	$('#fileupload1').on('change', function() {
		//get the file name
		var fileName = $(this).val();
		//replace the "Choose a file" label
		var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
		$(this).next('.custom-file-label').html(cleanFileName);
	});
	$('#desc_about').summernote({
		placeholder: 'Tulis deskripsi disini....',
		disableDragAndDrop: true,
		height: 240,
		minHeight: 80,
		maxHeight: 360,
		toolbar: [
			// [groupName, [list of button]]
			['style', ['bold', 'italic', 'underline']],
			['font', ['superscript', 'subscript']],
			['fontsize', ['fontsize']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['view', ['fullscreen', 'help']],
			['misc', ['codeview']]
		]
	});
</script>
</body>

</html>
