  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Detail Dosen</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dosen">Daftar Dosen</a></li>
              <li class="breadcrumb-item active">Detail Dosen</li>
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
  					<h3 class="card-title">Detail Data Dosen</h3>
  				</div>
  				<!-- /.card-header -->
  				<div class="card-body">
  					<?= $this->session->flashdata('notif_action'); ?>
  					<div class="row">
  						<div class="col-lg-8 border-left border-right">
  							<table class="table">
  								<tr>
  									<td width="20%">Nama Dosen</td>
  									<td width="5%">:</td>
  									<td><?= $data[0]->nama ?></td>
  								</tr>
  								<tr>
  									<td>Nidn Dosen</td>
  									<td>:</td>
  									<td><?= $data[0]->nidn_dosen ?></td>
  								</tr>
  								<tr>
  									<td>Nip Dosen</td>
  									<td>:</td>
  									<td><?= $data[0]->nip_dosen ?></td>
  								</tr>
  								<tr>
  									<td>Prodi</td>
  									<td>:</td>
  									<td><?= $data[0]->prodi ?></td>
  								</tr>
  								<tr>
  									<td>Email</td>
  									<td>:</td>
  									<td><?= $data[0]->email ?></td>
  								</tr>
  								<tr>
  									<td>Jabatan Struktural</td>
  									<td>:</td>
  									<td><?= $data[0]->jabatan_struktural ?></td>
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
  							<img src="<?= base_url() ?>upload/dosen/<?= $data[0]->foto ?>" style="width: 90%; margin: 5%" class="align-middle">
  						</div>
  					</div>
  				</div>
    			<div class="card-footer">
    				<a href="<?= base_url(); ?>admin/dosen/update_dosen?id=<?= $data[0]->dosen_id ?>" class="float-right btn btn-info">Ubah Data</a>
    				<a href="<?= base_url(); ?>admin/dosen" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>
    			</div>
  			</div>
  			<!-- /.card-body -->
  			<!-- card-footer -->
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
  	document.getElementById("dosen").setAttribute("class", "nav-link active");
  </script>
  </body>

  </html>
