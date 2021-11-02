<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Edit Layanan</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/layanan">Daftar Layanan</a></li>
						<li class="breadcrumb-item active">Edit Layanan</li>
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
					<h3 class="card-title">Edit Data Layanan</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form class="form-horizontal" method="POST" action="<?= base_url(); ?>admin/layanan/edit_layanan" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Judul Layanan :</label>
								<div class="col-sm-10">
									<input class="form-control" id="nofak" type="hidden" value="<?= $data[0]->layanan_id ?>" name="layanan_id" required>
									<input class="form-control" id="nofak" type="text" value="<?= $data[0]->judul_layanan ?>" name="judul_layanan" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Deskripsi Layanan :</label>
								<div class="col-sm-10">
									<textarea class="form-control" placeholder="Deskripsi..." id="floatingTextarea" name="deskripsi_layanan" required><?= $data[0]->deskripsi_layanan ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">File :</label>
								<div class="col-sm-10">
									<!-- old file -->
									<input class="form-control" type="hidden" value="<?= $data[0]->file ?>" name="old_file" required>
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
									<?php
									$val = strtotime($data[0]->date_created);
									$date = date("Y-m-d", $val);
									?>
									<input class="form-control" id="nofak" type="date" value="<?= $date ?>" name="date_created" required>
								</div>
							</div>

						</div>
				</div>
				<!-- /.card-body -->
				<!-- card-footer -->
				<div class="card-footer">
					<button type="submit" class="float-right btn btn-info" onclick="return confirm('Simpan Perubahan?')">Save</button>
					<a href="<?= base_url(); ?>admin/layanan/detail_layanan?id=<?= $data[0]->layanan_id ?>" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>
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
