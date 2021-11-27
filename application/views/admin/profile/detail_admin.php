  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<div class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-6">
  					<h1 class="m-0 text-dark">Profile</h1>
  				</div><!-- /.col -->
  				<div class="col-sm-6">
  					<ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
  					<h3 class="card-title">Profil <?=$admin_data->nama?></h3>
  				</div>
  				<!-- /.card-header -->
  				<div class="card-body">
  					<?= $this->session->flashdata('notif_action'); ?>
  					<div class="row">
  						<div class="col-lg-8 border-left border-right">
  							<table class="table">
  								<tr>
  									<td width="20%">Nama</td>
  									<td width="5%">:</td>
  									<td><?= $admin_data->nama ?></td>
  								</tr>
  								<tr>
  									<td>Username</td>
  									<td>:</td>
  									<td><?= $admin_data->username ?></td>
  								</tr>
  								<tr>
  									<td>Email</td>
  									<td>:</td>
  									<td><?= $admin_data->email ?></td>
  								</tr>
  								<tr>
  									<td>Nomor telepon</td>
  									<td>:</td>
  									<td><?= $admin_data->nomor_telp ?></td>
  								</tr>
  							</table>
  							<hr>
  						</div>
  						<div class="col-lg-4">
  							<img src="<?= base_url() ?>upload/admin/<?= $admin_data->foto ?>" style="width: 90%; margin: 5%" class="align-middle">
  						</div>
  					</div>
  				</div>
    			<div class="card-footer">
    				<a href="<?= base_url(); ?>admin/profile/edit/<?=$admin_data->admin_id?>" class="float-right btn btn-info">Ubah Data</a>
    				<a href="<?= base_url(); ?>admin/dashboard" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>
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
  </script>
  </body>

  </html>
