<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Data Visi - Misi</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard">Home</a></li>
						<li class="breadcrumb-item active">Visi - Misi</li>
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
					Daftar Visi - Misi
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<?= $this->session->flashdata('notif_action'); ?>
					<div class="row">
						<div class="col-lg-12 my-1">
							<a href="<?= base_url() ?>admin/visi_misi/create_visi_misi" class="btn btn-primary btn-flat">
								<i class="fas fa-plus"></i> Tambah Visi - Misi
							</a>
						</div>
					</div>
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th style="max-width: 240px;">Deskripsi Visi - Misi</th>
								<th>Status</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$allData = $this->session->all_data;
							$start = 0;
							foreach ($allData as $data) {
								$no = 1 + $start;
							?>

								<tr>
									<td><?= $no ?></td>
									<td><?= $data->deskripsi_visi_misi ?></td>
									<td>
										<center>
											<?php if ($data->status == "aktif") { ?>
												<button class="btn btn-info" disabled>Aktif</button>
											<?php } else { ?>
												<button class="btn btn-warning" disabled>Non-Aktif</button>
											<?php } ?>
										</center>
									</td>
									<td>
										<a href="<?= base_url(); ?>admin/visi_misi/detail_visi_misi?id=<?= $data->visi_misi_id ?>" class="btn btn-info">Detail</a>
										<a href="<?= base_url(); ?>admin/visi_misi/delete_visi_misi?id=<?= $data->visi_misi_id ?>" class="btn btn-danger " onclick="return confirm('Ingin Menghapus?')">Hapus</a>
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
	document.getElementById("visi_misi").setAttribute("class", "nav-link active");
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>
</body>

</html>
