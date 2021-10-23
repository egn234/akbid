<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Pencapaian</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Pencapaian</li>
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
					<h3 class="card-title">Edit Data Pencapaian</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form class="form-horizontal" method="POST" action="<?= base_url(); ?>admin/pencapaian/edit_pencapaian" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Judul Pencapaian :</label>
								<div class="col-sm-6">
									<input class="form-control" id="nofak" type="hidden" value="<?= $data[0]->pencapaian_id ?>" name="pencapaian_id" required>
									<input class="form-control" id="nofak" type="text" value="<?= $data[0]->judul_pencapaian ?>" name="judul_pencapaian" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Deskripsi Pencapaian :</label>
								<div class="col-sm-6">
									<textarea class="form-control" placeholder="Deskripsi..." id="floatingTextarea" name="deskripsi_pencapaian" required><?= $data[0]->deskripsi_pencapaian ?></textarea>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Foto :</label>
								<div class="col-sm-6">
									<!-- old foto -->
									<input class="form-control" type="hidden" value="<?= $data[0]->foto ?>" name="old_foto" required>
									<input class="form-control-sm" type="file" name="foto" id="formFile">
									<?php if (isset($data[0]->foto)) { ?>
										<img src="<?= base_url(); ?>upload/pencapaian/<?= $data[0]->foto ?>" width='70' height='90'>
									<?php } ?>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">Tanggal :</label>
								<div class="col-sm-6">
									<?php 
										$val = strtotime($data[0]->date_created); 
										$date = date("Y-m-d",$val);
									?>
									<input class="form-control" id="nofak" type="date" value="<?= $date ?>" name="date_created" required>
								</div>
							</div>

						</div>
				</div>
				<!-- /.card-body -->
				<!-- card-footer -->
				<div class="card-footer">
					<button type="submit" class="btn btn-success" onclick="return confirm('Simpan Perubahan?')">Save</button>
					<a href="<?= base_url(); ?>admin/pencapaian" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>
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
</script>
</body>

</html>
