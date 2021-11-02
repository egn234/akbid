<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Visi Misi</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Home</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/visi_misi">Visi Misi</a></li>
						<li class="breadcrumb-item active">Tambah Visi Misi</li>
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
					<h3 class="card-title">Tambah Data Visi Misi</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<form class="form-horizontal" method="POST" action="<?= base_url(); ?>admin/visi_misi/save_visi_misi" enctype="multipart/form-data">
						<div class="card-body">
							<div class="form-group row">
								<label class="col-sm-2 col-form-label">deskripsi Visi-Misi :</label>
								<div class="col-sm-10">
									<textarea class="form-control" placeholder="Deskripsi..." id="floatingTextarea" name="deskripsi_visi_misi" required></textarea>
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
					<button type="submit" class="float-right btn btn-info">Save</button>
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
	document.getElementById("visi_misi").setAttribute("class", "nav-link active");
</script>
</body>

</html>
