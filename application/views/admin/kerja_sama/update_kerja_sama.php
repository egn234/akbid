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
						<li class="breadcrumb-item active">Ubah Kerjasama</li>
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
					<h3 class="card-title">Edit Data Kerjasama</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form class="form-horizontal" method="POST" action="<?= base_url(); ?>admin/kerja_sama/edit_kerja_sama" enctype="multipart/form-data">
						<div class="card-body">
							<input class="form-control" type="hidden" value="<?= $data[0]->kerja_sama_id ?>" name="kerja_sama_id" required>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Deskripsi Visi-Misi :</label>
								<div class="col-sm-10">
									<textarea id="desc_kerja_sama" name="deskripsi_kerja_sama" required><?= $data[0]->deskripsi_kerja_sama ?></textarea>
								</div>
							</div>
							<!-- <div class="form-group row">
								<label class="col-sm-2 ">Status :</label>
								<div class="col-sm-10">
									<select class="form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="status">
										<?php if ($data[0]->status == "aktif") { ?>
											<option value="aktif" selected>Aktif</option>
											<option value="non-aktif">Non-Aktif</option>
										<?php } else { ?>
											<option value="aktif">Aktif</option>
											<option value="non-aktif" selected>Non-Aktif</option>
										<?php } ?>
									</select>
								</div>
							</div> -->
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Tanggal :</label>
								<div class="col-sm-6">
									<?php
									$val = strtotime($data[0]->date_created);
									$date = date("Y-m-d", $val);
									?>
									<input class="form-control" type="date" value="<?= $date ?>" name="date_created" required>
								</div>
							</div>
						</div>
				</div>
				<!-- /.card-body -->
				<!-- card-footer -->
				<div class="card-footer">
					<button type="submit" class="float-right btn btn-info" onclick="return confirm('Simpan Perubahan?')">Save</button>
					<a href="<?= base_url(); ?>admin/kerja_sama/detail_kerja_sama?id=<?= $data[0]->kerja_sama_id ?>" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>
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
