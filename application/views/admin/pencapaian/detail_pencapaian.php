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
  					<h3 class="card-title">Detail Data Pencapaian</h3>
  				</div>
  				<!-- /.card-header -->
  				<div class="card-body">
  					<div class="form-group row">
  						<label class="col-sm-3 col-form-label" style="font-size: 19px;">Judul Pencapaian :</label>
  						<div class="col-sm-6">
  							<input class="form-control" id="nofak" type="text" placeholder="....." name="judul_pencapaian" value="<?= $data[0]->judul_pencapaian ?>" disabled>
  						</div>
  					</div>
  					<div class="form-group row">
  						<label class="col-sm-3 col-form-label" style="font-size: 19px;">Deskripsi Pencapaian :</label>
  						<div class="col-sm-6">
  							<textarea class="form-control" placeholder="Deskripsi..." id="floatingTextarea" disabled><?= $data[0]->deskripsi_pencapaian ?></textarea>
  						</div>
  					</div>
  					<div class="form-group row">
  						<label class="col-sm-2 col-form-label" style="font-size: 19px;">Foto :</label>
  						<div class="col-sm">
  							<img src="<?= base_url(); ?>upload/pencapaian/<?= $data[0]->foto ?>" class="rounded" width='709px' height='472px'>
  						</div>
  					</div>
  					<div class="form-group row">
  						<label class="col-sm-3 col-form-label" style="font-size: 19px;">Date Created :</label>
  						<div class="col-sm-6">
  							<input class="form-control" id="nofak" type="text" placeholder="....." name="judul_pencapaian" value="<?= $data[0]->date_created ?>" disabled>
  						</div>
  					</div>
  				</div>
  				<!-- /.card-body -->
  				<!-- card-footer -->
  				<div class="card-footer">
  					<a href="<?= base_url(); ?>admin/pencapaian/update_pencapaian?id=<?= $data[0]->pencapaian_id ?>" class="btn btn-success">Edit</a>
  					<a href="<?= base_url(); ?>admin/pencapaian" class="btn btn-danger " onclick="return confirm('Ingin Kembali?')">Back</a>

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
  </script>
  </body>

  </html>
