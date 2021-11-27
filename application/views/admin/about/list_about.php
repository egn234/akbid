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
						<li class="breadcrumb-item active">Data About</li>
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
					Daftar About
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<?= $this->session->flashdata('notif_action'); ?>
					<div class="row">
						<div class="col-lg-12 my-1">
							<a href="<?= base_url() ?>admin/about/create_about" class="btn btn-primary btn-flat">
								<i class="fas fa-plus"></i> Tambah About
							</a>
						</div>
					</div>
					<table id="example" class="table table-sm table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Judul About</th>
								<th>Deskripsi</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$allData = $this->session->all_data;
							$start = 0;
							foreach ($allData as $data) {
								$no = 1 + $start;
								$countDesc = count(explode(" ", $data->deskripsi_about));
							?>

								<tr>
									<td><?= $no ?></td>
									<td><?= $data->judul_about ?></td>
									<td>
										<?php
										if ($countDesc > 40) {
											$slice = array_slice(explode(" ", $data->deskripsi_about), 0, 41);
										?>
											<?= implode(" ", $slice); ?>......
										<?php
										} else {
											echo $data->deskripsi_about;
										}
										?>
									</td>
									<td>
										<div class="btn-group btn-block">
											<a href="<?= base_url(); ?>admin/about/detail_about?id=<?= $data->about_id ?>" class="btn btn-xs btn-info">Detail</a>
											<a href="<?= base_url(); ?>admin/about/delete_about?id=<?= $data->about_id ?>&file=<?= $data->file ?>" class="btn btn-xs btn-danger " onclick="return confirm('Ingin Menghapus?')">Hapus</a>
										</div>
									</td>
								</tr>

							<?php $start = 1 + $start;
							} ?>
						</tbody>
					</table>
				</div>
				<!-- /.card-body -->
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
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
</body>

</html>
