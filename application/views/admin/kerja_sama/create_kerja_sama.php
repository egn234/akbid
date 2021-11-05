<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Kerjasama</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard">Home</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/kerja_sama">Kerjasama</a></li>
						<li class="breadcrumb-item active">Tambah Kerjasama</li>
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
					<h3 class="card-title">Tambah Data Kerjasama</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form class="form-horizontal" method="POST" action="<?= base_url(); ?>admin/kerja_sama/save_kerja_sama" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">deskripsi Kerjasama :</label>
								<div class="col-sm-10">
									<textarea id="desc_kerja_sama" name="deskripsi_kerja_sama"><?= $this->session->flashdata('deskripsi_posting'); ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Status :</label>
								<div class="col-sm-10">
									<select class="form-control" aria-label="Default select example" name="status">
										<option selected>--Pilih--</option>
										<option value="aktif">Aktif</option>
										<option value="non-aktif">Non-Aktif</option>
									</select>
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
					<button type="submit" class="float-right btn btn-info" onclick="return confirm('Simpan Data?')">Save</button>
					<a href="<?= base_url(); ?>admin/visi_misi" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>
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
	document.getElementById("kerja_sama").setAttribute("class", "nav-link active");
	$('#desc_kerja_sama').summernote({
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
