  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Data Staff</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/staff">Daftar Staff</a></li>
  						<li class="breadcrumb-item active">Detail Staff</li>
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
  					<h3 class="card-title">Detail Data Staff</h3>
  				</div>
  				<!-- /.card-header -->
  				<div class="card-body">
  					<?= $this->session->flashdata('notif_action'); ?>
  					<div class="row">
  						<div class="col-lg-8 border-left border-right">
  							<table class="table">
  								<tr>
  									<td width="20%">Nama Staff</td>
  									<td width="5%">:</td>
  									<td><?= $data[0]->nama ?></td>
  								</tr>
  								<tr>
  									<td>Pendidikan Terakhir</td>
  									<td>:</td>
  									<td><?= $data[0]->pendidikan_terakhir ?></td>
  								</tr>
  								<tr>
  									<td>Nip Staff</td>
  									<td>:</td>
  									<td><?= $data[0]->nip_staff ?></td>
  								</tr>
  								<tr>
  									<td>Jabatan</td>
  									<td>:</td>
  									<td><?= $data[0]->jabatan ?></td>
  								</tr>
  								<tr>
  									<td>Email</td>
  									<td>:</td>
  									<td><?= $data[0]->email ?></td>
  								</tr>
  								<tr>
  									<td>Nomor telepon</td>
  									<td>:</td>
  									<td><?= $data[0]->nomor_telp ?></td>
  								</tr>
  								<tr>
  									<td>Status</td>
  									<td>:</td>
  									<td><?= $data[0]->status ?></td>
  								</tr>
  							</table>
  							<hr>
  						</div>
  						<div class="col-lg-4">
  							<img src="<?= base_url() ?>upload/staff/<?= $data[0]->foto ?>" style="width: 90%; margin: 5%" class="align-middle">
  						</div>
  					</div>
  				</div>
  				<!-- /.card-body -->
  				<!-- card-footer -->
  				<div class="card-footer">
  					<a href="<?= base_url(); ?>admin/staff/update_staff?id=<?= $data[0]->staff_id ?>" class="float-right btn btn-info">Edit</a>
  					<a href="<?= base_url(); ?>admin/staff" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>

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
  	document.getElementById("datapegawai").setAttribute("class", " nav-item has-treeview menu-open");
  	document.getElementById("staff").setAttribute("class", "nav-link active");
  </script>
  </body>

  </html>
