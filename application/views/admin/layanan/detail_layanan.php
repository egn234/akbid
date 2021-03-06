  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Detail Layanan</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
  						<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard">Home</a></li>
  						<li class="breadcrumb-item"><a href="<?= base_url() ?>admin/layanan">Daftar Layanan</a></li>
  						<li class="breadcrumb-item active">Detail Layanan</li>
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
  					<h3 class="card-title">Detail Data Layanan</h3>
  				</div>
  				<!-- /.card-header -->
  				<div class="card-body">
  					<?= $this->session->flashdata('notif_action'); ?>
  					<div class="row">
  						<div class="col-lg-8 border-left border-right">
  							<table class="table">
  								<tr>
  									<td width="20%">Judul Layanan</td>
  									<td width="5%">:</td>
  									<td><?= $data[0]->judul_layanan ?></td>
  								</tr>
  								<tr>
  									<td>Deskripsi Layanan</td>
  									<td>:</td>
  									<td><?= $data[0]->deskripsi_layanan ?></td>
  								</tr>
  								<?php
									$val = strtotime($data[0]->date_created);
									$date = date("Y-m-d", $val);
									?>
  								<tr>
  									<td>Date Created</td>
  									<td>:</td>
  									<td><?= $date ?></td>
  								</tr>
  							</table>
  							<hr>
  						</div>
  						<div class="col-lg-4">
  							<?php if ($data[0]->file != "empty") { ?>
  								<center>
  									<a href="<?= base_url() ?>upload/layanan/<?= $data[0]->file ?>" onclick="return confirm('Download File?')" download>
  										<img src="<?= base_url() ?>upload/layanan/file.png" style="margin: 5%; max-height: 180px; max-width: 180px;" class="align-middle">
  									</a>
  									<a href="<?= base_url() ?>upload/layanan/<?= $data[0]->file ?>" class="btn btn-info " onclick="return confirm('Download File?')" download>Download</a>
  								</center>
  							<?php } else { ?>
  								<p style="width: 70%; margin: 35%">"no file attachment"</p>
  							<?php } ?>
  						</div>
  					</div>
  				</div>
  				<!-- /.card-body -->
  				<!-- card-footer -->
  				<div class="card-footer">
  					<a href="<?= base_url(); ?>admin/layanan/update_layanan?id=<?= $data[0]->layanan_id ?>" class="float-right btn btn-info">Edit</a>
  					<a href="<?= base_url(); ?>admin/layanan" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>
  				</div>
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
  </script>
  </body>

  </html>
